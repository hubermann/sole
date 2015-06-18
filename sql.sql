
CREATE TABLE `agendados` (
   `id` int(11) unsigned not null auto_increment,
   `categoria_id` int(1) not null,
   `nombre` text not null,
   `apellido` text not null,
   `razon_social` varchar(120) not null,
   `direccion` varchar(180) not null,
   `telefono` varchar(100) not null,
   `movil` varchar(100) not null,
   `email` varchar(100) not null,
   `email2` varchar(100) not null,
   `cuit` varchar(100) not null,
   `observaciones` text not null,
   `created_at` datetime not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=6;

INSERT INTO `agendados` (`id`, `categoria_id`, `nombre`, `apellido`, `razon_social`, `direccion`, `telefono`, `movil`, `email`, `email2`, `cuit`, `observaciones`, `created_at`) VALUES 
('1', '1', 'demo nombre', 'demo apelid', 'larazon', 'direccion22323', '4444444', '555555', 'email@mail.com', 'asdasd', '12321', 'las dlaksdlaskd', '2015-12-12 00:00:00'),
('2', '1', 'demo noasdasdmbre', 'demo aasdasdpelid', 'larazon', 'direccion22323', '4444444', '555555', 'email@mail.com', 'asdasd', '12321', 'las dlaksdlaskd', '2015-12-12 00:00:00'),
('3', '1', 'd3333emo noa3333sdasdmbre', 'demo aasdasdpelid', 'larazon', 'direccion22323', '4444444', '555555', 'email@mail.com', 'asdasd', '12321', 'las dlaksdlaskd', '2015-12-12 00:00:00'),
('4', '1', '444demo nombre', 'de44444mo apelid', 'larazon', 'direccion22323', '4444444', '555555', 'email@mail.com', 'asdasd', '12321', 'las dlaksdlaskd', '2015-12-12 00:00:00'),
('5', '1', '55555demo nombre', 'de44444mo apelid', 'larazon', 'direccion22323', '4444444', '555555', 'email@mail.com', 'asdasd', '12321', 'las dlaksdlaskd', '2015-12-12 00:00:00');

CREATE TABLE `articulos` (
   `id` int(11) unsigned not null auto_increment,
   `codigo` text not null,
   `temporada_id` int(11) not null,
   `tela` varchar(120) not null,
   `valor_unitario` int(10) not null,
   `status` int(1) not null,
   `descripcion` text not null,
   `observaciones` text not null,
   `filename` varchar(250) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [Table `articulos` is empty]

CREATE TABLE `categorias_gastos` (
   `id` int(11) unsigned not null auto_increment,
   `nombre` varchar(100) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [Table `categorias_gastos` is empty]

CREATE TABLE `ci_sessions` (
   `id` varchar(40) not null,
   `ip_address` varchar(45) not null,
   `timestamp` int(10) unsigned not null default '0',
   `data` blob not null,
   PRIMARY KEY (`id`),
   KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `gastos` (
   `id` int(11) unsigned not null auto_increment,
   `categoria_id` int(11) not null,
   `importe` int(10) not null,
   `detalle` text not null,
   `fecha` datetime not null,
   `created_at` datetime not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [Table `gastos` is empty]

CREATE TABLE `ingresos` (
   `id` int(11) unsigned not null auto_increment,
   `pedido_id` int(11) not null,
   `monto` int(11) not null,
   `porcentaje` int(10) not null,
   `tipo` int(1) not null,
   `banco` varchar(120) not null,
   `numero_cheque` int(11) not null,
   `vencimiento` datetime not null,
   `fecha` datetime not null,
   `created_at` datetime not null,
   `observaciones` text not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [Table `ingresos` is empty]

CREATE TABLE `migrations` (
   `version` bigint(20) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `migrations` (`version`) VALUES 
('9');

CREATE TABLE `pedidos` (
   `id` int(11) unsigned not null auto_increment,
   `cliente_id` int(11) not null,
   `created_at` datetime not null,
   `fecha` datetime not null,
   `status` int(1) not null,
   `observaciones` text not null,
   `monto_total` int(11) not null,
   `pagado` int(1) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [Table `pedidos` is empty]

CREATE TABLE `pedidos_items` (
   `id` int(11) unsigned not null auto_increment,
   `pedido_id` int(11) not null,
   `codigo` int(10) not null,
   `cantidad` int(11) not null,
   `valor_unitario` int(11) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [Table `pedidos_items` is empty]

CREATE TABLE `temporadas` (
   `id` int(11) unsigned not null auto_increment,
   `nombre` varchar(250) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [Table `temporadas` is empty]

CREATE TABLE `useradmin` (
   `id` int(11) unsigned not null auto_increment,
   `email` varchar(100) not null,
   `password` varchar(100) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;

INSERT INTO `useradmin` (`id`, `email`, `password`) VALUES 
('1', 'admin', 'plokij');