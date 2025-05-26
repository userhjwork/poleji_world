
<?php
include('./php/head.php');
include('./php/connect_db.php');
?>    
    <?php

    $sql = "SELECT * FROM tbl_church_out";
    $result_sql = $conn->query($sql);

    $list_html = '';

    $sql = "SELECT o_idx, o_pay, ctgry_1, ctgry_2, ctgry_3, o_amount, o_reward, o_description FROM tbl_church_out ORDER BY o_pay DESC";
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
            $list_html .= "                <span class=\"ctgry data_cell\"><span class=\"text ctgry_1\">" . htmlspecialchars($row['ctgry_1']) . "</span> - <span class=\"text ctgry_2\">" . htmlspecialchars($row['ctgry_2']) . "</span> - <span class=\"text strong ctgry_3\">" . htmlspecialchars($row['ctgry_3']) . "</span>";
            $list_html .= "            </div>";
            $list_html .= "            <div class=\"list_cell_content\">";
            $list_html .= "                <div class=\"amount_wrap\">";
            $list_html .= "                    <span class=\"amount data_cell\">" . (is_numeric($row['o_amount']) ? number_format($row['o_amount']) : '-') . "</span>";
            $list_html .= "                    <span class=\"text\">원</span>";
            $list_html .= "                </div>";
            $list_html .= "                <div class=\"desc_wrap\">";
            $list_html .= "                    <span class=\"desc data_cell\">" . nl2br(htmlspecialchars($row['o_description'])) . "</span>";
            $list_html .= "                </div>";
            $list_html .= "            </div>";
            $list_html .= "        </div>";
            $list_html .= "    </button>";
            $list_html .= "</li>";
        }
    } else {
        echo "<tr><td colspan='6'>지출내역이 없습니다.</td></tr>";
    }

    ?>
    <div class="wrap">
        <div class="header"></div>
        <div class="body">
            <div class="search_wrap">
                
            </div>
            <div class="content style_1">
                <div class="title_wrap">
                    <h2 class="title">지출내역 리스트</h2>
                    <div class="btn_wrap">
                        <button type="button" id="btn_table" class="btn_basic">
                            <span class="text">테이블형식 보기</span>
                        </button>

                        <button type="button" id="btn_excel" class="btn_basic">
                            <span class="text">엑셀로 저장</span>
                        </button>
                    </div>
                </div>
                
                <div class="list_basic out_list">
                    <ul class="list_basic">
                        <?= $list_html ?>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- sheetJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script type="text/javascript">
    $("#btn_excel").click(function(){
        downloadDivToExcel();
    })

    $("#btn_table").click(function(){
        window.location.href = './index_history_table.php';
    })

    $(".list_cell_wrap").click(function(){

        let o_idx = $(this).attr('o_idx');

        window.location.href = './index_update.php?o_idx='+o_idx;
    })

    function downloadDivToExcel() {
        const rows = document.querySelectorAll('.list_row');
        const data = [];
      
        // 헤더
        data.push(["날짜", "카테고리", "지원금액", "상세설명"]);
      
        let total = 0;
      
        rows.forEach(row => {
            const cells = row.querySelectorAll('.data_cell');
            const rowData = [];
            
            cells.forEach((cell, index) => {
                let text = cell.innerText.trim();
                
                // 지원금액(5번째, index=4)을 숫자로 변환 후 합산
                if (index === 2) {
                    let num = parseInt(text.replace(/[^0-9]/g, '')); // 쉼표/원 제거
                    if (!isNaN(num)) total += num;
                    rowData.push(text); // 원래 문자열은 그대로 저장
                } else {
                    rowData.push(text);
                }
            });
            
            data.push(rowData);
        });
      
        // 마지막 행에 통계 추가
        data.push(["", "총합계", total.toLocaleString() + "원", ""]);
      
        // 엑셀로 변환 및 다운로드
        const ws = XLSX.utils.aoa_to_sheet(data);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "지출내역");
        XLSX.writeFile(wb, "지출내역_합계포함.xlsx");
    }



</script>

<?php
include("./php/bottom.php");
?>