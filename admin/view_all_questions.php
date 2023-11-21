<?php include('../include/config.php') ?>

<html>
    <head>
        <title>View All Question</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
<?php
$sql = "select * from questions order by question_id desc;";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $question_id = $row['question_id'];
    $stem = $row['stem'];
    $num_of_options = $row['num_of_options'];
    $option1 = $row['option1'];
    $option2 = $row['option2'];
    $option3 = $row['option3'];
    $option4 = $row['option4'];
    $answer = $row['answer'];
    $page_id = $row['page_id'];
?>

<form>
    <p><?php echo "question id: ".$question_id ?> </p>
    <p><?php echo "question stem: ".$stem ?></p>
    <p><?php echo "number of options: ".$num_of_options ?></p>
    <p><?php echo "A) ".$option1 ?></p>
    <p><?php echo "B) ".$option2 ?></p>
    <p><?php echo "C) ".$option3 ?></p>
    <p><?php echo "D) ".$option4 ?></p>
    <p><?php echo "right answer: ".$answer ?></p>
    <p><?php echo "related page id: ".$page_id ?></p>
    <br>
</form>

<?php
}
?>

</body>
</html>

