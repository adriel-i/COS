create database cos2;
use cos2;
-- 

-- TABLE: CALIFICACIONES 

--

CREATE TABLE CALIFICACIONES(

    id_calificacion    INT AUTO_INCREMENT    NOT NULL,

    fecha_hora         DATETIME,

    valor              INTEGER,

    id_usuario         INT,

    id_calificado      INTEGER,

    PRIMARY KEY (id_calificacion)

)

;

-- 

-- TABLE: CATEGORIAS 

--

CREATE TABLE CATEGORIAS(

    id_categoria          INT   AUTO_INCREMENT   NOT NULL,

    nombre                VARCHAR(50),

    id_estado_atributo    INTEGER,

    PRIMARY KEY (id_categoria)

)

;


-- 

-- TABLE: CHAT 

--

CREATE TABLE CHAT(

    id_chat    INTEGER  AUTO_INCREMENT  NOT NULL,

    fecha      DATE,

    PRIMARY KEY (id_chat)

)

;

-- 

-- TABLE: CHAT_PERSONAS 

--

CREATE TABLE CHAT_PERSONAS(

    id_chat_persona    INTEGER  AUTO_INCREMENT  NOT NULL,

    id_persona         INT,

    id_chat            INTEGER,

    PRIMARY KEY (id_chat_persona)

)

;

-- 

-- TABLE: CONTRATACIONES 

--

CREATE TABLE CONTRATACIONES(

    id_contratacion           INT     AUTO_INCREMENT    NOT NULL,

    fecha_hora                DATETIME,

    costo                     FLOAT,

    observaciones             TEXT,

    id_estado_contratacion    INTEGER,

    id_usuario                INT,

    id_usuario_servicio       INT,

    PRIMARY KEY (id_contratacion)

)

;

-- 

-- TABLE: DOMICILIOS 

--

CREATE TABLE DOMICILIOS(

    id_domicilio     INTEGER     AUTO_INCREMENT    NOT NULL,

    id_persona       INT,

    barrio           VARCHAR(30),

    calle            VARCHAR(30),

    altura           INTEGER,

    manzana          VARCHAR(15),

    numero_casa      INTEGER,

    torre            VARCHAR(20),

    piso             INTEGER,

    observaciones    VARCHAR(150),

    PRIMARY KEY (id_domicilio)

)

;

-- 

-- TABLE: ESTADOS_ATRIBUTOS 

--

CREATE TABLE ESTADOS_ATRIBUTOS(

    id_estado_atributo    INTEGER    AUTO_INCREMENT    NOT NULL,

    descripcion           VARCHAR(15),

    PRIMARY KEY (id_estado_atributo)

)

;

-- 

-- TABLE: ESTADOS_CONTRATACIONES 

--

CREATE TABLE ESTADOS_CONTRATACIONES(

    id_estado_contratacion    INTEGER    AUTO_INCREMENT    NOT NULL,

    descripcion               VARCHAR(30),

    PRIMARY KEY (id_estado_contratacion)

)

;

-- 

-- TABLE: ESTADOS_MENSAJES 

--

CREATE TABLE ESTADOS_MENSAJES(

    id_estado_mensaje    INTEGER    AUTO_INCREMENT    NOT NULL,

    descripcion          VARCHAR(10),

    PRIMARY KEY (id_estado_mensaje)

)

;

-- 

-- TABLE: ESTADOS_PAGOS 

--

CREATE TABLE ESTADOS_PAGOS(

    id_estado_pago    INTEGER    AUTO_INCREMENT    NOT NULL,

    descripcion       VARCHAR(30),

    PRIMARY KEY (id_estado_pago)

)

;

-- 

-- TABLE: ESTADOS_USUARIOS 

--

CREATE TABLE ESTADOS_USUARIOS(

    id_estado_usuario    INTEGER    AUTO_INCREMENT    NOT NULL,

    descripcion          VARCHAR(20),

    PRIMARY KEY (id_estado_usuario)

)

;

-- 

-- TABLE: FACTURAS 

--

CREATE TABLE FACTURAS(

    id_factura            INTEGER   AUTO_INCREMENT  NOT NULL,

    fecha_hora_emision    DATETIME,

    id_tipo_factura       INTEGER,

    id_estado_pago        INTEGER,

    PRIMARY KEY (id_factura)

)

