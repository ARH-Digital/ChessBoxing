<?php
    require "includes/header.inc.php";

    // Get information for current month
    $today = date("j"); // 1 - 31
    $month = date("F"); // January - December
    $mth = date("m"); // 01
    $year = date("Y"); // 2014
    $first = date("Y-m-01");
    $days = cal_days_in_month(CAL_GREGORIAN, $mth, $year);
    
    // Returns the first Day of the month
    $new = date_create("$first");
    $start = $new->format("w");
   
    // Used to determine how many spaces to fill the first week of the calendar.
    switch($start)
    {
        case 1:
            $empty = 0;
            break;
        case 2:
            $empty = 1;
            break;
        case 3:
            $empty = 2;
            break;
        case 4:
            $empty = 3;
            break;
        case 5:
            $empty = 4;
            break;
        case 6:
            $empty = 5;
            break;
        case 0:
            $empty = 6;
            break;
    }   
?>

<div class="row" style="background-image: url('img/dark_mosaic.png'); color: #FFF">
    <div class="col-md-12" style="text-align: center">
            <h1>Events</h1>
    </div>
    <br>
    <div class="col-md-4">
        <h4>Dates of events this month</h4>
        <br>
        
        <?php
            $file = "data/event.dates";
            $fh = fopen($file, "r");
            
            while(!feof($fh))
            {
                $eventDate = fgets($fh);
                if(preg_match("-$mth-", $eventDate))
                {
                    echo("$eventDate<br><br>");
                }
            }
            fclose($fh);
        ?>
        
    </div>
    <div class="col-md-4">
            
        <table border="1" style="width:100%; color: #000;" id="cal">
            <tr><th colspan="7"><?=$month?></th></tr>
            <tr><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th></tr>
            <tr>
            <?php
            // Fill in the blank dates at the beginning of the month
            $wkcounter = 1;
            while($empty > 0)
            {
                echo("<td></td>");
                $empty--;
                $wkcounter++;
            }

            // Fill the calendar with dates
            
            $j=1;
            
            $data = file_get_contents($file);

            while($j <= $days)
            {
                /* Odd issue occuring with the first date not reading in if other dates are present
                 * Also causing the 2nd to turn blue.
                 * If first date removed from evets.dates the 1st goes blue instead
                 * Issue appears to expand on later months...
                 */
                   
                if(strpos($data, date("Y-m-$j"))!= FALSE)
                {
                    echo("<th style='color: #00F'>$j</th>");// Blue dates if events exist
                }elseif($j == $today)
                {
                    echo("<th>$j</th>"); // Bolds today's date.
                }else{
                echo("<td>$j</td>");
                }
                $j++;
                $wkcounter++;

                // Once the end of the week is reached, start a new row.
                if($wkcounter > 7)
                {
                    echo("</tr><tr>");
                    $wkcounter = 1;
                }
            }
            
            // Finish the blank dates at the end of the calendar
            while($wkcounter > 1 && $wkcounter <= 7)
            {
                echo("<td></td>");
                $wkcounter++;
            }
            ?>

            </tr>
        </table>
        <br>
        
    </div>
    
    <div class="col-md-4">
        <h4>Dates of events Next month</h4>
        <br>
        
        <?php
            
            $fhandle = fopen($file, "r");
  
            while(!feof($fhandle))
            {
                $eventDate = fgets($fhandle);
                $nmth = $mth + 1;
                if(preg_match("-$nmth-", $eventDate))
                {
                    echo("$eventDate<br><br>");
                }
            }
            fclose($fhandle);
            // Unsure as to why this is also echoing a date from the next month...
            // Calendar is mostly working as intended, just a few glitches...
            
        ?>
        
        
    </div>
</div>
<?php
    require "includes/footer.inc.php";
?>