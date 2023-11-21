<?php include('../include/config.php') ?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve user input
        $question_id = $_GET["question_id"];
        $sql = "delete from questions where question_id = ".$question_id.";";
        $result = mysqli_query($conn,$sql);
        
        if ($result)
            echo "deletion successful";
        else
            echo "deletion fail";
    }
?>