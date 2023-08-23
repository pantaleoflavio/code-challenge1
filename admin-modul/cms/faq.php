    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <!-- Navigation -->
    <?php include 'includes/navigation-bar.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
        <!-- Item Showcase -->

            

            <div class="shop-wall">
                <div id="" class="col-md-12">

                <h1 class="page-header">
                    Frequently Asked Questions
                </h1>

                <?php
                $query = "SELECT * FROM items ";
                $items = mysqli_query($connection, $query);
                
//if (mysqli_num_rows($user_query) == 0) {
    //echo "<h3 class='text-uppercase bg-primary'>user not registered </h3>";
//}
                
                while ($row = mysqli_fetch_assoc($items)) {
                    $item_id = $row['item_id'];
                    $item_title = $row['item_title'];

                    $faq_query = "SELECT * FROM faq WHERE faq_id_item = {$item_id}";
                    $faqs = mysqli_query($connection, $faq_query);
                    while ($row = mysqli_fetch_assoc($faqs)) {
                        $faq_id = $row['faq_id'];
                        $faq_content = $row['faq_content'];
                        $faq_answer = $row['faq_answer'];
                        ?>

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><a href="single-item.php?i_id=<?php echo $item_id; ?>"><?php echo $item_title; ?></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <?php echo $faq_content; ?>
                                </td>
                            </tr>
                        </tbody>
                        <tfooter>
                            <tr>
                                <td>
                                <?php echo $faq_answer; ?>
                                </td>
                            </tr>
                        </tfooter>
                    </table>

                <hr>

                <?php }
                    } ?>

                <h2 class="page-header">
                    General Questions
                </h2>
                    <?php
                    $query = "SELECT * FROM faq WHERE faq_id_item = ''";
                    $faq = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($faq)) {
                        $faq_id = $row['faq_id'];
                        $faq_content = $row['faq_content'];
                        $faq_answer = $row['faq_answer'];
                        ?>
                <ul>
                    <li>
                        <div></div><strong><?php echo $faq_content; ?></strong></div>
                        <div><?php echo $faq_answer; ?></div>
                    </li>
                </ul>

                <?php } ?>
                </div>

            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include 'includes/footer.php'; ?>