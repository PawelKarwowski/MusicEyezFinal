<?php
if(!session_id()) {
  session_start();
}

/**
 * Library Requirements
 *
 * 1. Install composer (https://getcomposer.org)
 * 2. On the command line, change to this directory (api-samples/php)
 * 3. Require the google/apiclient library
 *    $ composer require google/apiclient:~2.0
 */
if (!file_exists(__DIR__ . '/vendor/youtube/autoload.php')) {
  throw new \Exception('please run "composer require google/apiclient:~2.0" in "' . __DIR__ .'"');
}

require_once __DIR__ . '/vendor/youtube/autoload.php';

//$htmlBody = <<<END
//<form method="GET">
//  <div>
//    Search Term: <input type="search" id="q" name="q" placeholder="Enter Search Term">
//  </div>
//  <div>
//    Max Results: <input type="number" id="maxResults" name="maxResults" min="1" max="50" step="1" value="25">
//  </div>
//  <input type="submit" value="Search">
//</form>
//END;

// This code will execute if the user entered a search query in the form
// and submitted the form. Otherwise, the page displays the form above.
$search=null;
$searchold = null;

if(!isset($_POST['search']))
{

}else{  
  $search=$_POST['search'];
}



//$search=$_POST['search'];
//echo $search;
$howMuch=rand(1,5);
$maxResults = $howMuch;
if (isset($search)) {
  /*
   * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
   * {{ Google Cloud Console }} <{{ https://cloud.google.com/console }}>
   * Please ensure that you have enabled the YouTube Data API for your project.
   */
  $DEVELOPER_KEY = 'AIzaSyAGELaNeQnVIee-L4OsZZZORl_2ElavP9A';

  $client = new Google_Client();
  $client->setDeveloperKey($DEVELOPER_KEY);

  // Define an object that will be used to make all API requests.
  $youtube = new Google_Service_YouTube($client);

  try {

    // Call the search.list method to retrieve results matching the specified
    // query term.
    $searchResponse = $youtube->search->listSearch('id,snippet', array(
      'q' => $search,
      'maxResults' => $maxResults,
    ));

    $videos = '';
    $channels = '';
    $playlists = '';

    // Add each result to the appropriate list, and then display the lists of
    // matching videos, channels, and playlists.
    foreach ($searchResponse['items'] as $searchResult) {
      switch ($searchResult['id']['kind']) {
        case 'youtube#video':
          $videos .= sprintf('<li>%s (%s)</li>',
              $searchResult['snippet']['title'], $searchResult['id']['videoId']);
          break;
      }
    }

    $_SESSION['video']= '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$searchResult['id']['videoId'].'"'.' ".frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    //$video2 = '<div class="youtube-player" data-id="'.$searchResult['id']['videoId'].'"'.'></div>';
    //$_SESSION['video']=$video = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$searchResult['id']['videoId'].'"'.' ".frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
  
  } catch (Google_Service_Exception $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  } catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  }
}
?>