;

-- 

-- TABLE: FACTURAS_DETALLES 

--

CREATE TABLE FACTURAS_DETALLES(

    id_factura_detalle    INTEGER  AUTO_INCREMENT  NOT NULL,

    id_contratacion       INT,

    id_factura            INTEGER,

    PRIMARY KEY (id_factura_detalle)

)

;

-- 

-- TABLE: FACTURAS_IMPUESTOS 

--

CREATE TABLE FACTURAS_IMPUESTOS(

    id_factura_impuesto    INTEGER    AUTO_INCREMENT   NOT NULL,

    id_factura_detalle     INTEGER,

    id_tipo_impuesto       INTEGER,

    PRIMARY KEY (id_factura_impuesto)

)

;

-- 

-- TABLE: FACTURAS_PAGOS 

--

CREATE TABLE FACTURAS_PAGOS(

    id_factura_pago    INTEGER   AUTO_INCREMENT  NOT NULL,

    fecha_hora_pago    DATETIME,

    id_factura         INTEGER,

    id_tipo_pago       INTEGER,

    PRIMARY KEY (id_factura_pago)

)

;

-- 

-- TABLE: FACTURAS_VENCIMIENTOS 

--

CREATE TABLE FACTURAS_VENCIMIENTOS(

    id_factura_vencimiento    INTEGER    AUTO_INCREMENT    NOT NULL,

    fecha_vencimiento         DATE,

    id_factura_detalle        INTEGER,

    id_tipo_vencimiento       INTEGER,

    PRIMARY KEY (id_factura_vencimiento)

)

;

-- 

-- TABLE: GENEROS 

--

CREATE TABLE GENEROS(

    id_genero      INTEGER    AUTO_INCREMENT    NOT NULL,

    descripcion    VARCHAR(30),

    PRIMARY KEY (id_genero)

)

;

-- 

-- TABLE: IMAGENES_TRABAJOS 

--

CREATE TABLE IMAGENES_TRABAJOS(

    id_imagen_trabajo      INTEGER    AUTO_INCREMENT   NOT NULL,

    imagen                 BLOB,

    id_usuario_servicio    INT,

    PRIMARY KEY (id_imagen_trabajo)

)

;

-- 

-- TABLE: MENSAJES 

--

CREATE TABLE MENSAJES(

    id_mensaje           INTEGER     AUTO_INCREMENT    NOT NULL,

    mensaje              VARCHAR(200),

    fecha_hora           DATETIME,

    id_persona           INT,

    id_chat              INTEGER,

    id_estado_mensaje    INTEGER,

    PRIMARY KEY (id_mensaje)

)

;

-- 

-- TABLE: MODULOS 

--

CREATE TABLE MODULOS(

    id_modulo      INTEGER    AUTO_INCREMENT    NOT NULL,

    descripcion    VARCHAR(50),

    directorio     VARCHAR(30),

    PRIMARY KEY (id_modulo)

)

;

-- 

-- TABLE: PERFILES 

--

CREATE TABLE PERFILES(

    id_perfil      INTEGER     AUTO_INCREMENT    NOT NULL,

    descripcion    VARCHAR(100),

    PRIMARY KEY (id_perfil)

)

;

-- 

-- TABLE: PERFILES_MODULOS 

--

CREATE TABLE PERFILES_MODULOS(

    id_perfil_modulo    INTEGER    AUTO_INCREMENT    NOT NULL,

    id_perfil           INTEGER,

    id_modulo           INTEGER,

    PRIMARY KEY (id_perfil_modulo)

)

;

-- 

-- TABLE: PERSONAS 

--

CREATE TABLE PERSONAS(

    id_persona          INT      AUTO_INCREMENT      NOT NULL,

    nombre              VARCHAR(50),

    apellido            VARCHAR(50),

    dni                 INT,

    fecha_nacimiento    DATE,

    nacionalidad        VARCHAR(50),

    id_genero           INTEGER,

    PRIMARY KEY (id_persona)

)

;

-- 

-- TABLE: PERSONAS_TIPOS_CONTACTOS 

--

