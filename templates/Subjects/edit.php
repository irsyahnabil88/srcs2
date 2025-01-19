<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
 * @var \Cake\Collection\CollectionInterface|string[] $lecturers
 */
?>
<!--Header-->
<div class="row text-body-secondary">
	<div class="col-10">
    <h1 class="my-0 page_title" style="font-size: 1.8rem; font-weight: bold; color: #0d6efd;"><?php echo $title; ?></h1>
    <h6 class="sub_title text-body-secondary" style="font-size: 1rem; color: #6c757d;"><?php echo $system_name; ?></h6>
	</div>
	<div class="col-2 text-end">
		<div class="dropdown mx-3 mt-2">
			<button class="btn p-0 border-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa-solid fa-bars text-primary"></i>
			</button>
				<div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <?= $this->Html->link(('List Subjects'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?>
				</div>
		</div>
    </div>
</div>
<div class="line mb-4"></div>
<!--/Header-->

<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
    <div class="card-body text-body-secondary">
            <?= $this->Form->create($subject) ?>
            <fieldset>
            <div class="card-title">Subject Details</div>
            <div class="tricolor_line mb-3"></div>
                
            <div class="row">
                
                <div class="col-md-6">
                    <?php echo $this->Form->control('subject_name', [
                        'label' => 'Name'
                    ]); ?>
                </div>
                <div class="col-md-4">
                     <?php echo $this->Form->control('subject_code',[
                        'label' => 'Code'
                     ]); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->control('subject_credits',[
                        'label' => 'Credit']); ?>
            </div>
        </div>     
                    <?php echo $this->Form->control('subject_description',[
                        'label' => 'Description',
                        'class' => 'form-control',
                        'placeholder' => 'Subject Description'
                        ]); ?>

                        <div class="row">
                            <div class="col-md-2">
                    <?php echo $this->Form->control('status',['options' => [
                        1 => 'Active',
                        0 => 'Not Active',
                    ],
                    'empty' => 'Select Status',
                    'default' => $subject->status, 
                    'class' => 'form-select', 
                    ]); ?>
                    </div>
                    <div class="col-md-4">
                    <?php echo $this->Form->control('lecturer_id', [ 
                    'label' => 'Lecturer',
                    'options' => $lecturers,
                    'empty' => 'Select Lecturer',
                    'class' => 'form-select' 
                    ]); ?>
                    </div>
                    </div>
                    
                   
            </fieldset>
				<div class="text-end">
				  <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-warning']); ?>
				  <?= $this->Form->button(('Submit'),['type' => 'submit', 'class' => 'btn btn-outline-primary']) ?>
                </div>
        <?= $this->Form->end() ?>
    </div>
</div>