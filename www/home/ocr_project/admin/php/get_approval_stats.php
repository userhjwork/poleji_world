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
    // 각 상태별 개수 조회
    $sql = "SELECT 
                status,
                COUNT(*) as count
            FROM ocr_project_pending_approval 
            GROUP BY status";
    
    $result = $conn->query($sql);
    
    $stats = [
        'pending' => 0,
        'approved' => 0,
        'rejected' => 0,
        'total' => 0
    ];
    
    while ($row = $result->fetch_assoc()) {
        $stats[$row['status']] = (int)$row['count'];
        $stats['total'] += (int)$row['count'];
    }

    echo json_encode(['success' => true, 'stats' => $stats]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => '통계 조회 중 오류가 발생했습니다: ' . $e->getMessage()]);
}

$conn->close();
?> 