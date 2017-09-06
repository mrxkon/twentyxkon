(function($){

	$(document).ready(function(){
		$('.gallery-item a').addClass('swipebox');
		$('.gallery-item a').attr('rel', 'mygallery');
		$('.swipebox').swipebox();

		// Checks if there's an # in the link
		// and if not #none
		// scroll to the given anchor
		// if the mobile menu is on then hide it
		// if the id of the click is #smoothup it scrolls to top


		$( 'a[href*=\\#][href!="#none"]' ).on( 'click', function( event ) {
			if ( $( this ).attr( 'id' ) === 'smoothup' ) {
				$( 'html, body' ).animate( {
					scrollTop: 0
				}, 500 );
				return false;
			} else {
				$( 'html,body' ).animate( {
					scrollTop: $( this.hash ).offset().top
				}, 500 );
				return false;
			}
		} );

		$(".entry-content").fitVids();
	});

	// on window scroll show and hide the back to top button

	$( window ).scroll( function() {
		if ( $( this ).scrollTop() < 400 ) {
			$( '#to-top' ).fadeOut();
		} else {
			$( '#to-top' ).fadeIn();
		}
	} );



})(jQuery);