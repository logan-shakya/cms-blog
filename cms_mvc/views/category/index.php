<header class=" text-dark py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Manage Categories</h1>
            </div>
        </div>
    </div>
</header>

<section class="container py-2 mb-auto" style="min-height: 750px;">
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
            <form action="/posts/category" method="POST">
                <div class="card">
                    <div class="card-header">
                        <h1>Add New Category</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"><h3> Title </h3></label>
                            <input class="form-control" type="text" name="CategoryTitle" id="title" placeholder="Title Name" value="">
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
            
        <hr class="border-success border-5">

        <h2>Existing Categories</h2>

        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>Date & Time</th>
                    <th>Category Name</th>
                    <th>Created By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
                foreach($categoryLists as $categoryList) :
                
                    $DateTime = $categoryList['datetime'];
                    $CategoryTitle = $categoryList['title'];
                    $Author = $categoryList['author'];
            ?>
            <tbody>
                <tr>
                    <td><?php echo htmlentities(++$loop); ?></td>
                    <td><?php echo htmlentities($DateTime); ?></td>
                    <td><?php echo htmlentities($CategoryTitle); ?></td>
                    <td><?php echo htmlentities($Author); ?></td>
                    <td><a href="/category/delete?id=<?php echo $categoryList['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
            
                </tr>
            </tbody> 
            <?php endforeach; ?>
        </table>
        </div>
    </div>
</section>