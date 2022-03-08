use DB205DWESLoginLogout;

--Insertar datos en la tabla Usuario
insert into T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario) VALUES 
('albertoF',SHA2('albertoFpaso',256),'AlbertoF'),
('outmane',SHA2('outmanepaso',256),'Outmane'),
('rodrigo',SHA2('rodrigopaso',256),'Rodrigo'),
('isabel',SHA2('isabelpaso',256),'Isabel'),
('david',SHA2('davidpaso',256),'David'),
('aroa',SHA2('aroapaso',256),'Aroa'),
('johanna',SHA2('johannapaso',256),'Johanna'),
('oscar',SHA2('oscarpaso',256),'Oscar'),
('sonia',SHA2('soniapaso',256),'Sonia'),
('heraclio',SHA2('heracliopaso',256),'Heraclio'),
('amor',SHA2('amorpaso',256),'Amor'),
('antonio',SHA2('antoniopaso',256),'Antonio'),
('albertoB',SHA2('albertoBpaso',256),'AlbertoB');

-- Usuario administrador con el rol de administrador
INSERT INTO T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario, T01_Perfil) VALUES
('admin',SHA2('adminpaso',256),'Admin','administrador');

--Insertar datos en la tabla Departamento
insert into T02_Departamento(T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES 
('INF', 'Departamento de informatica', CURRENT_TIMESTAMP(), 1000.0, NULL),
('CIE', 'Departamento de ciencia', CURRENT_TIMESTAMP(), 2000.0, NULL),
('DAW', 'Departamento de DAW', CURRENT_TIMESTAMP(), 4000.0, CURRENT_TIMESTAMP()),
('DIW', 'Departamento de DIW', CURRENT_TIMESTAMP(), 2000.0, CURRENT_TIMESTAMP()),
('HIS', 'Departamento de historia', CURRENT_TIMESTAMP(), 1000.0, NULL);
