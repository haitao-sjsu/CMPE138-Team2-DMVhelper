<?php include('../include/config.php') ?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve user input
        $sql = "update questions
                set stem = '".$_POST['stem']."',
                    num_of_options = ".$_POST['num_of_options'].",
                    option1 = '".$_POST['option1']."',
                    option2 = '".$_POST['option2']."',
                    option3 = '".$_POST['option3']."',
                    option4 = '".$_POST['option4']."',
                    answer = '".$_POST['answer']."',
                    page_id = '".$_POST['page_id']."'
                where question_id = ".$_GET['question_id'].";";
        $result = mysqli_query($conn,$sql);
        
        if ($result)
            echo "update successful";
        else
            echo "update fail";
    }
?>