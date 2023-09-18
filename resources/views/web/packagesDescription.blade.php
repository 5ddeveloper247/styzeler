@extends('layouts.master.template_new.master')

@push('css')
    <style>
       .border-top-5 {
	      border-top: 5px solid #766d48;
	      /* margin: 0px 20px; */
	    }
	    .margin-right-left {
	      /* margin: 0px 39px; */
	    }
	    #packages-desc .flex_row > div {
	      padding: 1.5rem;
	    }
	    h3 {
	      font-size: 3rem !important;
	      font-weight: 700;
	    }
	
	    h5 {
	      font-size: 2.5rem !important;
	      /* font-weight: 700; */
	      /* margin-top: .5rem; */
	      color: #d8c4b3;
	    }
    </style>
@endpush

@section('content')


<section id="packages-desc">
	<div class="contain">
		<div class="row flex_row">
			<div class="col-lg-4">
				<div class="border-top-5"></div>
				<h3 class="mt-5">STYZELER THE-ONE-OFF</h3>
				<h5>
					<u>Unlimited candidate</u>
				</h5>
				<p>The-one-off subscription is a great way to ensure work is
					compleated while searching for the right candidate for the role</p>
				<div>
					<h5 class="mt-5">
						<u>Events</u>
					</h5>

					Organisers are allowed to book unlimited freelancers for music
					videos, product launches, music festivals, trade shows, and
					business conferences
				</div>
			</div>
			<div class="col-lg-4">
				<div class="border-top-5"></div>
				<h3 class="mt-5">DEDICATED TO HELPING</h3>
				<h5>
					<u>Unlimited candidate</u>
				</h5>
				<p>"The dedicated to helping" is perfect for holiday leave to
					ensure, professionalism, performance and competitiveness remain at
					a high standard to ease up the pressure on permanent staff. the
					dedicated to Helping membership allows start-up businesses to grow
					the business organically with the help of freelancers and ease up
					the pressure of fixed wages, can offer a full-time position to any
					freelancer that suits the and ease up the pressure of fixed wages,
					can offer a full-time position to any freelancer that suits the
					company policy</p>
				<div>
					<h5 class="mt-5">
						<u>Rent & Let</u>
					</h5>
					<p>Rent & Let gives the chance to utilise and maximise on an empty
						chair, take advantage of the new feature rent & let as you go or
						the traditional chair rental</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="border-top-5"></div>
				<h3 class="mt-5">UNITED TO SUCCEED</h3>
				<h5>
					<u>Unlimited candidate</u>
				</h5>
				<p>United to succeed has been tailored to make sure efficiency and
					productivity remain at a high standard don't be short of staff
					risking turning that walk-in customer away that potentially could
					have become a loyal client with the united to succeed can hire any
					freelancer for a short period time or for an unlimited time can
					offer a full-time position to a freelancer that suits the company
					policy or directly contacts a candidate looking that suits the
					company policy ordirectley contact any freelancer looking for a
					permanent position</p>
				<div>
					<h5 class="mt-5">
						<u>Rent & Let</u>
					</h5>
					<p>Rent & Let gives the chance to utilise and maximise on an empty
						chair, take advantage of the new feature rent & let as you go or
						the traditional chair rental</p>
				</div>
				<div>
					<h5 class="mt-5">
						<u>Wedding</u>
					</h5>
					<p>wedding planners or brides can book a wedding stylist for a
						trial to discuss the suitable look</p>
				</div>
				<div>
					<h5 class="mt-5">
						<u>Events</u>
					</h5>
					<p>Organizers are allowed to book unlimited freelancers for music
						festivals, business conferences, product</p>
				</div>
				<div>
					<h5 class="mt-5">
						<u>Post a job</u>
					</h5>
					<p>Post a job and have candidates from the agency contact you or
						the whole online community can reach your organisation through our
						online marketing</p>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection

@push('script')

@endpush
