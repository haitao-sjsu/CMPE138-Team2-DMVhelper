<?php
$page_id = $_GET['page_id'];
$sql = "select * from comments where page_id = '" . $page_id . "' order by time_stamp limit 3";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $context = $row['context'];
    $time_stamp = $row['time_stamp'];
    $user_email = $row['user_email'];
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
    <label for="comments">comments:</label>
    <input type="text" id="comments" name="comments" style="width: 800px; height: 100px;">
    <br />
    <input type="submit" value="Submit">
    <br />
</form>

<?php
    if (isset($_POST['comments'])) {
        $context = $_POST["comments"];
        $page_id = $_GET['page_id'];
        $email = $_SESSION['email'];
        if (!$email) $email = "Anonymous";
        $sql = "insert into comments(context, page_id, user_email) 
                values('".$context."','".$page_id."','".$email."')";
        mysqli_query($conn,$sql);
        redirectWithoutPostVariables();
    }
?>