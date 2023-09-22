@extends('layouts.master.template_old.master')

@push('css')
    <style>
      	.jobs .card {
        	background-color: #070708;
    	}
    	.color-1, h4 {
	    	color: #c9b9b0 !important;
		}
    </style>
@endpush

@section('content')

<div class="newsfeed-feed-banner mb-5">

	<img src="{{ asset('template_old/images/new-image-15.png') }}" alt="" width="100%">

</div>
<div class="jobs my-5">
	<div class="container">
		<h1 class="text-center text-uppercase color-1">Blogs</h1>
		<div class="all-blogs row justify-content-center" data-aos="fade-up">
			<div class="col-10 mt-4">
				<div id="9" class="card card-body color-1">
					<h4 class="text-uppercase">This is a test Blog With Formatting</h4>
					<h6 class="mt-4">2022-08-13</h6>
					<div class="show-image-0" style="display: none;">
						<img class="blog-image" id="blog-image-id-0" alt="" width="100%">
					</div>
					<h1>
						<strong>This an online examination project.</strong>
					</h1>
					<p>There are 3 steps of exam creation. On the 3rd step I want to
						input the number of question from available question in easy,
						medium or hard for mcq, fill in the blanks, true/false or essay.
						And the program will bulk insert random question from qbank table
						to exam_question table. You need to work on that one file.</p>
					<p>
						<em>I have two tables qbank and exam_question</em>
					</p>
					<p>I want the program will choose some random question from qbank
						table and insert it into exam_question table</p>
					<p>choosing random question with some conditions</p>
					<p>&nbsp;</p>
					<p>we need to input on those fields how many easy/medium/hard mcq
						question or how many easy/medium/hard true false questions we want
						the program to generate random questions</p>
				</div>
			</div>
			<div class="col-10 mt-4">
				<div id="8" class="card card-body color-1">
					<h4 class="text-uppercase">Your Hair Ritual \'\'Wash it-Clean
						it-Treat it\'\' Styzeler London</h4>
					<h6 class="mt-4">2022-02-02</h6>
					<div class="show-image-1">
						<img class="blog-image" id="blog-image-id-1" alt="" width="100%"
							src="{{ asset('template_old/images/logo.png') }}">
					</div>
					<p class="mt-2">When it comes to washing hair I heard all sorts of
						theories. Some are quite fascinating. I heard someone saying I
						don't wash my hair it self cleans or I only do one single shampoo
						as I wash it every day, the best one I only use conditioner
						because my hair is very dry, unfortunately, none of these theories
						is correct. </p>
				</div>
			</div>
			
                <div class="col-10 mt-4">
                    <div class="card card-body color-1">
                        <h4 class="text-uppercase">Beauty & Style</h4>
                        <h6 class="mt-4">June 4, 2018</h6>
                        <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim nulla pariatur, modi atque libero aspernatur quod dolore. Excepturi id quam repellendus commodi accusamus. Sapiente atque laudantium temporibus ad odio deleniti? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium exercitationem aperiam labore veritatis fuga sed voluptatibus nesciunt, reprehenderit ad ratione culpa explicabo sint quod necessitatibus, cupiditate placeat ipsum officia aliquid? Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe accusantium harum iusto iure! Corrupti quod aliquam blanditiis molestiae itaque quia quos inventore sapiente, harum modi eum non sequi velit omnis.</p>
                    </div>
                </div>
                <div class="col-10 mt-4">
                    <div class="card card-body color-1">
                        <h4 class="text-uppercase">Beauty & Style</h4>
                        <h6 class="mt-4">June 4, 2018</h6>
                        <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim nulla pariatur, modi atque libero aspernatur quod dolore. Excepturi id quam repellendus commodi accusamus. Sapiente atque laudantium temporibus ad odio deleniti? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium exercitationem aperiam labore veritatis fuga sed voluptatibus nesciunt, reprehenderit ad ratione culpa explicabo sint quod necessitatibus, cupiditate placeat ipsum officia aliquid? Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe accusantium harum iusto iure! Corrupti quod aliquam blanditiis molestiae itaque quia quos inventore sapiente, harum modi eum non sequi velit omnis.</p>
                    </div>
                </div>
                <div class="col-10 mt-4">
                    <div class="card card-body color-1">
                        <h4 class="text-uppercase">Beauty & Style</h4>
                        <h6 class="mt-4">June 4, 2018</h6>
                        <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim nulla pariatur, modi atque libero aspernatur quod dolore. Excepturi id quam repellendus commodi accusamus. Sapiente atque laudantium temporibus ad odio deleniti? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium exercitationem aperiam labore veritatis fuga sed voluptatibus nesciunt, reprehenderit ad ratione culpa explicabo sint quod necessitatibus, cupiditate placeat ipsum officia aliquid? Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe accusantium harum iusto iure! Corrupti quod aliquam blanditiis molestiae itaque quia quos inventore sapiente, harum modi eum non sequi velit omnis.</p>
                    </div>
                </div>
                <div class="col-10 mt-4">
                    <div class="card card-body color-1">
                        <h4 class="text-uppercase">Beauty & Style</h4>
                        <h6 class="mt-4">June 4, 2018</h6>
                        <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim nulla pariatur, modi atque libero aspernatur quod dolore. Excepturi id quam repellendus commodi accusamus. Sapiente atque laudantium temporibus ad odio deleniti? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium exercitationem aperiam labore veritatis fuga sed voluptatibus nesciunt, reprehenderit ad ratione culpa explicabo sint quod necessitatibus, cupiditate placeat ipsum officia aliquid? Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe accusantium harum iusto iure! Corrupti quod aliquam blanditiis molestiae itaque quia quos inventore sapiente, harum modi eum non sequi velit omnis.</p>
                    </div>
                </div>
                <div class="col-10 mt-4">
                    <div class="card card-body color-1">
                        <h4 class="text-uppercase">Beauty & Style</h4>
                        <h6 class="mt-4">June 4, 2018</h6>
                        <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim nulla pariatur, modi atque libero aspernatur quod dolore. Excepturi id quam repellendus commodi accusamus. Sapiente atque laudantium temporibus ad odio deleniti? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium exercitationem aperiam labore veritatis fuga sed voluptatibus nesciunt, reprehenderit ad ratione culpa explicabo sint quod necessitatibus, cupiditate placeat ipsum officia aliquid? Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe accusantium harum iusto iure! Corrupti quod aliquam blanditiis molestiae itaque quia quos inventore sapiente, harum modi eum non sequi velit omnis.</p>
                    </div>
                </div>
		</div>
	</div>
</div>

@endsection

@push('script')
<script>
function postNewJob(){
	$(".post-job-modal").modal('show');
}
</script>
@endpush
