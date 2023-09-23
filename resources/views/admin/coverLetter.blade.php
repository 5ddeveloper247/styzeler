<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
    <link rel="icon" href="{{asset('dist/img/favicon-logo.png')}}" type="image/png" sizes="16x16">
</head>
<body>
    
    <div class="showCv"></div>

	<script src="{{asset('assets_admin/plugins/jquery/jquery.min.js')}}"></script>

	<script src="{{asset('assets_admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script>
	    var h = window.innerHeight;
	    var w = window.innerWidth;

	    @if(@$type == 'cover_letter')
	    	$(".showCv").append('<embed src="{{ asset(isset($applicantDetail->applicant_cover_letter) ? $applicantDetail->applicant_cover_letter : '')}}" width="'+w+'" height="'+h+'">');
		@elseif(@$type == 'resume')
			$(".showCv").append('<embed src="{{ asset(isset($applicantDetail->applicant_resume) ? $applicantDetail->applicant_resume : '')}}" width="'+w+'" height="'+h+'">');
		@endif
	    
	    
    </script>

</body>
</html>


