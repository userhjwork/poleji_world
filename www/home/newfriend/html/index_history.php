
<?php
include('./php/head.php');
include('./php/connect_db.php');
?>    
    <?php

    $sql = "SELECT * FROM tbl_church_out";
    $result_sql = $conn->query($sql);
    
    ?>
    <style>
        table th,
        table td{
            border: 1px solid #ddd;
        }
    </style>
    <div class="wrap">
        <div class="header"></div>
        <div class="body">
            <div class="search_wrap">
                search area
            </div>
            <div class="content">
                <h2>지출내역 리스트</h2>
                <table>
                  <thead>
                    <tr>
                      <th>날짜</th>
                      <th>1차항목</th>
                      <th>2차항목</th>
                      <th>3차항목</th>
                      <th>지원금액</th>
                      <th>상세설명</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
              
                    $sql = "SELECT o_pay, ctgry_1, ctgry_2, ctgry_3, o_amount, o_description FROM tbl_church_out ORDER BY o_pay DESC";
                    $result = $conn->query($sql);
              
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['o_pay']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['ctgry_1']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['ctgry_2']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['ctgry_3']) . "</td>";
                            echo "<td>" . (is_numeric($row['o_amount']) ? number_format($row['o_amount']) . '원' : '-') . "</td>";
                            echo "<td>" . nl2br(htmlspecialchars($row['o_description'])) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>지출내역이 없습니다.</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script type="text/javascript">
 

</script>

<?php
include("./php/bottom.php");
?>