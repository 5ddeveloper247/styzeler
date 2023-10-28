@extends('layouts.master.template_old.master')
<script>
    const baseURL = "{{ request()->root() }}";
    const userId = "{{ @$data->id }}";
    var user_type = "{{ auth()->user()->type }}";
    var profile_type = "{{ auth()->user()->profile_type }}";
    var user_name = "{{ auth()->user()->name }}";
</script>

@push('css')
    <link rel="stylesheet" href="{{ asset('template_old/css/calendar.css') }}?v={{ time() }}" />

    <style>
        table {
            text-align: center
        }

        .time_active {
            background-color: #c4b9b0;
            color: black;
        }

        .timeSlots .option:hover {
            background: #c4b9b0;
            color: black;
            /*             font-weight: bold; */
            border: 1px solid #c4b9b0;
            cursor: pointer;
        }

        .booked:hover {
            background: black !important;
            color: #c4b9b0 !important;
            font-weight: unset !important;
            border: 1px solid #c4b9b0 !important;
            cursor: pointer !important;
        }

        .option {
            width: 100%;
            border: 1px solid #c4b9b0;
            text-align: center;
            padding: 10px 0 10px 0;
            margin: 10px 0;
            transition: 1s all ease;
        }


        .option a {
            color: #c4b9b0;

        }

        .option a:hover {
            background-color: #c4b9b0;
            color: white;
            text-decoration: none;
        }

        .edit_pro_pic {
            margin: 20px 0;
            padding: 5px 15px;
            background-color: transparent;
            color: red !important;
            font-size: 20px;
            border: 1px solid red;
        }

        .modal-dialog {
            overflow-y: initial !important
        }

        .modal-body {
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }

        .customSubmit,
        .customLike {
            width: 100px;
        }

        .book-appointment,
        .on-Hold,
        .cancel {
            width: 100%;
            /*border: 1px solid #c4b9b0;*/
            text-align: center;
            padding: 10px;
            margin: 10px 0;

        }


        .option a {
            color: #c4b9b0;

        }

        .option a:hover {
            background-color: #c4b9b0;
            color: white;
            text-decoration: none;
        }

        .customBtnProfile {
            width: 100px;
            margin-top: 20px;

        }

        .defaultStatus {
            pointer-events: none !important;
        }

        .appointment-status_b {
            border: 2px solid #c4b9b0 !important;
            padding: 4px 10px 3px 10px;
            color: #ffdb59;
            margin-left: 29px;
            margin-bottom: 4px;
        }

        .appointment-status_b>h3 {
            font-size: 20px;
            font-weight: 600;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: transparent !important;
            /* background-clip: padding-box; */
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }



        @media screen and (max-width: 411px) {
            .customBtnProfile {
                width: 120px;
                font-size: 14px;
            }
        }

        @media screen and (max-width: 500px) {
            #calendar {
                height: 550px;
            }

            .status-div {
                margin-top: 150px;
            }
        }


        .fc-scroller {
            overflow-y: hidden !important;
        }

        @media only screen and (max-width: 991px) {
            .fc th.fc-day-header {
                padding: 5px 5px !important;
                font-weight: 500 !important;
                color: #ffbd59 !important;
                font-size: 0.7rem !important;
            }

            .fc-basic-view .fc-week-number,
            .fc-basic-view .fc-day-number,
            .fc-content {
                padding: 5px 5px !important;
                font-weight: 500 !important;
                font-size: 0.7rem !important;
            }

            .fc-row .fc-week .table-bordered {
                height: 2em !important;
            }

            .fc-event i {
                font-size: 16px;
                margin-right: 8px;
                vertical-align: middle;
            }

            .profile_btns {
                gap: 4px !important;
            }
        }

        del {
            text-decoration: line-through;
            text-decoration-color: #ffbd59;
        }

        /*         .booked-slot{ */
        /*         	color:#b1bcc5 !important; */
        /*         } */
    </style>
    <script>
        var scrollPosition = window.scrollY;
    </script>
@endpush

