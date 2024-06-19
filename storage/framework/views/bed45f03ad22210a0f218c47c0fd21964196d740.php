<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title">
      Delivery Time
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
            Delivery Time
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">
            Time Frames
        </a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
            <h3 class="text-capitalize float-left">Time Frames (<?php echo e(request()->input('day')); ?>)</h3>
            <a href="<?php echo e(route('user.deliverytime')); ?>" class="btn btn-info btn-sm float-right">Back</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
                <?php if(count($timeframes) == 0): ?>
                    <h3 class="text-center">NO TIMEFRAME AVAILABLE</h3>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col">Max Orders</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $timeframes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($tf->start); ?></td>
                                    <td><?php echo e($tf->end); ?></td>
                                    <td><?php echo e($tf->max_orders); ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm editbtn" data-toggle="modal" data-target="#editModal" data-start="<?php echo e($tf->start); ?>" data-end="<?php echo e($tf->end); ?>" data-max_orders="<?php echo e($tf->max_orders); ?>" data-id="<?php echo e($tf->id); ?>">
                                            <span class="btn-label">
                                            <i class="fas fa-edit"></i>
                                            </span>
                                            Edit
                                        </button>
                                        <form class="deleteform d-inline-block" action="<?php echo e(route('user.timeframe.delete')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="timeframe_id" value="<?php echo e($tf->id); ?>">
                                        <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                            <span class="btn-label">
                                            <i class="fas fa-trash"></i>
                                            </span>
                                            Delete
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

  <?php if ($__env->exists('user.product.order.delivery_time.edit-timeframe')) echo $__env->make('user.product.order.delivery_time.edit-timeframe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/product/order/delivery_time/timeframes.blade.php ENDPATH**/ ?>