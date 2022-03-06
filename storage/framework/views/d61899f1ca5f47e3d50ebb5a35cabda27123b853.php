<?php $__env->startSection('content'); ?>
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <?php if(\Illuminate\Support\Facades\Session::has('success')): ?>
                    <div class="alert alert-info">
                        <?php echo e(\Illuminate\Support\Facades\Session::get('success')); ?>

                    </div>
                <?php endif; ?>
                <div class="panel-body">
                    <div><h3>Lista Empleados</h3></div>

                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="<?php echo e(route('empleado.create')); ?>" class="btn btn-success">Añadir empleado</a><br><br><br>
                        </div>
                    </div>

                    <div class="table-container">
                        <table id="tablaEmpleados" class="table table-bordered table-striped">
                            <thead>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Puesto</th>
                                <th>Estado</th>
                                <th>Activo</th>
                                <th>Moneda</th>
                                <th>Salario</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>

                            <?php if($empleados->count()): ?>
                                <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($empleado->nombre); ?></td>
                                        <td><?php echo e($empleado->edad); ?></td>
                                        <td><?php echo e($empleado->puesto); ?></td>
                                        <td><?php echo e($empleado->estado); ?></td>
                                        <!-- Funcion ternaria -->
                                        <td><?php echo e($empleado->activo == 1 ? "Si" : "No"); ?></td>
                                        <td><?php echo e($empleado->moneda); ?></td>
                                        <td><?php echo e($empleado->salario); ?></td>

                                        <td>
                                            <!-- mostrar -->
                                            <a class="btn btn-primary btn-xs" href="<?php echo e(route('empleado.show', $empleado->id)); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                            <!-- Modificar -->
                                            <a class="btn btn-primary btn-xs" href="<?php echo e(route('empleado.edit', $empleado->id)); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                            <!-- Eliminar -->
                                            <a class="btn btn-primary btn-xs" href="<?php echo e(route('empleado.delete', $empleado->id)); ?>"><span class="glyphicon glyphicon-remove"></span></a>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">No hay registros</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>