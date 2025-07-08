<?php

    $title = "FreshMart - Order Online, Skip the Line!";
    require_once 'includes/head.php';
?>
<?php include('includes/nav.php')?>

<section class="bg-gray-50 py-12 md:py-20">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row items-center gap-12">
      <!-- Hero Content -->
      <div class="lg:w-1/2">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-4">
          Order online, <span class="text-green-600">skip the line!</span>
        </h1>
        <p class="text-lg text-gray-600 mb-8 max-w-lg">
          FreshMart brings fresh produce, pantry staples, and more right to your doorstep — all just a click away.
        </p>
        <div class="flex flex-col sm:flex-row gap-4">
          <a href="product.php" class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-md transition duration-200 text-center">
            Browse Products
          </a>
        </div>
      </div>

      <!-- Hero Image -->
      <div class="lg:w-1/2 relative mt-10 lg:mt-0">
        <div class="relative rounded-xl overflow-hidden shadow-xl">
          <img src="img/pic1.jpg" alt="Fresh groceries" class="w-full h-auto object-cover">
          
          <!-- Delivery Badge -->
          <div class="absolute -bottom-4 -right-4 bg-white rounded-lg shadow-lg p-4 flex items-center gap-3">
            <div class="bg-green-100 p-3 rounded-full">
              <i class="fas fa-bolt text-green-600"></i>
            </div>
            <div>
              <p class="font-bold text-gray-900">Fast Delivery</p>
              <p class="text-sm text-gray-600">30 min average</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-16 bg-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Features content will go here -->
  </div>
</section>

<script src="js/fetch.js?<?php echo time()?>"></script>
<script src="js/main.js?<?php echo time()?>"></script>
<div id="footer"></div>