<?php

require_once __DIR__ . '/incs/data.php'; 
require_once __DIR__ . '/incs/functions.php';


if (!empty($_POST) ) {
    $fields = load($fields);
    if($errors = validate($fields)) {
        debug($errors);
    } else {
        require_once 'TCPDF-main/tcpdf.php';

        $tcpdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

        $tcpdf->SetPrintHeader(false);
        $tcpdf->setPrintFooter(false);
    
        $tcpdf->SetCreator('Создатель');
        $tcpdf->SetAuthor('Автор файла');
        $tcpdf->SetTitle('Название файла');
        $tcpdf->SetSubject('Тема');
        $tcpdf->SetKeywords('Ключевые слова');

        //Устанавливаем отступы от края для всех страниц (слева, сверху, справа, снизу)
        $tcpdf->SetMargins(25, 8, 5);

        $data_from_page = [$_GET['course'], $_GET['number'], $_GET['name'], $_GET['payment'], $_GET['qualification']];

        if ($_POST['value_button'] == 'budjet')
        {
            zaayvlenie($tcpdf, $data_from_page, $_GET['payment']);
            $tcpdf->AddPage();
            dogovor_budjet($tcpdf, $data_from_page);
        }
        elseif ($_POST['value_button'] == 'platnoe')
        {
            zaayvlenie($tcpdf, $data_from_page, $_GET['payment']);
            $tcpdf->AddPage();
            dogovor_platno($tcpdf, $data_from_page);
        }
        else
        {
            $budjet_platno = ["за счет средств республиканского бюджета", "на платной основе"];
            zaayvlenie($tcpdf, $data_from_page, $budjet_platno[0]);
            $tcpdf->AddPage();
            dogovor_budjet($tcpdf, $data_from_page);
            zaayvlenie($tcpdf, $data_from_page, $budjet_platno[1]);
            $tcpdf->AddPage();
            dogovor_platno($tcpdf, $data_from_page);
        }

        $tcpdf->Output('example_006.pdf', 'I');  
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    
    <form method="post" class="needs-validation" novalidate>

        <div class="headers">
            <div class="container">
                <div class="headers-holder">

                    <div class="header">

                        <div class="header-desc">
                            Допустить к участию в конкурсе для
                            получения среднего специального
                            образования<br>
                        </div>
                        
                        <div class="header-footer">
                            Директор ___________ В.С.Басов<br>
                        </div>

                        <div class="header-date">
                            ___ _________ 2023г.
                        </div>
                        
                    </div>

                    <div class="header">

                        <div class="header-desc">
                            Зачислить на <i><?=$_GET['course']?></i> курс на специальность 
                            <?=$_GET['number']?> <?=$_GET['name']?><br>
                        </div>
                        
                        <div class="header-footer">
                            Приказ ____ августа 2023г. № ____<br>
                        </div>

                        <div class="header-date">
                            Директор ___________ В.С.Басов
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
        
        <div class="from-basov">
            Руководителю учреждения образования &#171;Бресткий государственный
            технический унииверситет&#187; в лице директора филиала учреждения образования
            &#171;Бресткий государственный технический унииверситет&#187; Политехнический колледж
            Басова Виктора Степановича
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">

                    <div class="first-data">

                        <div class="form-group">
                            <label for="student_lastname">Фамилия</label>
                            <input name="student_lastname" type="text" class="form-control" 
                            id="student_lastname" placeholder="Иванов">
                        </div>

                        <div class="form-group">
                            <label for="student_firstname">Собственное имя</label>
                            <input name="student_firstname" type="text" class="form-control" 
                            id="student_firstname" placeholder="Иван">
                        </div>

                        <div class="form-group">
                            <label for="student_surname">Отчетсво</label>
                            <input name="student_surname" type="text" class="form-control" 
                            id="student_surname" placeholder="Иванович">
                        </div>

                        который(ая) проживает по адресу

                        <div class="form-group">
                            <label for="student_address-index">Индекс</label>
                            <input name="student_address-index" type="text" class="form-control" 
                            id="student_address-index" placeholder="224017">
                        </div>
                        <div class="form-group">
                            <label for="student_address-region">Область</label>
                            <!-- <input name="student_address-region" type="text" class="form-control" 
                            id="student_address-region" placeholder="Брестская"> -->
                            <select id="student_address-region" name="student_address-region">
                                <option value="Брестская">Брестская</option>
                                <option value="Витебская">Витебская</option>
                                <option value="Гомельская">Гомельская</option>
                                <option value="Гродненская">Гродненская</option>
                                <option value="Минская">Минская</option>
                                <option value="Могилевская">Могилевская</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="student_address-area">Район (если требуется)</label>
                            <input name="student_address-area" type="text" class="form-control" 
                            id="student_address-area" placeholder="Брестский">
                        </div>
                        <div class="form-group">
                            <label for="student_address-citytype">Город</label>
                            <select id="student_address-citytype" name="student_address-citytype">
                                <option value="город">город</option>
                                <option value="городской поселок">городской поселок</option>
                                <option value="агрогородок">агрогородок</option>
                                <option value="деревня">деревня</option>
                                <option value="село">село</option>
                            </select>
                            <input name="student_address-city" type="text" class="form-control" 
                            id="student_address-city" placeholder="Брест">
                        </div>
                        <div class="form-group">
                            <label for="student_address-street">Улица</label>
                            <input name="student_address-street" type="text" class="form-control" 
                            id="student_address-street" placeholder="Комсомольская">
                        </div>
                        <div class="form-group">
                            <label for="student_address-house">Дом</label>
                            <input name="student_address-house" type="text" class="form-control" 
                            id="student_address-house" placeholder="336">
                        </div>
                        <div class="form-group">
                            <label for="student_address-appartment">Квартира</label>
                            <input name="student_address-appartment" type="text" class="form-control" 
                            id="student_addressappartment" placeholder="52">
                        </div>
                        <div class="form-group">
                            <label for="student_address-homephone">Домашний телефон</label>
                            <input name="student_address-homephone" type="text" class="form-control" 
                            id="student_address-homephone" placeholder="8 0162 25-62-98">
                        </div>
                        <div class="form-group">
                            <label for="student_address-mobilephone">Мобильный телефон</label>
                            <input name="student_address-mobilephone" type="text" class="form-control" 
                            id="student_address-mobilephone" placeholder="+375 33 202 0202">
                        </div>

                        <div class="graduate">
                            <label for="student_graduate">и закончил(ла)</label>
                            <input name="student_graduate" type="text" class="form-control" 
                            id="student_graduate" placeholder="2023, ГУО &#171;СШ№27 г.Бреста&#187;">
                            <div class="additional">
                                <i>(год окончания, наименование учреждения образования)</i>
                            </div>
                        </div>
                        
                    </div>
                    

                </div>
            </div>
        </div>

        <div class="statement-title">
            ЗАЯВЛЕНИЕ
        </div>

        <div class="statement">
            Прошу допустить меня к участию в конкурсе для получения среднего
            специального образования по <b>специальности <?=$_GET['number']?>  <?=$_GET['name']?></b> в <b>дневной</b> форме получения образования
            <b><i><?=$_GET['payment']?></i></b>
        </div>

        <div class="student-data">
            О себе сообщаю следующие сведения:
        </div>

        <div class="form-group">
            <label for="student_birthday">Число, месяц, год рождения</label>
            <input name="student_birthday" type="text" class="form-control-3"
            id="student_birthday" placeholder="01.01.2000">
        </div>

        <div class="form-group">
            <label for="student_profession">Место работы, занимаемая должность (профессия)</label>
            <input name="student_profession" type="text" class="form-control-2"
            id="student_profession">
        </div>

        <div class="form-group">
            <label for="student_seniority">Трудовой стаж по профилю избранной специальности</label>
            <input name="student_seniority" type="text" class="form-control-2"
            id="student_seniority">
        </div>

        <div class="form-group">
            <label for="student_dormitory">Нуждаюсь в общежитии</label>
            <input name="student_dormitory" type="text" class="form-control"
            id="student_dormitory" placeholder="нет">
        </div>

        <div class="form-group">
            <label for="student_froeignlan">Изучал(ла) иностранный язык</label>
            <input name="student_froeignlan" type="text" class="form-control-3"
            id="student_froeignlan" placeholder="английский">
        </div>


        <div>
            Родители:
        </div>

        <div class="form-group">
            <label for="father_flsname"><b><i>Отец</i></b></label>
            <input name="father_flsname" type="text" class="form-control" 
            id="father_flsname" placeholder="Иванов Иван Петрович">                
        </div>

        <div class="form-group">
            <label for="father_address-index">Индекс</label>
            <input name="father_address-index" type="text" class="form-control" 
            id="father_address-index" placeholder="224017">
        </div>
        <div class="form-group">
            <label for="father_address-region">Область</label>
            <!-- <input name="father_address-region" type="text" class="form-control" 
            id="father_address-region" placeholder="Брестская"> -->
            <select id="father_address-region" name="father_address-region">
                                <option value="Брестская">Брестская</option>
                                <option value="Витебская">Витебская</option>
                                <option value="Гомельская">Гомельская</option>
                                <option value="Гродненская">Гродненская</option>
                                <option value="Минская">Минская</option>
                                <option value="Могилевская">Могилевская</option>
                            </select>
        </div>
        <div class="form-group">
            <label for="father_address-area">Район (если требуется)</label>
            <input name="father_address-area" type="text" class="form-control" 
            id="father_address-area" placeholder="Брестский">
        </div>
        <div class="form-group">
            <label for="father_address-citytype">Город</label>
            <select id="father_address-citytype" name="father_address-citytype">
                <option value="город">город</option>
                <option value="городской поселок">городской поселок</option>
                <option value="агрогородок">агрогородок</option>
                <option value="деревня">деревня</option>
                <option value="село">село</option>
            </select>
            <input name="father_address-city" type="text" class="form-control" 
            id="father_address-city" placeholder="Брест">
        </div>
        <div class="form-group">
            <label for="father_address-street">Улица</label>
            <input name="father_address-street" type="text" class="form-control" 
            id="father_address-street" placeholder="Комсомольская">
        </div>
        <div class="form-group">
            <label for="father_address-house">Дом</label>
            <input name="father_address-house" type="text" class="form-control" 
            id="father_address-house" placeholder="336">
        </div>
        <div class="form-group">
            <label for="father_address-appartment">Квартира</label>
            <input name="father_address-appartment" type="text" class="form-control" 
            id="father_address-appartment" placeholder="52">
        </div>
        <div class="form-group">
            <label for="father_address-homephone">Домашний телефон</label>
            <input name="father_address-homephone" type="text" class="form-control" 
            id="father_address-homephone" placeholder="8 0162 25-62-98">
        </div>
        <div class="form-group">
            <label for="father_address-mobilephone">Мобильный телефон</label>
            <input name="father_address-mobilephone" type="text" class="form-control" 
            id="father_address-mobilephone" placeholder="+375 33 202 0202">
        </div>


        <div class="form-group">
            <label for="mother_flsname"><b><i>Мать</i></b></label>
            <input name="mother_flsname" type="text" class="form-control" 
            id="mother_flsname" placeholder="Иванова Ольга Сергеевна">                
        </div>

        <div class="form-group">
            <label for="mother_address-index">Индекс</label>
            <input name="mother_address-index" type="text" class="form-control" 
            id="mother_address-index" placeholder="224017">
        </div>
        <div class="form-group">
            <label for="mother_address-region">Область</label>
            <!-- <input name="mother_address-region" type="text" class="form-control" 
            id="mother_address-region" placeholder="Брестская"> -->
            <select id="mother_address-region" name="mother_address-region">
                                <option value="Брестская">Брестская</option>
                                <option value="Витебская">Витебская</option>
                                <option value="Гомельская">Гомельская</option>
                                <option value="Гродненская">Гродненская</option>
                                <option value="Минская">Минская</option>
                                <option value="Могилевская">Могилевская</option>
                            </select>
        </div>
        <div class="form-group">
            <label for="mother_address-area">Район (если требуется)</label>
            <input name="mother_address-area" type="text" class="form-control" 
            id="mother_address-area" placeholder="Брестский">
        </div>
        <div class="form-group">
            <label for="mother_address-citytype">Город</label>
            <select id="mother_address-citytype" name="mother_address-citytype">
                <option value="город">город</option>
                <option value="городской поселок">городской поселок</option>
                <option value="агрогородок">агрогородок</option>
                <option value="деревня">деревня</option>
                <option value="село">село</option>
            </select>
            <input name="mother_address-city" type="text" class="form-control" 
            id="mother_address-city" placeholder="Брест">
        </div>
        <div class="form-group">
            <label for="mother_address-street">Улица</label>
            <input name="mother_address-street" type="text" class="form-control" 
            id="mother_address-street" placeholder="Комсомольская">
        </div>
        <div class="form-group">
            <label for="mother_address-house">Дом</label>
            <input name="mother_address-house" type="text" class="form-control" 
            id="mother_address-house" placeholder="336">
        </div>
        <div class="form-group">
            <label for="mother_address-appartment">Квартира</label>
            <input name="mother_address-appartment" type="text" class="form-control" 
            id="mother_address-appartment" placeholder="52">
        </div>
        <div class="form-group">
            <label for="mother_address-homephone">Домашний телефон</label>
            <input name="mother_address-homephone" type="text" class="form-control" 
            id="mother_address-homephone" placeholder="8 0162 25-62-98">
        </div>
        <div class="form-group">
            <label for="mother_address-mobilephone">Мобильный телефон</label>
            <input name="mother_address-mobilephone" type="text" class="form-control" 
            id="mother_address-mobilephone" placeholder="+375 33 202 0202">
        </div>

        <div class="form-group">
            <label for="privileges">Имею право на льготы</label>
            <input name="privileges" type="text" class="form-control"
            id="privileges" placeholder="нет">
        </div>

        <div class="form-group-1">
            <label for="parent_document"><i>Документ родителя (выберите, чей документ будет записан)</i></label>
            <select id="parent_document" name="parent_document">
                <option value="паспорт">паспорт</option>
                <option value="вид на жительство">вид на жительство</option>
                <option value="id card">id card</option>
            </select>
            <select id="parent_document_mum_or_dad" name="parent_document_mum_or_dad">
                <option value="mother">матери</option>
                <option value="father">отца</option>
            </select>
        </div>
        <div class="form-group">
            <label for="parent_passport_serial">Серия (при наличии)</label>
            <input name="parent_passport_serial" type="text" class="form-control" 
            id="parent_passport_serial" placeholder="КН">
        </div>
        <div class="form-group">
            <label for="parent_passport_number">Номер</label>
            <input name="parent_passport_number" type="text" class="form-control" 
            id="parent_passport_number" placeholder="1111111", autocomplete="off">
        </div>
        <div class="form-group">
            <label for="parent_passport_when">Когда выдан</label>
            <input name="parent_passport_when" type="text" class="form-control" 
            id="parent_passport_when" placeholder="01.02.2020", autocomplete="off">
        </div>
        <div class="form-group">
            <label for="parent_passport_who">Кем выдан</label>
            <input name="parent_passport_who" type="text" class="form-control" 
            id="parent_passport_who" placeholder="Ленинским РОВД г.Бреста">
        </div>
        <div class="form-group">
            <label for="parent_passport_identifical">Идентификационный номер</label>
            <input name="parent_passport_identifical" type="text" class="form-control-3" 
            id="parent_passport_identifical" placeholder="4301297С007РВ4", autocomplete="off">
        </div>



        <div class="form-group-1">
            <label for="child_document"><i>Документ ребенка       </i></label>
            <select id="child_document" name="child_document">
                <option value="паспорт">паспорт</option>
                <option value="вид на жительство">вид на жительство</option>
                <option value="id card">id card</option>
            </select>
        </div>
        <div class="form-group">
            <label for="child_passport_serial">Серия (при наличии)</label>
            <input name="child_passport_serial" type="text" class="form-control" 
            id="child_passport_serial" placeholder="КН">
        </div>
        <div class="form-group">
            <label for="child_passport_number">Номер</label>
            <input name="child_passport_number" type="text" class="form-control" 
            id="child_passport_number" placeholder="1111111", autocomplete="off">
        </div>
        <div class="form-group">
            <label for="child_passport_when">Когда выдан</label>
            <input name="child_passport_when" type="text" class="form-control" 
            id="child_passport_when" placeholder="01.02.2020", autocomplete="off">
        </div>
        <div class="form-group">
            <label for="child_passport_who">Кем выдан</label>
            <input name="child_passport_who" type="text" class="form-control" 
            id="child_passport_who" placeholder="Ленинским РОВД г.Бреста">
        </div>
        <div class="form-group">
            <label for="child_passport_identifical">Идентификационный номер</label>
            <input name="child_passport_identifical" type="text" class="form-control-3" 
            id="child_passport_identifical" placeholder="4301297С007РВ4", autocomplete="off">
        </div>

        <div>
            С правилами приема и порядком подачи апеляции ознакомлен(на).
        </div>

        <div class="footers">
            <div class="container">
                <div class="footers-holder">

                    <div class="footer">
                        <div class="footer-desc">
                            _____________________________<br>
                        </div>
                        <div class="additional-1">
                            (дата заполнения заявления)
                        </div>
                    </div>

                    <div class="footer">
                        <div class="footer-desc">
                            _____________________________<br>
                        </div>
                        <div class="additional-1">
                            (подпись)
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <?php if ($_GET['payment'] == 'за счет средств республиканского бюджета'): ?>
            <button type="submit" name="value_button" value="budjet" class="btn btn-primary">Подать на бюджет</button>
            <button type="submit" name="value_button" value="budjet_platnoe" class="btn btn-primary">Подать на бюджет + платное</button></p>
        <?php else: ?>
            <button type="submit" name="value_button" value="platnoe" class="btn btn-primary">Отправить</button></p>
        <?php endif; ?>
        
        </form>

    </body>
</html>