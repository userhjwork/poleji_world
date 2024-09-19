<?php
function connectToDB() {
    // MySQL 서버 정보 설정
    $servername = "uws7-143.cafe24.com"; // MySQL 서버 주소 (로컬호스트라면 그대로 사용)
    $username = "poleji";   // MySQL 계정 사용자 이름
    $password = "vhvhfdyd>98";     // MySQL 계정 비밀번호
    $dbname = "poleji"; // 사용할 데이터베이스 이름

    // MySQL 서버에 연결
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 연결 확인
    if ($conn->connect_error) {
        die("MySQL 연결 실패: " . $conn->connect_error);
    }

    // 사용할 데이터베이스 선택
    $db_selected = mysqli_select_db($conn, $dbname);

    // 데이터베이스 선택 결과 확인
    if (!$db_selected) {
        die ("데이터베이스 선택 실패: " . mysqli_error($conn));
    }

    return $conn;
}
?>