<?php
ob_start();
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
    if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['catId'])) {
        $title = $_POST['title'];
        $content = nl2br($_POST['content']);
        $catId = $_POST['catId'];

    }
    if (!empty($_FILES['newsimage'])){
        $newsimages = uploadimage($_FILES['newsimage'], $upload_path);
        $newsimage = $newsimages;
    }


    $newsimages = $newsimages[0];

    if ($title && $newsimages && $content && $catId) {
        $query = "INSERT INTO news (title,image,content,catId) VALUES('$title','$newsimages','$content','$catId')";
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

$query = "SELECT * FROM newscat";
$result = @$conn->query($query);


if(!$result || $result->num_rows <= 0){
    exit;
}
$result = db_result_to_array($result);

?>
<style>
#addnews p {
    text-align:  left;
}

form {
    width: 100%;
}
</style>
<form action="addnews.php" method="POST" id="addnews" enctype="multipart/form-data">
    <div style="width: 80%;text-align: center; margin:0 auto;">
        <p>
            <label for="title">新闻标题</label>
            <input type="text" id="title" name="title" />
        </p>
        <p>
            <label for="newsimage">新闻图片</label>
            <input type="file" id="newsimage" name="newsimage[]" />
        </p>
        <p>
            <label for="content">新闻内容</label>
            <textarea rows="20" cols="90" id="content" name="content"></textarea>
        </p>
        <p>
            <label for="catId">新闻类别</label>
            <select name="catId" id="catId">
<?php
            for ($i = 0; $i < count($result); $i++) {
                if($i == 0)
                    echo "<option value=\"{$result[$i]['catId']}\" selected=\"selected\">{$result[$i]['catname']}</option>";
                else
                    echo "<option value=\"{$result[$i]['catId']}\" >{$result[$i]['catname']}</option>";
            }
            
?>
            </select>
        </p>
        <input type="submit" value="添加新闻" />
        <input type="hidden" value="TRUE" name="submitted" />
    </div>
</form>

 
<?php
ob_end_flush();
$conn->close();
?>