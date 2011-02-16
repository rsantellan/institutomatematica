CREATE TABLE alumno (id INT AUTO_INCREMENT, nombre VARCHAR(128) NOT NULL, apellido VARCHAR(255) NOT NULL, telefono VARCHAR(255), celular VARCHAR(255), direccion VARCHAR(255), email VARCHAR(255), sexo VARCHAR(2) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE alumno_preparacion (alumno_id INT, preparacion_id INT, forma_contacto_id INT NOT NULL, nota_contacto VARCHAR(64), pago TINYINT(1) DEFAULT '0' NOT NULL, pago_completo TINYINT(1) DEFAULT '0' NOT NULL, monto_pago INT DEFAULT 0 NOT NULL, resultado VARCHAR(12) DEFAULT 'desconocido' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX forma_contacto_id_idx (forma_contacto_id), PRIMARY KEY(alumno_id, preparacion_id)) ENGINE = INNODB;
CREATE TABLE calendario_materias (id INT AUTO_INCREMENT, day VARCHAR(255), hour INT NOT NULL, minutes INT NOT NULL, preparacion_id INT NOT NULL, duration INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX preparacion_id_idx (preparacion_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE docente (id INT AUTO_INCREMENT, nombre VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE evaluacion (id INT AUTO_INCREMENT, nombre VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE facultad (id INT AUTO_INCREMENT, nombre VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE forma_contacto (id INT AUTO_INCREMENT, nombre VARCHAR(128) NOT NULL, nota VARCHAR(128), tiene_nota TINYINT DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE horario_estudiante (id BIGINT AUTO_INCREMENT, alumno_id INT NOT NULL, horario_id INT NOT NULL, INDEX alumno_id_idx (alumno_id), INDEX horario_id_idx (horario_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE materia (id INT AUTO_INCREMENT, nombre VARCHAR(128) NOT NULL, facultad_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX facultad_id_idx (facultad_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_attribute_translation (id INT, label VARCHAR(100) NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE md_attribute (id INT AUTO_INCREMENT, name VARCHAR(100) NOT NULL, type_class VARCHAR(100) NOT NULL, requiered TINYINT DEFAULT 0 NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_attribute_object_translation (id INT, value TEXT NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE md_attribute_object (id INT AUTO_INCREMENT, object_id INT NOT NULL, object_class_name VARCHAR(128) NOT NULL, md_attribute_id INT NOT NULL, md_attribute_value_id INT, md_profile_id INT NOT NULL, INDEX md_attribute_id_idx (md_attribute_id), INDEX md_attribute_value_id_idx (md_attribute_value_id), INDEX md_profile_id_idx (md_profile_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_attribute_value_translation (id INT, name VARCHAR(100) NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE md_attribute_value (id INT AUTO_INCREMENT, md_attribute_id INT NOT NULL, INDEX md_attribute_id_idx (md_attribute_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_content (id INT AUTO_INCREMENT, md_user_id INT NOT NULL, object_class VARCHAR(128) NOT NULL, object_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX md_user_id_idx (md_user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_content_relation (md_content_id_first INT, md_content_id_second INT, object_class_name VARCHAR(128) NOT NULL, profile_name VARCHAR(128), PRIMARY KEY(md_content_id_first, md_content_id_second)) ENGINE = INNODB;
CREATE TABLE md_group (id INT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, description TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_group_permission (group_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE md_i18_n_manage_classes (id INT AUTO_INCREMENT, class_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media (id INT AUTO_INCREMENT, object_class_name VARCHAR(128) NOT NULL, object_id INT NOT NULL, UNIQUE INDEX md_media_index_idx (object_class_name, object_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_album (id INT AUTO_INCREMENT, md_media_id INT, title VARCHAR(64) NOT NULL, description VARCHAR(255), type VARCHAR(255) DEFAULT 'Mixed', deleteallowed bool NOT NULL, md_media_content_id INT, UNIQUE INDEX md_media_album_title_index_idx (md_media_id, title), INDEX md_media_content_id_idx (md_media_content_id), INDEX md_media_id_idx (md_media_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_album_content (md_media_album_id INT, md_media_content_id INT, object_class_name VARCHAR(128) NOT NULL, priority BIGINT NOT NULL, INDEX md_media_album_content_index_idx (priority ASC), PRIMARY KEY(md_media_album_id, md_media_content_id)) ENGINE = INNODB;
CREATE TABLE md_media_content (id INT AUTO_INCREMENT, object_class_name VARCHAR(128) NOT NULL, object_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX md_media_content_index_idx (object_class_name, object_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_file (id INT AUTO_INCREMENT, name VARCHAR(64) NOT NULL, filename VARCHAR(64) NOT NULL, filetype VARCHAR(64) NOT NULL, description VARCHAR(255), path VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_image (id INT AUTO_INCREMENT, name VARCHAR(64) NOT NULL, filename VARCHAR(64) NOT NULL, description VARCHAR(255), path VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_video (id INT AUTO_INCREMENT, name VARCHAR(64) NOT NULL, filename VARCHAR(64) NOT NULL, duration VARCHAR(64) NOT NULL, type VARCHAR(64) NOT NULL, description VARCHAR(255), path VARCHAR(255), avatar VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_you_tube_video (id INT AUTO_INCREMENT, name VARCHAR(64) NOT NULL, src VARCHAR(255) NOT NULL, code VARCHAR(64) NOT NULL, duration VARCHAR(64) NOT NULL, description VARCHAR(255), path VARCHAR(255), avatar VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_passport (id INT AUTO_INCREMENT, md_user_id INT NOT NULL, username VARCHAR(128) NOT NULL, password VARCHAR(128) NOT NULL, account_active TINYINT DEFAULT '0' NOT NULL, last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX md_user_id_idx (md_user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_passport_group (md_passport_id INT, md_group_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(md_passport_id, md_group_id)) ENGINE = INNODB;
CREATE TABLE md_passport_remember_key (id INT AUTO_INCREMENT, md_passport_id INT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX md_passport_id_idx (md_passport_id), PRIMARY KEY(id, ip_address)) ENGINE = INNODB;
CREATE TABLE md_permission (id INT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, description TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_profile_translation (id INT, display VARCHAR(100) NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE md_profile (id INT AUTO_INCREMENT, name VARCHAR(32) NOT NULL, object_class_name VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_profile_attribute (md_attribute_id INT, md_profile_id INT, PRIMARY KEY(md_attribute_id, md_profile_id)) ENGINE = INNODB;
CREATE TABLE md_profile_object (id INT AUTO_INCREMENT, object_id INT NOT NULL, object_class_name VARCHAR(64) NOT NULL, md_profile_id INT NOT NULL, active TINYINT(1) NOT NULL, INDEX md_profile_id_idx (md_profile_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_user (id INT AUTO_INCREMENT, email VARCHAR(128) NOT NULL UNIQUE, super_admin TINYINT DEFAULT '0' NOT NULL, deleted_at DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_user_profile (id INT AUTO_INCREMENT, name VARCHAR(128), last_name VARCHAR(128), city VARCHAR(128), country_code VARCHAR(2) DEFAULT 'UY', PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE periodo (id INT AUTO_INCREMENT, inicio DATETIME NOT NULL, fin DATETIME NOT NULL, nombre VARCHAR(128), activo TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE preparacion (id INT AUTO_INCREMENT, materia_id INT NOT NULL, md_user_id INT NOT NULL, evaluacion_id INT NOT NULL, periodo_id INT NOT NULL, inicio DATETIME NOT NULL, fin DATETIME NOT NULL, costo_clase INT DEFAULT 0 NOT NULL, costo_total INT DEFAULT 0 NOT NULL, hora_inicio VARCHAR(64) NOT NULL, hora_fin VARCHAR(64) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX materia_id_idx (materia_id), INDEX md_user_id_idx (md_user_id), INDEX evaluacion_id_idx (evaluacion_id), INDEX periodo_id_idx (periodo_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE alumno_preparacion ADD CONSTRAINT alumno_preparacion_preparacion_id_preparacion_id FOREIGN KEY (preparacion_id) REFERENCES preparacion(id) ON DELETE CASCADE;
ALTER TABLE alumno_preparacion ADD CONSTRAINT alumno_preparacion_forma_contacto_id_forma_contacto_id FOREIGN KEY (forma_contacto_id) REFERENCES forma_contacto(id) ON DELETE CASCADE;
ALTER TABLE alumno_preparacion ADD CONSTRAINT alumno_preparacion_alumno_id_alumno_id FOREIGN KEY (alumno_id) REFERENCES alumno(id) ON DELETE CASCADE;
ALTER TABLE calendario_materias ADD CONSTRAINT calendario_materias_preparacion_id_preparacion_id FOREIGN KEY (preparacion_id) REFERENCES preparacion(id) ON DELETE CASCADE;
ALTER TABLE horario_estudiante ADD CONSTRAINT horario_estudiante_horario_id_calendario_materias_id FOREIGN KEY (horario_id) REFERENCES calendario_materias(id) ON DELETE CASCADE;
ALTER TABLE horario_estudiante ADD CONSTRAINT horario_estudiante_alumno_id_alumno_id FOREIGN KEY (alumno_id) REFERENCES alumno(id) ON DELETE CASCADE;
ALTER TABLE materia ADD CONSTRAINT materia_facultad_id_facultad_id FOREIGN KEY (facultad_id) REFERENCES facultad(id) ON DELETE CASCADE;
ALTER TABLE md_attribute_translation ADD CONSTRAINT md_attribute_translation_id_md_attribute_id FOREIGN KEY (id) REFERENCES md_attribute(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE md_attribute_object_translation ADD CONSTRAINT md_attribute_object_translation_id_md_attribute_object_id FOREIGN KEY (id) REFERENCES md_attribute_object(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE md_attribute_object ADD CONSTRAINT md_attribute_object_md_profile_id_md_profile_id FOREIGN KEY (md_profile_id) REFERENCES md_profile(id);
ALTER TABLE md_attribute_object ADD CONSTRAINT md_attribute_object_md_attribute_value_id_md_attribute_value_id FOREIGN KEY (md_attribute_value_id) REFERENCES md_attribute_value(id);
ALTER TABLE md_attribute_object ADD CONSTRAINT md_attribute_object_md_attribute_id_md_attribute_id FOREIGN KEY (md_attribute_id) REFERENCES md_attribute(id);
ALTER TABLE md_attribute_value_translation ADD CONSTRAINT md_attribute_value_translation_id_md_attribute_value_id FOREIGN KEY (id) REFERENCES md_attribute_value(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE md_attribute_value ADD CONSTRAINT md_attribute_value_md_attribute_id_md_attribute_id FOREIGN KEY (md_attribute_id) REFERENCES md_attribute(id);
ALTER TABLE md_content ADD CONSTRAINT md_content_md_user_id_md_user_id FOREIGN KEY (md_user_id) REFERENCES md_user(id);
ALTER TABLE md_content_relation ADD CONSTRAINT md_content_relation_md_content_id_second_md_content_id FOREIGN KEY (md_content_id_second) REFERENCES md_content(id);
ALTER TABLE md_content_relation ADD CONSTRAINT md_content_relation_md_content_id_first_md_content_id FOREIGN KEY (md_content_id_first) REFERENCES md_content(id);
ALTER TABLE md_group_permission ADD CONSTRAINT md_group_permission_permission_id_md_permission_id FOREIGN KEY (permission_id) REFERENCES md_permission(id) ON DELETE CASCADE;
ALTER TABLE md_group_permission ADD CONSTRAINT md_group_permission_group_id_md_group_id FOREIGN KEY (group_id) REFERENCES md_group(id) ON DELETE CASCADE;
ALTER TABLE md_media_album ADD CONSTRAINT md_media_album_md_media_id_md_media_id FOREIGN KEY (md_media_id) REFERENCES md_media(id);
ALTER TABLE md_media_album ADD CONSTRAINT md_media_album_md_media_content_id_md_media_content_id FOREIGN KEY (md_media_content_id) REFERENCES md_media_content(id);
ALTER TABLE md_media_album_content ADD CONSTRAINT md_media_album_content_md_media_content_id_md_media_content_id FOREIGN KEY (md_media_content_id) REFERENCES md_media_content(id);
ALTER TABLE md_media_album_content ADD CONSTRAINT md_media_album_content_md_media_album_id_md_media_album_id FOREIGN KEY (md_media_album_id) REFERENCES md_media_album(id);
ALTER TABLE md_passport ADD CONSTRAINT md_passport_md_user_id_md_user_id FOREIGN KEY (md_user_id) REFERENCES md_user(id);
ALTER TABLE md_passport_group ADD CONSTRAINT md_passport_group_md_passport_id_md_passport_id FOREIGN KEY (md_passport_id) REFERENCES md_passport(id) ON DELETE CASCADE;
ALTER TABLE md_passport_group ADD CONSTRAINT md_passport_group_md_group_id_md_group_id FOREIGN KEY (md_group_id) REFERENCES md_group(id) ON DELETE CASCADE;
ALTER TABLE md_passport_remember_key ADD CONSTRAINT md_passport_remember_key_md_passport_id_md_passport_id FOREIGN KEY (md_passport_id) REFERENCES md_passport(id) ON DELETE CASCADE;
ALTER TABLE md_profile_translation ADD CONSTRAINT md_profile_translation_id_md_profile_id FOREIGN KEY (id) REFERENCES md_profile(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE md_profile_attribute ADD CONSTRAINT md_profile_attribute_md_profile_id_md_profile_id FOREIGN KEY (md_profile_id) REFERENCES md_profile(id);
ALTER TABLE md_profile_attribute ADD CONSTRAINT md_profile_attribute_md_attribute_id_md_attribute_id FOREIGN KEY (md_attribute_id) REFERENCES md_attribute(id);
ALTER TABLE md_profile_object ADD CONSTRAINT md_profile_object_md_profile_id_md_profile_id FOREIGN KEY (md_profile_id) REFERENCES md_profile(id);
ALTER TABLE preparacion ADD CONSTRAINT preparacion_periodo_id_periodo_id FOREIGN KEY (periodo_id) REFERENCES periodo(id) ON DELETE CASCADE;
ALTER TABLE preparacion ADD CONSTRAINT preparacion_md_user_id_md_user_id FOREIGN KEY (md_user_id) REFERENCES md_user(id) ON DELETE CASCADE;
ALTER TABLE preparacion ADD CONSTRAINT preparacion_materia_id_materia_id FOREIGN KEY (materia_id) REFERENCES materia(id) ON DELETE CASCADE;
ALTER TABLE preparacion ADD CONSTRAINT preparacion_evaluacion_id_evaluacion_id FOREIGN KEY (evaluacion_id) REFERENCES evaluacion(id) ON DELETE CASCADE;
