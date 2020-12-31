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
('God of War', 100, '2018/04/20', 4, 3, 'GoW.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Far Cry 6', 0, '2021/12/31', 3, 1, 'FarCry6.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Far Cry 6', 0, '2021/12/31', 3, 2, 'FarCry6.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Far Cry 6', 0, '2021/12/31', 3, 6, 'FarCry6.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Animal Crossing', 200, '2020/03/20', 2, 5, 'AnimalCrossing-Switch.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('XIII', 4, '2020/11/10', 2, 5, 'XIII.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Grand Theft Auto V', 500, '2013/09/17', 9, 1, 'GTA5-PS4.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Grand Theft Auto V', 500, '2013/09/17', 9, 2, 'GTA5-PS4.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Grand Theft Auto V', 500, '2013/09/17', 9, 3, 'GTA5-PS4.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Grand Theft Auto V', 500, '2013/09/17', 9, 4, 'GTA5-PS4.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Grand Theft Auto V', 500, '2013/09/17', 9, 6, 'GTA5-PS4.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('FIFA 20', 300, '2019/09/25', 1, 1, 'FIFA20-PS4.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('FIFA 20', 300, '2019/09/25', 1, 2, 'FIFA20-PS4.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('FIFA 20', 300, '2019/09/25', 1, 3, 'FIFA20-PS4.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('FIFA 20', 300, '2019/09/25', 1, 4, 'FIFA20-PS4.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('FIFA 20', 300, '2019/09/25', 1, 5, 'FIFA20-PS4.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('FIFA 20', 300, '2019/09/25', 1, 6, 'FIFA20-PS4.jpg');

insert into videogame (title, soldCopies, releaseDate, developerId, platformId, image) values 
('Days Gone', 80, '2019/04/26', 4, 3, 'DG.jpg');

/* CUSTOMERS */

insert into customer (name, surname, birthDate, email, password, phone) values ('Giorgio', 'Rossi', '1998/12/31', 'giorgio.rossi98@gmail.com', 'rossipower', '3551204567');

insert into customer (name, surname, birthDate, email, password, phone) values ('Gianluca', 'De Bonis', '1998/09/23', 'gianluca.debonis@gmail.com', 'debonispower', '3448900222');

insert into customer (name, surname, birthDate, email, password, phone) values ('Andrea', 'De Crescenzo', '2000/05/31', 'andrea.dec@gmail.com', 'decpower', '3451119834');

insert into customer (name, surname, birthDate, email, password, phone) values ('Lorenzo', 'Pagliazzi', '1998/03/18', 'lorenzo.paglia@gmail.com', 'pagliapower', '3449923610');

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

/* GAME CATEGORY */

/*
Category id:
	1 avventura
	2 azione 
	3 corse
	4 GDR
	5 Indie
	6 MMORPG
	7 Passatempo
	8 Simulazione
	9 Sparatutto
	10 Sport
	11 Strategia
*/

insert into game_category (gameId, categoryId) values (1, 1); 

insert into game_category (gameId, categoryId) values (1, 2);

insert into game_category (gameId, categoryId) values (2, 1);

insert into game_category (gameId, categoryId) values (2, 2);

insert into game_category (gameId, categoryId) values (2, 9);

insert into game_category (gameId, categoryId) values (3, 1);

insert into game_category (gameId, categoryId) values (3, 2);

insert into game_category (gameId, categoryId) values (3, 9);

insert into game_category (gameId, categoryId) values (4, 1);

insert into game_category (gameId, categoryId) values (4, 2);

insert into game_category (gameId, categoryId) values (4, 9);

insert into game_category (gameId, categoryId) values (5, 7);

insert into game_category (gameId, categoryId) values (5, 8);

insert into game_category (gameId, categoryId) values (5, 4);

insert into game_category (gameId, categoryId) values (6, 1);

insert into game_category (gameId, categoryId) values (7, 2);

insert into game_category (gameId, categoryId) values (7, 9);

insert into game_category (gameId, categoryId) values (8, 9);

insert into game_category (gameId, categoryId) values (8, 2);

insert into game_category (gameId, categoryId) values (9, 9);

insert into game_category (gameId, categoryId) values (9, 2);

insert into game_category (gameId, categoryId) values (10, 9);

insert into game_category (gameId, categoryId) values (10, 2);

insert into game_category (gameId, categoryId) values (11, 9);

insert into game_category (gameId, categoryId) values (11, 2);

insert into game_category (gameId, categoryId) values (12, 10);

insert into game_category (gameId, categoryId) values (13, 10);

insert into game_category (gameId, categoryId) values (14, 10);

insert into game_category (gameId, categoryId) values (15, 10);

insert into game_category (gameId, categoryId) values (16, 10);

insert into game_category (gameId, categoryId) values (17, 10);

insert into game_category (gameId, categoryId) values (18, 1);

insert into game_category (gameId, categoryId) values (18, 2);

/* GAME COPY */

insert into game_copy (gameId, price) values (1, 21.99);

insert into game_copy (gameId, price) values (2, 80.99);

insert into game_copy (gameId, price) values (3, 80.99);

insert into game_copy (gameId, price) values (4, 59.99);

insert into game_copy (gameId, price) values (5, 60.99);

insert into game_copy (gameId, price) values (6, 80.99);

insert into game_copy (gameId, price) values (7, 60.99);

insert into game_copy (gameId, price) values (8, 60.99);

insert into game_copy (gameId, price) values (9, 29.99);

insert into game_copy (gameId, price) values (10, 29.99);

insert into game_copy (gameId, price) values (11, 14.99);

insert into game_copy (gameId, price) values (12, 70.99);

insert into game_copy (gameId, price) values (13, 70.99);

insert into game_copy (gameId, price) values (14, 60.99);

insert into game_copy (gameId, price) values (15, 60.99);

insert into game_copy (gameId, price) values (16, 40.99);

insert into game_copy (gameId, price) values (17, 30.99);

insert into game_copy (gameId, price) values (18, 40.99);

insert into game_copy (gameId, price) values (18, 39.99);

insert into game_copy (gameId, price) values (12, 70.99);

insert into game_copy (gameId, price) values (8, 50.99);

insert into game_copy (gameId, price) values (1, 21.99);

insert into game_copy (gameId, price) values (6, 80.99);

insert into game_copy (gameId, price) values (10, 25.99);

insert into game_copy (gameId, price) values (11, 14.99);

insert into game_copy (gameId, price) values (13, 70.99);


/* SELLER ADDRESS */

insert into seller_address (sellerId, addressId) values (1, 5);

insert into seller_address (sellerId, addressId) values (2, 6);

/* CATALOGUE */

insert into catalogue (sellerId) values (1);

insert into catalogue (sellerId) values (2);

/* COPY IN CATALOGUE */

insert into copy_in_catalogue (catalogueId, copyId) values (1, 1);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 2);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 3);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 4);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 5);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 6);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 7);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 8);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 9);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 10);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 11);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 12);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 13);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 14);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 15);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 16);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 17);

