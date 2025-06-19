<?php
require_once 'session_config.php';

// 카카오 로그아웃 처리
if (isset($_SESSION['newfriend_kakao_access_token'])) {
    // 카카오 연결 해제
    $logout_url = "https://kapi.kakao.com/v1/user/logout";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $logout_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer " . $_SESSION['newfriend_kakao_access_token']
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    curl_exec($ch);
    curl_close($ch);
    
    // 세션 데이터 삭제
    unset($_SESSION['newfriend_kakao_access_token']);
    unset($_SESSION['newfriend_kakao_user_id']);
    unset($_SESSION['newfriend_kakao_nickname']);
    unset($_SESSION['newfriend_kakao_profile_image']);
}

// 로그인 페이지로 리다이렉트
header('Location: /home/newfriend/html/login.html');
exit;
?> 