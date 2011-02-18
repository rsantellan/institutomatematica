CREATE TABLE alumno (id INT AUTO_INCREMENT, nombre VARCHAR(128) NOT NULL, apellido VARCHAR(255) NOT NULL, telefono VARCHAR(255) NOT NULL, celular VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, sexo VARCHAR(2) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE alumno_preparacion (alumno_id INT, preparacion_id INT, forma_contacto_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX forma_contacto_id_idx (forma_contacto_id), PRIMARY KEY(alumno_id, preparacion_id)) ENGINE = INNODB;
CREATE TABLE calendario_materias (id INT AUTO_INCREMENT, day VARCHAR(255), hour INT NOT NULL, minutes INT NOT NULL, preparacion_id INT NOT NULL, duration INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX preparacion_id_idx (preparacion_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE docente (id INT AUTO_INCREMENT, nombre VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE evaluacion (id INT AUTO_INCREMENT, nombre VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE facultad (id INT AUTO_INCREMENT, nombre VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE forma_contacto (id INT AUTO_INCREMENT, nombre VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE horario_estudiante (id BIGINT AUTO_INCREMENT, alumno_id INT NOT NULL, horario_id INT NOT NULL, INDEX alumno_id_idx (alumno_id), INDEX horario_id_idx (horario_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE materia (id INT AUTO_INCREMENT, nombre VARCHAR(128) NOT NULL, facultad_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX facultad_id_idx (facultad_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE preparacion (id INT AUTO_INCREMENT, materia_id INT NOT NULL, docente_id INT NOT NULL, evaluacion_id INT NOT NULL, periodo DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX materia_id_idx (materia_id), INDEX docente_id_idx (docente_id), INDEX evaluacion_id_idx (evaluacion_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id INT AUTO_INCREMENT, user_id INT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id, ip_address)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id INT AUTO_INCREMENT, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id INT, group_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE alumno_preparacion ADD CONSTRAINT alumno_preparacion_preparacion_id_preparacion_id FOREIGN KEY (preparacion_id) REFERENCES preparacion(id) ON DELETE CASCADE;
ALTER TABLE alumno_preparacion ADD CONSTRAINT alumno_preparacion_forma_contacto_id_forma_contacto_id FOREIGN KEY (forma_contacto_id) REFERENCES forma_contacto(id) ON DELETE CASCADE;
ALTER TABLE alumno_preparacion ADD CONSTRAINT alumno_preparacion_alumno_id_alumno_id FOREIGN KEY (alumno_id) REFERENCES alumno(id) ON DELETE CASCADE;
ALTER TABLE calendario_materias ADD CONSTRAINT calendario_materias_preparacion_id_preparacion_id FOREIGN KEY (preparacion_id) REFERENCES preparacion(id) ON DELETE CASCADE;
ALTER TABLE horario_estudiante ADD CONSTRAINT horario_estudiante_horario_id_calendario_materias_id FOREIGN KEY (horario_id) REFERENCES calendario_materias(id) ON DELETE CASCADE;
ALTER TABLE horario_estudiante ADD CONSTRAINT horario_estudiante_alumno_id_alumno_id FOREIGN KEY (alumno_id) REFERENCES alumno(id) ON DELETE CASCADE;
ALTER TABLE materia ADD CONSTRAINT materia_facultad_id_facultad_id FOREIGN KEY (facultad_id) REFERENCES facultad(id) ON DELETE CASCADE;
ALTER TABLE preparacion ADD CONSTRAINT preparacion_materia_id_materia_id FOREIGN KEY (materia_id) REFERENCES materia(id) ON DELETE CASCADE;
ALTER TABLE preparacion ADD CONSTRAINT preparacion_evaluacion_id_evaluacion_id FOREIGN KEY (evaluacion_id) REFERENCES evaluacion(id) ON DELETE CASCADE;
ALTER TABLE preparacion ADD CONSTRAINT preparacion_docente_id_docente_id FOREIGN KEY (docente_id) REFERENCES docente(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;