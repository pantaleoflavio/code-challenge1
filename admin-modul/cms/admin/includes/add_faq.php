
<?php
if (isset($_SESSION['user_role'])) {

  if (isset($_POST['new_faq'])) {
    $faq_id_item = $_POST['faq_id_item'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $query = "INSERT INTO `faq`( `faq_id_item`, `faq_content`, `faq_answer`) VALUES ('{$faq_id_item}','{$question}','{$answer}')";

    if ($_SESSION['user_role'] === 'admin') {
        $create_faq_query = mysqli_query($connection, $query);

        if (!$create_faq_query) {
            die("Query failed" . mysqli_error($connection));
        } else {
            echo "<h4 class='text-center text-uppercase bg-success'>FAQ INSERT SUCCESSFULLY</h4>";
        }
    } else {
      echo "<h2 class='text-center text-uppercase bg-danger'>you are not an admin</h2>";
    }

  }
}



?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="question">Insert the new Question</label>
    <input type="text" class="form-control" id="question" name="question">
  </div>

  <div class="form-group">
  <label for="items">Choose an Item:</label>
    <select name="faq_id_item" id="faq_id_item">
    <option value=''>General Question</option >
      <?php
        $query = "SELECT * from items";
        $related_item = mysqli_query( $connection, $query);
        while ($row = mysqli_fetch_assoc($related_item)) {
            $item_id = $row['item_id'];
            $item_title = $row['item_title'];
            echo "<option value='{$item_id}'>{$item_title}</option >";
        }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="answer">Insert Answer</label>
    <input type="text" class="form-control" id="answer" name="answer">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="new_faq" value="Submit FAQ">
  </div>
</form>