<?php
header("Content-Type: application/json; charset=utf-8");
$conn = new mysqli("localhost", "dbuser", "dbpass", "dbname");
if ($conn->connect_error) { echo '{"success":false}'; exit; }
$data = json_decode(file_get_contents("php://input"), true);
foreach($data["rows"] as $row) {
    $code = $conn->real_escape_string($row["code"]);
    $name = $conn->real_escape_string($row["name"]);
    $rank = $conn->real_escape_string($row["rank"]);
    $point = intval($row["point"]);
    $courses = $conn->real_escape_string($row["courses"]);
    $discord_id = $conn->real_escape_string($row["discord_id"]);
    $vacation = $conn->real_escape_string($row["vacation"]);
    $promotion = $conn->real_escape_string($row["promotion"]);
    $sql = "UPDATE police_ranks SET name='$name', rank='$rank', point=$point, courses='$courses', discord_id='$discord_id', vacation='$vacation', promotion='$promotion' WHERE code='$code'";
    $conn->query($sql);
}
echo '{"success":true}';
?>