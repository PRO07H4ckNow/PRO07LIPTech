-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-04-2021 a las 23:28:33
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id16674937_deudoresdb`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`id16674937_admindeudoresdb`@`%` PROCEDURE `spBuscaProductoFiltro` (IN `op` INT, IN `inicioPag` INT, IN `numReg` INT, IN `grupo` VARCHAR(25), IN `cuenta` VARCHAR(35), IN `nombre` VARCHAR(50), IN `calle` VARCHAR(50), IN `numExt` VARCHAR(10), IN `numInt` VARCHAR(10), IN `colonia` VARCHAR(50), IN `municipio` VARCHAR(50), IN `estado` VARCHAR(50), IN `cp` VARCHAR(10), IN `celular` VARCHAR(10), IN `celularEst` VARCHAR(10), IN `telTrabajo` VARCHAR(10), IN `trabajoEst` VARCHAR(2), IN `telParticular` VARCHAR(10), IN `particularEst` VARCHAR(2), IN `correo` VARCHAR(60), IN `mora` VARCHAR(60), IN `saldo` VARCHAR(10), IN `fechaCorte` VARCHAR(250), IN `fechaAsig` VARCHAR(250), IN `gestor` VARCHAR(50), IN `status` VARCHAR(20), IN `fechaAlta` VARCHAR(250), IN `precastigo` VARCHAR(50))  BEGIN
	IF op=0 THEN
    	SELECT 	D.deuGrupo GRUPO, C.cueCuenta CUENTA, CONCAT(D.deuNombrePila, ' ', D.deuPaterno, ' ', D.deuMaterno) NOMBRE, D.deuCalle CALLE, D.deuNumExt 'NÚMERO EXTERIOR', D.deuNumInt 'NÚMERO INTERIOR', D.deuColonia COLONIA, D.deuMunicipio MUNICIPIO, D.deuEstado ESTADO, D.deuCodigoPostal 'C.P', D.deuTelCelular CELULAR, D.deuTCEstado 'ESTADO CELULAR', D.deuTelTrabajo 'CONTACTO TRABAJO', D.deuTTEstado 'ESTADO TRABAJO', D.deuTelParticular 'TELÉFONO PARTICULAR', D.deuTPEstado 'ESTADO PARTICULAR', D.deuMail CORREO, C.cueMora MORA, C.cueSaldo SALDO, C.cueFechCorte 'FECHA CORTE', D.deuFechAsign 'FECHA ASIGNACIÓN', C.usuId GESTOR, D.deuAltaEstado 'STATUS', D.deuAlta 'FECHA ALTA', C.cuePrecastigo PRECASTIGO 
    	FROM    CUENTA C, DEUDOR D
        WHERE	C.deuId = D.deuId
        AND		D.deuActivo = 1
        AND		D.deuGrupo LIKE concat('%', grupo, '%') 		AND C.cueCuenta LIKE concat('%', cuenta, '%') AND C.cueCuenta LIKE concat('%', cuenta, '%') 
        AND 	D.deuNombrePila LIKE concat('%', nombre, '%')	AND D.deuCalle LIKE concat('%', calle, '%')	  AND D.deuNumExt LIKE concat('%', numExt, '%')
        AND 	D.deuNumInt LIKE concat('%', numInt, '%')		AND D.deuColonia LIKE concat('%', colonia, '%')	AND D.deuMunicipio LIKE concat('%', municipio, '%')
        AND 	D.deuEstado LIKE concat('%', estado, '%')		AND D.deuCodigoPostal LIKE concat('%', cp, '%') AND D.deuTelCelular LIKE concat('%', celular, '%')
        AND 	D.deuTCEstado LIKE concat('%', celularEst, '%') AND D.deuTelTrabajo LIKE concat('%', telTrabajo, '%') AND D.deuTTEstado LIKE concat('%', trabajoEst, '%')
        AND 	D.deuTelParticular LIKE concat('%', telParticular, '%') AND D.deuTPEstado LIKE concat('%', particularEst, '%') AND D.deuMail LIKE concat('%', correo, '%')
        AND 	C.cueMora LIKE concat('%', mora, '%') 			AND C.cueSaldo LIKE concat('%', saldo, '%') AND C.cueFechCorte LIKE concat('%', fechaCorte, '%')
        AND 	D.deuFechAsign LIKE concat('%', fechaAsig, '%') AND C.usuId LIKE concat('%', gestor, '%') AND D.deuAltaEstado LIKE concat('%', status, '%')
        AND		D.deuAlta LIKE concat('%', fechaAlta, '%') AND C.cuePrecastigo LIKE concat('%', precastigo, '%')
        ORDER BY D.deuId;
    ELSE
        SELECT 	D.deuGrupo GRUPO, C.cueCuenta CUENTA, CONCAT(D.deuNombrePila, ' ', D.deuPaterno, ' ', D.deuMaterno) NOMBRE, D.deuCalle CALLE, D.deuNumExt 'NÚMERO EXTERIOR', D.deuNumInt 'NÚMERO INTERIOR', D.deuColonia COLONIA, D.deuMunicipio MUNICIPIO, D.deuEstado ESTADO, D.deuCodigoPostal 'C.P', D.deuTelCelular CELULAR, D.deuTCEstado 'ESTADO CELULAR', D.deuTelTrabajo 'CONTACTO TRABAJO', D.deuTTEstado 'ESTADO TRABAJO', D.deuTelParticular 'TELÉFONO PARTICULAR', D.deuTPEstado 'ESTADO PARTICULAR', D.deuMail CORREO, C.cueMora MORA, C.cueSaldo SALDO, C.cueFechCorte 'FECHA CORTE', D.deuFechAsign 'FECHA ASIGNACIÓN', C.usuId GESTOR, D.deuAltaEstado 'STATUS', D.deuAlta 'FECHA ALTA', C.cuePrecastigo PRECASTIGO 
    	FROM    CUENTA C, DEUDOR D
        WHERE	C.deuId = D.deuId
        AND		D.deuActivo = 1
        AND		D.deuGrupo LIKE concat('%', grupo, '%') 		AND C.cueCuenta LIKE concat('%', cuenta, '%') AND C.cueCuenta LIKE concat('%', cuenta, '%') 
        AND 	D.deuNombrePila LIKE concat('%', nombre, '%')	AND D.deuCalle LIKE concat('%', calle, '%')	  AND D.deuNumExt LIKE concat('%', numExt, '%')
        AND 	D.deuNumInt LIKE concat('%', numInt, '%')		AND D.deuColonia LIKE concat('%', colonia, '%')	AND D.deuMunicipio LIKE concat('%', municipio, '%')
        AND 	D.deuEstado LIKE concat('%', estado, '%')		AND D.deuCodigoPostal LIKE concat('%', cp, '%') AND D.deuTelCelular LIKE concat('%', celular, '%')
        AND 	D.deuTCEstado LIKE concat('%', celularEst, '%') AND D.deuTelTrabajo LIKE concat('%', telTrabajo, '%') AND D.deuTTEstado LIKE concat('%', trabajoEst, '%')
        AND 	D.deuTelParticular LIKE concat('%', telParticular, '%') AND D.deuTPEstado LIKE concat('%', particularEst, '%') AND D.deuMail LIKE concat('%', correo, '%')
        AND 	C.cueMora LIKE concat('%', mora, '%') 			AND C.cueSaldo LIKE concat('%', saldo, '%') AND C.cueFechCorte LIKE concat('%', fechaCorte, '%')
        AND 	D.deuFechAsign LIKE concat('%', fechaAsig, '%') AND C.usuId LIKE concat('%', gestor, '%') AND D.deuAltaEstado LIKE concat('%', status, '%')
        AND		D.deuAlta LIKE concat('%', fechaAlta, '%') ANd C.cuePrecastigo LIKE concat('%', precastigo, '%')
        ORDER BY D.deuId
     	LIMIT inicioPag, numReg;
        END IF;
END$$

CREATE DEFINER=`id16674937_admindeudoresdb`@`%` PROCEDURE `spConsCarac` (IN `cve` INT, IN `op` INT, IN `inicioPag` INT, IN `numReg` INT)  BEGIN
	IF op=0 THEN
    	SELECT 	cs.csFecha FECHA, cs.csRegistro 'REGISTRO SEGUIMIENTO', cs.csPromesas PROMESAS
    	FROM    CARACTERISTICASSEG cs, SEGUIMIENTO s
        WHERE	s.segId = cs.segId AND s.segId = cve
        ORDER BY FECHA;
    ELSEIF op=1 THEN
        SELECT 	cs.csFecha FECHA, cs.csRegistro 'REGISTRO SEGUIMIENTO', cs.csPromesas PROMESAS
    	FROM    CARACTERISTICASSEG cs, SEGUIMIENTO s
        WHERE	s.segId = cs.segId AND s.segId = cve
        ORDER BY FECHA
     	LIMIT inicioPag, numReg;
    END IF;
END$$

CREATE DEFINER=`id16674937_admindeudoresdb`@`%` PROCEDURE `spConsCuenta` (IN `op` INT, IN `inicioPag` INT, IN `numReg` INT)  BEGIN
	IF op=0 THEN
    	SELECT 	D.deuGrupo GRUPO, C.cueCuenta CUENTA, CONCAT(D.deuNombrePila, ' ', D.deuPaterno, ' ', D.deuMaterno) NOMBRE, D.deuCalle CALLE, D.deuNumExt 'NÚMERO EXTERIOR', D.deuNumInt 'NÚMERO INTERIOR', D.deuColonia COLONIA, D.deuMunicipio MUNICIPIO, D.deuEstado ESTADO, D.deuCodigoPostal 'C.P', D.deuTelCelular CELULAR, D.deuTCEstado 'ESTADO CELULAR', D.deuTelTrabajo 'CONTACTO TRABAJO', D.deuTTEstado 'ESTADO TRABAJO', D.deuTelParticular 'TELÉFONO PARTICULAR', D.deuTPEstado 'ESTADO PARTICULAR', D.deuMail CORREO, C.cueMora MORA, C.cueSaldo SALDO, C.cueFechCorte 'FECHA CORTE', D.deuFechAsign 'FECHA ASIGNACIÓN', C.usuId GESTOR, D.deuAltaEstado 'STATUS', D.deuAlta 'FECHA ALTA', C.cuePrecastigo PRECASTIGO 
    	FROM    CUENTA C, DEUDOR D
        WHERE	C.deuId = D.deuId
        AND		D.deuActivo = 1
        ORDER BY D.deuId;
    ELSE
        SELECT 	D.deuId ID, D.deuGrupo GRUPO, C.cueCuenta CUENTA, CONCAT(D.deuNombrePila, ' ', D.deuPaterno, ' ', D.deuMaterno) NOMBRE, D.deuCalle CALLE, D.deuNumExt 'NÚMERO EXTERIOR', D.deuNumInt 'NÚMERO INTERIOR', D.deuColonia COLONIA, D.deuMunicipio MUNICIPIO, D.deuEstado ESTADO, D.deuCodigoPostal 'C.P', D.deuTelCelular CELULAR, D.deuTCEstado 'ESTADO CELULAR', D.deuTelTrabajo 'CONTACTO TRABAJO', D.deuTTEstado 'ESTADO TRABAJO', D.deuTelParticular 'TELÉFONO PARTICULAR', D.deuTPEstado 'ESTADO PARTICULAR', D.deuMail CORREO, C.cueMora MORA, C.cueSaldo SALDO, C.cueFechCorte 'FECHA CORTE', D.deuFechAsign 'FECHA ASIGNACIÓN', C.usuId GESTOR, D.deuAltaEstado 'STATUS', D.deuAlta 'FECHA ALTA', C.cuePrecastigo PRECASTIGO 
    	FROM    CUENTA C, DEUDOR D
        WHERE	C.deuId = D.deuId
        AND		D.deuActivo = 1
        ORDER BY D.deuId
     	LIMIT inicioPag, numReg;
        END IF;
END$$

CREATE DEFINER=`id16674937_admindeudoresdb`@`%` PROCEDURE `spConsSeguimiento` (IN `op` INT, IN `inicioPag` INT, IN `numReg` INT)  BEGIN
	IF op=0 THEN
    	SELECT 	s.segId CLAVE, CONCAT(d.deuNombrePila, ' ', d.deuPaterno, ' ', d.deuMaterno) PROPIETARIO, c.cueCuenta CUENTA, CONCAT(u.usuNombrePila, ' ', u.usuPaterno, ' ', u.usuMaterno) ENCARGADO, s.segTotalPagado SALDADO 
    	FROM    SEGUIMIENTO s, USUARIO u, CUENTA c, DEUDOR d, USUARIODEUDOR ud
        WHERE	d.deuId = c.deuId AND c.cueId = s.cueId AND d.deuId = ud.deuId AND ud.usuId = u.usuId AND d.deuActivo = 1
        ORDER BY CLAVE;
    ELSE
        SELECT 	s.segId CLAVE, CONCAT(d.deuNombrePila, ' ', d.deuPaterno, ' ', d.deuMaterno) PROPIETARIO, c.cueCuenta CUENTA, CONCAT(u.usuNombrePila, ' ', u.usuPaterno, ' ', u.usuMaterno) ENCARGADO, s.segTotalPagado SALDADO
    	FROM    SEGUIMIENTO s, USUARIO u, CUENTA c, DEUDOR d, USUARIODEUDOR ud
        WHERE	d.deuId = c.deuId AND c.cueId = s.cueId AND d.deuId = ud.deuId AND ud.usuId = u.usuId AND d.deuActivo = 1
        ORDER BY CLAVE
     	LIMIT inicioPag, numReg;
    END IF;
END$$

CREATE DEFINER=`id16674937_admindeudoresdb`@`%` PROCEDURE `spFiltrarCuenta` (IN `cve` INT)  BEGIN
	IF EXISTS(SELECT * FROM DEUDOR WHERE deuId = cve) THEN
    	SELECT 	D.deuId ID, D.deuGrupo GRUPO, C.cueCuenta CUENTA, CONCAT(D.deuNombrePila, ' ', D.deuPaterno, ' ', D.deuMaterno) NOMBRE, D.deuCalle CALLE, D.deuNumExt 'NÚMERO EXTERIOR', D.deuNumInt 'NÚMERO INTERIOR', D.deuColonia COLONIA, D.deuMunicipio MUNICIPIO, D.deuEstado ESTADO, D.deuCodigoPostal 'C.P', D.deuTelCelular CELULAR, D.deuTCEstado 'ESTADO CELULAR', D.deuTelTrabajo 'CONTACTO TRABAJO', D.deuTTEstado 'ESTADO TRABAJO', D.deuTelParticular 'TELÉFONO PARTICULAR', D.deuTPEstado 'ESTADO PARTICULAR', D.deuMail CORREO, C.cueMora MORA, C.cueSaldo SALDO, C.cueFechCorte 'FECHA CORTE', D.deuFechAsign 'FECHA ASIGNACIÓN', C.usuId GESTOR, D.deuAltaEstado 'STATUS', D.deuAlta 'FECHA ALTA', C.cuePrecastigo PRECASTIGO 
    	FROM    CUENTA C, DEUDOR D
        WHERE	C.deuId = D.deuId
        AND		D.deuActivo = 1
        AND		D.deuId = cve;
    ELSE
    	SELECT "0" AS ID;
    END IF;
END$$

CREATE DEFINER=`id16674937_admindeudoresdb`@`%` PROCEDURE `spInsCarac` (IN `seg` INT, IN `act` TEXT, IN `prom` TEXT)  BEGIN
 INSERT INTO CARACTERISTICASSEG VALUES(0, NOW(), act, prom, seg);
 SELECT "1" AS ID;
END$$

CREATE DEFINER=`id16674937_admindeudoresdb`@`%` PROCEDURE `spInsSeg` (IN `usu` INT, IN `cue` INT, IN `pagado` BIGINT, IN `empr` INT)  BEGIN
	IF EXISTS(SELECT usuId FROM USUARIO WHERE usuId= usu) THEN
    	IF EXISTS(SELECT cueId FROM CUENTA WHERE cueId=cue)THEN
        	IF EXISTS(SELECT cliId FROM CLIENTE WHERE cliId=empr)THEN
            	INSERT INTO SEGUIMIENTO VALUES(0, usu, cue, pagado, empr);
            ELSE
            	SELECT "0";
            END IF;
        ELSE
        	SELECT "0";
        END IF;
    ELSE
    	SELECT "0";
    END IF;
END$$

CREATE DEFINER=`id16674937_admindeudoresdb`@`%` PROCEDURE `spModAdmin` (IN `op1` INT, IN `op2` INT, IN `op3` INT, IN `fechaAlta` DATE, IN `opcionAlta` VARCHAR(20), IN `deudor` INT, IN `GRUPO` VARCHAR(25), IN `GESTOR` INT, IN `PRECASTIGO` INT)  BEGIN
	IF EXISTS (SELECT D.deuId FROM DEUDOR D, USUARIO U WHERE D.deuId=deudor AND U.usuId = GESTOR)THEN
    	UPDATE DEUDOR SET deuTCEstado = op1, deuTTEstado = op2, deuTPEstado = op3, deuAlta = fechaAlta, deuAltaEstado =  opcionAlta, deuGrupo = GRUPO WHERE deuId=deudor;
        UPDATE CUENTA SET usuId = GESTOR, cuePrecastigo =  PRECASTIGO WHERE deuId = deudor;
        SELECT "1" ID;
    ELSE
    	SELECT "0" ID;
    	
    END IF;
END$$

CREATE DEFINER=`id16674937_admindeudoresdb`@`%` PROCEDURE `spValidarAcceso` (IN `usuario` VARCHAR(50), IN `contra` VARCHAR(50))  BEGIN 
	IF EXISTS (SELECT * FROM USUARIO A WHERE A.usuUsuario = usuario AND A.usuContrasena = contra) THEN
    	SELECT U.usuId CLAVE,
        	   CONCAT (U.usuNombrePila, " ", U.usuPaterno, " ", U.usuMaterno) USUARIO, 
               U.usuRol ROL
        FROM USUARIO U
        WHERE	U.usuUsuario = usuario
        AND 	U.usuContrasena = contra; 
	ELSE 
    	SELECT "0" CLAVE;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CARACTERISTICASSEG`
