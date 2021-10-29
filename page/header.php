<?php include_once 'admin/include/init.php'?>
<?php
checkLogToSite();
$showcategory = showcategory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" type="image/png" href="./image/br2.png"/>
    <title><?php if (isset($_GET['id'])){ echo findpostname($_GET['id']);
    }else{ echo 'وب سایت آموزش تاپ'; } ?></title>

</head> <!-- strat body-->
<body>
<div class="header"> <!-- start header-->
    <a class="home" href="index.php">خانه</a>
    <?php if (showcategory()){
        foreach ($showcategory as $value) { ?>
    <a href="category.php<?php echo '?category='.$value['id']; ?>"><?php echo $value['name']; ?></a>
    <?php } } ?>
    <a href="#">تماس با ما</a>
    <a href="#">درباره ی ما</a>
    <?php if (isset($_SESSION['username'])){ ?>
    <a href="exitsite.php" class="btnuser">خروج</a>

    <?php }elseif (isset($_SESSION['usernameadmin'])){ ?>
    <a href="admin/exitdashbord.php" class="btnuser">خروج</a>

    <?php }else{ ?>
    <a href="user.php" class="btnuser">ورود | عضویت</a>

    <?php } ?>
    <?php if (isset($_SESSION['usernameadmin'])){ ?>
    <a href="admin/showcomment.php" class="btnuser">ورود به بخش مدیریت</a>
    <?php } ?>
</div> <!-- end header-->
