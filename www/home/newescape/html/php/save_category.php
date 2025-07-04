<?php
include('./connect_db.php');

header('Content-Type: application/json');

try {
    $id = $_POST['id'] ?? null;
    $department = $_POST['department'] ?? '';
    $ctgry_level = $_POST['ctgry_level'] ?? 0;
    $parent_id = $_POST['parent_id'] ?? null;
    $category_name = $_POST['category_name'] ?? '';
    $description = $_POST['description'] ?? '';
    $sort_order = $_POST['sort_order'] ?? 0;
    $is_active = $_POST['is_active'] ?? true;

    // 필수 값 검증
    if (empty($department) || empty($ctgry_level) || empty($category_name)) {
        throw new Exception('필수 항목이 누락되었습니다.');
    }

    // 2차, 3차 카테고리의 경우 parent_id 필수
    if ($ctgry_level > 1 && empty($parent_id)) {
        throw new Exception('상위 카테고리가 지정되지 않았습니다.');
    }

    // 중복 검사
    $stmt = $pdo->prepare("
        SELECT id FROM tbl_dept_categories 
        WHERE department = ? AND ctgry_level = ? AND category_name = ? AND id != ?
    ");
    $stmt->execute([$department, $ctgry_level, $category_name, $id ?? 0]);
    if ($stmt->rowCount() > 0) {
        throw new Exception('이미 존재하는 카테고리명입니다.');
    }

    if ($id) {
        // 기존 카테고리 수정
        $stmt = $pdo->prepare("
            UPDATE tbl_dept_categories 
            SET category_name = ?, description = ?, parent_id = ?, 
                sort_order = ?, is_active = ?
            WHERE id = ? AND department = ? AND ctgry_level = ?
        ");
        $stmt->execute([
            $category_name, $description, $parent_id, 
            $sort_order, $is_active, $id, $department, $ctgry_level
        ]);
    } else {
        // 새 카테고리 추가
        $stmt = $pdo->prepare("
            INSERT INTO tbl_dept_categories 
            (department, ctgry_level, parent_id, category_name, description, sort_order, is_active)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $department, $ctgry_level, $parent_id, 
            $category_name, $description, $sort_order, $is_active
        ]);
    }

    echo json_encode(['success' => true]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
?> 