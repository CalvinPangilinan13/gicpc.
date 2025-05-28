<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>News Portal | Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #2c3e50, #3498db);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }
    .login-card {
      background: #fff;
      border-radius: 15px;
      padding: 2.5rem;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      animation: slideIn 0.5s ease-out;
    }
    @keyframes slideIn {
      0% {
        opacity: 0;
        transform: translateY(-30px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
      transform: scale(0.85) translateY(-1.5rem);
    }
    .btn-primary {
      background: #3498db;
      border: none;
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      background: #2980b9;
      transform: scale(1.05);
    }
    .login-header {
      margin-bottom: 1.5rem;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <div class="text-center login-header">
      <h3 class="fw-bold text-primary">Tara Libot Tayo!</h3>
      <p class="text-muted">Sign in to your account</p>
    </div>

    <?php echo form_open('admin/Login', ['name' => 'adminsignup']); ?>
    
    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-danger py-1">
        <?= $this->session->flashdata('error'); ?>
      </div>
    <?php endif; ?>

    <div class="form-floating mb-3">
      <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
      <label for="email">Email address</label>
    </div>

    <div class="form-floating mb-4">
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
      <label for="password">Password</label>
    </div>

    <div class="d-grid">
      <button type="submit" name="submit" class="btn btn-primary btn-lg">
        <i class="bi bi-box-arrow-in-right me-2"></i>Login
      </button>
    </div>

    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
