// external js: isotope.pkgd.js

// init Isotope
// var $grid = $('.grid').isotope({
//   itemSelector: '.element-item',
//   layoutMode: 'masonry',

// });

var $grid =  $('.grid').isotope({
  itemSelector: '.element-item',
  // percentPosition: true,  
  // layoutMode: 'fitRows',
});

// filter functions
var filterFns = { 
  // show if name ends with -ium
  ium: function() {
    var name = $(this).find('.name').text();
    return name.match( /ium$/ );
  }
};

// bind filter button click
$('#filters').on( 'click', 'a', function() {
  var filterValue = $( this ).attr('data-filter'); 
  // use filterFn if matches value
  filterValue = filterFns[ filterValue ] || filterValue;
  $grid.isotope({ filter: filterValue });
});
