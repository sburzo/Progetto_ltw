<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<?php
                            $dbconn = pg_connect("host=localhost port=5432 dbname=LTWphp 
                                user=postgres password=adminPG") 
                                 or die('Could not connect: ' . pg_last_error());
                            echo'<h4>What Customers say about us</h4><br>';
                            if($dbconn){
                                $query = "select * from lab.recensioni order by id limit 2";
                                $res = pg_query($dbconn, $query);
                                $cont = 0;
                                
                                while($tuple = pg_fetch_array($res, null, PGSQL_ASSOC)){
                                    $n = $tuple['nome'];
                                    $d = $tuple['descrizione'];
                                    echo '<div class="review-item">
                                    <div class="ri-text">
                                        <h5>' . $n . ' </h5>
                                        <p>' . $d . '</p>                                    
                                    </div></div>';
                                    $cont++;
                                }
                                if($cont == 0){
                                    echo '<div class="ts-item"> There are no available testimonials</div>';
                                }
                            } else {
                                echo '<div class="ts-item ri-text"> There are no available testimonials
                                        </div>';
                            }
                    ?>
</body>
</html>