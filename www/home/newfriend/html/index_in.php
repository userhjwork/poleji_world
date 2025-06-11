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

$today = date("Y-m-d");

$set_ctgry = "월부서비";
$set_amount = 10;
?>

<script>

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
                        
                       
                    </div>
                    
                    <div class="input_container">
                        <div class="input_con">
                            <div class="title_wrap">
                                <span class="title">항목</span>
                            </div>
                            <div class="input_text flex">
                                <div class="input_wrap">
                                    <input type="text" id="i_ctgry" value="<?= $set_ctgry ?>">
                                </div>
                            </div>
                        </div>

                        <div class="date_wrap pay input_con">
                            <div class="title_wrap">
                                <span class="title">지급일시</span>
                            </div>
                            <div class="input_date">
                                <div class="input_wrap">
                                    <input type="text" id="i_reward" inputmode="numeric" value="<?= $today ?>">
                                </div>
                            </div>
                        </div>

                        <div class="input_con">
                            <div class="title_wrap">
                                <span class="title">지급금액</span>
                                <span class="sub_title"></span>
                            </div>
                            <div class="input_text flex">
                                <div class="input_wrap">
                                    <input type="text" id="i_amount" class="a_right" inputmode="numeric" pattern="\d*" value="">
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
                                    <textarea name="" id="i_description" placeholder="월 부서비 입금"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button_pop">
                    <button type="button" class="btn_basic btn_bottom" id="btn_submit">
                        <span class="text">입금내역 작성완료</span>
                    </button>
                </div>
                <button type="button" id="go_list">전체 리스트 보기</button>

            </div>
        </div>
        <div class="footer">

        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript">
        
        
        $(function () {
            
            
        });

        flatpickr("#i_reward", {
            dateFormat: "Y-m-d", // 2024-05-21 형식
            maxDate: "today",    // 오늘까지 선택 가능 (원하는 경우)
            locale: "ko" // 한국어 (선택사항)
        });

        $("#go_list").click(function(){
            window.location.href = './index_history_all.php'
        })
        





        $('#i_amount').on('input', function () {
            let val = $(this).val().replace(/[^0-9]/g, ''); // 숫자만 추출
            if (val === '') {
                $(this).val('');
                return;
            }
            $(this).val(Number(val).toLocaleString()); // 쉼표 붙이기
        });
        

        $("#btn_submit").click(function(){
            const i_ctgry = $("#i_ctgry").val();
            const i_reward = $("#i_reward").val();
            const i_amount = $("#i_amount").val();
            const i_description = $("#i_description").val();

            let rawAmount = i_amount.replace(/,/g, '').trim();
        
            // === 유효성 검사 ===
            if (!i_ctgry || i_ctgry === "") {
                alert("항목을 입력해주세요.");
                return;
            }
            if (!i_reward.match(/^\d{4}-\d{2}-\d{2}$/)) {
                alert("결제일시는 YYYY-MM-DD 형식으로 입력해 주세요.");
                return;
            }
            if (rawAmount && !/^\d+(\.\d+)?$/.test(rawAmount)) {
                alert("지원금액은 숫자만 입력 가능합니다.");
                return;
            }

            console.log(i_ctgry, i_reward, rawAmount, i_description);
        
            // === 전송 ===
            $.ajax({
                url: './php/insert_in.php',
                type: 'POST',
                data: {
                    i_ctgry, i_reward, rawAmount, i_description
                },
                success: function(res){
                    alert("입금내역이 저장되었습니다.");
                    // resetInputs(); // 성공 시 폼 초기화
                },
                error: function(err){
                    alert("저장 실패: " + err.responseText);
                }
            });
        })


    </script>
</body>
</html>