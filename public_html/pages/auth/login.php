<?php
session_start();

// CSRF token
if (empty($_SESSION['csrf_token'])) {
	$_SESSION['csrf_token'] = bin2hex(random_bytes(24));
}
$errors = [];
$username = '';
$remember = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Basic CSRF check
	$token = $_POST['csrf_token'] ?? '';
	if (!hash_equals($_SESSION['csrf_token'], $token)) {
		$errors[] = 'Yêu cầu không hợp lệ. Thử lại.';
	} else {
		$username = trim($_POST['username'] ?? '');
		$password = $_POST['password'] ?? '';
		$remember = !empty($_POST['remember']);

		if ($username === '' || $password === '') {
			$errors[] = 'Vui lòng nhập tên đăng nhập và mật khẩu.';
		} else {
			// TODO: Replace with database authentication (PDO) using pages/config/db.php
			// Demo fallback (replace for production): single demo account
			$demo_user = 'admin';
			$demo_hash = password_hash('admin123', PASSWORD_DEFAULT); // password is "admin123"
			if ($username === $demo_user && password_verify($password, $demo_hash)) {
				// Successful login
				$_SESSION['user'] = [
					'username' => $username,
					'role' => 'admin',
				];
				if ($remember) {
					$_SESSION['remember_login'] = true;
				}
				// Regenerate session id
				session_regenerate_id(true);
				header('Location: ../crud/index.php');
				exit;
			} else {
				$errors[] = 'Tên đăng nhập hoặc mật khẩu không đúng.';
			}
		}
	}
}
?>
<!doctype html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng nhập - Quản lý nhân viên</title>
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/styles.css">
</head>
<body class="login-page">
<div class="login-shell">
	<div class="login-backdrop login-backdrop-one"></div>
	<div class="login-backdrop login-backdrop-two"></div>

	<div class="container position-relative">
		<div class="row justify-content-center align-items-center min-vh-100 py-4">
			<div class="col-12 col-md-10 col-lg-8 col-xl-7">
				<div class="login-card card border-0 shadow-lg overflow-hidden">
					<div class="row g-0">
						<div class="col-lg-5 login-visual p-4 p-lg-5 text-white d-flex flex-column justify-content-between">
							<div>
								<div class="brand-mark mb-4">QLNS</div>
								<h1 class="h3 fw-bold mb-3">Quản lý nhân sự gọn gàng, an toàn hơn.</h1>
								<p class="mb-0 opacity-75">Đăng nhập để tiếp tục vào hệ thống điều hành nhân sự và dữ liệu phòng ban.</p>
							</div>
							<div class="login-visual-note mt-5">
								<div class="small text-uppercase opacity-75 mb-1">Bảo mật</div>
								<div class="fw-semibold">Phiên làm việc được bảo vệ bằng CSRF và session.</div>
							</div>
						</div>

						<div class="col-lg-7 bg-white p-4 p-lg-5">
							<div class="mb-4">
								<div class="text-uppercase text-primary fw-semibold small mb-2">Hệ thống Quản lý Nhân viên</div>
								<h2 class="h4 fw-bold mb-2">Đăng nhập tài khoản</h2>
								<p class="text-muted mb-0">Sử dụng tài khoản quản trị để truy cập khu vực quản lý.</p>
							</div>

							<?php if (!empty($errors)): ?>
								<div class="alert alert-danger border-0 login-alert" role="alert">
									<?php foreach ($errors as $error): ?>
										<div><?php echo htmlspecialchars($error); ?></div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

							<form id="loginForm" method="post" novalidate>
								<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

								<div class="mb-3">
									<label for="username" class="form-label fw-medium">Tên đăng nhập</label>
									<input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Nhập tên đăng nhập" value="<?php echo htmlspecialchars($username); ?>" required autocomplete="username">
									<div class="invalid-feedback">Vui lòng nhập tên đăng nhập.</div>
								</div>

								<div class="mb-3">
									<label for="password" class="form-label fw-medium">Mật khẩu</label>
									<input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Nhập mật khẩu" required minlength="6" autocomplete="current-password">
									<div class="invalid-feedback">Mật khẩu tối thiểu 6 ký tự.</div>
								</div>

								<div class="d-flex justify-content-between align-items-center gap-3 mb-4 flex-wrap">
									<div class="form-check m-0">
										<input class="form-check-input" type="checkbox" value="1" id="remember" name="remember" <?php echo $remember ? 'checked' : ''; ?>>
										<label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
									</div>
									<a href="#" class="login-link small text-decoration-none">Quên mật khẩu?</a>
								</div>

								<div class="d-grid">
									<button type="submit" id="submitBtn" class="btn btn-primary btn-lg login-submit">Đăng nhập</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<p class="text-center text-muted small mt-3 mb-0">© <?php echo date('Y'); ?> Công ty - Quản lý nhân sự</p>
			</div>
		</div>
	</div>
</div>

<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../js/validation.js"></script>
</body>
</html>
