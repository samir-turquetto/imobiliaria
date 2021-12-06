SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `usuarios` (
  `codigo` int NOT NULL,
  `usuario` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;


ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`);


ALTER TABLE `usuarios`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT;

INSERT INTO usuarios(usuario, senha) values ('admin', MD5('admin'));
COMMIT;