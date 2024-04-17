<?php
$address = "127.0.0.1:3306";
$username = "root";
$password = "zhangjiaqi1023";
$dbname = "new_schema";

// 创建连接
$conn = new mysqli($address, $username, $password, $dbname);
 
// 检测连接
if ($conn->connect_error) {
    echo "failed";
    die("连接失败: " . $conn->connect_error);
}

$name = $_REQUEST["name"];

$sql = "SELECT COUNT(*) cnt FROM user;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$num = 0;
$num = (int)($row["cnt"]);

$sql = "INSERT INTO user VALUES('" . $name . "',NOW()," . $num . ");";
echo $num;
$conn->query($sql);

$conn->close();

?>