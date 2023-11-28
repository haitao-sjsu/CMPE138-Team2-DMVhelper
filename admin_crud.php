<?php include('include/config.php') ?>

<html>
    <head>
        <title><?php echo $UI['admin_crud']['title'][$lang] ?></title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <!-- HEADER -->
    <div class="center-text"><h1><?php echo $UI['admin_crud']['title'][$lang] ?></h1></div>
    <!--LOGIN-->
    <?php include('include/login.php') ?>
    <hr>
    <p class="admincrud"><a href="admin_create_question.php" ><?php echo $UI['admin_crud']['create question'][$lang] ?></a></p>
    <p class="admincrud"><a href="admin_view_delete_update_questions.php" ><?php echo $UI['admin_crud']['view delete update questions'][$lang] ?></a></p>
    <p class="admincrud"><a href="admin_view_delete_comments.php" ><?php echo $UI['admin_crud']['view delete comments'][$lang] ?></a></p>
    <p class="admincrud"><a href="admin_view_delete_users.php" ><?php echo $UI['admin_crud']['view delete users'][$lang] ?></a></p>    
    </body>
</html>

