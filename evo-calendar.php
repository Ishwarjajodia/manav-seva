<?php
$con=mysqli_connect('localhost','root','','user');
    $sql="select * from client";
    $rs=mysqli_query($con,$sql);
    $a=array();
    while($row=mysqli_fetch_assoc($rs))
    {
        $date = $row["date"];
        $token = strtok( $date, "-");
        $d = array();
        while($token !==false)   
        {  
            $d[] =  $token;  
            $token =strtok("-");  
        }  
        $y = $d[0];
        $m = $d[1];
        $d = $d[2];
        switch ($m) {
            case "01":
                $m = "January";
                break;
            case "02":
                $m = "Febuary";
                break;
            case "03":
                $m = "March";
                break;
            case "04":
                $m = "April";
                break; 
            case "05":
                $m = "May";
                break;  
            case "06":
                $m = "June";
                break; 
            case "07":
                $m = "July";
                break; 
            case "08":
                $m = "August";
                break;
            case "09":
                $m = "September";
                break;          
            case "10":
                $m = "October";
                break; 
            case "11":
                $m = "November";
                break;
            case "12":
                $m = "December";
                break;      
            default:
              echo "No month!";
          }  
          $date = $m ."/". $d ."/". $y;
          $a[] = ['name' => "Booked", 'type' => "Book Seva", 'color' => "#ff0000",
          'date' => $date,];
        //$a[]="{"." name: $row[name], date: ". $m ."/". $d ."/". $y . "}";
    }
    $a=json_encode($a, JSON_UNESCAPED_SLASHES);
  echo "<html>
    <head>
        <title>My Evo Calendar</title>
        <link rel='stylesheet' type='text/css' href='evo-calendar/css/evo-calendar.min.css'/>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
    </head>
    <body>
       <div id='calendar'></div>
       <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
        <script src='evo-calendar/js/evo-calendar.min.js'></script>
        <script>
        $(document).ready(function() {
            $('#calendar').evoCalendar({
                'todayHighlight': true,
                'language' : 'en',
                'sidebarToggler' : true,
                'eventListToggler' : true,
                theme: 'Royal Navy',
                calendarEvents: 
                $a      
            })
        });
        </script>
        <div>
            <button class='btn btn-danger' >
                <a href='booksewa.html' class='goto'>Book Sewa</a>
              </button>
        </div>  
        </div>
    </body>
</html>"
?>