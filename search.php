<?php 
include "include/db.php";
include "include/header.php";
?>
<!-- Navigation -->
<?php include "include/navbar.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                
                if(isset($_POST['submit'])){
                    $search= $_POST['search'];
                    $query="SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                    $search_query=mysqli_query($connection,$query);
                
                    if(!$search_query){
                        die("Error Search ".mysqli_error($connection));
                
                    }else
                    {
                        $count=mysqli_num_rows($search_query);
                        if($count==0){
                            echo "no result";
                    }else{
                        while($rows=mysqli_fetch_assoc($search_query)){
                            $post_title=$rows['post_title'];
                            $post_author=$rows['post_author'];
                            $post_date=$rows['post_date'];
                            $post_image=$rows['post_image'];
                            $post_content=$rows['post_content'];
                        ?>
        
        
                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>
        
                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                        <hr>
                        <p><?php  echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
        
          
        
                  <?php      } 
        
                    }
                }
                
                    }
                    ?>    
                
                <hr>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
           <?php include "include/sidebar.php" ?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include "include/footer.php";
      ?>


    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
