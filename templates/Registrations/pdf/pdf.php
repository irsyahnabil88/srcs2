<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>t</title>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <h2><?= h($title) ?></h2>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th><?= __('Student') ?></th>
                        <td><?= ($registration->student->student_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Subject') ?></th>
                        <td><?= ($registration->subject->subject_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Registration Id') ?></th>
                        <td><?= $this->Number->format($registration->registration_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Status') ?></th>
                        <td>
                            <?php if ($registration->status == 1): ?>
                                <span>Success</span>
                            <?php elseif ($registration->status == 0): ?>
                                <span>Pending</span>
                            <?php else: ?>
                                <span>Error</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?= __('Registration Date') ?></th>
                        <td><?= h($registration->registration_date) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($registration->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($registration->modified) ?></td>
                    </tr>
                </table>
            </div>
            
            <div style="margin-top: 20px;">
                <h4>Application Details</h4>
                <table class="table">
                    <tr>
                        <td>Application Date</td>
                        <td><?php echo !empty($registration->created); ?></td>
                    </tr>
                    <tr>
                        <td>Approval Date</td>
                        <td><?php !empty($registration->modified); ?></td>
                    </tr>
                    <tr>
                        <td>Application Status</td>
                        <td>
                            <?php if ($registration->status == 1): ?>
                                <span>Success</span>
                            <?php elseif ($registration->status == 0): ?>
                                <span>Pending</span>
                            <?php else: ?>
                                <span>Error</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>