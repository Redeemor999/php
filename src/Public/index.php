<?

use App\Router;

require __DIR__ . '/../vendor/autoload.php';

// $data['notes'] = ['user_id' => 1, 'note' => 'This is a test'];

// $table = key($data);
// $cols = implode(',', array_keys($data[$table]));
// $placeHolders = array_keys($data[$table]);
// $result = implode(',', array_map(fn($k) => ':' . $k, $placeHolders));

// var_dump($result);
// exit();

define('APP_PATH', __DIR__ . '/../App');
define('CTRLS_PATH', __DIR__ . '/../App/Controllers');
define('VIEWS_PATH', __DIR__ . '/../App/Views');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$config = require __DIR__ . '/../Core/Config.php';
$router = new Router;

(new \Core\App($config['db']));

$router
    ->get('/', [App\Controllers\HomeController::class, 'index'])

    ->get('/notes', [App\Controllers\Notes\NotesController::class, 'index'])
    ->get('/note', [App\Controllers\Notes\NotesController::class, 'note'])
    ->get('/note/create', [App\Controllers\Notes\NotesController::class, 'create'])
    ->post('/note/store', [App\Controllers\Notes\NotesController::class, 'store'])
    ->delete('/note/destroy', [App\Controllers\Notes\NotesController::class, 'delete'])
    
    ->get('/contact', [App\Controllers\ContactController::class, 'index'])
    ->get('/about', [App\Controllers\AboutController::class, 'index'])
    ;
$router->resolve($uri, $method);
