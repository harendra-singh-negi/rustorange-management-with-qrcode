  <?php
    use App\Constants\Constant;
    use App\Http\Helpers\Uploader;
  ?>
  <section class="page-title-area d-flex align-items-center"
    style="background-image: url('<?php echo e($userBs->breadcrumb ? Uploader::getImageUrl(Constant::WEBSITE_BREADCRUMB, $userBs->breadcrumb, $userBs) : asset('assets/restaurant/images/breadcrum.jpg')); ?>');background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="page-title-item text-center">
            <h2 class="title"><?php echo e($keywords[$title] ?? __( $title )); ?></h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('user.front.index', getParam())); ?>"><i
                      class="flaticon-home"></i><?php echo e($keywords['Home'] ?? __('Home')); ?></a>
                </li>
                <?php if($title): ?>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($keywords[$title] ?? __($title)); ?>

                </li>
                <?php endif; ?>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user-front/breadcrum.blade.php ENDPATH**/ ?>