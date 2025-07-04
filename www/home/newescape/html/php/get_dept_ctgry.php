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
        SELECT category_name 
        FROM tbl_dept_categories 
        WHERE department = ? AND ctgry_level = 1 AND is_active = TRUE 
        ORDER BY sort_order, category_name
    ");
    $stmt1->execute([$department]);
    $ctgry1 = $stmt1->fetchAll(PDO::FETCH_COLUMN);

    // 2차 카테고리 조회
    $stmt2 = $pdo->prepare("
        SELECT p.category_name as parent, c.category_name
        FROM tbl_dept_categories c
        JOIN tbl_dept_categories p ON c.parent_id = p.id
        WHERE c.department = ? AND c.ctgry_level = 2 AND c.is_active = TRUE 
        ORDER BY c.sort_order, c.category_name
    ");
    $stmt2->execute([$department]);
    $ctgry2 = [];
    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        if (!isset($ctgry2[$row['parent']])) {
            $ctgry2[$row['parent']] = [];
        }
        $ctgry2[$row['parent']][] = $row['category_name'];
    }

    // 3차 카테고리 조회
    $stmt3 = $pdo->prepare("
        SELECT p.category_name as parent, c.category_name, c.description
        FROM tbl_dept_categories c
        JOIN tbl_dept_categories p ON c.parent_id = p.id
        WHERE c.department = ? AND c.ctgry_level = 3 AND c.is_active = TRUE 
        ORDER BY c.sort_order, c.category_name
    ");
    $stmt3->execute([$department]);
    $ctgry3 = [];
    while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
        if (!isset($ctgry3[$row['parent']])) {
            $ctgry3[$row['parent']] = [];
        }
        $ctgry3[$row['parent']][] = [$row['category_name'], $row['description']];
    }

    echo json_encode([
        'ctgry_1' => $ctgry1,
        'ctgry_2' => $ctgry2,
        'ctgry_3' => $ctgry3
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
?> 