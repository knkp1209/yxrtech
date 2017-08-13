<?php
ob_start();
require_once('admin_include_fns.php');

$conn = db_connect();
$conn->query("set character set utf8");//读库
$conn->query("set names utf8");//写库
$oldimages = array();  // 原来数据库图片文件名数组
$images = array();  // 图片文件名数组
$successful = false;

$table = @$_GET['table'];

if ($table == 'slideshows')
    $upload_path = $imgindex;
else if ($table == 'goldslideshows')
    $upload_path = $imggoldsilde;
else
    exit;

if (isset($_POST['oldimg'])) {
    for ($i = 0; $i < count($_POST['oldimg']); $i++)
        $oldimages[] = $_POST['oldimg'][$i];

    $query = '';
    foreach ($oldimages as $value) {
        $query .= " image = '" . $value . "' OR";
    }
    $query = substr($query, 0, strlen($query) - 3);

    $query = "DELETE FROM " . $table . " WHERE slideshowId not in (
		SELECT * FROM (
		SELECT slideshowId FROM " . $table . " WHERE " . $query .
        ") AS temp)";

    $result = $conn->query($query);
    if ($conn->affected_rows < 0)
        exit;
    else if ($conn->affected_rows > 0)
        $successful = true;
    else
        $successful = false;
} else {
    $query = "DELETE FROM " . $table;
    $result = $conn->query($query);
    if ($conn->affected_rows < 0)
        exit;
    else if ($conn->affected_rows > 0)
        $successful = true;
    else
        $successful = false;
}

if (!empty($_FILES['imagefile']))
    $images = uploadimage($_FILES['imagefile'], $upload_path);

$images = array_unique($images);
$images = array_diff($images, $oldimages);
if (count($images) > 0) {
    $query = "INSERT INTO " . $table . "(image) VALUES";
    foreach ($images as $value)
        $query .= "('$value'),";

    $query = substr($query, 0, strlen($query) - 1);
    $result = $conn->query($query);
    if ($conn->affected_rows < 0)
        exit;
    else if ($conn->affected_rows > 0)
        $successful = true;
    else
        $successful = false;
}
if ($successful)
    echo "修改成功";
else
    echo "修改无效";

if ($table == 'slideshows')
    $url = 'main.php';
else
    $url = 'admingd.php';
header('Refresh: 1; url=' . $url);
exit;
ob_end_flush();
?>