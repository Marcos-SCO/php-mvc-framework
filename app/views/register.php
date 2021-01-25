<h1>Create an account</h1>

<?php $form = \App\Core\Form\Form::begin($_ENV['BASE'] . '/register', 'post') ?>



<div class="row">
    <div class="col">
        <?= $form->field($model, 'first_name') ?>
    </div>
    <div class="col">
        <?= $form->field($model, 'last_name') ?>
    </div>
</div>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password') ?>
<?= $form->field($model, 'password_confirm') ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?= App\Core\Form\Form::end() ?>