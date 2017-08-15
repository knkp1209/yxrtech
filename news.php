<?php
include_once('include/include.php');

$conn = db_connect();
$conn->query("set character set utf8");//读库
$conn->query("set names utf8");//写库

?>

    <div class="container-fluid" style="text-align: center;margin-top: 60px;">
        <h1>微信小程序新闻</h1>
        <h4 style="margin-top: 30px;">没经验？ 没人才？不怕！</h4>
        <h4 style="margin-top: 10px; margin-bottom: 40px;">我们愿与您分享专业知识和成功经验，我们一起学习成长！</h4>
    </div>

<?php
$query = "select * from news where catId = 1 order by newsdate desc";
$result = @$conn->query($query);
if (!$result) {
    exit;
}
$num = @$result->num_rows;
if ($num > 0) {
    $result = db_result_to_array($result);
    echo '<div class="container-fluid">';

    for ($i = 0; $i < count($result); $i++) {
        echo '<a href="new.php?newsID='.$result[$i]['newsId'].'"><div class="row" style="height: 170px; margin-bottom: 30px;">
            <div class="col-lg-offset-1 col-lg-2" >
                <img src="' . $imgnews . $result[$i]['image'] . '" alt=""  height="170px;" width="220px;" />
            </div>
            <div class="col-lg-1" style="margin-left:30px; margin-top: 50px;" >
                <p>' . substr($result[$i]['newsdate'], 5,5) . '<br />' . substr($result[$i]['newsdate'], 0, 4) . '</p>
            </div>
            <div class="col-lg-7" style="height:140px; overflow-y:hidden">
            <p style="margin-top: 20px; font-size: 20px;"><a href="new.php?newsID='.$result[$i]['newsId']. '">' . $result[$i]['title'] . '</a></p>
            <p>' . $result[$i]['content'] . '</p>
            </div>
        </div></a>';
    }

    echo '</div>';
}

?>


<?php
$conn->close();
include_once('include/footer.html');
?>