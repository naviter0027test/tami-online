<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Unity WebGL Player | TAMI4.0</title>
    <link rel="shortcut icon" href="TemplateData/favicon.ico">
    <link rel="stylesheet" href="TemplateData/style.css">
    <script src="TemplateData/UnityProgress.js"></script>
    <script src="Build/UnityLoader.js"></script>
	<script src="https://smtpjs.com/v3/smtp.js"></script>
	<input id="locationHref"/>
    <script>
      var unityInstance = UnityLoader.instantiate("unityContainer", "Build/web.json", {onProgress: UnityProgress});
		function clipboardWriteText(str)
		{
			var copyText = document.getElementById("locationHref");
			var lanauge = str.substr(0,2);
			var url = str.substr(2);
			copyText.value = url;
			copyText.select();
			document.execCommand("copy");
			if(lanauge=="EN")
				alert(url + "\nThe sharing link has been successfully copied");
			else if(lanauge=="RU")
				alert(url + "\nСсылка для совместного использования успешно скопирована");
		}
		function sendEmail(str)
		{
			var str = JSON.parse(str);
			var _emailFrom = str.emailFrom;
			var _emailSecureToken = str.emailSecureToken;
			var _emailSubject = str.emailSubject;
			var _emailBody = str.emailBody;
			var _emailTo = str.emailTo;
			var _UnityGameObject = str.UnityGameObject;
			var _UnityMethod = str.UnityMethod;
			
			Email.send({
				SecureToken : _emailSecureToken,
				To : _emailTo,
				From : _emailFrom,
				Subject : _emailSubject,
				Body : _emailBody
			}).then(
				message => unityInstance.SendMessage(_UnityGameObject,_UnityMethod, message)
			);
		}
    </script>
  </head>
  <body>
    <div class="webgl-content">
      <div id="unityContainer" style="width: 100vw; height: 100vh"></div>
    </div>
  </body>
</html>