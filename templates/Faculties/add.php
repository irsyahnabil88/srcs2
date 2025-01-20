<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faculty $faculty
 */
?>
<!-- Header Section -->
<div class="row text-body-secondary">
    <div class="col-10">
    <h1 class="my-0 page_title" style="font-size: 1.8rem; font-weight: bold; color: #0d6efd;"><?php echo $title; ?></h1>
    <h6 class="sub_title text-body-secondary" style="font-size: 1rem; color: #6c757d;"><?php echo $system_name; ?></h6>
    </div>
    <div class="col-2 text-end">
        <div class="dropdown mx-3 mt-2">
            <button class="btn p-0 border-0" type="button" id="orderStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars text-primary"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orderStatistics">
                <?= $this->Html->link(__('List Faculties'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?>
            </div>
        </div>
    </div>
</div>
<div class="line mb-4"></div>
<!-- End of Header Section -->

<!-- Form Card -->
<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
    <div class="card-body text-body-secondary">
        <!-- Form Start -->
        <?= $this->Form->create($faculty) ?>
        <fieldset>

            <!-- Form Layout -->
            <div class="row">
                <!-- Faculty Department -->
                <div class="col-md-6">
                    <?= $this->Form->control('faculty_department', [
                        'label' => 'Faculty Department',
                        'class' => 'form-control',
                    ]); ?>
                </div>
                <!-- Faculty Name -->
                <div class="col-md-6">
                    <?= $this->Form->control('faculty_name', [
                        'label' => 'Faculty Name',
                        'type' => 'text',
                        'class' => 'form-control',
                    ]); ?>
                </div>
            </div>
            <div class="row align-items-center mt-4">
                <!-- Status Label -->
                <div class="col-auto">
                    <label for="status" class="form-label mb-0">Status</label>
                </div>
                <!-- Status Dropdown -->
                <div class="col-auto">
                    <?= $this->Form->control('status', [
                        'type' => 'select',
                        'options' => [
                            '1' => 'Active',
                            '0' => 'Inactive',
                        ],
                        'empty' => 'Select Status',
                        'class' => 'form-select',
                        'label' => false, // Hide the default label
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
        <!-- End of Form -->
    </div>
</div>
<!-- End of Form Card -->
