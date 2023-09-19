@extends('layouts.master.template_new.master')

@push('css')
<style>
    #news .top_banner .txt {
      max-width: unset;
      padding: 4rem 0;
    }
    @media only screen and (max-width: 600px) {
      #news .top_banner .txt {
        max-width: unset;
        padding: 4rem 0;
      }
    }
  </style>
@endpush

@section('content')
<section id="news">
	<div class="top_banner"
		style="background-image: url('{{ asset('template_new/assets/images/news_main.jpg ') }}')">
		<div class="contain" data-aos="fade-up" data-aos-duration="1000">
			<div class="txt">
				<h1>Styzeler News Feed</h1>
				<p class="mt-0 mt-md-5">Styzeler news feed around the world follow
					us for a daily update on Beauty, Hair, Fashion, Jobs, & more</p>
			</div>
		</div>
	</div>
	<div class="contain" data-aos="fade-up" data-aos-duration="1000">
		<div class="btn_blk_wrap">
			<div class="btn_blk"
				style="background-image: url('{{ asset('template_new/assets/images/news_btn_bg.jpg ') }}')">
				<a href="{{route('jobs')}}" class="site_btn">Styzeler Job</a>
			</div>
			<div class="btn_blk"
				style="background-image: url('{{ asset('template_new/assets/images/news_btn_bg.jpg ') }}')">
				<a href="?" class="site_btn">Styzeler News Feed</a>
			</div>
		</div>
	</div>
</section>
<!-- news -->
@endsection

@push('script')
    
@endpush