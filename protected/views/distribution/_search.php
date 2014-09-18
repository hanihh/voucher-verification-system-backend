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
		<?php echo $form->textField($model, 'name', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'program_id'); ?>
		<?php echo $form->dropDownList($model, 'program_id', GxHtml::listDataEx(Program::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'donor_id'); ?>
		<?php echo $form->dropDownList($model, 'donor_id', GxHtml::listDataEx(Donor::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'online'); ?>
		<?php echo $form->textField($model, 'online'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_ar'); ?>
		<?php echo $form->textField($model, 'title_ar', array('maxlength' => 40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_en'); ?>
		<?php echo $form->textField($model, 'title_en', array('maxlength' => 40)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
