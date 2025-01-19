<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
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
							<li><?= $this->Html->link(('Edit Subject'), ['action' => 'edit', $subject->subject_id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Form->postLink(('Delete Subject'), ['action' => 'delete', $subject->subject_id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->subject_id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><hr class="dropdown-divider"></li>
				<li><?= $this->Html->link(('List Subjects'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Html->link(('New Subject'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
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
        <table class="table table-borderless">
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($subject->subject_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($subject->subject_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($subject->subject_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Credits') ?></th>
                    <td><?= $this->Number->format($subject->subject_credits) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?php if ($subject->status == 1){
                                echo '<span class="badge bg-success">Active</i>';
                            } elseif ($subject->status == 0){
                                echo '<span class="badge bg-danger">Not Active </i>';
                            } else
                                echo '<span class="badge bg-warning">Error></i>';
                            ?></td>
                </tr>
                <tr>
                    <th><?= __('Lecturer') ?></th>
                    <td><?= ($subject->lecturer->lecturer_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($subject->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($subject->modified) ?></td>
                </tr>
            </table>
            </div>
           

			</div>
		</div>
		
	</div>

    <div class="col-md-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= __('Subject Description') ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-justify">
                    <?= $this->Text->autoParagraph(h($subject->subject_description)); ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>