<?php 
/*** @var $this \App\Core\View */
$this->title = $exception->getCode() . ' ' . $exception->getMessage();
?>
<h3><?= $exception->getCode() ?> - <?= $exception->getMessage() ?></h3>