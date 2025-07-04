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
    // 필터 파라미터 받기
    $status = $_POST['status'] ?? '';
    $cardType = $_POST['card_type'] ?? '';
    $search = $_POST['search'] ?? '';

    // 기본 쿼리
    $sql = "SELECT * FROM ocr_project_pending_approval WHERE 1=1";
    $params = [];
    $types = "";

    // 상태 필터
    if (!empty($status)) {
        $sql .= " AND status = ?";
        $params[] = $status;
        $types .= "s";
    }

    // 카드 타입 필터
    if (!empty($cardType)) {
        $sql .= " AND card_type = ?";
        $params[] = $cardType;
        $types .= "s";
    }

    // 검색 필터
    if (!empty($search)) {
        $sql .= " AND (user_username LIKE ? OR card_number LIKE ? OR name LIKE ?)";
        $searchTerm = "%$search%";
        $params[] = $searchTerm;
        $params[] = $searchTerm;
        $params[] = $searchTerm;
        $types .= "sss";
    }

    // 정렬 (최신순)
    $sql .= " ORDER BY uploaded_at DESC";

    $stmt = $conn->prepare($sql);
    
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode(['success' => true, 'data' => $data]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => '데이터 조회 중 오류가 발생했습니다: ' . $e->getMessage()]);
}

$stmt->close();
$conn->close();
?> 