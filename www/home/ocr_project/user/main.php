<?php
session_start();

// 로그인 확인
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>OCR 서비스 - 메인</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gitment/0.0.3/default.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/common.css">
    <link rel="stylesheet" href="css/user.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <style>
        /* 메인 페이지 전용 스타일 */
        .main-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header-title {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .user-greeting {
            font-size: 16px;
            font-weight: 500;
        }
        
        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            transition: background 0.3s;
        }
        
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
        }
        
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .welcome-section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            padding: 40px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .welcome-title {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }
        
        .welcome-subtitle {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }
        
        .service-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .service-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            padding: 30px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 2px solid transparent;
        }
        
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            border-color: #667eea;
        }
        
        .service-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }
        
        .service-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }
        
        .service-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
        }
        
        .service-btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        .service-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .approval-btn {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        }
        
        .approval-btn:hover {
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        }
        
        .stats-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            margin-top: 40px;
        }
        
        .stats-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .stat-item {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .stat-number {
            font-size: 2em;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #666;
            font-size: 14px;
        }
        
        /* 반응형 디자인 */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .user-info {
                flex-direction: column;
                gap: 10px;
            }
            
            .main-container {
                padding: 20px 15px;
            }
            
            .welcome-section {
                padding: 25px;
            }
            
            .welcome-title {
                font-size: 24px;
            }
            
            .service-cards {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .service-card {
                padding: 25px;
            }
        }
    </style>
</head>
<body>
    <!-- 헤더 -->
    <header class="main-header">
        <div class="header-content">
            <h1 class="header-title">OCR 서비스</h1>
            <div class="user-info">
                <span class="user-greeting">안녕하세요, <?php echo htmlspecialchars($_SESSION['user_username']); ?>님</span>
                <a href="php/logout.php" class="logout-btn">로그아웃</a>
            </div>
        </div>
    </header>
    
    <!-- 메인 콘텐츠 -->
    <main class="main-container">
        <!-- 환영 섹션 -->
        <section class="welcome-section">
            <h2 class="welcome-title">OCR 서비스에 오신 것을 환영합니다!</h2>
            <p class="welcome-subtitle">이미지 텍스트 인식과 승인 확인 서비스를 이용해보세요</p>
        </section>
        
        <!-- 서비스 카드 -->
        <div class="service-cards">
            <!-- OCR 텍스트 인식 카드 -->
            <div class="service-card">
                <div class="service-icon">📷</div>
                <h3 class="service-title">텍스트 인식</h3>
                <p class="service-description">
                    이미지를 업로드하여 텍스트를 자동으로 인식하고 추출합니다. 
                    한글과 영어를 모두 지원하며, 높은 정확도로 텍스트를 인식합니다.
                </p>
                <a href="ocr_upload.php" class="service-btn">텍스트 인식 시작</a>
            </div>
            
            <!-- 승인 확인 카드 -->
            <div class="service-card">
                <div class="service-icon">✅</div>
                <h3 class="service-title">승인 확인</h3>
                <p class="service-description">
                    승인 확인 QR코드를 생성하고 확인합니다. 
                    QR코드를 스캔하여 승인 상태를 확인할 수 있습니다.
                </p>
                <a href="qr_code.php" class="service-btn approval-btn">승인 확인</a>
            </div>
            
            <!-- 자체 QR코드 생성 카드 -->
            <div class="service-card">
                <div class="service-icon">🚀</div>
                <h3 class="service-title">자체 QR코드 생성</h3>
                <p class="service-description">
                    외부 라이브러리 없이 순수 JavaScript로 QR코드를 생성합니다. 
                    더 빠르고 안정적인 QR코드 생성이 가능합니다.
                </p>
                <a href="qr_code_custom.php" class="service-btn" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);">자체 QR코드 생성</a>
            </div>
        </div>
        
        <!-- 통계 섹션 -->
        <section class="stats-section">
            <h3 class="stats-title">서비스 통계</h3>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">OCR</div>
                    <div class="stat-label">텍스트 인식</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">QR</div>
                    <div class="stat-label">승인 확인</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">실시간</div>
                    <div class="stat-label">처리 속도</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">99%</div>
                    <div class="stat-label">정확도</div>
                </div>
            </div>
        </section>
    </main>

    <script>
        // 페이지 로드 시 애니메이션 효과
        $(document).ready(function() {
            $('.service-card').each(function(index) {
                $(this).css({
                    'opacity': '0',
                    'transform': 'translateY(30px)'
                }).delay(index * 200).animate({
                    'opacity': '1',
                    'transform': 'translateY(0)'
                }, 600);
            });
        });
    </script>
</body>
</html> 