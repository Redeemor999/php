<?

use App\Router;

require __DIR__ . '/../vendor/autoload.php';

define('APP_PATH', __DIR__ . '/../App');
define('CTRLS_PATH', __DIR__ . '/../App/Controllers');
define('VIEWS_PATH', __DIR__ . '/../App/Views');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$config = require __DIR__ . '/../Core/Config.php';
$router = new Router;

session_start();

$router->get('/', [App\Controllers\HomeController::class, 'index']);
$router->get('/contact', [App\Controllers\ContactController::class, 'index']);
$router->get('/about', [App\Controllers\AboutController::class, 'index']);

$router->get('/notes', [App\Controllers\Notes\NotesController::class, 'index', 'Auth']);
$router->get('/note', [App\Controllers\Notes\NotesController::class, 'note']);
$router->get('/notes/create', [App\Controllers\Notes\NotesController::class, 'create']);
$router->post('/notes/store', [App\Controllers\Notes\NotesController::class, 'store']);
$router->delete('/notes/destroy', [App\Controllers\Notes\NotesController::class, 'delete']);
$router->post('/notes/edit', [App\Controllers\Notes\NotesController::class, 'edit']);
$router->patch('/notes/update', [App\Controllers\Notes\NotesController::class, 'update']);

$router->get('/users/login', [App\Controllers\Users\UsersController::class, 'login', 'Guest']);
$router->post('/users/login', [App\Controllers\Users\UsersController::class, 'signin']);
$router->get('/register', [App\Controllers\Users\UsersController::class, 'register', 'Guest']);
$router->post('/register', [App\Controllers\Users\UsersController::class, 'store']);

    ;
(new \Core\App($config['db'], $router, $uri, $method))->route();
