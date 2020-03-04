-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 04-09-2019 a las 23:01:54
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ipsud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'Juan', 'Valdez', '100@100.com', 'f899139df5e1059396431415e770c6dd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idcita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `medico_idmedico` int(11) NOT NULL,
  `paciente_idpaciente` int(11) NOT NULL,
  `consultorio_idconsultorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorio`
--

CREATE TABLE `consultorio` (
  `idconsultorio` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idespecialidad` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `idmedico` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `tarjetaprofesional` varchar(45) NOT NULL,
  `especialidad_idespecialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idpaciente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `cedula` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `nombre`, `apellido`, `correo`, `clave`, `cedula`, `estado`, `telefono`, `direccion`, `foto`) VALUES
(1, 'Pedro', 'Picapiedra', '10@10.com', 'd3d9446802a44259755d38e6d163e820', '10', 0, NULL, NULL, NULL),
(2, 'Pablo', 'Marmol', '20@20.com', '98f13708210194c475687be6106a3b84', '20', 0, NULL, NULL, NULL),
(3, 'Homero', 'Simpson', '30@30.com', '34173cb38f07f89ddbebc2ac9128303f', '30', 0, NULL, NULL, NULL),
(4, 'Clark', 'Kent', '40@40.com', 'd645920e395fedad7bbbed0eca3fe2e0', '40', 0, NULL, NULL, NULL),
(5, 'Bruce', 'Wane', '50@50.com', '202cb962ac59075b964b07152d234b70', '50', 0, NULL, NULL, NULL),
(6, 'Lex', 'Lutor', '60@60.com', '072b030ba126b2f4b2374f342be9ed44', '60', 0, NULL, NULL, NULL);

--
-- indices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idcita`),
  ADD KEY `fk_cita_medico1_idx` (`medico_idmedico`),
  ADD KEY `fk_cita_paciente1_idx` (`paciente_idpaciente`),
  ADD KEY `fk_cita_consultorio1_idx` (`consultorio_idconsultorio`);

--
-- Indices de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  ADD PRIMARY KEY (`idconsultorio`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idespecialidad`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`idmedico`),
  ADD KEY `fk_medico_especialidad_idx` (`especialidad_idespecialidad`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idpaciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  MODIFY `idconsultorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idespecialidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `idmedico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_cita_consultorio1` FOREIGN KEY (`consultorio_idconsultorio`) REFERENCES `consultorio` (`idconsultorio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cita_medico1` FOREIGN KEY (`medico_idmedico`) REFERENCES `medico` (`idmedico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cita_paciente1` FOREIGN KEY (`paciente_idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `fk_medico_especialidad` FOREIGN KEY (`especialidad_idespecialidad`) REFERENCES `especialidad` (`idespecialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

INSERT INTO especialidad(nombre) VALUES 
("Alergologia"), ("Anestesiologia"), ("Cardiologia"), ("Gastroenterologia"), ("Geriatria"),
("Hematologia"), ("Infectologia"), ("Medicina del trabajo"), ("Gastroenterologia"), ("Medicina de urgencias"),
("Medicina interna"), ("Nefrologia"), ("Neumologia"), ("Nutriologia"), ("Pediatria"), ("Psiquiatria");

INSERT INTO medico (`idmedico`, `nombre`, `apellido`, `correo`, `clave`, `tarjetaprofesional`, `especialidad_idespecialidad`) VALUES
(1, 'Jaime', 'Ramirez', 'e2@m.com', 'c81e728d9d4c2f636f067f89cc14862c', "md102", 1),
(2, 'Isabella', 'Barragán', 'e3@m.com', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', "md103", 5),
(3, 'Olivia', 'Gómez', 'e4@m.com', 'a87ff679a2f3e71d9181a67b7542122c', "md104", 5),
(4, 'David', 'López', 'e5@m.com', 'e4da3b7fbbce2345d7772b0674a318d5', "md105", 7),
(5, 'Alexis', 'González', 'e6@m.com', '1679091c5a880faf6fb5e6087eb1b2dc', "md106", 7),
(6, 'Sofia', 'Martinez', 'e7@m.com', '8f14e45fceea167a5a36dedd4bea2543', "md108", 1),
(7, 'Victoria', 'Diaz', 'e8@m.com', 'c9f0f895fb98ab9159f51fd0297e236d', "md109", 2),
(8, 'Gabriel', 'Torres', 'e9@m.com', '45c48cce2e2d7fbdea1afc51c7c6ad26', "md110", 14),
(9, 'Sebastián', 'Vargas', 'e10@m.com', 'd3d9446802a44259755d38e6d163e820', "md111", 10),
(10, 'Diego', 'Ramirez', 'e11@m.com', '6512bd43d9caa6e02c990b0a82652dca', "md112", 9),
(11, 'Horacio', 'Gomez', 'e12@m.com', 'c20ad4d76fe97759aa27a0c99bff6710', "md113", 10),
(12, 'Sharon', 'Bohorquez', 'e13@m.com', 'c51ce410c124a10e0db5e4b97fc2af39', "m12", 6);

INSERT INTO consultorio (nombre) VALUES
("401"), ("502"), ("302"), ("101"), ("107"),
("202"), ("205"), ("402"), ("305"), ("207");

INSERT into cita (fecha, hora, medico_idmedico, paciente_idpaciente, consultorio_idconsultorio) VALUES
('2020-03-09', '09:30:00', 2, 1, 1), ('2020-03-15', '10:30:00', 10, 2, 7), ('2020-03-28', '12:30:00', 3, 3, 3), 
('2020-03-10', '07:00:00', 5, 1, 7), ('2020-03-20', '11:45:00', 8, 2, 4),  ('2020-03-22', '18:00:00', 8, 3, 4), 
('2020-03-15', '14:30:00', 6, 1, 9), ('2020-03-09', '13:30:00', 2, 1, 10), ('2020-03-17', '17:45:00', 9, 3, 7);




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
