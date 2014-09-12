<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('create_date')); ?>:
	<?php echo GxHtml::encode($data->create_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('update_date')); ?>:
	<?php echo GxHtml::encode($data->update_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('registration_code')); ?>:
	<?php echo GxHtml::encode($data->registration_code); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->status)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('neighborhood_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->neighborhood)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('deleted_at')); ?>:
	<?php echo GxHtml::encode($data->deleted_at); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('remote_image')); ?>:
	<?php echo GxHtml::encode($data->remote_image); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ar_name')); ?>:
	<?php echo GxHtml::encode($data->ar_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('en_name')); ?>:
	<?php echo GxHtml::encode($data->en_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('father_name')); ?>:
	<?php echo GxHtml::encode($data->father_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('mother_name')); ?>:
	<?php echo GxHtml::encode($data->mother_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('birth_year')); ?>:
	<?php echo GxHtml::encode($data->birth_year); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('gender')); ?>:
	<?php echo GxHtml::encode($data->gender); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nationality_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->nationality)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone_number')); ?>:
	<?php echo GxHtml::encode($data->phone_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('family_member')); ?>:
	<?php echo GxHtml::encode($data->family_member); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('main_income_source')); ?>:
	<?php echo GxHtml::encode($data->main_income_source); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('combine_household')); ?>:
	<?php echo GxHtml::encode($data->combine_household); ?>
	<br />
	*/ ?>

</div>