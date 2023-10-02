@extends('layouts.master.template_old.master')
<script>
    const baseURL = "{{ request()->root() }}";
</script>
@push('css')
    <style>
        .option {
            width: 100%;
            border: 1px solid #c4b9b0;
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
    </style>
@endpush
@section('content')
    <div class="profile container">
        <div class="profile-pic text-center aos-init aos-animate" data-aos="fade-up">

            <img alt="" id="profile-image-id"
                src="{{ asset(isset($data->hero_image) ? $data->hero_image : 'template_old/images/blank.png') }}"
                width="100%">


            <p><a class="text-center btn edit_pro_pic" onclick="editProfilePic()" title="Edit">+</a></p>
        </div>

        <div class="row my-4">
            <div class="col-4 text-center">
                <div class="profile btn customBtn" id="profile">Profile</div>
            </div>
            {{-- <div class="col-4 text-center">
                <div class="products btn customBtn" id="products">Product</div>
            </div>
            <div class="col-4 text-center">
                <div class="service btn customBtn" id="service">Service</div>
            </div> --}}
        </div>
        <div class="row mb-5 justify-content-center">
            <div class="showProfile col-10 text-left mt-4" id="showProfile">
                <div class="name row "><label class="color-1 col-lg-3">Client's Name : </label>
                    <p class="col-lg-9" id="ownerName"></p>
                </div>
                <div class="Address row "><label class="color-1 col-lg-3">Client's Address : </label>
                    <p class="col-lg-9" id="owner-address"></p>
                </div>
                <div class="Postcode row "><label class="color-1 col-lg-3">Client's postcode : </label>
                    <p class="col-lg-9" id="owner-postcode"></p>
                </div>
                <div class="phone row "><label class="color-1 col-lg-3">Client's Phone : </label>
                    <p class="col-lg-9" id="owner-phone"></p>
                </div>
                <div class="email row"><label class="color-1 col-lg-3">Email : </label>
                    <p class="col-lg-9" id="owner-email"></p>
                </div>
                <div class="status row">
                    <label class="color-1 col-lg-3">Profile Status : </label>
                    <p class="col-lg-9" id="status"></p>

                </div>
                <div class="status row">
                    <label class="color-1 col-lg-3">Total Tokens : </label>
                    <p class="col-lg-9" id="total_tokens"></p>

                </div>
                <div class="status row">
                    <label class="color-1 col-lg-3">Remaining Tokens : </label>
                    <p class="col-lg-9" id="remaining_tokens"></p>

                </div>
            </div>
        </div>
        <!-- modals -->
        <!-- Status -->
        <div class="modal status-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog " role="document">
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
                        <button type="button" class="btn customBtn" data-dismiss="modal">Okay</button>
                        <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>
        <!-- edit profile picture -->
        <div class="modal profile-pic-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog " role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header"><button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;
                            </span></button></div>
                    <div class="modal-body">
                        <h5 class="text-center">Edit Profile Picture</h5>
                        <form id="hero_image_form">
                            <input type="hidden" name="type" value="{{ Auth::user()->type }}">
                            <p>
                            <div class="profilePicture">
                                <img id="blah" src="images/blank.png" alt="your image"> <br>

                                <input id="stylist-picture" name="stylist_picture" class="my-4 hidden" type="file"
                                    accept=".jpg, .jpeg, .png" onchange="loadFileProfile(event)" placeholder="upload">
                                <label for="stylist-picture">+</label>
                            </div>
                            </p>
                            <button type="submit" id="updateProfileImage" class="btn customBtn ">Okay</button>
                        </form>
                    </div>
                    <div class="modal-footer text-center"></div>
                </div>
            </div>
        </div>

        <form action="" id="updateBasicInfoProfile">
            <input type="hidden" name="type" value="{{ Auth::user()->type }}">
            <!-- edit name -->
            <div class="modal name-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog " role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header"><button type="button" class="close" data-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true">&times;
                                </span></button></div>
                        <div class="modal-body">
                            <!-- <form id="name-mobile-form">-->
                            <h5 class="text-center">Edit Name</h5>
                            <p>
                            <div class="form-group"><input type="text" class="form-control" id="stylist-name"
                                    name="owner_name" aria-describedby="stylist-name" placeholder="Name">
                            </div>
                            <div class="form-group"><input type="text" class="form-control" id="stylist-surname"
                                    name="owner_surname" aria-describedby="stylist-surname" placeholder="Surname">
                            </div>
                            </p><button type="button" class="btn customBtn updateBasicInfoProfile"
                                data-dismiss="modal">Okay</button>
                            <!-- <button type="button" class="btn customBtn" data-dismiss="modal">
                                                                                                                                                                            Okay</button>--><!-- </form>-->
                        </div>
                        <div class="modal-footer text-center"></div>
                    </div>
                </div>
            </div>
            <!-- edit mobile number -->
            <div class="modal mobile-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog " role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header"><button type="button" class="close" data-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true">&times;
                                </span></button></div>
                        <div class="modal-body">
                            <!-- <form id="name-mobile-form">-->
                            <h5 class="text-center">Edit Mobile</h5>
                            <p>
                            <div class="form-group"><input type="number" class="form-control" id="stylist-mobile"
                                    name="owner_telephone" aria-describedby="stylist-mobile" placeholder="Mobile"></div>
                            </p><button type="button" class="btn customBtn updateBasicInfoProfile"
                                data-dismiss="modal">Okay</button>
                            <!-- <button type="button" class="btn customBtn" data-dismiss="modal">
                                                                                                                                                                                Okay</button>--><!-- </form>-->
                        </div>
                        <div class="modal-footer text-center"></div>
                    </div>
                </div>
            </div>
            <!-- edit address -->
            <div class="modal address-modal" tabindex="-1" role="dialog" data-keyboard="false"
                data-backdrop="static">
                <div class="modal-dialog " role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header"><button type="button" class="close" data-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true">&times;
                                </span></button></div>
                        <div class="modal-body">
                            <!-- <form id="name-mobile-form">-->
                            <h5 class="text-center">Edit Address</h5>
                            <p>
                            <div class="form-group">
                                <textarea class="form-control" id="stylist-address" name="owner_address" rows="3" placeholder="Address"
                                    spellcheck="false"></textarea>
                            </div>
                            </p><button type="button" class="btn customBtn updateBasicInfoProfile"
                                data-dismiss="modal">Okay</button>
                            <!-- <button type="button" class="btn customBtn" data-dismiss="modal">
                                                                                                                                                                                    Okay</button>--><!-- </form>-->
                        </div>
                        <div class="modal-footer text-center"></div>
                    </div>
                </div>
            </div>
            <!-- edit Postcode -->
            <div class="modal postcode-modal" tabindex="-1" role="dialog" data-keyboard="false"
                data-backdrop="static">
                <div class="modal-dialog " role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header"><button type="button" class="close" data-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true">&times;
                                </span></button></div>
                        <div class="modal-body">
                            <!-- <form id="name-mobile-form">-->
                            <h5 class="text-center">Edit Postcode
                            </h5>
                            <p>
                            <div class="form-group"><input type="text" class="form-control" id="stylist-postcode"
                                    name="owner_postcode" aria-describedby="owner-postcode" placeholder="Postcode"></div>
                            </p><button type="button" class="btn customBtn updateBasicInfoProfile"
                                data-dismiss="modal">Okay</button>
                            <!-- <button type="button" class="btn customBtn"
                                                                                                                                                                                        data-dismiss="modal">Okay</button>-->
                            <!-- </form>-->
                        </div>
                        <div class="modal-footer text-center"></div>
                    </div>
                </div>
            </div>
            <!-- Status -->
            <div class="modal status-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog " role="document">
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
                                    <select class="form-control" id="stylist_status" name="owner_status">
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
        </form>
        <!-- Footer -->
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
    </script>
    <script src="{{ asset('customjs/web/register/common.js') }}"></script>
    <script src="{{ asset('customjs/web/profile/clientProfile.js') }}"></script>
@endpush
