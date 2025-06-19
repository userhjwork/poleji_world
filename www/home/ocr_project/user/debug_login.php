<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>사용자 로그인 디버깅</title>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
    <h2>사용자 로그인 디버깅</h2>
    
    <form id="debugLoginForm">
        <p>아이디: <input type="text" id="username" value="testuser"></p>
        <p>비밀번호: <input type="password" id="password" value="123456"></p>
        <button type="submit">테스트 로그인</button>
    </form>
    
    <div id="result" style="margin-top: 20px; padding: 10px; border: 1px solid #ccc;"></div>
    
    <script>
    $('#debugLoginForm').on('submit', function(e) {
        e.preventDefault();
        
        const data = {
            username: $('#username').val(),
            password: $('#password').val()
        };
        
        $('#result').html('로그인 요청 중...');
        
        $.ajax({
            url: './php/user_login.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(response) {
                console.log('로그인 성공 응답:', response);
                $('#result').html('<pre>' + JSON.stringify(response, null, 2) + '</pre>');
                
                if (response.success) {
                    $('#result').append('<p style="color: green;">로그인 성공! 3초 후 메인 페이지로 이동...</p>');
                    setTimeout(function() {
                        window.location.href = 'main.php';
                    }, 3000);
                }
            },
            error: function(xhr, status, error) {
                console.log('로그인 오류 응답:', xhr.responseText);
                $('#result').html('<p style="color: red;">오류: ' + status + '</p><pre>' + xhr.responseText + '</pre>');
            }
        });
    });
    </script>
</body>
</html> 