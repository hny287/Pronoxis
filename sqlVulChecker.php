<?php


$time_start = microtime(true); //Create a variable for start time
$fh = fopen('Vulnerability.log', 'w');
$date = new DateTime();
$date = $date->format("y:m:d h:i:s");
//chdir('G:\xammp\htdocs\test');
fwrite($fh, $date);

$sqlDatabaseInput;

echo "<br>";
$workDir=getcwd();

$conFile = scandir($workDir);
print_r($conFile);
echo "<br>";

$sqlLines=0; //For Storing no of Sql lines 
$sqlVulnLines=0; //For Storing no of Sql lines

$typeChkLines = file($conFile[15]);

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{
    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";
    
    
        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = multiexplode($sendLine);  //Gets the line by removing Delimiters
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
        
        checkline($trimmed_Sendline,$typeChkLine_num); //Send This line detect which type of line is this 
        
//      echo htmlspecialchars($typeChkLine) 
   
    
}




function multiexplode($data)
{
    $delimiters=array(",","-","()","(",")",",","{","}","|",">","'"," ","=");
	$MakeReady = str_replace($delimiters, $delimiters[0], $data);
	$Return    = explode($delimiters[0], $MakeReady);
	return  $Return;
}

function checkline($sendLine,$lineno)
{
  
    include'checkWordlists.php'; 
    include'warmHole.php';
    
    
    $noofsendLine=count($sendLine);
    $noofsqlDatabaseInput=count($sqlWarmhole);
    
    for($i=0;$i<$noofsendLine;$i++)
    {
      for($j=0;$j<$noofsqlDatabaseInput;$j++)
      {
           
         if(strcmp($sendLine[$i],$sqlWarmhole[$j])===0) //Compare line array with protected sql array list
           {
              echo "Sql Lines are <b> ".$sendLine[$i]." ";
              echo $sqlWarmhole[$j];
              echo " <br> " .$lineno." </b><br>";
             
             $GLOBALS['sqlLines']++;
             
             checkSqlForVuln($sendLine,$lineno);
             
           }
          else if(strcmp($sendLine[$i],$sqlWarmhole[$j])===-1)
          { 
                  
                $temp =$sendLine[$i];
                $tempLen=strlen($sendLine[$i]);
                $temptrim = substr("$sendLine[$i]", 4, $tempLen);   //To Separate > mark from sql string. I got this at >sql_fetch_array :P    
                if(strcmp($temptrim,$sqlWarmhole[$j])===0)
                {
                echo "Sql Lines are <b> ".$sendLine[$i]." ";
                echo $sqlWarmhole[$j];
                echo " <br> " .$lineno." </b><br>";
                $GLOBALS['sqlLines']++;
                checkSqlForVuln($sendLine,$lineno);
                 }
          }
          
    
      }
        
    }
  
    echo "<br>";
}

function checkSqlForVuln($sqlVulnLine,$sqlVulnLineNo)
{
    include'vulnWordlist.php'; 
    
    $noofsqlVulnLine=count($sqlVulnLine);
    $noofsqlDatabaseSecureVuln=count($sqlDatabaseSecureVuln);
    $tempVulnCkh=0;
    $tempcheckSqlForVuln=0;
    
    for($i=0;$i<$noofsqlVulnLine;$i++)
    {
      for($j=0;$j<$noofsqlDatabaseSecureVuln;$j++)
      {
           if(strcmp($sqlVulnLine[$i],$sqlDatabaseSecureVuln[$j])===0) //Compare line array with protected sql array list
           {
              $tempcheckSqlForVuln=0;
               
           }
          else if(strcmp($sqlVulnLine[$i],$sqlDatabaseSecureVuln[$j])===-1)
          { 
                  
                $temp =$sqlVulnLine[$i];
                $tempLen=strlen($sqlVulnLine[$i]);
                $temptrim = substr("$sqlVulnLine[$i]", 4, $tempLen);   //To Separate > mark from sql string. I got this at >sql_fetch_array :P    
                if(strcmp($temptrim,$sqlDatabaseSecureVuln[$j])===0)
                {
                    $tempcheckSqlForVuln=0;
                
                }
               $tempcheckSqlForVuln=1;
           }  
          else
          { 
             $tempcheckSqlForVuln=1;
             
          }
               
          
      }
        if($tempcheckSqlForVuln==1)
        {
            $tempVulnCkh++;
        }
        
        
        
    }
       
    echo $tempVulnCkh;
    echo "<br>";
    echo $noofsqlVulnLine;
    if($tempVulnCkh==$noofsqlVulnLine)
    {
        $vulninfofile="Line Number ".$sqlVulnLineNo."is Vulnerable to SQl Injection";
        fwrite($GLOBALS['fh'],$vulninfofile);
        $GLOBALS['sqlVulnLines']++;
        echo $vulninfofile;
        

    }
    else
    {
        echo "This is Protected";
    }
    
         
    
}

//Create a variable for end time
$time_end = microtime(true);
//Subtract the two times to get seconds
 


$infoSqlLines="No of SQL line are <b>".$sqlLines."</b> in this File"; 
$infoVulnSqlLines= "<br>No of Vulnerable SQL line are <b>".$sqlVulnLines."</b> in this File";

fwrite($fh,$infoSqlLines);
fwrite($fh,$infoVulnSqlLines);
echo $infoSqlLines;
echo $infoVulnSqlLines;
$time = $time_end - $time_start;

echo 'Execution time : '.$time.' seconds';





// Change directory
chdir('G:\xammp\htdocs\test');
// Get current directory
echo getcwd();


// Get array of all source files
$files = scandir('G:\xammp\htdocs\test');
// Identify directories

?>