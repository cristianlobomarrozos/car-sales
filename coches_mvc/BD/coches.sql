-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2020 a las 08:26:08
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coches`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE `contiene` (
  `CodMod` int(11) NOT NULL,
  `CodPed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contiene`
--

INSERT INTO `contiene` (`CodMod`, `CodPed`) VALUES
(1, 15),
(1, 47),
(1, 48),
(1, 55),
(1, 56),
(2, 16),
(2, 22),
(2, 25),
(2, 51),
(2, 60),
(18, 50),
(19, 23),
(21, 53),
(23, 19),
(27, 54),
(27, 61),
(33, 17),
(33, 21),
(33, 49),
(33, 52),
(33, 57),
(33, 58),
(33, 59),
(37, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `CodMar` int(11) NOT NULL,
  `NomMar` varchar(50) NOT NULL,
  `PaisMar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`CodMar`, `NomMar`, `PaisMar`) VALUES
(4, 'Renault', 'Francia'),
(5, 'Mercedes', 'Alemania'),
(6, 'BMW', 'Alemania'),
(7, 'Chevrolet', 'EEUU'),
(8, 'Ford', 'EEUU'),
(9, 'Honda', 'Japón'),
(10, 'Toyota', 'Japón'),
(11, 'Peugeot', 'Francia'),
(21, 'Audi', 'Alemania'),
(22, 'Seat', 'Alemania'),
(23, 'Dodge', 'EEUU'),
(24, 'Ssangyong', 'Corea del Sur'),
(25, 'Porsche', 'Alemania'),
(26, 'Nissan', 'Japón'),
(27, 'Mitusbishi', 'Japón'),
(28, 'Aston Martin', 'Reino Unido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `CodMod` int(11) NOT NULL,
  `NomMod` varchar(50) NOT NULL,
  `CodMar` int(11) NOT NULL,
  `Potencia` int(11) NOT NULL,
  `año` int(11) NOT NULL,
  `Descripcion` varchar(1000) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `esClasico` tinyint(1) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`CodMod`, `NomMod`, `CodMar`, `Potencia`, `año`, `Descripcion`, `Precio`, `esClasico`, `Foto`) VALUES
