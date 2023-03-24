<?php
include 'library.php';
getDB();

if ($mysqli->connect_errno) {
    print "Chyba: ".$mysqli-> connect_error;
    exit();
};


$name = "admin";
$psw = "student";
$isLogged = false;
$errors = [];

if (isset($_POST['username'])){
    if (! preg_match('/^[a-z]+$/i', $_POST['username'])){
        $errors[] = "Jméno obsahuje nepovolené znaky.";
    }
    if (! preg_match('/^[a-z]+$/i', $_POST['pswrd'])){
        $errors[] = "Heslo obsahuje nepovolené znaky.";
    }
    if (count($errors) == 0) {




        $result = $mysqli->query("SELECT * FROM `ferencei`.`login_tab`;");

        if($result !== null) {
            while($row = $result->fetch_assoc()) {
       
                if ($row["username"] == isset($_POST['username']) && $row["psrwd"] == isset($_POST['pswrd'])){
            
                    $isLogged = true;
                }
                else {
                    $errors[] = "Špatně zadané jméno či heslo. Zkuste to <a href=\"login.php\">znovu</a>.";
                }   	      
       
            };
        };





       
       
    }   
}

?>

<div class="container mt-3">
    <form action="#">
        <div class="mb-3 mt-3">
            <label for="username">Uživatelské jméno:</label>
            <input type="text" class="form-control" id="username" placeholder="Zadejte email" name="email">
        </div>
        <div class="mb-3">
            <label for="pwd">Heslo:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Zadejte heslo" name="pswd">
        </div>
        <div class="mb-3">
            <a style="text-decoration:none;" href="#">Zaregistrovat se</a>
        </div>
            <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Pamatovat si mě
            </label>
          </div>
          <button type="submit" class="btn btn-primary" data-dismiss="alert" aria-label="Close">Přihlásit</button>
          <span aria-hidden="true"></span>
        </form>
      </div>


      <?php
        if ($isLogged == true) {
            print "<div class=\"alert alert-success\" role=\"alert\">Jste přihlášeni.</div>";
            session_start();
            $_SESSION["isLogged"] = true;
        }
        else {
            foreach ($errors as $error) {
                print $error;
            }
        }

    
    ?>