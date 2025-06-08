-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2025 a las 10:53:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seguimiento_academico`
--
CREATE DATABASE IF NOT EXISTS `seguimiento_academico` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `seguimiento_academico`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `ID_Administrador` int(11) NOT NULL,
  `Cargo` varchar(50) NOT NULL,
  `CI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`ID_Administrador`, `Cargo`, `CI`) VALUES
(5000, 'cargo1', 1069),
(5001, 'cargo2', 1070);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `ID_Aula` int(11) NOT NULL,
  `Numero` varchar(20) NOT NULL,
  `Capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`ID_Aula`, `Numero`, `Capacidad`) VALUES
(7000, 'A-10', 40),
(7001, 'B-11', 50),
(7002, 'LAB-12', 60),
(7003, 'C-13', 30),
(7004, 'P-4', 50),
(7005, 'C-15', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `ID_Carrera` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Duracion` int(11) NOT NULL COMMENT 'Duración en semestres',
  `ID_Director` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`ID_Carrera`, `Nombre`, `Duracion`, `ID_Director`) VALUES
(5000, 'Derecho', 8, 4000),
(5001, 'Medicina', 12, 4001),
(5002, 'Arquitectura', 9, 4002);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE `contiene` (
  `ID_Materia` int(11) NOT NULL,
  `ID_Paralelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contiene`
--

INSERT INTO `contiene` (`ID_Materia`, `ID_Paralelo`) VALUES
(6000, 8000),
(6001, 8001),
(6002, 8002),
(6003, 8003),
(6004, 8004),
(6005, 8005);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director_carrera`
--

CREATE TABLE `director_carrera` (
  `ID_Director` int(11) NOT NULL,
  `CI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `director_carrera`
--

INSERT INTO `director_carrera` (`ID_Director`, `CI`) VALUES
(4000, 1066),
(4001, 1067),
(4002, 1068);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `ID_Docente` int(11) NOT NULL,
  `Profesion` varchar(100) NOT NULL,
  `CI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`ID_Docente`, `Profesion`, `CI`) VALUES
(3000, 'Abogado', 1060),
(3001, 'Abogado', 1061),
(3002, 'Medico', 1062),
(3003, 'Medico', 1063),
(3004, 'Arquitecto', 1064),
(3005, 'Arquitecto', 1065);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `Matricula` int(11) NOT NULL,
  `CI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`Matricula`, `CI`) VALUES
(2000, 1000),
(2001, 1001),
(2002, 1002),
(2003, 1003),
(2004, 1004),
(2005, 1005),
(2006, 1006),
(2007, 1007),
(2008, 1008),
(2009, 1009),
(2010, 1010),
(2011, 1011),
(2012, 1012),
(2013, 1013),
(2014, 1014),
(2015, 1015),
(2016, 1016),
(2017, 1017),
(2018, 1018),
(2019, 1019),
(2020, 1020),
(2021, 1021),
(2022, 1022),
(2023, 1023),
(2024, 1024),
(2025, 1025),
(2026, 1026),
(2027, 1027),
(2028, 1028),
(2029, 1029),
(2030, 1030),
(2031, 1031),
(2032, 1032),
(2033, 1033),
(2034, 1034),
(2035, 1035),
(2036, 1036),
(2037, 1037),
(2038, 1038),
(2039, 1039),
(2040, 1040),
(2041, 1041),
(2042, 1042),
(2043, 1043),
(2044, 1044),
(2045, 1045),
(2046, 1046),
(2047, 1047),
(2048, 1048),
(2049, 1049),
(2050, 1050),
(2051, 1051),
(2052, 1052),
(2053, 1053),
(2054, 1054),
(2055, 1055),
(2056, 1056),
(2057, 1057),
(2058, 1058),
(2059, 1059);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imparte`
--

CREATE TABLE `imparte` (
  `ID_Docente` int(11) NOT NULL,
  `ID_Materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imparte`
--

INSERT INTO `imparte` (`ID_Docente`, `ID_Materia`) VALUES
(3000, 6000),
(3001, 6001),
(3002, 6002),
(3003, 6003),
(3004, 6004),
(3005, 6005);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscrito`
--

