
<?php
include('./php/head.php');
include('./php/connect_db.php');
?>    
    <?php

    $sql = "SELECT * FROM tbl_church_out";
    $result_sql = $conn->query($sql);
    
    ?>
    <div class="wrap">
        <div class="header"></div>
        <div class="body">
            <div class="search_wrap">
                search area
            </div>
            <div class="content">
                <ul class="li_basic">
                    <?php
                    if ($result_sql->num_rows > 0) {
                        while ($row_sql = $result_sql->fetch_assoc()) {

                            $o_idx = $row_sql['o_idx'];

                            $ctgry_1 = $row_sql['ctgry_1'];
                            $ctgry_2 = $row_sql['ctgry_2'];
                            $ctgry_3 = $row_sql['ctgry_3'];

                            $o_pay = $row_sql['o_pay'];
                            $o_reward = $row_sql['o_reward'];

                            $o_amount = $row_sql['o_amount'];

                            $o_description = $row_sql['o_description'];
                    ?>
                    <li>
                        <div class="li_box">
                            <div class="li_con" o_idx="">

                                
                                <div class="top_area">
                                    <!-- 항목 -->
                                    <div class="category_wrap">
                                        <span class="category c_01"><?= $ctgry_1 ?></span>
                                        <span class="category c_02"><?= $ctgry_2 ?></span>
                                        <span class="category c_03"><?= $ctgry_3 ?></span>
                                    </div>
                                    <div class="amount_wrap">
                                        <span class="amount"><?= $o_amount ?></span>
                                    </div>
                                </div>

                                <div class="bottom_area">
                                    <div class="pay_wrap">
                                        <div class="object_wrap">
                                            <div class="object">
                                                <span class="key">결제일</span>
                                                <span class="val"><?= $o_pay ?></span>
                                            </div>
                                            <div class="object">
                                                <span class="key">지급일</span>
                                                <span class="val"><?= $o_reward ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="dtl_wrap">
                                        <textarea name="" id="" class="o_description" readonly><?= $o_description ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                        } 
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script type="text/javascript">
 

</script>

<?php
include("./php/bottom.php");
?>