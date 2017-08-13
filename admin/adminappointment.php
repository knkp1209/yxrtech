<?php
include_once('admin_include_fns.php');
$conn = db_connect();
$conn->query("set character set utf8");//读库
$conn->query("set names utf8");//写库

?>


<?php

$query = 'SELECT * FROM appointmens ORDER BY submitdate DESC';
$result = @$conn->query($query);
if (!$result) {
    echo "系统错误，请稍后再试！";
    exit;
}
$num = @$result->num_rows;
echo "<h2 style=\"text-align:center\">查看预约</h2>";
if ($num > 0) {
    echo '<table align="center" border="2" cellpadding="20">
      <tr align="center">
        <td class="td1">姓名</td>
        <td class="td2">电话</td>
        <td>留言</td>
        <td class="td4">日期时间</td>
      </tr>';
    $result = db_result_to_array($result);
    foreach ($result as $value) {
        echo "<tr align=\"center\">
        <td class=\"td1\">{$value['name']}</td>
        <td class=\"td2\">{$value['phone']}</td>
        <td>{$value['description']}</td>
        <td class=\"td4\">{$value['submitdate']}</td>
      </tr>";
    }
    echo '</table>';
} else {
    echo "<h4 style=\"text-align:center\">暂无预约</h4>";
}
$conn->close();
?>