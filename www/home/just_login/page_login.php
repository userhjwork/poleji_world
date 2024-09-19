<?php
include("./header.php");

// MySQL 연결
$conn = connectToDB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" minimum-scale=1.0 maximum-scale=1.0/>
    <title>로그인페이지</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gitment/0.0.3/default.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/common.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://poleji.cafe24.com/home/js/common.js"></script>
</head>
<body>
    <div class="wrap">
        <div class="body">
            <div class="content">
                <div class="content_title_wrap">
                    <h2 class="title">Login</h2>
                </div>
                
                <form id="loginForm">

                    <ul class="object_list">
                        <li class="object">
                            <span class="key">ID</span>
                            <div class="val">
                                <div class="input">
                                    <input type="text" id="username" name="username">
                                </div>
                            </div>
                        </li>
                        <li class="object">
                            <span class="key">PASSWORD</span>
                            <div class="val">
                                <div class="input">
                                    <input type="password" id="password" name="password">
                                </div>
                            </div>
                        </li>
                    </ul>
                    <button type="submit" class="btn_basic">
                        <span class="text">Login</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        
        $(document).ready(function(){

        })

        // 로그인
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            alert('hi');

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            console.log(JSON.stringify({
                    username: username,
                    password: password
                }));

            // 요청
            fetch('login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    username: username,
                    password: password
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.valid) {
                    alert(username+'님 반갑습니다');
                    console.log(data);
                    
                    // 페이지 리디렉션
                    window.location.href = './dashboard.php';
                } else {
                    alert('아이디 또는 비밀번호가 일치하지 않습니다. \n다시 시도해주세요.');
                }

            });
        });
    </script>
</body>
</html>
