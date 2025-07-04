<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>방탈출 힌트 시스템</title>
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newescape/assets/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newescape/assets/css/common.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newescape/assets/css/main.css"> 
    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://poleji.cafe24.com/home/newescape/assets/js/script.js"></script>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('./php/connect_db.php');
?>

<style>
.hint-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

.hint-input-section {
    background: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
    margin-bottom: 30px;
    text-align: center;
}

.hint-input-section h2 {
    color: #333;
    margin-bottom: 20px;
    font-size: 24px;
}

.hint-number-input {
    width: 200px;
    padding: 15px;
    font-size: 18px;
    border: 2px solid #ddd;
    border-radius: 8px;
    text-align: center;
    margin-right: 10px;
}

.hint-btn {
    padding: 15px 30px;
    font-size: 16px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s;
}

.hint-btn:hover {
    background: #0056b3;
}

.hint-btn:disabled {
    background: #ccc;
    cursor: not-allowed;
}

.hint-content {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    margin-bottom: 20px;
    display: none;
}

.hint-text {
    font-size: 18px;
    line-height: 1.6;
    color: #333;
    margin-bottom: 20px;
}

.hint-image {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 20px;
}

.answer-btn {
    padding: 12px 25px;
    font-size: 14px;
    background: #28a745;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s;
}

.answer-btn:hover {
    background: #218838;
}

.answer-content {
    background: #e8f5e8;
    padding: 25px;
    border-radius: 8px;
    margin-top: 20px;
    display: none;
}

.answer-text {
    font-size: 16px;
    line-height: 1.5;
    color: #155724;
    margin-bottom: 15px;
}

.answer-image {
    max-width: 100%;
    height: auto;
    border-radius: 6px;
}

.error-message {
    color: #dc3545;
    font-size: 16px;
    margin-top: 10px;
}

.success-message {
    color: #28a745;
    font-size: 16px;
    margin-top: 10px;
}
</style>
</head>
<body>
    <div class="wrap">
        <div class="header">
        </div>
        <div class="body">
            <div class="container">
                <div class="hint-container">
                    <div class="hint-input-section">
                        <h2>방탈출 힌트 시스템</h2>
                        <div>
                            <input type="text" id="hintNumber" class="hint-number-input" placeholder="힌트 번호 입력" maxlength="10">
                            <button id="getHintBtn" class="hint-btn">힌트 보기</button>
                        </div>
                        <div id="message"></div>
                        <div style="margin-top: 20px; text-align: center;">
                            <a href="./admin_hints.php" style="color: #007bff; text-decoration: none; font-size: 14px;">관리자 페이지</a>
                        </div>
                    </div>

                    <div id="hintContent" class="hint-content">
                        <div id="hintText" class="hint-text"></div>
                        <div id="hintImageContainer"></div>
                        <button id="showAnswerBtn" class="answer-btn">정답 보기</button>
                        
                        <div id="answerContent" class="answer-content">
                            <div id="answerText" class="answer-text"></div>
                            <div id="answerImageContainer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            let currentHintData = null;

            // 힌트 번호 입력 필드에서 Enter 키 처리
            $('#hintNumber').on('keypress', function(e) {
                if (e.which === 13) {
                    $('#getHintBtn').click();
                }
            });

            // 힌트 보기 버튼 클릭
            $('#getHintBtn').click(function() {
                const hintNumber = $('#hintNumber').val().trim();
                
                if (!hintNumber) {
                    showMessage('힌트 번호를 입력해주세요.', 'error');
                    return;
                }

                // 버튼 비활성화
                $(this).prop('disabled', true).text('로딩중...');
                
                // 힌트 데이터 가져오기
                $.ajax({
                    url: './php/get_hint.php',
                    type: 'GET',
                    data: { hint_number: hintNumber },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            currentHintData = response;
                            showHint(response);
                            showMessage('힌트를 찾았습니다!', 'success');
                        } else {
                            showMessage(response.error || '힌트를 찾을 수 없습니다.', 'error');
                            hideHintContent();
                        }
                    },
                    error: function() {
                        showMessage('서버 오류가 발생했습니다.', 'error');
                        hideHintContent();
                    },
                    complete: function() {
                        // 버튼 다시 활성화
                        $('#getHintBtn').prop('disabled', false).text('힌트 보기');
                    }
                });
            });

            // 정답 보기 버튼 클릭
            $('#showAnswerBtn').click(function() {
                if (currentHintData) {
                    showAnswer(currentHintData);
                    $(this).hide();
                }
            });

            function showHint(data) {
                $('#hintText').text(data.hint_text);
                
                // 힌트 이미지 처리
                if (data.hint_image && data.hint_image.trim() !== '') {
                    $('#hintImageContainer').html(`<img src="${data.hint_image}" alt="힌트 이미지" class="hint-image">`);
                } else {
                    $('#hintImageContainer').empty();
                }
                
                $('#hintContent').show();
                $('#answerContent').hide();
                $('#showAnswerBtn').show();
            }

            function showAnswer(data) {
                $('#answerText').text(data.answer_text);
                
                // 정답 이미지 처리
                if (data.answer_image && data.answer_image.trim() !== '') {
                    $('#answerImageContainer').html(`<img src="${data.answer_image}" alt="정답 이미지" class="answer-image">`);
                } else {
                    $('#answerImageContainer').empty();
                }
                
                $('#answerContent').show();
            }

            function hideHintContent() {
                $('#hintContent').hide();
                currentHintData = null;
            }

            function showMessage(message, type) {
                const messageDiv = $('#message');
                messageDiv.removeClass('error-message success-message')
                         .addClass(type === 'error' ? 'error-message' : 'success-message')
                         .text(message);
                
                // 3초 후 메시지 숨기기
                setTimeout(function() {
                    messageDiv.text('').removeClass('error-message success-message');
                }, 3000);
            }
        });
    </script>
</body>
</html>