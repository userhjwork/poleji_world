<?php
include("./header.php");
// MySQL 연결
$conn = connectToDB();

header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);



$username = $data['username'];
$password = $data['password'];

// 로그인 검증
$sql = '
    SELECT * FROM tbl_user
    WHERE 
        u_id = \''.$username.'\'
    AND 
        u_password = \''.$password.'\'';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {

        $u_id = $username;
        $access_token = bin2hex(random_bytes(32));
        $refresh_token = bin2hex(random_bytes(64));
        $access_expiry = time() + 3600; // 액세스 토큰: 1시간
        $refresh_expiry = time() + (7 * 24 * 60 * 60); // 리프레시 토큰: 7일
    
        // // DB에 토큰 저장
        $sql = "INSERT INTO tbl_tokens (u_id, access_token, refresh_token, access_expiry, refresh_expiry) VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        
        if ($stmt === false) {
            die('Prepare failed: ' . $conn->error);
        }
        
        $stmt->bind_param('sssii', $u_id, $access_token, $refresh_token, $access_expiry, $refresh_expiry);
        
        if ($stmt->execute()) {
            echo json_encode([
                'access_token' => $access_token,
                'refresh_token' => $refresh_token
            ]);

            exit(); // 이후에 다른 출력을 방지
        } else {
            echo json_encode([
                'status' => '실행실패'.$stmt->error.'.'
            ]);

            exit(); // 이후에 다른 출력을 방지
        }
    }


} else {
    http_response_code(401);
    echo json_encode(['message' => 'Invalid login credentials']);
}
?>