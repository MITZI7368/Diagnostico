-- Crear categorías
INSERT INTO categorias (id, nombre, descripcion) VALUES
(1, 'Radiología', 'Equipos y materiales para diagnóstico por imagen'),
(2, 'Odontología', 'Instrumentos y materiales dentales'),
(3, 'Laboratorio', 'Equipos y suministros de laboratorio');

-- Crear subcategorías
INSERT INTO subcategorias (id, nombre, descripcion, categoria_id) VALUES
(1, 'Rayos X', 'Equipos de radiografía', 1),
(2, 'Ultrasonido', 'Equipos de ultrasonido', 1),
(3, 'Instrumental', 'Instrumentos dentales', 2),
(4, 'Materiales', 'Materiales dentales', 2),
(5, 'Análisis', 'Equipos de análisis', 3),
(6, 'Consumibles', 'Materiales consumibles', 3);

-- Crear productos
INSERT INTO productos (nombre, descripcion, precio, existencia, descuento, imagen, categoria_id, subcategoria_id) VALUES
('Equipo Rayos X Digital', 'Sistema de radiografía digital completo', 25000.00, 2, 0, 'productos/rayosx.jpg', 1, 1),
('Kit Instrumental Dental', 'Kit completo de instrumentos dentales', 1200.00, 10, 5, 'productos/kit-dental.jpg', 2, 3),
('Microscopio Digital', 'Microscopio con cámara integrada', 3500.00, 5, 0, 'productos/microscopio.jpg', 3, 5),
('Jeringa Odontológica', 'Jeringa para anestesia dental', 45.00, 100, 0, 'productos/jeringa.jpg', 2, 4);