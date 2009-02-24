function openMI(baseUrl, lang){
	if (lang == 'en'){
		alert('We are working on an english translation but it is not yet finished. Please try again soon');
		//alert('We have so far only translated one of the four modules that comprise mesmis-interactivo.\n\n\"NEGOTIATED DESIGN OF SUSTAINABLE PRODUCTION SYSTEMS AMONG SOCIAL AGENTS WITH CONFLICTING INTERESTS\". Unfortunately this is not available on line.\n\n For more information please contact agroecologia@gira.org.mx')
		//window.open('http://200.23.34.9/sustentabilidad/');
		return;
	}
	var t = 0;
	var l = 0;
	var w = window.screen.availWidth-10;
	var h = window.screen.availHeight-40;
	var mi = window.open(baseUrl + '/mesmis-interactivo', 'mi', 'top='+t+',left='+l+',width='+w+',height='+h+',menubar=0,location=0,resizable=1,scrollbars=0,status=0');
	mi.focus();
}

function closeMI(id){
	window.location = '../initComment.jsp?email=' + id;
}