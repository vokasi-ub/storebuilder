<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>STORE BUILDER ADMIN </title>

  {{-- CSRF TOKEN --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Datatables --> 
  <link href="{{ asset ('assets/admin/lib/advanced-datatable/css/demo_page.css') }}" rel="stylesheet" />
  <link href="{{ asset ('assets/admin/lib/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset ('assets/admin/lib/advanced-datatable/css/DT_bootstrap.css') }}" />
	<link href="{{ asset('assets/admin/vendor/datatables/datatables.min.css') }}" rel="stylesheet">
  <!-- Favicons -->
  <link href="{{ asset ('assets/admin/img/favicon.png') }}" rel="icon">
  <link href="{{ asset ('assets/admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset ('assets/admin/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset ('assets/admin/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset ('assets/admin/css/zabuto_calendar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset ('assets/admin/lib/gritter/css/jquery.gritter.css') }}" />
  <!-- Custom styles for this template -->
  <link href="{{ asset ('assets/admin/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset ('assets/admin/css/style-responsive.css') }}" rel="stylesheet">
  <script src="{{ asset ('assets/admin/lib/chart-master/Chart.js') }}"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->

  @stack('styles')

</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      @include('layouts.header')
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      @include('layouts.sidebar')
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
			@yield('content')
      @yield('datasupplier')
      @yield('datakategori')
    </section>
    <!--main content end-->
      @include('layouts._modal')
    <!--footer start-->
    <footer class="site-footer">
      @include('layouts.footer')
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{ asset ('assets/admin/lib/jquery/jquery.min.js') }}"></script>

  <script src="{{ asset ('assets/admin/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script class="include" type="text/javascript" src="{{ asset ('assets/admin/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
  <script src="{{ asset ('assets/admin/lib/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset ('assets/admin/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <script src="{{ asset ('assets/admin/lib/jquery.sparkline.js') }}"></script>
  <!--common script for all pages-->
  <script src="{{ asset ('assets/admin/lib/common-scripts.js') }}"></script>
  <script type="text/javascript" src="{{ asset ('assets/admin/lib/gritter/js/jquery.gritter.js') }}"></script>
  <script type="text/javascript" src="{{ asset ('assets/admin/lib/gritter-conf.js') }} "></script>
  <!--script for this page-->
  <script src="{{ asset ('assets/admin/lib/sparkline-chart.js') }}"></script>
  <script src="{{ asset ('assets/admin/lib/zabuto_calendar.js') }}"></script>

  

	<!-- Datatables -->
	
	<script type="text/javascript" language="javascript" src="{{ asset ('assets/admin/lib/advanced-datatable/js/jquery.dataTables.js') }}"></script>
  <script type="text/javascript" src="{{ asset ('assets/admin/lib/advanced-datatable/js/DT_bootstrap.js') }}"></script>
	<script src="{{ asset('assets/admin/lib/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/admin/lib/jquery.dataTables.bootstrap.min.js') }}"></script>
  
  {{-- Validator --}}
  <script src="{{ asset('assets/admin/validator/validator.min.js') }}"></script>

	<script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Dashio!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: 'img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }

    
	</script>
	<script src="{{ asset('js/app.js') }}"></script>


    <!-- Sweetalert2 -->
  <script src="{{ asset('assets/admin/vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

  @stack('scripts')

</body>

</html>
