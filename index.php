<?php

include_once('include/include.php');

$conn = db_connect();
$conn->query("set character set utf8");//读库
$conn->query("set names utf8");//写库

?>

<?php
if (isset($_POST['submitted'])) {
    if (isset($_POST['realname']) && isset($_POST['mobile']) && isset($_POST['nr'])) {
        $n = $_POST['realname'];
        $m = $_POST['mobile'];
        $nr = $_POST['nr'];

        $query = "insert into appointmens (name,phone,description,submitdate) VALUES('$n','$m','$nr',NULL)";
        $conn->query("$query");
        if ($conn->affected_rows > 0)
            echo "<script>alert('提交成功');</script>";
        else
            echo "<script>alert('提交失败，系统错误！');</script>";
    } else {
        echo "<script>alert('提交失败，系统错误！');</script>";
    }
}
?>

<?php

$query = "select image from slideshows";
$result = @$conn->query($query);
if (!$result) {
    exit;
}
$num = @$result->num_rows;
if ($num > 0) {
    echo '<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">';
    for ($i = 0; $i < $num; $i++) {
        if ($i == 0)
            echo '<li data-target="#myCarousel" data-slide-to="' . $i . '" class="active"></li>';
        else
            echo '<li data-target="#myCarousel" data-slide-to="' . $i . '"></li>';
    }
    echo '</ol>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">';
    $result = db_result_to_array($result);
    $i = true;
    foreach ($result as $value) {
        if ($i) {
            echo '<div class="item active"> <img  src="' . $imgindex . $value['image'] . '" width="100%"/></div>';
            $i = false;
        } else {
            echo '<div class="item"> <img src="' . $imgindex . $value['image'] . '" /></div>';
        }
    }
    echo '</div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev"></a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next"></a>
    </div>';
}
?>

    <div class="container-fluid gold" ">
    <h2 style="text-align: center; "><strong>金牌服务
            <hr/>
            <span>GOLD SERVICE</span></strong></h2>
    <div class="row ">
        <div class="col-lg-2 col-lg-offset-1 ">
            <dl class="wx">
                <dt><img src='images/wx.png' alt=""/></dt>
                <dd>
                    <h2><a href="# " target="_blank ">微信开发</a></h2>
                    <p>定制级 微商城、微官网等建设</p>
                    <p><em>WeChat development</em></p>
                </dd>
            </dl>
        </div>
        <div class="col-lg-2 ">
            <dl class="html5 ">
                <dt><img src='images/html5.png' alt=""/></dt>
                <dd>
                    <h2><a href="# " target="_blank ">小程序开发</a></h2>
                    <p>专业定制开发，一步到位</p>
                    <p><em>Xiaochengxu development</em></p>
                </dd>
            </dl>
        </div>
        <div class="col-lg-2 ">
            <dl class="app ">
                <dt><img src='images/app.png' alt=""/></dt>
                <dd>
                    <h2><a href="# " target="_blank ">APP开发</a></h2>
                    <p>定制级 手机 PAD UI界面</p>
                    <p><em>APP development</em></p>
                </dd>
            </dl>
        </div>
        <div class="col-lg-2 ">
            <dl class="onshop ">
                <dt><img src='images/onshop.png' alt=""/></dt>
                <dd>
                    <h2><a href="# " target="_blank ">微信分销</a></h2>
                    <p>开创全新微分销方案</p>
                    <p><em>Online shopping</em></p>
                </dd>
            </dl>
        </div>
        <div class="col-lg-2 ">
            <dl class="promote ">
                <dt><img src='images/promote.png' alt=""/></dt>
                <dd>
                    <h2><a href="# " target="_blank ">微商城系统</a></h2>
                    <p>提供一整套解决方案</p>
                    <p><em>Visual brand</em></p>
                </dd>
            </dl>
        </div>
    </div>
    </div>

<?php

