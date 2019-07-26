<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Mall-E - Malls</title>
      <link href="https://mall-e.net/assets/images/logo/malle.png" rel="icon" type="image">
      <link rel="stylesheet" type="text/css" href="https://mall-e.net/assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://mall-e.net/assets/css/malle_style.css">
      <link rel="stylesheet" type="text/css" href="https://mall-e.net/assets/fontawesome/css/all.css">
      <script type="text/javascript" src="https://mall-e.net/assets/js/jquery.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDBnip6Qb5cLuPkYcVXPaPdIQHvFhdCnOQ"></script>
      <script>
         if (navigator.geolocation) {
                   navigator.geolocation.watchPosition(function(position) {
                    
         			var x_lat = position.coords.latitude;
         			var x_long = position.coords.longitude;
         			var res;
         			 
         			 
         			 
         			 
         			$(".mallcontainer").each(function(){
         			    console.log($(this).attr("data-id"),$(this).attr("data-lat"),$(this).attr("data-long"));
         			    var id = $(this).attr("data-id");
         			    var return_result = '';
         			    var _lat = $(this).attr("data-lat");
         			    var _long = $(this).attr("data-long");
         			   
         			    var origin1 = {lat: parseFloat(x_lat), lng: parseFloat(x_long)};
         				var destinationB = {lat: parseFloat(_lat), lng: parseFloat(_long)}; 
         				var geocoder = new google.maps.Geocoder;
         
         		        var service = new google.maps.DistanceMatrixService;
         		        service.getDistanceMatrix({
         		          origins: [origin1],
         		          destinations: [destinationB],
         		          travelMode: 'DRIVING',
         		          unitSystem: google.maps.UnitSystem.METRIC,
         		          avoidHighways: false,
         		          avoidTolls: false
         		        }, function(response, status) {
         		          if (status !== 'OK') {
         		            alert('Error was: ' + status);
         		          } else {
         		          	
         		          	results = response;
         		          	console.log(results);
         		            var originList = response.originAddresses;
         		            var destinationList = response.destinationAddresses;
         					if(response.rows[0].elements[0].status=="ZERO_RESULTS")
         					return_result = "Distance not available with your location!"
         					else
         		           	return_result = response.rows[0].elements[0].distance.text;
         		           
         		        	
         			    	$(".mallcontainer[data-id="+id+"] .text-danger").html(return_result);
         		            
         		        	}
         		        });
         			   
         			   
         			});
         			
         			
         			
         			
         	     }, function() {
                     alert("No Location found") ;
                   });
                 } else {
                  
                   alert("No Location found") ;
          }
      </script>
      <style>
         .malle-body2 {
         background: url(../../assets/images/src/shop-interior.jpeg) no-repeat;
         background-position: center !important;
         background-size: cover !important;
         height: 200px;
         }
      </style>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white	shadow-sm">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item" style="margin-right: 10px;border-right: 3px solid;">
                  <a class="nav-link" href="https://mall-e.net/">
                  <img class="malle-logo" src="https://mall-e.net/assets/images/logo/rec.png" >
                  </a>
               </li>
               <li class="nav-item ">
                  <select class="malle-country">
                     <option value="1" >Singapore</option>
                     <option value="2" >India</option>
                     <option value="3" >Malaysia</option>
                     <option value="4" >Philippines</option>
                  </select>
               </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
               <li class="nav-item" style="margin: 0px 20px;">
                  <p  style="  margin-bottom: 0px;">Merchant</p>
                  <a href="https://mall-e.net/NewMerchant"><button class="btn-orange my-2 my-sm-0 " type="submit">Open Free Account</button></a>
               </li>
               <li class="nav-item"  style="margin: 0px 20px;">
                  <p style="  margin-bottom: 0px;">Shoppers</p>
                  <a href="https://mall-e.net/Shopper"><button class="btn-red my-2 my-sm-0 " type="submit">Quick Register</button></a>
               </li>
               <li class="nav-item"  style="margin: 0px 20px;">
                  <p  style="  margin-bottom: 0px;">&nbsp;</p>
                  <a href="#" class="btn-blue my-2 my-sm-0" >How it works</a>
               </li>
               <li class="nav-item active"  style="margin: 14px 20px;"> 
                  <a class="nav-link" href="#">
                  <i class="fas fa-bars malle-bars"></i>
                  </a>
               </li>
            </ul>
         </div>
      </nav>
      <div class="container-fluid">
         <div class="row malle-body2" id="malle-body">
            <!-- <div class="col-md-12">
               <img class="malle-logo2" id="intro" src="https://mall-e.net/assets/images/logo/rec.png">
               
               </div>
               
               <div class="col-md-12" id="intro2">
               
               <h2>Are you going to a mall?</h2>
               
               <p>Looking for Discounts, Coupon, Sales</p>
               
               </div> -->
         </div>
         <div class="row latest-deals-container mt-5">

            <div id="filters">  
               <style>
                  ul.filter > li {
                     float: left;
                  }
               </style>
               <ul class="filter">
                  <li><a data-filter="*"><h4>All(52) | </h4></a></li>
                  <li><a data-filter=".mall"><h4>Mall(47) | </h4></a></li> 
                  <li><a data-filter=".shopping-center"><h4>Shopping Center(2) |</h4></li> 
                  <li><a data-filter=".housing-building"><h4>Housing Building(2) |</h4></li> 
                  <li><a data-filter=".hotel"><h4>Hotel(1)</h4></li>			
               </ul> 
            </div>   
            <div class="col-md-12 grid">
               <div class="row mt-5">
                  <div class="col-md-3 mt-3 mallcontainer element-item mall" data-id="44" data-lat="1.4481739" data-long="103.81959610000001" >
                     <a href="https://mall-e.net/Mall/MallInfo/44" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/10cc7a39d7de139e7a59093aaea76770.JPG" alt="Sun Plaza">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Sun Plaza</h5>
                                    <p>Sembawang ,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item shopping-center"  data-id="47" data-lat="1.428389" data-long="103.83610780000004" >
                     <a href="https://mall-e.net/Mall/MallInfo/47" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/dc4b15de32a1fad318bc420aa9af65d9.JPG" alt="Northpoint City">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Northpoint City</h5>
                                    <p>Yishun,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item housing-building"  data-id="5" data-lat="1.4066226" data-long="103.90218129999994" >
                     <a href="https://mall-e.net/Mall/MallInfo/5" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/c809f1d01a83f17b2003b8d0a71d9929.JPG" alt="Waterway Point">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Waterway Point</h5>
                                    <p>Punggol,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item hotel"  data-id="68" data-lat="1.39716" data-long="103.74683520000008" >
                     <a href="https://mall-e.net/Mall/MallInfo/68" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/f194f4a44783c50b482caaf1df6d4fac.JPG" alt="Yew Tee Point">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Yew Tee Point</h5>
                                    <p>Yew Tee,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item mall"  data-id="29" data-lat="1.3919537" data-long="103.90472360000001" >
                     <a href="https://mall-e.net/Mall/MallInfo/29" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/98675b45eb01d1df076a9d5eb99c7f1a.JPG" alt="Rivervale Mall">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Rivervale Mall</h5>
                                    <p>Sengkang,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item shopping-center"  data-id="75" data-lat="1.3851131" data-long="103.74493699999994" >
                     <a href="https://mall-e.net/Mall/MallInfo/75" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/18c66527f6d8cce990379a783c147aa4.JPG" alt="Lot One Shoppers' Mall">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Lot One Shoppers' Mall</h5>
                                    <p>Marine Parade,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item housing-building"  data-id="35" data-lat="1.3776353" data-long="103.95469630000002" >
                     <a href="https://mall-e.net/Mall/MallInfo/35" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/1dfd93f24e9d2a7841cefc1da0c1f0ee.JPG" alt="Downtown East">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Downtown East</h5>
                                    <p>Pasir Ris,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item hotel"  data-id="37" data-lat="1.3724754" data-long="103.94961469999998" >
                     <a href="https://mall-e.net/Mall/MallInfo/37" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/2ed406531e7a93dee6389d2b2551eb1e.JPG" alt="White Sands Mall">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">White Sands Mall</h5>
                                    <p>Pasir Ris,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item mall"  data-id="32" data-lat="1.3693085" data-long="103.84835090000001" >
                     <a href="https://mall-e.net/Mall/MallInfo/32" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/7dd3a2cb81782161e92df5d44a59c6ac.JPG" alt="AMK Hub">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">AMK Hub</h5>
                                    <p> Ang Mo Kio Ave,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item shopping-center"  data-id="30" data-lat="1.3602672" data-long="103.98974470000007" >
                     <a href="https://mall-e.net/Mall/MallInfo/30" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/194606913b6b0480dfe7632dca9c5f10.JPG" alt="Jewel Changi Airport">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Jewel Changi Airport</h5>
                                    <p>Changi Airport,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item housing-building"  data-id="54" data-lat="1.3595839" data-long="103.88527679999993" >
                     <a href="https://mall-e.net/Mall/MallInfo/54" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/5f0d3d239aa9cb5a36fc6e36ad6d3aa5.JPG" alt="Heartland Mall">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Heartland Mall</h5>
                                    <p>Kovan,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item hotel"  data-id="42" data-lat="1.3542124" data-long="103.94503529999997" >
                     <a href="https://mall-e.net/Mall/MallInfo/42" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/069d7464e34202a4dadfac20e54121fa.JPG" alt="Tampines 1">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Tampines 1</h5>
                                    <p>Tampines ,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="77" data-lat="1.3524854" data-long="103.944707" >
                     <a href="https://mall-e.net/Mall/MallInfo/77" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/7a23eab656a5302eb83b6867bd9336af.JPG" alt="Tampines Mall">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Tampines Mall</h5>
                                    <p>Marine Parade,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="80" data-lat="1.3524291" data-long="103.9438202" >
                     <a href="https://mall-e.net/Mall/MallInfo/80" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/a404fd7190ad04449d16c21b8658f944.JPG" alt=" Century Square">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name"> Century Square</h5>
                                    <p>Marine Parade,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="74" data-lat="1.3505028" data-long="103.84859319999998" >
                     <a href="https://mall-e.net/Mall/MallInfo/74" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/01e2c2a25aca1d7c139b898b4c556164.JPG" alt="Junction 8">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Junction 8</h5>
                                    <p>Marine Parade,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="48" data-lat="1.3503968" data-long="103.87261579999995" >
                     <a href="https://mall-e.net/Mall/MallInfo/48" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/bd6a2ac5df5596e9c298d6b940251ae6.JPG" alt="NEX">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">NEX</h5>
                                    <p>Serangoon (Central),  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="3" data-lat="1.3452712" data-long="103.8557581" >
                     <a href="https://mall-e.net/Mall/MallInfo/3" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/ff9a671da23fc6ed24d2fa4cd07a0bcd.JPG" alt="Block 151 -Bishan Street 11">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Hotel</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Block 151 -Bishan Street 11</h5>
                                    <p>Bishan,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="52" data-lat="1.3400453" data-long="103.70610429999999" >
                     <a href="https://mall-e.net/Mall/MallInfo/52" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/8f705703a69177912a3ad63a4383e7d5.JPG" alt="Jurong Point">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Jurong Point</h5>
                                    <p>Jurong (West),  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="39" data-lat="1.3378923" data-long="103.79333769999994" >
                     <a href="https://mall-e.net/Mall/MallInfo/39" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/8186ad737646c8bb591ea224e4e0a8d4.JPG" alt="The Grandstand">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">The Grandstand</h5>
                                    <p>Upper Bukit Timah,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="72" data-lat="1.3348154" data-long="103.74683949999996" >
                     <a href="https://mall-e.net/Mall/MallInfo/72" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/5894dbbb84c29d0ae35f83aea543c0e7.JPG" alt="IMM">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">IMM</h5>
                                    <p>Marine Parade,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="17" data-lat="1.3345157" data-long="103.74279019999994" >
                     <a href="https://mall-e.net/Mall/MallInfo/17" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/337b39ce084644da13252c67585675ee.JPG" alt="Westgate">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Westgate</h5>
                                    <p>Jurong East,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="33" data-lat="1.3247613" data-long="103.92938079999999" >
                     <a href="https://mall-e.net/Mall/MallInfo/33" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/fcc730ca7b943630653243c338c2b6be.JPG" alt="Bedok Mall">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Bedok Mall</h5>
                                    <p>Bedok,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="46" data-lat="1.3199572" data-long="103.84390759999997" >
                     <a href="https://mall-e.net/Mall/MallInfo/46" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/98c9e8bd2cb186ff27e81884a588b935.JPG" alt="Novena Square">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Novena Square</h5>
                                    <p>Thomson,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="15" data-lat="1.3191725" data-long="103.89255630000002" >
                     <a href="https://mall-e.net/Mall/MallInfo/15" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/f9c17e76cc7cd12b010d9be6fe3621ae.JPG" alt="Paya Lebar Square">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Paya Lebar Square</h5>
                                    <p>Paya Lebar,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="76" data-lat="1.318938" data-long="103.89446199999998" >
                     <a href="https://mall-e.net/Mall/MallInfo/76" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/3e0c3441b7ea1e08f9bd9695672b21d4.JPG" alt="SingPost Centre">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">SingPost Centre</h5>
                                    <p>Marine Parade,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="6" data-lat="1.31485" data-long="103.89461319999998" >
                     <a href="https://mall-e.net/Mall/MallInfo/6" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/1a6e8c3439acc6eaf36358a974a99d6d.JPG" alt="Kinex">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Kinex</h5>
                                    <p>Tanjong Katong,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="8" data-lat="1.3124678" data-long="103.92323590000001" >
                     <a href="https://mall-e.net/Mall/MallInfo/8" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/556c23ae455365246454ad2fedfb04ad.JPG" alt="Siglap Road">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Housing Building</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">Siglap Road</h5>
                                    <p>Siglap,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="34" data-lat="1.3111877" data-long="103.85666749999996" >
                     <a href="https://mall-e.net/Mall/MallInfo/34" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/517a4e9fb0453e4ef2e40b445a81cd00.JPG" alt="City Square Mall">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">City Square Mall</h5>
                                    <p>Serangoon,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="79" data-lat="1.3067634" data-long="103.78842359999999" >
                     <a href="https://mall-e.net/Mall/MallInfo/79" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/f369d5d6c7f3b077c862cff5d7468af3.JPG" alt="The Star Vista">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">The Star Vista</h5>
                                    <p>Marine Parade,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="57" data-lat="1.3052181" data-long="103.90497989999994" >
                     <a href="https://mall-e.net/Mall/MallInfo/57" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/5188a605c9febceff90d95815c77835a.JPG" alt="112 Katong Mall">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5 class="name">112 Katong Mall</h5>
                                    <p>East Coast ,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="2" data-lat="1.3051314" data-long="103.90437139999995" >
                     <a href="https://mall-e.net/Mall/MallInfo/2" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/8850256bd479c94ec0d85fdf50858d38.JPG" alt="Katong Square">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Katong Square</h5>
                                    <p>Tanjong Katong,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="41" data-lat="1.3050606" data-long="103.82387010000002" >
                     <a href="https://mall-e.net/Mall/MallInfo/41" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/ef2758f1a5f93b4dac3b7d63c0dad595.JPG" alt="Tanglin Mall">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Tanglin Mall</h5>
                                    <p>Orchard,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="40" data-lat="1.304793" data-long="103.8329589" >
                     <a href="https://mall-e.net/Mall/MallInfo/40" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/e6f7d14a9262a1ef0f2b306c784b9244.JPG" alt="Tangs">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Tangs</h5>
                                    <p>Orchard,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="51" data-lat="1.3045456" data-long="103.8339449" >
                     <a href="https://mall-e.net/Mall/MallInfo/51" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/acf9305c38a9e4fc8abe3f790a0f88d2.JPG" alt="Lucky Plaza">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Lucky Plaza</h5>
                                    <p>Orchard,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="53" data-lat="1.3039937" data-long="103.83197010000004" >
                     <a href="https://mall-e.net/Mall/MallInfo/53" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/228d17844639cd5edce0d351bddb761a.JPG" alt="ION Orchard Mall">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>ION Orchard Mall</h5>
                                    <p>Orchard,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="36" data-lat="1.3038568" data-long="103.83305580000001" >
                     <a href="https://mall-e.net/Mall/MallInfo/36" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/79a99f2eee2dced74d72a60bcb811dd5.JPG" alt="Wisma Atria">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Wisma Atria</h5>
                                    <p>Orchard,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="4" data-lat="1.3036204" data-long="103.90296779999994" >
                     <a href="https://mall-e.net/Mall/MallInfo/4" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/6cc5b712ee47780e7cc0aa17305b6865.JPG" alt="Katong V">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Shopping Center</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Katong V</h5>
                                    <p>Tanjong Katong,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="12" data-lat="1.3036204" data-long="103.90296779999994" >
                     <a href="https://mall-e.net/Mall/MallInfo/12" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/396f944e4a6148c3796ddeb18bed6f01.JPG" alt="Joo Chiat Road">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Housing Building</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Joo Chiat Road</h5>
                                    <p>Joo Chiat ,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="14" data-lat="1.3036204" data-long="103.90296779999994" >
                     <a href="https://mall-e.net/Mall/MallInfo/14" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/882c18195db4de219ddc1be0df019878.JPG" alt="Katong Point">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Shopping Center</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Katong Point</h5>
                                    <p>Joo Chiat ,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="1" data-lat="1.3011348" data-long="103.90533549999998" >
                     <a href="https://mall-e.net/Mall/MallInfo/1" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/10e4820218dfa12dce35ba6c8b11569a.JPG" alt="Parkway Parade">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Parkway Parade</h5>
                                    <p>Marine Parade,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="31" data-lat="1.3008856" data-long="103.83835820000002" >
                     <a href="https://mall-e.net/Mall/MallInfo/31" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/07c3720898a03dbc743c96d6c6606fc9.JPG" alt="313@Somerset">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>313@Somerset</h5>
                                    <p>Orchard,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="11" data-lat="1.3008112" data-long="103.84499440000002" >
                     <a href="https://mall-e.net/Mall/MallInfo/11" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/bb2e14916af090dabd18244344ef12b6.JPG" alt="Plaza Singapura">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Plaza Singapura</h5>
                                    <p>Orchard,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="78" data-lat="1.29976" data-long="103.84551310000006" >
                     <a href="https://mall-e.net/Mall/MallInfo/78" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/8951b3f921b139f9f270de1774675f45.JPG" alt="The Atrium">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>The Atrium</h5>
                                    <p>Marine Parade,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="16" data-lat="1.2988597" data-long="103.85554790000003" >
                     <a href="https://mall-e.net/Mall/MallInfo/16" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/4f520c5cf5c3666eb5396283ac3e870e.PNG" alt="Bugis Junction">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Bugis Junction</h5>
                                    <p>Bugis,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="43" data-lat="1.294113" data-long="103.85784039999999" >
                     <a href="https://mall-e.net/Mall/MallInfo/43" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/43076aa51a1a8990cf0287b38163ac7c.JPG" alt="Suntec City">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Suntec City</h5>
                                    <p>Suntec,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="45" data-lat="1.2937585" data-long="103.85343310000007" >
                     <a href="https://mall-e.net/Mall/MallInfo/45" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/1a62b4da6601dd66109f325a734ace9c.JPG" alt="Raffles City">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Raffles City</h5>
                                    <p>Raffles,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="55" data-lat="1.2936057" data-long="103.83200699999998" >
                     <a href="https://mall-e.net/Mall/MallInfo/55" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/4acde1ab8cd5ca50adc7ff0a56f27f6a.JPG" alt="Great World City">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Great World City</h5>
                                    <p>Kim Seng ,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="49" data-lat="1.2928582" data-long="103.85971139999992" >
                     <a href="https://mall-e.net/Mall/MallInfo/49" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/6b2cbdc15358f7d9ff57dc2d16c52f00.JPG" alt="Millenia Walk">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Millenia Walk</h5>
                                    <p>Suntec,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="50" data-lat="1.2795191" data-long="103.8543588" >
                     <a href="https://mall-e.net/Mall/MallInfo/50" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/dd13c87b6664cfa63a172b89bd4275f7.JPG" alt="Marina Bay Link Mall">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Marina Bay Link Mall</h5>
                                    <p>Marina Bay,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="9" data-lat="1.2786343" data-long="103.84742470000003" >
                     <a href="https://mall-e.net/Mall/MallInfo/9" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/1debfdc257ff9ee5dca2b31f645b1e40.JPG" alt="Frasers Tower">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>Frasers Tower</h5>
                                    <p>Cecil Street,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="10" data-lat="1.2644794" data-long="103.82228659999998" >
                     <a href="https://mall-e.net/Mall/MallInfo/10" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/e259de801417c7309e7f09a92537bcef.JPG" alt="VivoCity">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>VivoCity</h5>
                                    <p>Harbourfront,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-3 mt-3 mallcontainer element-item"  data-id="38" data-lat="1.2644794" data-long="103.82228659999998" >
                     <a href="https://mall-e.net/Mall/MallInfo/38" class="t-d">
                        <div class="card latest-deals-card" style="">
                           <img class="card-img-top card-img latest-deals-img" src="https://mall-e.net/admin/uploads/" alt="VivoCity Express">
                           <div class="card-img-overlay">
                              <p class="img-overlay1"><strong>Mall</strong></p>
                           </div>
                           <div class="card-body-mall">
                              <div class="row">
                                 <div class="col-md-12 distance_cls">
                                    <h5>VivoCity Express</h5>
                                    <p>HarbourFront ,  Singapore City,  Singapore</p>
                                    <p class="text-danger " id="distance"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <footer>
            <div class="row malle-footer">
               <div class="col-md-3 malle-footer-content">
                  <div class="cont"></div>
               </div>
               <div class="col-md-3 malle-footer-content">
                  <div class="cont"></div>
               </div>
               <div class="col-md-3 malle-footer-content">
                  <div class="content">
                     Social Media
                     <br>
                     <a href="#"><i class="fab fa-facebook-f mt-4"></i></a>
                     <a href="#"><i class="fab fa-twitter"></i></a>
                     <a href="#"><i class="fab fa-instagram"></i></a>
                  </div>
               </div>
               <div class="col-md-3 malle-footer-content">
                  <div class="content2">
                     Mobile App
                     <br>
                     <a href="#"><img class="dlink2 mt-3" src="https://mall-e.net/assets/images/src/ios.png"></a>
                     <a href="#"><img class="dlink2 mt-2" src="https://mall-e.net/assets/images/src/andoird.png"></a>
                  </div>
               </div>
            </div>
            <script type="text/javascript" src="https://mall-e.net/assets/js/jquery-1.11.1.min.js"></script>
            <script type="text/javascript" src="https://mall-e.net/assets/greensock-js/src/minified/TweenMax.min.js"></script>
            <script type="text/javascript" src="https://mall-e.net/assets/greensock-js/src/minified/TimelineMax.min.js"></script>
            <script type="text/javascript" src="https://mall-e.net/assets/greensock-js/src/minified/plugins/ScrollToPlugin.min.js"></script>
            <script type="text/javascript" src="https://mall-e.net/assets/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="https://mall-e.net/assets/js/bootstrap.min2.js"></script>
            <script type="text/javascript" src="https://mall-e.net/assets/js/malle.js"></script>
            
            <!-- isotope -->            
            <script type="text/javascript" src="https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>
            <script type="text/javascript" src="js/mall-e-isotope.js"></script> 
            <!-- / -->
         </footer>
      </div>
   </body>
   <script>
      var base_url = 'https://mall-e.net/Mall';
      
       $(document).ready(function() {
        	 $('.malle-country').change(function(e){
      	 	location.replace(base_url+'?country='+this.value);
      	 });
        });
      
       $(document).ready(function() {
          $('.carousel').carousel({
            interval: 0
          })
        });
      
       $(document).ready(function() {
          $('.carousel-1').carousel({
            interval: 0
          })
        });
      
   </script>
</html>