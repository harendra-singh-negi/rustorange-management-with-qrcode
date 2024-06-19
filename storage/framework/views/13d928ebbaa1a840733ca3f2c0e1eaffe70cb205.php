<?php if(!empty($abs->language) && $abs->language->rtl == 1): ?>
<?php $__env->startSection('styles'); ?>
<style>
    form input,
    form textarea,
    form select,
    select {
        direction: rtl;
    }
    form .note-editor.note-frame .note-editing-area .note-editable {
        direction: rtl;
        text-align: right;
    }
</style>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <h4 class="page-title">Form Builder</h4>
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
        <a href="#">Reservation Settings</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Form Builder</a>
      </li>
    </ul>
  </div>

  <div class="row" id="app">
    <div class="col-lg-7">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card-title">Input Fields</div>
                </div>
                <div class="col-lg-4">
                    <?php if(!empty($userLangs)): ?>
                        <select name="language" class="form-control" onchange="window.location='<?php echo e(url()->current() . '?language='); ?>'+this.value">
                            <option value="" selected disabled>Select a Language</option>
                            <?php $__currentLoopData = $userLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lang->code); ?>" <?php echo e($lang->code == request()->input('language') ? 'selected' : ''); ?>><?php echo e($lang->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p class="text-warning mb-0">** Do not create <strong class="text-danger">Name & Email</strong> input field, it will be in the Table Reservation form by default.</p>
            <p class="text-warning">** Drag & Drop the input fields to change the order number</p>

            <form class="ui-state-default ui-state-disabled">
                <div class="form-group">
                    <label for="">Name **</label>
                    <div class="row">
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="" value="" placeholder="Full Name">
                        </div>
                    </div>
                </div>
            </form>
            <form class="ui-state-default ui-state-disabled">
                <div class="form-group">
                    <label for="">Email Address **</label>
                    <div class="row">
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="" value="" placeholder="Email Address">
                        </div>
                    </div>

                </div>
            </form>
            <?php if(count($inputs) > 0): ?>
                <div id="sortable">
                    <?php if ($__env->exists('user.reservations.created-inputs')) echo $__env->make('user.reservations.created-inputs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>

        </div>
      </div>
    </div>

    <div class="col-lg-5">
        <?php if ($__env->exists('user.reservations.create-input')) echo $__env->make('user.reservations.create-input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
       var orderUpdateRoute = "<?php echo e(route('user.reservation.orderUpdate')); ?>"
    </script>
     <script src="<?php echo e(asset('assets/tenant/js/blade.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('vuescripts'); ?>
  <script src="<?php echo e(asset('assets/tenant/js/vue_blade.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/reservations/form.blade.php ENDPATH**/ ?>