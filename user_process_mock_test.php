<?php include('include/config.php') ?>


<html>
    <head>
        <title>模拟测试</title>
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
    <div class="center-text"><h1>模拟测试结果</h1></div>
    <!--LOGIN-->
    <?php include('include/login.php') ?>
    <hr>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "insert into mock_tests (user_email) values ('{$_SESSION['email']}')";
    $table_mock_tests->insert($sql);
    $test_id = $table_mock_tests->last_insert_id();

    echo <<<_END
    <p>此次测试已被记录数据库中。</p>
    _END;

    foreach($_POST as $qnum_question_id => $client_answer) {
        $split = explode('_',$qnum_question_id);
        $qnum = $split[0];
        $question_id = $split[1];

        $sql = "select * from questions where question_id = {$question_id}";
        $question = $table_questions->select($sql)[0];
        $stem = $question['stem'];
        $num_of_options = $question['num_of_options'];
        $correct_answer = $question['answer'];

        echo <<< _END
        <div class="question-stem"><p>$qnum.  $stem</p></div>
        _END;

        for ($i = 1; $i <= $num_of_options; $i++) {
            $option = $question["option" . $i];
            if ($i == $correct_answer)
                echo <<< _END
                <p class="right">$option</p>
                _END;
            else if ($i == $client_answer && $client_answer != $correct_answer)
                echo <<< _END
                <p class="wrong">$option</p>
                _END;
            else
                echo <<< _END
                <p>$option</p>
                _END;
        }
        
        $sql = "insert into tests_contain_questions (test_id, question_id) values ({$test_id}, {$question_id})";
        $table_tests_contain_questions->insert($sql);

        if ($client_answer == $correct_answer)
            echo "<p>回答正确</p>";
        else {
            $sql = "select * from users_practice_wrong_questions where user_email = '{$_SESSION['email']}' and question_id = {$question_id}";
            $result = $table_users_practice_wrong_questions->select($sql);
            if (!$result) {
                $sql = "insert into users_practice_wrong_questions (user_email, question_id, wrong_answer) values ('{$_SESSION['email']}', {$question_id}, {$client_answer})";
                $table_users_practice_wrong_questions->insert($sql);
            }
            echo "<p>回答错误。该错题已被记入错题库中。</p>";
        }
        echo "<br /><br />";

    }

}
?>
    <hr>
    <!-- FOOTER -->
    <?php include('include/footer.php') ?>

    </body>
</html>