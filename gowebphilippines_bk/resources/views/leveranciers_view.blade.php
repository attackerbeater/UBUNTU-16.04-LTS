@extends('layouts.main')



@section('content')

<div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">



    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

        <h1 class="h2">Supplier View</h1>



    </div>

    <div class="table-responsive">

        <div class="row">



            <div class="col-md-6">



                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

                    <h1 class="h4">Supplier Information</h1>

                </div>

                <table class="table table-bordered_ table-striped table-responsive_">

                    <tbody>

                        <tr>

                            <th class="text-nowrap" scope="row">ID</th>

                            <td><strong>{{$leveranciers->id}}</strong></td>

                        </tr>

                        <tr>

                            <th class="text-nowrap" scope="row">Supplier Name</th>

                            <td><strong>{{$leveranciers->supplier_name}}</strong></td>

                        </tr>

                        <tr>

                            <th class="text-nowrap" - scope="row">Primary Address</th>

                            <td class="text-nowrap" scope="row">

                                <div class="row">

                                    <div class="col-md-3 text-right">Street + No:</div>

                                    <div class="col-md-9">

                                        

					    	  						  	{{$leveranciers->supplier_street}}

					    	  				

                                    </div>

                                    <!-- Supplier number -->

                                  <!--   <div class="col-md-3 text-right">House Number:</div>

                                    <div class="col-md-9">

                                        {{$leveranciers->supplier_number}}

                                    </div> -->

                                    <!-- city -->

                                    <div class="col-md-3 text-right">City:</div>

                                    <div class="col-md-9">

                                        {{$leveranciers->supplier_city}}

                                    </div>

                                    <!-- zip -->

                                    <div class="col-md-3 text-right">Zip:</div>

                                    <div class="col-md-9">

                                        {{$leveranciers->supplier_zip}}

                                    </div>

                                    <!-- country -->

                                    <div class="col-md-3 text-right">Country:</div>

                                    <div class="col-md-9">

                                        {{$leveranciers->supplier_country}}

                                    </div>

                                   

                                    <!-- tel -->

                                    <div class="col-md-3 text-right">Tel:</div>

                                    <div class="col-md-9">

                                        {{$leveranciers->supplier_telephone}}

                                    </div>

                                 

                                </div>



                            </td>



                        </tr>



                        <tr>

                            <th class="text-nowrap" - scope="row">Bank Account</th>

                            <td>{{$leveranciers->ban}}</td>

                        </tr>

                        <tr>

                            <th class="text-nowrap" - scope="row">VAT Number</th>

                            <td>{{$leveranciers->vn}}</td>

                        </tr>

                        <tr>

                            <th class="text-nowrap" - scope="row">Supplier Email</th>

                            <td><a href="mailto:{{$leveranciers->supplier_email}}">{{$leveranciers->supplier_email}}</a></td>

                        </tr>

                        <tr>

                            <th class="text-nowrap" - scope="row">Supplier Telephone</th>

                            <td>{{$leveranciers->supplier_telephone}}</td>

                        </tr>

                        <tr>

                            <th class="text-nowrap" - scope="row">General Fax</th>

                            <td>{{$leveranciers->supplier_general_fax}}</td>

                        </tr>

                        <tr>

                            <th class="text-nowrap" - scope="row">Commission Rate</th>

                            <td>{{$leveranciers->supplier_rate}}</td>

                        </tr>

                        <tr>

                            <th class="text-nowrap" - scope="row">Sector</th>

                            <td>{{$leveranciers->supplier_sector}}</td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <div class="col-md-6">

                



                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

                        <h1 class="h4">Primary Supplier Information</h1>

                    </div>

                    <table class="table table-bordered_ table-striped table-responsive_">

                        <tbody>

                          

                            <tr>

                                <th class="text-nowrap" scope="row">First Name</th>

                                <td>{{$leveranciers->contact_first_name}}</td>

                            </tr>

                            <tr>

                                <th class="text-nowrap" scope="row">Last Name</th>

                                <td>{{$leveranciers->contact_lastname}}</td>

                            </tr>

                            <tr>

                                <th class="text-nowrap" scope="row">Email</th>

                                <td> <a href="mailto:{{$leveranciers->contact_email}}">{{$leveranciers->contact_email}}</a></td>

                            </tr>

                            <tr>

                                <th class="text-nowrap" scope="row">Telephone</th>

                                <td>{{$leveranciers->contact_telephone}}</td>

                            </tr>

                            <tr>

                                <th class="text-nowrap" scope="row">Function</th>

                                <td>{{$leveranciers->contact_function}}</td>

                            </tr>

                        </tbody>

                    </table>

                    &nbsp;

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

                        <h1 class="h4">Supplier Person Information</h1>

                    </div>

                    <?php

                        $contact_person_last_name = explode(',', $leveranciers->contact_person_last_name);

                        $contact_person_first_name = explode(',', $leveranciers->contact_person_first_name);

                        $contact_person_email = explode(',', $leveranciers->contact_person_email);

                        $contact_person_telephone = explode(',', $leveranciers->contact_person_telephone);

                        $contact_person_function = explode(',', $leveranciers->contact_person_function);

                    ?>

                    <table id="supplier-person-information" class="display table table-striped table-sm" cellspacing="0" width="100%">

                        <thead>

                           

                            <th class="text-nowrap" scope="row">First Name</th>

                            <th class="text-nowrap" scope="row">Last Name</th>

                            <th class="text-nowrap" scope="row">Email</th>

                            <th class="text-nowrap" scope="row">Telephone</th>

                            <th class="text-nowrap" scope="row">Function</th>

                        </thead>

                

                        </tfoot>

                        <tbody>



                            @foreach ($contact_person_last_name as $key => $value)

                            <tr>

                                <td>{{$contact_person_first_name[$key]}}</td>

                                <td>{{$contact_person_last_name[$key]}}</td>

                               

                                <td> <a href="mailto:{{$contact_person_email[$key]}}">{{$contact_person_email[$key]}}</a></td>

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

                <table id="supplier-related-order" class="display table table-striped table-sm" cellspacing="0" width="100%">

                    <thead>

                        <th class="text-nowrap" scope="row">Reference order number</th>

                        <th class="text-nowrap" scope="row">Client</th>

                        <th class="text-nowrap" scope="row">Status</th>

                        <th>Date purchased</th>

                    </thead>

                    <tfoot>

                        <th class="text-nowrap" scope="row">Reference order number</th>

                        <th class="text-nowrap" scope="row">Client</th>

                        <th class="text-nowrap" scope="row">Status</th>

                        <th>Date purchased</th>

                    </tfoot>

                    <tbody>



                        @foreach ($related_orders as $key => $order)

                        <?php

                                $r = explode('/',$order->order_reference_number);

                                $refnum = implode('-',$r);

                                ?>

                            <tr>
                                <?php 

                                // echo '<pre>';
                                // print_r($order);
                                // echo '</pre>';
                                ?>
                                <td><a href='{{url("/admin/oread/{$order->id}/{$refnum}")}}'>{{$order->order_reference_number}}</a></td>

                                <td><span class="inline-edit"><a href='{{url("/admin/kread/{$klantens[0]->id}")}}'>{{$order->order_clients}}</a></span></td>

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