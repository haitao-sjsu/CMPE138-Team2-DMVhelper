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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve user input
        $sql = "UPDATE questions
                SET stem = '{$_POST['stem']}',
                    num_of_options = {$_POST['num_of_options']},
                    option1 = '{$_POST['option1']}',
                    option2 = '{$_POST['option2']}',
                    option3 = '{$_POST['option3']}',
                    option4 = '{$_POST['option4']}',
                    answer = '{$_POST['answer']}',
                    page_id = '{$_POST['page_id']}'
                WHERE question_id = {$_GET['question_id']}";
        $result = $table_questions->update($sql);
        if ($result) {
            echo "<p>Question updated successfully!</p>";
        } else {
            echo "<p>Question updated failed!</p>";
        }
    }
?>

</body>
</html>
