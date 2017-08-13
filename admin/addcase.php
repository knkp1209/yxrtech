<?php
ob_start();
require_once('admin_include_fns.php');

$conn = db_connect();
$conn->query("set character set utf8");//读库
$conn->query("set names utf8");//写库
$parameter = null;
$images = array();
$codeimages = array();
$title = array();
$subtitle = array();
$upload_path = $imgcase;

if (!empty($_FILES['imagefile']))
    $images = uploadimage($_FILES['imagefile'], $upload_path);
if (!empty($_FILES['imagefile']))
    $codeimages = uploadimage($_FILES['codeimagefile'], $upload_path);
if (isset($_POST['title']) && count($_POST['title']) > 0)
    $title = $_POST['title'];
if (isset($_POST['subtitle']) && count($_POST['subtitle']) > 0)
    $subtitle = $_POST['subtitle'];


if (count($images) == count($codeimages) &&
    count($codeimages) == count($title) &&
    count($title) == count($subtitle)
) {

    for ($i = 0; $i < count($images); $i++) {
        $parameter .= "('{$images[$i]}','{$codeimages[$i]}','{$title[$i]}','{$subtitle[$i]}'),";
    }
    $parameter = substr($parameter, 0, -1);
    $query = 'INSERT INTO cases (image,codeimage,title,subtitle) VALUES ' . $parameter;
    $result = $conn->query($query);
    if ($conn->affected_rows < 0) {
        echo '添加失败，系统错误!';
        $url = 'admincasea.php';
        header('Refresh: 2; url=' . $url);
        exit;
    } else if ($conn->affected_rows > 0) {
        echo '添加成功';
        $url = 'admincasea.php';
        header('Refresh: 2; url=' . $url);
        exit;
    }
}


ob_end_flush();
?>