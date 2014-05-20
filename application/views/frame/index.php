<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>LangHack<?php echo isset($head_title) ? ' > '.$head_title : ''; ?></title>
  <!-- Bootstrap core CSS -->
  <link href="/static/css/bootstrap.css" rel="stylesheet">
  <!-- Add custom CSS here -->
  <link href="/static/css/common.css" rel="stylesheet">
</head>
<body>

  <?php echo $partial_header; ?>
  
  <div class="container">
    <?php echo $partial_body; ?>
  </div>

  <!-- /.container -->
  <div class="container">
    <?php echo $partial_footer; ?>
  </div>
  <!-- /.container -->

  <!-- JavaScript -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="/static/js/bootstrap.min.js"></script>

</body>

</html>
