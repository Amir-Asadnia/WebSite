<?php include_once 'page/header.php' ?>
<?php
checkLogToDashbord();
$showpost = showpost();
if (isset($_GET['deletepost'])){
    $selectpost = selectpostforupdate($_GET['deletepost']);
    $delete = deletepost($_GET['deletepost']);
    if ($delete){
        $picpost = './image/' . $selectpost['picture'];
        unlink($picpost);
    }
}
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
                    پست های سایت
                </div>

                <?php if (isset($_GET['delpost'])){ ?>
                <div class="alert alert-success text-center mr-3 ml-3">
                    پست مورد نظر حذف شد!
                </div>
                <?php } ?>

                <?php if (isset($_GET['editedpost'])){ ?>
                    <div class="alert alert-success text-center mr-3 ml-3">
                        ویرایش پست ثبت شد
                    </div>
                <?php } ?>

                <?php if (isset($_GET['editp'])){ ?>
                    <div class="alert alert-warning text-center mr-3 ml-3">
                         تغییری در پست اعمال نشد! لطفا ورودی ها را کامل پر کنید!!!
                    </div>
                <?php } ?>

                <?php if ($showpost == false){ ?>
                    <div class="alert alert-danger text-center mr-3 ml-3">
                        پستی برای نمایش وجود ندارد!
                    </div>
                <?php } ?>

                <table class="table table-striped table-dark table-hover text-center rounded-sm">
                    <thead>

                    <tr>
                        <th>آیدی</th>
                        <th>عنوان</th>
                        <th>نام دسته</th>
<!--                        <th>نویسنده</th>-->
                        <th>تاریخ</th>
                        <th>عکس</th>
                        <th>حذف ردیف</th>
                        <th>ویرایش ردیف</th>
                    </tr>

                    </thead>
                    <tbody>

                    <?php if ($showpost){
                    foreach ($showpost as $value){?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['title']; ?></td>
                        <td><?php echo selectcategoryname($value['category']); ?></td>
<!--                        <td>--><?php //echo $value['author']; ?><!--</td>-->
                        <td><?php echo timetofarsi($value['time']); ?></td>
                        <td><img src="./image/<?php echo $value['picture']; ?>" width="70px" height="40px"></td>
                        <td><a href="<?php echo 'showpost.php?deletepost='.$value['id']; ?>" class="btn btn-outline-danger">حذف</a></td>
                        <td><a href="<?php echo 'editpost.php?editpost='.$value['id']; ?>" class="btn btn-outline-warning">ویرایش</a></td>
                    </tr>
                    <?php } } ?>

                    </tbody>
                </table>

                <div class="text-center" dir="ltr">
                    <?php if ($count > 1){
                        for ($z = 1; $z <= $count; $z++){ ?>
                            <!--echo '<a href="showpost.php?pagein=' .$z. '" class="btn btn-dark mr-2">' .$z. '</a>' ;-->
                            <a href="showpost.php?pagein=<?php echo $z;?>" class="btn btn-outline-primary mr-2 <?php if (isset($_GET['pagein'])){ if ($z == $_GET['pagein']){ echo 'active';} }elseif($z==1){ echo 'active';}?>"><?php echo $z; ?></a>
                        <?php } } ?>

                </div>

            </div>
            </div>
        </div>

    </div>
<?php include_once 'page/footer.php' ?>