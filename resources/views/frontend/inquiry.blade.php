<!DOCTYPE html>
<html>
<head>
    <title>Inquiry Form Submission</title>
</head>
<body>
    <p>Hello,</p>

    <p>You have received a new inquiry form submission:</p>

    <ul>
        <li>Name: {{ $data['name'] }} </li>
        <li>Email: {{ $data['email'] }}</li>
        <li>Phone No: {{ $data['phone_no'] }}</li>
        <li>Message: {{ $data['message'] }}</li>
    </ul>

    <p>Best regards,</p>
    <p>AIPL</p>
</body>
</html>
