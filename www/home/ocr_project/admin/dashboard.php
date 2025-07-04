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
    <title>관리자 대시보드</title>
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
            max-width: 1200px; 
            margin: 0 auto; 
            background: white; 
            border-radius: 10px; 
            box-shadow: 0 0 20px rgba(0,0,0,0.1); 
            overflow: hidden; 
        }
        .header { 
            background: #007bff; 
            color: white; 
            padding: 20px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        }
        .content { 
            padding: 30px; 
        }
        .menu-item { 
            display: block; 
            padding: 15px 20px; 
            margin: 10px 0; 
            background: #f8f9fa; 
            border: 1px solid #dee2e6; 
            border-radius: 5px; 
            color: #007bff; 
            text-decoration: none; 
            transition: all 0.3s; 
        }
        .menu-item:hover { 
            background: #007bff; 
            color: white; 
            text-decoration: none; 
        }
        .logout-btn { 
            color: #dc3545; 
            text-decoration: none; 
            padding: 8px 16px; 
            border: 1px solid #dc3545; 
            border-radius: 5px; 
            transition: all 0.3s; 
        }
        .logout-btn:hover { 
            background: #dc3545; 
            color: white; 
            text-decoration: none; 
        }
        .stats { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
            gap: 20px; 
            margin-top: 30px; 
        }
        .stat-card { 
            background: #f8f9fa; 
            padding: 20px; 
            border-radius: 8px; 
            text-align: center; 
            border: 1px solid #dee2e6; 
        }
        .stat-number { 
            font-size: 2em; 
            font-weight: bold; 
            color: #007bff; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>관리자 대시보드</h1>
            <div>
                <span>안녕하세요, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>님</span>
                <a href="php/logout.php" class="logout-btn">로그아웃</a>
            </div>
        </div>
        
        <div class="content">
            <h2>OCR 프로젝트 관리</h2>
            
            <div style="margin-bottom: 30px;">
                <h3>관리 메뉴</h3>
                <a href="../user/setup.php" class="menu-item">사용자 시스템 설정</a>
                <a href="../user/login.php" class="menu-item">사용자 로그인 페이지</a>
                <a href="../user/register.php" class="menu-item">사용자 회원가입 페이지</a>
                <a href="register.php" class="menu-item">관리자 회원가입</a>
                <a href="setup.php" class="menu-item">시스템 설정</a>
                <a href="setup_approval.php" class="menu-item">OCR 승인 시스템 설정</a>
                <a href="ocr_approval.php" class="menu-item">OCR 승인 관리</a>
            </div>
            
            <div class="stats">
                <div class="stat-card">
                    <div class="stat-number">OCR</div>
                    <div>프로젝트</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">관리자</div>
                    <div>시스템</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">사용자</div>
                    <div>시스템</div>
                </div>
            </div>
            
            <div style="margin-top: 30px; padding: 20px; background: #e9ecef; border-radius: 8px;">
                <h3>시스템 정보</h3>
                <p><strong>PHP 버전:</strong> <?php echo phpversion(); ?></p>
                <p><strong>서버:</strong> <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?></p>
                <p><strong>현재 시간:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
            </div>
        </div>
    </div>
</body>
</html> 