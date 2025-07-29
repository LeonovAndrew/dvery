<?php
/*
define('BX_PULL_SKIP_INIT', true);

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

echo "it work";

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
*/


//require __DIR__ . '/vendor/autoload.php';
$clientId = "06a4a59e-d3c6-4732-bfc6-c41ea54300f3";
$clientSecret = "lPDMi5lQfDhGZxXwf35RvR25ewLOciHFKmtT65VjIi6dRnNFVKs1vFk3r2QdcrK1";
$redirectUri = "https://dveri-provance.ru/lp/contact.php";
$authcode = "def50200d277f54ebf4d003a535f3da452765a86adb6a660e5658d03509761f926544b2079c417fb0d7331f09b13e1bd84b67298db8a3e0c7f995e2f101ab1a0d7acbae156a377267383a0d64bd96794cbb3e98f9340092aa645a3c7036ca9889e3f4df0d38a777f3aa8eb0aac0d20b6bc135292688d45a821d3b7ca13ffdf22620fa938e16add8371ba3aa07a20c6e0b9d903fd6bd8e13c8128600b32a8127f785dec99579f56dbd63e74a25497d319cdd6f43f4fa8de9c7812479c2729569232220635395801d20ab85e291bfd794d7396952a0a7e0da343af825b08c1e3fe610bb609fbfcea6c1b21041905ef625f16bbc19c843de37b2f8d3f2f02c4bedfbbd12e9bc608f6a8ddea3155eaf0ba084c172ec2802841928aeaf8f21583d38090353d248d6faf249e03841fd57cb2af8624cab62dfc7f30b096d21b5da5135896ac33e2d8fd533feadeccbf3a4fdd514bbe0d7b60d244fe9fb694af38d5c5c05a6af4c9158e4668dbe1ac9ee7bd266a0220883c10bbdebced046a043e466ed98864bdd6766d47181f8ae84a2c68b773c7033ce716683f2310a2f37e467634470a453e81d5b8e9585a25201b395cd5005a6b4b40a926fd502444e03887c626bb83d85070063f0a372ebb6c1c6c2801ee29bfce10";
$subdomain = 'dveriprovans'; //Поддомен нужного аккаунта
$tokenPath = 'token.json';
//$apiClient = new \AmoCRM\Client\AmoCRMApiClient($clientId, $clientSecret, $redirectUri);

$accessToken = json_decode( file_get_contents( $tokenPath ), true );

if ( file_exists( $tokenPath ) ) {
	$accessToken = json_decode( file_get_contents( $tokenPath ), true );
	if ( $accessToken['access_token'] ) {
		$accessToken = json_decode( refreshAccessToken(), true );
		echo "Токен обновлен";
	} else {
		$accessToken = json_decode( getAccessToken(), true );
	}
}
else {	
	$accessToken = json_decode( getAccessToken(), true );
	echo "Файл с токеном создан";
}

print_r($accessToken);
print_r("\n");

// Отправляем данные из формы
$link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/unsorted/forms'; //Формируем URL для запроса

/** Соберем данные для запроса */
$data = [
/*
	'client_id' => $clientId, // id нашей интеграции
	'client_secret' => $clientSecret, // секретный ключ нашей интеграции
	'grant_type' => 'authorization_code',
	'code' => 'def5020033c45b414dfedb56d964559ee9f646e7946c5ea8178edf0e073c86dc196eab399ba5dca5fd330038d4c27b08cb9fdeb1eefaa0a6a16646f92db99227c7099010668fb28b04c97fd728dee7ce3aa2cdf91660600f6598d7631b618bc5e992081380c0030e27e36f153fbc8a9332996598b628b573c18702353764b5551d11d0b0841b3494b1b03919b4cea8c13a432e0213e050776cff97e4c093cb0f90234fac2bb83d9b16ed937cf493b7776bbe4c22a4d357e02904936f1a072452d34745713501ce6b293c5f5d156db0ca5133974cc30d71226ed0b3f5db178667022e8d93ac7aa8ac62a30500942a402ac7bae5680c376a6af140000daf8df7326e02db842f380e2e04ac384973d551c05f5fc7995b9a0177e5a6151c5aea38eebd12b71e2c72c411be3331029addba44577167ebee82b1db10cf8d282928be386bcf06ec3b569137e1f81117edd902033cfdb6d565b789cde85028c7d01762812960768c08f624b30b5eabf429f1e61a8f3c8663cc2dddfc0a50f6b7fd16600303acc1653b68b41e75c9bd80a50a9e9aa5e82e0b96708e3844dbebc3788017e0c11ddf53cd2330cacaade38b9839885837a776a2dabb6e052b4a9f3cf543d5bdc4a4ce846ec6f307677a67f00c3b8b9d1a7ce54d', // код авторизации нашей интеграции
	'redirect_uri' => 'https://dveri-provance.ru/lp/contact.php',// домен сайта нашей интеграции
	*/
	"request_id" => "123",
	"source_name" => "Источник заявки",
	"source_uid" => "a1fee7c0fc436088e64ba2e8822ba2b4",
	"pipeline_id" => 2249911,
	//"created_at": (mktime(date('h'), date('i'), date('s'), 10, 04, 2019)),
	"_embedded" => [
		"leads" => [
			"name" => "New Тест",
			"visitor_uid" => "6692210d-58d0-468c-acb2-dce7f93eef87",
			
			"price" => 5000,
			/*
			"custom_fields_values" => [
				"field_id" => 284785,
				"values" => [
					"value" => "Дополнительное поле"
				]
			],
			*/
			"_embedded" => [
				"tags" => [
					"name" => "Тег для примера"
				]
			]
			
		],
		
		"contacts" => [
			"name" => "test123",
			"first_name" => "test1234",
			"last_name" => "test12345",
			"custom_fields_values" => [
				"field_code" => "PHONE",
				"values" => [
						"value" => "+79211111111"
				]
			]
		],
		
		"companies" => [
			"name" => "ОАО Коспромсервис"
		]
		
	],
	"metadata" => [
		"ip" => "192.168.0.1",
		"form_id" => "826576",
		"form_sent_at" => 1590830520,
		"form_name" => "LP Нестандартные двери",
		"form_page" => "https://dveri-provance.ru/lp/nestandart/",
		"referer" => "https://www.google.com/search?&q=elon+musk"
	]
];

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
curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
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
print_r(json_decode($out, true));

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
	print_r ($data);
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