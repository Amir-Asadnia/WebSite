<?php
//for website

function signUserToSite()
{
    global $connect;
    if (isset($_POST['btnsign'])) {
        if (checkUserToSite() == true) {
            header('location:user.php?account=error');

        } else {
            if (!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                $sql = "INSERT INTO user_table SET name=?, username=?, email=?, password=?";
                $result = $connect->prepare($sql);
                $result->bindValue(1, $_POST['name']);
                $result->bindValue(2, $_POST['username']);
                $result->bindValue(3, $_POST['email']);
                $result->bindValue(4, md5($_POST['password']));
                $result->execute();
                header('location:user.php?SignIn=true');
            } else {
                header('location:user.php?input=empty');
            }
        }
    }
}

function checkUserToSite()
{
    global $connect;
    if (isset($_POST['btnsign'])) {
        $sql = "SELECT * FROM user_table WHERE username=? || email=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['username']);
        $result->bindValue(2, $_POST['email']);
        $result->execute();

        if ($result->rowCount() >= 1) {
            return $result;
        } else {
            return false;
        }

    }
}

function checkLogToSite()
{
    global $connect;
    if (isset($_POST['btnlog'])) {
        $sql = "SELECT * FROM user_table WHERE username=? AND password=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['username']);
        $result->bindValue(2, md5($_POST['password']));
        $result->execute();

        if ($result->rowCount()) {
            $_SESSION['username'] = $_POST['username'];
            header('location:index.php');
            return $result;
        } else {
            header('location:user.php?log=error');
            return false;
        }
    }

}

//for admin panel

function checkLogToDashbord()
{
    global $connect;
    if (isset($_POST['btnlog'])) {
        $sql = "SELECT * FROM admin_table WHERE username=? AND password=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['username']);
        $result->bindValue(2, md5($_POST['password']));
        $result->execute();

        if ($result->rowCount() >= 1) {
            $_SESSION['usernameadmin'] = $_POST['username'];
            header('location:showcomment.php');
            return $result;
        } else {
            header('location:index.php?info=error');
            return false;
        }
    }
}

function checkLogToDashbordforuser()
{
    global $connect;
    if (isset($_POST['btnlog'])) {
        $sql = "SELECT * FROM admin_table WHERE username=? AND password=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['username']);
        $result->bindValue(2, md5($_POST['password']));
        $result->execute();

        if ($result->rowCount() >= 1) {
            $_SESSION['usernameadmin'] = $_POST['username'];
            header('location:index.php');
            return $result;
        } else {
            header('location:index.php?adminLog=false');
            return false;
        }
    }
}

function addcategory()
{
    global $connect;
    if (isset($_POST['btncategory'])) {
        $sql = "INSERT INTO category_table SET name=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['name']);
        $result->execute();
        header('location:addcategory.php?addcategory=ok');
    }
}

function showcategory()
{
    global $connect;
    $sql = "SELECT * FROM category_table";
    $result = $connect->query($sql);
    $result->execute();

    if ($result->rowCount()) {
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }
}

function deletecategory()
{
    global $connect;
    if (isset($_GET['deletecategory'])) {
        $sql = "DELETE FROM category_table WHERE id=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_GET['deletecategory']);
        $result->execute();

        if ($result->rowCount()) {
            header('location:showcategory.php?deletecat=success');
            return $result;
        } else {
            return false;
        }
    }
}

function selectcategoryforupdate($id)
{
    global $connect;

    $sql = "SELECT * FROM category_table WHERE id=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();

    if ($result->rowCount()) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }

}

function editcategory($id)
{
    global $connect;
    if (isset($_POST['btneditcategory'])) {
        $sql = "UPDATE category_table SET name=? WHERE id=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['name']);
        $result->bindValue(2, $id);
        $result->execute();
        header('location:showcategory.php?editcat=success');
    } else {
        return false;
    }

}

function showusers()
{
    global $connect;
    $sql = "SELECT * FROM user_table";
    $result = $connect->query($sql);
    $result->execute();

    if ($result->rowCount() >= 1) {
        $row = $result->fetchAll(PDO::FETCH_OBJ);
        return $row;
    } else {
        return false;
    }
}

function deleteuser()
{
    global $connect;
    if (isset($_GET['deleteuser'])) {
        $sql = "DELETE FROM user_table WHERE id=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_GET['deleteuser']);
        $result->execute();

        if ($result->rowCount()) {
            header('location:showusers.php?deleteusers=success');
            return $result;
        } else {
            return false;
        }
    }
}

function selectuserforupdate($id)
{
    global $connect;
    $sql = "SELECT * FROM user_table WHERE id=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();

    if ($result->rowCount()) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }
}

