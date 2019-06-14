<?php
$auth->isAuth($_SESSION['is_auth']);
$registerForm = new SendForm($connect);
if (!empty($_POST)) {
    $valid_name = $registerForm->validationName($_POST['user_name']);
    if ($valid_name) {
        $valid_name = $registerForm->checkNameInDB($_POST['user_name']);
    }
    $valid_email = $registerForm->validationEmail($_POST['user_email']);
    if ($valid_email) {
        $valid_email = $registerForm->checkEmailInDB($_POST['user_email']);
    }

    $valid_password = $registerForm->validationPassword($_POST['user_password'], $_POST['user_password_repeat']);
    if ($valid_name && $valid_email && $valid_password) {
        // DB QUERY REGISTER
        $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES (?,?,?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param('sss', $_SESSION['valid_user_name'], $_SESSION['valid_user_email'], $_SESSION['valid_user_password']);
        if ($stmt->execute()) {
            $registered_user_id = $connect->query("SELECT user_id FROM users WHERE user_name = '" . $_SESSION['valid_user_name'] . "'")->fetch_assoc();
            $_SESSION['is_auth'] = $registered_user_id['user_id'];
            $_SESSION['is_auth_name'] = $_SESSION['valid_user_name'];
            $registerForm->clearData();
            $stmt->close();
            $connect->close();
            header('Location: /', true, 301);
            exit();
        } else {
            $_SESSION['errors']['error_connection'] = 'Ошибка соединения с базой!';
            $stmt->close();
            $connect->close();
        }
    }
}

getView('register');


