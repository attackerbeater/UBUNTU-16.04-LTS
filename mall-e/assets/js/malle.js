$(document).ready(function() {
    

	
	function Scroll(){
		var ypos = window.pageYOffset;
		if (ypos > 200) {
			
		}
	}

	window.addEventListener("scroll",Scroll);

	var intro = $('#intro'),
		intro2 = $('#intro2'),
		malls = $('#malls'),
		merchant = $('#merchant'),
		deals = $('#deals'),
		latestdeals = $('.latest-deals'),
		phone = $('.phone'),
		app = $('.phone-s');

	TweenLite.from(intro, 1, { x: -250, autoAlpha: 0});
	TweenLite.from(intro2, 1, { x: 250 , autoAlpha: 0, delay: .5});
	TweenLite.from(malls, 1, { y: 50 , autoAlpha: 0, delay: 1.1});
	TweenLite.from(merchant, 1, { y: 50 , autoAlpha: 0, delay: 1.2});
	TweenLite.from(deals, 1, { y: 50 , autoAlpha: 0, delay: 1.3});
	TweenLite.from(latestdeals, 1, { y: 50 , autoAlpha: 0, delay: 1.5});
	TweenLite.from(phone, 1, { y: 50 , autoAlpha: 0, delay: 1.7});
	TweenLite.from(app, 1, { y: 50 , autoAlpha: 0, delay: 1.8});
});