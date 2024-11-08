<!DOCTYPE html>
<html>
<head>
    <title>Offer Submission Confirmation</title>
</head>
<body>
    <h1>Thank You for Your Offer Submission</h1>
    <p>Dear {{ $data['name'] }},</p>
    <p>Thank you for submitting your offer. We have received your details and will process your request shortly.</p>
    <p><strong>Submitted Details:</strong></p>
    <ul>
        <li><strong>Name:</strong> {{ $data['name'] }}</li>
        <li><strong>Email:</strong> {{ $data['email'] }}</li>
        <li><strong>Location:</strong> {{ $data['location'] }}</li>
        <li><strong>Company:</strong> {{ $data['company'] }}</li>
        <li><strong>Family Detail:</strong> {{ $data['familyDetail'] }}</li>
    </ul>
    <p>If you have any questions, please feel free to contact us at info@universitiespage.com.</p>
    <p>Best Regards,</p>
    <p>Universities Page Team</p>
</body>
</html>
