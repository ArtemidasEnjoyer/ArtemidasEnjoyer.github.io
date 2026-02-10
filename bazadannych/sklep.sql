-- utwórz baze danych dla sklep z polskimi znakami
-- utworz tabele produlkty z nastepujacymi polami
-- id - liczba calkowita - klucz glowny - autoincrement
-- nazwe - tekst 50
-- cene - lizba rzeczywista 2 znaki po przecinku
-- ilosc -||-  4 znaki po przecinku

CREATE DATABASE sklep CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci;
USE sklep;
CREATE TABLE produkty (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(50),
    cena DECIMAL(10, 2),
    ilosc DECIMAL(10, 4)
);