<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lecturer $lecturer
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
							<li><?= $this->Html->link(__('Edit Lecturer'), ['action' => 'edit', $lecturer->lecturer_id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Form->postLink(__('Delete Lecturer'), ['action' => 'delete', $lecturer->lecturer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $lecturer->lecturer_id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><hr class="dropdown-divider"></li>
				<li><?= $this->Html->link(__('List Lecturers'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Html->link(__('New Lecturer'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
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
            <h3><?= h($lecturer->lecturer_email) ?></h3>
    <div class="table-responsive">
        <table class="table table-borderless">
                <tr>
                    <th><?= __('Lecturer Name') ?></th>
                    <td><?= h($lecturer->lecturer_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lecturer Email') ?></th>
                    <td><?= h($lecturer->lecturer_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lecturer Department') ?></th>
                    <td><?= h($lecturer->lecturer_department) ?></td>
                </tr>
                <tr>
                    <th><?= __('Faculty') ?></th>
                    <td><?= ($lecturer->faculty->faculty_department) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lecturer Id') ?></th>
                    <td><?= $this->Number->format($lecturer->lecturer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td>
                                <?php if ($lecturer->status == 1): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php elseif ($lecturer->status == 0): ?>
                                    <span class="badge bg-danger">Inactive</span>
                                <?php else: ?>
                                    <span class="badge bg-warning">Unknown</span>
                                <?php endif; ?>
                            </td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($lecturer->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($lecturer->modified) ?></td>
                </tr>
            </table>
            </div>

			</div>
		</div>
		

            
            


		
	</div>
	<div class="col-md-3">
	 
	</div>
</div>




