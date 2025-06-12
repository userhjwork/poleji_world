<?php
include('./php/head.php');
include('./php/connect_db.php');

$list_html = '';

$sql = "
SET @balance := 0;

SELECT 
    idx,
    type,
    ctgry_1,
    ctgry_2,
    ctgry_3,
    date,
    amount,
    description,
    (@balance := @balance + amount) AS balance
FROM (
    SELECT 
        o_idx AS idx,
        'out' AS type,
        ctgry_1,
        ctgry_2,
        ctgry_3,
        o_pay AS date,
        -o_amount AS amount,
        o_description AS description
    FROM tbl_church_out

    UNION ALL

    SELECT 
        i_idx AS idx,
        'in' AS type,
        i_ctgry AS ctgry_1,
        NULL AS ctgry_2,
        NULL AS ctgry_3,
        i_reward AS date,
        i_amount AS amount,
        i_description AS description
    FROM tbl_church_in
) AS combined
ORDER BY date ASC, idx ASC;
";

if ($conn->multi_query($sql)) {
    $conn->next_result(); // SET 넘어가기
    $result = $conn->store_result();

    while ($row = $result->fetch_assoc()) {
        $ctgry_2 = $row['ctgry_2'] ?? '';
        $ctgry_3 = $row['ctgry_3'] ?? '';
        $date_label = htmlspecialchars($row['date']);
        $amount = is_numeric($row['amount']) ? number_format($row['amount']) : '-';

        $list_html .= "<li class=\"list_row\" type=\"" . htmlspecialchars($row['type']) . "\">";
        $list_html .= "    <button type=\"button\" class=\"list_cell_wrap\" data-idx=\"" . htmlspecialchars($row['idx']) . "\">";
        $list_html .= "        <div class=\"list_cell\">";
        $list_html .= "            <div class=\"list_cell_title\">";
        $list_html .= "                <div class=\"date_wrap\"><span class=\"date data_cell\">$date_label</span></div>";
        $list_html .= "                <span class=\"ctgry data_cell\"><span class=\"text ctgry_1\">" . htmlspecialchars($row['ctgry_1']) . "</span>";
        if ($ctgry_2) $list_html .= " - <span class=\"text ctgry_2\">" . htmlspecialchars($ctgry_2) . "</span>";
        if ($ctgry_3) $list_html .= " - <span class=\"text strong ctgry_3\">" . htmlspecialchars($ctgry_3) . "</span>";
        $list_html .= "</span></div>";
        $list_html .= "            <div class=\"list_cell_content\">";
        $list_html .= "                <div class=\"amount_wrap\"><span class=\"amount data_cell\">$amount</span><span class=\"text\">원</span></div>";
        $list_html .= "                <div class=\"desc_wrap\"><span class=\"desc data_cell\">" . nl2br(htmlspecialchars($row['description'])) . "</span></div>";
        $list_html .= "            </div>";
        $list_html .= "        </div>";
        $list_html .= "    </button>";
        $list_html .= "</li>";
    }
} else {
    $list_html = "<li class='list_row'>지출내역이 없습니다.</li>";
}
?>

<div class="wrap">
    <div class="header"></div>
    <div class="body">
        <div class="search_wrap"></div>
        <div class="content style_1">
            <div class="title_wrap">
                <h2 class="title">전체 내역 리스트</h2>
                <div class="btn_wrap">
                    <button type="button" id="btn_table" class="btn_basic"><span class="text">테이블형식 보기</span></button>
                    <button type="button" id="btn_excel" class="btn_basic"><span class="text">엑셀로 저장</span></button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script type="text/javascript">
    $("#btn_excel").click(function() {
        downloadDivToExcel();
    });

    $("#btn_table").click(function() {
        window.location.href = './index_history_table.php';
    });

    $(document).on("click", ".list_cell_wrap", function() {
        let idx = $(this).data('idx');
        window.location.href = './index_update.php?o_idx=' + idx;
    });

    function downloadDivToExcel() {
        const rows = document.querySelectorAll('.list_row');
        const data = [];

        data.push(["날짜", "카테고리", "지원금액", "상세설명"]);

        let total = 0;

        rows.forEach(row => {
            const cells = row.querySelectorAll('.data_cell');
            const rowData = [];

            cells.forEach((cell, index) => {
                let text = cell.innerText.trim();
                if (index === 2) {
                    let num = parseInt(text.replace(/[^0-9]/g, ''));
                    if (!isNaN(num)) total += num;
                    rowData.push(text);
                } else {
                    rowData.push(text);
                }
            });

            data.push(rowData);
        });

        data.push(["", "총합계", total.toLocaleString() + "원", ""]);

        const ws = XLSX.utils.aoa_to_sheet(data);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "지출내역");
        XLSX.writeFile(wb, "지출내역_합계포함.xlsx");
    }
</script>

<?php include("./php/bottom.php"); ?>
