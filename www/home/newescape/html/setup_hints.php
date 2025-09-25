<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>힌트 시스템 초기 설정</title>
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newescape/assets/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newescape/assets/css/common.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newescape/assets/css/main.css"> 
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newescape/assets/css/setup_hints.css">
    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://poleji.cafe24.com/home/newescape/assets/js/script.js"></script>
</head>
<body>
    <div class="wrap">
        <div class="header">
        </div>
        <div class="body">
            <div class="container">
                <div class="setup-container">
                    <div class="setup-header">
                        <h1>방탈출 힌트 시스템 초기 설정</h1>
                        <p>데이터베이스 테이블을 생성하고 샘플 힌트를 추가합니다.</p>
                    </div>

                    <div class="setup-content">
                        <p>아래 버튼을 클릭하여 힌트 시스템을 초기화하세요.</p>
                        <button id="setupBtn" class="setup-btn">힌트 시스템 초기화</button>
                        <div id="result"></div>
                    </div>

                    <div class="nav-links">
                        <a href="./index_main.php">메인 페이지로 이동</a>
                        <a href="./admin_hints.php">관리자 페이지로 이동</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $('#setupBtn').click(function() {
                const btn = $(this);
                btn.prop('disabled', true).text('초기화 중...');
                
                $.ajax({
                    url: './php/create_hint_tables.php',
                    type: 'GET',
                    success: function(response) {
                        $('#result').removeClass('result success error')
                                   .addClass('result success')
                                   .html(response.replace(/\n/g, '<br>'));
                        btn.text('초기화 완료');
                    },
                    error: function() {
                        $('#result').removeClass('result success error')
                                   .addClass('result error')
                                   .text('초기화 중 오류가 발생했습니다.');
                        btn.prop('disabled', false).text('힌트 시스템 초기화');
                    }
                });
            });
        });
    </script>
</body>
</html> 