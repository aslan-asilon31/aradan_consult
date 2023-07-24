<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Saran</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/templatemo-space-dynamic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/owl.css') }}">

    <!-- Place the Tawk script in the head section -->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {};
        Tawk_LoadStart = new Date();

        window.Tawk_API.onChatMaximized = function() {
            // Place your code here, for example, you can log the event or show a notification.
            console.log('Chat widget maximized.');
            // You can also perform any other actions you want when the chat widget is maximized.
        };

        // Function to show the Tawk chat when the button is clicked
        function showTawkChat() {
            // Check if the Tawk chat widget has already been loaded
            if (typeof Tawk_API.toggle !== "undefined") {
                    // Maximize the chat widget
                    Tawk_API.maximize();
                    // Show the chat widget
                    // Tawk_API.toggle();

                    // Set waktu obrolan selesai jika user tidak membalas chat admin dalam 10 minutes (600,000 milliseconds)
                    setTimeout(function () {
                        endTawkChatIfNoReply();
                    }, 600000);
            } else {
                // If the Tawk chat widget is not yet loaded, reload the Tawk script
                var s1 = document.createElement("script");
                var s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/648c8c8ecc26a871b022fe6f/1h32ga41a';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);

                // Add an event listener to show the chat widget after the script is loaded
                s1.addEventListener('load', function () {

                    // Maximize the chat widget
                    // Tawk_API.maximize();
                    // Show the chat widget
                    // Tawk_API.toggle();

                    // Set waktu obrolan selesai jika user tidak membalas chat admin dalam 10 minutes (600,000 milliseconds)
                    setTimeout(function () {
                    endTawkChatIfNoReply();
                    }, 600000);
                });
                    

                }
            }


            // Mengecek admin sedang online atau offline
            function checkTawkStatus() {
            // Check if the Tawk chat widget has already been loaded
            if (typeof Tawk_API.getStatus !== "undefined") {
                var pageStatus = Tawk_API.getStatus();

                if (pageStatus === 'online') {
                    // Do something for online status
                    console.log('Tawk is online.');
                } else if (pageStatus === 'away') {
                    // Do something for away status
                    console.log('Tawk is away.');
                } else {
                    // Do something for offline status
                    console.log('Tawk is offline.');
                }
            } else {
                // If the Tawk chat widget is not yet loaded, wait and check again
                setTimeout(checkTawkStatus, 100);
            }
        }

        // Call the function to check Tawk status when the widget is loaded
        window.Tawk_API.onLoad = function () {
            checkTawkStatus();
        };



        // Function to end the chat if there is no reply from admin
        function endTawkChatIfNoReply() {
            if (typeof Tawk_API.onChatMaximized !== "undefined" && typeof Tawk_API.endChat !== "undefined") {
                var chatMaximized = Tawk_API.onChatMaximized();
                if (chatMaximized) {
                    Tawk_API.endChat();
                    console.log('Chat has been ended due to no reply from admin.');
                }
            }
        }

        // Call the function to check Tawk status when the widget is loaded
        window.Tawk_API.onLoad = function () {
            checkTawkStatus();
        };




    </script>

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
                <img src="{{ asset('aradan_consult_logo.png') }}" style="width: 50px; height:50px;" alt="" srcset="">
              <h4>Aradan <span>Consult</span></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              {{-- <li class="scroll-to-section"><a href="#" class="active">Home</a></li> --}}
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row" >
        <div class="col-lg-12 ">
          <div class="row">
            <div class="col-lg-6 ">
                <div class="left-content header-text wow fadeInLeft mt-5" data-wow-duration="1s" data-wow-delay="1s">
                    <h2>Selamat datang di Aradan Consult !</h2>
                    <h3>
                        Kami berfokus pada penerimaan <span style="font-weight:bold;color:#4CAF50;">masukan</span> , <span style="font-weight:bold;color:#F44336;">kritik</span>, dan <span style="font-weight:bold;color:#2196F3;">saran</span> dari pelanggan secara real time. 
                        Kami ingin memahami masalah yang sering dialami oleh pelanggan kami untuk meningkatkan produk dan perusahaan kami. 
                    </h3>
                  </div>
                  {{-- <div class="main-red-button mt-3"><a href="#contact" onclick="showTawkChat()">Hubungi Sekarang (klik tombol ini 2x)</a></div> --}}
                  <div class="main-red-button mt-3"><a href="/register" >Hubungi Sekarang </a></div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{ asset('crm1.png') }}" alt="team meeting">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>© Copyright 2023 . 
          
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/assets/js/animation.js') }}"></script>
  <script src="{{ asset('assets/assets/js/imagesloaded.js') }}"></script>
  <script src="{{ asset('assets/assets/js/templatemo-custom.js') }}"></script>



</body>
</html>