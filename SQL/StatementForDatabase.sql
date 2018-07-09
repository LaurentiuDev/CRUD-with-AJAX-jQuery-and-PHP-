CREATE TABLE item (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  title varchar(256) NOT NULL,
  text varchar(256) NOT NULL,
  category varchar(256) NOT NULL,
  image LONGBLOB NOT NULL
);

/*aici nu am mai scris comanda pentru inserare in table pentru ca avem in pagina metoda create care
o sa insereze corect si imaginea */



