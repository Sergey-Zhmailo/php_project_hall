<?php
$auth->isAuth($_SESSION['is_auth']);
$loginForm = new SendForm($connect);
if (!empty($_POST)) {
    $valid_email = $loginForm->validationEmail($_POST['user_email']);
    $valid_password = $loginForm->validationPassword($_POST['user_password'], $_POST['user_password']);
}
if ($valid_email && $valid_password) {
    //DB QUERY LOGIN
    $sql = "SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param('s', $_SESSION['valid_user_email']);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($data = $result->fetch_assoc()) {
        $users = $data;
    }
    $result->free();
    $stmt->close();
    $connect->close();
    // PASSWORD CHECK
    if ($users && password_verify($_POST['user_password'], $users['user_password'])) {
        $_SESSION['is_auth'] = $users['user_id'];
        $_SESSION['is_auth_name'] = $users['user_name'];
        $_SESSION['is_auth_email'] = $users['user_email'];
        $loginForm->clearData();
        header('Location: /', true, 301);
        exit();
    } else {
        $_SESSION['errors']['error_user_email'] = 'Email или пароль не найдены в базе!';
        unset($_SESSION['valid_user_email']);
        unset($_SESSION['valid_user_password']);
    }
}

getView('login');