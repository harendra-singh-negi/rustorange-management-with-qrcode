
<div class="modal fade" id="gatewaysModal<?php echo e($sm->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Gateways (<?php echo e($sm->name); ?>)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?php echo e(route('user.product.servingMethodGateways')); ?>" method="POST" id="gatewaysForm<?php echo e($sm->id); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="serving_method" value="<?php echo e($sm->id); ?>">
                <div class="form-group">
                    <label class="form-label">Select the Offline Gateways that should be active for <strong class="text-warning"><?php echo e($sm->name); ?></strong></label>
                    <div class="selectgroup selectgroup-pills">
                        <?php $__currentLoopData = $ogateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ogateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="selectgroup-item">
                                <?php
                                    $gateways = json_decode($sm->gateways, true);
                                ?>
                                <input type="checkbox" name="gateways[]" value="<?php echo e($ogateway->id); ?>" class="selectgroup-input" <?php echo e(is_array($gateways) && in_array($ogateway->id, $gateways) ? 'checked' : ''); ?>>
                                <span class="selectgroup-button"><?php echo e($ogateway->name); ?></span>
                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </form>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-success" form="gatewaysForm<?php echo e($sm->id); ?>">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/product/order/serving_methods/partials/gateways.blade.php ENDPATH**/ ?>