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
    <title>QR코드 - 승인 확인</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gitment/0.0.3/default.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/common.css">
    <link rel="stylesheet" href="css/user.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
    <style>
        /* QR코드 페이지 전용 스타일 */
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
        
        .back-btn, .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            transition: background 0.3s;
        }
        
        .back-btn:hover, .logout-btn:hover {
            background: rgba(255,255,255,0.3);
        }
        
        .main-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .qr-section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            padding: 40px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .section-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
        }
        
        .qr-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            margin: 30px 0;
        }
        
        .qr-code {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            border: 2px solid #e9ecef;
        }
        
        .qr-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            border-left: 4px solid #28a745;
        }
        
        .qr-info h3 {
            color: #28a745;
            margin-top: 0;
            margin-bottom: 15px;
        }
        
        .qr-details {
            text-align: left;
            line-height: 1.6;
        }
        
        .qr-details p {
            margin: 8px 0;
            color: #666;
        }
        
        .qr-details strong {
            color: #333;
        }
        
        .status-badge {
            display: inline-block;
            background: #28a745;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 500;
            margin: 10px 0;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
        }
        
        .btn-primary:hover {
            background: #5a6fd8;
            color: white;
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
            color: white;
        }
        
        .btn-success {
            background: #28a745;
            color: white;
        }
        
        .btn-success:hover {
            background: #218838;
            color: white;
        }
        
        .qr-description {
            background: #e9ecef;
            border-radius: 15px;
            padding: 30px;
            margin-top: 30px;
        }
        
        .description-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        
        .description-list {
            list-style: none;
            padding: 0;
        }
        
        .description-list li {
            padding: 10px 0;
            border-bottom: 1px solid #dee2e6;
            position: relative;
            padding-left: 30px;
        }
        
        .description-list li:before {
            content: "✓";
            background: #28a745;
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            position: absolute;
            left: 0;
            top: 10px;
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
            
            .qr-section {
                padding: 25px;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <!-- 헤더 -->
    <header class="main-header">
        <div class="header-content">
            <h1 class="header-title">QR코드 승인</h1>
            <div class="user-info">
                <span class="user-greeting">안녕하세요, <?php echo htmlspecialchars($_SESSION['user_username']); ?>님</span>
                <a href="main.php" class="back-btn">← 메인으로</a>
                <a href="php/logout.php" class="logout-btn">로그아웃</a>
            </div>
        </div>
    </header>
    
    <!-- 메인 콘텐츠 -->
    <main class="main-container">
        <!-- QR코드 섹션 -->
        <section class="qr-section">
            <h2 class="section-title">승인 확인 QR코드</h2>
            
            <div class="qr-container">
                <div class="qr-code" id="qrCode">
                    <!-- QR코드가 여기에 생성됩니다 -->
                </div>
                
                <div class="qr-info">
                    <h3>승인 정보</h3>
                    <div class="qr-details">
                        <p><strong>사용자:</strong> <?php echo htmlspecialchars($_SESSION['user_username']); ?></p>
                        <p><strong>승인 상태:</strong> <span class="status-badge">승인 완료</span></p>
                        <p><strong>생성 시간:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
                        <p><strong>QR코드 ID:</strong> <?php echo 'QR_' . time() . '_' . $_SESSION['user_id']; ?></p>
                    </div>
                </div>
            </div>
            
            <div class="action-buttons">
                <button class="btn btn-primary" onclick="downloadQR()">QR코드 다운로드</button>
                <button class="btn btn-secondary" onclick="printQR()">QR코드 인쇄</button>
                <button class="btn btn-success" onclick="refreshQR()">새로고침</button>
            </div>
        </section>
        
        <!-- 설명 섹션 -->
        <section class="qr-description">
            <h3 class="description-title">📱 QR코드 사용법</h3>
            <ul class="description-list">
                <li>위의 QR코드를 스마트폰으로 스캔하세요</li>
                <li>QR코드에는 승인 정보와 사용자 정보가 포함되어 있습니다</li>
                <li>필요시 QR코드를 다운로드하거나 인쇄하여 사용하세요</li>
                <li>QR코드는 실시간으로 생성되며 고유한 ID를 가집니다</li>
            </ul>
        </section>
    </main>

    <script>
        // QR코드 생성
        function generateQR() {
            const qrData = {
                user_id: <?php echo $_SESSION['user_id']; ?>,
                username: '<?php echo htmlspecialchars($_SESSION['user_username']); ?>',
                timestamp: '<?php echo date('Y-m-d H:i:s'); ?>',
                qr_id: 'QR_' + Date.now() + '_<?php echo $_SESSION['user_id']; ?>',
                status: 'approved'
            };
            
            const qrString = JSON.stringify(qrData);
            
            QRCode.toCanvas(document.getElementById('qrCode'), qrString, {
                width: 200,
                margin: 2,
                color: {
                    dark: '#000000',
                    light: '#FFFFFF'
                }
            }, function (error) {
                if (error) {
                    console.error('QR코드 생성 오류:', error);
                    document.getElementById('qrCode').innerHTML = '<p style="color: red;">QR코드 생성에 실패했습니다.</p>';
                }
            });
        }
        
        // QR코드 다운로드
        function downloadQR() {
            const canvas = document.querySelector('#qrCode canvas');
            if (canvas) {
                const link = document.createElement('a');
                link.download = 'qr_code_<?php echo $_SESSION['user_username']; ?>_<?php echo date('Y-m-d'); ?>.png';
                link.href = canvas.toDataURL();
                link.click();
            }
        }
        
        // QR코드 인쇄
        function printQR() {
            const printWindow = window.open('', '_blank');
            const qrContainer = document.querySelector('.qr-container').cloneNode(true);
            
            printWindow.document.write(`
                <html>
                <head>
                    <title>QR코드 인쇄</title>
                    <style>
                        body { font-family: Arial, sans-serif; text-align: center; padding: 20px; }
                        .qr-code { margin: 20px auto; }
                        .qr-info { margin: 20px auto; max-width: 400px; }
                    </style>
                </head>
                <body>
                    <h2>승인 확인 QR코드</h2>
                    ${qrContainer.outerHTML}
                </body>
                </html>
            `);
            
            printWindow.document.close();
            printWindow.print();
        }
        
        // QR코드 새로고침
        function refreshQR() {
            document.getElementById('qrCode').innerHTML = '';
            generateQR();
        }
        
        // 페이지 로드 시 QR코드 생성
        document.addEventListener('DOMContentLoaded', function() {
            generateQR();
        });
    </script>
</body>
</html> 