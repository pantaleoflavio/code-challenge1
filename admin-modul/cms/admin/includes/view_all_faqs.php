<?php
if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] === 'admin') { 
        if(isset($_GET['delete'])) {
            $faq_id = $_GET['delete'];
            $query = "DELETE FROM `faq` WHERE faq_id = {$faq_id}";
            $delete_query_faq = mysqli_query($connection, $query);
            echo "<h2 class='text-center text-uppercase bg-success'>faq deleted</h2>";
        
            if (!$delete_query_faq) {
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
            <th >FAQ</th>
            <th >Answer</th>
            <th >Item</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $query = "SELECT * from faq";
        $faq = mysqli_query( $connection, $query);
            while ($row = mysqli_fetch_assoc($faq)) {
                $faq_id = $row['faq_id'];
                $faq_id_item = $row['faq_id_item'];
                $question = $row['faq_content'];
                $faq_answer = $row['faq_answer'];
                echo "<tr><td>{$faq_id}</td>";
                echo "<td>{$question}</td>";
                echo "<td>{$faq_answer}</td>";
                if ($faq_id_item > 0) {
                    # code...

                    $query = "SELECT * from items WHERE item_id = {$faq_id_item}";
                    $item = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($item)) {
                        $item_id = $row['item_id'];
                        $item_title = $row['item_title'];
                    }

                    echo "<td><a href='../single-item.php?i_id={$item_id}'>{$item_title}</a></td>";
                } else {
                    echo "<td class='bg-primary'>General FAQs</td>";
                }

                echo "<td><a class='btn btn-warning' href='./faqs.php?source=edit_faq&f_id={$faq_id}'>Edit</a></td>";
                echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Are u sure?');\" href='faqs.php?delete={$faq_id}'>Delete</a></td></tr>";
                
            }
        ?>
    </tbody>
</table>