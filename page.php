<?php include_once 'page/header.php';
$selectpost = selectpostfornext($_GET['id']);
addcomment();
$selectcommentforpost = selectcommentforpost();

?>
    <div class="boxfader1">
        <div class="imagec">
            <img src="admin/image/<?php echo $selectpost['picture']; ?>">
        </div>
        <div class="contentc">
            <h2><?php echo $selectpost['title']; ?></h2>
            <p>نویسنده: <?php echo $selectpost['author']; ?></p>
            <p>تاریخ انتشار: <?php echo timetofarsi($selectpost['time']) ?></p>
            <p>نام دسته بندی: <?php echo selectcategoryname($selectpost['category']); ?></p>
        </div>
        <br>
        <div class="matn1">
            <p><?php echo $selectpost['content']; ?></p>
            <button id="matn1btn">ارسال دیدگاه</button>
            <?php if (isset($_SESSION['username']) || isset($_SESSION['usernameadmin'])){ ?>
            <div id="popup">
                <p> ارسال دیدگاه</p>
                <div class="popup-inp">
                    <form method="post">
                        <input type="text" placeholder=" نام و نام خانوادگی" name="name" required><br>
                        <input type="text" placeholder=" ایمیل" name="email" required><br>
                        <textarea placeholder=" دیدگاه" name="comment" required></textarea>
                        <button type="submit" name="btnaddcomment">ارسال دیدگاه</button>
                    </form>
                    <i class="fa fa-close" id="popupclose"></i>
                </div>
            </div>
            <?php }else{ ?>
                <div id="popup" style="height: 150px">
                    <div class="alertinfolog">برای ارسال دیدگاه ابتدا وارد حساب کاربری خود شوید</div>
                    <div class="popup-inp">
                        <form method="post">
                            <button type="submit" id="popupclose" name="btnclosepopup" style="margin-top: 15px;margin-left: 8px;">متوجه شدم</button>
                            <?php if (isset($_POST['btnclosepopup'])){ header('location:user.php');} ?>
                        </form>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class="divspan">
            <?php $tags = explode('-', $selectpost['tags']);
                foreach ($tags as $value){
                    echo "<span> $value</span>";
                }
            ?>
        </div>
    </div>
    <div class="onvancomment">
        <p>لیست نظرات در سایت</p>
    </div>
<?php if ($selectcommentforpost){
    foreach ($selectcommentforpost as $value){
?>
    <div class="nazar">
        <div class="deteilcomment">
            <p>نظر : <?php echo $value['name']; ?> گفت</p>
            <p>تاریخ : <?php echo timetofarsi($value['time']); ?></p>
        </div>
        <div class="bodycomment">
            <p><?php echo $value['comment']; ?></p>
        </div>
        <?php $selectrepforpost = selectrepforpost($value['id']);
        if ($selectrepforpost){
            foreach ($selectrepforpost as $item){
        ?>
        <div class="repnazar">
            <span>پاسخ : <?php echo $item['name']; ?></span>
            <span>تاریخ : <?php echo timetofarsi($item['time']); ?></span>
            <p><?php echo $item['comment']; ?></p>
        </div>
        <?php } } ?>
    </div>
        <?php } }else{ ?>
    <div class="alertinfologcomment">
        نظری برای این پست ارسال نشده است!
    </div>
    <?php } ?>

    <div class="pageincomm">
        <?php if ($count > 1){
        for ($z = 1; $z <= $count; $z++){
            echo '<a href="page.php?id='.$_GET['id'].'&pageincomm=' .$z. '">' .$z. '</a>' ;
        } }
        ?>
    </div>

<?php include_once 'page/footer.php'?>