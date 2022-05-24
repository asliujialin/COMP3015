<?php
	function isLeapYear($year){
		if ((($year % 4) == 0) && ((($year % 100) != 0) || (($year %400) == 0))){
			return true;
		}else {
		    return false;
		}
	}

	function monthConvert($month){
		switch ($month) {
	        case "January":
		        return 1;
		        break;
			
			case "February":
		        return 4;
		        break;

			case "March":
		        return 4;
		        break;

			case "April":
		        return 0;
		        break;

			case "May":
		        return 2;
		        break;

			case "June":
		        return 5;
		        break;

			case "July":
		        return 0;
		        break;

			case "August":
		        return 3;
		        break;

			case "September":
		        return 6;
		        break;

			case "October":
		        return 1;
		        break;

			case "November":
		        return 4;
		        break;

			case "December":
		        return 6;
		        break;

	        default:
		        return 0; 
		        break;
		}

	}

	function dayOfWeek($int){
		switch ($int) {
	        case 0:
		        return "Saturday";
		        break;
			
			case 1:
		        return "Sunday";
		        break;

			case 2:
		        return "Monday";
		        break;

			case 3:
		        return "Tuesday";
		        break;

			case 4:
		        return "Wednesday";
		        break;

			case 5:
		        return "Thursday";
		        break;

			case 6:
		        return "Friday";
		        break;
		}

	}

	function getDayOfTheWeek($year, $month, $day){
		$s1 = intdiv(substr($year, -2), 12);
		$s2 = substr($year, -2) % 12;
		$s3 = intdiv($s2, 4);
		if (isLeapYear($year) && ($month == "January" || $month == "February")) {
	        $s5 = monthConvert($month) - 1;
		    $s6 = ($s1 + $s2 + $s3 + $s5 + $day) % 7;
			echo "1";
		    return dayOfWeek($s6);
        }elseif (substr($year,0,2) == 16){
			$s5 = monthConvert($month) + 6;
		    $s6 = ($s1 + $s2 + $s3 + $s5 + $day) % 7;
		    return dayOfWeek($s6);
		}elseif (substr($year,0,2) == 17){
			$s5 = monthConvert($month) + 4;
		    $s6 = ($s1 + $s2 + $s3 + $s5 + $day) % 7;
		    return dayOfWeek($s6);
		}elseif (substr($year,0,2) == 18){
			$s5 = monthConvert($month) + 2;
		    $s6 = ($s1 + $s2 + $s3 + $s5 + $day) % 7;
		    return dayOfWeek($s6);
		}elseif (substr($year,0,2) == 20){
			$s5 = monthConvert($month) + 6;
		    $s6 = ($s1 + $s2 + $s3 + $s5 + $day) % 7;
		    return dayOfWeek($s6);
		}elseif (substr($year,0,2) == 21){
			$s5 = monthConvert($month) + 4;
		    $s6 = ($s1 + $s2 + $s3 + $s5 + $day) % 7;
		    return dayOfWeek($s6);
		}else{
			$s5 = monthConvert($month);
			$s6 = ($s1 + $s2 + $s3 + $s5 + $day) % 7;
			echo "2";
			return dayOfWeek($s6);
		}
	}

	//getDayOfTheWeek(2000, "August", 2);
	//echo getDayOfTheWeek(1989, "August", 16);
	//echo getDayOfTheWeek(2019, "January", 1);
	//echo getDayOfTheWeek(2021, "December", 31);
	//echo getDayOfTheWeek(2022, "May", 23);

	function makeCalendar(){
		$month = array(1=>"January", 2=>"February", 3=>"March", 4=>"April", 5=>"May", 6=>"June", 7=>"July", 8=>"August", 9=>"September", 10=>"October", 11=>"November", 12=>"December");
		foreach ($month as $num => $char){
			if ($num == 1 || $num == 3 || $num == 5 || $num == 7 || $num == 8 || $num == 10 || $num == 12){
				for($i = 1; $i <= 31; $i++){
					$dayName = getDayOfTheWeek(2022, $month[$num], $i);
					echo $num."-".$i."-2022 is a ".$dayName."\n";
				}
			}elseif($num == 2){
				for($i = 1; $i <= 28; $i++){
					$dayName = getDayOfTheWeek(2022, $month[$num], $i);
					echo $num."-".$i."-2022 is a ".$dayName."\n";
				}
			}else{
				for($i = 1; $i <= 30; $i++){
					$dayName = getDayOfTheWeek(2022, $month[$num], $i);
					echo $num."-".$i."-2022 is a ".$dayName."\n";
				}
			}
		}
	}

	makeCalendar();
?>