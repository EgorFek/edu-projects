<?php
require_once "admin_check.php";
if (!empty($_GET['id']) && !empty($_GET['table_name'])) {
    require_once "database.php";
    $query = "DELETE FROM " . $_GET['table_name'] . " WHERE id = '" . $_GET['id'] . "'";
    mysqli_query($link, $query);
}
?>
<script>
    window.history.go(-1);
</script>