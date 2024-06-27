<div class="col-md-4">
<!-- Blog Search Well -->
<?php include "searchWell.php"; ?>
<!-- Blog Categories Well -->
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
                    while ($rows=mysqli_fetch_assoc($select_all_categories)){
                        $title=$rows['cat_title'];
                        ?>
                        <li><a href="#"><?php echo $title ?></a></li>
                        <?php 
                   
                    }
                }
            }
        ?>
            </ul>
        </div>

        <!-- /.col-lg-6 -->
       
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>

</div>
