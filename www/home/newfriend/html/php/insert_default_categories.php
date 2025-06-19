<?php
include('./connect_db.php');

try {
    // 트랜잭션 시작
    $pdo->beginTransaction();

    // 기본 카테고리 데이터 정의
    $default_categories = [
        '바울새가족부' => [
            'ctgry1' => [
                ['name' => '예배', 'sort' => 1],
                ['name' => '교육', 'sort' => 2],
                ['name' => '친교', 'sort' => 3],
                ['name' => '전도', 'sort' => 4],
                ['name' => '행정', 'sort' => 5],
                ['name' => '기타', 'sort' => 6]
            ],
            'ctgry2' => [
                '예배' => [
                    ['name' => '예배준비', 'sort' => 1, 'desc' => '예배 준비에 필요한 물품 구매'],
                    ['name' => '예배후정리', 'sort' => 2, 'desc' => '예배 후 정리 및 청소 관련 비용'],
                    ['name' => '예배음향', 'sort' => 3, 'desc' => '음향 장비 및 음향 관련 비용'],
                    ['name' => '예배영상', 'sort' => 4, 'desc' => '영상 장비 및 영상 관련 비용'],
                    ['name' => '기타', 'sort' => 5, 'desc' => '기타 예배 관련 비용']
                ],
                '교육' => [
                    ['name' => '성경공부', 'sort' => 1, 'desc' => '성경공부 교재 및 자료 비용'],
                    ['name' => '리더교육', 'sort' => 2, 'desc' => '리더 교육 및 훈련 비용'],
                    ['name' => '신입교육', 'sort' => 3, 'desc' => '신입 교육 및 오리엔테이션 비용'],
                    ['name' => '기타', 'sort' => 4, 'desc' => '기타 교육 관련 비용']
                ],
                '친교' => [
                    ['name' => '식사', 'sort' => 1, 'desc' => '식사 및 회식 비용'],
                    ['name' => '간식', 'sort' => 2, 'desc' => '간식 및 다과 비용'],
                    ['name' => '행사', 'sort' => 3, 'desc' => '행사 및 모임 비용'],
                    ['name' => '기타', 'sort' => 4, 'desc' => '기타 친교 관련 비용']
                ],
                '전도' => [
                    ['name' => '전도행사', 'sort' => 1, 'desc' => '전도 행사 관련 비용'],
                    ['name' => '전도물품', 'sort' => 2, 'desc' => '전도용 물품 구매 비용'],
                    ['name' => '기타', 'sort' => 3, 'desc' => '기타 전도 관련 비용']
                ],
                '행정' => [
                    ['name' => '사무용품', 'sort' => 1, 'desc' => '사무용품 구매 비용'],
                    ['name' => '복사비', 'sort' => 2, 'desc' => '복사 및 인쇄 비용'],
                    ['name' => '기타', 'sort' => 3, 'desc' => '기타 행정 관련 비용']
                ],
                '기타' => [
                    ['name' => '기타지출', 'sort' => 1, 'desc' => '기타 지출 항목']
                ]
            ]
        ],
        '청년부' => [
            'ctgry1' => [
                ['name' => '예배', 'sort' => 1],
                ['name' => '교육', 'sort' => 2],
                ['name' => '친교', 'sort' => 3],
                ['name' => '전도', 'sort' => 4],
                ['name' => '행정', 'sort' => 5],
                ['name' => '기타', 'sort' => 6]
            ],
            'ctgry2' => [
                '예배' => [
                    ['name' => '예배준비', 'sort' => 1, 'desc' => '예배 준비에 필요한 물품 구매'],
                    ['name' => '예배후정리', 'sort' => 2, 'desc' => '예배 후 정리 및 청소 관련 비용'],
                    ['name' => '예배음향', 'sort' => 3, 'desc' => '음향 장비 및 음향 관련 비용'],
                    ['name' => '예배영상', 'sort' => 4, 'desc' => '영상 장비 및 영상 관련 비용'],
                    ['name' => '기타', 'sort' => 5, 'desc' => '기타 예배 관련 비용']
                ],
                '교육' => [
                    ['name' => '성경공부', 'sort' => 1, 'desc' => '성경공부 교재 및 자료 비용'],
                    ['name' => '리더교육', 'sort' => 2, 'desc' => '리더 교육 및 훈련 비용'],
                    ['name' => '신입교육', 'sort' => 3, 'desc' => '신입 교육 및 오리엔테이션 비용'],
                    ['name' => '기타', 'sort' => 4, 'desc' => '기타 교육 관련 비용']
                ],
                '친교' => [
                    ['name' => '식사', 'sort' => 1, 'desc' => '식사 및 회식 비용'],
                    ['name' => '간식', 'sort' => 2, 'desc' => '간식 및 다과 비용'],
                    ['name' => '행사', 'sort' => 3, 'desc' => '행사 및 모임 비용'],
                    ['name' => '기타', 'sort' => 4, 'desc' => '기타 친교 관련 비용']
                ],
                '전도' => [
                    ['name' => '전도행사', 'sort' => 1, 'desc' => '전도 행사 관련 비용'],
                    ['name' => '전도물품', 'sort' => 2, 'desc' => '전도용 물품 구매 비용'],
                    ['name' => '기타', 'sort' => 3, 'desc' => '기타 전도 관련 비용']
                ],
                '행정' => [
                    ['name' => '사무용품', 'sort' => 1, 'desc' => '사무용품 구매 비용'],
                    ['name' => '복사비', 'sort' => 2, 'desc' => '복사 및 인쇄 비용'],
                    ['name' => '기타', 'sort' => 3, 'desc' => '기타 행정 관련 비용']
                ],
                '기타' => [
                    ['name' => '기타지출', 'sort' => 1, 'desc' => '기타 지출 항목']
                ]
            ]
        ],
        '기타' => [
            'ctgry1' => [
                ['name' => '일반지출', 'sort' => 1],
                ['name' => '기타', 'sort' => 2]
            ],
            'ctgry2' => [
                '일반지출' => [
                    ['name' => '사무용품', 'sort' => 1, 'desc' => '사무용품 구매 비용'],
                    ['name' => '행사비', 'sort' => 2, 'desc' => '행사 관련 비용'],
                    ['name' => '기타', 'sort' => 3, 'desc' => '기타 일반 지출']
                ],
                '기타' => [
                    ['name' => '기타지출', 'sort' => 1, 'desc' => '기타 지출 항목']
                ]
            ]
        ]
    ];

    // 기존 데이터 삭제
    $pdo->exec("DELETE FROM tbl_dept_categories");

    // 카테고리 데이터 삽입
    foreach ($default_categories as $department => $categories) {
        // 1차 카테고리 삽입
        $ctgry1_ids = [];
        foreach ($categories['ctgry1'] as $ctgry1) {
            $stmt = $pdo->prepare("
                INSERT INTO tbl_dept_categories 
                (department, ctgry_level, category_name, sort_order) 
                VALUES (?, 1, ?, ?)
            ");
            $stmt->execute([$department, $ctgry1['name'], $ctgry1['sort']]);
            $ctgry1_ids[$ctgry1['name']] = $pdo->lastInsertId();
        }

        // 2차 카테고리 삽입
        $ctgry2_ids = [];
        foreach ($categories['ctgry2'] as $parent_name => $ctgry2_list) {
            foreach ($ctgry2_list as $ctgry2) {
                $stmt = $pdo->prepare("
                    INSERT INTO tbl_dept_categories 
                    (department, ctgry_level, parent_id, category_name, description, sort_order) 
                    VALUES (?, 2, ?, ?, ?, ?)
                ");
                $stmt->execute([
                    $department, 
                    $ctgry1_ids[$parent_name], 
                    $ctgry2['name'], 
                    $ctgry2['desc'], 
                    $ctgry2['sort']
                ]);
                $ctgry2_ids[$ctgry2['name']] = $pdo->lastInsertId();
            }
        }

        // 3차 카테고리 삽입 (2차 카테고리와 동일한 이름으로)
        foreach ($categories['ctgry2'] as $parent_name => $ctgry2_list) {
            foreach ($ctgry2_list as $ctgry2) {
                $stmt = $pdo->prepare("
                    INSERT INTO tbl_dept_categories 
                    (department, ctgry_level, parent_id, category_name, description, sort_order) 
                    VALUES (?, 3, ?, ?, ?, ?)
                ");
                $stmt->execute([
                    $department, 
                    $ctgry2_ids[$ctgry2['name']], 
                    $ctgry2['name'], 
                    $ctgry2['desc'], 
                    $ctgry2['sort']
                ]);
            }
        }
    }

    // 트랜잭션 커밋
    $pdo->commit();
    echo "기본 카테고리 데이터가 성공적으로 삽입되었습니다.";

} catch (Exception $e) {
    // 오류 발생 시 롤백
    $pdo->rollBack();
    echo "오류 발생: " . $e->getMessage();
}
?> 