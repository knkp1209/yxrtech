<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="plugins/layui/css/layui.css" media="all" />
        <link rel="stylesheet" href="css/main.css" />
        <script src="../js/my.js"></script>
        <style>
#addeps p {
    text-align:  left;
    padding-left: 30%;
    padding-top: 4px;
    padding-bottom: 4px;
}

#addeps {
    width: 100%;
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
                <legend>添加员工</legend>
                <div class="layui-field-box">


        <div id="addeps" style="width:40%; margin:0 auto; text-align:center"><h1>添加员工</h1>
    <span>* 图片必须是宽度：150px 高度：150px</span>
    <form  method="post "action="addeps.php" enctype="multipart/form-data" onsubmit="return getElements()" >

<div id="picInput">
<p><label>头像：</label><input type="file" class="forminline"  name="imagefile[]" /></p>
<p><label>姓名：</label><input class="forminline" type="text" name="name[]" /></p>
<p><label>介绍：</label><input class="forminline"  type="text" name="profile[]" /></p></div>
<br />
<input id="addBtn" type="button" onclick="addpeople()" value="继续添加员工" />
<input type="submit" value="提交"  />
</div>
<br />
<br />
    </form>

                </div>
            </fieldset>
        </div>
    </body>

</html>