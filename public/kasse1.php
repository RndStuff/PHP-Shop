<?php
//TODO all ...
require_once(__DIR__.'/../common.php');
$korb = array();
$gesamtPreis = 0;
foreach($_SESSION['warenkorb'] as $id) {
    $korb[] = $waren[$id];
    $gesamtPreis += $waren[$id]['preis'];
}

$errors = array();
if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && !empty($_POST['email'])) {

        if (!validateEmail($_POST['email'])) {
            $_SESSION['kasse']['email'] = $_POST['email'];
        }
        $errors[] = 'given email was invalid';
    } else {
        $errors[] = 'no email adress';
    }

    if (isset($_POST['kundenName']) && !empty($_POST['kundenName'])) {
        $_SESSION['kasse']['kundenName'] = $_POST['kundenName'];
    } else {
        $errors[] = 'no name';
    }

    if (isset($_POST['zusatz']) && !empty($_POST['zusatz'])) {
        $_SESSION['kasse']['zusatz'] = $_POST['zusatz'];
    } else {
        $_SESSION['kasse']['zusatz'] = '';
    }

    if (isset($_POST['str']) && !empty($_POST['str'])) {
        $_SESSION['kasse']['str'] = $_POST['str'];
    } else {
        $errors[] = 'no str';
    }

    if (isset($_POST['plz']) && !empty($_POST['plz'])) {
        if (is_numeric($_POST['plz'])) {
            $_SESSION['kasse']['plz'] = $_POST['plz'];
        } else {
            $errors[] = 'plz muss eine zahl sein';
        }
    } else {
        $errors[] = 'no plz';
    }

    if (isset($_POST['ort']) && !empty($_POST['ort'])) {
        $_SESSION['kasse']['ort'] = $_POST['ort'];
    } else {
        $errors[] = 'no ort';
    }

    if (count($errors) === 0) {
        header('location: kasse2.php');
        exit(1);
    }
}

echo $twig->render(
    'kasse1.twig',
    array(
        'waren' => $korb,
        'preis' => $gesamtPreis,
        'errors' => $errors,
    )
);

