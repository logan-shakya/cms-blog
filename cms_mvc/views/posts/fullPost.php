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

                <div class="card mb-4">
                    <img src="/Upload/<?php echo htmlentities($Image); ?>" style="max-height: 250px);" class="img-fluid card-img-top" />
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php  
                                echo htmlentities($PostTitle);
                            ?>
                        </h4>
                        <small class="text-muted">
                            Written by <?php echo htmlentities($Admin); ?> on <?php echo htmlentities($DateTime); ?>
                        </small>
                        <span style="float:right" class="badge badge-success">Comments
                            <?php  
                                echo $post['totalApprovedComments'];
                            ?>
                        </span>
                        <hr>
                        <p class="card-text">
                        <?php  
                                echo htmlentities($PostDescription);
                            ?>
                        </p>
                       
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Comment Section -->
            <!-- Fetching Existing Comments -->
            <span><h3>Comments</h3></span> <br>
            
            <?php foreach($commentContents as $commentContent): ?>
                <div>
                    <div class="media commentBlock">
                        <div class="media-body ml-2">
                            <h6 class="lead"><?php echo $commentContent['name']; ?></h6>
                            <p class="small"><?php echo $commentContent['datetime']; ?></p>
                            <p class=""><?php echo $commentContent['comments']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
                <hr>

                <div class="">
                    <form action="/posts/comment" method="post" class="">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="">Share your thoughts about this post</h5>
                            </div>
                            <div class="card-body">
                                <div class="from-group">
                                    <input type="hidden" name='PostId' value='<?php echo $PostId; ?>'>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="CommenterName" placeholder="Name" value="" >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="CommenterEmail" placeholder="Email" value="" >
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" cols="80" name="CommenterThoughts"></textarea>
                                </div>
                                <div class="">
                                    <button name="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>

     <!-- Comment Section End    -->
<!-- Main Area End -->


        <!-- Side Area Start -->
        <div class="col-sm-4" style="min-height: 40px; background: green;">
    
        </div>

        <!-- Side Area End -->
    </div>
</div>