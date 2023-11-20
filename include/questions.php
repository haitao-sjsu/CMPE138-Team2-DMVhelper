<script src="include/judge.js"></script>

<?php
$page_id = $_GET['page_id'];
if ($page_id)
    $sql = "select * from questions where page_id = '" . $page_id . "' order by rand() limit 5";
else
    $sql = "select * from questions order by rand() limit 10";

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

    <input type="radio" id="option1" onclick="submit" name="ans" value="<?php echo $qnum; ?>-A">
    <label for="option1"><?php echo $option1 ?></label>
    <br />

    <input type="radio" id="option2" onclick="submit" name="ans" value="<?php echo $qnum; ?>-B">
    <label for="option1"><?php echo $option2 ?></label>
    <br />
    
    <input type="radio" id="option3" onclick="submit" name="ans" value="<?php echo $qnum; ?>-C">
    <label for="option1"><?php echo $option3 ?></label>
    <br />
    
    <input type="radio" id="option4" onclick="submit" name="ans" value="<?php echo $qnum; ?>-D">
    <label for="option1"><?php echo $option4 ?></label>
    <br />

<?php
}
?>
<button onclick="submit"> 提交 </button>
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
        if(mysqli_num_rows($results) == 0) {
	  $sql = "INSERT INTO users_practice_wrong_questions(user_email, question_id) values ('" . $_SESSION['email'] . "', '" . $qid . "');";
	  mysqli_query($conn,$sql);
        }
        redirectWithoutPostVariables();
    }
  }
?>
