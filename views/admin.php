<?php
getHeader();
?>
<div class="row">
    <div class="col s6">
        <div class="row">
            <h5 class="center-align">Цены по категориям</h5>
            <form method="post">
                <div class="row">
                    <div class="col s3">
                        <label for="category_a_price">A</label>
                        <input type="number" name="category_a_price"
                               value="<?php echo !empty($_SESSION['category_a_price']) ? $_SESSION['category_a_price'] : ''; ?>"
                            <?php echo !empty($_SESSION['errors']['error_number']) ? 'class="error"' : '' ?>
                        >
                        <?php echo !empty($_SESSION['errors']['error_number']) ? '<span class="error">' . $_SESSION['errors']['error_number'] . '</span>' : '' ?>
                    </div>
                    <div class="col s3">
                        <label for="category_b_price">B</label>
                        <input type="number" name="category_b_price"
                               value="<?php echo !empty($_SESSION['category_b_price']) ? $_SESSION['category_b_price'] : ''; ?>"
                            <?php echo !empty($_SESSION['errors']['error_number']) ? 'class="error"' : '' ?>
                        >
                        <?php echo !empty($_SESSION['errors']['error_number']) ? '<span class="error">' . $_SESSION['errors']['error_number'] . '</span>' : '' ?>
                    </div>
                    <div class="col s3">
                        <label for="category_c_price">C</label>
                        <input type="number" name="category_c_price"
                               value="<?php echo !empty($_SESSION['category_c_price']) ? $_SESSION['category_c_price'] : ''; ?>"
                            <?php echo !empty($_SESSION['errors']['error_number']) ? 'class="error"' : '' ?>
                        >
                        <?php echo !empty($_SESSION['errors']['error_number']) ? '<span class="error">' . $_SESSION['errors']['error_number'] . '</span>' : '' ?>
                    </div>
                    <div class="col s3">
                        <label for="category_d_price">D</label>
                        <input type="number" name="category_d_price"
                               value="<?php echo !empty($_SESSION['category_d_price']) ? $_SESSION['category_d_price'] : ''; ?>"
                            <?php echo !empty($_SESSION['errors']['error_number']) ? 'class="error"' : '' ?>
                        >
                        <?php echo !empty($_SESSION['errors']['error_number']) ? '<span class="error">' . $_SESSION['errors']['error_number'] . '</span>' : '' ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button type="submit"
                                class="btn waves-effect waves-light light-blue darken-4"
                                name="submit_category_price"
                                value="submit_category_price"
                        >Сохранить</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <h5 class="center-align">Количество мест в зале по категориям</h5>
            <form method="post">
                <div class="row">
                    <div class="col s3">
                        <label for="zone_1_quantity">Партер 1</label>
                        <input type="number" name="zone_1_quantity"
                               value="<?php echo !empty($_SESSION['zone_1_quantity']) ? $_SESSION['zone_1_quantity'] : ''; ?>"
                            <?php echo !empty($_SESSION['errors']['error_number']) ? 'class="error"' : '' ?>
                        >
                        <?php echo !empty($_SESSION['errors']['error_number']) ? '<span class="error">' . $_SESSION['errors']['error_number'] . '</span>' : '' ?>
                    </div>
                    <div class="col s3">
                        <label for="category_zone_1">Категория</label>
                        <select name="category_zone_1">
                            <option value="1" <?php echo $_SESSION['zone_1_category'] == '1' ? 'selected' : ''; ?>>A</option>
                            <option value="2" <?php echo $_SESSION['zone_1_category'] == '2' ? 'selected' : ''; ?>>B</option>
                            <option value="3" <?php echo $_SESSION['zone_1_category'] == '3' ? 'selected' : ''; ?>>C</option>
                            <option value="4" <?php echo $_SESSION['zone_1_category'] == '4' ? 'selected' : ''; ?>>D</option>
                        </select>
                    </div>
                    <div class="col s3">
                        <label for="zone_2_quantity">Партер 2</label>
                        <input type="number" name="zone_2_quantity"
                               value="<?php echo !empty($_SESSION['zone_2_quantity']) ? $_SESSION['zone_2_quantity'] : ''; ?>"
                            <?php echo !empty($_SESSION['errors']['error_number']) ? 'class="error"' : '' ?>
                        >
                        <?php echo !empty($_SESSION['errors']['error_number']) ? '<span class="error">' . $_SESSION['errors']['error_number'] . '</span>' : '' ?>
                    </div>
                    <div class="col s3">
                        <label for="category_zone_2">Категория</label>
                        <select name="category_zone_2">
                            <option value="1" <?php echo $_SESSION['zone_2_category'] == '1' ? 'selected' : ''; ?>>A</option>
                            <option value="2" <?php echo $_SESSION['zone_2_category'] == '2' ? 'selected' : ''; ?>>B</option>
                            <option value="3" <?php echo $_SESSION['zone_2_category'] == '3' ? 'selected' : ''; ?>>C</option>
                            <option value="4" <?php echo $_SESSION['zone_2_category'] == '4' ? 'selected' : ''; ?>>D</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col s3">
                        <label for="zone_3_quantity">Партер 3</label>
                        <input type="number" name="zone_3_quantity"
                               value="<?php echo !empty($_SESSION['zone_3_quantity']) ? $_SESSION['zone_3_quantity'] : ''; ?>"
                            <?php echo !empty($_SESSION['errors']['error_number']) ? 'class="error"' : '' ?>
                        >
                        <?php echo !empty($_SESSION['errors']['error_number']) ? '<span class="error">' . $_SESSION['errors']['error_number'] . '</span>' : '' ?>
                    </div>
                    <div class="col s3">
                        <label for="category_zone_3">Категория</label>
                        <select name="category_zone_3">
                            <option value="1" <?php echo $_SESSION['zone_3_category'] == '1' ? 'selected' : ''; ?>>A</option>
                            <option value="2" <?php echo $_SESSION['zone_3_category'] == '2' ? 'selected' : ''; ?>>B</option>
                            <option value="3" <?php echo $_SESSION['zone_3_category'] == '3' ? 'selected' : ''; ?>>C</option>
                            <option value="4" <?php echo $_SESSION['zone_3_category'] == '4' ? 'selected' : ''; ?>>D</option>
                        </select>
                    </div>
                    <div class="col s3">
                        <label for="zone_4_quantity">Балкон 1</label>
                        <input type="number" name="zone_4_quantity"
                               value="<?php echo !empty($_SESSION['zone_4_quantity']) ? $_SESSION['zone_4_quantity'] : ''; ?>"
                            <?php echo !empty($_SESSION['errors']['error_number']) ? 'class="error"' : '' ?>
                        >
                        <?php echo !empty($_SESSION['errors']['error_number']) ? '<span class="error">' . $_SESSION['errors']['error_number'] . '</span>' : '' ?>
                    </div>
                    <div class="col s3">
                        <label for="category_zone_4">Категория</label>
                        <select name="category_zone_4">
                            <option value="1" <?php echo $_SESSION['zone_4_category'] == '1' ? 'selected' : ''; ?>>A</option>
                            <option value="2" <?php echo $_SESSION['zone_4_category'] == '2' ? 'selected' : ''; ?>>B</option>
                            <option value="3" <?php echo $_SESSION['zone_4_category'] == '3' ? 'selected' : ''; ?>>C</option>
                            <option value="4" <?php echo $_SESSION['zone_4_category'] == '4' ? 'selected' : ''; ?>>D</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col s3">
                        <label for="zone_5_quantity">Балкон 2</label>
                        <input type="number" name="zone_5_quantity"
                               value="<?php echo !empty($_SESSION['zone_5_quantity']) ? $_SESSION['zone_5_quantity'] : ''; ?>"
                            <?php echo !empty($_SESSION['errors']['error_number']) ? 'class="error"' : '' ?>
                        >
                        <?php echo !empty($_SESSION['errors']['error_number']) ? '<span class="error">' . $_SESSION['errors']['error_number'] . '</span>' : '' ?>
                    </div>
                    <div class="col s3">
                        <label for="category_zone_5">Категория</label>
                        <select name="category_zone_5">
                            <option value="1" <?php echo $_SESSION['zone_5_category'] == '1' ? 'selected' : ''; ?>>A</option>
                            <option value="2" <?php echo $_SESSION['zone_5_category'] == '2' ? 'selected' : ''; ?>>B</option>
                            <option value="3" <?php echo $_SESSION['zone_5_category'] == '3' ? 'selected' : ''; ?>>C</option>
                            <option value="4" <?php echo $_SESSION['zone_5_category'] == '4' ? 'selected' : ''; ?>>D</option>
                        </select>
                    </div>
                    <div class="col s3">
                        <label for="zone_6_quantity">Балкон 3</label>
                        <input type="number" name="zone_6_quantity"
                               value="<?php echo !empty($_SESSION['zone_6_quantity']) ? $_SESSION['zone_6_quantity'] : ''; ?>"
                            <?php echo !empty($_SESSION['errors']['error_number']) ? 'class="error"' : '' ?>
                        >
                        <?php echo !empty($_SESSION['errors']['error_number']) ? '<span class="error">' . $_SESSION['errors']['error_number'] . '</span>' : '' ?>
                    </div>
                    <div class="col s3">
                        <label for="category_zone_6">Категория</label>
                        <select name="category_zone_6">
                            <option value="1" <?php echo $_SESSION['zone_6_category'] == '1' ? 'selected' : ''; ?>>A</option>
                            <option value="2" <?php echo $_SESSION['zone_6_category'] == '2' ? 'selected' : ''; ?>>B</option>
                            <option value="3" <?php echo $_SESSION['zone_6_category'] == '3' ? 'selected' : ''; ?>>C</option>
                            <option value="4" <?php echo $_SESSION['zone_6_category'] == '4' ? 'selected' : ''; ?>>D</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button type="submit"
                                class="btn waves-effect waves-light light-blue darken-4"
                                name="submit_zones_quantity"
                                value="submit_zones_quantity"
                        >Сохранить количество</button>
                    </div>
                </div>
            </form>
            <form method="post">
                <div class="row">
                    <div class="col s12">
                        <button type="submit"
                                class="btn waves-effect waves-light light-blue darken-4"
                                name="set_places"
                                value="set_places"
                        >Создать места</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="col s6">
        <h5 class="center-align">Заказы</h5>
        <div class="orders-list-wrapper">
            <?php
            foreach ($_SESSION['orders_list_add_places_numbers'] as $order) {
                ?>
                <div class="card order-item hoverable">
                    <div class="row">
                        <form method="post">
                            <div class="col s2">
                                <span>№: <?php echo $order['order_id'] ?></span>
                            </div>
                            <div class="col s4">
                                <span>Имя: <?php echo $order['user_name'] ?></span>
                                <span>Всего билетов: <?php echo $order["places_count"] ?></span>
                            </div>
                            <div class="col s4">
                                <span>Места: </span>
                                <?php
                                foreach ($order["places_numbers"] as $place) {
                                    echo '<span><input type="text" name="delete_places[]" value="' . $place["place_id"] . '">' . $place["place_name"] . ' -' . $place["zone_name"] . '</span> ';
                                }
                                ?>
                            </div>
                            <div class="col s2 actions">

                                <button name="delete" value="<?php echo $order["order_id"] ?>"><i class="material-icons light-blue-text text-darken-4">delete</i></button>
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
