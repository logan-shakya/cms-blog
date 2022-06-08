<?php 
    $delete_url_check =  (end(explode('/',$_SERVER['PATH_INFO'])) === deletePostData) ? "disabled" : "";
?>

<header class=" text-dark py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    <?php 
                    if($delete_url_check){
                        echo "Delete Post";
                    } else {
                        echo "Edit Post";
                    }                  
                    ?>
                </h1>
            </div>
        </div>
    </div>
</header>

<section class="container py-2 mb-auto" style="min-height: 750px;">
    <div class="row">
        <div class="offset-lg-1 col-lg-10">

        <?php
            $id = $get_post_detail['id'];
            $TitleToBeDeleted = $get_post_detail['title'];
            $CategoryToBeDeleted = $get_post_detail['category'];
            $ImageToBeDeleted = $get_post_detail['image'];
            $PostToBeDeleted = $get_post_detail['post'];
            
            // echo end(explode('/',$_SERVER['PATH_INFO']));
        ?>
           
            <form method="GET" enctype="multipart/form-data">
                <div class="card">
                   
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"><h3> Post Title: </h3></label>
                            <input disabled class="form-control" type="text" name="PostTitle" id="title" placeholder="Title Name" value="<?php echo $TitleToBeDeleted; ?>">
                        </div>
                        <div class="form-group">
                            
                            <label for="title"><h3> Existing Category: </h3></label>
                            <select .<?php echo $delete_url_check; ?>. name="Category" id="Category" class="form-control" value>
                                    <option>
                                        <?php echo $CategoryToBeDeleted; ?>
                                    </option>
                            </select>
                        </div>
                        <div class="form-group mb-1">
                            <h3>Existing Image: </h3>
                            <img class="mb-1" src="/Upload/<?php echo $ImageToBeDeleted; ?>" width="170px"; height="70px"; >
                            
                        </div>
                        <div class="form-group">
                            <label for="Post">
                                <span class="FieldInfo"><h3>Post: </h3></span>
                            </label>
                            <textarea disabled name="PostDescription" id="Post" cols="30" rows="10" class="form-control">
                                <?php echo $PostToBeDeleted; ?>
                            </textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <a href="/posts/postData" class="btn btn-warning btn-sm">Back To All Posts</a>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <a href="/deletePostData/delete?id=<?php echo $id; ?>" class="btn btn-danger btn-sm mr-auto">
                                    Delete
                                </a>
                            </div>                        
                        </div>
                    </div>
                </div>
            </form>
        
        </div>
    </div>
</section>