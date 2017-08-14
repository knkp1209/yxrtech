<?php
include_once('include/include.php');

$conn = db_connect();
$conn->query("set character set utf8");//读库
$conn->query("set names utf8");//写库

?>


<?php
$newsId = @$_GET['newsID'];
$query = "select * from news where newsId = " . $newsId;
$result = @$conn->query($query);
if (!$result) {
    exit;
}

$num = @$result->num_rows;
if ($num > 0) {
    $news = $result->fetch_object();
    echo "<div  style=\"width:60%; margin: 0 auto;\">";
    echo "<h2  style=\"text-align:center;\">$news->title</h2>";
    echo "<p>$news->newsdate</p>";
    echo "<img src=\"$imgnews$news->image\" height=\"500px\" width=\"820px\" />";
    echo "<p style=\"line-height: 1.8em; font-size: 1.2em;\">$news->content</p>";
    echo "</div>";

}


?>


<?php
$conn->close();
include_once('include/footer.html');
?>