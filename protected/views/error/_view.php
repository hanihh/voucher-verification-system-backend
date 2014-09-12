<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('code')); ?>:
	<?php echo GxHtml::encode($data->code); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ar_text')); ?>:
	<?php echo GxHtml::encode($data->ar_text); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('en_text')); ?>:
	<?php echo GxHtml::encode($data->en_text); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tr_text')); ?>:
	<?php echo GxHtml::encode($data->tr_text); ?>
	<br />

</div>