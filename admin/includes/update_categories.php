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

<form action="" method="post" class="content fade-in">
<div class="form-groupe">
    <label name="cat_title">Edite Category</label>
   
    <?php

if(isset($_GET['edit'])){
$cat_id=$_GET['edit'];
$query="SELECT * FROM categories WHERE cat_id={$cat_id} ";
$select_all_categories_id=mysqli_query($connection,$query);

while ($rows=mysqli_fetch_assoc($select_all_categories_id)){
$cat_id=$rows['cat_id'];
$cat_title=$rows['cat_title'];


?>

<input value="<?php if(isset($cat_title)){echo $cat_title ;} ?>" type="text" class="form-control" name="cat_title" >

<?php
   }
}  ?>
    <?php 
    //***********Update categories*********************


        if(isset($_POST['update'])){
            $the_cat_title=$_POST['cat_title'];
            $query="UPDATE categories SET cat_title='{$the_cat_title}' WHERE cat_id={$cat_id}";
            $update_query=mysqli_query($connection,$query);
            header("Location:categories.php");
            if (!$update_query){
                die("Query failed" . mysqli_error($connection));
            
            }

        }
    ?>
</div>
<div class="form-groupe">
   <input class="btn btn-primary" type="submit" name="update" value="Update category"> 
</div>
</form>

