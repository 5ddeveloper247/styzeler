
<div class="preloader flex-column justify-content-center align-items-center">
	<img class="animation__shake" src="{{ asset('assets_admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
</div>
  
@if(isset($page) && $page == 'login')
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.login') }}" class="brand-link">
    	<img src="{{ asset('assets_admin/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    	<span class="brand-text font-weight-light">Styzeler</span>
    </a>
</aside>

@else
<nav
	class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button">
				<i class="fas fa-bars"></i>
			</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="{{route('admin.login')}}" class="nav-link">Logout</a>
		</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link" data-widget="fullscreen" href="#" role="button"> 
				<i class="fas fa-expand-arrows-alt"></i>
			</a>
		</li>
		
	</ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{ route('admin.login') }}" class="brand-link"> 
		<img src="{{ asset('assets_admin/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> 
		<span class="brand-text font-weight-light">Styzeler</span>

	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				

				<!-- Freelancers -->
				<li class="nav-item {{(isset($page) && in_array($page, ['dashboard','wedding-stylist','see-details','cv','hairStylist','beautician','barber','hairdressingOwner','beautySalonOwner','client'])) ? 'menu-open' : ''}}">
					<a href="#" class="nav-link"> 
						<i class="nav-icon far fa-envelope"></i>
						<p>Users <i class="fas fa-angle-left right"></i> </p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item"><a href="{{ route('admin.weddingStylist') }}"
							class="nav-link"> <i class="far fa-circle nav-icon"></i>
								<p>Wedding Stylist</p>
						</a></li>
						<li class="nav-item"><a href="{{route('admin.hairstylist')}}"
							class="nav-link"> <i class="far fa-circle nav-icon"></i>
								<p>Hairstylist</p>
						</a></li>
						<li class="nav-item"><a href="{{route('admin.beautician')}}"
							class="nav-link"> <i class="far fa-circle nav-icon"></i>
								<p>Beautician</p>
						</a></li>
						<li class="nav-item"><a href="{{route('admin.barber')}}"
							class="nav-link"> <i class="far fa-circle nav-icon"></i>
								<p>Barber</p>
						</a></li>
						<li class="nav-item"><a href="{{route('admin.hairdressingOwner')}}"
							class="nav-link"> <i class="far fa-circle nav-icon"></i>
								<p>Hairdressing Owner</p>
						</a></li>
						<li class="nav-item"><a href="{{route('admin.beautySalonOwner')}}"
							class="nav-link"> <i class="far fa-circle nav-icon"></i>
								<p>Beauty Salon Owner</p>
						</a></li>
						<li class="nav-item"><a href="{{route('admin.client')}}"
							class="nav-link"> <i class="far fa-circle nav-icon"></i>
								<p>Client</p>
						</a></li>
					</ul>
				</li>

				<!-- bookings  -->
				<li class="nav-item {{(isset($page) && $page == 'bookings') ? 'menu-open' : ''}}">
					<a href="#" class="nav-link"> 
						<i class="nav-icon far fa-envelope"></i>
						<p>Bookings <i class="fas fa-angle-left right"></i> </p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('admin.bookings')}}" class="nav-link"> 
								<i class="far fa-circle nav-icon"></i>
								<p>View Bookings</p>
							</a>
						</li>
					</ul>
				</li>

				<!-- Jobs and Blogs  -->
				<li class="nav-item  {{(isset($page) && in_array($page, ['jobRequests','uploadJobs'])) ? 'menu-open' : ''}}"">
					<a href="#" class="nav-link"> 
						<i class="nav-icon far fa-envelope"></i>
						<p>Upload Jobs and Blogs <i class="fas fa-angle-left right"></i> </p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('admin.jobRequests')}}" class="nav-link"> 
								<i class="far fa-circle nav-icon"></i>
								<p>Upload Requests</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.uploadJobs')}}" class="nav-link"> 
								<i class="far fa-circle nav-icon"></i>
								<p>Upload Jobs</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/upload-blogs.html" class="nav-link"> 
								<i class="far fa-circle nav-icon"></i>
								<p>Upload Blogs</p>
							</a>
						</li>
					</ul>
				</li>

				<!-- Chair -->
				<li class="nav-item"><a href="#" class="nav-link"> <i
						class="nav-icon far fa-envelope"></i>
						<p>
							Salon Chair <i class="fas fa-angle-left right"></i>
						</p>
				</a>
					<ul class="nav nav-treeview">
						<li class="nav-item"><a href="pages/hairstylist-chair.html"
							class="nav-link"> <i class="far fa-circle nav-icon"></i>
								<p>Hairstylist Chair</p>
						</a></li>
						<li class="nav-item"><a href="pages/barber-chair.html"
							class="nav-link"> <i class="far fa-circle nav-icon"></i>
								<p>Barber Chair</p>
						</a></li>
						<li class="nav-item"><a href="pages/beauty-chair.html"
							class="nav-link"> <i class="far fa-circle nav-icon"></i>
								<p>Beauty Therapist Chair</p>
						</a></li>
					</ul></li>

				<!-- job applicants -->
				<li class="nav-item"><a href="#" class="nav-link"> <i
						class="nav-icon far fa-envelope"></i>
						<p>
							Job Applicants <i class="fas fa-angle-left right"></i>
						</p>
				</a>
					<ul class="nav nav-treeview">
						<li class="nav-item"><a href="pages/job-applicants.html"
							class="nav-link"> <i class="far fa-circle nav-icon"></i>
								<p>View Applicants</p>
						</a></li>

					</ul></li>

				<!-- Enquiry -->
				<li class="nav-item"><a href="#" class="nav-link"> <i
						class="nav-icon far fa-envelope"></i>
						<p>
							Email enquiry <i class="fas fa-angle-left right"></i>
						</p>
				</a>
					<ul class="nav nav-treeview">
						<li class="nav-item"><a href="pages/email-enquiry.html"
							class="nav-link"> <i class="far fa-circle nav-icon"></i>
								<p>Email enquiry</p>
						</a></li>

					</ul></li>
				
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

		@endif