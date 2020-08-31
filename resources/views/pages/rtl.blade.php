<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Black Dashboard') }}</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('black') }}/img/logo.png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS -->
    <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('black') }}/demo/demo.css" rel="stylesheet" />

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>

<body class=" rtl menu-on-right ">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">

          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">

          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="{{ route('home') }}">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>الصفحة الرئيسية</p>
            </a>
          </li>

          <li>
            <a href="{{ route('pages.parking') }}">
              <i class="tim-icons icon-pin"></i>
            <p> مواقف السيارات </p>
            </a>
          </li>

          <li>
            <a href="{{ route('profile.edit') }}">
              <i class="tim-icons icon-single-02"></i>
              <p>ملف تعريفي للمستخدم</p>
            </a>
          </li>
          <li>
            <a href="{{ route('home') }}">
              <i class="tim-icons icon-world"></i>
              <p>english languge</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand"  href="javascript:void(0)" style="color:black; ">الصفحة الرئيسيه</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav  mr-auto">
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="{{ asset('black') }}/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">الصفحه الشخصية</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">تسجيل الخروج</a>
                  </li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-right">
                    <h5 class="card-category">الحجوزات السنويه</h5>
                    <h2 class="card-title">أداء</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                <div id="line" style="width:100%; height:100%;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 text-right">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">الارباح</h5>
                <h3 class="card-title"><i class="tim-icons icon-money-coins text-primary"></i>
                      @foreach ($payment_amount as $payment_amount){{ $payment_amount->profit }}@endforeach
                  </h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <div id="bar" style="width:100%; height:100%;"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 text-right">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">
                حجوزات المنظمات </h5>
                <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> عدد المنشئات:
                  @foreach($panum as $panum){{ $panum->id}}@endforeach
                </h3>
                </div>
              <div class="card-body">
                <div class="chart-area">
              <div id="d" style="width:100%; height:100%;"></div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <footer class="footer">
        <div class="container-fluid">

          <div class="copyright">
            ©uparkingTeam
            <script>
              document.write(new Date().getFullYear())
            </script> made with <i class="tim-icons icon-heart-2"></i> by
            <a href="javascript:void(0)" target="_blank">Uparking Team</a>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
      <div class="dropdown show-dropdown">
          <a href="#" data-toggle="dropdown">
          <i class="fa fa-heart fa-2x"></i>
          </a>
          <ul class="dropdown-menu">
          <li class="header-title">Help</li>
          <li class="adjustments-line">
              <a href="javascript:void(0)" class="switch-trigger background-color">
              <div class="badge-colors text-center">
                  <span class="badge filter badge-primary active" data-color="primary"></span>
                  <span class="badge filter badge-info" data-color="blue"></span>
                  <span class="badge filter badge-success" data-color="green"></span>
              </div>
              <div class="clearfix"></div>
              </a>
          </li>
          <li class="button-container">
          <!--help -->

          </li>
          <li class="header-title">uparking Team </li>
          <li class="button-container text-center">
              <button id="twitter" class="btn btn-round btn-info"style="background:#000000;"><i class="fab fa-twitter"></i></button>
              <button id="facebook" class="btn btn-round btn-info" style="background:#000000;" herf="https://www.facebook.com/Uparking-team-109233290526781/" ><i class="fab fa-facebook-f"></i></button>
              <br>
              <br>
          </li>
          </ul>
      </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('black') }}/js/core/jquery.min.js"></script>
  <script src="{{ asset('black') }}/js/core/popper.min.js"></script>
  <script src="{{ asset('black') }}/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('black') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('black') }}/js/black-dashboard.min.js?v=1.0.0"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('black') }}/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
    <script>
          $(document).ready(function() {
            demo.initDashboardPageCharts();
          });
      </script>
      <!--chart 1-->
      <script>
      Morris.Bar({
        element: 'd',
        data: [
          @foreach($parking as $parking)
            {
          y:"{{ $parking->parking_name }}", sum:"{{$parking->pid}}"
            },
          @endforeach
        ],
        xkey: 'y',
        ykeys: ['sum'],
        labels: ['موقف السيارات'],
        barColors: ['#b30000'],
        resize: true,
      });
      </script>
  <!--chart 2-->
  <script>
  Morris.Line({
    element: 'line',
    data: [
      @foreach($user_account as $user_account)
        {
      y:"{{ $user_account->year}}", sum:"{{$user_account->sum}}"
        },
      @endforeach
    ],
    xkey: 'y',
    ykeys: ['sum'],
    labels: ['الحجز: '],
    lineColors: ['#b30000'],
    pointFillColors: ['#ffffff'],
    resize: true,
    smooth: true
  });
  </script>
  <!--chart 3-->
  <script>
  Morris.Bar({
    element: 'bar',
    data: [
      @foreach($payment_chart as $payment_chart)
        {
      y:"{{ $payment_chart->yearpay }}", sum:"{{$payment_chart->total}}"
        },
      @endforeach
    ],
    xkey: 'y',
    ykeys: ['sum'],
    labels: ['ارباح'],
    barColors: ['#b30000'],
    resize: true,
  });
  </script>

</body>

</html>
