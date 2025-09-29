<?php
require_once __DIR__ . '/../app/Controllers/AdminController.php';
require_once __DIR__ . '/../app/Controllers/ProductController.php';
require_once __DIR__ . '/../app/Controllers/CartController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Controllers/AdminProductController.php';


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/TailwindCSSstarter/public');
}


$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$baseFolder = '/TailwindCSSstarter/public';
if (str_starts_with($path, $baseFolder)) {
    $path = substr($path, strlen($baseFolder));
}
/* -------- AUTH -------- */
if ($path === '/login') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') (new AuthController())->login();
    ob_start(); require __DIR__ . '/../app/Views/login.php'; $content = ob_get_clean();
    require __DIR__ . '/../app/Views/layouts/main.php'; exit;
}
if ($path === '/signup') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') (new AuthController())->signup();
    ob_start(); require __DIR__ . '/../app/Views/signup.php'; $content = ob_get_clean();
    require __DIR__ . '/../app/Views/layouts/main.php'; exit;
}
if ($path === '/logout') {
    (new AuthController())->logout(); exit;
}




/* -------- ADMIN DASHBOARD -------- */
if ($path === '/admin') {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header("Location: " . BASE_URL . "/login");
        exit;
    }

    ob_start();
    require __DIR__ . '/../app/Views/admin/dashboard.php';
    $content = ob_get_clean();
    require __DIR__ . '/../app/Views/layouts/admin.php';
    exit;
}

/* -------- ADMIN PRODUCT ROUTES -------- */
if ($path === '/admin/products') {
    if ($_SESSION['user']['role'] !== 'admin') { header("Location: ".BASE_URL."/login"); exit; }
    (new AdminProductController())->index();
    exit;
}

if ($path === '/admin/add-product') {
    if ($_SESSION['user']['role'] !== 'admin') { header("Location: ".BASE_URL."/login"); exit; }
    (new AdminProductController())->create();
    exit;
}

if ($path === '/admin/delete-product') {
    if ($_SESSION['user']['role'] !== 'admin') { header("Location: ".BASE_URL."/login"); exit; }
    $id = $_GET['id'] ?? null;
    if ($id) {
        (new AdminProductController())->delete($id);
    }
    exit;
}
if ($path === '/admin/edit-product') {
    if ($_SESSION['user']['role'] !== 'admin') { 
        header("Location: ".BASE_URL."/login"); 
        exit; 
    }
    $id = $_GET['id'] ?? null;
    if ($id) {
        (new AdminProductController())->edit($id);
    }
    exit;
}

if ($path === '/admin/add-admin') {
    (new AdminController())->addAdmin();
    exit;
}


/* -------- PRODUCT DETAILS -------- */
if ($path === '/product') {
    $id = $_GET['id'] ?? null;
    if ($id) { (new ProductController())->show($id); exit; }
}

/* -------- CART -------- */
if ($path === '/cart') { (new CartController())->index(); exit; }

if (strpos($path, '/cart/add') === 0) {
    $id = $_GET['id'] ?? null;
    if ($id) { (new CartController())->add($id); header("Location: ".BASE_URL."/cart"); exit; }
}

if ($path === '/cart/update-qty' && $_SERVER['REQUEST_METHOD']==='POST') {
    (new CartController())->updateQty(); header("Location: ".BASE_URL."/cart"); exit;
}

if ($path === '/cart/delete') {
    $id = $_GET['id'] ?? null;
    if ($id) { (new CartController())->delete($id); }
    header("Location: ".BASE_URL."/cart"); exit;
}

if ($path === '/cart/reset') {
    (new CartController())->reset(); header("Location: ".BASE_URL."/cart"); exit;
}

/* -------- CHECKOUT -------- */
if ($path === '/cart/checkout') {
    if (!isset($_SESSION['user'])) { header("Location: ".BASE_URL."/login"); exit; }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { (new CartController())->checkout(); exit; }
    header("Location: ".BASE_URL."/cart"); exit;


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        (new CartController())->checkout(); // validate form + create order + show confirmation
        exit;
    }
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    http_response_code(403);
    echo "Unauthorized";
    exit;
}
/* -------- ADMIN ADD ADMIN -------- */
if ($path === '/admin/add-admin') {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        http_response_code(403);
        echo "Unauthorized";
        exit;
    }
    (new AdminController())->addAdmin();
    exit;
}


    // GET → show the same cart page (cart has checkout form)
    header("Location: ".BASE_URL."/cart"); exit;
}



/* -------- NORMAL VIEWS -------- */
$view = 'home';
if     ($path === '/shopwomen') $view = 'shopwomen';
elseif ($path === '/shopmen')   $view = 'shopmen';
elseif ($path === '/faq')       $view = 'faq';
elseif ($path === '/about')     $view = 'about';
elseif ($path === '/ethics')    $view = 'ethics';
elseif ($path === '/checkout_success')    $view = 'checkout_success';
elseif ($path === '/home' || $path === '/' || $path === '') $view = 'home';

ob_start();
require __DIR__ . "/../app/Views/{$view}.php";
$content = ob_get_clean();
require __DIR__ . '/../app/Views/layouts/main.php';
