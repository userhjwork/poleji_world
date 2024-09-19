<?php
include("./header.php");
// MySQL 연결
$conn = connectToDB();

// refresh_token을 받아 새 access_token 발급
$data = json_decode(file_get_contents('php://input'), true);
$refresh_token = $data['refresh_token'];

// DB 연결 및 refresh_token 유효성 확인 (예시)
$sql = "DELETE FROM tbl_tokens WHERE refresh_token = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $refresh_token);
$stmt->execute();

$result = $stmt->get_result(); // 실행한 쿼리의 결과를 가져오는 함수 (객체형태로 반환)



// 성공 메시지 반환
// affected_rows < 영향받은 행 수
if ($stmt->affected_rows > 0) {
    echo json_encode(['message' => 'Logged out successfully']);
    exit(); // 이후에 다른 출력을 방지
} else {
    echo json_encode(['error' => 'Logout failed']);
    exit(); // 이후에 다른 출력을 방지
}
?>
