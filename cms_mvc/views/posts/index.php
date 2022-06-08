<div class="container">
    <div class="row mt-4">

    <!-- Main Area Start -->
        <div class="col-sm-8" style="min-height: 40px;">
            <h1>The Complete CMS Blog</h1>
            <h1 class="lead">The Complete Blog by using PHP</h1>

            <?php  
                foreach($posts as $post):
                
                    $PostId = $post['id'];
                    $DateTime = $post['datetime'];
                    $PostTitle = $post['title'];
                    $Category = $post['category'];
                    $Admin = $post['author'];
                    $Image = $post['image'];
                    $PostDescription = $post['post'];
            ?>

                <div class="card mb-2">
                    <img src="/Upload/<?php echo htmlentities($Image); ?>" style="max-height: 550px;" class="img-fluid card-img-top" />
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php  
                                echo htmlentities($PostTitle);
                            ?>
                        </h4>
                        <small class="text-muted">
                            Category: <?php echo $Category; ?>
                            Written by 
                            <span class="text-dark">
                                <a class="text-dark" href="profile.php?username=<?php echo htmlentities($Admin); ?>">
                                    <?php echo htmlentities($Admin); ?>
                                </a>
                            </span>
                            on <?php echo htmlentities($DateTime); ?>
                        </small>
                        <span style="float:right" class="badge badge-success">
                            Comments <?php echo $post['totalApprovedComments']; ?>
                        </span>
                        <hr>
                        <p class="card-text">
                            <?php if (strlen($PostDescription) > 150){
                                $PostDescription = substr($PostDescription, 0, 150) . "..." ;
                            }
                            
                            echo htmlentities($PostDescription); ?>
                        </p>
                        <a href="/posts/fullPost?id=<?php echo $PostId; ?>" style="float: right;">
                            <span class="btn btn-info">Read More >></span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>