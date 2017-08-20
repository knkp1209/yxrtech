<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="plugins/layui/css/layui.css" media="all" />
        <link rel="stylesheet" href="css/main.css" />
        <script src="../js/my.js"></script>
        <style>
            form div{
                clear:both;
                width: 100%;
                height: 100px;
                margin-top: 5px;
                margin-bottom: 5px;
            }
            form p{
                float: left;
                padding-left: 2%;
                padding-right: 2%;
            }
            .name{
                width: 4%;
                padding-top: 40px;
            }
            .profile{
                width: 50%;
                padding-top: 40px;
            }
            .cbox{
                width: 4%;
                padding-top: 40px;
            }
            form p img{
                height: 100px;
                width: 100px;
            }
            h1{
                font-size: 1.5em;
                font-weight: bold;
                padding-bottom: 5px;
            }
            span{
                color: red;
            }
        </style>
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
                <legend>删除员工</legend>
                <div class="layui-field-box">
<?php
require_once('admin_include_fns.php');

$conn = db_connect();
$conn->query("set character set utf8");
$conn->query("set names utf8");
?>
<?php
$query = "select * from employees";
$result = @$conn->query($query);
if (!$result) {
    exit;
}

$num = @$result->num_rows;
if ($num > 0) {
    echo '<div style="width:40%; margin:0 auto; text-align:center"><h1>删除员工</h1></div>';
    echo '<form method="post"
        action="deleps.php" enctype="multipart/form-data">';

    $result = db_result_to_array($result);
    $i = true;
    for ($i = 0; $i < count($result); $i++) {
            echo "<div><p><img src=\"$imgpeople{$result[$i]['headimage']}\"  alt=\" \"/></p>";
            echo "<p class=\"name\">{$result[$i]['name']}</p>";
            echo "<p class=\"profile\">{$result[$i]['Profile']}</p>";
            echo "<p class=\"cbox\"><input type=\"checkbox\" name=\"employees[]\" value=\"{$result[$i]['employeesId']}\" />删除</p></div>";
    }
    echo '</div></div>' . "<div style=\"text-align:center;\" >全选/全不选<input type=\"checkbox\" name=\"all\" onclick=\"check_all(this,'employees[]')\" />
      <br /><br />
  <input type=\"submit\" value=\"删除\" /></div>

    </form>";


} else {
    exit;
}


?>


<?php

$conn->close();
?>


                </div>
            </fieldset>
        </div>
    </body>

</html>