<header class=" text-dark py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Post</h1>
            </div>
        </div>
    </div>
</header>

<section class="container py-2 mb-auto" style="min-height: 750px;">
    <div class="row">
        <div class="offset-lg-1 col-lg-10">

            <form action="editPost.php?id=<?php echo $searchQueryParameter; ?>" method="POST" enctype="multipart/form-data">
                <div class="card">
                   
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"><h3> Post Title: </h3></label>
                            <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Title Name" value="<?php echo $TitleToBeUpdated; ?>">
                        </div>
                        <div class="form-group">
                            <span class=""><i>Existing Category: </i></span>
                            <?php 
                                echo '<b>'.  $CategoryToBeUpdated .'</b>';
                            ?> 
                            <br>
                            <label for="title"><h3> Choose Category: </h3></label>
                            <select name="Category" id="Category" class="form-control" value>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                            </select>
                        </div>
                        <div class="form-group mb-1">
                            <span>Existing Image: </span>
                            <img class="mb-1" src="Upload/<?php echo $ImageToBeUpdated; ?>" width="170px"; height="70px"; >
                            <label for="imageSelect">
                                <span class="FieldInfo">Select Image</span>
                            </label>
                            <div class="custom-file">
                                <input type="file" name="Image" id="imageSelect" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Post">
                                <span class="FieldInfo"><h3>Post: </h3></span>
                            </label>
                            <textarea name="PostDescription" id="Post" cols="30" rows="10" class="form-control">
                                <?php echo $PostToBeUpdated; ?>
                            </textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <a href="dashboard.php" class="btn btn-warning btn-sm">Back To Dashboard</a>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <button type="submit" name="submit" class="btn btn-success btn-sm mr-auto">
                                    Publish
                                </button>
                            </div>                        
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>