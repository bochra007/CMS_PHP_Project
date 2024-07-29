
 <?php
    if (isset($_POST['create_post'])){
        $post_title=$_POST["title"];
        $post_author=$_POST["author"];
        $post_category_id=$_POST['post_category_id'];
        $post_status=$_POST['post_status'];

        $post_image=$_FILES['image']['name'];
        $post_image_temp=$_FILES['image']['tmp_name'];

        $post_tags =$_POST['post_tags'];
        $post_content=$_POST['post_content'];
        $post_date=date('d-m-y');
        $post_comment_count = 4;

        echo "$post_title";
        echo " $post_author";
        echo " $post_category_id";
        echo "$post_status";
        echo " $post_image";
        echo "$post_tags";

        move_uploaded_file($post_image_temp,"../images/$post_image");
        $connection=mysqli_connect("localhost","root","","cms");

       
            $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
            $query .= "VALUES ({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', {$post_comment_count}, '{$post_status}')";

            $create_post_query=mysqli_query($connection,$query);
            comfirmQuery($create_post_query);
}
 ?>
 
 <form class="" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Post Title </label>
    <input type="text" name="title" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Post Category Id</label>
    <input type="text" name="post_category_id" class="form-control" id="inputPassword4">
    </div>
    <div class="col-md-6">
    <label for="inputAddress" class="form-label">Post Author</label>
    <input type="text" name="author" class="form-control" id="inputAddress" placeholder="">
    </div>
    <div class="col-md-6">
    <label for="inputAddress2" class="form-label">Post Status</label>
    <input type="text" name="post_status" class="form-control" id="inputAddress2" placeholder="">
    </div>
    <div class="col-md-6">
  <label for="formFile" class="form-label">Default file input example</label>
  <input class="form-control" name="image" type="file" id="formFile">
</div>
   
<div class="col-md-6">
    <label for="inputAddress2" class="form-label">Post Tags</label>
    <input type="text" name="post_tags" class="form-control" id="inputAddress2" placeholder="">
    </div>
    <div class="mb-4">
  <label for="exampleFormControlTextarea1" class="form-label">Post Content</label>
  <textarea class="form-control" name="post_content" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="col-md-12">
  <input  type="submit" class="btn btn-primary" name="create_post" value="add post">
</div>

</form>
