<?php
// Get PRICES data from db
$sql_get_price = "SELECT * FROM categories";
$query_get_price = mysqli_query($connect, $sql_get_price);
while ($res[] = mysqli_fetch_assoc($query_get_price)) {
    $prices = $res;
}
if ($prices) {
    foreach ($prices as $price) {
        if ($price['category_id'] == '1') {
            $_SESSION['category_a_price'] = $price['category_price'];
        }
        if ($price['category_id'] == '2') {
            $_SESSION['category_b_price'] = $price['category_price'];
        }
        if ($price['category_id'] == '3') {
            $_SESSION['category_c_price'] = $price['category_price'];
        }
        if ($price['category_id'] == '4') {
            $_SESSION['category_d_price'] = $price['category_price'];
        }
    }
}
// Get ZONES data from db
$sql_get_zones = "SELECT * FROM zones";
$query_get_zones = mysqli_query($connect, $sql_get_zones);
while ($res_zones[] = mysqli_fetch_assoc($query_get_zones)) {
    $zones = $res_zones;
}
if ($zones) {
    foreach ($zones as $zone) {
        if ($zone['zone_id'] == '1') {
            $_SESSION['zone_1_quantity'] = $zone['places_quantity'];
            $_SESSION['zone_1_category'] = $zone['category_id'];
        }
        if ($zone['zone_id'] == '2') {
            $_SESSION['zone_2_quantity'] = $zone['places_quantity'];
            $_SESSION['zone_2_category'] = $zone['category_id'];
        }
        if ($zone['zone_id'] == '3') {
            $_SESSION['zone_3_quantity'] = $zone['places_quantity'];
            $_SESSION['zone_3_category'] = $zone['category_id'];
        }
        if ($zone['zone_id'] == '4') {
            $_SESSION['zone_4_quantity'] = $zone['places_quantity'];
            $_SESSION['zone_4_category'] = $zone['category_id'];
        }
        if ($zone['zone_id'] == '5') {
            $_SESSION['zone_5_quantity'] = $zone['places_quantity'];
            $_SESSION['zone_5_category'] = $zone['category_id'];
        }
        if ($zone['zone_id'] == '6') {
            $_SESSION['zone_6_quantity'] = $zone['places_quantity'];
            $_SESSION['zone_6_category'] = $zone['category_id'];
        }
    }
}
// Send price data
$adminCategoryPricesForm = new SendForm($connect);
if (!empty($_POST['submit_category_price'])) {
    $valid_category_a_price = $adminCategoryPricesForm->validationNumbers($_POST['category_a_price']);
    $valid_category_b_price = $adminCategoryPricesForm->validationNumbers($_POST['category_b_price']);
    $valid_category_c_price = $adminCategoryPricesForm->validationNumbers($_POST['category_c_price']);
    $valid_category_d_price = $adminCategoryPricesForm->validationNumbers($_POST['category_d_price']);
}
if ($valid_category_a_price && $valid_category_b_price && $valid_category_c_price && $valid_category_d_price) {

    // cat 1
    $sql_category_a_price = "UPDATE categories SET category_price = '" . trim($_POST['category_a_price']) . "' WHERE category_id = '1'";
    mysqli_query($connect, $sql_category_a_price);
    $_SESSION['category_a_price'] = $_POST['category_a_price'];
    // cat 2
    $sql_category_b_price = "UPDATE categories SET category_price = '" . trim($_POST['category_b_price']) . "' WHERE category_id = '2'";
    mysqli_query($connect, $sql_category_b_price);
    $_SESSION['category_b_price'] = $_POST['category_b_price'];
    // cat 3
    $sql_category_c_price = "UPDATE categories SET category_price = '" . trim($_POST['category_c_price']) . "' WHERE category_id = '3'";
    mysqli_query($connect, $sql_category_c_price);
    $_SESSION['category_c_price'] = $_POST['category_c_price'];
    // cat 4
    $sql_category_d_price = "UPDATE categories SET category_price = '" . trim($_POST['category_d_price']) . "' WHERE category_id = '4'";
    mysqli_query($connect, $sql_category_d_price);
    $_SESSION['category_d_price'] = $_POST['category_d_price'];
    $adminCategoryPricesForm->clearData();
}

