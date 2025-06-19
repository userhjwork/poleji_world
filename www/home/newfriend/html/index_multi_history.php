<?php
require_once './php/check_kakao_login.php';
error_reporting(E_ALL);

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>대구동부교회 다부서 지출내역 조회</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gitment/0.0.3/default.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newfriend/assets/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newfriend/assets/css/common.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newfriend/assets/css/main.css"> 
    

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://poleji.cafe24.com/home/newfriend/assets/js/script.js"></script>
<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('./php/connect_db.php');

// === 페이징 처리 ===
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 10;
$offset = ($page - 1) * $perPage;

// === 검색 조건 ===
$searchDepartment = $_GET['department'] ?? '';
$searchStartDate = $_GET['start_date'] ?? '';
$searchEndDate = $_GET['end_date'] ?? '';

// === 쿼리 조건 구성 ===
$whereConditions = [];
$params = [];

if ($searchDepartment) {
    $whereConditions[] = "department = :department";
    $params[':department'] = $searchDepartment;
}

if ($searchStartDate) {
    $whereConditions[] = "o_pay >= :start_date";
    $params[':start_date'] = $searchStartDate;
}

if ($searchEndDate) {
    $whereConditions[] = "o_pay <= :end_date";
    $params[':end_date'] = $searchEndDate;
}

$whereClause = $whereConditions ? 'WHERE ' . implode(' AND ', $whereConditions) : '';

// === 전체 레코드 수 조회 ===
$countSQL = "SELECT COUNT(*) FROM tbl_church_out_multi $whereClause";
$stmt = $pdo->prepare($countSQL);
foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
}
$stmt->execute();
$totalRecords = $stmt->fetchColumn();
$totalPages = ceil($totalRecords / $perPage);

// === 데이터 조회 ===
$sql = "
    SELECT * FROM tbl_church_out_multi 
    $whereClause 
    ORDER BY o_pay DESC, id DESC 
    LIMIT :offset, :perPage
";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
}
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

// === 부서 목록 조회 ===
$deptSQL = "SELECT DISTINCT department FROM tbl_church_out_multi ORDER BY department";
$deptStmt = $pdo->query($deptSQL);
$departments = $deptStmt->fetchAll(PDO::FETCH_COLUMN);

?>
</head>
<body>
    <div class="wrap">
        <div class="header">
        </div>
        <div class="body">
            <div class="container input_ctgry">
                <h2>다부서 지출내역 조회</h2>
                
                <!-- 검색 폼 -->
                <form method="GET" class="search-form">
                    <div class="search-row">
                        <select name="department">
                            <option value="">전체 부서</option>
                            <?php foreach ($departments as $dept): ?>
                            <option value="<?= htmlspecialchars($dept) ?>" <?= $searchDepartment === $dept ? 'selected' : '' ?>>
                                <?= htmlspecialchars($dept) ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <input type="date" name="start_date" value="<?= htmlspecialchars($searchStartDate) ?>" placeholder="시작일">
                        <input type="date" name="end_date" value="<?= htmlspecialchars($searchEndDate) ?>" placeholder="종료일">
                        
                        <button type="submit">검색</button>
                        <a href="index_multi.php" class="btn_write">새 지출내역 작성</a>
                    </div>
                </form>

                <!-- 결과 테이블 -->
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>부서</th>
                                <th>1차항목</th>
                                <th>2차항목</th>
                                <th>3차항목</th>
                                <th>결제일시</th>
                                <th>지원일시</th>
                                <th>지원금액</th>
                                <th>상세설명</th>
                                <th>관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records as $record): ?>
                            <tr>
                                <td><?= htmlspecialchars($record['department']) ?></td>
                                <td><?= htmlspecialchars($record['ctgry_1']) ?></td>
                                <td><?= htmlspecialchars($record['ctgry_2']) ?></td>
                                <td><?= htmlspecialchars($record['ctgry_3']) ?></td>
                                <td><?= htmlspecialchars($record['o_pay']) ?></td>
                                <td><?= $record['o_reward'] ? htmlspecialchars($record['o_reward']) : '-' ?></td>
                                <td class="amount"><?= $record['o_amount'] ? number_format($record['o_amount']) . '원' : '-' ?></td>
                                <td><?= nl2br(htmlspecialchars($record['o_description'])) ?></td>
                                <td>
                                    <a href="index_multi_update.php?id=<?= $record['id'] ?>" class="btn_edit">수정</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- 페이징 -->
                <?php if ($totalPages > 1): ?>
                <div class="pagination">
                    <?php if ($page > 1): ?>
                    <a href="?page=<?= $page-1 ?>&department=<?= urlencode($searchDepartment) ?>&start_date=<?= urlencode($searchStartDate) ?>&end_date=<?= urlencode($searchEndDate) ?>" class="page-link">&laquo; 이전</a>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?page=<?= $i ?>&department=<?= urlencode($searchDepartment) ?>&start_date=<?= urlencode($searchStartDate) ?>&end_date=<?= urlencode($searchEndDate) ?>" 
                       class="page-link <?= $i === $page ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                    <?php endfor; ?>
                    
                    <?php if ($page < $totalPages): ?>
                    <a href="?page=<?= $page+1 ?>&department=<?= urlencode($searchDepartment) ?>&start_date=<?= urlencode($searchStartDate) ?>&end_date=<?= urlencode($searchEndDate) ?>" class="page-link">다음 &raquo;</a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

            </div>
        </div>
        <div class="footer">
        </div>
    </div>

    <style>
    .search-form {
        margin: 20px 0;
        padding: 15px;
        background: #f5f5f5;
        border-radius: 5px;
    }
    .search-row {
        display: flex;
        gap: 10px;
        align-items: center;
    }
    .search-row select,
    .search-row input[type="date"] {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .search-row button {
        padding: 8px 15px;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn_write {
        padding: 8px 15px;
        background: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        margin-left: auto;
    }
    .table-container {
        margin: 20px 0;
        overflow-x: auto;
    }
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    .data-table th,
    .data-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    .data-table th {
        background-color: #f8f9fa;
        font-weight: bold;
    }
    .data-table tr:hover {
        background-color: #f5f5f5;
    }
    .amount {
        text-align: right;
    }
    .btn_edit {
        padding: 5px 10px;
        background: #17a2b8;
        color: white;
        text-decoration: none;
        border-radius: 3px;
        font-size: 0.9em;
    }
    .pagination {
        display: flex;
        justify-content: center;
        gap: 5px;
        margin: 20px 0;
    }
    .page-link {
        padding: 8px 12px;
        border: 1px solid #ddd;
        text-decoration: none;
        color: #007bff;
        border-radius: 4px;
    }
    .page-link.active {
        background: #007bff;
        color: white;
        border-color: #007bff;
    }
    </style>

</body>
</html> 