<?php include('../include/config.php') ?>

<html>
    <head>
        <title>Delete Question</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
    
    <form  method="post">
        <label for="question_id">question_id:</label>
        <input type="text" id="question_id" name="question_id">
        <input type="submit" value="delete">
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

            echo '<form action="process_delete_question.php?question_id='.$question_id.'" method="post">';
            echo "<p>question id: ".$question_id."</p>";
            echo "<p>question stem: ".$stem."</p>";
            echo "<p>number of options: ".$num_of_options."</p>";
            echo "<p>A) ".$option1."</p>";
            echo "<p>B) ".$option2."</p>";
            echo "<p>C) ".$option3."</p>";
            echo "<p>D) ".$option4."</p>";
            echo "<p>right answer: ".$answer."</p>";
            echo "<p>related page id: ".$page_id."</p>";
            echo "<br>";
            echo "<input type='submit' value='delete forever'>";
        }
        redirectWithoutPostVariables();
    ?>
    </body>
</html>
    
