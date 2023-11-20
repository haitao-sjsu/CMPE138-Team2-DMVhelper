<?php include('../include/config.php') ?>

<html>
    <body>
<?php
$sql = "select * from comments order by time_stamp limit 10";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $context = $row['context'];
    $time_stamp = $row['time_stamp'];
    $user_email = $row['user_email'];
    $page_id = $row['page_id'];
?>

<form>
    <p><?php echo $user_email.'---'; echo $time_stamp ?> </p>
    <p><?php echo $page_id.': '.$context ?></p>
</form>

<?php
}
?>

</body>
</html>

