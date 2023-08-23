    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <!-- Navigation -->
    <?php include 'includes/navigation-bar.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-8">

            <?php
                if (isset($_GET['i_id'])) {
                    $item_id = $_GET['i_id'];

                    $query = "SELECT * from items where item_id = '$item_id'";
                    $item = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($item)) {
                        $item_id = $row['item_id'];
                        $item_title = $row['item_title'];
                        $item_description = $row['item_description'];
                        $item_image = $row['item_image'];
                        ?>

                <!-- Single Item -->

                <!-- Title -->
                <h1><?php echo $item_title; ?></h1>


                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/items/<?php echo $item_image; ?>" alt="">

                <hr>

                <!-- Item Content -->
                <p class="lead"><?php echo $item_description; ?></p>
                
                <hr>
                <?php }
                } // end loops about item?>
                <!-- FAQ -->

                <?php
                $query = "SELECT * from faq WHERE faq_id_item = {$item_id}";
                $faq_related = mysqli_query( $connection, $query);
                if ($faq_related) {

                    while ($row = mysqli_fetch_assoc($faq_related)) {
                        $faq_id = $row['faq_id'];
                        $faq_id_item = $row['faq_id_item'];
                        $question = $row['faq_content'];
                        $answer = $row['faq_answer'];

                        ?>

                <h3 class=""> <?php echo $question ?></h3>
                <p><?php echo $answer ?></p>
                
                <hr>

        <?php }
            } // end loop about faqs ?>
            </div>

            <div class="col-md-4">

                    <!-- Login -->
                    <?php if (!isset($_SESSION['user_role'])) {
                        include 'includes/login.php'; ?>

                        <?php } else if ($_SESSION['user_role'] === 'customer' ) {
                            $username = $_SESSION['username'];
                            $query = "SELECT * from users WHERE username = '{$username}'";
                            $logged_user = mysqli_query( $connection, $query);
                            while ($row = mysqli_fetch_assoc($logged_user)) {
                                $user_id = $row['user_id'];
                            }
                            echo "<div class='well'>
                                        <h4 class='bg-success text-center'>Welcome Customer {$_SESSION['username']}</h4>
                                        <p class='text-center'><a class='btn btn-primary' href='includes/logout.php'>Log out</a></p>
                                    </div>";
                        } elseif ($_SESSION['user_role'] === 'admin') {
                            $username = $_SESSION['username'];
                            $query = "SELECT * from users WHERE username = '{$username}'";
                            $logged_user = mysqli_query( $connection, $query);
                            while ($row = mysqli_fetch_assoc($logged_user)) {
                                $user_id = $row['user_id'];
                            }
                            echo "<div class='well'>
                                    <h3 class='bg-success text-center'>Welcome Admin {$_SESSION['username']}</h3>
                                    <p class='text-center'><a class='btn btn-primary' href='includes/logout.php'>Log out</a></p>
                                    <p class='text-center'><a class='btn btn-info' href='./admin/index.php' target='_blank'>Admin</a></p>
                                </div>";
                            
                        }


                    ?>
                </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include 'includes/footer.php'; ?>