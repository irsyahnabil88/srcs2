<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Semester $semester
 */
?>
<!-- Header -->
<div class="row text-body-secondary mb-4">
    <div class="col-10">
    <h1 class="my-0 page_title" style="font-size: 1.8rem; font-weight: bold; color: #0d6efd;"><?php echo $title; ?></h1>
    <h6 class="sub_title text-body-secondary" style="font-size: 1rem; color: #6c757d;"><?php echo $system_name;?></h6>
    </div>
    <div class="col-2 text-end">
        <div class="dropdown mx-3 mt-2">
            <button class="btn p-0 border-0" type="button" id="orderStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars text-primary"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orderStatistics">
                <li><?= $this->Html->link(__('Edit Semester'), ['action' => 'edit', $semester->semester_id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
                <li><?= $this->Form->postLink(__('Delete Semester'), ['action' => 'delete', $semester->semester_id], ['confirm' => __('Are you sure you want to delete # {0}?', $semester->semester_id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
                <li><hr class="dropdown-divider"></li>
                <li><?= $this->Html->link(__('List Semesters'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
                <li><?= $this->Html->link(__('New Semester'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
            </div>
        </div>
    </div>
</div>
<div class="line mb-4"></div>
<!-- /Header -->

<div class="row">
    <!-- Semester Details Section -->
    <div class="col-md-9">
        <div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
            <div class="card-body text-body-secondary">
                <h3 class="card-title"><?= h($semester->semester_name) ?></h3>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th class="w-25 text-secondary"><?= __('Semester Name') ?></th>
                                <td><?= h($semester->semester_name) ?></td>
                            </tr>
                            <tr>
                                <th class="w-25 text-secondary"><?= __('Semester Id') ?></th>
                                <td><?= $this->Number->format($semester->semester_id) ?></td>
                            </tr>
                            <tr>
                                <th class="w-25 text-secondary"><?= __('Status') ?></th>
                                <td>
                                    <?php if ($semester->status == 1): ?>
                                        <span class="badge bg-success">Active</span>
                                    <?php elseif ($semester->status == 0): ?>
                                        <span class="badge bg-danger">Inactive</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning">Unknown</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25 text-secondary"><?= __('Semester Start Date') ?></th>
                                <td><?= h($semester->semester_startdate) ?></td>
                            </tr>
                            <tr>
                                <th class="w-25 text-secondary"><?= __('Semester End Date') ?></th>
                                <td><?= h($semester->semester_enddate) ?></td>
                            </tr>
                            <tr>
                                <th class="w-25 text-secondary"><?= __('Created') ?></th>
                                <td><?= h($semester->created) ?></td>
                            </tr>
                            <tr>
                                <th class="w-25 text-secondary"><?= __('Modified') ?></th>
                                <td><?= h($semester->modified) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Semester Details Section -->
</div>
