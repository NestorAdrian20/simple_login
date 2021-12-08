CREATE TABLE roles (
 id_rol int(11) NOT NULL,
 name_rol varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 status_rol varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE users (
 id_usuario int(11) NOT NULL,
 name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 gmail varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 username varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 password varchar(500) COLLATE utf8_unicode_ci NOT NULL,
 id_rol int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE roles
 ADD PRIMARY KEY (id_rol);

ALTER TABLE users
 ADD PRIMARY KEY (id_usuario),
 ADD KEY id_rol (id_rol);

ALTER TABLE roles
MODIFY id_rol int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE users
MODIFY id_usuario int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE users
ADD UNIQUE (gmail);

ALTER TABLE users
ADD UNIQUE (username);
 
ALTER TABLE users
 ADD CONSTRAINT fk_rol_users FOREIGN KEY (id_rol) REFERENCES roles (id_rol) ON DELETE CASCADE ON UPDATE CASCADE;