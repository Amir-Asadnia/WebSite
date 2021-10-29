<?php include_once 'page/header.php'?>

<?php
checkUserToSite();
signUserToSite();
checkLogToSite();
checkLogToDashbordforuser();
?>
<div class="imgbox">
        <div class="fathersighn">
            <div class="leftbox">
               <div class="inputLOG">
                   <?php if (isset($_GET['log'])){ ?>
                       <div class="alertinfolog">
                           نام کاربری یا رمز عبور اشتباه است!
                       </div>
                   <?php } ?>
                   <form method="post">
                <input type="text" placeholder="نام کاربری" name="username"><br>
                    <input type="password" placeholder="پسورد" name="password"><br>
                     <button type="submit" name="btnlog">ورود به سایت</button>
                   </form>
                    </div>
            </div>
            <div class="rightbox">
               <div class="iconn">
               <i class="fa fa-user-plus"></i>
               </div>
                <div class="inputbox">
                    <?php if (isset($_GET['SignIn'])){ ?>
                    <div class="alertsuccess">
                        ثبت نام شما با موفقیت انجام شد
                    </div>
                    <?php } ?>

                    <?php if (isset($_GET['account'])){ ?>
                    <div class="alertdanger">
                        <b>ایمیل</b> یا <b>نام کاربری</b> از قبل ثبت نام شده!
                    </div>
                    <?php } ?>

                    <?php if (isset($_GET['input'])){ ?>
                        <div class="alertwarning">
                            لطفا فیلد ها را کامل پر کنید!
                        </div>
                    <?php } ?>
                    <form method="post">
                    <input type="text" placeholder="نام و نام خانوادگی" name="name"><br>
                    <input type="text" placeholder="نام کاربری" name="username"><br>
                    <input type="text" placeholder="ایمیل" name="email"><br>
                    <input type="password" placeholder="پسورد" name="password"><br>
                    <button class="btnsighn" name="btnsign">ثبت نام</button><br>
                    <a href="index.php">قبلا ثبت نام کردید؟وارد شوید</a>
                    </form>
                    <div class="icon">
                    <a href="#" class="fa fa-telegram"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-google"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once './page/footer.php'?>