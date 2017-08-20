<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="plugins/layui/css/layui.css" media="all" />
        <link rel="stylesheet" href="css/main.css" />
        <script src="../js/my.js"></script>
        <style>
        td{
            vertical-align: middle; 
            text-align: center;
            padding-top: 2px;
            padding-left: 5px;
            padding-right: 5px;
            border:2px solid black;
        }
        .grey{
            background: grey;
        }
        h1{
            font-size: 1.5em;
            font-weight: bold;
            padding-bottom: 5px;
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
                <legend>删除案例</legend>
                <div class="layui-field-box">
<?php
require_once('admin_include_fns.php');

$conn = db_connect();
$conn->query("set character set utf8");
$conn->query("set names utf8");
?>
<?php
$query = "select * from cases order by image desc";
$result = @$conn->query($query);
if (!$result) {
    exit;
}

$num = @$result->num_rows;
if ($num > 0) {
    echo '<div style="width:40%; margin:0 auto; text-align:center"><h1>删除案例</h1></div>';
    echo '<form method="post"
        action="deletecase.php" enctype="multipart/form-data">';
    echo '<table border="3"  border-collapse="collapse" width="99%" align="center" >';
    $result = db_result_to_array($result);
    $i = true;
    for ($i = 0; $i < count($result); $i++) {
        
        if($i%2 == 1)
            echo '<tr class="grey">';
        else
            echo '<tr>';
        echo <<<caselayout
        <td>
         <img src="$imgcase{$result[$i]['image']}" alt=" " height="177" width="105"/>
        </td><td>
         <img src="$imgcase{$result[$i]['codeimage']}" alt=" " height="177" width="105"/>
        </td><td width="100">
         {$result[$i]['title']}
        </td><td>
         {$result[$i]['subtitle']}
        </td><td  width="50">
        <input type="checkbox" name="case[]" value="{$result[$i]['caseId']}" />删除</td>
        </tr>
     

caselayout;

    }
    echo  "</table><div style=\"text-align:center; margin-top:10px;\" >全选/全不选<input type=\"checkbox\" name=\"all\" onclick=\"check_all(this,'case[]')\" />
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