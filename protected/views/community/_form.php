<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'community-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model, 'code', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'en_name'); ?>
		<?php echo $form->textField($model, 'en_name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'en_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'subdistrict_id'); ?>
		<?php echo $form->dropDownList($model, 'subdistrict_id', GxHtml::listDataEx(Subdistrict::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'subdistrict_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ar_name'); ?>
		<?php echo $form->textField($model, 'ar_name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'ar_name'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('beneficiaries')); ?></label>
		<?php echo $form->checkBoxList($model, 'beneficiaries', GxHtml::encodeEx(GxHtml::listDataEx(Beneficiary::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('subdistributions')); ?></label>
		<?php echo $form->checkBoxList($model, 'subdistributions', GxHtml::encodeEx(GxHtml::listDataEx(Subdistribution::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->