<?php if(auth()->user()->hasPermission('update_admins')): ?>
<a href="<?php echo e(route('ad.admins.edit', $admin->id)); ?>" class="btn btn-warning btn-sm" title="<?php echo app('translator')->get('Edit'); ?>"><i
        class="fa fa-edit"></i> </a>
<?php endif; ?>
<?php if(auth()->user()->hasPermission('delete_admins')): ?>
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" title="<?php echo app('translator')->get('Delete'); ?>"
    data-bs-target="#delete<?php echo e($admin->id); ?>">
    <i class="fa fa-trash"></i>
</button>
<?php endif; ?>

<div class="modal fade" id="delete<?php echo e($admin->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo app('translator')->get('Delete'); ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('ad.admins.destroy', $admin->id)); ?>" method="POST">
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <p> <?php echo app('translator')->get('Delete'); ?> <span><?php echo e($admin['name']); ?></span> </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><?php echo e(__('save')); ?></button>
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal"><?php echo e(__('cancel')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php /**PATH /home/u187789736/domains/asmar-card.com/public_html/resources/views/admin/admins/action.blade.php ENDPATH**/ ?>