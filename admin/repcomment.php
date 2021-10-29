<?php include_once 'page/header.php' ?>
<?php
checkLogToDashbord();
if (isset($_GET['reply'])){
    $selectrepcomment = selectrepcomment($_GET['reply']);
}

repcomment();
?>
<?php if (isset($_SESSION['usernameadmin'])) {

    } else {
    header('location:index.php?ebteda=vorod');
}
?>
    <div class="boxfather">
        <?php include_once 'page/sidebar.php' ?>
        <div class="container custom_container_reply">
            <div class="row">
            <div class="col-sm-10 leftbox rounded-sm">
                <div class="alert alert-primary text-center mt-4">
                    فرم ارسال پاسخ به نظر
                </div>

                <form method="post">

                    <div class="input-group mb-3" dir="ltr">
                        <input dir="rtl" type="text" class="form-control" aria-describedby="bc-addon" value="<?php echo $selectrepcomment['email']; ?>" readonly>
                        <div class="input-group-append">
                            <span class="input-group-text" id="bc-addon">: ایمیل کاربر</span>
                        </div>
                    </div>

                    <div class="input-group mb-3" dir="ltr">
                        <input dir="rtl" type="text" class="form-control" aria-describedby="bc-addon" value="<?php echo $selectrepcomment['comment']; ?>" readonly>
                        <div class="input-group-append">
                            <span class="input-group-text" id="bc-addon">: متن نظر</span>
                        </div>
                    </div>

                    <div class="input-group mb-3" dir="ltr">
                        <input dir="rtl" type="text" class="form-control" aria-describedby="bc-addon" name="postid" value="<?php echo $selectrepcomment['postid']; //findpostname(); ?>" readonly>
                        <div class="input-group-append">
                            <span class="input-group-text" id="bc-addon">: آیدی پست</span>
                        </div>
                    </div>

                    <div class="input-group mb-3" dir="ltr">
                        <input dir="rtl" type="text" class="form-control" aria-describedby="bc-addon" name="reply" value="<?php echo $selectrepcomment['id']; ?>" readonly>
                        <div class="input-group-append">
                            <span class="input-group-text" id="bc-addon">: آیدی نظر</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" rows="4" name="comment"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success btn-block mb-4" name="btnrepcomment">ارسال پاسخ</button>
                </form>
            </div>
            </div>
        </div>

    </div>
<?php include_once 'page/footer.php' ?>