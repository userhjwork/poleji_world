<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>힌트 관리 시스템</title>
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
.admin-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.admin-header {
    background: #343a40;
    color: white;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 30px;
    text-align: center;
}

.admin-header h1 {
    margin: 0;
    font-size: 28px;
}

.hint-form {
    background: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

.form-control {
    width: 100%;
    padding: 12px;
    border: 2px solid #ddd;
    border-radius: 6px;
    font-size: 16px;
    box-sizing: border-box;
}

.form-control:focus {
    border-color: #007bff;
    outline: none;
}

textarea.form-control {
    min-height: 100px;
    resize: vertical;
}

.btn {
    padding: 12px 25px;
    font-size: 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s;
    margin-right: 10px;
}

.btn-primary {
    background: #007bff;
    color: white;
}

.btn-primary:hover {
    background: #0056b3;
}

.btn-success {
    background: #28a745;
    color: white;
}

.btn-success:hover {
    background: #218838;
}

.btn-danger {
    background: #dc3545;
    color: white;
}

.btn-danger:hover {
    background: #c82333;
}

.hint-list {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.hint-item {
    padding: 20px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.hint-item:last-child {
    border-bottom: none;
}

.hint-info {
    flex: 1;
}

.hint-number {
    font-weight: bold;
    color: #007bff;
    font-size: 18px;
    margin-bottom: 5px;
}

.hint-text {
    color: #666;
    margin-bottom: 5px;
}

.hint-actions {
    display: flex;
    gap: 10px;
}

.message {
    padding: 15px;
    border-radius: 6px;
    margin-bottom: 20px;
}

.message.success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.message.error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
}

.modal-content {
    background-color: white;
    margin: 5% auto;
    padding: 30px;
    border-radius: 10px;
    width: 80%;
    max-width: 600px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #000;
}
</style>
</head>
<body>
    <div class="wrap">
        <div class="header">
        </div>
        <div class="body">
            <div class="container">
                <div class="admin-container">
                    <div class="admin-header">
                        <h1>방탈출 힌트 관리 시스템</h1>
                        <p>힌트를 추가, 수정, 삭제할 수 있습니다.</p>
                    </div>

                    <div id="message"></div>

                    <div class="hint-form">
                        <h3>새 힌트 추가</h3>
                        <form id="hintForm">
                            <div class="form-group">
                                <label for="hintNumber">힌트 번호 *</label>
                                <input type="text" id="hintNumber" name="hintNumber" class="form-control" required maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="hintText">힌트 텍스트 *</label>
                                <textarea id="hintText" name="hintText" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="hintImage">힌트 이미지</label>
                                <input type="file" id="hintImage" name="hintImage" class="form-control" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="answerText">정답 텍스트 *</label>
                                <textarea id="answerText" name="answerText" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="answerImage">정답 이미지</label>
                                <input type="file" id="answerImage" name="answerImage" class="form-control" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">힌트 저장</button>
                            <button type="button" class="btn btn-success" onclick="loadHints()">목록 새로고침</button>
                        </form>
                    </div>

                    <div class="hint-list">
                        <h3>힌트 목록</h3>
                        <div id="hintList">
                            <!-- 힌트 목록이 여기에 로드됩니다 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
        </div>
    </div>

    <!-- 수정 모달 -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>힌트 수정</h3>
            <form id="editForm">
                <input type="hidden" id="editId" name="id">
                <div class="form-group">
                    <label for="editHintNumber">힌트 번호 *</label>
                    <input type="text" id="editHintNumber" name="hintNumber" class="form-control" required maxlength="10">
                </div>
                <div class="form-group">
                    <label for="editHintText">힌트 텍스트 *</label>
                    <textarea id="editHintText" name="hintText" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="editHintImage">힌트 이미지</label>
                    <input type="file" id="editHintImage" name="hintImage" class="form-control" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="editAnswerText">정답 텍스트 *</label>
                    <textarea id="editAnswerText" name="answerText" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="editAnswerImage">정답 이미지</label>
                    <input type="file" id="editAnswerImage" name="answerImage" class="form-control" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">수정 완료</button>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            loadHints();

            // 새 힌트 추가
            $('#hintForm').submit(function(e) {
                e.preventDefault();
                
                const formData = {
                    hint_number: $('#hintNumber').val().trim(),
                    hint_text: $('#hintText').val().trim(),
                    hint_image: $('#hintImage').val().trim(),
                    answer_text: $('#answerText').val().trim(),
                    answer_image: $('#answerImage').val().trim()
                };

                $.ajax({
                    url: './php/save_hint.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            showMessage('힌트가 성공적으로 저장되었습니다.', 'success');
                            $('#hintForm')[0].reset();
                            loadHints();
                        } else {
                            showMessage(response.error || '저장에 실패했습니다.', 'error');
                        }
                    },
                    error: function() {
                        showMessage('서버 오류가 발생했습니다.', 'error');
                    }
                });
            });

            // 수정 폼 제출
            $('#editForm').submit(function(e) {
                e.preventDefault();
                
                const formData = {
                    id: $('#editId').val(),
                    hint_number: $('#editHintNumber').val().trim(),
                    hint_text: $('#editHintText').val().trim(),
                    hint_image: $('#editHintImage').val().trim(),
                    answer_text: $('#editAnswerText').val().trim(),
                    answer_image: $('#editAnswerImage').val().trim()
                };

                
                $.ajax({
                    url: './php/update_hint.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            showMessage('힌트가 성공적으로 수정되었습니다.', 'success');
                            $('#editModal').hide();
                            loadHints();
                        } else {
                            showMessage(response.error || '수정에 실패했습니다.', 'error');
                        }
                    },
                    error: function() {
                        showMessage('서버 오류가 발생했습니다.', 'error');
                    }
                });
            });

            // 모달 닫기
            $('.close').click(function() {
                $('#editModal').hide();
            });

            $(window).click(function(e) {
                if (e.target == $('#editModal')[0]) {
                    $('#editModal').hide();
                }
            });
        });

        function loadHints() {
            $.ajax({
                url: './php/get_all_hints.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        renderHints(response.hints);
                    } else {
                        showMessage('힌트 목록을 불러오는데 실패했습니다.', 'error');
                    }
                },
                error: function() {
                    showMessage('서버 오류가 발생했습니다.', 'error');
                }
            });
        }

        function renderHints(hints) {
            let html = '';
            if (hints.length === 0) {
                html = '<div class="hint-item"><p>등록된 힌트가 없습니다.</p></div>';
            } else {
                hints.forEach(hint => {
                    html += `
                        <div class="hint-item">
                            <div class="hint-info">
                                <div class="hint-number">${hint.hint_number}</div>
                                <div class="hint-text">${hint.hint_text.substring(0, 50)}${hint.hint_text.length > 50 ? '...' : ''}</div>
                            </div>
                            <div class="hint-actions">
                                <button class="btn btn-primary" onclick="editHint(${hint.id})">수정</button>
                                <button class="btn btn-danger" onclick="deleteHint(${hint.id})">삭제</button>
                            </div>
                        </div>
                    `;
                });
            }
            $('#hintList').html(html);
        }

        function editHint(id) {
            $.ajax({
                url: './php/get_hint_by_id.php',
                type: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        const hint = response.hint;
                        $('#editId').val(hint.id);
                        $('#editHintNumber').val(hint.hint_number);
                        $('#editHintText').val(hint.hint_text);
                        $('#editHintImage').val(hint.hint_image);
                        $('#editAnswerText').val(hint.answer_text);
                        $('#editAnswerImage').val(hint.answer_image);
                        $('#editModal').show();
                    } else {
                        showMessage('힌트 정보를 불러오는데 실패했습니다.', 'error');
                    }
                },
                error: function() {
                    showMessage('서버 오류가 발생했습니다.', 'error');
                }
            });
        }

        function deleteHint(id) {
            if (confirm('정말로 이 힌트를 삭제하시겠습니까?')) {
                $.ajax({
                    url: './php/delete_hint.php',
                    type: 'POST',
                    data: { id: id },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            showMessage('힌트가 성공적으로 삭제되었습니다.', 'success');
                            loadHints();
                        } else {
                            showMessage(response.error || '삭제에 실패했습니다.', 'error');
                        }
                    },
                    error: function() {
                        showMessage('서버 오류가 발생했습니다.', 'error');
                    }
                });
            }
        }

        function showMessage(message, type) {
            const messageDiv = $('#message');
            messageDiv.removeClass('message success error')
                     .addClass(`message ${type}`)
                     .text(message);
            
            setTimeout(function() {
                messageDiv.text('').removeClass('message success error');
            }, 3000);
        }
    </script>
</body>
</html> 