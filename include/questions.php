<script src="include/judge.js"></script>

<?php
$sql = "SELECT * FROM questions WHERE page_id= '{$_GET['page_id']}' {$OPTION_QUESTION_IN_PAGE}";
$questions = $table_questions->select($sql);
$qnum = 0;
foreach ($questions as $row) {
    $stem = $row['stem'];
    $option1 = $row['option1'];
    $option2 = $row['option2'];
    $option3 = $row['option3'];
    $option4 = $row['option4'];
    $correct_answer = $row['answer'];
    $qnum++;
?>

    <div class="question-stem"><p><?php echo $qnum.'. ';echo $stem ?></p></div>

    <label>
    <input type="radio" id="option1" name="ans" value="1">
    <?php echo $option1 ?>
    </label>
    <br />

    <label>
    <input type="radio" id="option2" name="ans" value="2">
    <?php echo $option2 ?>
    </label>
    <br />
    
    <label>
    <input type="radio" id="option3" name="ans" value="3">
    <?php echo $option3 ?>
    </label>
    <br />
    
    <label>
    <input type="radio" id="option4" name="ans" value="4">
    <?php echo $option4 ?>
    </label>
    <br />
    
    <button onclick="check(<?php echo $qnum ?>, <?php echo $correct_answer ?>)"> <?php echo $UI['page']['question']['check'][$lang]?> </button>
<?php
}
?>
