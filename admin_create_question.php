<?php include('include/config.php') ?>

<html>
    <head>
    <title><?php echo $UI['admin_crud_question']['title'][$lang] ?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <!-- HEADER -->
    <div class="center-text"><h1><?php echo $UI['admin_crud_question']['title'][$lang] ?></h1></div>
    <!--LOGIN-->
    <?php include('include/login.php') ?>
    <hr>

    <form action="admin_process_create_question.php" method="post">
    <label for="question_stem"><?php echo $UI['admin_crud_question']['question_stem'][$lang] ?></label>
    <input type="text" id="question_stem" name="question_stem" style="width: 500px; height: 100px;">
    <br />
    <br />
    <label for="num_of_options"><?php echo $UI['admin_crud_question']['num_of_options'][$lang] ?></label>
    <input type="text" id="num_of_options" name="num_of_options">
    <br />
    <br />
    <label for="option1"><?php echo $UI['admin_crud_question']['option'][$lang] ?>1</label>
    <input type="text" id="option1" name="option1" style="width: 400px; height: 30px;">
    <br />
    <br />
    <label for="option2"><?php echo $UI['admin_crud_question']['option'][$lang] ?>2</label>
    <input type="text" id="option2" name="option2" style="width: 400px; height: 30px;">
    <br />
    <br />
    <label for="option3"><?php echo $UI['admin_crud_question']['option'][$lang] ?>3</label>
    <input type="text" id="option3" name="option3" style="width: 400px; height: 30px;">
    <br />
    <br />
    <label for="option4"><?php echo $UI['admin_crud_question']['option'][$lang] ?>4</label>
    <input type="text" id="option4" name="option4" style="width: 400px; height: 30px;">
    <br />
    <br />
    <label for="answer"><?php echo $UI['admin_crud_question']['answer'][$lang] ?></label>
    <input type="text" id="answer" name="answer">
    <br />
    <br />
    <label for="page_id"><?php echo $UI['admin_crud_question']['page_id'][$lang] ?></label>
    <input type="text" id="page_id" name="page_id">
    <br />
    <br />

    <input type="submit" value="<?php echo $UI['admin_crud_question']['submit'][$lang] ?>">
    </form>

    </body>
</html>
    
