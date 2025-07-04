<?php
session_start();
header('Content-Type: application/json');

// 로그인 확인
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo json_encode(['success' => false, 'message' => '관리자 로그인이 필요합니다.']);
    exit();
}

include('./connect_db.php');

try {
    $id = $_POST['id'] ?? 0;
    
    if (empty($id)) {
        echo json_encode(['success' => false, 'message' => 'ID가 필요합니다.']);
        exit();
    }

    $sql = "SELECT * FROM ocr_project_pending_approval WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $data = $result->fetch_assoc();
        echo json_encode(['success' => true, 'data' => $data]);
    } else {
        echo json_encode(['success' => false, 'message' => '해당 데이터를 찾을 수 없습니다.']);
    }

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => '상세 정보 조회 중 오류가 발생했습니다: ' . $e->getMessage()]);
}

$stmt->close();
$conn->close();
?> 