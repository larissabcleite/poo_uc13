<?php
include "src/views/header.php"; 

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page){
    case 'aluno':
        include "src/pages/cad_aluno.php";
        break;
        
        case 'curso':
        include "src/pages/cad_curso.php";
        break;

        case 'escola':
            include "src/pages/cad_escola.php";
            break;

            case 'login':
                include "src/pages/cad_login.php";
                break;

            default:
            include "src/pages/home.php";
            break;
      


}


include "src/views/footer.php"; ?>

<?php

