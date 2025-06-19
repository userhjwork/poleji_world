<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>관리자 등록 디버깅</title>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
    <h2>관리자 등록 디버깅</h2>
    
    <form id="debugForm">
        <p>아이디: <input type="text" id="username" value="testadmin"></p>
        <p>비밀번호: <input type="password" id="password" value="123456"></p>
        <p>비밀번호 확인: <input type="password" id="password_confirm" value="123456"></p>
        <button type="submit">테스트 등록</button>
    </form>
    
    <div id="result" style="margin-top: 20px; padding: 10px; border: 1px solid #ccc;"></div>
    
    <script>
    $('#debugForm').on('submit', function(e) {
        e.preventDefault();
        
        const data = {
            username: $('#username').val(),
            password: $('#password').val(),
            password_confirm: $('#password_confirm').val()
        };
        
        $('#result').html('요청 중...');
        
        $.ajax({
            url: './php/admin_register.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(response) {
                console.log('성공 응답:', response);
                $('#result').html('<pre>' + JSON.stringify(response, null, 2) + '</pre>');
            },
            error: function(xhr, status, error) {
                console.log('오류 응답:', xhr.responseText);
                $('#result').html('<p style="color: red;">오류: ' + status + '</p><pre>' + xhr.responseText + '</pre>');
            }
        });
    });
    </script>
</body>
</html> 