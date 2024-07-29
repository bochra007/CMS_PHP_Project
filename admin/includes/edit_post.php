
<?php

if (isset($_GET['p_id'])){
    $the_post_id=  $_GET['p_id'];
}
$query="SELECT * FROM posts  ";
$select_posts_by_id=mysqli_query($connection,$query);
  while ($rows=mysqli_fetch_assoc($select_posts_by_id)){
   $post_id=$rows['post_id'];
   $post_title=$rows['post_title'];
   $post_category_id=$rows['post_category_id'];
   $post_author=$rows['post_author'];
   $post_date=$rows['post_date'];
   $post_image=$rows['post_image'];
   $post_tags=$rows['post_tags'];
   $post_status=$rows['post_status'];
   $post_title=$rows['post_title'];
   $post_content=$rows['post_content'];
   $post_comment_count=$rows['post_comment_count'];

  }
      
?>



<form class="" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Post Title </label>
    <input value="<?php echo $post_title ?>" type="text" name="title" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Post Category Id</label>
    <input value="<?php  echo $post_category_id?>" type="text" name="post_category_id" class="form-control" id="inputPassword4">
    </div>
    <div class="col-md-6">
    <label for="inputAddress" class="form-label">Post Author</label>
    <input value="<?php echo $post_author; ?>" type="text" name="author" class="form-control" id="inputAddress" >
    </div>
    <div class="col-md-6">
    <label for="inputAddress2" class="form-label">Post Status</label>
    <input value="<?php echo  $post_status ?>" type="text" name="post_status" class="form-control" id="inputAddress2" >
    </div>
    <div class="col-md-6">
  <label for="formFile" class="form-label">Default file input </label>
  <input class="form-control" name="image" type="file" id="formFile">
</div>
   
<div class="col-md-6">
    <label for="inputAddress2" class="form-label">Post Tags</label>
    <input value="<?php echo $post_tags ?>" type="text" name="post_tags" class="form-control" id="inputAddress2" >
    </div>
    <div class="mb-4">
  <label for="exampleFormControlTextarea1" class="form-label">Post Content</label>
  <textarea class="form-control" name="post_content" id="exampleFormControlTextarea1" rows="3">
    <?php echo $post_content ; ?>
  </textarea>
</div>
<div class="col-md-12">
  <input  type="submit" class="btn btn-primary" name="create_post" value="add post">
</div>

</form>
