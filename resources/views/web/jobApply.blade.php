@extends('layouts.master.template_old.master')

@push('css')
    <style>
        .newJob input,
        .newJob textarea {
            background-color: transparent !important;
            border-radius: 0px;
        }
    </style>
@endpush

@section('content')
    <div class="newJob container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1>Apply to the Job</h1>
                <form id="job-form" class="my-4">
                    <input type="hidden" id="jobId" name="jobId" value="{{ @$jobDetail->id }}">
                    <div class="form-group">
                        <input type="text" class="form-control" id="applicant-name" name="applicant_name"
                            placeholder="Applicant Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="applicant-email" name="applicant_email"
                            placeholder="Applicant Email">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="applicant-phone" name="applicant_phone"
                            placeholder="Applicant Phone">
                    </div>
                    <div class="form-group text-left">
                        <label for="applicant-cover-letter" class="color-1">Applicant Cover Letter (pdf)</label>
                        <input type="file" class="form-control" id="applicant-cover-letter" name="applicant_cl"
                            accept=".pdf" placeholder="Applicant Cover Letter">
                    </div>
                    <div class="form-group text-left">
                        <label for="applicant-resume" class="color-1">Applicant CV (pdf)</label>
                        <input type="file" class="form-control" id="applicant-resume" name="applicant_cv" accept=".pdf"
                            placeholder="Applicant Resume">
                    </div>
                    <div class="submit text-center">
                        <button type="submit" id="submit-button" class="btn customBtn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!--  Success Message-->
        <div class="modal success-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <!-- 						<span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">You've applied successfully!</h5>
                        <p>We shall get back to you.</p>
                        <a href="{{ route('jobs') }}" class="btn customBtn">Okay</a>

                    </div>
                    <div class="modal-footer text-center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('customjs/web/register/common.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('customjs/web/jobrequest/jobApply.js') }}?v={{ time() }}"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
        });
    </script>
@endpush
