<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title">
            Registered Customers
        </h4>
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
                <a href="#">Customer</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Registered Customers</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="card-title">
                                Registered Customers
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                            <button class="btn btn-danger float-right btn-sm ml-2 mt-2 d-none bulk-delete"
                                data-href="<?php echo e(route('user.bulk_delete_user')); ?>"><i class="flaticon-interface-5"></i>
                                Delete</button>
                            <button class="btn btn-primary float-lg-right float-none btn-sm ml-2 mt-2" data-toggle="modal"
                                data-target="#createModal"><i class="fas fa-plus"></i> Add Customer</button>
                            <form action="<?php echo e(url()->full()); ?>" class="float-lg-right float-none my-2">
                                <input type="text" name="term" class="form-control"
                                    value="<?php echo e(request()->input('term')); ?>" placeholder="Search by Username / Email"
                                    style="min-width: 250px;">
                            </form>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if($users->count() == 0): ?>
                                <h3 class="text-center">NO CUSTOMER FOUND</h3>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <input type="checkbox" class="bulk-check" data-val="all">
                                                </th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Email Status</th>
                                                <th scope="col">Account</th>
                                                <td scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="bulk-check"
                                                            data-val="<?php echo e($user->id); ?>">
                                                    </td>
                                                    <td><?php echo e(convertUtf8($user->username)); ?></td>
                                                    <td><?php echo e(convertUtf8($user->email)); ?></td>

                                                    <td>
                                                        <form id="emailForm<?php echo e($user->id); ?>" class="d-inline-block"
                                                            action="<?php echo e(route('register.client.email')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <select
                                                                class="form-control form-control-sm <?php echo e(strtolower($user->email_verified) == 'yes' ? 'bg-success' : 'bg-danger'); ?>"
                                                                name="email_verified"
                                                                onchange="document.getElementById('emailForm<?php echo e($user->id); ?>').submit();">
                                                                <option value="Yes"
                                                                    <?php echo e(strtolower($user->email_verified) == 'yes' ? 'selected' : ''); ?>>
                                                                    Verify</option>
                                                                <option value="no"
                                                                    <?php echo e(strtolower($user->email_verified) == 'no' ? 'selected' : ''); ?>>
                                                                    Unverify</option>
                                                            </select>
                                                            <input type="hidden" name="user_id"
                                                                value="<?php echo e($user->id); ?>">
                                                        </form>
                                                    </td>

                                                    <td>
                                                        <form id="userFrom<?php echo e($user->id); ?>" class="d-inline-block"
                                                            action="<?php echo e(route('register.client.ban')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <select
                                                                class="form-control form-control-sm <?php echo e($user->status == 1 ? 'bg-success' : 'bg-danger'); ?>"
                                                                name="status"
                                                                onchange="document.getElementById('userFrom<?php echo e($user->id); ?>').submit();">
                                                                <option value="1"
                                                                    <?php echo e($user->status == 1 ? 'selected' : ''); ?>>Active
                                                                </option>
                                                                <option value="0"
                                                                    <?php echo e($user->status == 0 ? 'selected' : ''); ?>>Deactive
                                                                </option>
                                                            </select>
                                                            <input type="hidden" name="user_id"
                                                                value="<?php echo e($user->id); ?>">
                                                        </form>
                                                    </td>
                                                    <td>

                                                        <div class="dropdown">
                                                            <button class="btn btn-info btn-sm dropdown-toggle"
                                                                type="button" id="dropdownMenuButton"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item"
                                                                    href="<?php echo e(route('register.client.details', $user->id)); ?>">Details</a>
                                                                <a href="#" data-id="<?php echo e($user->id); ?>"
                                                                    class="dropdown-item editbtn" data-toggle="modal"
                                                                    data-target="#passwordModal">Change Password</a>

                                                                <form class="deleteform d-block"
                                                                    action="<?php echo e(route('register.client.delete')); ?>"
                                                                    method="post">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="user_id"
                                                                        value="<?php echo e($user->id); ?>">
                                                                    <button type="submit"
                                                                        class="deletebtn pl-4 dropdown-item">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                                <form class="d-block"
                                                                    action="<?php echo e(route('user.registered_clients.secret.login')); ?>"
                                                                    method="post" target="_blank">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="user_id"
                                                                        value="<?php echo e($user->id); ?>">
                                                                    <button class="dropdown-item "
                                                                        role="button"><?php echo e(__('Secret Login')); ?></button>
                                                                </form>
                                                            </div>
                                                        </div>
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
                            <?php echo e($users->appends(['term' => request()->input('term')])->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($__env->exists('user.register_user.create_client')) echo $__env->make('user.register_user.create_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if ($__env->exists('user.register_user.change_password')) echo $__env->make('user.register_user.change_password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/register_user/registeruser.blade.php ENDPATH**/ ?>