<?php
ob_start();
require_once('admin_include_fns.php');

$conn = db_connect();
$conn->query("set character set utf8");//读库
$conn->query("set names utf8");//写库
$parameter = null;
$images = array();
$name = array();
$profile = array();
$upload_path = $imgpeople;

if (!empty($_FILES['imagefile']))
    $images = uploadimage($_FILES['imagefile'], $upload_path);
if (isset($_POST['name']) && count($_POST['name']) > 0)
    $name = $_POST['name'];
if (isset($_POST['profile']) && count($_POST['profile']) > 0)
    $profile = $_POST['profile'];


if (count($images) == count($name) &&
    count($name) == count($profile)
) {

    for ($i = 0; $i < count($images); $i++) {
        $parameter .= "('{$images[$i]}','{$name[$i]}','{$profile[$i]}'),";
    }
    $parameter = substr($parameter, 0, -1);
    $query = 'INSERT INTO employees (headimage,name,profile) VALUES ' . $parameter;
    $result = $conn->query($query);
    if ($conn->affected_rows < 0) {
        echo '添加失败，系统错误!';
        $url = 'adminaboutusa.php';
        header('Refresh: 1; url=' . $url);
        exit;
    } else if ($conn->affected_rows > 0) {
        echo '添加成功';
        $url = 'adminaboutusa.php';
        header('Refresh: 1; url=' . $url);
        exit;
    }
}


ob_end_flush();
?>