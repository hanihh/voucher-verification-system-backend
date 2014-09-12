<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('logo_path')); ?>:
	<?php echo GxHtml::encode($data->logo_path); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('slogan_en')); ?>:
	<?php echo GxHtml::encode($data->slogan_en); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('slogan_ar')); ?>:
	<?php echo GxHtml::encode($data->slogan_ar); ?>
	<br />

</div>