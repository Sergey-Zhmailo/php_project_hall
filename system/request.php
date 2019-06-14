<?php

function getView($name, $data = '') {
    return require_once $_SERVER['DOCUMENT_ROOT'] . "/views/" . $name . ".php";
}
function getHeader($data = '') {
    return require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/header.php";
}
function getFooter($data = '') {
    return require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/footer.php";
}
function myLink($name, $id = '') {
    if (!empty($id)) {
        return 'index.php?route=' . $name . '&' . $name . '_id=' . $id;
    } else {
        return 'index.php?route=' . $name;
    }
}
// Validation class
class SendForm {
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function validationName($name) {
        $name = trim($name);
        $arr_user_name = explode(' ', $name);
        if (empty($name)) {
            $_SESSION['errors']['error_user_name'] = 'Поле Имя не заполнено!';
            unset($_SESSION['valid_user_name']);
            return false;
        } elseif (count($arr_user_name) > 1) {
            $_SESSION['errors']['error_user_name'] = 'Имя должно содержать одно слово!';
            unset($_SESSION['valid_user_name']);
            return false;
        } elseif (mb_strlen($name, 'utf-8') < 4) {
            $_SESSION['errors']['error_user_name'] = 'Имя должно содержать минимум 4 символа!';
            unset($_SESSION['valid_user_name']);
            return false;
        } elseif (mb_strlen($name, 'utf-8') > 15) {
            $_SESSION['errors']['error_user_name'] = 'Имя должно содержать не больше 15 символов!';
            unset($_SESSION['valid_user_name']);
            return false;
        } else {
            $_SESSION['valid_user_name'] = $name;
            unset($_SESSION['errors']['error_user_name']);
            $arr_user_name = [];
            return true;
        }

    }
    public function validationEmail($email) {
        $email = strtolower(trim($email));
        $arr_user_email = explode('@', $email);
        if (empty($email)) {
            $_SESSION['errors']['error_user_email'] = 'Поле Email не заполнено!';
            unset($_SESSION['valid_user_email']);
            return false;
        } elseif (count(explode(' ', $email)) > 1) {
            $_SESSION['errors']['error_user_email'] = 'Email не должен содержать пробелов!';
            unset($_SESSION['valid_user_email']);
            $arr_user_email = [];
            return false;
        } elseif (count($arr_user_email) == 1) {
            $_SESSION['errors']['error_user_email'] = 'Email должен содержать @!';
            unset($_SESSION['valid_user_email']);
            $arr_user_email = [];
            return false;
        } elseif (count($arr_user_email) > 2) {
            $_SESSION['errors']['error_user_email'] = 'Email должен содержать один @!';
            unset($_SESSION['valid_user_email']);
            $arr_user_email = [];
            return false;
        } else {
            $_SESSION['valid_user_email'] = $email;
            unset($_SESSION['errors']['error_user_email']);
            return true;
        }
    }
    public function checkNameInDB($name) {
        $name = trim($name);
        $sql_check_name_exist = "SELECT user_name FROM users WHERE user_name = ?";
        $stmt = $this->connect->prepare($sql_check_name_exist);
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $result_name = $stmt->get_result();
        $rows_name = $result_name->num_rows;
        $result_name->free();
        $stmt->close();
        if ($rows_name) {
            $_SESSION['errors']['error_user_name'] = 'Имя занято!';
            unset($_SESSION['valid_user_name']);
            $rows_name ='';
            return false;
        } else {
            $_SESSION['valid_user_name'] = $name;
            unset($_SESSION['errors']['error_user_name']);
            $arr_user_name = [];
            return true;
        }
    }
    public function checkEmailInDB($email) {
        $email = strtolower(trim($email));
        $sql_check_email_exist = "SELECT user_email FROM users WHERE user_email = ?";
        $stmt = $this->connect->prepare($sql_check_email_exist);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result_email = $stmt->get_result();
        $rows_email = $result_email->num_rows;
        $result_email->free();
        $stmt->close();
        if ($rows_email) {
            $_SESSION['errors']['error_user_email'] = 'Такой Email уже зарегистрирован!';
            unset($_SESSION['valid_user_email']);
            $rows_email ='';
            return false;
        } else {
            $_SESSION['valid_user_email'] = $email;
            unset($_SESSION['errors']['error_user_email']);
            return true;
        }
    }
    public function validationPassword($password, $password_repeat) {
        $password = trim($password);
        $password_repeat = trim($password_repeat);
        $arr_user_password = explode(' ', $password);
        if (empty($password)) {
            $_SESSION['errors']['error_user_password'] = 'Поле Пароль не заполнено!';
            unset($_SESSION['valid_user_password']);
            return false;
        } elseif (count($arr_user_password) > 1) {
            $_SESSION['errors']['error_user_password'] = 'Пароль не должен содержать пробелы!';
            unset($_SESSION['valid_user_password']);
            $arr_user_password = [];
            return false;
        } elseif (mb_strlen($password, 'utf-8') < 6) {
            $_SESSION['errors']['error_user_password'] = 'Пароль должен содержать минимум 6 символов!';
            unset($_SESSION['valid_user_password']);
            return false;
        } elseif (mb_strlen($password, 'utf-8') > 15) {
            $_SESSION['errors']['error_user_password'] = 'Имя должно содержать не больше 15 символов!';
            unset($_SESSION['valid_user_password']);
            return false;
        } elseif ($password_repeat != $password) {
            $_SESSION['errors']['error_user_password_repeat'] = 'Пароль не совпадает!';
            unset($_SESSION['valid_user_password']);
            return false;
        } else {
            $_SESSION['valid_user_password'] = password_hash($password, PASSWORD_DEFAULT);
            unset($_SESSION['errors']['error_user_password']);
            unset($_SESSION['errors']['error_user_password_repeat']);
            return true;
        }
    }
    public function validationNumbers($number) {
        if (empty($number)) {
            $_SESSION['errors']['error_number'] = 'Поле не заполнено!';
            unset($_SESSION['valid_number']);
            return false;
        } elseif (!is_numeric($number)) {
            $_SESSION['errors']['error_number'] = 'Укажите число!';
            unset($_SESSION['valid_number']);
            return false;
        } else {
            $_SESSION['valid_number'] = $number;
            unset($_SESSION['errors']['error_number']);
            return true;
        }
    }
    public function clearData() {
        unset($_SESSION['valid_user_name']);
        unset($_SESSION['valid_user_email']);
        unset($_SESSION['valid_user_password']);
        unset($_SESSION['valid_number']);
        unset($_SESSION['errors']);
    }
}
// Auth class
class Auth {
    public function isAuth($auth_state) {
        if ($auth_state) {
            header('Location: /', true, 301);
            exit();
        }
    }
}
// Place class
class Place {
    public function createPlaces($arr) {
        for ($i = 1; $i <= count($arr); $i++) {
            ?>
            <label class="place">
                <input type="checkbox"
                       value="<?php echo $arr[$i - 1]['place_id']; ?>"
                       name="<?php echo $arr[$i]['zone_id'] ?>[]"
                       class="place-checkbox"
                       data-place-id="<?php echo $arr[$i - 1]['place_id']; ?>"
                       <?php echo $arr[$i - 1]['place_status'] ? '' : 'disabled' ?>
                >
                <span class="checkmark"><?php echo $i; ?></span>
                <div class="place-data">
                    <span>Место: <?php echo $i; ?></span>
                    <span>Сектор: <?php echo $arr[$i - 1]['zone_name']; ?></span>
                    <span>Цена: <?php echo $arr[$i - 1]['category_price']; ?> грн.</span>
                </div>
            </label>
            <?php
        }
    }

}