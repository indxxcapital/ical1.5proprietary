<?php

class Caupcomingindex extends Application{

	function __construct()
	{
		parent::__construct();
		$this->checkUserSession();
		
$this->addCss('assets/data-tables/DT_bootstrap.css');
$this->addJs('assets/bootstrap/bootstrap.min.js');
$this->addJs('assets/nicescroll/jquery.nicescroll.min.js');
$this->addJs('assets/data-tables/jquery.dataTables.js');
$this->addJs('assets/data-tables/DT_bootstrap.js');
$this->addJs('js/flaty.js');
	}
	
	
	function index()
	{
		
		$this->_baseTemplate="inner-template";
	$this->_bodyTemplate="caupcomingindex/index";
		$this->_title=$this->siteconfig->site_title;
		$this->_meta_description=$this->siteconfig->default_meta_description;
		$this->_meta_keywords=$this->siteconfig->default_meta_keyword;
//	$this->addfield();

		$this->smarty->assign('pagetitle','Index');
		$this->smarty->assign('bredcrumssubtitle','Index');
	$usertempindexes=$this->db->getResult("select distinct(indxx_id) as indxx from tbl_assign_index_temp where user_id='".$_SESSION['User']['id']."' ",true);
	$_SESSION['IndexTemp']=array();
		$this->setUserTempIndexSessionData($usertempindexes);
	
//$this->pr($_SESSION,true);
$indexdata=array();
if($_SESSION['User']['type']=='2' )
{
	if(!empty($_SESSION['IndexTemp']))
{$ids=$ids = join(',',$_SESSION['IndexTemp']); 
//$this->pr($_SESSION,true);
$indexdata=$this->db->getResult("select tbl_indxx_temp.*,tbl_ca_client.name as clientname,( select count(id) from tbl_indxx_ticker_temp where indxx_id=tbl_indxx_temp.id) as total_ticker from tbl_indxx_temp left join tbl_ca_client on tbl_ca_client.id=tbl_indxx_temp.client_id where tbl_indxx_temp.id in (".$ids .")   ",true);
}
}
else{	


	$indexdata=$this->db->getResult("select tbl_indxx_temp.*,tbl_ca_client.name as clientname,( select count(id) from tbl_indxx_ticker_temp where indxx_id=tbl_indxx_temp.id) as total_ticker from tbl_indxx_temp left join tbl_ca_client on tbl_ca_client.id=tbl_indxx_temp.client_id  where 1=1  ",true);
}
		$this->smarty->assign("indexdata",$indexdata);

	//$this->pr($indexdata,true);
	
		//$this->pr($_SESSION);
		 $this->show();
	}
	
