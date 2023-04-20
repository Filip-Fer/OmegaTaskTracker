<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
</head>
<body>
    <h1>Contact Us</h1>
    <p>If you have any questions or feedback, please fill out the form below or send an email to <a href="mailto:email@example.com">email@example.com</a>.</p>
    <form method="post" action="processForm.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="5" cols="40" required></textarea><br><br>
        <button type="submit">Send</button>
    </form>
</body>
</html>
