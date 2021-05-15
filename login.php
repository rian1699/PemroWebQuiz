<?php
    session_start();
    include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
</head>
<body>
    <form method="post">
        <label>Username :</label>
        <input type="text" name="user_name"><br>
        <label>Password :</label>
        <input type="text" name="pass_word"><br>
        <button type="submit" name="loggingin">Login</button>
    </form>
    <?php
        if (isset($_POST['loggingin'])) {
            $username = $_POST['user_name'];
            $password = $_POST['pass_word'];
            echo $username;
            $qry = mysqli_query($connect, "SELECT * FROM tab_login WHERE username = '$username' AND password = '$password'");
            $cek = mysqli_num_rows($qry);
            if ($cek>0){
                $row = mysqli_fetch_assoc($qry);
                var_dump($row);
                $_SESSION['userweb']=$username;
                header ("location:admin.php");
                exit;
            }
        else {
            echo "Username dan password salah!";
        }
    }
    ?>
</body>
</html>