CREATE TABLE `inscrito` (
  `Matricula` int(11) NOT NULL,
  `ID_Materia` int(11) NOT NULL,
  `Nota` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscrito`
--

INSERT INTO `inscrito` (`Matricula`, `ID_Materia`, `Nota`) VALUES
(2000, 6000, 72.00),
(2000, 6001, 85.00),
(2001, 6002, 88.00),
(2001, 6003, 53.00),
(2002, 6004, 91.00),
(2002, 6005, 36.00),
(2003, 6000, 67.00),
(2003, 6001, 30.00),
(2004, 6002, 95.00),
(2004, 6003, 59.00),
(2005, 6004, 78.00),
(2005, 6005, 42.00),
(2006, 6000, 100.00),
(2006, 6001, 63.00),
(2007, 6002, 31.00),
(2007, 6003, 84.00),
(2008, 6004, 55.00),
(2008, 6005, 70.00),
(2009, 6000, 38.00),
(2009, 6001, 97.00),
(2010, 6002, 49.00),
(2010, 6003, 76.00),
(2011, 6004, 33.00),
(2011, 6005, 89.00),
(2012, 6000, 60.00),
(2012, 6001, 41.00),
(2013, 6002, 74.00),
(2013, 6003, 52.00),
(2014, 6004, 65.00),
(2014, 6005, 81.00),
(2015, 6000, 72.00),
(2015, 6001, 45.00),
(2016, 6002, 88.00),
(2016, 6003, 53.00),
(2017, 6004, 91.00),
(2017, 6005, 36.00),
(2018, 6000, 67.00),
(2018, 6001, 30.00),
(2019, 6002, 95.00),
(2019, 6003, 59.00),
(2020, 6004, 78.00),
(2020, 6005, 42.00),
(2021, 6000, 100.00),
(2021, 6001, 63.00),
(2022, 6002, 31.00),
(2022, 6003, 84.00),
(2023, 6004, 55.00),
(2023, 6005, 70.00),
(2024, 6000, 38.00),
(2024, 6001, 97.00),
(2025, 6002, 49.00),
(2025, 6003, 76.00),
(2026, 6004, 33.00),
(2026, 6005, 89.00),
(2027, 6000, 60.00),
(2027, 6001, 41.00),
(2028, 6002, 74.00),
(2028, 6003, 52.00),
(2029, 6004, 65.00),
(2029, 6005, 81.00),
(2030, 6000, 72.00),
(2030, 6001, 45.00),
(2031, 6002, 88.00),
(2031, 6003, 53.00),
(2032, 6004, 91.00),
(2032, 6005, 36.00),
(2033, 6000, 67.00),
(2033, 6001, 30.00),
(2034, 6002, 95.00),
(2034, 6003, 59.00),
(2035, 6004, 78.00),
(2035, 6005, 42.00),
(2036, 6000, 100.00),
(2036, 6001, 63.00),
(2037, 6002, 31.00),
(2037, 6003, 84.00),
(2038, 6004, 55.00),
(2038, 6005, 70.00),
(2039, 6000, 38.00),
(2039, 6001, 97.00),
(2040, 6002, 49.00),
(2040, 6003, 76.00),
(2041, 6004, 33.00),
(2041, 6005, 89.00),
(2042, 6000, 60.00),
(2042, 6001, 41.00),
(2043, 6002, 74.00),
(2043, 6003, 52.00),
(2044, 6004, 65.00),
(2044, 6005, 81.00),
(2045, 6000, 72.00),
(2045, 6001, 45.00),
(2046, 6002, 88.00),
(2046, 6003, 53.00),
(2047, 6004, 91.00),
(2047, 6005, 36.00),
(2048, 6000, 67.00),
(2048, 6001, 30.00),
(2049, 6002, 95.00),
(2049, 6003, 59.00),
(2050, 6004, 78.00),
(2050, 6005, 42.00),
(2051, 6000, 100.00),
(2051, 6001, 63.00),
(2052, 6002, 31.00),
(2052, 6003, 84.00),
(2053, 6004, 55.00),
(2053, 6005, 70.00),
(2054, 6000, 38.00),
(2054, 6001, 97.00),
(2055, 6002, 49.00),
(2055, 6003, 76.00),
(2056, 6004, 33.00),
(2056, 6005, 89.00),
(2057, 6000, 60.00),
(2057, 6001, 41.00),
(2058, 6002, 74.00),
(2058, 6003, 52.00),
(2059, 6004, 65.00),
(2059, 6005, 81.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `ID_Materia` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Semestre` int(11) NOT NULL,
  `ID_Carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ID_Materia`, `Nombre`, `Semestre`, `ID_Carrera`) VALUES
