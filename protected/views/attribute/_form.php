<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'attribute-form',
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
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model, 'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'valid'); ?>
		<?php echo $form->textField($model, 'valid'); ?>
		<?php echo $form->error($model,'valid'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'security_level'); ?>
		<?php echo $form->textField($model, 'security_level', array('maxlength' => 5)); ?>
		<?php echo $form->error($model,'security_level'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'family'); ?>
		<?php echo $form->checkBox($model, 'family'); ?>
		<?php echo $form->error($model,'family'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'deleted_at'); ?>
		<?php echo $form->textField($model, 'deleted_at'); ?>
		<?php echo $form->error($model,'deleted_at'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('beneficiaryAttributes')); ?></label>
		<?php echo $form->checkBoxList($model, 'beneficiaryAttributes', GxHtml::encodeEx(GxHtml::listDataEx(BeneficiaryAttribute::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->