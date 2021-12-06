SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `imoveis` (
  `matricula` int NOT NULL,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

ALTER TABLE `imoveis`
    ADD PRIMARY KEY (`matricula`);

ALTER TABLE `imoveis`
    MODIFY `matricula` int NOT NULL AUTO_INCREMENT;

INSERT INTO imoveis(nome) values ('Terra de Santa Cruz');
COMMIT;