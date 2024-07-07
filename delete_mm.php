<?php
require_once "admin_check.php";
if (!empty($_GET['id'])) {
    require_once "database.php";
    $query = "DELETE FROM methodological_materials_files WHERE mm_id = " . $_GET['id'] . "";
    mysqli_query($link, $query);
    $query = "DELETE FROM methodological_materials WHERE id = '" . $_GET['id'] . "'";
    mysqli_query($link, $query);
}
?>
<script>
    window.history.go(-1);
</script>