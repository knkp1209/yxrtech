<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="plugins/layui/css/layui.css" media="all" />
        <link rel="stylesheet" href="css/main.css" />
        <script src="../js/my.js"></script>
    </head>

    <body>
        <div class="admin-main">
<!--            <blockquote class="layui-elem-quote">
                <p>本模板基于LayUI实现 ,支持所有LayUI组件.</p>
                LayUI文档地址：
                http://www.layui.com/doc
                <p>项目地址：
                    http://git.oschina.net/besteasyteam/beginner_admin
                </p>
                <p>建议反馈和问题收集地址:
                    http://fly.zhengjinfan.cn/
                </p>
                <p>交流群：248049395</p>
                <br/>
                <p style="color: #01AAED;">子窗体弹出对话框编辑表单的一些建议：如果是处理表单的，建议在子窗口弹出。把背景设置为无，如果只是提示信息，可以在父窗口弹出。</p>
            </blockquote> -->
            <fieldset class="layui-elem-field">
                <legend>删除新闻</legend>
                <div class="layui-field-box">
<?php
require_once('admin_include_fns.php');

$conn = db_connect();
$conn->query("set character set utf8");
$conn->query("set names utf8");
?>

<?php
$query = "select * from news order by newsdate desc";
$result = @$conn->query($query);
if (!$result) {
    exit;
}
$num = @$result->num_rows;
if ($num > 0) {
    $result = db_result_to_array($result);
  

    for ($i = 0; $i < count($result); $i++) {
          echo '<div style="display:flex; width:100%; margin-bottom:10px; height="170px">';
        echo '<div style="flex:3"><img src="' . $imgnews . $result[$i]['image'] . '" alt=""  height="170px;" width="220px;" /></div><div style="flex:1; padding-top:70px;">
            
                <p>' . substr($result[$i]['newsdate'], 5,5) . '<br />' . substr($result[$i]['newsdate'], 0, 4) . '</p></div><div style="flex:6">
            <p style="margin-top: 20px; font-size: 20px;"><b>' . $result[$i]['title'] . '</b></p>
            <p>' . substr($result[$i]['content'], 0, 500) . '....</p></div><div style="flex:1; line-height:170px">
            	<a href="deletenews.php?newsId='.$result[$i]['newsId'].'">删除</a></div>';
                 echo '</div>';
    }

   
}

?>

<?php
$conn->close();
?>