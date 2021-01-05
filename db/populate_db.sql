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

('Strategia'),

('Platform');

/* DEVELOPERS */

insert into developer (name) values ('Electronic Arts'),

('Nintendo'),

('Ubisoft'),

('Sony'),

('Activision Blizzard'),

('Epic Games'),

('Square Enix'),

('Bungie'),

('Rockstar'),

('Altri');

/* VIDEOGAMES */

insert into videogame (title, soldCopies, releaseDate, developerId,platformId, image, suggestedPrice,description) values
('God of War', 100, '2018/04/20', 4, 3, 'GoW.jpg', 69.90,''),
('Far Cry 6', 0, '2021/12/31', 3, 1, 'FarCry6-PS5.jpg', 69.90,''),
('Far Cry 6', 0, '2021/12/31', 3, 2, 'FarCry6-XBoxX.jpg', 69.90,''),
('Far Cry 6', 0, '2021/12/31', 3, 6, 'FarCry6-PC.jpg', 69.90,''),
('Animal Crossing', 200, '2020/03/20', 2, 5, 'AnimalCrossing-Switch.jpg', 69.90,''),
('XIII', 42, '2020/11/10', 2, 5, 'XIII-Switch.jpg', 69.90,''),
('Grand Theft Auto V', 500, '2013/09/17', 9, 3, 'GTA5-PS4.jpg', 69.90,''),
('Grand Theft Auto V', 310, '2013/09/17', 9, 4, 'GTA5-XBoxOne.jpg', 69.90,''),
('Grand Theft Auto V', 402, '2013/09/17', 9, 6, 'GTA5-PC.jpg', 69.90,''),
('FIFA 21', 310, '2019/09/25', 1, 1, 'FIFA21-PS5.jpg', 79.90,''),
('FIFA 21', 190, '2019/09/25', 1, 2, 'FIFA21-XBoxX.jpg', 79.90,''),
('FIFA 20', 433, '2019/09/25', 1, 3, 'FIFA20-PS4.jpg', 59.90,''),
('FIFA 20', 340, '2019/09/25', 1, 4, 'FIFA20-XBoxOne.jpg', 59.90,''),
('FIFA 20', 120, '2019/09/25', 1, 5, 'FIFA20-Switch.jpg', 49.90,''),
('FIFA 20', 192, '2019/09/25', 1, 6, 'FIFA20-PC.jpg', 49.90,''),
('Days Gone', 80, '2019/04/26', 4, 3, 'DG.jpg', 69.90,''),
('The Legend of Zelda - Breath of the Wild', 624, '2017/03/03', 2, 5, 'TLoZBofW-Switch.jpg', 50.99, ''),
('Spiderman - Miles Morales', 310, '2020/11/12', 4, 1, 'SMMilesMorales-PS5.jpg', 79.90,''),
('Spiderman - Miles Morales', 401, '2020/11/12', 4, 3, 'SMMilesMorales-PS4.jpg', 69.90,''),
('Final Fantasy VII Remake', 511, '2020/03/02', 7, 3, 'FF7Remake-PS4.jpg', 64.90,''),
('Assassins Creed Valhalla', 220, '2020/11/10', 3, 1, 'ACValhalla-PS5.jpg', 69.90,''),
('Call of Duty - Advanced Warfare', 590, '2014/11/04', 5, 4, 'CoDAdvancedWarfare-XBoxOne.jpg', 24.99,''),
('Destiny', 112, '2019/04/26', 8, 4, 'Destiny-XBoxOne.jpg', 20.90,''),
('Destiny', 409, '2019/04/26', 8, 3, 'Destiny-PS4.jpg', 20.90,''),
('Titanfall 2', 80, '2016/10/28', 10, 4, 'Titanfall2-XBoxOne.jpg', 69.90,''),
('Uncharted 4', 273, '2016/05/10', 10, 3, 'Uncharted4-PS4.jpg', 69.90,''),
('Super Mario Odyssey', 259, '2017/10/07', 2, 5, 'SuperMarioOdyssey-Switch.jpg', 49.90,''),
('Demons Souls', 208, '2020/11/19', 4, 1, 'DemonsSouls-PS5.jpg', 20.90,''),
('Fuser', 208, '2020/11/10', 2, 5, 'Fuser-Switch.jpg', 59.90,''),
('Cyberpunk 2077', 580, '2020/12/10', 10, 1, 'Cyber-PS5.jpg', 79.90,''),
('Cyberpunk 2077', 580, '2020/12/10', 10, 2, 'Cyber-XBoxOne.jpg', 79.90,''),
('Hitman 3', 0, '2021/01/20', 10, 1, 'Hitman3.jpg', 79.90,''),
('Nier Replicant', 0, '2021/04/21', 7, 3, 'Nier-PS4.jpg', 69.90,'');

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

/* COPIES IN CART */

insert into copy_in_cart (userId, copyId) values (1, 1);

insert into copy_in_cart (userId, copyId) values (1, 2);

insert into copy_in_cart (userId, copyId) values (1, 3);

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
	12 Platform
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
(10, 10),
(11, 10),
(12, 10),
(13, 10),
(14, 10),
(15, 10),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 2),
(20, 4),
(21, 2),
(21, 4),
(22, 9),
(23, 1),
(23, 9),
(24, 1),
(24, 9),
(25, 9),
(26, 1),
(26, 2),
(26, 9),
(26, 12),
(27, 12),
(27, 1),
(28, 4),
(28, 1),
(28, 2),
(29, 7),
(30, 2),
(30, 4),
(31, 2),
(31, 4),
(32, 2),
(33, 4),
(33, 2);

/* SELLER ADDRESS */

insert into seller_address (sellerId, addressId) values (1, 5),
(2, 6);

/* COPY IN CATALOGUE */

insert into copy_in_catalogue (sellerId, copyId) values (1, 1),
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
