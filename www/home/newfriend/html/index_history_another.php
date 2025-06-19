<?php
include('./php/head.php');
include('./php/connect_db.php');
?>    
    <?php

    $list_html = '';

    $sql = "SELECT o_idx, department, o_pay, ctgry_1, ctgry_2, ctgry_3, o_amount, o_reward, o_description FROM tbl_church_out_multi ORDER BY o_pay DESC";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $list_html .= "<li class=\"list_row\">";
            $list_html .= "    <button type=\"button\" class=\"list_cell_wrap\" o_idx=\"". htmlspecialchars($row['o_idx']) ."\">";
            $list_html .= "        <div class=\"list_cell\">";
            $list_html .= "            <div class=\"list_cell_title\">";
            $list_html .= "                <div class=\"date_wrap\">";
            $list_html .= "                    <span class=\"date o_pay data_cell\">" . htmlspecialchars($row['o_pay']) . "</span>";
            $list_html .= "                    <span class=\"date o_reward\">" . htmlspecialchars($row['o_reward']) . "</span>";
            $list_html .= "                </div>";
            $list_html .= "                <span class=\"department data_cell\">[" . htmlspecialchars($row['department']) . "]</span>";
            $list_html .= "                <span class=\"ctgry data_cell\"><span class=\"text ctgry_1\">" . htmlspecialchars($row['ctgry_1']) . "</span> - <span class=\"text ctgry_2\">" . htmlspecialchars($row['ctgry_2']) . "</span> - <span class=\"text strong ctgry_3\">" . htmlspecialchars($row['ctgry_3']) . "</span>";
            $list_html .= "            </div>";
            $list_html .= "            <div class=\"list_cell_content\">";
            $list_html .= "                <div class=\"amount_wrap\">";
            $list_html .= "                    <span class=\"amount data_cell\">" . (is_numeric($row['o_amount']) ? number_format($row['o_amount']) : '-') . "</span>";
            $list_html .= "                    <span class=\"text\">원</span>";
            $list_html .= "                </div>";
            $list_html .= "                <div class=\"description_wrap\">";
            $list_html .= "                    <span class=\"description\">" . nl2br(htmlspecialchars($row['o_description'])) . "</span>";
            $list_html .= "                </div>";
            $list_html .= "            </div>";
            $list_html .= "        </div>";
            $list_html .= "    </button>";
            $list_html .= "</li>";
        }
    } else {
        $list_html = "<li class=\"list_row\"><div class=\"list_cell\"><div class=\"list_cell_content\"><span class=\"description\">다부서 지출내역이 없습니다.</span></div></div></li>";
    }

    ?>
    <div class="wrap">
        <div class="header">
        </div>
        <div class="body">
            <div class="container">
                <div class="title_wrap">
                    <h1>다부서 지출내역 리스트</h1>
                </div>
                <div class="list_wrap">
                    <ul class="list">
                        <?= $list_html ?>
                    </ul>
                </div>
                <div class="button_pop">
                    <button type="button" class="btn_basic btn_bottom" id="btn_add">
                        <span class="text">새 지출내역 작성</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="footer">
        </div>
    </div>

    <script>
        $(function(){
            $('.list_cell_wrap').click(function(){
                const o_idx = $(this).attr('o_idx');
                if (o_idx) {
                    window.location.href = './index_update_another.php?o_idx=' + o_idx;
                }
            });

            $('#btn_add').click(function(){
                window.location.href = './index_another.php';
            });
        });
    </script>
</body>
</html> 