(6000, 'Derecho Romano', 1, 5000),
(6001, 'Derecho Laboral', 2, 5000),
(6002, 'Fisiología', 4, 5001),
(6003, 'Histología', 4, 5001),
(6004, 'Dibujo Técnico', 1, 5002),
(6005, 'Geometría 3D', 2, 5002);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paralelo`
--

CREATE TABLE `paralelo` (
  `ID_Paralelo` int(11) NOT NULL,
  `Letra` char(1) NOT NULL,
  `Turno` varchar(20) NOT NULL,
  `ID_Materia` int(11) NOT NULL,
  `ID_Aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paralelo`
--

INSERT INTO `paralelo` (`ID_Paralelo`, `Letra`, `Turno`, `ID_Materia`, `ID_Aula`) VALUES
(8000, 'A', 'Mañana', 6000, 7000),
(8001, 'B', 'Tarde', 6001, 7001),
(8002, 'A', 'Mañana', 6002, 7002),
(8003, 'B', 'Tarde', 6003, 7003),
(8004, 'A', 'Mañana', 6004, 7004),
(8005, 'B', 'Tarde', 6005, 7005);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `CI` int(11) NOT NULL,
  `Paterno` varchar(50) NOT NULL,
  `Materno` varchar(50) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Sexo` char(1) NOT NULL CHECK (`Sexo` in ('F','M')),
  `Fecha_Nacimiento` date NOT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Ciudad` varchar(50) DEFAULT NULL,
  `Zona` varchar(50) DEFAULT NULL,
  `Calle` varchar(50) DEFAULT NULL,
  `Usuario` varchar(20) NOT NULL DEFAULT '',
  `Clave` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`CI`, `Paterno`, `Materno`, `Nombre`, `Sexo`, `Fecha_Nacimiento`, `Telefono`, `Correo`, `Ciudad`, `Zona`, `Calle`, `Usuario`, `Clave`) VALUES
(1000, 'Aguilar ', 'Mollo', 'Hilarion Alex', 'M', '0000-00-00', '72824447', 'aguilarmolloron@gmail.com', 'El Alto', '16 de Julio', '12', 'ES1000', 'AMHilarion1000'),
(1001, 'Alcon', 'Payi', 'Carlos Yamil', 'M', '0000-00-00', '62499914', 'alconpayicarlosyamil@gmail.com', 'La Paz', 'Sopocachi', '7', 'ES1001', 'APCarlos1001'),
(1002, 'Almaraz', 'Ramos', 'Belen', 'F', '0000-00-00', '71273409', 'belram763@gmail.com', 'El Alto', 'Senkata', '23', 'ES1002', 'ARBelen1002'),
(1003, 'Ampuero', 'Rivera', 'Sherine Nahomi', 'F', '0000-00-00', '75820047', 'nahomisherinear@gmail.com', 'Viacha', 'Central', '45', 'ES1003', 'ARSherine1003'),
(1004, 'Apaza', 'Pinto', 'Yoshua', 'M', '0000-00-00', '77762279', 'apazapinto152@gmail.com', 'Achocalla', 'Pueblo', '3', 'ES1004', 'APYoshua1004'),
(1005, 'Arias', 'Choque', 'Jose Andres', 'M', '0000-00-00', '60634300', 'jose.arias1203@gmail.com', 'Mecapaca', 'Centro', '18', 'ES1005', 'ACJose1005'),
(1006, 'Barrionuevo', 'Aguayo', 'Herlan Axel', 'M', '0000-00-00', '65132423', 'bherlan54@gmail.com', 'La Paz', 'Miraflores', '36', 'ES1006', 'BAHerlan1006'),
(1007, 'Bernabe', 'Quispe', 'Jhonatan', 'M', '0000-00-00', '60680528', 'jhonatanbernabeq@gmail.com', 'El Alto', 'Villa Dolores', '5', 'ES1007', 'BQJhonatan1007'),
(1008, 'Cachaca', 'Lopez', 'Sergio Pablo', 'M', '0000-00-00', '73218086', 'sergio732180@gmail.com', 'El Alto', 'Rio Seco', '27', 'ES1008', 'CLSergio1008'),
(1009, 'Callacagua', 'Collo', 'Aldair Joel', 'M', '0000-00-00', '75201625', 'acallacaguacollo@gmail.com', 'Viacha', 'Ferropetrol', '14', 'ES1009', 'CCAldair1009'),
(1010, 'Callapa', 'Mamani', 'Andy Cristian', 'M', '0000-00-00', '76216252', 'iamcristian009@gmail.com', 'La Paz', 'San Pedro', '42', 'ES1010', 'CMAndy1010'),
(1011, 'Callisaya', 'Surco', 'Luis Fernando', 'M', '2035-10-08', '77558878', 'fwzk100@gmail.com', 'Achocalla', 'Loma Pucara', '9', 'ES1011', 'CSLuis1011'),
(1012, 'Canaviri', 'Charca', 'Juan De Dios', 'M', '0000-00-00', '74062005', 'juancharca7@gmail.com', 'El Alto', 'Alto Lima', '31', 'ES1012', 'CCJuan1012'),
(1013, 'Chacon', 'Centellas', 'Erick Marcelo', 'M', '0000-00-00', '74002883', 'chaconerick134@gmail.com', 'Mecapaca', 'Valle Abajo', '50', 'ES1013', 'CCErick1013'),
(1014, 'Chambi', 'Cochi', 'Marcos Hugo', 'M', '0000-00-00', '75112883', 'cochimarcoshugo@gmail.com', 'La Paz', 'Obrajes', '8', 'ES1014', 'CCMarcos1014'),
(1015, 'Chavez', 'Yujra', 'Mayerly Mavel', 'F', '0000-00-00', '76552574', 'mavelchavez8@gmail.com', 'El Alto', 'Villa Adela', '19', 'ES1015', 'CYMayerly1015'),
(1016, 'Chino', 'Salazar', 'Diego', 'M', '2039-02-01', '73706744', 'diego.chino.zerotwo@gmail.com', 'Viacha', 'Minera', '47', 'ES1016', 'CSDiego1016'),
(1017, 'Choque', 'Arce', 'Ricardo Esteban', 'M', '0000-00-00', '63074708', 'estebanchoque98@gmail.com', 'Achocalla', 'Mallasa', '2', 'ES1017', 'CARicardo1017'),
(1018, 'Choque', 'Gutierrez', 'Jose Luis', 'M', '0000-00-00', '72066434', 'joooseeee4@gmail.com', 'El Alto', 'Ciudad Satélite', '15', 'ES1018', 'CGJose1018'),
(1019, 'Chuquimia', 'Alejo', 'Adriana', 'F', '0000-00-00', '67324145', 'adriana.lu.alejo@gmail.com', 'La Paz', 'Calacoto', '38', 'ES1019', 'CAAdriana1019'),
(1020, 'Condori', 'Gomez', 'Mariluz', 'F', '2037-05-07', '71281026', 'mariluzcondori915@gmail.com', 'Mecapaca', 'Chacaltaya', '22', 'ES1020', 'CGMariluz1020'),
(1021, 'Cruz', 'Chipana', 'Hilda Yesenia', 'F', '0000-00-00', '73010348', 'hcruzchipana@gmail.com', 'El Alto', '12 de Octubre', '6', 'ES1021', 'CCHilda1021'),
(1022, 'Flores', 'Flores', 'Rogelio', 'M', '2038-12-09', '69893821', 'floresfloresrogelio94@gmail.com', 'Viacha', 'Industrial', '29', 'ES1022', 'FFRogelio1022'),
(1023, 'Gutierrez', 'Flores', 'Luis Pablo', 'M', '0000-00-00', '61123518', 'lg788749@gmail.com', 'La Paz', 'Irpavi', '11', 'ES1023', 'GFLuis1023'),
(1024, 'Huanca', 'Quispe', 'Ivan Gabriel', 'M', '0000-00-00', '63062212', 'huancaivan348@gmail.com', 'El Alto', 'Villa Exaltación', '33', 'ES1024', 'HQIvan1024'),
(1025, 'Huiza', 'Velasco', 'Jose Oliver', 'M', '0000-00-00', '60114315', 'velascooliver936@gmail.com', 'Achocalla', 'Chuquiaguillo', '17', 'ES1025', 'HVJose1025'),
(1026, 'Illanes', 'Quiñones', 'Raquel', 'F', '0000-00-00', '60605858', 'raquelillanes25@gmail.com', 'El Alto', 'Distrito 6', '44', 'ES1026', 'IQRaquel1026'),
(1027, 'Laura', 'Flores', 'Lizeth', 'F', '0000-00-00', '73511650', 'laurafloreslizeth273@gmail.com', 'La Paz', 'San Jorge', '4', 'ES1027', 'LFLizeth1027'),
(1028, 'Lima', 'Vicente', 'Saleth Naomi', 'F', '0000-00-00', '78859219', 'naomisaleth1@gmail.com', 'Viacha', 'Aeropuerto', '25', 'ES1028', 'LVSaleth1028'),
(1029, 'Machicado', 'Ramirez', 'Milton Marcelo', 'M', '0000-00-00', '71957982', 'marusero2636@gmail.com', 'Mecapaca', 'Los Pinos', '10', 'ES1029', 'MRMilton1029'),
(1030, 'Mamani', 'Nina', 'Alex Emanuel', 'M', '0000-00-00', '69923480', 'ninaalex090@gmail.com', 'El Alto', 'Villa Ingenio', '39', 'ES1030', 'MNAlex1030'),
(1031, 'Mamani', 'Ticona', 'Juan Esteban', 'M', '0000-00-00', '78809599', 'mamaniesteban980@gmail.com', 'La Paz', 'San Miguel', '1', 'ES1031', 'MTJuan1031'),
(1032, 'Marca', 'Fernandez', 'Katherine Angeles', 'F', '0000-00-00', '73224326', 'katherinemarca7@gmail.com', 'El Alto', 'Distrito 7', '28', 'ES1032', 'MFKatherine1032'),
(1033, 'Miranda', 'Choque', 'Delia', 'F', '0000-00-00', '63150834', 'samsara.9877@gmail.com', 'Achocalla', 'Koani', '16', 'ES1033', 'MCDelia1033'),
(1034, 'Paquiri', 'Condo', 'Andy Diego', 'M', '0000-00-00', '65697004', 'andydiego33@gmail.com', 'Viacha', 'Villa Remedios', '41', 'ES1034', 'PCAndy1034'),
(1035, 'Paucara', 'Loza', 'Armando Ernesto', 'M', '0000-00-00', '71512322', 'apaucara272@mail.com', 'La Paz', 'Achumani', '20', 'ES1035', 'PLArmando1035'),
(1036, 'Quisbert', 'Rivero', 'Darlyn Alexandra', 'F', '2035-03-06', '73082572', 'darlynsea08@gmail.com', 'El Alto', 'Villa Tunari', '49', 'ES1036', 'QRDarlyn1036'),
(1037, 'Quispe', 'Arratia', 'Brain', 'M', '0000-00-00', '77226867', 'brayinarratia@gmail.com', 'Mecapaca', 'Valle de las Flores', '13', 'ES1037', 'QABrain1037'),
(1038, 'Quispe', 'Pari', 'Ruben Angel', 'M', '0000-00-00', '73082526', 'rubenpariquispe@gmail.com', 'El Alto', 'Franz Tamayo', '35', 'ES1038', 'QPRuben1038'),
(1039, 'Quispe', 'Salinas', 'Clevert Yerson', 'M', '0000-00-00', '65619686', 'clevertsalinas0@gmail.com', 'La Paz', 'Següencoma', '24', 'ES1039', 'QSClevert1039'),
(1040, 'Ramos', 'Apio', 'Rudy', 'M', '0000-00-00', '63037073', 'rudyramosapio3@gmail.com', 'Viacha', 'Villa Dolores', '48', 'ES1040', 'RARudy1040'),
(1041, 'Rivera', 'Callisaya', 'Elioth Yahir Alem', 'M', '0000-00-00', '64337173', 'riverayahir12@gmail.com', 'El Alto', 'Ballivián', '30', 'ES1041', 'RCElioth1041'),
(1042, 'Rojas', 'Condori', 'Yoselin Fabiola', 'F', '0000-00-00', '76509432', 'fabi67rojas567@gmail.com', 'Achocalla', 'Huayhuasi', '21', 'ES1042', 'RCYoselin1042'),
(1043, 'Sirpa', 'Callisaya', 'Rina Belen', 'F', '0000-00-00', '68147370', 'scarletbelen235@gmail.com', 'La Paz', 'San Antonio', '37', 'ES1043', 'SCRina1043'),
(1044, 'Tambo', 'Mamani', 'Grover', 'M', '0000-00-00', '67340791', 'grover.tambo.es@gmail.com', 'El Alto', 'Villa Esperanza', '26', 'ES1044', 'TMGrover1044'),
(1045, 'Ticona', 'Crispin', 'Josue', 'M', '0000-00-00', '78752060', 'ticonajosue170@gmail.com', 'Mecapaca', 'Cotahuma', '40', 'ES1045', 'TCJosue1045'),
(1046, 'Ticona', 'Perez', 'Ronald Roly', 'M', '0000-00-00', '77248680', 'rolyticonaperez@gmail.com', 'Viacha', 'Ferroviaria', '32', 'ES1046', 'TPRonald1046'),
(1047, 'Tola', 'Poma', 'Jose Angel', 'M', '0000-00-00', '71570174', 'josqr2028@gmail.com', 'El Alto', 'Santiago I', '34', 'ES1047', 'TPJose1047'),
(1048, 'Velasquez', 'Torrez', 'Eddy David', 'M', '0000-00-00', '61280426', 'teddydavid92@gmail.com', 'La Paz', 'Bajo Següencoma', '46', 'ES1048', 'VTEddy1048'),
(1049, 'Villalobos', 'Villalobos', 'Elmer Eddy', 'M', '0000-00-00', '68067096', 'eddyelmer4@gmail.com', 'Achocalla', 'Jupapina', '7', 'ES1049', 'VVElmer1049'),
(1050, 'Vino', 'Mamani', 'Erwin Daniel', 'M', '0000-00-00', '68094384', 'vinoerwindaniel.99@gmail.com', 'El Alto', 'Alto Lima Sur', '18', 'ES1050', 'VMErwin1050'),
(1051, 'Zegarra', 'Asturizaga', 'Cristian Erick', 'M', '0000-00-00', '75804553', 'doteare10@gmail.com', 'La Paz', 'Cota Cota', '23', 'ES1051', 'ZACristian1051'),
(1052, 'Guarachi', 'Anahi', 'Katherin', 'F', '0000-00-00', '76259374', 'anahiguarachi14@gmail.com', 'El Alto', 'Nuevos Horizontes', '12', 'ES1052', 'GAKatherin1052'),
(1053, 'Jimenez', 'Rodriguez', 'Williams', 'M', '0000-00-00', '69192344', 'williamsjimenez12@gmail.com', 'Viacha', 'Nueva Viacha', '5', 'ES1053', 'JRWilliams1053'),
(1054, 'Ramos', 'Pocoata', 'Edmar Henry', 'M', '0000-00-00', '65814654', 'edmarramospoco@gmail.com', 'Mecapaca', 'La Florida', '50', 'ES1054', 'RPEdmar1054'),
(1055, 'Sausiri', 'Velasquez', 'Samuel', 'M', '0000-00-00', '78269475', 'samuelvelasquez33@gmail.com', 'La Paz', 'Cota Cota', '12', 'ES1055', 'SVSamuel1055'),
(1056, 'Mamani', 'Condori', 'Luz', 'F', '0000-00-00', '67341625', 'mamanicondoriluz@gmal.com', 'El Alto', '16 de Julio', '21', 'ES1056', 'MCLuz1056'),
(1057, 'Quispe', 'Yujra', 'Marcelo', 'M', '0000-00-00', '72722260', 'marceloquispe@gmail.com', 'La Paz', 'Sopocachi', '14', 'ES1057', 'QYMarcelo1057'),
(1058, 'Fernández', 'Huanca', 'Ana', 'F', '0000-00-00', '77243338', 'anahuanca@gmail.com', 'El Alto', 'Senkata', '12', 'ES1058', 'FHAna1058'),
(1059, 'Gonzales', 'Soliz', 'Juan', 'M', '0000-00-00', '74440174', 'juansoliz@gmail.com', 'Viacha', 'Central', '21', 'ES1059', 'GSJuan1059'),
(1060, 'Patiño', 'Méndez', 'Daniela', 'F', '0000-00-00', '61281236', 'danimendes@gmail.com', 'Achocalla', 'Pueblo', '7', 'DO1060', 'PMDaniela1060'),
(1061, 'Vargas', 'Aguilar', 'Carlos', 'M', '0000-00-00', '68765496', 'carlosvargas@gmail.com', 'Mecapaca', 'Centro', '10', 'DO1061', 'VACarlos1061'),
(1062, 'Flores', 'Ticona', 'Valeria', 'F', '0000-00-00', '68023454', 'valeriatico@gmai.com', 'La Paz', 'Miraflores', '32', 'DO1062', 'FTValeria1062'),
(1063, 'Rojas', 'Cabrera', 'Luis', 'M', '0000-00-00', '77543253', 'luisrojas@gmail.com', 'El Alto', 'Villa Dolores', '21', 'DO1063', 'RCLuis1063'),
(1064, 'Chávez', 'Alanoca', 'Camila', 'F', '0000-00-00', '71234354', 'camialoca@gmail.com', 'El Alto', 'Rio Seco', '12', 'DO1064', 'CACamila1064'),
(1065, 'Peñaranda', 'Velasco', 'Rodrigo', 'M', '0000-00-00', '69197765', 'rodrivelasco@gmail.com', 'Viacha', 'Ferropetrol', '11', 'DO1065', 'PVRodrigo1065'),
(1066, 'Mercado', 'Choque', 'Sofía', 'F', '0000-00-00', '62814554', 'sofiachoque@gmal.com', 'Viacha', 'Villa Remedios', '34', 'DC1066', 'MCSofía1066'),
(1067, 'Arce', 'Paredes', 'Javier', 'M', '0000-00-00', '78893475', 'javierarce@gmail.com', 'La Paz', 'Achumani', '15', 'DC1067', 'APJavier1067'),
(1068, 'Guzmán', 'Calderón', 'Jimena', 'F', '2029-12-08', '61233215', 'jimecalderon@gmail.com', 'El Alto', 'Villa Tunari', '16', 'DC1068', 'GCJimena1068'),
(1069, 'Copa', 'Colque', 'Efrain', 'M', '0000-00-00', '62813334', 'colqueefra@gmail.com', 'Mecapaca', 'Valle de las Flores', '18', 'AD1069', 'CCEfrain1069'),
(1070, 'Poma', 'Zambrana', 'Maria', 'F', '2032-09-09', '78877455', 'mariapoma@gmail.com', 'El Alto', 'Franz Tamayo', '9', 'AD1070', 'PZMaria1070');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE `tiene` (
  `ID_Materia` int(11) NOT NULL,
  `ID_Carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiene`
--

INSERT INTO `tiene` (`ID_Materia`, `ID_Carrera`) VALUES
(6000, 5000),
(6001, 5000),
(6002, 5001),
(6003, 5001),
(6004, 5002),
(6005, 5002);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_Administrador`),
  ADD KEY `CI` (`CI`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`ID_Aula`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`ID_Carrera`),
  ADD KEY `ID_Director` (`ID_Director`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`ID_Materia`,`ID_Paralelo`),
  ADD KEY `ID_Paralelo` (`ID_Paralelo`);

