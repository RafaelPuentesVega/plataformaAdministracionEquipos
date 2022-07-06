
<?php if(Auth::user()): ?>
            <?php echo $__env->make('modulos.cabecera', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(auth()->user()->rol == "TECNICO"): ?>
            <?php echo $__env->make('modulos.rol.menutecnico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(auth()->user()->rol == "ADMINISTRATIVO"): ?>
            <?php echo $__env->make('modulos.rol.menuadministrativo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(auth()->user()->rol == "COORDINADOR TECNICO"): ?>
            <?php echo $__env->make('modulos.rol.menucordinadortecnico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(auth()->user()->rol == "GERENTE"): ?>
            <?php echo $__env->make('modulos.rol.menugerente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
<?php else: ?>
    <?php echo $__env->yieldContent('contenido'); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\cpanelbyg\resources\views/modulos/rol/roles.blade.php ENDPATH**/ ?>