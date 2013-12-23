-- Utilizadores
INSERT INTO utilizador VALUES ('admin', 'Admin', 'admin');
INSERT INTO utilizador VALUES ('joana', 'Joana', 'xpto');
INSERT INTO utilizador VALUES ('bia', 'Bia', 'coisas');
INSERT INTO utilizador VALUES ('manuel', 'Manuel', 'nheca');
INSERT INTO utilizador VALUES ('maria', 'Maria', 'cenaz');


-- Divisoes 
INSERT INTO divisao VALUES ('sala', 'Sala', '../media/img/cama.gif');

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