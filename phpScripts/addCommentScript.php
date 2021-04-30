<?php

    if(isset($_COOKIE["login"]))
    {
        include '../dbdata.php';
        include 'generalScripts.php';
        include 'DBmanager.php';
        include 'Car.php';
        include 'User.php';
        include 'Comments.php';
        
        //getting comment
        $comment = htmlspecialchars($_POST['commentText']);
        $carname = htmlspecialchars($_POST['carname']);
        $positive = $_POST["positiveComment"];
        $login = $_COOKIE['login'];
        
        $comments = new Comments($conn);
        $user = new User($conn, $login);
        $car = new Car($conn, $carname);
        //alert(empty(0));
        
        if(!empty($comment) && !empty($carname) && isset($positive) && !empty($login))
        {
            //getting user and car id for correct insert
            $user_id = $user->getUserColumn('ID');
            $car_id = $car->getCarColumn('ID');
            
            
            
            $comments->addComment($positive, $comment, $user_id, $car_id); //adding new comment
        }

        //updating commentsDiv
        $carComments = $comments->getCommentsForCar($carname);
        for($i = 0 ; $i < count($carComments); $i++)
        {
            $commentImage = $carComments[$i]['positive'] == 1 ? "like.png" : "dislike.png"; //is it positive or negative comment?

            echo "
                <div class='commentDiv'>
                    <table>
                        <tr>
                            <td width='10%' rowspan='2'>
                                <h4 style='text-align: center; margin-top: 10px;'>".$carComments[$i]["login"]."</h4>
                                <img src='images/".$carComments[$i]['avatar']."'>
                            </td>
                            <td width='85%'>
                                <b>Коментар було залишено ".$carComments[$i]['date']."</b>
                            </td>
                            <td width='5%' rowspan='2' align='center'>

                                <img src='images/".$commentImage."'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ".$carComments[$i]['commentText']."
                            </td>
                        </tr>
                    </table>
                </div>
            ";
        }
        if(empty($carComments)) echo "Наразі комментарів немає";

        //updating score text
        $score = $car->getAVGScore();
        $text = $score > 0 ? "{$score}% позитивних відгуків" : "Наразі відгуків немає";
        
        echo "  <script>
                    document.getElementById('scoreText').innerHTML = '{$text}';
                </script>";
    }
    else //redirecting to login page
    {
        gotoURL('../login.html');
    }

?>