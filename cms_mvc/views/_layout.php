<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>


        <link rel="stylesheet" href="style.css">
    <title>BLOG</title>
</head>
<body>
<!-- Navigation -->
    <?php
        if(($_SERVER['REQUEST_URI']== '/') || ($_SERVER['REQUEST_URI'] == '/index.php')) {
            include_once "_navigationPublic.php";
        }
        else {
            include_once "_navigationAdmin.php";
        }
    ?>
<!-- Navigation End -->

<!-- Main section -->

<?php echo $content; ?>

<!-- End of main section -->


<footer class="bg-success text-white <?php if(($_SERVER['REQUEST_URI'] == '/') || ($_SERVER['REQUEST_URI'] == '/dashboard.php')) echo 'fixed-bottom'; else echo 'sticky-bottom'; ?>">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="lead text-center">CMS-BLOG | <span id="year"></span> &copy; ----All right reserved.</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
    $('#year').text(new Date().getFullYear());
    </script>
</body>
</html>