	private function addfield($showDivpvalue=0)
	{	
	   $this->validData[]=array("feild_label" =>"Index Name",
	   								"feild_code" =>"name",
								 "feild_type" =>"text",
								 "is_required" =>"1",
								
								 );
		 $this->validData[]=array("feild_label" =>"Index Ticker",
		 							"feild_code" =>"code",
								 "feild_type" =>"text",
								 "is_required" =>"1",
								"feildOptions"=>array("readonly"=>"readonly")
								 );
								 
		 $this->validData[]=array("feild_label" =>"Investment Amount",
		 							"feild_code" =>"investmentammount",
								 "feild_type" =>"text",
								 "is_required" =>"",
								
								 );
		if($showDivpvalue ==2)
		{
		 $this->validData[]=array("feild_label" =>"Dividend Placeholder value",
		 							"feild_code" =>"divpvalue",
								 "feild_type" =>"text",
								 "is_required" =>"",
								
								 );
		}						 
		 $this->validData[]=array("feild_label" =>"Index value",
		 							"feild_code" =>"indexvalue",
								 "feild_type" =>"text",
								 "is_required" =>"1",
								
								 );
	/* $this->validData[]=array("feild_label" =>"Type",
	 							"feild_code" =>"type",
								 "feild_type" =>"select",
								 "is_required" =>"1",
								 //"feild_tpl" =>"selectsearch",
								  "model"=>$this->getTypes(),
								 );*/
		 $this->validData[]=array("feild_label" =>"Return Type",
	 							"feild_code" =>"ireturn",
								 "feild_type" =>"select",
								 "is_required" =>"1",
								 //"feild_tpl" =>"selectsearch",
								  "model"=>$this->getReturnTypes(),
								 );	
	  /*$this->validData[]=array("feild_label" =>"Ignore Corporate Actions",
	 							"feild_code" =>"ica",
								 "feild_type" =>"select",
								 "is_required" =>"",
								 //"feild_tpl" =>"selectsearch",
								  "model"=>$this->GetYesNo(),
								 );	*/
	$this->validData[]=array("feild_label" =>"Normal Cash Dividend Adjustment",
	 							"feild_code" =>"cash_adjust",
								 "feild_type" =>"select",
								 "is_required" =>"",
								 //"feild_tpl" =>"selectsearch",
								  "model"=>array("0"=>"Divisor","1"=>"Stock"),
								 );		
   $this->validData[]=array("feild_label" =>"Special Cash Dividend Adjustment",
	 							"feild_code" =>"cash_adjust1",
								 "feild_type" =>"select",
								 "is_required" =>"",
								 //"feild_tpl" =>"selectsearch",
								  "model"=>array("0"=>"Divisor","1"=>"Stock"),
								 );	
								 
								 
		$this->validData[]=array("feild_label" =>"Dividend Amount",
	 							"feild_code" =>"div_type",
								 "feild_type" =>"select",
								 "is_required" =>"",
								 //"feild_tpl" =>"selectsearch",
								  "model"=>array("0"=>"Gross Amount","1"=>"Net Ammount"),
								 );								 
	$this->validData[]=array("feild_label" =>"Currency Hedged Index",
	 							"feild_code" =>"currency_hedged",
								 "feild_type" =>"select",
								 "is_required" =>"1",
								 //"feild_tpl" =>"selectsearch",
								  "model"=>array("0"=>"No","1"=>"Yes"),
								 );								 
	 $this->validData[]=array(	"feild_label"=>"Currency",
	 							"feild_code" =>"curr",
								 "feild_type" =>"text",
								 "is_required" =>"1",
								
								 );
								 	 
	 $this->validData[]=array(	"feild_label"=>"Index Start Date",
	 							"feild_code" =>"dateStart",
								 "feild_type" =>"date",
								 "is_required" =>"1",
								);
		 $this->validData[]=array("feild_label" =>"Client",
	 							"feild_code" =>"client_id",
								 "feild_type" =>"select",
								 "is_required" =>"1",
								 //"feild_tpl" =>"selectsearch",
								  "model"=>$this->getAllClients(),
								 ); 
								 
								 
	/*$this->validData[]=array("feild_label" =>"Display Currency",
	 							"feild_code" =>"display_currency",
								 "feild_type" =>"select",
								 "is_required" =>"1",
								 //"feild_tpl" =>"selectsearch",
								  "model"=>array("0"=>"No","1"=>"Yes"),
								 );	*/							 
	/*$this->validData[]=array("feild_code" =>"product_file",
									 "feild_type" =>"file",
									 "is_required" =>"1",
									 "validate" =>"file|csv",		
									 "feild_label" =>"Upload File",
									 );*/
								 
								 
	 	/*$this->validData[]=array("feild_label" =>"Priority",
	 							"feild_code" =>"priority",
								 "feild_type" =>"select",
								 "is_required" =>"1",
								 //"feild_tpl" =>"selectsearch",
								  "model"=>$this->getPriorityArray(),
								 );	*/	
	
	$this->getValidFeilds();
	}
	
	
	
	
	protected function editfornext(){
		 
		
		$this->_baseTemplate="inner-template";
			$this->_bodyTemplate="caupcomingindex/edit";
			$this->_title=$this->siteconfig->site_title;
			$this->_meta_description=$this->siteconfig->default_meta_description;
			$this->_meta_keywords=$this->siteconfig->default_meta_keyword;
			
			$this->smarty->assign('pagetitle','Index');
		$this->smarty->assign('bredcrumssubtitle','Edit Index');
		
		
		unset($_SESSION['NewIndxxName']);
		unset($_SESSION['NewIndxxId']);
		unset($_SESSION['indxx_code']);
		unset($_SESSION['indxx_type']);
		
		
		$editdata=$this->db->getResult("select tbl_indxx_temp.* from tbl_indxx_temp  where tbl_indxx_temp.id='".$_GET['id']."'");
		//$this->pr($editdata,true);
		
		$indxx_value=$this->db->getResult("select tbl_indxx_value.* from tbl_indxx_value where code='".$editdata['code']."' order by date desc ",false,1);	
		if(!empty($indxx_value)){
		$editdata['investmentammount']=$indxx_value['market_value'];
		$editdata['indexvalue']=$indxx_value['indxx_value'];
		}
		
		$this->smarty->assign("postData",$editdata);
		
		$this->addfield($editdata['ireturn']);
		
		
		
		$tempindexid=0;
		
		if(isset($_POST['submit']))
		{
			
			
			//$_SESSION['Index'][]=$indexid;
		
		$_SESSION['NewIndxxName']=$editdata['name'];
		$_SESSION['indxx_code']=$editdata['code'];
		$_SESSION['indxx_type']=$editdata['type'];
			
			
			$checkdata=$this->db->getResult("select tbl_indxx_temp.* from tbl_indxx_temp  where tbl_indxx_temp.code='".$_POST['code']."' and tbl_indxx_temp.dateStart='".$_POST['dateStart']."'");
			/*if(empty($checkdata))
			{
					$this->db->query("INSERT into tbl_indxx_temp set name='".mysql_real_escape_string($_POST['name'])."',code='".mysql_real_escape_string($_POST['code'])."',investmentammount='".mysql_real_escape_string($_POST['investmentammount'])."',indexvalue='".mysql_real_escape_string($_POST['indexvalue'])."',type='".mysql_real_escape_string($_POST['type'])."',zone='".mysql_real_escape_string($_POST['zone'])."',curr='".mysql_real_escape_string($_POST['curr'])."',lastupdated='".date("Y-m-d H:i:s")."',dateStart='".$_POST['dateStart']."',cash_adjust='".$_POST['cash_adjust']."'");
					
					$tempindexid=mysql_insert_id();
					
					
			}*/
			
			//else
			//{
				//$this->pr($checkdata,true);	
				
				
				//$tempindexid=$checkdata['id'];
				//echo "UPDATE tbl_indxx_temp set name='".mysql_real_escape_string($_POST['name'])."',code='".mysql_real_escape_string($_POST['code'])."',investmentammount='".mysql_real_escape_string($_POST['investmentammount'])."',divpvalue='".mysql_real_escape_string($_POST['divpvalue'])."',indexvalue='".mysql_real_escape_string($_POST['indexvalue'])."',type='".mysql_real_escape_string($_POST['type'])."',zone='".mysql_real_escape_string($_POST['zone'])."',curr='".mysql_real_escape_string($_POST['curr'])."',lastupdated='".date("Y-m-d H:i:s")."',dateStart='".$_POST['dateStart']."',cash_adjust='".$_POST['cash_adjust']."',display_currency='1',client_id='".$_POST['client_id']."',ica='".$_POST['ica']."',div_type='".$_POST['div_type']."',currency_hedged='".$_POST['currency_hedged']."' where id='".$checkdata['id']."'";
			//	exit;
				$this->db->query("UPDATE tbl_indxx_temp set name='".mysql_real_escape_string($_POST['name'])."',code='".mysql_real_escape_string($_POST['code'])."',investmentammount='".mysql_real_escape_string($_POST['investmentammount'])."',divpvalue='".mysql_real_escape_string($_POST['divpvalue'])."',indexvalue='".mysql_real_escape_string($_POST['indexvalue'])."',type='".mysql_real_escape_string($_POST['type'])."',zone='".mysql_real_escape_string($_POST['zone'])."',curr='".mysql_real_escape_string($_POST['curr'])."',lastupdated='".date("Y-m-d H:i:s")."',dateStart='".$_POST['dateStart']."',cash_adjust='".$_POST['cash_adjust']."',specialcashadd='".$_POST['cash_adjust1']."',display_currency='1',client_id='".$_POST['client_id']."',ica='".$_POST['ica']."',div_type='".$_POST['div_type']."',currency_hedged='".$_POST['currency_hedged']."' where id='".$_GET['id']."'");
				
				
			//}
			
			$_SESSION['liveindexid']=$_GET['id'];
		$_SESSION['tempindexid']=$_GET['id'];
		
		
		//$this->pr(	$checkdata,true);
		
		if($checkdata['status']==1 && $checkdata['dbusersignoff']==1 && $checkdata['submitted']==1 )
		{
		
				$this->Redirect("index.php?module=caupcomingindex&event=editrunning","Index updated successfully!!!<br> Please update associated securities!!!","success");
		}	else{
				$this->Redirect("index.php?module=caupcomingindex&event=edit2","Index updated successfully!!!<br> Please update associated securities!!!","success");
			}
			}
		
		
		
		
		
		
		
		
		
		
		
		
		 $this->show();
			
	}

function editrunning(){
///echo "deepak";

		//$this->pr($_SESSION,true);
			$this->_baseTemplate="inner-template";
			$this->_bodyTemplate="caupcomingindex/editrunning";
			$this->_title=$this->siteconfig->site_title;
			$this->_meta_description=$this->siteconfig->default_meta_description;
			$this->_meta_keywords=$this->siteconfig->default_meta_keyword;
			
			$this->smarty->assign('pagetitle','Index');
		$this->smarty->assign('bredcrumssubtitle','Add Securities');
		//$this->pr($_SESSION,true);
		//echo "select tbl_indxx_ticker_temp.* from tbl_indxx_ticker_temp where indxx_id='".$_SESSION['liveindexid']."' ";
		//exit;
		$indexdata=$this->db->getResult("select tbl_indxx_temp.* from tbl_indxx_temp where id='".$_SESSION['tempindexid']."' ");
		
		$tickerdata=$this->db->getResult("select tbl_indxx_ticker_temp.* from tbl_indxx_ticker_temp where indxx_id='".$_SESSION['liveindexid']."' ",true);
		//$this->pr($indexdata,true);
		$this->smarty->assign("runningindexdata",$indexdata);
		
		$sharedata=$this->db->getResult("select tbl_share_temp.* from tbl_share_temp where indxx_id='".$_SESSION['liveindexid']."' ",true);
	//$this->pr($sharedata,true);
	$tempShareArray=array();
	
	if(!empty($sharedata))
	{
	foreach($sharedata as $share)
	{
	$tempShareArray[$share['isin']]=$share['share'];
	}
	}
		if(count($tickerdata)>0 && count($tickerdata)<=30)
		{
			$totalfields=30;	
		}elseif(count($tickerdata)>=30)
		{
			$totalfields=count($tickerdata);	
		}
		else
		{
		$totalfields=30;
		}
		
		$array=array();
		
		for($i=0;$i<$totalfields;$i++)
		{
			$array['name['.($i+1).']']=$tickerdata[$i]['name'];
			
			$array['isin['.($i+1).']']=$tickerdata[$i]['isin'];
			$array['ticker['.($i+1).']']=$tickerdata[$i]['ticker'];
			$array['share['.($i+1).']']=$tempShareArray[$tickerdata[$i]['isin']];
			$array['curr['.($i+1).']']=$tickerdata[$i]['curr'];
			$array['divcurr['.($i+1).']']=$tickerdata[$i]['divcurr'];
			
			//$array[]=	
		}
		
		$this->smarty->assign('postData',$array);
		$this->smarty->assign('totalfields',$totalfields);
		
		$this->addfieldrunning($totalfields,$indexdata['status'],$indexdata['dbusersignoff']);
		
		$added=0;
		
		
		if($_POST['submit'])
		{
			
			
			
				$this->db->query("delete from tbl_indxx_ticker_temp where indxx_id='".$_SESSION['tempindexid']."'");
			$this->db->query("delete from tbl_share_temp where indxx_id='".$_SESSION['tempindexid']."'");
			
			for($i=1;$i<=$_POST['totalfields'];$i++)
			{
				if($_POST['name'][$i] && $_POST['isin'][$i] && $_POST['ticker'][$i]  && $_POST['curr'][$i])
				{
					//$this->pr($_POST,true);
					
						
					$this->db->query("INSERT into tbl_indxx_ticker_temp set status='1',name='".mysql_real_escape_string($_POST['name'][$i])."',isin='".mysql_real_escape_string($_POST['isin'][$i])."',ticker='".mysql_real_escape_string($_POST['ticker'][$i])."',weight='0',curr='".mysql_real_escape_string($_POST['curr'][$i])."',divcurr='".mysql_real_escape_string($_POST['divcurr'][$i])."',
					sedol='".mysql_real_escape_string($_POST['sedol'][$i])."',
					cusip='".mysql_real_escape_string($_POST['cusip'][$i])."',
					countryname='".mysql_real_escape_string($_POST['countryname'][$i])."',
					sector='".mysql_real_escape_string($_POST['sector'][$i])."',
					industry='".mysql_real_escape_string($_POST['industry'][$i])."',
					subindustry='".mysql_real_escape_string($_POST['subindustry'][$i])."',
					indxx_id='".mysql_real_escape_string($_SESSION['tempindexid'])."'");
					
					$this->db->query("INSERT into tbl_share_temp set isin='".mysql_real_escape_string($_POST['isin'][$i])."',date='".$this->_date."',share='".mysql_real_escape_string($_POST['share'][$i])."',indxx_id='".mysql_real_escape_string($_SESSION['tempindexid'])."'");
					$added++;
		
				}	
			}
			
			
			if($added>=1)
		{
			$this->Redirect("index.php?module=caupcomingindex&event=addedrunning&id=".$added,"Index added successfully!!! <br> Please Wait for Approval","success");	
		}
		else
		{
			$this->Redirect("index.php?module=caupcomingindex&event=addNew2","No security added!!! <br> Please add again","error");	
		}
		}
		
		
		
			 $this->show();
	


}


function uploadSharesforRunning(){

	$this->_baseTemplate="inner-template";
			$this->_bodyTemplate="caupcomingindex/uploadsharesforrunning";
			
			if(isset($_POST['submit'])){
				$csv_mimetypes = array(
    'text/csv',
    'text/plain',
    'application/csv',
    'text/comma-separated-values',
    'application/excel',
    'application/vnd.ms-excel',
    'application/vnd.msexcel',
    'text/anytext',
    'application/octet-stream',
    'application/txt',
);

if (!in_array($_FILES['inputfile']['type'], $csv_mimetypes)) {
	$check=false;
				$errormsg='Invalid input file, Please upload correct csv file';
			//break;
			$this->Redirect("index.php?module=caupcomingindex&event=uploadSharesforRunning","Error in input :".$errormsg,"error");	
			}
		//$this->pr($_FILES);
			if($this->validatPost()){	
			$fields=array("1",'2','3','4');		
				$data = csv::import($fields,$_FILES['inputfile']['tmp_name']);	

//echo count($data);
//echo $_SESSION['tempindexid'];
//exit;

//$this->pr($data,true);

$tickerdata=$this->db->getResult("select tbl_indxx_ticker_temp.* from tbl_indxx_ticker_temp where indxx_id='".$_SESSION['tempindexid']."' ",true);
//$this->pr($tickerdata,true);
//echo count($tickerdata);
//echo $_SESSION['tempindexid'];
//exit;
$isinArray=array();
if(!empty($tickerdata))
{
	foreach($tickerdata as $ticker)
	$isinArray[]=$ticker['isin'];
}
//$this->pr($_SESSION);
//echo count($data)."=>".count($tickerdata);

//exit;
if(count($data)!=count($tickerdata))
{
	$this->Redirect("index.php?module=caupcomingindex&event=uploadSharesforRunning","No. Of Securities not equal !!! <br> Please add again","error");	
}



	$added=0;
	$flag=false;
	$check=true;
		$i=0;
		$checkforWeights=false;
		$sumofWeights=0;
				if(!empty($data))
				{
					$weightQuery=array();
					$this->db->query("delete from tbl_share_temp where indxx_id='".$_SESSION['tempindexid']."'");
					$query='INSERT into tbl_share_temp (isin,date,share,indxx_id) values ';
					$queryArray=array();
					
					foreach($data as $security)
					{
						//$this->pr($security,true);
	if($i==0)
	{
	if($security['4'])
	{
	//echo "check Passed";
	$checkforWeights=true;
	$i++;
	}
	
	}
	
					if(count($security)!=4)
						{
							//echo count($security);
						//	$this->pr($security);
							
							//exit;
						$check=false;
						$errormsg=" Column Count Not matched  for ".$security['1'];
						break;
						}elseif(strlen($security['2'])!=12)
						{
							
						$check=false;
						$errormsg="ISIN not valid for ".$security['1'];
						break;
						}elseif (preg_match('/,;/', $security['1']) || preg_match('/,;/', $security['2']) || preg_match('/,;/', $security['3']) || preg_match('/,;/', $security['4']) )
{
  
   $check=false;
						$errormsg="one or more of the 'special characters' found for ".$security['3'];
						break;
    // one or more of the 'special characters' found in $string
}

	
					if($checkforWeights)
					{
					if($security['4'])
					{
					 $sumofWeights+=str_replace("%","",$security['4']);
					//echo "deepak <br>";
					}
					}				
					
					
						//$tickerdata2=$this->db->getResult("select tbl_indxx_ticker_temp.* from tbl_indxx_ticker_temp where indxx_id='".$_SESSION['tempindexid']."' and isin='".$security['2']."' ",true);
					//$this->pr($tickerdata2,true);
					if(!in_array($security['2'],$isinArray))
					{
						//echo "Check Not Passed".$security['2'];
						//print_r($isinArray);
						//$check=false;
						$errormsg="isin not found for ".$security['1'];
						break;
					}
					else{
					$weightQuery[]="update tbl_indxx_ticker_temp set weight='".(mysql_real_escape_string(str_replace("%","",$security[4]))/100)."' where indxx_id='".$_SESSION['tempindexid']."' and isin='".mysql_real_escape_string($security['2'])."'";
					}
				
				
						if($security['2']!='' && $security['3']!='')
						{
							$queryArray[]="('".mysql_real_escape_string($security['2'])."','".$this->_date."','".mysql_real_escape_string($security['3'])."','".mysql_real_escape_string($_SESSION['tempindexid'])."')";
						
						
		
						}
							$added++;
					
					}
					
					
				
				
			//	echo $sumofWeights;
				//exit;
					if(!empty($queryArray) && $check)
					{
					$this->db->query($query.implode(",",$queryArray).";");
					unset($queryArray);
					}
					//echo $check;
					//exit;
					
					
				/*	if(!empty($weightQuery))
					{
					echo "weight check passed";
					}
					else{
					echo "weight check not passed";
					
					}
					
					if($sumofWeights)
					{
					echo "Check Passed".$sumofWeights;
					}else{
						echo "Check Not Passed";
					}
					//exit;
					*/
					//$sumofWeights+=.01;
					/*echo strval($sumofWeights);
					if( strval($sumofWeights) == 100)
					{
					echo "sum passed=".floatval($sumofWeights);
					}else
					{
					echo "sum not passed=".floatval($sumofWeights);
					}
					exit;*/
					if($sumofWeights>0)
					{if(!empty($weightQuery) &&  strval($sumofWeights)==100)
					{
					foreach($weightQuery as $weightupdateQuery)
					{
					$this->db->query($weightupdateQuery);
					}
					unset($weightupdateQuery);
					}else{
					$check=false;
						$errormsg="Sum of Weights is  ". $sumofWeights;
						//break;
					}}
					
				}

	if(!$check)
{

$this->Redirect("index.php?module=caupcomingindex&event=uploadSharesforRunning","Error in input :".$errormsg,"error");	
}
	elseif($added>=1)
		{
			$this->Redirect("index.php?module=caupcomingindex&event=addedrunning&id=".$added,"Index added successfully!!! <br> Please Wait for Approval","success");	
		}
		else
		{
			$this->Redirect("index.php?module=caupcomingindex&event=uploadSharesforRunning","No security added!!! <br> Please add again","error");	
		}

			}
			}
			
		
	$this->uploadfield2();
	
	 $this->show();
			

}	function uploadfield2(){
		 $this->validData[]=array("feild_label" =>"Shares input sheet",
		 							"feild_code" =>"inputfile",
								 "feild_type" =>"file",
								 "is_required" =>"1",
								
								 );
		
	$this->getValidFeilds();
	}

	
	function edit2()
	{
		//$this->pr($_SESSION,true);
			$this->_baseTemplate="inner-template";
			$this->_bodyTemplate="caupcomingindex/add2";
			$this->_title=$this->siteconfig->site_title;
			$this->_meta_description=$this->siteconfig->default_meta_description;
			$this->_meta_keywords=$this->siteconfig->default_meta_keyword;
			
			$this->smarty->assign('pagetitle','Index');
		$this->smarty->assign('bredcrumssubtitle','Add Securities');
		//$this->pr($_SESSION,true);
		//echo "select tbl_indxx_ticker_temp.* from tbl_indxx_ticker_temp where indxx_id='".$_SESSION['liveindexid']."' ";
		//exit;
		
		
		$added=0;
		
		
		if($_POST['submit'])
		{
			
			
			
				$this->db->query("delete from tbl_indxx_ticker_temp where indxx_id='".$_SESSION['tempindexid']."'");
			$query=" INSERT into tbl_indxx_ticker_temp (name,isin,ticker,divcurr,curr,sedol,cusip,countryname,sector,industry,subindustry,indxx_id) values ";
			$values =array();
					
			for($i=1;$i<=$_POST['totalfields'];$i++)
			{
				
				
				if($_POST['name'][$i] && $_POST['isin'][$i] && $_POST['ticker'][$i] && $_POST['divcurr'][$i] && $_POST['curr'][$i])
				{
					//$this->pr($_POST,true);
					
						$values[]="('".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['name'][$i]))."',
						'".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['isin'][$i]))."',
						'".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['ticker'][$i]))."',
						'".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['divcurr'][$i]))."',
						'".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['curr'][$i]))."',
						'".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['sedol'][$i]))."',
						'".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['cusip'][$i]))."',
						'".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['countryname'][$i]))."',
						'".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['sector'][$i]))."',
						'".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['industry'][$i]))."',
						'".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['subindustry'][$i]))."',
						'".mysql_real_escape_string($_SESSION['tempindexid'])."')"; 
					/*$this->db->query("INSERT into tbl_indxx_ticker_temp set name='".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['name'][$i]))."',
					isin='".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['isin'][$i]))."',
					ticker='".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['ticker'][$i]))."',
					divcurr='".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['divcurr'][$i]))."',
					curr='".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['curr'][$i]))."',
					sedol='".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['sedol'][$i]))."',
					cusip='".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['cusip'][$i]))."',
					countryname='".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['countryname'][$i]))."',
					sector='".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['sector'][$i]))."',
					industry='".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['industry'][$i]))."',
					subindustry='".mysql_real_escape_string(str_replace(array(",",";")," ",$_POST['subindustry'][$i]))."',
					indxx_id='".mysql_real_escape_string($_SESSION['tempindexid'])."'");
					*/
					
					$added++;
		
				}	
				
			}
				$this->db->query($query.implode(",",$values).";");
			
			
			if($added>=1)
		{
			$this->Redirect("index.php?module=caupcomingindex&event=addNewNext&id=".$added,"Index added successfully!!! <br> Please Wait for Approval","success");	
		}
		else
		{
			$this->Redirect("index.php?module=caupcomingindex&event=addNew2","No security added!!! <br> Please add again","error");	
		}
		}
		else{
			$indexdata=$this->db->getResult("select tbl_indxx_temp.* from tbl_indxx_temp where id='".$_SESSION['tempindexid']."' ");
		if($indexdata['addtype']==1)
		{
			//$this->Redirect("index.php?module=caupcomingindex&event=editrunning",'','');
			
			//$this->Redirect("index.php?module=casecurities&event=edit2",'','');
			
			
				
		}
		$tickerdata=$this->db->getResult("select tbl_indxx_ticker_temp.* from tbl_indxx_ticker_temp where indxx_id='".$_SESSION['liveindexid']."' ",true);
		//$this->pr($indexdata,true);
		//$this->smarty->assign("indexdata",$indexdata);

		
		if(count($tickerdata)>0 && count($tickerdata)<=30)
		{
			$totalfields=30;	
		}elseif(count($tickerdata)>=30)
		{
			$totalfields=count($tickerdata);	
		}
		else
		{
		$totalfields=30;
		}
		
		$array=array();
		
		for($i=0;$i<$totalfields;$i++)
		{
			$array['name['.($i+1).']']=htmlspecialchars($tickerdata[$i]['name']);
						
			$array['isin['.($i+1).']']=$tickerdata[$i]['isin'];
			$array['ticker['.($i+1).']']=$tickerdata[$i]['ticker'];
			$array['divcurr['.($i+1).']']=$tickerdata[$i]['divcurr'];
			$array['curr['.($i+1).']']=$tickerdata[$i]['curr'];
				$array['sedol['.($i+1).']']=$tickerdata[$i]['sedol'];
					$array['countryname['.($i+1).']']=$tickerdata[$i]['countryname'];
				$array['cusip['.($i+1).']']=$tickerdata[$i]['cusip'];
				$array['sector['.($i+1).']']=$tickerdata[$i]['sector'];
				$array['industry['.($i+1).']']=$tickerdata[$i]['industry'];
				$array['subindustry['.($i+1).']']=$tickerdata[$i]['subindustry'];	
			//$array[]=	
		}
		//$this->pr($array,true);
		$this->smarty->assign('postData',$array);
		$this->smarty->assign('totalfields',$totalfields);
		
		$this->addfield2($totalfields);}
		
		
			 $this->show();
	}
	
	
	
	function addNew2()
	{
			$this->_baseTemplate="inner-template";
			$this->_bodyTemplate="caupcomingindex/add2";
			$this->_title=$this->siteconfig->site_title;
			$this->_meta_description=$this->siteconfig->default_meta_description;
			$this->_meta_keywords=$this->siteconfig->default_meta_keyword;
			
			$this->smarty->assign('pagetitle','Index');
		$this->smarty->assign('bredcrumssubtitle','Add Securities');
		
		$totalfields=30;
		$this->smarty->assign('totalfields',$totalfields);
		
		$this->addfield2($totalfields);
		
		$added=0;
		
		
		if($_POST['submit'])
		{
			
			
			for($i=1;$i<$_POST['totalfields'];$i++)
			{
				if($_POST['name'][$i] && $_POST['isin'][$i] && $_POST['ticker'][$i] && $_POST['weight'][$i] && $_POST['curr'][$i])
				{
					//$this->pr($_POST,true);	
					$this->db->query("INSERT into tbl_indxx_ticker_temp set status='0',name='".mysql_real_escape_string($_POST['name'][$i])."',isin='".mysql_real_escape_string($_POST['isin'][$i])."',ticker='".mysql_real_escape_string($_POST['ticker'][$i])."',weight='".mysql_real_escape_string($_POST['weight'][$i])."',curr='".mysql_real_escape_string($_POST['curr'][$i])."',
					sedol='".mysql_real_escape_string($_POST['sedol'][$i])."',
					cusip='".mysql_real_escape_string($_POST['cusip'][$i])."',
					countryname='".mysql_real_escape_string($_POST['countryname'][$i])."',
					sector='".mysql_real_escape_string($_POST['sector'][$i])."',
					industry='".mysql_real_escape_string($_POST['industry'][$i])."',
					subindustry='".mysql_real_escape_string($_POST['subindustry'][$i])."'
					indxx_id='".mysql_real_escape_string($_SESSION['NewIndxxId'])."'");
					$added++;
		
				}	
			}
			
			
			if($added>=1)
		{
			$this->Redirect("index.php?module=casecurities&event=addNewNext&id=".$added,"Index added successfully!!! <br> Please Wait for Approval","success");	
		}
		else
		{
			$this->Redirect("index.php?module=casecurities&event=addNew2","No security added!!! <br> Please add again","error");	
		}
		}
		
		
		
			 $this->show();
	}
	
	
	
	
	
	private function addfield2($count)
	{	
	   for($i=1;$i<=$count;$i++)
{	   
	   $this->validData[]=array("feild_label" =>"Security Name",
	   								"feild_code" =>"name[".$i.']',
								 "feild_type" =>"text",
								 "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );
		 $this->validData[]=array("feild_label" =>"Security Isin",
		 							"feild_code" =>"isin[".$i.']',
								 "feild_type" =>"text",
								 "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );
								 
		 $this->validData[]=array("feild_label" =>"Security Ticker",
		 							"feild_code" =>"ticker[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );
								 
	
	
	 $this->validData[]=array("feild_label" =>"Index",
	 							"feild_code" =>"indxx_id[".$i.']',
								 "feild_type" =>"hidden",
								 "is_required" =>"",
								   "feild_tpl" =>"hidden2",
								 'value'=>$_SESSION['NewIndxxId']
								 );
	
	 $this->validData[]=array(	"feild_label"=>"Currency",
	 							"feild_code" =>"curr[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );	 
		$this->validData[]=array("feild_label" =>"Dividend Currency",
		 							"feild_code" =>"divcurr[".$i.']',
								 "feild_type" =>"text",
								 "is_required" =>"",
								  "feild_tpl" =>"place_text1_1",
								);
		$this->validData[]=array(	"feild_label"=>"Sedol",
	 							"feild_code" =>"sedol[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );	 
								 
	$this->validData[]=array(	"feild_label"=>"Cusip",
	 							"feild_code" =>"cusip[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );
								 
	$this->validData[]=array(	"feild_label"=>"Country Name",
	 							"feild_code" =>"countryname[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
 								 );	 	
								 						 	 						 
   	$this->validData[]=array(	"feild_label"=>"Sector",
	 							"feild_code" =>"sector[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );		
								 				
	$this->validData[]=array(	"feild_label"=>"Inustry",
	 							"feild_code" =>"industry[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );						
								 
	$this->validData[]=array(	"feild_label"=>"SubInustry",
	 							"feild_code" =>"subindustry[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );								 		 
								 								
	
}
	$this->getValidFeilds();
	}
	
	private function addfieldrunning($count,$status=0,$dbusersignoff=0)
	{	
	//echo $status.$dbusersignoff;
		//exit;
	   for($i=1;$i<=$count;$i++)
{	   
	   $this->validData[]=array("feild_label" =>"Security Name",
	   								"feild_code" =>"name[".$i.']',
								 "feild_type" =>"text",
								 "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );
		 $this->validData[]=array("feild_label" =>"Security Isin",
		 							"feild_code" =>"isin[".$i.']',
								 "feild_type" =>"text",
								 "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );
								 
		 $this->validData[]=array("feild_label" =>"Security Ticker",
		 							"feild_code" =>"ticker[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );
								 
		if($dbusersignoff==1 && $status==1)
		{ $this->validData[]=array("feild_label" =>"Share",
		 							"feild_code" =>"share[".$i.']',
								 "feild_type" =>"text",
								 "is_required" =>"",
								  "feild_tpl" =>"place_text1_1",
								);
		}
	else{
	 $this->validData[]=array("feild_label" =>"Share",
		 							"feild_code" =>"share[".$i.']',
								 "feild_type" =>"hidden",
								 "is_required" =>"",
								  
								);
		
	}
	 $this->validData[]=array("feild_label" =>"Index",
	 							"feild_code" =>"indxx_id[".$i.']',
								 "feild_type" =>"hidden",
								 "is_required" =>"",
								   "feild_tpl" =>"hidden2",
								 'value'=>$_SESSION['NewIndxxId']
								 );
	
	 $this->validData[]=array(	"feild_label"=>"Ticker Currency",
	 							"feild_code" =>"curr[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
							// "feildValues"=>array("onclick"=>"checkvalue('".$id."')"),
								
								 );	 
	$this->validData[]=array(	"feild_label"=>"Dividend Currency",
	 							"feild_code" =>"divcurr[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );	 
     $this->validData[]=array(	"feild_label"=>"Sedol",
	 							"feild_code" =>"sedol[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );	 
								 
	$this->validData[]=array(	"feild_label"=>"Cusip",
	 							"feild_code" =>"cusip[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );
								 
	$this->validData[]=array(	"feild_label"=>"Country Name",
	 							"feild_code" =>"countryname[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
 								 );	 	
								 						 	 						 
   	$this->validData[]=array(	"feild_label"=>"Sector",
	 							"feild_code" =>"sector[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );		
								 				
	$this->validData[]=array(	"feild_label"=>"Inustry",
	 							"feild_code" =>"industry[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );						
								 
	$this->validData[]=array(	"feild_label"=>"SubInustry",
	 							"feild_code" =>"subindustry[".$i.']',
								 "feild_type" =>"text",
								  "feild_tpl" =>"place_text1_1",
								 "is_required" =>"",
								
								 );								 		 								 
}
	$this->getValidFeilds();
	}
	
	
function addedrunning()
{
	
	$indexdata=$this->db->getResult("select tbl_indxx_temp.* from tbl_indxx_temp where id='".$_SESSION['tempindexid']."' ");
	//$this->pr($indexdata,true);
		$this->_baseTemplate="inner-template";
			$this->_bodyTemplate="caupcomingindex/addedrunning";
			$this->_title=$this->siteconfig->site_title;
			$this->_meta_description=$this->siteconfig->default_meta_description;
			$this->_meta_keywords=$this->siteconfig->default_meta_keyword;
			
			$this->smarty->assign('pagetitle','Securities');
					
			$this->smarty->assign('indexdata',$indexdata);
		$this->smarty->assign('bredcrumssubtitle','Add/Submit Securities');
		
		
		
			
		$this->show();

	
	}	
	function addNewNext()
	{
		$this->_baseTemplate="inner-template";
			$this->_bodyTemplate="caupcomingindex/addnext";
			$this->_title=$this->siteconfig->site_title;
			$this->_meta_description=$this->siteconfig->default_meta_description;
			$this->_meta_keywords=$this->siteconfig->default_meta_keyword;
			
			$this->smarty->assign('pagetitle','Securities');
		$this->smarty->assign('bredcrumssubtitle','Add/Submit Securities');
		
		
		
			
		$this->show();
	}
	
	
	
	
	
	
	
	
	 protected function view(){
		 
		$this->_baseTemplate="inner-template";
			$this->_bodyTemplate="caupcomingindex/view";
			$this->_title=$this->siteconfig->site_title;
			$this->_meta_description=$this->siteconfig->default_meta_description;
			$this->_meta_keywords=$this->siteconfig->default_meta_keyword;
			
			$this->smarty->assign('pagetitle','Index');
		$this->smarty->assign('bredcrumssubtitle','ViewIndex');
		
		
		
		$viewdata=$this->db->getResult("select tbl_indxx.*,tbl_index_types.name as indexname from tbl_indxx left join tbl_index_types on tbl_index_types.id=tbl_indxx.type where tbl_indxx.id='".$_GET['id']."'",true);
		//$this->pr($viewdata,true);
		$this->smarty->assign("viewindexdata",$viewdata);
		
		
		
		
		
		
		
		
		$userdata=$this->db->getResult("select tbl_ca_user.*,tbl_assign_index.* from tbl_assign_index left join tbl_ca_user on tbl_ca_user.id=tbl_assign_index.user_id where tbl_assign_index.indxx_id='".$_GET['id']."'",true);
		//$this->pr($viewdata,true);
		//$this->smarty->assign("totalusers",count($userdata));
		$this->smarty->assign("userdata",$userdata);
		
		
		
		$sequruityData=$this->db->getResult('SELECT * FROM tbl_indxx_ticker where indxx_id="'.$_GET['id'].'"',true);
	//	$this->pr($sequruityData,true);
		$this->smarty->assign("indexSecurity",$sequruityData);
		$this->smarty->assign("totalindexSecurityrows",count($sequruityData));
		
		
		 $this->show();
			
	}
		protected function delete(){
		 
		 $this->_baseTemplate="inner-template";
			$this->_bodyTemplate="caindex/delete";
			$this->_title=$this->siteconfig->site_title;
			$this->_meta_description=$this->siteconfig->default_meta_description;
			$this->_meta_keywords=$this->siteconfig->default_meta_keyword;
			
			$this->smarty->assign('pagetitle','Index');
		$this->smarty->assign('bredcrumssubtitle','Deleted Index');
		
		if($_SESSION['User']['type']=='1' && $_GET['id'])
		{
		 $deleteddata=$this->db->getResult("select * from tbl_indxx_temp where tbl_indxx_temp.id='".$_GET['id']."'");
		$this->smarty->assign("deleteddata",$deleteddata);
		
		 $indexname=$deleteddata['name'];
		 $indexticker=$deleteddata['ticker'];
	
		
		 	$indxx=$deleteddata;
		//$this->pr($indxx,true);
		
		$indxxadmins =	$this->db->getResult('Select  user_id from tbl_assign_index_temp where indxx_id="'.$_GET['id'].'" ',true);
$indxxadmin='';
//print_r($indxxadmins );
$emailto=array();

if(!empty($indxxadmins))
{
foreach($indxxadmins as $array)
{
	$emailto[]=$array['user_id'];
}


}

//print_r($emailto);

	//exit;
	if(!empty($emailto))
	{	
//	echo  'Select  email from tbl_ca_user where type="1" or id in ('.implode(',',$emailto).') ';
	$admins =	$this->db->getResult('Select  email from tbl_ca_user where type="1" or id in ('.implode(',',$emailto).') ',true);
	}
else
{	$admins =	$this->db->getResult('Select  email from tbl_ca_user where 1=1 ',true);
}
//$this->pr($admins,true);	
	
	$user=array();
	if(!empty($admins))	
	foreach($admins as $admin)
	{
	$user[]=$admin['email'];
	}
		
  $to=implode(',',$user);		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: Indexing <indexing@indxx.com>' . "\r\n"."CC: indexing@indxx.com". "\r\n";
$body='Hi <br>';
$body.='Your Upcoming Indxx '.$indxx['name'].'('.$indxx['code'].') has been deleted by admin , <br> Please  <a href="'.$this->siteconfig->base_url.'index.php?module=caupcomingindex">Click here </a> to do more.<br>Thanks ';


		mail($to,"ICAI :Upcoming Indxx Deleted " ,$body,$headers);
		
		
	
		 
		 
		 
		 
		$strQuery = "delete from tbl_indxx_temp where tbl_indxx_temp.id='".$_GET['id']."'";
			$this->db->query($strQuery);
			
			
			$strQuery2 = "delete from tbl_indxx_ticker_temp where tbl_indxx_ticker_temp.indxx_id='".$_GET['id']."'";
			$this->db->query($strQuery2);
			
			
			if($deleteddata['addtype']==1)
			{
			$strQuery2 = "delete from tbl_share_temp where indxx_id='".$_GET['id']."'";
			$this->db->query($strQuery2);
			
			}
			
			$strQuery4 = "delete from tbl_assign_index_temp where tbl_assign_index_temp.indxx_id='".$_GET['id']."'";
			$this->db->query($strQuery4);
			
			
			
						
	//	echo "select * tbl_indxx where tbl_indxx.id='".$_GET['id']."'";
				
			
			
			
			
			
			
		}
		else
		{
				$this->Redirect("index.php?module=caupcomingindex","You are not authorized to perofrm this task!","error");
		}
			
			$this->show();
	}
	
	
	
	function approveindex_temp(){
	
	//$this->pr($_POST,true);
	if(!empty($_POST))
	{
		foreach($_POST as $key=>$val)
		{
			foreach($val as $key2=>$val2)
			{
				if(!empty($val2))
				{
				//echo $val2;	
				
				
				 $approveindexdata=$this->db->getResult("select * from tbl_indxx_temp where tbl_indxx_temp.id='".$val2."'");
				$indxxadmins =	$this->db->getResult('Select  user_id from tbl_assign_index_temp where indxx_id="'.$val2.'" ',true);
$indxxadmin='';
//print_r($indxxadmins );
$emailto=array();

if(!empty($indxxadmins))
{
foreach($indxxadmins as $array)
{
	$emailto[]=$array['user_id'];
}


}

//print_r($emailto);

	//exit;
	if(!empty($emailto))
	{	
//	echo  'Select  email from tbl_ca_user where type="1" or id in ('.implode(',',$emailto).') ';
	$admins =	$this->db->getResult('Select  email from tbl_ca_user where type="1" or id in ('.implode(',',$emailto).') ',true);
	}
else
{	$admins =	$this->db->getResult('Select  email from tbl_ca_user where 1=1 ',true);
}
//$this->pr($admins,true);	
	
	$user=array();
	if(!empty($admins))	
	foreach($admins as $admin)
	{
	$user[]=$admin['email'];
	}
		
  $to=implode(',',$user);		
 
		$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: Indexing <indexing@indxx.com>' . "\r\n"."CC: indexing@indxx.com". "\r\n";
$body='Hi <br>';
$body.='Your Upcoming Indxx '.$approveindexdata['name'].'('.$approveindexdata['code'].') has been approved by '.$_SESSION['User']['name'].' , <br> Please  <a href="'.$this->siteconfig->base_url.'index.php?module=caupcomingindex">Click here </a> to do more.<br>Thanks ';


		mail($to,"ICAI :Upcoming Indxx Approved " ,$body,$headers);
		
	if($_SESSION['User']["type"]==3)
	{
	$this->db->query("update tbl_indxx_temp set dbusersignoff ='1' where id='".$val2."'");		
	}	
	if($_SESSION['User']["type"]==1)
	{
	$this->db->query("update tbl_indxx_temp set finalsignoff ='1' where id='".$val2."'");		
	}	
				
				}
			}
		}
	
	}
	}
	
	protected function deleteindex(){
		 
		 $this->_baseTemplate="inner-template";
			$this->_bodyTemplate="caindex/delete";
			$this->_title=$this->siteconfig->site_title;
			$this->_meta_description=$this->siteconfig->default_meta_description;
			$this->_meta_keywords=$this->siteconfig->default_meta_keyword;
			
			$this->smarty->assign('pagetitle','Index');
		$this->smarty->assign('bredcrumssubtitle','Deleted Index');
		
		if($_SESSION['User']['type']=='1')
		{
			
			if(!empty($_POST))
			{
				//$this->pr($_POST,true);
				
				foreach($_POST as $key=>$val)
		{
			foreach($val as $key2=>$val2)
			{
				if(!empty($val2))
				{
			
		 $deleteddata=$this->db->getResult("select * from tbl_indxx_temp where tbl_indxx_temp.id='".$val2."'");
		$this->smarty->assign("deleteddata",$deleteddata);
		
		 $indexname=$deleteddata['name'];
		 $indexticker=$deleteddata['ticker'];
	
		
		 	$indxx=$deleteddata;
		//$this->pr($indxx,true);
		
		$indxxadmins =	$this->db->getResult('Select  user_id from tbl_assign_index_temp where indxx_id="'.$val2.'" ',true);
$indxxadmin='';
//print_r($indxxadmins );
$emailto=array();

if(!empty($indxxadmins))
{
foreach($indxxadmins as $array)
{
	$emailto[]=$array['user_id'];
}


}

//print_r($emailto);

	//exit;
	if(!empty($emailto))
	{	
//	echo  'Select  email from tbl_ca_user where type="1" or id in ('.implode(',',$emailto).') ';
	$admins =	$this->db->getResult('Select  email from tbl_ca_user where type="1" or id in ('.implode(',',$emailto).') ',true);
	}
else
{	$admins =	$this->db->getResult('Select  email from tbl_ca_user where 1=1 ',true);
}
//$this->pr($admins,true);	
	
	$user=array();
	if(!empty($admins))	
	foreach($admins as $admin)
	{
	$user[]=$admin['email'];
	}
		
  $to=implode(',',$user);		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: Indexing <indexing@indxx.com>' . "\r\n"."CC: indexing@indxx.com". "\r\n";
$body='Hi <br>';
$body.='Your Upcoming Indxx '.$indxx['name'].'('.$indxx['code'].') has been deleted by admin , <br> Please  <a href="'.$this->siteconfig->base_url.'index.php?module=caupcomingindex">Click here </a> to do more.<br>Thanks ';


		mail($to,"ICAI :Upcoming Indxx Deleted " ,$body,$headers);
		
		
	
		 
		 
		 
		 
		$strQuery = "delete from tbl_indxx_temp where tbl_indxx_temp.id='".$val2."'";
			$this->db->query($strQuery);
			
			
			$strQuery2 = "delete from tbl_indxx_ticker_temp where tbl_indxx_ticker_temp.indxx_id='".$val2."'";
			$this->db->query($strQuery2);
			
			$strQuery4 = "delete from tbl_assign_index_temp where tbl_assign_index_temp.indxx_id='".$val2."'";
			$this->db->query($strQuery4);
			
			
			
						
	//	echo "select * tbl_indxx where tbl_indxx.id='".$_GET['id']."'";
				
			
			
			
			
			
			
		}}
		}
			}
		}
		else
		{
				$this->Redirect("index.php?module=caupcomingindex","You are not authorized to perofrm this task!","error");
		}
			
			$this->show();
	}
	
	
	
	
	
} // class ends here

?>