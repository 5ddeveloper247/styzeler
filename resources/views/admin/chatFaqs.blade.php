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
            <h1>Chat FAQ's</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Chat FAQ's</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
	<section class="content">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Chat FAQ's</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">

				<div class="row">
					<div class="col-3">
						<p>Username</p>
					</div>
					<div class="col-6">
						<p>Question</p>
					</div>
					<div class="col-3">
						<p>Details</p>
					</div>
					
				</div>
				<div class="row user-details">
					@if(count($questions)) 
					@foreach($questions as $row)
					<div class="col-3 pt-2" style="border-top: 1px solid grey;"><p>{{$row->chat_guest_user->name}}</p></div>
					<div class="col-6 pt-2" style="border-top: 1px solid grey;"><p>{{$row->question}}</p></div>
					<div class="col-3 pt-2" style="border-top: 1px solid grey;">
						<p style="cursor: pointer;" id="{{$row->id}}" onclick="getFaqQuestiondetail({{$row->id}})">Click to reply</p>
					</div>
					<hr>
					@endforeach @endif
				</div>



			</div>
			<!-- /.card-body -->
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
						<a href="{{route('admin.chatFaqs')}}" class="btn btn-primary mt-4" >Okay</a>

					</div>
					<div class="modal-footer text-center"></div>
				</div>
			</div>
		</div>
		<!-- /.card -->

		<div class="modal chat-question-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
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

						<form id="chat-reply-form">
							<input type="hidden" id="chat_id" name="chat_id" value="">
							<div class="form-group">
								<label for="chat_question">Question</label>
								<textarea type="text" class="form-control" id="chat_question" rows="3" disabled></textarea>
							</div>
							
							<label>Question Replies:</label>
							<div class="row" id="chatReply_container">
								
							</div>
							
							<div class="modal-footer text-center"></div>
							
							<div class="form-group">
								<label for="job-title">Reply</label>
								<textarea type="text" class="form-control" id="chat_reply"
									name="chat_reply" rows="3"></textarea>
							</div>

							<button type="button" class="btn customBtn" id="chat-reply-button"
								style="color: white; border: 1px solid; float: right;">Reply</button>
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
