<?php 
 include_once('include/include.php');
   $conn = db_connect();
   $conn->query("set character set utf8");//读库 
   $conn->query("set names utf8");//写库 
?>

    <div style="text-align: center; margin-top: 80px;">
      <h1>聆听需求</h1>
      <h1>获得最默契的交流，成就最愉悦的合作</h1>
      <pre class="au_pre">广州聆科网络技术有限公司成立于2009年，至2017年共8年时间，为宝洁、广州邮政、白云机场、7天酒店、威露士、汤臣倍健、南方都市报、时代地产、黄振龙等知名企业提供技术及移动营销服务。
      我们拥有多个推广运营方式，结合不同的媒体资源、合作渠道，帮助企业全方位推广移动应用及微信公众号 
      真正能帮助到企业实现移动销售增长、增加会员数、减少传播推广成本、降低人力资源成本
      为企业提供更完善专业的微信代运营服务，从企业需求出发，运营策略精益求精。 
      聆科网络是广州市现代服务业协会理事单位、广东省网商协会理事单位、广东省电子商务协会会员、广东省云计算应用协会会员。</pre>
      <img src="images/about_link.jpg" alt="">
      <h1>品质&服务的保障来自聆科核心团队</h1>
      <pre  class="au_pre"> 聆科拥有经验丰富的运营和技术团队，既能提供富有创意的方案，又有技术团队将方案落地。 
      他们将贯彻聆科网络公司文化：认真、高品质和对细节追求的工作态度，为客户创造更多的移动互联网价值。
      </pre>

    </div>
  <?php
    $query = "select * from employees";
  $result = @$conn->query($query);
  if (!$result) {
    exit;
  }
  $num_cats = @$result->num_rows;
  if ($num_cats > 0) {
    $result = db_result_to_array($result);
    echo '<div class="container-fluid" >';

    for($i = 0; $i < count($result); $i++,$j = 1){
      if(0 == $i%3){
        $j = 0;
        if($i == 0){
        echo '<div class="row " style="margin-top:20px">';
        }else{
          echo '</div><div class="row " style="margin-top:20px">';
        }
      }

      if($j == 0)
        echo '<div class="col-lg-offset-2 col-lg-2">';
      else
        echo '<div class="col-lg-offset-1 col-lg-2">';

      echo '<img src="'.$imgpeople.$result[$i]['headimage'].'" />
        <p style="padding-left: 55px;
    padding-top: 10px;">'.$result[$i]['name'].'</p>
        <p>'.$result[$i]['Profile'].'</p>
        </div>';
    }

    echo '</div>';
  }
  ?>
    
  <?php
    $query = "select * from cooperations order by cooperationId desc LIMIT 0,30";
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
    for($i=0; $i<count($result); $i++)  
    {
      
      if(0 == $i%6){
        if($i == 0){
        echo '<div class="row " >';
        }else{
          echo '</div><div class="row ">';
        }
      }

      echo '<div class="col-lg-2 "> <img src="'.$imgcompanylogo.$result[$i]['logo'].' " alt=" '.$result[$i]['company_name'].'"/> </div>';

    
    }
    echo "</div></div>";
  }
  
?>


<?php 
  $conn->close();
  include_once('include/footer.html');
?>