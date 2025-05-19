<?php
include('./connect_db.php');

$ctgry_1 = $_GET['ctgry_1'] ?? '';

if ($ctgry_1) {
    $sql = "SELECT DISTINCT ctgry_2 FROM tbl_church_out_ctgry WHERE ctgry_1 = ? ORDER BY ctgry_id";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ctgry_1);
    $stmt->execute();
    $result = $stmt->get_result();

    $options = '';
    while ($row = $result->fetch_assoc()) {
        $ctgry_2 = htmlspecialchars($row['ctgry_2']);
        $options .= "<option value=\"$ctgry_2\">$ctgry_2</option>";
    }

    echo $options;
}
?>
