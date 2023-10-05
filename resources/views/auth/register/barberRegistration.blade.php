@extends('layouts.master.template_old.master')

@push('css')
@endpush

@section('content')
    <div class="newProfile container my-5">
        <div class="newProfile-header">
            <h4>Barber Profile Building</h4>
        </div>
        <div>
            <form id="register_form" class="my-5">
                <input type="hidden" name="type" value="barber">
                <div class="profilePicture">
                    <img id="blah" class="rounded-circle" src="{{ asset('template_old/images/blank.png') }}"
                        alt="your image" /> <br>

                    <input id="stylist-picture" name="stylist_picture" accept=".jpg, .jpeg, .png"
                        class="my-4 col-lg-6 hidden" type='file' onchange="loadFile(event);" />
                    <label for="stylist-picture">+</label>

                </div>
                <div class="personalDetails">
                    <h4>Personal Details</h4>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="stylist-name" name="stylist_name"
                            aria-describedby="stylist-name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="stylist-surname" name="stylist_surname"
                            aria-describedby="stylist-surname" placeholder="Surname">
                    </div>
                    <div class="form-group text-right col-lg-6 exclamation">
                        <i class="fa fa-exclamation-circle" aria-hidden="true" data-toggle="tooltip" data-placement="left"
                            title="Tell us a bit about you and your brief working history!"></i>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control col-lg-6" id="stylist-resume" name="stylist_resume" rows="3" placeholder="Resume"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="resume_uploads" style="color: red;">Upload CV (pdf)</label>
                        <input class="form-control col-lg-6" type="file" id="cv" name="cv" accept=".pdf">
                        <!--   -->
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="stylist-email" name="stylist_email"
                            aria-describedby="stylist-email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control col-lg-6" id="stylist-mobile" name="stylist_mobile"
                            aria-describedby="stylist-mobile" placeholder="Mobile">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="stylist-password" name="stylist_password"
                            aria-describedby="stylist-password" placeholder="Password">
                    </div>
                </div>
                <div class="category my-5">
                    <h4>Category</h4>
                    <h2>Barber Stylist</h2>
                </div>
                <div class="age my-5">
                    <h4>Age</h4>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stylist_age" id="age18-25" value="18-25">
                        <label class="form-check-label" for="hairstylist">
                            18-25
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stylist_age" id="age26-35" value="26-35">
                        <label class="form-check-label" for="beautician">
                            26-35
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stylist_age" id="age36-45" value="36-45">
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
                <div class="profiletype my-5">
                    <h4>Profile Type:</h4>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stylist_type" id="freelancer"
                            value="Freelancer">
                        <label class="form-check-label" for="weddingStylist">
                            Freelancer
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stylist_type" id="jobseeker"
                            value="Jobseeker">
                        <label class="form-check-label" for="weddingStylist">
                            Jobseeker
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stylist_type" id="home_service"
                            value="Home Service">
                        <label class="form-check-label" for="home_service">
                            Home Service
                        </label>
                    </div>
                </div>
                <div class="qualification my-5">
                    <h4>Qualification</h4>
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

                    <div class="open-to-work my-5">
                        <h4>Zone of London open to work</h4>
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
                </div>
                <div class="form-group">
                    <label for="image_uploads" class="color-1">Upload Pictures</label>
                    <input class="form-control col-lg-6" type="file" id="image-gallery" name="image_gallery[]"
                        accept=".jpg, .jpeg, .png" multiple>
                </div>
                <div class="form-group">
                    <label for="utr_number" class="color-1">UTR Number</label>
                    <input class="form-control col-lg-6" type="text" id="utr-number" name="utr_number">
                </div>
                <div class="form-group">
                    <div class="tool-div col-lg-6">
                        <label for="public_liability_insurance" class="color-1">Public Liability Insurance</label>
                        <span style="float: right"><i class="fa fa-exclamation-circle exclamation ml-2"
                                aria-hidden="true" data-toggle="tooltip" title="Public Liablity Insuarence"></i></span>
                    </div>
                    <input class="form-control col-lg-6" type="file" id="public-liability-insurance"
                        name="public_liability_insurance" data-toggle="tooltip" title="Public Liablity Insuarence Id">
                </div>

        </div>
        <div class="rate my-5">
            <h4>Rate</h4>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stylist_rate" id="110" value="110"
                    onclick="$('div[id=otherRate]').hide();">
                <label class="form-check-label" for="hairstylist">
                    £110
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stylist_rate" id="120" value="120"
                    onclick="$('div[id=otherRate]').hide();">
                <label class="form-check-label" for="beautician">
                    £120
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stylist_rate" id="150" value="150"
                    onclick="$('div[id=otherRate]').hide();">
                <label class="form-check-label" for="barber">
                    £130
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stylist_rate" id="other" value=""
                    onclick="$('div[id=otherRate]').show();">
                <label class="form-check-label" for="other"> Other <span
                        style="font-size: 11px; color: #e1dede; font-style: italic;">(In
                        British pounds)</span>
                </label>
            </div>
            <div id="otherRate" style="display:none;">
                <span style="left:131px;position: absolute; margin-left: 1px; margin-top: 3px;">£</span>
                <input type="text" name="otherRate" id="rateOther" value="0" class="form-control"
                    style=" height: 30px; width: 200px;padding-left: 15px;">
            </div>
        </div>

        <div class="languages my-5">
            <h4>Languages</h4>
            <div class="form-group">
                <textarea class="form-control col-lg-6" id="stylist-language" name="stylist_language" rows="3"
                    placeholder="Languages"></textarea>
            </div>
        </div>
        <div class="list my-5">
            <h4 class="py-5 text-center">List products and service that you have the knowledge to work with</h4>
        </div>
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
                <input class="form-check-input" type="checkbox" name="hairCuttingServices[]" id="stylist-customer-gents"
                    value="Gents">
                <label class="form-check-label" for="">Gents</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hairCuttingServices[]" id="stylist-customer-kids"
                    value="Kids">
                <label class="form-check-label" for="">Kids</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hairCuttingServices[]" id="stylist-customer-afro"
                    value="Afro Caribbean">
                <label class="form-check-label" for="">Afro Caribbean</label>
            </div>
        </div>
        <div class="wedding-styles my-5">
            <h4>Wedding-Styles</h4>
            <h5><u>Services</u></h5>
            <div class="form-check">
                <input type="hidden" name="weddingStyleServices[heading]" value="Wedding-Styles">
                <input type="hidden" name="weddingStyleServices[subHeading]" value="Services">
                <input class="form-check-input" type="checkbox" id="classic-low-chignon" value="Classic Low Chignon"
                    name="weddingStyleServices[]">
                <label class="form-check-label" for="classic-low-chignon">Classic Low Chignon</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="french-chignon" value="French Chignon"
                    name="weddingStyleServices[]">
                <label class="form-check-label" for="french-chignon">French Chignon</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="updo-flowers" value="Updo with Flowers"
                    name="weddingStyleServices[]">
                <label class="form-check-label" for="updo-flowers">Updo with Flowers</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="smooth-curls" value="Long, Smooth Curls"
                    name="weddingStyleServices[]">
                <label class="form-check-label" for="smooth-curls">Long, Smooth Curls</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="pinned-curls" value="Pinned Curls"
                    name="weddingStyleServices[]">
                <label class="form-check-label" for="pinned-curls">Pinned Curls</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="long-ponytail" value="Glam Long Ponytail"
                    name="weddingStyleServices[]">
                <label class="form-check-label" for="long-ponytail">Glam Long Ponytail</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="braided-barrette" value="Braided Barrette"
                    name="weddingStyleServices[]">
                <label class="form-check-label" for="braided-barrette">Braided Barrette</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="hidden-hair-piece" value="Hidden Hair Piece"
                    name="weddingStyleServices[]">
                <label class="form-check-label" for="">Hidden Hair Piece</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="fishtail-braid" value="Fishtail Braid"
                    name="weddingStyleServices[]">
                <label class="form-check-label" for="">Fishtail Braid</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="finger-weaves" value="Classic Finger Weaves"
                    name="weddingStyleServices[]">
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
                <input type="hidden" name="barberMaleGroomingServices[heading]" value="Barber Male Grooming">
                <input type="hidden" name="barberMaleGroomingServices[subHeading]" value="Services">
                <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]" id="scissors-cut"
                    value="Scissors Cut">
                <label class="form-check-label" for="scissors-cut">Scissors Cut</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                    id="clipperandscissors-cut" value="Clipper And Scissors Cut">
                <label class="form-check-label" for="clipperandscissors-cut">Clipper & Scissors Cut</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]" id="clipper-cut"
                    value="Clipper Cut">
                <label class="form-check-label" for="clipper-cut">Clipper Cut</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]" id="beard-shaped"
                    value="Beard Shaped">
                <label class="form-check-label" for="beard-shaped">Beard Shaped</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]" id="skin-fade"
                    value="Skin Fade">
                <label class="form-check-label" for="skin-fade">Skin Fade</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]" id="wet-shave"
                    value="Wet Shave">
                <label class="form-check-label" for="wet-shave">Wet Shave</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]" id="hot-towel"
                    value="Hot Towel">
                <label class="form-check-label" for="">Hot Towel</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                    id="chemical-relaxer" value="Chemical Relaxer">
                <label class="form-check-label" for="chemical-relaxer">Chemical Relaxer</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]" id="gray-blending"
                    value="Gray Blending">
                <label class="form-check-label" for="gray-blending">Gray Blending</label>
            </div>
        </div>
        <div class="home-styles my-5">
            <h4>Home Service Male Grooming</h4>
            <h5><u>Services</u></h5>
            <div class="form-check">
                <input type="hidden" name="homeServiceMaleGroomingServices[heading]" value="Home Service Male Grooming">
                <input type="hidden" name="homeServiceMaleGroomingServices[subHeading]" value="Services">
                <input class="form-check-input" type="checkbox" id="scissors-cut" value="Scissors Cut"
                    name="homeServiceMaleGroomingServices[]">
                <label class="form-check-label" for="scissors-cut">Scissors Cut</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliper-scissors-cut" value="Clipper & Scissors Cut"
                    name="homeServiceMaleGroomingServices[]">
                <label class="form-check-label" for="cliper-scissors-cut">Clipper & Scissors Cut</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="clipper=cut" value="Clipper Cut"
                    name="homeServiceMaleGroomingServices[]">
                <label class="form-check-label" for="clipper=cut">Clipper Cut</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="skin-fade" value="Skin Fade"
                    name="homeServiceMaleGroomingServices[]">
                <label class="form-check-label" for="skin-fade">Skin Fade</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="beard-shaped" value="Beard Shaped"
                    name="homeServiceMaleGroomingServices[]">
                <label class="form-check-label" for="beard-shaped">Beard Shaped</label>
            </div>
        </div>
        <div class="styling-products my-5">
            <h4>Styling Products</h4>
            <div class="form-check">
                <input type="hidden" name="stylingProducts[heading]" value="Styling Products">
                {{-- <input type="hidden" name="stylingProducts['subHeading']" value="Services"> --}}
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="kerastase"
                    value="Kerastase">
                <label class="form-check-label" for="kerastase">Kerastase</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="loreal-tecni-art"
                    value="L'oreal tecni art">
                <label class="form-check-label" for="loreal-tecni-ar">L'oreal Tecni Art</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="schwarzkopf-bc-bonacure"
                    value="Schwarzkopf Bc Bonacure">
                <label class="form-check-label" for="schwarzkopf-bc-bonacure">Schwarzkopf Bc Bonacure</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="keracare"
                    value="KeraCare">
                <label class="form-check-label" for="keracare">KeraCare</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="baxter" value="Baxter">
                <label class="form-check-label" for="baxter">Baxter</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="american-crew"
                    value="American Crew">
                <label class="form-check-label" for="american-crew">American Crew</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="hanz-de-fuko-hybridized"
                    value="Hanz de Fuko Hybridized">
                <label class="form-check-label" for="hanz-de-fuko-hybridized">Hanz de Fuko Hybridized</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="redken" value="Redken">
                <label class="form-check-label" for="redken">Redken</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="fudge" value="Fudge">
                <label class="form-check-label" for="fudge">Fudge</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="moroccan-oil"
                    value="Moroccan oil">
                <label class="form-check-label" for="moroccan-oil">Moroccan oil</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="kevin-murphy"
                    value="Kevin murphy">
                <label class="form-check-label" for="kevin-murphy">Kevin murphy</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="proraso"
                    value="Proraso">
                <label class="form-check-label" for="proraso">Proraso</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="jack-dean"
                    value="Jack Dean">
                <label class="form-check-label" for="jack-dean">Jack Dean</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="vines-vintage"
                    value="Vines Vintage">
                <label class="form-check-label" for="vines-vintage">Vines Vintage</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                    id="baxter-of-california-shave-tonic" value="Baxter Of California Shave Tonic">
                <label class="form-check-label" for="baxter-of-california-shave-tonic">Baxter Of California Shave
                    Tonic </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="anita-grant"
                    value="Anita Grant">
                <label class="form-check-label" for="nita-grant">Anita Grant</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="wella-eimi"
                    value="Wella EIMI">
                <label class="form-check-label" for="wella-eimi">Wella EIMI</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="shu-uemura"
                    value="Shu Uemura">
                <label class="form-check-label" for="shu-uemura">Shu Uemura</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="aveda" value="Aveda">
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
                <input class="form-check-input" type="checkbox" id="wella" value="Wella" name="hairColorBrands[]">
                <label class="form-check-label" for="wella">Wella</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="schwarzkopf" value="Schwarzkopf"
                    name="hairColorBrands[]">
                <label class="form-check-label" for="schwarzkopf">Schwarzkopf</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="redkenn" value="Redken" name="hairColorBrands[]">
                <label class="form-check-label" for="redken">Redken</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="matrix" value="Matrix" name="hairColorBrands[]">
                <label class="form-check-label" for="matrix">Matrix</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="goldwell" value="Goldwell"
                    name="hairColorBrands[]">
                <label class="form-check-label" for="goldwell">Goldwell</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="avedaa" value="Aveda" name="hairColorBrands[]">
                <label class="form-check-label" for="aveda">Aveda</label>
            </div>
            <h5 class="mt-5"><u>Services</u></h5>
            <div class="form-check">
                <input type="hidden" name="hairColorServices[heading]" value="Hair Color">
                <input type="hidden" name="hairColorServices[subHeading]" value="Services">
                <input class="form-check-input" type="checkbox" id="fashion-color" value="Fashion Color"
                    name="hairColorServices[]">
                <label class="form-check-label" for="fashion-color">Fashion Color</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="highlights" value="Highlights"
                    name="hairColorServices[]">
                <label class="form-check-label" for="highlights">Highlights</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="balayage" value="Balayage"
                    name="hairColorServices[]">
                <label class="form-check-label" for="balayage">Balayage</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="colour-correction" value="Colour Correction"
                    name="hairColorServices[]">
                <label class="form-check-label" for="colour-correction">Colour Correction</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="full-head-bleach" value="Full head bleach"
                    name="hairColorServices[]">
                <label class="form-check-label" for="full-head-bleach">Full head bleach</label>
            </div>
        </div>
        <div class="chemical-treatments my-5">
            <h4>Chemical Treatments</h4>
            <h5><u>Services</u></h5>
            <div class="form-check">
                <input type="hidden" name="chemicalTreatmentServices[heading]" value="Chemical Treatments">
                <input type="hidden" name="chemicalTreatmentServices[subHeading]" value="Services">
                <input class="form-check-input" type="checkbox" id="perm" value="Perm"
                    name="chemicalTreatmentServices[]">
                <label class="form-check-label" for="perm">Perm</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="brazilian-blow-dry" value="Brazilian Blow-dry"
                    name="chemicalTreatmentServices[]">
                <label class="form-check-label" for="brazilian-blow-dry">Brazilian Blow-dry</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="keratin-treatment" value="Keratin Treatment"
                    name="chemicalTreatmentServices[]">
                <label class="form-check-label" for="keratin-treatment">Keratin Treatment</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="chemical-relaxer" value="Chemical Relaxer"
                    name="chemicalTreatmentServices[]">
                <label class="form-check-label" for="chemical-relaxer">Chemical Relaxer</label>
            </div>

            <h5 class="mt-5"><u>Products</u></h5>
            <div class="form-check">
                <input type="hidden" name="chemicalTreatmentProducts[heading]" value="Chemical Treatments">
                <input type="hidden" name="chemicalTreatmentProducts[subHeading]" value="Products">
                <input class="form-check-input" type="checkbox" id="kerastraight" value="Kerastraight"
                    name="chemicalTreatmentProducts[]">
                <label class="form-check-label" for="kerastraight">Kerastraight</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="global-keratin" value="Global Keratin"
                    name="chemicalTreatmentProducts[]">
                <label class="form-check-label" for="global-keratin">Global Keratin</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cocochoco-brazilian-keratin"
                    value="Cocochoco Brazilian Keratin" name="chemicalTreatmentProducts[]">
                <label class="form-check-label" for="cocochoco-brazilian-keratin">Cocochoco Brazilian
                    Keratin</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="goldwell-kerasilk" value="Goldwell KeraSilk"
                    name="chemicalTreatmentProducts[]">
                <label class="form-check-label" for="goldwell-kerasilk">Goldwell KeraSilk </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="schwarzkopf-professional"
                    value="Schwarzkopf Professional" name="chemicalTreatmentProducts[]">
                <label class="form-check-label" for="schwarzkopf-professional">Schwarzkopf Professional</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="wella-professionals" value="Wella Professionals"
                    name="chemicalTreatmentProducts[]">
                <label class="form-check-label" for="wella-professionals">Wella Professionals</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="sibel" value="Sibel"
                    name="chemicalTreatmentProducts[]">
                <label class="form-check-label" for="sibel">Sibel</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="loreal-professionnel" value="L'Oréal Professionnel"
                    name="chemicalTreatmentProducts[]">
                <label class="form-check-label" for="loreal-professionnel">L'Oréal Professionnel</label>
            </div>
        </div>

        <div class="terms-conditions text-center">
            <div class="terms my-5 btn ">

                <button type="button" class="btn customBtn" data-toggle="modal" data-target="#exampleModalLong">
                    Agree To Terms and Conditions
                </button>

                <!-- Modal -->
                <div class="modal fade terms-conditions-modal" id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-keyboard="false"
                    data-backdrop="static">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="modal-title text-center" id="exampleModalLongTitle">Terms and
                                    Conditions</h5>

                                <div class="form-check ">
                                    <a href="{{ route('privacyPolicy') }}" target="_blank"
                                        rel="noopener noreferrer">Privacy Policy</a><br>
                                    <a href="{{ route('webTermAndConditions') }}" target="_blank"
                                        rel="noopener noreferrer">Website Terms & Conditions</a><br>
                                    <a href="{{ route('freelancerTermAndConditions') }}" target="_blank"
                                        rel="noopener noreferrer">Freelancer Terms & Conditions</a><br>
                                    <input class="form-check-input btn customBtn" type="checkbox"
                                        id="terms-and-conditions" value="1" name="agree">
                                    <label class="form-check-label " for="agree">Agree To Terms and
                                        Conditions</label>
                                </div>
                                <div class="submit text-center mt-5">
                                    <button type="submit" id="submit_button" class="btn customBtn"
                                        disabled>Submit</button>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Success Modal-->
        <div class="modal success-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog " role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Congratulations!</h5>
                        <p>You've registered successfully!</p>
                        <button type="button" class="btn customBtn" onclick="redirect();">Okay</button>

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>

        <!--Error Modal-->
        <div class="modal error-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog " role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center error-message"></h5>
                        <!--<p>Please try again!</p>-->
                        <button type="button" class="btn customBtn" data-dismiss="modal">Okay</button>

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection

