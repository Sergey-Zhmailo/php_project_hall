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
    </div>
</div>


<?php

getFooter();
?>