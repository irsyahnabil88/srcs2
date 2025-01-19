<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
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
            <?= $this->Html->link(('List Students'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?>
				</div>
		</div>
    </div>
</div>
<div class="line mb-4"></div>
<!--/Header-->


<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
    <div class="card-body text-body-secondary">
	<div class="card-title">Personal Details</div>
	<div class="tricolor_line mb-3"></div>
            <?= $this->Form->create($student) ?>
            <fieldset>
                
                    <?php echo $this->Form->control('student_name', [
						'label' => 'Name <i class="fa-solid fa-info-circle"></i>',
                		'escape' => false
					]); ?>

					<div class="row">
					<div class="col-md-6">
					<?php echo $this->Form->control('semester_id', [
						'label' => 'Semester <i class="fa-solid fa-calendar-days"></i>',
						'escape' => false,
						'options' => $semesters,
						'empty' => 'Select Semester',
						'class'=> 'form-select'
					]); ?>
					</div>

					<div class="col-md-6">
					<?php echo $this->Form->control('faculty_id', [
						'label' => 'Faculty<i class="fa-solid fa-building"></i>',
						'escape' => false,
						'options' => $faculties,
						'empty' => 'Select Faculty',
						'class'=> 'form-select'
					]); ?>
					</div>
				</div>

					
					<div class="row">
					<div class="col-md-2">
					<?php echo $this->Form->control('status', [
                    'options' => [
                        1 => 'Active',
                        0 => 'Not Active',
                    ],
                    'empty' => 'Select Status',
                    'default' => $student->status, 
                    'class' => 'form-select', 
                        ]); ?>
					</div>

						<div class="col-md-5">
						 <?php echo $this->Form->control('student_phone', [
						'label' => 'Phone Number <i class="fa-solid fa-phone"></i>',
                        'escape' => false,
						 'id' => 'student-phone'
					]); ?>
						</div>
						<div class="col-md-5">
                    <?php echo $this->Form->control('student_email', [
						'type' => 'email',
                        'label' => 'Email <i class="fa-solid fa-envelope"></i>',
                        'escape' => false,
						'id' => 'student-email'
					]); ?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
                    <?php echo $this->Form->control('student_address1', [
						'label' => 'Address 1 <i class="fa-solid fa-location-dot"></i>',
						'escape' => false
					]); ?></div>
                    
					<div class="col-md-6">
                    <?php echo $this->Form->control('student_address2', [
						'label' => 'Address 2 <i class="fa-solid fa-location-dot"></i>',
						'escape' => false
					]); ?>
					</div>
					</div>

					<div class="row">
						<div class="col-md-2">
                    <?php echo $this->Form->control('student_postcode', [
						'label' => 'Postcode <i class="fa-solid fa-map-location"></i>',
						'escape' => false,
						 'id' => 'student-postcode'
					]); ?>
					</div>

					<div class="col-md-5">
                    <?php echo $this->Form->control('student_city', [
						'label' => 'City <i class="fa-solid fa-city"></i>',
						'escape' => false
					]); ?>
					</div>

					<div class="col-md-5">
                    <?php echo $this->Form->control('student_state', [
						'label' => 'State <i class="fa-solid fa-flag"></i>',
						'escape' => false,
						'options' =>[
							'Selangor' => 'Selangor',
							'Negeri Sembilan' => 'Negeri Sembilan',
							'Melaka' => 'Melaka',
							'Johor' => 'Johor',
							'Pahang' => 'Pahang',
							'Perak' => 'Perak',
							'Kedah' => 'Kedah',
							'Perlis' => 'Perlis',
							'Kelantan' => 'Kelantan',
							'Terengganu' => 'Terengganu',
							'Sabah' => 'Sabah',
							'Sarawak' => 'Sarawak',
							'Pulau Pinang' => 'Pulau Pinang',
						],
						'empty' => 'Select State',
						'class' => 'form-select',
						'id' => 'student-state'	
						 
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