--

CREATE TABLE `CARACTERISTICASSEG` (
  `csId` int(11) NOT NULL,
  `csFecha` date NOT NULL,
  `csRegistro` text COLLATE utf8_unicode_ci NOT NULL,
  `csPromesas` text COLLATE utf8_unicode_ci NOT NULL,
  `segId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `CARACTERISTICASSEG`
--

INSERT INTO `CARACTERISTICASSEG` (`csId`, `csFecha`, `csRegistro`, `csPromesas`, `segId`) VALUES
(1, '2021-04-23', 'El día de hoy se contacto con la persona por medio de su teléfono celular a lo que se recibió una respuesta positiva.', 'Se llego al acuerdo de que la siguiente semana se generaría una reunión para el cambio de fechas respecto a su fecha de corte.', 1),
(2, '2021-04-24', 'Se realizo el pago pertinente al primer pago desacuerdo a la deuda registrada.', 'Sigue en proceso de reunión para el cambio de fecha de corte.', 1),
(3, '2021-04-24', 'Se comenzó a comunicar con el Caso Efraín por medio de los datos proporcionados.', 'No se ha logrado obtener comunicación.', 2),
(4, '2021-04-24', 'Se intento comunicar con la persona, sin embargo no contesto', 'No se han tenido cambios desde la ultima vez que se contacto', 2),
(5, '2021-04-24', 'Se logro contactar con la persona sin embargo su respuesta fue negativa.', 'No se ha superado lo que ya se había estipulado.', 2),
(6, '2021-04-24', 'Se logro contactar con la persona sin embargo su respuesta fue negativa.', 'No se ha superado lo que ya se había estipulado.', 1),
(7, '2021-04-24', 'No se logro contactar con la persona.', 'No se ha superado lo que ya se había estipulado.', 1),
(8, '2021-04-24', 'No se logro contactar con la persona.', 'No se ha superado lo que ya se había estipulado.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CLIENTE`
--

CREATE TABLE `CLIENTE` (
  `cliId` int(11) NOT NULL,
  `cliEmpresa` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cliCelular` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cliCorreo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `CLIENTE`
--

INSERT INTO `CLIENTE` (`cliId`, `cliEmpresa`, `cliCelular`, `cliCorreo`) VALUES
(1, 'Liverpool', '7717724560', 'janer@liverpool.com'),
(2, 'Elecktra', '7717724561', 'ivone@elecktra.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CUENTA`
--

CREATE TABLE `CUENTA` (
  `cueId` int(11) NOT NULL,
  `cueCuenta` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `usuId` int(11) NOT NULL,
  `cueSaldo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cueMora` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `cuePrecastigo` int(11) NOT NULL,
  `cueFechCorte` date NOT NULL,
  `deuId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `CUENTA`
--

INSERT INTO `CUENTA` (`cueId`, `cueCuenta`, `usuId`, `cueSaldo`, `cueMora`, `cuePrecastigo`, `cueFechCorte`, `deuId`) VALUES
(1, '123456789', 1, '10', '6', 0, '2021-04-08', 1),
(2, '154865325145', 2, '1500000', '6', 1, '2021-04-27', 2),
(3, '0000013000029938573', 1, '18248.63', '6', 0, '2021-04-19', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DEUDOR`
--

CREATE TABLE `DEUDOR` (
  `deuId` int(11) NOT NULL,
  `deuNombrePila` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deuPaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deuMaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deuCalle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deuNumExt` int(11) DEFAULT NULL,
  `deuNumInt` int(11) DEFAULT NULL,
  `deuColonia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deuMunicipio` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deuEstado` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deuCodigoPostal` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `deuTelCelular` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deuTelParticular` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deuTelTrabajo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deuTCEstado` int(11) DEFAULT NULL,
  `deuTPEstado` int(11) DEFAULT NULL,
  `deuTTEstado` int(11) DEFAULT NULL,
  `deuMail` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `deuFechAsign` date NOT NULL,
  `deuAlta` date NOT NULL,
  `deuAltaEstado` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `deuGrupo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `deuActivo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `DEUDOR`
--

INSERT INTO `DEUDOR` (`deuId`, `deuNombrePila`, `deuPaterno`, `deuMaterno`, `deuCalle`, `deuNumExt`, `deuNumInt`, `deuColonia`, `deuMunicipio`, `deuEstado`, `deuCodigoPostal`, `deuTelCelular`, `deuTelParticular`, `deuTelTrabajo`, `deuTCEstado`, `deuTPEstado`, `deuTTEstado`, `deuMail`, `deuFechAsign`, `deuAlta`, `deuAltaEstado`, `deuGrupo`, `deuActivo`) VALUES
(1, 'Pablo', 'Perez', 'Hernandez', 'Flores', 12, 11, 'Pedregal', 'Pachuca', 'Hidalgo', '41190', '7717725467', '7717725466', '7717725465', 1, 0, 1, 'pablo@gmail.com', '2021-04-21', '2021-04-07', 'Contactado', 'Zona metropolitana', 1),
(2, 'Efraín', 'Mohedano', 'Torres', 'Domicilio conocido', 2, 2, 'Pedregal', 'Mineral de la Reforma', 'Hidalgo', '45190', '7717724568', '5517724568', '7717254568', 0, 0, 1, 'emohedano@gmeil.com', '2021-04-24', '2021-04-24', 'Renuente', 'Interior de la republica', 1),
(3, 'Elsa María', 'Moreno', 'Gutierrez', 'Av. Insurgentes Sur', 3493, 2, 'U Hab Villa Olimpica', 'Tultepec', 'Mexico', '14020', '0445514175', '5555555555', '56502055', 0, 0, 0, 'GABRIELAESDIAZ@GMAIL.COM', '2021-06-19', '2021-04-24', 'Ilocalizable', 'Zona Metropolitana', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SEGUIMIENTO`
--

CREATE TABLE `SEGUIMIENTO` (
  `segId` int(11) NOT NULL,
  `usuId` int(11) NOT NULL,
  `cueId` int(11) NOT NULL,
  `segTotalPagado` bigint(20) NOT NULL,
  `cliId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `SEGUIMIENTO`
--

INSERT INTO `SEGUIMIENTO` (`segId`, `usuId`, `cueId`, `segTotalPagado`, `cliId`) VALUES
(1, 2, 1, 30000, 1),
(2, 1, 2, 3000, 2),
(3, 1, 3, 18248, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

CREATE TABLE `USUARIO` (
  `usuId` int(11) NOT NULL,
  `usuUsuario` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `usuContrasena` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `usuNombrePila` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuPaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuMaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuCelular` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `usuAutorizacion` int(11) NOT NULL,
  `usuEstado` int(11) NOT NULL,
  `usuRol` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`usuId`, `usuUsuario`, `usuContrasena`, `usuNombrePila`, `usuPaterno`, `usuMaterno`, `usuCelular`, `usuAutorizacion`, `usuEstado`, `usuRol`) VALUES
(1, 'mVega', 'bee28886e5b79c583cf0ae76ecd1ff5a', 'Marco', 'Vega', 'Parra', '7717726578', 1, 1, 'Administrador'),
(2, 'dMendoza', 'fcf9e1982e617675b66e0456f642e7d9', 'Dylan', 'Mendoza', 'Hernandez', '7717756571', 1, 1, 'Gestor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIODEUDOR`
--

CREATE TABLE `USUARIODEUDOR` (
  `usuId` int(11) NOT NULL,
  `deuId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `USUARIODEUDOR`
--

INSERT INTO `USUARIODEUDOR` (`usuId`, `deuId`) VALUES
(1, 1),
(1, 3),
(2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CARACTERISTICASSEG`
--
ALTER TABLE `CARACTERISTICASSEG`
  ADD PRIMARY KEY (`csId`),
  ADD KEY `segId` (`segId`);

--
-- Indices de la tabla `CLIENTE`
--
ALTER TABLE `CLIENTE`
  ADD PRIMARY KEY (`cliId`);

--
-- Indices de la tabla `CUENTA`
--
ALTER TABLE `CUENTA`
  ADD PRIMARY KEY (`cueId`),
  ADD KEY `usuId` (`usuId`),
  ADD KEY `deuId` (`deuId`);

--
-- Indices de la tabla `DEUDOR`
--
ALTER TABLE `DEUDOR`
  ADD PRIMARY KEY (`deuId`);

--
-- Indices de la tabla `SEGUIMIENTO`
--
ALTER TABLE `SEGUIMIENTO`
  ADD PRIMARY KEY (`segId`),
  ADD KEY `usuId` (`usuId`),
  ADD KEY `cueId` (`cueId`),
  ADD KEY `cliId` (`cliId`);

--
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`usuId`);

--
-- Indices de la tabla `USUARIODEUDOR`
--
ALTER TABLE `USUARIODEUDOR`
  ADD PRIMARY KEY (`usuId`,`deuId`),
  ADD KEY `deuId` (`deuId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CARACTERISTICASSEG`
--
ALTER TABLE `CARACTERISTICASSEG`
  MODIFY `csId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `CLIENTE`
--
ALTER TABLE `CLIENTE`
  MODIFY `cliId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `CUENTA`
--
ALTER TABLE `CUENTA`
  MODIFY `cueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `DEUDOR`
--
ALTER TABLE `DEUDOR`
  MODIFY `deuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `SEGUIMIENTO`
--
ALTER TABLE `SEGUIMIENTO`
  MODIFY `segId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  MODIFY `usuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CARACTERISTICASSEG`
--
ALTER TABLE `CARACTERISTICASSEG`
  ADD CONSTRAINT `CARACTERISTICASSEG_ibfk_1` FOREIGN KEY (`segId`) REFERENCES `SEGUIMIENTO` (`segId`);

--
-- Filtros para la tabla `CUENTA`
--
ALTER TABLE `CUENTA`
  ADD CONSTRAINT `CUENTA_ibfk_1` FOREIGN KEY (`usuId`) REFERENCES `USUARIO` (`usuId`),
  ADD CONSTRAINT `CUENTA_ibfk_2` FOREIGN KEY (`deuId`) REFERENCES `DEUDOR` (`deuId`);

--
-- Filtros para la tabla `SEGUIMIENTO`
--
ALTER TABLE `SEGUIMIENTO`
  ADD CONSTRAINT `SEGUIMIENTO_ibfk_1` FOREIGN KEY (`usuId`) REFERENCES `USUARIO` (`usuId`),
  ADD CONSTRAINT `SEGUIMIENTO_ibfk_2` FOREIGN KEY (`cueId`) REFERENCES `CUENTA` (`cueId`),
  ADD CONSTRAINT `SEGUIMIENTO_ibfk_3` FOREIGN KEY (`cliId`) REFERENCES `CLIENTE` (`cliId`);

--
-- Filtros para la tabla `USUARIODEUDOR`
--
ALTER TABLE `USUARIODEUDOR`
  ADD CONSTRAINT `USUARIODEUDOR_ibfk_1` FOREIGN KEY (`usuId`) REFERENCES `USUARIO` (`usuId`),
  ADD CONSTRAINT `USUARIODEUDOR_ibfk_2` FOREIGN KEY (`deuId`) REFERENCES `DEUDOR` (`deuId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
