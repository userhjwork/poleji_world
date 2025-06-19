<?php
// 에러 표시 활성화
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<h1>OCR 프로젝트 - 데이터베이스 연결 테스트</h1>";

// 데이터베이스 연결 정보
$servername = "poleji.cafe24.com";
$username = "poleji";
$password = "vhvhfdyd>98";
$dbname = "poleji";

echo "<h2>1. 데이터베이스 연결 테스트</h2>";

try {
    // MySQL 데이터베이스에 연결
    $conn = mysqli_connect($servername, $username, $password);
    
    if ($conn->connect_error) {
        echo "<p style='color: red;'>❌ MySQL 연결 실패: " . $conn->connect_error . "</p>";
        exit();
    } else {
        echo "<p style='color: green;'>✅ MySQL 연결 성공</p>";
    }
    
    // 데이터베이스 선택
    if (mysqli_select_db($conn, $dbname)) {
        echo "<p style='color: green;'>✅ 데이터베이스 선택 성공</p>";
    } else {
        echo "<p style='color: red;'>❌ 데이터베이스 선택 실패</p>";
        exit();
    }
    
    echo "<h2>2. 테이블 존재 확인</h2>";
    
    // 관리자 테이블 확인
    $result = $conn->query("SHOW TABLES LIKE 'ocr_project_admin'");
    if ($result->num_rows > 0) {
        echo "<p style='color: green;'>✅ ocr_project_admin 테이블 존재</p>";
    } else {
        echo "<p style='color: red;'>❌ ocr_project_admin 테이블 없음</p>";
    }
    
    // 사용자 테이블 확인
    $result = $conn->query("SHOW TABLES LIKE 'ocr_project_user'");
    if ($result->num_rows > 0) {
        echo "<p style='color: green;'>✅ ocr_project_user 테이블 존재</p>";
    } else {
        echo "<p style='color: red;'>❌ ocr_project_user 테이블 없음</p>";
    }
    
    // OCR 결과 테이블 확인
    $result = $conn->query("SHOW TABLES LIKE 'ocr_project_ocr_result'");
    if ($result->num_rows > 0) {
        echo "<p style='color: green;'>✅ ocr_project_ocr_result 테이블 존재</p>";
    } else {
        echo "<p style='color: red;'>❌ ocr_project_ocr_result 테이블 없음</p>";
    }
    
    echo "<h2>3. PHP 버전 확인</h2>";
    echo "<p>PHP 버전: " . phpversion() . "</p>";
    
    echo "<h2>4. 필요한 PHP 확장 확인</h2>";
    if (extension_loaded('mysqli')) {
        echo "<p style='color: green;'>✅ mysqli 확장 로드됨</p>";
    } else {
        echo "<p style='color: red;'>❌ mysqli 확장 로드되지 않음</p>";
    }
    
    if (function_exists('password_hash')) {
        echo "<p style='color: green;'>✅ password_hash 함수 사용 가능</p>";
    } else {
        echo "<p style='color: red;'>❌ password_hash 함수 사용 불가</p>";
    }
    
    $conn->close();
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ 오류 발생: " . $e->getMessage() . "</p>";
}
?>

<h2>5. 다음 단계</h2>
<p>테이블이 없다면 다음 링크를 클릭하여 테이블을 생성하세요:</p>
<p><a href="admin/php/create_tables.php" style="padding: 10px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">관리자 테이블 생성</a></p>
<p><a href="user/php/create_tables.php" style="padding: 10px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">사용자 테이블 생성</a></p> 