--
-- Indices de la tabla `director_carrera`
--
ALTER TABLE `director_carrera`
  ADD PRIMARY KEY (`ID_Director`),
  ADD KEY `CI` (`CI`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`ID_Docente`),
  ADD KEY `CI` (`CI`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `CI` (`CI`);

--
-- Indices de la tabla `imparte`
--
ALTER TABLE `imparte`
  ADD PRIMARY KEY (`ID_Docente`,`ID_Materia`),
  ADD KEY `ID_Materia` (`ID_Materia`);

--
-- Indices de la tabla `inscrito`
--
ALTER TABLE `inscrito`
  ADD PRIMARY KEY (`Matricula`,`ID_Materia`),
  ADD KEY `ID_Materia` (`ID_Materia`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`ID_Materia`),
  ADD KEY `ID_Carrera` (`ID_Carrera`);

--
-- Indices de la tabla `paralelo`
--
ALTER TABLE `paralelo`
  ADD PRIMARY KEY (`ID_Paralelo`),
  ADD KEY `ID_Materia` (`ID_Materia`),
  ADD KEY `ID_Aula` (`ID_Aula`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`CI`);

--
-- Indices de la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD PRIMARY KEY (`ID_Materia`,`ID_Carrera`),
  ADD KEY `ID_Carrera` (`ID_Carrera`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`CI`) REFERENCES `persona` (`CI`);

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `carrera_ibfk_1` FOREIGN KEY (`ID_Director`) REFERENCES `director_carrera` (`ID_Director`);

--
-- Filtros para la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`ID_Materia`) REFERENCES `materia` (`ID_Materia`),
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`ID_Paralelo`) REFERENCES `paralelo` (`ID_Paralelo`);

