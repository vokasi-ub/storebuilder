<div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="{{asset('assets/admin/img/ui-sam.jpg') }}" class="img-circle" width="80"></a></p>
          <h5 class="centered">Sam Soffes</h5>
          <li class="mt">
            <a class="active" href="{{ route('home') }}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li>
            <a href="index.html">
              <i class="fa fa-book"></i>
              <span>Calender</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Data Barang</span>
              </a>
            <ul class="sub">
              <li><a href="{{ route('data.supplierbarang') }}">Data Supplier</a></li>
              <li><a href="{{ route('data.kategoribarang') }}">Data Kategori</a></li>
              <li><a href="{{ route('data.barang') }}">Data Barang</a></li>
              <li><a href="{{ route('data.supplaibarang') }}">Data Supplai Barang</a></li>
              <li><a href="{{ route('data.transaksibarang') }}">Data Transaksi Barang</a></li>
            </ul>
          </li>
          <li>
            <a href="{{route ('chart.index')}}">
              <i class="fa fa-bar-chart-o"></i>
              <span>Charts</span>
              </a>
          </li>
          <li>
            <a href="{{route ('gmap.index')}}">
              <i class="fa fa-map-marker"></i>
              <span>Google Maps </span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>