<?php
header("Content-Type: application/json; charset=utf-8");
$conn = new mysqli("localhost", "dbuser", "dbpass", "dbname");
if ($conn->connect_error) { echo "[]"; exit; }
$result = $conn->query("SELECT * FROM police_ranks ORDER BY code");
$out = [];
while ($row = $result->fetch_assoc()) $out[] = $row;
echo json_encode($out, JSON_UNESCAPED_UNICODE);
?>