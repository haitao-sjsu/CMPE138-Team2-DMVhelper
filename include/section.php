<?php
$sql = "SELECT * FROM pages WHERE page_id= '{$_GET['page_id']}'";
$doc_name = $table_pages->select($sql)[0]['name'];
$full_name = "handbook/".$doc_name;
include($full_name)
?>
