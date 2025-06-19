<?php
require_once './php/check_kakao_login.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>대구동부교회 다부서 지출내역 작성</title>
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

$today = date("Y-m-d");
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
                    <!-- 부서 선택 추가 -->
                    <div class="select_container select_basic">
                        <div class="input_con">
                            <div class="title_wrap">
                                <span class="title">부서선택</span>
                                <span class="sub_title">지출내역을 작성할 부서를 선택해주세요</span>
                            </div>
                            <div class="select_wrap">
                                <select name="" id="department_select">
                                    <option value="">부서를 선택해주세요</option>
                                    <option value="바울새가족부">바울새가족부</option>
                                    <option value="청년부">청년부</option>
                                    <option value="중고등부">중고등부</option>
                                    <option value="초등부">초등부</option>
                                    <option value="유치부">유치부</option>
                                    <option value="영유아부">영유아부</option>
                                    <option value="성가대">성가대</option>
                                    <option value="주일학교">주일학교</option>
                                    <option value="전도부">전도부</option>
                                    <option value="구역부">구역부</option>
                                    <option value="기타">기타</option>
                                </select>
                            </div>
                        </div>
                    </div>

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
                                    <input type="text" id="o_pay" inputmode="numeric" value="<?= $today ?>">
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
                                    <input type="text" id="o_reward" inputmode="numeric" value="">
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
                                    <input type="text" id="o_amount" class="a_right" inputmode="numeric" pattern="\d*" value="">
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
                                    <textarea name="" id="o_description" placeholder="해당 지출내역에 대한 상세한 내역을 남겨주세요. ex) 권빅뱅리더, 동태양조원 1대1 식사"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button_pop">
                    <button type="button" class="btn_basic btn_bottom" id="btn_submit">
                        <span class="text">지출내역 작성완료</span>
                    </button>
                </div>
                <button type="button" id="go_list">지출내역 리스트 보기</button>

            </div>
        </div>
        <div class="footer">

        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript">
        
        
        $(function () {
            
            $("#chr_ctgry_3_desc").hide();
        
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
                const c3_selection = $(this).find('option:selected');
                const desc = c3_selection.attr('title') || '';

                $("#chr_ctgry_3_desc").show();
                $("#chr_ctgry_3_desc").text(desc);
            });
        });

        flatpickr("#o_pay", {
            dateFormat: "Y-m-d", // 2024-05-21 형식
            maxDate: "today",    // 오늘까지 선택 가능 (원하는 경우)
            locale: "ko" // 한국어 (선택사항)
        });

        flatpickr("#o_reward", {
            dateFormat: "Y-m-d", // 2024-05-21 형식
            maxDate: "today",    // 오늘까지 선택 가능 (원하는 경우)
            locale: "ko" // 한국어 (선택사항)
        });

        $("#go_list").click(function(){
            window.location.href = './index_multi_history.php'
        })
        





        $('#o_amount').on('input', function () {
            let val = $(this).val().replace(/[^0-9]/g, ''); // 숫자만 추출
            if (val === '') {
                $(this).val('');
                return;
            }
            $(this).val(Number(val).toLocaleString()); // 쉼표 붙이기
        });
        




        function renderCtgry1() {
            let html = '<option value="">선택</option>';
            Object.keys(ctgryData).forEach(c1 => {
                html += `<option value="${c1}">${c1}</option>`;
            });
            $('#chr_ctgry_1').html(html);
            $('#chr_ctgry_2').html('<option value="">선택</option>');
            $('#chr_ctgry_3').html('<option value="">선택</option>');
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
            const ctgry3List = (ctgryData[ctgry_1] && ctgryData[ctgry_1][ctgry_2]) || [];
            let html = '<option value="">선택</option>';
            ctgry3List.forEach(item => {
                html += `<option value="${item.name}" title="${item.desc}">${item.name}</option>`;
            });
            $('#chr_ctgry_3').html(html);
        }

        $("#btn_submit").click(function(){
            const department = $("#department_select").val();
            const ctgry_1 = $("#chr_ctgry_1").val();
            const ctgry_2 = $("#chr_ctgry_2").val();
            const ctgry_3 = $("#chr_ctgry_3").val();
            const o_pay = $("#o_pay").val();
            const o_reward = $("#o_reward").val();
            const o_amount = $("#o_amount").val();
            const o_description = $("#o_description").val();

            let rawAmount = o_amount.replace(/,/g, '').trim();
        
            // === 유효성 검사 ===
            if (!department) {
                alert("부서를 선택해 주세요.");
                return;
            }
            if (!ctgry_1 || ctgry_1 === "none") {
                alert("1차 항목을 선택해 주세요.");
                return;
            }
            if (!ctgry_2 || ctgry_2 === "none") {
                alert("2차 항목을 선택해 주세요.");
                return;
            }
            if (!ctgry_3 || ctgry_3 === "none") {
                alert("3차 항목을 선택해 주세요.");
                return;
            }
            if (!o_pay.match(/^\d{4}-\d{2}-\d{2}$/)) {
                alert("결제일시는 YYYY-MM-DD 형식으로 입력해 주세요.");
                return;
            }
            if (o_reward && !o_reward.match(/^\d{4}-\d{2}-\d{2}$/)) {
                alert("지원일시가 올바른 형식이 아닙니다.");
                return;
            }
            if (rawAmount && !/^\d+(\.\d+)?$/.test(rawAmount)) {
                alert("지원금액은 숫자만 입력 가능합니다.");
                return;
            }
        
            // === 전송 ===
            $.ajax({
                url: './php/insert_multi.php',
                type: 'POST',
                data: {
                    department, ctgry_1, ctgry_2, ctgry_3,
                    o_pay, o_reward, rawAmount, o_description
                },
                success: function(res){
                    alert("지출내역이 저장되었습니다.");
                    resetInputs(); // 성공 시 폼 초기화
                },
                error: function(err){
                    alert("저장 실패: " + err.responseText);
                }
            });
        })

        function resetInputs() {
            window.location.href = './index_multi.php';
        }


    </script>
</body>
</html> 