<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Semester $semester
 */
?>
<!-- Header -->
<div class="row text-body-secondary">
    <div class="col-10">
        <h1 class="my-0 page_title"><?= $title; ?></h1>
        <h6 class="sub_title text-body-secondary"><?= $system_name; ?></h6>
    </div>
    <div class="col-2 text-end">
        <div class="dropdown mx-3 mt-2">
            <button class="btn p-0 border-0" type="button" id="orderStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars text-primary"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orderStatistics">
                <?= $this->Html->link(__('List Semesters'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?>
            </div>
        </div>
    </div>
</div>
<div class="line mb-4"></div>
<!-- /Header -->

<!-- Form Card -->
<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
    <div class="card-body text-body-secondary">
        <?= $this->Form->create($semester) ?>
        <fieldset>
            <legend><?= __('Add Semester') ?></legend>
            <!-- Semester Name -->
            <div class="mb-3">
                <?= $this->Form->control('semester_name', [
                    'label' => 'Semester Name',
                    'class' => 'form-control',
                ]); ?>
            </div>
            <!-- Semester Start and End Dates -->
            <div class="row">
                <div class="col-md-6">
                    <?= $this->Form->control('semester_startdate', [
                        'label' => 'Semester Start Date',
                        'type' => 'date',
                        'class' => 'form-control',
                    ]); ?>
                </div>
                <div class="col-md-6">
                    <?= $this->Form->control('semester_enddate', [
                        'label' => 'Semester End Date',
                        'type' => 'date',
                        'class' => 'form-control',
                    ]); ?>
                </div>
            </div>
            <!-- Status Dropdown -->
            <div class="form-group">
                <div class="col-md-1">
                <label for="status" class="form-label"><?= __('Status') ?></label>
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
            </div>
        </div>
        </fieldset>
        <!-- Buttons -->
        <div class="text-end mt-4">
            <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-warning me-2']); ?>
            <?= $this->Form->button(__('Submit'), ['type' => 'submit', 'class' => 'btn btn-outline-primary']); ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<!-- /Form Card -->
