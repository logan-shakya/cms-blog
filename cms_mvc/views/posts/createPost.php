<!-- HEADER -->
<header class=" text-dark py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add New Post</h1>
            </div>
        </div>
    </div>
</header>
 <!-- HEADER END -->

<!-- MAIN -->

<section class="container py-2 mb-auto" style="min-height: 750px;">
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
         
            <form action="/posts/create" method="POST" enctype="multipart/form-data">
                <div class="card">
                   
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"><h3> Post Title: </h3></label>
                            <input class="form-control" type="text" name="PostTitle" id="title" 
                                placeholder="Title Name" value="<?php echo $postData['pTitle']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="title"><h3> Choose Category: </h3></label>
                            <select name="Category" id="Category" class="form-control">
                                <?php foreach($categoryData as $category):?>
                                    <option value="<?php echo $category['title'] ?>">
                                        <?php echo $category['title'] ?>
                                    </option>
                                <?php endforeach?>
                            </select>
                        </div>
                        <div class="form-group">
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
                            <textarea name="PostDescription" id="Post" cols="30" rows="10" class="form-control"></textarea>
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

<!-- MAIN END -->