<?php
echo "This is test";
echo "<br>";
?>
<?php 
  $url = "https://bitpay.com/api/rates";
  
  $json = json_decode(file_get_contents($url));
  //echo "<pre>";
// print_r($json);
$dollar=$btc=0;

foreach( $json as $obj ){
    if( $obj->code=='USD' )$btc=$obj->rate;
}
echo "1 bitcoin=\$" . $btc . "USD<br />";
$dollar=1 / $btc;
echo "10 dollars = " . round( $dollar * 10,4 )."-----BTC";
echo count($json);
$array_coins = array();
//Bitcoin + Bitcoin Cash + Ethereum + Ripple + US Dollar + Euro + Pound Sterling + Japanese Yen + Chinese Yuan + Swiss Franc.
	foreach( $json as $obj ){
		$coinname = $obj->name;
		$rates = $obj->rate;
		switch ($coinname) {
		  case "Bitcoin":
				$array_coins["Bitcoin"] = $rates;
			break;
			case "Bitcoin Cash":
				$array_coins["itcoin Cash"] = $rates;
			break;
			case "Ether":
				$array_coins["Ether"] = $rates;
			break;
			case "Ripple":
				$array_coins["Ripple"] = $rates;
			break;
			case "US Dollar":
				$array_coins["US Dollar"] = $rates;
			break;
			case "Eurozone Euro":
				$array_coins["Eurozone Euro"] = $rates;
			break;
			case "Pound Sterling":
				$array_coins["Pound Sterling"] = $rates;
			break;
			case "Japanese Yen":
				$array_coins["Japanese Yen"] = $rates;
			break;
			case "Chinese Yuan":
				$array_coins["Chinese Yuan"] = $rates;
			break;
			case "Swiss Franc":
				$array_coins["Swiss Franc"] = $rates;
			break;		   
		} 
	}
	echo "<pre>";
	print_r($array_coins);

    foreach($json as $obj){
		
		echo '<h2>'.$obj->name. '</h2>------$',round($obj->rate * $dollar,2 )."------BTC----".$obj->rate;
echo count($json). '<br>';
  } 
  
 /*function bitcoinslist(){
	  $url = "https://bitpay.com/api/rates";
	  $json = json_decode(file_get_contents($url));
	  
	  $html = '<table style="border-collapse: collapse" border="0" cellpadding="0" width="100%"><div align="center">
				  <tr>
    <td colspan="2" align="left"><div class="marquee" id="mycrawler"></marquee DIRECTION=right>';
	$counter = 0;
	 foreach($json as $obj){
		$counter = $counter+1;
		if($counter<=10){
			$html .= '<span style="color:#199bc1;margin-left:36px";>'.$obj->name.'</span><span style="color:#ea0070;margin-left:12px";>$'.$obj->rate.'</span>';
		}
	 }
$html .= '</div></td>
    </tr>
				
</marquee></div></table>';
	 $html .= '<script type="text/javascript">';
	 $html .= "marqueeInit({
	uniqueid: 'mycrawler',
	style: {
		'padding': '0px',
		'width': '100%',
		'height':'33px',
		'background': '#f8f7f7',
		'color':'#5e5e5e',
		'font-size':'18px',
		'font-weight':'400',
		'border': '1px solid #e5e5e5'
	},
	inc: 5, //speed - pixel increment for each iteration of this marquee's movement
	mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
	moveatleast: 1,
	neutral: 150,
	persist: true,
	savedirection: true
});";
	 $html .= '</script>';
	 return $html;
  }
  
  add_shortcode('bitcoinslist','bitcoinslist');  */
?>