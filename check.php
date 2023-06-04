<?php
    $name = filter_var(trim($_POST ['name']),
    FILTER_SANITIZE_STRING);
    $phone = filter_var(trim($_POST ['phone']),
    FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST ['email']),
    FILTER_SANITIZE_STRING);
    $msg = filter_var(trim($_POST ['msg']),
    FILTER_SANITIZE_STRING);
    if (mb_strlen($name) < 3 || mb_strlen($name) > 80){
        echo "Недопустимая длина имени";
        exit();
    } else if (mb_strlen($phone) < 9 || mb_strlen($phone) > 25){
        echo "Недопустимая длина номера";
        exit();
    } else if (mb_strlen($email) < 3 || mb_strlen($email) > 60){
        echo "Недопустимая длина почты";
        exit();
    } else if (mb_strlen($msg) < 3 || mb_strlen($msg) > 500){
        echo "Недопустимая длина сообщения";
        exit();
    }
        $mysql = new mysqli('localhost', 'f0819233_admin1', 'admin1', 'f0819233_base1');
        $mysql->query("INSERT INTO `applications` (`name`, `phone`, `email`, `msg`)
        VALUES('$name', '$phone', '$email', '$msg')");

        $mysql->close();

        header('Location: /');
?>    
