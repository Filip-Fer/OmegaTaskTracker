<?php
/**
 * Třída Security poskytuje různé metody pro zabezpečení PHP aplikací.
 */
class Security {

  /**
   * Metoda pro ověření, zda je uživatel přihlášen.
   *
   * @return bool True, pokud je uživatel přihlášen, jinak false.
   */
  public function isLoggedIn() {
    // implementace ověřování přihlášení
    return isset($_SESSION['user']);
  }

  /**
   * Metoda pro ověření, zda je heslo dostatečně silné.
   *
   * @param string $password Heslo, které se má ověřit.
   *
   * @return bool True, pokud je heslo dostatečně silné, jinak false.
   */
  public function isPasswordStrong($password) {
    // implementace ověřování síly hesla
    return strlen($password) >= 8;
  }

  /**
   * Metoda pro ověření, zda je URL adresa bezpečná.
   *
   * @param string $url URL adresa, která se má ověřit.
   *
   * @return bool True, pokud je URL adresa bezpečná, jinak false.
   */
  public function isUrlSafe($url) {
    // implementace ověřování bezpečnosti URL adresy
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
  }

  /**
   * Metoda pro ověření, zda jsou vstupní data bezpečná proti XSS útokům.
   *
   * @param string $input Vstupní data, která se mají ověřit.
   *
   * @return string Vstupní data s odstraněnými nebezpečnými znaky.
   */
  public function sanitizeXss($input) {
    // implementace ošetření vstupních dat proti XSS útokům
    return htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
  }
}
