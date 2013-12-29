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
INSERT INTO acede VALUES ('joana', 'quarto1');
INSERT INTO acede VALUES ('joana', 'sala');
INSERT INTO acede VALUES ('joana', 'cozinha');
INSERT INTO acede VALUES ('joana', 'casaBanho');
INSERT INTO acede VALUES ('manuel', 'quarto2');
INSERT INTO acede VALUES ('manuel', 'sala');
INSERT INTO acede VALUES ('manuel', 'cozinha');
INSERT INTO acede VALUES ('manuel', 'casaBanho');
INSERT INTO acede VALUES ('maria', 'quarto2');
INSERT INTO acede VALUES ('maria', 'sala');
INSERT INTO acede VALUES ('maria', 'cozinha');
INSERT INTO acede VALUES ('maria', 'casaBanho');
INSERT INTO acede VALUES ('admin', 'quarto1');
INSERT INTO acede VALUES ('admin', 'quarto2');
INSERT INTO acede VALUES ('admin', 'sala');
INSERT INTO acede VALUES ('admin', 'cozinha');
INSERT INTO acede VALUES ('admin', 'casaBanho');

-- Utilizacao de equipamentos 
INSERT INTO utiliza VALUES ('joana', 'luz01');