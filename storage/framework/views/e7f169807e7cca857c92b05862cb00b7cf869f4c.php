<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title">
        Delivery Time Frame Management
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
            Delivery Time Frame Management
        </a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
            <h3>Delivery Time Frame Management</h3>
        </div>
        <div class="card-body">
            <div class="alert alert-warning text-center py-4">
                <h4 class="text-warning mb-0"><strong>These delivery time frames will be shown to customers in checkout page. Customer can choose the delivery Time Frames</strong></h4>
            </div>
            <div class="alert alert-warning text-center py-4">
                <h4 class="text-warning mb-0"><strong>The delivery date, delivery time field can be enabled / disabled from <a href="<?php echo e(route('user.order.settings')); ?>" target="_blank"> 'Order Management > Settings' </a></strong></h4>
                <h4 class="text-warning mb-0"><strong>Owner can make it required / optional in food checkout page, from <a href="<?php echo e(route('user.order.settings')); ?>" target="_blank"> 'Order Management > Settings'</a></strong></h4>
            </div>

          <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                        <th scope="col">Day</th>
                        <th scope="col">Time Frames</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Monday</td>
                            <td>
                                <button class="btn btn-primary addTF" data-day="monday">Add</button>
                                <a class="btn btn-info" href="<?php echo e(route('user.timeframes', ['day' => 'monday'])); ?>">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td>
                                <button class="btn btn-primary addTF" data-day="tuesday">Add</button>
                                <a class="btn btn-info" href="<?php echo e(route('user.timeframes', ['day' => 'tuesday'])); ?>">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>
                                <button class="btn btn-primary addTF" data-day="wednesday">Add</button>
                                <a class="btn btn-info" href="<?php echo e(route('user.timeframes', ['day' => 'wednesday'])); ?>">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>
                                <button class="btn btn-primary addTF" data-day="thursday">Add</button>
                                <a class="btn btn-info" href="<?php echo e(route('user.timeframes', ['day' => 'thursday'])); ?>">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>
                                <button class="btn btn-primary addTF" data-day="friday">Add</button>
                                <a class="btn btn-info" href="<?php echo e(route('user.timeframes', ['day' => 'friday'])); ?>">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Saturday</td>
                            <td>
                                <button class="btn btn-primary addTF" data-day="saturday">Add</button>
                                <a class="btn btn-info" href="<?php echo e(route('user.timeframes', ['day' => 'saturday'])); ?>">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Sunday</td>
                            <td>
                                <button class="btn btn-primary addTF" data-day="sunday">Add</button>
                                <a class="btn btn-info" href="<?php echo e(route('user.timeframes', ['day' => 'sunday'])); ?>">View</a>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php if ($__env->exists('user.product.order.delivery_time.create')) echo $__env->make('user.product.order.delivery_time.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
   <script src="<?php echo e(asset('assets/tenant/js/blade.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/product/order/delivery_time/index.blade.php ENDPATH**/ ?>