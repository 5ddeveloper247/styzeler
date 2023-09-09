@extends('layouts.master.admin_template.master')

@push('css')
@endpush

@section('content')
    <div class="content-wrapper">
   
    <section style="margin-top: 0px !important; ">
      <img src="{{ asset('assets_admin/images/styzeler-small-banner.png') }}" width="100%" height="100%" >
    </section>
    
  </div>
@endsection

@push('script')
    <script src="{{ asset('customjs/web/register/common.js') }}"></script>
    
@endpush