// Send quantity data
$adminCategotyZoneForm = new SendForm($connect);
if (!empty($_POST['submit_zones_quantity'])) {
    $valid_zone_1_quantity = $adminCategotyZoneForm->validationNumbers($_POST['zone_1_quantity']);
    $valid_zone_2_quantity = $adminCategotyZoneForm->validationNumbers($_POST['zone_2_quantity']);
    $valid_zone_3_quantity = $adminCategotyZoneForm->validationNumbers($_POST['zone_3_quantity']);
    $valid_zone_4_quantity = $adminCategotyZoneForm->validationNumbers($_POST['zone_4_quantity']);
    $valid_zone_5_quantity = $adminCategotyZoneForm->validationNumbers($_POST['zone_5_quantity']);
    $valid_zone_6_quantity = $adminCategotyZoneForm->validationNumbers($_POST['zone_6_quantity']);
}
if ($valid_zone_1_quantity && $valid_zone_2_quantity && $valid_zone_3_quantity && $valid_zone_4_quantity && $valid_zone_5_quantity && $valid_zone_6_quantity) {
    // zone 1
    $sql_zone_1_quantity = "UPDATE zones SET places_quantity = '" . trim($_POST['zone_1_quantity']) . "', category_id = '" . $_POST['category_zone_1'] . "' WHERE zone_id = '1'";
    mysqli_query($connect, $sql_zone_1_quantity);
    $_SESSION['zone_1_quantity'] = $_POST['zone_1_quantity'];
    $_SESSION['zone_1_category'] = $_POST['category_zone_1'];
    // zone 2
    $sql_zone_2_quantity = "UPDATE zones SET places_quantity = '" . trim($_POST['zone_2_quantity']) . "', category_id = '" . $_POST['category_zone_2'] . "' WHERE zone_id = '2'";
    mysqli_query($connect, $sql_zone_2_quantity);
    $_SESSION['zone_2_quantity'] = $_POST['zone_2_quantity'];
    $_SESSION['zone_2_category'] = $_POST['category_zone_2'];
    // zone 3
    $sql_zone_3_quantity = "UPDATE zones SET places_quantity = '" . trim($_POST['zone_3_quantity']) . "', category_id = '" . $_POST['category_zone_3'] . "' WHERE zone_id = '3'";
    mysqli_query($connect, $sql_zone_3_quantity);
    $_SESSION['zone_3_quantity'] = $_POST['zone_3_quantity'];
    $_SESSION['zone_3_category'] = $_POST['category_zone_3'];
    // zone 4
    $sql_zone_4_quantity = "UPDATE zones SET places_quantity = '" . trim($_POST['zone_4_quantity']) . "', category_id = '" . $_POST['category_zone_4'] . "' WHERE zone_id = '4'";
    mysqli_query($connect, $sql_zone_4_quantity);
    $_SESSION['zone_4_quantity'] = $_POST['zone_4_quantity'];
    $_SESSION['zone_4_category'] = $_POST['category_zone_4'];
    // zone 5
    $sql_zone_5_quantity = "UPDATE zones SET places_quantity = '" . trim($_POST['zone_5_quantity']) . "', category_id = '" . $_POST['category_zone_5'] . "' WHERE zone_id = '5'";
    mysqli_query($connect, $sql_zone_5_quantity);
    $_SESSION['zone_5_quantity'] = $_POST['zone_5_quantity'];
    $_SESSION['zone_5_category'] = $_POST['category_zone_5'];
    // zone 6
    $sql_zone_6_quantity = "UPDATE zones SET places_quantity = '" . trim($_POST['zone_6_quantity']) . "', category_id = '" . $_POST['category_zone_6'] . "' WHERE zone_id = '6'";
    mysqli_query($connect, $sql_zone_6_quantity);
    $_SESSION['zone_6_quantity'] = $_POST['zone_6_quantity'];
    $_SESSION['zone_6_category'] = $_POST['category_zone_6'];


}

