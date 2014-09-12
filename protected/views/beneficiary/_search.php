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
		<?php echo $form->label($model, 'create_date'); ?>
		<?php echo $form->textField($model, 'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'update_date'); ?>
		<?php echo $form->textField($model, 'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'registration_code'); ?>
		<?php echo $form->textField($model, 'registration_code', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'status_id'); ?>
		<?php echo $form->dropDownList($model, 'status_id', GxHtml::listDataEx(BeneficiaryStatus::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'neighborhood_id'); ?>
		<?php echo $form->dropDownList($model, 'neighborhood_id', GxHtml::listDataEx(Community::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'deleted_at'); ?>
		<?php echo $form->textField($model, 'deleted_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'remote_image'); ?>
		<?php echo $form->textArea($model, 'remote_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ar_name'); ?>
		<?php echo $form->textField($model, 'ar_name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'en_name'); ?>
		<?php echo $form->textField($model, 'en_name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'father_name'); ?>
		<?php echo $form->textField($model, 'father_name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'mother_name'); ?>
		<?php echo $form->textField($model, 'mother_name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'birth_year'); ?>
		<?php echo $form->textField($model, 'birth_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'gender'); ?>
		<?php echo $form->dropDownList($model, 'gender', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nationality_id'); ?>
		<?php echo $form->dropDownList($model, 'nationality_id', GxHtml::listDataEx(Nationality::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'phone_number'); ?>
		<?php echo $form->textField($model, 'phone_number', array('maxlength' => 15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'family_member'); ?>
		<?php echo $form->textField($model, 'family_member'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'main_income_source'); ?>
		<?php echo $form->textField($model, 'main_income_source', array('maxlength' => 27)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'combine_household'); ?>
		<?php echo $form->textField($model, 'combine_household', array('maxlength' => 22)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
