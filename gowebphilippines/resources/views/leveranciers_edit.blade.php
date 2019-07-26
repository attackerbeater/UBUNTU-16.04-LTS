@extends('layouts.main')

@section('content')
		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

			@if ($errors->any())
			<div class="alert alert-danger alert-dismissable fade show">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <ul>
			        @foreach ($errors->all() as $error)
			        <li>{{ $error }}</li>
			        @endforeach
			    </ul>
			</div>
			@endif @if (\Session::get('success'))
			<div class="alert alert-success alert-dismissable fade show">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    {{ \Session::get('success') }}
			</div>
			@endif
		  
		    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		        <h1 class="h2">Edit Supplier</h1>

		    </div>

		    <form class="needs-validation" novalidate="" method="post" action="{{ url('/admin/lupdate', [$leveranciers->id]) }}" id="lupdate-form_">
		        {{ csrf_field() }}
		        <div class="container col-md-12">
		            <div class="row">
		                <div class="col-md-6">

		                    <div class="section-divider mb40"><span>SUPPLIER INFORMATION</span></div>
		                    <input type="hidden" name="id" value="{{$leveranciers->id}}">
		                    <div class="row">
		                        <div class="col-md-12 mb-3">
		                            <label for="supplierName">Supplier name</label>
		                            <input type="hidden" class="form-control" id="supplierPrimaryContactName" name="contact_first_name" value="{{$leveranciers->contact_first_name}}" required="">

		                            <input type="text" class="form-control" id="supplierName" placeholder="" name="supplier_name" value="{{$leveranciers->supplier_name}}" required="">
		                            <div class="invalid-feedback">
		                                Valid first name is required.
		                            </div>
		                        </div>

		                    </div>

		                    <div class="mb-3">

		                        <div class="mb-3">
		                            <label for="supplierStreet">Street + No.</label>
		                            <input type="text" class="form-control" id="supplier_street" name="supplier_street" value="{{$leveranciers->supplier_street}}" placeholder="1234 Main St" required="">
		                            <div class="invalid-feedback">
		                                Please enter your shipping address.
		                            </div>
		                        </div>
		                        <!-- <label for="supplierNumber">Number
		                            <span class="text-muted">(Optional)</span>
		                        </label>
		                        <input type="text" class="form-control" id="supplier_number" name="supplier_number" value="{{$leveranciers->supplier_number}}" placeholder="supplier Number">
		                        <div class="invalid-feedback">
		                            Please enter a valid email address for shipping updates.
		                        </div> -->
		                    </div>
		                    <div class="row">
		                        <div class="col-md-5 mb-3">
		                            <label for="supplierCountry">Country</label>
		                            <input type="text" class="form-control" id="supplier_country" name="supplier_country" value="{{$leveranciers->supplier_country}}" placeholder="supplier Country">
		                            <div class="invalid-feedback">
		                                Please enter a valid email address for shipping updates.
		                            </div>

		                        </div>
		                        <div class="col-md-4 mb-3">
		                            <label for="supplier_city">City</label>
		                            <input type="text" class="form-control" id="supplier_city" name="supplier_city" value="{{$leveranciers->supplier_city}}" placeholder="supplier City">
		                            <div class="invalid-feedback">
		                                Please provide a valid city
		                            </div>

		                        </div>
		                        <div class="col-md-3 mb-3">
		                            <label for="supplierZip">Zip</label>
		                            <input type="text" class="form-control" id="supplier_zip" name="supplier_zip" value="{{$leveranciers->supplier_zip}}" placeholder="" required="">
		                            <div class="invalid-feedback">
		                                Zip code required.
		                            </div>
		                        </div>

		                    </div>
		                    <div class="row">
		                        <div class="col-md-6 mb-3">
		                            <label for="ban">Bank Account Number</label>
		                            <input type="text" class="form-control" id="ban" name="ban" placeholder="" value="{{$leveranciers->ban}}" required="">

		                            <div class="invalid-feedback">
		                                Name on card is required
		                            </div>
		                        </div>
		                        <div class="col-md-6 mb-3">
		                            <label for="vn">VAT Number</label>
		                            <input type="text" class="form-control" id="vn" name="vn" value="{{$leveranciers->vn}}" placeholder="" required="">
		                            <div class="invalid-feedback">
		                                Please enter your Vat Number address.
		                            </div>
		                        </div>
		                        <div class="col-md-6 mb-3">
		                            <label for="supplierEmail">Supplier Email</label>
		                            <div class="input-group">
		                                <div class="input-group-prepend">
		                                    <span class="input-group-text">@</span>
		                                </div>
		                                <input type="text" class="form-control" id="supplier_email" name="supplier_email" value="{{$leveranciers->supplier_email}}" placeholder="supplier Email" required="">
		                                <div class="invalid-feedback" style="width: 100%;">
		                                    supplier email is required.
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-md-6 mb-3">
		                            <label for="supplierTelephone">Supplier Telephone</label>
		                            <input type="text" class="form-control" id="supplier_telephone" name="supplier_telephone" value="{{$leveranciers->supplier_telephone}}" placeholder="" required="">
		                            <div class="invalid-feedback">
		                                Please enter your supplier Telephone.
		                            </div>
		                        </div>

		                        <div class="col-md-6 mb-3">
		                            <label for="supplierGeneralFax">General Fax</label>
		                            <input type="text" class="form-control" id="supplier_general_fax" name="supplier_general_fax" value="{{$leveranciers->supplier_general_fax}}" placeholder="" required="">
		                            <div class="invalid-feedback">
		                                Please enter your shipping.
		                            </div>
		                        </div>
		                        <div class="col-md-6 mb-3">
		                            <label for="supplierRe">Commission rate</label>
		                            <input type="text" class="form-control" id="supplier_rate" name="supplier_rate" value="{{$leveranciers->supplier_rate}}" placeholder="" required="">
		                            <div class="invalid-feedback">
		                                Please enter your Commission rate.
		                            </div>
		                        </div>
		                        <div class="col-md-6 mb-3">
		                            <label for="supplierSector">Sector</label>
		                            <input type="text" class="form-control" id="supplier_sector" name="supplier_sector" value="{{$leveranciers->supplier_sector}}" placeholder="" required="">
		                            <div class="invalid-feedback">
		                                Please enter your Sector.
		                            </div>
		                        </div>

		                        <div class="col-md-6 mb-3">
		                            <label for="order_exclusivity_status">Exclusivity Status</label>

		                            <select class="custom-select d-block w-100" name="supplier_exclusivity_status">

		                                <option value="0" {{ ($leveranciers->supplier_exclusivity_status == 0)? "selected" : "" }}>No</option>

		                                <option value="1" {{ ($leveranciers->supplier_exclusivity_status == 1)? "selected" : "" }}>Yes</option>

		                            </select>
		                        </div>

		                    </div>

		                </div>
		                <div class="col-md-6">
		                
		                    <div class="section-divider mb40"><span>PRIMARY CONTACT INFORMATION</span></div>

		                    <div class="row">
		                    	<div class="col-md-12 mb-3">
		                    		<button class="btn btn-success btn-sm pull-right" type="submit">Update Supplier</button>
		                    	</div>
		                    	
		                        <div class="col-md-4 mb-3">
		                            <label for="supplierContactFirstName">First name</label>
		                            <input type="text" class="form-control" id="supplierContactFirstName" name="contact_first_name" value="{{$leveranciers->contact_first_name}}" placeholder="" value="">
		                            <div class="invalid-feedback">
		                                Valid last name is required.
		                            </div>
		                        </div>
		                        <div class="col-md-4 mb-3">
		                            <label for="contactLastname">Last name</label>
		                            <input type="text" class="form-control" id="contactLastname" name="contact_lastname" value="{{$leveranciers->contact_lastname}}" placeholder="" value="">
		                            <div class="invalid-feedback">
		                                Valid first name is required.
		                            </div>
		                        </div>
		                        <div class="col-md-4 mb-3">
		                            <label for="contactEmail">Email</label>
		                            <input type="text" class="form-control" id="contactEmail" name="contact_email" value="{{$leveranciers->contact_email}}" placeholder="" value="">
		                            <div class="invalid-feedback">
		                                Valid Email is required.
		                            </div>
		                        </div>
		                    </div>
		                    <div class="row mb-3">
		                        <div class="col-md-3 mb-3">
		                            <label for="contactTelephone">Telephone</label>
		                            <input type="text" class="form-control" id="contact_telephone" name="contact_telephone" value="{{$leveranciers->contact_telephone}}" placeholder="">
		                            <div class="invalid-feedback">
		                                Telephone required
		                            </div>
		                        </div>
		                        <div class="col-md-3 mb-3">
		                            <label for="function">Function</label>
		                            <input type="text" class="form-control" id="function" name="contact_function" value="{{$leveranciers->contact_function}}" placeholder="">
		                            <div class="invalid-feedback">
		                                Function required
		                            </div>
		                        </div>
		                    </div>

		                    <div class="section-divider mb40"><span>CONTACT PERSON INFORMATION</span></div>
		                    <button class="add_field_button btn btn-info btn-sm">Add More Fields</button>
		                    <div class="row input_fields_wrap">
		                        &nbsp;

		                        <?php

				    	   					$contact_person_last_name = explode(',',$leveranciers->contact_person_last_name);
				    	   					$contact_person_first_name = explode(',',$leveranciers->contact_person_first_name);
				    	   					$contact_person_function = explode(',',$leveranciers->contact_person_function);
				    	   					$contact_person_email = explode(',',$leveranciers->contact_person_email);
				    	   					$contact_person_telephone = explode(',',$leveranciers->contact_person_telephone);
				    	   					foreach ($contact_person_last_name as $key => $value) { ?>

		                            @if($value)
		                            <div class="col-md-12 multi-row">
		                                <button type="button" class="close remove_field" aria-label="Close">
		                                    <span aria-hidden="true">&times;</span>
		                                </button>
		                                <div class="row">
		                                    <div class="col-md-4 mb-3">
		                                        <label for="contactPersonFirstName">First name</label>
		                                        <input type="text" class="form-control" id="contactFirstName" name="contact_person_first_name[]" value="{{ $contact_person_last_name[$key] }}">
		                                        <div class="invalid-feedback"> Valid first name is required
		                                        </div>
		                                    </div>
		                                    <div class="col-md-4 mb-3">
		                                        <label for="contactPersonLastName">Last name</label>
		                                        <input type="text" class="form-control" id="contactLastName" name="contact_person_last_name[]" value="{{ $contact_person_first_name[$key] }}">
		                                        <div class="invalid-feedback"> Valid last name is required
		                                        </div>
		                                    </div>
		                                    <div class="col-md-4 mb-3">
		                                        <label for="contactPersonEmail">Contact Person Email</label>
		                                        <div class="input-group">
		                                            <div class="input-group-prepend">
		                                                <span class="input-group-text">@</span>
		                                            </div>
		                                            <input type="email" class="form-control" id="contact_person_email" name="contact_person_email[]" value="{{ $contact_person_email[$key] }}">
		                                            <div class="invalid-feedback" style="width: 100%;">Contact Person Email is required
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-6 mb-3">
		                                        <label for="contactPersonTelephone">Contact Person Telephone</label>
		                                        <input type="text" class="form-control" id="contact_person_telephone" name="contact_person_telephone[]" value="{{ $contact_person_telephone[$key] }}">
		                                        <div class="invalid-feedback">Please enter your Company Telephone.
		                                        </div>
		                                    </div>
		                                    <div class="col-md-6 mb-3">
		                                        <label for="contactPersonFunction">Function</label>
		                                        <input type="text" class="form-control" id="contactPersonFunction" name="contact_person_function[]" value="{{ $contact_person_function[$key] }}">
		                                        <div class="invalid-feedback"> Valid Contact Person Function is required
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            @endif
		                            <?php
				    	   					}

				    	   					?>

		                    </div>

		                    <hr class="mb-4">
		            

		                </div>
		            </div>
		        </div>
		    </form>

	

		</main>
	</div>
</div>
@endsection