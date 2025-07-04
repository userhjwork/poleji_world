<?php
include('./connect_db.php');

header('Content-Type: application/json');

try {
    $id = $_POST['id'] ?? null;
    $level = $_POST['level'] ?? 0;

    if (empty($id) || empty($level)) {
        throw new Exception('필수 항목이 누락되었습니다.');
    }

    // 하위 카테고리 존재 여부 확인
    if ($level < 3) {
        $stmt = $pdo->prepare("
            SELECT COUNT(*) FROM tbl_dept_categories 
            WHERE parent_id = ? AND ctgry_level = ?
        ");
        $stmt->execute([$id, $level + 1]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception('하위 카테고리가 존재하여 삭제할 수 없습니다.');
        }
    }

    // 카테고리 삭제 (실제로는 비활성화)
    $stmt = $pdo->prepare("
        UPDATE tbl_dept_categories 
        SET is_active = FALSE 
        WHERE id = ? AND ctgry_level = ?
    ");
    $stmt->execute([$id, $level]);

    echo json_encode(['success' => true]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
?> 