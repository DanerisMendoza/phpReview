<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        setcookie("name",$name, time()+(86400*30), "/");
        setcookie("gender",$gender, time()+(86400*30), "/");
    }
    if(isset($_POST['unsetCookie'])){
        setcookie("name", "", time()-3600, "/");
        setcookie("gender", "", time()-3600, "/");
    }
?>
<!DOCTYPE html>
<html>
    <body>
        <form method="post">
            <input type="text" placeholder="name" name="name">
            <input type="text" placeholder="gender" name="gender">
            <button type="submit" name="submit">submit</button>
        </form>
        <form method="post"><button type="unsetCookie" name="unsetCookie">unsetCookie</button></form>
    </body>
</html>
<?php

// if(!isset($_COOKIE['$_COOKIE_name']) || !isset($_COOKIE['$_COOKIE_gender'])){
// $_COOKIE_name = "john";
// $_COOKIE_gender = "male";
// setcookie($_COOKIE_name,$_COOKIE_gender, time()+(86400*30), "/");
// // 86400 = 1 day
// }
echo $_COOKIE['name'];
echo "</br>";
echo $_COOKIE['gender'];
?>
<!-- 
    Note: The setcookie() function must appear BEFORE the &lt;html&gt; tag.
    Note: The value of the cookie is automatically URLencoded when sending the
    cookie, and automatically decoded when received (to prevent URLencoding,
    use setrawcookie() instead).
 -->