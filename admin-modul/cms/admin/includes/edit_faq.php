<?php
if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] === 'admin') {

        if(isset($_GET['f_id'])) {
            $edit_faq_id = $_GET['f_id'];
        }
        $query = "SELECT * from faq WHERE faq_id = $edit_faq_id";
        $select_faq = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_faq)) {
            $faq_id = $row['faq_id'];
            $faq_id_item = $row['faq_id_item'];
            $question = $row['faq_content'];
            $answer = $row['faq_answer'];
        }

        if(isset($_POST['edit_faq'])) {
            $new_faq_id_item = $_POST['faq_id_item'];
            $new_question = $_POST['question'];
            $new_answer = $_POST['answer'];
            

            $query = "UPDATE faq SET ";
            $query .= "`faq_id_item`='{$new_faq_id_item}',";
            $query .= "`faq_content`='{$new_question}',";
            $query .= "`faq_answer`='{$new_answer}' ";
            $query .= "WHERE faq_id = {$faq_id}";

            $edit_query_faq = mysqli_query($connection, $query);

            if (!$edit_query_faq) {
                die("Query failed" . mysqli_error($connection));
            } else {
                echo "<p class='bg-success'>FAQ  Updated!</p>";
            }


        }
    }
}

?>



<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="question">Insert the new Question</label>
    <input value="<?php echo $question; ?>" type="text" class="form-control" id="question" name="question">
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
    <input value="<?php echo $answer; ?>" type="text" class="form-control" id="answer" name="answer">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_faq" value="Submit FAQ">
  </div>
</form>