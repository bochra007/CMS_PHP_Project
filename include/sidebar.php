<div class="col-md-4">
<!-- Blog Search Well -->
<?php include "searchWell.php"; ?>
<!-- Blog Categories Well -->

<!-- Login-->
<div class="well">
    <h4>Login</h4>
    <form action="./include/login.php" method="post">
    <div class="form-group">
        <input name="username" type="text" class="form-control" placeholder="Enter User name">
    </div>
    <div class="input-group">
        <input name="password" type="password" class="form-control" placeholder="Enter Password">
    <span class="input-group-btn">
<button class="btn btn-primary" name="login" type="submit ">
    Submit
</button>
    </span>
    </div>
    </form>
    <!-- ! search form -->
    <!-- /.input-group -->
</div>
<!-- Login -->


<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">    
        <?php 
            $query="SELECT * FROM categories ";
            $select_all_categories=mysqli_query($connection,$query);
            if(!$select_all_categories){
                die("error select category ".mysqli_error());
            }else{
                $count=mysqli_num_rows($select_all_categories);
                if($count=0){
                    echo "No Result ";
                }else{
                    while ($row=mysqli_fetch_assoc($select_all_categories)){
                        $title=$row['cat_title'];
                        $cat_id=$row['cat_id'];
                        ?>
                        <li><a href="category.php?category=<?php echo $cat_id ; ?>"><?php echo $title  ?></a></li>
                        <?php 
                   
                    }
                }
            }
        ?>
            </ul>
        </div>

    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>

</div>
