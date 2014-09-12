<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'error-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model, 'code', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ar_text'); ?>
		<?php echo $form->textArea($model, 'ar_text'); ?>
		<?php echo $form->error($model,'ar_text'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'en_text'); ?>
		<?php echo $form->textArea($model, 'en_text'); ?>
		<?php echo $form->error($model,'en_text'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'tr_text'); ?>
		<?php echo $form->textArea($model, 'tr_text'); ?>
		<?php echo $form->error($model,'tr_text'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->