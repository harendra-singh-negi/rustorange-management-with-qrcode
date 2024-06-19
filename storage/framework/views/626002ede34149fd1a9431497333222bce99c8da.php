
<div class="modal fade" id="statusModal<?php echo e($sm->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Status (<?php echo e($sm->name); ?>)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?php echo e(route('user.product.servingMethodStatus')); ?>" method="POST" id="servingMethodStatus<?php echo e($sm->id); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="serving_method" value="<?php echo e($sm->id); ?>">
                <?php if(!empty($packagePermissions) && in_array('Online Order',$packagePermissions)): ?>
                <div class="form-group">
                    <label class="form-label">For Website Menu</label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="website_menu" value="1" class="selectgroup-input" <?php echo e($sm->website_menu == 1 ? 'checked' : ''); ?>>
                            <span class="selectgroup-button">Active</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="website_menu" value="0" class="selectgroup-input" <?php echo e($sm->website_menu == 0 ? 'checked' : ''); ?>>
                            <span class="selectgroup-button">Deactive</span>
                        </label>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(!empty($packagePermissions) && in_array('Online Order',$packagePermissions) && in_array('QR Menu',$packagePermissions)): ?>
                <div class="form-group">
                    <label class="form-label">For QR Menu</label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="qr_menu" value="1" class="selectgroup-input" <?php echo e($sm->qr_menu == 1 ? 'checked' : ''); ?>>
                            <span class="selectgroup-button">Active</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="qr_menu" value="0" class="selectgroup-input" <?php echo e($sm->qr_menu == 0 ? 'checked' : ''); ?>>
                            <span class="selectgroup-button">Deactive</span>
                        </label>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(!empty($packagePermissions) && in_array('POS',$packagePermissions) ): ?>
                <div class="form-group">
                    <label class="form-label">For POS</label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="pos" value="1" class="selectgroup-input" <?php echo e($sm->pos == 1 ? 'checked' : ''); ?>>
                            <span class="selectgroup-button">Active</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="pos" value="0" class="selectgroup-input" <?php echo e($sm->pos == 0 ? 'checked' : ''); ?>>
                            <span class="selectgroup-button">Deactive</span>
                        </label>
                    </div>
                </div>
                <?php endif; ?>
            </form>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-success" form="servingMethodStatus<?php echo e($sm->id); ?>">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/product/order/serving_methods/partials/status.blade.php ENDPATH**/ ?>