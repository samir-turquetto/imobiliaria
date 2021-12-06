SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `corretores` (
  `matricula` int NOT NULL,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

ALTER TABLE `corretores`
  ADD PRIMARY KEY (`matricula`);

ALTER TABLE `corretores`
  MODIFY `matricula` int NOT NULL AUTO_INCREMENT;

INSERT INTO corretores(nome) values ('Samir');
COMMIT;