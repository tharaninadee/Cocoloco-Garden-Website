
<?php
function build_calendar($month, $year) {
    $mysqli = new mysqli('localhost', 'root', '', 'cocolocogarden');
    $stmt = $mysqli->prepare("select * from bookings where MONTH(date) = ? AND YEAR(date) = ?");
    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['date'];
            }
            
            $stmt->close();
        }
    }
    
    
     // Create array containing abbreviations of days of week.
     $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

     // What is the first day of the month in question?
     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

     // How many days does this month contain?
     $numberDays = date('t',$firstDayOfMonth);

     // Retrieve some information about the first day of the
     // month in question.
     $dateComponents = getdate($firstDayOfMonth);

     // What is the name of the month in question?
     $monthName = $dateComponents['month'];

     // What is the index value (0-6) of the first day of the
     // month in question.
     $dayOfWeek = $dateComponents['wday'];

     // Create the table tag opener and day headers
     
    $datetoday = date('Y-m-d');
    
    
    
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2 class='YearMonth'>$monthName $year</h2>";
    $calendar.= "<a class='btn btn-CalenderBtn' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a> ";
    
    $calendar.= " <a class='btn btn-CalenderBtn' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
    
    $calendar.= "<a class='btn btn-CalenderBtn' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";
    
    
        
      $calendar .= "<tr>";

     // Create the calendar headers

     foreach($daysOfWeek as $day) {
          $calendar .= "<th  class='Calheader'>$day</th>";
     } 

     // Create the rest of the calendar

     // Initiate the day counter, starting with the 1st.

     $currentDay = 1;

     $calendar .= "</tr><tr>";

     // The variable $dayOfWeek is used to
     // ensure that the calendar
     // display consists of exactly 7 columns.

     if ($dayOfWeek > 0) { 
         for($k=0;$k<$dayOfWeek;$k++){
                $calendar .= "<td  class='empty'></td>"; 

         }
     }
    
     
     $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  
     while ($currentDay <= $numberDays) {

          // Seventh column (Saturday) reached. Start a new row.

          if ($dayOfWeek == 7) {

               $dayOfWeek = 0;
               $calendar .= "</tr><tr>";

          }
          
          $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
          $date = "$year-$month-$currentDayRel";
          
            $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date==date('Y-m-d')? "today" : "";
         if($date<date('Y-m-d')){
             $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-Notavailable'>N/A</button>";
         }elseif(in_array($date, $bookings)){
             $calendar.="<td class='$today'><h4>$currentDay</h4> <button class='btn btn-Alreadybook'>Already Booked</button>";
         }else{
             $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='C_Reservation.php?date=".$date."' class='btn btn-ReseBook'>Book</a>";
         }
            

            
          $calendar .="</td>";
          // Increment counters
 
          $currentDay++;
          $dayOfWeek++;

     }
     
     

     // Complete the row of the last week in month, if necessary

     if ($dayOfWeek != 7) { 
     
          $remainingDays = 7 - $dayOfWeek;
            for($l=0;$l<$remainingDays;$l++){
                $calendar .= "<td class='empty'></td>"; 

         }

     }
     
     $calendar .= "</tr>";

     $calendar .= "</table>";

     echo $calendar;

}
    
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Assest/styletable.css" rel="stylesheet">
    
    <style>
    /* Table Styles */
    .container {
        
    
    }
    table {
        border-collapse: collapse;
        width: auto; /* Adjust the width as needed */
        margin: 0 auto; /* Center the table */
        height:200px;
       
    }

    th, td {
        border: 2px solid #556B2F ; /* Brown border color */
        padding: 5px;
        text-align: center;
        width: 20px;
        height:40px;
    }

    /* Header Styles */
    .Calheader {
        background-color: #D2B48C; /* Light brown background color for header */
        font-size: 18px; /* Header font size */
        color: #8B4513; /* Header text color */
        width:120px;
        font-weight:bold;
        font-family: "Poppins", sans-serif;
        
    }

    /* Body Styles */
    td {
        font-size: 20px; /* Body font size */
        color: #2E2E2E; /* Body text color */
        font-weight:bold;
        font-family: "Poppins", sans-serif;
        
    }

    /* Empty Cell Styles */
    .empty {
        background-color: #F5F5DC; /* Light beige background color for empty cells */
    }

    /* Today's Cell Styles */
    .today {
        background-color: darkgoldenrod; /* Light blue background color for today's date */
    }

    /* Button Styles */
    .btn {
        padding: 5px 10px;
        text-decoration: none;
        font-size: 14px;
        cursor: pointer;
        font-family: "Poppins", sans-serif;
        border: 2px solid #556B2F;
        font-weight:bold;
     

    }
    .btn:hover{
        color:#556B2F;
        cursor:pointer;
    }

    .btn-Notavailable {
        background-color: lightcoral; /* Light coral background color for 'N/A' button */
        color: #FFF;
    }

    .btn-Alreadybook{
        background-color: lightsalmon; /* Light coral background color for 'N/A' button */
        color: #FFF;
    }

    .btn-ReseBook{
        background-color: #C2DDB5; /* Lime green background color for 'Book' button */
        color: #FFF;
        margin-top:10px;
    }
    .btn-CalenderBtn{
        background-color: #8B4513; /* Lime green background color for 'Book' button */
        color: #FFF;

    }

    .YearMonth{
        font-size: 25px;
        color: #556B2F;
        font-family: "Poppins", sans-serif;
        align-items: center;
        font-weight: bold;
        margin-bottom:30px;
    }
    .greenbutton {
            background-color: #637f32 ;
            padding: 0.75rem 1.5rem;
            outline: none;
            border: none;
            font-size: 1rem;
            font-weight: 500;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
 

        .greenbutton:hover {
        background-color:  #4C622C;
        color: white;
        border: 1px solid white;
        }

 
    </style>
</head>

<body>


<div class="topic"><img class="coco" width="80" height="50" style="margin-right:100px;margin-left:30px;" role="img" src="../Image/loco.png">SELECT YOUR DAY OUTING DATE
<button class="greenbutton"style="margin-bottom:10px; margin-left:400px;"onclick="goBack('dayoutpackage.php')">Back</button>
</div>  
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                     $dateComponents = getdate();
                     if(isset($_GET['month']) && isset($_GET['year'])){
                         $month = $_GET['month']; 			     
                         $year = $_GET['year'];
                     }else{
                         $month = $dateComponents['mon']; 			     
                         $year = $dateComponents['year'];
                     }
                    echo build_calendar($month,$year);
                ?>
            </div>
        </div>
    </div>
    <br><br><br>
    <script>
    function goBack(phpPage) {
        // Navigate to the specified PHP page
        window.location.href = phpPage;
    }
</script>
<?php include ("footer2.php") ?>
</body>

</html>
