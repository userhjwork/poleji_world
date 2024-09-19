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
    echo json_encode(['valid' => true]);

} else {
    http_response_code(401);
    echo json_encode(['valid' => false]);
}
?>