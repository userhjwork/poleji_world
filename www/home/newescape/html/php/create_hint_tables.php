<?php
include('./connect_db.php');

// 힌트 테이블 생성
$sql = "CREATE TABLE IF NOT EXISTS tbl_newescape_hints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hint_number VARCHAR(10) NOT NULL UNIQUE,
    hint_text TEXT NOT NULL,
    hint_image VARCHAR(255),
    answer_text TEXT NOT NULL,
    answer_image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "힌트 테이블이 성공적으로 생성되었습니다.<br>";
} else {
    echo "테이블 생성 오류: " . $conn->error . "<br>";
}

// 샘플 힌트 데이터 삽입
$sample_hints = [
    [
        'hint_number' => '001',
        'hint_text' => '첫 번째 힌트입니다. 방 안에서 빨간색 물체를 찾아보세요.',
        'hint_image' => '',
        'answer_text' => '정답: 빨간색 상자 안에 있는 열쇠를 사용하세요.',
        'answer_image' => ''
    ],
    [
        'hint_number' => '002',
        'hint_text' => '두 번째 힌트입니다. 책장의 세 번째 선반을 확인해보세요.',
        'hint_image' => '',
        'answer_text' => '정답: 책장에서 숨겨진 메모지를 찾아 숫자를 확인하세요.',
        'answer_image' => ''
    ],
    [
        'hint_number' => '003',
        'hint_text' => '세 번째 힌트입니다. 바닥의 타일을 자세히 살펴보세요.',
        'hint_image' => '',
        'answer_text' => '정답: 특정 타일에 숨겨진 패턴을 따라 문을 열 수 있습니다.',
        'answer_image' => ''
    ]
];

foreach ($sample_hints as $hint) {
    $sql = "INSERT IGNORE INTO tbl_newescape_hints (hint_number, hint_text, hint_image, answer_text, answer_image) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $hint['hint_number'], $hint['hint_text'], $hint['hint_image'], $hint['answer_text'], $hint['answer_image']);
    
    if ($stmt->execute()) {
        echo "힌트 {$hint['hint_number']}이(가) 추가되었습니다.<br>";
    } else {
        echo "힌트 추가 오류: " . $stmt->error . "<br>";
    }
    $stmt->close();
}

$conn->close();
echo "힌트 시스템 설정이 완료되었습니다.";
?> 