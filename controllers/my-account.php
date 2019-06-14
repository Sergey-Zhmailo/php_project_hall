<?php
$auth->isAuth(!$_SESSION['is_auth']);


// Get all orders
$sql_get_client_orders_list = "SELECT order_id, user_id FROM orders LEFT JOIN users USING (user_id) WHERE user_id='" . $_SESSION['is_auth'] . "'";
//$sql_get_orders_list = "SELECT order_id, COUNT(order_id) FROM order_details GROUP BY order_id";
$query_get_client_orders_list = mysqli_query($connect, $sql_get_client_orders_list);
while ($res_get_client_orders_list[] = mysqli_fetch_assoc($query_get_client_orders_list)) {
    $_SESSION['client_orders_list'] = $res_get_client_orders_list;
}
// Get places quantity
unset($_SESSION['client_orders_list_quantity']);
foreach ($_SESSION['client_orders_list'] as $item) {
    $sql_get_orders_list_quantity = "SELECT COUNT(order_id) FROM order_details WHERE order_id='" . $item['order_id'] . "' GROUP BY order_id";
    $query_get_orders_list_quantity = mysqli_query($connect, $sql_get_orders_list_quantity);

    $res_get_orders_list_quantity = mysqli_fetch_assoc($query_get_orders_list_quantity);
    foreach ($res_get_orders_list_quantity as $detail) {
        $item['places_count'] = $detail;
    }
    $_SESSION['client_orders_list_quantity'][] = $item;
}
// Get places numbers
unset($_SESSION['client_places_numbers']);
unset($_SESSION['client_orders_list_quantity_details']);
unset($item['client_places_numbers']);

foreach ($_SESSION['client_orders_list_quantity'] as $item) {
    $sql_get_client_orders_places_numbers = "SELECT place_id, place_name, zone_name FROM order_details LEFT JOIN places USING (place_id) LEFT JOIN zones USING (zone_id) WHERE order_id='" . $item['order_id'] . "'";
    $query_get_client_orders_places_numbers = mysqli_query($connect, $sql_get_client_orders_places_numbers);

    while ($res_get_client_orders_places_numbers[] = mysqli_fetch_assoc($query_get_client_orders_places_numbers)) {
        $_SESSION['client_places_numbers'] = $res_get_client_orders_places_numbers;
    }

    foreach ($_SESSION['client_places_numbers'] as $number) {
        $item['client_places_numbers'][] = $number;
    }
    unset($res_get_client_orders_places_numbers);
    $_SESSION['client_orders_list_quantity_details'][] = $item;
}
// Delete order

if (!empty($_POST)) {
    if (!empty($_POST['delete_client_order'])) {

        $sql_delete_client_order = "DELETE FROM orders WHERE order_id='" . $_POST['delete_client_order'] . "'";
        $query_delete_client_order = mysqli_query($connect, $sql_delete_client_order);
        $sql_delete_client_order_details = "DELETE FROM order_details WHERE order_id='" . $_POST['delete_client_order'] . "'";
        $query_delete_client_order_details = mysqli_query($connect, $sql_delete_client_order_details);

        foreach ($_POST['delete_client_order_places'] as $item) {
            $sql_update_deleted_client_places_status = "UPDATE places SET place_status='1' WHERE place_id='" . $item . "'";
            $query_update_deleted_client_places_status = mysqli_query($connect, $sql_update_deleted_client_places_status);
        }
        header('Location: /index.php?route=my-account', true, 301);
        exit();

    }
}

getView('my-account');