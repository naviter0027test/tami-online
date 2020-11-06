<!DOCTYPE html>
<html lang="en-us">
  <head>
	<meta name="title" content="2020年台灣鞋機拓銷越南及印尼線上台灣館">
	<meta name="description" content=
		"台灣鞋機全球市占率約7成，年產量世界第一，在國際鞋業產業鏈中扮演了相當重要的角色，主要出口至越南、印尼等國家。今年因應疫情無法出國參展，機械公會特別偕同40家台灣主要鞋機廠商，以線上展的形式，將最先進的台灣鞋機產品展現給越南及印尼的買主，內容將包括鞋面成型及鞋幫機、鞋底加工及橡塑膠製鞋設備、縫紉機及針織機、自動化設備與整廠規劃等產品。"
	>
	<meta name="title" content="Taiwan Shoemaking Online Pavilion 2020 – Sole Provider for Vietnam and Indonesia">
	<meta name="description" content=
		"Taiwan shoemaking machinery plays a very important role in the global shoe industrial chain with the highest productivity and accounts for 70% global market share and exports mainly to Vietnam and Indonesia.
		This year due to Covid-19, international exhibitions are cancelled. TAMI(Taiwan Association of Machinery Industry) organizes this online show with 40 Taiwan shoemaking machinery manufacturers instead, showing vietnamese and indonesian buyers the latest and most advanced Taiwan shoemaking machinery, including vamp making and lasting machinery,
		sole process and rubber/plastic shoe making machinery, sewing machine & knitting machine, automatic equipment and turnkey solution, etc."
	>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-175242617-8"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-175242617-8');
	</script>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Taiwan Online Pavilion at Metalloobrobotka 2020</title>
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

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WW4XHFF');</script>
	<!-- End Google Tag Manager -->

    <div class="webgl-content">
      <div id="unityContainer" style="width: 100vw; height: 100vh"></div>
    </div>
  </body>
</html>
