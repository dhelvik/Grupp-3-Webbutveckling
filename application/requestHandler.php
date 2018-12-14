<?php
include 'controller.php';
include 'model.php';
session_start();
        case 'registerApplication':
            registerApplication();
            break;
<<<<<<< HEAD
        case 'registerEntry':
            registerEntry();
            break;
        case 'getEntries':
            getEntries();
            break;
        case 'checkLogin':
            header('Location: '.checkLogin().'');
            die();
=======

>>>>>>> ba32c1975cd2a7e8a2018758e16258e08f997bdb
            break;
    }
}

    try {
        $controller = new Controller();
        $controller->registerApplication(new Karnevalist($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['phoneNumber']), new Section($_POST['sectionName']));
    } catch (PDOException $e) {
        echo 'Den här epostadressen har redan ansökt till vald sektion.';
    }
}
    try {
        $controller = new Controller();
        $controller->registerEntry(new Entry($_POST['name'], $_POST['email'], $_POST['comment'], $datetime));
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
        $controller = new Controller();
        $entries = $controller->getEntries();
        echo $e->getMessage();
    }
}

<<<<<<< HEAD
function checkLogin(){
     $controller = new Controller();
     $user = $controller->signIn(new User($_POST['username'], $_POST['password']));
     if(is_null($user)){
        $_SESSION['signInError'] = 'Fel användare eller lösenord.';
        return '/admin.php';
     }else {
         $_SESSION['user'] = $user->username;
         return "/admin.php";
     }
}

=======
>>>>>>> ba32c1975cd2a7e8a2018758e16258e08f997bdb
?>