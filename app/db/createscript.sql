-- Step: 01
-- ************************************************************
-- Doel : Maak een nieuwe database aan met de naam MVC_Basics_2509AB
-- ************************************************************
-- Versie    Datum       Auteur            Omschrijving
-- ******    ******      ******            ************
-- 01        10-02-2026  JoeyU	           Smartphones
-- ************************************************************

-- Verwijder database MVC_Basics_2509AB
DROP DATABASE IF EXISTS `MVC_Basics_2509AB`;

-- Maak een nieuwe database aan MVC_Basics_2509AB
CREATE DATABASE `MVC_Basics_2509AB`;

-- Gebruik database MVC_Basics_2509AB
USE `MVC_Basics_2509AB`;

-- Step: 02
-- ************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Smartphones
-- ************************************************************
-- Versie    Datum       Auteur            Omschrijving
-- ******    ******      ******            ************
-- 01        10-02-2026  JoeyU	          Tabel Smartphones
-- ************************************************************
-- Onderstaande velden toevoegen aan de tabel Smartphones
-- Merk, Model, Prijs, Geheugen, Besturingssysteem,
-- Schermgrootte, Releasedatum, MegaPixels
-- ************************************************************

CREATE TABLE Smartphones
(
    Id                  SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    Merk                VARCHAR(50)       NOT NULL,
    Model               VARCHAR(50)       NOT NULL,
    Prijs               DECIMAL(6,2)      NOT NULL,
    Geheugen            DECIMAL(4,0)      NOT NULL,
    Besturingssysteem   VARCHAR(25)       NOT NULL,
    Schermgrootte       DECIMAL(3,2)      NOT NULL,
    Releasedatum        DATE              NOT NULL,
    MegaPixels          DECIMAL(3,0)      NOT NULL,
    IsActief            BIT               NOT NULL DEFAULT 1,
    Opmerking           VARCHAR(255)      NULL DEFAULT NULL,
    DatumAangemaakt     DATETIME(6)       NOT NULL DEFAULT NOW(6),
    DatumGewijzigd      DATETIME(6)       NOT NULL DEFAULT NOW(6),
    CONSTRAINT PK_Smartphones_Id PRIMARY KEY (Id)
)ENGINE=InnoDB;

-- Step: 03
-- ************************************************************
-- Doel : Vul de tabel Smartphones met gegevens
-- ************************************************************
-- Versie    Datum       Auteur            Omschrijving
-- ******    ******      ******            ************
-- 01        10-02-2026  JoeyU           Vulling Smartphones
-- ************************************************************

INSERT INTO Smartphones
(
    Merk,
    Model,
    Prijs,
    Geheugen,
    Besturingssysteem,
    Schermgrootte,
    Releasedatum,
    MegaPixels
)
VALUES
('Apple',   'iPhone 16 Pro',      1256.56,  64,  'iOS 18',     6.7, '2025-01-19',  50),
('Samsung', 'Galaxy S25 Ultra',   1539,    128,  'Android 15', 6.1, '2025-02-01', 200),
('Google',  'Pixel 9 Pro',         890,    1024, 'Android 15', 6.3, '2024-12-20', 100),
-- Voeg nog minimaal 5 extra smartphones toe
('OnePlus', 'OnePlus 12',          799,    256,   'Android 15',  6.5, '2025-03-10', 48),
('Xiaomi',  'Mi 14 Ultra',         699,    512,   'Android 15',  6.6, '2025-02-25', 200),
('Sony',    'Xperia 2 V',          849,    256,   'Android 15',  6.1, '2024-11-15', 48),
('Huawei',  'P70 Pro',             749,    256,   'HarmonyOS 4', 6.7, '2025-01-05', 200),
('Motorola','Edge 60 Pro',         599,    128,   'Android 15',  6.5, '2025-03-01', 108);

-- Step: 04
-- ********************************************************************************************
-- Doel: Maak een nieuwe tabel aan met de naam Sneakers
-- ********************************************************************************************
-- Versie   Datum       Auteur           Omschrijving
-- ****     ****        ******           *************
-- 01       10-02-2026  JoeyU        Tabel Sneakers
-- ********************************************************************************************
-- Onderstaande velden toevoegen aan de tabel Sneakers
-- Type (Hardloop, Basketbal, Casual), Prijs, Materiaal (Leer, Mesh, Synthetisch), Gewicht, Releasedatum
-- ********************************************************************************************

