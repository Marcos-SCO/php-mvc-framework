<?php

use \App\Core\Form\Form;
use \App\Models\User;

/*** @var $this \App\Core\View */
$this->title = 'Login';
?>

<h1>Login</h1>

<?php $form = Form::begin($_ENV['BASE'] . '/login', 'post') ?>

<?= $form->field($model, 'email')->emailField() ?>
<?= $form->field($model, 'password')->passwordField() ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?= Form::end() ?>