<?php
include('./connect_db.php');

echo "<h1>OCR 승인 시스템 테이블 확인</h1>";

// 테이블 존재 확인
$tables = [
    'ocr_project_pending_approval' => '승인 대기 테이블',
    'ocr_project_approval_log' => '승인 로그 테이블'
];

foreach ($tables as $table => $description) {
    $result = $conn->query("SHOW TABLES LIKE '$table'");
    if ($result->num_rows > 0) {
        echo "<p style='color: green;'>✅ $description ($table) - 존재함</p>";
        
        // 테이블 구조 확인
        $structure = $conn->query("DESCRIBE $table");
        echo "<table border='1' style='margin: 10px 0; border-collapse: collapse;'>";
        echo "<tr><th>필드</th><th>타입</th><th>NULL</th><th>키</th><th>기본값</th></tr>";
        while ($row = $structure->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['Field']}</td>";
            echo "<td>{$row['Type']}</td>";
            echo "<td>{$row['Null']}</td>";
            echo "<td>{$row['Key']}</td>";
            echo "<td>{$row['Default']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: red;'>❌ $description ($table) - 존재하지 않음</p>";
    }
}

// 샘플 데이터 확인
echo "<h2>샘플 데이터 확인</h2>";

$pending_count = $conn->query("SELECT COUNT(*) as count FROM ocr_project_pending_approval")->fetch_assoc()['count'];
$log_count = $conn->query("SELECT COUNT(*) as count FROM ocr_project_approval_log")->fetch_assoc()['count'];

echo "<p>승인 대기 데이터: $pending_count 건</p>";
echo "<p>승인 로그 데이터: $log_count 건</p>";

if ($pending_count > 0) {
    echo "<h3>최근 승인 대기 데이터 (최대 5건)</h3>";
    $recent_data = $conn->query("SELECT * FROM ocr_project_pending_approval ORDER BY uploaded_at DESC LIMIT 5");
    echo "<table border='1' style='border-collapse: collapse;'>";
    echo "<tr><th>ID</th><th>사용자</th><th>카드타입</th><th>상태</th><th>업로드시간</th></tr>";
    while ($row = $recent_data->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['user_username']}</td>";
        echo "<td>{$row['card_type']}</td>";
        echo "<td>{$row['status']}</td>";
        echo "<td>{$row['uploaded_at']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}

$conn->close();
?>

<p style="margin-top: 20px;">
    <a href="../setup_approval.php" style="padding: 10px; background: #667eea; color: white; text-decoration: none; border-radius: 5px;">설정 페이지로 돌아가기</a>
</p> 