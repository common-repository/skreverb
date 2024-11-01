function skr_popup(id,stylesheet,scr) {
	skrdiv=document.getElementById('SkReverb'+id);
	skrbut=document.getElementById('SkReverbPUButton'+id);
	skrbut.style.display='none';
	skrwg=document.getElementById('SkReverbGroup'+id);
	if (skrwg.style.display=='' || skrwg.style.display=='block') { 
		skrwg.style.display='block';
		skrpop=window.open('','skrpopup','width=200,height=320,status,scrollbars');
		if (skrpop.status!=='Plugin SkReverb by Philippe Hilger') {
			skrpop.status='Plugin SkReverb by Philippe Hilger';
			skrdoc=skrpop.document;
			skrdoc.write('<html><head><title>SkReverb Plugin for WordPress</title>'+
					'<link rel="stylesheet" href="'+stylesheet+'" type="text/css" />'+
					'<body>');
			skrdoc.write(skrdiv.innerHTML);
			//skrdiv.style.display='none';
			skrdoc.write('</body></html>');
			skrpop.focus();
			skrdoc.close();
		}
		skrwg.style.display='none';
		skrbut.innerHTML='Pop In Widget';
		skrbut.style.display='block';
		//skrbut.style.display='block';
		//skrdiv.refresh();
	} else {
		skrpop.close();
		skrwg.style.display='block';
		skrbut.style.display='block';
		skrbut.innerHTML='Pop Out Widget';
		skrdiv.refresh();
	} 
	//skrpopdiv=skrdoc.getElementById('SkReverb'+id);
	//skrpopdiv.style.display='block'; //visibility='visible';
}