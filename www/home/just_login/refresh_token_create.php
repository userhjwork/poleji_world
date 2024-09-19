<?php
include("./header.php");
// MySQL 연결
$conn = connectToDB();

// refresh_token을 받아 새 access_token 발급
$data = json_decode(file_get_contents('php://input'), true);
$refresh_token = $data['refresh_token'];

// DB 연결 및 refresh_token 유효성 확인 (예시)
$sql = "SELECT * FROM tbl_tokens WHERE refresh_token = ? AND refresh_expiry > ? AND is_valid = 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $refresh_token, time());
$stmt->execute();

$result = $stmt->get_result(); // 실행한 쿼리의 결과를 가져오는 함수 (객체형태로 반환)


// 리프레시 토큰도 재발급
if ($result->num_rows > 0) {
    // 기존 refresh_token이 유효하다면, 새 access_token과 refresh_token을 발급
    $new_access_token = bin2hex(random_bytes(32));
    $new_refresh_token = bin2hex(random_bytes(64));  // 새 refresh_token 발급
    $access_expiry = time() + 3600; // 1시간 유효
    $refresh_expiry = time() + (7 * 24 * 60 * 60); // 7일 유효

    // DB에 새 access_token 및 새 refresh_token 저장
    $stmt = $conn->prepare("UPDATE tbl_tokens SET access_token = ?, refresh_token = ?, access_expiry = ?, refresh_expiry = ? WHERE refresh_token = ? ");
    $stmt->bind_param("ssiis", $new_access_token, $new_refresh_token, $access_expiry, $refresh_expiry, $refresh_token);
    $stmt->execute();

    // 새 토큰 반환
    echo json_encode([
        'access_token' => $new_access_token,
        'refresh_token' => $new_refresh_token
    ]);

    exit(); // 이후에 다른 출력을 방지
} else {
    // refresh_token이 유효하지 않음
    echo json_encode(['error' => 'Invalid refresh token']);

    exit(); // 이후에 다른 출력을 방지
}
?>
