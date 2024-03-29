<html>
<thead></thead>
<body>
<p><b>Name:</b><?php echo e($name); ?></p>
<p><b>Email:</b><?php echo e($email); ?></p>
<p><b>Subject:</b><?php echo e(($subject)??''); ?></p>
<br>
<p><b>Message:</b><br><?php echo e($contact_message); ?></p>
<br><br>
------------------------------------------------
<p>This email is sent from www.Universitiespage.com</p>
</body>
</html>