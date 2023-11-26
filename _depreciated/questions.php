<script src="include/judge.js"></script>

<?php
$page_id = $_GET['page_id'];
if ($page_id)
    $sql = "select * from questions where page_id = '" . $page_id . "' order by rand() limit 2";
else
    $sql = "select * from questions order by rand() limit 2";

$query = mysqli_query($conn, $sql);
$qnum = 0;
while ($row = mysqli_fetch_assoc($query)) {
    $stem = $row['stem'];
    $option1 = $row['option1'];
    $option2 = $row['option2'];
    $option3 = $row['option3'];
    $option4 = $row['option4'];
    $qnum++;
?>

<form  method="post" onsubmit="alerted(<?php echo $qnum; ?>)">
    <div class="question-stem"><p><?php echo $qnum.'. ';echo $stem ?></p></div>

    <label>
    <input type="radio" id="option1" onclick="submit" name="ans" value="<?php echo $qnum; ?>-A">
    <?php echo $option1 ?>
    </label>
    <br />

    <label>
    <input type="radio" id="option2" onclick="submit" name="ans" value="<?php echo $qnum; ?>-B">
    <?php echo $option2 ?>
    </label>
    <br />
    
    <label>
    <input type="radio" id="option3" onclick="submit" name="ans" value="<?php echo $qnum; ?>-C">
    <?php echo $option3 ?>
    </label>
    <br />
    
    <label>
    <input type="radio" id="option4" onclick="submit" name="ans" value="<?php echo $qnum; ?>-D">
    <?php echo $option4 ?>
    </label>
    <br />
    
    <button onclick="submit"> 提交 </button>
    <input type="submit" value="你好">
<?php
}
?>
</form>

<?php
  if(isset($_POST['ans'])) {
    echo $_POST['ans'];
    $ans = $_POST['ans'];
    $split = explode('-',$ans);
    $qid = $split[0];
    $qans = $split[1];
    if(isset($_SESSION['email']) AND ($qans != "C")){
        $sql = "SELECT * FROM users_practice_wrong_questions WHERE user_email='" . $_SESSION['email'] . "' AND question_id=" . $qid . ";";
        $results = mysqli_query($conn,$sql);
        echo "question_id:".$qid;
        if(mysqli_num_rows($results) == 0) {
            echo "not recorded";
            $sql = "INSERT INTO users_practice_wrong_questions(user_email, question_id) values ('" . $_SESSION['email'] . "', '" . $qid . "');";
            mysqli_query($conn,$sql);
            echo "have recorded";
        }
        redirectWithoutPostVariables();
    }
  }
?>
