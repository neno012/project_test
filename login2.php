<?php
    include "db=connection.php";
    // variable pendefinisian kredensial
    $usernameadmin = 'admin';
    $passwordadmin = 'admin';

    // // memulai session
    // session_start();

    // mengambil isian dari form login
    $username = $_POST['username'];
    $password =($_POST['password']);

    $query = "SELECT * FROM guru where (username='$username' AND password='$password')";
    $login = mysqli_query($con,$query);
    $cek = mysqli_fetch_array($login);
    //pengecekan kredensial login
    if ($cek > 0) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("Location: index.php");
    }elseif($username=$usernameadmin && $password=$passwordadmin){
        session_start();
        $_SESSION['username'] = $usernameadmin;
        $_SESSION['status'] = "login";
        header("Location: index.php");

    } 
    else {
        header("Location: login.php");
   }

 ?>