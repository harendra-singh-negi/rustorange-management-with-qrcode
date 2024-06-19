<?php use App\Constants\Constant; ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Popup Type')); ?></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?php echo e(route('user.dashboard')); ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?php echo e(__('Announcement Popups')); ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?php echo e(__('Popup Type')); ?></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-title d-inline-block"><?php echo e(__('Select Popup Type')); ?></div>
                        </div>

                        <div class="col-lg-4 mt-2 mt-lg-0">
                            <a class="btn btn-info btn-sm float-right d-inline-block"
                               href="<?php echo e(route('user.announcement_popups', ['language' => $defaultLang->code])); ?>">
                <span class="btn-label">
                  <i class="fas fa-backward"></i>
                </span>
                                <?php echo e(__('Back')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popup-type">
        <div class="row">
            <div class="col-lg-3">
                <a href="<?php echo e(route('user.announcement_popups.create_popup', ['type' => 1])); ?>" class="d-block">
                    <div class="card card-stats">
                        <div class="card-body">
                            <img src="<?php echo e(asset(Constant::WEBSITE_ANNOUNCEMENT_POPUP_SAMPLE_IMAGE.'/'.'1.jpg')); ?>"
                                 alt="popup image" width="100%">
                            <h5 class="text-center text-white mt-3 mb-0"><?php echo e(__('Type - 1')); ?></h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3">
                <a href="<?php echo e(route('user.announcement_popups.create_popup', ['type' => 2])); ?>" class="d-block">
                    <div class="card card-stats">
                        <div class="card-body">
                            <img src="<?php echo e(asset(Constant::WEBSITE_ANNOUNCEMENT_POPUP_SAMPLE_IMAGE.'/'.'2.jpg')); ?>"
                                 alt="popup image" width="100%">
                            <h5 class="text-center text-white mt-3 mb-0"><?php echo e(__('Type - 2')); ?></h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3">
                <a href="<?php echo e(route('user.announcement_popups.create_popup', ['type' => 3])); ?>" class="d-block">
                    <div class="card card-stats">
                        <div class="card-body">
                            <img src="<?php echo e(asset(Constant::WEBSITE_ANNOUNCEMENT_POPUP_SAMPLE_IMAGE.'/'.'3.jpg')); ?>"
                                 alt="popup image" width="100%">
                            <h5 class="text-center text-white mt-3 mb-0"><?php echo e(__('Type - 3')); ?></h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3">
                <a href="<?php echo e(route('user.announcement_popups.create_popup', ['type' => 4])); ?>" class="d-block">
                    <div class="card card-stats">
                        <div class="card-body">
                            <img src="<?php echo e(asset(Constant::WEBSITE_ANNOUNCEMENT_POPUP_SAMPLE_IMAGE.'/'.'4.jpg')); ?>"
                                 alt="popup image" width="100%">
                            <h5 class="text-center text-white mt-3 mb-0"><?php echo e(__('Type - 4')); ?></h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3">
                <a href="<?php echo e(route('user.announcement_popups.create_popup', ['type' => 5])); ?>" class="d-block">
                    <div class="card card-stats">
                        <div class="card-body">
                            <img src="<?php echo e(asset(Constant::WEBSITE_ANNOUNCEMENT_POPUP_SAMPLE_IMAGE.'/'.'5.jpg')); ?>"
                                 alt="popup image" width="100%">
                            <h5 class="text-center text-white mt-3 mb-0"><?php echo e(__('Type - 5')); ?></h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3">
                <a href="<?php echo e(route('user.announcement_popups.create_popup', ['type' => 6])); ?>" class="d-block">
                    <div class="card card-stats">
                        <div class="card-body">
                            <img src="<?php echo e(asset(Constant::WEBSITE_ANNOUNCEMENT_POPUP_SAMPLE_IMAGE.'/'.'6.jpg')); ?>"
                                 alt="popup image" width="100%">
                            <h5 class="text-center text-white mt-3 mb-0"><?php echo e(__('Type - 6')); ?></h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3">
                <a href="<?php echo e(route('user.announcement_popups.create_popup', ['type' => 7])); ?>" class="d-block">
                    <div class="card card-stats">
                        <div class="card-body">
                            <img src="<?php echo e(asset(Constant::WEBSITE_ANNOUNCEMENT_POPUP_SAMPLE_IMAGE.'/'.'7.jpg')); ?>"
                                 alt="popup image" width="100%">
                            <h5 class="text-center text-white mt-3 mb-0"><?php echo e(__('Type - 7')); ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/popup/popup-type.blade.php ENDPATH**/ ?>