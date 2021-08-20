<?php

    namespace Models;

    class Mailer
    {
        public static function RegistrationMail($email)
        {
            //for email
            $subject = "Реєстрація салоні Muscle Cars";
            $message = "Дякуємо вам за реєстрацію!<br>
                        Класичні маслкари уже чекають на вас!";

            // Set content-type header for sending HTML email 
            $headers = "MIME-Version: 1.0" . "\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

            mail($email, $subject, $message, $headers);
        }

        public static function PurchaseEmail($email, $totalCount, $totalPrice, $cars)
        {
            //for email
            $to = $email;
            $subject = 'Покупка у салоні Muscle Cars';
            $message = "Дякуємо вам за покупку!
                        <hr>
                        Ви придбали: <br>".$cars;

            // Set content-type header for sending HTML email 
            $headers = "MIME-Version: 1.0" . "\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

            $message .= "   <hr>
                            <br>Загальна кількість - ".$totalCount."
                            <br>Загальна сума - ".$totalPrice."$
                            <br>Очікуйте поставок найближчим часом!";

            //sending email
            mail($to, $subject, $message, $headers);
        }
    }

?>