<?php
if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] === 'admin') { 
        if(isset($_GET['delete'])) {
            $team_id_delete = $_GET['delete'];
            $query = "DELETE FROM `team` WHERE team_id = {$team_id_delete}";
            $delete_query_team = mysqli_query($connection, $query);
            echo "<h2 class='text-center text-uppercase bg-success'>Team member deleted</h2>";
        
            if (!$delete_query_team) {
                die("Query failed" . mysqli_error($connection));
            }
        }
    } else {
        echo "<h2 class='text-center text-uppercase bg-danger'>you are not an admin</h2>";
    }
}
?>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th >Id</th>
            <th >Name</th>
            <th >description</th>
            <th >Pic</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $query = "SELECT * from team";
        $team = mysqli_query( $connection, $query);
            while ($row = mysqli_fetch_assoc($team)) {
                $team_id = $row['team_id'];
                $team_name = $row['team_name'];
                $team_description = $row['team_description'];
                $team_image = $row['team_image'];
                echo "<tr><td>{$team_id}</td>";
                echo "<td>{$team_name}</td>";
                echo "<td>{$team_description}</td>";
                echo "<td><img src='../images/team/{$team_image}' alt='' width='100' height='50'></td>";
                echo "<td><a class='btn btn-warning' href='team_page.php?source=edit_team&t_id={$team_id}'>Edit</a></td>";
                echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Are u sure?');\" href='team_page.php?delete={$team_id}'>Delete</a></td></tr>";
                
            }
        ?>
    </tbody>
</table>