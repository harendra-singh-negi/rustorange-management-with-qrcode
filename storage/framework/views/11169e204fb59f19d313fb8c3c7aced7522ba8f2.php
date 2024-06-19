<?php $__env->startSection('styles'); ?>
<style>
    .tooltip-inner {
        max-width: 500px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title">
      Serving Methods
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
        <a href="#">
          Serving Methods
        </a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
            <h3>Serving Methods</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
                <div id="refreshOrder">
                    <div class="table-responsive">
                      <table class="table table-striped mt-3">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Offline Gateways</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $servingMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($packagePermissions) && in_array($sm->name, $packagePermissions)): ?>
                                <tr>
                                    <td><?php echo e($sm->name); ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#statusModal<?php echo e($sm->id); ?>">Manage</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#gatewaysModal<?php echo e($sm->id); ?>">Manage</button>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?php echo e($sm->id); ?>">Edit</a>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php if ($__env->exists('user.product.order.serving_methods.partials.status')) echo $__env->make('user.product.order.serving_methods.partials.status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php if ($__env->exists('user.product.order.serving_methods.partials.gateways')) echo $__env->make('user.product.order.serving_methods.partials.gateways', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php if ($__env->exists('user.product.order.serving_methods.partials.edit')) echo $__env->make('user.product.order.serving_methods.partials.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/product/order/serving_methods/index.blade.php ENDPATH**/ ?>