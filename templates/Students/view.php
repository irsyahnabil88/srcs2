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
                                <li><?= $this->Html->link(('Edit Student'), ['action' => 'edit', $student->student_id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
                    <li><?= $this->Form->postLink(('Delete Student'), ['action' => 'delete', $student->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->student_id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><?= $this->Html->link(('List Students'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
                    <li><?= $this->Html->link(('New Student'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
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
                <h3><?= h($student->student_name) ?></h3>
        <div class="table-responsive">
            <table class="table table-borderless">
                    <tr>
                        <th><?= __('Student Name') ?></th>
                        <td><?= h($student->student_name) ?></td>
                    </tr>
                    <tr>
                    <th><?= __('Status') ?></th>
                    <td><?php if ($student->status == 1){
                                echo '<span class="badge bg-success">Active</i>';
                            } elseif ($student->status == 0){
                                echo '<span class="badge bg-danger">Not Active </i>';
                            } else
                                echo '<span class="badge bg-warning">Error></i>';
                            ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($student->student_email) ?></td>
                    </tr>   
                    <tr>
                        <th><?= __('Contact Number') ?></th>
                        <td><?= h($student->student_phone) ?></td>
                    </tr>
                    <tr>
                    <th><?= __('Semester') ?></th>
                    <td>
                        <?= ($student->semester->semester_name) ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Faculty') ?></th>
                    <td>
                        <?=($student->faculty->faculty_department) ?>
                    </td>
                </tr>
                    <tr>
                        <th><?= __('Address 1') ?></th>
                        <td><?= h($student->student_address1) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Address 2') ?></th>
                        <td><?= h($student->student_address2) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Postcode') ?></th>
                        <td><?= h($student->student_postcode) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('City') ?></th>
                        <td><?= h($student->student_city) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('State') ?></th>
                        <td><?= h($student->student_state) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($student->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($student->modified) ?></td>
                    </tr>
                </table>
                </div>

                </div>
            </div>
            
            
            
        </div>
        <div class="col-md-3">
     
        </div>
    </div>