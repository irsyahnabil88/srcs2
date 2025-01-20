registrations view

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registration $registration
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
                <li><?= $this->Html->link(('Edit Registration'), ['action' => 'edit', $registration->registration_id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
                <li><?= $this->Form->postLink(('Delete Registration'), ['action' => 'delete', $registration->registration_id], ['confirm' => __('Are you sure you want to delete # {0}?', $registration->registration_id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
                <li><hr class="dropdown-divider"></li>
                <li><?= $this->Html->link(('List Registrations'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
                <li><?= $this->Html->link(('New Registration'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
            </div>
        </div>
    </div>
</div>
<div class="line mb-4" style="border-top: 2px solid #e9ecef; margin: 1rem 0;"></div>
<!--/Header-->

<div class="row">
    <div class="col-md-9">
        <div class="card rounded-0 mb-3" style="border: 1px solid #e9ecef; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="card-body text-body-secondary" style="padding: 1rem 1.5rem;">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <th style="font-weight: bold; color: #495057;"><?= __('Student') ?></th>
                            <td><?= ($registration->student->student_name) ?></td>
                        </tr>
                        <tr>
                            <th style=" font-weight: bold; color: #495057;"><?= __('Subject') ?></th>
                            <td><?= ($registration->subject->subject_name) ?></td>
                        </tr>
                        <tr>
                            <th style="font-weight: bold; color: #495057;"><?= __('Registration Id') ?></th>
                            <td><?= $this->Number->format($registration->registration_id) ?></td>
                        </tr>
                        <tr>
                            <th style="font-weight: bold; color: #495057;"><?= __('Status') ?></th>
                            <td>
                                <?php if ($registration->status == 1): ?>
                                    <span style="background-color: #198754; color: #fff; padding: 0.2rem 0.4rem; border-radius: 12px;">Success</span>
									<?php elseif ($registration->status == 0): ?>
                                <span style="background-color: #ffc107;color: #fff; padding: 0.2rem 0.4rem; border-radius: 12px;">Pending</span>
                            <?php else: ?>
                                <span style="background-color: #dc3545; color: #212529; padding: 0.2rem 0.4rem; border-radius: 12px;">Error</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="font-weight: bold; color: #495057;"><?= __('Registration Date') ?></th>
                            <td><?= h($registration->registration_date) ?></td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" style="border: 1px solid #e9ecef; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td>Application Date</td>
                        <td><?php echo ($registration->created); ?></td>
                    </tr>
                    <tr>
                        <td>Approval Date</td>
                        <td><?php echo ($registration->modified); ?></td>
                    </tr>
                    <tr>
                        <td>Application Status</td>
                        <td>
                            <?php if ($registration->status == 1): ?>
                                <span style="background-color: #198754; color: #fff; padding: 0.2rem 0.4rem; border-radius: 12px;">Success</span>
                            <?php elseif ($registration->status == 0): ?>
                                <span style="background-color: #ffc107;color: #fff; padding: 0.2rem 0.4rem; border-radius: 12px;">Pending</span>
                            <?php else: ?>
                                <span style="background-color: #dc3545; color: #212529; padding: 0.2rem 0.4rem; border-radius: 12px;">Error</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
                <?php if ($registration->status == 1): ?>
                    <?php echo $this->Html->link(('Download PDF'), ['action' => 'pdf', $registration->registration_id], ['class' => 'btn btn-sm btn-outline-primary', 'escapeTitle' => false]); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>