<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$connect = new mysqli(HOST, USER, PASSWORD, DATABASE);
$sql_get_place_data = "SELECT * FROM places INNER JOIN categories using(category_id) JOIN zones using (zone_id) WHERE place_id='" . $_POST['place_id'] . "'";
$query_get_place_data = mysqli_query($connect, $sql_get_place_data);
while ($res_places_data = mysqli_fetch_assoc($query_get_place_data)) {
    $places_data = $res_places_data;
}
foreach ($places_data as $place) {
    $places_export = $place;
}
echo json_encode($places_data);