<?php include('include/config.php') ?>

<html>
    <head>
        <title><?php echo $UI['new_mock_test']['title'][$lang] ?></title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <!-- HEADER -->
    <div class="center-text"><h1><?php echo $UI['new_mock_test']['title'][$lang] ?></h1></div>
    <!--LOGIN-->
    <?php include('include/login.php') ?>
    <hr>
<?php
echo <<< _END
<form action="user_process_mock_test.php" method="post">
_END;

$sql = "select * from questions {$OPTION_USER_MOCK_TEST}";
$selected_questions = $table_questions->select($sql);
$qnum = 0;

foreach ($selected_questions as $q) {
    $question_id = $q['question_id'];
    $stem = $q['stem'];
    $num_of_options = $q['num_of_options'];
    $qnum++;

    echo <<< _END
        <div class="question-stem"><p>$qnum.  $stem</p></div>
    _END;

    for ($i = 1; $i <= $num_of_options; $i++) {
        $option = $q["option" . $i];
        echo <<< _END
            <label>
            <input type="radio" id="option" onclick="submit" name=$qnum.$question_id value=$i>
            $option
            </label>
            <br />
        _END;
    }
}
echo <<< _END
<input type="submit" value="{$UI['new_mock_test']['submit'][$lang]}">
</form>
_END;
?>
    <hr>
    <!-- FOOTER -->
    <?php include('include/footer.php') ?>

    </body>
</html>