CREATE TABLE PERSONAS_TIPOS_CONTACTOS(

    id_persona_tipo_contacto    INTEGER     AUTO_INCREMENT    NOT NULL,

    valor                       VARCHAR(100),

    id_persona                  INT,

    id_tipo_contacto            INTEGER,

    PRIMARY KEY (id_persona_tipo_contacto)

)

;

-- 

-- TABLE: ROLES 

--

CREATE TABLE ROLES(

    id_rol         INTEGER     AUTO_INCREMENT   NOT NULL,

    descripcion    VARCHAR(20),

    PRIMARY KEY (id_rol)

)

;

-- 

-- TABLE: SERVICIOS 

--

CREATE TABLE SERVICIOS(

    id_servicio           INT      AUTO_INCREMENT      NOT NULL,

    nombre                VARCHAR(50),

    id_subcategoria       INTEGER,

    id_estado_atributo    INTEGER,

    PRIMARY KEY (id_servicio)

)

;

-- 

-- TABLE: SUBCATEGORIAS 

--

CREATE TABLE SUBCATEGORIAS(

    id_subcategoria       INTEGER     AUTO_INCREMENT   NOT NULL,

    nombre                VARCHAR(30),

    id_categoria          INT,

    id_estado_atributo    INTEGER,

    PRIMARY KEY (id_subcategoria)

)

;

-- 

-- TABLE: TIPOS_CONTACTOS 

--

CREATE TABLE TIPOS_CONTACTOS(

    id_tipo_contacto    INTEGER     AUTO_INCREMENT   NOT NULL,

    descripcion         VARCHAR(50),

    PRIMARY KEY (id_tipo_contacto)

)

;

-- 

-- TABLE: TIPOS_FACTURAS 

--

CREATE TABLE TIPOS_FACTURAS(

    id_tipo_factura       INTEGER    AUTO_INCREMENT    NOT NULL,

    descripcion           VARCHAR(30),

    id_estado_atributo    INTEGER,

    PRIMARY KEY (id_tipo_factura)

)

;

-- 

-- TABLE: TIPOS_IMPUESTOS 

--

CREATE TABLE TIPOS_IMPUESTOS(

    id_tipo_impuesto      INTEGER     AUTO_INCREMENT   NOT NULL,

    descripcion           VARCHAR(30),

    porcentaje            VARCHAR(10),

    id_estado_atributo    INTEGER,

    PRIMARY KEY (id_tipo_impuesto)

)

;

-- 

-- TABLE: TIPOS_PAGOS 

--

CREATE TABLE TIPOS_PAGOS(

    id_tipo_pago          INTEGER    AUTO_INCREMENT    NOT NULL,

    descripcion           VARCHAR(30),

    porcentaje            VARCHAR(10),

    id_estado_atributo    INTEGER,

    PRIMARY KEY (id_tipo_pago)

)

;

-- 

-- TABLE: TIPOS_VENCIMIENTOS 

--

CREATE TABLE TIPOS_VENCIMIENTOS(

    id_tipo_vencimiento    INTEGER     AUTO_INCREMENT   NOT NULL,

    descripcion            VARCHAR(30),

    porcentaje             VARCHAR(10),

    id_estado_atributo     INTEGER,

    PRIMARY KEY (id_tipo_vencimiento)

)

;

-- 

-- TABLE: USUARIOS 

--

CREATE TABLE USUARIOS(

    id_usuario           INT      AUTO_INCREMENT      NOT NULL,

    contrasena           CHAR(10),

    username             VARCHAR(30),

    id_persona           INT,

    id_estado_usuario    INTEGER,

    id_perfil            INTEGER,

    id_rol               INTEGER,

    PRIMARY KEY (id_usuario)

)

;

-- 

-- TABLE: USUARIOS_CALIFICADOS 

--

CREATE TABLE USUARIOS_CALIFICADOS(

    id_usuario_calificado    INTEGER   AUTO_INCREMENT   NOT NULL,

    id_calificado            INT,

    PRIMARY KEY (id_usuario_calificado)

)

;

-- 

-- TABLE: USUARIOS_SERVICIOS 

--

