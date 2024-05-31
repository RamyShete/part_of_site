<?php
require_once __DIR__ . '/incs/data.php'; 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
            .btn {
                padding-bottom: 3px;
            }
        </style>
    </head>
    <body>
        <h3>Специальности:</h3>

        <li>
            <?php echo $speciality['stroiteli']['number'], $speciality['stroiteli']['name']?>
            <ul>
                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['stroiteli']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['stroiteli']['name']?>">
                        <input type="hidden" name="course" value="первый">
                        <input type="hidden" name="payment" value="за счет средств республиканского бюджета">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['stroiteli']['qualification']?>">
                        <button type="submit">На базе 9-ти классов (Бюджет)</button>
                    </form>

                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['stroiteli']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['stroiteli']['name']?>">
                        <input type="hidden" name="course" value="первый">
                        <input type="hidden" name="payment" value="на платной основе">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['stroiteli']['qualification']?>">
                        <button type="submit">На базе 9-ти классов (Платно)</button>
                    </form>
            </ul>
        </li>

            
        <li><?php echo $speciality['dorozhiki']['number'], $speciality['dorozhiki']['name']?>
            <ul>
                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['dorozhiki']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['dorozhiki']['name']?>">
                        <input type="hidden" name="course" value="первый">
                        <input type="hidden" name="payment" value="за счет средств республиканского бюджета">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['dorozhiki']['qualification']?>">
                        <button type="submit">На базе 9-ти классов (Бюджет)</button>
                    </form>
                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['dorozhiki']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['dorozhiki']['name']?>">
                        <input type="hidden" name="course" value="первый">
                        <input type="hidden" name="payment" value="на платной основе">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['dorozhiki']['qualification']?>">
                        <button type="submit">На базе 9-ти классов (Платно)</button>
                    </form>
            </ul>
        </li>
        <li><?php echo $speciality['mechaniki']['number'], $speciality['mechaniki']['name']?>
            <ul>
                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['mechaniki']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['mechaniki']['name']?>">
                        <input type="hidden" name="course" value="первый">
                        <input type="hidden" name="payment" value="за счет средств республиканского бюджета">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['mechaniki']['qualification']?>">
                        <button type="submit">На базе 9-ти классов (Бюджет)</button>
                    </form>
                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['mechaniki']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['mechaniki']['name']?>">
                        <input type="hidden" name="course" value="первый">
                        <input type="hidden" name="payment" value="на платной основе">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['mechaniki']['qualification']?>">
                        <button type="submit">На базе 9-ти классов (Платно)</button>
                    </form>
                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['mechaniki']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['mechaniki']['name']?>">
                        <input type="hidden" name="course" value="второй">
                        <input type="hidden" name="payment" value="за счет средств республиканского бюджета">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['mechaniki']['qualification']?>">
                        <button type="submit">На базе 11-ти классов (Бюджет)</button>
                    </form>
                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['mechaniki']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['mechaniki']['name']?>">
                        <input type="hidden" name="course" value="второй">
                        <input type="hidden" name="payment" value="на платной основе">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['mechaniki']['qualification']?>">
                        <button type="submit">На базе 11-ти классов (Платно)</button>
                    </form>
            </ul>
        </li>
        <li><?php echo $speciality['radisty']['number'], $speciality['radisty']['name']?>
            <ul>
                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['radisty']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['radisty']['name']?>">
                        <input type="hidden" name="course" value="первый">
                        <input type="hidden" name="payment" value="за счет средств республиканского бюджета">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['radisty']['qualification']?>">
                        <button type="submit">На базе 9-ти классов (Бюджет)</button>
                    </form>
                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['radisty']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['radisty']['name']?>">
                        <input type="hidden" name="course" value="первый">
                        <input type="hidden" name="payment" value="на платной основе">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['radisty']['qualification']?>">
                        <button type="submit">На базе 9-ти классов (Платно)</button>
                    </form>
            </ul>
        </li>
        <li><?php echo $speciality['electroniki']['number'], $speciality['electroniki']['name']?>
            <ul>
                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['electroniki']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['electroniki']['name']?>">
                        <input type="hidden" name="course" value="первый">
                        <input type="hidden" name="payment" value="за счет средств республиканского бюджета">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['electroniki']['qualification']?>">
                        <button type="submit">На базе 9-ти классов (Бюджет)</button>
                    </form>
                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['electroniki']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['electroniki']['name']?>">
                        <input type="hidden" name="course" value="первый">
                        <input type="hidden" name="payment" value="на платной основе">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['electroniki']['qualification']?>">
                        <button type="submit">На базе 9-ти классов (Платно)</button>
                    </form>
            </ul>
        </li>
        <li><?php echo $speciality['uristy']['number'], $speciality['uristy']['name']?>
            <ul>
                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['uristy']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['uristy']['name']?>">
                        <input type="hidden" name="course" value="первый">
                        <input type="hidden" name="payment" value="на платной основе">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['uristy']['qualification']?>">
                        <button type="submit">На базе 9-ти классов (Платно)</button>
                    </form>
                    <form action="form_page.php" method="get" class="btn">
                        <input type="hidden" name="number" value="<?php echo $speciality['uristy']['number']?>">
                        <input type="hidden" name="name" value="<?php echo $speciality['uristy']['name']?>">
                        <input type="hidden" name="course" value="второй">
                        <input type="hidden" name="payment" value="на платной основе">
                        <input type="hidden" name="qualification" value="<?php echo $speciality['uristy']['qualification']?>">
                        <button type="submit">На базе 11-ти классов (Платно)</button>
                    </form>
            </ul>
        </li>

    </body>
