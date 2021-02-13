<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title; ?> | <?= $subtitle; ?></title>
   <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/assets/demo/demo.css" rel="stylesheet" />
  <link href="/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/css/style.css" rel="stylesheet" />
</head>
<body>
   <!-- Navbar Front End -->
   <?= $this->include('layouts/navbarFront'); ?>
   <!-- /Navbar Front End -->

   <!-- Content Front -->
   <div class="content">
      <?= $this->renderSection('content'); ?>
   </div>
   <!-- /Content Front -->

   <!-- Footer -->
   <div class="copyright text-center mt-2">
         &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>, made with <i class="material-icons text-danger">favorite</i> by Ridho Surya</a>.
    </div>
   <!-- /Footer -->

   <!--   Core JS Files   -->
  <script src="/assets/js/core/jquery.min.js"></script>
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
</body>
</html>