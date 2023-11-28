<?php
include_once "Table.php";

include_once "Logger.php";
use Katzgrau\KLogger\Logger;
use Psr\Log\LogLevel;

include_once "language.php";
$lang = 'en';

$host = "localhost";
$username = "root";
$password = "";
$database = "DMVhelper";

$OPTION_QUESTION_IN_PAGE = 'limit 2';
$OPTION_COMMENT = 'order by time_stamp desc limit 2';
$OPTION_USER_MOCK_TEST = 'order by rand() limit 2';
$OPTION_USER_VIEW_ALL_TESTS = 'order by test_time desc';
$OPTION_ADMIN_VIEW_ALL_COMMENTS = 'order by time_stamp desc limit 10';
$OPTION_ADMIN_VIEW_ALL_USERS = '';
$OPTION_ADMIN_VIEW_ALL_QUESTIONS = 'order by question_id desc';

$conn = mysqli_connect($host,
                       $username, 
                       $password, 
                       $database); 

$log = new Logger('log/', LogLevel::INFO);

try {
    $pdo = new PDO("mysql:host={$host};dbname={$database};charset=utf8",
                   $username,
                   $password);
} catch (PDOException $e) {
    echo $e->getMessage();
    $log->error($e->getMessage());
}

$table_comments = new Table($pdo, $log, 'comments', 'comment_id');
$table_mock_tests = new Table($pdo, $log, 'mock_tests', 'test_id');
$table_pages = new Table($pdo, $log, 'pages', 'page_id');
$table_questions = new Table($pdo, $log, 'questions', 'question_id');
$table_users = new Table($pdo, $log, 'users', 'user_email');

$table_tests_contain_questions = new Table($pdo, $log, 'tests_contain_questions');
$table_users_practice_wrong_questions = new Table($pdo, $log, 'users_practice_wrong_questions');
