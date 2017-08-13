<?php
ob_start();
require_once('admin_include_fns.php');

$conn = db_connect();
$cases = array();


if (isset($_POST['case']) && count($_POST['case']) > 0) {
    $cases = $_POST['case'];
    $parameter = implode(',', $cases);

    $query = "DELETE FROM cases WHERE caseId in (" . $parameter . ")";
    $result = $conn->query($query);
    if ($conn->affected_rows < 0) {
        echo '删除失败，系统错误!';
        $url = 'admincase.php';
        header('Refresh: 1; url=' . $url);
        exit;
    } else if ($conn->affected_rows > 0) {
        echo '删除成功';
        $url = 'admincase.php';
        header('Refresh: 1; url=' . $url);
        exit;
    }

}

ob_end_flush();
?>