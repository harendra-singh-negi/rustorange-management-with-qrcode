<style>
    .btnactive {
        color: rgb(61, 61, 53);
        background: white
    }

    input[type="date"] {
        padding: 7px !important
    }
</style>
<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title">
            Sales Report
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
                <a href="#">Order Management</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">
                    Sales Report
                </a>
            </li>
        </ul>
    </div>
    <?php if(count($orders) > 0): ?>
        <div class="row">

            <div class="col-sm-4 col-md-4 ">
                <div class="card card-stats card-primary card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-box"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">

                                    <p class="card-category">Completed Orders</p>
                                    <h4 class="card-title"> <?php echo e($completed_orders ? $completed_orders : 0); ?> </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-4 ">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                            </div>

                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Earning</p>
                                    <h4 class="card-title">


                                        <?php echo e($be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''); ?>

                                        <?php echo e($earning ? $earning : 0); ?>

                                        <?php echo e($be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''); ?>



                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <div class="row">
        <div class="col-lg-12">
            <p>Filter Order</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form id="" action="<?php echo e(route('user.sales.report')); ?>" method="GET">
                        <div class="row no-gutters">
                            <div class="col-lg-2">
                                <div class="form-group px-0">
                                    <label for="">From Date</label>
                                    <input class="form-control" type="date" name="from_date" autocomplete="off"
                                        value="<?php echo e(request()->input('from_date') ?? ''); ?>" placeholder="From Date" required>

                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group px-0">
                                    <label for="">To Date</label>
                                    <input class="form-control" type="date" name="to_date" autocomplete="off"
                                        value="<?php echo e(request()->input('to_date') ?? ''); ?>" placeholder="To Date" required>

                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group px-0">
                                    <label for="">Orders From</label>
                                    <select name="orders_from" class="form-control">
                                        <option value=""
                                            <?php echo e(empty(request()->input('orders_from')) ? 'selected' : ''); ?>>
                                            All
                                        </option>
                                        <?php if(!empty($packagePermissions) && in_array('Online Order', $packagePermissions)): ?>
                                            <option value="website"
                                                <?php echo e(request()->input('orders_from') == 'website' ? 'selected' : ''); ?>>
                                                Website Menu
                                            </option>
                                        <?php endif; ?>
                                        <?php if(!empty($packagePermissions) && in_array('QR Menu', $packagePermissions) && in_array('Online Order', $packagePermissions)): ?>
                                            <option value="qr"
                                                <?php echo e(request()->input('orders_from') == 'qr' ? 'selected' : ''); ?>>Qr
                                                Menu
                                            </option>
                                        <?php endif; ?>
                                        <?php if(!empty($packagePermissions) && in_array('POS', $packagePermissions)): ?>
                                            <option value="pos"
                                                <?php echo e(request()->input('orders_from') == 'pos' ? 'selected' : ''); ?>>
                                                POS
                                            </option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group px-0">
                                    <label for="">Serving Method</label>
                                    <select name="serving_method" class="form-control">
                                        <option value=""
                                            <?php echo e(empty(request()->input('orders_from')) ? 'selected' : ''); ?>>
                                            All
                                        </option>
                                        <?php if(!empty($packagePermissions) && in_array('On Table', $packagePermissions)): ?>
                                            <option value="on_table"
                                                <?php echo e(request()->input('serving_method') == 'on_table' ? 'selected' : ''); ?>>
                                                On Table
                                            </option>
                                        <?php endif; ?>
                                        <?php if(!empty($packagePermissions) && in_array('Pick Up', $packagePermissions)): ?>
                                            <option value="pick_up"
                                                <?php echo e(request()->input('serving_method') == 'pick_up' ? 'selected' : ''); ?>>
                                                Pick up
                                            </option>
                                        <?php endif; ?>
                                        <?php if(!empty($packagePermissions) && in_array('Home Delivery', $packagePermissions)): ?>
                                            <option value="home_delivery"
                                                <?php echo e(request()->input('serving_method') == 'home_delivery' ? 'selected' : ''); ?>>
                                                Home Delivery
                                            </option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group px-0">
                                    <label for="">Order</label>
                                    <select name="order_status" id="" class="form-control">
                                        <option value=""
                                            <?php echo e(empty(request()->input('order_status')) ? 'selected' : ''); ?>>
                                            All
                                        </option>
                                        <option value="pending"
                                            <?php echo e(request()->input('order_status') == 'pending' ? 'selected' : ''); ?>>
                                            Pending
                                        </option>
                                        <option value="received"
                                            <?php echo e(request()->input('order_status') == 'received' ? 'selected' : ''); ?>>
                                            Received
                                        </option>
                                        <option value="preparing"
                                            <?php echo e(request()->input('order_status') == 'preparing' ? 'selected' : ''); ?>>
                                            Preparing
                                        </option>

                                        <?php if(empty(request()->input('serving_method')) ||
                                                request()->input('serving_method') == 'home_delivery' ||
                                                request()->input('serving_method') == 'pick_up'): ?>
                                            <option value="ready_to_pick_up"
                                                <?php echo e(request()->input('order_status') == 'ready_to_pick_up' ? 'selected' : ''); ?>>
                                                Ready to pick up
                                            </option>
                                            <option value="picked_up"
                                                <?php echo e(request()->input('order_status') == 'picked_up' ? 'selected' : ''); ?>>
                                                Picked up
                                            </option>
                                        <?php endif; ?>

                                        <?php if(empty(request()->input('serving_method')) || request()->input('serving_method') == 'home_delivery'): ?>
                                            <option value="delivered"
                                                <?php echo e(request()->input('order_status') == 'delivered' ? 'selected' : ''); ?>>
                                                Delivered
                                            </option>
                                        <?php endif; ?>

                                        <?php if(empty(request()->input('serving_method')) || request()->input('serving_method') == 'on_table'): ?>
                                            <option value="ready_to_serve"
                                                <?php echo e(request()->input('order_status') == 'ready_to_serve' ? 'selected' : ''); ?>>
                                                Ready to Serve
                                            </option>
                                            <option value="served"
                                                <?php echo e(request()->input('order_status') == 'served' ? 'selected' : ''); ?>>
                                                Served
                                            </option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group px-0">
                                    <label for="">Payment</label>
                                    <select name="payment_status" class="form-control">
                                        <option value="">All</option>
                                        <option value="Pending"
                                            <?php echo e(request()->input('payment_status') == 'Pending' ? 'selected' : ''); ?>>Pending
                                        </option>
                                        <option value="Completed"
                                            <?php echo e(request()->input('payment_status') == 'Completed' ? 'selected' : ''); ?>>
                                            Completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group px-0">
                                    <label for="">Completed</label>
                                    <select name="completed" class="form-control">
                                        <option value="">All</option>
                                        <option value="yes"
                                            <?php echo e(request()->input('completed') == 'yes' ? 'selected' : ''); ?>>Yes</option>
                                        <option value="no"
                                            <?php echo e(request()->input('completed') == 'no' ? 'selected' : ''); ?>>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-1 d-flex justify-content-center align-items-center">
                                <div class="form-group ">
                                    <label for="" style="visibility: hidden"> submit </label>
                                    <input type="submit" class="btn btn-primary" name="filter">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <?php if(count($orders) > 0): ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="<?php echo e(route('user.salesReport.export')); ?>" id="salesReportForm" method="GET">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div class="btn-group" role="group" aria-label="" title="File Type">
                                                <button type="button"  class="btn btn-dark btnactive"
                                                    value="csv" >Csv</button>
                                                <button type="button" class="btn btn-dark" value="excel">Excel</button>
                                                <button type="button" class="btn btn-dark" value="pdf">Pdf</button>
                                            </div>
                                            <input type="hidden" name="fileType" value="" id="fileType">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(count($orders) == 0): ?>
                                <h3 class="text-center">NO ORDER FOUND</h3>
                            <?php else: ?>
                                <div id="refreshOrder">
                                    <div class="table-responsive">
                                        <table class="table table-striped mt-3">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Order Number</th>

                                                    <th scope="col">Customer Name</th>
                                                    <th scope="col">Customer Phone</th>
                                                    <th scope="col">Discount</th>
                                                    <th scope="col">Tax</th>
                                                    <th scope="col">Shipping Charge</th>
                                                    <th scope="col">Total</th>

                                                    <th scope="col">Serving Method</th>
                                                    <th scope="col">Payment</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Completed</th>
                                                    <th scope="col">Gateway</th>
                                                    <th scope="col">Time</th>


                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="table-row">
                                                        <td><?php echo e($order->order_number); ?></td>
                                                        <td> <?php echo e(convertUtf8($order->billing_fname)); ?></td>
                                                        <td><?php echo e($order->billing_country_code); ?><?php echo e($order->billing_number); ?>

                                                        </td>
                                                        <td> <?php echo e($order->currency_symbol_position == 'left' ? $order->currency_symbol : ''); ?>

                                                            <?php echo e($order->coupon); ?>

                                                            <?php echo e($order->currency_symbol_position == 'right' ? $order->currency_symbol : ''); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($order->currency_symbol_position == 'left' ? $order->currency_symbol : ''); ?><?php echo e($order->tax); ?><?php echo e($order->currency_symbol_position == 'right' ? $order->currency_symbol : ''); ?>


                                                        </td>
                                                        <td>
                                                            <?php if(!empty($order->shipping_charge)): ?>
                                                                <?php echo e($order->currency_symbol_position == 'left' ? $order->currency_symbol : ''); ?><?php echo e($order->shipping_charge); ?><?php echo e($order->currency_symbol_position == 'right' ? $order->currency_symbol : ''); ?>

                                                            <?php else: ?>
                                                                <?php echo e($order->currency_symbol_position == 'left' ? $order->currency_symbol : ''); ?>

                                                                0
                                                                <?php echo e($order->currency_symbol_position == 'right' ? $order->currency_symbol : ''); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo e($order->currency_symbol_position == 'left' ? $order->currency_symbol : ''); ?><?php echo e($order->total); ?><?php echo e($order->currency_symbol_position == 'right' ? $order->currency_symbol : ''); ?>

                                                        </td>


                                                        <td class="text-capitalize">
                                                            <span ><?php echo e(str_replace('_', ' ', $order->serving_method)); ?></span>
                                                        </td>
                                                        <td>
                                                            <?php if($order->payment_status == 'Completed'): ?>
                                                            <span class="badge badge-success">
                                                                <?php echo e(str_replace('_', ' ', $order->payment_status)); ?></span>
                                                             <?php else: ?> 
                                                             <span class="badge badge-warning">
                                                                <?php echo e(str_replace('_', ' ', $order->payment_status)); ?>

                                                            </span>
                                                            <?php endif; ?>     
                                                        </td>
                                                        <td>
                                                            <?php if($order->order_status == 'pending'): ?>
                                                            <span class="badge badge-warning">
                                                                <?php echo e(str_replace('_', ' ', $order->order_status)); ?>

                                                            </span>
                                                            <?php else: ?> 
                                                             <span class="badge badge-success">
                                                                <?php echo e(str_replace('_', ' ', $order->order_status)); ?>

                                                            </span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            
                                                            <?php if($order->completed == 'yes'): ?>
                                                             <span class="badge badge-success">
                                                                
                                                                <?php echo e(str_replace('_', ' ', $order->completed)); ?></span>
                                                            <?php else: ?> 
                                                            <span class="badge badge-danger">
                                                                
                                                                <?php echo e(str_replace('_', ' ', $order->completed)); ?></span>
                                                            <?php endif; ?>
                                                           
                                                        </td>
                                                        <td class="text-capitalize">
                                                            <span>
                                                            <?php echo e(str_replace('_', ' ', $order->method)); ?></span>
                                                        </td>
                                                        <td>
                                                            
                                                            <?php echo e(Carbon\Carbon::parse($order->created_at)->timezone($userBe->timezone)); ?>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="d-inline-block mx-auto">
                            <?php if($orders): ?>
                                <?php echo e($orders->appends(['from_date' => request()->input('from_date'), 'to_date' => request()->input('to_date'), 'orders_from' => request()->input('orders_from'), 'serving_method' => request()->input('serving_method'), 'order_status' => request()->input('order_status'), 'payment_status' => request()->input('payment_status'), 'completed' => request()->input('completed')])->links()); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        var orders = "<?php echo e(count($orders)); ?>";
    </script>
  <script src="<?php echo e(asset('assets/tenant/js/pop_blade.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/product/reports/index.blade.php ENDPATH**/ ?>