CREATE TABLE USUARIOS_SERVICIOS(

    id_usuario_servicio    INT    AUTO_INCREMENT    NOT NULL,

    valor                  FLOAT,

    id_servicio            INT,

    id_usuario             INT,

    id_estado_atributo     INTEGER,

    PRIMARY KEY (id_usuario_servicio)

)

;

-- 

-- INDEX: Ref1321 

--

CREATE INDEX Ref1321 ON USUARIOS(id_persona)

;

-- 

-- TABLE: CALIFICACIONES 

--

ALTER TABLE CALIFICACIONES ADD CONSTRAINT RefUSUARIOS123 

    FOREIGN KEY (id_usuario)

    REFERENCES USUARIOS(id_usuario)

;

ALTER TABLE CALIFICACIONES ADD CONSTRAINT RefUSUARIOS_CALIFICADOS124 

    FOREIGN KEY (id_calificado)

    REFERENCES USUARIOS_CALIFICADOS(id_usuario_calificado)

;

-- 

-- TABLE: CATEGORIAS 

--

ALTER TABLE CATEGORIAS ADD CONSTRAINT RefESTADOS_ATRIBUTOS133 

    FOREIGN KEY (id_estado_atributo)

    REFERENCES ESTADOS_ATRIBUTOS(id_estado_atributo)

;

-- 

-- TABLE: CHAT_PERSONAS 

--

ALTER TABLE CHAT_PERSONAS ADD CONSTRAINT RefPERSONAS103 

    FOREIGN KEY (id_persona)

    REFERENCES PERSONAS(id_persona)

;

ALTER TABLE CHAT_PERSONAS ADD CONSTRAINT RefCHAT104 

    FOREIGN KEY (id_chat)

    REFERENCES CHAT(id_chat)

;

-- 

-- TABLE: CONTRATACIONES 

--

ALTER TABLE CONTRATACIONES ADD CONSTRAINT RefUSUARIOS115 

    FOREIGN KEY (id_usuario)

    REFERENCES USUARIOS(id_usuario)

;

ALTER TABLE CONTRATACIONES ADD CONSTRAINT RefUSUARIOS_SERVICIOS142 

    FOREIGN KEY (id_usuario_servicio)

    REFERENCES USUARIOS_SERVICIOS(id_usuario_servicio)

;

ALTER TABLE CONTRATACIONES ADD CONSTRAINT RefESTADOS_CONTRATACIONES68 

    FOREIGN KEY (id_estado_contratacion)

    REFERENCES ESTADOS_CONTRATACIONES(id_estado_contratacion)

;

-- 

-- TABLE: DOMICILIOS 

--

ALTER TABLE DOMICILIOS ADD CONSTRAINT RefPERSONAS71 

    FOREIGN KEY (id_persona)

    REFERENCES PERSONAS(id_persona)

;

-- 

-- TABLE: FACTURAS 

--

ALTER TABLE FACTURAS ADD CONSTRAINT RefTIPOS_FACTURAS94 

    FOREIGN KEY (id_tipo_factura)

    REFERENCES TIPOS_FACTURAS(id_tipo_factura)

;

ALTER TABLE FACTURAS ADD CONSTRAINT RefESTADOS_PAGOS95 

    FOREIGN KEY (id_estado_pago)

    REFERENCES ESTADOS_PAGOS(id_estado_pago)

;

-- 

-- TABLE: FACTURAS_DETALLES 

--

ALTER TABLE FACTURAS_DETALLES ADD CONSTRAINT RefCONTRATACIONES88 

    FOREIGN KEY (id_contratacion)

    REFERENCES CONTRATACIONES(id_contratacion)

;

ALTER TABLE FACTURAS_DETALLES ADD CONSTRAINT RefFACTURAS91 

    FOREIGN KEY (id_factura)

    REFERENCES FACTURAS(id_factura)

;

-- 

-- TABLE: FACTURAS_IMPUESTOS 

--



ALTER TABLE FACTURAS_IMPUESTOS ADD CONSTRAINT RefFACTURAS_DETALLES89 

    FOREIGN KEY (id_factura_detalle)

    REFERENCES FACTURAS_DETALLES(id_factura_detalle)

;

ALTER TABLE FACTURAS_IMPUESTOS ADD CONSTRAINT RefTIPOS_IMPUESTOS90 

    FOREIGN KEY (id_tipo_impuesto)

    REFERENCES TIPOS_IMPUESTOS(id_tipo_impuesto)

