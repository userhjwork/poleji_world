<?php
// 세션 체크 제거 - 회원가입은 로그인 상태에서도 가능하도록
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>회원가입</title>
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
                    <h2 class="title">회원가입</h2>
                </div>
                
                <form id="registerForm">
                    <ul class="object_list">
                        <li class="object">
                            <span class="key">아이디 *</span>
                            <div class="val">
                                <div class="input">
                                    <input type="text" id="username" name="username" required>
                                </div>
                            </div>
                        </li>
                        <li class="object">
                            <span class="key">비밀번호 *</span>
                            <div class="val">
                                <div class="input">
                                    <input type="password" id="password" name="password" required>
                                </div>
                            </div>
                        </li>
                        <li class="object">
                            <span class="key">비밀번호 확인 *</span>
                            <div class="val">
                                <div class="input">
                                    <input type="password" id="password_confirm" name="password_confirm" required>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <button type="submit" class="btn_basic">
                        <span class="text">회원가입</span>
                    </button>
                </form>
                
                <div style="text-align: center; margin-top: 20px;">
                    <a href="login.php" style="color: #28a745; text-decoration: none;">이미 계정이 있으신가요? 로그인</a>
                </div>
                
                <div id="message" style="margin-top: 20px; text-align: center;"></div>
            </div>
        </div>
    </div>

    <script src="js/user.js"></script>
</body>
</html> 