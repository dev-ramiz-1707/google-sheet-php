<?php 

/**
 * Service Helper 
 * 
 * @srijan
 * @stackoverflow
 * @developers.google.com
 * @dev_ramiz_1707 - https://github.com/dev-ramiz-1707
 * 
 * links : 
 *  - https://developers.google.com/sheets/api/reference/rest/v4/spreadsheets
 *  - https://stackoverflow.com/questions/38949318/google-sheets-api-returns-the-caller-does-not-have-permission-when-using-serve
 *  - https://www.srijan.net/resources/blog/integrating-google-sheets-with-php-is-this-easy-know-how
 *  - https://github.com/dev-ramiz-1707
 *  
 */

error_reporting(0);

require __DIR__ . '/vendor/autoload.php';

$client = new \Google_Client();

$client->setApplicationName('QuotGram App'); // Application Name - https://prnt.sc/148gie1

$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);

$client->setAccessType('offline');

$client->setAuthConfig(__DIR__ . '/credentials.json');

$service = new Google_Service_Sheets($client);

$spreadsheetId = "sheet id"; //It is present in your URL

$get_range = "A1:D1";
$update_range = "A2:C2";

//$response = $service->spreadsheets_values->get($spreadsheetId, $get_range);  // To get data from google sheet 

//$values = $response->getValues(); // Retrived value.


  $values = [[1,"Hello World!", "QuotGram", "06-05-2021"]];

  $body = new Google_Service_Sheets_ValueRange([

    'values' => $values

  ]);

  $params = [

    'valueInputOption' => 'RAW'

  ];

  $update_sheet = $service->spreadsheets_values->append($spreadsheetId, $update_range, $body, $params); // append data to the end of the file ( after last row  )
