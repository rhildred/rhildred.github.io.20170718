<?php
if(array_key_exists("HTTP_ORIGIN", $_SERVER)){
	header("Access-Control-Allow-Origin: " . $_SERVER["HTTP_ORIGIN"]);
	header("Access-Control-Allow-Headers: X-Requested-With, X-Authorization, Content-Type, X-HTTP-Method-Override");
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
}
/**
 * API framework front controller.
 *
 * @package api-framework
 * @author  Martin Bean <martin@martinbean.co.uk>
 */

/**
 * Generic class autoloader.
 *
 * @param string $class_name
 */
function autoload_class($class_name) {
    $directories = array(
        '../lib/classes/',
        '../lib/classes/controllers/',
        '../lib/classes/models/'
    );
    foreach ($directories as $directory) {
        $filename = $directory . $class_name . '.php';
        if (is_file($filename)) {
            require($filename);
            break;
        }
    }
}

/**
 * Register autoloader functions.
 */
spl_autoload_register('autoload_class');

/**
 * Parse the incoming request.
 */
$request = new Request();
if (isset($_SERVER['PATH_INFO'])) {
    $request->url_elements = explode('/', trim($_SERVER['PATH_INFO'], '/'));
}
elseif (isset($_SERVER['ORIG_PATH_INFO'])) {
    $request->url_elements = explode('/', trim($_SERVER['ORIG_PATH_INFO'], '/'));
}
$request->method = strtoupper($_SERVER['REQUEST_METHOD']);
switch ($request->method) {
    case 'GET':
        $request->parameters = $_GET;
    break;
    case 'POST':
        $request->parameters = $_POST;
    break;
    case 'PUT':
        parse_str(file_get_contents('php://input'), $request->parameters);
    break;
}

/**
 * Route the request.
 */
if (!empty($request->url_elements)) {
    $controller_name = ucfirst($request->url_elements[0]) . 'Controller';
    if (class_exists($controller_name)) {
        $controller = new $controller_name;
        $action_name = strtolower($request->method);
        $response_str = call_user_func_array(array($controller, $action_name), array($request));
    }
    else {
        header('HTTP/1.1 404 Not Found');
        $response_str = 'Unknown request: ' . $request->url_elements[0];
    }
}
else {
    $response_str = 'Unknown request';
}

/**
 * Send the response to the client.
 */
$sContentType='application/json';
if(array_key_exists('HTTP_ACCEPT', $_SERVER)) $sContentType = $_SERVER['HTTP_ACCEPT'];
$response_obj = Response::create($response_str, $sContentType);
echo $response_obj->render();
