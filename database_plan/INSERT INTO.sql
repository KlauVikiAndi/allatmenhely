INSERT INTO types (type) VALUES
('macska'),
('kutya')
;

INSERT INTO sizes (size) VALUES
('kicsi'),
('közepes'),
('nagy')
;


INSERT INTO genders (gender) VALUES
('hím'),
('nőstény')
;

INSERT INTO adopters (name, phone_number , e_mail , city) VALUES
('Kovács Péter', '+36 30 123 4567', 'kovacs.peter@example.com', 'Budapest'),
('Szabó Anna', '+36 20 234 5678', 'szabo.anna@example.com', 'Debrecen'),
('Tóth Gábor', '+36 70 345 6789', 'toth.gabor@example.com', 'Szeged'),
('Nagy Éva', '+36 30 456 7890', 'nagy.eva@example.com', 'Pécs'),
('Horváth László', '+36 20 567 8901', 'horvath.laszlo@example.com', 'Győr'),
('Varga Katalin', '+36 70 678 9012', 'varga.katalin@example.com', 'Miskolc'),
('Kiss Tamás', '+36 30 789 0123', 'kiss.tamas@example.com', 'Nyíregyháza'),
('Molnár Zsuzsanna', '+36 20 890 1234', 'molnar.zsuzsanna@example.com', 'Kecskemét'),
('Németh István', '+36 70 901 2345', 'nemeth.istvan@example.com', 'Székesfehérvár'),
('Farkas Mária', '+36 30 012 3456', 'farkas.maria@example.com', 'Szombathely'),
('Balogh János', '+36 20 123 4567', 'balogh.janos@example.com', 'Eger'),
('Papp Júlia', '+36 70 234 5678', 'papp.julia@example.com', 'Tatabánya'),
('Lakatos András', '+36 30 345 6789', 'lakatos.andras@example.com', 'Kaposvár'),
('Mészáros Edit', '+36 20 456 7890', 'meszaros.edit@example.com', 'Sopron'),
('Simon Attila', '+36 70 567 8901', 'simon.attila@example.com', 'Zalaegerszeg');

INSERT INTO animals (name, type_id, date_of_birth, date_of_admission, description, size_id, gender_id, adopted, image) VALUES

