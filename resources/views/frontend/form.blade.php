<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <p>Hello,</p>

    <p>You have received a new contact form submission:</p>

    <ul>
        <li>Name: {{ $data['first_name'] }} {{ $data['last_name'] }}</li>
        <li>Email: {{ $data['email'] }}</li>
        <li>Phone No: {{ $data['phone_no'] }}</li>
        <li>Location: {{ $data['location'] }}</li>
        <li>Subject: {{ $data['subject'] }}</li>
        <li>Comment: {{ $data['comment'] }}</li>
    </ul>

    <p>Best regards,</p>
    <p>AIPL</p>
</body>
</html>