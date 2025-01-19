<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
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
							<li><?= $this->Html->link(__('Edit Subject'), ['action' => 'edit', $subject->subject_id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Form->postLink(__('Delete Subject'), ['action' => 'delete', $subject->subject_id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->subject_id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><hr class="dropdown-divider"></li>
				<li><?= $this->Html->link(__('List Subjects'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Html->link(__('New Subject'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
							</div>
		</div>
    </div>
</div>
<div class="line mb-4"></div>
<!--/Header-->

<div class="row">
	<div class="col-md-9">
		<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
			<div class="card-body text-body-secondary">
            <h3><?= h($subject->subject_name) ?></h3>
    <div class="table-responsive">
        <table class="table">
                <tr>
                    <th><?= __('Subject Name') ?></th>
                    <td><?= h($subject->subject_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lecturer') ?></th>
                    <td><?= $subject->hasValue('lecturer') ? $this->Html->link($subject->lecturer->lecturer_email, ['controller' => 'Lecturers', 'action' => 'view', $subject->lecturer->lecturer_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject Id') ?></th>
                    <td><?= $this->Number->format($subject->subject_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject Credits') ?></th>
                    <td><?= $this->Number->format($subject->subject_credits) ?></td>
                </tr>
            </table>
            </div>
            <div class="text">
                <strong><?= __('Subject Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($subject->subject_description)); ?>
                </blockquote>
            </div>

			</div>
		</div>
		

            
            


		
	</div>
	<div class="col-md-3">
	  Column
	</div>
</div>




