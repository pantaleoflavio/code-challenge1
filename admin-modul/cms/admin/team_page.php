<!-- Header -->
<?php include_once 'includes/header.php'; ?>

<!-- Navigation -->
<?php include_once 'includes/navigation.php'; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>
                            HI ADMIN
                        </h2>
            <?php 
                if ( isset( $_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = "";
                }
                
                switch ($source) {
                    case 'add_team':
                        include "./includes/add_team.php";
                        break;
                    case 'edit_team':
                        include "./includes/edit_team.php";
                        break;
                    default:
                        include "./includes/view_all_team.php";
                        break;
                }
                
            ?>  
        </div>
    </div>
</div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<!-- Footer -->
<?php include_once 'includes/footer.php'; ?>