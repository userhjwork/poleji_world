<?php
require_once './php/check_kakao_login.php';
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>부서별 카테고리 관리</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .category-container {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .category-item {
            margin: 5px 0;
            padding: 5px;
            background: #f8f9fa;
            border-radius: 3px;
        }
        .btn-add-category {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2>부서별 카테고리 관리</h2>
        
        <!-- 부서 선택 -->
        <div class="form-group">
            <label for="department">부서 선택</label>
            <select class="form-control" id="department">
                <option value="">선택하세요</option>
                <option value="바울새가족부">바울새가족부</option>
                <option value="청년부">청년부</option>
                <option value="기타">기타</option>
            </select>
        </div>

        <!-- 카테고리 관리 섹션 -->
        <div id="categoryManagement" style="display: none;">
            <!-- 1차 카테고리 -->
            <div class="category-container">
                <h4>1차 카테고리</h4>
                <div id="ctgry1List"></div>
                <button class="btn btn-primary btn-add-category" onclick="showAddCategoryModal(1)">1차 카테고리 추가</button>
            </div>

            <!-- 2차 카테고리 -->
            <div class="category-container">
                <h4>2차 카테고리</h4>
                <div id="ctgry2List"></div>
                <button class="btn btn-primary btn-add-category" onclick="showAddCategoryModal(2)">2차 카테고리 추가</button>
            </div>

            <!-- 3차 카테고리 -->
            <div class="category-container">
                <h4>3차 카테고리</h4>
                <div id="ctgry3List"></div>
                <button class="btn btn-primary btn-add-category" onclick="showAddCategoryModal(3)">3차 카테고리 추가</button>
            </div>
        </div>

        <!-- 카테고리 추가/수정 모달 -->
        <div class="modal fade" id="categoryModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">카테고리 추가/수정</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="categoryForm">
                            <input type="hidden" id="categoryId">
                            <input type="hidden" id="categoryLevel">
                            
                            <div class="form-group" id="parentCategoryGroup" style="display: none;">
                                <label for="parentCategory">상위 카테고리</label>
                                <select class="form-control" id="parentCategory"></select>
                            </div>

                            <div class="form-group">
                                <label for="categoryName">카테고리명</label>
                                <input type="text" class="form-control" id="categoryName" required>
                            </div>

                            <div class="form-group">
                                <label for="categoryDescription">설명</label>
                                <textarea class="form-control" id="categoryDescription"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="sortOrder">정렬 순서</label>
                                <input type="number" class="form-control" id="sortOrder" value="0">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="isActive" checked>
                                    <label class="custom-control-label" for="isActive">활성화</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">취소</button>
                        <button type="button" class="btn btn-primary" onclick="saveCategory()">저장</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        let currentDepartment = '';
        let categories = {};

        // 부서 선택 시 카테고리 로드
        $('#department').on('change', function() {
            currentDepartment = $(this).val();
            if (currentDepartment) {
                loadCategories();
                $('#categoryManagement').show();
            } else {
                $('#categoryManagement').hide();
            }
        });

        // 카테고리 데이터 로드
        function loadCategories() {
            $.getJSON('./php/get_categories.php', { department: currentDepartment }, function(data) {
                categories = data;
                renderCategories();
            });
        }

        // 카테고리 렌더링
        function renderCategories() {
            // 1차 카테고리 렌더링
            let html1 = '';
            categories.ctgry1.forEach(cat => {
                html1 += createCategoryItem(cat, 1);
            });
            $('#ctgry1List').html(html1);

            // 2차 카테고리 렌더링
            let html2 = '';
            categories.ctgry2.forEach(cat => {
                html2 += createCategoryItem(cat, 2);
            });
            $('#ctgry2List').html(html2);

            // 3차 카테고리 렌더링
            let html3 = '';
            categories.ctgry3.forEach(cat => {
                html3 += createCategoryItem(cat, 3);
            });
            $('#ctgry3List').html(html3);
        }

        // 카테고리 아이템 HTML 생성
        function createCategoryItem(cat, level) {
            return `
                <div class="category-item" data-id="${cat.id}">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>${cat.category_name}</strong>
                            ${cat.description ? `<small class="text-muted ml-2">${cat.description}</small>` : ''}
                        </div>
                        <div>
                            <button class="btn btn-sm btn-info" onclick="editCategory(${cat.id}, ${level})">수정</button>
                            <button class="btn btn-sm btn-danger" onclick="deleteCategory(${cat.id}, ${level})">삭제</button>
                        </div>
                    </div>
                </div>
            `;
        }

        // 카테고리 추가 모달 표시
        function showAddCategoryModal(level) {
            $('#categoryId').val('');
            $('#categoryLevel').val(level);
            $('#categoryName').val('');
            $('#categoryDescription').val('');
            $('#sortOrder').val(0);
            $('#isActive').prop('checked', true);

            // 상위 카테고리 선택 표시 (2차, 3차 카테고리인 경우)
            if (level > 1) {
                $('#parentCategoryGroup').show();
                let parentOptions = '';
                if (level === 2) {
                    categories.ctgry1.forEach(cat => {
                        parentOptions += `<option value="${cat.id}">${cat.category_name}</option>`;
                    });
                } else if (level === 3) {
                    categories.ctgry2.forEach(cat => {
                        parentOptions += `<option value="${cat.id}">${cat.category_name}</option>`;
                    });
                }
                $('#parentCategory').html(parentOptions);
            } else {
                $('#parentCategoryGroup').hide();
            }

            $('#categoryModal').modal('show');
        }

        // 카테고리 수정
        function editCategory(id, level) {
            const category = categories[`ctgry${level}`].find(c => c.id === id);
            if (category) {
                $('#categoryId').val(category.id);
                $('#categoryLevel').val(level);
                $('#categoryName').val(category.category_name);
                $('#categoryDescription').val(category.description);
                $('#sortOrder').val(category.sort_order);
                $('#isActive').prop('checked', category.is_active);

                if (level > 1) {
                    $('#parentCategoryGroup').show();
                    let parentOptions = '';
                    if (level === 2) {
                        categories.ctgry1.forEach(cat => {
                            parentOptions += `<option value="${cat.id}" ${cat.id === category.parent_id ? 'selected' : ''}>${cat.category_name}</option>`;
                        });
                    } else if (level === 3) {
                        categories.ctgry2.forEach(cat => {
                            parentOptions += `<option value="${cat.id}" ${cat.id === category.parent_id ? 'selected' : ''}>${cat.category_name}</option>`;
                        });
                    }
                    $('#parentCategory').html(parentOptions);
                } else {
                    $('#parentCategoryGroup').hide();
                }

                $('#categoryModal').modal('show');
            }
        }

        // 카테고리 저장
        function saveCategory() {
            const data = {
                id: $('#categoryId').val(),
                department: currentDepartment,
                ctgry_level: $('#categoryLevel').val(),
                parent_id: $('#categoryLevel').val() > 1 ? $('#parentCategory').val() : null,
                category_name: $('#categoryName').val(),
                description: $('#categoryDescription').val(),
                sort_order: $('#sortOrder').val(),
                is_active: $('#isActive').is(':checked')
            };

            $.ajax({
                url: './php/save_category.php',
                type: 'POST',
                data: data,
                success: function(response) {
                    $('#categoryModal').modal('hide');
                    loadCategories();
                    alert('카테고리가 저장되었습니다.');
                },
                error: function(xhr) {
                    alert('저장 실패: ' + xhr.responseText);
                }
            });
        }

        // 카테고리 삭제
        function deleteCategory(id, level) {
            if (confirm('정말로 이 카테고리를 삭제하시겠습니까?')) {
                $.ajax({
                    url: './php/delete_category.php',
                    type: 'POST',
                    data: { id: id, level: level },
                    success: function(response) {
                        loadCategories();
                        alert('카테고리가 삭제되었습니다.');
                    },
                    error: function(xhr) {
                        alert('삭제 실패: ' + xhr.responseText);
                    }
                });
            }
        }
    </script>
</body>
</html> 