<!DOCTYPE html>
<html lang="en">

<head>
  <title>TMDB | <?php echo $judfil?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css" >
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #0e101f;font-family: 'Roboto', sans-serif;">
      <a class="navbar-brand" href="<?= base_url()?>welcome/index"><font style="font-weight: bold; color: #06d06b;"><?php echo $title;?></font></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>welcome/index">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>welcome/Nowplaying">NOW PLAYING</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>welcome/Upcome">UPCOMING</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>welcome/Favorite">MY FAVORITE</a>
          </li>
        </ul>
        <form action="<?= base_url() ?>welcome/cari" method="get" class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" name="q" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
</nav>
<style>
.bg{
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  position: fixed;
  filter: blur(20px);
  z-index: -1;

}
.bg img {
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  min-width: 50%;
  min-height: 50%;
  position: absolute;
}
.hasil{
  color: white;
  text-shadow: 2px 2px 2px black;font-family: 'Roboto', sans-serif;
}
</style>
<body>
<main role="main" class="container">
  <div class="bg">
    <img src="http://image.tmdb.org/t/p/w185/<?= $bg;?>">
  </div>
  <div class="hasil">
    <?= $hasil ?>
  </div>
</main>
</div>
</body>
<footer style="
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
   height: 30px;
   width: 100%;
   background-color: #0e101f;
   color: white;
   text-align: center;
}">
  <b>&copy; M Alim Tajri</b>
</footer>
</html>