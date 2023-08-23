    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <!-- Navigation -->
    <?php include 'includes/navigation-bar.php'; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <!-- Team Showcase -->

        <div class="shop-wall">
                <div id="" class="col-md-12">
                <h1 class="page-header">
                    Our Team
                </h1>
                    <?php
                    $query = "SELECT * from team";
                    $team = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($team)) {
                        $team_id = $row['team_id'];
                        $team_name = $row['team_name'];
                        $team_description = substr($row['team_description'], 0, 70);
                        $team_image = $row['team_image'];

                    ?>
                    <article id="<?php echo $team_id; ?>" class="single-item-block col-xs-12 col-sm-6 col-md-4" style="">
                        <div class="single-item-poster" style="background-image: url('images/team/<?php echo $team_image; ?>');"></div>
                        <div class="single-item-data text-center">
                            <h4 class="single-item-title"><?php echo $team_name; ?></h4>
                            <p class="team-description text-justify" style=""><?php echo $team_description; ?>
                            <a id="" href="" class="btn btn-primary info-btn-item">read more...</a>
                            </p>
                        </div>
                    </article>
                


                    <?php } //end while ?>

                </div>

            </div>


    </div>
    <!-- /.row -->

<hr>

<!-- Footer -->
<?php include 'includes/footer.php'; ?>