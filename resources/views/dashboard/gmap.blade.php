@extends('layouts.master')
@section('content')
<section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading">
                Google Map with Loaction List
              </header>
              <div class="panel-body">
                <div id="gmap-list"></div>
              </div>
            </section>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading">
                Google Map with Tab Location
              </header>
              <div class="panel-body">
                <div id="controls-tabs"></div>
                <div id="info"></div>
                <div id="gmap-tabs"></div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
@endsection
@push('scripts')
    <script>
    //ul list example
    new Maplace({
      locations: LocsB,
      map_div: '#gmap-list',
      controls_type: 'list',
      controls_title: 'Choose a location:'
    }).Load();

    new Maplace({
      locations: LocsB,
      map_div: '#gmap-tabs',
      controls_div: '#controls-tabs',
      controls_type: 'list',
      controls_on_map: false,
      show_infowindow: false,
      start: 1,
      afterShow: function(index, location, marker) {
        $('#info').html(location.html);
      }
    }).Load();
  </script>
@endpush
