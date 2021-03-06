<?php
include("connection.php");
$url_home = "../home.php";
$url = "../login.php";

if (isset($_POST["accountname"]) && isset($_POST["password"]) && isset($_POST["type"])) {

    $accountname = $_POST["accountname"];
    $password = $_POST["password"];
    $type = $_POST["type"];

    if ($type == "company")
        $sql = "SELECT * FROM `users` WHERE `accountname` = '$accountname'";
    else $sql = "SELECT * FROM `specialists` WHERE `accountname` = '$accountname'";

    try {
        $result = $pdo->prepare($sql);
        $result->execute();
        $rows = $result->rowCount();

        if ($rows > 0) {

            $res = $result->fetch(PDO::FETCH_OBJ);
            $password_hash = $res->password;

            if(password_verify($password, $password_hash)) {
                session_start();

                //专家账号登录模式
                if ($type == "specialist")
                    $_SESSION['mode'] = "expert";

                $_SESSION['user'] = $res->accountname;
                $_SESSION['userid'] = $res->id;
                $_SESSION['expiretime'] = time() + 6000; // 刷新时间戳，1小时40分钟
                echo "<script>alert('登录成功！')</script>";
                echo "<meta http-equiv=\"refresh\" content=\"0;url=$url_home\">";
            }
            else {
                echo "<script>alert('用户名或密码错误，请重新输入！')</script>";
                echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
            }

        } else {
            echo "<script>alert('用户名或密码错误，请重新输入！')</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
        }

    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script>alert('请输入用户名或密码！')</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
}
?>