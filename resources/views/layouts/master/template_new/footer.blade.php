<!-- footer -->
<footer>
<div class="contain" data-aos="fade-up" data-aos-duration="1000">
    <div class="d-flex txt icon-container">
        <span>
            Styzeler Kemp House,152-160 City Road London. EC1V 2NX
        </span>
        <div class="d-flex social-media">
            <h1><a target="_blank" href="https://www.instagram.com/styzeler/"><i class="fa fa-instagram color-1" aria-hidden="true"></i></a></h1>
            <h1><a target="_blank" href="https://twitter.com/styzeler/status/1270851982803316736?s=20"><i class="fa fa-twitter color-1" aria-hidden="true"></i></a></h1>
            <h1><a target="_blank" href="http://www.linkedin.com/in/styzeler-london"><i class="fa fa-linkedin color-1" aria-hidden="true"></i></a></h1>
            <h1><a target="_blank" href="https://g.page/r/CbZ4IkhN9ROREAE"><i class="fa fa-google color-1" aria-hidden="true"></i></a></h1>
        </div>
    </div>
    <div class="num"><a href="tel:0207 566 3989">0207 566 3989</a></div>
    <div class="email">
        <a href="mailto:wearestyzeler@gmail.com">wearestyzeler@gmail.com</a>
    </div>
    <p>
        © 2019 All Rights Reserved | <a href="{{ route('privacyPolicy') }}">Privacy Policy</a> |
        <a href="{{ route('termAndConditions') }}">Terms & Conditions</a> |
        <a href="{{ route('webTermAndConditions') }}">Web Site Terms and Conditions</a>
    </p>
    </div>
</footer>

<button class="chatbot-toggler" style="z-index: 100;">
    <span class="material-symbols-rounded">mode_comment</span> <span class="material-symbols-outlined">close</span>
</button>
<div class="chatbot" style="z-index: 100;">
    <div class="chat_header">
        <h2>Chatbot</h2>
        <span class="close-btn material-symbols-outlined">close</span>
    </div>

    <div class="info">
        <form id="guest_form">
            <div class="row">
                <div class="col-12 p-4 text-center">
                    <h3 class="chat_body" style="color: #fdd431;"><b>Chat User Info</b></h3>
                </div>
                <div class="col-12 p-4">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Name">
                </div>
                <div class="col-12 p-4">
                    <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                </div>
                <div class="col-12 p-4">
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone">
                </div>
                <div class="col-12 p-2 text-center">
                    <button class="chat-btn" id="guest_form_submit">Start Chat</button>
                </div>
            </div>
        </form>
    </div>
    <div id="chat_continer" style="display: none;">
        <ul class="chatbox">
            <li class="chat incoming">
                <span class="material-symbols-outlined">smart_toy</span>
                <!-- 				<p>Hi there 👋<br>How can I help you today? </p> -->
                <p>Hi 👋 Welcome to Styzeler!!!<br>For assistance please choose the following... </p>
            </li>
            <!-- 			<li class="chat outgoing"><p>asdfadsf</p></li> -->
        </ul>
        <form id="msg_form">
            <input type="hidden" id="msgType" name="msg_type" value="">
            <input type="hidden" id="guestUserId" name="guest_userid" value="">
            <div class="chat-input">

                <textarea id="message_area" name="message" placeholder="Enter a message..." spellcheck="false" required disabled></textarea>
                <span id="send-btn" class="material-symbols-rounded">send</span>


            </div>
        </form>
    </div>

</div>
<div class="modal fade bd-example-modal-md" id="showTokens_modal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-warning border"
            style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
            <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                <h4 class="modal-title">Tokens</h4>
                <i class="close-modal" style="font-size: 2rem;cursor:pointer;"><b>&times;</b></i>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <label>Total Tokens:</label>
                    </div>
                    <div class="col-8">
                        <p id="clientTotalTokens">10</p>
                    </div>

                    <div class="col-4">
                        <label>Remaining Tokens:</label>
                    </div>
                    <div class="col-8">
                        <p id="clientRemTokens">10</p>
                    </div>

                </div>
            </div>
            <!--        		<div class="modal-footer text-center"> -->
            <!--            		<a type="" href="javascript:;" class="btn1 customBtn">Ok</a> -->
            <!--              	<a type="button" class="btn1 customBtn close-modal" data-dismiss="modal">Close</a> -->
            <!--          	</div> -->
        </div>
    </div>
</div>

<!-- JS Files -->
<script src="{{ asset('template_new/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('template_new/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template_new/assets/js/animation.min.js') }}"></script>
<script src="{{ asset('template_new/assets/js/main.js') }}"></script>
<script src="{{ asset('template_new/assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('customjs/web/register/common.js') }}?v={{ time() }}"></script>
<script src="{{ asset('customjs/web/chat/chat.js') }}?v={{ time() }}"></script>
<script>
    $(".dropdown-toggle").click(function() {
        $('.dropdown-menu').toggleClass('show')
    });
    $(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
    });
    $(document).on("click", ".close-modal", function() {
        $('.modal').modal('hide');
    });
</script>
<!-- Favicon -->
@stack('script')
<!-- End Footer -->
