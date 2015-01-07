<?php
include('core/init.inc.php');
?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title></title>
	</head>
	<body>
		<div>
			<pre>
			<?php
			
			if(fetch_news() == true) {
				
				$emailTo="oliver.william.staton@gmail.com";
				$subject=fetch_info();
				$header="From: Basketball_Game_Tonight@gmail.com";
				
				if(mail($emailTo, $subject, $body, $header))
				{
					echo "Mail sent successfully";
				}
				else
				{
					echo "Mail not sent successfully";
				}
			}
			
			?>
			</pre>
		</div>
	</body>
</html>