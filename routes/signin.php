<?php
  
  require_once 'includes/head.php';
  if (isset($_SESSION['user_id'])) {
    header("Location: ?page=home"); 
    exit;
  }
  
  $title = "FreshMart - Order Online, Skip the Line!";

  $errors = $_SESSION['signin_errors'] ?? [];
  $old = $_SESSION['signin_old'] ?? [];
  unset($_SESSION['signin_errors'], $_SESSION['signin_old']);
?>
<script src="js/reload.js?<?php echo time()?>"></script>

<?php include('includes/nav.php'); ?>

<main class="min-h-screen bg-gray-50 flex items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
  <div class="w-full max-w-md space-y-8">
    <div class="text-center">
      <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Welcome to FreshMart</h2>
      <p class="mt-2 text-sm text-gray-600">Please enter your details to sign in</p>
    </div>

    <form class="mt-8 bg-white shadow-lg rounded-lg px-10 py-8" action="actions/signin.php" method="POST">
      <div class="space-y-5">
        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input type="email" id="email" name="email"
                 value="<?= htmlspecialchars($old['email'] ?? '') ?>"
                 class="w-full px-4 py-3 border <?= isset($errors['email']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg outline-none  transition"
                 placeholder="you@example.com">
          <?php if (isset($errors['email'])): ?>
            <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['email']) ?></p>
          <?php endif; ?>
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input type="password" id="password" name="password"
                 class="w-full px-4 py-3 border <?= isset($errors['password']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg outline-none   transition"
                 placeholder="••••••••">
          <?php if (isset($errors['password'])): ?>
            <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['password']) ?></p>
          <?php endif; ?>
        </div>

        <!-- Remember / Forgot -->
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember-me" name="remember-me" type="checkbox" 
                   class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
            <label for="remember-me" class="ml-2 block text-sm text-gray-700">Remember me</label>
          </div>
          <div class="text-sm">
            <a href="#" class="font-medium text-green-600 hover:text-green-500">Forgot password?</a>
          </div>
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full py-3 px-4 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
          Sign In
        </button>

        <!-- Divider -->
        <div class="relative mt-6">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-white text-gray-500">Or continue with</span>
          </div>
        </div>

        <!-- Google -->
        <div class="mt-6">
          <a href="google-login.php"
             class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/>
            </svg>
            Sign in with Google
          </a>
        </div>

        <!-- Signup -->
        <div class="mt-6 text-center text-sm">
          <p class="text-gray-600">
            Don’t have an account?
            <a href="?page=signup" class="font-medium text-green-600 hover:text-green-500 ml-1">Sign Up</a>
          </p>
        </div>
      </div>
    </form>
  </div>
</main>

<?php include('includes/footer.php'); ?>
