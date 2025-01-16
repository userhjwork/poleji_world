<?php
$servername = "poleji.cafe24.com"; // MySQL 서버 주소
$username = "poleji"; // MySQL 사용자 이름
$password = "vhvhfdyd>98"; // MySQL 비밀번호
$dbname = "poleji"; // 사용할 데이터베이스 이름

// // MySQL 데이터베이스에 연결
$conn = mysqli_connect($servername, $username, $password);

// // 연결 확인
if ($conn->connect_error) {
    die("MySQL 연결 실패: " . $conn->connect_error);
} else {
    echo '<script>';
    echo 'console.log("성공")';
    echo '</script>';
}
mysqli_select_db($conn, $dbname);
?>