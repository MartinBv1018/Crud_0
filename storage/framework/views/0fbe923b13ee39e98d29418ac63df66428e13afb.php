<?php $__env->startSection('content'); ?>
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <?php if(count($errors) >0): ?>
                    <div class="alert alert-warning">
                        <?php echo trans('validation.mesg_error_validate'); ?>


                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li> <?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Eliminar Empleado</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="<?php echo e(route('empleado.destroy', $empleado->id)); ?>" role="form">
                            <?php echo e(csrf_field()); ?>

                            <input name="_method" type="hidden" value="DELETE">

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-control">Nombre: <?php echo e($empleado->nombre); ?></label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-control">Puesto: <?php echo e($empleado->puesto); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-control">Edad: <?php echo e($empleado->edad); ?></label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-control">Activo: <?php echo e($empleado->activo == 1 ? 'Si': 'No'); ?></label>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-control">Moneda: <?php echo e($empleado->moneda); ?></label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-control">Salario: <?php echo e($empleado->salario); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-control">Estado: <?php echo e($empleado->estado); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" >Eliminar</button>
                                    <a href="<?php echo e(route('empleado.index')); ?>" class="btn btn-default"> Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>