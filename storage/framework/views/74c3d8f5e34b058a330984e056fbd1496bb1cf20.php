<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Payment Gateways')); ?></h4>
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
                <a href="#"><?php echo e(__('Payment Gateways')); ?></a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <form action="<?php echo e(route('user.paypal.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-title"><?php echo e(__('Paypal')); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-5 pb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><?php echo e(__('Paypal')); ?></label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" <?php echo e(isset($paypal) && $paypal->status == 1 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button"><?php echo e(__('Active')); ?></span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input" <?php echo e(!isset($paypal) || $paypal->status == 0 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button"><?php echo e(__('Deactive')); ?></span>
                                        </label>
                                    </div>
                                </div>
                                <?php
                                    $paypalInfo = isset($paypal->information) ? json_decode($paypal->information, true) : null;

                                ?>
                                <div class="form-group">
                                    <label><?php echo e(__('Paypal Test Mode')); ?></label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="sandbox_check" value="1" class="selectgroup-input" <?php echo e(isset($paypalInfo) && $paypalInfo["sandbox_check"] == 1 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button"><?php echo e(__('Active')); ?></span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="sandbox_check" value="0" class="selectgroup-input" <?php echo e(!isset($paypalInfo) || $paypalInfo["sandbox_check"] == 0 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button"><?php echo e(__('Deactive')); ?></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__('Paypal Client ID')); ?></label>
                                    <input class="form-control" name="client_id" value="<?php echo e(isset($paypalInfo) ? $paypalInfo["client_id"] : null); ?>">
                                    <?php if($errors->has('client_id')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('client_id')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__('Paypal Client Secret')); ?></label>
                                    <input class="form-control" name="client_secret" value="<?php echo e(isset($paypalInfo) ? $paypalInfo["client_secret"] : null); ?>">
                                    <?php if($errors->has('client_secret')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('client_secret')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form">
                            <div class="form-group from-show-notify row">
                                <div class="col-12 text-center">
                                    <button type="submit" id="displayNotif" class="btn btn-success"><?php echo e(__('Update')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="card">
                <form class="" action="<?php echo e(route('user.stripe.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-title">Stripe</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-5 pb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    $stripeInfo = isset($stripe) ? json_decode($stripe->information, true) : null;
                                ?>
                                <div class="form-group">
                                    <label>Stripe</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" <?php echo e(isset($stripe) && $stripe->status == 1 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Active</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input" <?php echo e(!isset($stripe) || $stripe->status == 0 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Deactive</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Stripe Key</label>
                                    <input class="form-control" name="key" value="<?php echo e(isset($stripeInfo) ? $stripeInfo['key'] : null); ?>">
                                    <?php if($errors->has('key')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('key')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Stripe Secret</label>
                                    <input class="form-control" name="secret" value="<?php echo e(isset($stripeInfo) ? $stripeInfo['secret'] : null); ?>">
                                    <?php if($errors->has('secret')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('secret')); ?></p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form">
                            <div class="form-group from-show-notify row">
                                <div class="col-12 text-center">
                                    <button type="submit" id="displayNotif" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="card">
                <form class="" action="<?php echo e(route('user.paytm.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-title">Paytm</div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body pt-5 pb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    $paytmInfo = isset($paytm) ? json_decode($paytm->information, true) : null;
                                ?>
                                <div class="form-group">
                                    <label>Paytm</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" <?php echo e(isset($paytm) && $paytm->status == 1 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Active</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input" <?php echo e(!isset($paytm) || $paytm->status == 0 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Deactive</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Paytm Environment</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input
                                                type="radio"
                                                name="environment"
                                                value="local"
                                                class="selectgroup-input"
                                                <?php echo e(!isset($paytmInfo) || $paytmInfo['environment'] != 'production' ? 'checked' : ''); ?>

                                            >
                                            <span class="selectgroup-button"><?php echo e(__('Local')); ?></span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input
                                                type="radio"
                                                name="environment"
                                                value="production"
                                                class="selectgroup-input"
                                                <?php echo e(isset($paytmInfo) && $paytmInfo['environment'] == 'production' ? 'checked' : ''); ?>

                                            >
                                            <span class="selectgroup-button"><?php echo e(__('Production')); ?></span>
                                        </label>
                                    </div>
                                    <?php if($errors->has('environment')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('environment')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Paytm Merchant Key</label>
                                    <input class="form-control" name="secret" value="<?php echo e(isset($paytmInfo) ? $paytmInfo['secret'] : null); ?>">
                                    <?php if($errors->has('secret')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('secret')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Paytm Merchant mid</label>
                                    <input class="form-control" name="merchant" value="<?php echo e(isset($paytmInfo) ? $paytmInfo['merchant'] : null); ?>">
                                    <?php if($errors->has('merchant')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('merchant')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Paytm Merchant website</label>
                                    <input class="form-control" name="website" value="<?php echo e(isset($paytmInfo) ? $paytmInfo['website'] : null); ?>">
                                    <?php if($errors->has('website')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('website')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Industry type id</label>
                                    <input class="form-control" name="industry" value="<?php echo e(isset($paytmInfo) ? $paytmInfo['industry'] : null); ?>">
                                    <?php if($errors->has('industry')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('industry')); ?></p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form">
                            <div class="form-group from-show-notify row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="card">
                <form class="" action="<?php echo e(route('user.instamojo.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-title">Instamojo</div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body pt-5 pb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    $instamojoInfo = isset($instamojo) ? json_decode($instamojo->information, true) : null;
                                ?>
                                <div class="form-group">
                                    <label>Instamojo</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" <?php echo e(isset($instamojo) && $instamojo->status == 1 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Active</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input" <?php echo e(!isset($instamojo) || $instamojo->status == 0 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Deactive</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Test Mode</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="sandbox_check" value="1" class="selectgroup-input" <?php echo e(isset($instamojoInfo) && $instamojoInfo['sandbox_check'] == 1 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Active</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="sandbox_check" value="0" class="selectgroup-input" <?php echo e(!isset($instamojoInfo) || $instamojoInfo['sandbox_check'] == 0 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Deactive</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Instamojo API Key</label>
                                    <input class="form-control" name="key" value="<?php echo e(isset($instamojoInfo) ? $instamojoInfo['key'] : null); ?>">
                                    <?php if($errors->has('key')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('key')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Instamojo Auth Token</label>
                                    <input class="form-control" name="token" value="<?php echo e(isset($instamojoInfo) ? $instamojoInfo['token'] : null); ?>">
                                    <?php if($errors->has('token')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('token')); ?></p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form">
                            <div class="form-group from-show-notify row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="card">
                <form class="" action="<?php echo e(route('user.paystack.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-title">Paystack</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-5 pb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    $paystackInfo = isset($paystack) ? json_decode($paystack->information, true) : null;
                                ?>
                                <div class="form-group">
                                    <label>Paystack</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" <?php echo e(isset($paystack) && $paystack->status == 1 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Active</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input" <?php echo e(!isset($paystack) || $paystack->status == 0 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Deactive</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Paystack Secret Key</label>
                                    <input class="form-control" name="key" value="<?php echo e(isset($paystackInfo) ? $paystackInfo['key'] : null); ?>">
                                    <?php if($errors->has('key')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('key')); ?></p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form">
                            <div class="form-group from-show-notify row">
                                <div class="col-12 text-center">
                                    <button type="submit" id="displayNotif" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="card">
                <form class="" action="<?php echo e(route('user.flutterwave.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-title">Flutterwave</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-5 pb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    $flutterwaveInfo = isset($flutterwave) ? json_decode($flutterwave->information, true) : null;
                                ?>
                                <div class="form-group">
                                    <label>Flutterwave</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" <?php echo e(isset($flutterwave) && $flutterwave->status == 1 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Active</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input" <?php echo e(!isset($flutterwave) || $flutterwave->status == 0 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Deactive</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Flutterwave Public Key</label>
                                    <input class="form-control" name="public_key" value="<?php echo e(isset($flutterwaveInfo) ? $flutterwaveInfo['public_key'] : null); ?>">
                                    <?php if($errors->has('public_key')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('public_key')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Flutterwave Secret Key</label>
                                    <input class="form-control" name="secret_key" value="<?php echo e(isset($flutterwaveInfo) ? $flutterwaveInfo['secret_key'] : null); ?>">
                                    <?php if($errors->has('secret_key')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('secret_key')); ?></p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form">
                            <div class="form-group from-show-notify row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <form class="" action="<?php echo e(route('user.mollie.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-title">Mollie Payment</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-5 pb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    $mollieInfo = isset($mollie) ? json_decode($mollie->information, true) : null;
                                ?>
                                <div class="form-group">
                                    <label>Mollie Payment</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" <?php echo e(isset($mollie) && $mollie->status == 1 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Active</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input" <?php echo e(!isset($mollie) || $mollie->status == 0 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Deactive</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Mollie Payment Key</label>
                                    <input class="form-control" name="key" value="<?php echo e(isset($mollieInfo) ? $mollieInfo['key'] : null); ?>">
                                    <?php if($errors->has('key')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('key')); ?></p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form">
                            <div class="form-group from-show-notify row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <form class="" action="<?php echo e(route('user.razorpay.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-title">Razorpay</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-5 pb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    $razorpayInfo = isset($razorpay) ? json_decode($razorpay->information, true) : null;
                                ?>
                                <div class="form-group">
                                    <label>Razorpay</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" <?php echo e(isset($razorpay) && $razorpay->status == 1 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Active</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input" <?php echo e(!isset($razorpay) || $razorpay->status == 0 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Deactive</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Razorpay Key</label>
                                    <input class="form-control" name="key" value="<?php echo e(isset($razorpayInfo) ? $razorpayInfo['key'] : null); ?>">
                                    <?php if($errors->has('key')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('key')); ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Razorpay Secret</label>
                                    <input class="form-control" name="secret" value="<?php echo e(isset($razorpayInfo) ? $razorpayInfo['secret'] : null); ?>">
                                    <?php if($errors->has('secret')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('secret')); ?></p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form">
                            <div class="form-group from-show-notify row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <form class="" action="<?php echo e(route('user.anet.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-title">Authorize.Net</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-5 pb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    $anetInfo = isset($anet) ? json_decode($anet->information, true) : null;
                                ?>
                                <div class="form-group">
                                    <label>Authorize.Net</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" <?php echo e(isset($anet) && $anet->status == 1 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Active</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input" <?php echo e(!isset($anet) || $anet->status == 0 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Deactive</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Authorize.Net Test Mode</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="sandbox_check" value="1" class="selectgroup-input" <?php echo e(isset($anetInfo) && $anetInfo['sandbox_check'] == 1 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Active</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="sandbox_check" value="0" class="selectgroup-input" <?php echo e(!isset($anetInfo) || $anetInfo['sandbox_check'] == 0 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button">Deactive</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>API Login ID</label>
                                    <input class="form-control" name="login_id" value="<?php echo e(isset($anetInfo) ? $anetInfo['login_id'] : null); ?>">
                                    <?php if($errors->has('login_id')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('login_id')); ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Transaction Key</label>
                                    <input class="form-control" name="transaction_key" value="<?php echo e(isset($anetInfo) ? $anetInfo['transaction_key'] : null); ?>">
                                    <?php if($errors->has('transaction_key')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('transaction_key')); ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Public Client Key</label>
                                    <input class="form-control" name="public_key" value="<?php echo e(isset($anetInfo) ? $anetInfo['public_key'] : null); ?>">
                                    <?php if($errors->has('public_key')): ?>
                                        <p class="mb-0 text-danger"><?php echo e($errors->first('public_key')); ?></p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form">
                            <div class="form-group from-show-notify row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <form class="" action="<?php echo e(route('user.mercadopago.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-title">Mercadopago</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-5 pb-5">
                        <?php
                            $mercadopagoInfo = isset($mercadopago) ? json_decode($mercadopago->information, true) : null;
                        ?>
                        <div class="form-group">
                            <label>Mercado Pago</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="1" class="selectgroup-input" <?php echo e(isset($mercadopago) && $mercadopago->status == 1 ? 'checked' : ''); ?>>
                                    <span class="selectgroup-button">Active</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="0" class="selectgroup-input" <?php echo e(!isset($mercadopago) || $mercadopago->status == 0 ? 'checked' : ''); ?>>
                                    <span class="selectgroup-button">Deactive</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Mercado Pago Test Mode</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="sandbox_check" value="1" class="selectgroup-input" <?php echo e(isset($mercadopagoInfo) && $mercadopagoInfo["sandbox_check"] == 1 ? 'checked' : ''); ?>>
                                    <span class="selectgroup-button">Active</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="sandbox_check" value="0" class="selectgroup-input" <?php echo e(!isset($mercadopagoInfo) || $mercadopagoInfo["sandbox_check"] == 0 ? 'checked' : ''); ?>>
                                    <span class="selectgroup-button">Deactive</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Mercadopago Token</label>
                            <input class="form-control" name="token" value="<?php echo e(isset($mercadopagoInfo) ? $mercadopagoInfo['token'] : null); ?>">
                            <?php if($errors->has('token')): ?>
                                <p class="mb-0 text-danger"><?php echo e($errors->first('token')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form">
                            <div class="form-group from-show-notify row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cpftxworld/myludhiana.in/resources/views/user/gateways/index.blade.php ENDPATH**/ ?>