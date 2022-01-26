<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {
    $admin_level = $_SESSION['admin_level'];

    if ($admin_level == 2) {
        echo "<script>window.open('index.php?dashboard','_self')</script>";
    } else {

    }
    ?>

<?php

    if (isset($_GET['edit_logo_title'])) {

        $edit_logo_title_query = "select * from logo_title where id=1";

        $run_edit = mysqli_query($con, $edit_logo_title_query);

        $row_edit = mysqli_fetch_array($run_edit);

        $site_logo = $row_edit['site_logo'];

        $new_site_logo = $row_edit['site_logo'];

        $site_title = $row_edit['site_title'];

    }

    ?>

<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li>

                <i class="fa fa-dashboard"></i> Dashboard / Edit Website

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <div class="panel panel-default"><!-- panel panel-default Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> Edit Logo & Title

                </h3><!-- panel-title Ends -->


            </div><!-- panel-heading Ends -->


            <div class="panel-body" ><!-- panel-body Starts -->

                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->

                    <div class="form-group" ><!-- form-group Starts -->

                        <label class="col-md-3 control-label" >Website Title</label>

                        <div class="col-md-6" >

                            <input type="text" name="site_title" class="form-control" value="<?php echo $site_title; ?>" required >

                        </div>

                    </div><!-- form-group Ends -->

                    <div class="form-group" ><!-- form-group Starts -->

                        <label class="col-md-3 control-label" > Select Website Logo</label>

                        <div class="col-md-6" >

                            <input type="file" name="site_logo" class="form-control" >

                                <br>

                            <img src="../images/<?php echo $site_logo; ?>" width="70" height="70" >

                        </div>

                    </div><!-- form-group Ends -->

                    <div class="form-group" ><!-- form-group Starts -->

                        <label class="col-md-3 control-label" ></label>

                        <div class="col-md-6" >

                            <input type="submit" name="update" value="Update Now" class="btn btn-primary form-control" >

                        </div>

                    </div><!-- form-group Ends -->

                </form><!-- form-horizontal Ends -->

            </div><!-- panel-body Ends -->


        </div><!-- panel panel-default Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

    if (isset($_POST['update'])) {

        $site_title = $_POST['site_title'];

        $site_logo = $_FILES['site_logo']['name'];

        $temp_name = $_FILES['site_logo']['tmp_name'];

        move_uploaded_file($temp_name, "../images/$site_logo");
        move_uploaded_file($temp_name, "../customer/images/$site_logo");

        if (empty($site_logo)) {

            $site_logo = $new_site_logo;

        }

        $update_logo_title = "update logo_title set site_logo='$site_logo', site_title='$site_title' where id=1";

        $run_logo_title = mysqli_query($con, $update_logo_title);

        if ($run_logo_title) {

            echo "<script>alert('Successfuly Updated Website Logo & Title')</script>";

            echo "<script>window.open('index.php?dashboard','_self')</script>";

        }

    }

    ?>


<?php }?>