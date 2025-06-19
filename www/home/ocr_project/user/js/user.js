$(document).ready(function() {
    // 회원가입 폼 제출
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();
        
        const username = $('#username').val().trim();
        const password = $('#password').val();
        const password_confirm = $('#password_confirm').val();
        
        // 기본 유효성 검사
        if (!username || !password) {
            $('#message').html('<p style="color: red;">아이디와 비밀번호는 필수입니다.</p>');
            return;
        }
        
        if (password !== password_confirm) {
            $('#message').html('<p style="color: red;">비밀번호가 일치하지 않습니다.</p>');
            return;
        }
        
        if (password.length < 6) {
            $('#message').html('<p style="color: red;">비밀번호는 최소 6자 이상이어야 합니다.</p>');
            return;
        }
        
        // 로딩 메시지 표시
        $('#message').html('<p style="color: blue;">처리 중입니다...</p>');
        
        // 회원가입 요청
        $.ajax({
            url: './php/user_register.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                username: username,
                password: password,
                password_confirm: password_confirm
            }),
            success: function(response) {
                console.log('사용자 등록 응답:', response); // 디버깅용
                
                // 응답이 문자열인 경우 JSON으로 파싱
                if (typeof response === 'string') {
                    try {
                        response = JSON.parse(response);
                    } catch (e) {
                        $('#message').html('<p style="color: red;">서버 응답 처리 중 오류가 발생했습니다.</p>');
                        return;
                    }
                }
                
                if (response.success) {
                    $('#message').html('<p style="color: green;">' + response.message + '</p><p style="color: blue;">3초 후 로그인 페이지로 이동합니다...</p>');
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 3000);
                } else {
                    $('#message').html('<p style="color: red;">' + (response.message || '알 수 없는 오류가 발생했습니다.') + '</p>');
                }
            },
            error: function(xhr, status, error) {
                console.log('사용자 등록 AJAX 오류:', xhr.responseText); // 디버깅용
                $('#message').html('<p style="color: red;">회원가입 처리 중 오류가 발생했습니다. (상태: ' + status + ')</p>');
            }
        });
    });
    
    // 비밀번호 확인 실시간 검증
    $('#password_confirm').on('input', function() {
        const password = $('#password').val();
        const password_confirm = $(this).val();
        
        if (password_confirm && password !== password_confirm) {
            $(this).css('border-color', 'red');
        } else {
            $(this).css('border-color', '#ddd');
        }
    });
}); 