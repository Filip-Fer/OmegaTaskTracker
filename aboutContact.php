<?php
include 'library.php';
getIndexHead();
?>

<body>
    <h1>Kontaktujte nás</h1>
    <p>Pokud máte jakékoliv dotazy nebo zpětnou vazbu, vyplňte prosím následující formulář nebo zašlete e-mail na <a href="mailto:ferencei@spsejecna.cz">ferencei@spsejecna.cz</a>.</p>
    <form method="post" action="processFeedback.php">
        
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
