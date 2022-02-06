@extends('layouts.admin')
@push('styles')
    <link rel="stylesheet" href="{{asset('admin-let/plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css')}}">
@endpush
@section('content')


<div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title">Bootstrap Switch</h3>
    </div>
    <div class="card-body">
      <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
      <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
    </div>
  </div>
@endsection

@push('scripts')
<script src="{{asset('admin-let/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
  <script>
          $("input[data-bootstrap-switch]").each(function(){
          $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
  </script>
@endpush