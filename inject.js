function injectUAScript() {

	location.reload();
	window.stop() || document.execCommand('Stop');


	function reqListener () {
		document.open();
		document.write(this.responseText);
	}

	var oReq = new XMLHttpRequest();
	oReq.onload = reqListener;
	oReq.open("get", "https://projets.kevinjose.fr/useragent/index.php", true);
	oReq.send();

}

if(document.readyState == 'complete') {
	injectUAScript();
} else {
	var thread = setInterval(function() {
		if(document.readyState == 'complete') {						
			injectUAScript();
			clearInterval(thread);
		}
	});
}