<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'voucher-type-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model, 'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'deleted_at'); ?>
		<?php echo $form->textField($model, 'deleted_at'); ?>
		<?php echo $form->error($model,'deleted_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'program_id'); ?>
		<?php echo $form->dropDownList($model, 'program_id', GxHtml::listDataEx(Program::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'program_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'arabic_text'); ?>
		<?php echo $form->textField($model, 'arabic_text', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'arabic_text'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'english_text'); ?>
		<?php echo $form->textField($model, 'english_text', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'english_text'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('distributionVouchers')); ?></label>
		<?php echo $form->checkBoxList($model, 'distributionVouchers', GxHtml::encodeEx(GxHtml::listDataEx(DistributionVoucher::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->