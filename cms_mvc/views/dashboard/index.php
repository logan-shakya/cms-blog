<header class=" text-dark py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog Posts</h1>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="addNewPost.php" class="btn btn-primary btn-sm btn-block">Add New Post</a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="categories.php" class="btn btn-info btn-sm btn-block">Add New Category</a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="admins.php" class="btn btn-warning btn-sm btn-block">Add New Admin</a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="comments.php" class="btn btn-success btn-sm btn-block">Approve Comments</a>
            </div>
        </div>
    </div>
</header>

<section class="container py-2 mb-4">
            
    <div class="row">

        <!-- left side area start -->
        <div class="col-lg-2 d-none d-md-block">
            <div class="card text-center bg-light text-dark mb-3">
                <div class="card-body">
                    <h1 class="lead">Posts</h1>
                    <h4 class="display-5">
                    <i class="fab fa-readme"></i>
                        
                        <?php 
                            echo $total['posts'];
                        ?>
                    </h4>
                </div>
            </div>

            <div class="card text-center bg-light text-dark mb-3">
                <div class="card-body">
                    <h1 class="lead">Categories</h1>
                    <h4 class="display-5">
                    <i class="fas fa-folder"></i>
                        <?php 
                            echo $total['category'];
                        ?>
                    </h4>
                </div>
            </div>

            <div class="card text-center bg-light text-dark mb-3">
                <div class="card-body">
                    <h1 class="lead">Admins</h1>
                    <h4 class="display-5">
                    <i class="fas fa-users"></i>
                        <?php 
                            echo $total['admin']
                        ?>
                    </h4>
                </div>
            </div>
            <div class="card text-center bg-light text-dark mb-3">
                <div class="card-body">
                    <h1 class="lead">Comments</h1>
                    <h4 class="display-5">
                        <i class="fas fa-comments"></i>
                        <?php 
                            echo $total['comments']
                        ?>
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-lg-10">
            <h1>Top Posts</h1>
            <table class="table table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Date&Time</th>
                        <th>Authors</th>
                        <th>Comments</th>
                        <th>Details</th>
                    </tr>
                </thead>
                
                <?php
                    foreach ($get_recent_posts as $get_recent_post) :
                        $PostId = $get_recent_post['id'];
                        $Title = $get_recent_post['title'];
                        $DateTime = $get_recent_post['datetime'];
                        $Author = $get_recent_post['author'];
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo ++$loop; ?></td>
                            <td><?php echo $Title; ?></td>
                            <td><?php echo $DateTime; ?></td>
                            <td><?php echo $Author; ?></td>
                            <td>
                                <span class="badge badge-success">
                                    <?php echo $approved_comments[$get_recent_post['id']]; ?>
                                </span>
                                <span class="badge badge-danger">
                                    <?php echo $approved_comments[$get_recent_post['id']]; ?>
                                </span>
                            </td>
                            <td>
                                <a href="/posts/fullPost?id=<?php echo $PostId;?>">
                                    <span class="btn btn-info">Preview</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>

        <!-- left side area end -->
    </div>
</section>