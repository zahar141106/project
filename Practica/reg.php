<?php
    require_once ('include/db.php');  
 $name = $_POST['name'];
 $login = $_POST['login'];
 $password = $_POST['password'];  
 $number = $_POST['number'];
  
if (empty($name) || empty($login) || empty($password) || empty($number)) {  

    echo "Заполните все поля";
}
 else {  
  
    $sql = "INSERT INTO `clients` (name, login, password, number) VALUES ('$name', '$login', '$password', '$number')";
  
    if ($conn -> query($sql) === TRUE) {  
        echo "Вы успешно вошли!";  
    } else {  
        echo "Ошибка:" . $conn->error;  
    }  
}

?>