<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change user agent test</title>
	<meta charset="UTF-8">
	<script
		src="https://code.jquery.com/jquery-3.2.1.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		crossorigin="anonymous"></script>
	<style>
		#frame {
			width:100%!important;
			height:800px!important;
		}
		#frame.mobile {
			width:400px!important;
		}
		#frame.tablet {
			width:900px!important;
		}
	</style>
</head>
<body>

	<h3>Testé. User agent is now : <span id="ua"></span></h3>

	<button onclick="loadSourceCode('iphone')">Changer iphone</button>
	<button onclick="loadSourceCode('tablet')">Changer tablet</button>
	<button onclick="loadSourceCode('desktop')">Changer desktop</button>

	<div id="frame_wrapper">
	</div>

	<script type="text/javascript">

		var URL = location.href;
		// var URL = 'http://projets.kevinjose.fr/useragent/iframe.php';

		// Get html source by ajax request
		window.loadSourceCode = function(device) {
			var ua = getUserAgent(device);
			appendIframe();
			changeJsUserAgent(ua, device);
			$.ajax({
				url: 'https://projets.kevinjose.fr/useragent/source.php?url=' + URL + '&ua=' + ua,
			    beforeSend: function(xhr) {
			        xhr.setRequestHeader('x-cookie', document.cookie);
			        xhr.setRequestHeader('x-contenttype', document.contentType);
			        xhr.setRequestHeader('x-encoding', document.inputEncoding);
			    },
				type: 'GET',
				success: function(data) {
					document.getElementById('frame').contentWindow.document.open();
					document.getElementById('frame').contentWindow.document.write(data);
					document.getElementById('frame').contentWindow.document.close();
				}
			});
		} 

		// Change la source de l'iframe
		window.changeSrc = function(device) {

			var ua = getUserAgent(device);
			console.log('Change user agent to ' + device);

			appendIframe(URL);
			changeJsUserAgent(ua, device);

			var contentEval = 'top.document.getElementById("ua").innerText = navigator.userAgent';
			var contentEval2 = 'console.log("Hello UA : " + navigator.userAgent)';

			document.getElementById('frame').onload = function() {
				this.contentWindow.eval(contentEval);
				this.contentWindow.eval(contentEval2);
			};
		}

		function getUserAgent(device) {
			var ua = '';
			switch(device) {
				case 'iphone': 
				ua = 'Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3';
				break;
				case 'tablet':
				ua = 'Mozilla/5.0 (iPad; CPU OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3';
				break;
				default:
				ua = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36';
				break;
			}
			return ua;
		}

		function appendIframe(src) {
			var src = src ? 'src="'+ URL +'"' : '';
			var iframe = '<iframe style="width:100%;height:800px;" id="frame" '+ src +' sandox="allow-same-origin allow-scripts" width="100%" height=800></iframe>';
			document.getElementById('frame_wrapper').innerHTML = iframe;
		}

		function changeJsUserAgent(ua, device) {
			$('#frame').removeClass('mobile').removeClass('tablet');
			if(device == 'iphone') $('#frame').addClass('mobile');
			if(device == 'tablet') $('#frame').addClass('tablet');
			document.getElementById('frame').contentWindow.navigator.__defineGetter__('userAgent', function(){
				return ua 
			});
			document.getElementById('ua').innerHTML = ua;
		}

	</script>
</body>
</html>