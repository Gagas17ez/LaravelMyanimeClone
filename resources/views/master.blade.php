<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime Forum</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('template.anime/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('template.anime/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('template.anime/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('template.anime/css/plyr.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('template.anime/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('template.anime/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('template.anime/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('template.anime/css/style.css')}}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Header Section Begin -->
    @include('master-parts.header')
    <!-- Header End -->

    <!-- Content Section Begin -->
    @include('master-parts.content')
    <!-- Content Section End -->

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer__logo">
                    <a href="./index.html"><img src="{{asset('template.anime/img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> | Edited by <a href="https://gitlab.com/dmaxz" target="_blank">Ken</a> & <a href="https://gitlab.com/GagasAmukti" target="_blank">Gagas</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

              </div>
          </div>
      </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Search model Begin -->
  <div class="search-model" >
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Some plugins/scripts -->
@include('master-parts.scripts')
<script src="{{asset('js/swal.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@stack('deletenotif')
@stack('successnotif')
@stack('tinymce')

</body>
</html>