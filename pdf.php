<?php
$root = $_SERVER['DOCUMENT_ROOT'];
	
require_once 'TCPDF-main/tcpdf.php';

// Создаем новый PDF-документ
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
// $fontname = TCPDF_FONTS::addTTFfont($root.'/TCPDF-main/config/times2.ttf', '', 32);
$pdf->SetFont('timesnewromancyr', '', 13, '', false);
$pdf->SetCellHeightRatio(1);

$pdf->SetPrintHeader(false);
$pdf->setPrintFooter(false);

//Основная информация о файле
$pdf->SetCreator('Создатель');
$pdf->SetAuthor('Автор файла');
$pdf->SetTitle('Название файла');
$pdf->SetSubject('Тема');
$pdf->SetKeywords('Ключевые слова');

//Устанавливаем отступы от края для всех страниц (слева, сверху, справа, снизу)
//$pdf->SetMargins(10, 10, 10, 10);

// Устанавливаем шрифт, который будет использоваться в документе
$pdf->SetFont('timesnewromancyr', '', 13, '', false);

$pdf->AddPage(); // Добавляем страницу
$pdf->SetDrawColor(210, 100, 0); // Установка цвета (RGB)
$pdf->SetTextColor(71, 71, 71); // Установка цвета текста (RGB)




$lastname = htmlentities($_POST["lastname"]);
	$name = htmlentities($_POST["firstname"]);
	$otchestvo = htmlentities($_POST["otchestvo"]);
	$data_rojd = htmlentities($_POST["data_rojd"]);
	$adres = htmlentities($_POST["adres"]);
	$tell = htmlentities($_POST["tell"]);
	$obrz = htmlentities($_POST["obrz"]);
	$mest_rabot = htmlentities($_POST["mest_rabot"]);
	$staj = htmlentities($_POST["staj"]);
	$obshij = htmlentities($_POST["obshij"]);
	$in_language = htmlentities($_POST["in_language"]);
	$ligoti = htmlentities($_POST["ligoti"]);
	$numb_pass = htmlentities($_POST["numb_pass"]);
	$numb_indif = htmlentities($_POST["numb_indif"]);
	$data_pass = htmlentities($_POST["data_pass"]);
	$kem_pass = htmlentities($_POST["kem_pass"]);
	$lastname_otec = htmlentities($_POST["lastname_otec"]);
	$firstname_otec = htmlentities($_POST["firstname_otec"]);
	$otchestvo_otec = htmlentities($_POST["otchestvo_otec"]);
	$adres_otec = htmlentities($_POST["adres_otec"]);
	$tell_otec = htmlentities($_POST["tell_otec"]);
	$lastname_mama = htmlentities($_POST["lastname_mama"]);
	$firstname_mama = htmlentities($_POST["firstname_mama"]);
	$otchestvo_mama = htmlentities($_POST["otchestvo_mama"]);
	$adres_mama = htmlentities($_POST["adres_mama"]);
	$tell_mama = htmlentities($_POST["tell_mama"]);
	$numb_pass_pred = htmlentities($_POST["numb_pass_pred"]);
	$numb_indif_pred = htmlentities($_POST["numb_indif_pred"]);
	$data_pass_pred = htmlentities($_POST["data_pass_pred"]);
	$kem_pass_pred = htmlentities($_POST["kem_pass_pred"]);
	$plat_yes = "нет";
    if(isset($_POST["plat_yes"])) $plat_yes = "да";







// set some text for example
$txt = "Зачислить на первый курс\nна специальность 5-04-0714-01 «Технологическое\nобеспечение машиностроительного производства»\nПриказ ____ августа 2023 г. № ______\nДиректор  _____________________ В.С.Басов";
// Multicell test
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 87, 8, true);
$pdf->Ln(4);


$txt = "Руководителю учреждения образования «Брестский государственный";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 44, 37, true);

$txt = "технический университет» в лице директора филиала учреждения образования «Брестский государственный технический университет» Политехнический колледж Басова Виктора Степановича ";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 43, true);

$txt = "Фамилия: $lastname";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 60, true);

$txt = "Имя: $name";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 70, true);

$txt = "Отчество: $otchestvo\n(Если таковое имееться)";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 80, true);

$txt = "который(ая) проживает по адресу: $adres, $tell";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 90, true);

$txt = "и закончил(ла): $obrz";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 100, true);

$txt = "Заявление";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 97, 115, true);

$txt = "Прошу допустить меня к участию в конкурсе на получение среднего";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 44, 125, true);

$txt = "специального образования по специальности 5-04-0714-01 «Технологическое обеспечение машиностроительного производства» ";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 130, true);

$txt = "в дневной форме получения образования за счет средств республиканского бюджета";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 140, true);

$txt = "О себе сообщаю следующие сведения:";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 44, 150, true);

$txt = "число, месяц, год рождения: $data_rojd";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 155, true);

$txt = "место работы, занимаемая должность (профессия): $mest_rabot";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 160, true);

$txt = "трудовой стаж по профилю избранной специальности: $staj";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 165, true);

$txt = "нуждаюсь в общежитии (да, нет): $obshij ";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 170, true);

$txt = "изучал(а) иностранный язык: $in_language";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 175, true);

$txt = "родители:";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 180, true);

$txt = "отец: $lastname_otec $firstname_otec $otchestvo_otec ";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 185, true);

$txt = "проживает по адресу: $adres_otec $tell_otec";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 190, true);

$txt = "мать $lastname_mama $firstname_mama $otchestvo_mama";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 200, true);

$txt = "проживает по адресу: $adres_mama $tell_mama";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 205, true);

$txt = "имею право на льготы: $ligoti ";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 215, true);

$txt = "данные документа, удостоверяющего личность: $numb_pass, $data_pass, $kem_pass, $numb_indif  ";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 220, true);

$txt = "С правилами приема и порядком подачи апелляции ознакомлен(а).";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 235, true);


$today=date("d.m.Y", strtotime('+3 hours'));

$txt = "$today";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 25, 245, true);

$txt = "____________________________";
$pdf->MultiCell(0, 0, $txt, 0, '0', 0, 0, 87, 245, true);






$html = "
<p></p>
";

$pdf->writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='');
	
$pdf->Output($_SERVER['DOCUMENT_ROOT'] .'/file.pdf', 'FI'); // Сохранить и вывести в браузер