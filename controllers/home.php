<?php
unset($_SESSION['errors']['error_order']);
// Build hall

for ($i = 1; $i <= 6; $i++) {
    $sql_get_places_zone[$i] = "SELECT * FROM places INNER JOIN categories using(category_id) JOIN zones using (zone_id) WHERE zone_id='" . $i . "'";
    $query_get_places_zone[$i] = mysqli_query($connect, $sql_get_places_zone[$i]);
    while ($res_places[$i][] = mysqli_fetch_assoc($query_get_places_zone[$i])) {
        $places[$i] = $res_places[$i];
    }
    unset($_SESSION['places'][$i]);
    foreach ($places[$i] as $place) {
        $_SESSION['places'][$i][] = [
            'place_id'=>$place['place_id'],
            'place_name'=>$place['place_name'],
            'zone_id'=>$place['zone_id'],
            'category_price'=>$place['category_price'],
            'zone_name'=>$place['zone_name'],
            'place_status'=>$place['place_status']
        ];
    }
}
// Order

if (!empty($_POST)) {


    // оформляем заказ
    unset($_SESSION['errors']['error_order']);
    // добавляем заказ в таблицу Orders
    $sql_send_order = "INSERT INTO orders SET user_id='" . $_SESSION['is_auth'] . "'";
    $query_send_order = mysqli_query($connect, $sql_send_order);
    $last_id = mysqli_insert_id($connect);
    // обновляем статус мест
    foreach ($_POST as $zone) {
        foreach ($zone as $place) {
            $sql_update_place_status = "UPDATE places SET place_status='0' WHERE place_id='" . $place . "'";
            $query_update_place_status = mysqli_query($connect, $sql_update_place_status);
            // добавляем детали
            $sql_send_order_details = "INSERT INTO order_details SET order_id='" . $last_id . "', place_id='" . $place . "'";
            $query_send_order_details = mysqli_query($connect, $sql_send_order_details);
        }
    }
    header('Location: /', true, 301);
    exit();

    }



getView('home');