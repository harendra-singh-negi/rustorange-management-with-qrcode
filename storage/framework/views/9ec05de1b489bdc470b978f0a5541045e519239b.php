<?php
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
        <h4 class="page-title">Postal Codes</h4>
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
                <a href="#">Postal Codes</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title d-inline-block">Postal Codes</div>
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
                                data-target="#createModal"><i class="fas fa-plus"></i> Add Postal Code</a>
                            <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete"
                                data-href="<?php echo e(route('user.postalcode.bulk.delete')); ?>"><i class="flaticon-interface-5"></i>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-warning text-center text-dark">
                                This page will be available if 'postal code' is enabled by
                                <strong><?php echo e(Auth::guard('web')->user()->username); ?> <a
                                        href="<?php echo e(route('user.order.settings')); ?>" target="_blank"
                                        class="text-decoration-none">(Order
                                        Management > Settings)</a> </strong>. For demo version we are always showing this
                                page.
                            </div>
                            <?php if(count($postcodes) == 0): ?>
                                <h3 class="text-center">NO POSTAL CODE FOUND</h3>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <input type="checkbox" class="bulk-check" data-val="all">
                                                </th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Post Code</th>
                                                <th scope="col">Charge</th>
                                                <th scope="col">Serial Number</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $postcodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $postcode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="bulk-check"
                                                            data-val="<?php echo e($postcode->id); ?>">
                                                    </td>
                                                    <td>
                                                        <?php echo e(convertUtf8(strlen($postcode->title)) > 60 ? convertUtf8(substr($postcode->title, 0, 60)) . '...' : convertUtf8($postcode->title)); ?>

                                                    </td>
                                                    <td><?php echo e($postcode->postcode); ?></td>
                                                    <td>
                                                        <?php echo e($userBe->base_currency_symbol_position == 'left' ? $userBe->base_currency_symbol : ''); ?>

                                                        <?php echo e($postcode->charge); ?>

                                                        <?php echo e($userBe->base_currency_symbol_position == 'right' ? $userBe->base_currency_symbol : ''); ?>


                                                    </td>
                                                    <td><?php echo e($postcode->serial_number); ?></td>
                                                    <td>
                                                        <a class="btn btn-secondary btn-sm editbtn mb-2" href="#editModal"
                                                            data-toggle="modal" data-postcode_id="<?php echo e($postcode->id); ?>"
                                                            data-title="<?php echo e($postcode->title); ?>"
                                                            data-postcode="<?php echo e($postcode->postcode); ?>"
                                                            data-charge="<?php echo e($postcode->charge); ?>"
                                                            data-free_delivery_amount="<?php echo e($postcode->free_delivery_amount); ?>"
                                                            data-serial_number="<?php echo e($postcode->serial_number); ?>">
                                                            <span class="btn-label">
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                        </a>
                                                        <form class="deleteform d-inline-block"
                                                            action="<?php echo e(route('user.postalcode.delete')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="postcode_id"
                                                                value="<?php echo e($postcode->id); ?>">
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm deletebtn mb-2">
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
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Postal Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ajaxForm" class="modal-form create" action="<?php echo e(route('user.postalcode.store')); ?>"
                        method="POST">
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
                            <label for="">Post Code **</label>
                            <input type="text" class="form-control ltr" name="postcode" value=""
                                placeholder="Enter postcode">
                            <p id="errpostcode" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Delivery Charge (<?php echo e($userBe->base_currency_text); ?>) **</label>
                            <input type="text" class="form-control ltr" name="charge" value=""
                                placeholder="Enter delivery charge">
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
                        <div class="form-group">
                            <label for="">Serial Number **</label>
                            <input type="number" class="form-control ltr" name="serial_number" value=""
                                placeholder="Enter Serial Number">
                            <p id="errserial_number" class="mb-0 text-danger em"></p>
                            <p class="text-warning"><small>The higher the serial number is, the later the Postal Code
                                    will be shown.</small></p>
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

 
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Faq</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ajaxEditForm" class="" action="<?php echo e(route('user.postalcode.update')); ?>"
                        method="POST">
                        <?php echo csrf_field(); ?>
                        <input id="inpostcode_id" type="hidden" name="postcode_id" value="">
                        <div class="form-group">
                            <label for="">Title **</label>
                            <input id="intitle" type="text" class="form-control" name="title" value=""
                                placeholder="Enter title">
                            <p id="eerrtitle" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Post Code **</label>
                            <input id="inpostcode" type="text" class="form-control" name="postcode" value=""
                                placeholder="Enter post code">
                            <p id="eerrpostcode" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Delivery Charge **</label>
                            <input id="incharge" type="text" class="form-control" name="charge" value=""
                                placeholder="Enter charge">
                            <p id="eerrcharge" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Minimum Order Amount For Free Delivery
                                (<?php echo e($userBe->base_currency_text); ?>)</label>
                            <input id="infree_delivery_amount" type="text" class="form-control ltr"
                                name="free_delivery_amount" value=""
                                placeholder="Enter Minimum Order Amount For Free Delivery">
                            <p class="mb-0 text-warning">If dont want 'Free Delivery' , then please leave it blank</p>
                            <p id="eerrfree_delivery_amount" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Serial Number **</label>
                            <input id="inserial_number" type="number" class="form-control ltr" name="serial_number"
                                value="" placeholder="Enter Serial Number">
                            <p id="eerrserial_number" class="mb-0 text-danger em"></p>
                            <p class="text-warning"><small>The higher the serial number is, the later the Postal Code
                                    will be shown.</small></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="updateBtn" type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/postcodes/index.blade.php ENDPATH**/ ?>