;

-- 

-- TABLE: FACTURAS_PAGOS 

--

ALTER TABLE FACTURAS_PAGOS ADD CONSTRAINT RefFACTURAS97 

    FOREIGN KEY (id_factura)

    REFERENCES FACTURAS(id_factura)

;

ALTER TABLE FACTURAS_PAGOS ADD CONSTRAINT RefTIPOS_PAGOS98 

    FOREIGN KEY (id_tipo_pago)

    REFERENCES TIPOS_PAGOS(id_tipo_pago)

;

-- 

-- TABLE: FACTURAS_VENCIMIENTOS 

--

ALTER TABLE FACTURAS_VENCIMIENTOS ADD CONSTRAINT RefFACTURAS_DETALLES92 

    FOREIGN KEY (id_factura_detalle)

    REFERENCES FACTURAS_DETALLES(id_factura_detalle)

;

ALTER TABLE FACTURAS_VENCIMIENTOS ADD CONSTRAINT RefTIPOS_VENCIMIENTOS93 

    FOREIGN KEY (id_tipo_vencimiento)

    REFERENCES TIPOS_VENCIMIENTOS(id_tipo_vencimiento)

;

-- 

-- TABLE: IMAGENES_TRABAJOS 

--

ALTER TABLE IMAGENES_TRABAJOS ADD CONSTRAINT RefUSUARIOS_SERVICIOS84 

    FOREIGN KEY (id_usuario_servicio)

    REFERENCES USUARIOS_SERVICIOS(id_usuario_servicio)

;

-- 

-- TABLE: MENSAJES 

--

ALTER TABLE MENSAJES ADD CONSTRAINT RefPERSONAS101 

    FOREIGN KEY (id_persona)

    REFERENCES PERSONAS(id_persona)

;

ALTER TABLE MENSAJES ADD CONSTRAINT RefCHAT105 

    FOREIGN KEY (id_chat)

    REFERENCES CHAT(id_chat)

;

ALTER TABLE MENSAJES ADD CONSTRAINT RefESTADOS_MENSAJES114 

    FOREIGN KEY (id_estado_mensaje)

    REFERENCES ESTADOS_MENSAJES(id_estado_mensaje)

;

-- 

-- TABLE: PERFILES_MODULOS 

--

ALTER TABLE PERFILES_MODULOS ADD CONSTRAINT RefPERFILES81 

    FOREIGN KEY (id_perfil)

    REFERENCES PERFILES(id_perfil)

;

ALTER TABLE PERFILES_MODULOS ADD CONSTRAINT RefMODULOS82 

    FOREIGN KEY (id_modulo)

    REFERENCES MODULOS(id_modulo)

;

-- 

-- TABLE: PERSONAS 

--

ALTER TABLE PERSONAS ADD CONSTRAINT RefGENEROS131 

    FOREIGN KEY (id_genero)

    REFERENCES GENEROS(id_genero)

;

-- 

-- TABLE: PERSONAS_TIPOS_CONTACTOS 

--

ALTER TABLE PERSONAS_TIPOS_CONTACTOS ADD CONSTRAINT RefPERSONAS55 

    FOREIGN KEY (id_persona)

    REFERENCES PERSONAS(id_persona)

;

ALTER TABLE PERSONAS_TIPOS_CONTACTOS ADD CONSTRAINT RefTIPOS_CONTACTOS57 

    FOREIGN KEY (id_tipo_contacto)

    REFERENCES TIPOS_CONTACTOS(id_tipo_contacto)

;

-- 

-- TABLE: SERVICIOS 

--

ALTER TABLE SERVICIOS ADD CONSTRAINT RefSUBCATEGORIAS108 

    FOREIGN KEY (id_subcategoria)

    REFERENCES SUBCATEGORIAS(id_subcategoria)

;

ALTER TABLE SERVICIOS ADD CONSTRAINT RefESTADOS_ATRIBUTOS135 

    FOREIGN KEY (id_estado_atributo)

    REFERENCES ESTADOS_ATRIBUTOS(id_estado_atributo)

;

-- 

-- TABLE: SUBCATEGORIAS 

