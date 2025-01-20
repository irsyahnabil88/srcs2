
<!-- Header Section -->
<div class="row text-body-secondary mb-4">
    <div class="col-10">
        <h1 class="my-0 page_title text-uppercase text-primary"><?= $title; ?></h1>
        <h6 class="sub_title text-muted"><?= $system_name; ?></h6>
    </div>
    <div class="col-2 text-end">
        <div class="dropdown mx-3 mt-2">
            <button class="btn p-0 border-0" type="button" id="orderStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars text-primary"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orderStatistics">
                <?= $this->Html->link(('List Registrations'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?>
            </div>
        </div>
    </div>
</div>

<div class="line mb-4"></div>

<!-- Form Section -->
<div class="card rounded-3 mb-3 bg-body-tertiary border-0 shadow">
    <div class="card-body text-body-secondary">
        <?= $this->Form->create($registration, ['class' => 'needs-validation', 'novalidate' => true]) ?>
        <fieldset>
           
            <!-- Form Controls -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <?= $this->Form->control('student_id', [
                        'options' => $students,
                        'label' => 'Student',
                        'class' => 'form-select rounded-1',
                        'required' => true,
                    ]); ?>
                </div>
                <div class="col-md-6">
                    <?= $this->Form->control('subject_id', [
                        'options' => $subjects,
                        'label' => 'Subject',
                        'class' => 'form-select rounded-1',
                        'required' => true,
                    ]); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <?= $this->Form->control('registration_date', [
                        'label' => 'Registration Date',
                        'class' => 'form-control rounded-1',
                        'type' => 'date',
                    ]); ?>
                </div>
                <div class="col-md-6">
                    <?= $this->Form->control('status', [
                        'label' => 'Status',
                        'class' => 'form-control rounded-1',
                    ]); ?>
                </div>
            </div>
        </fieldset>
        <!-- Action Buttons -->
        <div class="text-end">
            <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-warning me-2']); ?>
            <?= $this->Form->button(('Submit'), ['type' => 'submit', 'class' => 'btn btn-outline-primary']); ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>