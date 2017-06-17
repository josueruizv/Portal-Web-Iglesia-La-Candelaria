-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2017 a las 20:42:38
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iglesia`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bautizo` (IN `codigobau` INT(10), IN `codigomin` INT(10), IN `codigoper` INT(10), IN `fechabau` DATE, IN `observacionbau` TEXT)  NO SQL
BEGIN
		DECLARE v_boleta INT;
		DECLARE v_folio INT;
		DECLARE v_libro INT;
	
		

		IF(codigobau = 0)THEN
	
			SET v_libro=1; 
			SET v_folio=1;
			SET v_boleta=1;
		
		ELSE
			
		SELECT libro_bau FROM bautizo WHERE codigo_bau=codigobau
		INTO v_libro;

			SELECT folio_bau FROM bautizo WHERE codigo_bau=codigobau AND libro_bau = v_libro
			INTO v_folio;

			SELECT boleta_bau FROM bautizo WHERE libro_bau = v_libro AND folio_bau = v_folio AND codigo_bau=codigobau
			INTO v_boleta;

			IF(MOD(v_boleta,3)=0) THEN
				SET v_folio = v_folio+1;
			END IF;
			IF(v_boleta = 1498) THEN
				SET v_boleta=1;
				SET v_folio=1;
				SET v_libro=v_libro+1;
			ELSE
				set v_boleta=v_boleta+1;
			END IF;
			
		END IF;
		INSERT INTO bautizo(codigo_min,codigo_per,libro_bau,folio_bau,boleta_bau,fecha_bau,observacion_bau) VALUES (codigomin,codigoper,v_libro,v_folio,v_boleta,fechabau,observacionbau);

   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_comunion` (IN `codigocom` INT(10), IN `codigomin` INT(10), IN `codigoper` INT(10), IN `fechacom` DATE)  NO SQL
BEGIN
        DECLARE v_ministro INT;
		DECLARE v_fecha DATE;
	
		IF(codigocom = 0)THEN
	
            SET v_ministro=codigomin;
		
		ELSE
			
		SELECT fecha_com FROM comunion WHERE codigo_com=codigocom
		INTO v_fecha;

            	
                SELECT codigo_min FROM comunion WHERE fecha_com = v_fecha AND codigo_com=codigocom
                INTO v_ministro;

                IF(v_fecha<>fechacom) THEN
                    set v_ministro=codigomin;
                END IF;
			
		END IF;
		INSERT INTO comunion(codigo_min,codigo_per,fecha_com) VALUES (v_ministro,codigoper,fechacom);

   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_confirmacion` (IN `codigoconf` INT(10), IN `codigomin` INT(10), IN `codigoper` INT(10), IN `fechaconf` DATE)  NO SQL
BEGIN
        DECLARE v_ministro INT;
		DECLARE v_fecha DATE;
	
		IF(codigoconf = 0)THEN
	
            SET v_ministro=codigomin;
		
		ELSE
			
		SELECT fecha_conf FROM confirmacion WHERE codigo_conf=codigoconf
		INTO v_fecha;

            	
                SELECT codigo_min FROM confirmacion WHERE fecha_conf = v_fecha AND codigo_conf=codigoconf
                INTO v_ministro;

                IF(v_fecha<>fechaconf) THEN
                    set v_ministro=codigomin;
                END IF;
			
		END IF;
		INSERT INTO confirmacion(codigo_min,codigo_per,fecha_conf) VALUES (v_ministro,codigoper,fechaconf);

   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_matrimonio` (IN `codigomatri` INT(10), IN `codigomin` INT(10), IN `codigonovio` INT(10), IN `codigonovia` INT(10), IN `fechamatri` DATE, IN `procla` TEXT, IN `dispen` TEXT, IN `sac` TEXT, IN `obs` TEXT)  NO SQL
BEGIN
		DECLARE v_boleta INT;
		DECLARE v_folio INT;
		DECLARE v_libro INT;

		IF(codigomatri = 0)THEN
	
			SET v_libro=1; 
			SET v_folio=1;
			SET v_boleta=1;
		
		ELSE
			
		SELECT libro_matri FROM matrimonio WHERE codigo_matri=codigomatri
		INTO v_libro;

			SELECT folio_matri FROM matrimonio WHERE codigo_matri=codigomatri AND libro_matri = v_libro
			INTO v_folio;

			SELECT boleta_matri FROM matrimonio WHERE libro_matri = v_libro AND folio_matri = v_folio AND codigo_matri=codigomatri
			INTO v_boleta;

			IF(MOD(v_boleta,3)=0) THEN
				SET v_folio = v_folio+1;
			END IF;
			IF(v_boleta = 6) THEN
				SET v_boleta=1;
				SET v_folio=1;
				SET v_libro=v_libro+1;
			ELSE
				set v_boleta=v_boleta+1;
			END IF;
			
		END IF;
		INSERT INTO matrimonio(codigo_min,codigo_per,codigo_per2,fecha_matri,proclamas,dispensas,sacramentos,observacion_matri,libro_matri,folio_matri,boleta_matri) VALUES (codigomin,codigonovio,codigonovia,fechamatri,procla,dispen,sac,obs,v_libro,v_folio,v_boleta);

   END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apostolados`