@push('script')
    <script src="{{ asset('customjs/web/register/common.js') }}"></script>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
        });
        $(document).on('click', '#submit_button', function(e) {

            e.preventDefault();

            let type = 'POST';
            let url = '';
            let message = '';
            let form = $('#register_form');
            let data = new FormData(form[0]);
            if ($(this).text() == 'Submit') {
                url = '{{ route('registration') }}';
            }

            // PASSING DATA TO FUNCTION
            $('[name]').removeClass('is-invalid');
            SendAjaxRequestToServer(type, url, data, '', registrationResponse, 'spinner_button', 'submit_button');

        });

        function registrationResponse(response) {

            // SHOWING MESSAGE ACCORDING TO RESPONSE
            if (response.status == 200) {
                toastr.success(response.message, '', {
                    timeOut: 3000
                });

                $('.terms-conditions-modal').modal('hide');

                setTimeout(function() {
                    window.location.href = '{{ route('login') }}';
                }, 3000);
            } else {

                // CALLING OUR FUNTION ERROR & SUCCESS HANDLING
                error = response.responseJSON.message;
                var is_invalid = response.responseJSON.errors;

                // Loop through the error object
                $.each(is_invalid, function(key) {

                    // Assuming 'key' corresponds to the form field name
                    var inputField = $('[name="' + key + '"]');
                    // Add the 'is-invalid' class to the input field's parent or any desired container
                    inputField.closest('.form-control').addClass('is-invalid');
                });
                // error_msg = error.split('(');

                toastr.error(error, '', {
                    timeOut: 3000
                });
            }

        }
    </script>
@endpush
