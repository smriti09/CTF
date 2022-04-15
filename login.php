<?php

    if( isset($_POST['User'], $_POST['Password'])){
        $users = json_decode(file_get_contents('../data/Users.json'), associative: True);
        if(isset($users['User'])){
            if ($_POST['User']['Password'] === md5($_POST['Password'])){
                setcookie('token', $users[$_POST['User']]['cookie'], time()+4000, '/');
                header('Location: /dashboard.php');
                exit();
            }
        }
    }
    die("Invalid login credentials")

?>

<html>
    <head>
        <style>
            h1{
                text-align: center;
            }
            div.login_box{
                width: 500px;
                margin: auto;
                text-align: center;
            }

        </style>
    </head>

    <h1>
        Login Page
    </h1>

    <body>
        <div class="login_box">
            <input name="User">
            <input type="password" name="Password">
            <div><input name="submit" value="login"></div>
        </div>
    </body>
</html>
