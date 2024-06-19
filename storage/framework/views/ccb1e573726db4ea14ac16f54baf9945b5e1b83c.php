<?php $__env->startSection('content'); ?>
<div class="page-header">
    <h4 class="page-title">
        Email Templates
    </h4>
    <ul class="breadcrumbs">
       <li class="nav-home">
          <a href="#">
          <i class="flaticon-home"></i>
          </a>
       </li>
       <li class="separator">
          <i class="flaticon-right-arrow"></i>
       </li>
       <li class="nav-item">
          <a href="#">Settings</a>
       </li>
       <li class="separator">
          <i class="flaticon-right-arrow"></i>
       </li>
       <li class="nav-item">
          <a href="#">Email Settings</a>
       </li>
       <li class="separator">
          <i class="flaticon-right-arrow"></i>
       </li>
       <li class="nav-item">
          <a href="#">Email Templates</a>
       </li>
    </ul>
 </div>
 <div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-header">
             <div class="row">
                <div class="col-lg-6">
                   <div class="card-title">
                      Email Templates
                   </div>
                </div>
             </div>
          </div>
          <div class="card-body">
             <div class="row">
                <div class="col-lg-12">
                    <?php if(count($templates) == 0): ?>
                        <h3 class="text-center">NO ORDER FOUND</h3>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Email Type</th>
                                        <th scope="col">Email Subject</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-capitalize">
                                                <?php if($template->mail_type == 'order_pickedup_pick_up'): ?>
                                                    Order Picked up (For 'Pick up')
                                                <?php elseif($template->mail_type == 'order_pickup'): ?>
                                                    Order Picked up (For 'Home Delivery')
                                                <?php elseif($template->mail_type == 'order_ready_to_pickup_pick_up'): ?>
                                                    Order Ready to Pick up (For 'Pick up')
                                                <?php elseif($template->mail_type == 'order_ready_to_pickup'): ?>
                                                    Order Ready to Pick up (For 'Home Delivery')
                                                <?php else: ?>
                                                    <?php echo e(str_replace("_", " ", $template->mail_type)); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php echo e($template->mail_subject); ?>

                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" href="<?php echo e(route('user.email.editTemplate', $template->id)); ?>"><i class="far fa-edit"></i> Edit</a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/basic/email/templates/index.blade.php ENDPATH**/ ?>