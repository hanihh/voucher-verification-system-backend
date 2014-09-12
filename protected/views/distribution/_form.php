<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'distribution-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'program_id'); ?>
		<?php echo $form->dropDownList($model, 'program_id', GxHtml::listDataEx(Program::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'program_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'donor_id'); ?>
		<?php echo $form->dropDownList($model, 'donor_id', GxHtml::listDataEx(Donor::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'donor_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'online'); ?>
		<?php echo $form->textField($model, 'online'); ?>
		<?php echo $form->error($model,'online'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('subdistributions')); ?></label>
		<?php echo $form->checkBoxList($model, 'subdistributions', GxHtml::encodeEx(GxHtml::listDataEx(Subdistribution::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->