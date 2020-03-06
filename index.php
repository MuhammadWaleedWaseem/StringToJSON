<?php
//Date,6/1/2019 12:00:00 AM,Hour,3,Chats,26,Leads,18
function parseCsv($csv_string) {
$json_string="[{";
$j=3;
$count=0;
for($i=0;$i<strlen($csv_string);$i++)
{
	if($i==0)
		$json_string[$j-1]="\"";
	if($csv_string[$i]==",")
	{
		$json_string[$j++]="\"";
		if($count%2==0)
			$json_string[$j++]=":";
		else
			$json_string[$j++]=$csv_string[$i];
		$json_string[$j]="\"";	
		$count++;
	}
	else if($csv_string[$i]=="\n")
	{
		$json_string[$j++]="\"";
		$json_string[$j++]="}";
		$json_string[$j++]=",";
		$json_string[$j++]="{";
		$json_string[$j++]="\"";
			
	}

	else
		$json_string[$j]=$csv_string[$i];
	$j++;
	
}
return $json_string."\"}]";

}
$x="Date,6/1/2019 12:00:00 AM,Hour,3,Chats,26,Leads,18
Date,6/1/2019 12:00:00 AM";
echo parseCsv($x);
?>