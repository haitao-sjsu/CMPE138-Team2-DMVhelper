<?php include('include/config.php') ?>

<html>
    <head>
        <title>管理员操作面板</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <!-- HEADER -->
    <div class="center-text"><h1>管理员操作面板</h1></div>
    <!--LOGIN-->
    <?php include('include/login.php') ?>
    <hr>
    <p class="center-text"><a href="admin_create_question.php" >添加题目</a></p>
    <p class="center-text"><a href="admin_view_delete_update_questions.php" >查看、删除、修改题目</a></p>
    <p class="center-text"><a href="admin_view_delete_comments.php" >查看、删除评论</a></p>
    <p class="center-text"><a href="admin_view_delete_users.php" >查看、删除用户</a></p>    
    </body>
</html>

