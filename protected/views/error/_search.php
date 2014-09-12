<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'code'); ?>
		<?php echo $form->textField($model, 'code', array('maxlength' => 45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ar_text'); ?>
		<?php echo $form->textArea($model, 'ar_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'en_text'); ?>
		<?php echo $form->textArea($model, 'en_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tr_text'); ?>
		<?php echo $form->textArea($model, 'tr_text'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
