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
                        <li>
                            <button type="button" id="go_pass" class="btn_basic">패스 본인인증</button>
                        </li>
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
    <script src="https://cdn.portone.io/v2/browser-sdk.js"></script>
    <script src="js/user.js"></script>
    <script>

        window.onload = function() {
            console.log("페이지의 모든 리소스가 로드되었습니다. PortOne SDK:", window.PortOne);
            $("#go_pass").click(function(){
                startVerification();
            });
        };
        
        function startVerification() {
            console.log("startVerification 호출됨. 현재 PortOne SDK 상태:", window.PortOne);

            if (window.PortOne && typeof window.PortOne.requestIdentityVerification === 'function') {
                let storeId = "store-4252689c-8ca1-4e53-b8ae-8cfa3e44c4cc";
                let channelKey = "channel-key-826af1d8-4b0b-4a73-b13c-4a539b9e8511"; 
                let company = "주식회사 투두";
                let pg = "danal";
                console.log("PortOne SDK 및 함수 확인. 본인인증을 시작합니다.");
                window.PortOne.requestIdentityVerification({
                    
                    storeId: storeId,
                    channelKey: channelKey,
                    identityVerificationId: "verify_" + new Date().getTime(),
                    merchant_uid: "mid_" + new Date().getTime(),
                    company: company,
                    pg: pg,
                    redirectUrl: window.location.href, // 인증 후 돌아올 URL 추가
                    popup: true
                }).then(function(response) {
                    if (response.success) {
                        alert("본인인증 성공!\n이름: " + response.name + "\n생년월일: " + response.birth);
                    } else {
                        alert("본인인증 실패: " + response.error_msg);
                    }
                });
            } else {
                console.error("PortOne SDK가 없거나 requestIdentityVerification 함수를 찾을 수 없습니다.");
                alert('PortOne SDK가 아직 로드되지 않았거나, 지원하지 않는 환경입니다. 개발자 도구 콘솔을 확인해주세요.');
            }
        }
    </script>
</body>
</html> 