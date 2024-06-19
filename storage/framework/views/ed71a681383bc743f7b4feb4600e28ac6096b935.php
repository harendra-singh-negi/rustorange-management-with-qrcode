<?php use App\Constants\Constant;use App\Http\Helpers\Uploader; ?>


<?php if(!empty($abe->language) && $abe->language->rtl == 1): ?>
    <?php $__env->startSection('styles'); ?>
        <style>
            form:not(.modal-form) input,
            form:not(.modal-form) textarea,
            form:not(.modal-form) select,
            select[name='language'] {
                direction: rtl;
            }

            form:not(.modal-form) .note-editor.note-frame .note-editing-area .note-editable {
                direction: rtl;
                text-align: right;
            }
        </style>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title">Text & Image</h4>
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
                <a href="#">Reservation Settings</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Text & Image</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card-title">Update Text & Image</div>
                        </div>
                        <div class="col-lg-2">
                              <?php if ($__env->exists('user.partials.languages')) echo $__env->make('user.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-5 pb-4">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">

                            <form id="ajaxForm" action="<?php echo e(route('user.table.section.update', $lang_id)); ?>" method="post"
                                  enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="mb-2">
                                                <label for="image"><strong> Background Image </strong></label>
                                            </div>
                                            <div class="showImage mb-3">
                                                <?php if(!empty($abe->table_section_img)): ?>
                                                    <a class="remove-image" data-type="table_background"><i
                                                            class="far fa-times-circle"></i></a>
                                                <?php endif; ?>
                                                
                                                <?php if($abe->table_section_img): ?>
                                                
                                                <img
                                                    src="<?php echo e(Uploader::getImageUrl(Constant::WEBSITE_IMAGE,$abe->table_section_img,$userBs)); ?>"
                                                    alt="..." class="img-thumbnail" width="200">
                                                <?php else: ?>
                                                
                                                <img
                                                    src="<?php echo e(asset('assets/admin/img/noimage.jpg')); ?>"
                                                    alt="..." class="img-thumbnail" width="200">
                                                <?php endif; ?>
                                            </div>
                                            <input type="file" name="table_section_img" id="image"
                                                   class="form-control image">
                                            <p id="errtable_section_img" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>
                               
                            </form>

                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="form">
                        <div class="form-group from-show-notify row">
                            <div class="col-12 text-center">
                                <button type="submit" id="submitBtn" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    let routeUrl = "<?php echo e(route('user.table.section.rmv.img')); ?>";
    let currentUrl = "<?php echo e(url()->current()); ?>";
    let langCode = "<?php echo e($abs->language->code); ?>";
</script>
<script src="<?php echo e(asset('assets/tenant/js/blade.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/home/tablesection.blade.php ENDPATH**/ ?>