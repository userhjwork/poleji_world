<?php
include('./connect_db.php');

$sql = "SELECT ctgry_1, ctgry_2, ctgry_3, ctgry_desc FROM tbl_church_out_ctgry ORDER BY ctgry_id";
$result = $conn->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
    $c1 = $row['ctgry_1'];
    $c2 = $row['ctgry_2'];
    $c3 = $row['ctgry_3'];
    $desc = $row['ctgry_desc'];

    if (!isset($data[$c1])) $data[$c1] = [];
    if (!isset($data[$c1][$c2])) $data[$c1][$c2] = [];

    // 설명까지 묶어서 배열에 추가
    $data[$c1][$c2][] = [
        "name" => $c3,
        "desc" => $desc
    ];
}

header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);
