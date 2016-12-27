﻿create database if not exists usuce;

USE usuce;


drop table if exists `users`;

create table users (
	name char(15) primary key, 
	passwd char(32) not null, 
	user_type enum('root','user'), 
	full_name varchar(70)
);

INSERT users VALUES('root',md5('111'),'root','');

drop table if exists `rules`;

create table rules (
	name char(15) not null, 
	news_type enum('site','stud','prep','science') not null, 
	access enum('read','write','root'), 
	primary key(name,news_type)
);

drop table if exists `news`;

create table news (
	d_create int primary key, 
	name char(15), 
	news_type enum('site','stud','prep') default 'stud', 
	lang enum('ua','ru','en') default 'ua' not null,  
	header varchar(100) not null, 
	body text not null, 
	d_modify int, 
	visible bool
);




CREATE TABLE `proekt` (
  `id` int unsigned auto_increment,
  `lang` enum('ua','ru','en'), 
	`nazvanie` varchar(200),
  `avtori` varchar(200),
  `horakteristiki` text,
  `patent` text,
  `analogi` text,
  `economika` text,
  `naznachenie` text,
	`gotovnost` text,
	`rezultati` text,
	`koordinati` text,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `kafedra` (
	`id` int unsigned auto_increment,
	`ua` varchar(50),
	`ru` varchar(50),
	`en` varchar(50),
	PRIMARY KEY (`id`)
);

CREATE TABLE `svyaz` (
	`proekt` int unsigned not null,
	`kafedra` int unsigned not null,
	PRIMARY KEY(`proekt`,`kafedra`)
);

INSERT INTO `proekt` VALUES ('1','ua','Електроізоляційні склокристалічні покриття для плівкових нагрівачів','Голеус В.І., Білий Я.І., Косенко О.В., Козирєва Т.І.','В різних технічних та побутових електроприладах знаходять широке застосування трубчаті електронагрівачі (ТЕН-и ). 

Значно поліпшити техніко-економічні показники цих приладів можливо за рахунок використання плівкових елктронагрівачів (ПЕН-ів), які виготовляються  з використанням підкладинок з різноманітних електроізоляційних матеріалів. Найбільш ефективними, с точки зору теплопередачі, та найбільш економічними, з точки зору технології виготовлення, є ПЕН-и, в яких, як підкладинка використовується емальована сталь. Особливістю цих підкладинок є те, що покриття, яке наноситься на сталь і відділяє її від провідникового шару, повинно характеризуватися одночасно високими електроізоляційними характеристиками та жаростійкістю.

Температура експлуатації покриттів, що виготовляються в даний час промисловістю, не перевищує 200<sup>0</sup>С. Температура експлуатації розроблених покриттів обумовлюється матеріалом струмоведучою доріжки (борідонікелевих провідників), які витримують температуру до 600<sup>0</sup>С. ККД плівкових нагрівачів складає понад 98%, що дає можливість рахувати їх більш перспективними, ніж трубчасті нагрівачі (ККД – не більше 30%)

Температура початку розм?якшення                                  понад 1000<sup>0</sup>С

Температурний коефіцієнт лінійного розширення           95-100*10<sup>-7</sup> град<sup>-1</sup>

Пробивна напруга                                                               понад 2500 В.

3. Патентно-конкурентноспроможні результати.

Патент 29864А України. МКИ<sup>6</sup> С03С8/02, 3/22. Склофрита для електроізоляційних склокристалічних покриттів на її основі/ Голеус В.І., Білий Я.І., Білий О.Я. та ін. (Україна). - №97094537; Заявлено 09.09.97; Опубл. 15.11.00, Бюл. №6.','Патент 29864А України. МКИ6 С03С8/02, 3/22. Склофрита для електроізоляційних склокристалічних покриттів на її основі/ Голеус В.І., Білий Я.І., Білий О.Я. та ін. (Україна). - №97094537; Заявлено 09.09.97; Опубл. 15.11.00, Бюл. №6.','Склад та технологія одержання покриттів відповідає світовому рівню. Аналогічних розробок в Україні не існує.','Враховуючи простоту та відносну дешевизну технології виготовлення ПЕН-ів на стальних підкладинках, а також перспективність їх використання, вказана технологія та матеріали можуть бути реалізовані на підприємствах України та країн СНД, які виробляють електронагрівальні прилади без значних капіталовкладень.','Результати розробки хімічного складу та технології нанесення електроізоляційних покриттів на жаростійку або маловуглецеву сталь можуть бути впроваджені на підприємствах, що випускають трубчасті, плівкові нагрівачі та друковані плати.','У 2002 році закінчилась госпдоговірна науково-дослідна робота з НВП “Лантан” (м. Львів) по темі “Розробка складу та основних технологічних параметрів одержання електроізоляційного склокристалічного покриття на сталі марки 08КП”. Розробка пройшла виробничі випробування з позитивними результатами і рекомендована до впровадження.','Електроізоляційні склокристалічні покриття пройшли виробничі випробування в умовах ВАТ “Завод Континент” (м. Зеленодольськ, Дніпропетровська обл..) та науково-виробничого об’єднання “Лантан” (м. Львів).

На цих підприємствах розпочато виготовлення ПЕН-ів та різних електронагрівальних приладів з їх застосуванням.','УДХТУ, пр. Гагаріна, 8, м. Дніпропетровськ, 49005;

Тел. (0562) 47-38-96, (0562) 47-33-97; факс (0562) 47-33-16;

Е-mail: ugxtu@dicht.dp.ua'), 
('2','ua','Харчова добавка “Лецитин” (ХДЛ)','О.Школа, Л.Полушкіна, В.Клочкова, Т.Кармазина, І.Глух, В.Гаманухо.','Дотепер в світі для одержання лецетину найбільш  широко використовують, фосфатидний концентрат соєвої олії. Основними виробниками є фірми “Central Soja Ink.” (США); “Lukas Meyer GmbH KG&Со”; “Stern Lecithin & Soja GmbH & Co.KG” (Німеччина), обсяг продукції яких складає десятки тис. тон на рік. Лецетинові препарати знаходять широке застосування при виробництві харчової продукції (маргарин, печеності, шоколад, креми тощо), та косметичних та фармацевтичних виробів. Лецетини є поверхнево активною речовиною з властивістю стабілізації емульсії та суспензії. Завдяки своїм багатофункціональним властивостям він широко використовує в якості емульгаторів, антирозбризкувачів, диспергуючих агентів та модифікаторів в’язкості. 

У зв’язку з переродженням деяких сортів соєвих бобів останнім часом в світі зростає зацікавленість у виробництві лецитину з фосфатидів соняшникової олії. 

В УДХТУ розроблена технологія отримання харчового лецетину з фосфатидів соняшникової олії, що є актуальним, оскільки Україна є одним з найбільших продуцентів соняшника у світі.

Основні характеристики: 

масова доля фосфатидів – не менше 93%; 

масова доля речовин, не розчинних в етиловому ефірі – 0,2%; 

кислотне число – не більше 10 мг КОН/г; 

масова доля олії – не більше 4,0%; 

масова доля вологи – не більше 1,5%.','Підготовлені матеріали для подачи заявки на отримання патенту України.

На основі технічних рішень цієї роботи спільно з Інститутом біоорганічної хімії АН Республіки Узбекистан підготовлені спільні Україно-Узбекські пропозиції по проекту Uzb-98 (І) “Розробка безвідходної технології та створення пілотної установки одержання госіполу і лецитину із олії бавовнику”, які мають розглядатися для фінансування НТЦУ (STCU) у травні 2003 року.','Згідно класифікації Європейської Ради лецетин, як харчова добавка, зареєстрований під індексом Е 322.

Нижче приведені основні порівняння основних характеристик ХДЛ соняшника (УДХТУ) з ХДЛ сої (Lukas Meyer), проведені в умовах фірми “Lukas Meyer GmbH KG&Со”; м. Гамбург.

 

 

ПК

НТ

ТГ

ТШХ

ХДЛ соняшника (УДХТУ)

норма

0,78

<1

норма

ХДЛ сої (Lukas Meyer)

норма

0,1

2,0

норма

ПК- перекисне число; НТ – нерозчинні в толуолі; ТГ – три гліцерин; 

ТШХ – тонкошарова хроматографія.','Дотепер харчові підприємства України імпортують харчовий соєвий лецетин. Наприклад, фірма “БЕАРС” реалізує соєвий лецитин виробництва фірми “Lukas Meyer GmbH KG&Со” (м. Гамбург) по ціні 9$ за кг, а український продукт має коштувати до 6$ за кг. Для визначення потужності промислового виробництва зараз проводяться роботи по маркетингу спільно з ЗАО “ДО ІРЕА”, після чого будуть визначені уточнені показники вартості.','Харчова галузь, Укрм’ясожирагропром
Бажане місце впровадження:
ЗАТ “Маслоекстракційний завод”, м. Дніпропетровськ

ЗАТ “Маслоекстракційний завод”, м. Пологи

ЗАО “ДО ІРЕА”, м. Дніпропетровськ','На ЗАО “ДО ІРЕА” створена дослідно-промислова установка виробництва харчової добавки Лецитин (ХДЛ), на якій напрацьовуються дослідно-промислові партії для проведення робіт по маркетингу. Розроблені технічні умови ТУ У 02070758.001-99, які зареєстровані у Держстандарті України.','Харчова добавка лецитин була опробувана при виробництві харчових продуктів на таких підприємствах м. Дніпропетровська:

-         Дніпропетровський холодокомбінат, при виробництві вафельних стаканчиків та шоколадної глазурі;

-         Хлібзавод №9, виробництво печива, вафельного листа;

-         Дніпропетровська кондитерська фабрика, при випічці двох видів печива “Суміш-12” та “Хокей”, а також вафельного листа.

Застосування харчової добавки лецитин в усіх вище вказаних продуктах показало позитивний ефект.

В Київському інституті харчових технологій харчова добавка лецитин була використана як один із компонентів при розробці покращувала хліба, використання якого дає можливість випікати хліб із некондиційного борошна.','УДХТУ, пр. Гагаріна, 8, м. Дніпропетровськ, 49005;

Тел. (0562) 41-75-01, (0562) 47-33-97; факс (0562) 47-33-16;

Е-mail: ugxtu@dicht.dp.ua'), 
('3','ua','Установка для тонкого помелу відходів сільськогосподарського виробництва','Шишков М.І., Сорока П.Г., Зражевський В.І., Опарін С.О., Задорожний В.М.','Установка дозволяє переробляти відходи сільськогосподарського виробництва на муку з розмірами частинок менших від 100 мкм. Такий продукт може бути використаним як наповнювач пластичних мас, як корм для тваринництва і таке інше.

Продуктивність установки до 100 кг/год при помелі таких матеріалів як солома, лушпиння соняшника і рису.

Потужність установки 30 кВт..','За даними розробки підготовлено заявку на винахід.','В світовій практиці подібні матеріали до мікронних розмірів не здрібнювались.','Дана розробка дозволяє використовувати рослинні відходи як наповнювач пластичних мас, що дає змогу одержувати більш дешеві і міцні пластмасові вироби  (економія полімеру сягає 50 %). Використання таких матеріалів як соняшникове лушпиння дозволяє одержувати корм для тварин з високим вмістом білку.','Результати розробки можуть бути використані у сільському господарстві, у хімічній промисловості та інших галузях.','ДКБ “Південне” виконало технічний розробило проект установки, а Південний машинобудівний завод виготовив напівпромисловий  зразок.','Результати одержані на рівні дослідних виробництв. Застосування муки із соняшникового лушпиння у покритті зварювальних електродів дає змогу повністю замінити електродну целюлозу. Проведені досліди у експериментальному господарстві Дніпропетровського аграрного університету для споживання великою рогатою худобою домішок муки із соняшникового лушпиння дали позитивні результати.','УДХТУ, пр. Гагаріна, 8, м. Дніпропетровськ, 49005;

Тел. (0562) 47-35-49, (0562) 47-33-97; факс (0562) 47-33-16;

Е-mail: ugxtu@dicht.dp.ua'), 
('4','ua','Технологія ефективної переробки відходів гумової промисловості','Ващенко Ю.М.','З метою ефективного використання  подрібнених гумових відходів розроблено низку модифікуючи-регенеруючих складів (МРС) для обробки гумової крихти та інших гумових відходів, наприклад, випресовок після вулканізації гумовотехнічних виробів. Попередня обробка гумової крихти МРС дозволяє не тільки регенерувати гуму, але й модифікувати її поверхню, що підвищує ступінь сумісності крихти з еластомерною матрицею та покращує комплекс властивостей гумових матеріалів, зокрема їх зносостійкість, стійкість до розростанню тріщин, стійкість до теплового старіння та інше.','Деклараційний патент на винахід 44171 А МКИ7 С 08К3/22, С08L9/00, С08К5/09. Гумова суміш/ Кутянова В.С., Терещук М.м., Рогачова Т.В., Ігнатенко А.С., Леванюк О.К. (Україна). – №2001064096, Заявлено 14.06.2002, Опубл. 15.01.2002, Бюл. №1.

Деклараційний патент на винахід 44170 А МКИ7. С 08К3/22, С08К9/02, С08L9/00. Гумова суміш/ Кутянова В.С., Леванюк О.К., Терещук М.М., Ігнатенко А.С. (Україна) № 2001064095, Заявлено 14.06.2002, Опубл. 15.01.2002, Бюл. №1.','Розроблена технологія дозволяє застосовувати модифіковану гумову крихту у складі протекторних гумових сумішей у кількості до 10% мас. без погіршення комплексу технологічних властивостей гумових сумішей та фізико-механічних характеристик вулканізаторів. При використанні оброблених гумових відходів у складі гум для виготовлення різних видів гумовотехнічних виробів їх вміст може бути збільшений до 70% мас. Світові аналоги передбачають використання спеціального обладнання.','Економічна ефективність даної розробки визначається тим, що знижується вміст каучукового компоненту в гумових композиціях. Собівартість модифікованої гумової крихти становить приблизно 20-30% від вартості каучуку. Тому при використанні модифікованої гумової крихти може бути досягнута значна економія каучуку без погіршення основних експлуатаційних показників гумових виробів.','Розробка може бути реалізована на підприємствах гумової промисловості, шиноремонтних заводах, на підприємствах де є виробництво різних гумовотехнічних виробів.','Розробка пройшла виробничі випробування з позитивними результатами і рекомендована до впровадження.','Технологія застосування МРС впроваджується на ряді шиноремонтних заводів (м. Миколаїв, м. Запоріжжя), на Горлівському заводі “Гумотехнічні вироби”.','УДХТУ, пр. Гагаріна, 8, м. Дніпропетровськ, 49005;

Тел., (0562) 67-23-80; (0562)47-33-97; факс (0562) 47-33-16;

Е-mail: ugxtu@dicht.dp.ua'), 
('5','ua','Контактні мастила нового покоління для ультразвукових перетворювачів приладів неруйнівного контролю, діагностики матеріалів та конструкцій','Ранський А.П., Панасюк О.Г., Шадов А.Ф., Степаненков Є.І.','Базовою складовою цих мастил є продукти взаємодії деяких неорганічних кислот з аміноспиртами, і комплексні сполуки 3d-металів з S, N-вмісними органічними речовинами. Базові речовини забезпечують високу адгезію контактного мастила між ультразвуковим перетворювачем та трубопроводом, по якому здійснюється переміщення рідини або газу, а також термостабільність та акустичну прозорість і стійкість до радіаційного випромінювання.

Акустичні контактні мастила в ультразвукових приладах можуть бути застосовані: 

–        для якісного контролю стану матеріалів і конструкцій в машинобудуванні, суднобудуванні, хімічній промисловості, авіабудуванні, ракетно-космічній техніці та інш.;

–        для обліку кількості та витрат рідких та газоподібних речовин в трубопроводах;

–        для контролю якісного стану деталей та вузлів агрегатів діючих атомних реакторів;

–        для контролю якісного стану деталей та вузлів рухомого складу залізничного транспорту та інш.','Розробки захищені двома патентами України.','Розроблені контактні мастила забезпечують акустичну прозорість межі розділу в акустичному тракті перетворювачів ультразвукових лічильників-витратомірів в 1,5-1,8 разів більшу, аніж в відомих світових аналогах; забезпечують проходження ультразвукового сигналу в температурному діапазоні роботи від –20 до +2000С; мають перевагу за адгезійними та антирадіаційними властивостями перед існуючими композиціями.','Технічні показники розроблених контактних мастил та їх відносно низька собівартість роблять їх економічно привабливими для просування на ринок.','Результати розробки можуть бути впроваджені на підприємствах машинобудування, суднобудування, у хімічній промисловості, залізничному транспорті, атомній промисловості.','Готовність розробки – 80%. Впровадження затримується відсутністю Технічних умов (ТУ) на розроблені контактні мастила.','Розробка одержала позитивну оцінку ВАТ Український науково-дослідний інститут технології машинобудування. При дослідно-промислових випробуваннях запропоновані мастила на 50% покращили термостабільність та акустичну прозорість ультразвукових лічильників-витратомірів.','Український державний хіміко-технологічний університет,

пр. Гагаріна, 8, м. Дніпропетровськ, 49005;

Тел. (0562) 47-34-16, (0562) 47-33-97; факс (0562) 47-33-16;

Е-mail: ugxtu@dicht.dp.ua'), 
('6','ua','Мастильні матеріали нового покоління з використанням полі функціональних присадних та композиційних матеріалів','Ранський А.П., Плошенко І.Г., Панасюк О.Г.','Суть роботи полягає в розробці технології отримання легірованих моторних, трансмісійних та інших пластичних та консистентних мастил на базі промислових та відпрацьованих індустріальних олив, поліфункціональних присадних матеріалів – деяких S, N-вмісних органічних речовин та координаційних сполук на їх основі, а також поліфункціональних композиційних матеріалів.

Присадні та композиційні матеріали забезпечують поліфункціональні (протизносні, навантажувальні, антифрикційні, антиокислювальні, протикорозійні) властивості запропонованим мастильним матеріалам, можливість роботи при значних навантаженнях та підвищених температурах.','Розробки захищені 3 патентами України на винаходи.','Склади запатентованих мастильних композицій за своїми технологічними властивостями не поступаються кращим світовим аналогам.','Використання таких мастил, наприклад в автомобільній промисловості дозволить зменшити знос двигуна більше ніж у 2 рази, на 10-20% зменшити витрати палива, в 2-3 рази зменшити витрати мастил.','Результати розробки можуть бути використані в автомобільній, металургійній промисловості та машинобудуванні, а також на трубних підприємствах.','Готовність розробки – 90%. Впровадження затримується відсутністю Технічних умов (ТУ) на розроблені композиції.','Проведені дослідно-виробничі випробування на ВАТ “Нижньодніпровський трубопрокатний завод” пар тертя в умовах високого навантаження (до 20МПа) та високих температур (4500С). Випробування показали збільшення в 1,5-2 рази терміну експлуатації мастильних матеріалів в порівнянні з найкращим аналогом дисульфідом молібдену.','Український державний хіміко-технологічний університет,

пр. Гагаріна, 8, м. Дніпропетровськ, 49005;

Тел. (0562) 47-34-16, (0562) 47-33-97; факс (0562) 47-33-16;

Е-mail: ugxtu@dicht.dp.ua'), 
('7','ua','Композиційні матеріали','Мокієнко Р.Л., Михайлова О.І., Ліпко О.О, Яшкіна О.М., Федосєєва О.А., Гришанкова В.С., Ткаченко С.М','Композиційні матеріали (КМ) являють собою ізотропні матеріали на основі термореактивних зв’язуючих, хаотично армованих хімічними волокнами. Частина компонентів не виробляються на території України і завозиться з Бєларусі і Росії. Розроблені КМ мають низький коефіцієнт тертя по сталі (0,08-0,12), високі стійкість до динамічних (ударна в\'язкість 40-100кДж/м2) і статичних (руйнівне напруження при вигині 100-170МПа і при стиску 100-200МПа) навантажень в умовах тертя без змащення, теплостійкістю за Мартенсом (180-250оС), водостійкістю (0,12-0,19%), а також хімічною стійкістю.

На основі розробленої в УДХТУ водорозчинної фенолоформальдегідної смоли з низьким вмістом фенолу (до 1%) розроблені КМ для одержання конструкційних композиційних пластиків, що володіють міцностними характеристиками, водостійкістю, теплостійкістю, коефіцієнтом тертя, аналогічними КМ, які одержують на основі серійних фенолоформальдегідних зв’язуючих, з більш високою токсичністю.','Одержано патент України на винахід №60619А','Розроблені КМ по вищеназваних фізико-механічних характеристиках перевершують відомі КМ.','Розроблені КМ рекомендуються до застосування замість бронзи, текстоліту, гуми. Вони перевершують текстоліт по ударній в\'язкості, водостійкості, міцності в 2-3 рази й у 10 разів по зносостійкості в умовах сухого тертя, їхня щільність нижче щільності металів і складає 1300-1400 кг/м3. При заміні деталей із бронзи у важконавантажених вузлах тертя термін служби виробів збільшився в 2,5-3 рази. Вартість виробів із розроблених КМ складає від 25 до 85 грн/кг.','Розроблений КМ може бути використаний в обладнанні металургійних, гірничозбагачувальних і хімічних підприємств для виготовлення підшипників ковзання, втулок, вкладишів, ущільнювальних кілець і інших виробів, здатних працювати у важконавантажених вузлах в умовах сухого тертя при підвищених температурах і в агресивних середовищах.','Розроблено промисловий технологічний регламент на виробництво препаратів та виробів з них і серійні технічні умови на вироби.','Розробка пройшла випробування на ЗАГСТІ "Росава" (м. Біла Церква) та на прокатному стані підприємства “Криворіжсталь”, отримані рекомендації до впровадження. Передано зразки для випробування як підшипник ковзання в шпиндельному вузлі верстата по обробці алмазів Вінницького заводу "Кристал".','Український державний хіміко-технологічний університет, 

пр. Гагаріна, 8, м. Дніпропетровськ, 49005;

Тел. (0562) 47-05-88, (0562) 47-33-97; факс (0562) 47-33-16;

Е-mail: ugxtu@dicht.dp.ua'), 
('8','ua','Композиції для просочування шкіри та целюлозовміщуючих матеріалів','Кузьменко М.Я., Бугрим В.В., Бухарський Г.П., Долгих В.О.','Розроблено композиції для використання при виробництві шкіряних виробів, які забезпечують високу гідрофобність, теплозахисні властивості, міцність, довго тривалість використання та повітряпрониклівість. Ці властивості досягаються шляхом попередньої обробки шкіряних виробів спеціального складу (на стадії отримання шкіряного матеріалу з шкір тварин) 2-5% розчином органічних речовин. Для надання гідрофобних властивостей целюлозовміщуючим матеріалам (папір, тканина, деревина) вони обробляються 1-2% розчином запропонованих композицій, що дозволяє підвищити в 1,5-2 рази їх механічні характеристики після перебування у воді протягом доби.','Розробка захищена 2 патентами України на винахід.','Розроблені композиції відповідають кращим світовим аналогам.','Розроблені композиції дозволять подовжити термін експлуатації виробів із шкіри та целюлозовміщуючих матеріалів, зберігаючи їх властивості при експлуатації виробів у вологих умовах. Вони можуть вироблятися в будь-якому необхідному об’ємі для вітчизняного виробництва. Композиції можуть використовуватись як в Україні, так і за її кордоном.','Легка промисловість, підприємства по виробництву товарної шкіри з тваринної сировини, паперу, тканини та інш..','Технологія отримання композицій опробувана в дослідно-промислових умовах.','Проведені розширені випробування в дослідно-промислових умовах Українського науково-дослідного інституту механічної обробки деревини (м. Київ), вони показали, що зразки деревини після їх обробки розробленою композицією, на 60% підвищили свої механічні характеристики після їх перебування у воді протягом 24 годин.','Український державний хіміко-технологічний університет,

пр. Гагаріна, 8, м. Дніпропетровськ, 49005;

Тел. (0562) 47-05-88, (0562) 47-33-97; факс (0562) 47-33-16;

Е-mail: ugxtu@dicht.dp.ua'), 
('9','ua','Безфтористі безпігментні світлозабарвлені емалеві покриття','Я.І.Білий, С.М.Пономарчук, С.Ю.Науменко, Р.І.Кислична, І.В. Комелькова, Н.О.Мінакова, Т.І.Нагорна.','Розроблені наукові засади перспективних технологій одержання світлозабарвлених емалевих покриттів для емалевих виробів з використанням іонообмінних та адсорбційних процесів.','Одержано 4 патенти на винахід: Пат.№51109А, опубл.15.11.2002; Пат.№52310А, опубл. 16.12.2202; Пат. №53213А, опубл.15.01.2003; Пат.№53214А, опубл.15.01.2003.','Аналогів за конкретною  технологією не існує.','Економічний ефект буде забезпеченим за рахунок використання нової технології, що передбачає застосування барвників, вартість яких в 3 рази менша, ніж тих, що використовуються у виробництві; спрощення та скасування окремих енергоємних технологічних операцій.','Підприємства, які виробляють товари господарчо-побутового призначення, в будівельній промисловості, архітектурі та на транспорті.','Розроблені нові безфтористі безпігментні світлозабарвлені покриття готові до широких випробувань та впровадження в виробництво','Частково проведені та продовжуються виробничі випробування розроблених світлозабарвлених емалевих покриттів по новій технології УДХТУ; одержані акти випробувань з позитивними результатами.','Український державний хіміко-технологічний університет,

пр. Гагаріна, 8, м. Дніпропетровськ, 49005;

Тел. (0562) 47-34-16, (0562) 47-33-97; факс (0562) 47-33-16;

Е-mail: ughtu@dicht.dp.ua'), 
('10','ua','Термостійка склокераміка с реакційно формуємою структурою','д.т.н., проф. Голеус В.І., к.т.н., доцент Носенко О.В., к.т.н., доцент Ільченко Н.Ю., к.т.н., ас. Ка','Розроблено енергозберігаючу технологію одержання щільних і пористих термостійких склокерамічних матеріалів у системах Li2O-Al2O3-SiO2 і BaO-Al2O3-SiO2. Склокерамічні матеріали можуть бути використані в різних областях техніки, наприклад, для виготовлення підкладинок плоских електронагрівальних елементів; спеціального термостійкого посуду; як носії каталізаторів у фільтрах очищення вихлопних газів автомобілів, для окислювання аміаку до окису азоту і т.д.','Розроблені матеріали характеризуються відмінними експлуатаційними властивостями, а технологія їх одержання є енергозберігаючою, унаслідок чого представляються патенто- і конкурентоспроможними. Готуються матеріали для подачі заявки на отримання патенту України.','Не уступають світовим аналогам','Значне зниження температури варіння базових стекол (з 1600оС до 1300оС) у порівнянні з існуючою технологією виготовлення аналогічних матеріалів приводить до істотного зниження енергоємності їх одержання.','Підприємства хімічної й електротехнічної промисловості.','Ступінь готовності - 90%.','В умовах підприємства ПО "Континент", м. Зеленодольск виготовлені експериментальні зразки плоских нагрівальних елементів великої потужності на підкладинках з розроблених склокерамічних матеріалів. Робота впроваджена на НВП “Лантан”, м. Львов при оснащенні залізничних вагонів.','Український державний хіміко-технологічний університет,

пр. Гагаріна, 8, м. Дніпропетровськ, 49005;

Тел. (0562) 47-34-16, (0562) 47-33-97; факс (0562) 47-33-16;

Е-mail: ughtu@dicht.dp.ua

Тел. (0562) 47-34-16, (0562) 47-33-97; факс (0562) 47-33-16;

Е-mail: ughtu@dicht.dp.ua'), 
('11','ua','Підбір складу композиційних сумішей на нецементному в’яжучому для заповнення гірничих виробіток','Кулік В.О., Салєй А.А., Кравченко Т.В., Сігунов О.О., Стрельченко І.С.','Відпрацьовані простори після видобутку корисних копалин представляють серйозну безпеку внаслідок осадки та зміщення порід, обвалів та утворення воронок. Ці екологічні явища представляють певну загрозу для населення, тому потребують їх запобігання шляхом заповнення відпрацьованих просторів твердіючими сумішами, які з часом стають досить міцними. В якості таких можливо використовувати цементні композиції, але такі суміші мають значну собівартість.

Розроблені нецементні композиції у вигляді шлакопісчаних розчинів за нетривалий час навіть в умовах постійної дії підземних вод здатні оволодівати міцністю та протистояти тиску зсуву порід.

Варіювання складу та лужно-сульфатна активація твердіння шлакової складової сумішей дозволяє підвищити міцність закладних сумішей та знизити тривалість їх твердіння.','Розроблені склади закладних сумішей мають незначну собівартість, реальні для умов України та мають велике господарське значення. Готуються матеріали для подачі заявки на отримання патенту України.','В аналогічних закордонних розробках в якості в’яжучого використовують цемент, що підвищує витрати на виготовлення закладних сумішей.','Запропоновані склади закладних сумішей дають змогу зменшити терміни їх твердіння до набору необхідної міцності, що в свою чергу дозволяє проводити подальший видобуток корисних копалин.','Результати розробки можуть бути реалізовані на підприємствах Міністерства палива і енергетики України.','Науково-дослідна робота є завершеною.','Науково-дослідна робота впроваджена на підприємствах м. Жовті Води.','Український державний хіміко-технологічний університет,

пр. Гагаріна, 8, м. Дніпропетровськ, 49005;

Тел. (0562) 47-34-16, (0562) 47-33-97; факс (0562) 47-33-16;

Е-mail: ughtu@dicht.dp.ua');
