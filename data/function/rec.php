<?php

const br = '<br>';




	
/**
* edw kalw mia class gia na mporw na vlepw ton xrono pou ksekinise i katanalosi..mias siskievis
*/
class timeIsOn 
{
	/*edw einai i vasoi timom gia kathe siskevi pou exw.
	*/
	var $lamp;
	var $airheater;
	
	public function lamp(){
		for ($i=0; $i < 115; $i++) { 
			$lamp[]= $i;
		}

		return $lamp;

		
		}

	public function airheater(){
		for ($i=800; $i < 1800; $i++) { 
			$airheater[]= $i;
		}

		return $airheater;
	}









	
	public function date_time($consum)
	{
		/*
		edw twra sigrino tis times pou erxonte apo to rasspberry me aytes poy exw dosei stin vasei dedomenon
		gia to prwi mesimeri kai to vrasu.
		*/
		echo date("e - A - H:i:s").br;
		$time = date('H');
		
		//edw ksexwrizei tis times analoga me tin wra pou exoun ginei
		if ($time >= '08' && $time < '13') {

			print "prwi".br;		
			$div =self::airheater($this->airheater);
			$key = array_search($consum, $div).br;
			$watt = $div[$key];
			//kanw tin sigrisi aneiparxei metrisi me tis times pou exw orisi			
			if ($key == null) {
				print "den doulevei to aerothermo";
			}else{
				print "doulevei to aerothermo me watt: ".$watt.br;
				
			}
			
			
		}elseif ($time >= '13' && $time < '19') {
			print "mesimeri".br;			
			$div =self::airheater($this->airheater);
			
			$key = array_search($consum, $div);
			$watt = $div[$key];
			//kanw tin sigrisi aneiparxei metrisi me tis times pou exw orisi			
			if ($key == null) {
				print "den doulevei to aerothermo";
			}else{
				print "doulevei to aerothermo me watt: ".$watt.br;
				
			}
			
		}else {
			print "vradu";
			$div = self::device($this->airheater);
			$div2 = self::lamp($this->lamp);

			$key = array_search($consum, $div);
			$watt = $div[$key];
			//kanw tin sigrisi aneiparxei metrisi me tis times pou exw orisi			
			if ($key == null) {
				print "den doulevei to aerothermo";
			}else{
				print "doulevei to aerothermo me watt: ".$watt.br;
				
			}
			
		}
		
		
 	}
}

/**
* 
*/
class difine extends timeIsOn
{
	
	
}



?>