('Félix', 2, '2022-03-01', '2025-02-14', 'Félix egy kíváncsi és aktív macska, aki mindig felfedezi a ház minden szegletét. Imádja a magas helyeket, és szívesen mászik fel minden egyes bútorra. Játékos, de amikor pihenésre van szüksége, mindig az ablakpárkányon napozik.', 1, 1, 0, 'https://purr.objects-us-east-1.dream.io/i/17202963_1446865762031424_2924148055111697325_n.jpg'),
('Potika', 2, '2022-07-05', '2025-02-12', 'Potika egy igazi híresség a házban, mindenki figyelmét magára vonja szelídségével és bájával. Szereti a csendet, de imádja a simogatást, és különösen akkor boldog, ha egy kicsit a gazdája ölében pihenhet. Nagy kedvenc mindenki számára.', 1, 2, 0, 'https://purr.objects-us-east-1.dream.io/i/image4.jpg'),
('Cirmi', 2, '2023-01-15', '2025-02-13', 'Cirmi egy fiatal, energikus macska, aki mindig kész a játékra. Imádja az interaktív játékokat, és órákon át képes hancúrozni a labdával vagy egy zsinórral. Társaságkedvelő és kíváncsi, mindig mindenhová követi gazdáit.', 1, 1, 0, 'https://purr.objects-us-east-1.dream.io/i/TOB5A.png'),
('Kormi', 2, '2020-05-23', '2025-02-11', 'Kormi egy nyugodt és kedves macska, aki imádja a családját. Ő az, aki mindig az öledbe bújik egy hosszú nap után, hogy pihenhessen. Bár a kalandok nem vonzzák, a gazdáival való pihenés minden igényét kielégíti.', 1, 2, 0, 'https://purr.objects-us-east-1.dream.io/i/OADxt.jpg'),
('Mazsola', 2, '2024-11-28', '2025-02-14', 'Mazsola egy energikus és kíváncsi macska, aki mindig figyeli, hogy mi történik körülötte. Imádja a gyors mozdulatokat, és mindig készen áll a felfedezésre. Bár egy kicsit szégyenlős, ha egyszer hozzászokik valakihez, igazán ragaszkodó lesz.', 1, 2, 0, 'https://purr.objects-us-east-1.dream.io/i/wKKER.jpg'),
('Daisy', 2, '2024-12-10', '2025-02-11', 'Daisy egy szelíd és türelmes macska, aki szereti a csendes pillanatokat. Különösen akkor boldog, ha egy napsütötte ablakpárkányon pihenhet. Imádja, ha simogatják, és mindig keres egy puha helyet a pihenéshez.', 1, 2, 0, 'https://purr.objects-us-east-1.dream.io/i/20160824_163805-1.jpg'),
('Tigris', 2, '2023-06-02', '2025-02-15', 'Tigris egy kicsi, de rendkívül játékos macska. Mindig tele van energiával, és imádja a gyors mozgást. Ő a ház kis kalandora, aki nem rest mindig új dolgokat felfedezni, legyen szó új búvóhelyekről vagy rejtett játékok kereséséről.', 1, 1, 0, 'https://purr.objects-us-east-1.dream.io/i/vfqoY.jpg'),
('Mici', 2, '2021-04-17', '2025-02-13', 'Mici egy szelíd és szeretetteljes macska, aki szívesen tölti az időt gazdái társaságában. Bár szeret játszani, a kedvenc időtöltése a pihenés és a simogatás. Az őszinte ragaszkodása és kedvessége mindenkit elvarázsol.', 1, 2, 0, 'https://purr.objects-us-east-1.dream.io/i/20171010_211506.jpg'),
('Zokni', 2, '2022-09-29', '2025-02-12', 'Zokni egy kis vidám macska, aki mindig tele van energiával. Imád a szőnyegeken szaladgálni, és sokszor meglepi gazdáit új trükkökkel. Különösen szeret a konyhában lenni, ahol mindenféle titokzatos illatok várják.', 1, 1, 0, 'https://purr.objects-us-east-1.dream.io/i/photo_2017-05-13_14-24-03.jpg'),
('Maszat', 2, '2023-03-04', '2025-02-14', 'Maszat egy igazán különleges macska, aki szeret felfedezni és mindig meglepi gazdáit új viselkedésével. Kedvenc időtöltése a napozás, de nem mond nemet egy kis játékra sem. A csendes, szeretetteljes társ, aki sosem hagyja el a házat, ha valaki szükség van rá.', 1, 1, 0, 'https://purr.objects-us-east-1.dream.io/i/20170610_124748.jpg'),
('Rex', 1, '2020-02-14', '2025-02-11', 'Rex egy rendkívül energikus és játékos kutya, aki mindig készen áll a kalandokra. Imádja a hosszú sétákat a parkban, ahol felfedezhet minden zugot. Bár sokat pörög, egy pillanatra sem felejti el a családját, és hűségesen követi őket mindenhol.', 2, 1, 0, 'https://random.dog/f0cc7b68-a3bf-4010-8560-0ecfd2b58492.jpg'),
('Pötyi', 1, '2021-06-25', '2025-02-12', 'Pötyi egy bájos kutya, aki az egész házat bejárja, hogy mindenhol ott legyen, ahol a családtagok vannak. Imádja a simogatást, de nem zárkózik el a szórakoztató pillanatoktól sem, amikor labdát hoz vissza. Mindenkivel kedves és mindig barátságos.', 3, 1, 0, 'https://random.dog/af70ad75-24af-4518-bf03-fec4a997004c.jpg'),
('Lily', 1, '2022-08-10', '2025-02-14', 'Lily egy kíváncsi és játékos kutya, aki mindig ott van, ahol történik valami izgalmas. Szeret a fűben futkározni és a szabadban lenni. Szelíd és szeretetteljes kutya, aki minden új emberrel szívesen ismerkedik.', 1, 2, 0, 'https://random.dog/d7dd199b-8672-497d-b770-a31f242271a1.jpeg'),
('Bodri', 1, '2019-04-05', '2025-02-10', 'Bodri igazi házőrző, aki nemcsak szeretetteljes, hanem rendkívül figyelmes is. Minden apró zajra felkapja a fejét, és ha szükséges, védelmezi a családját. Szereti a szabad levegőt és a hosszú sétákat, de a család körül a legboldogabb.', 2, 2, 0, 'https://random.dog/c0b61b5e-1eb8-44d3-a999-65307b003f29.JPG'),
('Luna', 1, '2023-07-17', '2025-02-13', 'Luna egy fiatal kutya, aki szelídségével és kedvességével mindenkit elvarázsol. Bár eleinte kicsit tartózkodó, idővel nagyon barátságos és szeretetteljes társ válik belőle. Különösen kedveli a közös pihenéseket a családdal.', 2, 2, 0, 'https://random.dog/8b48bc81-16fd-4d1d-b593-1d671107ca5a.jpg'),
('Morzsi', 1, '2022-04-18', '2025-02-14', 'Morzsi egy pici, de rendkívül energikus kutya, aki mindig lendületesen fedezi fel a világot. Játékos és szórakoztató, de egy pillanatra sem felejti el, hogy miért fontos a családja. A közös játékokat imádja, de sosem mond nemet egy kis simogatásra sem.', 1, 2, 0, 'https://random.dog/d71ba395-30ad-4e1c-b022-4a6b16c9e77b.jpg'),
('Rocky', 1, '2021-12-02', '2025-02-15', 'Rocky egy igazi kis kalandor, aki mindig a következő felfedezésre vágyik. Barátságos kutya, aki szeret a szabadban lenni, de a gazdáival tölteni az időt a legjobb számára. Minden nap egy új kalandot hoz, és sosem hagyja ki a lehetőséget, hogy örömet szerezzen.', 2, 1, 0, 'https://random.dog/07fcc953-0502-4cb6-bc0e-9b9d6904442d.jpg'),
('Maddox', 1, '2020-10-23', '2025-02-10', 'Maddox egy erőteljes, de kedves kutya, aki mindig védelmezi a családját. Bár sokat aktív, hatalmas szíve van, és szeret a gazdái mellett lenni, hogy biztosítsa számukra a biztonságot. Ha nem figyel, akkor a kertben mászkál, hogy új nyomokat találjon.', 2, 1, 0, 'https://random.dog/ec3dd4d0-d666-44e8-bdcf-06b5f103b111.jpg'),
('Nala', 1, '2022-01-12', '2025-02-13', 'Nala egy szelíd kutya, aki mindig készen áll arra, hogy gazdái mellett pihenjen. Imádja a játékokat, különösen a vízi játékokat, és szívesen futkározik a szabadban. Társasági kutya, aki sosem unatkozik, ha valaki a közelében van.', 1, 2, 0, 'https://random.dog/a62ccc75-2b8b-48d1-9110-b6e8d5687c07.jpg'),
('Brownie', 1, '2024-04-07', '2025-02-12', 'Brownie egy kedves, kíváncsi kutya, aki szeret minden új dolgot felfedezni. Hatalmas lelkesedéssel veti magát a kalandokba. Az egész család számára boldogságot hoz, és imádja, ha a figyelem középpontjában lehet.', 2, 1, 0, 'https://random.dog/7b3154ef-18ea-42de-8c35-e8cd85ba9965.jpg');
