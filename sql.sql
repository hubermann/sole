
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

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES 
('08d2d2c316fd7cccdfe43405db78595ee2a96eea', '::1', '1433784383', '__ci_last_regenerate|i:1433784383;'),
('0a111492d73136e0c9a07badec792abd6882363c', '::1', '1433816754', '__ci_last_regenerate|i:1433816528;'),
('0a455c37247a9f85f7334c85fa79acb9ce339be4', '::1', '1433786058', '__ci_last_regenerate|i:1433785766;'),
('0cbbd8beea5708cc36c744d0aed3ab06b7b510c1', '::1', '1433780497', '__ci_last_regenerate|i:1433780497;'),
('22be763802b9e7738016eb78de7d93d9a03f2be1', '::1', '1433784634', '__ci_last_regenerate|i:1433784384;'),
('2fb98bcf302a8f22cddb5c5c600ba804e6983377', '::1', '1433632131', '__ci_last_regenerate|i:1433632131;'),
('33d1e0aac938b165e06333010ad7c0b5225bee06', '::1', '1433633130', '__ci_last_regenerate|i:1433633130;'),
('36223d19f922a147213d8cd98052acc7acc3ae92', '::1', '1433819989', '__ci_last_regenerate|i:1433819851;error|s:40:\"No se encuentran usuario con esos datos.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"old\";}'),
('393179abb1b3eb891b75d6b9334909be4fca4b79', '::1', '1433785002', '__ci_last_regenerate|i:1433784763;'),
('3a0aa2cea29bc78608c8456cc705f7caecb719cc', '::1', '1433821985', '__ci_last_regenerate|i:1433821702;error|s:40:\"No se encuentran usuario con esos datos.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"new\";}'),
('3c817d29ae25f9fc068e332dadadbf25411208c0', '::1', '1433909631', '__ci_last_regenerate|i:1433909337;logged_in|a:2:{s:2:\"id\";N;s:5:\"email\";N;}'),
('42f1efe6a3fa9ff9e0dc5795dc1ab9326af445ac', '::1', '1433794657', '__ci_last_regenerate|i:1433794477;'),
('439fd556d496dc0c6fd6b894c374d6b1655c6f27', '::1', '1433787360', '__ci_last_regenerate|i:1433787107;'),
('4464f1c94acaa3fe6ea826068424e02e834ba7e2', '::1', '1433787681', '__ci_last_regenerate|i:1433787425;error|s:40:\"No se encuentran usuario con esos datos.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"old\";}'),
('4633c5e0002861e55ac3059f803fe42f6588dd43', '::1', '1433785721', '__ci_last_regenerate|i:1433785421;'),
('4a7c823225f3e6770a240e1fa624508667952bed', '::1', '1433817996', '__ci_last_regenerate|i:1433817980;'),
('5b59be87549749d74f78ef5a3bfe4ab20f52b5c8', '::1', '1433824030', '__ci_last_regenerate|i:1433824030;logged_in|a:2:{s:2:\"id\";N;s:5:\"email\";N;}'),
('5e7db2029f15353616f67fe2acfd90d6788d5f7a', '::1', '1433783987', '__ci_last_regenerate|i:1433783730;'),
('6ddb7226db20999d10e06f5050b7280ff73bb1c1', '::1', '1433786326', '__ci_last_regenerate|i:1433786068;'),
('73816060a699ecbc6917ee55a12d1b98419abc27', '::1', '1433817764', '__ci_last_regenerate|i:1433817612;'),
('74a9f0fd2ea3e3a4eae9be7797cc65633814dc8a', '::1', '1433819426', '__ci_last_regenerate|i:1433819275;'),
('7940c9901066fe5e2bed6a06a83b901d9ec6cc91', '::1', '1433784159', '__ci_last_regenerate|i:1433784079;'),
('7ba241da78ed9bb560d355eaf5337f30a58ee217', '::1', '1433823237', '__ci_last_regenerate|i:1433823040;logged_in|a:2:{s:2:\"id\";N;s:5:\"email\";N;}error|s:40:\"No se encuentran usuario con esos datos.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"old\";}'),
('82c91f973af0dd0c901b1570e38747ab3021d65c', '::1', '1433820428', '__ci_last_regenerate|i:1433820174;'),
('8aded2b6f0ed88b3029c1dea04eb2aecee00d4ca', '::1', '1433908739', '__ci_last_regenerate|i:1433908451;logged_in|a:2:{s:2:\"id\";N;s:5:\"email\";N;}'),
('a093d060e64c4dcfaf9b360042a717e02b361a90', '::1', '1433794339', '__ci_last_regenerate|i:1433794147;'),
('a96894932018cc5d7bb70af7ffca10caaca2ff6a', '::1', '1433820847', '__ci_last_regenerate|i:1433820584;error|s:40:\"No se encuentran usuario con esos datos.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"old\";}'),
('a97a79decc48dbd46a453c6915eeb1f1a0bd6b72', '::1', '1433807530', '__ci_last_regenerate|i:1433807494;'),
('ac4bf34bc39f99a9d620ef78541f392065f177e1', '::1', '1433817415', '__ci_last_regenerate|i:1433817207;'),
('adc28df270b1f6d2c57239a19f0e309930559feb', '::1', '1433823693', '__ci_last_regenerate|i:1433823397;logged_in|a:2:{s:2:\"id\";s:1:\"1\";s:5:\"email\";s:5:\"admin\";}error|s:40:\"No se encuentran usuario con esos datos.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"new\";}'),
('ba45324a1761dd552764a2c20fae2ace935c87c3', '::1', '1433822326', '__ci_last_regenerate|i:1433822055;logged_in|a:2:{s:2:\"id\";s:1:\"1\";s:5:\"email\";s:5:\"admin\";}'),
('bd6c808d7db7e6d3289d6464fd3871d7a34221c3', '::1', '1433785292', '__ci_last_regenerate|i:1433785064;'),
('c7bab7455cbb80afcd0bb3f3b9d5dd4b46a7c042', '::1', '1433629811', '__ci_last_regenerate|i:1433629811;'),
('c92139e99a3885dfed32206312e7eafdd109b5d4', '::1', '1433823935', '__ci_last_regenerate|i:1433823717;logged_in|a:2:{s:2:\"id\";N;s:5:\"email\";N;}'),
('cf4fe3e615b8f590a0d1fcac3841db63985b0b76', '::1', '1433821401', '__ci_last_regenerate|i:1433821366;error|s:40:\"No se encuentran usuario con esos datos.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"new\";}'),
('d0d3b6de8470a8e86116bbe2a5b95b23c4341a01', '::1', '1433787095', '__ci_last_regenerate|i:1433786802;'),
('d43719d8961f244bb390f529ff2a064d5979949f', '::1', '1434226986', '__ci_last_regenerate|i:1434226986;'),
('d5ecb55530a98429a028c0e77991b2e63ebeb6a2', '::1', '1433816987', '__ci_last_regenerate|i:1433816889;'),
('da848049d650cba0f72872206bafabb9fa8bef69', '::1', '1433788095', '__ci_last_regenerate|i:1433788088;error|s:40:\"No se encuentran usuario con esos datos.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"old\";}'),
('dcbf9122c50d010d7b581a0d69feaff7c80b6d6e', '::1', '1433822954', '__ci_last_regenerate|i:1433822700;logged_in|a:2:{s:2:\"id\";N;s:5:\"email\";N;}'),
('dd13312481b19a26bab74272ae9810a315dcc067', '::1', '1433821214', '__ci_last_regenerate|i:1433820990;error|s:40:\"No se encuentran usuario con esos datos.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"new\";}'),
('e12bb5c7e140a26277091908f921eae59270e6ed', '::1', '1433909186', '__ci_last_regenerate|i:1433909028;logged_in|a:2:{s:2:\"id\";N;s:5:\"email\";N;}'),
('ee3d606338bd6e5e2e43031f4fad5f273ba9f3ed', '::1', '1433788019', '__ci_last_regenerate|i:1433787736;'),
('f3da120919c159978532797973afbaae32278369', '::1', '1433793706', '__ci_last_regenerate|i:1433793666;'),
('fa493aa470b42ae7582ea201989fe6d9eebd000c', '::1', '1433909895', '__ci_last_regenerate|i:1433909641;logged_in|a:2:{s:2:\"id\";s:1:\"1\";s:5:\"email\";s:5:\"admin\";}');

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