<?php
// English part of comming soon
define("INPUTS_EN", "<div class='sh-caption'>
Author of the article / story 
</div>
<div class='label labelname'>
<div class='absname'> Name Surname</div>
<input type='text' id='abs-name' class='form-control' name='name'>
<div class='shadow-hover-name'>
    Enter your first and last name
</div>
</div>
<div class='hiddenfield-name'>

</div>
<div class='label labelphone' id='labeltel'>
<input type='tel' class='form-control telinput' id='phonemod' onkeyup='this.value=this.value.replace(/^(\d{3})(?=\d)/,'$1 ')' name='phone'>
<div class='shadow-hover-phone'>
    Enter your phone number
</div>
</div>
<div class='hiddenfield-phone'>

</div>
<div class='label labelemail'>
<div class='absname'> Email Address </div>
<input type='text' id='abs-email' class='form-control' name='email'>
<div class='shadow-hover-email'>
    Enter your Email Address
</div>
</div>
<div class='hiddenfield-email'>

</div>
<div class='sh-caption2'>
Article / History
</div>
<div class='label labelcaption'>
<div class='absname'> Title </div>
<input type='text' id='abs-caption' class='form-control' name='caption'>
<div class='shadow-hover-caption'>
    Title your story, if the article is
    about a Hero, write the name
    and surname of the hero in the
    title field.
</div>
</div>
<div class='hiddenfield-caption'>

</div>
<div class='label labelabout'>
<div class='absname'> Who is it about?</div>
<input type='text' id='abs-about' class='form-control' name='about'>
<div class='shadow-hover-about'>
    Who is it about?
</div>
</div>
<div class='hiddenfield-about'>

</div>

<div class='label labeltext'>
<textarea rows='6' id='textarea-about' class='form-control' placeholder='Article/ Story text' name='text'></textarea>
<div class='shadow-hover-text'>
    Write the biographical text about
    the hero or the text of the story.
</div>
<div class='absline'>
    <label>
        <input type='file' id='files' name='files[]' multiple style='display:none'>
        <img src='../Icons/photo.png' alt='' id='addphoto'>
    </label>
</div>
<div class='hiddenfield1'>

</div>
</div>
<div id='preview'></div>

<div>
<!-- Button trigger modal -->

<button id='mainsubmit' type='button' class='btn1' data-toggle='modal' data-target='#mainmodal'>
    Send
</button>
</div>");

// Armenian part of comming soon
define("INPUTS_AM", "<div class='sh-caption'>
Հոդվածի / պատմության հեղինակը
</div>
<div class='label labelname'>
<div class='absname'> Անուն Ազգանուն</div>
<input type='text' id='abs-name' class='form-control' name='name'>
<div class='shadow-hover-name'>
    Գրեք Ձեր անուն ազգանունը:
</div>
</div>
<div class='hiddenfield-name'>

</div>
<div class='label labelphone' id='labeltel'>
<input type='tel' class='form-control telinput' id='phonemod' onkeyup='this.value=this.value.replace(/^(\d{3})(?=\d)/,'$1 ')' name='phone'>
<div class='shadow-hover-phone'>
    Գրեք Ձեր հեռախոսահամարը:
</div>
</div>
<div class='hiddenfield-phone'>

</div>
<div class='label labelemail'>
<div class='absname'> Էլ փոստի հասցե </div>
<input type='text' id='abs-email' class='form-control' name='email'>
<div class='shadow-hover-email'>
    Գրեք Ձեր էլեկտրենային հասցեն:
</div>
</div>
<div class='hiddenfield-email'>

</div>
<div class='sh-caption2'>
Հոդվածը / Պատմությունը
</div>
<div class='label labelcaption'>
<div class='absname'> Վերնագիրը </div>
<input type='text' id='abs-caption' class='form-control' name='caption'>
<div class='shadow-hover-caption'>
    Վերնագրեք Ձեր
    պատմությունը, եթե հոդվածը
    Հերոսի մասին է, վերնագիրը
    դաշտում գրեք հերոսի անուն
    ազգանունը։
</div>
</div>
<div class='hiddenfield-caption'>

</div>
<div class='label labelabout'>
<div class='absname'> Ո՞ւմ մասին է </div>
<input type='text' id='abs-about' class='form-control' name='about'>
<div class='shadow-hover-about'>
    Գրեք, թե ում է նվիրված հոդվածը:
</div>
</div>
<div class='hiddenfield-about'>

</div>
<div class='label labeltext'>
<textarea rows='6' id='textarea-about' class='form-control' placeholder='Հոդվածի / Պատմության տեքստը' name='text'></textarea>
<div class='shadow-hover-text'>
    Գրեք հերոսի կենսագրությունը կամ պատմությունը:
</div>
<div class='absline'>
    <label>
        <input type='file' id='files' name='files[]' multiple style='display:none'>
        <img src='../Icons/photo.png' alt='' id='addphoto'>
    </label>
</div>
<div class='hiddenfield1'>

</div>
</div>
<div id='preview'></div>

<div>
<!-- Button trigger modal -->

<button id='mainsubmit' type='button' class='btn1' data-toggle='modal' data-target='#mainmodal'>
    Ուղարկել
</button>
</div>");

// Armenian part of comming soon
define("INPUTS_RU", "<div class='sh-caption'>
Автор статьи / рассказа
</div>
<div class='label labelname'>
<div class='absname'> Имя Фамилия</div>
<input type='text' id='abs-name' class='form-control' name='name'>
<div class='shadow-hover-name'>
Введите свое имя и фамилию.
</div>
</div>
<div class='hiddenfield-name'>

</div>
<div class='label labelphone' id='labeltel'>
<input type='tel' class='form-control telinput' id='phonemod' onkeyup='this.value=this.value.replace(/^(\d{3})(?=\d)/,'$1 ')' name='phone'>
<div class='shadow-hover-phone'>
Введите свой номер телефона.
</div>
</div>
<div class='hiddenfield-phone'>

</div>
<div class='label labelemail'>
<div class='absname'>Адрес электронной почты</div>
<input type='text' id='abs-email' class='form-control' name='email'>
<div class='shadow-hover-email'>
Введите ваш адрес электронной почты.
</div>
</div>
<div class='hiddenfield-email'>

</div>
<div class='sh-caption2'>
Статья / История
</div>
<div class='label labelcaption'>
<div class='absname'> Заголовок </div>
<input type='text' id='abs-caption' class='form-control' name='caption'>
<div class='shadow-hover-caption'>
Назовите свою историю, если статья о Герое, напишите имя и фамилию героя в поле заголовка.
</div>
</div>
<div class='hiddenfield-caption'>

</div>
<div class='label labelabout'>
<div class='absname'> О ком идет статья? </div>
<input type='text' id='abs-about' class='form-control' name='about'>
<div class='shadow-hover-about'>
Напишите, кому посвящена статья.
</div>
</div>
<div class='hiddenfield-about'>

</div>
<div class='label labeltext'>
<textarea rows='6' id='textarea-about' class='form-control' placeholder='Текст статьи' name='text'></textarea>
<div class='shadow-hover-text'>
    Напишите биографию или рассказ героя.
</div>
<div class='absline'>
    <label>
        <input type='file' id='files' name='files[]' multiple style='display:none'>
        <img src='../Icons/photo.png' alt='' id='addphoto'>
    </label>
</div>
<div class='hiddenfield1'>

</div>
</div>
<div id='preview'></div>

<div>
<!-- Button trigger modal -->

<button id='mainsubmit' type='button' class='btn1' data-toggle='modal' data-target='#mainmodal'>
Отправить
</button>
</div>");

