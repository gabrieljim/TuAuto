function ShowTab(tab){
  $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};

$(document).ready(function(){
	$('.logos').slick({
		slidesToShow: 6,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		arrows: false,
		dots: false,
		pauseOnHover: false,
		responsive: [
    {
			breakpoint: 992,
			settings: {
				slidesToShow: 4}
		},
    {
			breakpoint: 768,
			settings: {
				slidesToShow: 3}
		},
    {
		breakpoint: 576,
		settings: {
			slidesToShow: 2}
	  },
    {
    breakpoint: 400,
    settings: {
      slidesToShow: 1}
    }
    ]
	});
});
