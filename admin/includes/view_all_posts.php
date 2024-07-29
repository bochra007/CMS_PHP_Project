<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                            </tr>

                        </thead>
                        <tbody>
                        <?php 
                          $query="SELECT * FROM posts ";
                          $select_posts=mysqli_query($connection,$query);
                            while ($rows=mysqli_fetch_assoc($select_posts)){
                             $post_id=$rows['post_id'];
                             $post_title=$rows['post_title'];
                             $post_category_id=$rows['post_category_id'];
                             $post_author=$rows['post_author'];
                             $post_date=$rows['post_date'];
                             $post_image=$rows['post_image'];
                             $post_tags=$rows['post_tags'];
                             $post_status=$rows['post_status'];
                             $post_title=$rows['post_title'];
                             $post_comment_count=$rows['post_comment_count'];
                                echo "<tr>";
                                echo "<td> $post_id </td>";
                                echo "<td> $post_author </td>";
                                echo "<td> $post_title </td>";
                                echo "<td> $post_category_id </td>";
                                echo "<td> $post_status</td>";
                                echo "<td><img width='100' class='img-responsive'  src='../images/$post_image' alt='image'></td>";
                                echo "<td>$post_tags</td>";
                                echo "<td> $post_comment_count</td>";
                                echo "<td>$post_date</td>";
                                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}' > Edit </a> </td>";// Diviser l'argument  p_id={$post_id}
                                echo "<td><a href='posts.php?delete={$post_id}' > Delete </a> </td>";
                                echo "</tr>";
                            }?>
                        </tbody>
                    </table>

                    <?php
                    if(isset($_GET['delete'])){
                        $the_post_id =$_GET['delete'];
                        $query="DELETE FROM posts WHERE post_id={$the_post_id}";
                        $delete_query= mysqli_query($connection,$query);
                    }
                    ?>