<?php
include('./connect_db.php');

$ctgry_1 = $_GET['ctgry_1'] ?? '';
$ctgry_2 = $_GET['ctgry_2'] ?? '';

if ($ctgry_1 && $ctgry_2) {
    $sql = "SELECT DISTINCT ctgry_3 
            FROM tbl_church_out_ctgry 
            WHERE ctgry_1 = ? AND ctgry_2 = ? 
            ORDER BY ctgry_id";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $ctgry_1, $ctgry_2);
    $stmt->execute();
    $result = $stmt->get_result();

    $options = '';
    while ($row = $result->fetch_assoc()) {
        $ctgry_3 = htmlspecialchars($row['ctgry_3']);
        $options .= "<option value=\"$ctgry_3\">$ctgry_3</option>";
    }

    echo $options;
}
?>
