<?php
ob_start();
include('partials/headlinks.php');
include('partials/preloader_search.php');
include('partials/header.php');?>
<div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Your Recipe Has been submitted to Admin</strong>.Your post will be displayed on site after approval</p>
  <hr>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to homepage</a>
  </p>
</div>
<?php
include('partials/footer.php');
?>
