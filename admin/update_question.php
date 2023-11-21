<?php include('../include/config.php') ?>

<html>
    <head>
        <title>Update Question</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>

    <form  method="post">
        <label for="question_id">question_id:</label>
        <input type="text" id="question_id" name="question_id">
        <input type="submit" value="update">
    </form>

    <?php
        if (isset($_POST['question_id'])) {
            $question_id = $_POST["question_id"];
            $sql = "select * from questions where question_id = ".$question_id.";";
            $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $question_id = $row['question_id'];
            $stem = $row['stem'];
            $num_of_options = $row['num_of_options'];
            $option1 = $row['option1'];
            $option2 = $row['option2'];
            $option3 = $row['option3'];
            $option4 = $row['option4'];
            $answer = $row['answer'];
            $page_id = $row['page_id'];          
        echo '<form action="process_update_question.php?question_id='.$question_id.'" method="post">';
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

    </form>
    </body>
</html>
    
