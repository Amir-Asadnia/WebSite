<?php include_once 'page/header.php'?>
<?php checkLogToDashbord(); ?>
<div class="boxfader">
<div class="ADDmininputLOG">
   <h3 style="text-align: center">فرم ورود مدیریت</h3><br>
    <?php if (isset($_GET['ebteda'])){ ?>

    <div class="alertwarning">
        ادمین گرامی لطفا ابتدا وارد شوید!
    </div>

    <?php } ?>

    <?php if (isset($_GET['info'])){ ?>

        <div class="alertinfolog">
            نام کاربری یا رمز عبور اشتباه است!
        </div>

    <?php } ?>
    <form method="post">
    <input type="text" placeholder="نام کاربری" name="username" value="amir"><br>
    <input type="password" placeholder="پسورد" name="password" value="1234"><br>
    <button type="submit" name="btnlog">ورود به داشبورد</button>
    </form>
</div>
</div>
<?php include_once 'page/footer.php'?>
