<?php
  $title = "Verify Your Email - FreshMart";
  require_once 'includes/head.php';
?>
<?php include('includes/nav.php') ?>

<section class="bg-gray-50 py-16">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-lg p-10 text-center">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Check Your Email</h1>
      <p class="text-gray-600 text-lg mb-6">
        We've sent a verification link to your email address. <br>
        Please open your inbox and click the link to verify your account.
      </p>
      <div class="mt-6">
        <a href="?page=signin" class="inline-block px-6 py-3 text-white bg-green-600 hover:bg-green-700 rounded-lg shadow transition duration-200">
          Go to Login
        </a>
      </div>
    </div>
  </div>
</section>

<script src="js/fetch.js?<?php echo time()?>"></script>
<script src="js/main.js?<?php echo time()?>"></script>
<div id="footer"></div>