(1, 'Honda civic type r', 9, 320, 2019, 'La saga continúa con el último Honda Civic Type R más radical. Se trata del modelo de tracción delantera más potente y con mejor aceleración del mercado y ostenta el récord por vuelta en los cinco circuitos europeos más importantes. Esto es lo que nosotros llamamos un coche de carreras para la carretera.', 45000, 0, NULL),
(2, 'Renault Megane RS', 4, 310, 2020, '1- El nuevo Megane RS viene con un motor Turbo de 1.8 litros que da 280 CV (5 CV más que la anterior versión Trophy). Utiliza el mismo bloque motor que el propulsor del Alpine A110, pero con una culata con estructura reforzada y un tratamiento especial en los empujadores de las válvulas y las camisas de los cilindro, tecnologías derivadas de la competición. La utilización de un turbocompresor de doble entrada (Twin Scroll) ha permitido mejorar el par motor a bajo régimen. El par máximo es de 390 Nm entre 2.400 y 4.800 r.p.m., una excelente cifra que hace que el comportamiento del motor sea contundente desde bajas vueltas y muy elástico.  ', 45000, 0, NULL),
(8, 'Honda NSX', 9, 280, 1990, NULL, NULL, 1, NULL),
(18, 'BMW M1', 6, 306, 2019, 'BMW M1. El BMW M1 es un automóvil deportivo producido por fabricante de automóviles alemán BMW entre 1978 y 1981.', 51700, 0, NULL),
(19, 'BMW Serie 1', 6, 140, 2019, 'El nuevo BMW Serie 1 ha llegado para atraer todas las miradas de admiración. Su excepcional diseño lo diferencian de los demás a primera vista. El interior de este coche compacto presenta un ambiente moderno que inspira con su calidad premium y su concepto de espacio abierto. Los motores eficientes, la tracción delantera disponible por primera vez en el nuevo BMW Serie 1 y las tecnologías de bastidor más novedosas garantizan una experiencia de conducción de gran dinamismo y agilidad, mientras innovadoras tecnologías y sistemas de asistencia al conductor garantizan que siempre llegues a tu destino con seguridad y comodidad.', NULL, 0, NULL),
(20, 'Chevrolet Camaro ZL1', 7, 650, 2020, 'Se siente como en casa ya sea que esté en el camino, la pista o las carreras dragster, el Camaro ZL1 combina la pura potencia de un motor LT4 V8 de 6.2 L con abundantes tecnologías de mejora del desempeño para ofrecerte el Camaro más potente que jamás se haya fabricado.', 65000, 0, NULL),
(21, 'Charger', 23, 305, 2020, 'El Dodge Charger es un automóvil estadounidense producido por la división Dodge de Chrysler. A la fecha, existen muchos y diferentes vehículos de Dodge, en tres diferentes plataformas, conformando la línea Charger. Este nombre es asociado generalmente con un modelo de rendimiento en la gama Dodge, sin embargo, también se ha llevado a un Hatchback, un Sedan y a un Coupe de lujo personal.', 27000, 0, NULL),
(22, 'Dodge Challenger SRT Demon', 23, 852, 2017, NULL, NULL, 0, NULL),
(23, 'Audi RS3', 21, 400, 2019, 'Gracias al motor TFSI de cinco cilindros con 294 kW (400 CV) y 480 Nm de par máximo, el Audi RS 3 Sportback acelera de 0 a 100 km/h en solo 4,1 segundos. El Audi RS 3 Sportback hace una demostración de fuerza con la parrilla Audi Singleframe con acabado en color negro brillante y en forma de panal, las amplias entradas de aire y las taloneras con un diseño más anguloso.', 50000, 0, NULL),
(24, 'Audi RS4', 21, 450, 2019, 'Si lo tienes todo, quieres más. Más deportividad. Más pasión. Más emoción. El nuevo Audi RS 4 Avant te ofrece más de todo. Más libertad. Más sensaciones. Y más posibilidades. Vive experiencias ilimitadas con su poderoso motor V6 2.9 TFSI biturbo y aprovecha al máximo su elevada funcionalidad. Perfecto para el día a día, convierte cada momento en algo especial.', 100000, 0, NULL),
(25, 'Audi RS5', 21, 450, 2019, 'Al igual que el Audi S5, el Audi RS5 también estaba equipado con un propulsor V8 de 4,2 litros de cilindrada, aunque en este caso su potencia se había incrementado un poco más. Mientras que el Audi S5 debía conformarse con 260 kW (354 CV), el Audi RS5 era capaz de desarrollar un máximo de 331 kW (450 CV). Donde este incremento resultaba más evidente era en las cifras de aceleración. En el nivel más bajo de potencia, el propulsor impulsaba al coupé de 0 a 100 km/h en algo más de 5 segundos, mientras que el Audi RS5 equipado con tracción integral quattro tan solo necesitaba 4,6 segundos.', 100000, 0, NULL),
(26, 'Seat Leon Cupra', 22, 310, 2019, 'La última versión del popular compacto español, el SEAT León CUPRA, vuelve más potente que nunca, consiguiendo aunar una vez más y de manera muy acertada confort, funcionalidad, tecnología y deportividad. Lo hace con un potente motor de 300 CV y los mejores sistemas de infoentretenimiento, seguridad y asistencia a la conducción. En marcha ofrece unas sensaciones excepcionales, perfectas para su uso diario y para su conducción tanto en ciudad como en carretera. Su precio de salida, 34.860 euros.', 25000, 0, NULL),
(27, 'BMW X6', 6, 381, 2019, 'Sin concesiones: el nuevo BMW X6 representa una desafiante sensación de inconformismo y seguridad en sí mismo. Primero, esta sensación se percibe en la carrocería extremadamente dinámica del vehículo, junto con el nuevo e inconfundible lenguaje de diseño, que se hace evidente con la máxima exclusividad y las tecnologías visionarias como la impresionante parrilla BMW “Iconic Glow”. Después, todo apunta básicamente a un solo concepto: un dominio absoluto, que el nuevo BMW X6 demuestra como extremadamente factible en cualquier recorrido gracias a un motor potente, a una suspensión precisa y a características como el paquete xOffroad. Experimenta una forma nunca vista de superar las expectativas con el nuevo BMW X6.   BMW X6 M50i: Consumo Promedio (combinado) según WLTP1: 12.0 - 13.0 l/100km Emisiones CO2 (combinado) según WLTP1: 272 - 296 g/km Emisiones CO2 según NEDC2: 193 - 197 g/km', 83000, 0, NULL),
(28, 'BMW X4', 6, 184, 2019, 'No importa qué desafíos puedan surgir por el camino, el BMW X4 se anticipa. Su diseño avanzado y los contornos de Coupé revelan al instante su sed de acción. Y gracias al excelente dinamismo de conducción, la innovadora construcción ligera con un centro de gravedad bajo y el nivel de prestaciones aún más elevado, solo hay un objetivo: disfrutar al máximo del placer de conducir.   BMW X4 M40i (3):  Consumo Promedio (combinado) según WLTP1: 9,1–10,0 l/100km  Emisiones CO2 (combinado) según WLTP1: 208 - 228 g/km  Emisiones CO2 según NEDC2: 178 - 186 g/km', 53000, 0, NULL),
(29, 'BMW X5', 6, 265, 2019, 'El líder ha llegado para que todos le sigan: nuevo BMW X5. Su presencia poderosa y elegante se percibe al instante. La imponente parrilla BMW anticipa qué sucederá cuando este vehículo respire profundamente. Y el diseño X de los faros no deja lugar a duda sobre quien irá en primera posición. Equipado con nuevas tecnologías para una mayor seguridad y el máximo dinamismo sobre cualquier superficie, el nuevo BMW X5 conoce su destino.   BMW X5 xDrive40i:  Consumo Promedio (combinado) según WLTP1: 10,0–11,9 l/100km  Emisiones CO2 (combinado) según WLTP1: 226 - 270 g/km  Emisiones CO2 según NEDC2: 183 - 203 g/km', 77000, 0, NULL),
(30, 'Audi A6', 21, 163, 2019, 'Cuando el diseño se une a la eficiencia y la deportividad al estilo. Cuando la innovación y la precisión van de la mano y la elegancia se puede sentir en cada línea. Cuando la forma y la función son una declaración de intenciones y el progreso está por encima de todo. Así es el nuevo referente de la clase Business: el Audi A6. Con el Audi A6, es hora de disfrutar de tu tiempo.', 57000, 0, NULL),
(31, 'Audi A7', 21, 204, 2019, 'El nuevo Audi A7 Sportback es la combinación perfecta entre diseño y tecnología con un carácter deportivo. Un coupé de cuatro puertas que establece nuevos estándares en la clase superior en cuanto a progresividad. Un nuevo estilo de Gran Turismo, con líneas dinámicas, una experiencia de conducción deportiva y un concepto de espacio versátil.', 67000, 0, NULL),
(32, 'Audi S5', 21, 374, 2019, 'Para la versión superior de su serie Coupé, los ingenieros de Ingolstadt desarrollaron un motor de 8 cilindros y 4,2 litros de cilindrada que ponía a disposición del Audi S5 una potencia de 260 kW (354 CV). Con él, este sportcoupé de tracción integral de serie aceleraba de 0 a 100 km/h en 5,1 segundos. Su velocidad máxima se reguló electrónicamente en los 250 km/h. En comparación, el modelo más potente del Audi A5 desarrollaba 195 kW (265 CV) con un motor de seis cilindros y 3,2 litros de cilindrada. Las diferencias entre ambos modelos no sólo tenían que ver con el rendimiento del motor. La acústica hacía que el Audi S5 resultase mucho más deportivo en la calle que el Audi A5. En el apartado estético, el Audi S5 se diferenciaba de los modelos A de la serie coupé por su parrilla con efecto óptico de rejilla, así como por sus espejos exteriores cromados. El fabricante cifró el consumo medio de un Audi S5 en 12,1 litros a los 100 km, y sus emisiones de CO2 en 288 g/km. Para el Audi S5 se ', 70000, 0, NULL),
(33, 'CHEVROLET CORVETTE C5', 7, 350, 1997, 'La quinta generación del Corvette fue un salto cualitativo importante en la cronología del modelo, ya que fue el primer modelo completamente nuevo en décadas. Desde el bastidor hasta el nuevo motor LS1, todo era nuevo en el Corvette C5, entrando en la era moderna gracias al empleo de elementos de fibra de carbono, por primera vez en un modelo de producción americano, o elementos como el Head up Display y la suspensión Magnetic Ride Control.', 15000, 1, NULL),
(34, 'DODGE VIPER', 23, 450, 1993, NULL, NULL, 1, NULL),
(35, 'MITSUBISHI 3000GT', 27, 300, 1990, 'La historia del Mitsubishi 3000GT es una de esas historias agridulces. Quizá en este caso más agria que dulce. Mitsubishi ya no es la marca que era a principios de los años 90: el Eclipse es un SUV, el Lancer Evolution lleva años sin fabricarse y ahora es propiedad de Renault y Nissan. Pero a finales de los 80 surcaba la cresta de la ola, una ola de optimismo y aparente financiación sin límites, fruto de la burbuja sin precedentes que vivía la economía japonesa. Mitsubishi decidió asombrar al mundo con su buque insignia: el deportivo más tecnológico que jamás se había visto hasta la fecha.', 15000, 1, NULL),
(36, 'PORSCHE BOXSTER', 25, 200, 1996, 'Un poco antes de mediados de los años 90, con el Porsche 968 y el 911 de generación 993 llegando al final de su vida comercial, la situación económica de la marca de Stuttgart no pasaba por su mejor momento. A raíz de ello, a Porsche se le ocurrió que la forma de levantar el vuelo podría ser desarrollar un sustituto para ambos modelos de forma simultánea, compartiendo el proceso y muchos elementos. El objetivo final era obtener un superventas de precio contenido, algo esencial para subsistir.', 10000, 1, NULL),
(37, 'PORSCHE 968', 25, 236, 1992, 'El 968 es un automóvil deportivo vendido por Porsche AG entre 1992 y 1995. A pesar de lo que dijo Porsche en su publicidad, comparte el 80% de sus componentes con el 944, del cual es el sucesor. El 968 se convirtió en el modelo final de una línea de evolución de casi 20 años desde la introducción del 924 y terminando con el Turbo S, RS Turbo y Turbo RS Lemans, que son tres preparaciones exclusivas distintas del 968 desarrolladas para poder homologar en competición y que no se comercializaron en serie.', 20000, 1, NULL),
(38, 'NISSAN 300ZX TWIN TURBO', 26, 300, 1996, NULL, 20000, 1, NULL),
(39, 'ASTON MARTIN DB7', 28, 355, 1994, 'El Aston Martin DB7 es el GT de la marca británica y empezó a fabricarse en 1994 con carrocerías coupé y convertible -descapotable-, la marca los denomina vantage y volante, respectivamente. Es el modelo más exitoso con 7.000 unidades fabricadas hasta 2003, año en el que lo sustituye el DB9.', 40000, 1, NULL),
(69, 'Nissan 370z', 26, 300, 2020, '', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `CodPed` int(11) NOT NULL,
  `CodUsu` int(11) NOT NULL,
  `fecPedido` date NOT NULL,
  `numeroPedido` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`CodPed`, `CodUsu`, `fecPedido`, `numeroPedido`) VALUES
