<?php
require_once __DIR__ . '/vendor/autoload.php';


define('APPLICATION_NAME', 'Google Calendar API PHP Quickstart');
define('CREDENTIALS_PATH', __DIR__ . '/calendar-php-quickstart.json');
define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/calendar-php-quickstart.json
define('SCOPES', implode(' ', array(
  Google_Service_Calendar::CALENDAR)
));

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient() {
  $client = new Google_Client();
  $client->setApplicationName(APPLICATION_NAME);
  $client->setScopes(SCOPES);
  $client->setAuthConfig(CLIENT_SECRET_PATH);
  $client->setAccessType('offline');

  // Load previously authorized credentials from a file.
  $credentialsPath = expandHomeDirectory(CREDENTIALS_PATH);
  echo file_exists($credentialsPath);
  if (file_exists($credentialsPath)) {
    $accessToken = json_decode(file_get_contents($credentialsPath), true);
  } else {

    // Request authorization from the user.
    $authUrl = $client->createAuthUrl();
    printf("Open the following link in your browser:\n%s\n", $authUrl);
    print 'Enter verification code: ';
    $authCode = trim(fgets(STDIN));

    // Exchange authorization code for an access token.
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

    // Store the credentials to disk.
    if(!file_exists(dirname($credentialsPath))) {
      mkdir(dirname($credentialsPath), 0700, true);
    }
    file_put_contents($credentialsPath, json_encode($accessToken));
    printf("Credentials saved to %s\n", $credentialsPath);
  }
  $client->setAccessToken($accessToken);

  // Refresh the token if it's expired.
  if ($client->isAccessTokenExpired()) {
    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
  }
  return $client;
}


/**
 * Expands the home directory alias '~' to the full path.
 * @param string $path the path to expand.
 * @return string the expanded path.
 */
function expandHomeDirectory($path) {
  $homeDirectory = getenv('HOME');
  if (empty($homeDirectory)) {
    $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
  }
  return str_replace('~', realpath($homeDirectory), $path);
}

// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Calendar($client);
// Refer to the PHP quickstart on how to setup the environment:
// https://developers.google.com/google-apps/calendar/quickstart/php
// Change the scope to Google_Service_Calendar::CALENDAR and delete any stored
// credentials.
/*
$event = new Google_Service_Calendar_Event(array(
  'summary' => 'Mang Er Delivery',
  'location' => '30 A Plaridel Street Quezon City',
  'description' => 'Nothing just delivery',
  'start' => array(
    //'dateTime' => '2016-11-30T09:00:00-07:00',
    'date' => '2016-11-30',
    'timeZone' => 'Asia/Manila',
  ),
  'end' => array(
    //'dateTime' => '2016-12-28T17:00:00-07:00',
    'date' => '2016-12-28',
    'timeZone' => 'Asia/Manila',
  ),
  'recurrence' => array(
    'RRULE:FREQ=DAILY;COUNT=2'
  ),
  'attendees' => array(
    array('email' => 'lpage@example.com'),
    array('email' => 'sbrin@example.com'),
  ),
  'reminders' => array(
    'useDefault' => FALSE,
    'overrides' => array(
      array('method' => 'email', 'minutes' => 24 * 60),
      array('method' => 'popup', 'minutes' => 10),
    ),
  ),
));*/

$event = new Google_Service_Calendar_Event();
$event->setSummary('Appointment');
$event->setLocation('Somewhere');
$start = new Google_Service_Calendar_EventDateTime();
$start->setDateTime('2016-11-03T10:00:00.000-07:00');
$start->setTimeZone('Asia/Manila');
$event->setStart($start);
$end = new Google_Service_Calendar_EventDateTime();
$end->setDateTime('2016-11-03T10:25:00.000-07:00');
$end->setTimeZone('Asia/Manila');
$event->setEnd($end);
//$event->setRecurrence(array('RRULE:FREQ=WEEKLY;UNTIL=20110701T170000Z'));
$event->setRecurrence(array('RRULE:FREQ=WEEKLY'));
/*$attendee1 = new Google_Service_Calendar_EventAttendee();
$attendee1->setEmail('attendeeEmail');
// ...
$attendees = array($attendee1,
                   // ...
                   );
$event->attendees = $attendees;
*/
//$recurringEvent = $service->events->insert('primary', $event);



$calendarId = '9jdsurs23058uaeq3micimu7r4@group.calendar.google.com';
$recurringEvent = $service->events->insert($calendarId, $event);
echo $recurringEvent->getId();
//printf('Event created: %s\n', $event->htmlLink);
