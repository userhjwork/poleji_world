<?php
$servername = "poleji.cafe24.com"; // MySQL 서버 주소
$username = "poleji"; // MySQL 사용자 이름
$password = "vhvhfdyd>98"; // MySQL 비밀번호
$dbname = "poleji"; // 사용할 데이터베이스 이름

// MySQL 데이터베이스에 연결
$conn = mysqli_connect($servername, $username, $password);

// 연결 확인
if ($conn->connect_error) {
    die("MySQL 연결 실패: " . $conn->connect_error);
}

mysqli_select_db($conn, $dbname);

// 문자셋 설정
mysqli_set_charset($conn, "utf8mb4");

// 만약 JSON 요청이 아니라면 콘솔 출력
if (!(isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
    echo '<script>console.log("User DB 연결 성공")</script>';
}
?> 