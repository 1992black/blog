/**
 * Theme Customizer
 */

( function( api ) {

	// Extends our custom "hoot-premium" section.
	api.sectionConstructor['hoot-premium'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );


jQuery(document).ready(function($) {
	"use strict";

	$('.frontpage_sections_modulebg .button').on('click',function(event){
		event.stopPropagation();
		var choice = $(this).closest('li.hybridextend-control-sortlistitem').data('choiceid');
		$('.hybridextend-control-id-frontpage_sectionbg_' + choice + ' .hybridextend-flypanel-button').trigger('click');
	});

});
