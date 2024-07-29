
<?php

if (isset($_GET['p_id'])){
    $the_post_id=  $_GET['p_id'];
}
$query="SELECT * FROM posts WHERE post_id={$the_post_id}  ";
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

  if (isset($_POST['update_post'])){
    $post_title=$_POST["title"];
    $post_author=$_POST["author"];
    $post_category_id=$_POST['post_category_id'];
    $post_status=$_POST['post_status'];

    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];

    $post_tags =$_POST['post_tags'];
    $post_content=$_POST['post_content'];
    //déplace l'image de l'emplacement temporarire vers un emplacement permanent
    move_uploaded_file($post_image_temp,"../images/$post_image");
   if (empty($post_image)){
        $query="SELECT * FROM posts WHERE post_id=$the_post_id";
        $select_image=mysqli_query($connection,$query);
        while ($rows = mysqli_fetch_array($select_image)){
            $post_image=$rows['post_image'];
        }
   }
   
    $query ="UPDATE posts SET ";
    $query .="post_title ='{$post_title }' ,";
    $query .="post_category_id='{$post_category_id}' , ";
    $query .="post_date= now(), ";
    $query .="post_author ='{$post_author}', ";
    $query .="post_tags ='{$post_tags}' , ";
    $query .="post_content= '{$post_content}' ,";
    $query .="post_image= '{$post_image}' ";
    $query .="  WHERE post_id={$the_post_id}";

    $update_post= mysqli_query($connection , $query);
    confirmQuery($update_post);
}
      
?>


<form class="" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label for="inputEmail4" class="form-label">Post Title </label>
    <input value="<?php echo $post_title ?>" type="text" name="title" class="form-control" id="inputEmail4">
    </div>
    
    <div class="form-group">
        <select name="post_category" id="post_category">
            <?php 
            $query="SELECT * FROM categories ";
            $select_all_categories_id=mysqli_query($connection,$query);
            confirmQuery($select_all_categories_id);
            while ($rows=mysqli_fetch_assoc($select_all_categories_id)){
            $cat_id=$rows['cat_id'];
            $cat_title=$rows['cat_title'];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
            ?>

        </select>
    </div>
    <div class="form-group">
    <label for="inputPassword4" class="form-label">Post Category Id</label>
    <input value="<?php  echo $post_category_id?>" type="text" name="post_category_id" class="form-control" id="inputPassword4">
    </div>
    <div class="form-group">
    <label for="inputAddress" class="form-label">Post Author</label>
    <input value="<?php echo $post_author; ?>" type="text" name="author" class="form-control" id="inputAddress" >
    </div>
    <div class="form-group">
    <label for="inputAddress2" class="form-label">Post Status</label>
    <input value="<?php echo  $post_status ?>" type="text" name="post_status" class="form-control" id="inputAddress2" >
    </div>
    <div class="form-group">
     <img width="108" src="../images/<?php echo $post_image ?>" alt="">
        <input type="file" name="image">
    </div>
   
<div class="form-group">
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
  <input  type="submit" class="btn btn-primary" name="update_post" value="Update Post">
</div>

</form>
