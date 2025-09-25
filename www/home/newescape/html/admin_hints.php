<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>힌트 관리 시스템</title>
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newescape/assets/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newescape/assets/css/common.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newescape/assets/css/main.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newescape/assets/css/admin_hints.css">
    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://poleji.cafe24.com/home/newescape/assets/js/script.js"></script>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('./php/connect_db.php');
?>
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
                                <label for="hintImage" class="custom-file-label">이미지 선택</label>
                                <input type="file" id="hintImage" name="hintImage" class="form-control custom-file-input" accept="image/*" style="display:none;">
                                <img id="hintImagePreview" src="#" alt="힌트 이미지 미리보기" style="display:none; max-width:150px; margin-top:10px;" />
                            </div>
                            <div class="form-group">
                                <label for="answerText">정답 텍스트 *</label>
                                <textarea id="answerText" name="answerText" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="answerImage">정답 이미지</label>
                                <label for="answerImage" class="custom-file-label">이미지 선택</label>
                                <input type="file" id="answerImage" name="answerImage" class="form-control custom-file-input" accept="image/*" style="display:none;">
                                <img id="answerImagePreview" src="#" alt="정답 이미지 미리보기" style="display:none; max-width:150px; margin-top:10px;" />
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
                    <label for="editHintImage" class="custom-file-label">이미지 선택</label>
                    <input type="file" id="editHintImage" name="hintImage" class="form-control custom-file-input" accept="image/*" style="display:none;">
                    <img id="editHintImagePreview" src="#" alt="힌트 이미지 미리보기" style="display:none; max-width:150px; margin-top:10px;" />
                </div>
                <div class="form-group">
                    <label for="editAnswerText">정답 텍스트 *</label>
                    <textarea id="editAnswerText" name="answerText" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="editAnswerImage">정답 이미지</label>
                    <label for="editAnswerImage" class="custom-file-label">이미지 선택</label>
                    <input type="file" id="editAnswerImage" name="answerImage" class="form-control custom-file-input" accept="image/*" style="display:none;">
                    <img id="editAnswerImagePreview" src="#" alt="정답 이미지 미리보기" style="display:none; max-width:150px; margin-top:10px;" />
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

            // 이미지 미리보기 함수
            function readURL(input, previewId) {
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $(previewId).attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $(previewId).hide();
                }
            }

            $('#hintImage').change(function() {
                readURL(this, '#hintImagePreview');
            });
            $('#answerImage').change(function() {
                readURL(this, '#answerImagePreview');
            });
            $('#editHintImage').change(function() {
                readURL(this, '#editHintImagePreview');
            });
            $('#editAnswerImage').change(function() {
                readURL(this, '#editAnswerImagePreview');
            });

            // 수정 모달 열 때 기존 이미지 미리보기 표시
            function showEditImagePreviews(hint) {
                if (hint.hint_image) {
                    $('#editHintImagePreview').attr('src', hint.hint_image).show();
                } else {
                    $('#editHintImagePreview').hide();
                }
                if (hint.answer_image) {
                    $('#editAnswerImagePreview').attr('src', hint.answer_image).show();
                } else {
                    $('#editAnswerImagePreview').hide();
                }
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
                            $('#editHintImage').val(''); // 파일 input은 값 세팅 불가
                            $('#editAnswerText').val(hint.answer_text);
                            $('#editAnswerImage').val('');
                            showEditImagePreviews(hint);
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

            // 커스텀 파일 선택 버튼 동작
            $('.custom-file-input').on('change', function() {
                var fileName = $(this).val().split('\\').pop();
                var label = $(this).siblings('.custom-file-label');
                if (fileName) {
                    label.text(fileName).addClass('selected');
                } else {
                    label.text('이미지 선택').removeClass('selected');
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
    </script>
</body>
</html> 