@section('content')
    {{-- <script>
        const baseURL = "{{ request()->root() }}";
    </script> --}}
    {{-- @dd($data) --}}
    <!-- Content -->
    <div class="profile container">

        <div class="profile-pic aos-init aos-animate text-center" data-aos="fade-up">

            <img alt="" id="profile-image-id"
                src="{{ asset(isset($data->hero_image) ? $data->hero_image : 'template_old/images/blank.png') }}"
                width="100%">


            <!-- <p><a class="btn edit_pro_pic text-center" onclick="editProfilePic()" title="Edit">+</a></p> -->
        </div>
        @php
            $class = '';
            $bookid = '';
            if (@!Auth::user()) {
                $class = 'show_message';
                $bookid = '';
            } elseif (@$membership == 0) {
                $class = 'tokens_message';
                $bookid = '';
            } else {
                $class = '';
                $bookid = 'book';
            }
        @endphp

        <div class="d-flex justify-content-around profile_btns my-4">
            <div class="text-center">
                <div class="profile btn customBtn" id="profile">Profile</div>
            </div>
            <div class="text-center">
                <div class="reviews btn customBtn" id="reviews">Reviews</div>
            </div>
            <div class="text-center">
                <div class="likes btn customBtn" id="likes">Likes</div>
            </div>
            @auth
                @if (Auth::user()->type == 'client')
                    <div class="book_client text-center">
                        <div class="book btn customBtn" id="book">Book</div>
                    </div>
                @else
                    <div class="book_client text-center">
                        <div class="book btn customBtn {{ @$class }}" id="{{ @$bookid }}">Book</div>
                    </div>
                @endif
                <div class="contact_btn d-none text-center" id="" onclick="useOwnerToken();">
                    <div class="book btn customBtn">Contact</div>
                </div>
            @endauth
        </div>

        <div class="row justify-content-center mb-5">
            <div class="showProfile col-10 mt-4 text-left" id="showProfile" style="">

                <div class="name row">
                    <label class="color-1 col-lg-2">Name : </label>
                    @if (in_array(@Auth::user()->type, ['hairdressingSalon', 'beautySalon']) && (@$membership > 0 || $todayUseToken > 0))
                        <p class="col-lg-10" id="ownerName"></p>
                    @elseif(@Auth::user()->type == 'client' && @$membership > 0)
                        <p class="col-lg-10" id="ownerName"></p>
                    @else
                        <p class="col-lg-10" style="font-size: 14px;color:red;">You need to buy package to access name.</p>
                    @endif
                </div>

                <div class="age row">
                    <label class="color-1 col-lg-2">Age : </label>
                    <p class="col-lg-10" id="ownerAge"></p>
                </div>
                @if ($data->type != 'wedding')
                    <div class="rate row">
                        <label class="color-1 col-lg-2">Profile Type: </label>
                        <p class="col-lg-10" id="profiletype"></p>
                    </div>
                @endif


                <div class="qualification row">
                    <label class="color-1 col-lg-2">Qualification : </label>
                    <p class="col-lg-10" id="ownerQualification"></p>
                </div>

                <div class="languages row">
                    <label class="color-1 col-lg-2">Languages : </label>
                    <p class="col-lg-10" id="ownerLanguage"></p>
                </div>
                @if ($data->type != 'wedding')
                    <div class="rate row">
                        <label class="color-1 col-lg-2">Daily rate : </label>
                        <p class="col-lg-10" id="ownerRate"></p>
                    </div>
                @endif
                <div class="work row">
                    <label class="color-1 col-lg-2">Zone of London open to work : </label>
                    <p class="col-lg-10" id="ownerWork"></p>
                </div>

                <div class="resume row">
                    <label class="color-1 col-lg-2">Resume : </label>
                    <p class="col-lg-10" id="ownerResume"></p>
                </div>

                <div class="email row">
                    <label class="color-1 col-lg-2">Email : </label>
                    @if (in_array(@Auth::user()->type, ['hairdressingSalon', 'beautySalon']) && (@$membership > 0 || $todayUseToken > 0))
                        <p class="col-lg-10" id="ownerEmail"></p>
                    @elseif(@Auth::user()->type == 'client' && @$membership > 0)
                        <p class="col-lg-10" id="ownerEmail"></p>
                    @else
                        <p class="col-lg-10" style="font-size: 14px;color:red;">You need to buy package to access email.</p>
                    @endif
                </div>

                <div class="status row">
                    <label class="color-1 col-lg-2">Profile Status : </label>
                    <p class="col-lg-10" id="status"></p>

                </div>



                <div class="products row">
                    <h3><label class="color-1 col-lg-12">Products : </label></h3>
                    <!-- <a class="btn text-center" onclick="editServiceAndProduct();" title="Edit">✎</a> -->
                    <div class="col-lg-12" id="ownerProduct">

                        <div class="text-left">
                            <h4 class="font-weight-bold" id="stylingProductsheading"></h4>
                            <p id="stylingProductsPara"></p>
                        </div>

                        <div class="text-left">
                            <h4 class="font-weight-bold" id="chemicalTreatmentProductsheading"></h4>
                            <p id="chemicalTreatmentProductsPara"></p>
                        </div>

                        {{-- for beautician --}}
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="massageProductsheading"></h4>
                            <p id="massageProductsPara"></p>
                        </div>

                        <div class="text-left">
                            <h4 class="font-weight-bold" id="ladyWaxingProductsheading"></h4>
                            <p id="ladyWaxingProductsPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="manicurePedicureProductsheading"></h4>
                            <p id="manicurePedicureProductsPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="salonFacialProductsheading"></h4>
                            <p id="salonFacialProductsPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="EyesAndBrowProductsheading"></h4>
                            <p id="EyesAndBrowProductsPara"></p>

                        </div>
                    </div>
                </div>

                <div class="services row">
                    <h3><label class="color-1 col-lg-12">Services : </label></h3>
                    <!-- <a class="btn text-center" onclick="editServiceAndProduct();" title="Edit">✎</a> -->
                    <div class="col-lg-12" id="ownerService">
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="hairCuttingServicesheading"></h4>
                            <p id="hairCuttingServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="weddingStyleServicesheading"></h4>
                            <p id="weddingStyleServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="barberMaleGroomingServicesheading"></h4>
                            <p id="barberMaleGroomingServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="hairColorServicesheading"></h4>
                            <p id="hairColorServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="chemicalTreatmentServicesheading"></h4>
                            <p id="chemicalTreatmentServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="makeupServivesheading"></h4>
                            <p id="makeupServivesPara"></p>
                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="salonMaleGroomingServicesheading"></h4>
                            <p id="salonMaleGroomingServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="homeServiceMaleGroomingServicesheading"></h4>
                            <p id="homeServiceMaleGroomingServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="bodyWaxingProductsheading"></h4>
                            <p id="bodyWaxingProductsPara"></p>

                        </div>

                        {{-- for beauty --}}
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="massageServicesheading"></h4>
                            <p id="massageServicesPara"></p>

                        </div>

                        <div class="text-left">
                            <h4 class="font-weight-bold" id="massageServicesheading"></h4>
                            <p id="massageServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="hairRemovalPermanentServicesheading"></h4>
                            <p id="hairRemovalPermanentServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="ladyWaxingServicesheading"></h4>
                            <p id="ladyWaxingServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="maleWaxingServicesheading"></h4>
                            <p id="maleWaxingServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="manicurePedicureServicesheading"></h4>
                            <p id="manicurePedicureServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="salonFacialServicesheading"></h4>
                            <p id="salonFacialServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="homeServiceFacialServicesheading"></h4>
                            <p id="homeServiceFacialServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="bodyTreatmentServicesheading"></h4>
                            <p id="bodyTreatmentServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="EyesAndBrowServicesheading"></h4>
                            <p id="EyesAndBrowServicesPara"></p>

                        </div>
                        <div class="text-left">
                            <h4 class="font-weight-bold" id="bodyWaxingServicesheading"></h4>
                            <p id="bodyWaxingServicesPara"></p>

                        </div>
                    </div>
                </div>
                @if ($data->type != 'beautician')
                    <div class="brands row">
                        <h3><label class="color-1 col-lg-12">Brands : </label></h3>
                        <!-- <a class="btn text-center" onclick="editServiceAndProduct();" title="Edit">✎</a> -->
                        <div class="col-lg-12" id="ownerService">
                            <div class="text-left">
                                <h4 class="font-weight-bold" id="hairColorBrandsheading"></h4>
                                <p id="hairColorBrandsPara"></p>
                            </div>

                        </div>
                    </div>
                @endif


                <div class="gallery">
                    <!--<h1 class="color-1 col-lg-12 text-center">GALLERY</h1>-->
                    <h1 class="color-1 col-lg-12 text-center">GALLERY
                        <!-- <a class="btn uploadBtn text-right"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            style="font-size:1vw;" onclick="updateGallery()"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            title="Upload new image/images"><u>(Upload)</u></a> -->
                    </h1>

                    <hr>
                    <hr>
                    {{-- @dd($data->data->{'image-gallery'}) --}}
                    <div class="row" id="gallery-content">

                        {{-- @if (!empty($data->gallery))
                            @foreach ($data->gallery as $key => $value)
                                <div class="col-lg-4 p-4">
                                    <img id="gallery-image-id-{{ $key }}" alt="" width="100%"
                                        height="100%" src="{{ asset($value) }}">
                                    <p>
                                        <a class="text-center btn" onclick="deletePicture({{ $key }})"
                                            title="Edit">
                                            <u>remove</u>
                                        </a>
                                    </p>
                                </div>
                            @endforeach
                        @endif --}}
                    </div>
                </div>


            </div>
            <div class="showReviews col-10 mt-5 text-center" id="showReviews">

                @if (in_array(Auth::user()->type, ['hairdressingSalon', 'beautySalon', 'client']))
                    <div class="giveReviewLike text-left">
                        <form class="reviewForm" id="reviewForm">
                            <input type="hidden" name="feedbackType" id="feedbackType" value="">
                            <input type="hidden" name="feedbackFreelancerId" id="reviewFreelancerId" value="">
                            <h5 class="color-1">
                                Your Review :
                            </h5>
                            <textarea class="form-control col-lg-8" name="ownerRemarks" id="ownerRemarks" rows="4"
                                style="height:10vw; margin-top: 15px;" placeholder="Please enter your feedback here."></textarea>
                            <div>
                                <div>
                                    <button class="btn customBtn customSubmit" style="margin: 15px 0px;" type="button"
                                        onclick="submitReview();">Submit</button>
                                    <button class="btn customBtn customLike" style="margin: 15px 0px;" type="button"
                                        onclick="submitLike();">Like</button>
                                </div>

                            </div>
                        </form>
                    </div>
                @endif

                <div class="mt-4 text-left" id="freelancerReviewsHtml">


                </div>
            </div>
            <div class="showLikes col-10 mt-5 text-center" id="showLikes">
                <div class="mt-4 text-left" id="freelancerLikesHtml">


                </div>
            </div>
            <div class="showBook col mt-5 text-left" id="showBook">

                <!-- new calendar  ---------------------------------------------------------- -->

                <div class="p-md-3 col-lg-12 p-0">
                    <!-- <h2 class="mb-4">Full Calendar</h2> -->
                    <div class="card">
                        <div class="card-body p-0">
                            <div id="calendar"></div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="appointment-status pb-5">

                        <h3 id="p_status"></h3>

                        @if (@Auth::user()->type == 'client')
                            <p class="servicesTimeText" style="font-size: 12px;margin: unset;">Services Time:
                                <span id="serviceTime"></span> minutes
                            </p>
                            <p class="servicesTimeText" style="font-size: 12px;margin: unset;">Travelling Time:
                                <span id="travellingTime"></span> minutes
                            </p>
                            <p class="servicesTimeText" style="font-size: 12px;margin: unset;">Total Time:
                                <span id="serviceTotalTime"></span> minutes
                            </p>
                        @endif


                    </div>
                </div>

                <div class="row justify-content-center status-div">

                    <div class="col-6 col-md-6 col-lg-2 text-center">
                        <div class="">
                            <a href="" class="book-appointment btn customBtn defaultStatus">Book</a>
                        </div>
                    </div>
                    @if (in_array(Auth::user()->type, ['beautySalon', 'hairdressingSalon']))
                        <div class="col-6 col-md-6 col-lg-2 text-center">
                            <div class="">
                                <a class="on-Hold btn customBtn defaultStatus" href="">Hold</a>
                            </div>
                        </div>
                    @endif
                    <div class="col-6 col-md-6 col-lg-2 text-center">
                        <div class="">
                            <a class="cancel btn customBtn defaultStatus" href="">Cancel</a>
                        </div>
                    </div>

                </div>
                <div class="row timeSlots">

                </div>
                <!-- end of new calendar ---------------------------------------------------- -->
            </div>
        </div>


    </div>


    <!-- modals -->


    <!-- edit profile picture -->
    <div class="modal profile-pic-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">Edit Profile Picture</h5>
                    <form id="hero_image_form">
                        <input type="hidden" name="type" value="{{ @$data->type }}">
                        <p>
                        <div class="profilePicture">
                            <img id="blah" src="images/blank.png" alt="your image"> <br>

                            <input id="stylist-picture" name="stylist_picture" class="my-4 hidden" type="file"
                                accept=".jpg, .jpeg, .png" onchange="loadFileProfile(event)" placeholder="upload">
                            <label for="stylist-picture">+</label>
                        </div>
                        </p>
                        <button type="submit" id="updateProfileImage" class="btn customBtn">Okay</button>
                    </form>

                    <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

                </div>
                <div class="modal-footer text-center">
                </div>
            </div>
        </div>
    </div>

    <!-- edit name and mobile number -->
    <form action="" id="updateBasicInfoProfile">
        <input type="hidden" name="type" value="{{ @$data->type }}">
        <div class="modal name-mobile-modal" tabindex="-1" role="dialog" data-keyboard="false"
            data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- <form id="name-mobile-form"> -->
                        <h5 class="text-center">Edit Name and Mobile</h5>
                        <p>
                        <div class="form-group">
                            <input type="text" class="form-control" id="stylist-name" name="stylist_name"
                                aria-describedby="stylist-name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="stylist-surname" name="stylist_surname"
                                aria-describedby="stylist-surname" placeholder="Surname">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" id="stylist-mobile" name="stylist_mobile"
                                aria-describedby="stylist-mobile" placeholder="Mobile">
                        </div>
                        </p>
                        <button type="button" class="btn customBtn updateBasicInfoProfile"
                            data-dismiss="modal">Okay</button>
                        <!-- <button type="button" class="btn customBtn" data-dismiss="modal" >Okay</button> -->
                        <!-- </form> -->

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>

        <!-- For age -->
        <div class="modal age-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Edit Age</h5>
                        <p>
                        <div class="age my-5">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stylist_age" id="age18-25"
                                    value="18-25">
                                <label class="form-check-label" for="hairstylist">
                                    18-25
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stylist_age" id="age26-35"
                                    value="26-35">
                                <label class="form-check-label" for="beautician">
                                    26-35
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stylist_age" id="age36-45"
                                    value="36-45">
                                <label class="form-check-label" for="barber">
                                    36-45
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stylist_age" id="age46-55"
                                    value="46-55">
                                <label class="form-check-label" for="weddingStylist">
                                    46-55
                                </label>
                            </div>
                        </div>
                        </p>
                        <button type="button" class="btn customBtn updateBasicInfoProfile"
                            data-dismiss="modal">Okay</button>
                        <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>

        <!-- Qualification -->
        <div class="modal qualification-modal" tabindex="-1" role="dialog" data-keyboard="false"
            data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Edit Qualification</h5>
                        <p>
                        <div class="qualification my-5">

                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="qualification[]" id="nvq-level2"
                                    value="Nvq Level 2">
                                <label class="form-check-label" for="nvq-level2">
                                    NVQ Level 2
                                </label>
                            </div>
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="qualification[]" id="nvq-level3"
                                    value="Nvq Level 3">
                                <label class="form-check-label" for="nvq_level3">
                                    NVQ Level 3
                                </label>
                            </div>
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="qualification[]" id="nvq-assesor"
                                    value="NVQ Assesor, training assesor">
                                <label class="form-check-label" for="nvq_assesor">
                                    NVQ Assesor, training assesor
                                </label>
                            </div>
                            <div class="form-group text-right">

                            </div>
                            <div class="form-group">
                                <div class="tool-div">
                                    <label for="video" class="color-1">Update Trade test Video</label><span
                                        style="float: right"><i class="fa fa-exclamation-circle exclamation ml-2"
                                            aria-hidden="true" data-toggle="tooltip" title=""
                                            data-original-title="Styzeler Hair and Beauty agency requires a trade test video to assess each freelancer’s skills and personality for Fair use and fair dealing.
                                                    A  head mannequin can be used to showcase your skills based on your services.
                                                    COLORE. Highlights and Balayage can be combined.
                                                    CUT  Free choice between Square layered, Round layered, Bob, graduated Bob.
                                                    BARBER   Skin fade, Comb over Scissors."></i></span>
                                </div>
                                <input class="form-control" type="url" id="video" name="video"
                                    placeholder="Video Link">
                            </div>

                            <div class="form-group">
                                <label for="utr_number" class="color-1">Edit UTR Number</label>
                                <input class="form-control" type="text" id="utr-number" name="utr_number">
                            </div>
                            <div class="form-group">
                                <div class="tool-div">
                                    <label for="public_liability_insurance" class="color-1">Update Public Liability
                                        Insurance</label>
                                    <span style="float: right"><i class="fa fa-exclamation-circle exclamation ml-2"
                                            aria-hidden="true" data-toggle="tooltip" title=""
                                            data-original-title="Public Liablity Insuarence"></i></span>
                                </div>
                                <input class="form-control" type="file" id="public-liability-insurance"
                                    name="public_liability_insurance">
                            </div>
                        </div>
                        </p>
                        <button type="button" class="btn customBtn updateBasicInfoProfile"
                            data-dismiss="modal">Okay</button>
                        <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>

        <!-- language -->
        <div class="modal language-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Edit Languages</h5>
                        <p>
                        <div class="languages my-5">

                            <div class="form-group">
                                <textarea class="form-control" id="stylist-language" name="stylist_language" rows="3"
                                    placeholder="Languages"></textarea>
                            </div>
                        </div>
                        </p>
                        <button type="button" class="btn customBtn updateBasicInfoProfile"
                            data-dismiss="modal">Okay</button>
                        <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>

        <!-- Status -->
        <div class="modal status-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Edit Status</h5>
                        <p>
                        <div class="languages my-5">

                            <div class="form-group">
                                <select class="form-control" id="stylist_status" name="stylist_status">
                                    <option values="Active">Active</option>
                                    <option values="Disabled">Disabled</option>
                                </select>
                            </div>
                        </div>
                        </p>
                        <button type="button" class="btn customBtn updateBasicInfoProfile"
                            data-dismiss="modal">Okay</button>
                        <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>

        @if ($data->type != 'wedding')
            <div class="modal type-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">Edit Profile Type</h5>
                            <p>
                            <div class="languages my-5">

                                <div class="form-group">
                                    <select class="form-control" id="profile_type" name="profile_type">
                                        <option values="Freelancer">Freelancer</option>
                                        <option values="Jobseeker">Jobseeker</option>
                                        <option values="Homeservice">Home Service</option>
                                    </select>
                                </div>
                            </div>
                            </p>
                            <button type="button" class="btn customBtn updateBasicInfoProfile"
                                data-dismiss="modal">Okay</button>
                            <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

                        </div>
                        <div class="modal-footer text-center">
                        </div>
                    </div>
                </div>
            </div>


            <!-- rate -->
            <div class="modal rate-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">Edit Rate</h5>
                            <p>
                            <div class="rate my-5">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="stylist_rate" id="110"
                                        value="110" onclick="$('div[id=otherRate]').hide();">
                                    <label class="form-check-label" for="hairstylist">
                                        £110
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="stylist_rate" id="120"
                                        value="120" onclick="$('div[id=otherRate]').hide();">
                                    <label class="form-check-label" for="beautician">
                                        £120
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="stylist_rate" id="150"
                                        value="150" onclick="$('div[id=otherRate]').hide();">
                                    <label class="form-check-label" for="barber">
                                        £130
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="stylist_rate" id="other"
                                        value="" onclick="$('div[id=otherRate]').show();">
                                    <label class="form-check-label" for="other"> Other <span
                                            style="font-size: 11px; color: #e1dede; font-style: italic;">(In
                                            British pounds)</span>
                                    </label>
                                </div>
                                <div id="otherRate" style="display:none;">
                                    <span
                                        style="left:131px;position: absolute; margin-left: 1px; margin-top: 3px;">£</span>
                                    <input type="number" name="otherRate" id="rateOther" value="0"
                                        class="form-control" style=" height: 30px; width: 200px;padding-left: 15px;">
                                </div>
                            </div>
                            </p>
                            <button type="button" class="btn customBtn updateBasicInfoProfile"
                                data-dismiss="modal">Okay</button>
                            <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

                        </div>
                        <div class="modal-footer text-center">
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Zone -->
        <div class="modal work-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Edit Work Zone</h5>
                        <p>
                        <div class="open-to-work my-5">
                            <h3>Zone of London open to work</h3>
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="zone[]" id="work-1-2"
                                    value="1/2">
                                <label class="form-check-label" for="nvq-level2">
                                    1/2
                                </label>
                            </div>
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="zone[]" id="work-2-3"
                                    value="2/3">
                                <label class="form-check-label" for="nvq_level3">
                                    2/3
                                </label>
                            </div>
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="zone[]" id="work-3-4"
                                    value="3/4">
                                <label class="form-check-label" for="nvq_assesor">
                                    3/4
                                </label>
                            </div>
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="zone[]" id="work-1-4"
                                    value="1/4">
                                <label class="form-check-label" for="nvq_assesor">
                                    1/4
                                </label>
                            </div>
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="zone[]" id="work-open"
                                    value="Open to travel">
                                <label class="form-check-label" for="nvq_assesor">
                                    Open to travel
                                </label>
                            </div>
                        </div>
                        </p>
                        <button type="button" class="btn customBtn updateBasicInfoProfile"
                            data-dismiss="modal">Okay</button>
                        <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>

        <!-- Resume -->
        <div class="modal resume-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Edit Resume</h5>
                        <p>
                        <div class="form-group">
                            <textarea class="form-control" id="stylist-resume" name="stylist_resume" rows="3" placeholder="Resume"></textarea>
                        </div>
                        </p>
                        <button type="button" class="btn customBtn updateBasicInfoProfile"
                            data-dismiss="modal">Okay</button>
                        <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="" id="updateProductAndServices">
        @if ($data->type == 'wedding' || $data->type == 'barber')
            <!-- wedding & barber-service-product-modal  -->
            <div class="modal wedding-service-product-modal" tabindex="-1" role="dialog" data-keyboard="false"
                data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">Edit Service and Product</h5>
                            <p>
                            <div class="hair-cutting my-5">
                                <h4>Hair-Cutting</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="hairCuttingServices[heading]" value="Hair-Cutting">
                                    <input type="hidden" name="hairCuttingServices[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" name="hairCuttingServices[]"
                                        id="stylist-customer-ladies" value="Ladies">
                                    <label class="form-check-label" for="">Ladies</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="hairCuttingServices[]"
                                        id="stylist-customer-gents" value="Gents">
                                    <label class="form-check-label" for="">Gents</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="hairCuttingServices[]"
                                        id="stylist-customer-kids" value="Kids">
                                    <label class="form-check-label" for="">Kids</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="hairCuttingServices[]"
                                        id="stylist-customer-afro" value="Afro Caribbean">
                                    <label class="form-check-label" for="">Afro Caribbean</label>
                                </div>
                            </div>
                            <div class="wedding-styles my-5">
                                <h4>Wedding-Styles</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="weddingStyleServices[heading]" value="Wedding-Styles">
                                    <input type="hidden" name="weddingStyleServices[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" id="classic-low-chignon"
                                        value="Classic Low Chignon" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="classic-low-chignon">Classic Low Chignon</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="french-chignon"
                                        value="French Chignon" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="french-chignon">French Chignon</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="updo-flowers"
                                        value="Updo with Flowers" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="updo-flowers">Updo with Flowers</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="smooth-curls"
                                        value="Long, Smooth Curls" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="smooth-curls">Long, Smooth Curls</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="pinned-curls"
                                        value="Pinned Curls" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="pinned-curls">Pinned Curls</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="long-ponytail"
                                        value="Glam Long Ponytail" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="long-ponytail">Glam Long Ponytail</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="braided-barrette"
                                        value="Braided Barrette" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="braided-barrette">Braided Barrette</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hidden-hair-piece"
                                        value="Hidden Hair Piece" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="">Hidden Hair Piece</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fishtail-braid"
                                        value="Fishtail Braid" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="">Fishtail Braid</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="finger-weaves"
                                        value="Classic Finger Weaves" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="">Classic Finger Weaves</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="makeup" value="Makeup"
                                        name="weddingStyleServices[]">
                                    <label class="form-check-label" for="">Makeup</label>
                                </div>
                            </div>
                            <div class="male-grooming my-5">
                                <h4>Barber Male Grooming</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="barberMaleGroomingServices[heading]"
                                        value="Barber Male Grooming">
                                    <input type="hidden" name="barberMaleGroomingServices[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                                        id="scissors-cut" value="Scissors Cut">
                                    <label class="form-check-label" for="scissors-cut">Scissors Cut</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                                        id="clipper-cut" value="Clipper Cut">
                                    <label class="form-check-label" for="clipper-cut">Clipper Cut</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                                        id="beard-shaped" value="Beard Shaped">
                                    <label class="form-check-label" for="beard-shaped">Beard Shaped</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                                        id="skin-fade" value="Skin Fade">
                                    <label class="form-check-label" for="skin-fade">Skin Fade</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                                        id="wet-shave" value="Wet Shave">
                                    <label class="form-check-label" for="wet-shave">Wet Shave</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                                        id="hot-towel" value="Hot Towel">
                                    <label class="form-check-label" for="">Hot Towel</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                                        id="chemical-relaxer" value="Chemical Relaxer">
                                    <label class="form-check-label" for="chemical-relaxer">Chemical Relaxer</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                                        id="gray-blending" value="Gray Blending">
                                    <label class="form-check-label" for="gray-blending">Gray Blending</label>
                                </div>
                            </div>
                            <div class="styling-products my-5">
                                <h4>Styling Products</h4>
                                <div class="form-check">
                                    <input type="hidden" name="stylingProducts[heading]" value="Styling Products">
                                    {{-- <input type="hidden" name="stylingProducts['subHeading']" value="Services"> --}}
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="kerastase" value="Kerastase">
                                    <label class="form-check-label" for="kerastase">Kerastase</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="loreal-tecni-art" value="L'oreal tecni art">
                                    <label class="form-check-label" for="loreal-tecni-ar">L'oreal Tecni Art</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="schwarzkopf-bc-bonacure" value="Schwarzkopf Bc Bonacure">
                                    <label class="form-check-label" for="schwarzkopf-bc-bonacure">Schwarzkopf Bc
                                        Bonacure</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="keracare" value="KeraCare">
                                    <label class="form-check-label" for="keracare">KeraCare</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="baxter" value="Baxter">
                                    <label class="form-check-label" for="baxter">Baxter</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="american-crew" value="American Crew">
                                    <label class="form-check-label" for="american-crew">American Crew</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="hanz-de-fuko-hybridized" value="Hanz de Fuko Hybridized">
                                    <label class="form-check-label" for="hanz-de-fuko-hybridized">Hanz de Fuko
                                        Hybridized</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="redken" value="Redken">
                                    <label class="form-check-label" for="redken">Redken</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="fudge" value="Fudge">
                                    <label class="form-check-label" for="fudge">Fudge</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="moroccan-oil" value="Moroccan oil">
                                    <label class="form-check-label" for="moroccan-oil">Moroccan oil</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="kevin-murphy" value="Kevin murphy">
                                    <label class="form-check-label" for="kevin-murphy">Kevin murphy</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="proraso" value="Proraso">
                                    <label class="form-check-label" for="proraso">Proraso</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="jack-dean" value="Jack Dean">
                                    <label class="form-check-label" for="jack-dean">Jack Dean</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="vines-vintage" value="Vines Vintage">
                                    <label class="form-check-label" for="vines-vintage">Vines Vintage</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="baxter-of-california-shave-tonic" value="Baxter Of California Shave Tonic">
                                    <label class="form-check-label" for="baxter-of-california-shave-tonic">Baxter Of
                                        California
                                        Shave
                                        Tonic </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="anita-grant" value="Anita Grant">
                                    <label class="form-check-label" for="nita-grant">Anita Grant</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="wella-eimi" value="Wella EIMI">
                                    <label class="form-check-label" for="wella-eimi">Wella EIMI</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="shu-uemura" value="Shu Uemura">
                                    <label class="form-check-label" for="shu-uemura">Shu Uemura</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="aveda" value="Aveda">
                                    <label class="form-check-label" for="aveda">Aveda</label>
                                </div>
                            </div>
                            <div class="hair-color my-5">
                                <h4>Hair Color</h4>
                                <h5><u>Brands</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="hairColorBrands[heading]" value="Hair Color">
                                    <input type="hidden" name="hairColorBrands[subHeading]" value="Brands">
                                    <input class="form-check-input" type="checkbox" id="loreal" value="L’Oréal"
                                        name="hairColorBrands[]">
                                    <label class="form-check-label" for="loreal">L’Oréal</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="wella" value="Wella"
                                        name="hairColorBrands[]">
                                    <label class="form-check-label" for="wella">Wella</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="schwarzkopf"
                                        value="Schwarzkopf" name="hairColorBrands[]">
                                    <label class="form-check-label" for="schwarzkopf">Schwarzkopf</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="redkenn" value="Redken"
                                        name="hairColorBrands[]">
                                    <label class="form-check-label" for="redken">Redken</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="matrix" value="Matrix"
                                        name="hairColorBrands[]">
                                    <label class="form-check-label" for="matrix">Matrix</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="goldwell" value="Goldwell"
                                        name="hairColorBrands[]">
                                    <label class="form-check-label" for="goldwell">Goldwell</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="avedaa" value="Aveda"
                                        name="hairColorBrands[]">
                                    <label class="form-check-label" for="aveda">Aveda</label>
                                </div>
                                <h5 class="mt-5"><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="hairColorServices[heading]" value="Hair Color">
                                    <input type="hidden" name="hairColorServices[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" id="fashion-color"
                                        value="Fashion Color" name="hairColorServices[]">
                                    <label class="form-check-label" for="fashion-color">Fashion Color</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="highlights"
                                        value="Highlights" name="hairColorServices[]">
                                    <label class="form-check-label" for="highlights">Highlights</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="balayage" value="Balayage"
                                        name="hairColorServices[]">
                                    <label class="form-check-label" for="balayage">Balayage</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="colour-correction"
                                        value="Colour Correction" name="hairColorServices[]">
                                    <label class="form-check-label" for="colour-correction">Colour Correction</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="full-head-bleach"
                                        value="Full head bleach" name="hairColorServices[]">
                                    <label class="form-check-label" for="full-head-bleach">Full head bleach</label>
                                </div>
                            </div>
                            <div class="chemical-treatments my-5">
                                <h4>Chemical Treatments</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="chemicalTreatmentServices[heading]"
                                        value="Chemical Treatments">
                                    <input type="hidden" name="chemicalTreatmentServices[subHeading]"
                                        value="Services">
                                    <input class="form-check-input" type="checkbox" id="perm" value="Perm"
                                        name="chemicalTreatmentServices[]">
                                    <label class="form-check-label" for="perm">Perm</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="brazilian-blow-dry"
                                        value="Brazilian Blow-dry" name="chemicalTreatmentServices[]">
                                    <label class="form-check-label" for="brazilian-blow-dry">Brazilian Blow-dry</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="keratin-treatment"
                                        value="Keratin Treatment" name="chemicalTreatmentServices[]">
                                    <label class="form-check-label" for="keratin-treatment">Keratin Treatment</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="chemical-relaxer"
                                        value="Chemical Relaxer" name="chemicalTreatmentServices[]">
                                    <label class="form-check-label" for="chemical-relaxer">Chemical Relaxer</label>
                                </div>

                                <h5 class="mt-5"><u>Products</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="chemicalTreatmentProducts[heading]"
                                        value="Chemical Treatments">
                                    <input type="hidden" name="chemicalTreatmentProducts[subHeading]"
                                        value="Products">
                                    <input class="form-check-input" type="checkbox" id="kerastraight"
                                        value="Kerastraight" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="kerastraight">Kerastraight</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="global-keratin"
                                        value="Global Keratin" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="global-keratin">Global Keratin</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cocochoco-brazilian-keratin"
                                        value="Cocochoco Brazilian Keratin" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="cocochoco-brazilian-keratin">Cocochoco
                                        Brazilian
                                        Keratin</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="goldwell-kerasilk"
                                        value="Goldwell KeraSilk" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="goldwell-kerasilk">Goldwell KeraSilk </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="schwarzkopf-professional"
                                        value="Schwarzkopf Professional" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="schwarzkopf-professional">Schwarzkopf
                                        Professional</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="wella-professionals"
                                        value="Wella Professionals" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="wella-professionals">Wella
                                        Professionals</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sibel" value="Sibel"
                                        name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="sibel">Sibel</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="loreal-professionnel"
                                        value="L'Oréal Professionnel" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="loreal-professionnel">L'Oréal
                                        Professionnel</label>
                                </div>
                            </div>
                            </p>
                            <button type="button" class="btn customBtn updateProductAndServices"
                                data-dismiss="modal">Okay</button>
                            <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

                        </div>
                        <div class="modal-footer text-center">
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- beautician-service-product-modal  -->
        @if ($data->type === 'beautician')
            <div class="modal beautician-service-product-modal" tabindex="-1" role="dialog" data-keyboard="false"
                data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">Edit Service and Product</h5>
                            <p>
                            <div class="massage my-5">
                                <h4>Massage</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="massageServices[heading]" value="Massage">
                                    <input type="hidden" name="massageServices[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" id="swedish-massage"
                                        value="Swedish Massage" name="massageServices[]">
                                    <label class="form-check-label" for="swedish-massage">Swedish Massage</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hot-stone-massage"
                                        value="Hot Stone Massage" name="massageServices[]">
                                    <label class="form-check-label" for="hot-stone-massage">Hot Stone Massage</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="deep-tissue-massage"
                                        value="Deep Tissue Massage" name="massageServices[]">
                                    <label class="form-check-label" for="deep-tissue-massage">Deep Tissue
                                        Massage</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="armatherapy"
                                        value="Aromatherapy Massage" name="massageServices[]">
                                    <label class="form-check-label" for="armatherapy">Aromatherapy Massage</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="shiatsu-massage"
                                        value="Shiatsu Massage" name="massageServices[]">
                                    <label class="form-check-label" for="armatherapy">Shiatsu Massage</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="pregnancy-massage"
                                        value="Pregnancy Massage" name="massageServices[]">
                                    <label class="form-check-label" for="pregnancy-massage">Pregnancy
                                        Massage </label><span
                                        style="font-size: 11px; color: red; font-style: italic;">(N/A For Home
                                        Service)</span>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="thai-massage"
                                        value="Thai massage" name="massageServices[]">
                                    <label class="form-check-label" for="thai-massage">Thai massage</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lymphatic-massage"
                                        value="Lymphatic Massage" name="massageServices[]">
                                    <label class="form-check-label" for="lymphatic-massage">Lymphatic Massage</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="reflexology"
                                        value="Reflexology" name="massageServices[]">
                                    <label class="form-check-label" for="reflexology">Reflexology</label>
                                </div>
                                <h5 class="mt-5"><u>Products</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="massageProducts[heading]" value="Message">
                                    <input type="hidden" name="massageProducts[subHeading]" value="Products">
                                    <input class="form-check-input" type="checkbox" id="kaeso" value="Kaeso"
                                        name="massageProducts[]">
                                    <label class="form-check-label" for="kaeso">Kaeso</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="purple-flame"
                                        value="Purple Flame" name="massageProducts[]">
                                    <label class="form-check-label" for="purple-flame">Purple Flame</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="strictly-professional"
                                        value="Strictly Professional" name="massageProducts[]">
                                    <label class="form-check-label" for="strictly-professional">Strictly
                                        Professional</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lotus" value="Lotus"
                                        name="massageProducts[]">
                                    <label class="form-check-label" for="lotus">Lotus</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="elemis" value="Elemis"
                                        name="massageProducts[]">
                                    <label class="form-check-label" for="elemis">Elemis</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="dermalogica"
                                        value="Dermalogica" name="massageProducts[]">
                                    <label class="form-check-label" for="dermalogica">Dermalogica</label>
                                </div>
                            </div>
                            <div class="hair-removal my-5">
                                <h4>Hair Removal Permanent <span
                                        style="font-size: 11px; color: red; font-style: italic;">(N/A For Home
                                        Service)</span></h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="hairRemovalPermanentServices[heading]"
                                        value="Hair Removal Permanent">
                                    <input type="hidden" name="hairRemovalPermanentServices[subHeading]"
                                        value="Services">
                                    <input class="form-check-input" type="checkbox" id="laser" value="Laser"
                                        name="hairRemovalPermanentServices[]">
                                    <label class="form-check-label" for="laser">Laser</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ipl" value="IPL"
                                        name="hairRemovalPermanentServices[]">
                                    <label class="form-check-label" for="ipl">IPL</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="electrolysis"
                                        value="Electrolysis" name="hairRemovalPermanentServices[]">
                                    <label class="form-check-label" for="electrolysis">Electrolysis</label>
                                </div>
                            </div>
                            <div class="body-waxing my-5">
                                <h4>Lady Waxing </h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="ladyWaxingServices[heading]" value="Lady Waxing">
                                    <input type="hidden" name="ladyWaxingServices[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" id="eye-brows" value="Eye Brows"
                                        name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="eye-brows">Eye Brows</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lip" value="Lip"
                                        name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="lip">Lip</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="full-lip" value="Full Lip"
                                        name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="full-lip">Full Lip</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="chin" value="Chin"
                                        name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="chin">Chin</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="neck" value="Neck"
                                        name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="neck">Neck</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="full-arms" value="Full Arms"
                                        name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="full-arms">Full Arms</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="underarms" value="Underarms"
                                        name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="underarms">Underarms</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="forearms" value="Forearms"
                                        name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="forearms">Forearms</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="upper-legs"
                                        value="Upper Legs" name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="upper-legs">Upper Legs</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="full-legs" value="Full Legs"
                                        name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="full-legs">Full Legs</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lower-legs"
                                        value="Lower Legs" name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="lower-legs">Lower Legs</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bikini" value="Bikini"
                                        name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="bikini">Bikini</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="french-bikini"
                                        value="French Bikini<" name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="french-bikini">French Bikini</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="brazilian-bikini"
                                        value="Brazilian Bikini" name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="brazilian-bikini">Brazilian Bikini</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hollywood" value="Hollywood"
                                        name="ladyWaxingServices[]">
                                    <label class="form-check-label" for="hollywood">Hollywood</label>
                                </div>
                                <h5 class="mt-5"><u>Products</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="ladyWaxingProducts[heading]" value="Lady Waxing">
                                    <input type="hidden" name="ladyWaxingProducts[subHeading]" value="Products">
                                    <input class="form-check-input" type="checkbox" id="gigi-honee"
                                        value="Gigi Honee" name="ladyWaxingProducts[]">
                                    <label class="form-check-label" for="gigi-honee">Gigi Honee</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hive-wax" value="Hive wax"
                                        name="ladyWaxingProducts[]">
                                    <label class="form-check-label" for="hive-wax">Hive wax</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lotus-essentials"
                                        value="Lotus Essentials" name="ladyWaxingProducts[]">
                                    <label class="form-check-label" for="lotus-essentials">Lotus Essentials</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="berodinsatin"
                                        value="BerodinSatin" name="ladyWaxingProducts[]">
                                    <label class="form-check-label" for="berodinsatin">BerodinSatin</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cirepil" value="Cirepil"
                                        name="ladyWaxingProducts[]">
                                    <label class="form-check-label" for="cirepil">Cirepil</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="smooth-honery-wax"
                                        value="Smooth Honey Wax" name="ladyWaxingProducts[]">
                                    <label class="form-check-label" for="smooth-honery-wax">Smooth Honey Wax</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="shobha-sugar-wax"
                                        value="Shobha Sugar Wax" name="ladyWaxingProducts[]">
                                    <label class="form-check-label" for="shobha-sugar-wax">Shobha Sugar Wax</label>
                                </div>

                            </div>
                            <div class="body-waxing my-5">
                                <h4>Male Waxing </h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="maleWaxingServices[heading]" value="Male Waxing">
                                    <input type="hidden" name="maleWaxingServices[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" id="full-back" value="Full Back"
                                        name="maleWaxingServices[]">
                                    <label class="form-check-label" for="full-back">Full Back</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="full-legs" value="Full Legs"
                                        name="maleWaxingServices[]">
                                    <label class="form-check-label" for="full-legs">Full Legs</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="full-harms"
                                        value="Full Harms" name="maleWaxingServices[]">
                                    <label class="form-check-label" for="full-harms">Full Harms</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="shoulders" value="Shoulders"
                                        name="maleWaxingServices[]">
                                    <label class="form-check-label" for="shoulders">Shoulders</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="chest-abbs"
                                        value="Chest + Abb" name="maleWaxingServices[]">
                                    <label class="form-check-label" for="chest-abbs">Chest + Abbs</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="speedo-line"
                                        value="Speedo Line" name="maleWaxingServices[]">
                                    <label class="form-check-label" for="speedo-line">Speedo Line</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="manzilian" value="Manzilian"
                                        name="maleWaxingServices[]">
                                    <label class="form-check-label" for="manzilian">Manzilian</label>
                                </div>
                            </div>
                            <div class="manicure-pedicure my-5">
                                <h4>Manicure Pedicure</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="manicurePedicureServices[heading]"
                                        value="Manicure Pedicure">
                                    <input type="hidden" name="manicurePedicureServices[subHeading]"
                                        value="Services">
                                    <input class="form-check-input" type="checkbox" id="traditional-mani-pedi"
                                        value="Traditional Manicures/Pedicures" name="manicurePedicureServices[]">
                                    <label class="form-check-label" for="traditional-mani-pedi">Traditional
                                        Manicures/Pedicures</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="spa-mani-pedi"
                                        value="Spa Manicures/Pedicures" name="manicurePedicureServices[]">
                                    <label class="form-check-label" for="spa-mani-pedi">Spa Manicures/Pedicures</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="get-mani-pedi"
                                        value="Gel Manicure/Pedicure" name="manicurePedicureServices[]">
                                    <label class="form-check-label" for="get-mani-pedi">Gel Manicure/Pedicure</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mani-pedi"
                                        value="Manicure/Pedicure" name="manicurePedicureServices[]">
                                    <label class="form-check-label" for="mani-pedi">Manicure/Pedicure</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="french-mani-pedi"
                                        value="French Manicure/Pedicure" name="manicurePedicureServices[]">
                                    <label class="form-check-label" for="french-mani-pedi">French
                                        Manicure/Pedicure</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="russian-mani-pedi"
                                        value="Russian Manicure/Pedicure" name="manicurePedicureServices[]">
                                    <label class="form-check-label" for="russian-mani-pedi">Russian
                                        Manicure/Pedicure</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="acrylic-nail-extension"
                                        value="Acrylic Nail Extension" name="manicurePedicureServices[]">
                                    <label class="form-check-label" for="acrylic-nail-extension">Acrylic Nail
                                        Extension</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="get-nail-extension"
                                        value="Get Nail Extension" name="manicurePedicureServices[]">
                                    <label class="form-check-label" for="get-nail-extension">Get Nail Extension</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hard-gel" value="Hard Gel"
                                        name="manicurePedicureServices[]">
                                    <label class="form-check-label" for="hard-gel">Hard Gel</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nail-designs"
                                        value="Nail Designs" name="manicurePedicureServices[]">
                                    <label class="form-check-label" for="nail-designs">Nail Designs</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nail-art"
                                        value="Nail Art + Gel Mani" name="manicurePedicureServices[]">
                                    <label class="form-check-label" for="nail-art">Nail Art + Gel Mani</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nail-pedi"
                                        value="Nail Art + Gel Pedi" name="manicurePedicureServices[]">
                                    <label class="form-check-label" for="nail-pedi">Nail Art + Gel Pedi</label>
                                </div>
                                <h5 class="mt-5"><u>Products</u></h5>
                                <input type="hidden" name="manicurePedicureProducts[heading]"
                                    value="Manicure Pedicure">
                                <input type="hidden" name="manicurePedicureProducts[subHeading]" value="Products">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nails-inc"
                                        value="Nails inc." name="manicurePedicureProducts[]">
                                    <label class="form-check-label" for="nails-inc">Nails inc.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="siegel" value="SieGel"
                                        name="manicurePedicureProducts[]">
                                    <label class="form-check-label" for="siegel">SieGel</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="opi" value="OPI"
                                        name="manicurePedicureProducts[]">
                                    <label class="form-check-label" for="opi">OPI</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cnd" value="CND"
                                        name="manicurePedicureProducts[]">
                                    <label class="form-check-label" for="cnd">CND</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gelish" value="Gelish"
                                        name="manicurePedicureProducts[]">
                                    <label class="form-check-label" for="gelish">Gelish</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="zoya" value="Zoya"
                                        name="manicurePedicureProducts[]">
                                    <label class="form-check-label" for="zoya">Zoya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sally-hansen"
                                        value="Sally Hansen" name="manicurePedicureProducts[]">
                                    <label class="form-check-label" for="sally-hansen">Sally Hansen</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kaeso" value="Kaeso"
                                        name="manicurePedicureProducts[]">
                                    <label class="form-check-label" for="kaeso">Kaeso</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ibd-flex"
                                        value="IBD flex polymer powder" name="manicurePedicureProducts[]">
                                    <label class="form-check-label" for="ibd-flex">IBD flex polymer powder</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ibd-grip-monomer-liquid"
                                        value="IBD grip monomer liquid" name="manicurePedicureProducts[]">
                                    <label class="form-check-label" for="ibd-grip-monomer-liquid">IBD grip monomer
                                        liquid</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nail-harmony"
                                        value="Nail harmony" name="manicurePedicureProducts[]">
                                    <label class="form-check-label" for="nail-harmony">Nail harmony</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nsi" value="NSI"
                                        name="manicurePedicureProducts[]">
                                    <label class="form-check-label" for="nsi">NSI</label>
                                </div>
                            </div>
                            <div class="facials my-5">
                                <h4>Salon Facials</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="salonFacialServices[heading]" value="Salon Facials">
                                    <input type="hidden" name="salonFacialServices[subHeading]" value="Services">

                                    <input class="form-check-input" type="checkbox" id="fire-iced-red"
                                        value="Fire And Iced Red Carpet Facial" name="salonFacialServices[]">
                                    <label class="form-check-label" for="fire-iced-red">Fire & Iced Red Carpet
                                        Facial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        id="microdermabrasion-with-crystals" value="Microdermabrasion with Crystals"
                                        name="salonFacialServices[]">
                                    <label class="form-check-label"
                                        for="microdermabrasion-with-crystals">Microdermabrasion
                                        with
                                        Crystals</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="biophora-deep-cleansing"
                                        value="Biophora deep cleansing" name="salonFacialServices[]">
                                    <label class="form-check-label" for="biophora-deep-cleansing">Biophora deep
                                        cleansing</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        id="microdermabrasion-with-hyaluronic" value="Microdermabrasion with Hyaluronic"
                                        name="salonFacialServices[]">
                                    <label class="form-check-label"
                                        for="microdermabrasion-with-hyaluronic">Microdermabrasion with
                                        Hyaluronic</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="acid-infusion"
                                        value="Acid Infusion" name="salonFacialServices[]">
                                    <label class="form-check-label" for="acid-infusion">Acid Infusion</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="oxygen-infused-facial"
                                        value="Oxygen Infused Facial" name="salonFacialServices[]">
                                    <label class="form-check-label" for="oxygen-infused-facial">Oxygen Infused
                                        Facial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hydra-facial-md"
                                        value="Hydra facial MD" name="salonFacialServices[]">
                                    <label class="form-check-label" for="hydra-facial-md">Hydra facial MD </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="micro-facial"
                                        value="Micro Facial" name="salonFacialServices[]">
                                    <label class="form-check-label" for="micro_facial">Micro Facial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="standard-facials"
                                        value="Standard Facials" name="salonFacialServices[]">
                                    <label class="form-check-label" for="standard_facials">Standard Facials</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="dermaplaning"
                                        value="Dermaplaning" name="salonFacialServices[]">
                                    <label class="form-check-label" for="dermaplaning">Dermaplaning</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hydrafacial"
                                        value="Hydrafacial" name="salonFacialServices[]">
                                    <label class="form-check-label" for="hydrafacial">Hydrafacial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="classic-facial"
                                        value="Classic Facial" name="salonFacialServices[]">
                                    <label class="form-check-label" for="classic-facial">Classic Facial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="linphatic-facial"
                                        value="Linphatic Facial" name="salonFacialServices[]">
                                    <label class="form-check-label" for="linphatic-facial">Linphatic Facial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="antioxidant-facial"
                                        value="Antioxidant Facial" name="salonFacialServices[]">
                                    <label class="form-check-label" for="antioxidant-facial">Antioxidant Facial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="acupuncture-facial"
                                        value="Acupuncture facial" name="salonFacialServices[]">
                                    <label class="form-check-label" for="acupuncture-facial">Acupuncture facial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="acne-reduction-facial"
                                        value="Acne Reduction Facial" name="salonFacialServices[]">
                                    <label class="form-check-label" for="acne-reduction-facial">Acne Reduction
                                        Facial</label>
                                </div>

                                <h5 class="mt-5"><u>Products</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="salonFacialProducts[heading]" value="Salon Facials">
                                    <input type="hidden" name="salonFacialProducts[subHeading]" value="Products">
                                    <input class="form-check-input" type="checkbox" id="eve-taylor"
                                        value="Eve Taylor" name="salonFacialProducts[]">
                                    <label class="form-check-label" for="eve_taylor">Eve Taylor</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="environ" value="Environ"
                                        name="salonFacialProducts[]">
                                    <label class="form-check-label" for="environ">Environ</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sans-souis"
                                        value="Sans souis" name="salonFacialProducts[]">
                                    <label class="form-check-label" for="sans_souis">Sans souis</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="elemis" value="Elemis"
                                        name="salonFacialProducts[]">
                                    <label class="form-check-label" for="elemis">Elemis</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="glo-therapeutics"
                                        value="Glo Therapeutics" name="salonFacialProducts[]">
                                    <label class="form-check-label" for="glo-therapeutics">Glo Therapeutics</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mario-badescu"
                                        value="Mario Badescu" name="salonFacialProducts[]">
                                    <label class="form-check-label" for="mario-badescu">Mario Badescu</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="dermalogica"
                                        value="Dermalogica" name="salonFacialProducts[]">
                                    <label class="form-check-label" for="dermalogica">Dermalogica</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="md-formulation"
                                        value="MD Formulation" name="salonFacialProducts[]">
                                    <label class="form-check-label" for="md-formulation">MD Formulation</label>
                                </div>
                            </div>

                            <div class="facials my-5">
                                <h4>Home Service Facials</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="homeServiceFacialServices[heading]"
                                        value="Home Service Facials">
                                    <input type="hidden" name="homeServiceFacialServices[subHeading]"
                                        value="Services">
                                    <input class="form-check-input" type="checkbox" id="hydrafacial"
                                        value="Hydrafacial" name="homeServiceFacialServices[]">
                                    <label class="form-check-label" for="hydrafacial">Hydrafacial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="classic-facial"
                                        value="Classic Facial" name="homeServiceFacialServices[]">
                                    <label class="form-check-label" for="classic-facial">Classic Facial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="linphatic-facial"
                                        value="Linphatic Facial" name="homeServiceFacialServices[]">
                                    <label class="form-check-label" for="linphatic-facial">Linphatic Facial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="antioxidant-facial"
                                        value="Antioxidant Facial" name="homeServiceFacialServices[]">
                                    <label class="form-check-label" for="antioxidant-facial">Antioxidant Facial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="acupuncture-facial"
                                        value="Acupuncture facial" name="homeServiceFacialServices[]">
                                    <label class="form-check-label" for="acupuncture-facial">Acupuncture facial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="acne-reduction-facial"
                                        value="Acne Reduction Facial" name="homeServiceFacialServices[]">
                                    <label class="form-check-label" for="acne-reduction-facial">Acne Reduction
                                        Facial</label>
                                </div>
                            </div>
                            <div class="body-treatments my-5">
                                <h4>Body Treatment <span class="fs-14 ms-3">N/A For Home Service</span></h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="bodyTreatmentServices[heading]"
                                        value="Body Treatment">
                                    <input type="hidden" name="bodyTreatmentServices[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" id="body-polish"
                                        name="bodyTreatmentServices[]" value="Body polish">
                                    <label class="form-check-label" for="body-polish">Body polish</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="body-scrub"
                                        name="bodyTreatmentServices[]" value="Body Scrub">
                                    <label class="form-check-label" for="body-scrub">Body Scrub</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="body-wrap"
                                        name="bodyTreatmentServices[]" value="Body Wrap">
                                    <label class="form-check-label" for="body-wrap">Body Wrap</label>
                                </div>
                            </div>
                            <div class="eyes-brows my-5">
                                <h4>Eyes & Brows</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="EyesAndBrowServices[heading]" value="Eyes & Brows">
                                    <input type="hidden" name="EyesAndBrowServices[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" id="eyelash-extensions"
                                        value="Eyelash Extensions" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="eyelash-extensions">Eyelash Extensions</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="eyebrow-tint"
                                        value="Eyebrow Tint" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="eyebrow-tin">Eyebrow Tint</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lash-lifting"
                                        value="Lash Lifting" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="lash-lifting">Lash Lifting</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="eyebrow-threading"
                                        value="Eyebrow Threading" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="eyebrow-threading">Eyebrow Threading</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="eyelash-tint"
                                        value="Eyelash Tint" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="eyelash-tint">Eyelash Tint</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="brow-lamination"
                                        value="Brow Lamination" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="brow-lamination">Brow Lamination</label>
                                </div>

                                {{-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="eyelash-extensions"
                                        value="Eyelash Extensions" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="eyelash-extensions">Eyelash Extensions</label>
                                </div> --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="classic-full"
                                        value="Eyelash Extensions Classic Full" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="classic-full">Eyelash Extensions Classic
                                        Full</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="classic-half"
                                        value="Eyelash Extensions Classic Half" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="classic-half">Eyelash Extensions Classic
                                        Half</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="clamourous-volume-full"
                                        value="Eyelash Extensions Clamourous Volume Full" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="clamourous-volume-full">Eyelash Extensions
                                        Clamourous Volume
                                        Full</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="clamourous-volume-half"
                                        value="Eyelash Extensions Clamourous Volume Half" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="clamourous-volume-half">Eyelash Extensions
                                        Clamourous Volume
                                        Half</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hybrid-full-set"
                                        value="Eyelash Extensions Hybrid Full Set" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="hybrid-full-set">Eyelash Extensions Hybrid Full
                                        Set</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hybrid-half-set"
                                        value="Eyelash Extensions Hybrid Half Set" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="hybrid-half-set">Eyelash Extensions Hybrid Half
                                        Set</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="eyelash-infil"
                                        value="Eyelash Infil" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="eyelash-infil">Eyelash
                                        Infil</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="eyelash-removal"
                                        value="Eyelash Removal" name="EyesAndBrowServices[]">
                                    <label class="form-check-label" for="eyelash-removal">Eyelash
                                        Removal</label>
                                </div>

                                <h5 class="mt-5"><u>Products</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="EyesAndBrowProducts[heading]" value="Eyes & Brows">
                                    <input type="hidden" name="EyesAndBrowProducts[subHeading]" value="Products">
                                    <input class="form-check-input" type="checkbox" id="london-lash"
                                        value="London lash" name="EyesAndBrowProducts[]">
                                    <label class="form-check-label" for="london-lash">London lash</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="eyelure-lashes"
                                        value="Eyelure lashes" name="EyesAndBrowProducts[]">
                                    <label class="form-check-label" for="eyelure-lashes">Eyelure lashes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lash-art" value="Lash Art"
                                        name="EyesAndBrowProducts[]">
                                    <label class="form-check-label" for="lash-art">Lash Art</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lash-heaven"
                                        value="Lash Heaven" name="EyesAndBrowProducts[]">
                                    <label class="form-check-label" for="lash-heaven">Lash Heaven</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="smart-brow"
                                        value="Smart Brow" name="EyesAndBrowProducts[]">
                                    <label class="form-check-label" for="smart-brow">Smart Brow</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lrefectiocil"
                                        value="LRefectoCil" name="EyesAndBrowProducts[]">
                                    <label class="form-check-label" for="">LRefectoCil</label>
                                </div>

                            </div>
                            <div class="makeup-styles my-5">
                                <h4>Make-Up</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="makeupServives[heading]" value="Make-Up">
                                    <input type="hidden" name="makeupServives[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" id="blow-dry-makeup"
                                        value="Blow-dry & Make-up" name="makeupServives[]">
                                    <label class="form-check-label" for="blow-dry-makeup">Blow-dry & Make-up</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="up-do-makeup"
                                        value="Up-do & Make-up" name="makeupServives[]">
                                    <label class="form-check-label" for="up-do-makeup">Up-do & Make-up</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="make-up" value="Make-up"
                                        name="makeupServives[]">
                                    <label class="form-check-label" for="make-up">Make-up</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bridal-makeup"
                                        value="Bridal Make-up" name="makeupServives[]">
                                    <label class="form-check-label" for="bridal-makeup">Bridal Make-up</label>
                                </div>
                            </div>
                            </p>
                            <button type="button" class="btn customBtn updateProductAndServices"
                                data-dismiss="modal">Okay</button>
                            <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

                        </div>
                        <div class="modal-footer text-center">
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <!-- hairstylist-service-product-modal  -->
        @if ($data->type === 'hairStylist')
            <div class="modal hairstylist-service-product-modal" tabindex="-1" role="dialog" data-keyboard="false"
                data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">Edit Service and Product</h5>
                            <p>
                            <div class="hair-cutting my-5">
                                <h4>Hair-Cutting</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="hairCuttingServices[heading]" value="Hair-Cutting">
                                    <input type="hidden" name="hairCuttingServices[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" name="hairCuttingServices[]"
                                        id="stylist-customer-ladies" value="Ladies">
                                    <label class="form-check-label" for="">Ladies</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="hairCuttingServices[]"
                                        id="stylist-customer-gents" value="Gents">
                                    <label class="form-check-label" for="">Gents</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="hairCuttingServices[]"
                                        id="stylist-customer-kids" value="Kids">
                                    <label class="form-check-label" for="">Kids</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="hairCuttingServices[]"
                                        id="stylist-customer-afro" value="Afro Caribbean">
                                    <label class="form-check-label" for="">Afro Caribbean</label>
                                </div>
                            </div>

                            <div class="wedding-styles my-5">
                                <h4>Wedding-Styles</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="weddingStyleServices[heading]" value="Wedding-Styles">
                                    <input type="hidden" name="weddingStyleServices[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" id="classic-low-chignon"
                                        value="Classic Low Chignon" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="classic-low-chignon">Classic Low
                                        Chignon</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="french-chignon"
                                        value="French Chignon" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="french-chignon">French Chignon</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="updo-flowers"
                                        value="Updo with Flowers" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="updo-flowers">Updo with Flowers</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="smooth-curls"
                                        value="Long, Smooth Curls" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="smooth-curls">Long, Smooth Curls</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="pinned-curls"
                                        value="Pinned Curls" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="pinned-curls">Pinned Curls</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="long-ponytail"
                                        value="Glam Long Ponytail" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="long-ponytail">Glam Long Ponytail</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="braided-barrette"
                                        value="Braided Barrette" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="">Braided Barrette</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hidden-hair-piece"
                                        value="Hidden Hair Piece" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="">Hidden Hair Piece</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fishtail-braid"
                                        value="Fishtail Braid" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="">Fishtail Braid</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="finger-weaves"
                                        value="Classic Finger Weaves" name="weddingStyleServices[]">
                                    <label class="form-check-label" for="">Classic Finger Weaves</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="makeup" value="Makeup"
                                        name="weddingStyleServices[]">
                                    <label class="form-check-label" for="">Makeup</label>
                                </div>
                            </div>

                            <div class="makeup-styles my-5">
                                <h4>Make-Up</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="makeupServives[heading]" value="Make-Up">
                                    <input type="hidden" name="makeupServives[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" id="blow-dry-makeup"
                                        value="Blow-dry & Make-up" name="makeupServives[]">
                                    <label class="form-check-label" for="blow-dry-makeup">Blow-dry & Make-up</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="up-do-makeup"
                                        value="Up-do & Make-up" name="makeupServives[]">
                                    <label class="form-check-label" for="up-do-makeup">Up-do & Make-up</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="make-up" value="Make-up"
                                        name="makeupServives[]">
                                    <label class="form-check-label" for="make-up">Make-up</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bridal-makeup"
                                        value="Bridal Make-up" name="makeupServives[]">
                                    <label class="form-check-label" for="bridal-makeup">Bridal Make-up</label>
                                </div>
                            </div>

                            <div class="male-grooming my-5">
                                <h4>Salon Male Grooming</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="salonMaleGroomingServices[heading]"
                                        value="Salon Male Grooming">
                                    <input type="hidden" name="salonMaleGroomingServices[subHeading]"
                                        value="Services">
                                    <input class="form-check-input" type="checkbox" name="salonMaleGroomingServices[]"
                                        id="scissors-cut" value="Scissors Cut">
                                    <label class="form-check-label" for="scissors-cut">Scissors cut</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="salonMaleGroomingServices[]"
                                        id="clipper-cut" value="Clipper Cut">
                                    <label class="form-check-label" for="clipper-cut">Clipper Cut</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="salonMaleGroomingServices[]"
                                        id="beard-shaped" value="Beard Shaped">
                                    <label class="form-check-label" for="beard-shaped">Beard Shaped</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="salonMaleGroomingServices[]"
                                        id="skin-fade" value="Skin Fade">
                                    <label class="form-check-label" for="skin-fade">Skin Fade</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="salonMaleGroomingServices[]"
                                        id="wet-shave" value="Wet Shave">
                                    <label class="form-check-label" for="wet-shave">Wet Shave</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="salonMaleGroomingServices[]"
                                        id="hot-towel" value="Hot Towel">
                                    <label class="form-check-label" for="">Hot Towel</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="salonMaleGroomingServices[]"
                                        id="chemical-relaxer" value="Chemical Relaxer">
                                    <label class="form-check-label" for="chemical-relaxer">Chemical Relaxer</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="salonMaleGroomingServices[]"
                                        id="gray-blending" value="Gray Blending">
                                    <label class="form-check-label" for="gray-blending">Gray Blending</label>
                                </div>
                            </div>

                            <div class="home-styles my-5">
                                <h4>Home Service Male Grooming</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="homeServiceMaleGroomingServices[heading]"
                                        value="Home Service Male Grooming">
                                    <input type="hidden" name="homeServiceMaleGroomingServices[subHeading]"
                                        value="Services">
                                    <input class="form-check-input" type="checkbox" id="scissors-cut"
                                        value="Scissors Cut" name="homeServiceMaleGroomingServices[]">
                                    <label class="form-check-label" for="scissors-cut">Scissors Cut</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cliper-scissors-cut"
                                        value="Clipper & Scissors Cut" name="homeServiceMaleGroomingServices[]">
                                    <label class="form-check-label" for="cliper-scissors-cut">Clipper & Scissors
                                        Cut</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="clipper=cut"
                                        value="Clipper Cut" name="homeServiceMaleGroomingServices[]">
                                    <label class="form-check-label" for="clipper=cut">Clipper Cut</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="skin-fade" value="Skin Fade"
                                        name="homeServiceMaleGroomingServices[]">
                                    <label class="form-check-label" for="skin-fade">Skin Fade</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="beard-shaped"
                                        value="Beard Shaped" name="homeServiceMaleGroomingServices[]">
                                    <label class="form-check-label" for="beard-shaped">Beard Shaped</label>
                                </div>
                            </div>

                            <div class="styling-products my-5">
                                <h4>Styling Products</h4>
                                <div class="form-check">
                                    <input type="hidden" name="stylingProducts[heading]" value="Styling Products">
                                    {{-- <input type="hidden" name="homeServiceMaleGroomingServices[subHeading]" value="Services"> --}}
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="kerastase" value="Kerastase">
                                    <label class="form-check-label" for="kerastase">Kerastase</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="loreal-tecni-art" value="L'oreal tecni art">
                                    <label class="form-check-label" for="loreal-tecni-ar">L'oreal tecni art</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="schwarzkopf-bc-bonacure" value="Schwarzkopf Bc Bonacure">
                                    <label class="form-check-label" for="schwarzkopf-bc-bonacure">Schwarzkopf bc
                                        bonacure</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="keracare" value="KeraCare">
                                    <label class="form-check-label" for="keracare">KeraCare</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="baxter" value="Baxter">
                                    <label class="form-check-label" for="baxter">Baxter</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="american-crew" value="American Crew">
                                    <label class="form-check-label" for="american-crew">American Crew</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="hanz-de-fuko-hybridized" value="Hanz de Fuko Hybridized">
                                    <label class="form-check-label" for="hanz-de-fuko-hybridized">Hanz de Fuko
                                        Hybridized</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="redken" value="Redken">
                                    <label class="form-check-label" for="redken">Redken</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="fudge" value="Fudge">
                                    <label class="form-check-label" for="fudge">Fudge</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="moroccan-oil" value="Moroccan oil">
                                    <label class="form-check-label" for="moroccan-oil">Moroccan oil</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="kevin-murphy" value="Kevin murphy">
                                    <label class="form-check-label" for="kevin-murphy">Kevin murphy</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="proraso" value="Proraso">
                                    <label class="form-check-label" for="proraso">Proraso</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="jack-dean" value="Jack Dean">
                                    <label class="form-check-label" for="jack-dean">Jack Dean</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="vines-vintage" value="Vines Vintage">
                                    <label class="form-check-label" for="vines-vintage">Vines Vintage</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="baxter-of-california-shave-tonic" value="Baxter Of California Shave Tonic">
                                    <label class="form-check-label" for="baxter-of-california-shave-tonic">Baxter Of
                                        California
                                        Shave
                                        Tonic </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="anita-grant" value="Anita Grant">
                                    <label class="form-check-label" for="nita-grant">Anita Grant</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="wella-eimi" value="Wella EIMI">
                                    <label class="form-check-label" for="wella-eimi">Wella EIMI</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="shu-uemura" value="Shu Uemura">
                                    <label class="form-check-label" for="shu-uemura">Shu USchwarzkopf Bc
                                        Bonacureemura</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                        id="aveda" value="Aveda">
                                    <label class="form-check-label" for="aveda">Aveda</label>
                                </div>
                            </div>
                            <div class="hair-color my-5">
                                <h4>Hair Color</h4>
                                <h5><u>Brands</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="hairColorBrands[heading]" value="Hair Color">
                                    <input type="hidden" name="hairColorBrands[subHeading]" value="Brands">
                                    <input class="form-check-input" type="checkbox" id="loreal" value="L’Oréal"
                                        name="hairColorBrands[]">
                                    <label class="form-check-label" for="loreal">L’Oréal</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="wella" value="Wella"
                                        name="hairColorBrands[]">
                                    <label class="form-check-label" for="wella">Wella</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="schwarzkopf"
                                        value="Schwarzkopf" name="hairColorBrands[]">
                                    <label class="form-check-label" for="schwarzkopf">Schwarzkopf</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="redkenn" value="Redken"
                                        name="hairColorBrands[]">
                                    <label class="form-check-label" for="redken">Redken</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="matrix" value="Matrix"
                                        name="hairColorBrands[]">
                                    <label class="form-check-label" for="matrix">Matrix</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="goldwell" value="Goldwell"
                                        name="hairColorBrands[]">
                                    <label class="form-check-label" for="goldwell">Goldwell</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="avedaa" value="Aveda"
                                        name="hairColorBrands[]">
                                    <label class="form-check-label" for="aveda">Aveda</label>
                                </div>
                                <h5 class="mt-5"><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="hairColorServices[heading]" value="Hair Color">
                                    <input type="hidden" name="hairColorServices[subHeading]" value="Services">
                                    <input class="form-check-input" type="checkbox" id="cut-blowdry"
                                        value="Cut & Blowdry" name="hairColorServices[]">
                                    <label class="form-check-label" for="cut-blowdry">Cut & Blowdry</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="blowdry" value="Blowdry"
                                        name="hairColorServices[]">
                                    <label class="form-check-label" for="blowdry">Blowdry</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="colour" value="Colour"
                                        name="hairColorServices[]">
                                    <label class="form-check-label" for="colour">Colour</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fashion-color"
                                        value="Fashion Color" name="hairColorServices[]">
                                    <label class="form-check-label" for="fashion-color">Fashion Color</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="highlights"
                                        value="Highlights" name="hairColorServices[]">
                                    <label class="form-check-label" for="highlights">Highlights</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="balayage" value="Balayage"
                                        name="hairColorServices[]">
                                    <label class="form-check-label" for="balayage">Balayage</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="colour-correction"
                                        value="Colour Correction" name="hairColorServices[]">
                                    <label class="form-check-label" for="colour-correction">Colour Correction</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="full-head-bleach"
                                        value="Full head bleach" name="hairColorServices[]">
                                    <label class="form-check-label" for="full-head-bleach">Full head bleach</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="up-do" value="Up-do"
                                        name="hairColorServices[]">
                                    <label class="form-check-label" for="up-do">Up-do</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hair-extension"
                                        value="Hair Extension" name="hairColorServices[]">
                                    <label class="form-check-label" for="hair-extension">Hair Extension</label>
                                </div>
                            </div>
                            <div class="chemical-treatments my-5">
                                <h4>Chemical Treatments</h4>
                                <h5><u>Services</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="chemicalTreatmentServices[heading]"
                                        value="Chemical Treatments">
                                    <input type="hidden" name="chemicalTreatmentServices[subHeading]"
                                        value="Services">
                                    <input class="form-check-input" type="checkbox" id="perm" value="Perm"
                                        name="chemicalTreatmentServices[]">
                                    <label class="form-check-label" for="perm">Perm</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="brazilian-blow-dry"
                                        value="Brazilian Blow-dry" name="chemicalTreatmentServices[]">
                                    <label class="form-check-label" for="brazilian-blow-dry">Brazilian Blow-dry</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="keratin-treatment"
                                        value="Keratin Treatment" name="chemicalTreatmentServices[]">
                                    <label class="form-check-label" for="keratin-treatment">Keratin Treatment</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="chemical-relaxer"
                                        value="Chemical Relaxer" name="chemicalTreatmentServices[]">
                                    <label class="form-check-label" for="chemical-relaxer">Chemical Relaxer</label>
                                </div>

                                <h5 class="mt-5"><u>Products</u></h5>
                                <div class="form-check">
                                    <input type="hidden" name="chemicalTreatmentProducts[heading]"
                                        value="Chemical Treatments">
                                    <input type="hidden" name="chemicalTreatmentProducts[subHeading]"
                                        value="Products">
                                    <input class="form-check-input" type="checkbox" id="kerastraight"
                                        value="kerastraight" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="kerastraight">Kerastraight</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="global-keratin"
                                        value="global-keratin" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="global-keratin">Global keratin</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cocochoco-brazilian-keratin"
                                        value="cocochoco-brazilian-keratin" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="cocochoco-brazilian-keratin">Cocochoco
                                        Brazilian
                                        Keratin</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="goldwell-kerasilk"
                                        value="goldwell-kerasilk" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="goldwell-kerasilk">Goldwell KeraSilk </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="schwarzkopf-professional"
                                        value="schwarzkopf-professional" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="schwarzkopf-professional">Schwarzkopf
                                        Professional</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="wella-professionals"
                                        value="wella-professionals" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="wella-professionals">Wella
                                        Professionals</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sibel" value="sibel"
                                        name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="sibel">Sibel</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="loreal-professionnel"
                                        value="loreal-professionnel" name="chemicalTreatmentProducts[]">
                                    <label class="form-check-label" for="loreal-professionnel">L'Oréal
                                        Professionnel</label>
                                </div>
                            </div>
                            </p>
                            <button type="button" class="btn customBtn updateProductAndServices"
                                data-dismiss="modal">Okay</button>

                        </div>
                        <div class="modal-footer text-center">
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </form>
    <!--Success Modal-->
    <div class="modal success-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <h5 class="text-center">Successfull!</h5>
                    <p>Profile Updated!</p>
                    <button type="button" class="btn customBtn" onclick="redirectToPage();">Okay</button>

                </div>
                <div class="modal-footer text-center">
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Images -->
    <div class="modal gallery-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">Edit Gallery</h5>
                    <form id="gallery_images_form">
                        <p>
                        <div class="form-group">
                            <label for="image_uploads" class="color-1">Upload Pictures</label>
                            <input class="form-control" type="file" id="image-gallery" name="image_gallery[]"
                                accept=".jpg, .jpeg, .png" multiple="">
                        </div>
                        </p>
                        <button type="button" class="btn customBtn" data-dismiss="modal"
                            id="updateGalleryImages">Okay</button>
                    </form>


                </div>
                <div class="modal-footer text-center">
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal error-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <h5 class="text-center">Sorry!</h5>
                    <p>
                        The date is already scheduled.
                    </p>
                    <button type="button" class="btn customBtn" data-dismiss="modal"
                        onclick="redirectToPage()">Okay</button>

                </div>
                <div class="modal-footer text-center">
                </div>
            </div>
        </div>
    </div>

    <div class="modal avaliable-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <h5 class="text-center">Updated!</h5>
                    <p>
                        The date has been scheduled.
                    </p>
                    <button type="button" class="btn customBtn" data-dismiss="modal">Okay</button>

                </div>
                <div class="modal-footer text-center">
                </div>
            </div>
        </div>
    </div>
    <div class="modal slots-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">

                </div>
                <form id="book_slots_form">
                    <div class="modal-body">
                        <input type="hidden" id="user_id" name="user_id">
                        <input type="hidden" id="book_type" name="book_type">
                        <input type="hidden" id="slot_book_id" name="slot_book_id">
                        <input type="hidden" id="book_date" name="book_date">
                        <input type="hidden" id="on_hold" name="on_hold">

                        <div class="row">
                            <div class="col-md-12">
                                <h4 style="color: #ffde59 ">Are you sure to <span id="book_or_hold"></span> slot?</h4>
                                <h6><strong>Time: </strong><span id="book_slot_start"></span> - <span
                                        id="book_slot_end"></span> on <strong>Date:</strong>
                                    <span id="book_slot_date"></span>
                                </h6>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer text-center">
                        <button type="button" class="btn customBtn book-slots" id="book-slots">Add</button>
                        <button type="button" class="btn customBtn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-md" id="register_modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content border-warning border"
                style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                    <h4 class="modal-title">Registeration is Free</h4>
                    <i class="close-modal" data-dismiss="modal" style="font-size: 2rem;"><b>&times;</b></i>
                </div>
                <div class="modal-body">
                    Do you want to register your self?
                </div>
                <div class="modal-footer text-center">
                    <a type="" href="{{ route('registration') }}" class="btn customBtn">Ok</a>
                    <a type="button" class="btn customBtn close-modal" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-md" id="tokens_modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content border-warning border"
                style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                    <h4 class="modal-title">Buy Package</h4>
                    <i class="close-modal" data-dismiss="modal" style="font-size: 2rem;"><b>&times;</b></i>
                </div>
                <div class="modal-body">
                    Insufficient tokens you need to buy package!
                </div>
                <div class="modal-footer text-center">
                    <a type=""
                        href="{{ @Auth::user()->type == 'client' ? route('home_service') : route('businessOwner') }}#packages"
                        class="btn customBtn">Ok</a>
                    <a type="button" class="btn customBtn close-modal" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
        });
        window.addEventListener('beforeunload', function() {
            window.scrollTo(0, 0);
        });
        const cart_book = localStorage.getItem('bookType');
        const cartServicesTime = {{ $cartServicesTimeMin }};
        var user = '{{ @Auth::user()->type }}';
    </script>
    <script src="{{ asset('customjs/web/register/common.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('template_old/js/freelancer-profile-calendar.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('customjs/web/profile/profileView.js') }}?v={{ time() }}"></script>
    <script>
        //         setTimeout(() => {
        //             if (user == 'client') {

        //                 $('.book_client').addClass('d-none');

        //                 if (cart_book == 'cart_book') {
        //                     $('.book_client').removeClass('d-none');
        //                 }
        //             }
        //         }, 400);
        window.onload = function() {
            $('.fc-toolbar.fc-header-toolbar').addClass('row col-lg-12');
        };

        // add the responsive classes when navigating with calendar buttons
        $(document).on('click', '.fc-button', function(e) {
            $('.fc-toolbar.fc-header-toolbar').addClass('row col-lg-12');
        });
    </script>
@endpush
