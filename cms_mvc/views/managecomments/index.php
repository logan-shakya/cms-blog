<header class=" text-dark py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Manage Comments</h1>
            </div>
        </div>
    </div>
</header>

<section class="container py-2 mb-4">
    <div class="row" style="min-height: 30px;">
        <div class="col-lg-12" style="min-height: 400px;">
        <h2>UnApproved Comments</h2>

        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>Date & Time</th>
                    <th>Name</th>
                    <th>Comment</th>
                    <th>Aprove</th>
                    <th>Action</th>
                    <th>Details</th>
                </tr>
            </thead>
            
            <!-- php coder here -->
            <?php
                foreach ($unapprovedComments as $unapprovedComment) :
                
                $DateTime = $unapprovedComment['datetime'];
                $CommenterName = $unapprovedComment['name'];
                $CommentContent = $unapprovedComment['comments'];
                
                if(strlen($CommenterName)>10) {$CommenterName = substr($CommenterName,0,10).'..';}
                if(strlen($DateTime)>11) {$DateTime = substr($DateTime,0,11).'..';}
            ?>

            <tbody>
                <tr>
                    <td><?php echo htmlentities(++$loop); ?></td>
                    <td><?php echo htmlentities($DateTime); ?></td>
                    <td><?php echo htmlentities($CommenterName); ?></td>
                    <td><?php echo htmlentities($CommentContent); ?></td>
                    <td><a href="/comment/approve?id=<?php echo $unapprovedComment['id']; ?>" class="btn btn-info btn-sm">Approve</a></td>
                    <td><a href="/comment/delete?id=<?php echo $unapprovedComment['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="/posts/fullPost?id=<?php echo $unapprovedComment['post_id']; ?>" target="_blank">Live Preview</a>
                    </td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
                    
        <hr class="border-success border-5">

        <h2>Approved Comments</h2>


        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>Date & Time</th>
                    <th>Name</th>
                    <th>Comment</th>
                    <th>Revert</th>
                    <th>Action</th>
                    <th>Details</th>
                </tr>
            </thead>
           
            <!-- php code here to fetch data from controller -->

            <?php
                $loop = 0;
                foreach ($approvedComments as $approvedComment) :
                    $DateTime = $approvedComment['datetime'];
                    $CommenterName = $approvedComment['name'];
                    $CommentContent = $approvedComment['comments'];
                    
                    if(strlen($CommenterName)>10) {$CommenterName = substr($CommenterName,0,10).'..';}
                    if(strlen($DateTime)>11) {$DateTime = substr($DateTime,0,11).'..';}
            ?>

            <tbody>
                <tr>
                    <td><?php echo htmlentities(++$loop); ?></td>
                    <td><?php echo htmlentities($DateTime); ?></td>
                    <td><?php echo htmlentities($CommenterName); ?></td>
                    <td><?php echo htmlentities($CommentContent); ?></td>
                    <td><a href="/comment/unapprove?id=<?php echo $approvedComment['id']; ?>" class="btn btn-warning btn-sm">Disapprove</a></td>
                    <td><a href="/comment/delete?id=<?php echo $approvedComment['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="/posts/fullPost?id=<?php echo $approvedComment['post_id']; ?>" target="_blank">Live Preview</a>
                    </td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
        </div>
    </div>
</section>