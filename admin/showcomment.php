<?php include_once 'page/header.php' ?>
<?php
checkLogToDashbord();
$showcomment = showcomment();

if (isset($_GET['confirm'])) {
    confirmComment(0,$_GET['confirm']);
}elseif (isset($_GET['ignore'])){
    confirmComment(1,$_GET['ignore']);
}

if (isset($_GET['deletecomm'])){
    deletecomment($_GET['deletecomm']);
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
                    لیست نظرات کاربران
                </div>

                <?php if (isset($_GET['state'])){
                    if (!@$_GET['state']){ ?>
                <div class="alert alert-success text-center mr-3 ml-3">
                    نظر کاربر تایید شد
                </div>
                <?php } elseif (@$_GET['state']){ ?>
                    <div class="alert alert-danger text-center mr-3 ml-3">
                        نظر کاربر رد شد
                    </div>
                <?php } } ?>

                <?php if (isset($_GET['repsuccess'])){ ?>
                    <div class="alert alert-success text-center mr-3 ml-3">
                        پاسخ شما برای نظر کاربر ثبت شد
                    </div>
                <?php } ?>

                <?php if (isset($_GET['deletecomment'])){ ?>
                    <div class="alert alert-success text-center mr-3 ml-3">
                        حذف نظر با موفقیت انجام شد
                    </div>
                <?php } ?>

                <?php if (isset($_GET['editcomment'])){ ?>
                    <div class="alert alert-success text-center mr-3 ml-3">
                        ویرایش نظر ثبت شد
                    </div>
                <?php } ?>

                <?php /*if (isset($_GET['editp'])){ */?>
                    <!--<div class="alert alert-warning text-center mr-3 ml-3">
                         تغییری در پست اعمال نشد! لطفا ورودی ها را کامل پر کنید!!!
                    </div>-->
                <?php /*} */?>

                <?php /*if ($showpost == false){ */?>
                    <!--<div class="alert alert-danger text-center mr-3 ml-3">
                        پستی برای نمایش وجود ندارد!
                    </div>-->
                <?php /*} */?>

                <table class="table table-dark table-hover text-center rounded-sm">
                    <thead>

                    <tr>
                        <th>آیدی</th>
                        <th>پست</th>
                        <th>نام</th>
<!--                        <th>ایمیل</th>-->
                        <th>کامنت</th>
                        <th>وضعیت</th>
                        <th>پاسخ</th>
                        <th>تاریخ</th>
                        <th>حذف ردیف</th>
                        <th>ویرایش ردیف</th>
                    </tr>

                    </thead>
                    <tbody>

                    <?php if ($showcomment){
                    foreach ($showcomment as $value){?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php $cn = findpostname($value['postid']);
                            echo mb_substr($cn,'0','20').'...'; ?></td>
                        <td><?php echo $value['name']; ?></td>
<!--                        <td>--><?php //echo $value['email']; ?><!--</td>-->
                        <td><?php $cm = $value['comment'];
                            echo mb_substr($cm,'0','20').'...'; ?></td>
                        <td>
                            <?php if (!isset($_GET['pageincomm'])){
                                $_GET['pageincomm'] = '1';
                            if ($value['status'] == 0){ ?>
                                <a href="<?php echo 'showcomment.php?confirm='.$value['id'].'&pageincomm='.$_GET['pageincomm']; ?>" class="btn btn-outline-success">تایید</a>
                            <?php }else{ ?>
                                <a href="<?php echo 'showcomment.php?ignore='.$value['id'].'&pageincomm='.$_GET['pageincomm']; ?>" class="btn btn-outline-danger">رَد&nbsp;کردن</a>

                                    <?php } }else{

                            if ($value['status'] == 0){ ?>
                                <a href="<?php echo 'showcomment.php?confirm='.$value['id'].'&pageincomm='.$_GET['pageincomm']; ?>" class="btn btn-outline-success">تایید</a>
                            <?php }else{ ?>
                                <a href="<?php echo 'showcomment.php?ignore='.$value['id'].'&pageincomm='.$_GET['pageincomm']; ?>" class="btn btn-outline-danger">رَد&nbsp;کردن</a>

                            <?php } }?>
                            </td>
                        <td>
                            <?php
                            if ($value['reply'] == 0){ ?>
                                <a href="<?php echo "repcomment.php?reply=".$value['id']; ?>" class="btn btn-outline-primary">پاسخ</a>
                            <?php }else{ ?>
                            <span class="btn btn-outline-secondary">ثبت&nbsp;شده</span>
                                <?php } ?>
                        </td>
                        <td><?php echo timetofarsi($value['time']); ?></td>
                        <td><a href="<?php echo 'showcomment.php?deletecomm='.$value['id']; ?>" class="btn btn-outline-danger">حذف</a></td>
                        <td><a href="<?php echo 'editcomment.php?editcomm='.$value['id']; ?>" class="btn btn-outline-warning">ویرایش</a></td>
                    </tr>
                    <?php } } ?>

                    </tbody>
                </table>
                <div class="text-center" dir="ltr">
                    <?php if ($count > 1){ for ($z = 1; $z <= $count; $z++){ ?>
                        <a href="showcomment.php?pageincomm=<?php echo $z;?>" class="btn btn-outline-primary mr-2 <?php if (isset($_GET['pageincomm'])){ if ($z == $_GET['pageincomm']){ echo 'active';} }elseif($z==1){ echo 'active';}?>"><?php echo $z; ?></a>
                    <?php } } ?>
                </div>
            </div>
            </div>
        </div>

    </div>
<?php include_once 'page/footer.php' ?>