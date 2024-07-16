 <?php  include "includes/admin_header.php" ?>
    
    <div id="wrapper">

        <!-- Navigation -->
     <?php include "includes/admin_navigation.php" ?>


     
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
                        <?php insert_categories();?>
                         <form action="" method="post">
                            <div class="form-groupe">
                                <label name="cat_title">Add Category</label>
                               <input type="text" class="form-control" name="cat_title"> 
                            </div>
                            <div class="form-groupe">
                               <input class="btn btn-primary" type="submit" name="submit" value="Add category"> 
                            </div>


                        <?php  //Update and Include query
                        updateCategories();
                        ?>

                            
                        </div><!--Add Category -->

                        <div class="col-xs-6">


                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Find all categories 
                                    findAllCategories();
                                    ?>
                                    <?php //DELETE categories$$
                                   deleteCategories();
                                    ?>

                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    
    <?php include "includes/admin_footer.php" ?>