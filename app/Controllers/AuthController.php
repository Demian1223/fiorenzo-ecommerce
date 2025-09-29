<?php
require_once __DIR__ . '/../Models/User.php';

class AuthController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->getByEmail($email);

            if (!$user) {
                $_SESSION['error'] = "Account does not exist. Please create a profile.";
                header("Location: " . BASE_URL . "/login");
                exit;
            }

            if (!password_verify($password, $user['password'])) {
                $_SESSION['error'] = "Incorrect password. Please try again.";
                header("Location: " . BASE_URL . "/login");
                exit;
            }

            $_SESSION['user'] = [
                'id'    => $user['user_id'],   // ✅ correct column from DB
                'email' => $user['email'],
                'role'  => $user['role']
            ];

            if ($user['role'] === 'admin') {
                header("Location: " . BASE_URL . "/admin");
            } else {
                header("Location: " . BASE_URL . "/home");
            }
            exit;
        }
    }

    public function signup() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email  = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $first  = trim($_POST['first_name'] ?? '');
        $last   = trim($_POST['last_name'] ?? '');
        $dob    = $_POST['dob'] ?? ''; // still collected for age check

        // ✅ only check required fields that actually go into DB
        if (!$email || !$password || !$first || !$last) {
            $_SESSION['error'] = "Please fill in all fields.";
            $_SESSION['old'] = $_POST;
            header("Location: " . BASE_URL . "/signup");
            exit;
        }

        // ✅ Age validation (13+)
        if ($dob) {
            $minDob = date('Y-m-d', strtotime('-13 years'));
            if ($dob > $minDob) {
                $_SESSION['error'] = "You must be at least 13 years old.";
                $_SESSION['old'] = $_POST;
                header("Location: " . BASE_URL . "/signup");
                exit;
            }
        }

        $userModel = new User();
        if ($userModel->getByEmail($email)) {
            $_SESSION['error'] = "Account already exists. Please sign in.";
            $_SESSION['old'] = $_POST;
            header("Location: " . BASE_URL . "/signup");
            exit;
        }

        $hashed = password_hash($password, PASSWORD_BCRYPT);

        if (!$userModel->create($email, $hashed, $first, $last, 'customer')) {
            $_SESSION['error'] = "Signup failed. Please try again.";
            $_SESSION['old'] = $_POST;
            header("Location: " . BASE_URL . "/signup");
            exit;
        }

        $_SESSION['success'] = "Profile created successfully. Please sign in.";
        unset($_SESSION['old']);
        header("Location: " . BASE_URL . "/login");
        exit;
    }
}


    public function logout() {
        $_SESSION = [];
        if (session_id()) session_destroy();
        header("Location: " . BASE_URL . "/home");
        exit;
    }
}
