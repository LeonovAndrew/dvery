<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $arrPost = $_POST;
	/*
    echo '<pre>'; 
	print_r( $arrPost );
	echo '</pre>';
	*/
	file_put_contents(__DIR__."/new.log", print_r("POST", true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r($arrPost, true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
	$clientId = "06a4a59e-d3c6-4732-bfc6-c41ea54300f3";
	$clientSecret = "lPDMi5lQfDhGZxXwf35RvR25ewLOciHFKmtT65VjIi6dRnNFVKs1vFk3r2QdcrK1";
	$redirectUri = "https://dveri-provance.ru/lp/contact.php";
	$authcode = "def50200d277f54ebf4d003a535f3da452765a86adb6a660e5658d03509761f926544b2079c417fb0d7331f09b13e1bd84b67298db8a3e0c7f995e2f101ab1a0d7acbae156a377267383a0d64bd96794cbb3e98f9340092aa645a3c7036ca9889e3f4df0d38a777f3aa8eb0aac0d20b6bc135292688d45a821d3b7ca13ffdf22620fa938e16add8371ba3aa07a20c6e0b9d903fd6bd8e13c8128600b32a8127f785dec99579f56dbd63e74a25497d319cdd6f43f4fa8de9c7812479c2729569232220635395801d20ab85e291bfd794d7396952a0a7e0da343af825b08c1e3fe610bb609fbfcea6c1b21041905ef625f16bbc19c843de37b2f8d3f2f02c4bedfbbd12e9bc608f6a8ddea3155eaf0ba084c172ec2802841928aeaf8f21583d38090353d248d6faf249e03841fd57cb2af8624cab62dfc7f30b096d21b5da5135896ac33e2d8fd533feadeccbf3a4fdd514bbe0d7b60d244fe9fb694af38d5c5c05a6af4c9158e4668dbe1ac9ee7bd266a0220883c10bbdebced046a043e466ed98864bdd6766d47181f8ae84a2c68b773c7033ce716683f2310a2f37e467634470a453e81d5b8e9585a25201b395cd5005a6b4b40a926fd502444e03887c626bb83d85070063f0a372ebb6c1c6c2801ee29bfce10";
	$subdomain = 'dveriprovans'; //Поддомен нужного аккаунта
	$tokenPath = 'token.json';

	$accessToken = json_decode( file_get_contents( $tokenPath ), true );

	if ( file_exists( $tokenPath ) ) {
		$accessToken = json_decode( file_get_contents( $tokenPath ), true );
		if ( $accessToken['access_token'] ) {
			$accessToken = json_decode( refreshAccessToken(), true );
			file_put_contents(__DIR__."/new.log", print_r("token обновлен", true), FILE_APPEND);
			file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
		} else {
			$accessToken = json_decode( getAccessToken(), true );
		}
	}
	else {	
		$accessToken = json_decode( getAccessToken(), true );
		file_put_contents(__DIR__."/new.log", print_r("Файл с токеном создан", true), FILE_APPEND);
		file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
	}
	/*
	$out = customfields();
	$out = json_decode($out);
	file_put_contents(__DIR__."/new.log", print_r("customfields", true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r($out, true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
	*/
	/*
	$out = getdealID(19421343);
	$out = json_decode($out);
	file_put_contents(__DIR__."/new.log", print_r("getdealID - 19421343", true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r($out, true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
	*/
	/*
	$out = unsortedReturn();
	$out = json_decode($out);
	file_put_contents(__DIR__."/new.log", print_r("unsortedReturn", true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r($out, true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
	*/
	/*
	$out = addtags(19462687);
	$out = json_decode($out);
	file_put_contents(__DIR__."/new.log", print_r("addtags", true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r($out, true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
	*/
	
	// Отправляем данные из формы
	$token = $accessToken['access_token'];
	$link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/complex'; //Формируем URL для запроса

	/** Соберем данные для запроса */
	$data = Array(
	Array(
		  "name" => "Заявка из формы «LP Нестандартные двери»",
		  "_embedded" => array(
			 "metadata" => array(
				"category" => "forms",
				"form_id" => 826576,
				"form_name" => "LP Нестандартные двери",
				"form_page" => "Заявка с сайта №826576 из формы «LP Нестандартные двери»",
				"form_sent_at" => time(),
			 ),
			 "tags" => array(
				array(
                    "name" => "nestandart"
				),
				array(
                    "name" => "LP Нестандартные двери"
				),
			 ),
			 "contacts" => array(array(
			   "first_name" => $arrPost['fields']['name'],
			   "custom_fields_values" => array(
					array(
					 "field_code" => "EMAIL",
					 "values" => array(array(
					   "enum_code" => "WORK",
					   "value" => $arrPost['fields']['email']
					   )),
					 ),
					 array(
					 "field_code" => "PHONE",
					 "values" => array(array(
					   "enum_code" => "WORK",
					   "value" => $arrPost['fields']['phone']
					   )),
					 ),
			   )
			 )),
		  ),
		  "status_id" => 31230226,
		  "pipeline_id" => 2249911,
		  //"request_id" => "uns_qweasd",
	));

	file_put_contents(__DIR__."/new.log", print_r("data", true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r($data, true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
	
	$headers = [
		'Authorization: Bearer ' . $token
	];

	$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
	curl_setopt($curl,CURLOPT_URL, $link);
	curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl,CURLOPT_HEADER, false);
	curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
	$out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
	$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	curl_close($curl);
	$code = (int)$code;
	$errors = [
		400 => 'Bad request',
		401 => 'Unauthorized',
		403 => 'Forbidden',
		404 => 'Not found',
		500 => 'Internal server error',
		502 => 'Bad gateway',
		503 => 'Service unavailable',
	];

	try
	{
		if ($code < 200 || $code > 204) {
			throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
		}
	}
	catch(\Exception $e)
	{
		$out = json_decode($out);
		file_put_contents(__DIR__."/new.log", print_r("RESULT_ERROR", true), FILE_APPEND);
		file_put_contents(__DIR__."/new.log", print_r($out, true), FILE_APPEND);
		file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
		echo '<pre>'; 
		print_r(json_decode($out, true));
		echo '</pre>';
		die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
	}
	$out = json_decode($out);
	file_put_contents(__DIR__."/new.log", print_r("RESULT_SUCCESS", true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r($out, true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
	if ($out[0]->id) {
		addnotes($out[0]->id);
	}
}

function getAccessToken()
{
	global $clientId;
	global $clientSecret;
	global $redirectUri;
	global $authcode;
	global $subdomain;
	global $tokenPath;

	$link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token'; //Формируем URL для запроса

	/** Соберем данные для запроса */
	$data = [
		'client_id' => $clientId, // id нашей интеграции
		'client_secret' => $clientSecret, // секретный ключ нашей интеграции
		'grant_type' => 'authorization_code',
		'code' => $authcode, // код авторизации нашей интеграции
		'redirect_uri' => $redirectUri,// домен сайта нашей интеграции
	];
	/**
	 * Нам необходимо инициировать запрос к серверу.
	 * Воспользуемся библиотекой cURL (поставляется в составе PHP).
	 * Вы также можете использовать и кроссплатформенную программу cURL, если вы не программируете на PHP.
	 */
	$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
	/** Устанавливаем необходимые опции для сеанса cURL  */
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
	curl_setopt($curl,CURLOPT_URL, $link);
	curl_setopt($curl,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
	curl_setopt($curl,CURLOPT_HEADER, false);
	curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
	$out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
	$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	curl_close($curl);
	$code = (int)$code;

	// коды возможных ошибок
	$errors = [
		400 => 'Bad request',
		401 => 'Unauthorized',
		403 => 'Forbidden',
		404 => 'Not found',
		500 => 'Internal server error',
		502 => 'Bad gateway',
		503 => 'Service unavailable',
	];

	try
	{
		/** Если код ответа не успешный - возвращаем сообщение об ошибке  */
		if ($code < 200 || $code > 204) {
			throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
		}
	}
	catch(\Exception $e)
	{
		die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
	}

	file_put_contents($tokenPath, $out);
	return $out;
	/**
	 * Данные получаем в формате JSON, поэтому, для получения читаемых данных,
	 * нам придётся перевести ответ в формат, понятный PHP
	 */
	 /*
	$response = json_decode($out, true);

	$access_token = $response['access_token']; //Access токен
	$refresh_token = $response['refresh_token']; //Refresh токен
	$token_type = $response['token_type']; //Тип токена
	$expires_in = $response['expires_in']; //Через сколько действие токена истекает

	// выведем наши токены. Скопируйте их для дальнейшего использования
	// access_token будет использоваться для каждого запроса как идентификатор интеграции
	var_dump($access_token);
	var_dump($refresh_token );
	*/

}

function refreshAccessToken()
{
	global $clientId;
	global $clientSecret;
	global $redirectUri;
	global $authcode;
	global $subdomain;
	global $tokenPath;
	
	$link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token'; //Формируем URL для запроса
	$accessToken = json_decode( file_get_contents( $tokenPath ), true );
	
	/** Соберем данные для запроса */
	$data = [
		'client_id' => $clientId, // id нашей интеграции
		'client_secret' => $clientSecret, // секретный ключ нашей интеграции
		'grant_type' => 'refresh_token',
		"refresh_token" => $accessToken['refresh_token'], // код авторизации нашей интеграции
		'redirect_uri' => $redirectUri,// домен сайта нашей интеграции
	];

	$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
	/** Устанавливаем необходимые опции для сеанса cURL  */
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
	curl_setopt($curl,CURLOPT_URL, $link);
	curl_setopt($curl,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
	curl_setopt($curl,CURLOPT_HEADER, false);
	curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
	$out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
	$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	curl_close($curl);
	$code = (int)$code;
	$errors = [
		400 => 'Bad request',
		401 => 'Unauthorized',
		403 => 'Forbidden',
		404 => 'Not found',
		500 => 'Internal server error',
		502 => 'Bad gateway',
		503 => 'Service unavailable',
	];

	try
	{
		/** Если код ответа не успешный - возвращаем сообщение об ошибке  */
		if ($code < 200 || $code > 204) {
			throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
		}
	}
	catch(\Exception $e)
	{
		die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
	}

	file_put_contents($tokenPath, $out);
	return $out;

}

function getdealID($dealID)
{
	global $clientId;
	global $clientSecret;
	global $redirectUri;
	global $authcode;
	global $subdomain;
	global $tokenPath;
	
	$link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/' . $dealID; //Формируем URL для запроса
	$accessToken = json_decode( file_get_contents( $tokenPath ), true );
	
	$token = $accessToken['access_token'];
	print_r($token);
	print_r("\n");

	$headers = [
		'Authorization: Bearer ' . $token
	];
	print_r($headers);
	print_r("\n");

	$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
	curl_setopt($curl,CURLOPT_URL, $link);
	curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'GET');
	curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
	//curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
	curl_setopt($curl,CURLOPT_HEADER, false);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
	$out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
	$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	curl_close($curl);
	$code = (int)$code;
	$errors = [
		400 => 'Bad request',
		401 => 'Unauthorized',
		403 => 'Forbidden',
		404 => 'Not found',
		500 => 'Internal server error',
		502 => 'Bad gateway',
		503 => 'Service unavailable',
	];

	try
	{
		if ($code < 200 || $code > 204) {
			throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
		}
	}
	catch(\Exception $e)
	{
		die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
	}
	print_r("Успешно");
	//print_r(json_decode($out, true));
	return $out;
}

function unsortedReturn()
{
	global $clientId;
	global $clientSecret;
	global $redirectUri;
	global $authcode;
	global $subdomain;
	global $tokenPath;
	
	$link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/unsorted'; //Формируем URL для запроса
	$accessToken = json_decode( file_get_contents( $tokenPath ), true );
	
	$token = $accessToken['access_token'];
	print_r($token);
	print_r("\n");

	$headers = [
		'Authorization: Bearer ' . $token
	];
	print_r($headers);
	print_r("\n");

	$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
	curl_setopt($curl,CURLOPT_URL, $link);
	curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'GET');
	curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
	//curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
	curl_setopt($curl,CURLOPT_HEADER, false);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
	$out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
	$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	curl_close($curl);
	$code = (int)$code;
	$errors = [
		400 => 'Bad request',
		401 => 'Unauthorized',
		403 => 'Forbidden',
		404 => 'Not found',
		500 => 'Internal server error',
		502 => 'Bad gateway',
		503 => 'Service unavailable',
	];

	try
	{
		if ($code < 200 || $code > 204) {
			throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
		}
	}
	catch(\Exception $e)
	{
		die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
	}
	print_r("Успешно");
	//print_r(json_decode($out, true));
	return $out;
}

function customfields()
{
	global $clientId;
	global $clientSecret;
	global $redirectUri;
	global $authcode;
	global $subdomain;
	global $tokenPath;
	
	$link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/custom_fields'; //Формируем URL для запроса
	$accessToken = json_decode( file_get_contents( $tokenPath ), true );
	
	$token = $accessToken['access_token'];
	print_r($token);
	print_r("\n");

	$headers = [
		'Authorization: Bearer ' . $token
	];
	print_r($headers);
	print_r("\n");

	$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
	curl_setopt($curl,CURLOPT_URL, $link);
	curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'GET');
	curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
	//curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
	curl_setopt($curl,CURLOPT_HEADER, false);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
	$out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
	$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	curl_close($curl);
	$code = (int)$code;
	$errors = [
		400 => 'Bad request',
		401 => 'Unauthorized',
		403 => 'Forbidden',
		404 => 'Not found',
		500 => 'Internal server error',
		502 => 'Bad gateway',
		503 => 'Service unavailable',
	];

	try
	{
		if ($code < 200 || $code > 204) {
			throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
		}
	}
	catch(\Exception $e)
	{
		die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
	}
	print_r("Успешно");
	//print_r(json_decode($out, true));
	return $out;
}

function addnotes($leadID)
{
	global $clientId;
	global $clientSecret;
	global $redirectUri;
	global $authcode;
	global $subdomain;
	global $tokenPath;
	global $arrPost;
	
	// Просмотр тегов сделки
	$link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/notes'; //Формируем URL для запроса
	$accessToken = json_decode( file_get_contents( $tokenPath ), true );
	$token = $accessToken['access_token'];
	
	$data = Array(
	Array(
        "entity_id" => $leadID,
        "note_type" => "common",
        "params" => Array(
			"text" => $arrPost['fields']['message'],
		),
	));
	
	file_put_contents(__DIR__."/new.log", print_r("NOTES_DATA", true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r($data, true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
		
	$headers = [
		'Authorization: Bearer ' . $token
	];
	print_r($headers);
	print_r("\n");

	$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
	curl_setopt($curl,CURLOPT_URL, $link);
	curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl,CURLOPT_HEADER, false);
	curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
	$out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
	$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	curl_close($curl);
	$code = (int)$code;
	$errors = [
		400 => 'Bad request',
		401 => 'Unauthorized',
		403 => 'Forbidden',
		404 => 'Not found',
		500 => 'Internal server error',
		502 => 'Bad gateway',
		503 => 'Service unavailable',
	];

	try
	{
		if ($code < 200 || $code > 204) {
			throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
			file_put_contents(__DIR__."/new.log", print_r("NOTES_DATA", true), FILE_APPEND);
			file_put_contents(__DIR__."/new.log", print_r("Exception", true), FILE_APPEND);
			file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
		}
	}
	catch(\Exception $e)
	{
		$out = json_decode($out);
		file_put_contents(__DIR__."/new.log", print_r("NOTES_ERROR", true), FILE_APPEND);
		file_put_contents(__DIR__."/new.log", print_r($out, true), FILE_APPEND);
		file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
		die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
	}
	//$out = json_decode($out);
	file_put_contents(__DIR__."/new.log", print_r("NOTES_SUCCESS", true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r($out, true), FILE_APPEND);
	file_put_contents(__DIR__."/new.log", print_r("\n", true), FILE_APPEND);
	//return $out;
}