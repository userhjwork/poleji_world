<?php
// 출력 버퍼링 시작 - 깨끗한 JSON 응답을 위해
ob_start();

session_start();

// 이전 출력 정리
ob_clean();

header('Content-Type: application/json; charset=utf-8');

try {
    include('./connect_db.php');

    // POST 데이터 받기
    $input = json_decode(file_get_contents('php://input'), true);
    
    if ($input === null) {
        ob_clean();
        echo json_encode(['success' => false, 'message' => 'JSON 데이터 파싱 오류']);
        exit();
    }
    
    $username = $input['username'] ?? '';
    $password = $input['password'] ?? '';

    if (empty($username) || empty($password)) {
        ob_clean();
        echo json_encode(['success' => false, 'message' => '아이디와 비밀번호를 입력해주세요.']);
        exit();
    }

    // 사용자 계정 확인
    $stmt = $conn->prepare("SELECT id, username, password, is_verified FROM ocr_project_user WHERE username = ?");
    if (!$stmt) {
        ob_clean();
        echo json_encode(['success' => false, 'message' => 'SQL 준비 오류: ' . $conn->error]);
        exit();
    }
    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            // 로그인 성공
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_username'] = $user['username'];
            $_SESSION['user_is_verified'] = $user['is_verified'];
            
            ob_clean();
            echo json_encode(['success' => true, 'message' => '로그인 성공']);
        } else {
            ob_clean();
            echo json_encode(['success' => false, 'message' => '비밀번호가 올바르지 않습니다.']);
        }
    } else {
        ob_clean();
        echo json_encode(['success' => false, 'message' => '존재하지 않는 계정입니다.']);
    }

    $stmt->close();
    $conn->close();
    
} catch (Exception $e) {
    ob_clean();
    echo json_encode(['success' => false, 'message' => '오류 발생: ' . $e->getMessage()]);
}

// 출력 버퍼 플러시
ob_end_flush();
?> 