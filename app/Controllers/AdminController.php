<?php
require_once __DIR__ . '/../Models/User.php'; // ✅ New User model to handle users

class AdminController {
    public function dashboard() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: " . BASE_URL . "/login");
            exit;
        }

        ob_start();
        require __DIR__ . '/../Views/admin/dashboard.php';
        $content = ob_get_clean();

        require __DIR__ . '/../Views/layouts/admin.php';
    }

    public function addAdmin() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            http_response_code(403);
            echo "Unauthorized";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $userModel = new User(); // ✅ use User model
            $userModel->createAdmin($email, $password);

             if (!$success) {
        $_SESSION['error'] = "Email already exists!";
        header("Location: " . BASE_URL . "/admin/add-admin");
        exit;
    }

    $_SESSION['success'] = "New admin created successfully!";
    header("Location: " . BASE_URL . "/admin/dashboard");
    exit;

        }

        ob_start();
        require __DIR__ . '/../Views/admin/add_admin.php';
        $content = ob_get_clean();
        require __DIR__ . '/../Views/layouts/admin.php';
    }
}