function edituser($id)
{
    global $connect;
    if (isset($_POST['btnedituser'])) {
        $sql = "UPDATE user_table SET name=?, username=?, email=? WHERE id=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['name']);
        $result->bindValue(2, $_POST['username']);
        $result->bindValue(3, $_POST['email']);
        $result->bindValue(4, $id);
        $result->execute();

        header('location:showusers.php?edituse=success');
    }
}

function addpost()
{
    global $connect;
    if (isset($_POST['btnaddpost'])) {
        $sql = "INSERT INTO post_table SET category=?, title=?, author=?, tags=?, content=?, picture=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['category']);
        $result->bindValue(2, $_POST['title']);
        $result->bindValue(3, $_POST['author']);
        $result->bindValue(4, $_POST['tags']);
        $result->bindValue(5, $_POST['content']);
        $file = $_FILES['file'];
        $_1 = explode('.', $file['name']);
        $_2 = end($_1);
        if (in_array($_2, ['jpg', 'jpeg', 'png'])) {
            $name = microtime('Y M D') . 'img-' . rand(1, 500) . '.' . $_2; // img-240.jpg
            move_uploaded_file($file['tmp_name'], 'image/' . $name);
            $result->bindValue(6, $name);
            $result->execute();
            header('location:addpost.php?sendpost=success');
        } else {
            header('location:addpost.php?post=error');
        }

    }
}

function showpost()
{
    global $connect;
    global $count;
    $sql = "SELECT * FROM post_table";
    $result = $connect->query($sql);
    $result->execute();
    $tedad = $result->rowCount();
    $count = ceil($tedad / 6);
    if (!isset($_GET['pagein'])) {
        $cn = 0;
    } else {
        $cn = ($_GET['pagein'] - 1) * 6;
    }

    $sql = "SELECT * FROM post_table LIMIT {$cn},6";
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }
}

function selectcategoryname($value)
{
    global $connect;
    $sql = "SELECT * FROM category_table WHERE id=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $value);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $valuename) {
            return $valuename['name'];
        }
    } else {
        return false;
    }
}

function timetofarsi($value)
{

    $time = explode('-', $value);
    return gregorian_to_jalali($time['0'], $time['1'], $time['2'], '/');
}

function deletepost()
{
    global $connect;
    if (isset($_GET['deletepost'])) {
        $sql = "DELETE FROM post_table WHERE id=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_GET['deletepost']);
        $result->execute();
        if ($result->rowCount()) {
            header('location:showpost.php?delpost=success');
            return $result;
        } else {
            return false;
        }
    }

}

function selectpostforupdate($id)
{
    global $connect;
    if (isset($id)) {
        $sql = "SELECT * FROM post_table WHERE id=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $id);
        $result->execute();
        if ($result->rowCount()) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
    }
}

function editpost($id)
{
    global $connect;
    if (isset($_POST['btneditpost'])) {
        $sql = "UPDATE post_table SET category=?, title=?, author=?, tags=?, content=?, picture=? WHERE id=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['category']);
        $result->bindValue(2, $_POST['title']);
        $result->bindValue(3, $_POST['author']);
        $result->bindValue(4, $_POST['tags']);
        $result->bindValue(5, $_POST['content']);
        $file = $_FILES['file'];
        $_1 = explode('.', $file['name']);
        $_2 = end($_1);
        if (in_array($_2, ['jpg', 'jpeg', 'png'])) {
            $name = microtime('Y M D') . 'img-' . rand(1, 500) . '.' . $_2; // img-240.jpg
            move_uploaded_file($file['tmp_name'], 'image/' . $name);
            $result->bindValue(6, $name);
            $result->bindValue(7, $id);
            $result->execute();
            header('location:showpost.php?editedpost=success');
            return true;
        } else {
            header('location:showpost.php?editp=error');
            return false;
        }

    }
}

function selectpostfornext($id)
{
    global $connect;
    if (isset($_GET['id'])) {
        $sql = "SELECT * FROM post_table WHERE id=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $id);
        $result->execute();
        if ($result->rowCount()) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
    }
}

function search($value)
{
    global $connect;
    $sql = "SELECT * FROM post_table WHERE tags LIKE ?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, "%$value%");
    $result->execute();
    if ($result->rowCount()) {
        return $row = $result->fetchAll(PDO::FETCH_OBJ);
    } else {
        return false;
    }

}

