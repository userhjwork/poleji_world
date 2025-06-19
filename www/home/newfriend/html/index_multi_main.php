<?php
require_once './php/check_kakao_login.php';
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>다중 부서 지출 관리</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .container {
            max-width: 800px;
        }
        .card {
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #eee;
            padding: 15px 20px;
        }
        .card-body {
            padding: 20px;
        }
        .btn-custom {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            text-align: left;
            font-size: 1.1em;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #000;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .department-title {
            color: #333;
            font-size: 1.5em;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #007bff;
        }
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-right logout-btn">
            <a href="./php/kakao_logout.php" class="btn btn-outline-danger">로그아웃</a>
        </div>

        <h2 class="text-center mb-4">다중 부서 지출 관리</h2>

        <!-- 바울새가족부 섹션 -->
        <div class="card">
            <div class="card-header">
                <h3 class="department-title">바울새가족부</h3>
            </div>
            <div class="card-body">
                <a href="index_multi.php?department=바울새가족부" class="btn btn-primary btn-custom">
                    지출 등록
                </a>
                <a href="index_multi_history.php?department=바울새가족부" class="btn btn-success btn-custom">
                    지출 내역 조회
                </a>
                <a href="index_multi_update.php?department=바울새가족부" class="btn btn-info btn-custom">
                    지출 내역 수정
                </a>
            </div>
        </div>

        <!-- 청년부 섹션 -->
        <div class="card">
            <div class="card-header">
                <h3 class="department-title">청년부</h3>
            </div>
            <div class="card-body">
                <a href="index_multi.php?department=청년부" class="btn btn-primary btn-custom">
                    지출 등록
                </a>
                <a href="index_multi_history.php?department=청년부" class="btn btn-success btn-custom">
                    지출 내역 조회
                </a>
                <a href="index_multi_update.php?department=청년부" class="btn btn-info btn-custom">
                    지출 내역 수정
                </a>
            </div>
        </div>

        <!-- 기타 부서 섹션 -->
        <div class="card">
            <div class="card-header">
                <h3 class="department-title">기타 부서</h3>
            </div>
            <div class="card-body">
                <a href="index_multi.php?department=기타" class="btn btn-primary btn-custom">
                    지출 등록
                </a>
                <a href="index_multi_history.php?department=기타" class="btn btn-success btn-custom">
                    지출 내역 조회
                </a>
                <a href="index_multi_update.php?department=기타" class="btn btn-info btn-custom">
                    지출 내역 수정
                </a>
            </div>
        </div>

        <!-- 카테고리 관리 섹션 -->
        <div class="card">
            <div class="card-header">
                <h3 class="department-title">카테고리 관리</h3>
            </div>
            <div class="card-body">
                <a href="manage_categories.php" class="btn btn-warning btn-custom">
                    부서별 카테고리 관리
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 