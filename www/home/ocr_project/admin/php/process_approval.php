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
    $action = $_POST['action'] ?? '';
    $comment = $_POST['comment'] ?? '';
    $admin_id = $_SESSION['admin_id'];

    if (empty($id) || empty($action)) {
        echo json_encode(['success' => false, 'message' => '필수 파라미터가 누락되었습니다.']);
        exit();
    }

    if (!in_array($action, ['approve', 'reject'])) {
        echo json_encode(['success' => false, 'message' => '잘못된 액션입니다.']);
        exit();
    }

    // 트랜잭션 시작
    $conn->begin_transaction();

    try {
        // 1. 승인 대기 데이터 조회
        $sql_select = "SELECT * FROM ocr_project_pending_approval WHERE id = ? AND status = 'pending'";
        $stmt_select = $conn->prepare($sql_select);
        $stmt_select->bind_param("i", $id);
        $stmt_select->execute();
        $result = $stmt_select->get_result();

        if ($result->num_rows !== 1) {
            throw new Exception('처리할 수 있는 데이터가 없습니다.');
        }

        $pending_data = $result->fetch_assoc();

        // 2. 로그 테이블에 기록
        $sql_log = "INSERT INTO ocr_project_approval_log 
                    (pending_id, user_id, user_username, card_type, card_number, name, action, admin_comment, processed_by) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_log = $conn->prepare($sql_log);
        $stmt_log->bind_param("iisssssi", 
            $pending_data['id'],
            $pending_data['user_id'],
            $pending_data['user_username'],
            $pending_data['card_type'],
            $pending_data['card_number'],
            $pending_data['name'],
            $action,
            $comment,
            $admin_id
        );
        $stmt_log->execute();

        // 3. 승인 대기 테이블에서 삭제
        $sql_delete = "DELETE FROM ocr_project_pending_approval WHERE id = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("i", $id);
        $stmt_delete->execute();

        // 트랜잭션 커밋
        $conn->commit();

        echo json_encode(['success' => true, 'message' => '처리가 완료되었습니다.']);

    } catch (Exception $e) {
        // 트랜잭션 롤백
        $conn->rollback();
        throw $e;
    }

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => '처리 중 오류가 발생했습니다: ' . $e->getMessage()]);
}

$conn->close();
?> 