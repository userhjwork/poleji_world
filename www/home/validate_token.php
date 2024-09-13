<?php
include("./header.php");
// MySQL 연결
$conn = connectToDB();



// DB에서 access_token의 유효성을 검사하는 로직
$data = json_decode(file_get_contents('php://input'), true);
$access_token = $data['access_token'];

// DB 연결 및 access_token 유효성 확인 (예시)
$sql = "SELECT * FROM tbl_tokens WHERE access_token = ? AND access_expiry > ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $access_token, time());
$stmt->execute();

// 결과출력
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['valid' => true]);
    exit(); // 이후에 다른 출력을 방지
} else {
    echo json_encode(['valid' => false]);
    exit(); // 이후에 다른 출력을 방지
}
?>
