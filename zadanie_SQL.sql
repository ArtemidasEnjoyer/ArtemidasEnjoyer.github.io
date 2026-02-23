-- Zadanie 7.1
SELECT DISTINCT magazyn_koncowy
FROM kursy
JOIN Magazyny ON Magazyny.nazwa = Kursy.Magazyn_poczatkow
WHERE Magazyny Adres LIKE "%Torun%";

-- Zadanie 7.2
SELECT DISTINCT Pojazdy.Model
FROM Pojazdy
WHERE Ladownosc <= 3.5;

-- zadanie 7.3
SELECT Magazyn_poczatkowy,magazyn_koncowy,COUNT(Kursy.Lp),SUM(czas_przyjazdu - czas_wyjazdu),
FROM kursy
GROUP BY magazyn_poczatkowy,magagazyn_koncowy
ORDER BY COUNT(kursy.lp) DESC,magazyn_poczatkowy ASC;

-- I
SELECT nr_skladu.nazwa
FROM sklady
WHERE NOT EXCISTS (SELECT *
		   FROM przejazdy);

-- II
SELECT bilety.nr_biletu
FROM bilety
WHERE nr_przejazdu = 504
ORDER BY bilety.ilosc; 

-- III
SELECT COUNT(skady.lokomotywa)
FROM sklady
GROUP BY lokomotywa;

-- IV
SELECT nr_przejazdu,SUM(cena * ilosc - cena * ilosc * ulga)
FROM bilety
GROUP BY nr_przejazdu
SUM(cena * ilosc - cena * ilosc * ulga)
LIMIT 1;

-- V
SELECT stacja_pocz,SUM(bilety.ilosc)
FROM przejazdy
JOIN bilery ON przejazdy.nr_pzejazdy = bilety.nr_przejazdu 
GROUP BY stacja_pocz
ORDER BY SUM(bilety.ilosc)
LIMIT 1;

-- VI
SELECT nr_przejazdu,MAX(czas_przyj - czas_wyj),nr_przejazdu,MIN(czas_przyj - czas_wyj)
FROM przejazdy;

-- VII
SELECT nr_przejazdu
FROM przejazdy
JOIN bilety ON bilety.nr_przejazdu = przejazdy.nr_przejazdu
WHERE ilosc = 0 OR ilosc IS NULL;

--






		   
			
		    