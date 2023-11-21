<html>
    <head>
        <title>Create Question</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>

    <form action="process_create_question.php" method="post">
    <label for="question_stem">question_stem:</label>
    <input type="text" id="question_stem" name="question_stem" style="width: 500px; height: 100px;">
    <br />
    <br />
    <label for="num_of_options">num_of_options:</label>
    <input type="text" id="num_of_options" name="num_of_options">
    <br />
    <br />
    <label for="option1">option1:</label>
    <input type="text" id="option1" name="option1" style="width: 400px; height: 30px;">
    <br />
    <br />
    <label for="option2">option2:</label>
    <input type="text" id="option2" name="option2" style="width: 400px; height: 30px;">
    <br />
    <br />
    <label for="option3">option3:</label>
    <input type="text" id="option3" name="option3" style="width: 400px; height: 30px;">
    <br />
    <br />
    <label for="option4">option4:</label>
    <input type="text" id="option4" name="option4" style="width: 400px; height: 30px;">
    <br />
    <br />
    <label for="answer">answer:</label>
    <input type="text" id="answer" name="answer">
    <br />
    <br />
    <label for="page_id">page_id:</label>
    <input type="text" id="page_id" name="page_id">
    <br />
    <br />

    <input type="submit" value="Submit">
    </form>

    </body>
</html>
    
