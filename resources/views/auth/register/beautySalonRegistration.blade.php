@extends('layouts.master.template_old.master')

@push('css')
@endpush

@section('content')
    <div class="newProfile container my-5">
        <div class="newProfile-header">
            <h4>Beauty & Spa Business owner's</h4>
            <h4>pages profile building </h4>
        </div>
        <div>
            <form id="register_form" class="my-5">
                <input type="hidden" name="type" value="beautySalon">

                <div class="profilePicture">
                    <img id="blah" class="rounded-circle" src="{{ asset('template_old/images/blank.png') }}"
                        alt="your image" /> <br>

                    <input id="owner-picture" name="owner_picture" accept=".jpg, .jpeg, .png" class="col-lg-6 my-4 hidden"
                        type='file' onchange="loadFile(event);" />
                    <label for="owner-picture">+</label>

                </div>
                <div class="personalDetails">
                    <h4>Personal Details</h4>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="owner-name" name="owner_name"
                            aria-describedby="owner-name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="owner-surname" name="owner_surname"
                            aria-describedby="owner-surname" placeholder="Surname">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control col-lg-6" id="owner-address" name="owner_address" rows="3" placeholder="Address"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="owner-postcode" name="owner_postcode"
                            aria-describedby="owner-postcode" placeholder="Postcode">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control col-lg-6 " id="owner-telephone" name="owner_telephone"
                            aria-describedby="owner-telephone" placeholder="Telephone">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="owner-email" name="owner_email"
                            aria-describedby="owner-email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="owner-password" name="owner_password"
                            aria-describedby="owner-password" placeholder="Password">
                    </div>

                </div>
                <div class="list my-5">
                    <h4 class="py-5 text-center">List products and service that your company provide</h4>
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
                        <input class="form-check-input" type="checkbox" id="deep-tissue-massage" value="Deep Tissue Massage"
                            name="massageServices[]">
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
                        <label class="form-check-label" for="pregnancy-massage">Pregnancy Massage</label>
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
                    <h4>Hair Removal Permanent</h4>
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
                        <input class="form-check-input" type="checkbox" id="underarms" value="Underarms"
                            name="bodyWaxingServices[]">
                        <label class="form-check-label" for="underarms">Underarms</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="forearms" value="Forearms"
                            name="bodyWaxingServices[]">
                        <label class="form-check-label" for="forearms">Forearms</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="upper-legs" value="Upper Legs"
                            name="bodyWaxingServices[]">
                        <label class="form-check-label" for="upper-legs">Upper Legs</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="full-legs" value="Full Legs"
                            name="bodyWaxingServices[]">
                        <label class="form-check-label" for="full-legs">Full Legs</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lower-legs" value="Lower Legs"
                            name="bodyWaxingServices[]">
                        <label class="form-check-label" for="lower-legs">Lower Legs</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="bikini" value="Bikini"
                            name="bodyWaxingServices[]">
                        <label class="form-check-label" for="bikini">Bikini</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="french-bikini" value="French Bikini"
                            name="bodyWaxingServices[]">
                        <label class="form-check-label" for="french-bikini">French Bikini</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="brazilian-bikini" value="Brazilian Bikini"
                            name="bodyWaxingServices[]">
                        <label class="form-check-label" for="brazilian-bikini">Brazilian Bikini</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hollywood" value="Hollywood"
                            name="bodyWaxingServices[]">
                        <label class="form-check-label" for="hollywood">Hollywood</label>
                    </div>
                    <h5 class="mt-5"><u>Products</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="bodyWaxingProducts[heading]" value="Body Waxing">
                        <input type="hidden" name="bodyWaxingProducts[subHeading]" value="Products">
                        <input class="form-check-input" type="checkbox" id="gigi-honee" value="Gigi Honee"
                            name="bodyWaxingProducts[]">
                        <label class="form-check-label" for="gigi-honee">Gigi Honee</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hive-wax" value="Hive wax"
                            name="bodyWaxingProducts[]">
                        <label class="form-check-label" for="hive-wax">Hive wax</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lotus-essentials" value="Lotus Essentials"
                            name="bodyWaxingProducts[]">
                        <label class="form-check-label" for="lotus-essentials">Lotus Essentials</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="berodinsatin" value="BerodinSatin"
                            name="bodyWaxingProducts[]">
                        <label class="form-check-label" for="berodinsatin">BerodinSatin</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cirepil" value="Cirepil"
                            name="bodyWaxingProducts[]">
                        <label class="form-check-label" for="cirepil">Cirepil</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="smooth-honery-wax" value="Smooth Honey Wax"
                            name="bodyWaxingProducts[]">
                        <label class="form-check-label" for="smooth-honery-wax">Smooth Honey Wax</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="shobha-sugar-wax" value="Shobha Sugar Wax"
                            name="bodyWaxingProducts[]">
                        <label class="form-check-label" for="shobha-sugar-wax">Shobha Sugar Wax</label>
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
                        <input class="form-check-input" type="checkbox" id="acrylic-nail-extension"
                            value="Acrylic Nail Extension" name="manicurePedicureServices[]">
                        <label class="form-check-label" for="acrylic-nail-extension">Acrylic Nail Extension</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="get-nail-extension"
                            value="Gel Nail Extension" name="manicurePedicureServices[]">
                        <label class="form-check-label" for="get-nail-extension">Gel Nail Extension</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="nail-designs" value="Nail Designs"
                            name="manicurePedicureServices[]">
                        <label class="form-check-label" for="nail-designs">Nail Designs</label>
                    </div>
                    <h5 class="mt-5"><u>Products</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="manicurePedicureProducts[heading]" value="Manicure Pedicure">
                        <input type="hidden" name="manicurePedicureProducts[subHeading]" value="Products">
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
                    <h4>Facials</h4>
                    <h5><u>Services</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="facialServices[heading]" value="Facials">
                        <input type="hidden" name="facialServices[subHeading]" value="Services">
                        <input class="form-check-input" type="checkbox" id="fire-iced-red"
                            value="Fire And Iced Red Carpet Facial" name="facialServices[]">
                        <label class="form-check-label" for="fire-iced-red">Fire & Iced Red Carpet Facial</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="microdermabrasion-with-crystals"
                            value="Microdermabrasion with Crystals" name="facialServices[]">
                        <label class="form-check-label" for="microdermabrasion-with-crystals">Microdermabrasion with
                            Crystals</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="biophora-deep-cleansing"
                            value="Biophora deep cleansing" name="facialServices[]">
                        <label class="form-check-label" for="biophora-deep-cleansing">Biophora deep cleansing</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="microdermabrasion-with-hyaluronic"
                            value="Microdermabrasion with Hyaluronic" name="facialServices[]">
                        <label class="form-check-label" for="microdermabrasion-with-hyaluronic">Microdermabrasion with
                            Hyaluronic</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="acid-infusion" value="Acid Infusion"
                            name="facialServices[]">
                        <label class="form-check-label" for="acid-infusion">Acid Infusion</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="oxygen-infused-facial"
                            value="Oxygen Infused Facial" name="facialServices[]">
                        <label class="form-check-label" for="oxygen-infused-facial">Oxygen Infused Facial</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hydra-facial-md" value="Hydra facial MD"
                            name="facialServices[]">
                        <label class="form-check-label" for="hydra-facial-md">Hydra facial MD </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="micro-facial" value="Micro Facial"
                            name="facialServices[]">
                        <label class="form-check-label" for="micro-facial">Micro Facial</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="standard-facials" value="Standard Facials"
                            name="facialServices[]">
                        <label class="form-check-label" for="standard-facials">Standard Facials</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="dermaplaning" value="Dermaplaning"
                            name="facialServices[]">
                        <label class="form-check-label" for="dermaplaning">Dermaplaning</label>
                    </div>
                    <h5 class="mt-5"><u>Products</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="facialProducts[heading]" value="Facials">
                        <input type="hidden" name="facialProducts[subHeading]" value="Services">

                        <input class="form-check-input" type="checkbox" id="eve-taylor" value="Eve Taylor"
                            name="facialProducts[]">
                        <label class="form-check-label" for="eve-taylor">Eve Taylor</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="environ" value="Environ"
                            name="facialProducts[]">
                        <label class="form-check-label" for="environ">Environ</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sans-souis" value="Sans souis"
                            name="facialProducts[]">
                        <label class="form-check-label" for="sans-souis">Sans souis</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="elemis" value="Elemis"
                            name="facialProducts[]">
                        <label class="form-check-label" for="elemis">Elemis</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="glo-therapeutics" value="Glo Therapeutics"
                            name="facialProducts[]">
                        <label class="form-check-label" for="glo-therapeutics">Glo Therapeutics</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mario-badescu" value="Mario Badescu"
                            name="facialProducts[]">
                        <label class="form-check-label" for="mario-badescu">Mario Badescu</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="dermalogica" value="Dermalogica"
                            name="facialProducts[]">
                        <label class="form-check-label" for="dermalogica">Dermalogica</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="md-formulation" value="MD Formulation"
                            name="facialProducts[]">
                        <label class="form-check-label" for="md-formulation">MD Formulation</label>
                    </div>
                </div>

                <div class="body-treatments my-5">
                    <h4>Body Treatment</h4>
                    <h5><u>Services</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="bodyTreatmentServices[heading]" value="Body Treatment">
                        <input type="hidden" name="bodyTreatmentServices[subHeading]" value="Services">
                        <input class="form-check-input" type="checkbox" id="body-polish" value="Body polish"
                            name="bodyTreatmentServices[]">
                        <label class="form-check-label" for="body-polish">Body polish</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="body-scrub" value="Body Scrub"
                            name="bodyTreatmentServices[]">
                        <label class="form-check-label" for="body-scrub">Body Scrub</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="body-wrap" value="Body Wrap"
                            name="bodyTreatmentServices[]">
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
                        <input class="form-check-input" type="checkbox" id="eyebrow-threading" value="Eyebrow Threading"
                            name="EyesAndBrowServices[]">
                        <label class="form-check-label" for="eyebrow-threading">Eyebrow Threading</label>
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
                    <div class="terms btn my-5">

                        <button type="button" class="btn customBtn agreeTermCond" data-toggle="modal"
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
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Terms and
                                            Conditions</h5>

                                        <div class="form-check">
                                            <a href="{{ route('privacyPolicy') }}" target="_blank"
                                                rel="noopener noreferrer">Privacy Policy</a><br>
                                            <a href="{{ route('webTermAndConditions') }}" target="_blank"
                                                rel="noopener noreferrer">Website Terms & Conditions</a><br>
                                            <a href="{{ route('freelancerTermAndConditions') }}" target="_blank"
                                                rel="noopener noreferrer">Freelancer Terms & Conditions</a><br>
                                            <input class="form-check-input btn customBtn" type="checkbox"
                                                id="terms-and-conditions" value="1" name="agree">
                                            <label class="form-check-label" for="agree">Agree To Terms and
                                                Conditions</label>
                                        </div>
                                        <div class="submit mt-5 text-center">
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
                    <div class="modal-dialog" role="document">
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
                    <div class="modal-dialog" role="document">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="error-message text-center"></h5>
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
        $(document).on('click', '.agreeTermCond', function(e) {
            $("#terms-and-conditions").prop('checked', false);
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
