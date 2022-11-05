
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facilitador`
--

DROP TABLE IF EXISTS `facilitador`;
CREATE TABLE IF NOT EXISTS `facilitador` (
  `id_facilitador` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL,
  `barrio` varchar(200) DEFAULT NULL,
  `celular` int(20) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `obs` varchar(50) DEFAULT NULL,
  `nombre_apellido` varchar(80) NOT NULL,
  `observacion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_facilitador`),
  KEY `id_facilitador` (`id_facilitador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facilitador`
--

INSERT INTO `facilitador` (`id_facilitador`, `nombre`, `pass`, `barrio`, `celular`, `estado`, `obs`, `nombre_apellido`, `observacion`) VALUES
(342534, 'admin', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 'vila morra', 9811223, '0', 'principal', 'Juan Roberto Perales', NULL),
(345645, 'user', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 'San lorenzo', 2345, '1', 'secundario', 'Ruid diaz', 'nuevo');
