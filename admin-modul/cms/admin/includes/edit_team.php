<?php
if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] === 'admin') {

        if(isset($_GET['t_id'])) {
            $edit_team_id = $_GET['t_id'];
        }
        $query = "SELECT * from team WHERE team_id = $edit_team_id";
        $select_team = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_team)) {
            $team_id = $row['team_id'];
            $team_name = $row['team_name'];
            $team_description = $row['team_description'];
            $team_image = $row['team_image'];
        }

        if(isset($_POST['edit_team'])) {
            $new_team_name = $_POST['team_name'];
            $new_team_description = $_POST['team_description'];

            $team_image = $_FILES['image']['name'];
            $team_image_temp = $_FILES['image']['tmp_name'];

            move_uploaded_file($team_image_temp, "../images/team/$team_image");

            $query = "UPDATE team SET  `team_name`='{$team_name}', `team_image`='{$team_image}',";
            $query .= " `team_description`='{$team_description}' WHERE team_id = {$team_id}";

            $edit_query_team = mysqli_query($connection, $query);

            if (!$edit_query_team) {
                die("Query failed" . mysqli_error($connection));
            } else {
                echo "<p class='bg-success'>member bio  Updated!</p>";
            }


        }
    }
}

?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="team_name">Member name</label>
        <input value="<?php echo $team_name; ?>" type="text" class="form-control" id="team_name" name="team_name" required>
    </div>
    <div class="form-group">
        <label for="team_description">Description</label>
        <input value="<?php echo $team_description; ?>" type="text" class="form-control" id="team_description" name="team_description">
    </div>
    <div class="form-group">
        <img width="100" src="../images/team/<?php echo $team_image; ?>" alt="" id="image" name="image">
        <input type="file" class="form-control d-none" id="image" name="image">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_team" value="Edit Member Bio">
    </div>
</form>