CREATE TABLE Sneakers
(
    Id              SMALLINT        UNSIGNED        NOT NULL    AUTO_INCREMENT,
    Merk            VARCHAR(50)                     NOT NULL,
    Model           VARCHAR(50)                     NOT NULL,
    Type            VARCHAR(25)                     NOT NULL,
    Prijs           DECIMAL(6,2)                    NOT NULL,
    Materiaal       VARCHAR(25)                     NOT NULL,
    Releasedatum    VARCHAR(15)                     NOT NULL,
    Gewicht         VARCHAR(25)                     NOT NULL,
    IsActief        BIT                             NOT NULL    DEFAULT 1,
    Opmerking       VARCHAR(255)                    NULL        DEFAULT NULL,
    DatumAangemaakt DATETIME(6)                     NOT NULL    DEFAULT NOW(6),
    DatumGewijzigd  DATETIME(6)                     NOT NULL    DEFAULT NOW(6),
    CONSTRAINT PK_Smartphones_Id PRIMARY KEY (Id)
)
ENGINE=InnoDB;


-- Step: 05
-- ********************************************************************************************
-- Doel: Vul de tabel Sneakers met gegevens
-- ********************************************************************************************
-- Versie   Datum       Auteur           Omschrijving
-- ****     ****        ******           *************
-- 01       10-02-2026  JoeyU        Vulling Sneakers
-- ********************************************************************************************

INSERT INTO Sneakers
(
    Merk,
    Model,
    Type,
    Prijs,
    Materiaal,
    Gewicht,
    Releasedatum
)
VALUES
('Nike', 'Air Jordan 1', 'Hardloop', 179.99, 'Leer', 420, '2024-01-15'),
('Adidas', 'Yeezy Boost 350', 'Basketbal', 220.00, 'Mesh', 380, '2023-11-10'),
('New Balance', 'Pixel 9 Pro', 'Casual', 129.95, 'Synthetisch', 410, '2024-03-05'),
('Trico', 'New Age', 'Casual', 89.99, 'Mesh', 395, '2022-09-20'),
('Overlord', 'Tristar 6', 'Hardloop', 159.50, 'Leer', 430, '2023-06-18'),

-- voeg minimaal 3 extra records toe
('Puma', 'RS-X', 'Casual', 119.99, 'Synthetisch', 400, '2023-04-12'),
('Nike', 'Air Max 90', 'Hardloop', 149.99, 'Leer', 415, '2022-08-01'),
('Adidas', 'Ultraboost 22', 'Hardloop', 189.99, 'Mesh', 390, '2024-02-22');

SELECT * FROM mvc_basics_2509ab.smartphones;
SELECT * FROM mvc_basics_2509ab.sneakers;

-- Step: 06
-- ********************************************************************************************
-- Doel: Maak een nieuwe tabel aan met de naam Horloges
-- ********************************************************************************************
-- Versie   Datum       Auteur           Omschrijving
-- ****     ****        ******           *************
-- 01       07-03-2026  JoeyU            Tabel Horloges
-- ********************************************************************************************
-- Onderstaande velden toevoegen aan de tabel Horloges
-- Merk, Model, Prijs, Materiaal, Diameter, Beweging, Releasedatum
-- ********************************************************************************************

CREATE TABLE Horloges
(
    Id              SMALLINT        UNSIGNED        NOT NULL    AUTO_INCREMENT,
    Merk            VARCHAR(50)                     NOT NULL,
    Model           VARCHAR(50)                     NOT NULL,
    Prijs           DECIMAL(12,2)                   NOT NULL,
    Materiaal       VARCHAR(50)                     NOT NULL,
    Diameter        SMALLINT        UNSIGNED        NOT NULL,
    Beweging        VARCHAR(50)                     NOT NULL,
    Releasedatum    DATE                            NOT NULL,
    IsActief        BIT                             NOT NULL    DEFAULT 1,
    Opmerking       VARCHAR(255)                    NULL        DEFAULT NULL,
    DatumAangemaakt DATETIME(6)                     NOT NULL    DEFAULT NOW(6),
    DatumGewijzigd  DATETIME(6)                     NOT NULL    DEFAULT NOW(6),
    CONSTRAINT PK_Horloges_Id PRIMARY KEY (Id)
)
ENGINE=InnoDB;


