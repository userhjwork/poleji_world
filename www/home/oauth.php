<?php


// 1. 로그인 시 액세스 및 리프레시 토큰 발급

$accessToken = bin2hex(random_bytes(32));  // 액세스 토큰 생성
$refreshToken = bin2hex(random_bytes(64)); // 리프레시 토큰 생성

// 토큰을 DB에 저장 (사용자 ID, 토큰, 만료 시간 등)
$expiryTime = time() + 3600; // 액세스 토큰 만료 시간 (예: 1시간)
$refreshExpiryTime = time() + (7 * 24 * 60 * 60); // 리프레시 토큰 만료 시간 (예: 7일)

$sql = 'INSERT INTO tokens (user_id, access_token, refresh_token, access_expiry, refresh_expiry) VALUES (?, ?, ?, ?, ?)';
$stmt = $db->prepare($sql);
$stmt->execute([$userId, $accessToken, $refreshToken, $expiryTime, $refreshExpiryTime]);



// 2. 액세스 토큰 사용 및 검증

$accessToken = $_SERVER['HTTP_AUTHORIZATION']; // 헤더에서 토큰 받기
$sql = "SELECT user_id FROM tokens WHERE access_token = ? AND access_expiry > ?";
$stmt = $db->prepare($sql);
$stmt->execute([$accessToken, time()]);

if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch();
    // 유효한 토큰, 사용자 정보 가져오기
} else {
    // 토큰이 유효하지 않음, 다시 로그인 요청
}

// 3. 액세스 토큰 만료 시 리프레시 토큰 사용
$refreshToken = $_POST['refresh_token'];
$sql = "SELECT user_id FROM tokens WHERE refresh_token = ? AND refresh_expiry > ?";
$stmt = $db->prepare($sql);
$stmt->execute([$refreshToken, time()]);

if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch();
    // 새 액세스 토큰 발급
    $newAccessToken = bin2hex(random_bytes(32));
    $newExpiryTime = time() + 3600;

    $sql = "UPDATE tokens SET access_token = ?, access_expiry = ? WHERE user_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$newAccessToken, $newExpiryTime, $user['user_id']]);

    // 새 액세스 토큰 반환
    echo json_encode(['access_token' => $newAccessToken]);
} else {
    // 리프레시 토큰이 유효하지 않음, 재로그인 필요
}

// 4. 토큰 보안 및 만료 처리

?>