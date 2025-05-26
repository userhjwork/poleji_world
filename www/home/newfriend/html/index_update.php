<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>대구동부교회 바울 새가족부 메인</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gitment/0.0.3/default.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> <!-- 달력 스타일 -->
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newfriend/assets/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newfriend/assets/css/common.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newfriend/assets/css/main.css"> 
    

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://poleji.cafe24.com/home/newfriend/assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> <!-- 달력 스크립트 -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ko.js"></script> <!-- 달력 스크립트 -->
<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('./php/connect_db.php');

$o_idx = $_GET['o_idx'] ?? null;

if (!$o_idx || !is_numeric($o_idx)) {
    die('잘못된 접근입니다.');
}

$today = date("Y-m-d");


$sql = "SELECT * FROM tbl_church_out WHERE o_idx = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $o_idx);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("데이터가 존재하지 않습니다.");
}
?>

<script>
    let ctgryData = {};

    $(function(){
        $.getJSON('./php/get_ctgry_all.php', function (data) {
            ctgryData = data;
        
            console.log(data);
            renderCtgry1(); // 1차 항목 먼저 렌더링
        });
    })
</script>
</head>
<body>
    <div class="wrap">
        <div class="header">
        </div>
        <div class="body">
            <div class="container input_ctgry">
                <div class="select_wrap">
                    <div class="select_container select_basic">
                        <div class="input_con">
                            <div class="title_wrap">
                                <span class="title">1차항목</span>
                            </div>
                            <div class="select_wrap">
                                <select name="" id="chr_ctgry_1">
                                    <option value="none">선택</option>
                                </select>
                            </div>
                        </div>
                        <div class="input_con">
                            <div class="title_wrap">
                                <span class="title">2차항목</span>
                            </div>
                            <div class="select_wrap">
                                <select name="" id="chr_ctgry_2">
                                    <option value="none">선택</option>
                                </select>
                            </div>
                        </div>
                        <div class="input_con">
                            <div class="title_wrap">
                                <span class="title">3차항목</span>
                            </div>
                            <div class="select_wrap">
                                <select name="" id="chr_ctgry_3">
                                    <option value="none">선택</option>
                                </select>
                                <span class="desc" id="chr_ctgry_3_desc"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="input_container">
                        <div class="date_wrap pay input_con">
                            <div class="title_wrap">
                                <span class="title">결제일시</span>
                                <span class="sub_title">필요금액 결제 및 구매 일시</span>
                            </div>
                            <div class="input_date">
                                <div class="input_wrap">
                                    <input type="text" id="o_pay" inputmode="numeric" value="<?= htmlspecialchars($row['o_pay']) ?>">
                                </div>
                            </div>
                        </div>

                        <div class="date_wrap pay input_con">
                            <div class="title_wrap">
                                <span class="title">지원일시</span>
                                <span class="sub_title">결제 당사자에게 지원 금액 전달 일시</span>
                            </div>
                            <div class="input_date">
                                <div class="input_wrap">
                                    <input type="text" id="o_reward" inputmode="numeric" value="<?= htmlspecialchars($row['o_pay']) ?>">
                                </div>
                            </div>
                        </div>

                        <div class="input_con">
                            <div class="title_wrap">
                                <span class="title">지원금액</span>
                                <span class="sub_title">결제금액과 지원금액이 다를 시 지원금액</span>
                            </div>
                            <div class="input_text flex">
                                <div class="input_wrap">
                                    <input type="text" id="o_amount" class="a_right" inputmode="numeric" pattern="\d*" value="<?= number_format($row['o_amount']) ?>">
                                </div>
                                <span class="text">원</span>
                            </div>
                        </div>

                        <div class="input_con">
                            <div class="title_wrap">
                                <span class="title">상세설명</span>
                            </div>
                            <div class="input_text flex">
                                <div class="input_wrap">
                                    <textarea name="" id="o_description" placeholder="해당 지출내역에 대한 상세한 내역을 남겨주세요. ex) 권빅뱅리더, 동태양조원 1대1 식사"><?= htmlspecialchars($row['o_description']) ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button_pop">
                    <button type="button" class="btn_basic btn_bottom" id="btn_submit">
                        <span class="text">지출내역 수정완료</span>
                    </button>
                </div>

            </div>
        </div>
        <div class="footer">
            
            </div>
            
            
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script type="text/javascript">
            
            
            flatpickr("#o_pay", { dateFormat: "Y-m-d", maxDate: "today", locale: "ko" });
            flatpickr("#o_reward", { dateFormat: "Y-m-d", maxDate: "today", locale: "ko" });
            
            $('#o_amount').on('input', function () {
                let val = $(this).val().replace(/[^0-9]/g, '');
                $(this).val(val ? Number(val).toLocaleString() : '');
            });
            
            $('#chr_ctgry_1').on('change', function () {
                const c1 = $(this).val();
                renderCtgry2(c1);
                $("#chr_ctgry_3_desc").hide();
            });
            
            $('#chr_ctgry_2').on('change', function () {
                const c1 = $('#chr_ctgry_1').val();
                const c2 = $(this).val();
                renderCtgry3(c1, c2);
                $("#chr_ctgry_3_desc").hide();
            });
            
            $('#chr_ctgry_3').on('change', function () {
                const desc = $(this).find('option:selected').attr('title') || '';
                $('#chr_ctgry_3_desc').text(desc).show();
            });
            
            function renderCtgry1() {
                let html = '<option value="">선택</option>';
                Object.keys(ctgryData).forEach(c1 => {
                    html += `<option value="${c1}">${c1}</option>`;
                });
                $('#chr_ctgry_1').html(html);
                $('#chr_ctgry_2').html('<option value="">선택</option>');
                $('#chr_ctgry_3').html('<option value="">선택</option>');
                setInitialValues();
            }
            
            function renderCtgry2(ctgry_1) {
                const ctgry2 = ctgryData[ctgry_1] || {};
                let html = '<option value="">선택</option>';
                Object.keys(ctgry2).forEach(c2 => {
                    html += `<option value="${c2}">${c2}</option>`;
                });
                $('#chr_ctgry_2').html(html);
                $('#chr_ctgry_3').html('<option value="">선택</option>');
            }
            
            function renderCtgry3(ctgry_1, ctgry_2) {
                const list = (ctgryData[ctgry_1] && ctgryData[ctgry_1][ctgry_2]) || [];
                let html = '<option value="">선택</option>';
                list.forEach(item => {
                    html += `<option value="${item.name}" title="${item.desc}">${item.name}</option>`;
                });
                $('#chr_ctgry_3').html(html);
            }
            
            function setInitialValues() {
                $('#chr_ctgry_1').val("<?= $row['ctgry_1'] ?>").trigger("change");
                setTimeout(() => {
                    $('#chr_ctgry_2').val("<?= $row['ctgry_2'] ?>").trigger("change");
                }, 200);
                setTimeout(() => {
                    $('#chr_ctgry_3').val("<?= $row['ctgry_3'] ?>").trigger("change");
                }, 400);
            }
            
            $('#btn_submit').click(function () {
                const ctgry_1 = $('#chr_ctgry_1').val();
                const ctgry_2 = $('#chr_ctgry_2').val();
                const ctgry_3 = $('#chr_ctgry_3').val();
                const o_pay = $('#o_pay').val();
                const o_reward = $('#o_reward').val();
                const o_description = $('#o_description').val();
                let rawAmount = $('#o_amount').val().replace(/,/g, '').trim();
                
                if (!ctgry_1 || !ctgry_2 || !ctgry_3 || !o_pay.match(/^\d{4}-\d{2}-\d{2}$/)) return alert("필수 항목을 정확히 입력해 주세요.");
                if (o_reward && !o_reward.match(/^\d{4}-\d{2}-\d{2}$/)) return alert("지원일자는 YYYY-MM-DD 형식이어야 합니다.");
                if (rawAmount && !/^\d+(\.\d+)?$/.test(rawAmount)) return alert("지원금액은 숫자만 입력 가능합니다.");
                
                $.post('./php/update_out.php', {
                    o_idx: <?= $o_idx ?>,
                    ctgry_1, ctgry_2, ctgry_3,
                    o_pay, o_reward,
                    o_amount: rawAmount,
                    o_description
                }, function(res) {
                    alert("수정되었습니다.");
                    window.location.href = './index_history.php';
                }).fail(function(err) {
                    alert("수정 실패: " + err.responseText);
                });
                
            });
                
        </script>
    </body>
</html>