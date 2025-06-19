$(document).ready(function() {
    // 로그인 폼 제출
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        
        const username = $('#username').val().trim();
        const password = $('#password').val().trim();
        
        if (!username || !password) {
            $('#message').html('<p style="color: red;">아이디와 비밀번호를 입력해주세요.</p>');
            return;
        }
        
        // 로딩 메시지 표시
        $('#message').html('<p style="color: blue;">로그인 처리 중...</p>');
        
        // 로그인 요청
        $.ajax({
            url: './php/user_login.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                username: username,
                password: password
            }),
            success: function(response) {
                console.log('사용자 로그인 응답:', response); // 디버깅용
                
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
                    $('#message').html('<p style="color: green;">' + response.message + '</p>');
                    setTimeout(function() {
                        window.location.href = 'main.php';
                    }, 1000);
                } else {
                    $('#message').html('<p style="color: red;">' + (response.message || '로그인에 실패했습니다.') + '</p>');
                }
            },
            error: function(xhr, status, error) {
                console.log('사용자 로그인 AJAX 오류:', xhr.responseText); // 디버깅용
                $('#message').html('<p style="color: red;">로그인 처리 중 오류가 발생했습니다. (상태: ' + status + ')</p>');
            }
        });
    });
}); 