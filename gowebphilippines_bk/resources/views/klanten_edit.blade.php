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
		        <h1 class="h2">Edit Client</h1>

		    </div>

		    <form class="needs-validation" novalidate="" method="post" action="{{ url('/admin/kupdate', [$klantens->id]) }}" id="kupdate-form_" >
		        {{ csrf_field() }}
		        <div class="container col-md-12">
		            <div class="row">
		                <div class="col-md-6">

		                    <div class="section-divider mb40"><span>CLIENT INFORMATION</span></div>
		                    <input type="hidden" name="id" value="{{$klantens->id}}">
		                    <div class="row">
		                        <div class="col-md-12 mb-3">
		                            <label for="companyName">Client name</label>
		                            <input type="hidden" class="form-control" id="clientAddress" placeholder="" name="contact_first_name" value="{{$klantens->contact_first_name}}" required="">
		                            <input type="text" class="form-control" id="companyName" placeholder="" name="company_name" value="{{$klantens->company_name}}" required="">

		                            <div class="invalid-feedback">
		                                Valid first name is required.
		                            </div>
		                        </div>

		                    </div>

		                    <div class="mb-3">

		                        <div class="mb-3">
		                            <label for="companyStreet">Street + No.</label>
		                            <input type="text" class="form-control" id="company_street" name="company_street" value="{{$klantens->company_street}}" placeholder="1234 Main St" required="">
		                            <div class="invalid-feedback">
		                                Please enter your shipping address.
		                            </div>
		                        </div>
		                        <!-- <label for="companyNumber">Number
		                            <span class="text-muted">(Optional)</span>
		                        </label>
		                        <input type="text" class="form-control" id="company_number" name="company_number" value="{{$klantens->company_number}}" placeholder="Company Number">
		                        <div class="invalid-feedback">
		                            Please enter a valid email address for shipping updates.
		                        </div> -->
		                    </div>
		                    <div class="row">
		                        <div class="col-md-5 mb-3">
		                            <label for="companyCountry">Country</label>
		                            <input type="text" class="form-control" id="company_country" name="company_country" value="{{$klantens->company_country}}" placeholder="Company Country">
		                            <div class="invalid-feedback">
		                                Please enter a valid email address for shipping updates.
		                            </div>

		                        </div>
		                        <div class="col-md-4 mb-3">
		                            <label for="company_city">City</label>
		                            <input type="text" class="form-control" id="company_city" name="company_city" value="{{$klantens->company_city}}" placeholder="Company City">
		                            <div class="invalid-feedback">
		                                Please provide a valid city
		                            </div>

		                        </div>
		                        <div class="col-md-3 mb-3">
		                            <label for="companyZip">Zip</label>
		                            <input type="text" class="form-control" id="company_zip" name="company_zip" value="{{$klantens->company_zip}}" placeholder="" required="">
		                            <div class="invalid-feedback">
		                                Zip code required.
		                            </div>
		                        </div>

		                    </div>
		                    <div class="row">
		                        <div class="col-md-6 mb-3">
		                            <label for="ban">Bank Account Number</label>
		                            <input type="text" class="form-control" id="ban" name="ban" placeholder="" value="{{$klantens->ban}}" required="">
		                            <div class="invalid-feedback">
		                                Bank Account Number is required
		                            </div>
		                        </div>
		                        <div class="col-md-6 mb-3">
		                            <label for="vn">VAT Number</label>
		                            <input type="text" class="form-control" id="vn" name="vn" value="{{$klantens->vn}}" placeholder="" required="">
		                            <div class="invalid-feedback">
		                                Please enter your Vat Number address.
		                            </div>
		                        </div>
		                        <div class="col-md-6 mb-3">
		                            <label for="companyEmail">Company Email</label>
		                            <div class="input-group">
		                                <div class="input-group-prepend">
		                                    <span class="input-group-text">@</span>
		                                </div>
		                                <input type="text" class="form-control" id="company_email" name="company_email" value="{{$klantens->company_email}}" placeholder="Company Email" required="">
		                                <div class="invalid-feedback" style="width: 100%;">
		                                    Company email is required.
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-md-6 mb-3">
		                            <label for="companyTelephone">Company Telephone</label>
		                            <input type="text" class="form-control" id="company_telephone" name="company_telephone" value="{{$klantens->company_telephone}}" placeholder="" required="">
		                            <div class="invalid-feedback">
		                                Please enter your Company Telephone.
		                            </div>
		                        </div>

		                        <div class="col-md-6 mb-3">
		                            <label for="companyGeneralFax">General Fax</label>
		                            <input type="text" class="form-control" id="company_general_fax" name="company_general_fax" value="{{$klantens->company_general_fax}}" placeholder="" required="">
		                            <div class="invalid-feedback">
		                                Please enter your shipping.
		                            </div>
		                        </div>

		                        <div class="col-md-6 mb-3">
		                            <label for="companySector">Sector</label>
		                            <input type="text" class="form-control" id="company_sector" name="company_sector" value="{{$klantens->company_sector}}" placeholder="" required="">
		                            <div class="invalid-feedback">
		                                Please enter your Sector.
		                            </div>
		                        </div>
		                    </div>

		                </div>
		                <div class="col-md-6">

		                    <div class="section-divider mb40"><span>PRIMARY CONTACT INFORMATION</span></div>

		                    <div class="row">
		                    	<div class="col-md-12 mb-3">
		                    		<button class="btn btn-success btn-sm" type="submit">Update Client</button>
		                    	</div>
		                        <div class="col-md-4 mb-3">
		                            <label for="primaryContactName">First name</labe>
		                                <input type="text" class="form-control" id="primaryContactName" name="contact_first_name" value="{{$klantens->contact_first_name}}" placeholder="" value="">
		                                <div class="invalid-feedback">
		                                    Valid last name is required.
		                                </div>
		                        </div>
		                        <div class="col-md-4 mb-3">
		                            <label for="contactLastname">Last name</label>
		                            <input type="text" class="form-control" id="contactLastname" name="contact_lastname" value="{{$klantens->contact_lastname}}" placeholder="" value="">
		                            <div class="invalid-feedback">
		                                Valid first name is required.
		                            </div>
		                        </div>
		                        <div class="col-md-4 mb-3">
		                            <label for="contactEmail">Email</label>
		                            <input type="text" class="form-control" id="contactEmail" name="contact_email" value="{{$klantens->contact_email}}" placeholder="" value="">
		                            <div class="invalid-feedback">
		                                Valid Email is required.
		                            </div>
		                        </div>
		                    </div>
		                    <div class="row mb-3">
		                        <div class="col-md-6 mb-3">
		                            <label for="contactTelephone">Telephone</label>
		                            <input type="text" class="form-control" id="contact_telephone" name="contact_telephone" value="{{$klantens->contact_telephone}}" placeholder="">
		                            <div class="invalid-feedback">
		                                Telephone required
		                            </div>
		                        </div>
		                        <div class="col-md-6 mb-3">
		                            <label for="function">Function</label>
		                            <input type="text" class="form-control" id="function" name="contact_function" value="{{$klantens->contact_function}}" placeholder="">
		                            <div class="invalid-feedback">
		                                Function required
		                            </div>
		                        </div>
		                    </div>

		                    <!-- CONTACT PERSON INFORMATION -->

		                    <div class="section-divider mb40"><span>CONTACT PERSON INFORMATION</span></div>

		                    <button class="add_field_button btn btn-info btn-sm">Add More Fields</button>
		                    <div class="row input_fields_wrap">
		                        &nbsp;

		                        <?php
			    	   					$contact_person_last_name = explode(',',$klantens->contact_person_last_name);
			    	   					$contact_person_first_name = explode(',',$klantens->contact_person_first_name);
			    	   					$contact_person_function = explode(',',$klantens->contact_person_function);
			    	   					$contact_person_email = explode(',',$klantens->contact_person_email);
			    	   					$contact_person_telephone = explode(',',$klantens->contact_person_telephone);

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

		                            <?php } ?>

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
