<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'voucher-history-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textArea($model, 'code'); ?>
		<?php echo $form->error($model,'code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->dropDownList($model, 'action', GxHtml::listDataEx(VoucherAction::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'action'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'action_date'); ?>
		<?php echo $form->textField($model, 'action_date'); ?>
		<?php echo $form->error($model,'action_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'deleted_at'); ?>
		<?php echo $form->textField($model, 'deleted_at'); ?>
		<?php echo $form->error($model,'deleted_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'parameters'); ?>
		<?php echo $form->textArea($model, 'parameters'); ?>
		<?php echo $form->error($model,'parameters'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'result'); ?>
		<?php echo $form->textArea($model, 'result'); ?>
		<?php echo $form->error($model,'result'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->