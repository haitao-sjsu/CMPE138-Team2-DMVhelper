<?php include('include/config.php') ?>

<html>
<head>
    <title>View all questions</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <!-- HEADER -->
    <div class="center-text"><h1>View all questions</h1></div>
    <!--LOGIN-->
    <?php include('include/login.php') ?>
    <hr>

<?php
if (isset($_POST['delete'])) {
    $sql = "delete from questions where question_id = {$_GET['question_id']}";
    $table_questions->delete($sql);
}

if (isset($_POST['update'])) {
    $question_id = $_GET["question_id"];
    $sql = "select * from questions where question_id = {$question_id}";
    $row = $table_questions->select($sql)[0];
    $question_id = $row['question_id'];
    $stem = $row['stem'];
    $num_of_options = $row['num_of_options'];
    $option1 = $row['option1'];
    $option2 = $row['option2'];
    $option3 = $row['option3'];
    $option4 = $row['option4'];
    $answer = $row['answer'];
    $page_id = $row['page_id'];          
    echo '<form action="admin_process_update_question.php?question_id='.$question_id.'" method="post">';
    echo "<p>question id: ".$question_id."</p>";
    echo '<br><br>';
    echo '<label for="stem">stem:</label>';
    echo '<input type="text" id="stem" name="stem" value="'.$stem.'" style="width: 500px; height: 100px;">';
    echo '<br><br>';
    echo '<label for="num_of_options">num_of_options:</label>';
    echo '<input type="text" id="num_of_options" name="num_of_options" value="'.$num_of_options.'">';
    echo '<br><br>';
    echo '<label for="option1">option1:</label>';
    echo '<input type="text" id="option1" name="option1" value="'.$option1.'" style="width: 400px; height: 30px;">';
    echo '<br><br>';
    echo '<label for="option2">option2:</label>';
    echo '<input type="text" id="option2" name="option2" value="'.$option2.'" style="width: 400px; height: 30px;">';
    echo '<br><br>';
    echo '<label for="option3">option3:</label>';
    echo '<input type="text" id="option3" name="option3" value="'.$option3.'" style="width: 400px; height: 30px;">';
    echo '<br><br>';
    echo '<label for="option4">option4:</label>';
    echo '<input type="text" id="option4" name="option4" value="'.$option4.'" style="width: 400px; height: 30px;">';
    echo '<br><br>';
    echo '<label for="answer">answer:</label>';
    echo '<input type="text" id="answer" name="answer" value="'.$answer.'">';
    echo '<br><br>';
    echo '<label for="page_id">page_id:</label>';
    echo '<input type="text" id="page_id" name="page_id" value="'.$page_id.'">';
    echo '<br><br>';
    echo '<input type="submit" value="update">';

}

?>

<?php
if (isset($_POST['update'])) {
    exit();
}

$sql = "select * from questions {$OPTION_ADMIN_VIEW_ALL_QUESTIONS}";
$results = $table_questions->select($sql);
foreach ($results as $row) {
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

<form action="<?php echo $_SERVER['PHP_SELF']."?question_id=".$question_id; ?>" method="POST">
    <p><?php echo "question id: ".$question_id ?> </p>
    <p><?php echo "question stem: ".$stem ?></p>
    <p><?php echo "number of options: ".$num_of_options ?></p>
    <p><?php echo "A) ".$option1 ?></p>
    <p><?php echo "B) ".$option2 ?></p>
    <p><?php echo "C) ".$option3 ?></p>
    <p><?php echo "D) ".$option4 ?></p>
    <p><?php echo "right answer: ".$answer ?></p>
    <p><?php echo "related page id: ".$page_id ?></p>
    <input name="update" type="submit" value="更新">
    <input name="delete" type="submit" value="删除">
    <br>
</form>

<?php
}
?>

</body>
</html>

