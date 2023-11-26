<?php include('include/config.php') ?>

<html>
<head>
    <title><?php echo $UI['admin_crud_question']['title2'][$lang] ?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <!-- HEADER -->
    <div class="center-text"><h1><?php echo $UI['admin_crud_question']['title2'][$lang] ?></h1></div>
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
    echo "<p>{$UI['admin_crud_question']['question_id'][$lang]}".$question_id."</p>";
    echo '<br><br>';
    echo '<label for="stem">'.$UI['admin_crud_question']['question_stem'][$lang].'</label>';
    echo '<input type="text" id="stem" name="stem" value="'.$stem.'" style="width: 500px; height: 100px;">';
    echo '<br><br>';
    echo '<label for="num_of_options">'.$UI['admin_crud_question']['num_of_options'][$lang].'</label>';
    echo '<input type="text" id="num_of_options" name="num_of_options" value="'.$num_of_options.'">';
    echo '<br><br>';
    echo '<label for="option1">'.$UI['admin_crud_question']['option'][$lang].'1</label>';
    echo '<input type="text" id="option1" name="option1" value="'.$option1.'" style="width: 400px; height: 30px;">';
    echo '<br><br>';
    echo '<label for="option2">'.$UI['admin_crud_question']['option'][$lang].'2</label>';
    echo '<input type="text" id="option2" name="option2" value="'.$option2.'" style="width: 400px; height: 30px;">';
    echo '<br><br>';
    echo '<label for="option3">'.$UI['admin_crud_question']['option'][$lang].'3</label>';
    echo '<input type="text" id="option3" name="option3" value="'.$option3.'" style="width: 400px; height: 30px;">';
    echo '<br><br>';
    echo '<label for="option4">'.$UI['admin_crud_question']['option'][$lang].'4</label>';
    echo '<input type="text" id="option4" name="option4" value="'.$option4.'" style="width: 400px; height: 30px;">';
    echo '<br><br>';
    echo '<label for="answer">'.$UI['admin_crud_question']['answer'][$lang].'</label>';
    echo '<input type="text" id="answer" name="answer" value="'.$answer.'">';
    echo '<br><br>';
    echo '<label for="page_id">'.$UI['admin_crud_question']['page_id'][$lang].'</label>';
    echo '<input type="text" id="page_id" name="page_id" value="'.$page_id.'">';
    echo '<br><br>';
    echo '<input type="submit" value="'.$UI['admin_crud_question']['update'][$lang].'">';

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
    <p><?php echo "{$UI['admin_crud_question']['question_id'][$lang]}: ".$question_id ?> </p>
    <p><?php echo "{$UI['admin_crud_question']['question_stem'][$lang]}: ".$stem ?></p>
    <p><?php echo "{$UI['admin_crud_question']['num_of_options'][$lang]}: ".$num_of_options ?></p>
    <p><?php echo "1) ".$option1 ?></p>
    <p><?php echo "2) ".$option2 ?></p>
    <p><?php echo "3) ".$option3 ?></p>
    <p><?php echo "4) ".$option4 ?></p>
    <p><?php echo "{$UI['admin_crud_question']['answer'][$lang]}: ".$answer ?></p>
    <p><?php echo "{$UI['admin_crud_question']['page_id'][$lang]}: ".$page_id ?></p>
    <input name="update" type="submit" value="<?php echo $UI['admin_crud_question']['update'][$lang] ?>">
    <input name="delete" type="submit" value="<?php echo $UI['admin_crud_question']['delete'][$lang] ?>">
    <br>
</form>

<?php
}
?>

</body>
</html>

