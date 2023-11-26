<?php include('include/config.php') ?>

<html>
    <head>
    <title>查看、删除用户</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <!-- HEADER -->
    <div class="center-text"><h1>查看、删除用户</h1></div>
    <!--LOGIN-->
    <?php include('include/login.php') ?>
    <hr>

<?php
if (isset($_POST['submit'])) {
    $sql = "delete from users where user_email = '{$_GET['user_email']}'";
    $table_users->delete($sql);
}
?>

<?php
$sql = "select * from users {$OPTION_ADMIN_VIEW_ALL_USERS}";
$results = $table_users->select($sql);
foreach ($results as $row) {
    $user_email = $row['user_email'];
    $is_admin = $row['is_admin'];
?>

<form action="<?php echo $_SERVER['PHP_SELF']."?user_email=".$user_email; ?>" method="POST">
    <p><?php echo $user_email.'---is_admin? '; echo $is_admin ?> </p>
    <input name="submit" type="submit" value="删除">
</form>
<br>

<?php
}
?>

</body>
</html>

