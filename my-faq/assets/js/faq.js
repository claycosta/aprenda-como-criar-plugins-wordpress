jQuery( document ).ready( function ( $ ) {

	$( '.my-faq-title a.toggle' ).on( 'click', function() {
		$( this ).parent( 'h3' ).next().slideToggle();

		return false;
	});

});
