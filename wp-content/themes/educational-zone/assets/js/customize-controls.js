( function( api ) {

	// Extends our custom "sirat" section.
	api.sectionConstructor['educational-zone'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );