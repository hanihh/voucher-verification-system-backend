<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_date')); ?>:
	<?php echo GxHtml::encode($data->create_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('deleted_at')); ?>:
	<?php echo GxHtml::encode($data->deleted_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('arabic_msg')); ?>:
	<?php echo GxHtml::encode($data->arabic_msg); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('english_msg')); ?>:
	<?php echo GxHtml::encode($data->english_msg); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('turkish_text')); ?>:
	<?php echo GxHtml::encode($data->turkish_text); ?>
	<br />
	*/ ?>

</div>