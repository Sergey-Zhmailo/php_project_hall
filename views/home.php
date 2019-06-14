<?php
getHeader();
$places = new Place;
?>
<div class="row">
    <form method="post">
    <div class="col s1 card-panel grey lighten-2">
        <p>filter</p>
    </div>
    <div class="col s8 hall-scheme">

            <div class="row m-auto">
                <div class="col s2">
                    <div class="card-panel grey lighten-2">
                        <span class="zone-title">Балкон 1</span>
                        <?php
                        $places->createPlaces($_SESSION['places'][4]);
                        ?>
                    </div>

                </div>
                <div class="col s8">
                    <div class="row">
                        <div class="col s12">
                            <div class="card-panel grey lighten-2">
                                <span class="zone-title">Партер 1</span>
                                <?php
                                $places->createPlaces($_SESSION['places'][1]);
                                ?>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="card-panel grey lighten-2">
                                <span class="zone-title">Партер 2</span>
                                <?php
                                $places->createPlaces($_SESSION['places'][2]);
                                ?>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="card-panel grey lighten-2">
                                <span class="zone-title">Партер 3</span>
                                <?php
                                $places->createPlaces($_SESSION['places'][3]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s2">
                    <div class="card-panel grey lighten-2">
                        <span class="zone-title">Балкон 2</span>
                        <?php
                        $places->createPlaces($_SESSION['places'][5]);
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel grey lighten-2">
                        <span class="zone-title">Балкон 3</span>
                        <?php
                        $places->createPlaces($_SESSION['places'][6]);
                        ?>
                    </div>
                </div>
            </div>

    </div>
    <div class="col s3 card-panel grey lighten-2" id="cart-info">
        <div class="row">
            <div class="col s12 center-align light-blue darken-4 cart-title">Корзина</div>
        </div>
        <div id="cart-order"></div>
        <div class="row" id="cart-actions">
            <div class="col s12">
                <span id="cart-quantity">Выбрано билетов: 0</span>
                <span id="cart-amount">Сумма: 0 грн.</span>
                <button class="btn waves-effect waves-light light-blue darken-4">Забронировать</button>
            </div>
        </div>
    </div>
    </form>
    <div class="errors-wrapper <?php echo !$_SESSION['errors'] ? 'hidden' : '' ?>">
        <span><?php echo $_SESSION['errors']['error_order'] ?></span>
    </div>
</div>



        <a href="<?php echo myLink('login') ?>" class="btn">Login</a>
        <a href="<?php echo myLink('register') ?>" class="btn">Register</a>

<?php
getFooter();
