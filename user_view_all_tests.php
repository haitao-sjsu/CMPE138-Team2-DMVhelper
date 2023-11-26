<?php include('include/config.php') ?>

<html>
    <head>
        <title>之前的所有测试</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <!-- HEADER -->
    <div class="center-text"><h1>之前的所有测试</h1></div>
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
        <p>$test_time---<a href="user_view_one_test.php?test_id=$test_id">测试</a></p>
    _END;
}
?>

    <hr>
    <!-- FOOTER -->
    <?php include('include/footer.php') ?>
    
    </body>
</html>

