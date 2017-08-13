<?php
require_once('admin_include_fns.php');

$conn = db_connect();
$conn->query("set character set utf8");
$conn->query("set names utf8");
$upload_path = $imgnews;
$title = null;
$newsimage = null;
$content = null;
?>


<?php
if (isset($_POST['submitted'])) {
    if (isset($_POST['title']) && isset($_POST['content'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
    }
    if (!empty($_FILES['newsimage'])){
        $newsimages = uploadimage($_FILES['newsimage'], $upload_path);
        $newsimage = $newsimages;
    }


    $newsimages = $newsimages[0];

    if ($title && $newsimages && $content) {
        $query = "INSERT INTO news (title,image,content) VALUES('$title','$newsimages','$content')";
        $result = $conn->query($query);
        if ($conn->affected_rows < 0) {
            echo '添加失败，系统错误!';
            $url = 'addnews.php';
            header('Refresh: 1; url=' . $url);
            exit;
        } else if ($conn->affected_rows > 0) {
            echo '添加成功';
            $url = 'addnews.php';
            header('Refresh: 1; url=' . $url);
            exit;
        }
    }

}

?>
    <form action="addnews.php" method="POST" enctype="multipart/form-data">
        <div style="width: 80%;text-align: center; margin:0 auto;">
            <label for="title">新闻标题</label><input type="text" id="title" name="title"/><br/>
            <label for="newsimage">新闻图片</label><input type="file" id="newsimage" name="newsimage[]"/><br/>
            <label for="content">新闻内容</label><textarea rows="9" cols="9" id="content" name="content"></textarea>
            <input type="submit" value="添加新闻"/>
            <input type="hidden" value="TRUE" name="submitted"/>
        </div>
    </form>

<?php
$conn->close();
?>