--

ALTER TABLE SUBCATEGORIAS ADD CONSTRAINT RefCATEGORIAS107 

    FOREIGN KEY (id_categoria)

    REFERENCES CATEGORIAS(id_categoria)

;

ALTER TABLE SUBCATEGORIAS ADD CONSTRAINT RefESTADOS_ATRIBUTOS134 

    FOREIGN KEY (id_estado_atributo)

    REFERENCES ESTADOS_ATRIBUTOS(id_estado_atributo)

;

-- 

-- TABLE: TIPOS_FACTURAS 

--

ALTER TABLE TIPOS_FACTURAS ADD CONSTRAINT RefESTADOS_ATRIBUTOS138 

    FOREIGN KEY (id_estado_atributo)

    REFERENCES ESTADOS_ATRIBUTOS(id_estado_atributo)

;

-- 

-- TABLE: TIPOS_IMPUESTOS 

--

ALTER TABLE TIPOS_IMPUESTOS ADD CONSTRAINT RefESTADOS_ATRIBUTOS136 

    FOREIGN KEY (id_estado_atributo)

    REFERENCES ESTADOS_ATRIBUTOS(id_estado_atributo)

;

-- 

-- TABLE: TIPOS_PAGOS 

--

ALTER TABLE TIPOS_PAGOS ADD CONSTRAINT RefESTADOS_ATRIBUTOS139 

    FOREIGN KEY (id_estado_atributo)

    REFERENCES ESTADOS_ATRIBUTOS(id_estado_atributo)

;

-- 

-- TABLE: TIPOS_VENCIMIENTOS 

--

ALTER TABLE TIPOS_VENCIMIENTOS ADD CONSTRAINT RefESTADOS_ATRIBUTOS137 

    FOREIGN KEY (id_estado_atributo)

    REFERENCES ESTADOS_ATRIBUTOS(id_estado_atributo)

;

-- 

-- TABLE: USUARIOS 

--

ALTER TABLE USUARIOS ADD CONSTRAINT RefPERSONAS21 

    FOREIGN KEY (id_persona)

    REFERENCES PERSONAS(id_persona)

;

ALTER TABLE USUARIOS ADD CONSTRAINT RefESTADOS_USUARIOS126 

    FOREIGN KEY (id_estado_usuario)

    REFERENCES ESTADOS_USUARIOS(id_estado_usuario)

;

ALTER TABLE USUARIOS ADD CONSTRAINT RefPERFILES132 

    FOREIGN KEY (id_perfil)

    REFERENCES PERFILES(id_perfil)

;

ALTER TABLE USUARIOS ADD CONSTRAINT RefROLES140 

    FOREIGN KEY (id_rol)

    REFERENCES ROLES(id_rol)

;

-- 

-- TABLE: USUARIOS_CALIFICADOS 

--

ALTER TABLE USUARIOS_CALIFICADOS ADD CONSTRAINT RefUSUARIOS120 

    FOREIGN KEY (id_calificado)

    REFERENCES USUARIOS(id_usuario)

;

-- 

-- TABLE: USUARIOS_SERVICIOS 

--

ALTER TABLE USUARIOS_SERVICIOS ADD CONSTRAINT RefUSUARIOS119 

    FOREIGN KEY (id_usuario)

    REFERENCES USUARIOS(id_usuario)

;

ALTER TABLE USUARIOS_SERVICIOS ADD CONSTRAINT RefSERVICIOS52 

    FOREIGN KEY (id_servicio)

    REFERENCES SERVICIOS(id_servicio)

;

ALTER TABLE USUARIOS_SERVICIOS ADD CONSTRAINT RefESTADOS_ATRIBUTOS141 

    FOREIGN KEY (id_estado_atributo)

    REFERENCES ESTADOS_ATRIBUTOS(id_estado_atributo)

;

-- peronas : id_persona, nombre, apellido, dni, fecha_nacimiento, nacionalidad, id_genero
-- perfil 
-- rol

select * from usuarios;

insert into personas values(
null, "Adriel", "Irala", 40820180, '1998/03/03', "Argentina", null);

insert into perfiles values(
null, "Administrador");

insert into usuarios values(
null, "campana98", "airala", 1, null, 1, null);

