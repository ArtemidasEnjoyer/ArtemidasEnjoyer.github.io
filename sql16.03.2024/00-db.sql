CREATE DATABASE IF NOT EXISTS dziennik_elektroniczny;

USE dziennik_elektroniczny;

-- Tabela uczniowie
CREATE TABLE IF NOT EXISTS uczniowie (
    id_ucznia INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50),
    nazwisko VARCHAR(50),
    data_urodzenia DATE
);

-- Wstawienie przykładowych danych do tabeli uczniowie
INSERT INTO uczniowie (imie, nazwisko, data_urodzenia) VALUES
    ('Jan', 'Kowalski', '2005-05-15'),
    ('Anna', 'Nowak', '2006-08-23'),
    ('Pola', 'Jaremi', '2007-03-10'),
    ('Tola', 'Lewandowski', '2005-12-30'),
    ('Adam', 'Wiśniewski', '2006-11-12'),
    ('Henryk', 'Wójcik', '2007-09-09'),
    ('Karol', 'Kamiński', '2005-06-10'),
    ('Grażyna', 'Kowalczyk', '2006-07-17'),
    ('Lidia', 'Zieliński', '2007-01-18'),
    ('Sylwester', 'Szymański', '2005-07-23'),
    ('Julian', 'Kilertyk', '2006-02-24'),
    ('Julia', 'Jankowski', '2007-08-28'),
    ('Karolina', 'Woźniak', '2005-09-23'),
    ('Jakub', 'Wojciechowski', '2006-04-04'),
    ('Kuba', 'Kwiatkowski', '2007-01-02'),
    ('Dariusz', 'Mazur', '2005-05-08'),
    ('Maurycy', 'Wiśniewski', '2006-09-04'),
    ('Robert', 'Król', '2007-06-04'),
    ('Marcin', 'Piotrowski', '2008-05-02'),
    ('Alicja', 'Wójcik', '2004-03-09'),
    ('Klaudia', 'Grabowski', '2008-02-10');

-- Tabela klasy
CREATE TABLE IF NOT EXISTS klasy (
    id_klasy INT AUTO_INCREMENT PRIMARY KEY,
    nazwa_klasy VARCHAR(50),
    nazwa_klasy_skrocona VARCHAR(5)
);

-- Wstawianie przykładowych danych do tabeli klasy
INSERT INTO klasy (nazwa_klasy, nazwa_klasy_skrocona) VALUES
    ('1a matematyczno-przyrodnicza', '1a'),
    ('1b chemiczno-biologiczna', '1b'),
    ('1c huministyczno-prawna', '1c');

-- Tabela przedmiotów
CREATE TABLE IF NOT EXISTS przedmioty (
    id_przedmiotu INT AUTO_INCREMENT PRIMARY KEY,
    nazwa_przedmiotu VARCHAR(100),
    nazwa_skrocona VARCHAR(5)
);

-- Wstawienie przykładowych danych do tabeli przedmioty
INSERT INTO przedmioty (nazwa_przedmiotu, nazwa_skrocona) VALUES
    ('Matematyka', 'mat'),
    ('Język Polski', 'pol'),
    ('Historia','his'),
    ('Informatyka','inf'),
    ('Geografia','geo');

-- Tabela oceny
CREATE TABLE IF NOT EXISTS oceny (
    id_oceny INT AUTO_INCREMENT PRIMARY KEY,
    id_ucznia INT,
    id_przedmiotu INT,
    ocena DECIMAL(4,2),
    FOREIGN KEY (id_ucznia) REFERENCES uczniowie(id_ucznia),
    FOREIGN KEY (id_przedmiotu) REFERENCES przedmioty(id_przedmiotu)
);

