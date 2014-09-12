<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'voucher-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model, 'code', array('maxlength' => 15)); ?>
		<?php echo $form->error($model,'code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'distribution_voucher_id'); ?>
		<?php echo $form->dropDownList($model, 'distribution_voucher_id', GxHtml::listDataEx(DistributionVoucher::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'distribution_voucher_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ben_id'); ?>
		<?php echo $form->dropDownList($model, 'ben_id', GxHtml::listDataEx(Beneficiary::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'ben_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'vendor_id'); ?>
		<?php echo $form->dropDownList($model, 'vendor_id', GxHtml::listDataEx(Vendor::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'vendor_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->dropDownList($model, 'status_id', GxHtml::listDataEx(VoucherStatus::model()->findAllAttributes(null, true))); ?>
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
		<?php echo $form->labelEx($model,'redeem_date'); ?>
		<?php echo $form->textField($model, 'redeem_date'); ?>
		<?php echo $form->error($model,'redeem_date'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->