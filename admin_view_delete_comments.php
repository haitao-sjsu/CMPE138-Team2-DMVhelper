<?php include('include/config.php') ?>

<html>
    <head>
    <title><?php echo $UI['admin_crud_comment']['title'][$lang] ?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <!-- HEADER -->
    <div class="center-text"><h1><?php echo $UI['admin_crud_comment']['title'][$lang] ?></h1></div>
    <!--LOGIN-->
    <?php include('include/login.php') ?>
    <hr>

<?php
if (isset($_POST['submit'])) {
    $sql = "delete from comments where comment_id = {$_GET['comment_id']}";
    $table_comments->delete($sql);
}
?>

<?php
$sql = "select * from comments {$OPTION_ADMIN_VIEW_ALL_COMMENTS}";
$results = $table_comments->select($sql);
foreach ($results as $row) {
    $comment_id = $row['comment_id'];
    $context = $row['context'];
    $time_stamp = $row['time_stamp'];
    $user_email = $row['user_email'];
    $page_id = $row['page_id'];
?>

<form action="<?php echo $_SERVER['PHP_SELF']."?comment_id=".$comment_id; ?>" method="POST">
    <p><?php echo $user_email.'---'; echo $time_stamp ?> </p>
    <p><?php echo $page_id.': '.$context ?></p>
    <input name="submit" type="submit" value="<?php echo $UI['admin_crud_comment']['delete'][$lang] ?>">
</form>
<br>

<?php
}
?>

</body>
</html>

