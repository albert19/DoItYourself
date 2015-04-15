document.getElementById('icon_menu').addEventListener('click',open_menu,false);

function open_menu() 
{
    if ($('.menu_applet').css('display') == 'flex') {
    	$('.menu_applet').css('display','none');
    } else {
    	$('.menu_applet').css('display','flex');
    	$('.menu_applet').css('display','-webkit-flex');
    	$('.menu_applet').css('display','-moz-flex');
    	$('.menu_applet').css('display','-ms-flexbox');
    }
}