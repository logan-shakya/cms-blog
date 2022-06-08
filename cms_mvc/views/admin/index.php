<header class=" text-dark py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Manage Admins</h1>
            </div>
        </div>
    </div>
</header>

<section class="container py-2 mb-auto" style="min-height: 750px;">
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
            
            <form action="/posts/admin" method="POST" autocomplete="off">
                <div class="card">
                    <div class="card-header">
                        <h1>Add New Admin</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username"><h3> Username: </h3></label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Username" value="">
                        </div>
                        <div class="form-group">
                            <label for="name"><h3> Name: </h3></label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Name" value="">
                            <small class="text-warning text-muted">Optional</small>
                        </div>
                        <div class="form-group">
                            <label for="password"><h3> Password: </h3></label>
                            <input class="form-control" type="password" name="password" id="password" value="">
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword"><h3> Confirm Password: </h3></label>
                            <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" value="">
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
            <br> <br>

            <h2>Existing Admins</h2>

        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>Date & Time</th>
                    <th>UserName</th>
                    <th>Admin Name</th>
                    <th>Added By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!-- php code here -->
            <?php 
                foreach ($adminLists as $adminList):
                
                $DateTime = $adminList['datetime'];
                $adminUsername = $adminList['username'];
                $adminName = $adminList['adminname'];
                $addedBy = $adminList['addedby'];

            ?>
            <tbody>
                <tr>
                    <td><?php echo htmlentities(++$loop); ?></td>
                    <td><?php echo htmlentities($DateTime); ?></td>
                    <td><?php echo htmlentities($adminUsername); ?></td>
                    <td><?php echo htmlentities($adminName); ?></td>
                    <td><?php echo htmlentities($addedBy); ?></td>
                    <td><a href="/admin/delete?id=<?php echo $adminList['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
            
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
        </div>
        
    </div>
</section>