<html lang="en">
<head>
 <title>codeigniter 4 multiple images & files upload example - XpertPhp</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 <div class="container">
 <?php if (session('msg')) : ?>
 <div class="alert alert-info alert-dismissible">
 <?= session('msg') ?>
 <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
 </div>
 <?php endif ?>
 <form method="post" action="<?php echo base_url('ImageUpload/upload_image');?>" enctype="multipart/form-data">
   <div class="form-group">
 <label>Image</label>
 <input type="file" name="file[]" class="form-control">
   </div>
   <button type="submit" class="btn btn-primary">Upload</button>
 </form>
 </div>
</body>
</html>