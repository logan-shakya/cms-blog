<header class=" text-dark py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog Posts</h1>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="/posts/create" class="btn btn-primary btn-sm btn-block">Add New Post</a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="/posts/category" class="btn btn-info btn-sm btn-block">Add New Category</a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="/posts/admin" class="btn btn-warning btn-sm btn-block">Add New Admin</a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="/posts/comment" class="btn btn-success btn-sm btn-block">Approve Comments</a>
            </div>
        </div>
    </div>
</header>

<section class="container py-2 mb-4">
    <div class="row">
        <div class="col-lg-12">
            
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date & Time</th>
                        <th>Author</th>
                        <th>Banner</th>
                        <th>Comments</th>
                        <th>Actions</th>
                        <th>Live Preview</th>
                    </tr>
                </thead>
                
                <?php 
                    foreach ($all_post_data as $post_data) :
                        $Id = $post_data['id'];
                        $PostTitle = $post_data['title'];
                        $Category = $post_data['category'];
                        $DateTime = $post_data['datetime'];
                        $Admin = $post_data['author'];
                        $Image = $post_data['image'];
                ?>
                        <tbody>
                            <tr>
                                <td class="table-success"><?php echo ++$loop; ?></td>
                                <td>
                                    <?php 
                                        if (strlen($PostTitle) > 20) {$PostTitle = substr($PostTitle,0,15). '...';}
                                        echo $PostTitle; ?>
                                </td>
                                <td>
                                    <?php
                                        if (strlen($Category) > 10) {$Category = substr($Category,0,10). '...';}
                                        echo $Category; ?>
                                </td>
                                <td>
                                    <?php 
                                        if (strlen($DateTime) > 11) {$DateTime = substr($DateTime,0,11). '...';}
                                        echo $DateTime; ?>
                                </td>
                                <td>
                                    <?php
                                        if (strlen($Admin) > 6) {$Admin = substr($Admin,0,6). '...';}
                                        echo $Admin; ?>
                                </td>
                                <td><img src="/Upload/<?php echo $Image; ?>" width="80px" height="50px"></td>
                                <td>
                                <span class="badge badge-success">
                                    <?php echo $approved_comments[$post_data['id']] ?>
                                </span>
                                <span class="badge badge-danger">
                                    <?php echo $unapproved_comments[$post_data['id']] ?>
                                </span>
                                </td>
                                <td>
                                    <a href="/posts/editPost?id=<?php echo $Id; ?>"><span class="btn btn-info btn-sm">Edit</span></a>
                                    <a href="/posts/deletePostData?id=<?php echo $Id; ?>"><span class="btn btn-danger btn-sm">Delete</span></a>
                                </td>
                                <td>
                                    <a href="/posts/fullPost?id=<?php echo $Id; ?>" target="_blank"><span class="btn btn-primary btn-sm">Live Preview</span></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                    
            </table>
        </div>
    </div>
</section>