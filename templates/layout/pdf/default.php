<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration Success</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .certificate-container {
            width: 80%;
            max-width: 900px;
            margin: 2rem auto;
            padding: 3rem;
            background-color: #ffffff;
            border: 2px solid #ddd;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Title and Sub-Title Styling */
        h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #0d6efd;
            margin-bottom: 20px;
        }

        h4 {
            font-size: 1.3rem;
            color: #6c757d;
            margin-top: 0;
        }

        /* Success Banner */
        .success-banner {
            background-color: #198754;
            color: white;
            padding: 10px 20px;
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 20px;
            border-radius: 12px;
            display: inline-block;
        }

        /* Table Styling for Registration Details */
        .table {
            width: 100%;
            margin-top: 40px;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
            font-size: 1.1rem;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            font-weight: normal;
            color: #555;
        }

        .table td {
            font-weight: bold;
            color: #333;
        }

        /* Footer */
        .footer {
            text-align: center;
            font-size: 0.9rem;
            color: #777;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <!-- Certificate Title and Subtitle -->
        <h2>Course Registration Successful</h2>
        <h4>Your registration has been successfully processed!</h4>

        <!-- Success Banner -->
        <div class="success-banner">Registration Success</div>

        <!-- Registration Details Table -->
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Student Name</th>
                    <td><?= ($registration->student->student_name) ?></td>
                </tr>
                <tr>
                    <th>Course Name</th>
                    <td><?= ($registration->subject->subject_name) ?></td>
                </tr>
                <tr>
                    <th>Registration ID</th>
                    <td><?= $this->Number->format($registration->registration_id) ?></td>
                </tr>
                <tr>
                    <th>Registration Date</th>
                    <td><?= h($registration->registration_date) ?></td>
                </tr>
                <tr>
                    <th>Created On</th>
                    <td><?= h($registration->created) ?></td>
                </tr>
                <tr>
                    <th>Modified On</th>
                    <td><?= h($registration->modified) ?></td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
        <b>Registration ID: </b> <?= $this->Number->format($registration->registration_id) ?>
        </div>
    </div>
</body>
</html>