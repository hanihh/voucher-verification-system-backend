<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'distribution-voucher-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'subdistribution_id'); ?>
		<?php echo $form->dropDownList($model, 'subdistribution_id', GxHtml::listDataEx(Subdistribution::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'subdistribution_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo $form->dropDownList($model, 'type_id', GxHtml::listDataEx(VoucherType::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'type_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'expiration_date'); ?>
		<?php echo $form->textField($model, 'expiration_date'); ?>
		<?php echo $form->error($model,'expiration_date'); ?>
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
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model, 'value'); ?>
		<?php echo $form->error($model,'value'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('vouchers')); ?></label>
		<?php echo $form->checkBoxList($model, 'vouchers', GxHtml::encodeEx(GxHtml::listDataEx(Voucher::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->