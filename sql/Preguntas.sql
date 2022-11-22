--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `numero_pregunta` int(3) NOT NULL,
  `pregunta` varchar(200) NOT NULL,
  `bloque` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `numero_pregunta`, `pregunta`, `bloque`, `total`, `id_seccion`, `visible`) VALUES
(1, 1, '¿Tengo definida la finalidad de mi organización?', 'Misión', 50, 1, 1),
(2, 2, '¿La empresa cuenta con una visión a futuro de lo que quiere llegar a ser?', 'Visión', 50, 1, 1),
(3, 3, '¿Se tienen definidos un conjunto de valores organizacionales que regulan el comportamiento de los colaboradores?', 'Valores', 30, 1, 1),
(4, 4, '¿Se elaboran objetivos dentro de la organización?', 'Objetivos', 40, 1, 1),
(5, 5, '¿Existen políticas que guían las actividades dentro de la empresa? ', 'Políticas', 50, 1, 1),
(6, 6, '¿Existe por lo menos un procedimiento para alguna de las actividades dentro de su organización?', 'Procedimientos', 40, 1, 1),
(7, 7, '¿La organización tiene estipuladas condiciones para mantener el orden y buena convivencia entre sus integrantes?', 'Reglamento', 40, 1, 1),
(8, 8, '¿La organización cuenta con un presupuesto asignado a cada área?', 'Presupuesto', 30, 1, 1),
(9, 9, '¿La empresa cuenta con programas para la elaboración de actividades?', 'Programas', 40, 1, 1),
(10, 10, '¿Se tiene bien definidas las estrategias que implementará o implementa su organización?', 'Planeación Estratégica', 50, 1, 1),
(11, 1, '¿La organización tiene asignada las actividades por escrito para cada uno de los puestos de trabajo?', 'División de trabajo: Descripción de puestos', 50, 2, 1),
(12, 2, '¿Está organizada por medio de niveles jerárquicos en donde las funciones están agrupadas de acuerdo al grado de autoridad, responsabilidad e importancia?', 'División de trabajo: Jerarquización', 40, 2, 1),
(13, 3, '¿La organización tiene funciones y actividades las cuales están divididas y agrupadas en unidades específicas con objetivos a fines que se dirigen hacia el mismo propósito?', 'División de trabajo: Departamentalización', 40, 2, 1),
(14, 4, '¿Cada área o departamento tiene una recopilación ordenada de todos los factores y actividades que son necesarios para llevar a cabo sus tareas?', 'División de trabajo: Descripción de actividades', 30, 2, 1),
(15, 5, '¿La organización sincroniza los esfuerzos de todos los departamentos para llevar a cabo de manera eficiente las tareas, funciones o las actividades que los involucra?', 'Coordinación', 20, 2, 1),
(16, 1, '', 'Toma de decisiones', 50, 3, 0),
(17, 2, '', 'Motivación', 40, 3, 0),
(18, 3, '', 'Comunicación', 40, 3, 0),
(19, 4, '', 'Liderazgo', 50, 3, 0),
(20, 1, '¿La empresa cuenta con un sistema de control que supervisa, compara y corrige el desempeño laboral de la organización?', 'Establecimiento de estándares', 50, 4, 1),
(21, 2, '¿La empresa cuenta con un sistema para medir y detectar las acciones de los planes establecidos?', 'Medición y detección de desviaciones', 30, 4, 1),
(22, 3, '¿La organización cuenta con parámetros de variación aceptable entre el desempeño real y el estándar?', 'Correcciones', 30, 4, 1),
(23, 4, '¿Existe un control que entra en acción después de que la actividad laboral haya sido ejecutada?', 'Retroalimentación', 30, 4, 1);



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta-sub`
--

CREATE TABLE `respuesta-sub` (
  `id_usuario` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_subpregunta` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `posicion` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `descripcion` varchar(140) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL,
  `encuesta` varchar (30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `nombre`, `descripcion`, `imagen`, `valor`, `encuesta`) VALUES
(1, 'Planeación', 'texto temporal 1\r\n', 'img/seccion1.jpg', 450, `encuesta1`),
(2, 'Organización', 'texto temporal 2', 'img/seccion2.jpg', 180, `encuesta1`),
(3, 'Dirección', 'texto temporal 3', 'img/seccion3.jpg', 250, `encuesta1`),
(4, 'Control', 'texto temporal 4', 'img/seccion4.jpg', 200, `encuesta1`);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subpreguntas`
--

CREATE TABLE `subpreguntas` (
  `id_subpregunta` int(11) NOT NULL,
  `numero_subpregunta` int(11) NOT NULL,
  `subpregunta` varchar(300) NOT NULL,
  `id_pregunta` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subpreguntas`
