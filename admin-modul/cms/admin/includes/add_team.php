<?php
if (isset($_SESSION['user_role'])) {
    if(isset($_POST['create_team'])) {

        $team_name = $_POST['team_name'];
        $team_description = $_POST['team_description'];

        $team_image = $_FILES['image']['name'];
        $team_image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($team_image_temp, "../images/team/$team_image");

        $query = "INSERT INTO team SET `team_name`='{$team_name}', `team_image`='{$team_image}',";
        $query .= " `team_description`='{$team_description}'";

        $add_query_team = mysqli_query($connection, $query);

        if (!$add_query_team) {
            die("Query failed" . mysqli_error($connection));
        }

        echo "<p class='bg-success'>New Member Profile was Updated!</p>";
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="team_name">Member name</label>
        <input type="text" class="form-control" id="team_name" name="team_name" required>
    </div>
    <div class="form-group">
        <label for="team_description">Description</label>
        <input type="text" class="form-control" id="team_description" name="team_description">
    </div>
    <div class="form-group">
        <label for="image">Picture</label>
        <input type="file" class="form-control d-none" id="image" name="image">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_team" value="Create Member Bio">
    </div>
</form>