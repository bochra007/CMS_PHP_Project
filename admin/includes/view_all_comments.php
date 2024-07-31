<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>In Response to</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Delete</th>
                            </tr>

                        </thead>
                        <tbody>
                        <?php 
                          $query="SELECT * FROM comments ";
                          $select_comments=mysqli_query($connection,$query);
                            while ($rows=mysqli_fetch_assoc($select_comments)){
                             $comment_id=$rows['comment_id'];
                             $comment_post_id=$rows['comment_post_id'];
                             $comment_author=$rows['comment_author'];
                             $comment_date=$rows['comment_date'];
                             $comment_email=$rows['comment_email'];
                             $comment_status=$rows['comment_status'];
                             $comment_content=$rows['comment_content'];
                                echo "<tr>";
                                echo "<td> $comment_id </td>";
                                echo "<td> $comment_post_id </td>";
                                echo "<td> $comment_author </td>";
                                echo "<td> $comment_email </td>";
                                echo "<td> $comment_status</td>";
                                echo "<td>$comment_content</td>";

                                echo "<td>$comment_date</td>";
                                echo "<td><a href='posts.php?source=edit_post&p_id={}' > Approve </a> </td>";// Diviser l'argument  p_id={$post_id}
                                echo "<td><a href='posts.php?source=edit_post&p_id={}' > Unapprove </a> </td>";// Diviser l'argument  p_id={}
                                echo "<td><a href='posts.php?source=edit_post&p_id={}' > Delete </a> </td>";// Diviser l'argument  p_id={}


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