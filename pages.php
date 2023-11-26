<!--LOGIN DATABASE-->
<?php include('include/config.php') ?>

<html>
    <head>
        <title>DMV Helper</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
    <!-- HEADER -->
    <?php include('include/header.php') ?>

    <!--LOGIN WEBSITE-->
    <?php include('include/login.php') ?>
    <hr>

    <!-- MENU -->
    <?php include('include/menu.php') ?>
    <hr>

    <!-- CONTENT_QUESTION -->
    <h1>相关习题</h1>
    <?php include('include/questions.php') ?>
    <hr>

    <!-- CONTENT_SECTION_PAGE -->
    <?php include('include/section.php') ?>
    <hr>
    
    <!-- COMMENTS -->
    <h1>相关评论</h1>
    <?php include('include/comments.php') ?>
    <hr>

    <!-- FOOTER -->
    <?php include('include/footer.php') ?>

    </body>
</html>
