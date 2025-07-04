<?php
session_start();

// 로그인 확인
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

include('./php/connect_db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>OCR 승인 관리 - 관리자</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gitment/0.0.3/default.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/css/common.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 20px; 
            background-color: #f5f5f5; 
        }
        .container { 
            max-width: 1400px; 
            margin: 0 auto; 
            background: white; 
            border-radius: 10px; 
            box-shadow: 0 0 20px rgba(0,0,0,0.1); 
            overflow: hidden; 
        }
        .header { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; 
            padding: 20px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        }
        .content { 
            padding: 30px; 
        }
        .back-btn { 
            color: white; 
            text-decoration: none; 
            padding: 8px 16px; 
            border: 1px solid rgba(255,255,255,0.3); 
            border-radius: 5px; 
            transition: all 0.3s; 
        }
        .back-btn:hover { 
            background: rgba(255,255,255,0.2); 
            color: white; 
            text-decoration: none; 
        }
        .stats { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
            gap: 20px; 
            margin-bottom: 30px; 
        }
        .stat-card { 
            background: #f8f9fa; 
            padding: 20px; 
            border-radius: 8px; 
            text-align: center; 
            border: 1px solid #dee2e6; 
        }
        .stat-number { 
            font-size: 2em; 
            font-weight: bold; 
            color: #667eea; 
        }
        .pending { color: #ffc107; }
        .approved { color: #28a745; }
        .rejected { color: #dc3545; }
        
        .approval-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .approval-table th,
        .approval-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        .approval-table th {
            background: #f8f9fa;
            font-weight: 600;
            color: #495057;
        }
        .approval-table tr:hover {
            background: #f8f9fa;
        }
        .status-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        .status-approved {
            background: #d4edda;
            color: #155724;
        }
        .status-rejected {
            background: #f8d7da;
            color: #721c24;
        }
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-approve {
            background: #28a745;
            color: white;
        }
        .btn-approve:hover {
            background: #218838;
        }
        .btn-reject {
            background: #dc3545;
            color: white;
        }
        .btn-reject:hover {
            background: #c82333;
        }
        .btn-view {
            background: #007bff;
            color: white;
        }
        .btn-view:hover {
            background: #0056b3;
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
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
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
        .text-preview {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #667eea;
            margin: 10px 0;
            white-space: pre-wrap;
            font-family: 'Courier New', monospace;
            max-height: 200px;
            overflow-y: auto;
        }
        .comment-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px 0;
            resize: vertical;
        }
        .filter-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .filter-section select,
        .filter-section input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 10px;
        }
        .filter-section button {
            padding: 8px 16px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .filter-section button:hover {
            background: #5a6fd8;
        }
        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }
        @media (max-width: 768px) {
            .approval-table {
                font-size: 12px;
            }
            .approval-table th,
            .approval-table td {
                padding: 8px 4px;
            }
            .action-buttons {
                flex-direction: column;
                gap: 4px;
            }
            .btn {
                font-size: 10px;
                padding: 4px 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>OCR 승인 관리</h1>
            <div>
                <span>안녕하세요, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>님</span>
                <a href="dashboard.php" class="back-btn">← 대시보드로</a>
            </div>
        </div>
        
        <div class="content">
            <!-- 통계 -->
            <div class="stats">
                <div class="stat-card">
                    <div class="stat-number pending" id="pendingCount">0</div>
                    <div>대기 중</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number approved" id="approvedCount">0</div>
                    <div>승인됨</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number rejected" id="rejectedCount">0</div>
                    <div>거부됨</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="totalCount">0</div>
                    <div>전체</div>
                </div>
            </div>

            <!-- 필터 -->
            <div class="filter-section">
                <h3>필터</h3>
                <select id="statusFilter">
                    <option value="">전체 상태</option>
                    <option value="pending">대기 중</option>
                    <option value="approved">승인됨</option>
                    <option value="rejected">거부됨</option>
                </select>
                <select id="cardTypeFilter">
                    <option value="">전체 카드 타입</option>
                    <option value="보훈증">보훈증</option>
                    <option value="히어로카드">히어로카드</option>
                    <option value="unknown">기타</option>
                </select>
                <input type="text" id="searchInput" placeholder="사용자명 또는 카드번호 검색">
                <button onclick="loadApprovalData()">필터 적용</button>
                <button onclick="resetFilters()">필터 초기화</button>
            </div>

            <!-- 승인 테이블 -->
            <div id="approvalTableContainer">
                <table class="approval-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>사용자</th>
                            <th>카드 타입</th>
                            <th>카드번호</th>
                            <th>이름</th>
                            <th>신뢰도</th>
                            <th>업로드 시간</th>
                            <th>상태</th>
                            <th>작업</th>
                        </tr>
                    </thead>
                    <tbody id="approvalTableBody">
                        <!-- 데이터가 여기에 로드됩니다 -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- 상세 보기 모달 -->
    <div id="detailModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>OCR 상세 정보</h2>
            <div id="modalContent">
                <!-- 상세 정보가 여기에 표시됩니다 -->
            </div>
        </div>
    </div>

    <!-- 승인/거부 모달 -->
    <div id="actionModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="actionTitle">승인 처리</h2>
            <div id="actionContent">
                <p><strong>사용자:</strong> <span id="actionUser"></span></p>
                <p><strong>카드 타입:</strong> <span id="actionCardType"></span></p>
                <p><strong>카드번호:</strong> <span id="actionCardNumber"></span></p>
                <p><strong>이름:</strong> <span id="actionName"></span></p>
                <p><strong>인식된 텍스트:</strong></p>
                <div id="actionText" class="text-preview"></div>
                <p><strong>처리 의견:</strong></p>
                <textarea id="actionComment" class="comment-input" rows="3" placeholder="승인/거부 사유를 입력하세요"></textarea>
                <div style="margin-top: 20px;">
                    <button id="confirmApprove" class="btn btn-approve" style="margin-right: 10px;">승인</button>
                    <button id="confirmReject" class="btn btn-reject" style="margin-right: 10px;">거부</button>
                    <button id="cancelAction" class="btn" style="background: #6c757d; color: white;">취소</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentActionId = null;
        let currentAction = null;

        // 페이지 로드 시 데이터 로드
        $(document).ready(function() {
            loadApprovalData();
            loadStats();
            
            // 모달 닫기
            $('.close').click(function() {
                $('.modal').hide();
            });
            
            // 모달 외부 클릭 시 닫기
            $(window).click(function(event) {
                if (event.target.classList.contains('modal')) {
                    $('.modal').hide();
                }
            });
        });

        // 승인 데이터 로드
        function loadApprovalData() {
            const statusFilter = $('#statusFilter').val();
            const cardTypeFilter = $('#cardTypeFilter').val();
            const searchFilter = $('#searchInput').val();

            $.ajax({
                url: './php/get_approval_data.php',
                type: 'POST',
                data: {
                    status: statusFilter,
                    card_type: cardTypeFilter,
                    search: searchFilter
                },
                success: function(response) {
                    if (response.success) {
                        displayApprovalTable(response.data);
                    } else {
                        $('#approvalTableBody').html('<tr><td colspan="9" class="no-data">데이터를 불러오는데 실패했습니다.</td></tr>');
                    }
                },
                error: function() {
                    $('#approvalTableBody').html('<tr><td colspan="9" class="no-data">서버 오류가 발생했습니다.</td></tr>');
                }
            });
        }

        // 통계 로드
        function loadStats() {
            $.ajax({
                url: './php/get_approval_stats.php',
                type: 'POST',
                success: function(response) {
                    if (response.success) {
                        $('#pendingCount').text(response.stats.pending || 0);
                        $('#approvedCount').text(response.stats.approved || 0);
                        $('#rejectedCount').text(response.stats.rejected || 0);
                        $('#totalCount').text(response.stats.total || 0);
                    }
                }
            });
        }

        // 승인 테이블 표시
        function displayApprovalTable(data) {
            if (data.length === 0) {
                $('#approvalTableBody').html('<tr><td colspan="9" class="no-data">처리할 데이터가 없습니다.</td></tr>');
                return;
            }

            let tableHtml = '';
            data.forEach(function(item) {
                const statusClass = 'status-' + item.status;
                const statusText = {
                    'pending': '대기 중',
                    'approved': '승인됨',
                    'rejected': '거부됨'
                }[item.status];

                tableHtml += `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.user_username}</td>
                        <td>${item.card_type || '기타'}</td>
                        <td>${item.card_number || '-'}</td>
                        <td>${item.name || '-'}</td>
                        <td>${Math.round(item.confidence * 100)}%</td>
                        <td>${formatDate(item.uploaded_at)}</td>
                        <td><span class="status-badge ${statusClass}">${statusText}</span></td>
                        <td class="action-buttons">
                            <button class="btn btn-view" onclick="viewDetail(${item.id})">상세보기</button>
                            ${item.status === 'pending' ? `
                                <button class="btn btn-approve" onclick="showActionModal(${item.id}, 'approve')">승인</button>
                                <button class="btn btn-reject" onclick="showActionModal(${item.id}, 'reject')">거부</button>
                            ` : ''}
                        </td>
                    </tr>
                `;
            });

            $('#approvalTableBody').html(tableHtml);
        }

        // 상세 보기
        function viewDetail(id) {
            $.ajax({
                url: './php/get_approval_detail.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    if (response.success) {
                        const item = response.data;
                        $('#modalContent').html(`
                            <p><strong>사용자:</strong> ${item.user_username}</p>
                            <p><strong>카드 타입:</strong> ${item.card_type || '기타'}</p>
                            <p><strong>카드번호:</strong> ${item.card_number || '-'}</p>
                            <p><strong>이름:</strong> ${item.name || '-'}</p>
                            <p><strong>신뢰도:</strong> ${Math.round(item.confidence * 100)}%</p>
                            <p><strong>처리 시간:</strong> ${item.processing_time}초</p>
                            <p><strong>업로드 시간:</strong> ${formatDate(item.uploaded_at)}</p>
                            <p><strong>상태:</strong> ${item.status === 'pending' ? '대기 중' : item.status === 'approved' ? '승인됨' : '거부됨'}</p>
                            ${item.admin_comment ? `<p><strong>관리자 의견:</strong> ${item.admin_comment}</p>` : ''}
                            <p><strong>인식된 텍스트:</strong></p>
                            <div class="text-preview">${item.recognized_text}</div>
                        `);
                        $('#detailModal').show();
                    }
                }
            });
        }

        // 승인/거부 모달 표시
        function showActionModal(id, action) {
            currentActionId = id;
            currentAction = action;
            
            $.ajax({
                url: './php/get_approval_detail.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    if (response.success) {
                        const item = response.data;
                        $('#actionTitle').text(action === 'approve' ? '승인 처리' : '거부 처리');
                        $('#actionUser').text(item.user_username);
                        $('#actionCardType').text(item.card_type || '기타');
                        $('#actionCardNumber').text(item.card_number || '-');
                        $('#actionName').text(item.name || '-');
                        $('#actionText').text(item.recognized_text);
                        $('#actionComment').val('');
                        $('#actionModal').show();
                    }
                }
            });
        }

        // 승인/거부 처리
        function processAction(action) {
            const comment = $('#actionComment').val();
            
            $.ajax({
                url: './php/process_approval.php',
                type: 'POST',
                data: {
                    id: currentActionId,
                    action: action,
                    comment: comment
                },
                success: function(response) {
                    if (response.success) {
                        alert(action === 'approve' ? '승인 처리되었습니다.' : '거부 처리되었습니다.');
                        $('#actionModal').hide();
                        loadApprovalData();
                        loadStats();
                    } else {
                        alert('처리 중 오류가 발생했습니다: ' + response.message);
                    }
                },
                error: function() {
                    alert('서버 오류가 발생했습니다.');
                }
            });
        }

        // 필터 초기화
        function resetFilters() {
            $('#statusFilter').val('');
            $('#cardTypeFilter').val('');
            $('#searchInput').val('');
            loadApprovalData();
        }

        // 날짜 포맷
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleString('ko-KR');
        }

        // 이벤트 리스너
        $('#confirmApprove').click(function() {
            processAction('approve');
        });

        $('#confirmReject').click(function() {
            processAction('reject');
        });

        $('#cancelAction').click(function() {
            $('#actionModal').hide();
        });
    </script>
</body>
</html> 