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
                    <?php
                        if(isset($_POST['submit'])){
                        $cat_title=$_POST['cat_title'];
                            if ($cat_title=="" || empty($cat_title) ){
                                echo "this field should not be emty";

                            }
                            else{
                                $query="INSERT INTO categories(cat_title) ";
                                $query .="VALUE ('{$cat_title}')";
                                $create_category_query=mysqli_query($connection,$query);
                               
                                if(!$create_category_query){
                                    die('error'. mysqli_error($connection));
                                }


                            }
                            }
                        ?>
                         <form action="" method="post">
                            <div class="form-groupe">
                                <label name="cat_title">Add Category</label>
                               <input type="text" class="form-control" name="cat_title"> 
                            </div>
                            <div class="form-groupe">
                               <input class="btn btn-primary" type="submit" name="submit" value="Add category"> 
                            </div>


                        <?php 
                         if(isset($_GET['edit'])){
                            $cat_id=$_GET['edit'];

                        include "includes/update_categories.php";

                         }
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
                                     $query="SELECT * FROM categories ";
                                     $select_all_categories=mysqli_query($connection,$query);
                                    
                                       while ($rows=mysqli_fetch_assoc($select_all_categories)){
                                        $cat_id=$rows['cat_id'];
                                        $cat_title=$rows['cat_title'];
                                    
                                        echo "<tr>";
                                        echo " <td>{$cat_id}</td> ";
                                        echo "<td>{$cat_title}</td>";
                                        echo " <td><a href='categories.php?delete={$cat_id}'>Delete </a></td>";
                                        echo " <td><a href='categories.php?edit={$cat_id}'>Edit </a></td>";
                                        
                                        echo " </tr> ";
                                    } 
                                    ?>
                                    <?php //DELETE categories$$
                                    if(isset($_GET['delete'])){
                                        $the_cat_id=$_GET['delete'];
                                        $query="DELETE FROM categories WHERE cat_id= {$the_cat_id}";
                                        $delete_query=mysqli_query($connection,$query);
                                        // bel clique tetfasa5 donnee ama matetna7ach men page 
                                        // lazem na3mlo refrech lil page 
                                        header("Location:categories.php");

                                    }
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