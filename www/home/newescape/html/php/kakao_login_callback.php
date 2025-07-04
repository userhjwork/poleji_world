<?php
require_once 'session_config.php';

// 카카오 로그인 콜백 처리
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    
    // 카카오 토큰 받기
    $token_url = "https://kauth.kakao.com/oauth/token";
    $data = array(
        "grant_type" => "authorization_code",
        "client_id" => "d41148939f2801ea4222671ee2b5191e",
        "redirect_uri" => "https://poleji.cafe24.com/home/newfriend/html/php/kakao_login_callback.php",
        "code" => $code
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $token_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    $token_data = json_decode($response, true);
    
    if (isset($token_data['access_token'])) {
        // 액세스 토큰을 세션에 저장
        $_SESSION['newfriend_kakao_access_token'] = $token_data['access_token'];
        
        // 사용자 정보 가져오기
        $user_info_url = "https://kapi.kakao.com/v2/user/me";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $user_info_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $token_data['access_token']
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $user_response = curl_exec($ch);
        curl_close($ch);
        
        $user_data = json_decode($user_response, true);
        
        if (isset($user_data['id'])) {
            $_SESSION['newfriend_kakao_user_id'] = $user_data['id'];
            $_SESSION['newfriend_kakao_nickname'] = $user_data['properties']['nickname'] ?? '';
            $_SESSION['newfriend_kakao_profile_image'] = $user_data['properties']['profile_image'] ?? '';
            
            // 로그인 성공 후 메인 페이지로 리다이렉트
            header('Location: /home/newfriend/html/index_multi_main.php');
            exit;
        }
    }
}

// 로그인 실패 시 로그인 페이지로 리다이렉트
header('Location: /home/newfriend/html/login.html');
exit;
?> 