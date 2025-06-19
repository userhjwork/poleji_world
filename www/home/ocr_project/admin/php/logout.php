<?php
session_start();

// 세션 변수들 제거
unset($_SESSION['admin_logged_in']);
unset($_SESSION['admin_id']);
unset($_SESSION['admin_username']);

// 세션 완전 삭제
session_destroy();

// 로그인 페이지로 리다이렉트
header('Location: ../login.php');
exit();
?> 