/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
		// Make active current page
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});
	
	$('.flexslider').imagesLoaded( function() {
		$('.flexslider').flexslider({
			animation: "fade",
			slideshowSpeed: 5000,
            smoothHeight: true,
		}); // end register flexslider
	});

	// $('.flexslider').flexslider({
	// 		animation: "slide",
	// 		slideshowSpeed: 5000,
	// 		// smoothHeight: true,
	// 	}); // end register flexslider


	// Flexslider
	// front page slider 
	// $('.flexslider').flexslider({
	// 	animation: "slide",
	// }); 
	
	$('.testimonial').flexslider({
		animation: "slide",
		smoothHeight: true
	}); // end register flexslider
	
	// Colorbox
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
    $('a.popup-link').colorbox({
        className: 'rep-e-colorbox',
        rel:'gal',
        inline: true,
        width: '90%',
        maxWidth: '960px',
        previous: "< Previous Project",
        next: "Next Project >",
        close: '<i class="fa fa-times" aria-hidden="true"></i>',
    });
	//Isotope with images loaded ...
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});
/*
		Tenant Form
__________________________________________
*/
$('.top-nav li.tenants a').click(function() {
 
    $('.tenant-login').slideToggle(300);
    //$(this).toggleClass('close');
 
});

/*
		FAQ dropdowns
__________________________________________
*/
$('.question').click(function() {
 
    $(this).next('.answer').slideToggle(500);
    $(this).toggleClass('close');
 
});

$('.toggle').click(function() {
 
    $(this).next('ul.mobile-listings').slideToggle(500);
    $(this).toggleClass('close');
 
});
	// Equal heights divs
	$('.blocks').matchHeight();
	/*var byRow = $('body').hasClass('test-rows');
		$('.blocks-container').each(function() {
		 $(this).children('.blocks').matchHeight({
			   byRow: byRow
		//property: 'min-height'
		});
	});*/

});// END #####################################    END