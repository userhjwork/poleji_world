<?php
require_once 'session_config.php';

// 디버깅을 위한 로그 파일 설정
error_log("Session check - Session data: " . print_r($_SESSION, true), 3, "/home/hosting_users/poleji/logs/session.log");

// 카카오 로그인 상태 체크
function checkKakaoLogin() {
    // 세션 데이터 확인
    if (!isset($_SESSION['newescape_kakao_access_token'])) {
        // 로그인 페이지로 리다이렉트
        header('Location: /home/newescape/html/login.html');
        exit;
    }
    
    // 토큰 유효성 검증
    $token = $_SESSION['newescape_kakao_access_token'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://kapi.kakao.com/v1/user/access_token_info");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer " . $token
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code !== 200) {
        // 토큰이 유효하지 않으면 세션 삭제
        unset($_SESSION['newescape_kakao_access_token']);
        unset($_SESSION['newescape_kakao_user_id']);
        unset($_SESSION['newescape_kakao_nickname']);
        unset($_SESSION['newescape_kakao_profile_image']);
        header('Location: /home/newescape/html/login.html');
        exit;
    }
}

// 페이지 로드 시 자동으로 체크
checkKakaoLogin();
?> 