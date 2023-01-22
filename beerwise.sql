
create schema beerwise;

create table beers(
id int, 
title varchar(200), 
brewery varchar(200), 
style varchar(200), 
abv varchar(200), 
description text, 
img varchar(200), 
creation_date date, 
id_user int, 
rate double precision);

insert into beers (id, title, brewery, style, abv, description, img, creation_date, id_user, rate)
values  (70, 'Hazy Disco', 'pinta', 'ipa', '5.8%', 'Intensywne aromaty grejpfruta, mango, mandarynki i marakui. Kremowa faktura zapewniona przez użycie słodu pszenicznego i owsianego. Chmielowa lupulina Cryo Hops® z ostatniego zbioru nadaje piwu świeżości i soczystości.
Hop rate: 21g/l', 'beer-3136748_92c30_hd.jpeg', '2023-01-21', 11, 8.5),
        (69, 'Imperator Bałtycki', 'pinta', 'porter', '9.1%', 'Porter Bałtycki - ciemny, mocny lager to piwowarski skarb Polski. W klasycznej wersji - o ekstrakcie ok. 20°Plato - warzony jest z powodzeniem przez kilka polskich browarów. Jako PINTA doceniamy wartość Portera Bałtyckiego, ale po swojemu robimy krok naprzód. Przedstawiamy Imperatora Bałtyckiego - ciemnego giganta ze słodu i chmielu. PINTA Imperator Bałtycki - piwo od święta.', 'beer-535949_740f7_hd.jpeg', '2023-01-21', 11, 8.75),
        (68, 'Pierwsza pomoc', 'PINTA', 'pils', '4.1%', 'Polski Lekki Pils, 10.5°Blg

Pierwsza pomoc powszednia - co byś bez niej zrobił?! Do śniadania, do obiadu, do kolacji. Nie żałowaliśmy dobrego słodu, nie żałowaliśmy dobrego chmielu. PINTA Pierwsza Pomoc orzeźwia, syci, przywraca humor. Polecamy do użytku codziennego.', 'beer-817769_535ab_hd.jpeg', '2023-01-21', 11, 6.25),
        (67, 'Modern Drinking', 'PINTA', 'IPA', '6.5%', 'PINTA Modern Drinking 15* - tym razem dzielimy się z Wami wiedzą na temat West Coast IPA. Podczas wrześniowego chmielobrania w Yakima (USA), piwowarzy z Portland powtarzali w kółko jedną zasadę. Właśnie ją wdrożyliśmy - i warząc naszą wersję klasyka z Zachodniego Wybrzeża, ręka nam nie zadrżała. Do kotła wpakowaliśmy niemiłosierną ilość aromatycznego chmielu Mosaic™ - prawie w całości podczas ostatnich 15 minut gotowania. A co tam. Drugie tyle zużyliśmy na intensywne chmielenie na zimno.
PINTA Modern Drinking 15* - bądź na czasie!', 'beer-1326951_00f72_hd.jpeg', '2023-01-21', 11, 5.3333333333333),
        (66, 'Atak chmielu', 'PINTA', 'IPA', '6%', 'PINTA Atak Chmielu 15,1° to fantazyjnie nachmielone piwo w stylu American India Pale Ale. Pierwsza AIPA z polskiego browaru. Atak Chmielu warzymy od 28 marca 2011 r. Nasza AIPA to czerwono-miedziane, treściwe piwo górnej fermentacji. Smak i aromat cytrusowy, kwiatowy, żywiczny, sosnowy i owocowy pochodzi od amerykańskiego chmielu. Atak Chmielu - tak się rozpoczyna rewolucje!', 'beer-70951_70526_hd.jpeg', '2023-01-21', 11, 6.5),
        (77, 'Żubr', 'Kompania Piwowarska', 'lager', '6%', 'There he stands... majestic, firm, watchful and prudent. Żubr, the guardian of the wilderness, standing sentinel in the primeval forest where nature invariably takes its course. If need be, the Żubr leads the herd and protects it from danger, or takes shelter in the shade and lets things lie - especially when he feels he deserves some rest after a hard day’s work.', 'beer-8648_d33e0_hd.jpeg', '2023-01-21', 11, 2.75),
        (76, 'Tyskie', 'Browary Tyskie', 'lager', '5.2%', 'Tyskie is a pattern Gronie taste lager in the world. Perfectly composed flavor profile provides a strong bitterness and malt fully, while satisfying the desire.', 'beer-1409_d63d1_hd.jpeg', '2023-01-21', 11, 2.25),
        (75, 'Forest', 'NEPO', 'ipa', '5.5%', 'Jasne piwo w stylu IPA o zdecydowanej goryczce. Gałązki sosny, jodły i świerku nadały piwu leśnego klimatu a dodatek amerykańskich chmieli uzupełnił je o nuty cytrusowe.', 'beer-2017928_6af3f_hd.jpeg', '2023-01-21', 11, 6),
        (74, 'Pils', 'trzech kumpli', 'pils', '4.4%', 'Klasyczny, lekki Pils. Nic dodać, nic ująć.

A classic, light and crisp Pils, nothing more to add.', 'beer-1948875_d7740_hd.jpeg', '2023-01-21', 11, 5.25),
        (73, 'Ragnar', 'trzech kumpli', 'porter', '10.7%', 'Imperial Baltic Porter, 26°Blg.', 'beer-2255400_a8ad0_hd.jpeg', '2023-01-21', 11, 8.5),
        (72, 'Amok', 'trzech kumpli', 'IPA', '6.1%', 'Honestly Hopped IPA.', 'beer-3136738_421b5_hd.jpeg', '2023-01-21', 11, 6.75),
        (71, 'Pan IPAni', 'Trzech Kumpli', 'ipa', '6%', 'Eclectic beer that incorporates characteristics of lightness and freshness of wheat beers with strength and hopping techniques of IPA. Hops used: Perle, Citra, Mosaic, Amarillo', 'beer-1000186_31b49_hd.png', '2023-01-21', 11, 8.5);


create table breweries(
id int,
name varchar(200),
rate double precision,
id_beer int);

insert into breweries (id, name, rate, id_beer)
values  (19, 'Kompania Piwowarska', 2.75, 77),
        (18, 'Browary Tyskie', 2.25, 76),
        (17, 'NEPO', 6, 75),
        (16, 'Trzech Kumpli', 8.5, 71),
        (15, 'PINTA', 6.0277777777778, 66);


create table rates(
id int,
rate double precision,
id_user int,
id_beer int);

insert into rates (id, rate, id_user, id_beer)
values  (24, 2, 11, 76),
        (25, 3, 11, 77),
        (26, 5, 11, 75),
        (27, 6, 11, 74),
        (28, 8, 11, 73),
        (29, 7, 11, 72),
        (30, 9, 11, 71),
        (31, 9, 11, 70),
        (32, 8, 11, 69),
        (33, 6, 11, 68),
        (34, 6, 11, 67),
        (35, 2, 11, 66),
        (37, 2, 14, 77),
        (38, 1, 14, 76),
        (39, 6, 14, 75),
        (40, 3, 14, 74),
        (41, 7, 14, 73),
        (42, 5, 14, 72),
        (43, 7, 14, 71),
        (44, 6, 14, 70),
        (45, 7, 14, 69),
        (46, 4, 14, 68),
        (47, 3, 14, 67),
        (48, 6, 14, 66),
        (49, 4, 15, 77),
        (50, 3, 15, 76),
        (51, 5, 15, 74),
        (52, 10, 15, 73),
        (53, 7, 15, 72),
        (54, 9, 15, 71),
        (55, 10, 15, 70),
        (56, 8, 15, 68),
        (57, 9, 15, 66),
        (58, 10, 15, 69),
        (59, 2, 16, 77),
        (60, 3, 16, 76),
        (61, 7, 16, 75),
        (62, 7, 16, 74),
        (63, 9, 16, 73),
        (64, 8, 16, 72),
        (65, 9, 16, 71),
        (66, 9, 16, 70),
        (67, 10, 16, 69),
        (68, 7, 16, 68),
        (69, 7, 16, 67),
        (70, 9, 16, 66);


create table roles(
id_user int,
role int);

insert into roles (id_user, role)
values  (12, 0),
        (11, 1),
        (14, 0),
        (15, 0),
        (16, 0);



create table users(
id int,
name varchar(200),
surname varchar(200),
email varchar(200),
password varchar(200),
creation_date date);

insert into users (id, name, surname, email, password, creation_date)
values  (11, 'nik', 'zba', 'niko@int.pl', '$2y$10$iHCss88Msu4Vo/66De5P3.KvPHsiDB1LDszjrJN8lRWjnnlbZQ/dW', '2023-01-15'),
        (12, 'Nikodem', 'Zbaraza', 'nikozet@interia.pl', '$2y$10$n8NI1B5hv1NzyM3Piq3hm.SjfEgXGaS2QkpKCGJpMM93hYtQClG72', '2023-01-15'),
        (14, 'Jakub', 'Mann', 'jakubMann@gmail.com', '$2y$10$pglsVYrxOcKvtjXsCp3Axezxq.T5fHCv8aAgmwxs9Yu32eRFfh2KC', '2023-01-22'),
        (15, 'Zuzanna', 'Maj', 'zuzmaj@gmail.com', '$2y$10$zMZN1D5OIMGrZ4u6hDImAew668gGkSS0j5C7eD7dD9G6Mbn7YxAla', '2023-01-22'),
        (16, 'Konrad', 'Rak', 'konRak@gmail.com', '$2y$10$HvjN7Vd0WcckehmOdeafWOoCtxAHWM0g5kxuUqCncqoV9J/32KERy', '2023-01-22');