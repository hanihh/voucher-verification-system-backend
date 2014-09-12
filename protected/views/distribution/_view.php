<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('program_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->program)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('donor_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->donor)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('online')); ?>:
	<?php echo GxHtml::encode($data->online); ?>
	<br />

</div>