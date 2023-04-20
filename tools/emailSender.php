<?php

/**
 * Třída pro posílání emailů s dokumentací.
 */
class EmailSender {
    
    /**
     * Odešle email s přílohou.
     *
     * @param string $to Adresa příjemce.
     * @param string $subject Předmět emailu.
     * @param string $message Textová část emailu.
     * @param string $attachment Cesta k příloze.
     * @return bool True, pokud email byl úspěšně odeslán, jinak false.
     */
    public function sendEmailWithAttachment($to, $subject, $message, $attachment) {
        $headers = "From: webmaster@example.com\r\n";
        $headers .= "Reply-To: webmaster@example.com\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n\r\n";
        
        $body = "--boundary\r\n";
        $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
        $body .= $message . "\r\n\r\n";
        
        $file = fopen($attachment, 'rb');
        $data = fread($file, filesize($attachment));
        fclose($file);
        
        $body .= "--boundary\r\n";
        $body .= "Content-Type: application/octet-stream; name=\"" . basename($attachment) . "\"\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n";
        $body .= "Content-Disposition: attachment; filename=\"" . basename($attachment) . "\"\r\n\r\n";
        $body .= chunk_split(base64_encode($data)) . "\r\n";
        $body .= "--boundary--";
        
        return mail($to, $subject, $body, $headers);
    }
    
}