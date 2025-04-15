INSERT INTO `adopters` (`id`, `name`, `phone_number`, `e_mail`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Kovács Péter András', '+36 30 123 4567', 'kovacs.peter@example.com', 'Budapest', NULL, '2025-04-04 18:25:19'),
(2, 'Szabó Anna', '+36 20 234 5678', 'szabo.anna@example.com', 'Debrecen', NULL, NULL),
(3, 'Tóth Gábor', '+36 70 345 6789', 'toth.gabor@example.com', 'Szeged', NULL, NULL),
(4, 'Nagy Éva', '+36 30 456 7890', 'nagy.eva@example.com', 'Pécs', NULL, NULL),
(5, 'Horváth László', '+36 20 567 8901', 'horvath.laszlo@example.com', 'Győr', NULL, NULL),
(6, 'Varga Katalin', '+36 70 678 9012', 'varga.katalin@example.com', 'Miskolc', NULL, NULL),
(7, 'Kiss Tamás', '+36 30 789 0123', 'kiss.tamas@example.com', 'Nyíregyháza', NULL, NULL),
(8, 'Molnár Zsuzsanna', '+36 20 890 1234', 'molnar.zsuzsanna@example.com', 'Kecskemét', NULL, NULL),
(9, 'Németh István', '+36 70 901 2345', 'nemeth.istvan@example.com', 'Székesfehérvár', NULL, NULL),
(10, 'Farkas Mária', '+36 30 012 3456', 'farkas.maria@example.com', 'Szombathely', NULL, NULL),
(11, 'Balogh János', '+36 20 123 4567', 'balogh.janos@example.com', 'Eger', NULL, NULL),
(12, 'Papp Júlia', '+36 70 234 5678', 'papp.julia@example.com', 'Tatabánya', NULL, NULL),
(13, 'Lakatos András', '+36 30 345 6789', 'lakatos.andras@example.com', 'Kaposvár', NULL, NULL),
(14, 'Mészáros Edit', '+36 20 456 7890', 'meszaros.edit@example.com', 'Sopron', NULL, NULL),
(15, 'Simon Attila', '+36 70 567 8901', 'simon.attila@example.com', 'Zalaegerszeg', NULL, NULL),
(16, 'Ó Lilii', '+362098765430', 'lili@valaki.com', 'Aba', '2025-03-23 20:18:30', '2025-03-23 20:18:30'),
(17, 'Kiss Pista János', '+36701234567', 'kpj@kpj.hu', 'Harpacskószajudár', '2025-04-04 18:26:54', '2025-04-04 18:26:54');

INSERT INTO `adoptions` (`id`, `adopter_id`, `animal_id`, `date_of_adoption`, `created_at`, `updated_at`) VALUES
(1, 17, 13, '2025-04-05', '2025-03-23 20:19:08', '2025-04-05 10:55:19'),
(2, 2, 2, '2025-04-07', '2025-04-04 21:44:39', '2025-04-04 21:44:39'),
(3, 1, 3, '2025-04-08', '2025-04-04 22:02:56', '2025-04-05 10:50:33'),
(4, 11, 27, '2025-04-11', '2025-04-11 17:03:03', '2025-04-11 17:03:03');


INSERT INTO `animals` (`id`, `name`, `type_id`, `size_id`, `date_of_birth`, `date_of_admission`, `description`, `gender_id`, `adopted`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Félix', 2, 1, '2022-03-01', '2025-02-14', 'Félix egy kíváncsi és aktív macska, aki mindig felfedezi a ház minden szegletét. Imádja a magas helyeket, és szívesen mászik fel minden egyes bútorra. Játékos, de amikor pihenésre van szüksége, mindig az ablakpárkányon napozik.', 1, 0, 'https://purr.objects-us-east-1.dream.io/i/17202963_1446865762031424_2924148055111697325_n.jpg', NULL, NULL),
(2, 'Potika', 2, 1, '2022-07-05', '2025-02-12', 'Potika egy igazi híresség a házban, mindenki figyelmét magára vonja szelídségével és bájával. Szereti a csendet, de imádja a simogatást, és különösen akkor boldog, ha egy kicsit a gazdája ölében pihenhet. Nagy kedvenc mindenki számára.', 2, 1, 'https://purr.objects-us-east-1.dream.io/i/image4.jpg', NULL, NULL),
(3, 'Cirmi', 2, 1, '2023-01-15', '2025-02-13', 'Cirmi egy fiatal, energikus macska, aki mindig kész a játékra. Imádja az interaktív játékokat, és órákon át képes hancúrozni a labdával vagy egy zsinórral. Társaságkedvelő és kíváncsi, mindig mindenhová követi gazdáit.', 1, 1, 'https://purr.objects-us-east-1.dream.io/i/TOB5A.png', NULL, NULL),
(4, 'Kormi', 2, 1, '2020-05-23', '2025-02-11', 'Kormi egy nyugodt és kedves macska, aki imádja a családját. Ő az, aki mindig az öledbe bújik egy hosszú nap után, hogy pihenhessen. Bár a kalandok nem vonzzák, a gazdáival való pihenés minden igényét kielégíti.', 2, 0, 'https://purr.objects-us-east-1.dream.io/i/OADxt.jpg', NULL, NULL),
(5, 'Mazsola', 2, 1, '2024-11-28', '2025-02-14', 'Mazsola egy energikus és kíváncsi macska, aki mindig figyeli, hogy mi történik körülötte. Imádja a gyors mozdulatokat, és mindig készen áll a felfedezésre. Bár egy kicsit szégyenlős, ha egyszer hozzászokik valakihez, igazán ragaszkodó lesz.', 2, 0, 'https://purr.objects-us-east-1.dream.io/i/wKKER.jpg', NULL, NULL),
(6, 'Daisy', 2, 1, '2024-12-10', '2025-02-11', 'Daisy egy szelíd és türelmes macska, aki szereti a csendes pillanatokat. Különösen akkor boldog, ha egy napsütötte ablakpárkányon pihenhet. Imádja, ha simogatják, és mindig keres egy puha helyet a pihenéshez.', 2, 1, 'https://purr.objects-us-east-1.dream.io/i/20160824_163805-1.jpg', NULL, NULL),
(7, 'Tigris', 2, 1, '2024-06-02', '2025-02-15', 'Tigris egy kicsi, de rendkívül játékos macska. Mindig tele van energiával, és imádja a gyors mozgást. Ő a ház kis kalandora, aki nem rest mindig új dolgokat felfedezni, legyen szó új búvóhelyekről vagy rejtett játékok kereséséről.', 2, 0, 'https://purr.objects-us-east-1.dream.io/i/vfqoY.jpg', NULL, NULL),
(8, 'Mici', 2, 1, '2021-04-17', '2025-02-13', 'Mici egy szelíd és szeretetteljes macska, aki szívesen tölti az időt gazdái társaságában. Bár szeret játszani, a kedvenc időtöltése a pihenés és a simogatás. Az őszinte ragaszkodása és kedvessége mindenkit elvarázsol.', 2, 0, 'https://purr.objects-us-east-1.dream.io/i/20171010_211506.jpg', NULL, NULL),
(9, 'Zokni', 2, 1, '2022-09-29', '2025-02-12', 'Zokni egy kis vidám macska, aki mindig tele van energiával. Imád a szőnyegeken szaladgálni, és sokszor meglepi gazdáit új trükkökkel. Különösen szeret a konyhában lenni, ahol mindenféle titokzatos illatok várják.', 1, 0, 'https://purr.objects-us-east-1.dream.io/i/photo_2017-05-13_14-24-03.jpg', NULL, NULL),
(10, 'Maszat', 2, 1, '2023-03-04', '2025-02-14', 'Maszat egy igazán különleges macska, aki szeret felfedezni és mindig meglepi gazdáit új viselkedésével. Kedvenc időtöltése a napozás, de nem mond nemet egy kis játékra sem. A csendes, szeretetteljes társ, aki sosem hagyja el a házat, ha valaki szükség van', 1, 0, 'https://purr.objects-us-east-1.dream.io/i/20170610_124748.jpg', NULL, NULL),
(11, 'Rex', 1, 2, '2020-02-14', '2025-02-11', 'Rex egy rendkívül energikus és játékos kutya, aki mindig készen áll a kalandokra. Imádja a hosszú sétákat a parkban, ahol felfedezhet minden zugot. Bár sokat pörög, egy pillanatra sem felejti el a családját, és hűségesen követi őket mindenhol.', 1, 0, 'https://random.dog/f0cc7b68-a3bf-4010-8560-0ecfd2b58492.jpg', NULL, NULL),
(12, 'Pötyi', 1, 3, '2021-06-25', '2025-02-12', 'Pötyi egy bájos kutya, aki az egész házat bejárja, hogy mindenhol ott legyen, ahol a családtagok vannak. Imádja a simogatást, de nem zárkózik el a szórakoztató pillanatoktól sem, amikor labdát hoz vissza. Mindenkivel kedves és mindig barátságos.', 1, 0, 'https://random.dog/af70ad75-24af-4518-bf03-fec4a997004c.jpg', NULL, NULL),
(13, 'Lily', 1, 1, '2022-08-10', '2025-02-14', 'Lily egy kíváncsi és játékos kutya, aki mindig ott van, ahol történik valami izgalmas. Szeret a fűben futkározni és a szabadban lenni. Szelíd és szeretetteljes kutya, aki minden új emberrel szívesen ismerkedik.', 2, 1, 'https://random.dog/d7dd199b-8672-497d-b770-a31f242271a1.jpeg', NULL, NULL),
(14, 'Bodri', 1, 2, '2019-04-05', '2025-02-10', 'Bodri igazi házőrző, aki nemcsak szeretetteljes, hanem rendkívül figyelmes is. Minden apró zajra felkapja a fejét, és ha szükséges, védelmezi a családját. Szereti a szabad levegőt és a hosszú sétákat, de a család körül a legboldogabb.', 2, 0, 'https://random.dog/c0b61b5e-1eb8-44d3-a999-65307b003f29.JPG', NULL, NULL),
(15, 'Luna', 1, 1, '2023-07-17', '2025-02-13', 'Luna egy fiatal kutya, aki szelídségével és kedvességével mindenkit elvarázsol. Bár eleinte kicsit tartózkodó, idővel nagyon barátságos és szeretetteljes társ válik belőle. Különösen kedveli a közös pihenéseket a családdal.', 2, 0, 'https://random.dog/8b48bc81-16fd-4d1d-b593-1d671107ca5a.jpg', NULL, NULL),
(16, 'Morzsi', 1, 1, '2022-04-18', '2025-02-14', 'Morzsi egy pici, de rendkívül energikus kutya, aki mindig lendületesen fedezi fel a világot. Játékos és szórakoztató, de egy pillanatra sem felejti el, hogy miért fontos a családja. A közös játékokat imádja, de sosem mond nemet egy kis simogatásra sem.', 2, 0, 'https://random.dog/d71ba395-30ad-4e1c-b022-4a6b16c9e77b.jpg', NULL, NULL),
(17, 'Rocky', 1, 2, '2021-12-02', '2025-02-15', 'Rocky egy igazi kis kalandor, aki mindig a következő felfedezésre vágyik. Barátságos kutya, aki szeret a szabadban lenni, de a gazdáival tölteni az időt a legjobb számára. Minden nap egy új kalandot hoz, és sosem hagyja ki a lehetőséget, hogy örömet szere', 1, 0, 'https://random.dog/07fcc953-0502-4cb6-bc0e-9b9d6904442d.jpg', NULL, NULL),
(18, 'Maddox', 1, 2, '2020-10-23', '2025-02-10', 'Maddox egy erőteljes, de kedves kutya, aki mindig védelmezi a családját. Bár sokat aktív, hatalmas szíve van, és szeret a gazdái mellett lenni, hogy biztosítsa számukra a biztonságot. Ha nem figyel, akkor a kertben mászkál, hogy új nyomokat találjon.', 1, 0, 'https://random.dog/ec3dd4d0-d666-44e8-bdcf-06b5f103b111.jpg', NULL, NULL),
(19, 'Nala', 1, 1, '2022-01-12', '2025-02-13', 'Nala egy szelíd kutya, aki mindig készen áll arra, hogy gazdái mellett pihenjen. Imádja a játékokat, különösen a vízi játékokat, és szívesen futkározik a szabadban. Társasági kutya, aki sosem unatkozik, ha valaki a közelében van.', 2, 0, 'https://random.dog/a62ccc75-2b8b-48d1-9110-b6e8d5687c07.jpg', NULL, NULL),
(20, 'Brownie', 1, 2, '2024-04-07', '2025-02-12', 'Brownie egy kedves, kíváncsi kutya, aki szeret minden új dolgot felfedezni. Hatalmas lelkesedéssel veti magát a kalandokba. Az egész család számára boldogságot hoz, és imádja, ha a figyelem középpontjában lehet.', 1, 0, 'https://random.dog/7b3154ef-18ea-42de-8c35-e8cd85ba9965.jpg', NULL, NULL),
(21, 'Pimpike', 2, 3, '2023-08-15', '2025-04-04', 'Vörös kandúr, aki szereti a gyomrát, igazi kövér Garfiled', 1, 0, 'https://cdn.pixabay.com/photo/2019/08/10/09/22/cat-4396539_1280.jpg', NULL, NULL),
(23, 'Bodrika', 1, 1, '2024-12-10', '2025-04-10', 'Bodrika igazi kicsi a bors, de erős típus. Remek házőrző, de túl vehemens, ezért gyerekek mellé nem javasoljuk', 1, 0, 'https://tobbmintkutya.hu/wp-content/uploads/2024/06/hazorzo-kutyafajtak.png', NULL, NULL),
(24, 'Manócska', 2, 1, '2025-01-10', '2025-04-10', 'Manócska egy picúrka, imádnivaló szőrgombóc, igazi szeretetbomba.', 2, 0, 'https://magazin.petissimo.hu/uploads/cropped/munchkin_macska_fekete_haterrel_crop_610a7db40a700.JPG?v=5', NULL, NULL),
(26, 'Lucy', 1, 2, '2014-01-11', '2025-04-10', 'Idős hölgy nyugodt, új otthont keres.', 2, 0, 'https://welovedogz.hu/media/images/2021_04_idos-eb-fekszik.width-800.jpg', NULL, NULL),
(27, 'Ciculi', 2, 1, '2024-08-01', '2025-04-11', 'Ciculi egy autópálya-pihenőben tengette eddigi életét. Kizárólag benti tartással fogadható örökbe.', 2, 1, 'https://images.pexels.com/photos/104827/cat-pet-animal-domestic-104827.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', NULL, NULL);


INSERT INTO `appointments` (`id`, `user_id`, `animal_id`, `appointment_time`, `created_at`, `updated_at`) VALUES
(1, 4, 7, '2025-03-24 15:00:00', NULL, NULL),
(2, 4, 6, '2025-04-24 15:00:00', NULL, NULL),
(20, 10, 11, '2025-04-28 14:30:00', NULL, NULL),
(22, 6, 1, '2025-04-09 18:30:00', NULL, NULL),
(23, 6, 10, '2025-04-09 08:30:00', NULL, NULL),
(24, 27, 5, '2025-04-18 09:30:00', NULL, NULL);


INSERT INTO `favorites` (`id`, `user_id`, `animal_id`, `created_at`, `updated_at`) VALUES
(1, 9, 9, '2025-03-30 16:12:15', '2025-03-30 16:12:15'),
(4, 9, 13, '2025-03-31 11:40:36', '2025-03-31 11:40:36'),
(5, 9, 10, '2025-03-31 13:11:42', '2025-03-31 13:11:42'),
(7, 9, 7, '2025-04-02 10:25:07', '2025-04-02 10:25:07'),
(8, 6, 3, '2025-04-02 18:30:33', '2025-04-02 18:30:33'),
(9, 6, 6, '2025-04-02 18:32:06', '2025-04-02 18:32:06'),
(12, 6, 5, '2025-04-02 19:36:53', '2025-04-02 19:36:53'),
(13, 6, 11, '2025-04-03 05:40:45', '2025-04-03 05:40:45'),
(14, 6, 1, '2025-04-03 05:43:26', '2025-04-03 05:43:26'),
(18, 6, 8, '2025-04-03 11:26:20', '2025-04-03 11:26:20'),
(19, 6, 19, '2025-04-03 11:29:23', '2025-04-03 11:29:23'),
(20, 9, 19, '2025-04-03 11:32:35', '2025-04-03 11:32:35'),
(21, 9, 2, '2025-04-03 11:34:43', '2025-04-03 11:34:43'),
(22, 6, 10, '2025-04-03 16:48:57', '2025-04-03 16:48:57'),
(24, 4, 1, '2025-04-05 07:50:44', '2025-04-05 07:50:44'),
(26, 6, 12, '2025-04-05 12:20:25', '2025-04-05 12:20:25'),
(27, 7, 1, '2025-04-05 14:43:20', '2025-04-05 14:43:20'),
(28, 7, 4, '2025-04-05 14:58:37', '2025-04-05 14:58:37'),
(29, 10, 4, '2025-04-05 20:30:09', '2025-04-05 20:30:09'),
(30, 10, 7, '2025-04-05 20:30:26', '2025-04-05 20:30:26'),
(31, 27, 5, '2025-04-11 16:56:38', '2025-04-11 16:56:38');


INSERT INTO `genders` (`id`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'hím', NULL, NULL),
(2, 'nőstény', NULL, NULL);


INSERT INTO `sizes` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, 'kicsi', NULL, NULL),
(2, 'közepes', NULL, NULL),
(3, 'nagy', NULL, NULL);


INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'kutya', NULL, NULL),
(2, 'macska', NULL, NULL);


INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `admin`, `created_at`, `updated_at`) VALUES
(2, 'Pannika', 'pannika@akarki.hu', NULL, '$2y$12$H4p83xSx.uuepVTXNs9D0eSGnJEQvkfFP/t66dX6fFAhJQuqOiunS', NULL, 1, '2025-03-23 18:16:33', '2025-04-04 15:33:08'),
(4, 'Super Admin', 'admin@menhely.hu', NULL, '$2y$12$IMh4nn8hE52DZU4bFxFohO61ou5JpPxS3kNbTLxo2LoRxLmrHcBKS', NULL, 2, '2025-03-23 18:30:04', '2025-03-23 18:30:04'),
(5, 'Panni', 'pannicicamica@valami.hu', NULL, '$2y$12$KU53CSVnUd88rseOUugiFOE8okRsps.YL/35rVz0JhpRwEUgP4je2', NULL, 0, '2025-03-23 18:31:05', '2025-04-09 14:51:17'),
(6, 'Teszt Elek', 'tesztelek@valami.hu', NULL, '$2y$12$MqM.EM2vM9guVBMwHp1QPuVseZX.KDuDI57JhG7oyqxAAXEK8Hfp.', NULL, 1, '2025-03-23 20:15:48', '2025-04-04 15:33:22'),
(7, 'Manócska', 'manocska@valamicske.hu', NULL, '$2y$12$/F6klNPkIQJHFpQ7mkk1n..X8ALp1oyJKl1u0IbokaVIywLUYakkC', NULL, 0, '2025-03-29 23:04:28', '2025-04-04 17:07:59'),
(8, 'Próba Ede', 'proba@valami.hu', NULL, '$2y$12$nJkUahuNntVDpMVDl47LduvyNtFqzqkw3owg6/M5J9wTKGDSkx7si', NULL, 0, '2025-03-30 00:54:52', '2025-03-30 00:54:52'),
(9, 'Béla', 'bela@valami.hu', NULL, '$2y$12$NPB9V66JebJT4t7RDkMWeOjC0Dsbxv8jLPzG3fn0oLybsKjuo27Dy', NULL, 1, '2025-03-30 00:55:42', '2025-04-04 17:09:11'),
(10, 'Cserepes Virág', 'cska8006@gmail.com', NULL, '$2y$12$7Jui77ku.zy0i8tzlh4.zeCcSj4Y2dN3s9dZ9LzjiCrMuv9docO8m', NULL, 0, '2025-04-05 20:26:40', '2025-04-05 20:26:40'),
(14, 'Bor Ivó', 'borivo@gmail.com', NULL, '$2y$12$H/68QyeEtPi49QNMtxB.Te4gDkztStSlYuwQYlVEv.Rk2VXUjaJie', NULL, 0, '2025-04-10 20:14:28', '2025-04-10 20:14:28'),
(20, 'Béka Réka', 'breki@valami.hu', NULL, '$2y$12$FP5TlMvzho1rBr3gUBSJ7.HV7xHzjMkr.Om.10tcymoJtluVN2QNO', NULL, 0, '2025-04-10 20:48:41', '2025-04-10 20:48:41'),
(21, 'Bede Ede', 'bede@valami.com', NULL, '$2y$12$fEFEThunVaIQNaWCU/UJUujVna5TMNCWUunrvHY0f7EgtMO.Pc35i', NULL, 0, '2025-04-10 20:57:42', '2025-04-10 20:57:42'),
(26, 'Edina', 'edina@valami.com', NULL, '$2y$12$QXU8lVDPIHjWzgnpbGFs8.1rL0OalD8HqmthRL/fR5r6Ipj3kKu9S', NULL, 0, '2025-04-10 21:26:21', '2025-04-10 21:26:21'),
(27, 'Mák Virág', 'makvirag@gmail.com', NULL, '$2y$12$xpsaopDF8h1P5EZc6ulwYeYgqHSk4vzs9XKOL1b1bpDqvyrfWjAOS', NULL, 0, '2025-04-10 21:28:30', '2025-04-10 21:28:30'),
(32, 'Ede', 'ede@valami.com', NULL, '$2y$12$pBVR1UMCi9TXwK04NqlKMubxaJUtAUgQZd0Hyp.TGI5sbYRmbrqs.', NULL, 0, '2025-04-10 21:49:23', '2025-04-10 21:49:23');

--
