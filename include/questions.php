<script src="include/judge.js"></script>

<?php
$sql = "SELECT * FROM questions WHERE page_id= '{$_GET['page_id']}' and lang = 'en' {$OPTION_QUESTION_IN_PAGE}";
$questions = $table_questions->select($sql);
$qnum = 0;
foreach ($questions as $row) {
    $stem = $row['stem'];
    $num_of_options = $row['num_of_options'];
    $option1 = $row['option1'];
    $option2 = $row['option2'];
    $option3 = $row['option3'];
    $option4 = $row['option4'];
    $correct_answer = $row['answer'];
    $qnum++;

    echo <<< _END
    <div class="question-stem"><p>$qnum. $stem</p></div>
    _END;

    for ($i = 1; $i <= $num_of_options; $i++) {
        $option = $row["option" . $i];
        echo <<< _END
            <label>
            <input type="radio" id="option$i" name="ans" value="$i">
            $option
            </label>
            <br />
        _END;
    }

    echo <<< _END
        <button onclick="check($qnum, $correct_answer)"> {$UI['page']['question']['check'][$lang]} </button>
    _END;
}
?>
