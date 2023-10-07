@extends('layouts.master.template_old.master')

<script>
    const baseURL = "{{ request()->root() }}";
   	const userId = "{{@$data->id}}";
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

        <div class="profile-pic text-center" data-aos="fade-up">
            <img id="profile-image-id" alt="">
            {{-- <p><a class="text-center btn edit_pro_pic" onclick="editProfilePic()" title="Edit">+</a></p> --}}
        </div>

		<div class="row my-4">
            <div class="col-4 text-center">
                <div class="profile btn customBtn" id="profile">Profile</div>
            </div>
            <div class="col-4 text-center">
                <div class="products btn customBtn" id="products">Product</div>
            </div>
            <div class="col-4 text-center">
                <div class="service btn customBtn" id="service">Service</div>
            </div>

        </div>

        <div class="row mb-5 justify-content-center">
            <div class="showProfile col-10 text-left mt-4" id="showProfile">
                <div class="name row ">
                    <label class="color-1 col-lg-3">Owner's Name : </label>
                    	{{--@if (@$membership > 0)--}}
                    	<p class="col-lg-9" id="ownerName"></p>
                    	{{--@endif--}}
                </div>
                <div class="Address row ">
                    <label class="color-1 col-lg-3">Owner's Address : </label>
                    <p class="col-lg-9" id="owner-address"></p>
                </div>
                <div class="Postcode row ">
                    <label class="color-1 col-lg-3">Owner's postcode : </label>
                    <p class="col-lg-9" id="owner-postcode"></p>
                </div>
                <div class="phone row ">
                    <label class="color-1 col-lg-3">Owner's Phone : </label>
                    <p class="col-lg-9" id="owner-phone"></p>
                </div>

                <div class="email row">
                    <label class="color-1 col-lg-3">Email : </label>
                    {{--@if (@$membership > 0) --}}
                    <p class="col-lg-9" id="owner-email"></p>
                    {{--@endif--}}
                </div>


            </div>
            <div class="showProducts col-10 text-center mt-5" id="showProducts">
                <div class="text-left mt-4">
                    <h3>Products <!-- <a class="text-center btn" onclick="editServiceAndProduct();" title="Edit">✎</a> -->
                    </h3>
                    <div class="text-left">
                        <h4 class="font-weight-bold" id="stylingProductsheading"></h4>
                        <p id="stylingProductsPara"></p>
                    </div>

                    <div class="text-left">
                        <h4 class="font-weight-bold" id="chemicalTreatmentProductsheading"></h4>
                        <p id="chemicalTreatmentProductsPara"></p>
                    </div>

                    <div class="text-left">
                        <h4 class="font-weight-bold" id="EyesAndBrowProductsheading"></h4>
                        <p id="EyesAndBrowProductsPara"></p>

                    </div>
                    <div class="text-left">
                        <h4 class="font-weight-bold" id="bodyTreatmentProductsheading"></h4>
                        <p id="bodyTreatmentProductsPara"></p>

                    </div>
                    <div class="text-left">
                        <h4 class="font-weight-bold" id="bodyWaxingProductsheading"></h4>
                        <p id="bodyWaxingProductsPara"></p>

                    </div>

                    <div class="text-left">
                        <h4 class="font-weight-bold" id="facialProductsheading"></h4>
                        <p id="facialProductsPara"></p>

                    </div>

                    <div class="text-left">
                        <h4 class="font-weight-bold" id="manicurePedicureProductsheading"></h4>
                        <p id="manicurePedicureProductsPara"></p>

                    </div>
                    <div class="text-left">
                        <h4 class="font-weight-bold" id="massageProductsheading"></h4>
                        <p id="massageProductsPara"></p>
                    </div>

                </div>

            </div>
            <div class="showService col-10 text-center mt-5" id="showService">
                <div class="text-left  mt-4">
                    <h3>Services <!-- <a class="text-center btn" onclick="editServiceAndProduct();" title="Edit">✎</a> -->
                    </h3>

                    <div class="text-left">
                        <h4 class="font-weight-bold" id="hairCuttingServicesheading"></h4>
                        <p id="hairCuttingServicesPara"></p>

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
                        <h4 class="font-weight-bold" id="hairColorBrandsheading"></h4>
                        <p id="hairColorBrandsPara"></p>
                    </div>
                    <div class="text-left">
                        <h4 class="font-weight-bold" id="chemicalTreatmentServicesheading"></h4>
                        <p id="chemicalTreatmentServicesPara"></p>

                    </div>

                    <div class="text-left">
                        <h4 class="font-weight-bold" id="EyesAndBrowServicesheading"></h4>
                        <p id="EyesAndBrowServicesPara"></p>

                    </div>
                    <div class="text-left">
                        <h4 class="font-weight-bold" id="bodyTreatmentServicesheading"></h4>
                        <p id="bodyTreatmentServicesPara"></p>

                    </div>
                    <div class="text-left">
                        <h4 class="font-weight-bold" id="bodyWaxingServicesheading"></h4>
                        <p id="bodyWaxingServicesPara"></p>

                    </div>
                    <div class="text-left">
                        <h4 class="font-weight-bold" id="facialServicesheading"></h4>
                        <p id="facialServicesPara"></p>

                    </div>
                    <div class="text-left">
                        <h4 class="font-weight-bold" id="hairRemovalPermanentServicesheading"></h4>
                        <p id="hairRemovalPermanentServicesPara"></p>

                    </div>
                    <div class="text-left">
                        <h4 class="font-weight-bold" id="manicurePedicureServicesheading"></h4>
                        <p id="manicurePedicureServicesPara"></p>

                    </div>

                    <div class="text-left">
                        <h4 class="font-weight-bold" id="massageServicesheading"></h4>
                        <p id="massageServicesPara"></p>

                    </div>

                </div>
            </div>

        </div>
        <!-- modals -->

        <!-- edit profile picture -->
        <div class="modal profile-pic-modal" tabindex="-1" role="dialog" data-keyboard="false"
            data-backdrop="static">
            <div class="modal-dialog " role="document">
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
                            <button type="submit" id="updateProfileImage" class="btn customBtn ">Okay</button>
                        </form>

                        <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>

        <!-- edit name  -->

        <form action="" id="updateBasicInfoProfile">
            <input type="hidden" name="type" value="{{ @$data->type }}">
            <div class="modal name-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog " role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- <form id="name-mobile-form"> -->
                            <h5 class="text-center">Edit Name</h5>
                            <p>
                            <div class="form-group">
                                <input type="text" class="form-control" id="stylist-name" name="owner_name"
                                    aria-describedby="stylist-name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="stylist-surname" name="owner_surname"
                                    aria-describedby="stylist-surname" placeholder="Surname">
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

            <!-- edit  mobile number -->

            <div class="modal mobile-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog " role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- <form id="name-mobile-form"> -->
                            <h5 class="text-center">Edit Mobile</h5>
                            <p>
                            <div class="form-group">
                                <input type="tel" class="form-control" id="stylist-mobile" name="owner_telephone"
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

            <!-- edit address -->

            <div class="modal address-modal" tabindex="-1" role="dialog" data-keyboard="false"
                data-backdrop="static">
                <div class="modal-dialog " role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- <form id="name-mobile-form"> -->
                            <h5 class="text-center">Edit Address</h5>
                            <p>
                            <div class="form-group">
                                <textarea class="form-control" id="stylist-address" name="owner_address" rows="3" placeholder="Address"
                                    spellcheck="false"></textarea>
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

            <!-- edit Postcode -->

            <div class="modal postcode-modal" tabindex="-1" role="dialog" data-keyboard="false"
                data-backdrop="static">
                <div class="modal-dialog " role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- <form id="name-mobile-form"> -->
                            <h5 class="text-center">Edit Postcode</h5>
                            <p>
                            <div class="form-group">
                                <input type="text" class="form-control" id="stylist-postcode" name="owner_postcode"
                                    aria-describedby="owner-postcode" placeholder="Postcode">
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
        </form>
        <!-- service and products -->
        <form action="" id="updateProductAndServices">
            @if ($data->type == 'hairdressingSalon')
                <div class="modal Hairdressing-service-product-modal" tabindex="-1" role="dialog"
                    data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- <form id="name-mobile-form"> -->
                                <h5 class="text-center">Edit Service And Product</h5>
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
                                <div class="male-grooming my-5">
                                    <h4>Barber Male Grooming</h4>
                                    <h5><u>Services</u></h5>
                                    <div class="form-check">
                                        <input type="hidden" name="barberMaleGroomingServices[heading]"
                                            value="Barber Male Grooming">
                                        <input type="hidden" name="barberMaleGroomingServices[subHeading]"
                                            value="Services">
                                        <input class="form-check-input" type="checkbox"
                                            name="barberMaleGroomingServices[]" id="scissors-cut" value="Scissors Cut">
                                        <label class="form-check-label" for="scissors-cut">Scissors Cut</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="barberMaleGroomingServices[]" id="clipper-cut" value="Clipper Cut">
                                        <label class="form-check-label" for="clipper-cut">Clipper Cut</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="barberMaleGroomingServices[]" id="beard-shaped" value="Beard Shaped">
                                        <label class="form-check-label" for="beard-shaped">Beard Shaped</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="barberMaleGroomingServices[]" id="skin-fade" value="Skin Fade">
                                        <label class="form-check-label" for="skin-fade">Skin Fade</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="barberMaleGroomingServices[]" id="wet-shave" value="Wet Shave">
                                        <label class="form-check-label" for="wet-shave">Wet Shave</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="barberMaleGroomingServices[]" id="hot-towel" value="Hot towel">
                                        <label class="form-check-label" for="">Hot Towel</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="barberMaleGroomingServices[]" id="chemical-relaxer"
                                            value="Chemical Relaxer">
                                        <label class="form-check-label" for="chemical-relaxer">Chemical Relaxer</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="barberMaleGroomingServices[]" id="gray-blending" value="Gray Blending">
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
                                            id="loreal-tecni-art" value="L'oreal Tecni Art">
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
                                            id="redken" value="Redken">
                                        <label class="form-check-label" for="redken">Redken</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                            id="anita-grant" value="Anita Grant">
                                        <label class="form-check-label" for="nita-grant">Anita Grant</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                            id="fudge" value="Fudge">
                                        <label class="form-check-label" for="fudge">Fudge</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                            id="moroccan-oil" value="Moroccan Oil">
                                        <label class="form-check-label" for="moroccan-oil">Moroccan Oil</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                            id="kevin-murphy" value="Kevin Murphy">
                                        <label class="form-check-label" for="kevin-murphy">Kevin Murphy</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                                            id="proraso" value="Proraso">
                                        <label class="form-check-label" for="proraso">Proraso</label>
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
                                        <input class="form-check-input" type="checkbox" id="redken" value="Redken"
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
                                        <input class="form-check-input" type="checkbox" id="aveda" value="Aveda"
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
                                            value="Full Head Bleach" name="hairColorServices[]">
                                        <label class="form-check-label" for="full-head-bleach">Full Head Bleach</label>
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
                                        <label class="form-check-label" for="brazilian-blow-dry">Brazilian
                                            Blow-dry</label>
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
                                            value="Global Keratin" name="chemicalTreatmentProducts[]">
                                        <label class="form-check-label" for="global-keratin">Global Keratin</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="cocochoco-brazilian-keratin"
                                            value="Cocochoco Brazilian" name="chemicalTreatmentProducts[]">
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
                                <!-- <button type="button" class="btn customBtn" data-dismiss="modal" >Okay</button> -->
                                <!-- </form> -->

                            </div>
                            <div class="modal-footer text-center">
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($data->type != 'hairdressingSalon')
                <div class="modal Beauty-service-product-modal" tabindex="-1" role="dialog" data-keyboard="false"
                    data-backdrop="static">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- <form id="name-mobile-form"> -->
                                <h5 class="text-center">Edit Service And Product</h5>
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
                                        <label class="form-check-label" for="pregnancy-massage">Pregnancy Massage</label>
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
                                    <h4>Hair Removal Permanent</h4>
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
                                    <h4>Body Waxing </h4>
                                    <h5><u>Services</u></h5>
                                    <div class="form-check">
                                        <input type="hidden" name="bodyWaxingServices[heading]" value="Body Waxing">
                                        <input type="hidden" name="bodyWaxingServices[subHeading]" value="Services">
                                        <input class="form-check-input" type="checkbox" id="eye-brows" value="Eye Brows"
                                            name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="eye-brows">Eye Brows</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lip" value="Lip"
                                            name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="lip">Lip</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="chin" value="Chin"
                                            name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="chin">Chin</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="neck" value="Neck"
                                            name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="neck">Neck</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="full-arms" value="Full Arms"
                                            name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="full-arms">Full Arms</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="underarms"
                                            value="Underarms" name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="underarms">Underarms</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="forearms"
                                            value="Forearms" name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="forearms">Forearms</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="upper-legs"
                                            value="Upper Legs" name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="upper-legs">Upper Legs</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="full-legs"
                                            value="Full Legs" name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="full-legs">Full Legs</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lower-legs"
                                            value="Lower Legs" name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="lower-legs">Lower Legs</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="bikini"
                                            value="Bikini" name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="bikini">Bikini</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="french-bikini"
                                            value="French Bikini" name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="french-bikini">French Bikini</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="brazilian-bikini"
                                            value="Brazilian Bikini" name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="brazilian-bikini">Brazilian Bikini</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hollywood"
                                            value="Hollywood" name="bodyWaxingServices[]">
                                        <label class="form-check-label" for="hollywood">Hollywood</label>
                                    </div>
                                    <h5 class="mt-5"><u>Products</u></h5>
                                    <div class="form-check">
                                        <input type="hidden" name="bodyWaxingProducts[heading]" value="Body Waxing">
                                        <input type="hidden" name="bodyWaxingProducts[subHeading]" value="Products">
                                        <input class="form-check-input" type="checkbox" id="gigi-honee"
                                            value="Gigi Honee" name="bodyWaxingProducts[]">
                                        <label class="form-check-label" for="gigi-honee">Gigi Honee</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hive-wax"
                                            value="Hive wax" name="bodyWaxingProducts[]">
                                        <label class="form-check-label" for="hive-wax">Hive wax</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lotus-essentials"
                                            value="Lotus Essentials" name="bodyWaxingProducts[]">
                                        <label class="form-check-label" for="lotus-essentials">Lotus Essentials</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="berodinsatin"
                                            value="BerodinSatin" name="bodyWaxingProducts[]">
                                        <label class="form-check-label" for="berodinsatin">BerodinSatin</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="cirepil"
                                            value="Cirepil" name="bodyWaxingProducts[]">
                                        <label class="form-check-label" for="cirepil">Cirepil</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="smooth-honery-wax"
                                            value="Smooth Honey Wax" name="bodyWaxingProducts[]">
                                        <label class="form-check-label" for="smooth-honery-wax">Smooth Honey Wax</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="shobha-sugar-wax"
                                            value="Shobha Sugar Wax" name="bodyWaxingProducts[]">
                                        <label class="form-check-label" for="shobha-sugar-wax">Shobha Sugar Wax</label>
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
                                        <label class="form-check-label" for="spa-mani-pedi">Spa
                                            Manicures/Pedicures</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="get-mani-pedi"
                                            value="Gel Manicure/Pedicure" name="manicurePedicureServices[]">
                                        <label class="form-check-label" for="get-mani-pedi">Gel
                                            Manicure/Pedicure</label>
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
                                        <input class="form-check-input" type="checkbox" id="acrylic-nail-extension"
                                            value="Acrylic Nail Extension" name="manicurePedicureServices[]">
                                        <label class="form-check-label" for="acrylic-nail-extension">Acrylic Nail
                                            Extension</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="get-nail-extension"
                                            value="Gel Nail Extension" name="manicurePedicureServices[]">
                                        <label class="form-check-label" for="get-nail-extension">Gel Nail
                                            Extension</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="nail-designs"
                                            value="Nail Designs" name="manicurePedicureServices[]">
                                        <label class="form-check-label" for="nail-designs">Nail Designs</label>
                                    </div>
                                    <h5 class="mt-5"><u>Products</u></h5>
                                    <div class="form-check">
                                        <input type="hidden" name="manicurePedicureProducts[heading]"
                                            value="Manicure Pedicure">
                                        <input type="hidden" name="manicurePedicureProducts[subHeading]"
                                            value="Products">
                                        <input class="form-check-input" type="checkbox" id="nails-inc"
                                            value="Nails inc." name="manicurePedicureProducts[]">
                                        <label class="form-check-label" for="nails-inc">Nails inc.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="siegel"
                                            value="SieGel" name="manicurePedicureProducts[]">
                                        <label class="form-check-label" for="siegel">SieGel</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="opi"
                                            value="OPI" name="manicurePedicureProducts[]">
                                        <label class="form-check-label" for="opi">OPI</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="cnd"
                                            value="CND" name="manicurePedicureProducts[]">
                                        <label class="form-check-label" for="cnd">CND</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gelish"
                                            value="Gelish" name="manicurePedicureProducts[]">
                                        <label class="form-check-label" for="gelish">Gelish</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="zoya"
                                            value="Zoya" name="manicurePedicureProducts[]">
                                        <label class="form-check-label" for="zoya">Zoya</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sally-hansen"
                                            value="Sally Hansen" name="manicurePedicureProducts[]">
                                        <label class="form-check-label" for="sally-hansen">Sally Hansen</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="kaeso"
                                            value="Kaeso" name="manicurePedicureProducts[]">
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
                                        <input class="form-check-input" type="checkbox" id="nsi"
                                            value="NSI" name="manicurePedicureProducts[]">
                                        <label class="form-check-label" for="nsi">NSI</label>
                                    </div>
                                </div>

                                <div class="facials my-5">
                                    <h4>Facials</h4>
                                    <h5><u>Services</u></h5>
                                    <div class="form-check">
                                        <input type="hidden" name="facialServices[heading]" value="Facials">
                                        <input type="hidden" name="facialServices[subHeading]" value="Services">
                                        <input class="form-check-input" type="checkbox" id="fire-iced-red"
                                            value="Fire And Iced Red Carpet Facial" name="facialServices[]">
                                        <label class="form-check-label" for="fire-iced-red">Fire & Iced Red Carpet
                                            Facial</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            id="microdermabrasion-with-crystals" value="Microdermabrasion with Crystals"
                                            name="facialServices[]">
                                        <label class="form-check-label"
                                            for="microdermabrasion-with-crystals">Microdermabrasion
                                            with
                                            Crystals</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="biophora-deep-cleansing"
                                            value="Biophora deep cleansing" name="facialServices[]">
                                        <label class="form-check-label" for="biophora-deep-cleansing">Biophora deep
                                            cleansing</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            id="microdermabrasion-with-hyaluronic"
                                            value="Microdermabrasion with Hyaluronic" name="facialServices[]">
                                        <label class="form-check-label"
                                            for="microdermabrasion-with-hyaluronic">Microdermabrasion with
                                            Hyaluronic</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="acid-infusion"
                                            value="Acid Infusion" name="facialServices[]">
                                        <label class="form-check-label" for="acid-infusion">Acid Infusion</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="oxygen-infused-facial"
                                            value="Oxygen Infused Facial" name="facialServices[]">
                                        <label class="form-check-label" for="oxygen-infused-facial">Oxygen Infused
                                            Facial</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hydra-facial-md"
                                            value="Hydra facial MD" name="facialServices[]">
                                        <label class="form-check-label" for="hydra-facial-md">Hydra facial MD </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="micro-facial"
                                            value="Micro Facial" name="facialServices[]">
                                        <label class="form-check-label" for="micro-facial">Micro Facial</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="standard-facials"
                                            value="Standard Facials" name="facialServices[]">
                                        <label class="form-check-label" for="standard-facials">Standard Facials</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="dermaplaning"
                                            value="Dermaplaning" name="facialServices[]">
                                        <label class="form-check-label" for="dermaplaning">Dermaplaning</label>
                                    </div>
                                    <h5 class="mt-5"><u>Products</u></h5>
                                    <div class="form-check">
                                        <input type="hidden" name="facialProducts[heading]" value="Facials">
                                        <input type="hidden" name="facialProducts[subHeading]" value="Services">

                                        <input class="form-check-input" type="checkbox" id="eve-taylor"
                                            value="Eve Taylor" name="facialProducts[]">
                                        <label class="form-check-label" for="eve-taylor">Eve Taylor</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="environ"
                                            value="Environ" name="facialProducts[]">
                                        <label class="form-check-label" for="environ">Environ</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sans-souis"
                                            value="Sans souis" name="facialProducts[]">
                                        <label class="form-check-label" for="sans-souis">Sans souis</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="elemis"
                                            value="Elemis" name="facialProducts[]">
                                        <label class="form-check-label" for="elemis">Elemis</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="glo-therapeutics"
                                            value="Glo Therapeutics" name="facialProducts[]">
                                        <label class="form-check-label" for="glo-therapeutics">Glo Therapeutics</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="mario-badescu"
                                            value="Mario Badescu" name="facialProducts[]">
                                        <label class="form-check-label" for="mario-badescu">Mario Badescu</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="dermalogica"
                                            value="Dermalogica" name="facialProducts[]">
                                        <label class="form-check-label" for="dermalogica">Dermalogica</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="md-formulation"
                                            value="MD Formulation" name="facialProducts[]">
                                        <label class="form-check-label" for="md-formulation">MD Formulation</label>
                                    </div>
                                </div>

                                <div class="body-treatments my-5">
                                    <h4>Body Treatment</h4>
                                    <h5><u>Services</u></h5>
                                    <div class="form-check">
                                        <input type="hidden" name="bodyTreatmentServices[heading]"
                                            value="Body Treatment">
                                        <input type="hidden" name="bodyTreatmentServices[subHeading]"
                                            value="Services">
                                        <input class="form-check-input" type="checkbox" id="body-polish"
                                            value="Body polish" name="bodyTreatmentServices[]">
                                        <label class="form-check-label" for="body-polish">Body polish</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="body-scrub"
                                            value="Body Scrub" name="bodyTreatmentServices[]">
                                        <label class="form-check-label" for="body-scrub">Body Scrub</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="body-wrap"
                                            value="Body Wrap" name="bodyTreatmentServices[]">
                                        <label class="form-check-label" for="body-wrap">Body Wrap</label>
                                    </div>
                                </div>
                                <div class="eyes-brows my-5">
                                    <h4>Eyes & Brows</h4>
                                    <h5><u>Services</u></h5>
                                    <div class="form-check">
                                        <input type="hidden" name="EyesAndBrowServices[heading]"
                                            value="Eyes & Brows">
                                        <input type="hidden" name="EyesAndBrowServices[subHeading]" value="Services">
                                        <input class="form-check-input" type="checkbox" id="eyelash-extensions"
                                            value="Eyelash Extensions" name="EyesAndBrowServices[]">
                                        <label class="form-check-label" for="eyelash-extensions">Eyelash
                                            Extensions</label>
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
                                        <label class="form-check-label" for="eyebrow-threading">Eyebrow
                                            Threading</label>
                                    </div>
                                    <h5 class="mt-5"><u>Products</u></h5>
                                    <div class="form-check">
                                        <input type="hidden" name="EyesAndBrowProducts[heading]"
                                            value="Eyes & Brows">
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
                                        <input class="form-check-input" type="checkbox" id="lash-art"
                                            value="Lash Art" name="EyesAndBrowProducts[]">
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
                                </p>
                                <button type="button" class="btn customBtn updateProductAndServices"
                                    data-dismiss="modal">Okay</button>
                                <!-- <button type="button" class="btn customBtn" data-dismiss="modal" >Okay</button> -->
                                <!-- </form> -->

                            </div>
                            <div class="modal-footer text-center">
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </form>



        <!--Success Modal-->
        <div class="modal success-modal" tabindex="-1" role="dialog" data-keyboard="false"
            data-backdrop="static">
            <div class="modal-dialog " role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                                                                                                                                                                                                                  <span aria-hidden="true">&times;</span>
                                                                                                                                                                                                                                                                                                                                </button> -->
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Successfull!</h5>
                        <p>Profile Updated!</p>
                        <button type="button" class="btn customBtn" onclick="redirectToPage()">Okay</button>

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>

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
    <script src="{{ asset('customjs/web/register/common.js') }}?v={{time()}}"></script>
    <script src="{{ asset('customjs/web/profile/salonOwnerProfileView.js') }}?v={{time()}}"></script>
@endpush
