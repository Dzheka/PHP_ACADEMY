<?php
    //header('Location: /a.php');
    //exit;
    
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s').' GMT');
    header('Cache-Control: no-cache, must-revalidate');
    header('Cache-Control: post-check=0,pre-check=0', false);
    header('Cache-Control: max-age=0', false);
    header('Pragma: no-cache');
    
    print_r(getallheaders());
?>
=======================================================================================
<?php
    $counter = 0;
    if (isset($_COOKIE['counter'])) {
        $counter = $_COOKIE['counter'];
        $counter++;
    }
    setcookie('counter', $counter, time() + 3600);
    echo $counter;
?>
========================================================================================

<?php
    session_start();
    $counter = $_SESSION['counter']?? 0;
    $counter++;
    $_SESSION['counter'] = $counter;
    print_r($_COOKIE);
    //unset($_SESSION['counter']);
    echo $counter;
?>

=========================================================================================
<?php
    session_start();
    $error = false;
    if (isset($_POST['auth'])) {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = md5($_POST['password']);
        $error = true;
    }
    if (isset($_GET['f']) && $_GET['f'] == 'logout') {
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }
    $login = 'admin';
    $password = '202cb962ac59075b964b07152d234b70';
    $auth = false;
    $iss = isset($_SESSION['login']) && isset($_SESSION['password']);
    if ($iss && $_SESSION['login'] === $login && $_SESSION['password'] === $password) {
        $auth = true;
        $error = false;
    }
?>
<?php if ($error) { ?><p>Неверные логин и/или пароль!</p><?php } ?>
<?php if ($auth) { ?>
    <p>Здравствуйте, <?=$login?>!</p>
    <a href='index.php?f=logout'>Выход</a>
<?php } else { ?>
<form name="auth" method="post" action="index.php">
    <p>
        Логин: <input type="text" name="login" />
    </p>
    <p>
        Пароль: <input type="password" name="password" />
    </p>
    <p>
        <input type="submit" name="auth" value="Войти" />
    </p>
</form>
<?php } ?>
