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
    {{-- @dd($data['appointments']) --}}
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
            <ul class="row nav nav-tabs navColor text-center" id="myTab" role="tablist" style="width: 100%;">
                <!-- justify-content-center -->
                <li class="col-lg-3 nav-item">
                    <a class="nav-link active" href="#panel0" data-toggle="tab"> Pending Bookings </a>
                </li>
                <li class="col-lg-3 nav-item">
                    <a class="nav-link" href="#panel1" data-toggle="tab"> On Hold Bookings </a>
                </li>
                <li class="col-lg-3 nav-item">
                    <a class="nav-link" href="#panel2" data-toggle="tab"> Confirmed Bookings </a>
                </li>
                <li class="col-lg-3 nav-item">
                    <a class="nav-link" href="#panel3" data-toggle="tab"> Cancelled Bookings </a>
                </li>
            </ul>
            <div class="tab-content">

                <div id="panel0" class="tab-pane active">
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
                                {{-- @dd($appointments) --}}
                                <div class="row confirm-appointment p-3 text-left" id="pending">
                                    @if (@count($appointments))
                                        @forelse ($appointments as $row)
                                            {{-- @dd($row) --}}
                                            @if (
                                                !empty($row) &&
                                                    (empty($row->status) || is_null($row->status)) &&
                                                    (!empty($row->userBookingSlots->status) && str_contains(strtolower($row->userBookingSlots->status), 'pending')))
                                                @php
                                                    $creationDate = date('d-M-Y', strtotime(@$row->created_at));
                                                    $bookDate = date('d-M-Y', strtotime(@$row->booking_date));
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
                                                            <p><strong>Owner Name:
                                                                </strong>{{ @$row['adminClientUser']->name }}
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
                                                                <p style="overflow-wrap: break-word;"> <strong>Freelancer
                                                                        Email:
                                                                    </strong>
                                                                    {{ @$row['freelancerAppUser']->email }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <p style="overflow-wrap: break-word;"><strong>Freelancer
                                                                        Mobile:
                                                                    </strong>
                                                                    {{ @$row['freelancerAppUser']->phone }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <p style="overflow-wrap: break-word;"><strong>Owner
                                                                        Category:
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
                                                                <p style="overflow-wrap: break-word;"><strong>Booking
                                                                        Status:
                                                                    </strong>
                                                                    {{ @$row['userBookingSlots']->status }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
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

                <div id="panel1" class="tab-pane">
                    <div class="container">
                        <h2 class="color-1 my-4 text-center">All On Hold Bookings</h2>
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
                                <div class="row confirm-appointment p-3 text-left" id="on_hold">
                                    @if (@count($appointments))
                                        @forelse ($appointments as $row)
                                            {{-- @dd($row) --}}
                                            @if (empty($row->status) &&
                                                    empty($row->confirmed_by) &&
                                                    !empty($row->userBookingSlots->status) &&
                                                    (str_contains(strtolower($row->userBookingSlots->status), 'on hold by') ||
                                                        str_contains(strtolower($row->userBookingSlots->status), 'confirmed by freelancer')))
                                                @php
                                                    $creationDate = date('d-M-Y', strtotime(@$row->created_at));
                                                    $bookDate = date('d-M-Y', strtotime(@$row->booking_date));
                                                @endphp

                                                <div class="col-4">
                                                    <span>
                                                        <div>
                                                            <a onclick="showToggle({{ $row->id }});">
                                                                <p style="cursor: pointer;">
                                                                    <strong>Date: </strong>
                                                                    {{ @$creationDate }}&nbsp;&nbsp;
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
                                                            <p><strong>Owner Name:
                                                                </strong>{{ @$row['adminClientUser']->name }}
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
                                                                <p style="overflow-wrap: break-word;"> <strong>Freelancer
                                                                        Email:
                                                                    </strong>
                                                                    {{ @$row['freelancerAppUser']->email }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <p style="overflow-wrap: break-word;"><strong>Freelancer
                                                                        Mobile:
                                                                    </strong>
                                                                    {{ @$row['freelancerAppUser']->phone }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <p style="overflow-wrap: break-word;"><strong>Owner
                                                                        Category:
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
                                                                <p style="overflow-wrap: break-word;"><strong>Booking
                                                                        Status:
                                                                    </strong>
                                                                    {{ @$row['userBookingSlots']->status }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
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

                <div id="panel2" class="tab-pane">
                    <div class="container">
                        <h2 class="color-1 my-4 text-center">All Confirmed Bookings</h2>
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
                                <div class="row confirm-appointment p-3 text-left" id="confirmed">
                                    @if (@count($appointments))
                                        @forelse ($appointments as $row)
                                            @if (
                                                !empty($row->status) &&
                                                    !str_contains(strtolower($row->status), 'cancelled') &&
                                                    !empty($row->userBookingSlots->status) &&
                                                    str_contains(strtolower($row->userBookingSlots->status), 'booked'))
                                                @php
                                                    $creationDate = date('d-M-Y', strtotime(@$row->created_at));
                                                    $bookDate = date('d-M-Y', strtotime(@$row->booking_date));
                                                @endphp
                                                <div class="col-4">
                                                    <span>
                                                        <div>
                                                            <a onclick="showToggle({{ $row->id }});">
                                                                <p style="cursor: pointer;">
                                                                    <strong>Date: </strong>
                                                                    {{ @$creationDate }}&nbsp;&nbsp;
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
                                                            <p><strong>Owner Name:
                                                                </strong>{{ @$row['adminClientUser']->name }}
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
                                                                <p style="overflow-wrap: break-word;"> <strong>Freelancer
                                                                        Email:
                                                                    </strong>
                                                                    {{ @$row['freelancerAppUser']->email }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <p style="overflow-wrap: break-word;"><strong>Freelancer
                                                                        Mobile:
                                                                    </strong>
                                                                    {{ @$row['freelancerAppUser']->phone }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <p style="overflow-wrap: break-word;"><strong>Owner
                                                                        Category:
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
                                                                <p style="overflow-wrap: break-word;"><strong>Booking
                                                                        Status:
                                                                    </strong>
                                                                    {{ $row->confirmed_by ? 'Confirmed by Business Owner' : @$row['userBookingSlots']->status }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @empty
                                            <p>No Bookings Found!</p>
                                        @endforelse
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="panel3" class="tab-pane">
                    <div class="container">
                        <h2 class="color-1 my-4 text-center">All Cancelled Bookings</h2>
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
                                <div class="row confirm-appointment p-3 text-left" id="cancelled">
                                    @if (@count($appointments))
                                        @forelse ($appointments as $row)
                                            {{-- @dd($row) --}}
                                            @if (!empty($row) && str_contains(strtolower($row->status), 'cancelled by'))
                                                @php
                                                    $creationDate = date('d-M-Y', strtotime(@$row->created_at));
                                                    $bookDate = date('d-M-Y', strtotime(@$row->booking_date));
                                                @endphp

                                                <div class="col-4">
                                                    <span>
                                                        <div>
                                                            <a onclick="showToggle({{ $row->id }});">
                                                                <p style="cursor: pointer;">
                                                                    <strong>Date: </strong>
                                                                    {{ @$creationDate }}&nbsp;&nbsp;
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
                                                            <p><strong>Owner Name:
                                                                </strong>{{ @$row['adminClientUser']->name }}
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
                                                                <p style="overflow-wrap: break-word;"> <strong>Freelancer
                                                                        Email:
                                                                    </strong>
                                                                    {{ @$row['freelancerAppUser']->email }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <p style="overflow-wrap: break-word;"><strong>Freelancer
                                                                        Mobile:
                                                                    </strong>
                                                                    {{ @$row['freelancerAppUser']->phone }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <p style="overflow-wrap: break-word;"><strong>Owner
                                                                        Category:
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
                                                                <p style="overflow-wrap: break-word;"><strong>Booking
                                                                        Status:
                                                                    </strong>
                                                                    {{ !empty($row) && !empty($row->status) ? $row->status : @$row['userBookingSlots']->status }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @empty
                                            <p>No Bookings Found!</p>
                                        @endforelse
                                        {{-- @else
                                        <p class="text-center">No Bookings Found!</p> --}}
                                    @else
                                        <p>No Bookings Found!</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

        $(window).on('load', function() {
            var pending = $('#pending').html();
            var on_hold = $('#on_hold').html();
            var confirmed = $('#confirmed').html();
            var cancelled = $('#cancelled').html();

            isPending = pending.replace(/\s/g, '');
            isOnHold = on_hold.replace(/\s/g, '');
            isConfirmed = confirmed.replace(/\s/g, '');
            isCancelled = cancelled.replace(/\s/g, '');

            if (isPending == '') {
                $('#pending').html('<p class="mx-auto mb-0">No Bookings Found!</p>');
            }
            if (isOnHold == '') {
                $('#on_hold').html('<p class="mx-auto mb-0">No Bookings Found!</p>');
            }
            if (isConfirmed == '') {
                $('#confirmed').html('<p class="mx-auto mb-0">No Bookings Found!</p>');
            }
            if (isCancelled == '') {
                $('#cancelled').html('<p class="mx-auto mb-0">No Bookings Found!</p>');
            }
        });
    </script>
@endpush
