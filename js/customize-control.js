/**
 *
 *	JS Code for Customizer Controls
 *
**/

( function() {
		wp.customize.bind( 'ready', function() {
		
		var featuredArea1	=	['klopp_featposts_title','klopp_featposts_cat','klopp_featposts_rows'];
		
		wp.customize( 'klopp_featposts_enable', function( setting ) {
				var visibility	=	 function() {
				if ( '' == setting.get() ) {
					$.each( featuredArea1, function( index, controlIDs ) {
						wp.customize.control( controlIDs ).container.hide();
					});
				} else {
					$.each( featuredArea1, function( index, controlIDs ) {
						wp.customize.control( controlIDs ).container.show();	
					});
				}
			}
			
			visibility();
			setting.bind( visibility );
		});
		
		var featuredArea2	=	['klopp_fa2_title','klopp_fa2_cat'];
		
		wp.customize( 'klopp_fa2_enable', function( setting ) {
				var visibility	=	 function() {
				if ( '' == setting.get() ) {
					$.each( featuredArea2, function( index, controlIDs ) {
						wp.customize.control( controlIDs ).container.hide();
					});
				} else {
					$.each( featuredArea2, function( index, controlIDs ) {
						wp.customize.control( controlIDs ).container.show();	
					});
				}
			}
			
			visibility();
			setting.bind( visibility );
		});
	});
})( jQuery );