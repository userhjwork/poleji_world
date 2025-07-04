<?php
header('Content-Type: application/json; charset=utf-8');
include('./connect_db.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'POST 요청만 허용됩니다.']);
    exit;
}

$id = $_POST['id'] ?? '';

if (empty($id)) {
    echo json_encode(['success' => false, 'error' => 'ID가 필요합니다.']);
    exit;
}

// 힌트 삭제
$sql = "DELETE FROM tbl_newescape_hints WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => '힌트가 성공적으로 삭제되었습니다.']);
    } else {
        echo json_encode(['success' => false, 'error' => '해당 ID의 힌트를 찾을 수 없습니다.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => '삭제 중 오류가 발생했습니다: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?> 