--

INSERT INTO `subpreguntas` (`id_subpregunta`, `numero_subpregunta`, `subpregunta`, `id_pregunta`) VALUES
(1, 1, 'Todos los colaboradores conocen la razón de ser de la organización (misión).', 1),
(2, 2, 'Tenemos visible la misión de la empresa, para la totalidad de los colaboradores.', 1),
(3, 3, 'Las actividades principales de mis colaboradores están encaminadas a lograr el objetivo principal (la misión) de la organización.', 1),
(4, 4, 'Se ha explicado a cada uno de los colaboradores el significado de la misión organizacional.', 1),
(5, 1, 'Todos los colaboradores de la organización tienen claros los objetivos a largo plazo de la organización.', 2),
(6, 2, 'Todos los colaboradores conocen la visión de la organización.', 2),
(7, 3, 'La organización tiene los medios y procedimientos para alcanzar la visión establecida.', 2),
(8, 4, 'Tenemos visible la visión de la empresa en las instalaciones, para la totalidad de los colaboradores.', 2),
(9, 1, 'Los valores organizacionales fueron elaborados por los integrantes de la empresa.', 3),
(10, 2, 'Los colaboradores conocen los valores organizacionales.', 3),
(11, 1, 'Todo el equipo directivo de la empresa se involucra en la elaboración de los objetivos a corto, mediano y largo plazo.', 4),
(12, 2, 'Todo el personal que labora en la empresa conoce los objetivos establecidos.', 4),
(13, 3, 'Los objetivos son establecidos por cada uno de los departamentos y/o áreas de la empresa.', 4),
(14, 1, 'Las políticas organizacionales están definidas por escrito para el conocimiento de todos los colaboradores.', 5),
(15, 2, 'Todos los colaboradores conocen las normas y responsabilidades de su área de trabajo.', 5),
(16, 3, 'Cuando se elaboran y/o actualizan las políticas organizacionales, se asigna a un responsable.', 5),
(17, 4, 'Las políticas organizacionales establecidas se revisan periódicamente.', 5),
(18, 1, 'Los procedimientos se fijan por escrito y de preferencia gráficamente.', 6),
(19, 2, 'Los procedimientos diseñados permiten el logro de objetivos en los departamentos.', 6),
(20, 3, 'Los procedimientos se revisan periódicamente.', 6),
(21, 1, 'Los colaboradores saben que tienen derechos y obligaciones que cumplir.', 7),
(22, 2, 'Los colaboradores conocen los motivos por los cuales puede ser suspendido temporal o definitivamente.', 7),
(23, 3, 'Existen procedimientos que verifiquen el cumplimiento de algún tipo de reglamento.', 7),
(24, 1, 'Hay una asignación presupuestal para poder cumplir con las actividades.', 8),
(25, 2, 'Los interesados conocen en el presupuesto correspondiente.', 8),
(26, 1, 'Todos los programas están autorizados con la aprobación de la suprema autoridad administrativa de su organización.', 9),
(27, 2, 'Los involucrados en los programas los conocen', 9),
(28, 3, 'Todas las personas que trabajan en los programas están convencidas de aplicarlos.', 9),
(29, 1, 'Las estrategias de realizan por escrito', 10),
(30, 2, 'Las estrategias señalan de forma concreta, clara y orientada de cómo debe combinarse los recursos en el momento de fijar los planes.', 10),
(31, 3, 'Las estrategias señalan los caminos concretos que deben adaptarse para lograr el cumplimiento de los planes', 10),
(32, 4, 'Para el diseño de estrategias se toman en cuenta los factores externos e internos de la organización.', 10),
(33, 1, 'La organización realiza una división de trabajo mediante la elaboración de una secuencia de pasos o acciones para lograr un objetivo o desarrollar una función.', 11),
(34, 2, 'La organización cuenta con un listado de las funciones más importantes de la misma.', 11),
(35, 3, 'La organización elabora manuales (de políticas, departamentales, de bienvenida, de procedimientos, de organización, de contenido múltiple, de técnicas y puestos, entre otros) en donde contiene información plasmada en forma sistémica de la organización.', 11),
(36, 4, 'Tiene diagramas de procesos en donde representa gráficamente las actividades para llevar a cabo una función que se repite.', 11),
(37, 1, 'La jerarquización dentro de la organización delimita la responsabilidad de cada colaborador ante un solo jefe superior inmediato (unidad de mando).', 12),
(38, 2, 'Los directivos realizan un análisis de las alternativas para la selección de esta.', 12),
(39, 3, 'Existe una cadena de mando, la cual especifica quien reporta a quién en toda la organización (cadena de mando).', 12),
(40, 1, 'Las funciones se encuentran bien clasificadas de acuerdo con su similitud.', 13),
(41, 2, 'Todas las áreas o departamentos tienen asignadas sus actividades ', 13),
(42, 3, 'La organización cuenta con un organigrama en donde establece claramente la estructura formal de la misma.', 13),
(43, 1, 'Se cuenta con un análisis de puesto para cada área o departamento.', 14),
(44, 2, 'Se realiza por escrito una carta de distribución del trabajo (cuadro de distribución de actividades) para cada puesto de trabajo.', 14),
(45, 1, 'Existe una línea clara y fluida de comunicación y autoridad.', 15),
(46, 1, 'La alta dirección de la empresa cuenta con un proceso para la toma de decisiones.', 16),
(47, 2, 'Los directivos conocen cuales son los problemas que existen dentro de la organización (definen cuál es el problema).', 16),
(48, 3, 'Los directivos desarrollan alternativas para cada uno de los problemas visualizados (desarrollo de alternativas).', 16),
(49, 4, 'Los directivos realizan un análisis de las alternativas para la selección de esta.', 16),
(50, 5, 'Se realiza una evaluación de la eficacia de la decisión para observar los resultados obtenidos y así obtener una retroalimentación.', 16),
(51, 1, 'La dirección se preocupa por que el personal se encuentre continuamente motivado.', 17),
(52, 2, 'La organización maneja un sistema de incentivos (económicos y no económicos)  para motivar el trabajo diario de los colaboradores.', 17),
(53, 3, 'La organización hace entregas de recompensas por el comportamiento de los colaboradores  y por el resultado obtenido.', 17),
(54, 4, 'La dirección utiliza un enfoque basado en metas personales a los colaboradores para motivarlos en su quehacer diario.', 17),
(55, 1, 'Existe una comunicación formal bien establecida dentro de la empresa (aquella que se lleva a cabo de acuerdo a los esquemas laborales).', 18),
(56, 2, 'Hay una comunicación que fluye hacia abajo por la estructura jerárquica, de un jefe a sus colaboradores.', 18),
(57, 3, 'Hay una comunicación ascendente, que fluye de abajo hacia arriba en la estructura jerárquica.', 18),
(58, 4, 'Hay una comunicación lateral que se lleva a cabo entre los colaboradores del mismo nivel jerárquico.', 18),
(59, 1, 'La empresa tiene identificados a los líderes dentro de su organización.', 19),
(64, 1, 'En la empresa existe control preventivo para reducir la probabilidad de que se presente algún hecho no deseado.', 20),
(60, 2, 'Los altos mandos están cubiertos por personas capaces de dirigir a los empleados.', 19),
(61, 3, 'Los colaboradores tienen a seguir a sus superiores para la consecución de las metas propuestas.', 19),
(62, 4, 'Los directivos toman en cuenta la opinión de sus colaboradores para la toma de decisiones', 19),
(63, 5, 'Los directivos apoyan a sus colaboradores para solucionar los problemas que se presentan en su puesto de trabajo.', 19),
(71, 2, 'La empresa implementa medidas correctivas que analiza el cómo y el por qué se desvió el desempeño y después corrige la causa de la desviación.', 22),
(70, 1, 'La empresa implementa medidas correctivas que resuelve los problemas al instante para que el desempeño retome su curso.', 22),
(69, 2, 'Los controles establecidos reportan rápidamente las desviaciones.', 21),
(68, 1, 'Existen reportes estadísticos que avalan la información para la medición de las actividades.', 21),
(67, 4, 'La empresa tiene indicadores que guían el avance y evalúan el cumplimiento de las metas organizacionales o departamentales.', 20),
(66, 3, 'Los sistemas de control reflejan la estructura de los planes de la administración.', 20),
(65, 2, 'Se elaboran controles correctivos que sirven para poder reducir o minimizar los comportamientos o resultados no deseados.', 20),
(72, 1, 'Se toman en cuenta las áreas de oportunidad registradas después de la ejecución de una actividad.', 23),
(73, 2, 'Existe un consenso entre los colaboradores para optimizar los resultados después de haber realizado una actividad.', 23);

-- --------------------------------------------------------
