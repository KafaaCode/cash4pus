

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Dashboards'); ?> | <?php echo app('translator')->get('translation.Edit'); ?> <?php echo app('translator')->get('translation.Games'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style>
        a#add_row {
            width: 50%;
        }
        .img-old {
            margin: auto;
            text-align: center;
            padding: 5px;
        }
        .img-old img {
            max-height: 80px;

        }
        .col-md-2 {
            margin: auto;
        }
        .hr-add{
            border: 0.5px solid #c9c9c9;
            margin: 6px 5%;
            width: 80%;
        }
        .row.card-header {
            background-color: #00000008;
            margin: 0 !important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('site.home'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('translation.edit'); ?> <?php echo app('translator')->get('translation.Games'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo app('translator')->get('translation.edit'); ?> <?php echo app('translator')->get('translation.Games'); ?>   ( <?php echo e($game->title); ?>)</h4>
                    <form class="needs-validation" novalidate method="post" action="<?php echo e(route('ad.games.update',$game->id)); ?>" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for=""><?php echo app('translator')->get('levels.' . $locale . '.leveltitle'); ?><span class="text-danger">*</span></label>
                                            <input type="text" name="<?php echo e($locale); ?>[title]" class="form-control"
                                                   value="<?php echo e($game->title); ?>">
                                            <?php $__errorArgs = [$locale . '.title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger text-bold"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label"><?php echo app('translator')->get('translation.keywords'); ?> (<?php echo e($locale); ?>)</label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="<?php echo app('translator')->get('translation.keywords'); ?>"
                                               required name="<?php echo e($locale); ?>[keywords]"
                                        value="<?php echo e($game->slug); ?>">
                                        <div class="valid-feedback">
                                            <?php echo app('translator')->get('translation.validKeywords'); ?>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo app('translator')->get('translation.invalidKeywords'); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label"><?php echo app('translator')->get('translation.name_currency'); ?> (<?php echo e($locale); ?>)</label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="<?php echo app('translator')->get('translation.name_currency'); ?>"
                                               required name="<?php echo e($locale); ?>[name_currency]" value="<?php echo e($game->name_currency); ?>">
                                        <div class="valid-feedback">
                                            <?php echo app('translator')->get('translation.validName_currency'); ?>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo app('translator')->get('translation.validName_currency'); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.price_qty'); ?></label>
                                    <input type="number" class="form-control" id="validationCustom02" placeholder="<?php echo app('translator')->get('translation.price_qty'); ?>"
                                           required name="price_qty" step="any" value="<?php echo e($game->price_qty); ?>">
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validPrice_qty'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidPrice_qty'); ?>.
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">
                                        نص حقل الادخال</label>
                                    <input type="text" class="form-control" id="validationCustom02" placeholder="اختياري"
                                        name="labelText" value="<?php echo e($game->labelText); ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                <label for="description" class="form-label">وصف المنتج</label>
                                <textarea class="form-control" id="description" placeholder="اختياري" name="description"><?php echo e(old('description', $game->description)); ?></textarea>
                            </div>

                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="categories" class="form-label">
                                    الفئة
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="category_id" id="categories" required>
                                        <option value="">اختر فئة </option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option 
                                                value="<?php echo e($category->id); ?>" 
                                                <?php echo e(old('category_id', $game->category_id) == $category->id ? 'selected' : ''); ?>

                                            >
                                                <?php echo e($category->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['category_id'];
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
                                    <label><?php echo app('translator')->get('banks.image'); ?></label>
                                    <input type="file" name="image" class="form-control">
                                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <?php if(isset($bank->image)): ?>
                                    <img src="<?php echo e(asset('uploads/banks/' . $bank->image)); ?>" alt="bank image" width="100">
                                <?php endif; ?>
                            </div>


                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.min_qty'); ?></label>
                                    <input type="number" class="form-control" id="validationCustom02" placeholder="<?php echo app('translator')->get('translation.min_qty'); ?>"
                                           required name="min_qty" value="<?php echo e($game->min_qty); ?>">
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validMin_qty'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidMin_qty'); ?>.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?php echo e($game->id); ?>">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label"><?php echo app('translator')->get('translation.Status'); ?></label>
                                    <select class="form-select" id="validationCustom03" required name="is_active">
                                        <option  disabled value=""> <?php echo app('translator')->get('translation.Choose'); ?></option>
                                        <option value="1" <?php if($game->is_active): ?> selected <?php endif; ?> ><?php echo app('translator')->get('translation.active'); ?></option>
                                        <option value="0"<?php if(!$game->is_active): ?>selected  <?php endif; ?> ><?php echo app('translator')->get('translation.unactive'); ?></option>
                                    </select>
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validStatus'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidStatus'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">على مدار الساعة؟</label>
                                    <select class="form-select" id="validationCustom03" required name="houre">
                                        <option  disabled value=""> <?php echo app('translator')->get('translation.Choose'); ?></option>
                                        <option value="1" <?php if($game->houre): ?> selected <?php endif; ?> ><?php echo app('translator')->get('translation.active'); ?></option>
                                        <option value="0"<?php if(!$game->houre): ?>selected  <?php endif; ?> ><?php echo app('translator')->get('translation.unactive'); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label"><?php echo app('translator')->get('translation.is_show'); ?></label>
                                    <select class="form-select" id="validationCustom03" required name="is_show">
                                        <option selected disabled value=""> <?php echo app('translator')->get('translation.Choose'); ?></option>
                                        <option value="1" <?php if($game->is_show): ?> selected <?php endif; ?> ><?php echo app('translator')->get('translation.show'); ?></option>
                                        <option value="0"  <?php if(!$game->is_show): ?> selected <?php endif; ?> ><?php echo app('translator')->get('translation.hide'); ?></option>
                                    </select>
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validIs_show'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidIs_show'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check" >
                                        <input class="form-check-input" type="checkbox"  id="need_id_player"  <?php if($game->need_id_player): ?> checked <?php endif; ?> name="need_id_player" value="1" >

                                        <label class="form-check-label" for="need_id_player" >
                                            <?php echo app('translator')->get('translation.need_id_player'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check" >
                                        <input class="form-check-input" type="checkbox"  id="need_name_player" name="need_name_player"   <?php if($game->need_name_player): ?> checked <?php endif; ?> value="1" >

                                        <label class="form-check-label" for="need_name_player">
                                            <?php echo app('translator')->get('translation.need_name_player'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="last_row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check " >
                                        <input class="form-check-input" type="checkbox"   <?php if($game->have_packages): ?> checked <?php endif; ?>  id="background_package" name="have_packages" value="1" >

                                        <label class="form-check-label" for="background_package">
                                            <?php echo app('translator')->get('translation.have_packages'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row"   <?php if(!$game->have_packages): ?> style="display: none" <?php endif; ?>  id="btn_add">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.background_package'); ?></label>
                                    <input type="file" class="form-control" id="validationCustom02" placeholder="background package"
                                            name="background_package">
                                    <?php if($game->getFirstMediaUrl('background_package')): ?>
                                        <div class="img-old">
                                            <img src="<?php echo e($game->getFirstMediaUrl('background_package')); ?>" >
                                        </div>
                                    <?php endif; ?>
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validBackground_package'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.validBackground_package'); ?>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <a class="btn btn-outline-success float-end"  id="add_row">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                            <div class="col-md-12 row " id="div-append">
                                <?php if($game->have_packages): ?>
                                    <?php $__currentLoopData = $game->packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <input type="hidden" name="old_packages[]"  value="<?php echo e($package->id); ?>">
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.price_qty'); ?></label>
                                                    <input type="number" class="form-control" id="validationCustom02"
                                                           required name="price_qty_package[]" step="any" value="<?php echo e($package->price); ?>">
                                                    <div class="valid-feedback">
                                                        <?php echo app('translator')->get('translation.validPrice_qty'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.quantity'); ?></label>
                                                    <input type="number" class="form-control" id="validationCustom02"
                                                           required name="quantity_package[]"  value="<?php echo e($package->quantity); ?>">
                                                    <div class="valid-feedback">
                                                        <?php echo app('translator')->get('translation.validQuantity'); ?>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        <?php echo app('translator')->get('translation.invalidQuantity'); ?>.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="validationCustom03" class="form-label"><?php echo app('translator')->get('translation.Status'); ?></label>
                                                    <select class="form-select" id="validationCustom03" required name="is_active_package[]">
                                                        <option  disabled > <?php echo app('translator')->get('translation.Choose'); ?></option>
                                                        <option value="1" <?php if($package->is_active): ?> selected <?php endif; ?> ><?php echo app('translator')->get('translation.active'); ?></option>
                                                        <option value="0"<?php if(!$package->is_active): ?>selected  <?php endif; ?> ><?php echo app('translator')->get('translation.unactive'); ?></option>
                                                    </select>
                                                    <div class="valid-feedback">
                                                        <?php echo app('translator')->get('translation.validStatus'); ?>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        <?php echo app('translator')->get('translation.invalidStatus'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a class="btn btn-outline-danger"
                                                   id="delete_row">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                            <hr class="hr-add">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo app('translator')->get('translation.Provider'); ?> <?php echo app('translator')->get('translation.Settings'); ?></h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="provider_type" class="form-label"><?php echo app('translator')->get('translation.Provider_Type'); ?></label>
                                                    <select class="form-select" id="provider_type" name="provider_type" required>
                                                        <option value="manual" <?php echo e(is_null($game->provider_id) ? 'selected' : ''); ?>><?php echo app('translator')->get('translation.Manual'); ?></option>
                                                        <option value="auto" <?php echo e(!is_null($game->provider_id) ? 'selected' : ''); ?>><?php echo app('translator')->get('translation.Auto'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 provider-dependent" style="<?php echo e(is_null($game->provider_id) ? 'display: none;' : ''); ?>">
                                                <div class="mb-3">
                                                    <label for="provider_id" class="form-label"><?php echo app('translator')->get('translation.Provider'); ?></label>
                                                    <select class="form-select" id="provider_id" name="provider_id">
                                                        <option value=""><?php echo app('translator')->get('translation.Choose'); ?></option>
                                                        <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($provider->id); ?>" <?php echo e($game->provider_id == $provider->id ? 'selected' : ''); ?>>
                                                                <?php echo e($provider->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4 provider-dependent" style="<?php echo e(is_null($game->provider_id) ? 'display: none;' : ''); ?>">
                                                <div class="mb-3">
                                                    <label for="provider_game_id" class="form-label"><?php echo app('translator')->get('translation.Provider_Game'); ?></label>
                                                    <select class="form-select" id="provider_game_id" name="provider_game_id">
                                                        <option value=""><?php echo app('translator')->get('translation.Choose'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <br>
                        <div class="mt-5 text-center m-auto">
                            <button class="btn btn-primary" type="submit"><?php echo app('translator')->get('translation.edit'); ?></button>
                        </div>
                    </form>
                    <div class=" d-none"  id="PackageForm-black">
                        <div class="item row d-none"    >
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.price_qty'); ?></label>
                                    <input type="number" class="form-control" id="validationCustom02"
                                           required name="price_qty_package[]" step="any">
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validPrice_qty'); ?>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.quantity'); ?></label>
                                    <input type="number" class="form-control" id="validationCustom02"
                                           required name="quantity_package[]">
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validQuantity'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidQuantity'); ?>.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label"><?php echo app('translator')->get('translation.Status'); ?></label>
                                    <select class="form-select" id="validationCustom03" required name="is_active_package[]">
                                        <option selected disabled value=""> <?php echo app('translator')->get('translation.Choose'); ?></option>
                                        <option value="1" ><?php echo app('translator')->get('translation.active'); ?></option>
                                        <option value="0" ><?php echo app('translator')->get('translation.unactive'); ?></option>
                                    </select>
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validStatus'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidStatus'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <a class="btn btn-outline-danger"
                                   id="delete_row">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <hr class="hr-add">
                        </div>
                    </div>
                </div>
            </div>
        </div> 

    </div>
<?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <script src="<?php echo e(URL::asset('build/libs/parsleyjs/parsley.min.js')); ?>"></script>

        <script src="<?php echo e(URL::asset('/build/js/pages/form-validation.init.js')); ?>"></script>

    <script>

        $(document).ready(function () {
            $("#need_name_player").change(function () {
                if (this.checked) {
                    $("#show_input_name_player").attr("type", 'text');
                } else {
                    $("#show_input_name_player").attr("type", 'hidden');
                    $("#show_input_name_player").val("");
                }
            });
            $("#need_id_player").change(function () {
                if (this.checked) {
                    $("#show_input_id_player").attr("type", 'text');
                } else {
                    $("#show_input_id_player").attr("type", 'hidden');
                    $("#show_input_id_player").val('');

                    ///clear input  id player   when uncheck

                }
            });

            $("#background_package").change(function () {
                if (this.checked) {
                    var row = $("#PackageForm-black .item").clone();
                    /// append the row row= row.removeClass('d-none')
                     row= row.removeClass('d-none')
                    $('#div-append').append(row);
                    $("#btn_add").css('display','');
                } else {
                    $("#btn_add").css('display','none');

                }
            });
            var i = 1;

            $(document).on("click",'#add_row', function () {


                // clone the row
                var row = $("#PackageForm-black .item").clone();
                row= row.removeClass('d-none')
                /// append the row
                $('#div-append').append(row);

            });
            $(document).on('click', '#delete_row', function () {
                $(this).parent().parent().remove();

            })

            // Provider type change handler
            $("#provider_type").change(function() {
                if ($(this).val() === 'auto') {
                    $(".provider-dependent").show();
                } else {
                    $(".provider-dependent").hide();
                    $("#provider_id").val('');
                    $("#provider_game_id").val('');
                }
            });

            // Provider change handler
            $("#provider_id").change(function() {
                var provider = $(this).val();
                if (provider) {
                    $.ajax({
                        url: '<?php echo e(route("ad.games.fetch-products")); ?>',
                        type: 'GET',
                        data: {
                            provider: provider
                        },
                        success: function(response) {
                            var gameSelect = $("#provider_game_id");
                            gameSelect.empty();
                            gameSelect.append('<option value=""><?php echo app('translator')->get("translation.Choose"); ?></option>');
                            
                            try {
                                if (Array.isArray(response)) {
                                    response.forEach(function(item) {
                                        if (item && item.id && item.name) {
                                            gameSelect.append(
                                                $('<option>', {
                                                    value: item.id,
                                                    text: item.name + ' - ' + item.price,
                                                })
                                            );
                                        }
                                    });
                                } else if (response.data && Array.isArray(response.data)) {
                                    response.data.forEach(function(item) {
                                        if (item && item.id && item.name) {
                                            gameSelect.append(
                                                $('<option>', {
                                                    value: item.id,
                                                    text: item.name
                                                })
                                            );
                                        }
                                    });
                                }
                            } catch (e) {
                                console.error('Error parsing response:', e);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching games:', error);
                            gameSelect.empty();
                            gameSelect.append('<option value=""><?php echo app('translator')->get("translation.Choose"); ?></option>');
                        }
                    });
                } else {
                    $("#provider_game_id").empty();
                    $("#provider_game_id").append('<option value=""><?php echo app('translator')->get("translation.Choose"); ?></option>');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>



























<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Personal\Freelancer\Asmar Market\public_html_downlaod\resources\views/admin/games/edit.blade.php ENDPATH**/ ?>