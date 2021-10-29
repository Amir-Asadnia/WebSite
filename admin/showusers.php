<?php include_once 'page/header.php' ?>
<?php
checkLogToDashbord();
$showusers = showusers();
deleteuser();
?>

<?php if (isset($_SESSION['usernameadmin'])) {

    } else {
    header('location:index.php?ebteda=vorod');
}
?>
    <div class="boxfather">
        <?php include_once 'page/sidebar.php' ?>
        <div class="container-fluid pt-3">
            <div style="padding: 4px 15px" class="leftbox rounded-sm">
                <div class="alert alert-secondary text-center mt-4">
                    لیست کاربران سایت
                </div>
                <?php if (isset($_GET['deleteusers'])){ ?>
                <div class="alert alert-success text-center">
                    حذف کاربر با موفقیت انجام شد
                </div>
                <?php } ?>

                <?php if (isset($_GET['edituse'])){ ?>
                <div class="alert alert-success text-center">
                    مشخصات کاربر با موفقیت ویرایش شد
                </div>
                <?php } ?>

                <table class="table table-striped table-dark table-hover text-center rounded-sm">
                    <thead>
                    <tr>
                        <th>آیدی</th>
                        <th>نام</th>
                        <th>نام کاربری</th>
                        <th>ایمیل</th>
                        <th>حذف ردیف</th>
                        <th>ویرایش ردیف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($showusers){
                        foreach ($showusers as $value){ ?>
                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->username; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><a href=" <?php echo 'showusers.php?deleteuser='.$value->id; ?> " class="btn btn-outline-danger">حذف</a></td>
                        <td><a href=" <?php echo 'edituser.php?edituser='.$value->id; ?> " class="btn btn-outline-warning">ویرایش</a></td>
                    </tr>
                    <?php } } ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>

    </div>
<?php include_once 'page/footer.php' ?>