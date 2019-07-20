<!DOCTYPE html>
<html lang="en">

<head>
  <title>TMDB | My Favorite</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css" >
</head>

<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #0e101f;">
      <a class="navbar-brand" href="<?= base_url()?>welcome/index"><font style="font-weight: bold; color: #06d06b;">TMDB</font></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url();?>welcome/index">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>welcome/Nowplaying">NOW PLAYING</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>welcome/Upcome">UPCOMING</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url()?>welcome/Favorite"> MY FAVORITE</a>
          </li>
        </ul>
        <form action="<?= base_url() ?>welcome/cari" method="get" class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" name="q" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
</nav>
<body>
<div style="margin-top: 70px;">
  <main role="main" class="container">
    <div class="row"> 
      <?php foreach ($isi->result_array() as $row) {
      $content = file_get_contents('https://api.themoviedb.org/3/movie/'.$row['movie_id'].'?api_key=7fe404c49d485e74e57949e1a52628e6');
      $result  = json_decode($content);
      echo '<div class="col-lg-2 col-sm-6 portfolio-item">
            <div class="card" style="box-shadow:0px 0px 20px 1px #212529;">
              <a href="Detail?id='.$result->id.'"><img class="card-img-top rounded" src="http://image.tmdb.org/t/p/w185'.$result->poster_path.'"></a>
              <div class="judul">'.$result->original_title.'</div>
              <a href="'.base_url().'welcome/hapus/'.$row['movie_id'].'" class="btn btn-danger btn-sm"><b>Delete</b></a>
            </div>
            </div>
      ';}?>
  </div>
  </main>
</div>
</body>
</html>