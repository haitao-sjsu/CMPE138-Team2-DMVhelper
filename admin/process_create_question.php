<?php include('../include/config.php') ?>
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
        $result = mysqli_query($conn,$sql);
        
        if ($result)
            echo "creation successful";
        else
            echo "creation fail";
    }
?>
