<?php
    
    require_once 'data.php';
    require_once 'includes/head.php';

    $title = "FreshMart - Order Online, Skip the Line!";
    $bg_class = "bg-gray-50";
    
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll();
?>
   <?php include('includes/nav.php')?>

    <main>
        <section class="products-page py-6">
            <div class="container mx-auto px-4 max-w-6xl">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Our Products</h1>
                    <p class="text-gray-600 text-sm">Fresh groceries delivered to your door</p>
                </div>
                
                <!--  Category Navigation -->
                <div class="category-nav mb-6 overflow-x-auto">
                    <div class="flex space-x-4 pb-1">
                        <?php 
                            foreach($categories as $key => $category):
                        ?>
                            <button class="category-tab <?= $key === 'all' ? 'active' : ''?> relative" data-category="<?= $key?>">
                                <?php if (!empty($category['icon'])): ?>
                                    <i class="<?= $category['icon'] ?> mr-1 text-xs"></i>
                                <?php endif; ?>
                                <?= $category['label']?>    
                            </button>
                        <?php endforeach?>
                    </div>
                </div>
                <!-- Compact Search and Filter -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
                    <div class="search-box relative w-full sm:w-64">
                        <input type="text" placeholder="Search products..." 
                            class="w-full pl-9 pr-3 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-200 text-sm">
                        <i class="fas fa-search absolute left-3 top-2.5 text-gray-400 text-sm"></i>
                    </div>
                    <div class="flex gap-2">
                        <select class="border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-200">
                            <option>Sort: Popular</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                        </select>
                        <button class="filter-btn bg-white border px-3 py-2 rounded-lg text-sm hover:bg-gray-50">
                            <i class="fas fa-sliders-h mr-1"></i>
                            Filters
                        </button>
                    </div>
                </div>
                <!-- Compact Product Grid -->

                <div class="product-grid grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">

                    <?php 
                        foreach($products as $product):
                    ?>
                        <div class="product-card bg-white rounded-lg overflow-hidden shadow-sm border border-gray-100" data-category="<?= htmlspecialchars($product['category'])?>">
                            <div class="product-image-container relative">
                                <img src="img/product/<?= $product['image']?>" 
                                    alt="Organic Spinach" class="w-full h-full object-cover">
                                <button class="quick-view-btn absolute bottom-2 left-1/2 transform -translate-x-1/2 bg-white text-primary px-2 py-1 rounded-full shadow-xs text-xs">
                                    Quick View
                                </button>
                                <?php if (!empty($product['badge'])): ?>
                                    <div class="product-badge bg-<?= htmlspecialchars($product['badge_color']) ?>-100 text-<?= htmlspecialchars($product['badge_color']) ?>-800 absolute top-2 left-2 rounded-full">
                                        <?= htmlspecialchars($product['badge']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="p-3">
                                <h3 class="font-semibold text-gray-800 text-sm mb-1 truncate"><?= $product['name']?></h3>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="font-bold text-gray-800 text-sm">₱<?= number_format($product['price'], 2) ?></span>
                                    <div class="flex items-center text-xs text-gray-500">
                                        <i class="fas fa-star text-yellow-400 mr-0.5"></i> <?= $product['rating'] ?>
                                    </div>
                                </div>
                                <button class="add-to-cart-btn w-full bg-primary hover:bg-primary-dark text-white rounded-md text-xs">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    <?php endforeach?>
                </div>

                <!-- Compact Pagination -->
                <div class="flex justify-center mt-8">
                    <nav class="flex items-center space-x-1">
                        <button class="px-3 py-1 rounded border text-sm hover:bg-gray-100">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </button>
                        <button class="px-3 py-1 rounded border bg-primary text-white text-sm">1</button>
                        <button class="px-3 py-1 rounded border text-sm hover:bg-gray-100">2</button>
                        <button class="px-3 py-1 rounded border text-sm hover:bg-gray-100">3</button>
                        <span class="px-1 text-sm">...</span>
                        <button class="px-3 py-1 rounded border text-sm hover:bg-gray-100">8</button>
                        <button class="px-3 py-1 rounded border text-sm hover:bg-gray-100">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </button>
                    </nav>
                </div>
            </div>
        </section>
    </main>
    <?php include('includes/footer.php');?>