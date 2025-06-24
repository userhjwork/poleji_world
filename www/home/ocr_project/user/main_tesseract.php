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
        
        .ocr-section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            padding: 40px;
            margin-bottom: 30px;
        }
        
        .section-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .file-upload-area {
            border: 2px dashed #ddd;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            margin-bottom: 30px;
            transition: border-color 0.3s;
        }
        
        .file-upload-area:hover {
            border-color: #667eea;
        }
        
        .file-input {
            display: none;
        }
        
        .upload-label {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s;
        }
        
        .upload-label:hover {
            background: #5a6fd8;
        }
        
        .preview-container {
            margin-top: 20px;
            text-align: center;
        }
        
        .image-preview {
            max-width: 100%;
            max-height: 400px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .result-container {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }
        
        .result-text {
            white-space: pre-wrap;
            font-family: 'Courier New', monospace;
            line-height: 1.6;
            color: #333;
        }
        
        .usage-guide {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
        }
        
        .usage-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        
        .usage-list {
            list-style: none;
            padding: 0;
        }
        
        .usage-list li {
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
            position: relative;
            padding-left: 30px;
        }
        
        .usage-list li:before {
            content: counter(step-counter);
            counter-increment: step-counter;
            background: #667eea;
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
        
        .usage-list {
            counter-reset: step-counter;
        }
        
        .loading {
            display: none;
            text-align: center;
            padding: 20px;
        }
        
        .loading-spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #667eea;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            margin: 0 auto 10px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
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
            
            .ocr-section {
                padding: 25px;
            }
            
            .file-upload-area {
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
        <!-- OCR 섹션 -->
        <section class="ocr-section">
            <h2 class="section-title">이미지 텍스트 인식</h2>
            
            <!-- 파일 업로드 영역 -->
            <div class="file-upload-area">
                <input type="file" id="imageInput" class="file-input" accept="image/*" />
                <label for="imageInput" class="upload-label">
                    📷 이미지 파일 선택하기
                </label>
                <p style="margin-top: 15px; color: #666; font-size: 14px;">
                    JPG, PNG, GIF 등 이미지 파일을 선택해주세요
                </p>
            </div>
            
            <!-- 이미지 프리뷰 -->
            <div class="preview-container" id="previewContainer" style="display: none;">
                <img id="preview" class="image-preview" />
                <canvas id="canvas" style="display:none;"></canvas>
            </div>
            
            <!-- 로딩 표시 -->
            <div class="loading" id="loading">
                <div class="loading-spinner"></div>
                <p>텍스트를 인식하고 있습니다...</p>
            </div>
            
            <!-- 결과 표시 -->
            <div class="result-container" id="resultContainer" style="display: none;">
                <h3 style="margin-top: 0; color: #667eea;">인식 결과</h3>
                <pre id="output" class="result-text"></pre>
            </div>
        </section>
        
        <!-- 사용법 가이드 -->
        <section class="usage-guide">
            <h3 class="usage-title">📖 사용법</h3>
            <ol class="usage-list">
                <li>위의 "이미지 파일 선택하기" 버튼을 클릭하여 이미지를 선택하세요</li>
                <li>선택한 이미지가 업로드되면 자동으로 텍스트 인식이 시작됩니다</li>
                <li>인식이 완료되면 아래에 결과가 표시됩니다</li>
                <li>인식된 텍스트를 복사하여 사용하실 수 있습니다</li>
            </ol>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@4/dist/tesseract.min.js"></script>
    <script src="js/ocr.js"></script>
</body>
</html> 