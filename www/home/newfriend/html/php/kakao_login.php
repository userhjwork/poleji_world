<?php
require_once 'session_config.php';
header('Content-Type: application/json');

// POST 데이터 확인
$input = json_decode(file_get_contents('php://input'), true);
$access_token = $input['access_token'] ?? null;

if (!$access_token) {
    echo json_encode(['success' => false, 'message' => 'No access token provided']);
    exit;
}

// 사용자 정보 가져오기
$user_info_url = "https://kapi.kakao.com/v2/user/me";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $user_info_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer " . $access_token
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$user_response = curl_exec($ch);
$user_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($user_http_code === 200) {
    $user_data = json_decode($user_response, true);
    
    if (isset($user_data['id'])) {
        // 세션에 사용자 정보 저장 (newfriend_ 접두사 사용)
        $_SESSION['newfriend_kakao_access_token'] = $access_token;
        $_SESSION['newfriend_kakao_user_id'] = $user_data['id'];
        $_SESSION['newfriend_kakao_nickname'] = $user_data['properties']['nickname'] ?? '';
        $_SESSION['newfriend_kakao_profile_image'] = $user_data['properties']['profile_image'] ?? '';
        
        echo json_encode(['success' => true]);
        exit;
    }
}

echo json_encode(['success' => false, 'message' => 'Failed to get user info']);
exit;
?> 