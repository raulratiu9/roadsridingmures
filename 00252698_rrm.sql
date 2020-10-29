-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost
-- Timp de generare: mart. 14, 2020 la 08:37 AM
-- Versiune server: 5.7.26-29-log
-- Versiune PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `00252698_rrm`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `entry_id` varchar(255) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Eliminarea datelor din tabel `comments`
--

INSERT INTO `comments` (`comment_id`, `entry_id`, `user_id`, `date`, `comment`) VALUES
(1, '1', 'SebiCerces', '2019-07-24 01:40:49', 'Succes pe mai departe !!! đŞđŞđŞ'),
(2, '2', 'elupop89', '2019-07-25 04:11:10', 'Felicitari bro. Te astept sa cutreieram prin Saint Helier cu bicicletele. te pup si ai grija de tine :*'),
(3, '1', 'FlaviuBumb', '2019-07-25 04:29:50', 'Astept urmÄtoarele trasee.Te felicit pentru munca depusÄ pentru blog!'),
(4, '3', 'FlaviuBumb', '2019-09-04 15:23:16', 'Frumos');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `entries`
--

CREATE TABLE `entries` (
  `entry_id` int(11) NOT NULL,
  `entry_day` varchar(25) NOT NULL,
  `entry_day_en` varchar(100) DEFAULT NULL,
  `entry_month` varchar(100) NOT NULL,
  `entry_month_en` varchar(25) DEFAULT NULL,
  `entry_year` varchar(25) NOT NULL,
  `entry_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_upload_en` varchar(100) DEFAULT NULL,
  `entry_author` varchar(20) NOT NULL,
  `entry_views` varchar(9999) NOT NULL,
  `entry_title` varchar(100) NOT NULL,
  `entry_title_en` varchar(100) DEFAULT NULL,
  `entry_excerpt` varchar(500) NOT NULL,
  `entry_excerpt_en` varchar(500) DEFAULT NULL,
  `entry_content` varchar(10000) NOT NULL,
  `entry_content_en` varchar(10000) DEFAULT NULL,
  `entry_file` varchar(255) NOT NULL,
  `entry_file2` varchar(255) NOT NULL,
  `entry_file3` varchar(255) NOT NULL,
  `entry_file4` varchar(255) NOT NULL,
  `entry_route` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Eliminarea datelor din tabel `entries`
--

INSERT INTO `entries` (`entry_id`, `entry_day`, `entry_day_en`, `entry_month`, `entry_month_en`, `entry_year`, `entry_upload`, `entry_upload_en`, `entry_author`, `entry_views`, `entry_title`, `entry_title_en`, `entry_excerpt`, `entry_excerpt_en`, `entry_content`, `entry_content_en`, `entry_file`, `entry_file2`, `entry_file3`, `entry_file4`, `entry_route`) VALUES
(1, 'Luni, 22', 'Monday,', 'IULIE', 'JULY', '2019', '2019-07-22 14:07:00', ' 22 th', 'Raul', '1632', 'First post', 'First post', 'Transilvania este o regiune frumoasÄ, cu peisaje de vis Či locuri istorice, ĂŽnsÄ frumuseČea ei prinde contur ĂŽn momentul ĂŽn care o explorezi pe douÄ roČi. AcelaČi sentiment ĂŽl avem Či noi de cĂ˘nd cÄlÄtorim ĂŽn modul acesta. Am ĂŽnvÄČat sÄ ne bucurÄm mai mult de ceea ce ne ĂŽnconjoarÄ!', 'Transylvania is a beautiful region with dream landscapes and historical places, but his beauty takes shape in the moment of exploring it on two tires. We have same feeling since we have been traveling in this way. We have learned to enjoy more all around us!', 'De-a lungul anilor, am ĂŽnceput sÄ cÄlÄtorim ĂŽn diferite locuri din apropierea noastrÄ, doar din plÄcere, iar azi am luat decizia de a ĂŽmpÄrtÄČi experienČele noastre Či cu voi. Am ĂŽnfiinČat acest blog din plÄcerea de a ĂŽmpÄrtÄČi experienČele noastre Či de a vÄ convinge sÄ vÄ alÄturaČi Či voi. L-am realizat cu mare drag Či sper sÄ vÄ conving cĂ˘t de frumoase sunt locurile din apropierea noastrÄ, ĂŽnsÄ din altÄ perspectivÄ. AČadar, pĂ˘nÄ acum am explorat peste 30 de localitÄČi Či nu ne vom opri aici. Printre cele mai lungi trasee se aflÄ: SÄrmÄČel -  Apahida(CJ), SÄrmÄČel -  Zoreni (BN), SÄrmÄČel - \r\nMociu(CJ) Či SÄrmÄČel - Zau de CĂ˘mpie(MS). SperÄm ca ĂŽn viitorul apropiat, sÄ facem mai multe trasee ĂŽn locuri mai ĂŽndepÄrtate, dar Či cu un grup mai mare.\r\nLocalitÄČile pe care le-am vizitat: \r\nJudeČul MureČ: SÄrmaČu, SÄrmÄČel, SÄrmÄČel-GarÄ, Satu Nou, DĂ˘mbu, SĂ˘npetru de CĂ˘mpie, Balda, ViČinelu, MiheČu de CĂ˘mpie, Zau de CĂ˘mpie;\r\n\r\nJudeČul Cluj: CÄmÄraČu, Zorenii de Vale, Mociu, TurmaČi, GhiriČu RomĂ˘n, CÄianu Mic, CÄianu VamÄ, Corpadea, Apahida, Hodaie, Geaca, Lacu, Sucutard;\r\n\r\nJudeČul BistriČa-NÄsÄud: ČÄgČoru, Čagu, BudeČti-FĂ˘naČe, BudeČti, Zoreni, SilivaČu de CĂ˘mpie.', 'For many years, we had been started to travel in different nearby locations, just for fun and today I have decided to share our experiences with you. I founded this blog just for my pleasure to share our experiences and to show you that you have to join us. I built it from scratch with a lot of pleasure and I hope that I will convince you how such beautiful can be our nearby locations from Transylvania, but in other perspective. So, we already have discovered over 30 locations and we don\'t stop here. The longest routes are: SÄrmÄČel -  Apahida(CJ), SÄrmÄČel - Zoreni (BN), SÄrmÄČel - Mociu(CJ) and SÄrmÄČel - Zau de CĂ˘mpie(MS). We hope that in future we can travel on longer routes and in a bigger group. Locations which we have already visited:  MureČ county: SÄrmaČu, SÄrmÄČel, SÄrmÄČel-GarÄ, Satu Nou, DĂ˘mbu, SĂ˘npetru de CĂ˘mpie, Balda, ViČinelu, MiheČu de CĂ˘mpie, Zau de CĂ˘mpie;\r\n\r\nCluj county: CÄmÄraČu, Zorenii de Vale, Mociu, TurmaČi, GhiriČu RomĂ˘n, CÄianu Mic, CÄianu VamÄ, Corpadea, Apahida, Hodaie, Geaca, Lacu, Sucutard;\r\n\r\nBistriČa-NÄsÄud county: ČÄgČoru, Čagu, BudeČti-FĂ˘naČe, BudeČti, Zoreni, SilivaČu de CĂ˘mpie.', 'uploads/24.jpeg', 'uploads/54.jpg', 'uploads/30.jpg', 'uploads/38.jpg', ''),
(2, 'Miercuri, 24', 'Wednesday', 'IULIE', 'JULY', '2019', '2019-07-24 19:52:16', ' 24 th', 'Raul', '1151', '10 localitÄČi ĂŽntr-o zi!', '10 locations in one day!', 'CĂ˘mpia Transilvaniei te surprinde de fiecare datÄ, mai ales cu localitÄČile privite de sus, fiind apÄrate de dealurile masive. AcceaČi surprindere am avut-o Či noi azi ĂŽn localitÄČile ViČinelu Či NÄoiu. Iar o altÄ surprindere a fost reabilitarea integralÄ a drumului spre Gherla. Deci se poate!', 'Transylvanian Plain surprises you every time, but especially with the looked down locations, which are defended by the massive hills. Same surprise we had today in ViČinelu and NÄoiu locations. And another surprise was the complete rehabilitation of the road to Gherla. So it can!', 'Azi a fost o zi potrivitÄ pentru un traseu mai lung. Astfel, am parcurs 50 km, traversĂ˘nd 10 localitÄČi: SÄrmÄČel, SÄrmaČu, Balda, ViČinelu, NÄoiu, CÄmÄraČu, Hodaie, Geaca Či SÄrmÄČel-GarÄ. Traseul de azi a fost destul de dificil din cauza dealurilor masive pe care le-am urcat, dar s-a uČurat repede la coborĂ˘re. Am rÄmas surprinČi de natura care ne ĂŽnconjoarÄ, de diferitele plante de pe cĂ˘mpii Či de satele mici privite de sus. Am adÄugat o nouÄ localitate pe lista de localitÄČi explorate, anume NÄoiu. Ăn orice caz, am fost plÄcut surprinČi cĂ˘nd am vÄzut drumul asfaltat, dar am pedalat cu bucurie Či pe drumul de piatrÄ ce face legÄtura dintre ViČinelu Či NÄoiu. Pot spune cÄ pentru niČte sate sunt destul de bine dezvoltate. La fel de plÄcut surpinČi am fost Či de drumul reabilitat spre Gherla, mergĂ˘nd cu bucurie pĂ˘nÄ la Geaca Či amintindu-ne de gropile pe care trebuia sÄ le ocolim de fiecare datÄ cĂ˘nd pedalam ĂŽn acea zonÄ. Astfel, am realizat un circuit ce porneČte din SÄrmÄČel pe un drum Či ajunge tot ĂŽn SÄrmÄČel pe alt drum.', 'Today was a suitable day for a longer route. So, we rode 50 km passing through 10 locations: SÄrmÄČel, SÄrmaČu, Balda, ViČinelu, NÄoiu, CÄmÄraČu, Hodaie, Geaca and SÄrmÄČel-GarÄ. The route of this day was so hard due to the massive hills which we rode, but it turned fast into a easy trip when we were riding down. We were surprised of the nature which was around us, of the plains plants and of the looked down smalls villages. We have added a new location on our explored locations list, NÄoiu. I can tell you that for some villages are rather well developed. As surprised we were when we saw the rehabilitation of the road to Gherla, gladly riding to Geaca and remembering the big holes which we had to avoid always when we were in that area. So, we have achieved a circuit which starts from SÄrmÄČel on a way and it stops also in SÄrmÄČel on other way. ', 'uploads/63.jpg', 'uploads/61.jpg', 'uploads/71.jpg', 'uploads/78.jpg', 'Sărmă?el - Balda -vi?inelu - Năoiu - Cămăra?u - Hodaie - Geaca - Sărmă?ek-Gară - Sărmă?el'),
(3, 'DuminicÄ, 4', 'Sunday,', 'AUGUST', 'AUGUST', '2019', '2019-08-05 10:18:11', ' 4 th', 'Raul', '1326', 'MÄnÄstirea Nicula & Gherla', 'Nicula Monastery & Gherla', 'Cel mai lung Či mai dificil traseu, dar Či cel mai frumos.', 'The longest and the hardest, but the greatest route.', 'Azi am avut parte de cel mai dificil traseu de pĂ˘nÄ acum, ĂŽntrucĂ˘t am pedalat peste 110 km, traversĂ˘nd localitÄČile: SÄrmÄČel - SÄrmÄČel-GarÄ - Hodaie - Geaca - Lacu - Sucutard - \r\n Čaga - SĂ˘ntioana - FizeČu Gherlii - Nicula - Gherla. Traseul a fost foarte dificil din cauza vĂ˘ntului care ne-a ĂŽncetinit Či a ploilor de scurtÄ duratÄ, pe care, din fericire le-am prins ĂŽn zona localitÄČilor. ĂnsÄ tot efortul depus a meritat, deoarece am reuČit sÄ adÄugÄm noi localitÄČi pe harta noastrÄ. Chiar Či dealul greu de urcat ce duce la mÄnÄstire ne-a oferit ĂŽn vĂ˘rf un peisaj frumos al localitÄČii Nicula. AceastÄ mÄnÄstire este cunoscutÄ ĂŽn Čara noastrÄ Či sunt mĂ˘ndru cÄ se aflÄ Ăn Transilvania. Dar cĂ˘nd te gĂ˘ndeČti cÄ ai pedalat aČa mult, eČti Či mai mĂ˘ndru.', 'Today, we took part at the hardest route from our history of routes, because we rode over 110 km through: SÄrmÄČel - SÄrmÄČel-GarÄ - Hodaie - Geaca - Lacu - Sucutard - \r\n Čaga - SĂ˘ntioana - FizeČu Gherlii - Nicula - Gherla. Today we had a not quiet suitable weather due to the wind which slowed us down and the shortly rains which we escaped them easily because we founded spots to avoid wetting. But, all the effort worthed because we had added new locations on our map. Even the hill to the monastery which it was so hard to ride on him worthed, because the peak offered a beautiful landscape of Nicula location. This monastery is well known in our country and I\'m proud that is in Transylvania. But, when you think that you rode so long you are more proud.', 'uploads/109.jpg', 'uploads/107.jpg', 'uploads/89.jpg', 'uploads/110.jpg', ''),
(4, 'MarČi, 27', 'Tuesday,', 'AUGUST', 'AUGUST', '2019', '2019-09-04 19:50:06', ' 27 th', 'Raul', '1493', 'Cel mai prietenos sat', 'The friendliest village', 'JudeČul BistriČa-NÄsÄud este unul dintre preferatele noastre. De ce? Pentru cÄ de fiecare datÄ ĂŽnĂ˘lnim oameni cumsecade care ne salutÄ Či ne apreciazÄ pentru ceea ce facem.', 'BistriČa-NÄsÄud county is one of our favourite counties. Why? Because always we met good people which salute us and appreciate us for what we do.', 'ĂncÄ din August simČi cÄ toamna a sosit Či soarele te lasÄ ĂŽnsfĂ˘rČit sÄ organizezi din nou trasee cu bicicleta pe o searÄ mai rÄcoroasÄ. Astfel, la sugestia unui bun prieten, am decis sÄ mergem ĂŽntr-un sat din judeČul BistriČa-NÄsÄud, anume MiceČtii de CĂ˘mpie. Un sat de care poate nu multÄ lume a auzit, dar ar trebui fiindcÄ acolo vei gÄsi oameni care sunt gata sÄ-Či sarÄ ĂŽn ajutor oricĂ˘nd, oameni care te vor saluta indiferent cÄ te cunosc sau nu Či oameni care sunt impresionaČi de ceea ce faci. Traseul pe care l-am parcurs a fost unul mai dificil: am avut dealuri de urcat, am avut de ocolit anumite gropi Či denivelÄri Či mai ales a trebuit sÄ facem faČÄ nopČii pe Drumul NaČional 16, atĂ˘t la urcare, cĂ˘t Či la coborĂ˘re, urmĂ˘nd ruta SÄrmÄČel - SÄrmÄČel-GarÄ - Satu Nou - SilivaČu de CĂ˘mpie - Visuia - MiceČtii de CĂ˘mpie, ĂŽnsÄ cu siguranČÄ a meritat pentru cÄ am ĂŽntĂ˘lnit niČte oameni deosebiČi Či mai ales ne-a ĂŽncĂ˘ntat foarte mult drumul ce leagÄ SilivaČu de CĂ˘mpie de Visuia ĂŽntrucĂ˘t este un drum foarte bine asfaltat Či fÄrÄ maČini. ', 'Since August you have already feel that the autumn has come and the Sun finally let you to organize new routes on a cooler evening. So, at a good friend sugestion, we have decided to go in a small village from BistriČa-NÄsÄud county, MiceČtii de CĂ˘mpie. A village which no many people have heard about it, but they should because there you will find friendly and helpfully people at any time, people which salute you even if they know you or not and people which are impressed by what you do. The route which we have ridden was so hard: we had to ride the hills, we had to avoid different holes and bumps and also we had to face the music to the night on National Road 16 both on ascent and descent, following the route: SÄrmÄČel - SÄrmÄČel-GarÄ - Satu Nou - SilivaČu de CĂ˘mpie - Visuia - MiceČtii de CĂ˘mpie, but ensurely it worth it because we met amazing people and especially we were glad by the road between SilivaČu de CĂ˘mpie and Visuia because we rode on a very good road with no traffic.', 'uploads/121.jpg', 'uploads/114.jpg', 'uploads/117.jpg', 'uploads/122.jpg', ''),
(5, 'MarČi, 3', 'Tuesday,', 'SEPTEMBRIE', 'SEPTEMBER', '2019', '2019-09-10 17:53:09', '  3 rd', 'Raul', '1474', 'JudeČul BistriČa-NÄsÄud e mai bun decĂ˘t MureČ?', 'BistriČa-NÄsÄud county is better than MureČ county?', 'Pe lĂ˘ngÄ faptul cÄ are oameni buni Či prietenoČi, judeČul BistriČa-NÄsÄud are Či drumuri mult mai bune faČÄ de alte judeČe. AcelaČi lucru se aplicÄ Či ĂŽn cazul Drumului NaČional 16 care a fost reabilitat integral doar ĂŽn acest judeČ.', 'Beside that this county has good and friendly people, he also has better roads than other counties. Same thing is applied in the case of the National Road 16 which has been completely rehabilited only in this county.', 'De foarte mult timp ne-am propus acest traseu Či ĂŽnsfĂ˘rČit am reuČit sÄ ajungem Či la CrÄieČti, o altÄ localitate din judeČul MureČ cu oameni prietenoČi, situatÄ la aproximativ 25 km de SÄrmaČu. Traseul de azi a fost unul mai dificil deoarece am avut din nou de urcat multe dealuri Či de ĂŽnfruntat noaptea pe Drumul NaČional 16, parcurgĂ˘nd localitÄČile SÄrmÄČel-GarÄ, Satu Nou, SilivaČu de CĂ˘mpie Či UrmeniČ. Oricum, traseul a meritat fiindcÄ ĂŽn momentul ĂŽn care am trecut graniČele judeČului nostru Či am ajuns pe plaiuri bistriČene, drumul ne-a fost un bun prieten fÄrÄ gropi, fÄrÄ denivelÄri. ĂnsfĂ˘rČit puteai spune cÄ este un drum naČional fiindcÄ ĂŽmi amintesc din anii trecuČi cĂ˘t era de greu sÄ mergi cu bicicleta pentru cÄ trebuia sÄ fii foarte atent la gropi Či denivelÄri. Chiar am fost uimiČi Či ne-am pus ĂŽntrebarea de ce nu putem avea parte de acelaČi drum bun Či ĂŽn judeČul nostru. Oricum, dupÄ ce am ajuns din nou ĂŽn judeČul MureČ, am fost ĂŽntĂ˘mpinaČi de o pancartÄ pe care nici nu se mai ĂŽnČelege inscripČia cu \"Comuna CrÄieČti\". Dar asta nu e singura problemÄ. Cea mai mare problemÄ sunt gropile Či denivelÄrile, simbol al judeČului nostru, cel mai probabil, motiv pentru care nu am reuČit sÄ fac niČte poze prea clare. PÄcat, puteam avea Či noi aceleaČi drumuri, sunt sigur de asta, dar ne mulČumim cu ce avem.', 'For a long time we proposed that route and finally we achieved to arrive at CrÄieČti, another location from MureČ county with friendly people, placed about 25 km away from SÄrmaČu. The route of this day was pretty hard because again we had to ride a lot of hills and to face the music to the night on the National Road 16, through the locations: SÄrmÄČel-GarÄ, Satu Nou, SilivaČu de CĂ˘mpie and UrmeniČ. Anyway, the route worthed because in the moment of crossing our county borders and we arrived on BistriČa plains, the road was a good friend without holes and bumps. Finally, you could say that this is a national road because I remembered in the past how hard could be to ride there because you had to be carefully with the holes and the bumps. We were really amazed and we wondered why we couldn\'t have same good road even in our county. Anyway, after arriving again in MureČ county, we were welcomed by a sign where you couldn\'t read correctly \"Comuna CrÄieČti\". But this is not the only problem. The biggest problem are the holes and the bumps, symbol of our county, most likely, the reason of taking clearless pictures. Unfortunately, we can\'t have same roads even if I think that we can, I\'m sure about that, but we take what we have.', 'uploads/124.jpg', 'uploads/127.jpg', 'uploads/135.jpg', 'uploads/137.jpg', ''),
(6, 'SĂ˘mbÄtÄ, 14', 'Saturday, ', 'SEPTEMBRIE', 'SEPTEMBER', '2019', '2019-09-17 09:17:53', ' 14 th', 'Raul', '1496', 'Toamna ĂŽn Transilvania', 'Autumn in Transylvania', 'Cel mai frumos anotimp potrivit pentru traseele cu bicicleta este toamna,  deoarece totul prinde culoare ĂŽn jurul tÄu. Un anotimp care ĂŽČi oferÄ poze colorate Či cum altfel fÄrÄ bicicletele noastre.', 'The most beautiful season suitable for bike riding is autumn , because all around us is coloured. A season which offers us colorful pictures and how else without our bikes.', 'Traseul acesta a fost foarte frumos, indiferent de urmÄri. Ne-am propus de foarte mult timp sÄ-l parcurgem, ĂŽnsÄ am aČteptat toamna pentru cÄ Čtiam cÄ va fi mirific, precum aČa a Či fost. DeČi sunt doar 35 km, mi s-a pÄrut foarte lung deoarece nu cunoČteam atĂ˘t de bine drumul. Cel mai probabil, asta a fost din cauza dealului Zoreniului care este masiv. Lacul BrÄteni este foarte frumos amenajat Či meritÄ sÄ fie cunoscut de mult mai mulČi oameni. PoČi chiar sÄ te cazezi Či peste noapte pentru a admira mai mult lacul. Nici nu Čtiu cum sÄ-i descriu cĂ˘t mai bine frumuseČea, cel mai bine este sÄ mergeČi chiar voi sÄ descoperiČi minunÄČia locului. De asemenea, ĂŽn apropierea lacului se aflÄ un restaurant ce oferÄ mĂ˘ncare foarte bunÄ Či o piscinÄ numai bunÄ pentru o zi cÄlduroasÄ. Asta ĂŽnseamnÄ cÄ lacul BrÄteni are un potenČial turistic destul de mare, ĂŽnsÄ nu este promovat ĂŽndeajuns. Sunt sigur cÄ s-ar putea dezvolta mult mai mult ĂŽn viitor. Din pÄcate, traseele de anul acesta se terminÄ aici. Am reuČit sÄ facem tot ceea ce ne-am propus Či sperÄm ca anul viitor sÄ pedalÄm mult mai departe. ', 'This route was very beautiful, no matter of the consequences. We have proposed for a long time to ride on this route, but we waited the autumn because we knew that it would be marvelous and it was. Although there are only 35 km, it seems for me very long because I didn\'t knew exactly the road. Most probably, it was due to the Zoreni hill which was massive. BrÄteni Lake is very beautifully arranged and he deserves to be known by more and more people. You can check-in and stay over the night to admire more the lake. I don\'t know how to describe better his beauty, the best way is even you to go there and to discover the treasure of that place. Also, nearby the lake it is a restaurant which offers very good food and a pool suitable for a warm day. That means that the BrÄteni lake has a rater high touristic potential, but he is not promoted enough. I\'m sure that he could develop more and more in future. Unfortunately, the routes of this year are ending here. We achieved to make all what we had proposed and we hoped that next year we would ride further.', 'uploads/151.jpg', 'uploads/146.jpg', 'uploads/160.jpg', 'uploads/159.jpg', ''),
(7, 'SĂ˘mbÄtÄ, 25', 'Saturday,', 'IANUARIE', 'JANUARY', '2020', '2020-01-25 18:55:06', ' 25 th', 'Raul', '1315', 'Iarna pe Lacul Chiliceu', 'Winter on Chiliceu Lake', 'Lacul Chiliceu este punctul de pornire al traseelor noastre. Acesta este situat ĂŽn judeČul BistriČa-NÄsÄud, la jumÄtatea drumului dintre SÄrmÄČel-GarÄ Či Čagu. Fiecare an ĂŽncepe ĂŽn Ianuarie cu acest traseu scurt de 7 km. ', 'Chiliceu Lake is the starting point of our routes. This is located in BistriČa-NÄsÄud county, at the midway road between SÄrmÄČel-GarÄ and Čagu. Each year starts in January with this 7 km route.', 'Noul an a ĂŽnceput cu un traseu scurt de 7 km ĂŽntr-o zi cÄlduroasÄ de Ianuarie. Ianuarie este consideratÄ o lunÄ friguroasÄ, ĂŽnsÄ noi ne bucurÄm cÄ am avut ocazia de a organiza un traseu ĂŽn aceastÄ lunÄ la o temperaturÄ de 2 Â°C.  Pe durata traseului, am fost ĂŽncÄlziČi de soare Či astfel am ajuns repede la Lacul Chiliceu. Acest lac are o importanČÄ deosebitÄ pentru noi, deoarece de aici au ĂŽnceput traseele. CĂ˘nd am pornit la drum, nu ne-am gĂ˘ndit cÄ gheaČa va rezista, ĂŽnsÄ am avut parte de o surprizÄ. AČadar, am fÄcut poze, am pedalat pe gheaČÄ Či ne-am bucurat ĂŽmpreunÄ. Chiar dacÄ nu-mi place atĂ˘t de mult acest anotimp, azi mi-am dat seama cÄ Či iarna are farmecul ei Či cÄ meritÄ sÄ pedalezi, chiar dacÄ temperatura nu-Či permite acest lucru. Oricum, dacÄ nu se topea zÄpada Či nu era cald, nu cred cÄ azi ne mai bucuram de aceste momente. Ceea ce mi se pare interesant este cÄ traseele s-au ĂŽncheiat ĂŽn judeČul BistriČa-NÄsÄud Či au ĂŽnceput ĂŽn acelaČi judeČ.', 'New Year has started with a short 7 km route in a January warm day. January is considered as a cooler month, but we have enjoyed that we had the opportunity to organise a route this month at a 2 Â°C temperature. During the route, we were heating by the Sun and thus we had arrived fast at Chiliceu Lake. This lake has a great importance for us, because from this the routes had been started. When we had set off, we didn\'t think that the ice would resist, but we had a surprise. So, we took photos, we  rode on the ice and we enjoyed together. Even if I don\'t like so much this season, today I realised that also winter has own charm and it worth to ride it, even if the temperature doesn\'t allow you this thing. Anyway, if the snow didn\'t melt and if it wasn\'t warm, I didn\'t think that we would had enjoyed of this moments. The interesting thing is that the routes had finished in BistriČa-NÄsÄud county and had started in same county.', 'uploads/169.jpg', 'uploads/172.jpg', 'uploads/177.jpg', 'uploads/179.jpg', ''),
(8, 'MarČi, 3', 'Thursday, ', 'MARTIE', 'MARCH', '2020', '2020-03-05 15:18:28', ' 3 th', 'Raul', '1178', 'PrimÄvara ĂŽn BudeČti', 'Spring in BudeČti', 'Traseul SÄrmÄČel - BudeČti este cel mai simplu traseu. De aceea, azi am decis sÄ-l parcurgem pentru prima datÄ ĂŽn acest an ca o scurtÄ ĂŽncÄlzire pentru ceea ce urmeazÄ.', 'SÄrmÄČel - BudeČti route is the easiest route. That\'s why we decided to ride for the first time this year as a warm-up for what comes next.', 'Ăntr-un final, iarna a trecut, iar azi ne-am putut bucura de un traseu scurt de 17 km, de ĂŽncÄlzire pentru ceea ce urmeazÄ. AČa cÄ am ales cel mai simplu traseu, fÄrÄ dealuri Či fÄrÄ trafic mare, doar drumuri drepte ce ne permit o deplasare uČoarÄ. Traseul pe care l-am parcurs este: SÄrmÄČel - SÄrmÄČel-GarÄ - Čagu - BudeČti-FĂ˘naČe - BudeČti. Se pare cÄ primÄvara a venit cu noi gropi ĂŽn acest drum, dar Či cu noi indicatoare pe care nu le-am mai vÄzut. ĂnsÄ, ce ne-a uimit pe noi mai tare, a fost parcul din localitatea BudeČti-FĂ˘naČe. Ce ne-a plÄcut foarte mult la acest parc, este cÄ au fost amenajate parcÄri pentru biciclete. Ăn opinia mea, parcul acesta este superior multor parcuri din oraČele mari Či consider cÄ va fi plÄcut pentru noi sÄ ne oprim de fiecare datÄ acolo pentru o pauzÄ de recreere.  La ĂŽntoarcere, am fost surprinČi de un drum umed cauzat de ploaie, ĂŽnsÄ, din fericire, ploaia a fost scurtÄ Či nu ne-a ĂŽngreunat traseul. Ne-am bucurat mult pedalĂ˘nd, deoarece nu am mai pedalat de la ultimul traseu din Ianuarie Či sunt ĂŽncĂ˘ntat cÄ vremea a fost potrivitÄ pentru un traseu ca acesta.', 'Finally, the winter has passed and today we could enjoy of a short route of 17 km, for warm-up for what comes next. So, we chose the easiest route, without hills and traffic, only straight roads which allow us to have an easy ride. The route which we rode was: SÄrmÄČel - SÄrmÄČel-GarÄ - Čagu - BudeČti-FĂ˘naČe - BudeČti. It seems that the spring has come with holes in roads and new signs which we had never seen. But what we amazed us was the park from BudeČti-FĂ˘naČe. What we like a lot at this park is there was arranged a bike parking. In my opinion, this park is over other parks from bigger cities and I consider that it will be a pleasure for us to stop everytime there for a break. At return, we were surprised by a wet road caused by the rainy weather, which, fortunately, was short and it didnât affect our route. We have enjoyed a lot by riding because we had not ridden since the last route from January and Iâm glad that the weather was suitable for a route like this.', 'uploads/180.jpg', 'uploads/187.png', 'uploads/191.png', 'uploads/184.png', '');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Eliminarea datelor din tabel `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `entry_id`) VALUES
(1, '1.jpg', '2020-01-07 09:31:05', '1'),
(2, '2.jpg', '2020-01-07 09:31:09', '1'),
(3, '3.jpg', '2020-01-07 09:31:16', '1'),
(4, '4.jpg', '2020-01-07 09:31:21', '1'),
(5, '5.jpg', '2020-01-07 09:31:25', '1'),
(6, '6.jpg', '2020-01-07 09:31:28', '1'),
(7, '7.jpg', '2020-01-07 09:31:31', '1'),
(8, '8.jpg', '2020-01-07 09:31:33', '1'),
(9, '9.jpg', '2020-01-07 09:31:36', '1'),
(10, '10.jpg', '2020-01-07 09:31:41', '1'),
(11, '11.jpg', '2020-01-07 09:40:42', '1'),
(12, '12.jpg', '2020-01-07 09:40:47', '1'),
(13, '13.jpg', '2020-01-07 09:40:53', '1'),
(14, '14.jpg', '2020-01-07 09:40:56', '1'),
(15, '15.jpg', '2020-01-07 09:41:00', '1'),
(16, '16.jpg', '2020-01-07 09:41:04', '1'),
(17, '17.jpg', '2020-01-07 09:41:13', '1'),
(18, '18.jpg', '2020-01-07 09:41:20', '1'),
(19, '19.jpg', '2020-01-07 09:41:24', '1'),
(20, '20.jpg', '2020-01-07 09:41:29', '1'),
(21, '21.jpg', '2020-01-07 09:41:34', '1'),
(22, '22.jpg', '2020-01-07 09:41:38', '1'),
(23, '23.jpg', '2020-01-07 09:41:42', '1'),
(24, '24.jpeg', '2020-01-07 10:32:15', '1'),
(25, '25.jpg', '2020-01-07 10:32:20', '1'),
(26, '26.jpg', '2020-01-07 10:32:28', '1'),
(27, '27.jpg', '2020-01-07 10:32:32', '1'),
(28, '28.jpg', '2020-01-07 10:32:36', '1'),
(29, '29.jpg', '2020-01-07 10:32:39', '1'),
(30, '30.jpg', '2020-01-07 10:32:43', '1'),
(31, '31.jpg', '2020-01-07 10:32:46', '1'),
(32, '32.jpg', '2020-01-07 10:32:50', '1'),
(33, '33.jpg', '2020-01-07 10:32:56', '1'),
(34, '34.jpg', '2020-01-07 10:32:58', '1'),
(35, '35.jpg', '2020-01-07 10:33:01', '1'),
(36, '36.jpg', '2020-01-07 10:33:04', '1'),
(37, '37.jpg', '2020-01-07 10:33:06', '1'),
(38, '38.jpg', '2020-01-07 10:33:10', '1'),
(39, '39.jpg', '2020-01-07 10:33:14', '1'),
(40, '40.jpg', '2020-01-07 10:33:16', '1'),
(41, '41.jpg', '2020-01-07 10:33:18', '1'),
(42, '42.jpg', '2020-01-07 10:33:22', '1'),
(43, '43.jpg', '2020-01-07 10:33:25', '1'),
(44, '44.jpg', '2020-01-07 10:33:27', '1'),
(45, '45.jpg', '2020-01-07 10:33:29', '1'),
(46, '46.jpg', '2020-01-07 10:33:31', '1'),
(47, '47.jpg', '2020-01-07 10:33:35', '1'),
(48, '48.jpg', '2020-01-07 10:33:40', '1'),
(49, '49.jpg', '2020-01-07 10:33:43', '1'),
(50, '50.jpg', '2020-01-07 10:33:46', '1'),
(51, '51.jpg', '2020-01-07 10:34:18', '1'),
(52, '52.jpg', '2020-01-07 10:34:22', '1'),
(53, '53.jpg', '2020-01-07 10:34:26', '1'),
(54, '54.jpg', '2020-01-07 10:34:28', '1'),
(55, '55.jpg', '2020-01-07 10:34:44', '2'),
(56, '56.jpg', '2020-01-07 10:37:59', '2'),
(57, '57.jpg', '2020-01-07 10:38:04', '2'),
(58, '58.jpg', '2020-01-07 10:38:09', '2'),
(59, '59.jpg', '2020-01-07 10:38:12', '2'),
(60, '60.jpg', '2020-01-07 10:38:17', '2'),
(61, '61.jpg', '2020-01-07 10:38:20', '2'),
(62, '62.jpg', '2020-01-07 10:38:27', '2'),
(63, '63.jpg', '2020-01-07 10:38:31', '2'),
(64, '64.jpg', '2020-01-07 10:38:34', '2'),
(65, '65.jpg', '2020-01-07 10:38:38', '2'),
(66, '66.jpg', '2020-01-07 10:38:41', '2'),
(67, '67.jpg', '2020-01-07 10:38:44', '2'),
(68, '68.jpg', '2020-01-07 10:38:49', '2'),
(69, '69.jpg', '2020-01-07 10:38:53', '2'),
(70, '70.jpg', '2020-01-07 10:38:56', '2'),
(71, '71.jpg', '2020-01-07 10:38:59', '2'),
(72, '72.jpg', '2020-01-07 10:39:01', '2'),
(73, '73.jpg', '2020-01-07 10:39:04', '2'),
(74, '74.jpg', '2020-01-07 10:46:12', '2'),
(75, '75.jpg', '2020-01-07 10:46:46', '2'),
(76, '76.jpg', '2020-01-07 11:16:49', '2'),
(77, '77.jpg', '2020-01-07 11:17:09', '2'),
(78, '78.jpg', '2020-01-07 11:17:20', '2'),
(79, '79.jpg', '2020-01-07 11:17:31', '2'),
(80, '80.jpg', '2020-01-07 11:17:41', '2'),
(81, '81.jpg', '2020-01-07 11:18:08', '2'),
(82, '82.jpg', '2020-01-07 11:18:04', '2'),
(83, '83.jpg', '2020-01-07 11:46:22', '2'),
(84, '84.jpg', '2020-01-07 11:19:59', '3'),
(85, '85.jpg', '2020-01-07 11:20:05', '3'),
(86, '86.jpg', '2020-01-07 11:20:15', '3'),
(87, '87.jpg', '2020-01-07 11:20:20', '3'),
(88, '88.jpg', '2020-01-07 11:20:25', '3'),
(89, '89.jpg', '2020-01-07 11:20:29', '3'),
(90, '90.jpg', '2020-01-07 11:20:34', '3'),
(91, '91.jpg', '2020-01-07 11:48:05', '3'),
(92, '92.jpg', '2020-01-07 11:48:08', '3'),
(93, '93.jpg', '2020-01-07 11:21:05', '3'),
(94, '94.jpg', '2020-01-07 11:49:07', '3'),
(95, '95.jpg', '2020-01-07 11:21:27', '3'),
(96, '96.jpg', '2020-01-07 11:44:00', '3'),
(97, '97.jpg', '2020-01-07 11:44:02', '3'),
(98, '98.jpg', '2020-01-07 11:44:03', '3'),
(99, '99.jpg', '2020-01-07 11:44:04', '3'),
(100, '100.jpg', '2020-01-07 11:44:06', '3'),
(101, '101.jpg', '2020-01-07 11:45:25', '3'),
(102, '102.jpg', '2020-01-07 11:45:28', '3'),
(103, '103.jpg', '2020-01-07 11:45:31', '3'),
(104, '104.jpg', '2020-01-07 11:45:35', '3'),
(105, '105.jpg', '2020-01-07 11:45:39', '3'),
(106, '106.jpg', '2020-01-07 11:45:41', '3'),
(107, '107.jpg', '2020-01-07 11:45:45', '3'),
(108, '108.jpg', '2020-01-07 11:45:48', '3'),
(109, '109.jpg', '2020-01-07 11:45:50', '3'),
(110, '110.jpg', '2020-01-07 11:45:52', '3'),
(111, '111.jpg', '2020-01-07 11:45:55', '3'),
(112, '112.jpg', '2020-01-07 12:23:59', '4'),
(113, '113.jpg', '2020-01-07 12:24:00', '4'),
(114, '114.jpg', '2020-01-07 12:24:02', '4'),
(115, '115.jpg', '2020-01-07 12:24:04', '4'),
(116, '116.jpg', '2020-01-07 12:24:06', '4'),
(117, '117.jpg', '2020-01-07 12:24:07', '4'),
(118, '118.jpg', '2020-01-07 12:24:10', '4'),
(119, '119.jpg', '2020-01-07 12:24:14', '4'),
(120, '120.jpg', '2020-01-07 12:24:19', '4'),
(121, '121.jpg', '2020-01-07 12:24:20', '4'),
(122, '122.jpg', '2020-01-07 12:24:22', '4'),
(123, '123.jpg', '2020-01-07 12:29:21', '5'),
(124, '124.jpg', '2020-01-07 12:29:23', '5'),
(125, '125.jpg', '2020-01-07 12:29:27', '5'),
(126, '126.jpg', '2020-01-07 13:21:50', '5'),
(127, '127.jpg', '2020-01-07 13:22:46', '5'),
(128, '128.jpg', '2020-01-07 13:22:55', '5'),
(129, '129.jpg', '2020-01-07 13:23:00', '5'),
(130, '130.jpg', '2020-01-07 13:23:09', '5'),
(131, '131.jpg', '2020-01-07 13:23:16', '5'),
(132, '132.jpg', '2020-01-07 13:23:20', '5'),
(133, '133.jpg', '2020-01-07 13:23:24', '5'),
(134, '134.jpg', '2020-01-07 13:23:28', '5'),
(135, '135.jpg', '2020-01-07 13:23:35', '5'),
(136, '136.jpg', '2020-01-07 13:23:39', '5'),
(137, '137.jpg', '2020-01-07 13:40:29', '5'),
(138, '138.jpg', '2020-01-07 13:40:58', '6'),
(139, '139.jpg', '2020-01-07 13:41:03', '6'),
(140, '140.jpg', '2020-01-07 13:42:05', '6'),
(141, '141.jpg', '2020-01-07 13:41:46', '6'),
(142, '142.jpg', '2020-01-07 13:41:47', '6'),
(143, '143.jpg', '2020-01-07 13:41:48', '6'),
(144, '144.jpg', '2020-01-07 13:41:51', '6'),
(145, '145.jpg', '2020-01-07 13:41:52', '6'),
(146, '146.jpg', '2020-01-07 13:41:54', '6'),
(147, '147.jpg', '2020-01-07 13:41:55', '6'),
(148, '148.jpg', '2020-01-07 13:41:57', '6'),
(149, '149.jpg', '2020-01-07 13:41:58', '6'),
(150, '150.jpg', '2020-01-07 13:41:58', '6'),
(151, '151.jpg', '2020-01-07 13:37:47', '6'),
(152, '152.jpg', '2020-01-07 13:37:48', '6'),
(153, '153.jpg', '2020-01-07 13:37:49', '6'),
(154, '154.jpg', '2020-01-07 13:37:50', '6'),
(155, '155.jpg', '2020-01-07 13:37:51', '6'),
(156, '156.jpg', '2020-01-07 13:37:52', '6'),
(157, '157.jpg', '2020-01-07 13:37:53', '6'),
(158, '158.jpg', '2020-01-07 13:37:54', '6'),
(159, '159.jpg', '2020-01-07 13:37:55', '6'),
(160, '160.jpg', '2020-01-07 13:37:56', '6'),
(161, '161.jpg', '2020-01-25 18:55:06', '7'),
(162, '162.jpg', '2020-01-25 18:55:06', '7'),
(163, '163.jpg', '2020-01-25 18:55:06', '7'),
(164, '164.jpg', '2020-01-25 18:55:06', '7'),
(165, '165.jpg', '2020-01-25 18:55:06', '7'),
(166, '166.jpg', '2020-01-25 18:55:06', '7'),
(167, '167.jpg', '2020-01-25 18:55:06', '7'),
(168, '168.jpg', '2020-01-25 18:55:06', '7'),
(169, '169.jpg', '2020-01-25 18:55:06', '7'),
(170, '170.jpg', '2020-01-25 18:55:06', '7'),
(171, '171.jpg', '2020-01-25 18:55:06', '7'),
(172, '172.jpg', '2020-01-26 07:15:42', '7'),
(173, '173.jpg', '2020-01-26 07:15:52', '7'),
(174, '174.jpg', '2020-01-26 07:16:02', '7'),
(175, '175.jpg', '2020-01-26 07:16:11', '7'),
(176, '176.jpg', '2020-01-26 07:16:23', '7'),
(177, '177.jpg', '2020-01-26 07:18:45', '7'),
(178, '178.jpg', '2020-01-26 07:18:54', '7'),
(179, '179.jpg', '2020-01-26 07:20:12', '7'),
(180, '180.jpg', '2020-03-07 16:18:39', '8'),
(181, '181.jpg', '2020-03-05 15:18:28', '8'),
(182, '182.jpg', '2020-03-05 15:18:28', '8'),
(183, '183.jpg', '2020-03-05 15:18:28', '8'),
(184, '184.jpg', '2020-03-07 16:18:34', '8'),
(185, '185.jpg', '2020-03-05 15:18:28', '8'),
(186, '186.jpg', '2020-03-05 15:18:28', '8'),
(187, '187.jpg', '2020-03-07 16:18:31', '8'),
(188, '188.jpg', '2020-03-05 15:18:28', '8'),
(189, '189.jpg', '2020-03-05 15:18:28', '8'),
(190, '190.jpg', '2020-03-05 15:18:28', '8'),
(191, '191.jpg', '2020-03-07 16:18:27', '8'),
(192, '192.jpg', '2020-03-05 15:18:28', '8'),
(193, '193.jpg', '2020-03-05 15:18:28', '8'),
(194, '194.jpg', '2020-03-05 15:18:28', '8'),
(195, '195.jpg', '2020-03-05 15:18:28', '8'),
(196, '196.jpg', '2020-03-05 15:18:28', '8');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL,
  `entry_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Eliminarea datelor din tabel `replies`
--

INSERT INTO `replies` (`reply_id`, `entry_id`, `comment_id`, `username`, `date`, `reply`) VALUES
(1, 1, 1, 'raulratiu9', '2019-07-23 20:42:57', 'Mersi mult! đŞđŞ'),
(2, 2, 2, 'raulratiu9', '2019-07-24 23:13:03', 'Mersi! Cum sa nu, abia astept sa facem trasee pe acolo.'),
(3, 1, 3, 'raulratiu9', '2019-07-24 23:32:26', 'Si eu le astept foarte mult, mersi frumos! đŞđŞ'),
(4, 3, 4, 'raulratiu9', '2019-09-04 20:41:01', 'Foarte frumos!');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `user_type`) VALUES
(1, 'raulratiu9', 'raulratiu2@gmail.com', '$2y$10$wRSJMA0HzLgzrx3yLGfWBOTpfHVPa97YDwhMgfyH338bdkL/RkFRu', 'php/avatars/20190914_163426(0).jpg', 'Admin'),
(2, 'FlaviuBumb', 'flaviu954@gmail.com', '$2y$10$sQ36by.nXNdCWOBerIgVCOmaor9ZqEQMKwfdMofi0Vfv2mNnL7SLS', 'php/avatars/IMG-20190628-WA0004.jpg', 'Member'),
(3, 'AndreiOprea', 'opreaa129@gmail.com', '$2y$10$JO1lJJOHs.dV.E7UUjZIbuzyn9sfDPqeYSdTaSw/XvNTnwamSMnWS', 'php/avatars/20151003_172951.jpg', 'Member'),
(4, 'SebiCerces', 'sebicerces@yahoo.com', '$2y$10$nqh5F4WvVEJ6I2f6gMAxyuXGxhqU3iFBEDqSVVp7DPOVKtQxWFegm', 'php/avatars/cerces.jpg', 'Member'),
(5, 'elupop89', 'emanuelpop89@yahoo.com', '$2y$10$Y7JXeoYf753EX9Zxb2IOl.Aw3dArZil5vlb0t6bp7wmRViUpNeQMq', 'php/avatars/Eu.jpg', 'Member');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexuri pentru tabele `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`entry_id`),
  ADD UNIQUE KEY `entry_title` (`entry_title`);

--
-- Indexuri pentru tabele `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD UNIQUE KEY `date` (`date`,`reply`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `entries`
--
ALTER TABLE `entries`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT pentru tabele `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
