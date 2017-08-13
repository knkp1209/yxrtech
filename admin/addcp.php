<?php
ob_start();
require_once('admin_include_fns.php');

$conn = db_connect();
$conn->query("set character set utf8");//读库
$conn->query("set names utf8");//写库
$parameter = null;
$images = array();
$companyname = array();
$upload_path = $imgcompanylogo;

if (!empty($_FILES['imagefile']))
    $images = uploadimage($_FILES['imagefile'], $upload_path);
if (isset($_POST['companynames']) && count($_POST['companynames']) > 0)
    $companyname = $_POST['companynames'];


if (count($images) == count($companyname)) {

    for ($i = 0; $i < count($images); $i++) {
        $parameter .= "('{$images[$i]}','{$companyname[$i]}'),";
    }
    $parameter = substr($parameter, 0, -1);
    $query = 'INSERT INTO cooperations (logo,company_name) VALUES ' . $parameter;
    $result = $conn->query($query);
    if ($conn->affected_rows < 0) {
        echo '添加失败，系统错误!';
        $url = 'admincompanya.php';
        header('Refresh: 1; url=' . $url);
        exit;
    } else if ($conn->affected_rows > 0) {
        echo '添加成功';
        $url = 'admincompanya.php';
        header('Refresh: 1; url=' . $url);
        exit;
    }
}


ob_end_flush();
?>