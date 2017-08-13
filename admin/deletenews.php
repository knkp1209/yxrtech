<?php
require_once('admin_include_fns.php');

$conn = db_connect();
$conn->query("set character set utf8");
$conn->query("set names utf8");
?>

<?php
$newsId = @$_GET['newsId'];
if($newsId){
    $query = "DELETE FROM news where newsId = $newsId";
    $result = $conn->query($query);
    if ($conn->affected_rows < 0) {
        echo '删除失败，系统错误!';
        $url = 'adminnews.php';
        header('Refresh: 1; url=' . $url);
        exit;
    } else if ($conn->affected_rows > 0) {
        echo '删除成功';
        $url = 'adminnews.php';
        header('Refresh: 1; url=' . $url);
        exit;
    }
}else{
    $url = 'adminnews.php';
    header('Refresh: 1; url=' . $url);
    exit;
}

?>

<?php
$conn->close();
?>