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
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'logo_path'); ?>
		<?php echo $form->textArea($model, 'logo_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'slogan_en'); ?>
		<?php echo $form->textArea($model, 'slogan_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'slogan_ar'); ?>
		<?php echo $form->textArea($model, 'slogan_ar'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
