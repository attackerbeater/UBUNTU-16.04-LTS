@extends('layouts.main')



@section('content')

<div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">



  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

    <h1 class="h2">Client View</h1>



  </div>

  <div class="table-responsive">

    <div class="row">



      <div class="col-md-6">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

          <h1 class="h4">Client Information </h1>



        </div>

        <table class="table table-bordered table-striped table-responsive">

          <tbody>

            <tr>

              <th class="text-nowrap" scope="row">ID</th>

              <td><strong>{{$klantens->id}}</strong></td>

            </tr>

            <tr>

              <th class="text-nowrap" scope="row">Client Name</th>

              <td><strong>{{$klantens->company_name}}</strong></td>

            </tr>

            <tr>

              <th class="text-nowrap" - scope="row">Primary Address</th>

              <td class="text-nowrap" scope="row">

                <div class="row">

                  <div class="col-md-3 text-right">Street + No:</div>

                  <div class="col-md-9">



                    {{$klantens->company_street}}



                  </div>

                  <!-- house number -->

                  <!--  <div class="col-md-3 text-right">House Number:</div>

                  <div class="col-md-9">

                  {{$klantens->company_number}}

                </div> -->

                <!-- city -->

                <div class="col-md-3 text-right">City:</div>

                <div class="col-md-9">

                  {{$klantens->company_city}}

                </div>

                <!-- zip -->

                <div class="col-md-3 text-right">Zip:</div>

                <div class="col-md-9">

                  {{$klantens->company_zip}}

                </div>

                <!-- country -->

                <div class="col-md-3 text-right">Country:</div>

                <div class="col-md-9">

                  {{$klantens->company_country}}

                </div>



              </div>



            </td>

          </tr>

          <tr>

            <th class="text-nowrap" scope="row">Bank Account</th>

            <td>{{$klantens->ban}}</td>

          </tr>

          <tr>

            <th class="text-nowrap" scope="row">VAT Number</th>

            <td>{{$klantens->vn}}</td>

          </tr>

          <tr>

            <th class="text-nowrap" scope="row">Email</th>

            <!-- <a href="mailto:name1@rapidtables.com?cc=name2@rapidtables.com&bcc=name3@rapidtables.com&amp;subject=The%20subject%20of%20the%20email&amp;body=The%20body%20of%20the%20email"> -->

            <td><a href="mailto:{{$klantens->company_email}}">{{$klantens->company_email}}</a></td>

          </tr>

          <tr>

            <th class="text-nowrap" scope="row">Company Telephone</th>

            <td>{{$klantens->company_telephone}}</td>

          </tr>

          <tr>

            <th class="text-nowrap" scope="row">General Fax</th>

            <td>{{$klantens->company_general_fax}}</td>

          </tr>



          <tr>

            <th class="text-nowrap" scope="row">Sector</th>

            <td>{{$klantens->company_sector}}</td>

          </tr>

        </tbody>

      </table>

    </div>

    <div class="col-md-6">



      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

        <h1 class="h4">Primary Contact Information</h1>

      </div>

      <table class="table table-bordered_ table-striped table-responsive_">

        <tbody>



          <tr>

            <th class="text-nowrap" scope="row">First Name</th>

            <td>{{$klantens->contact_first_name}}</td>

          </tr>

          <tr>

            <th class="text-nowrap" scope="row">Last Name</th>

            <td>{{$klantens->contact_lastname}}</td>

          </tr>

          <tr>

            <th class="text-nowrap" scope="row">Email</th>

            <td><a href="mailto:{{$klantens->contact_email}}">{{$klantens->contact_email}}</a></td>

          </tr>

          <tr>

            <th class="text-nowrap" scope="row">Telephone</th>

            <td>{{$klantens->contact_telephone}}</td>

          </tr>

          <tr>

            <th class="text-nowrap" scope="row">Function</th>

            <!--- -->

            <td>{{$klantens->contact_function}}</td>

          </tr>

        </tbody>

      </table>



      &nbsp;

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

        <h1 class="h4">Contact Person Information</h1>

      </div>

      <?php



      $contact_person_last_name = explode(',', $klantens->contact_person_last_name);

      $contact_person_first_name = explode(',', $klantens->contact_person_first_name);

      $contact_person_email = explode(',', $klantens->contact_person_email);

      $contact_person_telephone = explode(',', $klantens->contact_person_telephone);

      $contact_person_function = explode(',', $klantens->contact_person_function);



      ?>

      <table id="contact-person-information" class="display table table-striped table-sm" cellspacing="0" width="100%">

        <thead>



          <th class="text-nowrap" scope="row">First Name</th>

          <th class="text-nowrap" scope="row">Last Name</th>

          <th class="text-nowrap" scope="row">Email</th>

          <th class="text-nowrap" scope="row">Telephone</th>

          <th class="text-nowrap" scope="row">Function</th>

        </thead>

        <tbody>



          @foreach ($contact_person_last_name as $key => $value)

          <tr>

            <td>{{$contact_person_first_name[$key]}}</td>

            <td>{{$contact_person_last_name[$key]}}</td>



            <td><a href="mailto:{{$contact_person_email[$key]}}">{{$contact_person_email[$key]}}</a></td>

            <td>{{$contact_person_telephone[$key]}}</td>

            <td>{{$contact_person_function[$key]}}</td>

          </tr>

          @endforeach



        </tbody>

      </table>





    </div>





    <div class="col-md-12">

      <hr/>

      @if(count($related_orders)>0)

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

        <h1 class="h4">Related orders</h1>

      </div>



      <script src="{{url('assets/jquery-inline-edit-master/jquery.inline-edit.js')}}"></script>

      <table id="company-related-order" class="display table table-striped table-sm" cellspacing="0" width="100%">

        <thead>

          <th class="text-nowrap" scope="row">Reference order number</th>

          <th class="text-nowrap" scope="row">Supplier</th>

          <th class="text-nowrap" scope="row">Status</th>

          <th>Date purchased</th>

        </thead>

        <tfoot>

          <th class="text-nowrap" scope="row">Reference order number</th>

          <th class="text-nowrap" scope="row">Supplier</th>

          <th class="text-nowrap" scope="row">Status</th>

          <th>Date purchased</th>

        </tfoot>

        <tbody>
          <?php 

          // echo '<pre>';
          // print_r($related_orders);
          // echo '</pre>';
          ?>


          @foreach ($related_orders as $key => $order)



          <?php

          $r = explode('/',$order->order_reference_number);

          $refnum = implode('-',$r);


          ?>



          <tr>

            <td><a href='{{url("/admin/oread/{$order->id}/{$refnum}")}}'>{{$order->order_reference_number}} {{$order->client_id}}</a></td>



            @if($leveranciers[0]->id)



            <td><span class="inline-edit"><a href='{{url("/admin/lread/{$leveranciers[0]->id}")}}'>{{$order->order_supplier}}</a></span></td>



            @else

            <td><span class="inline-edit">Not exists</span></td>

            @endif



            <td>{{$order->order_status}}</td>

            <td>{{date("M j, Y, H:i:s", strtotime($order->updated_at))}}</td>



          </tr>



          @endforeach







        </tbody>

      </table>

      @endif

    </div>



  </div>

</div>

</main>

@endsection