function selectcat($value)
{
    global $connect;
    $sql = "SELECT * FROM post_table WHERE category=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $_GET['category']);
    $result->execute();
    if ($result->rowCount()) {
        return $row = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function addcomment()
{
    global $connect;
    if (isset($_POST['btnaddcomment'])) {
        $sql = "INSERT INTO comment_table SET name=?, email=?, comment=?, status=?, reply=?, postid=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['name']);
        $result->bindValue(2, $_POST['email']);
        $result->bindValue(3, $_POST['comment']);
        $result->bindValue(4, '0');
        $result->bindValue(5, '0');
        $result->bindValue(6, $_GET['id']);
        $result->execute();
        echo '<script>alert("نظر شما ثبت شد، بعد از تایید مدیر در سایت قرار میگیرد")</script>';
    }
}

function showcomment()
{
    global $connect;
    global $count;
    $sql = "SELECT * FROM comment_table";
    $result = $connect->query($sql);
    $result->execute();
    $tedad = $result->rowCount();
    $count = ceil($tedad / 5);
    if (!isset($_GET['pageincomm'])) {
        $cn = 0;
    } else {
        $cn = ($_GET['pageincomm'] - 1) * 5;
    }

    $sql = "SELECT * FROM comment_table LIMIT {$cn},5";
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount()) {
        return $row = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function findpostname($id)
{
    global $connect;
    $sql = "SELECT * FROM post_table WHERE id=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['title'];
    } else {
        return false;
    }
}

function confirmComment($flag, $value)
{
    global $connect;
    $sql = "UPDATE comment_table SET status=? WHERE id=?";
    $result = $connect->prepare($sql);
    if (!$flag) {
        $result->bindValue(1, 1);
    } else if ($flag) {
        $result->bindValue(1, 0);
    }
    $result->bindValue(2, $value);
    $result->execute();
    header('location:showcomment.php?state=' . $flag .'&pageincomm='.$_GET['pageincomm']);
}

function selectrepcomment($id)
{
    global $connect;
    $sql = "SELECT * FROM comment_table WHERE id=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount()) {
        return $row = $result->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function repcomment()
{
    global $connect;
    if (isset($_POST['btnrepcomment'])) {
        $sql = "INSERT INTO comment_table SET name=?, email=?, comment=?, status=?, reply=?, postid=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, 'مدیر');
        $result->bindValue(2, 'asadnia@gmail.com');
        $result->bindValue(3, $_POST['comment']);
        $result->bindValue(4, '1');
        $result->bindValue(5, $_POST['reply']);
        $result->bindValue(6, $_POST['postid']);
        $result->execute();
        header('location:showcomment.php?repsuccess=true');
    }
}

function deletecomment($id)
{
    global $connect;
    $sql = "DELETE FROM comment_table WHERE id=? OR reply=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $id);
    $result->bindValue(2, $id);
    $result->execute();
    if ($result->rowCount()) {
        header('location:showcomment.php?deletecomment=success');
        return $result;
    } else {
        return false;
    }
}

function editcomment($value)
{
    global $connect;
    if (isset($_POST['btneditcomment'])) {
        $sql = "UPDATE comment_table SET comment=? WHERE id=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['comment']);
        $result->bindValue(2, $value);
        $result->execute();
        if ($result->rowCount()) {
            header('location:showcomment.php?editcomment=true');
            return $result;
        } else {
            return false;
        }
    }
}

function selectcommentforpost()
{
    global $connect;
    global $count;
    $sql = "SELECT * FROM comment_table WHERE status=? AND postid=? AND reply=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, '1');
    $result->bindValue(2, $_GET['id']);
    $result->bindValue(3, '0');
    $result->execute();
    $tedad = $result->rowCount();
    $count = ceil($tedad / 1);
    if (!isset($_GET['pageincomm'])) {
        $cn = 0;
    } else {
        $cn = ($_GET['pageincomm'] - 1) * 1;
    }

    $sql = "SELECT * FROM comment_table WHERE status=? AND postid=? AND reply=? LIMIT {$cn},1";
    $result = $connect->prepare($sql);
    $result->bindValue(1, '1');
    $result->bindValue(2, $_GET['id']);
    $result->bindValue(3, '0');
    $result->execute();
    if ($result->rowCount()) {
        return $row = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function selectrepforpost($value)
{
    global $connect;
    $sql = "SELECT * FROM comment_table WHERE status=? AND reply=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, '1');
    $result->bindValue(2, $value);
    $result->execute();
    if ($result->rowCount()) {
        return $row = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function showadmininf()
{
    global $connect;
    $sql = "SELECT * FROM admin_table";
    $result = $connect->query($sql);
    $result->execute();

    if ($result->rowCount()) {
        return $row = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function selectadminforupdate($id)
{
    global $connect;
    $sql = "SELECT * FROM admin_table WHERE id=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount()) {
        return $row = $result->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }

}

function updateadmininfo($id)
{
    global $connect;
    if (isset($_POST['btneditadmin'])) {
        $sql = "UPDATE admin_table SET username=?, password=? WHERE id=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['username']);
        $result->bindValue(2, md5($_POST['password']));
        $result->bindValue(3, $id);
        $result->execute();

        header('location:showadmininfo.php?adminupdate=success');
    }
}


?>