<?php 
  include_once('include/include.php');
   $conn = db_connect();
   $conn->query("set character set utf8");//读库 
   $conn->query("set names utf8");//写库 
?>


    <div style="background: url('images/gold/banner1.jpg'); height: 500px; no-repeat center;">
    </div>
    <div  style= "text-align:center; ">
        <h1 style= "font-size: 36px; margin-top: 60px;">为您打造别具一格的<span style="color:#FF0099">特色店铺</span></h1>
        <h4 style= "margin-top: 30px; margin-bottom: 40px">聆科个性定制开发属于你的分销商城</h4>
    </div>
<?php

      $query = "select image from goldslideshows";
      $result = @$conn->query($query);
      if (!$result) {
        exit;
      }
      $num = @$result->num_rows;
      if ($num > 0) {
        echo '<div id="myCarousel" class="carousel slide container" data-ride="carousel" data-interval="2000">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">';
          for($i = 0; $i < $num; $i++){
            if($i == 0)
              echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';
            else
              echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
          }
        echo '</ol>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">';
        $result = db_result_to_array($result);
        $i = true;
        foreach($result as $value){
          if($i){
            echo '<div class="item active"> <img src="'.$imggoldsilde.$value['image']. '" /></div>';
            $i = false;
          }else{
            echo '<div class="item"> <img src="'.$imggoldsilde.$value['image']. '" /></div>';
          }
        }
        echo '</div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>';
      }
?>
    
    

    <div class="container-fluid cust " style="text-align: center">
        <h1 style= "font-size: 36px; margin-top: 60px;">开创全新微分销方案，<span style="color:#FF0099">轻松打造店中店</span></h1>
        <h4 style= "margin-top: 30px;">零成本把客户变成合伙人和分销商</h4>
        <h4 style= "margin-top: 20px;">快速吸粉，成功累计千万粉丝</h4>
        <h4 style= "margin-top: 20px;">扩大品牌知名度，提升品牌影响力，促进品牌销售业绩增长</h4>
        <img src="images/plan.png" alt="" />
    </div>

    <div class="container-fluid" style="text-align: center">
        <h1 style= "font-size: 36px; margin-top: 60px;">一分钟快速开店，<span style="color:#FF0099">一键成为分销商</span></h1>
        <h4 style= "margin-top: 30px;">销售网络迅速裂变</h4>
        <div class="row">
            <div class="col-lg-2 col-lg-offset-1">
            <img src="images/procedure1.png" alt="" />
            <img style="margin-left:25px; " src="images/procedure-right.png" alt="" />
            <p>成为商城会员</p>
            </div>
             <div class="col-lg-2">
            <img src="images/procedure2.png" alt="" />
            <img style="margin-left:25px; " src="images/procedure-right.png" alt="" />
            <p>通过分享分销二维码或链接到朋友圈，发展朋友成为下线会员</p>
            </div>
             <div class="col-lg-2">
            <img src="images/procedure3.png" alt="" />
            <img style="margin-left:25px; " src="images/procedure-right.png" alt="" />
            <p>朋友通过关注二维码或链接进入商城，自动成为下级会员</p>
            </div>
             <div class="col-lg-2">
            <img src="images/procedure4.png" alt="" />
            <img style="margin-left:25px; " src="images/procedure-right.png" alt="" />
            <p>会员在商城购买分销商品</p>
            </div>
             <div class="col-lg-2">
            <img src="images/procedure5.png" alt="" />
            <p>分享上获得相应佣金分成</p>
            </div>
        </div>
    </div>

    <div class="container-fluid cust " style="text-align: center">
        <h1 style= "font-size: 36px; margin-top: 60px;">您的贴身运营管家，
        <span style="color:#FF0099">后台数据尽在掌握</span></h1>
        <h4 style= "margin-top: 30px;">我们的后台数据流量可以即时监控，调取实时信息，不被平台所牵制，店铺所有的运营
</h4>
        <h4 style= "margin-top: 20px;">情况全在掌控中，有利于及时调整营销策略，把控全局拉动店铺人气。</h4>
        <img src="images/admin-photo.png" alt="" />
    </div>



<?php 
  $conn->close();
  include_once('include/footer.html');
?>