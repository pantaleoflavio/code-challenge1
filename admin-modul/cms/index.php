    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <!-- Navigation -->
    <?php include 'includes/navigation-bar.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
        <!-- Item Showcase -->

            <div class="shop-wall">
                <div id="" class="col-md-8">
                <h1 class="page-header">
                    Welcome to your Ecommerce
                    <small>something</small>
                </h1>
                    <?php
                    $query = "SELECT * from items";
                    $all_items = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($all_items)) {
                        $item_id = $row['item_id'];
                        $item_title = $row['item_title'];
                        $item_image = $row['item_image'];

                    ?>
                    <article id="<?php echo $item_id; ?>" class="single-item-block col-xs-12 col-sm-6 col-md-4">
                        <div class="single-item-poster" style="background-image: url('images/items/<?php echo $item_image; ?>')"></div>
                        <div class="single-item-data text-center">
                            <h4 class="single-item-title"><?php echo $item_title; ?></h4>
                            <a id="" href="single-item.php?i_id=<?php echo $item_id; ?>" class="btn btn-primary info-btn-item">infos</a>
                        </div>
                    </article>
                


                    <?php } //end while ?>

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
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include 'includes/footer.php'; ?>