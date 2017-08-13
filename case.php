<?php 
  include_once('include/include.php');

  $conn = db_connect();
  $conn->query("set character set utf8");
  $conn->query("set names utf8");
  $imagesurl = 'images/';
?>


    <div class="container-fluid" style="text-align: center;margin-top: 60px;">
        <h1>客户案例</h1>
        <h4 style= "margin-top: 30px;">拥有运营+技术的团队，以客户需求为依归</h4>
        <h4 style= "margin-top: 10px;">附于专业的运营经验和技术，为客户提供最适合的解决方案</h4>
    </div>

<?php
  $query = "select * from cases order by image desc";
  $result = @$conn->query($query);
  if (!$result) {
    exit;
  }
  $num = @$result->num_rows;
  if ($num > 0) {
    echo '<div class="container-fluid cust" style="background: white">';
    $result = db_result_to_array($result);
  for ($i = 0; $i < $num; $i++){
    if($i % 3 == 0)

      echo <<<case1
        <div class="col-lg-4" style="padding-left: 9%;">
      <div class="parent ">
      <div class="child"><img  id= "myImage{$result[$i]['caseId']}" src="$imgcase{$result[$i]['image']}" alt=" "  onmouseover="changeimg({$result[$i]['caseId']},'$imgcase{$result[$i]['codeimage']}')" onmouseout="sourceimg({$result[$i]['caseId']},'$imgcase{$result[$i]['image']}')"/></div>
      </div>
      <p style="text-align: center">{$result[$i]['title']}</p>
      <p style="color:grey;text-align: center">{$result[$i]['subtitle']}</p>
    </div>
case1;
    else if($i % 3 == 1)
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
  $conn->close();
  include_once('include/footer.html');
?>