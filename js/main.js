jQuery(document).ready(function(){

	jQuery(".bxslider").each(function(){
		var id = jQuery(this).attr('id');
		//Extract the gallery id
		idNumber = id.replace("gallery-","");
		//Link slider and pager from same gallery id
		jQuery("#" + id).bxSlider({
			pagerCustom: '#bx-pager-' + idNumber,
		});
	});
});