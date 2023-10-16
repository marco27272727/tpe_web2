<?php
    require_once './app/controllers/item.controller.php';
    require_once './app/controllers/student.controller.php';
    require_once './app/controllers/auth.controller.php';
    

    // tabla de router para el acceso pulico
    // mostrarObjetos -> showItems();
    // detalle/:id -> showDetail($id);
    // mostrarAlumnos -> showStudents();
    // filtro/:id -> filterStudent();
    // mostrarLogin -> showAuth();
    // autenticar  -> authentic();
    // prestarEstudiante/:id -> getStudent($id) 
    // editarBoton/:idItem,idEstudiante -> lendItem($idItem,$idEstudiante)
    // devolverItem/:id -> returnItem($id)

    // tabla de router para el acceso administrador
    // ABM de la tabla de items
    // agregar -> addItem();
    // eliminar/:id -> deleteItem($id);
    // editar/:id -> editItem($id);
    // ABM de la tabla de alumno
    // agregarEstudiante -> addStudent();
    // eliminarEstudiante/:id -> deleteStudent();
    // mostrarEdicionDeEStudiante/:id -> editStudent($id)
    // editarEstudiante/:id -> insertStudent($id);


    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $action = 'mostrarObjetos';

    if (!empty($_GET['action'])){
        $action = $_GET['action'];
    }

    $params = explode('/', $action);

    switch($params[0]){
        // casos para la tabla de los tiems 
        case 'mostrarObjetos':
            $itemController = new ItemController();
            $itemController->showItems();
            break;
        case 'detalle':
            $itemController = new ItemController();
            $itemController->showDetail($params[1]);
            break;
        case 'filtro' :
            $itemController = new ItemController();
            $itemController->filterStudent($params[1]);
            break;
        case 'agregar' : 
            $itemController = new ItemController();
            $itemController->addItem();
            break;
        case 'eliminar' :
            $itemController = new ItemController();
            $itemController->deleteItem($params[1]);
            break;
        case 'mostrarEdicionItem':
            $itemController = new ItemController();
            $itemController->editItem($params[1]);
            break;
        case 'editarItem':
            $itemController = new ItemController();
            $itemController->insertItem($params[1]);
            break;
        case 'prestarEstudiante':
            $itemController = new ItemController();
            $itemController-> getStudent($params[1]); 
            break;
        case 'editarBoton' : 
            $itemController = new ItemController();
            $itemController->lendItem($params[1],$params[2]);
            break;
        case 'devolverItem':
            $itemController = new ItemController();
            $itemController-> returnItem($params[1]);
            break;
        // casos para la tabla de estudiantes
        case 'mostarAlumnos':
            $studentController = new StudentController();
            $studentController->showStudents();
            break;
        case 'agregarEstudiante' :
            $studentController = new StudentController();
            $studentController->addStudent();
            break;
        case 'eliminarEstudiante' :
            $studentController = new StudentController();
            $studentController->deleteStudent($params[1]);
            break;
        case 'mostrarEdicionDeEStudiante':
            $studentController = new StudentController();
            $studentController->editStudent($params[1]);
            break;
        case 'editarEstudiante' :
            $studentController = new StudentController();
            $studentController->insertEditStudent($params[1]);
            break;
        case 'mostrarLogin':
            $authController = new AuthController();
            $authController->showAuth();
            break;
        case 'authentic':
            $authController = new AuthController();
            $authController-> Authentic();
            break;
        default:
            echo('404 Page not found');
            break;
    }