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
        
        // 회원가입 요청
        $.ajax({
            url: './php/admin_register.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                username: username,
                password: password,
                password_confirm: password_confirm
            }),
            success: function(response) {
                if (response.success) {
                    $('#message').html('<p style="color: green;">' + response.message + '</p>');
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 2000);
                } else {
                    $('#message').html('<p style="color: red;">' + response.message + '</p>');
                }
            },
            error: function() {
                $('#message').html('<p style="color: red;">관리자 등록 처리 중 오류가 발생했습니다.</p>');
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