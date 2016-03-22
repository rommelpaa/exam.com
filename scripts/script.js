/*
Theme Name: 
Theme URI: http://
Author: 
Author URI: http://
Description: Javascript
*/


/* =Layout Script
---------------------------------------------------------- */

$(document).ready(function(){
	var asides		= $(".left-panel");
	var _bool		= '';
	$(".c_customdropdown li").click(function(e) {
		var $target = $( e.currentTarget );
		$target.closest( '.btn-group' )
		 .find( '[data-bind="label"]' ).text($target.text()).val($target.attr('attr_id'))
			.end()
		 .children( '.dropdown-toggle' ).dropdown( 'toggle' );
		return false;

	});
	
	
	$(".c_menu_toggle").click(function(){
		if(_bool=='' ||  _bool==true)
		{
			_bool	= false;
			if(asides.is(":visible")==false)
			{
				asides.css('margin-left','-610px');
				asides.show();
			}
			
			if(asides.css('margin-left')=="-610px")
			{
				asides.animate({
					'margin-left':0
				},'slow', function() {
					_bool = true;
					$(".content-panel").attr('style','margin-left:210px');
				});
				
				
			}else
			{
				asides.animate({
					'margin-left':-610
				},'slow', function() {
					_bool = true;
					$(".content-panel").attr('style','margin-left:0');
				});
				
			}
		}
	});
	

})

function jAlert(params)
{
    var c_alert         = $(".c_alert");
    $(".modal-dialog", c_alert).addClass(params.class);
    $(".modal-title", c_alert).html(params.title);
    $(".modal-body", c_alert).html(params.msg);
   
    $(".modal-footer",c_alert).removeClass('hide');
    if(!params.footer)
    {
        $(".modal-footer",c_alert).addClass('hide');
    }
    c_alert.modal({backdrop: 'static', keyboard: false});

}



