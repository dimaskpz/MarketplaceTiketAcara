<!-- <a class="w3-bar-item w3-padding"></a>
<p></p>
<h9>    Event Dashboard</h9> -->
<a href="" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>    @yield('nama_acara')</a>
<a href="{{ route('Event.Penjualan','id'=> $acara->id) }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>    Laporan Penjualan</a>
<a href="{{ route('Event.Pemesan','id'=> $acara->id) }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>    Data Pemesan</a>
<a href="{{ route('Event.Checkin','id'=> $acara->id) }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>    Check in</a>
<a href="{{ route('Event.Sales','id'=> $acara->id) }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>    Sales</a>