--
-- Filtros para la tabla `director_carrera`
--
ALTER TABLE `director_carrera`
  ADD CONSTRAINT `director_carrera_ibfk_1` FOREIGN KEY (`CI`) REFERENCES `persona` (`CI`);

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`CI`) REFERENCES `persona` (`CI`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`CI`) REFERENCES `persona` (`CI`);

--
-- Filtros para la tabla `imparte`
--
ALTER TABLE `imparte`
  ADD CONSTRAINT `imparte_ibfk_1` FOREIGN KEY (`ID_Docente`) REFERENCES `docente` (`ID_Docente`),
  ADD CONSTRAINT `imparte_ibfk_2` FOREIGN KEY (`ID_Materia`) REFERENCES `materia` (`ID_Materia`);

--
-- Filtros para la tabla `inscrito`
--
ALTER TABLE `inscrito`
  ADD CONSTRAINT `inscrito_ibfk_1` FOREIGN KEY (`Matricula`) REFERENCES `estudiante` (`Matricula`),
  ADD CONSTRAINT `inscrito_ibfk_2` FOREIGN KEY (`ID_Materia`) REFERENCES `materia` (`ID_Materia`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`ID_Carrera`) REFERENCES `carrera` (`ID_Carrera`);

--
-- Filtros para la tabla `paralelo`
--
ALTER TABLE `paralelo`
  ADD CONSTRAINT `paralelo_ibfk_1` FOREIGN KEY (`ID_Materia`) REFERENCES `materia` (`ID_Materia`),
  ADD CONSTRAINT `paralelo_ibfk_2` FOREIGN KEY (`ID_Aula`) REFERENCES `aula` (`ID_Aula`);

--
-- Filtros para la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD CONSTRAINT `tiene_ibfk_1` FOREIGN KEY (`ID_Materia`) REFERENCES `materia` (`ID_Materia`),
  ADD CONSTRAINT `tiene_ibfk_2` FOREIGN KEY (`ID_Carrera`) REFERENCES `carrera` (`ID_Carrera`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
