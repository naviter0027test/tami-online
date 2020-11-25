<!DOCTYPE html>
<html lang="en-us">
  <head>
	<meta name="title" content="Taiwan Online Pavilion at metalloobrabotka 2020">
	<meta name="description" content=
		"Taiwan plays a very important role in Russian metal working field with its machine tool of good technology, quality, and price. Although the biggest metal working show in Russia, Metalloobrotka 2020, was postponed to 2021 due to COVID-19, TAMI bring Russian buyers with a special online show instead. You will get an interesting experience from this 720° full angle demonstration showroom. Chin Fong, Exact, Kenturn, Xtrauto, and Yida will present their products in live, vivid, real-time running 3D models. We invite you to click, observe and feel their products at any angle now."
	>
	<meta name="title" content="Тайваньский онлайн-павильон  металлообработке 2020">
	<meta name="description" content=
		"Тайвань с его технологичными, качественными станками по хорошей цене играет очень важную роль в российской металлообработке. И хотя крупнейшая выставка металлообработки в России "Металлообработка 2020" была перенесена на 2021 год из-за COVID-19, вместо этого TAMI предлагает российским заказчикам специальное онлайн-шоу. Вы получите интересный опыт от данного демонстрационного зала с полным углом обзора 720°. Chin Fong, Exact, Kenturn, Xtrauto и Yida представят свои продукты в живых, ярких 3D-моделях, работающих в режиме реального времени. Мы приглашаем вас перейти по ссылке прямо сейчас, рассмотреть и чувствовать их продукты под любым углом."
	>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WW4XHFF');</script>
	<!-- End Google Tag Manager -->

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
    <title>Taiwan Online Pavilion at metalloobrabotka 2020</title>
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

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WW4XHFF"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

    <div class="webgl-content">
      <div id="unityContainer" style="width: 100vw; height: 100vh"></div>
    </div>
  </body>
</html>
