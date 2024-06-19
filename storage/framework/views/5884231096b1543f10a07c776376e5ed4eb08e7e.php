<?php
     use App\Http\Helpers\Uploader;
      use App\Constants\Constant;
?>


<?php echo $__env->make('user.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title">Sitemap</h4>
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
        <a href="#">Sitemap</a>
      </li>

    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-title d-inline-block">Sitemap</div>
                </div>
                <div class="col-lg-3">

                </div>
                <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                    <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus"></i> Add Sitemap</a>
                </div>
            </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($sitemaps) == 0): ?>
                <h3 class="text-center">NO SITEMAP FOUND</h3>
              <?php else: ?>
              <div class="table-responsive">
                <table class="table table-striped mt-3">
                  <thead>
                    <tr>
                      <th scope="col">File Name</th>
                      <th scope="col">Sitemap Url</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $sitemaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sitemap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($sitemap->filename); ?></td>
                        <td>

                             <a href="<?php echo e(Uploader::getImageUrl(Constant::WEBSITE_TENANT_SITEMAP_FILE, $sitemap->filename, $userBs)); ?>" target="_blank">
                                Sitemap
                            </a>
                        </td>
                        <td>
                          <form class="d-inline-block" action="<?php echo e(route('user.sitemap.download', $sitemap->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="filename" value="<?php echo e($sitemap->filename); ?>">
                            <button type="submit" class="btn btn-secondary my-2 btn-sm">
                              <span class="btn-label">
                                <i class="fas fa-arrow-alt-circle-down"></i>
                              </span>
                              
                            </button>
                          </form>
                          <form class="deleteform d-inline-block" action="<?php echo e(route('user.sitemap.delete', $sitemap->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
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


  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Sitemap</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="ajaxForm" class="modal-form create" action="<?php echo e(route('user.sitemap.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="filename">

             <div class="form-group">
                <label for="">Sitemap Url **</label>
                <input type="text" class="form-control" name="sitemap_url" placeholder="Enter Sitemap Url">
                <p id="errsitemap_url" class="mb-0 text-danger em"></p>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="submitBtn" type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/sitemap/index.blade.php ENDPATH**/ ?>