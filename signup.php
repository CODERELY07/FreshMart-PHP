<?php

require_once 'includes/head.php';
$title = "FreshMart - Order Online, Skip the Line!";
$errors = $_SESSION['signup_errors'] ?? [];
$old = $_SESSION['signup_old'] ?? [];
unset($_SESSION['signup_errors'], $_SESSION['signup_old']);
?>

<?php include('includes/nav.php') ?>

<main class="min-h-screen bg-gray-50 flex items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
  <div class="w-full max-w-md space-y-8">
    <div class="text-center">
      <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Welcome to FreshMart</h2>
      <p class="mt-2 text-sm text-gray-600">Create your account to start shopping</p>
    </div>

    <form class="mt-8 bg-white shadow-lg rounded-lg px-10 py-8" action="actions/signup.php" method="POST">
      <div class="rounded-md shadow-sm space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
            <input id="first_name" name="first_name" type="text"
                   value="<?= htmlspecialchars($old['first_name'] ?? '') ?>"
                   class="appearance-none relative block w-full px-3 py-3 border <?= isset($errors['first_name']) ? 'border-red-500' : 'border-gray-300' ?> placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none sm:text-sm"
                   placeholder="John">
            <?php if (isset($errors['first_name'])): ?>
              <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['first_name']) ?></p>
            <?php endif; ?>
          </div>

          <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
            <input id="last_name" name="last_name" type="text"
                   value="<?= htmlspecialchars($old['last_name'] ?? '') ?>"
                   class="appearance-none relative block w-full px-3 py-3 border <?= isset($errors['last_name']) ? 'border-red-500' : 'border-gray-300' ?> placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none sm:text-sm"
                   placeholder="Doe">
            <?php if (isset($errors['last_name'])): ?>
              <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['last_name']) ?></p>
            <?php endif; ?>
          </div>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
          <input id="email" name="email" type="email" autocomplete="email"
                 value="<?= htmlspecialchars($old['email'] ?? '') ?>"
                 class="appearance-none relative block w-full px-3 py-3 border <?= isset($errors['email']) ? 'border-red-500' : 'border-gray-300' ?> placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none sm:text-sm"
                 placeholder="you@example.com">
          <?php if (isset($errors['email'])): ?>
            <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['email']) ?></p>
          <?php endif; ?>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input id="password" name="password" type="password" autocomplete="new-password"
                 class="appearance-none relative block w-full px-3 py-3 border <?= isset($errors['password']) ? 'border-red-500' : 'border-gray-300' ?> placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none sm:text-sm"
                 placeholder="••••••••">
          <?php if (isset($errors['password'])): ?>
            <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['password']) ?></p>
          <?php endif; ?>
        </div>

        <div>
          <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
          <input id="confirm_password" name="confirm_password" type="password" autocomplete="new-password"
                 class="appearance-none relative block w-full px-3 py-3 border <?= isset($errors['confirm_password']) ? 'border-red-500' : 'border-gray-300' ?> placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none sm:text-sm"
                 placeholder="••••••••">
          <?php if (isset($errors['confirm_password'])): ?>
            <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['confirm_password']) ?></p>
          <?php endif; ?>
        </div>

        <div>
          <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone (optional)</label>
          <input id="phone" name="phone" type="tel"
                 value="<?= htmlspecialchars($old['phone'] ?? '') ?>"
                 class="appearance-none relative block w-full px-3 py-3 border <?= isset($errors['phone']) ? 'border-red-500' : 'border-gray-300' ?> placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none sm:text-sm"
                 placeholder="+63 912 345 6789">
          <?php if (isset($errors['phone'])): ?>
            <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['phone']) ?></p>
          <?php endif; ?>
        </div>
      </div>

      <div class="mt-6">
        <button type="submit"
          class="w-full py-3 px-4 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-md transition duration-200 focus:outline-none focus:ring-offset-2">
          Create Account
        </button>
      </div>

      <div class="relative mt-6">
        <div class="absolute inset-0 flex items-center">
          <div class="w-full border-t border-gray-300"></div>
        </div>
        <div class="relative flex justify-center text-sm">
          <span class="px-2 bg-white text-gray-500">Or continue with</span>
        </div>
      </div>

      <div class="mt-6">
        <a href="google-login.php"
           class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
          <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/>
          </svg>
          Sign up with Google
        </a>
      </div>

      <div class="mt-6 text-center text-sm">
        <p class="text-gray-600">
          Already have an account?
          <a href="signin.php" class="font-medium text-green-600 hover:text-green-500 ml-1">
            Sign in
          </a>
        </p>
      </div>
    </form>
  </div>
</main>

<?php include('includes/footer.php') ?>
