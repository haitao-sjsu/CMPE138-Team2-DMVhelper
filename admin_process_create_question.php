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

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve user input
        $stem = $_POST["question_stem"];
        $num_of_options = $_POST["num_of_options"];
        $option1 = $_POST["option1"];
        $option2 = $_POST["option2"];
        $option3 = $_POST["option3"];
        $option4 = $_POST["option4"];
        $answer = $_POST["answer"];
        $page_id = $_POST["page_id"];
        $sql = "insert into questions (stem, 
                                       num_of_options, 
                                       option1, 
                                       option2, 
                                       option3, 
                                       option4, 
                                       answer, 
                                       page_id)
                values('".$stem."',
                        ".$num_of_options.",
                        '".$option1."',
                        '".$option2."',
                        '".$option3."',
                        '".$option4."',
                        '".$answer."',
                        '".$page_id."')";
        $result = $table_questions->insert($sql);
        
        if ($result)
            echo "creation successful";
        else
            echo "creation fail";
    }
?>

</body>
</html>

