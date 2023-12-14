create schema if not exists conjunto_mio_BBDD default character set utf8;
use conjunto_mio_BBDD;

CREATE TABLE Personas(
    Id_Personas SMALLINT(3) NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(20) NOT NULL,
    Cedula INT(13) NOT NULL,
    Telefono INT(10) NOT NULL,
    Correo VARCHAR(30) NOT NULL,
    Contrasena VARCHAR(15) NOT NULL,
    Tipousuario VARCHAR(25) NOT NULL,
    Estado VARCHAR(10) NOT NULL,
    PRIMARY KEY (Id_Personas)
)ENGINE=InnoDB;

CREATE TABLE Torre(
    Id_Torre SMALLINT(2) NOT NULL,
    PRIMARY KEY (Id_Torre)
)ENGINE=InnoDB;

CREATE TABLE  Apartamento(
    Id_Apartamento SMALLINT(2) NOT NULL AUTO_INCREMENT,
    Apartamento SMALLINT(4) NOT NUll,
    Id_Torre SMALLINT(2) NOT NULL,
    PRIMARY KEY (Id_APartamento),
    KEY fk_torre_apartamento(Id_Torre),
    CONSTRAINT fk_torre_apartamento
    FOREIGN KEY (Id_Torre)
    REFERENCES Torre (Id_Torre)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Residente(
    Id_Residente SMALLINT(3) NOT NULL AUTO_INCREMENT,
    Id_Personas SMALLINT(4) NOT NULL,
    Tipo_residente VARCHAR(25) NOT NULL,
    Id_Apartamento SMALLINT(4) NOT NULL,
    PRIMARY KEY(Id_Residente),
    KEY fk_personas_residente(Id_Personas),
    KEY fk_apartamento_residente(Id_Apartamento),
    CONSTRAINT fk_personas_residente
    FOREIGN KEY (Id_Personas)
    REFERENCES Personas (Id_Personas)
    ON DELETE CASCADE
    ON UPDATE CASCADE,   
    CONSTRAINT fk_apartamento_residente
    FOREIGN KEY (Id_Apartamento)
    REFERENCES Apartamento (Id_Apartamento)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Solicitudes(
    Id_Solicitudes INT(5) NOT NULL AUTO_INCREMENT,
    Fecha_Solicitud DATETIME NOT NULL,
    Fecha_Evento DATE,
    Id_Residente SMALLINT(2) NOT NULL,
    Estado VARCHAR(10) NOT NULL,
    PRIMARY KEY(Id_Solicitudes),
    KEY fk_residente_solicitudes(Id_Residente),
    CONSTRAINT fk_residente_solicitudes
    FOREIGN KEY (Id_Residente)
    REFERENCES Residente (Id_Residente)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE=InnoDB;


CREATE TABLE Tipo_Servicio(
    Id_TipoServicio INT(5) NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(30) not NULL,
    Valor INT(10) NOT NULL,
    Id_Solicitudes INT(5) NOT NULL,
    PRIMARY KEY(Id_TipoServicio),
    KEY fk_solicitudes_tipodeservicio(Id_Solicitudes),
    CONSTRAINT fk_solicitudes_tipodeservicio
    FOREIGN KEY (Id_Solicitudes)
    REFERENCES Solicitudes (Id_Solicitudes)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Operario(
    Id_Operario SMALLINT(3) NOT NULL AUTO_INCREMENT,
    Id_Personas SMALLINT(3) NOT NULL,
    Cargo VARCHAR(25) NOT NULL,
    Fecha_Ingreso DATE NOT NULL,
    Fecha_Salida DATE NOT NULL,
    Observaciones VARCHAR(50),
    PRIMARY KEY(Id_Operario),
    KEY fk_personas_operario(Id_Personas),
    CONSTRAINT fk_personas_operario
    FOREIGN KEY (Id_Personas)
    REFERENCES Personas (Id_Personas)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Visitantes(
    Id_Visitantes SMALLINT(3) NOT NULL AUTO_INCREMENT,
    Nombres VARCHAR(25) NOT NULL,
    Apellidos VARCHAR(25) NOT NULL,
    Documento INT(25) NOT NULL,
    Fecha_Ingreso DATETIME NOT NULL,
    Fecha_Salida DATETIME NOT NULL,
    Observaciones VARCHAR(50),
    Id_Residente SMALLINT(3) NOT NULL,
    Id_Operario SMALLINT(3) NOT NULL,
    PRIMARY KEY(Id_Visitantes),
    KEY fk_residente_visitante(Id_Residente),
    KEY fk_operario_visitante(Id_Operario),
    CONSTRAINT fk_residente_visitante
    FOREIGN KEY (Id_Residente)
    REFERENCES Residente (Id_Residente)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT fk_operario_visitante
    FOREIGN KEY (Id_Operario)
    REFERENCES Operario (Id_Operario)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Recibo(
    Id_Recibo int(10) NOT NULL AUTO_INCREMENT,
    Fecha DATETIME NOT NULL,
    Valor float NOT NULL,
    Valor_Pendiente float NOT NUll,
    Estado VARCHAR(15) NOT NUll,
    IVA INT(3),
    Descuento VARCHAR(10), 
    Id_Solicitudes INT(5) NOT NULL,
    PRIMARY KEY(Id_Recibo),
    KEY fk_solicitudes_recibo(Id_Solicitudes),
    CONSTRAINT fk_solicitudes_recibo
    FOREIGN KEY (Id_Solicitudes)
    REFERENCES Solicitudes (Id_Solicitudes)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Disponibilidad(
    Id_Disponibilidad SMALLINT(3) NOT NULL AUTO_INCREMENT,
    Estado VARCHAR(12) NOT NULL,
    Descripcion VARCHAR(50) NOT NULL,
    PRIMARY KEY (Id_Disponibilidad)
)ENGINE=InnoDB;

CREATE TABLE Asigna(
    Fecha DATE NOT NULL,
    Id_TipoServicio INT(5) NOT NULL,
    Id_Disponibilidad SMALLINT(3) NOT NULL,
    KEY fk_tipo_servicio_asigna(Id_TipoServicio),
    KEY fk_disponibilidad_asigna(Id_Disponibilidad),
    CONSTRAINT fk_tipo_servicio_asigna
    FOREIGN KEY (Id_TipoServicio)
    REFERENCES Tipo_Servicio (Id_TipoServicio)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT fk_disponibilidad_asigna
    FOREIGN KEY (Id_Disponibilidad)
    REFERENCES Disponibilidad (Id_Disponibilidad)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Administrador(
    Id_Administrador SMALLINT(3) NOT NULL AUTO_INCREMENT,
    Id_Personas SMALLINT(3) NOT NULL,
    Horario_Entrada TIME,
    Horario_Salida TIME,
    Tarjeta_Profesional VARCHAR(15) NOT NULL,
    PRIMARY KEY(Id_Administrador),
    KEY fk_personas_administrador(Id_Personas),
    CONSTRAINT fk_personas_administrador
    FOREIGN KEY (Id_Personas)
    REFERENCES Personas (Id_Personas)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Mensaje(
    Id_Mensaje SMALLINT(3) NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(15) NOT NULL,
    Texto VARCHAR(100) NOT NUll,
    Fecha DATE NOT NUll,
    Id_Administrador SMALLINT(3) NOT NULL ,
    PRIMARY KEY(Id_Mensaje),
    KEY fk_administrador_notifica(Id_Administrador),
    CONSTRAINT fk_administrador_notifica
    FOREIGN KEY (Id_Administrador)
    REFERENCES Administrador (Id_Administrador)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE=InnoDB;
