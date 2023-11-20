<?php
$page_id = $_GET['page_id'];
$sql = "select name from pages where page_id = '" . $page_id . "'";
$doc_name = mysqli_fetch_assoc(mysqli_query($conn, $sql))['name'];
$full_name = "handbook/".$doc_name;
include($full_name)
?>
