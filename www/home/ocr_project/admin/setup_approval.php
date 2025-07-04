<?php
session_start();

// 로그인 확인
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>OCR 승인 시스템 설정</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gitment/0.0.3/default.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/common.css">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 20px; 
            background-color: #f5f5f5; 
        }
        .container { 
            max-width: 800px; 
            margin: 0 auto; 
            background: white; 
            border-radius: 10px; 
            box-shadow: 0 0 20px rgba(0,0,0,0.1); 
            overflow: hidden; 
        }
        .header { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; 
            padding: 20px; 
            text-align: center;
        }
        .content { 
            padding: 30px; 
        }
        .setup-item {
            background: #f8f9fa;
            padding: 20px;
            margin: 15px 0;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        .setup-item h3 {
            margin-top: 0;
            color: #333;
        }
        .setup-item p {
            color: #666;
            margin-bottom: 15px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #5a6fd8;
            color: white;
            text-decoration: none;
        }
        .back-btn {
            background: #6c757d;
        }
        .back-btn:hover {
            background: #5a6268;
        }
        .success {
            color: #28a745;
            font-weight: bold;
        }
        .error {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>OCR 승인 시스템 설정</h1>
        </div>
        
        <div class="content">
            <div class="setup-item">
                <h3>1. 승인 시스템 테이블 생성</h3>
                <p>OCR 승인 처리를 위한 데이터베이스 테이블을 생성합니다.</p>
                <a href="php/create_approval_tables.php" class="btn" target="_blank">테이블 생성</a>
            </div>

            <div class="setup-item">
                <h3>2. 테이블 생성 확인</h3>
                <p>생성된 테이블들이 올바르게 만들어졌는지 확인합니다.</p>
                <a href="php/check_approval_tables.php" class="btn" target="_blank">테이블 확인</a>
            </div>

            <div class="setup-item">
                <h3>3. OCR 승인 관리 페이지</h3>
                <p>승인 처리를 위한 관리자 페이지로 이동합니다.</p>
                <a href="ocr_approval.php" class="btn">승인 관리 페이지</a>
            </div>

            <div style="margin-top: 30px; text-align: center;">
                <a href="dashboard.php" class="btn back-btn">← 대시보드로 돌아가기</a>
            </div>
        </div>
    </div>
</body>
</html> 