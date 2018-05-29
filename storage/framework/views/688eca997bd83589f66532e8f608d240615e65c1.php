<?php $__env->startSection('header'); ?>
	<?php echo $__env->make('layouts.header', ['some' => 'data'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('cursos.faculdade', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<?php echo $__env->make('layouts.footer', ['some' => 'data'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', ['title' => 'ME SALVA AI'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>