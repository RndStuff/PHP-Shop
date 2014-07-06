<?php
require_once(__DIR__.'/../vendor/autoload.php');
$app = new \App\Application();

$waren = $app->getWaren();

$errors = array();
if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && !empty($_POST['email'])) {

        if (!$app->validateEmail($_POST['email'])) {
            $_SESSION['kasse']['email'] = $_POST['email'];
        } else {
            $errors[] = 'given email was invalid';
        }
    } else {
        $errors[] = 'no email adress';
    }

    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $_SESSION['kasse']['name'] = $_POST['name'];
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

    if (isset($_POST['land']) && !empty($_POST['land'])) {
        $_SESSION['kasse']['land'] = $_POST['land'];
    } else {
        $errors[] = 'no land';
    }

    if (isset($_POST['versandart']) && !empty($_POST['versandart'])) {
        $_SESSION['kasse']['versandart'] = $_POST['versandart'];
    } else {
        $errors[] = 'no versandart';
    }

    if (isset($_POST['zmethode']) && !empty($_POST['zmethode'])) {
        $_SESSION['kasse']['zmethode'] = $_POST['zmethode'];
    } else {
        $errors[] = 'no zmethode';
    }

    if (count($errors) === 0) {
        $app->redirect('kasse2.php');
    }
    foreach ($errors as $error) {
        $app->addNotification($error, $app::TYPE_WARNING);
    }
}


$app->render(
    'kasse1.php',
    array(
        'waren' => $app->getWarenkorb()->getWaren(),
        'preis' => $app->getWarenkorb()->getPreis(),
    )
);
