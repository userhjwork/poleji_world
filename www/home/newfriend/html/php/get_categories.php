<?php
include('./connect_db.php');

header('Content-Type: application/json');

try {
    $department = $_GET['department'] ?? '';
    
    if (empty($department)) {
        throw new Exception('부서가 지정되지 않았습니다.');
    }

    // 1차 카테고리 조회
    $stmt1 = $pdo->prepare("
        SELECT id, category_name, description, sort_order, is_active 
        FROM tbl_dept_categories 
        WHERE department = ? AND ctgry_level = 1 AND is_active = TRUE 
        ORDER BY sort_order, category_name
    ");
    $stmt1->execute([$department]);
    $ctgry1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    // 2차 카테고리 조회
    $stmt2 = $pdo->prepare("
        SELECT c.id, c.category_name, c.description, c.sort_order, c.is_active, c.parent_id,
               p.category_name as parent_name
        FROM tbl_dept_categories c
        LEFT JOIN tbl_dept_categories p ON c.parent_id = p.id
        WHERE c.department = ? AND c.ctgry_level = 2 AND c.is_active = TRUE 
        ORDER BY c.sort_order, c.category_name
    ");
    $stmt2->execute([$department]);
    $ctgry2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    // 3차 카테고리 조회
    $stmt3 = $pdo->prepare("
        SELECT c.id, c.category_name, c.description, c.sort_order, c.is_active, c.parent_id,
               p.category_name as parent_name
        FROM tbl_dept_categories c
        LEFT JOIN tbl_dept_categories p ON c.parent_id = p.id
        WHERE c.department = ? AND c.ctgry_level = 3 AND c.is_active = TRUE 
        ORDER BY c.sort_order, c.category_name
    ");
    $stmt3->execute([$department]);
    $ctgry3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'ctgry1' => $ctgry1,
        'ctgry2' => $ctgry2,
        'ctgry3' => $ctgry3
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
?> 