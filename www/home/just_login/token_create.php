<?php
include("./header.php");
// MySQL 연결
$conn = connectToDB();

header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'];

if ($result->num_rows > 0) {

while ($row = $result->fetch_assoc()) {

    $u_id = $username;
    $access_token = bin2hex(random_bytes(32));
    $refresh_token = bin2hex(random_bytes(64));
    $access_expiry = time() + 3600; // 액세스 토큰: 1시간
    $refresh_expiry = time() + (7 * 24 * 60 * 60); // 리프레시 토큰: 7일

    // // DB에 토큰 저장
    // $sql = "INSERT INTO tbl_tokens (u_id, access_token, refresh_token, access_expiry, refresh_expiry) VALUES (?, ?, ?, ?, ?)";
    $sql = "INSERT INTO tbl_tokens (u_id, refresh_token, refresh_expiry) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        echo json_encode([
            '구문오류' => ': '.$conn->error
        ]);
        
        die();
    }
    
    $stmt->bind_param('ssi', $u_id, $refresh_token, $refresh_expiry);
    // echo json_encode([
    //     'access_token' => $access_token,
    //     'refresh_token' => $refresh_token
    // ]);
    
    if ($stmt->execute()) {
        echo json_encode([
            'refresh_token' => $refresh_token
        ]);

        exit(); // 이후에 다른 출력을 방지
    } else {
        echo json_encode([
            'status' => '토큰발급실패'.$stmt->error.'.'
        ]);

        exit(); // 이후에 다른 출력을 방지
    }
}


} else {
http_response_code(401);
echo json_encode(['message' => 'Invalid login credentials']);
}
?>