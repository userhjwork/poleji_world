<?php
// 세션 설정
if (session_status() === PHP_SESSION_NONE) {
    // 세션이 시작되지 않은 경우에만 설정
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_secure', 1);
    ini_set('session.cookie_path', '/home/newfriend/html');
    ini_set('session.name', 'NEWFRIEND_SESSION');
    session_start();
}
?> 