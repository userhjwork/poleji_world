<?php
include('./connect_db.php');

try {
    // 부서별 카테고리 테이블 생성
    $sql = "CREATE TABLE IF NOT EXISTS tbl_dept_categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        department VARCHAR(50) NOT NULL,
        ctgry_level INT NOT NULL COMMENT '1: 1차 카테고리, 2: 2차 카테고리, 3: 3차 카테고리',
        parent_id INT DEFAULT NULL COMMENT '상위 카테고리 ID (2차는 1차의 ID, 3차는 2차의 ID)',
        category_name VARCHAR(100) NOT NULL,
        description TEXT,
        sort_order INT DEFAULT 0,
        is_active BOOLEAN DEFAULT TRUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        UNIQUE KEY unique_category (department, ctgry_level, parent_id, category_name)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    $pdo->exec($sql);
    echo "카테고리 테이블이 성공적으로 생성되었습니다.";

} catch(PDOException $e) {
    echo "테이블 생성 실패: " . $e->getMessage();
}
?> 