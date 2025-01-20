<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: white;
        }

        .certificate {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            border: 2px solid #1a5f7a;
            border-radius: 10px;
            position: relative;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .title {
            color: #1a5f7a;
            font-size: 28px;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .subtitle {
            color: #666;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .success-banner {
            background: #1a5f7a;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            color: #1a5f7a;
            width: 40%;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 14px;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 80px;
            color: rgba(26, 95, 122, 0.03);
            z-index: -1;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="watermark">VERIFIED</div>
        
        <div class="header">
            <h1 class="title">Course Registration Certificate</h1>
            <p class="subtitle">Official Registration Confirmation</p>
        </div>

        <div class="success-banner">
            Registration Successfully Completed
        </div>

        <table>
            <tr>
                <th>Student Name</th>
                <td><?= h($registration->student->student_name) ?></td>
            </tr>
            <tr>
                <th>Course Name</th>
                <td><?= h($registration->subject->subject_name) ?></td>
            </tr>
            <tr>
                <th>Registration ID</th>
                <td><?= $this->Number->format($registration->registration_id) ?></td>
            </tr>
            <tr>
                <th>Registration Date</th>
                <td><?= h($registration->registration_date) ?></td>
            </tr>

        </table>

        <div class="footer">
            <p>This is an official registration certificate issued by the system.</p>
            <p><strong>Registration ID: <?= $this->Number->format($registration->registration_id) ?></strong></p>
            <p>Please retain this document for your records.</p>
        </div>
    </div>
</body>
</html>