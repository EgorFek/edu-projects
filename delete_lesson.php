<?php
require_once "admin_check.php";
if (!empty($_GET['id'])) {
    require_once "database.php";
    $query = "DELETE FROM lesson_files WHERE lesson_id = '" . $_GET['id'] . "'";
    mysqli_query($link, $query);
    $query = "DELETE FROM lesson WHERE id='" . $_GET['id'] . "'";
    mysqli_query($link, $query) or die($link);
}
?>
<script>
    window.history.go(-1);
</script>