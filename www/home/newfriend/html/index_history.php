
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
            <div class="content">
                <ul class="li_basic">
                    <?php
                    if ($result_sql->num_rows > 0) {
                        while ($row_sql = $result_sql->fetch_assoc()) {

                            $ctgry_1 = $row_sql['ctgry_1'];
                            $ctgry_2 = $row_sql['ctgry_2'];
                            $ctgry_3 = $row_sql['ctgry_3'];
                            echo "<pre>";
                            print_r($row_sql);
                            echo "</pre>";
                    ?>
                    <li>
                        <div class="li_box">
                            <div class="li_con">
                                <div class="category_wrap">
                                    <span class="category c_01"><?= $ctgry_1 ?></span>
                                    <span class="category c_02"><?= $ctgry_2 ?></span>
                                    <span class="category c_03"><?= $ctgry_3 ?></span>
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