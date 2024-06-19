<?php use App\Models\User\Language; ?>


<?php
    $setLang = Language::where('code', request()->input('language'))->first();
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
        <h4 class="page-title">Shipping Charges</h4>
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
                <a href="#">Order Management</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Shipping Charges</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title d-inline-block">Shipping Charges</div>
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
                                data-target="#createModal"><i class="fas fa-plus"></i> Add New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <div class="alert alert-warning text-dark text-center">
                                <h5 class="mb-0">If you don't want to show any shipping charge in checkout page, then
                                    don't add any shipping charge here</h5>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <?php if(count($shippings) == 0): ?>
                                <h3 class="text-center">No Shipping Charge</h3>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Title</th>
                                                <th scope="col">Text</th>
                                                <th scope="col">Charge (<?php echo e($userBe->base_currency_text); ?>)</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $shippings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                       
                                                        <?php echo e(convertUtf8(strlen($shipping->title)) > 60 ? convertUtf8(substr($shipping->title, 0, 60)) . '...' : convertUtf8($shipping->title)); ?>

                                                    </td>
                                                    <td>
                                                       
                                                        <?php echo e(convertUtf8(strlen($shipping->text)) > 60 ? convertUtf8(substr($shipping->text, 0, 60)) . '...' : convertUtf8($shipping->text)); ?>

                                                    </td>

                                                    <td>
                                                        <?php echo e($userBe->base_currency_symbol_position == 'left' ? $userBe->base_currency_symbol : ''); ?>

                                                        <?php echo e($shipping->charge); ?>

                                                        <?php echo e($userBe->base_currency_symbol_position == 'right' ? $userBe->base_currency_symbol : ''); ?>


                                                    </td>

                                                    <td>
                                                        <a class="btn btn-secondary btn-sm my-2 editbtn"
                                                            href="<?php echo e(route('user.shipping.edit', $shipping->id) . '?language=' . request()->input('language')); ?>">
                                                            <span class="btn-label">
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                            
                                                        </a>
                                                        <form class="deleteform d-inline-block"
                                                            action="<?php echo e(route('user.shipping.delete')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="shipping_id"
                                                                value="<?php echo e($shipping->id); ?>">
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
                            <?php echo e($shippings->appends(['language' => request()->input('language')])->links()); ?>

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
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Shipping Charge</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="ajaxForm" class="modal-form" action="<?php echo e(route('user.shipping.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="">Language **</label>
                            <select name="user_language_id" class="form-control">
                                <option value="" selected disabled>Select a language</option>
                                <?php $__currentLoopData = $userLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lang->id); ?>"><?php echo e($lang->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <p id="erruser_language_id" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Title **</label>
                            <input type="text" class="form-control" name="title" value=""
                                placeholder="Enter title">
                            <p id="errtitle" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Short Text</label>
                            <input type="text" class="form-control" name="text" value=""
                                placeholder="Enter text">
                        </div>

                        <div class="form-group">
                            <label for="">Charge (<?php echo e($userBe->base_currency_text); ?>) **</label>
                            <input type="text" class="form-control" name="charge" value=""
                                placeholder="Enter charge">
                            <p id="errcharge" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Minimum Order Amount For Free Delivery
                                (<?php echo e($userBe->base_currency_text); ?>)</label>
                            <input type="text" class="form-control ltr" name="free_delivery_amount" value=""
                                placeholder="Enter Minimum Order Amount For Free Delivery">
                            <p class="mb-0 text-warning">If dont want 'Free Delivery' , then please leave it blank</p>
                            <p id="errfree_delivery_amount" class="mb-0 text-danger em"></p>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submitBtn" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/shipping_charge/index.blade.php ENDPATH**/ ?>