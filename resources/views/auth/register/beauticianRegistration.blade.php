@extends('layouts.master.template_old.master')

@push('css')
@endpush

@section('content')
    <div class="newProfile container my-5">
        <div class="newProfile-header">
            <h4>Beautician profile building</h4>
            <!--<h4>pages profile building </h4>-->
        </div>
        <div>
            <form id="register_form" class="my-5">
                <input type="hidden" name="type" value="beautician">

                <div class="profilePicture">
                    <img id="blah" class="rounded-circle" accept=".jpg, .jpeg, .png"
                        src="{{ asset('template_old/images/blank.png') }}" alt="your image" /> <br>

                    <input id="stylist-picture" name="stylist_picture" class="my-4 col-lg-6 hidden" type='file'
                        onchange="loadFile(event)" />
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
                    <h2>Beautician</h2>
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

                    <!-- <div class="form-group">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="tool-div col-lg-6">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <label for="video" class="color-1" >Trade test Video</label><span style="float: right"><i class="fa fa-exclamation-circle exclamation ml-2" aria-hidden="true" data-toggle="tooltip" title="Styzeler Hair and Beauty agency requires a trade test video to assess each freelancer’s skills and personality for Fair use and fair dealing. 
                    We require a Seated back massage a mini facial, and a gel manicure or eyelashes extension" ></i></span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <input class="form-control col-lg-6" type="url" id="video" name="video" placeholder="Video Link">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div> -->

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
                                    aria-hidden="true" data-toggle="tooltip"
                                    title="Public Liablity Insuarence"></i></span>
                        </div>
                        <input class="form-control col-lg-6" type="file" id="public-liability-insurance"
                            name="public_liability_insurance" data-toggle="tooltip"
                            title="Public Liablity Insuarence Id">
                    </div>
                </div>
                <div class="rate my-5">
                    <h4>Rate</h4>
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
                            value="$('input[id=rateOther]').val();" onclick="$('div[id=otherRate]').show();">
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
                <div class="massage my-5">
                    <h4>Massage</h4>
                    <h5><u>Services</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="massageServices[heading]" value="Massage">
                        <input type="hidden" name="massageServices[subHeading]" value="Services">
                        <input class="form-check-input" type="checkbox" id="swedish-massage" value="Swedish Massage"
                            name="massageServices[]">
                        <label class="form-check-label" for="swedish-massage">Swedish Massage</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hot-stone-massage" value="Hot Stone Massage"
                            name="massageServices[]">
                        <label class="form-check-label" for="hot-stone-massage">Hot Stone Massage</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="deep-tissue-massage"
                            value="Deep Tissue Massage" name="massageServices[]">
                        <label class="form-check-label" for="deep-tissue-massage">Deep Tissue Massage</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="armatherapy" value="Aromatherapy Massage"
                            name="massageServices[]">
                        <label class="form-check-label" for="armatherapy">Aromatherapy Massage</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="shiatsu-massage" value="Shiatsu Massage"
                            name="massageServices[]">
                        <label class="form-check-label" for="armatherapy">Shiatsu Massage</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="pregnancy-massage" value="Pregnancy Massage"
                            name="massageServices[]">
                        <label class="form-check-label" for="pregnancy-massage">Pregnancy Massage</label><span
                            class="ms-3"> N/A For Home Service</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="thai-massage" value="Thai massage"
                            name="massageServices[]">
                        <label class="form-check-label" for="thai-massage">Thai massage</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lymphatic-massage" value="Lymphatic Massage"
                            name="massageServices[]">
                        <label class="form-check-label" for="lymphatic-massage">Lymphatic Massage</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="reflexology" value="Reflexology"
                            name="massageServices[]">
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
                        <input class="form-check-input" type="checkbox" id="purple-flame" value="Purple Flame"
                            name="massageProducts[]">
                        <label class="form-check-label" for="purple-flame">Purple Flame</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="strictly-professional"
                            value="Strictly Professional" name="massageProducts[]">
                        <label class="form-check-label" for="strictly-professional">Strictly Professional</label>
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
                        <input class="form-check-input" type="checkbox" id="dermalogica" value="Dermalogica"
                            name="massageProducts[]">
                        <label class="form-check-label" for="dermalogica">Dermalogica</label>
                    </div>
                </div>
                <div class="hair-removal my-5">
                    <h4>Hair Removal Permanent<span class="ms-3 fs-14">N/A For Home Service</span></h4>
                    <h5><u>Services</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="hairRemovalPermanentServices[heading]"
                            value="Hair Removal Permanent">
                        <input type="hidden" name="hairRemovalPermanentServices[subHeading]" value="Services">
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
                        <input class="form-check-input" type="checkbox" id="electrolysis" value="Electrolysis"
                            name="hairRemovalPermanentServices[]">
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
                        <input class="form-check-input" type="checkbox" id="upper-legs" value="Upper Legs"
                            name="ladyWaxingServices[]">
                        <label class="form-check-label" for="upper-legs">Upper Legs</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="full-legs" value="Full Legs"
                            name="ladyWaxingServices[]">
                        <label class="form-check-label" for="full-legs">Full Legs</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lower-legs" value="Lower Legs"
                            name="ladyWaxingServices[]">
                        <label class="form-check-label" for="lower-legs">Lower Legs</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="bikini" value="Bikini"
                            name="ladyWaxingServices[]">
                        <label class="form-check-label" for="bikini">Bikini</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="french-bikini" value="French Bikini<"
                            name="ladyWaxingServices[]">
                        <label class="form-check-label" for="french-bikini">French Bikini</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="brazilian-bikini" value="Brazilian Bikini"
                            name="ladyWaxingServices[]">
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
                        <input class="form-check-input" type="checkbox" id="gigi-honee" value="Gigi Honee"
                            name="ladyWaxingProducts[]">
                        <label class="form-check-label" for="gigi-honee">Gigi Honee</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hive-wax" value="Hive wax"
                            name="ladyWaxingProducts[]">
                        <label class="form-check-label" for="hive-wax">Hive wax</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lotus-essentials" value="Lotus Essentials"
                            name="ladyWaxingProducts[]">
                        <label class="form-check-label" for="lotus-essentials">Lotus Essentials</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="berodinsatin" value="BerodinSatin"
                            name="ladyWaxingProducts[]">
                        <label class="form-check-label" for="berodinsatin">BerodinSatin</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cirepil" value="Cirepil"
                            name="ladyWaxingProducts[]">
                        <label class="form-check-label" for="cirepil">Cirepil</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="smooth-honery-wax" value="Smooth Honey Wax"
                            name="ladyWaxingProducts[]">
                        <label class="form-check-label" for="smooth-honery-wax">Smooth Honey Wax</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="shobha-sugar-wax" value="Shobha Sugar Wax"
                            name="ladyWaxingProducts[]">
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
                        <input class="form-check-input" type="checkbox" id="full-harms" value="Full Harms"
                            name="maleWaxingServices[]">
                        <label class="form-check-label" for="full-harms">Full Harms</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="shoulders" value="Shoulders"
                            name="maleWaxingServices[]">
                        <label class="form-check-label" for="shoulders">Shoulders</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="chest-abbs" value="Chest + Abb"
                            name="maleWaxingServices[]">
                        <label class="form-check-label" for="chest-abbs">Chest + Abbs</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="speedo-line" value="Speedo Line"
                            name="maleWaxingServices[]">
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
                        <input type="hidden" name="manicurePedicureServices[heading]" value="Manicure Pedicure">
                        <input type="hidden" name="manicurePedicureServices[subHeading]" value="Services">
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
                        <input class="form-check-input" type="checkbox" id="get-mani-pedi" value="Gel Manicure/Pedicure"
                            name="manicurePedicureServices[]">
                        <label class="form-check-label" for="get-mani-pedi">Gel Manicure/Pedicure</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mani-pedi" value="Manicure/Pedicure"
                            name="manicurePedicureServices[]">
                        <label class="form-check-label" for="mani-pedi">Manicure/Pedicure</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="french-mani-pedi"
                            value="French Manicure/Pedicure" name="manicurePedicureServices[]">
                        <label class="form-check-label" for="french-mani-pedi">French Manicure/Pedicure</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="russian-mani-pedi"
                            value="Russian Manicure/Pedicure" name="manicurePedicureServices[]">
                        <label class="form-check-label" for="russian-mani-pedi">Russian Manicure/Pedicure</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="acrylic-nail-extension"
                            value="Acrylic Nail Extension" name="manicurePedicureServices[]">
                        <label class="form-check-label" for="acrylic-nail-extension">Acrylic Nail Extension</label>
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
                        <input class="form-check-input" type="checkbox" id="nail-designs" value="Nail Designs"
                            name="manicurePedicureServices[]">
                        <label class="form-check-label" for="nail-designs">Nail Designs</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="nail-art" value="Nail Art"
                            name="manicurePedicureServices[]">
                        <label class="form-check-label" for="nail-art">Nail Art</label>
                    </div>
                    <h5 class="mt-5"><u>Products</u></h5>
                    <input type="hidden" name="manicurePedicureProducts[heading]" value="Manicure Pedicure">
                    <input type="hidden" name="manicurePedicureProducts[subHeading]" value="Products">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="nails-inc" value="Nails inc."
                            name="manicurePedicureProducts[]">
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
                        <input class="form-check-input" type="checkbox" id="sally-hansen" value="Sally Hansen"
                            name="manicurePedicureProducts[]">
                        <label class="form-check-label" for="sally-hansen">Sally Hansen</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="kaeso" value="Kaeso"
                            name="manicurePedicureProducts[]">
                        <label class="form-check-label" for="kaeso">Kaeso</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ibd-flex" value="IBD flex polymer powder"
                            name="manicurePedicureProducts[]">
                        <label class="form-check-label" for="ibd-flex">IBD flex polymer powder</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ibd-grip-monomer-liquid"
                            value="IBD grip monomer liquid" name="manicurePedicureProducts[]">
                        <label class="form-check-label" for="ibd-grip-monomer-liquid">IBD grip monomer liquid</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="nail-harmony" value="Nail harmony"
                            name="manicurePedicureProducts[]">
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
                        <label class="form-check-label" for="fire-iced-red">Fire & Iced Red Carpet Facial</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="microdermabrasion-with-crystals"
                            value="Microdermabrasion with Crystals" name="salonFacialServices[]">
                        <label class="form-check-label" for="microdermabrasion-with-crystals">Microdermabrasion with
                            Crystals</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="biophora-deep-cleansing"
                            value="Biophora deep cleansing" name="salonFacialServices[]">
                        <label class="form-check-label" for="biophora-deep-cleansing">Biophora deep cleansing</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="microdermabrasion-with-hyaluronic"
                            value="Microdermabrasion with Hyaluronic" name="salonFacialServices[]">
                        <label class="form-check-label" for="microdermabrasion-with-hyaluronic">Microdermabrasion with
                            Hyaluronic</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="acid-infusion" value="Acid Infusion"
                            name="salonFacialServices[]">
                        <label class="form-check-label" for="acid-infusion">Acid Infusion</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="oxygen-infused-facial"
                            value="Oxygen Infused Facial" name="salonFacialServices[]">
                        <label class="form-check-label" for="oxygen-infused-facial">Oxygen Infused Facial</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hydra-facial-md" value="Hydra facial MD"
                            name="salonFacialServices[]">
                        <label class="form-check-label" for="hydra-facial-md">Hydra facial MD </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="micro-facial" value="Micro Facial"
                            name="salonFacialServices[]">
                        <label class="form-check-label" for="micro_facial">Micro Facial</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="standard-facials" value="Standard Facials"
                            name="salonFacialServices[]">
                        <label class="form-check-label" for="standard_facials">Standard Facials</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="dermaplaning" value="Dermaplaning"
                            name="salonFacialServices[]">
                        <label class="form-check-label" for="dermaplaning">Dermaplaning</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hydrafacial" value="Hydrafacial"
                            name="salonFacialServices[]">
                        <label class="form-check-label" for="hydrafacial">Hydrafacial</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="classic-facial" value="Classic Facial"
                            name="salonFacialServices[]">
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
                        <label class="form-check-label" for="acne-reduction-facial">Acne Reduction Facial</label>
                    </div>

                    <h5 class="mt-5"><u>Products</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="salonFacialProducts[heading]" value="Salon Facials">
                        <input type="hidden" name="salonFacialProducts[subHeading]" value="Products">
                        <input class="form-check-input" type="checkbox" id="eve-taylor" value="Eve Taylor"
                            name="salonFacialProducts[]">
                        <label class="form-check-label" for="eve_taylor">Eve Taylor</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="environ" value="Environ"
                            name="salonFacialProducts[]">
                        <label class="form-check-label" for="environ">Environ</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sans-souis" value="Sans souis"
                            name="salonFacialProducts[]">
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
                        <input class="form-check-input" type="checkbox" id="mario-badescu" value="Mario Badescu"
                            name="salonFacialProducts[]">
                        <label class="form-check-label" for="mario-badescu">Mario Badescu</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="dermalogica" value="Dermalogica"
                            name="salonFacialProducts[]">
                        <label class="form-check-label" for="dermalogica">Dermalogica</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="md-formulation" value="MD Formulation"
                            name="salonFacialProducts[]">
                        <label class="form-check-label" for="md-formulation">MD Formulation</label>
                    </div>
                </div>

                <div class="facials my-5">
                    <h4>Home Service Facials</h4>
                    <h5><u>Services</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="homeServiceFacialServices[heading]" value="Home Service Facials">
                        <input type="hidden" name="homeServiceFacialServices[subHeading]" value="Services">
                        <input class="form-check-input" type="checkbox" id="hydrafacial" value="Hydrafacial"
                            name="homeServiceFacialServices[]">
                        <label class="form-check-label" for="hydrafacial">Hydrafacial</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="classic-facial" value="Classic Facial"
                            name="homeServiceFacialServices[]">
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
                        <label class="form-check-label" for="acne-reduction-facial">Acne Reduction Facial</label>
                    </div>
                </div>
                <div class="body-treatments my-5">
                    <h4>Body Treatment <span class="ms-3 fs-14">N/A For Home Service</span></h4>
                    <h5><u>Services</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="bodyTreatmentServices[heading]" value="Body Treatment">
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
                        <input class="form-check-input" type="checkbox" id="eyebrow-tint" value="Eyebrow Tint"
                            name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="eyebrow-tin">Eyebrow Tint</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lash-lifting" value="Lash Lifting"
                            name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="lash-lifting">Lash Lifting</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="eyebrow-threading"
                            value="Eyebrow Threading" name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="eyebrow-threading">Eyebrow Threading</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="eyelash-tint" value="Eyelash Tint"
                            name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="eyelash-tint">Eyelash Tint</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="barow-lamination"
                            value="Barow Lamination" name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="barow-lamination">Barow Lamination</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="eyelash-extensions"
                            value="Eyelash Extensions" name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="eyelash-extensions">Eyelash Extensions</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="classic-full" value="Classic Full"
                            name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="classic-full">Classic Full</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="classic-half" value="Classic Half"
                            name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="classic-half">Classic Half</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="clamourous-volume-full"
                            value="Clamourous Volume Full" name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="clamourous-volume-full">Clamourous Volume Full</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="clamourous-volume-half"
                            value="Clamourous Volume Half" name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="clamourous-volume-half">Clamourous Volume Half</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hybrid-full-set" value="Hybrid Full Set"
                            name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="hybrid-full-set">Hybrid Full Set</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hybrid-half-set" value="Hybrid Half Set"
                            name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="hybrid-half-set">Hybrid Half Set</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="eyelash-infil" value="Eyelash Infil"
                            name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="eyelash-infil">Eyelash Infil</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="eyelash-removal" value="Eyelash Removal"
                            name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="eyelash-removal">Eyelash Removal</label>
                    </div>

                    <h5 class="mt-5"><u>Products</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="EyesAndBrowProducts[heading]" value="Eyes & Brows">
                        <input type="hidden" name="EyesAndBrowProducts[subHeading]" value="Products">
                        <input class="form-check-input" type="checkbox" id="london-lash" value="London lash"
                            name="EyesAndBrowProducts[]">
                        <label class="form-check-label" for="london-lash">London lash</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="eyelure-lashes" value="Eyelure lashes"
                            name="EyesAndBrowProducts[]">
                        <label class="form-check-label" for="eyelure-lashes">Eyelure lashes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lash-art" value="Lash Art"
                            name="EyesAndBrowProducts[]">
                        <label class="form-check-label" for="lash-art">Lash Art</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lash-heaven" value="Lash Heaven"
                            name="EyesAndBrowProducts[]">
                        <label class="form-check-label" for="lash-heaven">Lash Heaven</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="smart-brow" value="Smart Brow"
                            name="EyesAndBrowProducts[]">
                        <label class="form-check-label" for="smart-brow">Smart Brow</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lrefectiocil" value="LRefectoCil"
                            name="EyesAndBrowProducts[]">
                        <label class="form-check-label" for="">LRefectoCil</label>
                    </div>

                </div>

                <div class="terms-conditions text-center">
                    <div class="terms my-5 btn ">

                        <button type="button" class="btn customBtn" data-toggle="modal"
                            data-target="#exampleModalLong">
                            Agree To Terms and Conditions
                        </button>

                        <!-- Modal -->
                        <div class="modal fade terms-conditions-modal" id="exampleModalLong" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"
                            data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
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
                                            <a href="{{ route('termAndConditions') }}" target="_blank"
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
                <div class="modal success-modal" tabindex="-1" role="dialog" data-keyboard="false"
                    data-backdrop="static">
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
                <div class="modal error-modal" tabindex="-1" role="dialog" data-keyboard="false"
                    data-backdrop="static">
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
