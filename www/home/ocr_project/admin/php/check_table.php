<?php
// 에러 표시 활성화
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('./connect_db.php');

echo "<h2>데이터베이스 연결 테스트</h2>";

if ($conn) {
    echo "<p style='color: green;'>✅ 데이터베이스 연결 성공</p>";
    
    // 테이블 존재 확인
    $result = $conn->query("SHOW TABLES LIKE 'ocr_project_admin'");
    if ($result->num_rows > 0) {
        echo "<p style='color: green;'>✅ ocr_project_admin 테이블 존재</p>";
        
        // 테이블 구조 확인
        $result = $conn->query("DESCRIBE ocr_project_admin");
        echo "<h3>테이블 구조:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Field'] . "</td>";
            echo "<td>" . $row['Type'] . "</td>";
            echo "<td>" . $row['Null'] . "</td>";
            echo "<td>" . $row['Key'] . "</td>";
            echo "<td>" . $row['Default'] . "</td>";
            echo "<td>" . $row['Extra'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
    } else {
        echo "<p style='color: red;'>❌ ocr_project_admin 테이블이 존재하지 않습니다.</p>";
        echo "<p><a href='create_tables.php'>테이블 생성하기</a></p>";
    }
    
} else {
    echo "<p style='color: red;'>❌ 데이터베이스 연결 실패</p>";
}

$conn->close();
?> 