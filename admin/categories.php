<?php  include "includes/header.php" ?>
    
    <div id="wrapper">

        <!-- Navigation -->
     <?php include "includes/navigation.php" ?>


     
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                        <!-- Add Category Form  -->
                        <div class="col-xs-6">

                        <form action="">
                            <div class="form-groupe">
                                <label for="cat-title">Add Category</label>
                               <input type="text" class="form-control" name="cat-title"> 
                            </div>
                            <div class="form-groupe">
                               <input class="btn btn-primary" type="submit" name="submit" value="Add category"> 
                            </div>

                            </form>
    
                        </div>
                        


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    
    <?php include "includes/footer.php" ?>