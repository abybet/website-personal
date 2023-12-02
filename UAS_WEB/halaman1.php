<?php

include('koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DAS FILM</title>
  <link rel="stylesheet" href="style/style.css" />
  <link rel="icon" href="img/camera-movie-solid-24.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- BOX ICON -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
  <!-- Link Swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body>
  <!-- NAVBAR -->
  <header>
    <a href="#" class="logo">
      <i class="bx bxs-camera-movie"></i> DAS FILM
    </a>
    <div class="bx bx-menu" id="menu-icon"></div>

    <!-- Menu -->
    <ul class="navbar">
      <li><a href="#home">HOME</a></li>
      <li><a href="#movies">MOVIE</a></li>
      <li><a href="#coming">COMING</a></li>
    </ul>
    <a href="logout.php" class="btn">Logout</a>
  </header>
  <!-- HOME -->
  <section class="home swiper" id="home">
    <div class="swiper-wrapper">
      <div class="swiper-slide conatiner">
        <img src="img/home1.jpg" alt="" />
        <div class="home-text">
          <span>Marvel Universe</span>
          <h1>
            Venom: Let There <br />
            Be Carnage
          </h1>
          <a href="#" class="btn">Book Now</a>
          <a href="#" class="play">
            <i class="bx bx-play-circle"></i>
          </a>
        </div>
      </div>
      <!-- Box 2 -->
      <div class="swiper-slide conatiner">
        <img src="img/home2.jpg" alt="" />
        <div class="home-text">
          <span>Marvel Universe</span>
          <h1>
            Avenger: <br />
            Infinity War
          </h1>
          <a href="#" class="btn">Book Now</a>
          <a href="#" class="play">
            <i class="bx bx-play-circle"></i>
          </a>
        </div>
      </div>
      <!-- Box 3 -->
      <div class="swiper-slide conatiner">
        <img src="img/home3.jpg" alt="" />
        <div class="home-text">
          <span>Marvel Universe</span>
          <h1>
            Spider-Man: <br />
            Far Frome Home
          </h1>
          <a href="#" class="btn">Book Now</a>
          <a href="#" class="play">
            <i class="bx bx-play-circle"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="swiper-pagination"></div>
  </section>
  <!-- Movies -->
  <section class="movies" id="movies">
    <h2 class="heading">Opening this week</h2>
    <!-- Movies container-->
    <div class="movies-container">
      <!-- Box 1 -->
      <?php
        $query = mysqli_query($conn, "SELECT * FROM tb_film");
        while ($row = mysqli_fetch_array($query)) {

        ?>
      <div class="box">
          <a href="view.php?id=<?php echo $row['id_film'] ?>">
            <div class="box-img">
              <img src="img/<?php echo$row['gambar'] ?>" alt="" />
            </div>
          </a>
        <h3><?php echo $row['nama_film'] ?></h3>
        <span><?php echo $row['info'] ?></span>
      </div>
        <?php
        }
        ?>
      
    </div>
  </section>
  <!-- Coming -->
  <section class="coming" id="coming">
    <h2 class="heading">Coming Soon</h2>
    <!-- Coming  Container -->
    <div class="comings mySwiper">
      <div class="swiper-wrapper">
        <!-- Box 1 -->
        <div class="swiper-slide box">
          <div class="box-img">
            <img src="img/m1.jpg" alt="" />
          </div>
          <h3>Venom</h3>
          <span>120 min | Action</span>
        </div>
        <!-- Box 2 -->
        <div class="swiper-slide box">
          <div class="box-img">
            <img src="img/m2.jpg" alt="" />
          </div>
          <h3>Dunkir</h3>
          <span>120 min | Adventure</span>
        </div>
        <!-- Box 3 -->
        <div class="swiper-slide box">
          <div class="box-img">
            <img src="img/m3.jpg" alt="" />
          </div>
          <h3>Batman Vs Superman</h3>
          <span>120 min | Thriller</span>
        </div>
        <!-- Box 4 -->
        <div class="swiper-slide box">
          <div class="box-img">
            <img src="img/m4.jpg" alt="" />
          </div>
          <h3>Jhon Wick 2</h3>
          <span>120 min | Adventure</span>
        </div>
        <!-- Box 5 -->
        <div class="swiper-slide box">
          <div class="box-img">
            <img src="img/FarFromHome.jpg" alt="" />
          </div>
          <h3>Spider-Man: Far From Home</h3>
          <span>120 min | Action</span>
        </div>
        <!-- Box 6 -->
        <div class="swiper-slide box">
          <div class="box-img">
            <img src="img/m6.jpg" alt="" />
          </div>
          <h3>Black Panther</h3>
          <span>120 min | Thriller</span>
        </div>
        <!-- Box 7 -->
        <div class="swiper-slide box">
          <div class="box-img">
            <img src="img/m7.jpg" alt="" />
          </div>
          <h3>Thor</h3>
          <span>120 min | Adventure</span>
        </div>
        <!-- Box 8 -->
        <div class="swiper-slide box">
          <div class="box-img">
            <img src="img/m8.png" alt="" />
          </div>
          <h3>Bumblebee</h3>
          <span>120 min | Thriller</span>
        </div>
        <!-- Box 9 -->
        <div class="swiper-slide box">
          <div class="box-img">
            <img src="img/m9.jpg" alt="" />
          </div>
          <h3>Mortal Engines</h3>
          <span>120 min | Action</span>
        </div>
        <!-- Box 10 -->
        <div class="swiper-slide box">
          <div class="box-img">
            <img src="img/m10.jpg" alt="" />
          </div>
          <h3>UnderWorld Blood Wars</h3>
          <span>120 min | Action</span>
        </div>
      </div>

    </div>
  </section>
  <!-- footer -->
  <footer>
    <div class="footer">
    </div>
    <div class="footer-box footer-left">
      <p>
      <div>
        KONTAK KAMI DI NOMOR BERIKUT:
        <br>
        <br>
        085975094397
        <br>
        <br>
      
      </div>

      </p>
    </div>

    <div class="footer-box footer-center">
      <p>
        Alamat : 
        <br>
        <br>
        Jl. PAK URIP SAPTAMARGA
        <br>
        <br> 
        <br>
        NAMA | NIM :
        <br>
        MUHAMMAD ABIANSAH | E1R021146
		
      </p>
    </div>

    <div class="footer-box footer-right">
      <p>
        SOCIAL MEDIA KAMI:
        <br>
      </p>
      <div id="footer-right-icon">
     

        <!-- Instagram -->
        <p><a href="https://www.instagram.com/bianysh/" style="text-decoration: none; color:#F8F4EA;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
        </svg>
        Bian
        </a>
      </p>
      </div>
    </div>
  </footer>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <!-- link to custom -->
  <script src="main.js"></script>
</body>

</html>
<?php
}
?>