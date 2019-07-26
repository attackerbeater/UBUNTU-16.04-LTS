@extends('layouts.main')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Client</h1> @if (\Session::get('success'))
    <div class="alert alert-success alert-dismissable fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Updated!</strong> {{ \Session::get('success') }}
    </div>
    @endif
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">Add new client</button>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table id="klanten" class="display table table-striped table-sm" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Client ID</th>
          <th>Company Name</th>
          <th>Primary Contact</th>
          <th>City</th>
          <th>Sector</th>
          <th>Country</th>
          <th>Action</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Client ID</th>
          <th>Company Name</th>
          <th>Primary Contact</th>
          <th>City</th>
          <th>Sector</th>
          <th>Country</th>
          <th>Action</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
      </tfoot>
      <tbody>
        @if(count($klantens) > 0) @foreach($klantens->all() as $list)
        <tr>
          <td>{{$list->id}}</td>
          <td><a style="color:#333; text-decoration: underline;" href='{{url("/admin/kread/{$list->id}")}}'>{{$list->company_name}}</a></td>
          <td><a style="color:#333; text-decoration: none;" href='{{url("/admin/kread/{$list->id}")}}'>{{$list->contact_first_name}}, {{$list->contact_lastname}}</a></td>
          <td><a style="color:#333; text-decoration: underline;" href='{{url("/admin/kread/{$list->id}")}}'>{{$list->company_city}}</a></td>
          <td><a style="color:#333; text-decoration: underline;" href='{{url("/admin/kread/{$list->id}")}}'>{{$list->company_sector}}</a></td>
          <td><a style="color:#333; text-decoration: underline;" href='{{url("/admin/kread/{$list->id}")}}'>{{$list->company_country}}</a></td>
          <td>
            <a class="btn btn-info btn-sm custom" href='{{url("/admin/kread/{$list->id}")}}'>
              <span data-feather="eye-off"></span> view
            </a>
          </td>
          <td id="edit_row_">
            <a class="btn btn-success btn-sm custom" href='{{url("/admin/kedit/{$list->id}")}}'>
              <span data-feather="edit"></span> edit
            </a>
          </td>
          <td id="delete_row">
            <a class="btn btn-danger btn-sm custom" id="{{$list->id}}" href='{{url("/admin/kdelete/{$list->id}")}}' data-name="{{$list->company_name}}">
              <span data-feather="delete"></span> delete
            </a>
          </td>
        </tr>
        @endforeach @endif
      </tbody>
    </table>
  </div>
