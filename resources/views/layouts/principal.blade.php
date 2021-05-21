<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistema - @yield('title','Sistema')</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="HeitorSoares" />
    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="{{asset('jqueryui/jquery-ui.min.css')}}">

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="../../../assets/js/vendor-all.min.js"></script>
    <script src="{{asset('jqueryui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <!-- Favicon icon -->
    {{-- <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> --}}
    <!-- vendor css -->
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../../materialize/css/meumaterialize.css">
</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >

				<div class="">
					<div class="main-menu-header">
                        {{-- {{ Auth::user()->profile_photo_url }} --}}

						<img class="img-radius" src="{{ Auth::user()->profile_photo_url }}" alt="Foto {{ Auth::user()->name }}">
						<div class="user-details">
							<div id="more-details">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="{{ route('profile.show') }}"><i class="feather icon-user m-r-5"></i>Ver Perfil</a></li>
							{{-- <li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li> --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                   <i class="feather icon-log-out m-r-5"></i>Logout
                                </x-jet-dropdown-link>
                            </form>

						</ul>
					</div>
				</div>

				@include('includes.menu')

			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">


				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						{{-- <img src="assets/images/logo.png" alt="" class="logo"> --}}
						{{-- <img src="assets/images/logo-icon.png" alt="" class="logo-thumb"> --}}
					</a>
					<a href="" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
							<div class="search-bar">
								<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
								<button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav ml-auto">

                        <!-- NOTIFICAÇÃO -->

						{{-- <li>
							<div class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
								<div class="dropdown-menu dropdown-menu-right notification">
									<div class="noti-head">
										<h6 class="d-inline-block m-b-0">Notifications</h6>
										<div class="float-right">
											<a href="#!" class="m-r-10">mark as read</a>
											<a href="#!">clear all</a>
										</div>
									</div>
									<ul class="noti-body">
										<li class="n-title">
											<p class="m-b-0">NEW</p>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Soeng Souy</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
													<p>New ticket Added</p>
												</div>
											</div>
										</li>
										<li class="n-title">
											<p class="m-b-0">EARLIER</p>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
													<p>Prchace New Theme and make payment</p>
												</div>
											</div>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
													<p>currently login</p>
												</div>
											</div>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
													<p>Prchace New Theme and make payment</p>
												</div>
											</div>
										</li>
									</ul>
									<div class="noti-footer">
										<a href="#!">show all</a>
									</div>
								</div>
							</div>
						</li> --}}
						<li>
							<div class="">
								<a href="#" class="dud-logout" title="Logout">

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            <i class="feather icon-log-out"></i>
                                        </x-jet-dropdown-link>
                                    </form>
                                </a>

							</div>
						</li>
					</ul>
				</div>


	</header>
	<!-- [ Header ] end -->



<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">@yield('NomePagina')</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@yield('BreadcrumbNome')</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            @yield('content')
        </div>
	 <!-- Page Content -->


        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- Required Js -->

{{-- <script src="../../../assets/js/vendor-all.min.js"></script> --}}
<script src="../../../../assets/js/plugins/bootstrap.min.js"></script>
<script src="../../../assets/js/ripple.js"></script>
<script src="../../../../assets/js/pcoded.min.js"></script>
<!-- Apex Chart -->
{{-- <script src="../../../assets/js/plugins/apexcharts.min.js"></script> --}}

<!-- custom-chart js -->
{{-- <script src="../../assets/js/pages/dashboard-main.js"></script> --}}

{{-- <script type="text/javascript">
    $(document).ready(function () {
        $('select').formSelect();
    });
    $(document).on('change','#check', function (e) {
        if($(this).is(':checked'))
        {
            console.log('1');
        }else{
            console.log('0');
        }
    })
</script> --}}


 <!-- Script -->
 <script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#employee_search" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"{{route('employees.getEmployees')}}",
            type: 'post',
            dataType: "json",
            data: {
               _token: CSRF_TOKEN,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           // Set selection
           $('#employee_search').val(ui.item.label); // display the selected text
           $('#cidade_id').val(ui.item.value); // save selected id to input
           return false;
        }
      });

    });
    </script>

</body>

</html>
