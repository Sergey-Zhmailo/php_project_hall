<?php
getHeader();
?>
<div class="row center-align">
    <h4>Мой аккаунт</h4>
</div>
<div class="row">
    <div class="col s4">
        <h5>Мои данные</h5>
        <p>Имя: <?php echo $_SESSION['is_auth_name'] ?></p>
        <p>Email: <?php echo $_SESSION['is_auth_email'] ?></p>
    </div>
    <div class="col s8">
        <h5>Мои заказы</h5>
        <div class="orders-list-wrapper">
            <?php
            foreach ($_SESSION['client_orders_list_quantity_details'] as $order) {
                ?>
                <div class="card order-item hoverable">
                    <div class="row">
                        <form method="post">
                            <div class="col s2">
                                <span>№: <?php echo $order['order_id'] ?></span>
                            </div>
                            <div class="col s4">
                                <span>Всего билетов: <?php echo $order["places_count"] ?></span>
                            </div>
                            <div class="col s4">
                                <span>Места: </span>
                                <?php
                                foreach ($order["client_places_numbers"] as $place) {
                                    echo '<span><input type="text" name="delete_client_order_places[]" value="' . $place["place_id"] . '">' . $place["place_name"] . ' -' . $place["zone_name"] . '</span> ';
                                }
                                ?>
                            </div>
                            <div class="col s2 actions">

                                <button name="delete_client_order" value="<?php echo $order["order_id"] ?>"><i class="material-icons light-blue-text text-darken-4">delete</i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>


<?php

getFooter();
?>