</main>
</div>
</div>
<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form method="post" action="{{url('admin/kstore')}}" id="kstore-form">
      {{ csrf_field() }}
      <div class="modal-content">
        <div class="alert alert-danger kstore-form-error-msg" style="display:none;">
          <ul></ul>
        </div>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Client</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container col-md-12">
            <div class="row">
              <div class="col-md-6">
                <div class="section-divider mb40"><span>CLIENT INFORMATION</span></div>
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <label for="companyName">Client Name</label>
                    <input type="text" class="form-control" id="companyName" name="company_name">
                    <div class="invalid-feedback">
                      Valid first name is required.
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="companyStreet">Street + No.</label>
                    <input type="text" class="form-control" id="company_street" name="company_street">
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5 mb-3">
                    <label for="companyCountry">Country</label>
                    @php
                    $countries = array(
                    "AF" => "Afghanistan",
                    "AL" => "Albania",
                    "DZ" => "Algeria",
                    "AS" => "American Samoa",
                    "AD" => "Andorra",
                    "AO" => "Angola",
                    "AI" => "Anguilla",
                    "AQ" => "Antarctica",
                    "AG" => "Antigua and Barbuda",
                    "AR" => "Argentina",
                    "AM" => "Armenia",
                    "AW" => "Aruba",
                    "AU" => "Australia",
                    "AT" => "Austria",
                    "AZ" => "Azerbaijan",
                    "BS" => "Bahamas",
                    "BH" => "Bahrain",
                    "BD" => "Bangladesh",
                    "BB" => "Barbados",
                    "BY" => "Belarus",
                    "BE" => "Belgium",
                    "BZ" => "Belize",
                    "BJ" => "Benin",
                    "BM" => "Bermuda",
                    "BT" => "Bhutan",
                    "BO" => "Bolivia",
                    "BA" => "Bosnia and Herzegovina",
                    "BW" => "Botswana",
                    "BV" => "Bouvet Island",
                    "BR" => "Brazil",
                    "IO" => "British Indian Ocean Territory",
                    "BN" => "Brunei Darussalam",
                    "BG" => "Bulgaria",
                    "BF" => "Burkina Faso",
                    "BI" => "Burundi",
                    "KH" => "Cambodia",
                    "CM" => "Cameroon",
                    "CA" => "Canada",
                    "CV" => "Cape Verde",
                    "KY" => "Cayman Islands",
                    "CF" => "Central African Republic",
                    "TD" => "Chad",
                    "CL" => "Chile",
                    "CN" => "China",
                    "CX" => "Christmas Island",
                    "CC" => "Cocos (Keeling) Islands",
                    "CO" => "Colombia",
                    "KM" => "Comoros",
                    "CG" => "Congo",
                    "CD" => "Congo, the Democratic Republic of the",
                    "CK" => "Cook Islands",
                    "CR" => "Costa Rica",
                    "CI" => "Cote D'Ivoire",
                    "HR" => "Croatia",
                    "CU" => "Cuba",
                    "CY" => "Cyprus",
                    "CZ" => "Czech Republic",
                    "DK" => "Denmark",
                    "DJ" => "Djibouti",
                    "DM" => "Dominica",
                    "DO" => "Dominican Republic",
                    "EC" => "Ecuador",
                    "EG" => "Egypt",
                    "SV" => "El Salvador",
                    "GQ" => "Equatorial Guinea",
                    "ER" => "Eritrea",
                    "EE" => "Estonia",
                    "ET" => "Ethiopia",
                    "FK" => "Falkland Islands (Malvinas)",
                    "FO" => "Faroe Islands",
                    "FJ" => "Fiji",
                    "FI" => "Finland",
                    "FR" => "France",
                    "GF" => "French Guiana",
                    "PF" => "French Polynesia",
                    "TF" => "French Southern Territories",
                    "GA" => "Gabon",
                    "GM" => "Gambia",
                    "GE" => "Georgia",
                    "DE" => "Germany",
                    "GH" => "Ghana",
                    "GI" => "Gibraltar",
                    "GR" => "Greece",
                    "GL" => "Greenland",
                    "GD" => "Grenada",
                    "GP" => "Guadeloupe",
                    "GU" => "Guam",
                    "GT" => "Guatemala",
                    "GN" => "Guinea",
                    "GW" => "Guinea-Bissau",
                    "GY" => "Guyana",
                    "HT" => "Haiti",
                    "HM" => "Heard Island and Mcdonald Islands",
                    "VA" => "Holy See (Vatican City State)",
                    "HN" => "Honduras",
                    "HK" => "Hong Kong",
                    "HU" => "Hungary",
                    "IS" => "Iceland",
                    "IN" => "India",
                    "ID" => "Indonesia",
                    "IR" => "Iran, Islamic Republic of",
                    "IQ" => "Iraq",
                    "IE" => "Ireland",
                    "IL" => "Israel",
                    "IT" => "Italy",
                    "JM" => "Jamaica",
                    "JP" => "Japan",
                    "JO" => "Jordan",
                    "KZ" => "Kazakhstan",
                    "KE" => "Kenya",
                    "KI" => "Kiribati",
                    "KP" => "Korea, Democratic People's Republic of",
                    "KR" => "Korea, Republic of",
                    "KW" => "Kuwait",
                    "KG" => "Kyrgyzstan",
                    "LA" => "Lao People's Democratic Republic",
                    "LV" => "Latvia",
                    "LB" => "Lebanon",
                    "LS" => "Lesotho",
                    "LR" => "Liberia",
                    "LY" => "Libyan Arab Jamahiriya",
                    "LI" => "Liechtenstein",
                    "LT" => "Lithuania",
                    "LU" => "Luxembourg",
                    "MO" => "Macao",
                    "MK" => "Macedonia, the Former Yugoslav Republic of",
                    "MG" => "Madagascar",
                    "MW" => "Malawi",
                    "MY" => "Malaysia",
                    "MV" => "Maldives",
                    "ML" => "Mali",
                    "MT" => "Malta",
                    "MH" => "Marshall Islands",
                    "MQ" => "Martinique",
                    "MR" => "Mauritania",
                    "MU" => "Mauritius",
                    "YT" => "Mayotte",
                    "MX" => "Mexico",
                    "FM" => "Micronesia, Federated States of",
                    "MD" => "Moldova, Republic of",
                    "MC" => "Monaco",
                    "MN" => "Mongolia",
                    "MS" => "Montserrat",
                    "MA" => "Morocco",
                    "MZ" => "Mozambique",
                    "MM" => "Myanmar",
                    "NA" => "Namibia",
                    "NR" => "Nauru",
                    "NP" => "Nepal",
                    "NL" => "Netherlands",
                    "AN" => "Netherlands Antilles",
                    "NC" => "New Caledonia",
                    "NZ" => "New Zealand",
                    "NI" => "Nicaragua",
                    "NE" => "Niger",
                    "NG" => "Nigeria",
                    "NU" => "Niue",
                    "NF" => "Norfolk Island",
                    "MP" => "Northern Mariana Islands",
                    "NO" => "Norway",
                    "OM" => "Oman",
                    "PK" => "Pakistan",
                    "PW" => "Palau",
                    "PS" => "Palestinian Territory, Occupied",
                    "PA" => "Panama",
                    "PG" => "Papua New Guinea",
                    "PY" => "Paraguay",
                    "PE" => "Peru",
                    "PH" => "Philippines",
                    "PN" => "Pitcairn",
                    "PL" => "Poland",
                    "PT" => "Portugal",
                    "PR" => "Puerto Rico",
                    "QA" => "Qatar",
                    "RE" => "Reunion",
                    "RO" => "Romania",
                    "RU" => "Russian Federation",
                    "RW" => "Rwanda",
                    "SH" => "Saint Helena",
                    "KN" => "Saint Kitts and Nevis",
                    "LC" => "Saint Lucia",
                    "PM" => "Saint Pierre and Miquelon",
                    "VC" => "Saint Vincent and the Grenadines",
                    "WS" => "Samoa",
                    "SM" => "San Marino",
                    "ST" => "Sao Tome and Principe",
                    "SA" => "Saudi Arabia",
                    "SN" => "Senegal",
                    "CS" => "Serbia and Montenegro",
                    "SC" => "Seychelles",
                    "SL" => "Sierra Leone",
                    "SG" => "Singapore",
                    "SK" => "Slovakia",
                    "SI" => "Slovenia",
                    "SB" => "Solomon Islands",
                    "SO" => "Somalia",
                    "ZA" => "South Africa",
                    "GS" => "South Georgia and the South Sandwich Islands",
                    "ES" => "Spain",
                    "LK" => "Sri Lanka",
                    "SD" => "Sudan",
                    "SR" => "Suriname",
                    "SJ" => "Svalbard and Jan Mayen",
                    "SZ" => "Swaziland",
                    "SE" => "Sweden",
                    "CH" => "Switzerland",
                    "SY" => "Syrian Arab Republic",
                    "TW" => "Taiwan, Province of China",
                    "TJ" => "Tajikistan",
                    "TZ" => "Tanzania, United Republic of",
                    "TH" => "Thailand",
                    "TL" => "Timor-Leste",
                    "TG" => "Togo",
                    "TK" => "Tokelau",
                    "TO" => "Tonga",
                    "TT" => "Trinidad and Tobago",
                    "TN" => "Tunisia",
                    "TR" => "Turkey",
                    "TM" => "Turkmenistan",
                    "TC" => "Turks and Caicos Islands",
                    "TV" => "Tuvalu",
                    "UG" => "Uganda",
                    "UA" => "Ukraine",
                    "AE" => "United Arab Emirates",
                    "GB" => "United Kingdom",
                    "US" => "United States",
                    "UM" => "United States Minor Outlying Islands",
                    "UY" => "Uruguay",
                    "UZ" => "Uzbekistan",
                    "VU" => "Vanuatu",
                    "VE" => "Venezuela",
                    "VN" => "Viet Nam",
                    "VG" => "Virgin Islands, British",
                    "VI" => "Virgin Islands, U.s.",
                    "WF" => "Wallis and Futuna",
                    "EH" => "Western Sahara",
                    "YE" => "Yemen",
                    "ZM" => "Zambia",
                    "ZW" => "Zimbabwe"
                    )
                    @endphp
                    <select name="company_country" class="form-control">
                      <option value="">-- select country --</option>
                      @foreach($countries as $country_key => $country_value)
                      <option value="{{$country_key}}">{{$country_value}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="company_city">City</label>
                    <input type="text" class="form-control" id="company_city" name="company_city">
                    <div class="invalid-feedback">
                      Please provide a valid city
                    </div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="companyZip">Zip</label>
                    <input type="text" class="form-control" id="company_zip" name="company_zip">
                    <div class="invalid-feedback">
                      Zip code required.
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="ban">Bank Account Number</label>
                    <input type="text" class="form-control" id="ban" name="ban">
                    <div class="invalid-feedback">
                      Name on card is required
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="vn">VAT Number</label>
                    <input type="text" class="form-control" id="vn" name="vn">
                    <div class="invalid-feedback">
                      Please enter your Vat Number address.
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="companyEmail">Company Email</label>
                    <input type="text" class="form-control" id="company_email" name="company_email">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="companyTelephone">Company Telephone</label>
                    <input type="text" class="form-control" id="company_telephone" name="company_telephone">
                    <div class="invalid-feedback">
                      Please enter your Company Telephone.
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="companyGeneralFax">General Fax</label>
                    <input type="text" class="form-control" id="company_general_fax" name="company_general_fax">
                    <div class="invalid-feedback">
                      Please enter your shipping.
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="companySector">Sector</label>
                    <input type="text" class="form-control" id="company_sector" name="company_sector">
                    <div class="invalid-feedback">
                      Please enter your Sector.
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <!-- PRIMARY CONTACT INFORMATION -->
                <div class="section-divider mb40"><span>PRIMARY CONTACT INFORMATION</span></div>
                <div class="row">
                  <div class="col-md-2 mb-3">
                    <div class="form-group">
                      <label for="primaryContactName">&nbsp;</label>
                      <select class="form-control">
                        <option value="">Title</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Ms">Ms</option>
                        <option value="Miss">Miss</option>
                        <option value="Dr">Dr</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="primaryContactName">First name</label>
                    <input type="text" class="form-control" id="primaryContactName" name="contact_first_name">
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="contactLastname">Last name</label>
                    <input type="text" class="form-control" id="contactLastname" name="contact_lastname">
                    <div class="invalid-feedback">
                      Valid first name is required.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="contactEmail">Email</label>
                    <input type="text" class="form-control" id="contactEmail" name="contact_email">
                    <div class="invalid-feedback">
                      Valid Email is required.
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="contactTelephone">Telephone</label>
                    <input type="text" class="form-control" id="contactTelephone" name="contact_telephone">
                    <div class="invalid-feedback">
                      Telephone required
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="contactFunction">Function</label>
                    <input type="text" class="form-control" id="contactFunction" name="contact_function">
                    <div class="invalid-feedback">
                      Contact Function required
                    </div>
                  </div>
                </div>
                <!-- CONTACT PERSON INFORMATION -->
                <div class="section-divider mb40"><span>CONTACT PERSON INFORMATION</span></div>
                <button class="add_field_button btn btn-info btn-sm">Add More Fields</button>
                <div class="row input_fields_wrap">
                  &nbsp;
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" id="kstore-submit" class="btn btn-success btn-sm pull-right">Send</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