(15, 4, '2019-12-01', '415752116129'),
(16, 4, '2019-12-01', '415752116364'),
(17, 2, '2019-12-01', '215752253697'),
(18, 2, '2019-12-01', '2157522537825'),
(19, 2, '2019-12-01', '2157522538521'),
(20, 2, '2019-12-01', '2157522542826'),
(21, 4, '2019-12-02', '415752776987'),
(22, 2, '2019-12-03', '215753617654'),
(23, 2, '2019-12-03', '215753619876'),
(25, 2, '2019-12-04', '215754473594'),
(47, 116, '2020-02-29', '11615829940479'),
(48, 116, '2020-02-29', '11615829944039'),
(49, 116, '2020-02-29', '11615829946397'),
(50, 116, '2020-02-29', '11615829949616'),
(51, 4, '2020-03-01', '415830556444'),
(52, 4, '2020-03-01', '415830556857'),
(53, 4, '2020-03-02', '4158313576023'),
(54, 2, '2020-03-02', '215831515476'),
(55, 4, '2020-03-02', '415831674459'),
(56, 4, '2020-03-02', '415831677039'),
(57, 4, '2020-03-02', '415831678777'),
(58, 118, '2020-03-02', '11815831682817'),
(59, 120, '2020-03-02', '12015831733927'),
(60, 120, '2020-03-02', '12015831734014'),
(61, 118, '2020-03-02', '11815831765086');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `CodUsu` int(11) NOT NULL,
  `NomUsu` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `ApeUsu` varchar(100) NOT NULL,
  `FecNacUsu` date DEFAULT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  `esAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `API_KEY` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CodUsu`, `NomUsu`, `email`, `pass`, `ApeUsu`, `FecNacUsu`, `Avatar`, `esAdmin`, `API_KEY`) VALUES
