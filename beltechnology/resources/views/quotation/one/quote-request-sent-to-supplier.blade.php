@extends('layouts.mainpdf')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs ul-center" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">GENERATE QUOTE LETTER FOR SUPPLIER</a>
        </li>
        <li class="nav-item" style="display:none;">
          <a class="nav-link" data-toggle="tab" href="#home" role="tab">SEND EMAIL TO SUPPLIER</a>
        </li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="profile" role="tabpanel">
          <div class="row mt-3">
            <div class="col-md-3 mb-3">
              <div class="form-group">
                <select class="form-control" id="localization">
                  <option value="en">English</option>
                  <option value="fr">French</option>
                  <option value="nl">Dutch</option>
                  <option value="de">German</option>
                </select>
              </div>
            </div>
          </div>
          <!-- en -->
          @include('quotation.one.en')
          <!-- fr -->
          @include('quotation.one.fr')          
          <!-- nl -->
          @include('quotation.one.nl')  
          <!-- de -->
          @include('quotation.one.de')     
        </div> <!-- /.row-->
      </div>
      <!-- /.container-->
      @endsection