// Create places
if (!empty($_POST)) {
    if (!empty($_POST['set_places'])) {
        // Delete places before create
        $sql_delete_places = "DELETE FROM places";
        mysqli_query($connect, $sql_delete_places);

        $sql_get_zones_data = "SELECT * FROM zones INNER JOIN categories USING (category_id)";
        $query_get_zones_data = mysqli_query($connect, $sql_get_zones_data);
        while ($res_zones_data[] = mysqli_fetch_assoc($query_get_zones_data)) {
            $zones_info = $res_zones_data;
        }
        foreach ($zones_info as $zone_info) {
            for ($i = 1; $i <= $zone_info['places_quantity']; $i++) {
                $sql_set_places = "INSERT INTO places SET place_name='" . $i . "', zone_id='" . $zone_info['zone_id'] . "', category_id='" . $zone_info['category_id'] . "', place_status='1'";
                $query_set_places = mysqli_query($connect, $sql_set_places);
            }

        }
    }

}
// Get all orders
$sql_get_orders_list = "SELECT * FROM orders LEFT JOIN users USING (user_id)";
//$sql_get_orders_list = "SELECT order_id, COUNT(order_id) FROM order_details GROUP BY order_id";
$query_get_orders_list = mysqli_query($connect, $sql_get_orders_list);
while ($res_get_orders_list[] = mysqli_fetch_assoc($query_get_orders_list)) {
    $_SESSION['orders_list'] = $res_get_orders_list;
}

// Get places quantity
unset($_SESSION['orders_list_add_places_quantity']);
foreach ($_SESSION['orders_list'] as $item) {
    $sql_get_orders_details = "SELECT COUNT(order_id) FROM order_details WHERE order_id='" . $item['order_id'] . "' GROUP BY order_id";
    $query_get_orders_details = mysqli_query($connect, $sql_get_orders_details);

    $res_get_orders_details = mysqli_fetch_assoc($query_get_orders_details);
    foreach ($res_get_orders_details as $detail) {
        $item['places_count'] = $detail;
    }
    $_SESSION['orders_list_add_places_quantity'][] = $item;
}
// Get places numbers
unset($_SESSION['places_numbers']);
unset($_SESSION['orders_list_add_places_numbers']);

foreach ($_SESSION['orders_list_add_places_quantity'] as $item) {
    $sql_get_places_numbers = "SELECT place_id, place_name, zone_name FROM order_details LEFT JOIN places USING (place_id) LEFT JOIN zones USING (zone_id) WHERE order_id='" . $item['order_id'] . "'";
    $query_get_places_numbers = mysqli_query($connect, $sql_get_places_numbers);

    while ($res_get_places_numbers[] = mysqli_fetch_assoc($query_get_places_numbers)) {
        $_SESSION['places_numbers'] = $res_get_places_numbers;
    }

    foreach ($_SESSION['places_numbers'] as $number) {
        $item['places_numbers'][] = $number;
    }
    unset($res_get_places_numbers);
    $_SESSION['orders_list_add_places_numbers'][] = $item;
}
// Delete order
if (!empty($_POST)) {
    if (!empty($_POST['delete'])) {

    $sql_delete_order = "DELETE FROM orders WHERE order_id='" . $_POST['delete'] . "'";
    $query_delete_order = mysqli_query($connect, $sql_delete_order);
    $sql_delete_order_details = "DELETE FROM order_details WHERE order_id='" . $_POST['delete'] . "'";
    $query_delete_order_details = mysqli_query($connect, $sql_delete_order_details);

    foreach ($_POST["delete_places"] as $item) {
        $sql_update_deleted_paces_status = "UPDATE places SET place_status='1' WHERE place_id='" . $item . "'";
        $query_update_deleted_paces_status = mysqli_query($connect, $sql_update_deleted_paces_status);
    }
    header('Location: /index.php?route=admin', true, 301);
    exit();
    
    }
}


getView('admin');