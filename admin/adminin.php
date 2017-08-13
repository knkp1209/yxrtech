<?php


require_once('admin_include_fns.php');
$conn = db_connect();
$conn->query("set character set utf8");//读库
$conn->query("set names utf8");//写库

?>


<?php

$query = "select image from slideshows";
$result = @$conn->query($query);
if (!$result) {
    exit;
}
$num_cats = @$result->num_rows;
if ($num_cats > 0) {


    $result = db_result_to_array($result);
    echo '<p style="text-align:center; font-size:1.2em">修改首页轮播图，轮播图尺寸必须一致(建议尺寸 宽：1920px; 高：300-500px)，文件名不可以是中文或符号</p>';
    echo '<form method="post"
        action="updateslideshow.php?table=slideshows" enctype="multipart/form-data">';
    for ($i = 0; $i < count($result); $i++) {
        echo '<div id="oldimgdy' . $i . '" style="float: left;">';
        if (@file_exists($imgindex . $result[$i]['image'])) {
            $size = GetImageSize($imgindex . $result[$i]['image']);
            if (($size[0] > 0) && ($size[1] > 0)) {
                echo '<img id="vi' . $i . '"src="' . $imgindex . $result[$i]['image'] . '" 
                  style="height="150px" width="250px" />
                    <input id="bn' . $i . '" type="button" onclick="delimg(' . $i . ')" value="删除图片" />';
                echo '<input id="val' . $i . '" type="hidden" name="oldimg[]" value="' . $result[$i]['image'] . '"/></div>';
            }
        }
    }
    echo '<div id="picInput"><input type="file" name="imagefile[]" /></div>';
    echo '<input id="addBtn" type="button" onclick="addPic1()" value="继续添加图片" />';
    echo '<input type="submit" value="更新" /><div style="text-align:center">点击更新才会生效</div>';
    echo '</form>';
} else {

    echo '<p style="text-align:center; font-size:1.2em">修改首页轮播图，轮播图尺寸必须一致(建议尺寸)，文件名不可以是中文或符号</p>';
    echo '<form method="post"
        action="updateslideshow.php?table=slideshows" enctype="multipart/form-data">';
    echo '<div id="picInput"><input type="file" name="imagefile[]" /></div>';
    echo '<input id="addBtn" type="button" onclick="addPic1()" value="继续添加图片" />';
    echo '<input type="submit" value="更新" />';
    echo '</form>';
}


$conn->close();
?>