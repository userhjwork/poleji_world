<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>대구동부교회 바울 새가족부 메인</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gitment/0.0.3/default.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newfriend/assets/css/normalize.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newfriend/assets/css/common.css">
    <link rel="stylesheet" href="https://poleji.cafe24.com/home/newfriend/assets/css/main.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://poleji.cafe24.com/home/newfriend/assets/js/script.js"></script>
<?php
include('./php/connect_db.php')
?>    
    <?php
    $today = date("Y-m-d");

    $selected_val = '정기지출';


    $sql = "SELECT * FROM tbl_church_out_ctgry";
    $result_sql = $conn->query($sql);
    if ($result_sql->num_rows > 0) {
        while ($row_sql = $result_sql->fetch_assoc()) {
            // echo "<pre>";
            // print_r($row_sql);
            // echo "</pre>";
        } 
    }

    $sql_ctgry_1 = "SELECT ctgry_1 FROM tbl_church_out_ctgry GROUP BY ctgry_1 ORDER BY ctgry_id";
    $ctgry_1_option = '';
    $result_sql_ctgry_1 = $conn->query($sql_ctgry_1);
    if ($result_sql_ctgry_1->num_rows > 0) {
        while ($row_sql_ctgry_1 = $result_sql_ctgry_1->fetch_assoc()) {
            $ctgry_1 = $row_sql_ctgry_1['ctgry_1'];
            $selected = ($ctgry_1 === $selected_val) ? ' selected' : '';
            $ctgry_1_option .= "<option value=\"".$row_sql_ctgry_1['ctgry_1']."\"$selected>".$row_sql_ctgry_1['ctgry_1']."</option>";
        } 
    }
    ?>

    
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
                                    <?php 
                                    echo $ctgry_1_option;
                                    ?>
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

            </div>
        </div>
        <div class="footer">

        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript">
        
        // ctgry_2 생성
        $('#chr_ctgry_1').on('click', function(){

            const selected = $(this).val();
            $.ajax({
                url: './php/get_ctgry_2.php',
                type: 'GET',
                data: { ctgry_1: selected },
                success: function(data){
                    $('#chr_ctgry_2').html(data);
                    $('#chr_ctgry_3').html('<option value="">선택</option>'); // ctgry_3 초기화
                }
            });
        });

        // ctgry_3 생성
        $('#chr_ctgry_2').on('click', function(){
            const ctgry_1 = $('#chr_ctgry_1').val();
            const ctgry_2 = $(this).val();
            $.ajax({
                url: './php/get_ctgry_3.php',
                type: 'GET',
                data: {
                    ctgry_1: ctgry_1,
                    ctgry_2: ctgry_2
                },
                success: function(data){
                    $('#chr_ctgry_3').html(data);
                }
            });
        });


    </script>
</body>
</html>