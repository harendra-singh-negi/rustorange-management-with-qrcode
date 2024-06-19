<?php
    use App\Http\Helpers\UserPermissionHelper;use App\Models\Membership;use App\Models\Package;
?>


<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/buy_plan.css')); ?>">
<?php $__env->stopSection(); ?>

<?php
    $userId = getRootUser()->id;
    $package = UserPermissionHelper::currentPackage($userId);
?>

<?php $__env->startSection('content'); ?>

    <?php if(is_null($package)): ?>

        <?php
            $pendingMemb = Membership::query()->where([
                ['user_id', '=', $userId],
                ['status',0]
            ])->whereYear('start_date', '<>', '9999')->orderBy('id', 'DESC')->first();
            $pendingPackage = isset($pendingMemb) ? Package::query()->findOrFail($pendingMemb->package_id):null;
        ?>

        <?php if($pendingPackage): ?>
            <div class="alert alert-warning">
                You have requested a package which needs an action (Approval / Rejection) by Admin. You will be notified
                via mail once an action is taken.
            </div>
            <div class="alert alert-warning">
                <strong>Pending Package: </strong> <?php echo e($pendingPackage->title); ?>

                <span class="badge badge-secondary"><?php echo e($pendingPackage->term); ?></span>
                <span class="badge badge-warning">Decision Pending</span>
            </div>
        <?php else: ?>
            <div class="alert alert-warning">
                Your membership is expired. Please purchase a new package / extend the current package.
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="row justify-content-center align-items-center mb-1">
            <div class="col-12">
                <div class="alert border-left border-primary text-dark">
                    <?php if($package_count >= 2): ?>
                        <?php if($next_membership->status == 0): ?>
                            <strong class="text-danger">You have requested a package which needs an action (Approval /
                                Rejection) by Admin. You will be notified via mail once an action is taken.</strong><br>
                        <?php elseif($next_membership->status == 1): ?>
                            <strong class="text-danger">You have another package to activate after the current package
                                expires. You cannot purchase / extend any package, until the next package is
                                activated</strong><br>
                        <?php endif; ?>
                    <?php endif; ?>

                    <strong>Current Package: </strong> <?php echo e($current_package->title); ?>

                    <span class="badge badge-secondary"><?php echo e($current_package->term); ?></span>
                    <?php if($current_membership->is_trial == 1): ?>
                        (Expire Date: <?php echo e(Carbon\Carbon::parse($current_membership->expire_date)->format('M-d-Y')); ?>)
                        <span class="badge badge-primary">Trial</span>
                    <?php else: ?>
                        (Expire Date: <?php echo e($current_package->term === 'lifetime' ? "Lifetime" : Carbon\Carbon::parse($current_membership->expire_date)->format('M-d-Y')); ?>)
                    <?php endif; ?>

                    <?php if($package_count >= 2): ?>
                        <div>
                            <strong>Next Package To Activate: </strong> <?php echo e($next_package->title); ?> <span
                                class="badge badge-secondary"><?php echo e($next_package->term); ?></span>
                            <?php if($current_package->term != 'lifetime' && $current_membership->is_trial != 1): ?>
                                (
                                Activation Date:
                                <?php echo e(Carbon\Carbon::parse($next_membership->start_date)->format('M-d-Y')); ?>,
                                Expire
                                Date: <?php echo e($next_package->term === 'lifetime' ?  "Lifetime" : Carbon\Carbon::parse($next_membership->expire_date)->format('M-d-Y')); ?>

                                )
                            <?php endif; ?>
                            <?php if($next_membership->status == 0): ?>
                                <span class="badge badge-warning">Decision Pending</span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mb-5 justify-content-center">
        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 pr-md-0 mb-5">
                <div
                    class="card-pricing2 <?php if(isset($current_package->id) && $current_package->id === $package->id): ?> card-success <?php else: ?> card-primary <?php endif; ?>">
                    <div class="pricing-header">
                        <h3 class="fw-bold d-inline-block">
                            <?php echo e($package->title); ?>

                        </h3>
                        <?php if(isset($current_package->id) && $current_package->id === $package->id): ?>
                            <h3 class="badge badge-danger d-inline-block float-right ml-2">Current</h3>
                        <?php endif; ?>
                        <?php if($package_count >= 2 && $next_package->id == $package->id): ?>
                            <?php if($next_membership->status == 1): ?>
                                <h3 class="badge badge-warning d-inline-block float-right ml-2">Next</h3>
                            <?php endif; ?>
                        <?php endif; ?>
                        <span class="sub-title"></span>
                    </div>
                    <div class="price-value">
                        <div class="value">
                            <span
                                class="amount"><?php echo e($package->price== 0 ? "Free" :format_price($package->price)); ?></span>
                            <span class="month">/<?php echo e($package->term); ?></span>
                        </div>
                    </div>
                    <ul class="pricing-content">
                        <li>
                            <?php echo e(__('Categories')); ?>

                            <?php echo e($package->categories_limit == 999999 ?  '('. __('Unlimited') .')' : ' (' . $package->categories_limit . ')'); ?>

                        </li>
                        <li>
                            <?php echo e(__('Subcategories')); ?>

                            <?php echo e($package->subcategories_limit == 999999 ?  '('. __('Unlimited') .')' : ' (' . $package->subcategories_limit . ')'); ?>

                        </li>
                        <li>
                            <?php echo e(__('Items')); ?>

                            <?php echo e($package->items_limit == 999999 ? '('. __('Unlimited') .')' : ' (' . $package->items_limit . ')'); ?>

                        </li>
                            <li>
                            <?php echo e(__('Languages')); ?>

                            <?php echo e($package->language_limit == 999999 ? '('. __('Unlimited') .')' : ' (' . $package->language_limit . ')'); ?>

                        </li>
                        <?php $__currentLoopData = json_decode($package->features); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                 <?php if($feature == 'Storage Limit'): ?>
                                  <?php if($package->storage_limit == 999999): ?>
                                   <?php echo e(__("$feature") .' ' .'('. __('Unlimited') .')'); ?> 
                                  <?php elseif($package->storage_limit == 0 || $package->storage_limit == 999999): ?>
                                    <?php echo e(__("$feature")); ?>

                                  <?php elseif($package->storage_limit < 1024): ?>
                                    <?php echo e(__("$feature") . ' ( ' . $package->storage_limit . 'MB )'); ?>

                                  <?php else: ?>
                                    <?php echo e(__("$feature") . ' ( ' . ceil($package->storage_limit / 1024) . 'GB )'); ?>

                                  <?php endif; ?>
                                <?php elseif($feature == 'Staffs'): ?>
                                  <?php echo e(__("$feature")); ?>

                                  <?php echo e($package->staff_limit == 999999 ?  '('. __('Unlimited') .')' : ' (' . $package->staff_limit . ')'); ?>

                                <?php elseif($feature == 'Table Reservation'): ?>
                                  <?php echo e(__("$feature").'s'); ?>

                                  <?php echo e($package->table_reservation_limit == 999999 ?  '('. __('Unlimited') .')' : ' (' . $package->table_reservation_limit . ')'); ?>

                                <?php elseif($feature == 'Online Order'): ?>
                                  <?php echo e(__("$feature")); ?>

                                
                                <?php elseif($feature == 'Live Orders'): ?>
                                  <?php echo e(__("Realtime Order Refresh & Notification")); ?>

                                 
                                <?php else: ?>
                                  <?php echo e(__("$feature")); ?>

                                <?php endif; ?>
                            </li>
                            <?php if($feature == 'Online Order'): ?>
                                 <li>
                                    <?php echo e(__("Orders")); ?>

                                     <?php echo e($package->order_limit == 999999 ? '('. __('Unlimited') .')': ' (' . $package->order_limit . ')'); ?>

                                   
                                 </li>
                            <?php endif; ?>  
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <?php
                        $hasPendingMemb = UserPermissionHelper::hasPendingMembership(Auth::id());
                    ?>
                    <?php if($package_count < 2 && !$hasPendingMemb): ?>
                        <div class="px-4">
                            <?php if(isset($current_package->id) && $current_package->id === $package->id): ?>
                                <?php if($package->term != 'lifetime' || $current_membership->is_trial == 1): ?>
                                    <a href="<?php echo e(route('user.plan.extend.checkout',$package->id)); ?>"
                                       class="btn btn-success btn-lg w-75 fw-bold mb-3"><?php echo e(__('Extend')); ?></a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo e(route('user.plan.extend.checkout',$package->id)); ?>"
                                   class="btn btn-primary btn-block btn-lg fw-bold mb-3"><?php echo e(__('Buy Now')); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/buy-plan/index.blade.php ENDPATH**/ ?>