$query = "select * from cases order by image desc LIMIT 0,6";
$result = @$conn->query($query);
if (!$result) {
    exit;
}
$num = @$result->num_rows;
if ($num > 0) {

    echo '<div class="container-fluid">
  <h2 style="text-align: center; "> <strong>客户案例
    <hr />
    <span>CUSTOMER CASE</span></strong></h2>';
    $result = db_result_to_array($result);
    for ($i = 0; $i < $num; $i++) {
        if ($i % 3 == 0)

            echo <<<case1
        <div class="col-lg-4" style="padding-left: 9%;">
      <div class="parent ">
      <div class="child"><img  id= "myImage{$result[$i]['caseId']}" src="$imgcase{$result[$i]['image']}" alt=" "  onmouseover="changeimg({$result[$i]['caseId']},'$imgcase{$result[$i]['codeimage']}')" onmouseout="sourceimg({$result[$i]['caseId']},'$imgcase{$result[$i]['image']}')"/></div>
      </div>
      <p style="text-align: center">{$result[$i]['title']}</p>
      <p style="color:grey;text-align: center">{$result[$i]['subtitle']}</p>
    </div>
case1;
        else if ($i % 3 == 1)
            echo <<<case2
    <div class="col-lg-4" style="padding-left: 5%;padding-right: 5%;">
    <div class="parent ">
      <div class="child"><img  id= "myImage{$result[$i]['caseId']}" src="$imgcase{$result[$i]['image']}" alt=" "  onmouseover="changeimg({$result[$i]['caseId']},'$imgcase{$result[$i]['codeimage']}')" onmouseout="sourceimg({$result[$i]['caseId']},'$imgcase{$result[$i]['image']}')"/></div>
    </div>
    <p style="text-align: center">{$result[$i]['title']}</p>
      <p style="color:grey;text-align: center">{$result[$i]['subtitle']}</p>
    </div>
case2;
        else
            echo <<<case3
        <div class="col-lg-4" style="padding-right: 10%;">
    <div class="parent">
      <div class="child"><img  id= "myImage{$result[$i]['caseId']}" src="$imgcase{$result[$i]['image']}" alt=" "  onmouseover="changeimg({$result[$i]['caseId']},'$imgcase{$result[$i]['codeimage']}')" onmouseout="sourceimg({$result[$i]['caseId']},'$imgcase{$result[$i]['image']}')"/></div>
    </div>
    <p style="text-align: center">{$result[$i]['title']}</p>
      <p style="color:grey;text-align: center">{$result[$i]['subtitle']}</p>
    </div>
case3;
    }

    echo '</div>';
}

?>

<?php
$query = "select * from news order by newsdate desc LIMIT 0,6";
$result = @$conn->query($query);
if (!$result) {
    exit;
}
$num = @$result->num_rows;
if ($num > 0) {
    echo '<div style="height: auto; margin-top: 80px; margin-bottom: 80px; ">
  <h2 style="text-align: center; "> <strong>微信小程序新闻
    <hr />
    <span>WechatApplet NEWS</span></strong></h2>
  <div class="container-fluid "  style="width: 90%; ">';
    $result = db_result_to_array($result);
    $i = true;
    for ($i = 0; $i < count($result); $i++) {
        if (0 == $i % 2) {
            if ($i == 0) {
                echo '<div class="row ">';
            } else {
                echo '</div><div class="row ">';
            }
        }
        echo
            '<div class="col-lg-6 " style="width: 45%; margin-left: 2.5%; margin-top:2% " >
            <h4><a href="new.php?newsID='.$result[$i]['newsId'].'">' . $result[$i]['title'] . '</a></h4><p>' . substr($result[$i]['content'], 0, 320) . '....</p>
              </div>';
    }
    echo "</div>";
    echo '</div>
    <div style="text-align: center; clear: both; padding-top: 60px; "><a style="padding-top: 20px " href="news.php " target="_blank ">Learn More</a></div>
</div>';
}

?>


<?php
$query = "select * from cooperations order by cooperationId desc LIMIT 0,24";
$result = @$conn->query($query);
if (!$result) {
    exit;
}
$num_cats = @$result->num_rows;
if ($num_cats > 0) {
    echo '<div>
  <h2 style="text-align: center; padding-top: 50px ">09年成立以来，我们已服务超过600多家品牌客户<br>
    并且与各个行业的领军品牌保持长期合作</h2>
  <p style="text-align: center; padding-top: 50px; padding-bottom: 50px; ">客户包括宝洁集团 时代地产 南方都市报 广药白云山 黄振龙 广州邮局 百信广场 九毛九 七天酒店 <br>
    威露士 佳宝 百安居 汤臣倍健 粤海集团 本草医药 白云机场 无穷食品</p>
</div>

<div class="container-fluid " style="width: 80%; text-align: center ">';
    $result = db_result_to_array($result);
    $i = true;
    for ($i = 0; $i < count($result); $i++) {

        if (0 == $i % 6) {
            if ($i == 0) {
                echo '<div class="row " style="margin-top: 20px;">';
            } else {
                echo '</div><div class="row " style="margin-top: 20px;">';
            }
        }

        echo '<div class="col-lg-2 "> <img src="' . $imgcompanylogo . $result[$i]['logo'] . ' " alt=" ' . $result[$i]['company_name'] . '"/> </div>';


    }
    echo "</div></div>";
}

?>


<?php
$conn->close();
include_once('include/footer.html');
?>