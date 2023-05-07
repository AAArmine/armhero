<?php
// English part of comming soon
define("CAPTION_EN", "<div class='caption'>Coming Soon</div>
  <div class='maincontent'>
    <div class='maintext'>
    Welcome to the “Coming soon” version of “Arm Hero” Project! Our platform is called to present our heroes and their heroic pathway. We have already collected a lot of biographical and documentary materials about them, but we are also looking for the stories about Your Hero. Click on the “Write Your Story” button and start writing.  
    We are working hard to meet the deadline and launch the Project! See you soon!  

   </div>
   <div > <a class='seemore' href='about.php'>See more</a></div>
   <div class='d-flex numbers'>
     <div class='numbers-item border-item'>
       <div class='number-it' id='days'></div>
       <div class='number-it2'>Days</div>
     </div>
     <div class='numbers-item border-item'>
       <div class='number-it' id='hours'></div>
       <div class='number-it2'>Hours</div>
     </div>
     <div class='numbers-item border-item'>
       <div class='number-it' id='minutes'></div>
       <div class='number-it2'>Minutes</div>
     </div>
     <div class='numbers-item'>
       <div class='number-it' id='seconds'></div>
       <div class='number-it2'>Seconds</div>
     </div>
   </div>
 </div>
 <div class='buttons d-flex'>
 <div ><a href= 'donate.php'><button class='btn1'>Support the project</button></a></div>

 <div ><a href='writestory.php'><button class='btn2 btn21'>Write Your Story</button></a></div>
 <div ><a href='article-first.php'><button class='btn2'>Read Story</button></a></div>
 </div>");

// Armenian part of comming soon
define("CAPTION_AM", "<div class='caption'>Շուտով․․․</div>
 <div class='maincontent'>
   <div class='maintext'>
   Բարի գալուստ «Հայ Հերոս» նախագիծ: Մեր հարթակը կոչված է ներկայացնելու մեր հերոսներին և նրանց հերոսական ուղին: Մենք արդեն հավաքագրել ենք բազմաթիվ կենսագրական և փաստագրական նյութեր նրանց մասին, բայց դու էլ կարող ես պատմել Քո Հերոսի մասին: Սեղմի՛ր «Ստեղծել նոր հոդված» կոճակը և պատմի՛ր մեզ նրա մասին:
   Կհանդիպե՛նք հենց ժամաչափը կանգ առնի։    
   </div>
   <div > <a class='seemore' href='about.php'>Տեսնել ավելին</a></div>
   <div class='d-flex numbers'>
    
     <div class='numbers-item border-item'>
       <div class='number-it' id='days'></div>
       <div class='number-it2'>Օր</div>
     </div>
     <div class='numbers-item border-item'>
       <div class='number-it' id='hours'></div>
       <div class='number-it2'>Ժամ</div>
     </div>
     <div class='numbers-item border-item'>
       <div class='number-it' id='minutes'></div>
       <div class='number-it2'>Րոպե</div>
     </div>
     <div class='numbers-item'>
       <div class='number-it' id='seconds'></div>
       <div class='number-it2'>Վայրկյան</div>
     </div>
   </div>
 </div>
 <div class='buttons d-flex'>
  <div ><a href= 'donate.php'><button class='btn1'>Աջակցել նախագծին</button></a></div>

  <div ><a href='writestory.php'><button class='btn2 btn21'>Ստեղծել նոր հոդված</button></a></div>
  <div ><a href='article-first.php'><button class='btn2'>Կարդալ պատմություն</button></a></div>
 </div>");

//Russian part
define("CAPTION_RU", "<div class='caption'>Скоро...</div>
 <div class='maincontent'>
    <div class='maintext'>
    Проект «Армянский герой» приветствует вас! Наша площадка призвана освещать жизнь и героический путь наших героев. Мы уже инициировали сборы биографических и документальных материалов о них, но вы тоже можете рассказать нам о Вашем Герое. Нажмите на кнопку “Создать новую статью” и расскажите нам о нем.
    Основная платформа будет запущена, как только таймер остановится.  До скорой встречи!   
    </div>
   <div > <a class='seemore' href='about.php'>See more</a></div>
   <div class='d-flex numbers'>
     <div class='numbers-item border-item'>
       <div class='number-it' id='days'></div>
       <div class='number-it2'>Дней</div>
     </div>
     <div class='numbers-item border-item'>
       <div class='number-it' id='hours'></div>
       <div class='number-it2'>Часов</div>
     </div>
     <div class='numbers-item border-item'>
       <div class='number-it' id='minutes'></div>
       <div class='number-it2'>Минут</div>
     </div>
     <div class='numbers-item'>
       <div class='number-it' id='seconds'></div>
       <div class='number-it2'>Секунд</div>
     </div>
   </div>
 </div>
 <div class='buttons d-flex'>
 <div ><a href= 'donate.php'><button class='btn1'>Поддержать проект</button></a></div>

 <div ><a href='writestory.php'><button class='btn2 btn21'>Создать новую статью</button></a></div>
 <div ><a href='article-first.php'><button class='btn2'>Читать Историю</button></a></div>
 </div>");

//inputs
// anhat
define("INPUTS_AM", "<div><div id='show1' class='inputs'>
 <div class='inpmoddiv inpmoddiv-r' id='inpmoddiv-name'><input type='text' placeholder='Անուն Ազգանուն' id='namemod' class='inpmod required'></div>
 
 </div>");

define("INPUTS_EN", "<div><div id='show1' class='inputs'>
<div class='inpmoddiv inpmoddiv-r' id='inpmoddiv-name'><input type='text' id='namemod'  placeholder='Name Surname' class='inpmod required' ></div>

</div>");

define("INPUTS_RU", "<div><div id='show1' class='inputs'>
<div class='inpmoddiv inpmoddiv-r' id='inpmoddiv-name'><input type='text' id='namemod'  placeholder='Имя Фамилия' class='inpmod required' ></div>

</div>");

// kazmakerputyun
define("INPUTS_com_AM", "<div id='show2' class='inputs'>
<div class='inpmoddiv' id='inpmoddiv-company'><input id='companymod' type='text' placeholder='Կազմակերպության անուն' class='inpmod required'></div>
<div class='inpmoddiv' id='inpmoddiv-tin'><input id='tinmod' type='text' placeholder='Կազմակերպության ՀՎՀՀ' class='inpmod required'></div>

<div class='inpmoddiv inpmoddiv-r' id='inpmoddiv-name-com'><input type='text' placeholder='Անուն' id='namemod-com' class='inpmod required'></div>
<div class='inpmoddiv inpmoddiv-r' id='inpmoddiv-surname-com'><input type='text' placeholder='Ազգանուն' id='surnamemod-com' class='inpmod required'></div>
<div class='inpmoddiv' id='inpmoddiv-position'><input type='text' placeholder='Պաշտոն' class='inpmod required' id='positionmod'></div>

</div>");

define("INPUTS_com_EN", "<div id='show2' class='inputs'>
<div class='inpmoddiv' id='inpmoddiv-company'><input id='companymod' type='text' placeholder='Company Name' class='inpmod required'></div>
<div class='inpmoddiv' id='inpmoddiv-tin'><input id='tinmod' type='text' placeholder='Company TIN' class='inpmod required'></div>

<div class='inpmoddiv inpmoddiv-r' id='inpmoddiv-name-com'><input type='text' id='namemod-com'  placeholder='Name' class='inpmod required' ></div>
<div class='inpmoddiv inpmoddiv-r' id='inpmoddiv-surname-com'><input type='text' placeholder='Surname' class='inpmod required' id='surnamemod-com'></div>
<div class='inpmoddiv' id='inpmoddiv-position'><input type='text' placeholder='Position' class='inpmod required'id='positionmod'></div>

</div>");

define("INPUTS_com_RU", "<div id='show2' class='inputs'>
<div class='inpmoddiv' id='inpmoddiv-company'><input id='companymod' type='text' placeholder='Название организации' class='inpmod required'></div>
<div class='inpmoddiv' id='inpmoddiv-tin'><input id='tinmod' type='text' placeholder='Инн компании' class='inpmod required'></div>

<div class='inpmoddiv inpmoddiv-r' id='inpmoddiv-name-com'><input type='text' id='namemod-com'  placeholder='Имя' class='inpmod required' ></div>
<div class='inpmoddiv inpmoddiv-r' id='inpmoddiv-surname-com'><input type='text' placeholder='Фамилия' class='inpmod required' id='surnamemod-com'></div>
<div class='inpmoddiv' id='inpmoddiv-position'><input type='text' placeholder='Должность' class='inpmod required'id='positionmod'></div>

</div>");

//last iputs
define(
    "INPUTS_last_AM",
    "
 <div class='inpmoddiv'><input id='emailmod' type='text' placeholder='էլ․ հասցե' class='inpmod required'></div>
 <div id='emailerror'></div>
 <div class='inpmoddiv1'><textarea id='commentmod' class='form-control' rows='4' placeholder='Մեկնաբանություն' ></textarea></div>
</div>"
);

define(
    "INPUTS_last_EN",
//  "<div class='inpmoddiv inpmoddiv-r' id='inpmoddiv-phone'><input type='tel'  class='inpmod required' id='phonemod'></div>
    "<div class='inpmoddiv'><input  id='emailmod' type='text' placeholder='Email' class='inpmod required'></div>
<div id='emailerror'></div>
<div class='inpmoddiv1'><textarea id='commentmod' class='form-control' rows='4' placeholder='Comment' ></textarea></div>
</div>"
);

define(
    "INPUTS_last_RU",
    "
<div class='inpmoddiv'><input  id='emailmod' type='text' placeholder='Эл. почта' class='inpmod required'></div>
<div id='emailerror'></div>
<div class='inpmoddiv1'><textarea id='commentmod' class='form-control' rows='4' placeholder='Kомментарий' ></textarea></div>
</div>"
);


define("TEXT_ABOUT_AM", "<span class='maincaption'>«Հայ Հերոս» հարթակի մասին</span></div>
<div class='main-text'>
Հայ ազգը իր պատմության ընթացքում ծնել է հազարավոր հայ հերոսներ, ովքեր հայրենիքի համար օրհասական պահերին իրենց կյանքն են զոհել մեր այսօրվա բարօրության համար։ Նրանց ճանաչելով ու նրանց սխրանքներով են կրթվել ապագա սերունդները։ Բազմաթիվ մերօրյա հերոսներ` կամավորագրված զինվորներ, բժիշկներ, լրագրողներ, ուսուցիչներ, երաժիշտներ և վարորդներ ապրում են մեր կողքին։ Նրանք պատերազմի դաշտ են մտել  առանց մեկ վայրկյան կասկածելու, որ իրենց ժամանակը, առողջությունը և մասնագիտական ունակությունները պիտի ներդրեն մեր հայրենիքի պաշտպանության համար։ Այսօր մենք նրանցից շատ քչերին ենք ճանաչում և շատ ավելի քչերի մասին ունենք հանրայնացված պատմություններ, որոնք կարող ենք փոխանցել մեր ապագա սերունդներին։ </br>
Հերոսները ապրում են, քանի դեռ ազգը հիշում է նրանց, իսկ ազգը չի կարող ապրել, պահպանելով իր ինքնությունը, եթե չունենա հերոսներ։</br>       
 
«Հայ Հերոս» հարթակը շահույթ չհետապնդող սոցիալական նախագիծ է, որը կոչված է մեր երկրի պաշտպանության, ազգային արժեքների ստեղծման և ամրապնդման գործում նշանակալի ներդրում ունեցած մարդկանց և հերոսների վերաբերյալ տեղեկատվության հավաքագրմանը, հրապարակմանը և ճանաչելիության տարածմանը։</br>
 
Մենք նախաձեռնել և հավաքագրել ենք հայ հերոսների մասին պատմող ծավալուն նյութեր (կենսագրական և փաստագրական), որոնք հրապարակվում և հրապարակվելու են <a href='#'>armhero.org</a> կայքում։ Կայքը իրենից ներկայացնում է \"wiki\" համակարգ, որտեղ հետագայում ցանկացած գրանցված օգտատեր կարող է ավելացնել նյութ իր հայ հերոսների մասին։</br>
 Ոչ մի հայ հերոս չպետք է մոռացվի։ Մեր հերոսները արժանի են, որ մենք իրենց մասին միշտ հիշենք։ Մեր հարթակը կոչված է լուսաբանելու հայ հերոսներին և նրանց հերոսական ճանապարհը։ 
Ներկայացնե՛նք և ճանաչե՛նք մեր հերոսներին ի փառս նրանց հիշատակի, ի պատիվ իրենց իրականացրած սխրագործությունների և ի գիտություն ապագա սերունդների։</br>
 
«Հայ Հերոս» նախագծի համահիմնադիրները շնորհակալություն են հայտնում բոլոր այն կամավորներին և նախագծի ընկերներին, ովքեր իրենց հանգանակություններով և խորհուրդներով օգնել են կյանքի կոչել հերոսների մասին պատմող միասնական հարթակ ունենալու գաղափարը ։

</div>
<div class='buttons-main'>
    <a href='donate.php'><button class='btn1'>Աջակցել նախագծին</button></a>
    <a href='writestory.php'><button class='btn2' data-toggle='modal' data-target='#exampleModalCenter'>Ստեղծել հոդված/պատմություն</button></a>
</div> ");

define("TEXT_ABOUT_EN", "<span class='maincaption'>About Armhero platform</span></div>
<div class='main-text'>
 
Throughout our history we have been blessed by thousands of heroes, many of whom sacrificed their lives for us and the future of Armenia. However, today we have forgotten so many of their stories as so little has been written about their lives and heroic deeds. Many of them who live among us have been forgotten simply because information about them is not concentrated in one place or is just missing, meaning these stories cannot be passed on to future generations. And this relationship with the heroes of the past is fundamental to understanding ourselves and who we are. Heroes live as long as the nation remembers them, and in turn a nation lives by preserving its identity and recognising heroes.</br>
 
Our platform wishes to create a space where the stories of nowaday Armenian heroes and their heroic deeds are compiled to create an anthology remembering them and their lives. We have initiated and collected an extensive amount of materials (biographical, documentary) about Armenian heroes, which will be published on <a href='#'>armhero.org</a> soon.</br>
 
The \"Arm Hero\" platform is a non-profit project that seeks to collect and disseminate information and promote awareness about our heroes, who have moulded us into who we are today, creating and strengthening our national values. It is built as a \"wiki\" system, where any registered user can add material about Armenian heroes (including soldiers, volunteers, doctors, journalists and other people who protected us and our country). You can find the initial launch page for our webpage following the link below. </br>
 
Now what we need is financial support for the final launch and further development of the project. We appeal to all those who are interested in joining our initiative, to support the <a href='#'>armhero.org</a> project. Join and help us enhance the quality of the project and safeguard against potential cybersecurity problems. We will appreciate any and all contributions.<br>
 
None of our heroes should be forgotten. Our heroes deserve to live on in our memories and in our hearts. Support us in recognizing our heroes for the glory of their memory and honour their heroic deeds as a legacy for future generations.
 
Our <a href='#'>armhero.org</a> website was built on the basis of \"Arm Hero\" project co-founders’ and volunteers’ donations with the direct support of the \"Startup Center\" NGO and we ensure transparency of the fundraising, after every purchase, we will upload payment invoices and name the service we bought for the webpage for future development and enhancement.


</div>
<div class='buttons-main'>
    <a href='donate.php'><button class='btn1'>Support the project</button></a>
    <a href='writestory.php'><button class='btn2' data-toggle='modal' data-target='#exampleModalCenter'>Write your story</button></a>
</div> ");


define("TEXT_ABOUT_RU", "<span class='maincaption'>О платформе \"Armheros\"</span></div>
<div class='main-text'>
 
За всю свою историю армянский народ родил тысячи армянских героев, многие из которых пожертвовали своей жизнью ради нашего нынешнего благополучия. Однако сегодня мы знаем очень мало о них и их героических поступках, которые мы можем передать нашим будущим поколениям. Сегодня рядом с нами живут современные герои - солдаты-добровольцы, врачи, журналисты, учителя, музыканты, водители, которые вышли на поле боя, ни на минуту не сомневаясь, что они должны вкладывать свое время, здоровье и профессиональные навыки в защиту нашей Родины. Сегодня мы знаем очень мало из них, многие из них забыты, потому что информация о них не сосредоточена в одном месте, а зачастую даже отсутствует․․․ Герои живут до тех пор, пока нация их помнит, а нация не может жить, сохраняя свою идентичность, если у нее нет героев. Наша площадка призвана освещать жизнь и героический путь наших героев. </br>
 
Платформа «Армянский герой» призвана собирать и распространять информацию о людях, внесших значительный вклад в создание и укрепление наших национальных ценностей. Мы инициировали сборы материалов об армянских героях (aвтобиографические и документальные), которые будут опубликованы на платформе <a href='#'>armhero.org</a>. </br>
 
Наша платформа создана как  система «вики», где любой зарегистрированный пользователь может добавить материал о своем герое. Мы не имеем права забывать ни об одном герое: Мы создаем контент во славу и памяти наших героев, в честь их подвигов и во имя будущих поколений.</br>
 Сайт создан на пожертвования учредителей проекта «Армянский герой» и волонтеров при прямой поддержке общественной организации «Стартап-центр».

</div>
<div class='buttons-main'>
    <a href='donate.php'><button class='btn1'>Поддержать проект</button></a>
    <a href='writestory.php'><button class='btn2' data-toggle='modal' data-target='#exampleModalCenter'>Создать новую статью</button></a>
</div> ");
