<?php
include("header.php");
$today    = getdate();
$firstDay = getdate(mktime(0,0,0,$today['mon'],1,$today['year']));
$lastDay  = getdate(mktime(0,0,0,$today['mon']+1,0,$today['year']));


?>

<?php

echo '<table>';
echo '  <tr><th colspan="7">'.$today['month']." - ".$today['year']."</th></tr>";
echo '<tr class="days">';
echo '  <td>Mo</td><td>Tu</td><td>We</td><td>Th</td>';
echo '  <td>Fr</td><td>Sa</td><td>Su</td></tr>';
?> 

<?php
echo '<tr>';
for($i=1;$i<$firstDay['wday'];$i++){
    echo '<td>&nbsp;</td>';
}
$actday = 0;
for($i=$firstDay['wday'];$i<=7;$i++){
    $actday++;
    echo "<td>$actday</td>";
}
echo '</tr>';
?> 

<?php
$fullWeeks = floor(($lastDay['mday']-$actday)/7);

for ($i=0;$i<$fullWeeks;$i++){
    echo '<tr>';
    for ($j=0;$j<7;$j++){
        $actday++;
        echo "<td>$actday</td>";
    }
    echo '</tr>';
    }
    ?> 

    <?php
    if ($actday < $lastDay['mday']){
    echo '<tr>';

    for ($i=0; $i<7;$i++){
        $actday++;
        if ($actday <= $lastDay['mday']){
            echo "<td>$actday</td>";
        }
        else {
            echo '<td>&nbsp;</td>';
        }
    }

    echo '</tr>';
}
include("footer.php");
?> 