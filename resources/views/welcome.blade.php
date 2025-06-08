<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="icon" href="/images/tut wuri handayani.ico">
  <title>Buku Induk Siswa</title>
  <style>
    :root {
      --primary-blue: #5b8cff;
      --secondary-blue: #3a6bdb;
      --light-blue: #e6f0ff;
      --dark-gray: #2d3748;
      --medium-gray: #4a5568;
      --light-gray: #edf2f7;
      --accent-color: #48bbff;
    }
    
    body {
      background: linear-gradient(var(--light-gray) 0%,rgb(58, 107, 209) 100%);
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
      min-height: 100vh;
      overflow-x: hidden;
    }
    
    /* Floating background elements */
    .bg-elements {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      overflow: hidden;
    }
    
    .bg-element {
      position: absolute;
      border-radius: 50%;
      background: rgba(0, 0, 0, 0.1);
      filter: blur(60px);
    }
    
    .bg-element:nth-child(1) {
      width: 300px;
      height: 300px;
      top: -100px;
      left: -100px;
      animation: float 15s infinite ease-in-out;
    }
    
    .bg-element:nth-child(2) {
      width: 400px;
      height: 400px;
      bottom: -150px;
      right: -100px;
      animation: float 18s infinite ease-in-out reverse;
    }
    
    .bg-element:nth-child(3) {
      width: 200px;
      height: 200px;
      top: 40%;
      left: 30%;
      animation: float 12s infinite ease-in-out;
    }
    
    .login-container {
      background-color: white;
      border-radius: 20px;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
      transform: translateY(0);
      border: 1px solid rgb(255, 255, 255);
      backdrop-filter: blur(10px);
      background-color: rgb(255, 254, 254);
    }
    
    .login-container:hover {
      box-shadow: 0 30px 60px -12px rgba(6, 152, 236, 0.15);
      transform: translateY(-8px);
    }
    
    .login-image {
      background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
      min-height: 400px;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }
    
    .login-image::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('/images/guru.jpg') center/cover no-repeat;
      opacity: 0.15;
    }
    
    .login-image-content {
      position: relative;
      z-index: 2;
      padding: 2rem;
      text-align: center;
      color: white;
    }
    
    .login-image-content h2 {
      font-weight: 700;
      margin-bottom: 1rem;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .login-image-content p {
      opacity: 0.9;
      max-width: 80%;
      margin: 0 auto;
    }
    
    .login-form {
      padding: 3rem;
    }
    
    .welcome-title {
      color: var(--dark-gray);
      font-weight: 700;
      margin-bottom: 0.5rem;
      position: relative;
      display: inline-block;
      font-size: 1.75rem;
    }
    
    .welcome-title::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 50px;
      height: 4px;
      background: linear-gradient(90deg, var(--primary-blue), var(--accent-color));
      border-radius: 4px;
    }
    
    .form-control {
      border: none;
      border-bottom: 2px solid #e2e8f0;
      border-radius: 0;
      padding-left: 0;
      padding-right: 0;
      transition: all 0.3s;
      background-color: transparent;
    }
    
    .form-control:focus {
      box-shadow: none;
      border-bottom-color: var(--primary-blue);
    }
    
    .form-floating label {
      color: var(--medium-gray);
      transition: all 0.3s;
      font-weight: 500;
    }
    
    .form-floating>.form-control:focus~label,
    .form-floating>.form-control:not(:placeholder-shown)~label {
      color: var(--primary-blue);
      transform: scale(0.85) translateY(-1.5rem) translateX(0.15rem);
    }
    
    .btn-login {
      background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
      border: none;
      border-radius: 50px;
      padding: 12px 0;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: all 0.3s;
      position: relative;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(91, 140, 255, 0.3);
    }
    
    .btn-login:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(91, 140, 255, 0.4);
    }
    
    .btn-login:active {
      transform: translateY(0);
    }
    
    .btn-login::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, var(--secondary-blue) 0%, var(--primary-blue) 100%);
      opacity: 0;
      transition: opacity 0.3s;
    }
    
    .btn-login:hover::after {
      opacity: 1;
    }
    
    .btn-login span {
      position: relative;
      z-index: 2;
    }
    
    .footer {
      background-color: var(--dark-gray);
      color: white;
      padding: 1.5rem 0;
      font-size: 0.9rem;
      margin-top: 3rem;
    }
    
    .social-icons a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      color: white;
      transition: all 0.3s;
      margin: 0 6px;
    }
    
    .social-icons a:hover {
      background-color: var(--primary-blue);
      transform: translateY(-3px) scale(1.1);
      box-shadow: 0 5px 15px rgba(91, 140, 255, 0.3);
    }
    
    /* Animations */
    @keyframes float {
      0%, 100% {
        transform: translateY(0) rotate(0deg);
      }
      50% {
        transform: translateY(-20px) rotate(5deg);
      }
    }
    
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .animate-fadeInUp {
      animation: fadeInUp 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.1) forwards;
    }
    
    .delay-1 { animation-delay: 0.2s; }
    .delay-2 { animation-delay: 0.4s; }
    .delay-3 { animation-delay: 0.6s; }
    
    /* Input focus effect */
    .input-highlight {
      position: relative;
    }
    
    .input-highlight::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background-color: var(--primary-blue);
      transition: width 0.3s ease;
    }
    
    .form-control:focus ~ .input-highlight::after {
      width: 100%;
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
      .login-image {
        min-height: 250px;
      }
      
      .login-form {
        padding: 2rem;
      }
    }
    
    @media (max-width: 768px) {
      .login-container {
        margin-top: 2rem;
        margin-bottom: 2rem;
      }
      
      .welcome-title {
        font-size: 1.5rem;
      }
    }
    
    /* Custom checkbox */
    .form-check-input {
      width: 1.2em;
      height: 1.2em;
      margin-top: 0.15em;
      border: 2px solid #cbd5e0;
    }
    
    .form-check-input:checked {
      background-color: var(--primary-blue);
      border-color: var(--primary-blue);
    }
    
    .form-check-label {
      color: var(--medium-gray);
      font-size: 0.9rem;
    }
    
    /* Alert animation */
    .alert {
      animation: slideDown 0.5s ease-out forwards;
      z-index: 1000;
    }
    
    @keyframes slideDown {
      from {
        transform: translateY(-100%);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }
  </style>
</head>
<body>
  <!-- Floating background elements -->
  <div class="bg-elements">
    <div class="bg-element"></div>
    <div class="bg-element"></div>
    <div class="bg-element"></div>
  </div>

  @if (session()->has('auth_error'))
    <div class="alert alert-danger alert-dismissible fade show position-absolute w-100" role="alert">
      <i class="fas fa-exclamation-circle me-2"></i>{{ session('auth_error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="container py-5">
    <div class="row justify-content-center align-items-center" style="min-height: 90vh;">
      <div class="col-lg-10">
        <div class="login-container animate__animated animate__fadeInUp">
          <div class="row g-0">
            <div class="col-lg-6 d-none d-lg-flex">
              <div class="login-image">
                <div class="login-image-content animate-fadeInUp delay-1">
                  <img src="" alt="" style="height: 100px; margin-bottom: 2rem; filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));">
                  <h2>Sistem Buku Induk Digital</h2>
                  <p>Manajemen data siswa yang modern dan terintegrasi untuk sekolah masa kini</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="login-form">
                <div class="text-center mb-5 animate-fadeInUp">
                  <img src="" alt="" style="height: 80px; margin-bottom: 1.5rem; transition: transform 0.3s;" class="hover-scale">
                  <h1 class="welcome-title animate-fadeInUp delay-1">Selamat Datang</h1>
                  <p class="text-muted animate-fadeInUp delay-1">Aplikasi Buku Induk Siswa Digital</p>
                </div>

                <form action="/" method="POST" class="animate-fadeInUp delay-2">
                  @csrf
                  <div class="form-floating mb-4 position-relative">
                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
                    <label for="floatingEmail"><i class="fas fa-envelope me-2"></i>Alamat Email</label>
                    <div class="input-highlight"></div>
                  </div>

                  <div class="form-floating mb-4 position-relative">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword"><i class="fas fa-lock me-2"></i>Kata Sandi</label>
                    <div class="input-highlight"></div>
                  </div>

                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">
                        Ingat saya
                      </label>
                    </div>
                    <a href="#" class="text-decoration-none" style="color: var(--primary-blue); font-size: 0.9rem;"></a>
                  </div>

                  <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-login btn-primary">
                      <span><i class="fas fa-sign-in-alt me-2"></i>Masuk</span>
                    </button>
                  </div>
                </form>

                <div class="text-center mt-4 animate-fadeInUp delay-3">
                  <p class="text-muted mb-0"><a href="#" class="text-decoration-none" style="color: var(--primary-blue); font-weight: 500;"></a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
        <div class="mb-3 mb-md-0">
          <span>© 2023 Buku Induk Siswa Digital. All rights reserved.</span>
        </div>
        <div class="social-icons">
          <a href="#" class="animate__animated animate__fadeIn animate__delay-1s"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="animate__animated animate__fadeIn animate__delay-2s"><i class="fab fa-twitter"></i></a>
          <a href="#" class="animate__animated animate__fadeIn animate__delay-3s"><i class="fab fa-instagram"></i></a>
          <a href="#" class="animate__animated animate__fadeIn animate__delay-4s"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Add hover scale effect to logo
      const logo = document.querySelector('.hover-scale');
      if (logo) {
        logo.addEventListener('mouseenter', () => {
          logo.style.transform = 'scale(1.1)';
        });
        logo.addEventListener('mouseleave', () => {
          logo.style.transform = 'scale(1)';
        });
      }
      
      // Add ripple effect to login button
      const loginBtn = document.querySelector('.btn-login');
      if (loginBtn) {
        loginBtn.addEventListener('click', function(e) {
          // Remove any existing ripples
          const existingRipples = document.querySelectorAll('.ripple');
          existingRipples.forEach(ripple => ripple.remove());
          
          // Create new ripple
          const ripple = document.createElement('span');
          ripple.classList.add('ripple');
          
          // Position the ripple
          const rect = this.getBoundingClientRect();
          const size = Math.max(rect.width, rect.height);
          const x = e.clientX - rect.left - size/2;
          const y = e.clientY - rect.top - size/2;
          
          ripple.style.width = ripple.style.height = `${size}px`;
          ripple.style.left = `${x}px`;
          ripple.style.top = `${y}px`;
          ripple.style.backgroundColor = 'rgba(255, 255, 255, 0.4)';
          
          this.appendChild(ripple);
          
          // Remove ripple after animation
          setTimeout(() => {
            ripple.remove();
          }, 1000);
        });
      }
      
      // Animate form elements on load
      const animatedElements = document.querySelectorAll('.animate-fadeInUp');
      animatedElements.forEach((element, index) => {
        element.style.opacity = '0';
        setTimeout(() => {
          element.style.animation = `fadeInUp 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.1) forwards ${index * 0.2}s`;
        }, 100);
      });
    });
  </script>
</body>
</html>