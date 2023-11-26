<?php include('include/config.php') ?>

<html>
    <head>
        <title>您做错的所有题目</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <style>
            .question-stem {
                font-size: 20px;
                font-weight: bold;
            }
            .right {
                color: green;
            }
            .wrong {
                color: red;
            }
        </style>
    </head>
    <body>
    <!-- HEADER -->
    <div class="center-text"><h1>您做错的所有题目</h1></div>
    <!--LOGIN-->
    <?php include('include/login.php') ?>
    <hr>

<?php
$sql = "SELECT * from users_practice_wrong_questions WHERE user_email = '{$_SESSION['email']}'";
$records = $table_users_practice_wrong_questions->select($sql);
$qnum = 0;

foreach ($records as $record) {
    $wrong_answer = $record['wrong_answer'];
    $sql = "SELECT * FROM questions WHERE question_id = {$record['question_id']}";
    $q = $table_questions->select($sql)[0];
    $stem = $q['stem'];
    $num_of_options = $q['num_of_options'];
    $correct_answer = $q['answer'];
    $qnum++;

    echo <<< _END
        <div class="question-stem"><p>$qnum.  $stem</p></div>
    _END;

    for ($i = 1; $i <= $num_of_options; $i++) {
        $option = $q["option" . $i];
        if ($i == $correct_answer)
            echo <<< _END
            <p class="right">$option</p>
            _END;
        else if ($i == $wrong_answer)
            echo <<< _END
            <p class="wrong">$option</p>
            _END;
        else
            echo <<< _END
            <p>$option</p>
            _END;
    }
    echo "<br /><br />";
}
?>
    <hr>
    <!-- FOOTER -->
    <?php include('include/footer.php') ?>

    </body>
</html>