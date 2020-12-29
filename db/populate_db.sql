/* PLATFORMS */

insert into platform (name) values ('PS5');

insert into platform (name) values ('Xbox Series X');

insert into platform (name) values ('PS4');

insert into platform (name) values ('Xbox ONE');

insert into platform (name) values ('Nintendo Switch');

insert into platform (name) values ('PC');

/* CATEGORIES */

insert into category (categoryName) values ('Avventura');

insert into category (categoryName) values ('Azione');

insert into category (categoryName) values ('Corse');

insert into category (categoryName) values ('GDR');

insert into category (categoryName) values ('Indie');

insert into category (categoryName) values ('Multigiocatore di massa');

insert into category (categoryName) values ('Passatempo');

insert into category (categoryName) values ('Simulazione');

insert into category (categoryName) values ('Sparatutto');

insert into category (categoryName) values ('Sport');

insert into category (categoryName) values ('Strategia');

/* DEVELOPERS */

insert into developer (name) values ('Electronic Arts');

insert into developer (name) values ('Nintendo');

insert into developer (name) values ('Ubisoft');

insert into developer (name) values ('Sony');

insert into developer (name) values ('Activision Blizzard');

insert into developer (name) values ('Epic Games');

insert into developer (name) values ('Square Enix');

insert into developer (name) values ('Bungie');

insert into developer (name) values ('Rockstar');

/* VIDEOGAMES */

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('God of War', 100, '2018/04/20', 4, 3, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Far Cry 6', 0, '2021/12/31', 3, 1, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Far Cry 6', 0, '2021/12/31', 3, 2, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Far Cry 6', 0, '2021/12/31', 3, 6, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Animal Crossing', 200, '2020/03/20', 2, 5, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('XIII', 4, '2020/11/10', 2, 5, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Grand Theft Auto V', 500, '2013/09/17', 9, 1, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Grand Theft Auto V', 500, '2013/09/17', 9, 2, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Grand Theft Auto V', 500, '2013/09/17', 9, 3, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Grand Theft Auto V', 500, '2013/09/17', 9, 4, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Grand Theft Auto V', 500, '2013/09/17', 9, 6, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('FIFA 20', 300, '2019/09/25', 1, 1, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('FIFA 20', 300, '2019/09/25', 1, 2, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('FIFA 20', 300, '2019/09/25', 1, 3, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('FIFA 20', 300, '2019/09/25', 1, 4, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('FIFA 20', 300, '2019/09/25', 1, 5, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('FIFA 20', 300, '2019/09/25', 1, 6, 'noImage');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Days Gone', 80, '2019/04/26', 4, 3, 'noImage');

/* CUSTOMERS */

insert into customer (name, surname, birthDate, email, password) values ('Giorgio', 'Rossi', '1998/12/31', 'giorgio.rossi98@gmail.com', 'rossipower');

insert into customer (name, surname, birthDate, email, password) values ('Gianluca', 'De Bonis', '1998/09/23', 'gianluca.debonis@gmail.com', 'debonispower');

insert into customer (name, surname, birthDate, email, password) values ('Andrea', 'De Crescenzo', '2000/05/31', 'andrea.dec@gmail.com', 'decpower');

insert into customer (name, surname, birthDate, email, password) values ('Lorenzo', 'Pagliazzi', '1998/03/18', 'lorenzo.paglia@gmail.com', 'pagliapower');

/* SELLERS */

insert into seller (name, email, password, p_iva, phone) values ('Viggì', 'Viggì@vg.it', 'wearevg', '01234567890', '0123456789');

insert into seller (name, email, password, p_iva, phone) values ('Grandi Venditori', 'gv@gv.it', 'wearegv', '12345678901', '1234567890');

/* CREDIT CARDS */

insert into credit_card (ccnumber, expiration, cvv, userId) values ('01234567890123456789', '2021/12/31', '123', 1);

insert into credit_card (ccnumber, expiration, cvv, userId) values ('12345678901234567890', '2022/12/31', '456', 2);

insert into credit_card (ccnumber, expiration, cvv, userId) values ('23456789012345678901', '2023/12/31', '789', 3);

insert into credit_card (ccnumber, expiration, cvv, userId) values ('34567890123456789012', '2024/12/31', '012', 4);

/* ADDRESSES */

insert into address (country, city, street, postCode) values ('Italia', 'Cesena', 'via di Casa 1', '47521');

insert into address (country, city, street, postCode) values ('Italia', 'Cesena', 'via di Casa 2', '47521');

insert into address (country, city, street, postCode) values ('Italia', 'Cesena', 'via di Casa 3', '47521');

insert into address (country, city, street, postCode) values ('Italia', 'Cesena', 'via di Casa 4', '47521');

insert into address (country, city, street, postCode) values ('Italia', 'Cesena', 'via di Vendita 11', '47521');

insert into address (country, city, street, postCode) values ('Italia', 'Cesena', 'via di Vendita 12', '47521');