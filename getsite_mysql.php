<?php
Error_reporting(E_ALL);
INI_Set('display_errors','on');
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';
if(empty($q)) {
	    echo '请选择一个网站';
	//    exit;
}

$con = mysqli_connect('localhost','root','haitao');
if (!$con)
{
	    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con,"lyb");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");
 
$sql="SELECT * FROM websites WHERE id = '".$q."'";
 
$result = mysqli_query($con,$sql);
if (!$result) {
	 printf("Error: %s\n", mysqli_error($con));
	  exit();
}
echo "<table border='1'>
	<tr>
	<th>ID</th>
	<th>网站名</th>
	<th>网站 URL</th>
	<th>Alexa 排名</th>
	<th>国家</th>
	</tr>";
 
while($row = mysqli_fetch_array($result))
{
	    echo "<tr>";
	    echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['url'] . "</td>";
		echo "<td>" . $row['alexa'] . "</td>";
		echo "<td>" . $row['country'] . "</td>";
		echo "</tr>";
}
echo "</table>";
 
mysqli_close($con);
?>

