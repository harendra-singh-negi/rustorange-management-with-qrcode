<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title">Roles</h4>
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
        <a href="#">Admins Management</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Roles Management</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">Roles</div>
          <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus"></i> Add Role</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($roles) == 0): ?>
                <h3 class="text-center">NO ROLE FOUND</h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Permissions</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td><?php echo e($role->name); ?></td>
                          <td>
                            <a class="btn btn-info btn-sm editbtn" href="<?php echo e(route('user.role.permissions.manage', $role->id)); ?>">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              Manage
                            </a>
                          </td>
                          <td>
                            <a class="btn btn-secondary my-2 btn-sm editbtn" href="#editModal" data-toggle="modal" data-role_id="<?php echo e($role->id); ?>" data-name="<?php echo e($role->name); ?>">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              
                            </a>
                            <form class="deleteform d-inline-block" action="<?php echo e(route('user.role.delete')); ?>" method="post">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="role_id" value="<?php echo e($role->id); ?>">
                              <button type="submit" class="btn btn-danger btn-sm deletebtn">
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



  <?php if ($__env->exists('user.role.create')) echo $__env->make('user.role.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php if ($__env->exists('user.role.edit')) echo $__env->make('user.role.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/role/index.blade.php ENDPATH**/ ?>