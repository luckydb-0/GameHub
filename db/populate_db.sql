/* PLATFORMS */

insert into platform (name) values ('PS5'),

('Xbox Series X'),

('PS4'),

('Xbox ONE'),

('Nintendo Switch'),

('PC');

/* CATEGORIES */

insert into category (categoryName) values ('Avventura'),

('Azione'),

('Corse'),

('GDR'),

('Indie'),

('Multigiocatore di massa'),

('Passatempo'),

('Simulazione'),

('Sparatutto'),

('Sport'),

('Strategia');

/* DEVELOPERS */

insert into developer (name) values ('Electronic Arts'),

('Nintendo'),

('Ubisoft'),

('Sony'),

('Activision Blizzard'),

('Epic Games'),

('Square Enix'),

('Bungie'),

('Rockstar');

/* VIDEOGAMES */

insert into videogame (title, soldCopies, releaseDate, developerId,platformId, image, suggestedPrice,description) values
('God of War', 100, '2018/04/20', 4, 3, 'GoW.jpg', 69.90,''),
('Far Cry 6', 0, '2021/12/31', 3, 1, 'FarCry6.jpg', 69.90,''),
('Far Cry 6', 0, '2021/12/31', 3, 2, 'FarCry6.jpg', 69.90,''),
('Far Cry 6', 0, '2021/12/31', 3, 6, 'FarCry6.jpg', 69.90,''),
('Animal Crossing', 200, '2020/03/20', 2, 5, 'AnimalCrossing-Switch.jpg', 69.90,''),
('XIII', 4, '2020/11/10', 2, 5, 'XIII.jpg', 69.90,''),
('Grand Theft Auto V', 500, '2013/09/17', 9, 1, 'GTA5-PS4.jpg', 69.90,''),
('Grand Theft Auto V', 500, '2013/09/17', 9, 2, 'GTA5-PS4.jpg', 69.90,''),
('Grand Theft Auto V', 500, '2013/09/17', 9, 3, 'GTA5-PS4.jpg', 69.90,''),
('Grand Theft Auto V', 500, '2013/09/17', 9, 4, 'GTA5-PS4.jpg', 69.90,''),
('Grand Theft Auto V', 500, '2013/09/17', 9, 6, 'GTA5-PS4.jpg', 69.90,''),
('FIFA 20', 300, '2019/09/25', 1, 1, 'FIFA20-PS4.jpg', 69.90,''),
('FIFA 20', 300, '2019/09/25', 1, 2, 'FIFA20-PS4.jpg', 69.90,''),
('FIFA 20', 300, '2019/09/25', 1, 3, 'FIFA20-PS4.jpg', 69.90,''),
('FIFA 20', 300, '2019/09/25', 1, 4, 'FIFA20-PS4.jpg', 69.90,''),
('FIFA 20', 300, '2019/09/25', 1, 5, 'FIFA20-PS4.jpg', 69.90,''),
('FIFA 20', 300, '2019/09/25', 1, 6, 'FIFA20-PS4.jpg', 69.90,''),
('Days Gone', 80, '2019/04/26', 4, 3, 'DG.jpg', 69.90,'');

/* CUSTOMERS */

insert into customer (name, surname, birthDate, email, password, phone) values
('Giorgio', 'Rossi', '1998/12/31', 'giorgio.rossi98@gmail.com', 'rossipower', '3551204567'),
('Gianluca', 'De Bonis', '1998/09/23', 'gianluca.debonis@gmail.com', 'debonispower', '3448900222'),
('Andrea', 'De Crescenzo', '2000/05/31', 'andrea.dec@gmail.com', 'decpower', '3451119834'),
('Lorenzo', 'Pagliazzi', '1998/03/18', 'lorenzo.paglia@gmail.com', 'pagliapower', '3449923610');


/* GAME COPY */

insert into game_copy (gameId, price) values
(1, 21.99),
(2, 80.99),
(3, 80.99),
(4, 59.99),
(5, 60.99),
(6, 80.99),
(7, 60.99),
(8, 60.99),
(9, 29.99),
(10, 29.99),
(11, 14.99),
(12, 70.99),
(13, 70.99),
(14, 60.99),
(15, 60.99),
(16, 40.99),
(17, 30.99),
(18, 40.99),
(18, 39.99),
(12, 70.99),
(8, 50.99),
(1, 21.99),
(6, 80.99),
(10, 25.99),
(11, 14.99),
(13, 70.99);

/* CARTS */

insert into cart (userId) values (1);

insert into cart (userId) values (2);

insert into cart (userId) values (3);

insert into cart (userId) values (4);

/* COPIES IN CART */

insert into copy_in_cart (cartId, copyId) values (1, 1);

insert into copy_in_cart (cartId, copyId) values (1, 2);

insert into copy_in_cart (cartId, copyId) values (1, 3);

/* SELLERS */

insert into seller (name, email, password, p_iva, phone) values ('Viggì', 'Viggì@vg.it', 'wearevg', '01234567890', '0123456789');

insert into seller (name, email, password, p_iva, phone) values ('Grandi Venditori', 'gv@gv.it', 'wearegv', '12345678901', '1234567890');

/* CREDIT CARDS */

insert into credit_card (ccnumber,accountHolder, expiration, cvv, userId)
values
('01234567890123456789','Gianfranco Giuliacci', '2021/12/31', '123', 1),
('12345678901234567890','Gina Paoli', '2022/12/31', '456', 2),
('23456789012345678901','Franca Berlini', '2023/12/31', '789', 3),
('34567890123456789012', 'Betulla D Abete','2024/12/31', '012', 4);

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

insert into game_category (gameId, categoryId) values (1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 9),
(3, 1),
(3, 2),
(3, 9),
(4, 1),
(4, 2),
(4, 9),
(5, 7),
(5, 8),
(5, 4),
(6, 1),
(7, 2),
(7, 9),
(8, 9),
(8, 2),
(9, 9),
(9, 2),
(10, 9),
(10, 2),
(11, 9),
(11, 2),
(12, 10),
(13, 10),
(14, 10),
(15, 10),
(16, 10),
(17, 10),
(18, 1),
(18, 2);
/* SELLER ADDRESS */

insert into seller_address (sellerId, addressId) values (1, 5),
(2, 6);

/* CATALOGUE */

insert into catalogue (sellerId) values (1),
(2);

/* COPY IN CATALOGUE */

insert into copy_in_catalogue (catalogueId, copyId) values (1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25);
/* _ORDER */

insert into _order (userId, addressId, orderDate, total) values (1, 1, '2020/11/20', 82.98),
(1, 2, '2020/07/03', 60.99),
(2, 3, '2020/10/15', 60.99),
(3, 4, '2020/12/22', 30.99);

/* COPY_IN_ORDER */

insert into copy_in_order (copyId, orderId) values (1, 1),
(6, 1),
(14, 2),
(9, 3),
(17, 4);

/* ORDER_SELLER */

insert into order_seller (sellerId, orderId) values (1, 1),
(1, 2),
(2, 3),
(2, 4);

/* SHIPPING */

insert into shipping (addressId, userId) values (1, 1),
(2, 2),
(3, 3),
(4, 4);