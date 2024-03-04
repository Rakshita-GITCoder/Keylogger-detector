<?php
    $Name = $_POST['Name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        die('Connerction Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(Name, username, password)
        values(?, ?, ?)");
        $stmt->bind_param("sss",$Name, $username, $password);
        $stmt->execute();
        echo "registration Successfully...";
        $stmt->close();
        $conn->close();
    }
    header('Location:login.php');
?>