insert into copy_in_catalogue (catalogueId, copyId) values (1, 18);

insert into copy_in_catalogue (catalogueId, copyId) values (2, 19);

insert into copy_in_catalogue (catalogueId, copyId) values (2, 20);

insert into copy_in_catalogue (catalogueId, copyId) values (2, 21);

insert into copy_in_catalogue (catalogueId, copyId) values (2, 22);

insert into copy_in_catalogue (catalogueId, copyId) values (2, 23);

insert into copy_in_catalogue (catalogueId, copyId) values (2, 24);

insert into copy_in_catalogue (catalogueId, copyId) values (2, 25);

/* _ORDER */

insert into _order (userId, orderDate, total) values (1, '2020/11/20', 82.98);

insert into _order (userId, orderDate, total) values (1, '2020/07/03', 60.99);

insert into _order (userId, orderDate, total) values (2, '2020/10/15', 60.99);

insert into _order (userId, orderDate, total) values (3, '2020/12/22', 30.99);

/* COPY_IN_ORDER */

insert into copy_in_order (copyId, orderId) values (1, 1);

insert into copy_in_order (copyId, orderId) values (6, 1);

insert into copy_in_order (copyId, orderId) values (14, 2);

insert into copy_in_order (copyId, orderId) values (9, 3);

insert into copy_in_order (copyId, orderId) values (17, 4);