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
    <title>dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gitment/0.0.3/default.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/common.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://poleji.cafe24.com/home/js/common.js"></script>
</head>
<body>
    <div class="wrap">
        <div class="body">
            <div class="header flex" id="header">
                <div class="h_logo_wrap" id="mainlogo">
                    <div class="img_wrap">
                        <p>POLEJIWARLD</p>
                    </div>
                </div>
                <div class="button_wrap option_wrap">
                    <button type="button" class="btn_icon logout" id="h_logout">
                        <span class="no_text">logout</span>
                        <span class="text">logout</span>
                    </button>
                    <button type="button" class="btn_icon admin" id="h_admin">
                        <span class="no_text">admin</span>
                        <span class="text">관리자페이지</span>
                    </button>
                </div>
            </div>
            <div class="content">
                <div class="padding">
                    <div class="content_title_wrap">
                        <h2 class="title">대시보드</h2>
                    </div>
                    <div class="content_body">
                        <p class="text">content area</p>
                    </div>
                </div>
            </div>
            <div class="footer" id="footer"></div>

            

    <script>
        $(document).ready(function(){
            check_token('dashboard');
        })

        $(document).on('click', '#h_logout', function(){
            logout('dashboard');
        })

        $(document).on('click', '#h_admin', function(){
            window.location.href='user_admin.php';
        })
    </script>
</body>
</html>
