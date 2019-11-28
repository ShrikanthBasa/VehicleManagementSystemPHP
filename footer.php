
  <link rel="stylesheet" href="cs/swiper.min.css">

  <style>
    html, body {
      position: relative;
      height: 100%;
    }
    .swiper-container {
      width: 100%;
      height: 350px;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #F0F0F0;
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
    .footer {
      left: 0;
      bottom: 0;
      width: 100%;
      height: 40px;
      background-color: #283843;
      color: white;
      text-align: center;
    }
  </style>
</head>
<body>
  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <center>
          <h2>Welcome To</h2>
          <h1>Vehicle Mangement System</h1>
        </center>
      </div>
      <div class="swiper-slide">
        <center>
        <h2>Features</h2>
        <h1>Dynamic Web Pages</h1>
        </center>
      </div>
      <div class="swiper-slide">
        <center>
        <h2>Features</h2>
        <h1>Driver Management</h1>
        </center>
      </div>
      <div class="swiper-slide">
        <center>
        <h2>Features</h2>
        <h1>Vehicles Management</h1>
        </center>
      </div>
      <div class="swiper-slide">
        <center>
        <h2>Features</h2>
        <h1>Customer Ratings</h1>
        </center>
      </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

  <footer class="page-footer font-small" style="background-color:#283843;color:white">
    <div class="footer-copyright text-center py-3">
      Developed By Shrikanth Basa © 2019 Copyright:
    </div>
  </footer>
  <!-- Swiper JS -->
  <script src="cs/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
</body>
</html>
