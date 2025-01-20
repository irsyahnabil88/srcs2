<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lecturer $lecturer
 * @var string[]|\Cake\Collection\CollectionInterface $faculties
 */
?>
<!--Header-->
<div class="row text-body-secondary">
	<div class="col-10">
		<h1 class="my-0 page_title"><?php echo $title; ?></h1>
		<h6 class="sub_title text-body-secondary"><?php echo $system_name; ?></h6>
	</div>
	<div class="col-2 text-end">
		<div class="dropdown mx-3 mt-2">
			<button class="btn p-0 border-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa-solid fa-bars text-primary"></i>
			</button>
				<div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lecturer->lecturer_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lecturer->lecturer_id), 'class' => 'dropdown-item', 'escapeTitle' => false]
            ) ?>
            <?= $this->Html->link(__('List Lecturers'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?>
				</div>
		</div>
    </div>
</div>
<div class="line mb-4"></div>
<!--/Header-->

<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
    <div class="card-body text-body-secondary">
            <?= $this->Form->create($lecturer) ?>
            <fieldset>
                <legend><?= __('Edit Lecturer') ?></legend>
                
                    <?php echo $this->Form->control('lecturer_name'); ?>
                    <?php echo $this->Form->control('lecturer_email'); ?>
                    <?php echo $this->Form->control('lecturer_Faculty'); ?>
                    <?php echo $this->Form->control('faculty_Department', ['options' => $faculties]); ?>
                    <?= $this->Form->control('status', [
                    'type' => 'select',
                    'options' => [
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ],
                    'empty' => false,
                    'class' => 'form-select form-select-sm', // Correct class for smaller size
                    'label' => false, // Hide the default label from FormHelper
                    'id' => 'status' // Explicit ID if needed
                ]); ?>
               
            </fieldset>
				<div class="text-end">
				  <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-warning']); ?>
				  <?= $this->Form->button(__('Submit'),['type' => 'submit', 'class' => 'btn btn-outline-primary']) ?>
                </div>
        <?= $this->Form->end() ?>
    </div>
</div>