-- Step: 07
-- ********************************************************************************************
-- Doel: Vul de tabel Horloges met gegevens
-- ********************************************************************************************
-- Versie   Datum       Auteur           Omschrijving
-- ****     ****        ******           *************
-- 01       07-03-2026  JoeyU            Vulling Horloges
-- ********************************************************************************************

INSERT INTO Horloges
(
    Merk,
    Model,
    Prijs,
    Materiaal,
    Diameter,
    Beweging,
    Releasedatum
)
VALUES
('Rolex',           'Daytona',          35000.00,   'Staal',    40, 'Automatisch',  '2023-01-15'),
('Patek Philippe',  'Nautilus',         95000.00,   'Witgoud',  40, 'Mechanisch',   '2022-06-01'),
('Audemars Piguet', 'Royal Oak',        75000.00,   'Rosegoud', 41, 'Automatisch',  '2021-04-10'),
('Richard Mille',   'RM 011',          180000.00,   'Titanium', 50, 'Automatisch',  '2020-09-20'),
('Omega',           'Speedmaster',       6500.00,   'Staal',    42, 'Mechanisch',   '2022-11-03'),
('TAG Heuer',       'Carrera',           4200.00,   'Staal',    39, 'Automatisch',  '2023-03-22'),
('IWC',             'Portugieser',      12000.00,   'Staal',    42, 'Automatisch',  '2021-07-14'),
('Breitling',       'Navitimer',         7800.00,   'Staal',    46, 'Automatisch',  '2022-02-28');

SELECT * FROM mvc_basics_2509ab.horloges;

-- Step: 08
-- ********************************************************************************************
-- Doel: Maak een nieuwe tabel aan met de naam Zangeressen
-- ********************************************************************************************
-- Versie   Datum       Auteur           Omschrijving
-- ****     ****        ******           *************
-- 01       07-03-2026  JoeyU            Tabel Zangeressen
-- ********************************************************************************************
-- Onderstaande velden toevoegen aan de tabel Zangeressen
-- Naam, Nationaliteit, Nettowaarde, Geboortedatum, BekendsteHit
-- ********************************************************************************************

CREATE TABLE Zangeressen
(
    Id              SMALLINT        UNSIGNED        NOT NULL    AUTO_INCREMENT,
    Naam            VARCHAR(100)                    NOT NULL,
    Nationaliteit   VARCHAR(50)                     NOT NULL,
    Nettowaarde     DECIMAL(15,2)                   NOT NULL,
    Geboortedatum   DATE                            NOT NULL,
    BekendsteHit    VARCHAR(100)                    NOT NULL,
    IsActief        BIT                             NOT NULL    DEFAULT 1,
    Opmerking       VARCHAR(255)                    NULL        DEFAULT NULL,
    DatumAangemaakt DATETIME(6)                     NOT NULL    DEFAULT NOW(6),
    DatumGewijzigd  DATETIME(6)                     NOT NULL    DEFAULT NOW(6),
    CONSTRAINT PK_Zangeressen_Id PRIMARY KEY (Id)
)
ENGINE=InnoDB;


-- Step: 09
-- ********************************************************************************************
-- Doel: Vul de tabel Zangeressen met gegevens
-- ********************************************************************************************
-- Versie   Datum       Auteur           Omschrijving
-- ****     ****        ******           *************
-- 01       07-03-2026  JoeyU            Vulling Zangeressen
-- ********************************************************************************************

INSERT INTO Zangeressen
(
    Naam,
    Nationaliteit,
    Nettowaarde,
    Geboortedatum,
    BekendsteHit
)
VALUES
('Rihanna',         'Barbadaans',   1400.00,    '1988-02-20',   'Umbrella'),
('Taylor Swift',    'Amerikaans',   1100.00,    '1989-12-13',   'Shake It Off'),
('Madonna',         'Amerikaans',    850.00,    '1958-08-16',   'Like a Virgin'),
('Celine Dion',     'Canadees',      800.00,    '1968-03-30',   'My Heart Will Go On'),
('Beyoncé',         'Amerikaans',    540.00,    '1981-09-04',   'Crazy in Love'),
('Shakira',         'Colombiaans',   300.00,    '1977-02-02',   'Hips Don\'t Lie'),
('Lady Gaga',       'Amerikaans',    320.00,    '1986-03-28',   'Bad Romance'),
('Adele',           'Brits',         220.00,    '1988-05-05',   'Hello');

SELECT * FROM mvc_basics_2509ab.zangeressen;