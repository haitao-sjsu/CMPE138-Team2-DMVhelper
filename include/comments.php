<?php
    if (isset($_POST['comments'])) {
        $user_email = $_SESSION['email'] ?? 'Anonymous';
        $sql = "INSERT INTO comments(context, page_id, user_email) 
                values ('{$_POST["comments"]}', '{$_GET['page_id']}', '$user_email')";
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
    <p class="comment"><?php echo $user_email.'---'; echo $time_stamp ?> </p>
    <p class="comment"><?php echo $context ?></p>
</form>

<?php
}
?>

<form  method="post">
    <br />
    <!-- <label for="comments">comments:</label> -->
    <textarea name="comments" cols="50" rows="8"><?php echo $UI['page']['comment']['default_comment'][$lang]?></textarea>
    <br />
    <br />
    <input type="submit" value="<?php echo $UI['page']['comment']['submit'][$lang]?>">
    <br />
</form>