(2, 'asd', 'asd@asd.com', '827ccb0eea8a706c4c34a16891f84e7b', 'asd', NULL, 'images/avatares/2.jpg', 0, '6438d6b5b23473916c2f3c384fa8b3e3'),
(4, 'Cristian', 'admin@admin.es', '827ccb0eea8a706c4c34a16891f84e7b', 'Lobo', NULL, 'images/avatares/4.jpg', 1, '5a798ee086b337910e10abf68fe6d83f'),
(9, 'Julian', 'jgricewood4@ucoz.com', '0c792ba2997602ee9902fa836c1818d5', 'Gricewood', '1994-07-29', 'https://robohash.org/molestiasexercitationemvoluptatem.jpg?size=50x50&set=set1', 1, NULL),
(10, 'Jobye', 'jebertz5@biblegateway.com', 'c5b7d231242b20c9d28858d08a26c032', 'Ebertz', '1996-09-05', 'https://robohash.org/autsimiliquehic.jpg?size=50x50&set=set1', 1, NULL),
(11, 'Doralia', 'dtookey6@sciencedaily.com', '628761ed1260f8ec1a97e9d586e78873', 'Tookey', '2001-03-15', 'https://robohash.org/facilisillumet.jpg?size=50x50&set=set1', 1, NULL),
(12, 'Alanson', 'apillman7@sogou.com', '7bc3ea42fa2a1c0d56ba373ab6744a87', 'Pillman', '1996-10-07', 'https://robohash.org/illoutaliquid.jpg?size=50x50&set=set1', 0, NULL),
(13, 'Chery', 'ctrevenu8@51.la', 'da12be81f4b6974aebb0de6cf623c1a0', 'Trevenu', '1986-07-04', 'https://robohash.org/officiaquidemmodi.jpg?size=50x50&set=set1', 1, NULL),
(14, 'Judy', 'jmccleverty9@bigcartel.com', 'dea2144ce13382a171221a9ee0366c7f', 'McCleverty', '1999-06-21', 'https://robohash.org/aliquidconsequaturenim.jpg?size=50x50&set=set1', 1, NULL),
(15, 'Bobbi', 'bdewitta@phpbb.com', '6a5c390866f99076cb67c78e6412d9c5', 'De Witt', '2011-02-25', 'https://robohash.org/mollitiadelectusaut.jpg?size=50x50&set=set1', 1, NULL),
(16, 'Adrianna', 'abeveredgeb@cmu.edu', '57de7123bceaf6eee4dcb1b96c10f792', 'Beveredge', '2004-04-10', 'https://robohash.org/laborumrationerepellendus.jpg?size=50x50&set=set1', 0, NULL),
(17, 'Oswald', 'ocorraganc@accuweather.com', 'e89e954cba445cec4393848f1e588fc4', 'Corragan', '2010-10-12', 'https://robohash.org/quammolestiaeut.jpg?size=50x50&set=set1', 0, NULL),
(18, 'Milly', 'mtenantd@alibaba.com', '2f5814590528e94a825dd4e27fae7eb7', 'Tenant', '2005-10-16', 'https://robohash.org/laboriosamexcepturiatque.jpg?size=50x50&set=set1', 0, NULL),
(19, 'Nicky', 'ncreboe@mashable.com', '38dc1984edfb3da99c09c30c618712fc', 'Crebo', '1986-03-11', 'https://robohash.org/temporibusautemeveniet.jpg?size=50x50&set=set1', 1, NULL),
(20, 'Oswell', 'ogilliof@rediff.com', '68b794fb06ab5f62c700fa0d66c492f8', 'Gillio', '1993-01-03', 'https://robohash.org/vitaecupiditatea.jpg?size=50x50&set=set1', 1, NULL),
(21, 'Obadiah', 'opressg@miitbeian.gov.cn', 'e1a74b875909ec5c3b87ca6ca452ec78', 'Press', '2008-08-13', 'https://robohash.org/doloremquevoluptatibusautem.jpg?size=50x50&set=set1', 0, NULL),
(22, 'Brett', 'bshaplinh@google.it', '596c1c73b73cba88a3d2efc967a3b9c6', 'Shaplin', '1990-03-02', 'https://robohash.org/utcorruptidolorum.jpg?size=50x50&set=set1', 0, NULL),
(23, 'Bettye', 'bthorboni@columbia.edu', '9f72452e5ecf8f3dae63241280dabe94', 'Thorbon', '1997-07-01', 'https://robohash.org/voluptasnumquamsapiente.jpg?size=50x50&set=set1', 0, NULL),
(24, 'Homere', 'homahoneyj@woothemes.com', '01b030bd2942c7535bf6c330eff73ed0', 'O\'Mahoney', '2013-11-14', 'https://robohash.org/quiconsequaturdignissimos.jpg?size=50x50&set=set1', 1, NULL),
(25, 'Janka', 'jredrupk@histats.com', '0e2307c64047f7a645d2f3d91c137363', 'Redrup', '2018-09-17', 'https://robohash.org/eumquasiea.jpg?size=50x50&set=set1', 0, NULL),
(26, 'Carlina', 'cadlaml@google.de', '2db01ff8421c4e24748d1876f567f75c', 'Adlam', '2010-05-07', 'https://robohash.org/impeditautemveritatis.jpg?size=50x50&set=set1', 0, NULL),
(27, 'Cull', 'cyegorovm@wix.com', 'cee344f8a022477f83d69927dec99ec2', 'Yegorov', '1998-10-25', 'https://robohash.org/suntsedquis.jpg?size=50x50&set=set1', 0, NULL),
(28, 'Louella', 'lfredyn@wiley.com', 'b69b47904c798b956dd5367c9fc8a109', 'Fredy', '2012-04-19', 'https://robohash.org/autdoloremest.jpg?size=50x50&set=set1', 1, NULL),
(29, 'Starla', 'savesono@google.co.jp', '347a77816afcdd2b226a5cfb4c810b56', 'Aveson', '2003-08-01', 'https://robohash.org/minimadistinctioexercitationem.jpg?size=50x50&set=set1', 1, NULL),
(30, 'Randy', 'rpoverp@oaic.gov.au', 'd5954ac0436dc6ad928446ea929c9278', 'Pover', '2013-11-19', 'https://robohash.org/eaetut.jpg?size=50x50&set=set1', 0, NULL),
(31, 'Robbi', 'rthorndaleq@salon.com', '744349a93c6ecbc29eb77bd05ce5e1ac', 'Thorndale', '2004-04-14', 'https://robohash.org/quamutillo.jpg?size=50x50&set=set1', 0, '43f5f8071ad5c9fb5dfcf68e9aec2481'),
(32, 'Whitby', 'wspriggr@wp.com', '271073e4a614ef496fcec55e4137ebf7', 'Sprigg', '2009-02-21', 'https://robohash.org/consecteturconsequaturrerum.jpg?size=50x50&set=set1', 0, NULL),
(33, 'Cristin', 'cmckerlies@nyu.edu', '8166a45719e209b76f5518db23dbd0c2', 'McKerlie', '2004-07-16', 'https://robohash.org/delectusundedolor.jpg?size=50x50&set=set1', 0, NULL),
(34, 'Ambrose', 'aattot@topsy.com', '55cc9f210503494002d85d3c24af98b8', 'Atto', '1992-04-03', 'https://robohash.org/quasiautunde.jpg?size=50x50&set=set1', 1, 'f42cb2ff6a8674073f29c34a0d11c3e4'),
(35, 'Pascal', 'pnuttonu@disqus.com', '168ea3d4904d6d3cd7255fb754b63964', 'Nutton', '2002-12-26', 'https://robohash.org/voluptasetexpedita.jpg?size=50x50&set=set1', 1, NULL),
(36, 'Eldridge', 'egiroldiv@scientificamerican.com', '9d818502f45bec444827aab726882cd9', 'Giroldi', '2012-02-18', 'https://robohash.org/totamoptioalias.jpg?size=50x50&set=set1', 1, NULL),
(37, 'Dane', 'dvillaltaw@techcrunch.com', 'aac5db2bd9e45de124e03de3aab5f1e2', 'Villalta', '1991-03-21', 'https://robohash.org/quasisintnulla.jpg?size=50x50&set=set1', 0, NULL),
(38, 'Arluene', 'atabnerx@moonfruit.com', '57c3f80e7c390887c42208b084a00abe', 'Tabner', '1984-12-08', 'https://robohash.org/blanditiissolutaest.jpg?size=50x50&set=set1', 1, NULL),
(39, 'Maryann', 'mmonelliy@dmoz.org', 'aad8f8fa09e40f6632e2ab0ad6fef105', 'Monelli', '2008-11-10', 'https://robohash.org/enimcommodised.jpg?size=50x50&set=set1', 1, NULL),
(40, 'Briney', 'bdarganz@usatoday.com', '36ec69d09b2e185a3e7d6b3b57269f92', 'Dargan', '2001-09-17', 'https://robohash.org/nonaccusantiumaut.jpg?size=50x50&set=set1', 0, NULL),
(41, 'Filberte', 'fgurney10@cdc.gov', '3163a078009b37174cfb7c0b5d235c6a', 'Gurney', '1995-07-28', 'https://robohash.org/quisdoloranimi.jpg?size=50x50&set=set1', 1, NULL),
(42, 'Clevie', 'cfolkerts11@1und1.de', '9e34102ae1ddd3ab0592cf0f6cfebee0', 'Folkerts', '2003-08-07', 'https://robohash.org/modiutitaque.jpg?size=50x50&set=set1', 1, NULL),
(43, 'Damaris', 'dwegener12@psu.edu', '7cdf1b7c6d5772b4e5bfd18ec93c2b98', 'Wegener', '1990-11-09', 'https://robohash.org/autnihilqui.jpg?size=50x50&set=set1', 1, NULL),
(44, 'Royall', 'rkemme13@chron.com', 'a51857d234cb86e8a8f7aa59e0b03b78', 'Kemme', '2018-11-01', 'https://robohash.org/blanditiisaliquidmagni.jpg?size=50x50&set=set1', 1, NULL),
(45, 'Rhiamon', 'rknewstubb14@nymag.com', '3e8908ce2ec5167695f183c2ba571b16', 'Knewstubb', '2013-03-30', 'https://robohash.org/nameosdolor.jpg?size=50x50&set=set1', 0, NULL),
(46, 'Leeann', 'lquarlis15@plala.or.jp', 'f4d7b6ca41f879a244a3da5f9d56c722', 'Quarlis', '1986-04-28', 'https://robohash.org/laboriosamomnisullam.jpg?size=50x50&set=set1', 0, NULL),
(48, 'Piggy', 'pwilliment17@mit.edu', '64d078943ddacf11282acad32dba4f58', 'Williment', '1981-11-13', 'https://robohash.org/sedeaeligendi.jpg?size=50x50&set=set1', 1, NULL),
(49, 'Olympie', 'olindsey18@histats.com', 'b672988d0ad03b965d44a4a2565c84d1', 'Lindsey', '2018-09-23', 'https://robohash.org/autbeataeperspiciatis.jpg?size=50x50&set=set1', 1, NULL),
(50, 'Dominica', 'dneachell19@weebly.com', '1d87d7a28a5000dee277853fb5f5d43f', 'Neachell', '1988-10-25', 'https://robohash.org/adexercitationemcumque.jpg?size=50x50&set=set1', 0, 'c843ae4516a4f2d62988c78d8b79ba70'),
(51, 'Cacilia', 'cmanoch1a@fema.gov', 'c8c76bee342b392a1fccbd6d7b2b92a0', 'Manoch', '2018-05-04', 'https://robohash.org/harumquienim.jpg?size=50x50&set=set1', 1, NULL),
(52, 'Wernher', 'wrudall1b@ucoz.com', '2992615c8a79c225ad8c930b17360015', 'Rudall', '2002-05-29', 'https://robohash.org/ipsamlaborumquia.jpg?size=50x50&set=set1', 1, NULL),
(53, 'Wayland', 'wmcilherran1c@soundcloud.com', '62f3dbce7ab6439b9f9b82819e7d1505', 'McIlherran', '1989-08-01', 'https://robohash.org/rerumdignissimosvoluptatum.jpg?size=50x50&set=set1', 1, NULL),
(54, 'Jozef', 'jwindley1d@artisteer.com', '6a9f090cc6ccc3b6fafe19d56a54ce24', 'Windley', '2004-05-23', 'https://robohash.org/nonnatusquos.jpg?size=50x50&set=set1', 1, NULL),
(55, 'Alleyn', 'apedrielli1e@ocn.ne.jp', '54e7a9b1c869e5d3f88ce4f14a19edd7', 'Pedrielli', '2018-02-05', 'https://robohash.org/etnamaliquam.jpg?size=50x50&set=set1', 1, NULL),
(56, 'Elvira', 'elawful1f@about.com', '31b5640c7301e7f8183f82fadf1a8c32', 'Lawful', '2001-04-30', 'https://robohash.org/exsolutasaepe.jpg?size=50x50&set=set1', 0, NULL),
(57, 'Hakim', 'hdunckley1g@ucoz.com', '8391d44b31f2dae57d0878140ebe439d', 'Dunckley', '1989-02-18', 'https://robohash.org/modiinnemo.jpg?size=50x50&set=set1', 0, NULL),
(58, 'Rosamund', 'rsunman1h@jigsy.com', '296479b8d0e9ce0e359212ef2763c230', 'Sunman', '2011-10-17', 'https://robohash.org/autemsuntaperiam.jpg?size=50x50&set=set1', 0, NULL),
(59, 'Bax', 'brosone1i@discovery.com', '77db9e398bfc5c961e889c7b98893d0a', 'Rosone', '2001-11-23', 'https://robohash.org/nesciuntveniamlabore.jpg?size=50x50&set=set1', 1, NULL),
(60, 'Erminia', 'etrott1j@cornell.edu', '52e8d1a294dacd7bc952c4b70d9050d5', 'Trott', '2004-07-07', 'https://robohash.org/voluptatemestquo.jpg?size=50x50&set=set1', 1, NULL),
(61, 'Abby', 'athomke1k@mapquest.com', '1ffdc7a59786cf2946b68956d3d81ef0', 'Thomke', '1994-07-09', 'https://robohash.org/nonetlaborum.jpg?size=50x50&set=set1', 1, NULL),
(62, 'Michaelina', 'mhazlehurst1l@sohu.com', 'aa19d096a18785c935c250eace47e512', 'Hazlehurst', '2000-09-28', 'https://robohash.org/recusandaeetqui.jpg?size=50x50&set=set1', 1, NULL),
(63, 'Amata', 'abettenson1m@feedburner.com', '5065c749b235c2a3a1471e7fc40c535a', 'Bettenson', '2019-11-29', 'https://robohash.org/veniamerrorbeatae.jpg?size=50x50&set=set1', 1, NULL),
(64, 'Royall', 'rcastaignet1n@msn.com', '027a8f6fa003a716ce568b1e97adb5bf', 'Castaignet', '1999-02-13', 'https://robohash.org/aliquamsedunde.jpg?size=50x50&set=set1', 1, NULL),
(65, 'Betsey', 'bramsay1o@si.edu', '708da496d81e8ca80cff548880498278', 'Ramsay', '2015-10-11', 'https://robohash.org/nihilsedexplicabo.jpg?size=50x50&set=set1', 0, NULL),
(66, 'Whitney', 'wgreenig1p@google.fr', 'eef162c123b0972f2ae16a9492ad9eba', 'Greenig', '2008-02-26', 'https://robohash.org/undelaboriosamdoloremque.jpg?size=50x50&set=set1', 1, NULL),
(67, 'Auguste', 'afransman1q@va.gov', '9f774005173ddce5962da351f012622d', 'Fransman', '2017-08-01', 'https://robohash.org/impeditomnisullam.jpg?size=50x50&set=set1', 0, NULL),
(68, 'Aurelia', 'agaytor1r@purevolume.com', '5bc66554584bd54aa4811f864fe35332', 'Gaytor', '2008-06-29', 'https://robohash.org/nihilquodoccaecati.jpg?size=50x50&set=set1', 0, NULL),
(69, 'Sallie', 'sfontell1s@usa.gov', 'ba81df6b9e9e074cc7888ebbdaba6f5c', 'Fontell', '1995-09-08', 'https://robohash.org/etveldolor.jpg?size=50x50&set=set1', 1, NULL),
(70, 'Burk', 'bdegogay1t@harvard.edu', 'c15895c83b97da3995f29051346a08ec', 'De Gogay', '1992-02-27', 'https://robohash.org/atqueimpeditaperiam.jpg?size=50x50&set=set1', 0, NULL),
(71, 'Yul', 'ybearns1u@wikispaces.com', '7f023f878357768e2863b38ffab11d72', 'Bearns', '2000-02-08', 'https://robohash.org/fugiatenimest.jpg?size=50x50&set=set1', 1, NULL),
(72, 'Lexie', 'liglesia1v@imageshack.us', '3deeac9d8dba1bdca406164811f455cb', 'Iglesia', '2004-08-27', 'https://robohash.org/etarchitectovoluptatem.jpg?size=50x50&set=set1', 1, NULL),
(73, 'Bondy', 'bbradnocke1w@sfgate.com', '60531e06d3e166f2052c10db2ddc1cf7', 'Bradnocke', '2009-11-16', 'https://robohash.org/sitquidemnulla.jpg?size=50x50&set=set1', 1, NULL),
(74, 'Cinderella', 'cdelabarre1x@boston.com', '8c7cf9f71866608b64965dc95cdc3200', 'De la Barre', '2011-11-17', 'https://robohash.org/automnisreprehenderit.jpg?size=50x50&set=set1', 1, NULL),
(75, 'Mel', 'mbuntine1y@chron.com', '7abb9692e20b00c16a4d9650d055191e', 'Buntine', '2013-04-18', 'https://robohash.org/autfacilisvero.jpg?size=50x50&set=set1', 0, NULL),
(76, 'Chloe', 'cokell1z@zdnet.com', 'd9ec7f6b8b02b5ed503346c2103b72e3', 'Okell', '2009-10-13', 'https://robohash.org/nonillumlaborum.jpg?size=50x50&set=set1', 0, NULL),
(77, 'Albertine', 'ajoberne20@google.co.uk', '509c1bdfb59c4d6cc0018b5205c95a72', 'Joberne', '2005-10-11', 'https://robohash.org/etetest.jpg?size=50x50&set=set1', 1, NULL),
(78, 'Monroe', 'mdomney21@comcast.net', 'a128aed3f5bea5ca6f17e9057f779a3a', 'Domney', '2012-01-24', 'https://robohash.org/mollitiaquisquamquo.jpg?size=50x50&set=set1', 1, NULL),
(79, 'Annora', 'ahansley22@gov.uk', '58b50865e8e80d833604d660efc0b8fd', 'Hansley', '2017-05-04', 'https://robohash.org/voluptatemenimullam.jpg?size=50x50&set=set1', 1, NULL),
(80, 'Kaspar', 'knutting23@taobao.com', '048bc7eceb79d6344ed365da43e9d426', 'Nutting', '1988-09-17', 'https://robohash.org/quoipsumquia.jpg?size=50x50&set=set1', 0, NULL),
(81, 'Cissy', 'cgossipin24@opensource.org', 'b5bbe2e293cd5c4381a34896aa9fb529', 'Gossipin', '1981-10-05', 'https://robohash.org/enimnoncupiditate.jpg?size=50x50&set=set1', 1, NULL),
(82, 'Ailee', 'acrosier25@1und1.de', '95516b2f2c75ef1aa5118f778ecce18b', 'Crosier', '1992-09-02', 'https://robohash.org/atoccaecatisint.jpg?size=50x50&set=set1', 1, NULL),
(83, 'Niels', 'npartington26@goo.gl', '88e7b7aa7b953726c7268e902187e392', 'Partington', '1996-01-14', 'https://robohash.org/eaqueassumendaveniam.jpg?size=50x50&set=set1', 1, NULL),
(84, 'Stephanie', 'score27@yahoo.co.jp', 'ba5fe1a7b6afa06d14328ae0036e2c0b', 'Core', '2014-07-11', 'https://robohash.org/utdoloribusdistinctio.jpg?size=50x50&set=set1', 0, NULL),
(85, 'Emiline', 'erix28@bing.com', '786f10cd8d7e605668e2813c38bf091d', 'Rix', '1983-08-06', 'https://robohash.org/perspiciatisvoluptasdoloremque.jpg?size=50x50&set=set1', 1, NULL),
(86, 'Kacey', 'kthompkins29@seattletimes.com', '1774da7ada7f3db040ffa6b450d45bfc', 'Thompkins', '1981-12-22', 'https://robohash.org/deseruntidconsectetur.jpg?size=50x50&set=set1', 1, NULL),
(87, 'Marcos', 'mfludgate2a@bloomberg.com', '593a8f0c963aea57ca6ddc4aeab650bf', 'Fludgate', '1987-08-30', 'https://robohash.org/blanditiisculpaquia.jpg?size=50x50&set=set1', 0, NULL),
(88, 'Georgena', 'gorriss2b@trellian.com', '24e5f91b53d87984d144eed9e7c8911e', 'Orriss', '1986-05-17', 'https://robohash.org/quiarecusandaecommodi.jpg?size=50x50&set=set1', 1, NULL),
(89, 'Carmelina', 'ctween2c@t.co', 'c4162a5f583be77e6c4bd4da2920047d', 'Tween', '2006-11-22', 'https://robohash.org/recusandaemaioresvoluptatum.jpg?size=50x50&set=set1', 0, NULL),
(90, 'Tara', 'tmoraleda2d@ovh.net', '384b6f4684a6eee27bdcb8316b22ed9c', 'Moraleda', '2005-04-01', 'https://robohash.org/blanditiisetut.jpg?size=50x50&set=set1', 0, NULL),
(91, 'Hanna', 'hkettlestringe2e@ameblo.jp', '4ea754d1648be85c34bad29b55910d23', 'Kettlestringe', '2016-08-18', 'https://robohash.org/solutafugitmolestias.jpg?size=50x50&set=set1', 1, NULL),
(92, 'Raviv', 'rpaver2f@jigsy.com', '8be457ed010f13dc98587fe95f59e6b2', 'Paver', '2004-01-22', 'https://robohash.org/veladid.jpg?size=50x50&set=set1', 0, NULL),
(93, 'Megen', 'mfurphy2g@ted.com', 'cd2d22a08c2eee3b087bbb194ae2aa4a', 'Furphy', '1998-09-06', 'https://robohash.org/occaecatisitunde.jpg?size=50x50&set=set1', 0, NULL),
(94, 'Jory', 'joliphant2h@jiathis.com', '6605d89733a853971815c188a36da032', 'Oliphant', '2014-03-11', 'https://robohash.org/laboriosamnonnobis.jpg?size=50x50&set=set1', 1, NULL),
(95, 'Codie', 'cdelabarre2i@nbcnews.com', '66ed9f976fbd0085bb87e3c7c26796a2', 'De la Barre', '1986-10-12', 'https://robohash.org/cumquequidemquam.jpg?size=50x50&set=set1', 0, NULL),
(116, 'asd', '1a.lob.cri0910@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'asd', '0000-00-00', NULL, 1, NULL),
(118, 'asda', 'hola@hola.es', '827ccb0eea8a706c4c34a16891f84e7b', 'dasdas', '2016-02-02', NULL, 0, NULL),
(120, 'asd', 'sad@sad.com', '827ccb0eea8a706c4c34a16891f84e7b', 'asd', '0000-00-00', NULL, 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`CodMod`,`CodPed`),
  ADD KEY `CodPed` (`CodPed`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`CodMar`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`CodMod`),
  ADD KEY `CodMar` (`CodMar`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`CodPed`),
  ADD UNIQUE KEY `numeroPedido` (`numeroPedido`),
  ADD KEY `CodUsu` (`CodUsu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CodUsu`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `API_KEY` (`API_KEY`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `CodMar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `CodMod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `CodPed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `CodUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`CodMod`) REFERENCES `modelo` (`CodMod`),
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`CodPed`) REFERENCES `pedido` (`CodPed`);

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`CodMar`) REFERENCES `marca` (`CodMar`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`CodUsu`) REFERENCES `usuario` (`CodUsu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
