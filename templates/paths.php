<nav>
    <?php
    if ($_SESSION['Rol'] == 'Administrador') {
        echo '
        <ul>
            <li><a href="?p=inicio">Inicio</a></li>
            <li><a href="?p=adm.usuarios">Usuarios</a></li>
            <li><a href="?p=adm.cursos">Cursos</a></li>
            <li><a href="?p=adm.informes">Informes</a></li>
            <li><a href="?p=adm.sistema">Sistema</a></li>
        </ul>
        ';
    } elseif ($_SESSION['Rol'] == 'Docente') {
        echo '
        <ul>
            <li><a href="?p=inicio">Inicio</a></li>
            <li><a href="?p=doc.cursos">Cursos Impartidos</a></li>
            <li><a href="?p=doc.calific">Registros Calificaciones</a></li>
        </ul>
        ';
    } elseif ($_SESSION['Rol'] == 'Estudiante') {
        echo '
        <ul>
            <li><a href="?p=inicio">Inicio</a></li>
            <li><a href="?p=est.historial">Historial Academico</a></li>
            <li><a href="?p=est.inscripciones">Materias e Inscripciones</a></li>
        </ul>
        ';
    } elseif ($_SESSION['Rol'] == 'Director') {
        echo '
        <ul>
            <li><a href="?p=inicio">Inicio</a></li>
            <li><a href="?p=dir.docentes">Estudiantes</a></li>
            <li><a href="?p=dir.estudiantes">Docentes</a></li>
            <li><a href="?p=dir.cursos">Gestion de Cursos</a></li>
        </ul>
        ';
    }
    ?>
</nav>
</header>
<?php
    // Cargar la plantilla según el parámetro 'p' en la URL

    $paginas = isset($_GET['p']) ? strtolower($_GET['p']) : 'Pages';
    if($paginas == 'Pages'){
        require_once 'inicio.php';
    } else {
        require_once $paginas.'.php';
    }
?>