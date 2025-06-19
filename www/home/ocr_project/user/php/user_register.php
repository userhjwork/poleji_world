<?php
// 출력 버퍼링 시작 - 깨끗한 JSON 응답을 위해
ob_start();

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
    $password_confirm = $input['password_confirm'] ?? '';

    // 유효성 검사
    if (empty($username) || empty($password)) {
        ob_clean();
        echo json_encode(['success' => false, 'message' => '아이디와 비밀번호는 필수입니다.']);
        exit();
    }

    if ($password !== $password_confirm) {
        ob_clean();
        echo json_encode(['success' => false, 'message' => '비밀번호가 일치하지 않습니다.']);
        exit();
    }

    if (strlen($password) < 6) {
        ob_clean();
        echo json_encode(['success' => false, 'message' => '비밀번호는 최소 6자 이상이어야 합니다.']);
        exit();
    }

    // 아이디 중복 확인
    $stmt = $conn->prepare("SELECT id FROM ocr_project_user WHERE username = ?");
    if (!$stmt) {
        ob_clean();
        echo json_encode(['success' => false, 'message' => 'SQL 준비 오류: ' . $conn->error]);
        exit();
    }
    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        ob_clean();
        echo json_encode(['success' => false, 'message' => '이미 사용 중인 아이디입니다.']);
        $stmt->close();
        exit();
    }
    $stmt->close();

    // 비밀번호 해시화
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 사용자 등록
    $stmt = $conn->prepare("INSERT INTO ocr_project_user (username, password) VALUES (?, ?)");
    if (!$stmt) {
        ob_clean();
        echo json_encode(['success' => false, 'message' => 'SQL 준비 오류: ' . $conn->error]);
        exit();
    }
    
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        ob_clean();
        echo json_encode(['success' => true, 'message' => '회원가입이 완료되었습니다.']);
    } else {
        ob_clean();
        echo json_encode(['success' => false, 'message' => '회원가입 중 오류가 발생했습니다: ' . $stmt->error]);
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