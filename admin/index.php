    <?php  include "includes/admin_header.php" ?>
    

<script>
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
        });
    </script>

<style>
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .loaded .fade-in {
            opacity: 1;
            transform: translateY(0);
        }
        
    
    </style>
<!--content fade-in-->
    
    <div id="wrapper">

        <!-- Navigation -->
     <?php include "includes/admin_navigation.php" ?>


     
        <div id="page-wrapper">

            <div class="container-fluid content fade-in">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome <?php echo $_SESSION['username']; ?>
                            <small>Author</small>
                        </h1>
                        <ol class="breadcrumb">
                            
                        </ol>
                    </div>
                </div>
                <!-- /.row -->




                       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php 
                    $query="SELECT * FROM posts";
                    $select_all_post= mysqli_query($connection,$query);
                    $posts_count = mysqli_num_rows($select_all_post);
                    echo "<div class='huge'>{$posts_count}</div>";
                    
                    ?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="./posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'>23</div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                    $query="SELECT * FROM users";
                    $select_all_users= mysqli_query($connection,$query);
                    $user_count = mysqli_num_rows($select_all_users);
                    echo "<div class='huge'>{$user_count}</div>";
                    
                    ?>
                    
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                    $query="SELECT * FROM categories";
                    $select_all_categories= mysqli_query($connection,$query);
                    $categories_count = mysqli_num_rows($select_all_categories);                
                    echo "<div class='huge'>{$categories_count}</div>";
                     
                    ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

<?php
 $queryD="SELECT * FROM posts WHERE post_status = 'draft'";
 $select_all_draft_posts=mysqli_query($connection,$queryD);
 $post_draft_count=mysqli_num_rows($select_all_draft_posts);


 /* partie Commentaire
  $queryD="SELECT * FROM comments WHERE comment_status = 'unapproved'";
 $unapproved_comments_query=mysqli_query($connection,$queryD);
 $unapproved_comment_count=mysqli_num_rows($unapproved_comments_query);

*/

$queryD="SELECT * FROM users WHERE user_role = 'subscribers'";
$select_all_subscribers=mysqli_query($connection,$queryD);
$subscriber_count=mysqli_num_rows($select_all_subscribers);


?>






<div class="row">
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          <?php
         $element_text=['Active Posts','Draft Posts','Comments','Pending Comment','Subscribers','Users','Categories'];
         $element_count=[$posts_count,$post_draft_count,7,/*$unapproved_comment_count*/ 5 ,$subscriber_count,$user_count,$categories_count]; 
         for($i = 0 ; $i < 7 ; $i++ ){
            echo "['{$element_text[$i]}'".","."{$element_count[$i]}],";
         }

          ?>
         // ['Post', 1000],
         // ['Post', 500],
        ]);
        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
        <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>



</div>





            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    
    <?php include "includes/admin_footer.php" ?>