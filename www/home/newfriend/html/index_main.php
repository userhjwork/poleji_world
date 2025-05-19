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
            $ctgry_1_option .= "<option value=\"".$row_sql_ctgry_1['ctgry_1']."\">".$row_sql_ctgry_1['ctgry_1']."</option>";
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
                        <div class="select_wrap">
                            <select name="" id="chr_ctgry_1">
                                <?php 
                                echo $ctgry_1_option;
                                ?>
                            </select>
                        </div>
                        <div class="select_wrap">
                            <select name="" id="chr_ctgry_2">
                                <option value="none">none</option>
                            </select>
                        </div>
                        <div class="select_wrap">
                            <select name="" id="chr_ctgry_3">
                                <option value="none">none</option>
                            </select>
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
        $('#chr_ctgry_1').on('change', function(){
            console.log('sdsdfsdgsdfsdf');

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
        $('#chr_ctgry_2').on('change', function(){
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