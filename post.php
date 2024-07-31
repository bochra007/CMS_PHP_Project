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
                if(isset($_GET['p_id'])){
                   $the_post_id= $_GET['p_id'];
                }
                $query="SELECT * FROM posts WHERE post_id=$the_post_id";
                $select_all_posts_query=mysqli_query($connection,$query);
                while($rows=mysqli_fetch_assoc($select_all_posts_query)){
                    $post_id=$rows['post_id'];
                    $post_title=$rows['post_title'];
                    $post_author=$rows['post_author'];
                    $post_date=$rows['post_date'];
                    $post_image=$rows['post_image'];
                    $post_content=$rows['post_content'];
                ?>


                <!--h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1 -->

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php  echo $post_content ?></p>
                <hr>

  

          <?php      } ?>



            <!-- Blog Comments -->
            <?php
             if (isset($_POST['create_comment'])){
              $the_post_id = $_GET['p_id'];

             $comment_author= $_POST['comment_author'];
             $comment_email= $_POST['comment_email'];
             $comment_content= $_POST['comment_content'];

             $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)" ;
             $query .= " VALUES ($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unaproved', now() )";
             
            $create_comment_query=mysqli_query($connection,$query);
            if(!$create_comment_query){
                die('QUERY FAILED'.mysqli_error($connection));
            }
        }
            ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <label for="Author">Author</label>
                    <div class="form-group">
                        <input type="text" name="comment_author" class="form-control" name="comment_author">
                    </div>
                    <label for="Author">Email</label>
                <div class="form-group">
                        <input type="email" name="comment_email" class="form-control" name="comment_email">
                    </div>
                        <div class="form-group">
                        <label for="Author">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
               

                <!-- Comment -->
                

                
                <hr>

                <!-- Pager -->
               

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
