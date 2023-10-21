@extends('layouts.master.admin_template.master')

@push('css')
    <style>
        div.scrollmenu {
            overflow: auto;
            white-space: nowrap;
        }

        div.scrollmenu div {
            display: inline-block;
            width: 200px;
            text-align: left;

        }

        div.scrollmenu div p {

            text-align: left;

        }

        .navColor .nav-link {
            /* color : black; */
            font-size: 24px;
        }

        .booking-box .row,
        .booking-box .col-4,
        .booking-box .col-8 {
            border: 1px solid #c9b9b0;
            padding: 5px;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 id="reg_mode_heading"></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" id="reg_mode">View Bookings</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section>
            <ul class="row nav nav-tabs text-center  navColor" id="myTab" role="tablist" style="width: 100%;">
                <!-- justify-content-center -->
                {{-- <li class="col-lg-3 nav-item ">
				<a class="nav-link active" href="#panel0" data-toggle="tab"> Pending Bookings </a>
			</li> --}}
                <li class="col-lg-3 nav-item">
                    <a class="nav-link active" href="#panel1" data-toggle="tab"> Owner Bookings </a>
                </li>
                {{-- <li class="col-lg-3 nav-item">
				<a class="nav-link" href="#panel2" data-toggle="tab"> On Hold Bookings </a>
			</li>
			<li class="col-lg-3 nav-item">
				<a class="nav-link" href="#panel3" data-toggle="tab"> Cancelled Bookings </a>
			</li> --}}
            </ul>
            <div class="tab-content ">
                {{-- <div id="panel0" class="tab-pane active">
				<div class="container">
					<h2 class="color-1 my-4 text-center">All Pending Bookings</h2>
					<div class="row justify-content-center">
						<div class="booking-box col-lg-8">
							<div class="row text-center">
								<div class="col-4">
									<h4 class="month-of-year">Date</h4>
								</div>
								<div class="col-8">
									<h4 class="year">Booking Details</h4>
								</div>
							</div>
							<div class="row pending-appointment p-3 text-left">
								<div class="col-4">
									<span>
										<div>
											<a onclick="showToggle(1);">
												<p style="cursor: pointer;">
													<strong>Date: </strong> 21-12-2021&nbsp;&nbsp;
													<i class="fa fa-eye" aria-hidden="true"></i>
												</p>
											</a>
										</div>
									</span>
								</div>
								<div class="col-8">
									<div>
										<span style="overflow-wrap: break-word;">
											<p><strong>Business Owner: </strong>Nik Hudson</p>
											<div>
												<p><strong>Freelancer Name: </strong> carlo Berardinucci</p>
											</div>
										</span>
										<div id="toggle1" style="display: none;">
											<div>
												<p style="overflow-wrap: break-word;"> <strong>Freelancer Category: </strong> Hairstylist</p> 
											</div>
											<div>
												<p style="overflow-wrap: break-word;"> <strong>Freelancer Email: </strong> carlo_berardinucci@yahoo.co.uk </p> 
											</div>
											<div>
												<p style="overflow-wrap: break-word;"><strong>Freelancer Mobile: </strong> 07830536184</p> 
											</div>
											<div>
												<p style="overflow-wrap: break-word;"><strong>Salon Category: </strong> Hairdressing Owner</p> 
											</div>
											<div>
												<p style="overflow-wrap: break-word;"><strong>Salon Email: </strong> scar_lostesting@yahoo.co.uk</p> 
											</div>
											<div>
												<p style="overflow-wrap: break-word;"><strong>Salon Mobile: </strong> 02075663979</p> 
											</div>
											<div>
												<p style="overflow-wrap: break-word;"><strong>Booking Status: </strong> CONFIRMED</p> 
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> --}}
                <div id="panel1" class="tab-pane active">
                    <div class="container">
                        <h2 class="color-1 my-4 text-center">All Owner Bookings</h2>
                        <div class="row justify-content-center">
                            <div class="booking-box col-lg-8">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <h4 class="month-of-year">Date</h4>
                                    </div>
                                    <div class="col-8">
                                        <h4 class="year">Booking Details</h4>
                                    </div>
                                </div>
                                <div class="row confirm-appointment p-3 text-left">
                                    @if (@count($appointments))
                                        @forelse ($appointments as $row)
                                            {{-- @dd($row) --}}
                                            @php
                                                $creationDate = date('d-M-Y', strtotime(@$row->created_at));
                                                $bookDate = date('d-M-Y', strtotime(@$row->booking_date));
                                                // $bookStime = date('h:i A', strtotime(@$row['userBookingSlots']->start_time));
                                                // $bookEtime = date('h:i A', strtotime(@$row['userBookingSlots']->end_time));
                                            @endphp

                                            <div class="col-4">
                                                <span>
                                                    <div>
                                                        <a onclick="showToggle({{ $row->id }});">
                                                            <p style="cursor: pointer;">
                                                                <strong>Date: </strong> {{ @$creationDate }}&nbsp;&nbsp;
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                            </p>
                                                            <p style="cursor: pointer;">
                                                                <strong>Book Date: </strong> {{ @$bookDate }}
                                                            </p>
                                                            <p style="cursor: pointer;">
                                                                <strong>Slot Time: </strong>
                                                                {{ $row->booking_time }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="col-8">
                                                <div>
                                                    <span style="overflow-wrap: break-word;">
                                                        <p><strong>Owner Name: </strong>{{ @$row['adminClientUser']->name }}
                                                            {{ @$row['adminClientUser']->surname }}</p>
                                                        <div>
                                                            <p><strong>Freelancer Name:
                                                                </strong>{{ @$row['freelancerAppUser']->name }}
                                                                {{ @$row['freelancerAppUser']->surname }}
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <p style="overflow-wrap: break-word;"> <strong>Freelancer
                                                                    Category: </strong>
                                                                {{ @$row['freelancerAppUser']->type }}
                                                            </p>
                                                        </div>
                                                    </span>
                                                    <div id="toggle{{ $row->id }}" style="display: none;">

                                                        <div>
                                                            <p style="overflow-wrap: break-word;"> <strong>Freelancer Email:
                                                                </strong>
                                                                {{ @$row['freelancerAppUser']->email }}
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <p style="overflow-wrap: break-word;"><strong>Freelancer Mobile:
                                                                </strong>
                                                                {{ @$row['freelancerAppUser']->phone }}
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <p style="overflow-wrap: break-word;"><strong>Owner Category:
                                                                </strong> {{ @$row['adminClientUser']->type }}</p>
                                                        </div>
                                                        <div>
                                                            <p style="overflow-wrap: break-word;"><strong>Owner Email:
                                                                </strong> {{ @$row['adminClientUser']->email }}</p>
                                                        </div>
                                                        <div>
                                                            <p style="overflow-wrap: break-word;"><strong>Owner Mobile:
                                                                </strong> {{ @$row['adminClientUser']->phone }}</p>
                                                        </div>
                                                        <div>
                                                            <p style="overflow-wrap: break-word;"><strong>Booking Status:
                                                                </strong>
                                                                Booked</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p>No Bookings Found!</p>
                                        @endforelse
                                        {{-- @else
                                        <p class="text-center">No Bookings Found!</p> --}}
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <!-- 			<div id="panel2" class="tab-pane"> -->
                <!-- 				<div class="container"> -->
                <!-- 					<h2 class="color-1 my-4 text-center">All On Hold Bookings</h2> -->
                <!-- 					<div class="row justify-content-center"> -->
                <!-- 						<div class="booking-box col-lg-8"> -->
                <!-- 							<div class="row text-center"> -->
                <!-- 								<div class="col-4"> -->
                <!-- 									<h4 class="month-of-year">Date</h4> -->
                <!-- 								</div> -->
                <!-- 								<div class="col-8"> -->
                <!-- 									<h4 class="year">Booking Details</h4> -->
                <!-- 								</div> -->
                <!-- 							</div> -->
                <!-- 							<div class="row onHold-appointment p-3 text-left"> -->
                <!-- 								<div class="col-4"> -->
                <!-- 									<span> -->
                <!-- 										<div> -->
                <a onclick="showToggle(3);">
                    <p style="cursor: pointer;">
                        <!-- 													<strong>Date: </strong> 21-12-2021&nbsp;&nbsp; -->
                        <!-- 													<i class="fa fa-eye" aria-hidden="true"></i> -->
                        <!-- 												</p> -->
                        <!-- 											</a> -->
                        <!-- 										</div> -->
                        <!-- 									</span> -->
                        <!-- 								</div> -->
                        <!-- 								<div class="col-8"> -->
                        <!-- 									<div> -->
                        <span style="overflow-wrap: break-word;">
                            <!-- 											<p><strong>Business Owner: </strong>Nik Hudson</p> -->
                            <!-- 											<div> -->
                            <!-- 												<p><strong>Freelancer Name: </strong> carlo Berardinucci</p> -->
                            <!-- 											</div> -->
                            <!-- 										</span> -->
                            <div id="toggle3" style="display: none;">
                                <!-- 											<div> -->
                                <p style="overflow-wrap: break-word;"> <strong>Freelancer Category: </strong> Hairstylist
                                </p>
                                <!-- 											</div> -->
                                <!-- 											<div> -->
                                <p style="overflow-wrap: break-word;"> <strong>Freelancer Email: </strong>
                                    carlo_berardinucci@yahoo.co.uk </p>
                                <!-- 											</div> -->
                                <!-- 											<div> -->
                                <p style="overflow-wrap: break-word;"><strong>Freelancer Mobile: </strong> 07830536184</p>
                                <!-- 											</div> -->
                                <!-- 											<div> -->
                                <p style="overflow-wrap: break-word;"><strong>Salon Category: </strong> Hairdressing Owner
                                </p>
                                <!-- 											</div> -->
                                <!-- 											<div> -->
                                <p style="overflow-wrap: break-word;"><strong>Salon Email: </strong>
                                    scar_lostesting@yahoo.co.uk</p>
                                <!-- 											</div> -->
                                <!-- 											<div> -->
                                <p style="overflow-wrap: break-word;"><strong>Salon Mobile: </strong> 02075663979</p>
                                <!-- 											</div> -->
                                <!-- 											<div> -->
                                <p style="overflow-wrap: break-word;"><strong>Booking Status: </strong> CONFIRMED</p>
                                <!-- 											</div> -->
                                <!-- 										</div> -->
                                <!-- 									</div> -->
                                <!-- 								</div> -->
                                <!-- 							</div> -->
                                <!-- 						</div> -->
                                <!-- 					</div> -->
                                <!-- 				</div> -->
                                <!-- 			</div> -->
                                <!-- 			<div id="panel3" class="tab-pane"> -->
                                <!-- 				<div class="container"> -->
                                <!-- 					<h2 class="color-1 my-4 text-center">All Cancelled Bookings</h2> -->
                                <!-- 					<div class="row justify-content-center"> -->
                                <!-- 						<div class="booking-box col-lg-8"> -->
                                <!-- 							<div class="row text-center"> -->
                                <!-- 								<div class="col-4"> -->
                                <!-- 									<h4 class="month-of-year">Date</h4> -->
                                <!-- 								</div> -->
                                <!-- 								<div class="col-8"> -->
                                <!-- 									<h4 class="year">Booking Details</h4> -->
                                <!-- 								</div> -->
                                <!-- 							</div> -->
                                <!-- 							<div class="row cancel-appointment p-3 text-left"> -->
                                <!-- 								<div class="col-4"> -->
                                <!-- 									<span> -->
                                <!-- 										<div> -->
                                <a onclick="showToggle(4);">
                                    <p style="cursor: pointer;">
                                        <!-- 													<strong>Date: </strong> 21-12-2021&nbsp;&nbsp; -->
                                        <!-- 													<i class="fa fa-eye" aria-hidden="true"></i> -->
                                        <!-- 												</p> -->
                                        <!-- 											</a> -->
                                        <!-- 										</div> -->
                                        <!-- 									</span> -->
                                        <!-- 								</div> -->
                                        <!-- 								<div class="col-8"> -->
                                        <!-- 									<div> -->
                                        <span style="overflow-wrap: break-word;">
                                            <!-- 											<p><strong>Business Owner: </strong>Nik Hudson</p> -->
                                            <!-- 											<div> -->
                                            <!-- 												<p><strong>Freelancer Name: </strong> carlo Berardinucci</p> -->
                                            <!-- 											</div> -->
                                            <!-- 										</span> -->
                                            <div id="toggle4" style="display: none;">
                                                <!-- 											<div> -->
                                                <p style="overflow-wrap: break-word;"> <strong>Freelancer Category:
                                                    </strong> Hairstylist</p>
                                                <!-- 											</div> -->
                                                <!-- 											<div> -->
                                                <p style="overflow-wrap: break-word;"> <strong>Freelancer Email: </strong>
                                                    carlo_berardinucci@yahoo.co.uk </p>
                                                <!-- 											</div> -->
                                                <!-- 											<div> -->
                                                <p style="overflow-wrap: break-word;"><strong>Freelancer Mobile: </strong>
                                                    07830536184</p>
                                                <!-- 											</div> -->
                                                <!-- 											<div> -->
                                                <p style="overflow-wrap: break-word;"><strong>Salon Category: </strong>
                                                    Hairdressing Owner</p>
                                                <!-- 											</div> -->
                                                <!-- 											<div> -->
                                                <p style="overflow-wrap: break-word;"><strong>Salon Email: </strong>
                                                    scar_lostesting@yahoo.co.uk</p>
                                                <!-- 											</div> -->
                                                <!-- 											<div> -->
                                                <p style="overflow-wrap: break-word;"><strong>Salon Mobile: </strong>
                                                    02075663979</p>
                                                <!-- 											</div> -->
                                                <!-- 											<div> -->
                                                <p style="overflow-wrap: break-word;"><strong>Booking Status: </strong>
                                                    CONFIRMED</p>
                                                <!-- 											</div> -->
                                                <!-- 										</div> -->
                                                <!-- 									</div> -->
                                                <!-- 								</div> -->
                                                <!-- 								<div class="col-4"> -->
                                                <!-- 									<span> -->
                                                <!-- 										<div> -->
                                                <a onclick="showToggle(44);">
                                                    <p style="cursor: pointer;">
                                                        <!-- 													<strong>Date: </strong> 21-12-2021&nbsp;&nbsp; -->
                                                        <!-- 													<i class="fa fa-eye" aria-hidden="true"></i> -->
                                                        <!-- 												</p> -->
                                                        <!-- 											</a> -->
                                                        <!-- 										</div> -->
                                                        <!-- 									</span> -->
                                                        <!-- 								</div> -->
                                                        <!-- 								<div class="col-8"> -->
                                                        <!-- 									<div> -->
                                                        <span style="overflow-wrap: break-word;">
                                                            <!-- 											<p><strong>Business Owner: </strong>Nik Hudson</p> -->
                                                            <!-- 											<div> -->
                                                            <!-- 												<p><strong>Freelancer Name: </strong> carlo Berardinucci</p> -->
                                                            <!-- 											</div> -->
                                                            <!-- 										</span> -->
                                                            <div id="toggle44" style="display: none;">
                                                                <!-- 											<div> -->
                                                                <p style="overflow-wrap: break-word;"> <strong>Freelancer
                                                                        Category: </strong> Hairstylist</p>
                                                                <!-- 											</div> -->
                                                                <!-- 											<div> -->
                                                                <p style="overflow-wrap: break-word;"> <strong>Freelancer
                                                                        Email: </strong> carlo_berardinucci@yahoo.co.uk </p>
                                                                <!-- 											</div> -->
                                                                <!-- 											<div> -->
                                                                <p style="overflow-wrap: break-word;"><strong>Freelancer
                                                                        Mobile: </strong> 07830536184</p>
                                                                <!-- 											</div> -->
                                                                <!-- 											<div> -->
                                                                <p style="overflow-wrap: break-word;"><strong>Salon
                                                                        Category: </strong> Hairdressing Owner</p>
                                                                <!-- 											</div> -->
                                                                <!-- 											<div> -->
                                                                <p style="overflow-wrap: break-word;"><strong>Salon Email:
                                                                    </strong> scar_lostesting@yahoo.co.uk</p>
                                                                <!-- 											</div> -->
                                                                <!-- 											<div> -->
                                                                <p style="overflow-wrap: break-word;"><strong>Salon Mobile:
                                                                    </strong> 02075663979</p>
                                                                <!-- 											</div> -->
                                                                <!-- 											<div> -->
                                                                <p style="overflow-wrap: break-word;"><strong>Booking
                                                                        Status: </strong> CONFIRMED</p>
                                                                <!-- 											</div> -->
                                                                <!-- 										</div> -->
                                                                <!-- 									</div> -->
                                                                <!-- 								</div> -->
                                                                <!-- 							</div> -->
                                                                <!-- 						</div> -->
                                                                <!-- 					</div> -->
                                                                <!-- 				</div> -->
                                                                <!-- 			</div> -->
                                                            </div> --}}
        </section>

        <!-- /.content -->
    </div>
@endsection

@push('script')
    <script src="{{ asset('customjs/web/register/common.js') }}?v={{ time() }}"></script>
    <script>
        function showToggle(id) {
            $("#toggle" + id).toggle();

        }
    </script>
@endpush
