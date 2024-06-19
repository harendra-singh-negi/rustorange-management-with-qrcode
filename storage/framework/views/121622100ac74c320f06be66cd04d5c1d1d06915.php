<?php
    use App\Constants\Constant;
    use App\Http\Helpers\Uploader;
    use App\Models\User\Product;
    use App\Models\User\ProductReview;
?>

<?php $__env->startSection('pageHeading'); ?>
    <?php echo e($keywords['Items'] ?? __('Items')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta-keywords', !empty($userSeo) ? $userSeo->product_meta_keywords : ''); ?>
<?php $__env->startSection('meta-description', !empty($userSeo) ? $userSeo->product_meta_description : ''); ?>
<?php $__env->startSection('content'); ?>
   
    <?php echo $__env->make('user-front.breadcrum', ['title' => $upageHeading?->items_page_title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
    <div class="shop-bar-area pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop-search mt-30">
                        <input type="text" placeholder="<?php echo e($keywords['Search Keywords'] ?? __('Search Keywords')); ?>"
                            class="input-search" name="search" value="<?php echo e(request()->input('search')); ?>">
                        <i class="fas fa-search input-search-btn cursor-pointer"></i>
                    </div>
                </div>

                <div class="col-lg-7"></div>

                <div class="col-lg-2">
                    <div class="shop-dropdown mt-30 float-right">
                        <select name="type" id="type_sort" class="form-control">
                            <option value="new" <?php echo e(request()->input('type') == 'new' ? 'selected' : ''); ?>>
                                <?php echo e($keywords['Newest Product'] ?? __('Newest Product')); ?></option>
                            <option value="old" <?php echo e(request()->input('type') == 'old' ? 'selected' : ''); ?>>
                                <?php echo e($keywords['Oldest Product'] ?? __('Oldest Product')); ?></option>
                            <option value="high-to-low" <?php echo e(request()->input('type') == 'high-to-low' ? 'selected' : ''); ?>>
                                <?php echo e($keywords['Price: High To Low'] ?? __('Price: High To Low')); ?></option>
                            <option value="low-to-high" <?php echo e(request()->input('type') == 'low-to-high' ? 'selected' : ''); ?>>
                                <?php echo e($keywords['Price: Low To High'] ?? __('Price: Low To High')); ?></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="pricing-area pt-20 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        <div class="shop-box shop-category">
                            <div class="sidebar-title">
                                <h4 class="title"><?php echo e($keywords['Category'] ?? __('Category')); ?></h4>
                            </div>

                            <div class="category-item">
                                <ul>
                                    <li class="<?php echo e(request()->input('category_id') == '' ? 'active-search' : ''); ?>"><a
                                            href="<?php echo e(route('user.front.items', getParam())); ?>"
                                            class="cursor-pointer"><?php echo e($keywords['ALL'] ?? __('All')); ?></a>
                                    </li>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            if (request()->filled('subcategory_id')) {
                                                $f_s_category = $category
                                                    ->subcategory()
                                                    ->where('id', request()->input('subcategory_id'))->where('language_id',$userCurrentLang->id)
                                                    ->select('category_id')
                                                    ->first();
                                                if ($f_s_category) {
                                                    $selected_category_id = $f_s_category->category_id;
                                                } else {
                                                    $selected_category_id = null;
                                                }
                                            } else {
                                                $selected_category_id = null;
                                            }

                                        ?>
                                        <li data-toggle="collapse" data-target="#collapse<?php echo e($category->id); ?>"
                                            class="<?php echo e(request()->input('category_id') == $category->id ? 'active-search' : ''); ?>"
                                            <?php echo e(request()->input('category_id') == $category->id ? "aria-expanded='true'" : ''); ?>

                                            <?php echo e(request()->input('subcategory_id') == $selected_category_id ? "aria-expanded='true'" : ''); ?>>
                                            <a href="<?php echo e(route('user.front.items', [getParam(), 'category_id' => $category->id])); ?>"
                                                class="cursor-pointer"><?php echo e(convertUtf8($category->name)); ?></a>

                                        </li>

                                        <?php if($category->subcategories && request()->input('category_id') && request()->input('category_id') == $category->id): ?>
                                            <ul class="subitem">
                                                <?php $__currentLoopData = $category->subcategories()->where('language_id',$userCurrentLang->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($sub->status == 1): ?>
                                                        <li
                                                            class="<?php echo e(request()->input('subcategory_id') == $sub->id ? 'active-search' : ''); ?>">
                                                            <div id="collapse<?php echo e($sub->category_id); ?>"
                                                                class="collapse <?php echo e(request()->input('subcategory_id') == $sub->id ? 'show' : ''); ?> <?php echo e(request()->input('category_id') == $sub->category_id ? 'show' : ''); ?>">
                                                                <a href="<?php echo e(route('user.front.items', [getParam(), 'category_id' => $category->id, 'subcategory_id' => $sub->id])); ?>"
                                                                    class="cursor-pointer">
                                                                    <?php echo e($sub->name); ?>

                                                                </a>
                                                            </div>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                         <?php if(in_array('Online Order', $packagePermissions)): ?>
                        <div class="shop-box shop-filter mt-30">
                            <div class="sidebar-title">
                                <h4 class="title"><?php echo e($keywords['Filter Products'] ?? __('Filter Products')); ?></h4>
                            </div>
                            <div class="filter-item">
                                <ul class="checkbox_common checkbox_style2">
                                    <li>
                                        <input type="radio" class="review_val" name="review_value"
                                            <?php echo e(request()->input('review') == '' ? 'checked' : ''); ?> id="checkbox4"
                                            value="">
                                        <label for="checkbox4"><span></span>
                                            <?php echo e($keywords['Show_All'] ?? __('Show All')); ?></label>
                                    </li>

                                    <li>

                                        <input type="radio" class="review_val" name="review_value" id="checkbox5"
                                            value="4" <?php echo e(request()->input('review') == 4 ? 'checked' : ''); ?>

                                            id="checkbox4" value="all">
                                        <label for="checkbox5"><span></span>4
                                            <?php echo e($keywords['Star and higher'] ?? __('Star and higher')); ?></label>
                                    </li>

                                    <li>
                                        <input type="radio" class="review_val" name="review_value" id="checkbox6"
                                            value="3" <?php echo e(request()->input('review') == 3 ? 'checked' : ''); ?>

                                            id="checkbox4" value="all">
                                        <label for="checkbox6"><span></span>3
                                            <?php echo e($keywords['Star and higher'] ?? __('Star and higher')); ?></label>
                                    </li>

                                    <li>
                                        <input type="radio" class="review_val" name="review_value" id="checkbox7"
                                            value="2" <?php echo e(request()->input('review') == 2 ? 'checked' : ''); ?>

                                            id="checkbox4" value="all">
                                        <label for="checkbox7"><span></span>2
                                            <?php echo e($keywords['Star and higher'] ?? __('Star and higher')); ?></label>
                                    </li>

                                    <li>
                                        <input type="radio" class="review_val" name="review_value" id="checkbox8"
                                            value="1" <?php echo e(request()->input('review') == 1 ? 'checked' : ''); ?>

                                            id="checkbox4" value="all">
                                        <label for="checkbox8"><span></span>1
                                            <?php echo e($keywords['Star and higher'] ?? __('Star and higher')); ?></label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="shop-box shop-price mt-30">
                            <div class="sidebar-title">
                                <h4 class="title"><?php echo e($keywords['Star and higher'] ?? __('Filter By Price')); ?></h4>
                            </div>
                            <div class="price-item">
                                <div class="price-range-box ">
                                    <form action="#">
                                        <div id="slider-range"></div>
                                        <span><?php echo e($keywords['Price'] ?? __('Price') . ':'); ?> </span>
                                        <input type="text" name="text" id="amount">
                                        <button class="btn filter-button"
                                            type="button"><?php echo e($keywords['Filter'] ?? __('Filter')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row justify-content-start">
                        <?php if($products->count() > 0): ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="col-lg-4 col-md-7 col-sm-8">
                                    <div class="single-pricing text-center mt-30">
                                        <?php if($product->is_special == 1): ?>
                                            <div class="flag">
                                                <span><?php echo e($keywords['Special'] ?? __('Special')); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <a class="pricing-thumb"
                                            href="<?php echo e(route('user.front.product.details', [getParam(), $product->slug, $product->product_id])); ?>">
                                            <img class="lazy wow fadeIn"
                                                data-src="<?php echo e(Uploader::getImageUrl(Constant::WEBSITE_PRODUCT_FEATURED_IMAGE, $product->feature_image, $userBs)); ?>"
                                                alt="" data-wow-delay=".5s">
                                        </a>
                                        <a href="<?php echo e(route('user.front.product.details', [getParam(), $product->slug, $product->product_id])); ?>"><span><?php echo e(strlen($product->title) > 27 ? mb_substr($product->title, 0, 27, 'UTF-8') . '...' : $product->title); ?></span></a>

                                        <p class="lc-2">
                                            <?php echo e($product->summary); ?>

                                        </p>

                                        <?php if(in_array('Online Order', $packagePermissions)): ?>
                                        <div class="rate mx-auto">
                                            <div class="rating"
                                                style="width:<?php echo e(!empty($product->product_reviews)? ProductReview::where('user_id', $user->id)->where('product_id', $product->product_id)->avg('review') * 20: 0); ?>%">
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <h3 class="title">
                                            <?php echo e($userBe->base_currency_symbol_position == 'left' ? $userBe->base_currency_symbol : ''); ?><?php echo e(convertUtf8($product->current_price)); ?><?php echo e($userBe->base_currency_symbol_position == 'right' ? $userBe->base_currency_symbol : ''); ?>

                                            <?php if(convertUtf8($product->previous_price)): ?>
                                                <small>
                                                    <del><?php echo e($userBe->base_currency_symbol_position == 'left' ? $userBe->base_currency_symbol : ''); ?>

                                                        <?php echo e(convertUtf8($product->previous_price)); ?>

                                                        <?php echo e($userBe->base_currency_symbol_position == 'right' ? $userBe->base_currency_symbol : ''); ?></del>
                                                </small>
                                            <?php endif; ?>
                                        </h3>
                                        
                                        <?php if(in_array('Online Order', $packagePermissions)): ?>
                                            <a class="main-btn cart-link" data-product="<?php echo e($product); ?>"
                                                data-href="<?php echo e(route('user.front.add.cart', [getParam(), $product->product_id])); ?>"><?php echo e($keywords['Add to Cart'] ?? __('Add To Cart')); ?>

                                            </a>
                                        <?php else: ?>
                                            <?php if(!empty(json_decode($product->addons, true)) || !empty(json_decode($product->variations, true))): ?>
                                                <a class="main-btn cart-link" data-product="<?php echo e($product); ?>"
                                                    data-href="<?php echo e(route('user.front.add.cart', [getParam(), $product->product_id])); ?>"><?php echo e($keywords['Extras'] ?? __('Extras')); ?>

                                                </a>
                                            <?php else: ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="col-lg-12">
                                <div class="bg-light py-5 mt-4">
                                    <h4 class="text-center">
                                        <?php echo e($keywords['Product Not Found'] ?? __('Product Not Found')); ?></h4>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo e($products->appends(['minprice' => request()->input('minprice'), 'maxprice' => request()->input('maxprice'), 'category_id' => request()->input('category_id'), 'type' => request()->input('type'), 'tag' => request()->input('tag'), 'review' => request()->input('review')])->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        $maxprice = Product::query()
            ->where('user_id', $user->id)
            ->max('current_price');
        $minprice = 0;
    ?>
    <form id="searchForm" class="d-none" action="<?php echo e(route('user.front.items', getParam())); ?>" method="get">
        <input type="hidden" id="search" name="search"
            value="<?php echo e(!empty(request()->input('search')) ? request()->input('search') : ''); ?>">
        <input type="hidden" id="minprice" name="minprice"
            value="<?php echo e(!empty(request()->input('minprice')) ? request()->input('minprice') : $minprice); ?>">
        <input type="hidden" id="maxprice" name="maxprice"
            value="<?php echo e(!empty(request()->input('maxprice')) ? request()->input('maxprice') : $maxprice); ?>">
        <input type="hidden" name="category_id" id="category_id"
            value="<?php echo e(!empty(request()->input('category_id')) ? request()->input('category_id') : null); ?>">

        <input type="hidden" name="subcategory_id" id="subcategory_id"
            value="<?php echo e(!empty(request()->input('subcategory_id')) ? request()->input('subcategory_id') : null); ?>">

        <input type="hidden" name="type" id="type"
            value="<?php echo e(!empty(request()->input('type')) ? request()->input('type') : 'new'); ?>">

        <input type="hidden" name="review" id="review"
            value="<?php echo e(!empty(request()->input('review')) ? request()->input('review') : ''); ?>">
        <button id="search-button" type="submit"></button>
    </form>

    <?php if ($__env->exists('user-front.partials.variation-modal')) echo $__env->make('user-front.partials.variation-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script>
        "use strict";
        const sliderMinPrice = '<?php echo e(!empty(request()->input('minprice')) ? request()->input('minprice') : $minprice); ?>';
        const sliderMaxPrice = '<?php echo e(!empty(request()->input('maxprice')) ? request()->input('maxprice') : $maxprice); ?>';
        const sliderInitMax = '<?php echo e($maxprice); ?>';
    </script>
    <script src="<?php echo e(asset('assets/front/js/items.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user-front/product/items.blade.php ENDPATH**/ ?>