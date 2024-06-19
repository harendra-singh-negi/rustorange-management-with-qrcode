<?php
    use App\Constants\Constant;
    use App\Http\Helpers\Uploader;
?>


<?php if ($__env->exists('user.partials.rtl-style')) echo $__env->make('user.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Announcement Popups')); ?></h4>
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
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title d-inline-block"><?php echo e(__('Popups')); ?></div>
                        </div>

                        <div class="col-lg-3">
                            <?php if ($__env->exists('user.partials.languages')) echo $__env->make('user.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <a href="<?php echo e(route('user.announcement_popups.select_popup_type')); ?>"
                                class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i>
                                <?php echo e(__('Add Popup')); ?></a>

                            <button class="btn btn-danger btn-sm float-right mr-2 d-none bulk-delete"
                                data-href="<?php echo e(route('user.announcement_popups.bulk_delete_popup')); ?>">
                                <i class="flaticon-interface-5"></i> <?php echo e(__('Delete')); ?>

                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-12">

                            <?php if($user_popups->count() == 0): ?>
                                <h3 class="text-center mt-3"><?php echo e(__('NO POPUP FOUND') . '!'); ?></h3>
                            <?php else: ?>
                                <div class="alert alert-warning text-center" role="alert">
                                    <strong
                                        class="text-dark"><?php echo e(__('All activated popups will be appear in UI according to serial number.')); ?></strong>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <input type="checkbox" class="bulk-check" data-val="all">
                                                </th>
                                                <th scope="col"><?php echo e(__('Image')); ?></th>
                                                <th scope="col"><?php echo e(__('Name')); ?></th>
                                                <th scope="col"><?php echo e(__('Type')); ?></th>
                                                <th scope="col"><?php echo e(__('Status')); ?></th>
                                                <th scope="col"><?php echo e(__('Serial Number')); ?></th>
                                                <th scope="col"><?php echo e(__('Actions')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $user_popups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="bulk-check"
                                                            data-val="<?php echo e($popup->id); ?>">
                                                    </td>
                                                    <td>
                                                        <img src="<?php echo e(Uploader::getImageUrl(Constant::WEBSITE_ANNOUNCEMENT_POPUP_IMAGE, $popup->image, $userBs)); ?>"
                                                            alt="popup image" width="80">
                                                    </td>
                                                    <td><?php echo e(convertUtf8($popup->name)); ?></td>
                                                    <td>
                                                        <img src="<?php echo e(Uploader::getImageUrl(Constant::WEBSITE_ANNOUNCEMENT_POPUP_SAMPLE_IMAGE, $popup->type . '.jpg', $userBs)); ?>"
                                                            alt="popup type image" class="pt-4" width="55">
                                                        <p class="mt-1 text-muted"><?php echo e(__('Type') . ' - ' . $popup->type); ?>

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <form id="statusForm-<?php echo e($popup->id); ?>" class="d-inline-block"
                                                            action="<?php echo e(route('user.announcement_popups.update_popup_status', ['id' => $popup->id])); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <select
                                                                class="form-control form-control-sm <?php echo e($popup->status == 1 ? 'bg-success' : 'bg-danger'); ?>"
                                                                name="status"
                                                                onchange="document.getElementById('statusForm-<?php echo e($popup->id); ?>').submit()">
                                                                <option value="1"
                                                                    <?php echo e($popup->status == 1 ? 'selected' : ''); ?>>
                                                                    <?php echo e(__('Active')); ?>

                                                                </option>
                                                                <option value="0"
                                                                    <?php echo e($popup->status == 0 ? 'selected' : ''); ?>>
                                                                    <?php echo e(__('Deactive')); ?>

                                                                </option>
                                                            </select>
                                                        </form>
                                                    </td>
                                                    <td><?php echo e($popup->serial_number); ?></td>
                                                    <td>
                                                        <a class="btn btn-secondary my-2 btn-sm mr-1"
                                                            href="<?php echo e(route('user.announcement_popups.edit_popup', ['id' => $popup->id])); ?>">
                                                            <span class="btn-label">
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                        </a>

                                                        <form class="deleteform d-inline-block"
                                                            action="<?php echo e(route('user.announcement_popups.delete_popup', ['id' => $popup->id])); ?>"
                                                            method="post">

                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                                                <span class="btn-label">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/popup/index.blade.php ENDPATH**/ ?>