<?php
    if (isset($_POST['comments'])) {
        $sql = "INSERT INTO comments(context, page_id, user_email) 
                values ('{$_POST["comments"]}', '{$_GET['page_id']}', '{$_SESSION['email']}')";
        $table_comments->insert($sql);
        redirectWithoutPostVariables();
    }
?>

<?php
$sql = "SELECT * FROM comments WHERE page_id= '{$_GET['page_id']}' {$OPTION_COMMENT};";
$comments = $table_comments->select($sql);
foreach ($comments as $c) {
    $context = $c['context'];
    $time_stamp = $c['time_stamp'];
    $user_email = $c['user_email'];
?>

<form>
    <p><?php echo $user_email.'---'; echo $time_stamp ?> </p>
    <p><?php echo $context ?></p>
</form>

<?php
}
?>

<form  method="post">
    <br />
    <!-- <label for="comments">comments:</label> -->
    <textarea name="comments" cols="100" rows="8">欢迎在此处写评论</textarea>
    <br />
    <br />
    <input type="submit" value="提交">
    <br />
</form>