<?php
ob_start();
require_once('admin_include_fns.php');

$conn = db_connect();
$employees = array();


if (isset($_POST['employees']) && count($_POST['employees']) > 0) {
    $employees = $_POST['employees'];
    $parameter = implode(',', $employees);

    $query = "DELETE FROM employees WHERE employeesId in (" . $parameter . ")";

    $result = $conn->query($query);
    if ($conn->affected_rows < 0) {
        echo '删除失败，系统错误!';
        $url = 'adminaboutus.php';
        header('Refresh: 1; url=' . $url);
        exit;
    } else if ($conn->affected_rows > 0) {
        echo '删除成功';
        $url = 'adminaboutus.php';
        header('Refresh: 1; url=' . $url);
        exit;
    }

}

ob_end_flush();
?>