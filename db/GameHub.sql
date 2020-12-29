-- Database Section
-- ________________ 

create database gamehub;
use gamehub;


-- Tables Section
-- _____________ 

create table customer (
     userId int not null AUTO_INCREMENT,
     name varchar(128) not null,
     surname varchar(128) not null,
     birthDate date not null,
     email varchar(128) not null,
     password varchar(128) not null,
     constraint IDcustomer_id primary key (userId));

create table wishlist_article (
     wishlistId int not null,
     gameId int not null,
     constraint IDwishlist_article primary key (wishlistId, gameId));

create table cart (
     cartId int not null AUTO_INCREMENT,
     userId int not null,
     constraint IDCARRELLO_ID primary key (cartId),
     constraint FKR_ID unique (userId));

create table credit_card (
     ccnumber char(20) not null,
     expiration date not null,
     cvv char(3) not null,
     userId int not null,
     constraint IDcredit_card primary key (ccnumber));

create table developer (
     developerId int not null AUTO_INCREMENT,
     name varchar(128) not null,
     constraint IDdeveloper_id primary key (developerId));

create table catalogue (
     catalogueId int not null AUTO_INCREMENT,
     sellerId int not null,
     constraint IDCATALOGO primary key (catalogueId),
     constraint FKR_1_ID unique (sellerId));

create table category (
     categoryId int not null AUTO_INCREMENT,
     categoryName varchar(128) not null,
     constraint IDcategory primary key (categoryId));

create table game_copy (
     gameId int not null,
     copyId int not null AUTO_INCREMENT,
     price float(6) not null,
     constraint IDgame_copy_id primary key (copyId));

create table copy_in_catalogue (
     copyId int not null,
     catalogueId int not null,
     constraint FKcop_COP_ID primary key (copyId));

create table review (
     reviewId int not null AUTO_INCREMENT,
     title varchar(128) not null,
     description varchar(128) not null,
     rating int not null,
     gameId int not null,
     customerId int not null,
     constraint IDreview primary key (reviewId));

create table copy_in_cart (
     copyId int not null,
     cartId int not null,
     constraint IDcopy_in_cart primary key (copyId, cartId));

create table game_category (
     gameId int not null,
     categoryId int not null,
     constraint IDgame_category primary key (categoryId, gameId));

create table address (
     addressId int not null AUTO_INCREMENT,
     country varchar(128) not null,
     city varchar(128) not null,
     street varchar(128) not null,
     postCode varchar(10) not null,
     constraint IDaddress_id primary key (addressId));

create table shipping (
     addressId int not null,
     userId int not null,
     constraint IDshipping primary key (addressId, userId));

create table seller_address (
     sellerId int not null,
     addressId int not null,
     constraint IDseller_address primary key (addressId, sellerId));

create table _order (
     orderId int not null AUTO_INCREMENT,
     orderDate date not null,
     total int not null,
     userId int not null,
     constraint IDorder_id primary key (orderId));

create table copy_in_order (
     copyId int not null,
     orderId int not null,
     constraint FKord_COP_ID primary key (copyId));

create table platform (
     platformId int not null AUTO_INCREMENT,
     name varchar(128) not null,
     constraint IDplatform primary key (platformId));

create table seller (
     sellerId int not null AUTO_INCREMENT,
     name varchar(128) not null,
     email varchar(128) not null,
     password varchar(128) not null,
     p_iva char(11) not null,
     phone char(10) not null,
     constraint IDseller_id primary key (sellerId));

create table order_seller (
     sellerId int not null,
     orderId int not null,
     constraint IDorder_seller primary key (sellerId, orderId));

create table videogame (
     gameId int not null AUTO_INCREMENT,
     title varchar(128) not null,
     soldCopies int not null,
     releaseDate date not null,
     developerId int not null,
     platformId int not null,
     image varchar(128) not null,
     constraint IDvideogame_id primary key (gameId));

create table wishlist (
     wishlistId int not null AUTO_INCREMENT,
     userId int not null,
     constraint IDWISHLIST primary key (wishlistId),
     constraint FKdesideres_id unique (userId));


-- Constraints Section
-- ___________________ 

alter table wishlist_article add constraint FKcon_VID
     foreign key (gameId)
     references videogame (gameId);

alter table wishlist_article add constraint FKcon_WIS
     foreign key (wishlistId)
     references wishlist (wishlistId);

alter table cart add constraint FKR_FK
     foreign key (userId)
     references customer (userId);

alter table credit_card add constraint FKhas_card
     foreign key (userId)
     references customer (userId);

alter table catalogue add constraint FKR_1_FK
     foreign key (sellerId)
     references seller (sellerId);

alter table game_copy add constraint FKcopy
     foreign key (gameId)
     references videogame (gameId);

alter table copy_in_catalogue add constraint FKcop_COP_FK
     foreign key (copyId)
     references game_copy (copyId);

alter table copy_in_catalogue add constraint FKR
     foreign key (catalogueId)
     references catalogue (catalogueId);

alter table review add constraint FKhas_review
     foreign key (gameId)
     references videogame (gameId);

alter table review add constraint FKpost
     foreign key (customerId)
     references customer (userId);

alter table copy_in_cart add constraint FKR_CAR
     foreign key (cartId)
     references cart (cartId);

alter table copy_in_cart add constraint FKR_COP
     foreign key (copyId)
     references game_copy (copyId);

alter table game_category add constraint FKgio_CAT
     foreign key (categoryId)
     references category (categoryId);

alter table game_category add constraint FKgio_VID
     foreign key (gameId)
     references videogame (gameId);

alter table shipping add constraint FKind_ACQ
     foreign key (userId)
     references customer (userId);

alter table shipping add constraint FKind_IND
     foreign key (addressId)
     references address (addressId);

alter table seller_address add constraint FKind_IND_S
     foreign key (addressId)
     references address (addressId);

alter table seller_address add constraint FKind_VEN_S
     foreign key (sellerId)
     references seller (sellerId);

alter table _order add constraint FK_order
     foreign key (userId)
     references customer (userId);

alter table copy_in_order add constraint FK_ord_ORD
     foreign key (orderId)
     references _order (orderId);

alter table copy_in_order add constraint FKord_COP_FK
     foreign key (copyId)
     references game_copy (copyId);

alter table order_seller add constraint FKven_ORD
     foreign key (orderId)
     references _order (orderId);

alter table order_seller add constraint FKven_VEN
     foreign key (sellerId)
     references seller (sellerId);

alter table videogame add constraint FKR_vid
     foreign key (developerId)
     references developer (developerId);

alter table videogame add constraint FKis_in_platform
     foreign key (platformId)
     references platform (platformId);

alter table wishlist add constraint FKdesires_FK
     foreign key (userId)
     references customer (userId);