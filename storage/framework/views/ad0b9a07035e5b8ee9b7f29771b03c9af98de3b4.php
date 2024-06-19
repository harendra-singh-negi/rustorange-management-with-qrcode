<?php
    use App\Constants\Constant;
    use App\Http\Helpers\Uploader;
    use App\Models\User\Language;
    use Illuminate\Support\Facades\Auth;
?>



<?php
    $setLang = Language::where([['code', request()->input('language')], ['user_id', Auth::guard('web')->user()->id]])->first();
?>
<?php if(!empty($setLang) && $setLang->rtl == 1): ?>
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
        <h4 class="page-title">Item Categories</h4>
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
                <a href="#">Items Management</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Category</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title d-inline-block">Categories</div>
                        </div>
                        <div class="col-lg-3">
                            <?php if(!empty($userLangs)): ?>
                                <select name="language" class="form-control"
                                    onchange="window.location='<?php echo e(url()->current() . '?language='); ?>'+this.value">
                                    <option value="" selected disabled>Select a Language</option>
                                    <?php $__currentLoopData = $userLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang->code); ?>"
                                            <?php echo e($lang->code == request()->input('language') ? 'selected' : ''); ?>>
                                            <?php echo e($lang->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                                data-target="#createModal"><i class="fas fa-plus"></i> Add Category</a>
                            <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete"
                                data-href="<?php echo e(route('user.pcategory.bulk.delete')); ?>"><i class="flaticon-interface-5"></i>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(count($pcategories) == 0): ?>
                                <h3 class="text-center">NO PRODUCT CATEGORY FOUND</h3>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <input type="checkbox" class="bulk-check" data-val="all">
                                                </th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Featured</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $pcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="bulk-check"
                                                            data-val="<?php echo e($category->indx); ?>">
                                                    </td>

                                                    <td><?php echo e(convertUtf8($category->name)); ?></td>
                                                    <td><img src="<?php echo e(Uploader::getImageUrl(Constant::WEBSITE_PRODUCT_CATEGORY_IMAGE, $category->image, $userBs)); ?>"
                                                            width="80" height="80" alt="">
                                                    </td>

                                                    <td>
                                                        <?php if($category->status == 1): ?>
                                                            <h2 class="d-inline-block"><span
                                                                    class="badge badge-success">Active</span>
                                                            </h2>
                                                        <?php else: ?>
                                                            <h2 class="d-inline-block"><span
                                                                    class="badge badge-danger">Deactive</span>
                                                            </h2>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <form id="featureForm<?php echo e($category->id); ?>"
                                                            action="<?php echo e(route('user.pcategory.feature')); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="pcategory_indx"
                                                                value="<?php echo e($category->indx); ?>">
                                                            <select name="feature" id=""
                                                                class="form-control-sm text-white
                                    <?php if($category->is_feature == 1): ?> bg-success
                                    <?php elseif($category->is_feature == 0): ?>
                                    bg-danger <?php endif; ?>
                                  "
                                                                onchange="document.getElementById('featureForm<?php echo e($category->id); ?>').submit();">
                                                                <option value="1"
                                                                    <?php echo e($category->is_feature == 1 ? 'selected' : ''); ?>>
                                                                    Yes
                                                                </option>
                                                                <option value="0"
                                                                    <?php echo e($category->is_feature == 0 ? 'selected' : ''); ?>>
                                                                    No
                                                                </option>
                                                            </select>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-secondary btn-sm my-2 editbtn"
                                                            href="<?php echo e(route('user.category.edit', $category->id) . '?language=' . request()->input('language')); ?>">
                                                            <span class="btn-label">
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                            
                                                        </a>
                                                        <form class="deleteform d-inline-block"
                                                            action="<?php echo e(route('user.category.delete')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="indx"
                                                                value="<?php echo e($category->indx); ?>">
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
                <div class="card-footer">
                    <div class="row">
                        <div class="d-inline-block mx-auto">
                            <?php echo e($pcategories->appends(['language' => request()->input('language')])->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Product Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger pb-1 dis-none" id="blogErrors">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul></ul>
                    </div>
                    <form id="blogForm" class="modal-form" action="<?php echo e(route('user.category.store')); ?>" method="POST"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="col-12 mb-2">
                                        <label for="image"><strong>Image</strong></label>
                                    </div>
                                    <div class="col-md-12 showImage mb-3">
                                        <img src="<?php echo e(asset('assets/admin/img/noimage.jpg')); ?>" alt="..."
                                            class="img-thumbnail" width="200">
                                    </div>
                                    <input type="file" name="image" id="image" class="form-control image">
                                    <p id="errimage" class="mb-0 text-danger em"></p>
                                </div>
                            </div>
                        </div>
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group">
                                <label for="">Name(<?php echo e($language->code); ?>) **</label>
                                <input type="text" class="form-control" name="<?php echo e($language->code); ?>_name"
                                    value="" placeholder="Enter name">
                                <p id="errname" class="mb-0 text-danger em"></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label for="">Tax</label>
                            <input type="text" class="form-control" name="tax" value=""
                                placeholder="Enter tax in %" autocomplete="off">
                            <p id="errtax" class="mb-0 text-danger em"></p>
                        </div>

                        <div class="form-group">
                            <label for="">Status **</label>
                            <select class="form-control ltr" name="status">
                                <option value="" selected disabled>Select a status</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            <p id="errstatus" class="mb-0 text-danger em"></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="blogForm" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/product/category/index.blade.php ENDPATH**/ ?>