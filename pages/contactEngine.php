<?php

    $Subject	 = "Message from galeichenko site visitor";

    $EmailFrom	 = "zakaz@galeichenko.ru";
    $EmailTo	 = "arovrostov@gmail.com";
    $title	     = "Сообщение от посетителя сайта galeichenko.ru";
    $name		 = Trim(stripslashes($_POST['name']));
    $phone		 = Trim(stripslashes($_POST['tel']));
    $mail	     = Trim(stripslashes($_POST['mail']));

    $table = "<table><tr><td>Name:</td><td>{$name}</td></tr><tr><td>Phone:</td><td>{$phone}</td></tr><tr><td>Mail:</td><td>{$mail}</td></tr><tr><td>Event:</td><td>Galeichenko</td></tr></table>";
    $headers = "Content-type: text/html; charset=utf-8\r\nFrom: <$EmailFrom>";
    $Body = "{$title} \n  {$table} \n";

    $success = mail($EmailTo, $Subject, $Body, "{$headers}");

	
	/* AMO.CRM */
	$url_delivery_amo = 'https://apicrm.ru/amo/domain/galeichenko.ru/amocrm_api.php';
	$curl = curl_init();

    //curl_setopt($curl, CURLOPT_PROXY, '31.31.196.206');
    curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0);
    //if (curl_setopt($curl, CURLOPT_PROXY, '31.31.196.206')) { echo '!!!<br>'; }


	curl_setopt($curl, CURLOPT_URL, $url_delivery_amo);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $_REQUEST);
	curl_setopt($curl, CURLOPT_HEADER,false);


    curl_exec($curl);
	curl_close($curl); #Заверашем сеанс cURL
	/* /AMO.CRM */

?>