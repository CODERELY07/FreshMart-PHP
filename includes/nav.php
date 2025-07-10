
<nav class="bg-white shadow-sm">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      <!-- Logo -->
      <div class="flex items-center">
        <i class="fas fa-shopping-basket text-green-600 text-2xl mr-2"></i>
        <span class="text-xl font-bold text-gray-900">FreshMart</span>
      </div>

      <!-- Navigation Links -->
      <div class="flex items-center space-x-4">
        <a href="?page=home" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium flex items-center">
          <i class="fas fa-home mr-2"></i> Home
        </a>
        <?php if(isset($_SESSION['user_id'])): ?>
          
            <a href="actions/logout.php" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-200">
                Logout
            </a>
        <?php else:?>
               <a href="?page=signin" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-200">
            Login
            </a>
        <?php endif?>
        </div>
      </div>
    </div>
  </div>
</nav>