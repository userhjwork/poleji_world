<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>사용자 시스템 초기 설정</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gitment/0.0.3/default.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/common.css">
    <style>
        body { padding: 20px; font-family: Arial, sans-serif; }
        .step { margin: 20px 0; padding: 15px; border: 1px solid #ddd; border-radius: 5px; }
        .success { background-color: #d4edda; border-color: #c3e6cb; }
        .error { background-color: #f8d7da; border-color: #f5c6cb; }
        .info { background-color: #d1ecf1; border-color: #bee5eb; }
        .btn { padding: 10px 20px; background: #28a745; color: white; text-decoration: none; border-radius: 5px; display: inline-block; margin: 5px; }
        .btn:hover { background: #218838; }
    </style>
</head>
<body>
    <h1>OCR 프로젝트 - 사용자 시스템 초기 설정</h1>
    
    <div class="step info">
        <h2>1단계: 데이터베이스 연결 테스트</h2>
        <p>데이터베이스 연결과 테이블 존재 여부를 확인합니다.</p>
        <a href="php/check_table.php" class="btn" target="_blank">데이터베이스 확인</a>
    </div>
    
    <div class="step info">
        <h2>2단계: 테이블 생성</h2>
        <p>필요한 데이터베이스 테이블들을 생성합니다.</p>
        <a href="php/create_tables.php" class="btn" target="_blank">사용자 테이블 생성</a>
    </div>
    
    <div class="step info">
        <h2>3단계: 관리자 시스템 설정</h2>
        <p>관리자 시스템의 테이블도 생성합니다.</p>
        <a href="../admin/php/create_tables.php" class="btn" target="_blank">관리자 테이블 생성</a>
    </div>
    
    <div class="step info">
        <h2>4단계: 로그인 테스트</h2>
        <p>설정이 완료되면 로그인을 테스트합니다.</p>
        <a href="login.php" class="btn">사용자 로그인</a>
        <a href="register.php" class="btn">사용자 회원가입</a>
        <a href="../admin/login.php" class="btn">관리자 로그인</a>
    </div>
    
    <div class="step info">
        <h2>기본 계정 정보</h2>
        <p><strong>관리자 기본 계정:</strong> admin / admin123</p>
        <p><strong>사용자 계정:</strong> 회원가입을 통해 생성</p>
    </div>
</body>
</html> 