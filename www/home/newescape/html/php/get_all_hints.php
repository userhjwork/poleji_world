<?php
header('Content-Type: application/json; charset=utf-8');
include('./connect_db.php');

$sql = "SELECT id, hint_number, hint_text, hint_image, answer_text, answer_image, created_at FROM tbl_newescape_hints ORDER BY hint_number ASC";
$result = $conn->query($sql);

if ($result) {
    $hints = [];
    while ($row = $result->fetch_assoc()) {
        $hints[] = $row;
    }
    echo json_encode(['success' => true, 'hints' => $hints]);
} else {
    echo json_encode(['success' => false, 'error' => '힌트 목록을 불러오는데 실패했습니다: ' . $conn->error]);
}

$conn->close();
?> 