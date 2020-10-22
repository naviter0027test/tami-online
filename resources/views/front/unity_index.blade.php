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
	<input id="locationHref"/>
    <script>
      var unityInstance = UnityLoader.instantiate("unityContainer", "Build/web_.json", {onProgress: UnityProgress});
		function clipboardWriteText(str)
		{
			var copyText = document.getElementById("locationHref");
			copyText.value = str;
			copyText.select();
			document.execCommand("copy");
			alert(str + "\n\nShare Link Success Copy");
		}
    </script>
  </head>
  <body>
    <div class="webgl-content">
      <div id="unityContainer" style="width: 100vw; height: 100vh"></div>
    </div>
  </body>
</html>
