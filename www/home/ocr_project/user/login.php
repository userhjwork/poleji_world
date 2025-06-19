<?php
session_start();

// 이미 로그인된 경우 메인 페이지로 리다이렉트
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header('Location: main.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>로그인</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gitment/0.0.3/default.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/common.css">
    <link rel="stylesheet" href="css/user.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
    <div class="wrap">
        <div class="body">
            <div class="content">
                <div class="content_title_wrap">
                    <h2 class="title">로그인</h2>
                </div>
                
                <form id="loginForm">
                    <ul class="object_list">
                        <li class="object">
                            <span class="key">아이디</span>
                            <div class="val">
                                <div class="input">
                                    <input type="text" id="username" name="username" required>
                                </div>
                            </div>
                        </li>
                        <li class="object">
                            <span class="key">비밀번호</span>
                            <div class="val">
                                <div class="input">
                                    <input type="password" id="password" name="password" required>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <button type="submit" class="btn_basic">
                        <span class="text">로그인</span>
                    </button>
                </form>
                
                <div style="text-align: center; margin-top: 20px;">
                    <a href="register.php" style="color: #28a745; text-decoration: none;">계정이 없으신가요? 회원가입</a>
                </div>
                
                <div id="message" style="margin-top: 20px; text-align: center;"></div>
            </div>
        </div>
    </div>

    <script src="js/user_login.js"></script>
</body>
</html> 