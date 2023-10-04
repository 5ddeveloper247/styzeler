@extends('layouts.master.admin_template.master')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chat Questions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Chat Questions</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
	<section class="content">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Chat Questions</h3>
				<button type="button" class="btn customBtn" id="addNewQuestion" style="border: 1px solid; float: right;">Add</button>
			</div>
			<!-- /.card-header -->
			<div class="card-body">

				<div class="row">
					<div class="col-3">
						<p>Question</p>
					</div>
					<div class="col-5">
						<p>Answer</p>
					</div>
					<div class="col-2">
						<p>Details</p>
					</div>
					<div class="col-2">
						<p>Status</p>
					</div>
				</div>
				<div class="row user-details">
					@if(count($questions)) 
					@foreach($questions as $row)
					<div class="col-3 pt-2" style="border-top: 1px solid grey;"><p>{{$row->question}}</p></div>
					<div class="col-5 pt-2" style="border-top: 1px solid grey;"><p>{{$row->answer}}</p></div>
					<div class="col-2 pt-2" style="border-top: 1px solid grey;">
						<p style="cursor: pointer;" id="{{$row->id}}" onclick="getQuestiondetails({{$row->id}})">Click to see details</p>
					</div>

					@if($row->status == 'active')
						<div class="col-2 pt-2" style="border-top: 1px solid grey;">
							<p id="req_{{$row->id}}">
								<a class="txtdec-none" href="{{route('admin.changeQuestionStatusInActive')}}/{{$row->id}}" style="color: green;">Activated</a>
							</p>
						</div>
					@else
						<div class="col-2 pt-2" style="border-top: 1px solid grey;">
							<p id="req_{{$row->id}}">
								<a class="txtdec-none" href="{{route('admin.changeQuestionStatusActive')}}/{{$row->id}}" style="color: red;">Active Now</a>
							</p>
						</div>
					@endif
					<hr>
					@endforeach @endif


				</div>



			</div>
			<!-- /.card-body -->
		</div>
		<!-- Activate Jobs -->
		<div class="modal activated-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog " role="document">
				<div class="modal-content text-center">
					<div class="modal-body">
						<p class="mt-2" id="successMessage"></p>
						<button type="button" class="btn btn-primary mt-4 closeModal">Okay</button>

					</div>
					<div class="modal-footer text-center"></div>
				</div>
			</div>
		</div>
		<div class="modal upload-success" tabindex="-1" role="dialog">
			<div class="modal-dialog " role="document">
				<div class="modal-content text-center">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
<!-- 							<span aria-hidden="true">&times;</span> -->
						</button>
					</div>
					<div class="modal-body">
						<p class="mt-2">Question details submitted successfully!</p>
						<a href="{{route('admin.chatQuestions')}}" class="btn btn-primary mt-4" >Okay</a>

					</div>
					<div class="modal-footer text-center"></div>
				</div>
			</div>
		</div>
		<!-- /.card -->

		<div class="modal chat-question-modal" tabindex="-1" role="dialog"
			data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog " role="document"
				style="max-width: 660px !important;">
				<div class="modal-content bg-dark">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h5 class="text-center">Question Details</h5>

						<form id="question-form">
							<input type="hidden" id="question_id" name="question_id" value="">
							<div class="form-group">
								<label for="job-title">Question</label>
								<textarea type="text" class="form-control" id="chat_question"
									name="chat_question" rows="3"></textarea>
							</div>
							<div class="form-group">
								<label for="job-title">Answer</label>
								<textarea type="text" class="form-control" id="chat_answer"
									name="chat_answer" rows="3"></textarea>
							</div>

							<button type="button" class="btn customBtn" id="submit-button"
								style="color: white; border: 1px solid; float: right;">Save</button>
							<button type="button" class="btn customBtn mr-2"
								data-dismiss="modal"
								style="color: white; border: 1px solid; float: right;">Close</button>

						</form>

					</div>
					<div class="modal-footer text-center"></div>
				</div>
			</div>
		</div>
	</section>

	<!-- /.content -->
  </div>

@endsection

@push('script')
    <script src="{{ asset('customjs/web/register/common.js') }}?v={{time()}}"></script>
	<script src="{{ asset('customjs/admin/chat/chat.js') }}?v={{time()}}"></script>
    <script>
    $(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
    });

    $(".closeModal").click(function () {
    	$(".activated-modal").modal('hide');
    });
    
	@if(session('success'))
		$("#successMessage").text("{{session('success')}}");
		$(".activated-modal").modal('show');
	@endif

    
    </script>
@endpush
