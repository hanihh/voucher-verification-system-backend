<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'subdistribution-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model, 'code', array('maxlength' => 25)); ?>
		<?php echo $form->error($model,'code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model, 'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php echo $form->textField($model, 'end_date'); ?>
		<?php echo $form->error($model,'end_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'region_id'); ?>
		<?php echo $form->dropDownList($model, 'region_id', GxHtml::listDataEx(Community::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'region_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'distribution_id'); ?>
		<?php echo $form->dropDownList($model, 'distribution_id', GxHtml::listDataEx(Distribution::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'distribution_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->dropDownList($model, 'status_id', GxHtml::listDataEx(DistributionStatus::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'status_id'); ?>
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
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model, 'note'); ?>
		<?php echo $form->error($model,'note'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('distributionVouchers')); ?></label>
		<?php echo $form->checkBoxList($model, 'distributionVouchers', GxHtml::encodeEx(GxHtml::listDataEx(DistributionVoucher::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('vendorMobiles')); ?></label>
		<?php echo $form->checkBoxList($model, 'vendorMobiles', GxHtml::encodeEx(GxHtml::listDataEx(VendorMobile::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->