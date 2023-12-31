<!--LOGIN DATABASE-->
<?php include('include/config.php') ?>

<html>
    <head>
        <title><?php echo $UI['index']['title'][$lang] ?></title>
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
    <h1><?php echo $UI['page']['related_question'][$lang] ?></h1>
    <?php include('include/questions.php') ?>
    <hr>

    <!-- CONTENT_SECTION_PAGE -->
    <?php include('include/section.php') ?>
    <hr>
    
    <!-- COMMENTS -->
    <h1><?php echo $UI['page']['related_comment'][$lang] ?></h1>
    <?php include('include/comments.php') ?>
    <hr>

    <!-- FOOTER -->
    <?php include('include/footer.php') ?>

    </body>
</html>
