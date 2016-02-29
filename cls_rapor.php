<?php
class Raporlar {
private $raporid;
private $raporad;
private $raporkaynak;
private $raportip;
private $raporveritip;

	var $tabloAd="raporlar";
	
	public function RaporKolonlariGetir($raporad){
	$dba = new dbClass();
	$dba->connect();
	//echo "select * from ".$this->tabloAd ." where raporad ='".$raporad."'";
	$sql = $dba->query("select * from ".$this->tabloAd ." where raporad ='".$raporad."'");
	$rapor = $dba->fetch_object($sql);
	//echo "SELECT  COLUMN_NAME AS kolonadi FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '".$rapor->kaynak."'";
	$sql =$dba->query("SELECT  COLUMN_NAME AS kolonadi FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '".$rapor->kaynak."'");
	while(@$sonuc =$dba->fetch_object($sql)){
		$r[] =$sonuc;
		}
	return $r;
	}

	public function RaporSatirlariGetir($raporad,$wherestr =""){
	$dba = new dbClass();
	$dba->connect();
	//echo "select * from ".$this->tabloAd ." where raporad ='".$raporad."'";
	$sql = $dba->query("select * from ".$this->tabloAd ." where raporad ='".$raporad."'");
	$rapor = $dba->fetch_object($sql);
	//echo "SELECT  * from $rapor->kaynak";
	if($wherestr<>""){
		$wherestr="where $wherestr";
	}
	$sql =$dba->query("SELECT  * from $rapor->kaynak $wherestr");
	while(@$sonuc =$dba->fetch_object($sql)){
		$r[] =$sonuc;
		}
	return $r;
	}
        
        public function RaporSorguDondur($raporad,$wherestr =""){
	$dba = new dbClass();
	$dba->connect();
	//echo "select * from ".$this->tabloAd ." where raporad ='".$raporad."'";
	$sql = $dba->query("select * from ".$this->tabloAd ." where raporad ='".$raporad."'");
	$rapor = $dba->fetch_object($sql);
	//echo "SELECT  * from $rapor->kaynak";
	if($wherestr<>""){
		$wherestr="where $wherestr";
	}
	return "SELECT  * from $rapor->kaynak $wherestr";
        }
	
	Public function RaporOlustur($raporad,$wherestr=""){
		$raporlar = new Raporlar();
		$raporkol = $raporlar->RaporKolonlariGetir($raporad);
		//echo "<table class='pure-table pure-table-bordered'><thead><tr><th>No</th><th>Konu</th><th>Kaynak</th><th>Aciliyet</th><th>Kim Açmış</th><th>Kimde</th><th>Durum</th><th>Opsiyon</th></tr></thead><tbody>";
		echo "<table class='pure-table pure-table-bordered'><thead><tr>";
		foreach($raporkol as $rc){
			echo "<th>$rc->kolonadi</th>";
		}
		echo "</tr></thead><tbody>";
		$raporsat = $raporlar->RaporSatirlariGetir($raporad,$wherestr);
		if($raporsat){
		foreach($raporsat as $rs){
			echo "<tr>";
			foreach($raporkol as $rc){
				$kolonadi =$rc->kolonadi;
				echo "<td>".$rs->$kolonadi."</td>";
			}
			echo "</tr>";
		}
		}
		echo "</tbody></table>";
	}
        
        Public function RaporOlusturWithQuery($sorgu,$raporkol){
                $dba = new dbClass();
                //echo $sorgu;
		//echo "<table class='pure-table pure-table-bordered'><thead><tr><th>No</th><th>Konu</th><th>Kaynak</th><th>Aciliyet</th><th>Kim Açmış</th><th>Kimde</th><th>Durum</th><th>Opsiyon</th></tr></thead><tbody>";
		echo "<table class='pure-table pure-table-bordered'><thead><tr>";
		foreach($raporkol as $rc){
			echo "<th>$rc</th>";
		}
		echo "</tr></thead><tbody>";
                $sql = $dba->query($sorgu);
                while(@$sonuc =$dba->fetch_object($sql)){
		$raporsat[] =$sonuc;
		}
		if($raporsat){
		foreach($raporsat as $rs){
			echo "<tr>";
			foreach($raporkol as $rc){
				$kolonadi =$rc;
				echo "<td>".$rs->$kolonadi."</td>";
			}
			echo "</tr>";
		}
		} 
		echo "</tbody></table>";
	}
        
	
    function exportExcel($raporad,$wherestr=""){
    $raporlar = new Raporlar();	
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/plain; charset=utf-8'); 
    header("content-type:application/csv;charset=UTF-8");
	//header("Content-Disposition:attachment;filename=\"$raporad.csv\"");
    header("Content-disposition: attachment; filename=".$raporad.".xls");
    header("Content-Type: application/vnd.ms-excel");
    //echo "\xEF\xBB\xBF"; // UTF-8 BOM
    echo $raporlar->RaporOlustur($raporad,$wherestr); 
	}
	
	
}

?>

