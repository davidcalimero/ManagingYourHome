-- Utilizadores
INSERT INTO utilizador VALUES ('admin', 'Admin', 'admin');
INSERT INTO utilizador VALUES ('joana', 'Joana', 'xpto');
INSERT INTO utilizador VALUES ('bia', 'Bia', 'coisas');
INSERT INTO utilizador VALUES ('manuel', 'Manuel', 'nheca');
INSERT INTO utilizador VALUES ('maria', 'Maria', 'cenaz');


-- Divisoes 
INSERT INTO divisao VALUES ('sala', 'Sala', 'sofa.png');
INSERT INTO divisao VALUES ('quarto1', 'Quarto Joana', 'cama1.png');
INSERT INTO divisao VALUES ('quarto2', 'Quarto Maria Manuel', 'cama2.png');
INSERT INTO divisao VALUES ('cozinha', 'Cozinha', 'talheres.png');
INSERT INTO divisao VALUES ('casaBanho', 'Casa de Banho', 'wc.png');

-- Equipamentos 
INSERT INTO equipamento VALUES ('luz01', 'Luzes de parede');
INSERT INTO equipamento VALUES ('estore01', 'Estore esquerdo');

-- Divisoes e equipamentos
INSERT INTO equipada VALUES ('sala', 'luz01');
INSERT INTO equipada VALUES ('sala', 'estore01');

-- Acesso a divisoes 
INSERT INTO acede VALUES ('joana', 'sala');

-- Utilizacao de equipamentos 
INSERT INTO utiliza VALUES ('joana', 'luz01');