--

CREATE TABLE `apostolados` (
  `id_apostolado` int(11) NOT NULL,
  `nombre_apostolado` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `detalle_apostolado` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bautizo`
--

CREATE TABLE `bautizo` (
  `codigo_bau` int(10) NOT NULL,
  `codigo_min` int(10) NOT NULL,
  `codigo_per` int(10) NOT NULL,
  `libro_bau` int(10) NOT NULL,
  `folio_bau` int(10) NOT NULL,
  `boleta_bau` int(10) NOT NULL,
  `fecha_bau` date DEFAULT NULL,
  `observacion_bau` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunion`
--

CREATE TABLE `comunion` (
  `codigo_com` int(10) NOT NULL,
  `codigo_min` int(10) NOT NULL,
  `codigo_per` int(10) NOT NULL,
  `fecha_com` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confirmacion`
--

CREATE TABLE `confirmacion` (
  `codigo_conf` int(10) NOT NULL,
  `codigo_per` int(10) NOT NULL,
  `codigo_min` int(10) NOT NULL,
  `fecha_conf` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int(10) NOT NULL,
  `nombre_album` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ruta_directorio` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `rutaprimerafoto` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `codigo_actividad` int(10) NOT NULL,
  `nombre_actividad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `dia` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `observacion_acti` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `madre`
--

CREATE TABLE `madre` (
  `cedula_mad` int(10) NOT NULL,
  `nombre_mad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_mad` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `madrina`
--

CREATE TABLE `madrina` (
  `cedula_mdr` int(10) NOT NULL,
  `nombre_mdr` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_mdr` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matrimonio`
--

CREATE TABLE `matrimonio` (
  `codigo_matri` int(10) NOT NULL,
  `codigo_min` int(10) NOT NULL,
  `codigo_per` int(10) NOT NULL,
  `codigo_per2` int(10) NOT NULL,
  `libro_matri` int(10) NOT NULL,
  `folio_matri` int(10) NOT NULL,
  `boleta_matri` int(10) NOT NULL,
  `proclamas` text COLLATE utf8_spanish_ci NOT NULL,
  `dispensas` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_matri` date NOT NULL,
  `sacramentos` text COLLATE utf8_spanish_ci NOT NULL,
  `observacion_matri` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministro`
--

CREATE TABLE `ministro` (
  `codigo_min` int(10) NOT NULL,
  `ministro_min` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(10) NOT NULL,
  `nombre_noticia` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_noticia` date NOT NULL,
  `autor` text COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `rutaimagen` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre`
--

CREATE TABLE `padre` (
  `cedula_pad` int(10) NOT NULL,
  `nombre_pad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_pad` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padrespersona`
--

CREATE TABLE `padrespersona` (
  `codigo_per` int(10) NOT NULL,
  `cedula_pad` int(10) NOT NULL,
  `cedula_mad` int(10) NOT NULL,
  `filiacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padrino`
--

CREATE TABLE `padrino` (
  `cedula_pdr` int(10) NOT NULL,
  `nombre_pdr` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_pdr` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padrinosbautizado`
--

CREATE TABLE `padrinosbautizado` (
  `codigo_per` int(10) NOT NULL,
  `cedula_pdr` int(10) NOT NULL,
  `cedula_mdr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padrinosboda`
--

CREATE TABLE `padrinosboda` (
  `codigo_per` int(10) NOT NULL,
  `codigo_per2` int(10) NOT NULL,
  `cedula_pdr` int(10) NOT NULL,
  `cedula_mdr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padrinosconfirmando`
--

CREATE TABLE `padrinosconfirmando` (
  `codigo_per` int(10) NOT NULL,
  `cedula_pdr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `codigo_per` int(10) NOT NULL,
  `cedula_per` int(10) DEFAULT NULL,
  `nombre_per` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_per` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `sexo_per` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fechanac_per` date DEFAULT NULL,
  `edad_per` int(3) DEFAULT NULL,
  `lugarnac_per` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `registrocivil_per` text COLLATE utf8_spanish_ci NOT NULL,
  `lugarbautizo_per` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_per` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `estadodir_per` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(4) NOT NULL,
  `usuario_nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `usuario_clave` varchar(32) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `usuario_nombapell` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `usuario_grado` int(11) NOT NULL,
  `usuario_freg` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apostolados`
--
ALTER TABLE `apostolados`
  ADD PRIMARY KEY (`id_apostolado`);

--
-- Indices de la tabla `bautizo`
--
ALTER TABLE `bautizo`
  ADD PRIMARY KEY (`codigo_bau`),
  ADD KEY `codigo_min` (`codigo_min`),
  ADD KEY `codigo_per` (`codigo_per`);

--
-- Indices de la tabla `comunion`
--
ALTER TABLE `comunion`
  ADD PRIMARY KEY (`codigo_com`),
  ADD KEY `codigo_min` (`codigo_min`),
  ADD KEY `codigo_per` (`codigo_per`);

--
-- Indices de la tabla `confirmacion`
--
ALTER TABLE `confirmacion`
  ADD PRIMARY KEY (`codigo_conf`),
  ADD KEY `codigo_per` (`codigo_per`),
  ADD KEY `codigo_min` (`codigo_min`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`codigo_actividad`);

--
-- Indices de la tabla `madre`
--
ALTER TABLE `madre`
  ADD PRIMARY KEY (`cedula_mad`);

--
-- Indices de la tabla `madrina`
--
ALTER TABLE `madrina`
  ADD PRIMARY KEY (`cedula_mdr`);

--
-- Indices de la tabla `matrimonio`
--
ALTER TABLE `matrimonio`
  ADD PRIMARY KEY (`codigo_matri`),
  ADD KEY `codig_min` (`codigo_min`,`codigo_per`,`codigo_per2`),
  ADD KEY `codigo_min` (`codigo_min`),
  ADD KEY `codigo_per` (`codigo_per`),
  ADD KEY `codigo_per2` (`codigo_per2`);

--
-- Indices de la tabla `ministro`
--
ALTER TABLE `ministro`
  ADD PRIMARY KEY (`codigo_min`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `padre`
--
ALTER TABLE `padre`
  ADD PRIMARY KEY (`cedula_pad`);

--
-- Indices de la tabla `padrespersona`
--
ALTER TABLE `padrespersona`
  ADD UNIQUE KEY `codigo_per_2` (`codigo_per`),
  ADD KEY `codigo_per` (`codigo_per`),
  ADD KEY `cedula_pad` (`cedula_pad`),
  ADD KEY `cedula_mad` (`cedula_mad`);

--
-- Indices de la tabla `padrino`
--
ALTER TABLE `padrino`
  ADD PRIMARY KEY (`cedula_pdr`);

--
-- Indices de la tabla `padrinosbautizado`
--
ALTER TABLE `padrinosbautizado`
  ADD UNIQUE KEY `codigo_per_2` (`codigo_per`),
  ADD KEY `codigo_per` (`codigo_per`),
  ADD KEY `cedula_pdr` (`cedula_pdr`),
  ADD KEY `cedula_mdr` (`cedula_mdr`);

--
-- Indices de la tabla `padrinosboda`
--
ALTER TABLE `padrinosboda`
  ADD UNIQUE KEY `codigo_per_2` (`codigo_per`),
  ADD UNIQUE KEY `codigo_per2_2` (`codigo_per2`),
  ADD KEY `codigo_per` (`codigo_per`,`codigo_per2`,`cedula_pdr`,`cedula_mdr`),
  ADD KEY `codigo_per2` (`codigo_per2`),
  ADD KEY `cedula_pdr` (`cedula_pdr`),
  ADD KEY `cedula_mdr` (`cedula_mdr`);

--
-- Indices de la tabla `padrinosconfirmando`
--
ALTER TABLE `padrinosconfirmando`
  ADD UNIQUE KEY `codigo_per_3` (`codigo_per`),
  ADD KEY `codigo_per` (`codigo_per`,`cedula_pdr`),
  ADD KEY `codigo_per_2` (`codigo_per`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`codigo_per`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `usuario_nombre` (`usuario_nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apostolados`
--
ALTER TABLE `apostolados`
  MODIFY `id_apostolado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `bautizo`
--
ALTER TABLE `bautizo`
  MODIFY `codigo_bau` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comunion`
--
ALTER TABLE `comunion`
  MODIFY `codigo_com` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `confirmacion`
--
ALTER TABLE `confirmacion`
  MODIFY `codigo_conf` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `codigo_actividad` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `matrimonio`
--
ALTER TABLE `matrimonio`
  MODIFY `codigo_matri` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ministro`
--
ALTER TABLE `ministro`
  MODIFY `codigo_min` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `codigo_per` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bautizo`
--
ALTER TABLE `bautizo`
  ADD CONSTRAINT `bautizo_ibfk_1` FOREIGN KEY (`codigo_min`) REFERENCES `ministro` (`codigo_min`),
  ADD CONSTRAINT `bautizo_ibfk_2` FOREIGN KEY (`codigo_per`) REFERENCES `personas` (`codigo_per`);

--
-- Filtros para la tabla `comunion`
--
ALTER TABLE `comunion`
  ADD CONSTRAINT `comunion_ibfk_1` FOREIGN KEY (`codigo_min`) REFERENCES `ministro` (`codigo_min`),
  ADD CONSTRAINT `comunion_ibfk_2` FOREIGN KEY (`codigo_per`) REFERENCES `personas` (`codigo_per`);

--
-- Filtros para la tabla `confirmacion`
--
ALTER TABLE `confirmacion`
  ADD CONSTRAINT `confirmacion_ibfk_1` FOREIGN KEY (`codigo_per`) REFERENCES `personas` (`codigo_per`),
  ADD CONSTRAINT `confirmacion_ibfk_2` FOREIGN KEY (`codigo_min`) REFERENCES `ministro` (`codigo_min`);

--
-- Filtros para la tabla `matrimonio`
--
ALTER TABLE `matrimonio`
  ADD CONSTRAINT `matrimonio_ibfk_1` FOREIGN KEY (`codigo_min`) REFERENCES `ministro` (`codigo_min`),
  ADD CONSTRAINT `matrimonio_ibfk_2` FOREIGN KEY (`codigo_per`) REFERENCES `personas` (`codigo_per`),
  ADD CONSTRAINT `matrimonio_ibfk_3` FOREIGN KEY (`codigo_per2`) REFERENCES `personas` (`codigo_per`);

--
-- Filtros para la tabla `padrespersona`
--
ALTER TABLE `padrespersona`
  ADD CONSTRAINT `padrespersona_ibfk_1` FOREIGN KEY (`codigo_per`) REFERENCES `personas` (`codigo_per`),
  ADD CONSTRAINT `padrespersona_ibfk_2` FOREIGN KEY (`cedula_pad`) REFERENCES `padre` (`cedula_pad`),
  ADD CONSTRAINT `padrespersona_ibfk_3` FOREIGN KEY (`cedula_mad`) REFERENCES `madre` (`cedula_mad`);

--
-- Filtros para la tabla `padrinosbautizado`
--
ALTER TABLE `padrinosbautizado`
  ADD CONSTRAINT `padrinosbautizado_ibfk_1` FOREIGN KEY (`codigo_per`) REFERENCES `personas` (`codigo_per`),
  ADD CONSTRAINT `padrinosbautizado_ibfk_2` FOREIGN KEY (`cedula_pdr`) REFERENCES `padrino` (`cedula_pdr`),
  ADD CONSTRAINT `padrinosbautizado_ibfk_3` FOREIGN KEY (`cedula_mdr`) REFERENCES `madrina` (`cedula_mdr`);

--
-- Filtros para la tabla `padrinosboda`
--
ALTER TABLE `padrinosboda`
  ADD CONSTRAINT `padrinosboda_ibfk_1` FOREIGN KEY (`codigo_per`) REFERENCES `personas` (`codigo_per`),
  ADD CONSTRAINT `padrinosboda_ibfk_2` FOREIGN KEY (`codigo_per2`) REFERENCES `personas` (`codigo_per`),
  ADD CONSTRAINT `padrinosboda_ibfk_3` FOREIGN KEY (`cedula_pdr`) REFERENCES `padrino` (`cedula_pdr`),
  ADD CONSTRAINT `padrinosboda_ibfk_4` FOREIGN KEY (`cedula_mdr`) REFERENCES `madrina` (`cedula_mdr`);

--
-- Filtros para la tabla `padrinosconfirmando`
--
ALTER TABLE `padrinosconfirmando`
  ADD CONSTRAINT `padrinosconfirmando_ibfk_1` FOREIGN KEY (`codigo_per`) REFERENCES `personas` (`codigo_per`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
