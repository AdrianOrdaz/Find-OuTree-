-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2024 a las 08:32:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `findouttree`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arboles`
--

CREATE TABLE `arboles` (
  `tree_id` int(11) NOT NULL,
  `tree_name` varchar(50) NOT NULL,
  `tree_sciName` varchar(50) NOT NULL,
  `description_tree` text NOT NULL,
  `tree_images` text NOT NULL,
  `tree_things` text NOT NULL,
  `zone_image` varchar(50) NOT NULL,
  `mercado_link` text NOT NULL,
  `zones` varchar(50) NOT NULL,
  `tree_family` varchar(50) NOT NULL,
  `water_time` varchar(50) NOT NULL,
  `sun_time` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `tree_color` varchar(50) NOT NULL,
  `tree_cover` varchar(50) DEFAULT NULL,
  `short_description` text NOT NULL DEFAULT '',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `arboles`
--

INSERT INTO `arboles` (`tree_id`, `tree_name`, `tree_sciName`, `description_tree`, `tree_images`, `tree_things`, `zone_image`, `mercado_link`, `zones`, `tree_family`, `water_time`, `sun_time`, `height`, `tree_color`, `tree_cover`, `short_description`, `id_user`) VALUES
(1, 'Alamo Sicomoro', 'Platanus Occidentalis Mexicana', 'El álamo sicomoro es un árbol de crecimiento rápido, de tallo blancuzo y liso y puede llegar a medir hasta 30 metros de altura. Esta especie es comúnmente preferida para plantarse en parques y avenidas por su fronda compacta y robusta que no requiere de podas y por sus raíces gruesas y profundas que no dañan la infraestructura a su alrededor. Cabe recalcar que este árbol es también utilizado para decorar jardines residenciales gracias a que su fronda compacta le permite caber en jardines y/o espacios pequeños.', 'alamo-sicomoro.jpg\r\nhojaSicomoro.jpg\r\nsicomoro.png', 'Puede vivir hasta 150 años.\r\nCrecimiento rápido.\r\nSu hoja es alternada, grande, verde, áspera, con tres a cinco óbulos.\r\nPuede ser utilizado para reducir la carga solar.\r\nResistente a sequías no tan prolongadas y tolera bien la contaminación del aire.', 'zona.jpg', 'https://listado.mercadolibre.com.mx/alamo-sicomoro#D[A:alamo%20sicomoro]', 'Nuevo León', 'Platanacea', '3 veces por semana', 'Sol directo', 'Hasta 30 metros', 'Verde/Verde amarillenta', 'alamo-sicomoro.jpg', 'El álamo sicomoro es un árbol de crecimiento rápido, de tallo blancuzo y liso y puede llegar a medir hasta 30 metros de altura.', 1),
(3, 'Encino Rojo', 'Quercus Rubra', 'El encino rojo posee hojas verdes que tornarán a un color rojizo entrando el otoño y una vez que azoten los primeros frentes fríos. Es importante recalcar que esta especie puede alcanzar una altura de hasta 25 metros y su crecimiento se encuentra entre lento a moderado. Este encino es muy utilizado para decorar áreas verdes residenciales y comerciales por el espectacular color rojizo que luce en su follaje.', 'encinor.jpgEncinoRojo.jpgEncinoRojo1.jpgEncinoRojo2.png', 'Hasta 25 metros.\r\nCrecimiento moderado a rapido.\r\nSu hoja es verde a roja en otoño.\r\nPuede ser utilizado para reducir la carga solar.\r\nBellota de forma redondeada color Rojo-Marrón de 2 cm.', 'Quercus_rugosa_range_map_1.png', 'https://listado.mercadolibre.com.mx/encino-rojo#D[A:encino%20rojo]', 'Coahuila', 'Fagaceae', '3 veces por semana', 'Sol directo', 'Hasta 30 metros', 'Verde/Rojo', 'encino-rojo.jpg', 'El encino rojo posee hojas verdes que tornarán a un color rojizo entrando el otoño y una vez que azoten los primeros frentes fríos.', 1),
(14, 'Ébano', 'Ebenopsis ebano', 'El ébano es un árbol muy tolerante a temperaturas extremas y sequías prolongadas, de fronda robusta y oscura y llega a alcanzar hasta 30 metros de altura. Su alta adaptabilidad y capacidad para desarrollo en distintos tipos de suelos hacen a este árbol una especie ideal para plantaciones de reforestación. Se da en todos los suelos pero se desarrolla más rápido en aquellos fértiles y profundos.', 'EbanoArbol.jpgEbanoMahuacata.jpgEbanoVerde.jpg', 'Puede vivir hasta 200 años.\r\nCrecimiento lento.\r\nCrece mejor en suelos con muy buen drenaje y hasta en suelos muy poco nutridos y/o áridos.\r\nLa fruta de este árbol se le conoce como mahuacata, tiene un alto contenido de antioxidantes y se puede consumir, siguiendo ciertos procedimientos.\r\nCuando el tallo alcanza la pulga de diámetro, este engrosará media pulgada cada año.', 'MapaEbano.jpg', 'https://listado.mercadolibre.com.mx/hogar-muebles-jardin/jardin-aire-libre/jardineria-accesorios/ebano', 'Nuevo León', 'Fabaceae', '2 veces por semana', 'Sol directo', 'Hasta 30 metros', 'Verde', 'ebano1.jpg', 'El ébano es un árbol muy tolerante a temperaturas extremas y sequías prolongadas, de fronda robusta y oscura y llega a alcanzar hasta 30 metros de altura.', 4),
(15, 'Framboyán', 'Delonix regia', 'El framboyán, conocido por sus llamativas flores rojas o anaranjadas, es un árbol de gran belleza. Con una altura que puede alcanzar entre 10 y 15 metros, sus hojas frondosas y bipinnadas ofrecen una sombra agradable. Este árbol tropical es apreciado por su capacidad para atraer polinizadores, como abejas y mariposas, y por su resistencia a diversas condiciones climáticas. Su presencia añade un toque vibrante y exótico a cualquier paisaje.', 'delonix.jpgdelonix1.jpgdelonix3.jpg', 'Flores llamativas: Sus flores son el rasgo más destacado del framboyán. Son grandes y vistosas.\r\nHojas bipinnadas: Las hojas del framboyán son bipinnadas.\r\nVainas de semillas: Después de la floración, el framboyán produce vainas de semillas largas y planas.\r\nAdaptabilidad: El framboyán es conocido por su resistencia y adaptabilidad a diferentes condiciones climáticas.\r\nLas flores del framboyán son una fuente de néctar y atraen a polinizadores como abejas, mariposas y colibríes.', 'MapaDelonix.png', 'https://listado.mercadolibre.com.mx/venta-de-arboles-flamboyan', 'Coahuila', 'Fabácea', '2-3 veces por semana', 'Sol directo', 'Hasta 15 metros', 'Verde/Rojo', 'framboyan2.png', 'El framboyán, conocido por sus llamativas flores rojas o anaranjadas, es un árbol de gran belleza.', 4),
(16, 'Fresno', 'Fraxinus excelsior', 'Su crecimiento es rápido. Su entorno es de áreas planas de bajo relieve y montañosas con suelo humífero. Puede llegar a vivir 80 años. La raíz es media.', 'fresno.jpgfresno2.jpgfresno3.jpg', 'Se utiliza como árbol de alineación o formando grupos.\r\nSu área natural de origen está en la región oriental de Estados Unidos y Canadá.\r\nPuede llegar a vivir hasta 100 años.\r\nEl fruto de esta especie es la sámara.\r\nSe adapta a cualquier ambiente y tipo de suelo.', 'MapaFresno.jpeg', 'https://listado.mercadolibre.com.mx/fraxinus-excelsior#D[A:Fraxinus%20excelsior]', 'Sinaloa', 'Oleaceae', '3 veces por semana', 'Sol directo', 'Hasta 40 metros', 'Verde', 'fresno.jpg', 'Su crecimiento es rápido. Su entorno es de áreas planas de bajo relieve y montañosas con suelo humífero. ', 4),
(17, 'Huizache', 'Acacia farnesiana', 'El huizache es un árbol pequeño o arbusto espinoso que se encuentra comúnmente en Coahuila. Sus hojas son bipinnadas, y el árbol produce llamativas flores amarillas fragantes que atraen a los polinizadores. Además de su uso ornamental, el huizache tiene un lugar en la medicina tradicional debido a sus propiedades curativas. Sus vainas de semillas son comestibles y, en la industria del cuero, se utiliza debido a su alto contenido de taninos. Este árbol es resistente a suelos secos y alcalinos, y es un hábitat para diversas especies de fauna local.', 'arbolhuazache.jpgarbolhuizache2.jpghuizachecover.png', 'Árbol espinoso con ramas delgadas y flexibles.\r\nHojas compuestas y pequeñas de color verde oscuro.\r\nProduce flores amarillas fragantes en racimos.\r\nTolerante a la sequía y crece en suelos secos.\r\nA menudo se encuentra en zonas áridas y semiáridas.\r\nAdaptado a suelos secos y alcalinos.', 'Huizache.jpeg', 'https://listado.mercadolibre.com.mx/huizache-arbol#D[A:Huizache%20arbol]', 'Coahuila', 'Fabácea', 'No necesita riego frecuente', 'Sol directo', 'Hasta 8 metros de altura', 'Verde brillante', 'huizachecover.png', 'El huizache es un árbol pequeño o arbusto espinoso que se encuentra comúnmente en Coahuila.', 4),
(18, 'Magnolia', 'Magnolia grandiflora', 'Perennifolio que puede sobrepasar los 30 m de altura, con una copa muy densa y redondeada o cónica. Corteza grisácea o ligeramente marrón, escamosa. Ramas jóvenes de color anaranjado cubiertas de una pubescencia densa de color ferroso.', 'magnolia.jpgmagnolia2.jpgmagnolia3.jpg', 'Origen: América, Asia y Sudáfrica.\r\nFlores: Grandes y vistosas, con diferentes colores según la especie.\r\nHojas: Grandes, coriáceas y de forma ovalada o elíptica.\r\nFrutos: Conos o vainas, contienen semillas cubiertas de una capa roja carnosa.\r\nEstacionalidad: Algunas especies son perennes, mientras que otras pierden sus hojas en invierno.', 'MapaMagnolia.jpg', 'https://listado.mercadolibre.com.mx/magnolia-grandiflora#D[A:Magnolia%20grandiflora]', 'Estados Unidos', 'Magnoliaceae', '2 veces por semana', 'Sol directo', 'Hasta 30 metros', 'Verde', 'magnolia.jpg', 'Perennifolio que puede sobrepasar los 30 m de altura, con una copa muy densa y redondeada o cónica.', 4),
(19, 'Pino', 'Pinus', 'Los pinos son árboles característicos con hojas aciculares y conos de semillas. En Coahuila, varias especies de pinos, como el pino blanco y el pino piñonero, se encuentran en diferentes regiones. Estos árboles son conocidos por su madera, que es ampliamente utilizada en la construcción y la carpintería. Además de su valor económico, los pinos desempeñan un papel ecológico importante, ya que sus conos producen semillas (piñones) comestibles y contribuyen a la retención de agua en los suelos forestales. Los bosques de pinos ofrecen refugio y alimento a diversas especies de aves y mamíferos en Coahuila.', 'arbolpino.jpgarbolpino2.jpgarbolpino3.jpg', 'Árbol de hoja perenne con agujas largas y delgadas agrupadas en fascículos.\r\nConos de semillas en forma de piña que maduran en otoño.\r\nTípicamente se encuentra en zonas montañosas y bosques de Coahuila.\r\nImportante para la conservación del suelo y la regulación del agua.', 'Pino.jpeg', 'https://listado.mercadolibre.com.mx/pino-arbol#D[A:Pino%20%20arbol]', 'Coahuila', 'Pinácea', 'Riego regular durante períodos secos', 'Sol directo', 'Hasta 30 metros', 'Verde', 'arbolpino3.jpg', 'Estos árboles son conocidos por su madera, que es ampliamente utilizada en la construcción y la carpintería.', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_new` int(11) NOT NULL,
  `title_new` text DEFAULT NULL,
  `network_new` varchar(10) DEFAULT NULL,
  `text_new` text DEFAULT NULL,
  `img_new` varchar(20) DEFAULT NULL,
  `link_new` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_new`, `title_new`, `network_new`, `text_new`, `img_new`, `link_new`) VALUES
(1, 'París adapta su plan urbanístico al cambio climático: más árboles y menos hormigón', 'EL PAIS', 'La capital francesa quiere crear 300 hectáreas adicionales de áreas verdes de aquí a 2040, sustituir revestimientos de alquitrán por tierra u obligar a producir energía renovable', 'paris.jpg', 'https://elpais.com/clima-y-medio-ambiente/2023-06-'),
(2, 'La preservación de áreas naturales es nuestra tarea: Caminantes del desierto', 'MILENIO', 'El objetivo del colectivo: Caminantes del desierto es preservar las áreas naturales de Hermosillo, Sonora.', 'noticia2.jpg', 'https://www.milenio.com/videos/politica/comunidad/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `puesto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `user_mail`, `password`, `puesto`) VALUES
(1, 'Adrian Ordaz', 'adrian@gmail.com', '1234567', 'ADMIN'),
(4, 'Jorge Hernández', 'jorgehdz@gmail.com', '1234', 'EDITOR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arboles`
--
ALTER TABLE `arboles`
  ADD PRIMARY KEY (`tree_id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_new`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arboles`
--
ALTER TABLE `arboles`
  MODIFY `tree_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_new` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