-- Wstawienie przykładowych danych do tabeli oceny
INSERT INTO oceny (id_ucznia, id_przedmiotu, ocena) VALUES
    (1, 1, 4.5),
    (1, 2, 3.0),
    (1, 3, 5.0),
    (1, 4, 4.0),
    (1, 5, 4.5),
    (1, 1, 3.5),
    (1, 2, 3.5),
    (1, 3, 4.0),
    (2, 4, 4.0),
    (2, 5, 4.5),
    (2, 1, 3.0),
    (2, 2, 5.0),
    (2, 3, 4.0),
    (2, 4, 4.5),
    (2, 5, 3.5),
    (3, 1, 3.5),
    (3, 2, 4.0),
    (3, 3, 4.0),
    (3, 4, 4.5),
    (3, 5, 3.0),
    (3, 1, 5.0),
    (3, 2, 4.0),
    (3, 3, 4.5),
    (3, 4, 3.5),
    (3, 5, 3.5),
    (3, 1, 4.0),
    (4, 2, 4.0),
    (4, 3, 4.5),
    (4, 4, 3.0),
    (4, 5, 5.0),
    (5, 1, 4.0),
    (5, 2, 4.5),
    (5, 3, 3.5),
    (5, 4, 3.5),
    (6, 5, 4.0),
    (6, 1, 4.0),
    (6, 2, 4.5),
    (6, 3, 3.0),
    (6, 4, 5.0),
    (6, 5, 4.0),
    (6, 1, 4.5),
    (6, 2, 3.5),
    (6, 3, 3.5),
    (6, 4, 4.0),
    (6, 5, 4.0),
    (7, 1, 4.5),
    (7, 2, 3.0),
    (7, 3, 5.0),
    (7, 4, 4.0),
    (7, 5, 4.5),
    (7, 1, 3.5),
    (7, 2, 3.5),
    (7, 3, 4.0),
    (8, 4, 4.0),
    (8, 5, 4.5),
    (8, 1, 3.0),
    (8, 2, 5.0),
    (8, 3, 4.0),
    (8, 4, 4.5),
    (8, 5, 3.5),
    (8, 1, 2.5),
    (8, 2, 3.0),
    (9, 3, 4.0),
    (9, 4, 2.5),
    (9, 5, 1.0),
    (9, 3, 5.0),
    (9, 1, 4.0),
    (9, 2, 3.5),
    (9, 4, 2.5),
    (10, 5, 3.5),
    (10, 1, 2.0),
    (10, 2, 4.0);

-- Tabela nauczycieli
CREATE TABLE IF NOT EXISTS nauczyciele (
    id_nauczyciela INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50),
    nazwisko VARCHAR(50)
);

-- Wstawienie przykładowych danych do tabeli nauczyciele
INSERT INTO nauczyciele (imie, nazwisko) VALUES
    ('Adam', 'Nowak'),
    ('Maria', 'Kowalska'),
    ('Anna', 'Mróz'),
    ('Waleria', 'Polna'),
    ('Paweł', 'Wiśniewski');

-- Relacja między ocenami a nauczycielami
CREATE TABLE IF NOT EXISTS oceny_nauczyciele (
    id_oceny INT,
    id_nauczyciela INT,
    FOREIGN KEY (id_oceny) REFERENCES oceny(id_oceny),
    FOREIGN KEY (id_nauczyciela) REFERENCES nauczyciele(id_nauczyciela)
);

-- Wstawienie przykładowych danych do tabeli Relacja_między_ocenami_a_nauczycielami
INSERT INTO oceny_nauczyciele (id_oceny, id_nauczyciela) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 1),
    (5, 2),
    (6, 3),
    (7, 1),
    (8, 2),
    (9, 2),
    (10, 3),
    (11, 1),
    (12, 2),
    (13, 3),
    (14, 1),
    (15, 2),
    (16, 3),
    (17, 1),
    (18, 2),
    (19, 3),
    (20, 1),
    (21, 2),
    (22, 3),
    (23, 1),
    (24, 2),
    (25, 3),
    (26, 1),
    (27, 2),
    (28, 3),
    (29, 1),
    (30, 2),
    (31, 3),
    (32, 1),
    (33, 2),
    (34, 3),
    (35, 1),
    (36, 2),
    (37, 3),
    (38, 1),
    (39, 2),
    (40, 3),
    (41, 1),
    (42, 2),
    (43, 3),
    (44, 1),
    (45, 2),
    (46, 3),
    (47, 1),
    (48, 2),
    (49, 3),
    (50, 1),
    (51, 2),
    (52, 3),
    (53, 1),
    (54, 2),
    (55, 3),
    (56, 4),
    (57, 5),
    (58, 4),
    (59, 5),
    (60, 4),
    (61, 5),
    (62, 4),
    (63, 5),
    (64, 4),
    (65, 5),
    (66, 4),
    (67, 5),
    (68, 3),
    (69, 4),
    (70, 5),
    (71, 4),
    (72, 5),
    (73, 4),
    (74, 5),
    (75, 4),
    (76, 5);


-- Relacja między uczniami a klasami
CREATE TABLE IF NOT EXISTS uczniowie_klasy (
    id_ucznia INT,
    id_klasy INT,
    FOREIGN KEY (id_klasy) REFERENCES klasy(id_klasy),
    FOREIGN KEY (id_ucznia) REFERENCES uczniowie(id_ucznia)
);

-- Wstawienie przykładowych danych do tabeli Relacja_między_ocenami_a_nauczycielami
INSERT INTO uczniowie_klasy (id_ucznia, id_klasy) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 1),
    (5, 2),
    (6, 3),
    (7, 1),
    (8, 2),
    (9, 3),
    (10, 1),
    (11, 2),
    (12, 3),
    (13, 1),
    (14, 2),
    (15, 3),
    (16, 1),
    (17, 2),
    (18, 3),
    (19, 1),
    (20, 2),
    (21, 3);
