<?php
    $title = "FreshMart - Order Online, Skip the Line!";
    
    require_once 'includes/head.php';
?>
  <div id="navbar"></div>

  <main class="auth-container">
    <div class="auth-form">
      <div class="auth-header">
        <h2 id="auth-title">Welcome to FreshMart</h2>
        <p>Please enter your details to continue</p>
      </div>

      <form id="login-form" class="auth-form-content">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" placeholder="you@example.com" required />
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" placeholder="" required />
        </div>

        <div class="form-options">
          <div class="remember-me">
            <input type="checkbox" id="remember-me" />
            <label for="remember-me">Remember me</label>
          </div>
          <a href="#" class="forgot-password">Forgot password?</a>
        </div>

        <button type="submit" class="btn secondary">Sign In</button>

        <div class="divider"><span>Or continue with</span></div>

        <div class="social-login">
          <a href="#" class="social-btn google"><i class="fab fa-google"></i> Google</a>
          <a href="#" class="social-btn facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
        </div>
        <div class="auth-switch">
          Don't have an account?
          <button type="button" id="switch-to-signup">Sign up</button>
        </div>
      </form>
      <form id="signup-form" class="auth-form-content hidden">
        <div class="form-group">
          <label for="signup-email">Email</label>
          <input type="email" id="signup-email" placeholder="you@example.com" required />
        </div>

        <div class="form-group">
          <label for="signup-password">Password</label>
          <input type="password" id="signup-password" placeholder="" required />
        </div>

        <div class="form-group">
          <label for="confirm-password">Confirm Password</label>
          <input type="password" id="confirm-password" placeholder="" required />
        </div>

        <div class="form-group">
          <label for="phone">Phone (optional)</label>
          <input type="tel" id="phone" placeholder="+63 " />
        </div>

        <button type="submit" class="btn secondary">Create Account</button>

        <div class="divider"><span>Or sign up with</span></div>

        <div class="social-login">
          <a href="#" class="social-btn google"><i class="fab fa-google"></i> Google</a>
          <a href="#" class="social-btn facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
        </div>

        <div class="auth-switch">
          Already have an account?
          <button type="button" id="switch-to-login">Sign In</button>
        </div>
      </form>
    </div>
  </main>
  <script src="js/auth.js?<?php echo time()?>"></script>
  <?php include('includes/footer.php')?>