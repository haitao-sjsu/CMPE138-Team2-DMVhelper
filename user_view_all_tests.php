<?php include('include/config.php') ?>

<html>
    <head>
        <title><?php echo $UI['user_view_all_tests']['title'][$lang]?></title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <!-- HEADER -->
    <div class="center-text"><h1><?php echo $UI['user_view_all_tests']['title'][$lang]?></h1></div>
    <!--LOGIN-->
    <?php include('include/login.php') ?>
    <hr>

<?php
$sql = "SELECT * FROM mock_tests 
        WHERE user_email = '{$_SESSION['email']}' {$OPTION_USER_VIEW_ALL_TESTS}";
$results = $table_mock_tests->select($sql);

foreach ($results as $row) {
    $test_time = $row['test_time'];
    $test_id = $row['test_id'];

    echo <<< _END
        <p>$test_time---<a href="user_view_one_test.php?test_id=$test_id">{$UI['user_view_all_tests']['test'][$lang]}</a></p>
    _END;
}
?>

    <hr>
    <!-- FOOTER -->
    <?php include('include/footer.php') ?>
    
    </body>
</html>

