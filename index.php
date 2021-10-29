<?php include_once 'page/header.php';
$showpost = showpost();
?>


    <div id="search">
        <div class="search">
        </div>
        <div class="search1">
            <form method="post" action="search.php">
                <input type="text" placeholder="آموزش مورد نظر خود را جستجو کنید..." name="search">
                <button type="submit" name="btnsearch"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>


    <div class="boxheader">
        <p>جدیدترین مطالب سایت</p>
    </div>

    <div class="boxfader"><br>
        <?php foreach ($showpost as $value) { ?>
            <div class="box box1">
                <img src="admin/image/<?php echo $value['picture']; ?>">
                <div class="matnbox">
                    <p><?php echo $value['title']; ?></p>
                </div>
                <div class="matnbtn">
                    <a href="<?php echo 'page.php?id='.$value['id']; ?>">
                        <button class="button">ادامه مطلب</button>
                    </a>
                </div>
            </div>
        <?php } ?>
        <div class="pagein">
            <?php if ($count > 1){
            for ($z = 1; $z <= $count; $z++){
                echo '<a href="index.php?pagein=' .$z. '">' .$z. '</a>' ;
            } }
            ?>
        </div>
    </div>


<?php include_once 'page/footer.php' ?>