-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2023 at 08:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monografias`
--

-- --------------------------------------------------------

--
-- Table structure for table `estudante`
--

CREATE TABLE `estudante` (
  `id` int NOT NULL,
  `nome` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curso` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estudante`
--

INSERT INTO `estudante` (`id`, `nome`, `curso`, `codigo`, `genero`) VALUES
(1, 'Hidélgio Novela', 'Engenheira Informática ', '201666', 'Masculino'),
(2, 'Amélia Guambe', 'Gestão ', '13412', 'Femenino'),
(3, 'Sérgio Mabasso', 'Engenharia Mecânica ', '201234', 'Masculino'),
(4, 'Adélia Langa', 'Administração Pública ', '123213', 'Femenino'),
(5, 'Juventina Bila', 'Relações Internacionais ', '207891', 'Femenino');

-- --------------------------------------------------------

--
-- Table structure for table `monografia`
--

CREATE TABLE `monografia` (
  `id` int NOT NULL,
  `estudante_id` int NOT NULL,
  `tema` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_publicacao` date NOT NULL,
  `nome` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monografia`
--

INSERT INTO `monografia` (`id`, `estudante_id`, `tema`, `data_publicacao`, `nome`) VALUES
(3, 3, 'Automóveis Eletricos', '2023-06-02', 'UNIDADE 3 - Direito das TICs.pdf'),
(4, 1, 'Sistema de gestão de stock', '2023-06-02', 'Reunião de defesas de monografias (1).pdf'),
(5, 2, 'Gestão de empresas na era moderna', '2023-06-02', 'Errors_in_Spring_boot_1678483677.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `senha`, `username`) VALUES
(1, 'admin@admin.com', '1234', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estudante`
--
ALTER TABLE `estudante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monografia`
--
ALTER TABLE `monografia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudante_id_fk` (`estudante_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estudante`
--
ALTER TABLE `estudante`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monografia`
--
ALTER TABLE `monografia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `monografia`
--
ALTER TABLE `monografia`
  ADD CONSTRAINT `estudante_id_fk` FOREIGN KEY (`estudante_id`) REFERENCES `estudante` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
