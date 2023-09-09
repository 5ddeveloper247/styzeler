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
            <h1>Job Uploads</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Job Uploads</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Job Uploads</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

          <div class="row">
            <div class="col-3">
                <p>Job Title</p>
            </div>
            <div class="col-3">
                <p>Uploaded By</p>
            </div>
            <div class="col-3">
                <p>Details</p>
            </div>
            <div class="col-3">
                <p>Status</p>
            </div>
        </div>
        <div class="row user-details">
            <div class="col-3 pt-2" style="border-top: 1px solid grey;"><p>Senior Web Developer</p></div>
            <div class="col-3 pt-2" style="border-top: 1px solid grey;"><p>Barry Reed</p></div>
            <div class="col-3 pt-2" style="border-top: 1px solid grey;"><p style="cursor:pointer;" id="5" onclick="getJobdetails(this)">Click to see details</p></div>
            <div class="col-3 pt-2" style="border-top: 1px solid grey;"><p id="freelancer_0" style="cursor:pointer;"><a style="color: green;">Activated</a></p></div>
            <hr>
            <div class="col-3 pt-2" style="border-top: 1px solid grey;"><p>Senior Web Developer</p></div>
            <div class="col-3 pt-2" style="border-top: 1px solid grey;"><p>Barry Reed</p></div>
            <div class="col-3 pt-2" style="border-top: 1px solid grey;"><p style="cursor:pointer;" id="5" onclick="getJobdetails(this)">Click to see details</p></div>
            <div class="col-3 pt-2" style="border-top: 1px solid grey;"><p id="freelancer_0" style="cursor:pointer;"><a style="color: green;">Activated</a></p></div>
            <hr>
            <div class="col-3 pt-2" style="border-top: 1px solid grey;"><p>Senior Web Developer</p></div>
            <div class="col-3 pt-2" style="border-top: 1px solid grey;"><p>Barry Reed</p></div>
            <div class="col-3 pt-2" style="border-top: 1px solid grey;"><p style="cursor:pointer;" id="5" onclick="getJobdetails(this)">Click to see details</p></div>
            <div class="col-3 pt-2" style="border-top: 1px solid grey;"><p id="freelancer_2" style="cursor:pointer;"><a style="color:red;">Active Now</a></p></div>
            <hr>
        </div>
           

          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- Activate Jobs -->
      <div class="modal activated-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
          <div class="modal-content text-center">
            <div class="modal-body">
              <p class="mt-2">Job activated!</p>
              <button type="button" class="btn btn-primary mt-4" onclick="redirect();">Okay</button>

            </div>
            <div class="modal-footer text-center">
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
      
      <div class="modal post-job-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog " role="document" style="max-width:660px !important;">
        <div class="modal-content bg-dark">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5 class="text-center">JoB Details</h5>
            <p>
            	<div class="form-group">
                    <label for="job-title">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name">
                </div>
                <div class="form-group">
                    <label for="job-title">Job Title</label>
                    <input type="text" class="form-control" id="job-title" name="job_title">
                </div>
                <div class="form-group">
                    <label for="job-title">Job Description & benefits</label>
                    <textarea type="text" class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="job-title">Salary</label>
                    <input type="text" class="form-control" id="salary" name="salary">
                </div>
                <div class="form-group">
                    <label for="job-title">Location</label>
                    <input type="text" class="form-control" id="location" name="location">
                </div>
                <div class="form-group">
                    <label for="job-title">Email Address</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="job-title">Job Start Date</label>
                    <input  class="form-control" name="job_start_date" placeholder="01/01/2018" id="job-start-date"/>                    
                </div>
                <div class="form-group">
                    <label for="job-title">Job End Date</label>
                    <input  class="form-control" name="job_end_date" placeholder="01/01/2018" id="job-end-date"/>                    
                </div>
            </p>
            <button type="button" class="btn customBtn" data-dismiss="modal" style="color: white;border: 1px solid;float: right;">Close</button>
            <!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

          </div>
          <div class="modal-footer text-center">
          </div>
        </div>
      </div>
    </div>
    </section>

    <!-- /.content -->
  </div>

@endsection

@push('script')
    <script src="{{ asset('customjs/web/register/common.js') }}"></script>
    <script>
    function getJobdetails(element) {
    	$('div.post-job-modal').modal('show');
    }
    $(function () {
        $("#jsGrid1").jsGrid({
            height: "100%",
            width: "100%",

            sorting: true,
            paging: true,

            data: db.clients,

            fields: [
                { name: "Name", type: "text", width: 150 },
                { name: "Age", type: "number", width: 50 },
                { name: "Address", type: "text", width: 200 },
                { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
                { name: "Married", type: "checkbox", title: "Is Married" },
                { name: "Married", type: "checkbox", title: "Is Married" }

            ]
        });
      });
    </script>
@endpush
