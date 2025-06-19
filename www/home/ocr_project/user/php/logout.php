<?php
session_start();

// 세션 변수들 제거
unset($_SESSION['user_logged_in']);
unset($_SESSION['user_id']);
unset($_SESSION['user_username']);
unset($_SESSION['user_is_verified']);

// 세션 완전 삭제
session_destroy();

// 로그인 페이지로 리다이렉트
header('Location: ../login.php');
exit();
?> 