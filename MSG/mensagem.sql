--
-- Estrutura da tabela
-- CRIE UM BANCO DE DADOS COM NOME MENSAGEM
-- CRIE UMA TABELA COM NOME CONTATOS
-- CRIE UMA TABELA COM NOME CARTÃODECREDITO
--

CREATE TABLE `CARTÃODECREDITO` (
  `id` int(255) NOT NULL,
  `cliente` mediumtext NOT NULL,
  `telefone` mediumtext NOT NULL,
  `limite` longtext NOT NULL,
  `mensagem` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela
--
ALTER TABLE `CARTÃODECREDITO`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela
--
ALTER TABLE `CARTÃODECREDITO`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;
