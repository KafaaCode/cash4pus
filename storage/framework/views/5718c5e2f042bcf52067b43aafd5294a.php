

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('site.home'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('settings.settings'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('ad.settings.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        

                        <div class="row">
                            <div class="col-md-3">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.logo'); ?></label>
                                    <input type="file" name="logo" class="form-control img" accept="image/*"><br>
                                    <?php if(setting('logo')): ?>
                                        <img src="<?php echo e(display_file(setting('logo'))); ?>" class="img-thumbnail img-preview" width="100px" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('no-image.jpg')); ?>" class="img-thumbnail img-preview" width="100px" alt="">
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-3">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.fav_icon'); ?></label>
                                    <input type="file" name="fav_icon" class="form-control img2" accept="image/*"><br>
                                    <?php if(setting('fav_icon')): ?>
                                        <img src="<?php echo e(display_file(setting('fav_icon'))); ?>" class="img-thumbnail img-preview2" width="100px" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('no-image.jpg')); ?>" class="img-thumbnail img-preview2" width="100px" alt="">
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['fav_icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-3">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.website_name'); ?></label>
                                    <input type="text" name="website_name" class="form-control" value="<?php echo e(old('website_name', setting('website_name'))); ?>">
                                    <?php $__errorArgs = ['website_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-3">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.title'); ?></label>
                                    <input type="text" name="title" class="form-control" value="<?php echo e(old('title', setting('title'))); ?>">
                                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-3">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.link'); ?></label>
                                    <input type="text" name="link" class="form-control" value="<?php echo e(old('link', setting('link'))); ?>">
                                    <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-3">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.website_active'); ?></label>
                                    <select name="website_active" id="website_active" class="form-control">
                                        <option value="1" <?php echo e(old('website_active', setting('website_active')) == 1 ? 'selected' : ''); ?>><?php echo e(__('Active')); ?></option>
                                        <option value="0" <?php echo e(old('website_active', setting('website_active')) == 0 ? 'selected' : ''); ?>><?php echo e(__('Inactive')); ?></option>
                                    </select>
                                    <?php $__errorArgs = ['website_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-3">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.keywords'); ?></label>
                                    <input type="text" name="keywords" class="form-control" value="<?php echo e(old('keywords', setting('keywords'))); ?>">
                                    <?php $__errorArgs = ['keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-3">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.email'); ?></label>
                                    <input type="text" name="email" class="form-control" value="<?php echo e(old('email', setting('email'))); ?>">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="whatsup" class="small-label"><?php echo app('translator')->get('settings.whatsup'); ?></label>
                                    <input type="text" name="whatsup" id="whatsup" class="form-control" value="<?php echo e(old('whatsup', setting('whatsup'))); ?>">
                                    <?php $__errorArgs = ['whatsup'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telegram" class="small-label"><?php echo app('translator')->get('settings.telegram'); ?></label>
                                    <input type="text" name="telegram" id="telegram" class="form-control" value="<?php echo e(old('telegram', setting('telegram'))); ?>">
                                    <?php $__errorArgs = ['telegram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.description'); ?></label>
                                    <textarea name="description" class="form-control"><?php echo e(old('description', setting('description'))); ?></textarea>
                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.meta_description'); ?></label>
                                    <textarea name="meta_description" class="form-control"><?php echo e(old('meta_description', setting('meta_description'))); ?></textarea>
                                    <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.meta_keywords'); ?></label>
                                    <textarea name="meta_keywords" class="form-control"><?php echo e(old('meta_keywords', setting('meta_keywords'))); ?></textarea>
                                    <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.currencys'); ?><span class="text-danger">*</span></label>
                                    <select name="currency_id" class="form-control">
                                        <option disabled selected><?php echo e(__('select')); ?></option>
                                        <?php $__currentLoopData = $currencys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($currency->id); ?>" <?php echo e(old('currency_id', setting('currency_id')) == $currency->id ? 'selected' : ''); ?>>
                                                <?php echo e($currency->currency); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['currency_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.languages'); ?><span class="text-danger">*</span></label>
                                    <select name="language" class="form-control select2">
                                        <option disabled selected><?php echo e(__('select')); ?></option>
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($language); ?>" <?php echo e(old('language', setting('language')) == $language ? 'selected' : ''); ?>>
                                                <?php echo e($language); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['language'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('settings.timezone'); ?><span class="text-danger">*</span></label>
                                    <select name="timezone" class="form-control select2">
                                        <option disabled selected><?php echo e(__('select')); ?></option>
                                        <?php $__currentLoopData = $timezone_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($timezone); ?>" <?php echo e(old('timezone', setting('timezone')) == $timezone ? 'selected' : ''); ?>>
                                                <?php echo e($timezone); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['timezone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> <?php echo app('translator')->get('Edit'); ?></button>
                        </div>
                    </form><!-- end of form -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php if(session('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'نجاح',
            text: "<?php echo e(session('success')); ?>",
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
        });
    <?php endif; ?>

    <?php if(session('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'خطأ',
            text: "<?php echo e(session('error')); ?>",
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
        });
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Personal\Freelancer\Asmar Market\public_html_downlaod\resources\views/admin/settings/general.blade.php ENDPATH**/ ?>