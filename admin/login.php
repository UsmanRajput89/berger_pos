<?php 
include "../includes/contants.php";

session_start(); 

include "../process/db_con.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $username = validate($_POST['username']);

    $pass = validate($_POST['password']);

    if (empty($username)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM admins WHERE username='$username' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $username && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['username'] = $row['username'];

                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];

                $_SESSION['id'] = $row['id'];

                header('Location: '.URL.'index.php');

                exit();

            }else{

                header('Location: '.URL.'login.php?error=Incorect User name or password');

                exit();

            }

        }else{

            header('Location: '.URL.'login.php?error=Incorect User name or password');

            exit();

        }

    }

}else{

    header('Location: '.URL.'index.php');

    exit();

}
