<?php 
//// to add the Static Function 
class Models{	

	 
	 var $_depth= 0;
	
	
	function checkUserSession()
	{
						 
	//		$this->pr($_SESSION);
	
		if(!isset($_SESSION['User']['id']) && $_SESSION['User']['id'] == '' )
		{
			
			$_SESSION['redirect_url'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	
		   $this->Redirect("index.php",$this->l("Please Login or Sign up on the site."),"error");
					
			
			
		}
		 
		
		
	}
			 
		
		
	
	function createUserSession()
	{
						 
	 		
		if(isset($_SESSION['User']['UserID']) && $_SESSION['User']['UserID'] != '' )
		{
		  	$this->smarty->assign('sessData', $_SESSION['User']);
			
		}
		
		
	}


	
	function getRunningSecurities(){
                                
                  $sql="SELECT distinct(isin),ticker FROM tbl_indxx_ticker WHERE status='1' order by ticker asc ";
                                  
                                  $get_options = $this->db->getResult($sql,true);
                //$this->pr($get_options,true);
                if ($get_options > 0) {
                                foreach($get_options as $value) {
                                $array[$value['isin']] = $value['ticker']."(".$value['isin'].")";
                                }
                }
                
                                return $array;  
                                
               }
                                
        function getUpcomingSecurities(){
                                
              $sql="SELECT distinct(isin),ticker FROM tbl_indxx_ticker_temp WHERE status='1' order by ticker asc ";
                                  
                                  $get_options = $this->db->getResult($sql,true);
                //$this->pr($get_options,true);
                if ($get_options > 0) {
                                foreach($get_options as $value) {
                                $array[$value['isin']] = $value['ticker']."(".$value['isin'].")";
                                }
                }
                
                                return $array;  
                                
                                }

	
	
	## function to get product Custion Option array
	## @parms : animalid
	## @ return array
	

	
 function intcheck($int)
	{
		if(is_numeric($int) === TRUE)
		{
         if((int)$int == $int)
			{
				return 1;
             }
			else
			{
				
             return 0;
            }
              
		}
		else
		{
        
            return 0;
        }
    }
function GetAdmin_group ()
	{
		$groupArray	=	$this->db->getResult("select  id,name from tbl_admin_group where system!='1' order by Name ",true);
		//$this->pr($catArray);	
		if(is_array($groupArray) > 0){ 
			$ShowList = array();
			foreach($groupArray as $data){
				$ShowList[$data['id']]	=	$data['name'];
			}
		}
		
		
		
	return $ShowList;	
	}
	
	function getEmployee($select='')
	{
		$groupArray	=	$this->db->getResult("select  id,fname,lname from tbl_employee where status='1' order by fname ",true);
		//$this->pr($catArray);	
		if(is_array($groupArray) > 0){ 
			$ShowList = array();
			if ($select)
			$ShowList1['']=$select;
			else
			$ShowList['']="Select";
			foreach($groupArray as $data){
				$ShowList[$data['id']]	=	$data['fname']." ".$data['lname'];
			}
		}
	return $ShowList;	
	
	}	function getEmployee2()
	{
	$groupArray	=	$this->db->getResult("select  id,fname,lname from tbl_employee where status='1' order by fname ",true);
		//$this->pr($catArray);	
		if(is_array($groupArray) > 0){ 
			$ShowList = array();
			foreach($groupArray as $data){
				$ShowList[$data['id']]	=	$data['fname']." ".$data['lname'];
			}
		}
	return $ShowList;
	}
	
		function getVeryfyStatusArray(){
			return	array('1'=>'Yes', '0'=>'No' ) ; 
		}
		
	function getPriorityArray(){
			return	array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10' ) ; 
		}	
		
		
	function	getReturnTypes()
	{
			return	array('0'=>'TR', '1'=>'PR' ) ; 
	
	}
		function getStateName($stateid="")
		{
			$query	=	$this->db->getResult("select name from tbl_states  where id='$stateid'");
			$name=$query['name'];
			return $name;
		}
		function getCityName($cityid="")
		{
			$query	=	$this->db->getResult("select name from tbl_cities  where id='$cityid'");
			$name=$query['name'];
			return $name;
		}
		
function getDBUsers(){
$query2='Select *  from tbl_database_users where status = "1"';
$result2=mysql_query($query2);
$users=array();
if(mysql_num_rows($result2)>0)
{
while($row=mysql_fetch_assoc($result2))
{
$users[]=$row['email'];

}
}
if(!empty($users))
return implode(",",$users);
else 
return null;

}		
	function 	setSessionvariable()
	{
			$values=	$this->db->getResult("select code ,name from tbl_ca_subcategory  union select field_name as code ,definition as name from tbl_ca_action_fields   ");
if(!empty($values))
{
$array=array();
foreach($values as $value)
{
$array[$value['code']]=$value['name'];
}
return $array;

}
	
	}		
		
		function getActionTypes()
	{
		$groupArray	=	$this->db->getResult("select  id,name from tbl_ca_action_event_type order by name ",true);
		//$this->pr($catArray);	
		if(is_array($groupArray) > 0){ 
			$ShowList = array();
			$ShowList['']="Select";
			foreach($groupArray as $data){
				$ShowList[$data['id']]	=	$data['name'];
			}
		}
	return $ShowList;	
	
	}
		
		function getActionEvents()
	{
		$groupArray	=	$this->db->getResult("select  id,name from tbl_ca_subcategory order by name ",true);
		//$this->pr($catArray);	
		if(is_array($groupArray) > 0){ 
			$ShowList = array();
			$ShowList['']="Select";
			foreach($groupArray as $data){
				$ShowList[$data['id']]	=	$data['name'];
			}
		}
	return $ShowList;	
	
	}
	
	
		function getEvents()
	{
		$groupArray	=	$this->db->getResult("select  id,name from tbl_ca_action_event_type order by name ",true);
		//$this->pr($catArray);	
		if(is_array($groupArray) > 0){ 
			$ShowList = array();
			$ShowList['']="Select";
			foreach($groupArray as $data){
				$ShowList[$data['id']]	=	$data['name'];
			}
		}
	return $ShowList;	
	
	}
	
		
		function getParentUser($id)
		{
			$catArray	=	$this->db->getResult("select u.parent from tbl_users u where u.id = '".$id."'  and u.status='1' ",true);	
	
		if($catArray){
			
			foreach($catArray as $data){	
					if($data['parent'] !='0')
					{	
						$this->finalArray[] = $data['parent'];
						 $this->getParentUser($data['parent']);
					}
			}
			
		}
		return $this->finalArray;
		
		}
function getLevel($key)
{
			$catArray	=	$this->db->getResult("select * from tbl_level ",true);	
	
		if($catArray){
		return $catArray[$key];
		}
}
function getChildUsers($id)		
{
$userArray=$this->db->getResult("select count(u.id) as users from tbl_users u  where u.parent = '$id'  and u.status='1'",true);
if($userArray){
		return $userArray[0];
		}
}		

function GetChildReferals($id)		
{
	 
		for($i=1; $i<=$this->siteconfig->site_user_level; $i++)
		{ if($id!='')
			{$data = $this->GetChildReferals2($id,$i);
			 
			$id = $data['ids'] ;
			$returnData[] = $data;
			}
		}
		
 
	return $returnData;
}



function GetChildReferals2($id,$level)		
{
// echo $id;
	if($level<=$this->siteconfig->site_user_level)
	{
	//	echo "select count(u.id) as total , group_concat(u.id) as ids from tbl_users u  where u.parent IN ($id)  and u.status='1'";
		$userArray=$this->db->getResult("select count(u.id) as total , group_concat(u.id) as ids from tbl_users u  where u.parent IN ($id)  and u.status='1'");
//	$this->pr($userArray);
	}
		return $userArray;
}



		
function GetChildReferalsusers($id,$level,$orderBy)
	{
		
		for($i=$level; $i<=$this->siteconfig->site_user_level; $i++)
		{ if($id!='')
		{
				$data = $this->GetChildReferals3($id,$i,$orderBy);
				//$this->pr($data);
				$id = $data['ids'] ;
				$returnData[] = $data;
			}
		}
		
 
	return $returnData;
	
	}
function GetChildReferals3($id,$level,$orderBy)		
{
 
	if($level<=$this->siteconfig->site_user_level)
	{
	//	echo "select u.id from tbl_users u  where u.parent IN ($id)  and u.status='1' order by dateAdded  ASC";
		$userArray1=$this->db->getResult("select count(u.id) as total, group_concat(u.id) as ids  from tbl_users u  where u.parent IN ($id)  and u.status='1'");
		$userArray2	=$this->db->getResult("select u.id from tbl_users u  where u.parent IN ($id)  and u.status='1' order by dateAdded  ASC");
		$userArray=$userArray1;
		$userArray['users']=$userArray2;
		//$this->pr($userArray2);

	}
		return $userArray;

}
	
function getRefferedUserDetails($userId)
{
	
 if(empty($userId)){
		 	return array();
		 }	
		// echo "SELECT U.*,U.name as fname, DATE_FORMAT(dateAdded,'%a %b %e %Y %r') as joinDate  FROM `tbl_users` U where U.id = '".$userId."'  AND U.status = '1' ";exit;
		 $userData = $this->db->getResult("SELECT U.*, DATE_FORMAT(dateAdded,'%a %b %e %Y %r') as joinDate  FROM `tbl_users` U where U.id = '".$userId."'  AND U.status = '1' ");	
		$userData1=$this->db->getResult("select count(u.id) as total from tbl_users u  where u.parent ='".$userId."'  and u.status='1'");
	 $userData['totalChild']=	$userData1['total'];	
		return $userData;
}	

 function getUserDetails($userId)	{
		 if(empty($userId)){
		 	return array();
		 }	
		// echo "SELECT U.*,U.name as fname, DATE_FORMAT(dateAdded,'%a %b %e %Y %r') as joinDate  FROM `tbl_users` U where U.id = '".$userId."'  AND U.status = '1' ";exit;
		 $userData = $this->db->getResult(
		 "select A.*,c1.name as billingCityName, c2.name as shippingCityName ,s1.name as billingStateName
		,s2.name as shippingStateName,CO1.name as billingCountryName,CO2.name as shippingCountryName from tbl_users A
		left join tbl_cities c1 on c1.id=A.billingCity
		left join tbl_cities c2 on c2.id=A.shippingCity
		left join tbl_states s1 on s1.id=A.billingState
		left join tbl_states s2 on s2.id=A.shippingState
		left join tbl_countries CO1 on CO1.id=A.billingCountry
		left join tbl_countries CO2 on CO2.id=A.shippingCountry
		  where A.id = '".$userId."' AND A.status = '1' ");	
		return $userData;
	}	

public function getCartItems(){		
			$sessionId = session_id();	
			 $strSqlCart = " select *, (price*quantity) as lineTotal from tbl_cart   where sessionId = '".$sessionId."'  ";			
			$cartData = $this->db->getResult($strSqlCart, true);
			return $cartData;
			
		}

	
		function getCheckoutDetails(){
		
		$cartItems = 	$this->getCartItems();
		$orderTotal = 0;
		$cartTotal = 0;
		$shippingTotal = 0;
		
		if(is_array($cartItems) ){
			
				foreach($cartItems as $key=>$data){
					$cartTotal 		= $cartTotal+ ($data['quantity']*$data['price']);					
					
				}
			
		}
				$sessionId = session_id();
//		 $shippingTotal=$this->getshippingcharges();
	
		$checkoutData['cart_total'] = $cartTotal;
		$checkoutData['shipping_total'] = $shippingTotal;
		$checkoutData['order_total'] = $shippingTotal+$cartTotal;
		return $checkoutData;
		//$this->pr($checkoutData);
	}
	
	
		function clearCartSessionData()
		{
		unset($_SESSION['User']['order']['id']);	
		$strDelete = "delete from tbl_cart where sessionId ='".session_id()."'";
		$this->db->query($strDelete);
		return true;
		
	    }
		
function object_2_array($result) 
{ 
    $array = array(); 
    foreach ($result as $key=>$value) 
    { 
        if (is_object($value) || is_array($value)) 
        { 
            $array[$key]=$this->object_2_array($value); 
        } 
        else 
        { 
            $array[$key]=$value; 
        } 
    } 
    return $array; 
}
	

 function getPoint($price)
	 {
		  $totalprice=$price;
		
		$query=$this->db->getResult("SELECT * From tbl_pointvalue WHERE $totalprice BETWEEN min_value AND max_value");
		return $query['pointvalue'];
		 
	 }	
	 
	 
	 function getTypes(){
		
		 $sql="SELECT code,name FROM tbl_index_types WHERE status='1' order by name desc ";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['code']] = $value['name'];
		}
	}
	
		return $array;  

	}
	
	 function getIndexes(){
		
		 $sql="SELECT id,name FROM tbl_indxx WHERE status='1' ";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['id']] = $value['name'];
		}
	}
	
		return $array;  

	}
	
	function getCommodityIndexesNew(){
	 $sql="SELECT id,name,code FROM tbl_commodity_ticker WHERE status='1'  and dbstatus='1' order by name asc";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	
	$array[]="Select Commodity  Index";
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['id']] = $value['name']." (".$value['code'].")";
		}
	}
	
		return $array;  
	}
	
	
		 function getIndexesNew(){
		
		 $sql="SELECT id,name,code FROM tbl_indxx WHERE status='1' order by name asc ";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	
	$array[]="Select Index";
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['id']] = $value['name']." (".$value['code'].")";
		}
	}
	
		return $array;  

	}
	function getCashIndex(){
		 $sql="SELECT id,name,isin FROM tbl_cash_index WHERE status='1' order by name asc ";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	
	$array[]="Select Cash Index";
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['id']] = $value['name']." (".$value['isin'].")";
		}
	}
	
		return $array;  

	
	}
	
		function getLiveIndexId($code){
	
	$sql="SELECT id FROM tbl_indxx WHERE code='".$code."' ";
		  
		  $indxx = $this->db->getResult($sql,false,1);
		  return $indxx['id'];
	}
	function gettempIndexId($code){
	
	$sql="SELECT id FROM tbl_indxx_temp WHERE code='".$code."' ";
		  
		  $indxx = $this->db->getResult($sql,false,1);
		  return $indxx['id'];
	}
	 function getTempIndexes(){
		
		 $sql="SELECT id,name FROM tbl_indxx_temp WHERE status='1' ";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['id']] = $value['name'];
		}
	}
	
		return $array;  

	}
	
	
	function getRunningIndexes(){
		
		 $sql="SELECT id,name FROM tbl_indxx WHERE status='1' ";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['id']] = $value['name'];
		}
	}
	
		return $array;  

	}
	
	
		 function getCalendarZone(){
		
		 $sql="SELECT id,name FROM tbl_calendarzone where 1=1 ";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['id']] = $value['name'];
		}
	}
	
		return $array;  

	}
	
	
	 function getIndex($id){
		
		 $sql="SELECT id,name FROM tbl_indxx WHERE id='".$id."' ";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['id']] = $value['name'];
		}
	}
	
		return $array;  

	}
	
	
	 function getUsers(){
		
		 $sql="SELECT code,name FROM tbl_user_types WHERE status='1' ";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['code']] = $value['name'];
		}
	}
	
	
		return $array;  

	}
	
	 function getUserName($id){
		
		 $sql="SELECT id,name FROM tbl_ca_user WHERE id='".$id."' ";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['id']] = $value['name'];
		}
	}
	
	
		return $array;  

	}
	 
	 
	  function getAllUsers(){
		
		 $sql="SELECT id,name FROM tbl_ca_user WHERE status='1' ";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['id']] = $value['name'];
		}
	}
	
	
		return $array;  

	}
	 
	 
	 
	  function getClientName($id){
		
		 $sql="SELECT id,name FROM tbl_ca_client WHERE id='".$id."' ";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['id']] = $value['name'];
		}
	}
	
	
		return $array;  

	}
	 
	 
	  function getAllClients(){
		
		 $sql="SELECT id,name FROM tbl_ca_client WHERE status='1' ";
		  
		  $get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['id']] = $value['name'];
		}
	}
	
	
		return $array;  

	}
	 
	 
	 
	
function toAscii($str, $replace=array(), $delimiter='-') {
	 @setlocale(LC_ALL, 'en_US.UTF8');
	if( !empty($replace) ) {
		$str = str_replace((array)$replace, ' ', $str);
	}

	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

	return $clean;
}	
function getmainMenu($pageType){
	 $sql =  'SELECT id, name from tbl_menucategory where '.$pageType.' IN (type)';
	//$sql .=  ' order by name asc ';
	$get_options = $this->db->getResult($sql,true);
	//$this->pr($get_options,true);
	if ($get_options > 0) {
		foreach($get_options as $value) {
		$array[$value['id']] = $value['name'];
		}
	}
	
	return $array;
	}

		 function GetChildPages($section='',$parentId=0)	{

		$catArray	=	$this->db->getResult("select p.id, p.parent, p.name,(select count(c.id) from tbl_pages c  where c.parent = p.id AND c.mainmenu = '".$section."' and c.status='1') chlids  from tbl_pages p where p.parent = $parentId AND p.mainmenu = '".$section."' and p.status='1' and p.onmenu='0' order by p.id  ",true);	
		 
		if($catArray){
			$i=0;
			 
			foreach($catArray as $data){	
				//$this->pr($data);
					$categoryArray[$i]['id'] = $data['id'];
					$categoryArray[$i]['name'] = $data['name'];
					if ($data['parent']){
					$categoryArray[$i]['indxx']=$this->getIndxx($data['id']);
					}
				
				
					if($data['chlids']>0)
					{	
						$categoryArray[$i]['childCount'] = $data['chlids'];
						$categoryArray[$i]['childs'] = $this->GetChildPages($section,$data['id']);
					}
					 
					$i++;
				 
			}
		}
		//print_r($categoryArray);
		return $categoryArray;
	}
	
	
	function getCurrencyPrice($date)
{
		$currencyarray=array();
		$currency=$this->db->getResult("select *  from tbl_currency ");
		foreach($currency as $row)
		{		
	
				//print_r($row);
				$query2='Select * from tbl_curr_prices where curr_id="'.$row['id'].'" and date ="'.$date.'"';
				$res2=mysql_query($query2);
				if(mysql_num_rows($res2)>0)
				{
				$row2=mysql_fetch_assoc($res2);
				$currencyarray[$row['id']]=$row2['price'];
				$currencyarray[$row['localsymbol']]=$row2['price'];
				}
				
					
			}	
		$currencys=$this->db->getResult("select distinct(curr)  as cno from tbl_indxx ",true);
	//	$this->pr($currencys,true);
		
		foreach($currencys as $row)
		{		
	
				//print_r($row);
				$query2='Select * from tbl_currency where id="'.$row['cno'].'" ';
				$res2=mysql_query($query2);
				if(mysql_num_rows($res2)>0)
				{
				$row2=mysql_fetch_assoc($res2);
				$currencyarray[$row2['id']]=1;
				$currencyarray[$row2['localsymbol']]=1;
				}
				
					
			}	
			
			
			return $currencyarray;
		}

	
	function getIndxx($id){
		
		 return $this->db->getResult("SELECT id,name FROM tbl_chart WHERE parent ='$id' and status='1' ",true);

	}
	
	function getActiveCommodityTickerCount(){
$var=	$this->db->getResult("SELECT id FROM tbl_commodity_ticker WHERE status ='1' and dbstatus='1' ",true);
return count($var);

	}
	
	function checkHoliday($zone,$date)
	{

	 $holiday= $this->db->getResult("SELECT id FROM tbl_holidays WHERE zone_id ='$zone' and date='$date' ");
if(empty($holiday))
{
return true;
}else{
return false;
}

	}
	
	
	function getSecurtyPrices($isin,$curr,$indxxcurr,$date){
	//	echo $isin."=>".$curr."=>".$indxxcurr;
//exit;
	 $ca_value_query="SELECT price,curr FROM tbl_prices_local_curr where isin='".$isin."' and date='".$date."'";
		$ca_values=$this->db->getResult($ca_value_query,false,1);
//$this->pr($ca_values);
if(empty($ca_values))
{
echo "Prices Not Available for ISIN : ".$isin."=>".$date;
exit;
}

$returnArray=array();
		$returnArray['localprice']=0;
		$returnArray['currencyfactor']=0;
		$returnArray['calcprice']=0;
		
		if($indxxcurr){
		if($indxxcurr==$ca_values['curr'] && $indxxcurr==$curr)
		{
		$returnArray['localprice']=$ca_values['price'];
		$returnArray['currencyfactor']=1;
		$returnArray['calcprice']=$ca_values['price'];
		}
		elseif($curr!=$indxxcurr)
		{
			 $cfactor=$this->getPriceforCurrency($indxxcurr,$curr,$date,$id,$action_id);
			
		$returnArray['localprice']=$ca_values['price'];
		$returnArray['currencyfactor']=$cfactor;
		
		if(strcmp(strtoupper($indxxcurr.$curr),$indxxcurr.$curr)==0)
		$returnArray['calcprice']=$ca_values['price']/$cfactor;
		elseif($curr=='KWd')
		$returnArray['calcprice']=$ca_values['price']/($cfactor*1000);
		else
		$returnArray['calcprice']=$ca_values['price']/($cfactor*100);
		
		//$returnArray['calcprice']=$ca_values['price'];
				
		}
		}else{
		$returnArray['localprice']=$ca_values['price'];
		$returnArray['currencyfactor']=1;
		$returnArray['calcprice']=$ca_values['price'];
		}
		return $returnArray;
	}
	
	function getOfferPrices($id,$action_id,$ca_currency,$index_currency,$date,$indxxKey=0,$temp=0)
	{

//echo $date;
//exit;

if($temp){
	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited_temp where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);
}else{
	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);

}
//echo $date;

if(empty($ca_values))
{

	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
		
}//	$this->pr($ca_values,true);
		
		$localprice=0;
		$localcurrency='';
		$finalPrice=0;
		
		$returnArray=array();
		$returnArray['op_value_local_price']=0;
		$returnArray['op_value_local_currency']=0;
		$returnArray['op_price_in_ca_currency']=0;
		$returnArray['op_price_index_currency']=0;
		
		if(!empty($ca_values))	
		{
			
			foreach($ca_values as $ca_value)
			{
			//$this->pr($ca_value);
			
			if($ca_value['field_name']=='CP_PX')
			{
			$localprice=$ca_value['field_value'];
			}
			if($ca_value['field_name']=='CP_CRNCY')
			{
			$localcurrency=$ca_value['field_value'];
			}
		
			
			
			}
		
		
		
		}	

//echo $localcurrency."=>".$localprice;
//exit;

	if($index_currency){	
	if($ca_currency==$index_currency && $index_currency==$localcurrency)
	{
//echo "deepak";
//exit;		

$returnArray['op_value_local_price']=$localprice;
		$returnArray['op_value_local_currency']=$localcurrency;
		$returnArray['op_price_in_ca_currency']=$localprice;
		$returnArray['op_price_index_currency']=$localprice;

		return $returnArray;
		
	//return $localprice;
	}
	else{
		
		if($ca_currency==$localcurrency)
		{
		$cfactor=$this->getPriceforCurrency($index_currency,$ca_currency,$date,$id,$action_id);
		
		if(strcmp(strtoupper($index_currency.$ca_currency),$index_currency.$ca_currency)==0)
		$priceinlocal=$localprice/$cfactor;
		elseif($ca_currency=="KWd")
			$priceinlocal= $localprice/($cfactor*1000);
	else
		$priceinlocal= $localprice/($cfactor*100);
		
		$returnArray['op_value_local_price']=$localprice;
		$returnArray['op_value_local_currency']=$localcurrency;
		$returnArray['op_price_in_ca_currency']=$priceinlocal;
		$returnArray['op_price_index_currency']=$priceinlocal;
		
		return $returnArray;
		
		}else
		{	
		//		echo "deepak";
		//exit;

		//echo $index_currency."=>".$ca_currency."=>".$localcurrency;
		//exit;
		$cfactor=$this->getPriceforCurrency($index_currency,$ca_currency,$date,$id,$action_id);
		
		if(strcmp(strtoupper($index_currency.$ca_currency),$index_currency.$ca_currency)==0)
		$indxxCurrecnyPrice=$localprice/$cfactor;
		elseif($ca_currency=="KWd")
			$indxxCurrecnyPrice= $localprice/($cfactor*1000);
			else
		$indxxCurrecnyPrice=$localprice/($cfactor*100);
			
			
			$cfactor_local=$this->getPriceforCurrency($ca_currency,$localcurrency,$date,$id,$action_id);
				if(strcmp(strtoupper($index_currency.$ca_currency),$index_currency.$ca_currency)==0)
			$localcurrencyprice=($localprice/$cfactor_local);
			elseif($ca_currency=="KWd")
			$localcurrencyprice= $localprice/($cfactor_local*1000);
			else
				$localcurrencyprice=$localprice/($cfactor_local*100);
			$returnArray['op_value_local_price']=$localprice;
			$returnArray['op_value_local_currency']=$localcurrency;
			$returnArray['op_price_in_ca_currency']=$localcurrencyprice;
			$returnArray['op_price_index_currency']=$indxxCurrecnyPrice;
			return $returnArray;

			//echo $index_currency."=>".$ca_currency."=>".$localcurrency;
			//return 
		}//return "Currency Conversion Required.<br>";
	}
	}else{
	
		
		if($ca_currency==$localcurrency)
		{
		
		$returnArray['op_value_local_price']=$localprice;
		$returnArray['op_value_local_currency']=$localcurrency;
		$returnArray['op_price_in_ca_currency']=$localprice;
		$returnArray['op_price_index_currency']=$localprice;
		
		return $returnArray;
		
		}else
		{	
			
			
			$cfactor_local=$this->getPriceforCurrency($ca_currency,$localcurrency,$date,$id,$action_id);
				if(strcmp(strtoupper($localcurrency.$ca_currency),$localcurrency.$ca_currency)==0)
			$localcurrencyprice=($localprice/$cfactor_local);
			elseif($ca_currency=="KWd")
			$localcurrencyprice= $localprice/($cfactor_local*1000);
			else
				$localcurrencyprice=$localprice/($cfactor_local*100);
			$returnArray['op_value_local_price']=$localprice;
			$returnArray['op_value_local_currency']=$localcurrency;
			$returnArray['op_price_in_ca_currency']=$localcurrencyprice;
			$returnArray['op_price_index_currency']=$localcurrencyprice;
			return $returnArray;

			//echo $index_currency."=>".$ca_currency."=>".$localcurrency;
			//return 
		}//return "Currency Conversion Required.<br>";
	
	}
			
	}
	
	
		function getCaPrices2($id,$action_id,$ca_currency,$index_currency,$date,$div_type=0,$indxxKey=0,$temp=0)
	{
if($temp)
{
	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited_temp where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);

}
else
{	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);
}
//echo $date;



if(empty($ca_values))
{	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
}
		//$this->pr($_SESSION);
		//$this->pr($ca_values,true);
		$localprice=0;
		$localcurrency='';
		$finalPrice=0;
		$adjfactor=0;
		$dvdtype=0;
		$returnArray=array();
		$returnArray['ca_value_local_price']=0;
		$returnArray['CP_DVD_TYP']=0;
			$returnArray['CP_ADJ']=0;
		$returnArray['ca_value_local_currency']=0;
		$returnArray['ca_price_in_ca_currency']=0;
		$returnArray['ca_price_index_currency']=0;
		if($div_type==1){
		if(!empty($ca_values))	
		{
			
			foreach($ca_values as $ca_value)
			{
			//$this->pr($ca_value);
			
			if($ca_value['field_name']=='CP_NET_AMT')
			{
			$localprice=$ca_value['field_value'];
			}
			if($ca_value['field_name']=='CP_DVD_CRNCY')
			{
			$localcurrency=$ca_value['field_value'];
			}
			if($ca_value['field_name']=='CP_DVD_TYP')
			{
			$dvdtype=$ca_value['field_value'];
			}
		if($ca_value['field_name']=='CP_ADJ')
			{
			$adjfactor=$ca_value['field_value'];
			}
			
			
			}
		
		if($localprice==0)
		{
		foreach($ca_values as $ca_value)
			{
			//$this->pr($ca_value);
			
			if($ca_value['field_name']=='CP_GROSS_AMT')
			{
			$localprice=$ca_value['field_value'];
			}
			
			
			}
		}
		
		
		}	

		}
		else{
		
			
			foreach($ca_values as $ca_value)
			{
			//$this->pr($ca_value);
			
			if($ca_value['field_name']=='CP_GROSS_AMT')
			{
			$localprice=$ca_value['field_value'];
			}
			if($ca_value['field_name']=='CP_DVD_CRNCY')
			{
			$localcurrency=$ca_value['field_value'];
			}
			if($ca_value['field_name']=='CP_DVD_TYP')
			{
			$dvdtype=$ca_value['field_value'];
			}
		if($ca_value['field_name']=='CP_ADJ')
			{
			$adjfactor=$ca_value['field_value'];
			}
			
			
			}
		
		if($localprice==0)
		{
		foreach($ca_values as $ca_value)
			{
			//$this->pr($ca_value);
			
			if($ca_value['field_name']=='CP_NET_AMT')
			{
			$localprice=$ca_value['field_value'];
			}
			
			
			}
		}
		
		
		
		}
		
		
		if($index_currency)
		{
		
	if($index_currency==$localcurrency)
	{
//echo "deepak";
//exit;		

$returnArray['ca_value_local_price']=$localprice;
	$returnArray['CP_DVD_TYP']=$dvdtype;
	$returnArray['CP_ADJ']=$adjfactor;
		$returnArray['ca_value_local_currency']=$localcurrency;
		$returnArray['ca_price_in_ca_currency']=$localprice;
		$returnArray['ca_price_index_currency']=$localprice;

		return $returnArray;
		
	//return $localprice;
	}
	else{
		$cfactor_local=$this->getPriceforCurrency($index_currency,$localcurrency,$date,$id,$action_id);
		if($cfactor_local)
	{	if(strcmp(strtoupper($index_currency.$localcurrency),$index_currency.$localcurrency)==0)
			$localcurrencyprice=$localprice/$cfactor_local;
			elseif($ca_currency=="KWd")
			$localcurrencyprice= $localprice/($cfactor_local*1000);
			else
				$localcurrencyprice=$localprice/($cfactor_local*100);
	}	
	$returnArray['ca_value_local_price']=$localprice;
			$returnArray['ca_value_local_currency']=$localcurrency;
			$returnArray['CP_DVD_TYP']=$dvdtype;
		$returnArray['CP_ADJ']=$adjfactor;

			
			$returnArray['ca_price_index_currency']=$localcurrencyprice;
			$returnArray['ca_price_in_ca_currency']=$localcurrencyprice;
		
			return $returnArray;
		}
		}	else{
		
		if($ca_currency==$localcurrency)
		{
		$returnArray['ca_value_local_price']=$localprice;
		$returnArray['CP_DVD_TYP']=$dvdtype;
		$returnArray['CP_ADJ']=$adjfactor;

		$returnArray['ca_value_local_currency']=$localcurrency;
		$returnArray['ca_price_in_ca_currency']=$localprice;
		$returnArray['ca_price_index_currency']=$localprice;
		
		return $returnArray;
		
		}else
		{	
				$cfactor_local=$this->getPriceforCurrency($ca_currency,$localcurrency,$date,$id,$action_id);
		
		if($cfactor_local)
		{		if(strcmp(strtoupper($localcurrency.$ca_currency),$localcurrency.$ca_currency)==0)
			$localcurrencyprice=$localprice/$cfactor_local;
			elseif($ca_currency=="KWd")
			$localcurrencyprice= $localprice/($cfactor_local*1000);
			else
				$localcurrencyprice=$localprice/($cfactor_local*100);
		}
			$returnArray['ca_value_local_price']=$localprice;
			$returnArray['ca_value_local_currency']=$localcurrency;
			$returnArray['CP_DVD_TYP']=$dvdtype;
		$returnArray['CP_ADJ']=$adjfactor;

			
			$returnArray['ca_price_index_currency']=$localcurrencyprice;
			$returnArray['ca_price_in_ca_currency']=$localcurrencyprice;
		
			return $returnArray;

			//echo $index_currency."=>".$ca_currency."=>".$localcurrency;
			//return 
		}//return "Currency Conversion Required.<br>";
	}

			
	}
	
		function getCaPrices($id,$action_id,$ca_currency,$index_currency,$date,$div_type=0,$indxxKey=0)
	{

	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);

//echo $date;

if(empty($ca_values))
{	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
}
		//$this->pr($_SESSION);
		
		$localprice=0;
		$localcurrency='';
		$finalPrice=0;
		$adjfactor=0;
		$dvdtype=0;
		$returnArray=array();
		$returnArray['ca_value_local_price']=0;
		$returnArray['CP_DVD_TYP']=0;
			$returnArray['CP_ADJ']=0;
		$returnArray['ca_value_local_currency']=0;
		$returnArray['ca_price_in_ca_currency']=0;
		$returnArray['ca_price_index_currency']=0;
		if($div_type==1){
		if(!empty($ca_values))	
		{
			
			foreach($ca_values as $ca_value)
			{
			//$this->pr($ca_value);
			
			if($ca_value['field_name']=='CP_NET_AMT')
			{
			$localprice=$ca_value['field_value'];
			}
			if($ca_value['field_name']=='CP_DVD_CRNCY')
			{
			$localcurrency=$ca_value['field_value'];
			}
			if($ca_value['field_name']=='CP_DVD_TYP')
			{
			$dvdtype=$ca_value['field_value'];
			}
		if($ca_value['field_name']=='CP_ADJ')
			{
			$adjfactor=$ca_value['field_value'];
			}
			
			
			}
		
		if($localprice==0)
		{
		foreach($ca_values as $ca_value)
			{
			//$this->pr($ca_value);
			
			if($ca_value['field_name']=='CP_GROSS_AMT')
			{
			$localprice=$ca_value['field_value'];
			}
			
			
			}
		}
		
		
		}	

		}
		else{
		
			
			foreach($ca_values as $ca_value)
			{
			//$this->pr($ca_value);
			
			if($ca_value['field_name']=='CP_GROSS_AMT')
			{
			$localprice=$ca_value['field_value'];
			}
			if($ca_value['field_name']=='CP_DVD_CRNCY')
			{
			$localcurrency=$ca_value['field_value'];
			}
			if($ca_value['field_name']=='CP_DVD_TYP')
			{
			$dvdtype=$ca_value['field_value'];
			}
		if($ca_value['field_name']=='CP_ADJ')
			{
			$adjfactor=$ca_value['field_value'];
			}
			
			
			}
		
		if($localprice==0)
		{
		foreach($ca_values as $ca_value)
			{
			//$this->pr($ca_value);
			
			if($ca_value['field_name']=='CP_NET_AMT')
			{
			$localprice=$ca_value['field_value'];
			}
			
			
			}
		}
		
		
		
		}
		
		
		if($index_currency)
		{
		
	if($ca_currency==$index_currency && $index_currency==$localcurrency)
	{
//echo "deepak";
//exit;		

$returnArray['ca_value_local_price']=$localprice;
	$returnArray['CP_DVD_TYP']=$dvdtype;
	$returnArray['CP_ADJ']=$adjfactor;
		$returnArray['ca_value_local_currency']=$localcurrency;
		$returnArray['ca_price_in_ca_currency']=$localprice;
		$returnArray['ca_price_index_currency']=$localprice;

		return $returnArray;
		
	//return $localprice;
	}
	else{
		
		if($ca_currency==$localcurrency)
		{
		$cfactor=$this->getPriceforCurrency($index_currency,$ca_currency,$date,$id,$action_id);
		
		if(strcmp(strtoupper($index_currency.$ca_currency),$index_currency.$ca_currency)==0)
		$priceinlocal=$localprice/$cfactor;
		elseif($ca_currency=="KWd")
			$priceinlocal= $localprice/($cfactor*1000);
			else
		$priceinlocal= $localprice/($cfactor*100);
		
		$returnArray['ca_value_local_price']=$localprice;
		$returnArray['CP_DVD_TYP']=$dvdtype;
		$returnArray['CP_ADJ']=$adjfactor;

		$returnArray['ca_value_local_currency']=$localcurrency;
		$returnArray['ca_price_in_ca_currency']=$priceinlocal;
		$returnArray['ca_price_index_currency']=$priceinlocal;
		
		return $returnArray;
		
		}
		elseif($ca_currency!=$localcurrency && $index_currency==$localcurrency ){
		//echo "bajpai";
		
		$cfactor=$this->getPriceforCurrency($ca_currency,$localcurrency,$date,$id,$action_id);
		
		if(strcmp(strtoupper($index_currency.$ca_currency),$index_currency.$ca_currency)==0)
		$priceinlocal=$localprice/$cfactor;
		elseif($ca_currency=="KWd")
			$priceinlocal= $localprice/($cfactor*1000);
		else
		$priceinlocal= $localprice/($cfactor*100);
		
		$returnArray['ca_value_local_price']=$localprice;
		$returnArray['CP_DVD_TYP']=$dvdtype;
		$returnArray['CP_ADJ']=$adjfactor;

		$returnArray['ca_value_local_currency']=$localcurrency;
		$returnArray['ca_price_in_ca_currency']=$priceinlocal;
		$returnArray['ca_price_index_currency']=$localprice;
		
		return $returnArray;
		
		
		}
		else
		{	
		//echo "deepak";
		//exit;

		//echo $index_currency."=>".$ca_currency."=>".$localcurrency;
		//exit;
	//echo $indxxCurrecnyPrice;		
			//echo $ca_currency;
			$cfactor_local=$this->getPriceforCurrency($ca_currency,$localcurrency,$date,$id,$action_id);
				if(strcmp(strtoupper($index_currency.$ca_currency),$index_currency.$ca_currency)==0)
			$localcurrencyprice=$localprice/$cfactor_local;
			elseif($ca_currency=="KWd")
			$localcurrencyprice= $localprice/($cfactor_local*1000);
		else
				$localcurrencyprice=$localprice/($cfactor_local*100);
		
		
		
		 $cfactor=$this->getPriceforCurrency($index_currency,$ca_currency,$date,$id,$action_id);
		
		if(strcmp(strtoupper($index_currency.$ca_currency),$index_currency.$ca_currency)==0)
		$indxxCurrecnyPrice=$localcurrencyprice/$cfactor;
			elseif($ca_currency=="KWd")
			$indxxCurrecnyPrice= $localcurrencyprice/($cfactor*1000);
		else
		$indxxCurrecnyPrice=$localcurrencyprice/($cfactor*100);
	
			$returnArray['ca_value_local_price']=$localprice;
			$returnArray['ca_value_local_currency']=$localcurrency;
			$returnArray['CP_DVD_TYP']=$dvdtype;
		$returnArray['CP_ADJ']=$adjfactor;

			
			if($index_currency==$ca_currency)
			{
			$returnArray['ca_price_index_currency']=$indxxCurrecnyPrice;
			}
			else
			$returnArray['ca_price_index_currency']=$indxxCurrecnyPrice;
			$returnArray['ca_price_in_ca_currency']=$localcurrencyprice;
		
			return $returnArray;

			//echo $index_currency."=>".$ca_currency."=>".$localcurrency;
			//return 
		}//return "Currency Conversion Required.<br>";
	}
		}	else{
		
		if($ca_currency==$localcurrency)
		{
		$returnArray['ca_value_local_price']=$localprice;
		$returnArray['CP_DVD_TYP']=$dvdtype;
		$returnArray['CP_ADJ']=$adjfactor;

		$returnArray['ca_value_local_currency']=$localcurrency;
		$returnArray['ca_price_in_ca_currency']=$localprice;
		$returnArray['ca_price_index_currency']=$localprice;
		
		return $returnArray;
		
		}else
		{	
				$cfactor_local=$this->getPriceforCurrency($ca_currency,$localcurrency,$date,$id,$action_id);
				if(strcmp(strtoupper($localcurrency.$ca_currency),$localcurrency.$ca_currency)==0)
			$localcurrencyprice=$localprice/$cfactor_local;
			elseif($ca_currency=="KWd")
			$localcurrencyprice= $localprice/($cfactor_local*1000);
	else
				$localcurrencyprice=$localprice/($cfactor_local*100);
			$returnArray['ca_value_local_price']=$localprice;
			$returnArray['ca_value_local_currency']=$localcurrency;
			$returnArray['CP_DVD_TYP']=$dvdtype;
		$returnArray['CP_ADJ']=$adjfactor;

			
			$returnArray['ca_price_index_currency']=$localcurrencyprice;
			$returnArray['ca_price_in_ca_currency']=$localcurrencyprice;
		
			return $returnArray;

			//echo $index_currency."=>".$ca_currency."=>".$localcurrency;
			//return 
		}//return "Currency Conversion Required.<br>";
	}

			
	}
	
	  
  function getPriceforCurrency($ticker1,$ticker2,$date,$id=0,$action_id=0){
 $query="SELECT price  FROM `tbl_curr_prices` WHERE `currencyticker` LIKE '".strtoupper($ticker1.$ticker2)."%' AND `date` = '$date'";
	$res=mysql_query($query);
if(mysql_num_rows($res)>0)
{
$row=mysql_fetch_assoc($res);
if($row['price'])
return $row['price'];
else
{
	return $this->getPriceforCurrency2($ticker1,$ticker2,$date,$id,$action_id);
}
}
else
{
return	$this->getPriceforCurrency2($ticker1,$ticker2,$date,$id,$action_id);
	
}



}
 function getPriceforCurrency2($ticker1,$ticker2,$date,$id,$action_id){
	$query="SELECT price  FROM `tbl_curr_prices` WHERE `currencyticker` LIKE '".strtoupper($ticker2.$ticker1)."%' AND `date` = '$date'";
	$res=mysql_query($query);
if(mysql_num_rows($res)>0)
{
$row=mysql_fetch_assoc($res);
if($row['price'])
return 1/$row['price'];
else
{
//echo "Price Not Available for Currency Ticker ".$ticker2.$ticker1." of date.".$date."<br>".$id."=>".$action_id ;
return 0;
}
}
else
{
//echo "Price Not Available for Currency Ticker ".$ticker2.$ticker1." of date.".$date."<br>".$id."=>".$action_id ;
return 0;
}



}
function getAcionValueName($field_name,$field_value){
$ca_value_query="Select value from tbl_ca_action_fields_values where field_name='".$field_name."'  and data='".$field_value."' ";
		$ca_values=$this->db->getResult($ca_value_query);
	return $ca_values['value'];
}

function getCa($id,$action_id){
	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
	return $ca_values;
}
	
	function getcpratio($id,$action_id,$indxxKey=0,$temp=0)
	{
	
	if($temp)
{		$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited_temp where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);
}else{
$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);
}
//echo $date;

if(empty($ca_values))
{

		$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
}//$this->pr($ca_values,true);
	
		$adj=0;
	if(!empty($ca_values))
	{
	foreach ($ca_values as $ca_value)
	{
		if($ca_value['field_name']=='CP_RATIO')
			{
			$adj=$ca_value['field_value'];
			}
	}
	}
	if($adj==0)
	{
	//echo "Adjustement Ammount is Not Available ";
	//exit;
	return 0;
	
	}
	else{
	return $adj;
	}
	
	
	}
	
	
	
		function getoldName($id,$action_id,$indxxKey=0)
	{
				$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);

//echo $date;

if(empty($ca_values))
{
$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
}//$this->pr($ca_values,true);
	
		$adj=0;
	if(!empty($ca_values))
	{
	foreach ($ca_values as $ca_value)
	{
		if($ca_value['field_name']=='CP_OLD_NAME')
			{
			$adj=$ca_value['field_value'];
			}
	}
	}
	if($adj=='')
	{
	//echo "Old Name Not Available ";
	//exit;
	return false;
	
	}
	else{
	return $adj;
	}
	
	
	}
	
		function getoldISIN($id,$action_id,$indxxKey=0)
	{
				$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);

//echo $date;

if(empty($ca_values))
{	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
}//$this->pr($ca_values,true);
	
		$adj=0;
	if(!empty($ca_values))
	{
	foreach ($ca_values as $ca_value)
	{
		if($ca_value['field_name']=='CP_OLD_ISIN')
			{
			$adj=$ca_value['field_value'];
			}
	}
	}
	if($adj=='')
	{
	//echo "New ISIN Not Available ";
	//exit;
	return false;
	
	}
	else{
	return $adj;
	}
	
	
	}
	
	
	function getnewISIN($id,$action_id,$indxxKey=0)
	{
			
			$returnArray=array();
				$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);

//echo $date;

if(empty($ca_values))
{	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
}//$this->pr($ca_values,true);
	
		$adj=0;
	if(!empty($ca_values))
	{$return=array();
	foreach ($ca_values as $ca_value)
	{
	
	$return[$ca_value['field_name']]=$ca_value['field_value'];
	
		/*if($ca_value['field_name']=='CP_NEW_ISIN')
			{
			$adj=$ca_value['field_value'];
			}*/
	}
	$returnArray=$return;
	}
	if(empty($returnArray))
	{
	//echo "New ISIn Not Available ";
	//exit;
	return false;
	
	}
	else{
	return 	$returnArray;
	}
	
	
	}
	
	function getnewTicker($id,$action_id,$indxxKey=0)
	{
				$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."' and field_name='CP_NEW_TKR'";
		$ca_values=$this->db->getResult($ca_value_query,true);

//echo $date;

if(empty($ca_values))
{	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' and field_name='CP_NEW_TKR' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
}
//$this->pr($ca_values,true);
	
		$adj=0;
	if(!empty($ca_values))
	{
	foreach ($ca_values as $ca_value)
	{
		if($ca_value['field_name']=='CP_NEW_TKR')
			{
			$adj=$ca_value['field_value'];
			}
	}
	}
	if($adj=='')
	{
	//echo "New ISIn Not Available ";
	//exit;
	return false;
	
	}
	else{
	return $adj;
	}
	
	
	}
	
	function getnewName($id,$action_id,$indxxKey=0)
	{
			$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);

//echo $date;

if(empty($ca_values))
{		$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
}//$this->pr($ca_values,true);
	
		$adj=0;
	if(!empty($ca_values))
	{
	foreach ($ca_values as $ca_value)
	{
		if($ca_value['field_name']=='CP_NEW_NAME')
			{
			$adj=$ca_value['field_value'];
			}
	}
	}
	if($adj=='')
	{
	//echo "New name Not Available ";
	//exit;
	 return false;
	
	}
	else{
	return $adj;
	}
	
	
	}
	
	
function getAdjFactorforSplit($id,$action_id,$indxxKey,$temp=0)
	{
		if($temp)
	{	
		$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited_temp where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);
	}
	else{
	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);
	}
//echo $date;

if(empty($ca_values))
{	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
}//$this->pr($ca_values,true);
	
		$adj=0;
	if(!empty($ca_values))
	{
	foreach ($ca_values as $ca_value)
	{
		if($ca_value['field_name']=='CP_ADJ')
			{
			$adj=$ca_value['field_value'];
			}
	}
	}
	if($adj==0)
	{
	//echo "Adjustement Ammount is Not Available ";
	//exit;
	return 0;
	}
	else{
	return $adj;
	}
	
	
	}	
	
function getAdjFactorforDvdStock($id,$action_id,$indxxKey=0,$temp=0)
	{

if($temp){
	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited_temp where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);
}else{
	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  and indxx_id='".$indxxKey."'";
		$ca_values=$this->db->getResult($ca_value_query,true);
}
//echo $date;

if(empty($ca_values))
{	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
}//$this->pr($ca_values,true);
	
		$adj=0;
	if(!empty($ca_values))
	{
	foreach ($ca_values as $ca_value)
	{
		if($ca_value['field_name']=='CP_AMT')
			{
			$adj=$ca_value['field_value'];
			}
	}
	}
	if($adj==0)
	{
	//echo "Adjustement Ammount is Not Available ";
	//exit;
	
	return 0;
	}
	else{
	return $adj;
	}
	
	
		function getAdjFactorforSpinAdd($id,$action_id,$indxxKey=0,$temp=0)
	{
	
	if($temp){
	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited_temp where ca_id='".$id."'  and ca_action_id='".$action_id."'  ";
		$ca_values=$this->db->getResult($ca_value_query,true);
	}else{
	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  ";
		$ca_values=$this->db->getResult($ca_value_query,true);
	
	}
//echo $date;

if(empty($ca_values))
{	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
}//$this->pr($ca_values,true);
	
		$adj=0;
	if(!empty($ca_values))
	{
	foreach ($ca_values as $ca_value)
	{
		if($ca_value['field_name']=='CP_RATIO')
			{
			$adj=$ca_value['field_value'];
			}
	}
	}
	if($adj==0)
	{
	//echo "Adjustement Ammount is Not Available ";
	//exit;
	return 0;
	
	}
	else{
	return $adj;
	}
	
	
	}	}	
	function getnewAdjFactorforSpin($id,$action_id,$indxxKey=0,$temp=0)
	{
	
	if($temp){
	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited_temp where ca_id='".$id."'  and ca_action_id='".$action_id."'  ";
		$ca_values=$this->db->getResult($ca_value_query,true);
	}else{
	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  ";
		$ca_values=$this->db->getResult($ca_value_query,true);
	
	}
//echo $date;

if(empty($ca_values))
{	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
}//$this->pr($ca_values,true);
	
		$adj=0;
	if(!empty($ca_values))
	{
	foreach ($ca_values as $ca_value)
	{
		if($ca_value['field_name']=='CP_RATIO')
			{
			$adj=$ca_value['field_value'];
			}
	}
	}
	if($adj==0)
	{
	//echo "Adjustement Ammount is Not Available ";
	//exit;
	return 0;
	
	}
	else{
	return $adj;
	}
	
	
	}
	function getAdjFactorforSpin($id,$action_id,$indxxKey=0,$temp=0)
	{
	
	if($temp){
	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited_temp where ca_id='".$id."'  and ca_action_id='".$action_id."'  ";
		$ca_values=$this->db->getResult($ca_value_query,true);
	}else{
	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values_user_edited where ca_id='".$id."'  and ca_action_id='".$action_id."'  ";
		$ca_values=$this->db->getResult($ca_value_query,true);
	
	}
//echo $date;

if(empty($ca_values))
{	$ca_value_query="Select field_name,field_value,field_id from tbl_ca_values where ca_id='".$id."'  and ca_action_id='".$action_id."' ";
		$ca_values=$this->db->getResult($ca_value_query,true);
}//$this->pr($ca_values,true);
	
		$adj=0;
	if(!empty($ca_values))
	{
	foreach ($ca_values as $ca_value)
	{
		if($ca_value['field_name']=='CP_ADJ')
			{
			$adj=$ca_value['field_value'];
			}
	}
	}
	if($adj==0)
	{
	//echo "Adjustement Ammount is Not Available ";
	//exit;
	return 0;
	
	}
	else{
	return $adj;
	}
	
	
	}	
		function getLastDayLocalPriceValue($indxx,$curr,$date){
	//	echo $curr;
	$data =$this->db->getResult("select tbl_prices_local_curr.* from tbl_prices_local_curr where ticker='".$indxx['ticker']."' order by date desc ",false,1);
	//$this->pr($data,true);
	if(!empty($data)){
		return $data['price'];
		}
	else{
	
	return 0;
	}
	
	}
		function getLastDayPriceCurrencyValue($indxx,$curr,$date){
	//	echo $curr;
	$data =$this->db->getResult("select tbl_prices_local_curr.* from tbl_prices_local_curr where ticker='".$indxx['ticker']."' order by date desc ",false,1);
	//$this->pr($data,true);
	if(!empty($data)){
	if($data['curr']!=$curr)
	{
	$cfactor_local=$this->getPriceforCurrency($curr,$data['curr'],$date);
	
	return $cfactor_local;
	}else{
	return 1;
	}}
	else{
	
	return 0;
	}
	
	}
	function getLastDayPriceValue($indxx,$curr,$date){
	//	echo $curr;
	$data =$this->db->getResult("select tbl_prices_local_curr.* from tbl_prices_local_curr where ticker='".$indxx['ticker']."' order by date desc ",false,1);
	//$this->pr($data,true);
	if(!empty($data)){
	if($data['curr']!=$curr)
	{
	$cfactor_local=$this->getPriceforCurrency($curr,$data['curr'],$date);
	if(strcmp(strtoupper($curr.$data['curr']),$curr.$data['curr'])==0)
			 $data['price']= $data['price']/$cfactor_local;
	elseif($data['curr']=="Kwd")
				 $data['price']= $data['price']/($cfactor_local*1000);
			else
				 $data['price']= $data['price']/($cfactor_local*100);
	
	return $data['price'];
	}else{
	return $data['price'];
	}}
	else{
	
	return 0;
	}
	
	}
	function getLinkUrl($string){
	$string = preg_replace("`\[.*\]`U","",$string);
	$string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
	$string = htmlentities($string, ENT_COMPAT, 'utf-8');
	$string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
	$string = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $string);
	return strtolower(trim($string, '-')).".html";
}
function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}

function get_days_in_month($month, $year)
{
   return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year %400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
}
  function convertNumberToWordsForIndia($number){
        //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
        $words = array(
        '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
        '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
        '11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
        '16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
        '30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
        '80' => 'eighty','90' => 'ninty');
       
        //First find the length of the number
        $number_length = strlen($number);
        //Initialize an empty array
        $number_array = array(0,0,0,0,0,0,0,0,0);       
        $received_number_array = array();
       
        //Store all received numbers into an array
        for($i=0;$i<$number_length;$i++){    $received_number_array[$i] = substr($number,$i,1);    }

        //Populate the empty array with the numbers received - most critical operation
        for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ $number_array[$i] = $received_number_array[$j]; }
        $number_to_words_string = "";       
        //Finding out whether it is teen ? and then multiplying by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
        for($i=0,$j=1;$i<9;$i++,$j++){
            if($i==0 || $i==2 || $i==4 || $i==7){
                if($number_array[$i]=="1"){
                    $number_array[$j] = 10+$number_array[$j];
                    $number_array[$i] = 0;
                }       
            }
        }
       
        $value = "";
        for($i=0;$i<9;$i++){
            if($i==0 || $i==2 || $i==4 || $i==7){    $value = $number_array[$i]*10; }
            else{ $value = $number_array[$i];    }           
            if($value!=0){ $number_to_words_string.= $words["$value"]." "; }
            if($i==1 && $value!=0){    $number_to_words_string.= "Crores "; }
            if($i==3 && $value!=0){    $number_to_words_string.= "Lakhs ";    }
            if($i==5 && $value!=0){    $number_to_words_string.= "Thousand "; }
            if($i==6 && $value!=0){    $number_to_words_string.= "Hundred "; }
        }
        if($number_length>9){ $number_to_words_string = "Sorry This does not support more than 99 Crores"; }
        return ucwords(strtolower(" Rupees ".$number_to_words_string)." Only.");
    }



	function getcafortoday($id,$type)
	{
			if($type=='1')
			{
				$caquery=$this->db->getResult("select tbl_ca.company_name,tbl_ca.mnemonic,tbl_ca.id as corpid ,tbl_assign_index.user_id,tbl_assign_index.indxx_id,tbl_indxx_ticker.ticker from tbl_assign_index left join tbl_indxx_ticker on tbl_assign_index.indxx_id=tbl_indxx_ticker.indxx_id left join tbl_ca on tbl_ca.identifier=tbl_indxx_ticker.ticker where tbl_ca.eff_date='".$this->_date."' group by tbl_ca.company_name",true);	
			}
			else if($type=='2')
			{
				$caquery=$this->db->getResult("select tbl_ca.company_name,tbl_ca.mnemonic,tbl_ca.id as corpid ,tbl_assign_index.user_id,tbl_assign_index.indxx_id,tbl_indxx_ticker.ticker from tbl_assign_index left join tbl_indxx_ticker on tbl_assign_index.indxx_id=tbl_indxx_ticker.indxx_id left join tbl_ca on tbl_ca.identifier=tbl_indxx_ticker.ticker where tbl_assign_index.user_id='".$_SESSION['User']['id']."' and tbl_ca.eff_date='".$this->_date."'",true);	
			}
			
			return $caquery;
			
	}
	
	
	function getcaforweek($id,$type)
	{
		 $date=date('Y-m-d', strtotime($this->_date.'+7 days'));
		if($type=='1')
			{
				$totalweeklyca=$this->db->getResult("select tbl_ca.company_name,tbl_ca.mnemonic,tbl_ca.id as corpactionid ,tbl_assign_index.user_id,tbl_assign_index.indxx_id,tbl_indxx_ticker.ticker from tbl_assign_index left join tbl_indxx_ticker on tbl_assign_index.indxx_id=tbl_indxx_ticker.indxx_id left join tbl_ca on tbl_ca.identifier=tbl_indxx_ticker.ticker where tbl_ca.eff_date between '".date("Y-m-d")."' and '".$date."' group by tbl_ca.company_name",true);	
			}
			else if($type=='2')
			{
				 $totalweeklyca=$this->db->getResult("select tbl_ca.company_name,tbl_ca.mnemonic,tbl_ca.id as corpactionid ,tbl_assign_index.user_id,tbl_assign_index.indxx_id,tbl_indxx_ticker.ticker from tbl_assign_index left join tbl_indxx_ticker on tbl_assign_index.indxx_id=tbl_indxx_ticker.indxx_id left join tbl_ca on tbl_ca.identifier=tbl_indxx_ticker.ticker where tbl_assign_index.user_id='".$_SESSION['User']['id']."' and tbl_ca.eff_date between '".date("Y-m-d")."' and '".$date."'",true);
			}
			
			return $totalweeklyca;
			
	}
  
 function setUserTempIndexSessionData($obj){			
				
			//	$this->pr($obj,true);
			
				if(!empty($obj))
				{//$this->pr($obj,true);
				
				foreach($obj as $indxx)
				{
				
				$_SESSION['IndexTemp'][]=$indxx['indxx'];		
		
				}
				
	}
				//exit;
				return true;	
	}
	
  
  function arr_to_csv($data,$csv = '|') {

$array = array();

/* Epic amount of for each's. This could be done with recursion */
foreach($data as $key => &$value) {
    if (!is_array($value)) {
        $array[] = $key . $csv .(is_null($value)?'null':$value);
    } else {
        foreach ($value as $k => &$v) {
            if (!is_array($v)) {
                $array[] = $key . $csv . $k . $csv . (is_null($v) ? 'null' : $v);
            } else {
                foreach ($v as $kk => &$vv) {
                    if (!is_array($vv)) {
                        $array[] = $key . $csv . $k . $csv . $kk . $csv . (is_null($vv) ? 'null' : $vv);
                    } else {
                        foreach ($vv as $x => &$y) {
                            if (!is_array($y)) {
                                $array[] = $key . $csv . $k . $csv . $kk . $csv. $x . $csv . (is_null($y) ? 'null' : $y);
                            } else {
                                foreach ($y as $too => $long) {
                                    if(!is_array($long)) {
                                        $array[] = $key . $csv . $k . $csv . $kk . $csv. $x . $csv . $too . $csv. (is_null($long)?'null':$long);
                                    } else {
                                        foreach ($long as $omg => $why) {
                                            if(!is_array($why)) {
                                                $array[] = $key . $csv . $k . $csv . $kk . $csv. $x . $csv . $too . $csv . $omg . $csv . (is_null($why) ? 'null' : $why);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    } 
}    
return $array;
}


function getCaStr($indxxticker,$date, $caid){

	$entry='';	
	//$catype='("DVD_CASH","CHG_ID","CHG_NAME","CHG_TKR","DELIST","DVD_STOCK","RECLASS","RIGHTS_OFFER","SPIN","STOCK_SPLT")';
	
	
		$ca=	$this->db->getResult("select id,identifier,mnemonic,company_name,ann_date,eff_date,action_id, secid_type,secid,currency from tbl_ca where identifier ='".$indxxticker."' and eff_date>='".$date."' and id ='".$caid."'",true);
		if(!empty($ca))
		{
		foreach($ca as $cas)
		{
		
		$entry.=$cas['identifier'].";";	
		$entry.=$cas['company_name'].";";	
		if($cas['secid_type']=="ISIN")
		$entry.=$cas['secid'].";";	
		else
		$entry.=" ;";	
		
		
		$price="";
		$curr='';
		
		$notes='';
		$factor='';	
		$action_type=$_SESSION['variable'][$cas['mnemonic']];
		if($cas['id'] )
		{
		$values=$this->getCa($cas['id'],$cas['action_id']);
		//$this->pr($values,true);
		
		}
		
		
		if($cas['mnemonic']=="DVD_CASH")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_GROSS_AMT')
		$price=$ca_value['field_value'];
		if($ca_value['field_name']=='CP_DVD_CRNCY')
		$curr=$ca_value['field_value'];
		if($ca_value['field_name']=='CP_DVD_TYP' && $ca_value['field_value']=='1001')
		$action_type=$this->getAcionValueName($ca_value['field_name'],$ca_value['field_value']);
		
		}
		}
		}
		
		
		
		if($cas['mnemonic']=="CHG_ID")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_OLD_ISIN' && $ca_value['field_value'])
		$notes.=" OLD ISIN-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_ISIN' && $ca_value['field_value'])
		$notes.=" NEW ISIN-".$ca_value['field_value'];
		
		
		
		if($ca_value['field_name']=='CP_OLD_SEDOL' && $ca_value['field_value'])
		$notes.=" OLD SEDOL-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_SEDOL' && $ca_value['field_value'])
		$notes.=" NEW SEDOL-".$ca_value['field_value'];
		
		
		
		}}
		}
		
		
			
		if($cas['mnemonic']=="CHG_NAME")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_OLD_NAME' && $ca_value['field_value'])
		$notes.=" OLD NAME-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_NAME' && $ca_value['field_value'])
		$notes.=" NEW NAME-".$ca_value['field_value'];
		
		
		
		}}
		}
		
			if($cas['mnemonic']=="CHG_TKR")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_OLD_TKR' && $ca_value['field_value'])
		$notes.=" OLD TICKER-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_TKR' && $ca_value['field_value'])
		$notes.=" NEW TICKER-".$ca_value['field_value'];
		
		
		
		}}
		}
		
		
				if($cas['mnemonic']=="RECLASS")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_OLD_CLASS' && $ca_value['field_value'])
		$notes.=" OLD CLASS-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_CLASS' && $ca_value['field_value'])
		$notes.=" NEW CLASS-".$ca_value['field_value'];
		
		
		
		}}
		}
		
		
			if($cas['mnemonic']=="DVD_STOCK")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_AMT' && $ca_value['field_value'])
			$price=$ca_value['field_value'];
			$curr=$cas['currency'];
		if($ca_value['field_name']=='CP_ADJ' && $ca_value['field_value'])
			$factor=$ca_value['field_value'];
		
		
		}}
		}
		
		
				if($cas['mnemonic']=="SPIN")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_ADJ' && $ca_value['field_value'])
			$factor=$ca_value['field_value'];
		
		
		}}
		}
			if($cas['mnemonic']=="STOCK_SPLT")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_TERMS' && $ca_value['field_value'])
			$notes.=$ca_value['field_value'];
		if($ca_value['field_name']=='CP_ADJ' && $ca_value['field_value'])
			$factor=$ca_value['field_value'];
	
		
		}}
		}
		
		
				if($cas['mnemonic']=="RIGHTS_OFFER")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_TERMS' && $ca_value['field_value'])
			$notes.=$ca_value['field_value'];
		if($ca_value['field_name']=='CP_NOTES' && $ca_value['field_value']!="N.A." && $ca_value['field_value'])
			$notes.=$ca_value['field_value'];
	if($ca_value['field_name']=='CP_ADJ' && $ca_value['field_value'])
			$factor=$ca_value['field_value'];
	if($ca_value['field_name']=='CP_CRNCY')
		$curr=$ca_value['field_value'];
		
		}}
		}
		
		if($cas['mnemonic']=="DELIST")
		{
		
		}
		
		
		
			$entry.=$action_type.";";	
		$entry.=$cas['eff_date'].";";	
	
		$entry.=$price.";";	
		$entry.=$curr.";";	
		$entry.=$notes.";";	
		$entry.=$factor.";";	
		$entry.="\n";	
		
		
		
		
		}
		}
		
return $entry;
}
function getCaStr2($indxxticker,$date){

	$entry='';	
	$catype='("DVD_CASH","CHG_ID","CHG_NAME","CHG_TKR","DELIST","DVD_STOCK","RECLASS","RIGHTS_OFFER","SPIN","STOCK_SPLT")';
		$ca=	$this->db->getResult("select id,identifier,mnemonic,company_name,ann_date,eff_date,action_id, secid_type,secid,currency from tbl_ca where identifier ='".$indxxticker."' and eff_date>='".$date."' and eff_date<='".date("Y-m-d",strtotime($date)+(15*68400))."'  and mnemonic in ".$catype."",true);
		if(!empty($ca))
		{
		foreach($ca as $cas)
		{
		
		$entry.=$cas['identifier'].";";	
		$entry.=$cas['company_name'].";";	
		if($cas['secid_type']=="ISIN")
		$entry.=$cas['secid'].";";	
		else
		$entry.=" ;";	
		
		
		$price="";
		$curr='';
		
		$notes='';
		$factor='';	
		$action_type=$_SESSION['variable'][$cas['mnemonic']];
		if($cas['id'] )
		{
		$values=$this->getCa($cas['id'],$cas['action_id']);
		//$this->pr($values,true);
		
		}
		
		
		if($cas['mnemonic']=="DVD_CASH")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_GROSS_AMT')
		$price=$ca_value['field_value'];
		if($ca_value['field_name']=='CP_DVD_CRNCY')
		$curr=$ca_value['field_value'];
		if($ca_value['field_name']=='CP_DVD_TYP' && $ca_value['field_value']=='1001')
		$action_type=$this->getAcionValueName($ca_value['field_name'],$ca_value['field_value']);
		
		}
		}
		}
		
		
		
		if($cas['mnemonic']=="CHG_ID")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_OLD_ISIN' && $ca_value['field_value'])
		$notes.=" OLD ISIN-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_ISIN' && $ca_value['field_value'])
		$notes.=" NEW ISIN-".$ca_value['field_value'];
		
		
		
		if($ca_value['field_name']=='CP_OLD_SEDOL' && $ca_value['field_value'])
		$notes.=" OLD SEDOL-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_SEDOL' && $ca_value['field_value'])
		$notes.=" NEW SEDOL-".$ca_value['field_value'];
		
		
		
		}}
		}
		
		
			
		if($cas['mnemonic']=="CHG_NAME")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_OLD_NAME' && $ca_value['field_value'])
		$notes.=" OLD NAME-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_NAME' && $ca_value['field_value'])
		$notes.=" NEW NAME-".$ca_value['field_value'];
		
		
		
		}}
		}
		
			if($cas['mnemonic']=="CHG_TKR")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_OLD_TKR' && $ca_value['field_value'])
		$notes.=" OLD TICKER-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_TKR' && $ca_value['field_value'])
		$notes.=" NEW TICKER-".$ca_value['field_value'];
		
		
		
		}}
		}
		
		
				if($cas['mnemonic']=="RECLASS")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_OLD_CLASS' && $ca_value['field_value'])
		$notes.=" OLD CLASS-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_CLASS' && $ca_value['field_value'])
		$notes.=" NEW CLASS-".$ca_value['field_value'];
		
		
		
		}}
		}
		
		
			if($cas['mnemonic']=="DVD_STOCK")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_AMT' && $ca_value['field_value'])
			$price=$ca_value['field_value'];
			$curr=$cas['currency'];
		if($ca_value['field_name']=='CP_ADJ' && $ca_value['field_value'])
			$factor=$ca_value['field_value'];
		
		
		}}
		}
		
		
				if($cas['mnemonic']=="SPIN")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_ADJ' && $ca_value['field_value'])
			$factor=$ca_value['field_value'];
		
		
		}}
		}
			if($cas['mnemonic']=="STOCK_SPLT")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_TERMS' && $ca_value['field_value'])
			$notes.=$ca_value['field_value'];
		if($ca_value['field_name']=='CP_ADJ' && $ca_value['field_value'])
			$factor=$ca_value['field_value'];
	
		
		}}
		}
		
		
				if($cas['mnemonic']=="RIGHTS_OFFER")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_TERMS' && $ca_value['field_value'])
			$notes.=$ca_value['field_value'];
		if($ca_value['field_name']=='CP_NOTES' && $ca_value['field_value']!="N.A." && $ca_value['field_value'])
			$notes.=$ca_value['field_value'];
	if($ca_value['field_name']=='CP_ADJ' && $ca_value['field_value'])
			$factor=$ca_value['field_value'];
	if($ca_value['field_name']=='CP_CRNCY')
		$curr=$ca_value['field_value'];
		
		}}
		}
		
		if($cas['mnemonic']=="DELIST")
		{
		
		}
		
		
		
			$entry.=$action_type.";";	
		$entry.=$cas['eff_date'].";";	
	
		$entry.=$price.";";	
		$entry.=$curr.";";	
		$entry.=$notes.";";	
		$entry.=$factor.";";	
		$entry.="\n";	
		
		
		
		
		}
		}
		
return $entry;
}



function get_user_ca_adj_factor($indxx_id,$ticker){
//echo "select factor from tbl_user_ca_adj_factor where indxx_id ='".$indxx_id."' and ticker_id='".$ticker."' and status='1' and date='".$this->_date."'";
//exit;
	$ca=	$this->db->getResult("select factor from tbl_user_ca_adj_factor where indxx_id ='".$indxx_id."' and ticker_id='".$ticker."' and status='1' and date='".$this->_date."'",true);
if(!empty($ca))
{
return $ca[0]['factor'];
}
return 0;
}

function getAllTickerIndex(){
	
$tickers=$this->db->getResult("SELECT tbl_indxx_ticker.ticker, group_concat( tbl_indxx.code,' ' ) as indxx_code FROM tbl_indxx_ticker, tbl_indxx WHERE tbl_indxx_ticker.indxx_id = tbl_indxx.id GROUP BY tbl_indxx_ticker.ticker ");
	//$this->pr($tickers,true);
	$array=array();
if(!empty($tickers))
{
foreach($tickers as $ticker)
{
	$array[$ticker['ticker']]=$ticker['indxx_code'];
}

}	
return $array;
}
function getSpecialCashId()
{$array=array();
//echo "SELECT ca_action_id FROM `tbl_ca_values` where field_value='1001' and field_name='CP_DVD_TYP'";
	$values=$this->db->getResult("SELECT ca_action_id FROM `tbl_ca_values` where field_value='1001' and field_name='CP_DVD_TYP'",true);
if(!empty($values))
{
	foreach($values as $myvalue)
	{
	$array[]=$myvalue['ca_action_id'];
	
	}
}//print_r($array);
	return $array;
	}

	
	
	function getTodaysValue($action_id){
	$array=array();
		$cas=$this->db->getResult("select field_name,field_value from tbl_ca_values where ca_action_id='".$action_id."' ");
	if(!empty($cas))
	{
		foreach($cas as $ca)
		{
			$array[$ca['field_name']]=$ca['field_value'];
		}
	}
	return $array;
	}
	function getPreviousDayValue($action_id){
	$array=array();
		$cas=$this->db->getResult("select field_name,field_value from tbl_ca_values_user where ca_action_id='".$action_id."' ");
	if(!empty($cas))
	{
		foreach($cas as $ca)
		{
			$array[$ca['field_name']]=$ca['field_value'];
		}
	}
	return $array;
	}
	
function getAcquisionTargetCompanyStatus($action_id){

// "select field_name,field_value from tbl_ca_values where ca_action_id='".$action_id."' and field_name in ('CP_TARGET_TKR','CP_STAT')";

	$cas=$this->db->getResult("select field_name,field_value from tbl_ca_values where ca_action_id='".$action_id."' and field_name in ('CP_TARGET_TKR','CP_STAT')");
$text="";
$status=array("1"=>"Pending","2"=>"Terminate","3"=>"Complete","4"=>"Lapsed","5"=>"Proposed","6"=>"Withdrawn");
if(!empty($cas))
{
foreach($cas as $ca )
{
if($ca['field_name']=="CP_TARGET_TKR")
{
	$text.="Target Company-".$ca['field_value'].",";
}

if($ca['field_name']=="CP_STAT")
{
	$text.="Status- ".$status[$ca['field_value']].",";
}

}	
}	

return $text;
	}
function getCaStr3($indxxticker,$date,$indxxname=''){

	$entry='';	
	$catype='("DVD_CASH","CHG_ID","CHG_NAME","CHG_TKR","DELIST","DVD_STOCK","RECLASS","RIGHTS_OFFER","SPIN","STOCK_SPLT")';
		$ca=	$this->db->getResult("select id,identifier,mnemonic,company_name,ann_date,eff_date,action_id, secid_type,secid,currency from tbl_ca where identifier ='".$indxxticker."' and eff_date>='".date("Y-m-d",strtotime($date)-86400)."' and eff_date<='".date("Y-m-d",strtotime($date)+(15*68400))."'  and mnemonic in ".$catype."   ",true);
		if(!empty($ca))
		{
		foreach($ca as $cas)
		{
		
		if($indxxname)
		{
		$entry.=$indxxname.";";	
		}
		
		
		$entry.=$cas['identifier'].";";	
		$entry.=$cas['company_name'].";";	
		if($cas['secid_type']=="ISIN")
		$entry.=$cas['secid'].";";	
		else
		$entry.=" ;";	
		
		
		$price="";
		$curr='';
		
		$notes='';
		$factor='';	
		$action_type=$_SESSION['variable'][$cas['mnemonic']];
		if($cas['id'] )
		{
		$values=$this->getCa($cas['id'],$cas['action_id']);
		//$this->pr($values,true);
		
		}
		
		
		if($cas['mnemonic']=="DVD_CASH")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_GROSS_AMT')
		$price="Gross Amt.=".$ca_value['field_value'];
		if($ca_value['field_name']=='CP_NET_AMT')
		$price.="Net Amt.=".$ca_value['field_value'];
		if($ca_value['field_name']=='CP_DVD_CRNCY')
		$curr=$ca_value['field_value'];
		if($ca_value['field_name']=='CP_DVD_TYP' && $ca_value['field_value']=='1001')
		$action_type=$this->getAcionValueName($ca_value['field_name'],$ca_value['field_value']);
		
		}
		}
		}
		
		
		
		if($cas['mnemonic']=="CHG_ID")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_OLD_ISIN' && $ca_value['field_value'])
		$notes.=" OLD ISIN-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_ISIN' && $ca_value['field_value'])
		$notes.=" NEW ISIN-".$ca_value['field_value'];
		
		
		
		if($ca_value['field_name']=='CP_OLD_SEDOL' && $ca_value['field_value'])
		$notes.=" OLD SEDOL-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_SEDOL' && $ca_value['field_value'])
		$notes.=" NEW SEDOL-".$ca_value['field_value'];
		
		
		
		}}
		}
		
		
			
		if($cas['mnemonic']=="CHG_NAME")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_OLD_NAME' && $ca_value['field_value'])
		$notes.=" OLD NAME-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_NAME' && $ca_value['field_value'])
		$notes.=" NEW NAME-".$ca_value['field_value'];
		
		
		
		}}
		}
		
			if($cas['mnemonic']=="CHG_TKR")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_OLD_TKR' && $ca_value['field_value'])
		$notes.=" OLD TICKER-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_TKR' && $ca_value['field_value'])
		$notes.=" NEW TICKER-".$ca_value['field_value'];
		
		
		
		}}
		}
		
		
				if($cas['mnemonic']=="RECLASS")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_OLD_CLASS' && $ca_value['field_value'])
		$notes.=" OLD CLASS-".$ca_value['field_value'];
		
		if($ca_value['field_name']=='CP_NEW_CLASS' && $ca_value['field_value'])
		$notes.=" NEW CLASS-".$ca_value['field_value'];
		
		
		
		}}
		}
		
		
			if($cas['mnemonic']=="DVD_STOCK")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_AMT' && $ca_value['field_value'])
			$price=$ca_value['field_value'];
			$curr=$cas['currency'];
		if($ca_value['field_name']=='CP_ADJ' && $ca_value['field_value'])
			$factor=$ca_value['field_value'];
		
		
		}}
		}
		
		
				if($cas['mnemonic']=="SPIN")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_ADJ' && $ca_value['field_value'])
			$factor=$ca_value['field_value'];
		
		
		}}
		}
			if($cas['mnemonic']=="STOCK_SPLT")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_TERMS' && $ca_value['field_value'])
			$notes.=$ca_value['field_value'];
		if($ca_value['field_name']=='CP_ADJ' && $ca_value['field_value'])
			$factor=$ca_value['field_value'];
	
		
		}}
		}
		
		
				if($cas['mnemonic']=="RIGHTS_OFFER")
		{
		if(!empty($values))
		{
		foreach($values as $ca_value)
		{
		if($ca_value['field_name']=='CP_TERMS' && $ca_value['field_value'])
			$notes.=$ca_value['field_value'];
		if($ca_value['field_name']=='CP_NOTES' && $ca_value['field_value']!="N.A." && $ca_value['field_value'])
			$notes.=$ca_value['field_value'];
	if($ca_value['field_name']=='CP_ADJ' && $ca_value['field_value'])
			$factor=$ca_value['field_value'];
	if($ca_value['field_name']=='CP_CRNCY')
		$curr=$ca_value['field_value'];
		
		}}
		}
		
		if($cas['mnemonic']=="DELIST")
		{
		
		}
		
		
		
			$entry.=$action_type.";";	
		$entry.=$cas['eff_date'].";";	
	
		$entry.=$price.";";	
		$entry.=$curr.";";	
		$entry.=$notes.";";	
		$entry.=$factor.";";	
		$entry.="\n";	
		
		
		
		
		}
		}
		
return $entry;
}


function save_process($task,$date,$status){
$this->db->query("INSERT INTO `tbl_system_task_complete` (`id`, `sysdate`, `name`, `status`, `date`) VALUES (NULL, CURRENT_TIMESTAMP, '".$task."', '".$status."', '".$date."');");
}
function update_process($task,$date,$status){
$this->db->query("update `tbl_system_task_complete`set `status`='".$status."' where name='".$task."' and `date` ='".$date."'");
}


function saveProcess($type=0)
{
//print_r($_SERVER);

$query="Insert into tbl_system_progress (url,type,path,stime)  values ('".mysql_real_escape_string($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'])."','".$type."','".mysql_real_escape_string($_SERVER['SCRIPT_FILENAME'])."','".date("Y-m-d H:i:s",$_SERVER['REQUEST_TIME'])."')";
$this->db->query($query);
}



function goliveIndex($indexes)
{
if(!empty($indexes))
{
foreach($indexes as $indxx)
{
$lastrundatearray=$this->db->getResult("SELECT date FROM `tbl_indxx_value_temp` where indxx_id='".$indxx."' order by date desc",false,1);
//$this->pr($lastrundate,true);
$lastrundate=$lastrundatearray['date'];
$indxx_data=$this->getUpcomingIndex($indxx,$lastrundate);
//$this->pr($indxx_data);
$this->checkandupdatelive($indxx_data,$lastrundate);
}

}
//exit;
}
function checkandupdatelive($indxxArray,$date){
	//$this->pr($indxxArray);

if(!empty($indxxArray))
{
foreach($indxxArray as $indxx)
{
//print_r($indxx);
$indxx_id=0;

$index_res=mysql_query("Select id from tbl_indxx where code='".$indxx['code']."'");
if(mysql_num_rows($index_res)>0)
{$row=mysql_fetch_assoc($index_res);
$indxx_id=$row['id'];

$lastCloseResult=$this->db->getResult("select * from tbl_indxx_value where indxx_id='".$indxx_id."' order by date desc ",false,1);

$indxx['indxx_value'][0]['indxx_value']=$lastCloseResult['indxx_value'];
$indxx['indxx_value'][0]['olddivisor']=$indxx['indxx_value'][0]['market_value']/$lastCloseResult['indxx_value'];
$indxx['indxx_value'][0]['newdivisor']=$indxx['indxx_value'][0]['market_value']/$lastCloseResult['indxx_value'];

//$this->pr($indxx['indxx_value']);
//$this->pr($lastCloseResult,true);

mysql_query("delete from tbl_indxx_ticker where indxx_id='".$indxx_id."'");
mysql_query("delete from tbl_share where indxx_id='".$indxx_id."'");
mysql_query("delete from tbl_final_price where indxx_id='".$indxx_id."' and date >='".$date."'");
mysql_query("delete from tbl_indxx_value_open where indxx_id='".$indxx_id."' and date >='".$date."'");
mysql_query("delete from tbl_indxx_value where indxx_id='".$indxx_id."' and date >='".$date."'");
//echo "Data Removed for indxx-".$indxx['code']."<br>";

mysql_query("update  tbl_indxx set name='".$indxx['name']."',code='".$indxx['code']."',investmentammount='".$indxx['investmentammount']."',	divpvalue='".$indxx['divpvalue']."',indexvalue='".$indxx['indexvalue']."',	divisor='".$indxx['divisor']."',type='".$indxx['type']."',cash_adjust='".$indxx['cash_adjust']."',curr='".$indxx['curr']."',status='".$indxx['status']."',dateAdded='".$indxx['dateAdded']."',lastupdated='".$indxx['lastupdated']."',dateStart='".$indxx['dateStart']."',usersignoff='".$indxx['usersignoff']."',dbusersignoff='".$indxx['dbusersignoff']."',submitted='".$indxx['submitted']."',	finalsignoff='".$indxx['finalsignoff']."',runindex='".$indxx['runindex']."',addtype='".$indxx['addtype']."',zone='".$indxx['zone']."',calcdate='".$indxx['calcdate']."',rebalance='".$indxx['rebalance']."',client_id='".$indxx['client_id']."',	display_currency='".$indxx['display_currency']."',ireturn='".$indxx['ireturn']."',	ica='".$indxx['ica']."',	recalc='".$indxx['recalc']."',div_type='".$indxx['div_type']."',currency_hedged='".$indxx['currency_hedged']."',priority='".$indxx['priority']."' where id='".$indxx_id."'");

}
else{
mysql_query("insert into tbl_indxx set name='".$indxx['name']."',code='".$indxx['code']."',investmentammount='".$indxx['investmentammount']."',	divpvalue='".$indxx['divpvalue']."',indexvalue='".$indxx['indexvalue']."',	divisor='".$indxx['divisor']."',type='".$indxx['type']."',cash_adjust='".$indxx['cash_adjust']."',curr='".$indxx['curr']."',status='".$indxx['status']."',dateAdded='".$indxx['dateAdded']."',lastupdated='".$indxx['lastupdated']."',dateStart='".$indxx['dateStart']."',usersignoff='".$indxx['usersignoff']."',dbusersignoff='".$indxx['dbusersignoff']."',submitted='".$indxx['submitted']."',	finalsignoff='".$indxx['finalsignoff']."',runindex='".$indxx['runindex']."',addtype='".$indxx['addtype']."',zone='".$indxx['zone']."',calcdate='".$indxx['calcdate']."',rebalance='".$indxx['rebalance']."',client_id='".$indxx['client_id']."',	display_currency='".$indxx['display_currency']."',ireturn='".$indxx['ireturn']."',	ica='".$indxx['ica']."',	recalc='".$indxx['recalc']."',div_type='".$indxx['div_type']."',currency_hedged='".$indxx['currency_hedged']."',priority='".$indxx['priority']."'");
$indxx_id=mysql_insert_id();
//echo "new Index Id generated for indxx-".$indxx['code']."<br>";
}

if(!empty($indxx['tickers']))
{
	$ticker_inser_array=array();
foreach($indxx['tickers'] as $ticker)
{
$ticker_inser_array[]="('".mysql_real_escape_string($ticker['name'])."','".mysql_real_escape_string($ticker['isin'])."','".mysql_real_escape_string($ticker['ticker'])."','".mysql_real_escape_string($ticker['weight'])."','".mysql_real_escape_string($ticker['curr'])."','".mysql_real_escape_string($ticker['divcurr'])."','".mysql_real_escape_string($ticker['sedol'])."','".mysql_real_escape_string($ticker['cusip'])."','".mysql_real_escape_string($ticker['countryname'])."','".$indxx_id."','1')";
}

$Tickerquery="insert into tbl_indxx_ticker (name,isin,ticker,weight,curr,divcurr,sedol,cusip,countryname,indxx_id,status) values ".implode(",",$ticker_inser_array).";";
mysql_query($Tickerquery);
//echo "Tickers Inserted for indxx-".$indxx['code']."<br>";
}

if(!empty($indxx['shares']))
{
	$share_insert_array=array();
foreach($indxx['shares'] as $share)
{
	$share_insert_array[]="('".$indxx_id."','".$share['isin']."','".$share['date']."','".$share['share']."')";

}

$shareQuery="insert into tbl_share (indxx_id,isin,date,share) values ".implode(",",$share_insert_array).";";
mysql_query($shareQuery);
//echo "Shares Inserted for indxx-".$indxx['code']."<br>";
}








if(!empty($indxx['weights']))
{
	$weights_insert_array=array();
foreach($indxx['weights'] as $weights)
{
	$weights_insert_array[]="('".$indxx_id."','".$indxx['code']."','".$weights['isin']."','".$weights['date']."','".$weights['share']."','".$weights['price']."','".$weights['weight']."')";

}

$weightsQuery="insert into tbl_weights (indxx_id,code,isin,date,share,price,weight) values ".implode(",",$weights_insert_array).";";
mysql_query($weightsQuery);
//echo "Closing Weights Inserted for indxx-".$indxx['code']."<br>";
}
if(!empty($indxx['weights_open']))
{
	$weights_open_insert_array=array();
foreach($indxx['weights_open'] as $weights)
{
	$weights_insert_array[]="('".$indxx_id."','".$indxx['code']."','".$weights['isin']."','".$weights['date']."','".$weights['share']."','".$weights['price']."','".$weights['weight']."')";

}

$weightsQuery="insert into tbl_weights_open (indxx_id,code,isin,date,share,price,weight) values ".implode(",",$weights_insert_array).";";
mysql_query($weightsQuery);
//echo "Opening Weights Inserted for indxx-".$indxx['code']."<br>";
}
if(!empty($indxx['final_price']))
{
	$final_price_array=array();
foreach($indxx['final_price'] as $final_price)
{
	$final_price_array[]="('".$indxx_id."','".$final_price['isin']."','".$final_price['date']."','".$final_price['price']."','".$final_price['currencyfactor']."','".$final_price['localprice']."')";

}

$final_priceQuery="insert into tbl_final_price (indxx_id,isin,date,price,currencyfactor,localprice) values ".implode(",",$final_price_array).";";
mysql_query($final_priceQuery);
//echo "Final Price Inserted for indxx-".$indxx['code']."<br>";
}

if(!empty($indxx['indxx_value']))
{
	$indxx_value_array=array();
foreach($indxx['indxx_value'] as $indxx_value)
{
	$indxx_value_array[]="('".$indxx_id."','".$indxx_value['code']."','".$indxx_value['market_value']."','".$indxx_value['indxx_value']."','".$indxx_value['date']."','".$indxx_value['olddivisor']."','".$indxx_value['newdivisor']."')";

}

$indxx_valueQuery="insert into tbl_indxx_value (indxx_id,code,market_value,indxx_value,date,olddivisor,newdivisor) values ".implode(",",$indxx_value_array).";";
mysql_query($indxx_valueQuery);
//echo "Index value  Inserted for indxx-".$indxx['code']."<br>";
}

if(!empty($indxx['indxx_value_open']))
{
	$indxx_value_open_array=array();
foreach($indxx['indxx_value_open'] as $indxx_value)
{
	$indxx_value_open_array[]="('".$indxx_id."','".$indxx_value['code']."','".$indxx_value['market_value']."','".$indxx_value['indxx_value']."','".$indxx_value['date']."','".$indxx_value['olddivisor']."','".$indxx_value['newdivisor']."')";

}

$indxx_value_openQuery="insert into tbl_indxx_value_open (indxx_id,code,market_value,indxx_value,date,olddivisor,newdivisor) values ".implode(",",$indxx_value_open_array).";";
mysql_query($indxx_value_openQuery);
//echo "index value open Inserted for indxx-".$indxx['code']."<br>";
}

if(!empty($indxx['users']))
{
	$indxx_users_array=array();
foreach($indxx['users'] as $user)
{
	$indxx_users_array[]="('".$indxx_id."','".$user['user_id']."')";

}

$indxx_users_Query="insert into tbl_assign_index (indxx_id,user_id) values ".implode(",",$indxx_users_array).";";
mysql_query($indxx_users_Query);
//echo "index Users Inserted for indxx-".$indxx['code']."<br>";
}


mysql_query("delete from tbl_indxx_temp where id='".$indxx['id']."'");
mysql_query("delete from tbl_indxx_ticker_temp where indxx_id='".$indxx['id']."'");
mysql_query("delete from tbl_share_temp where indxx_id='".$indxx['id']."'");
mysql_query("delete from tbl_final_price_temp where indxx_id='".$indxx['id']."' ");
mysql_query("delete from tbl_indxx_value_open_temp where indxx_id='".$indxx['id']."' ");
mysql_query("delete from tbl_indxx_value_temp where indxx_id='".$indxx['id']."' ");


}


}

}


function getUpcomingIndex($indxx,$from_date){
	
	
$temp_indxx_array=array();
$indxx_temp_res=mysql_query("select * from tbl_indxx_temp where id='".$indxx."' and status='1' and finalsignoff='1'");
if($indxx_temp_res && mysql_num_rows($indxx_temp_res)>0)
{
	
	$moreQuery='';
	
	if($from_date)
	{
	$moreQuery.=" and date>='".$from_date."'";
	}
	
	
while($indxx_temp=mysql_fetch_assoc($indxx_temp_res))
{
$temp_indxx_array[$indxx_temp['id']]=$indxx_temp;
	$tickers_temp_res=mysql_query("select * from tbl_indxx_ticker_temp where indxx_id='".$indxx_temp['id']."'");
	if($tickers_temp_res && mysql_num_rows($tickers_temp_res)>0)
	{
		$tickers_temp_array=array();
		while($tickers_temp=mysql_fetch_assoc($tickers_temp_res))
		{
			$tickers_temp_array[]=$tickers_temp;
		}
		$temp_indxx_array[$indxx_temp['id']]['tickers']=$tickers_temp_array;
		unset($tickers_temp_array);
	}
	mysql_free_result($tickers_temp_res);
	$shares_temp_res=mysql_query("select * from tbl_share_temp where indxx_id='".$indxx_temp['id']."'");
	if($shares_temp_res && mysql_num_rows($shares_temp_res)>0)
	{
		$shares_temp_array=array();
		while($shares_temp=mysql_fetch_assoc($shares_temp_res))
		{
			$shares_temp_array[]=$shares_temp;
		}
		$temp_indxx_array[$indxx_temp['id']]['shares']=$shares_temp_array;
		unset($shares_temp_array);
	}
	mysql_free_result($shares_temp_res);
	$final_price_temp_res=mysql_query("select * from tbl_final_price_temp where indxx_id='".$indxx_temp['id']."'".$moreQuery);
	if($final_price_temp_res && mysql_num_rows($final_price_temp_res)>0)
	{
		$final_price_temp_array=array();
		while($final_price_temp=mysql_fetch_assoc($final_price_temp_res))
		{
			$final_price_temp_array[]=$final_price_temp;
		}
		$temp_indxx_array[$indxx_temp['id']]['final_price']=$final_price_temp_array;
		unset($final_price_temp_array);
	}
	mysql_free_result($final_price_temp_res);
	
	
	
	$weights_res=mysql_query("select * from tbl_weights_temp where indxx_id='".$indxx_temp['id']."'".$moreQuery);
	if($weights_res && mysql_num_rows($weights_res)>0)
	{
		$weights_array=array();
		while($weights=mysql_fetch_assoc($weights_res))
		{
			$weights_array[]=$weights;
		}
		$temp_indxx_array[$indxx_temp['id']]['weights']=$weights_array;
		unset($weights_array);
	}
		mysql_free_result($weights_res);
		$weights_open_res=mysql_query("select * from tbl_weights_open_temp where indxx_id='".$indxx_temp['id']."'".$moreQuery);
	if($weights_open_res && mysql_num_rows($weights_open_res)>0)
	{
		$weights_open_array=array();
		while($weights_open=mysql_fetch_assoc($weights_open_res))
		{
			$weights_open_array[]=$weights_open;
		}
		$temp_indxx_array[$indxx_temp['id']]['weights_open']=$weights_open_array;
		unset($weights_open_array);
	}
		mysql_free_result($weights_open_res);
	
	
	
	
	
	$indxx_value_temp_res=mysql_query("select * from tbl_indxx_value_temp where indxx_id='".$indxx_temp['id']."'".$moreQuery);
	if($indxx_value_temp_res && mysql_num_rows($indxx_value_temp_res)>0)
	{
		$indxx_value_temp_array=array();
		while($indxx_value_temp=mysql_fetch_assoc($indxx_value_temp_res))
		{
			$indxx_value_temp_array[]=$indxx_value_temp;
		}
		$temp_indxx_array[$indxx_temp['id']]['indxx_value']=$indxx_value_temp_array;
		unset($indxx_value_temp_array);
	}
	mysql_free_result($indxx_value_temp_res);
    $indxx_value_open_temp_res=mysql_query("select * from tbl_indxx_value_open_temp where indxx_id='".$indxx_temp['id']."'".$moreQuery);
	if($indxx_value_open_temp_res && mysql_num_rows($indxx_value_open_temp_res)>0)
	{
		$indxx_value_open_temp_array=array();
		while($indxx_value_open_temp=mysql_fetch_assoc($indxx_value_open_temp_res))
		{
			$indxx_value_open_temp_array[]=$indxx_value_open_temp;
		}
		$temp_indxx_array[$indxx_temp['id']]['indxx_value_open']=$indxx_value_open_temp_array;
		unset($indxx_value_open_temp_array);
	}
	mysql_free_result($indxx_value_open_temp_res);
  
   $indxx_users_res=mysql_query("select user_id from tbl_assign_index_temp where indxx_id='".$indxx_temp['id']."'");
	if($indxx_users_res && mysql_num_rows($indxx_users_res)>0)
	{
		$indxx_users_array=array();
		while($indxx_users=mysql_fetch_assoc($indxx_users_res))
		{
			$indxx_users_array[]=$indxx_users;
		}
		$temp_indxx_array[$indxx_temp['id']]['users']=$indxx_users_array;
		unset($indxx_value_open_temp_array);
	}
	mysql_free_result($indxx_users_res);

}
mysql_free_result($indxx_temp_res);

}

return $temp_indxx_array;
	
}


function runindex($indexes)
{
//$lastrundatearray=$this->db->getResult("SELECT date FROM `tbl_system_task_complete` where name='Closing' and status='1' order by date desc",false,1);
$lastrundatearray=$this->db->getResult("SELECT date FROM `tbl_system_task_complete` where name='Closing' order by date desc",false,1);
//$this->pr($lastrundate,true);
$lastrundate=$lastrundatearray['date'];
$datevalue=$lastrundate;
if(!empty($indexes))
{
foreach($indexes as $indxx){
	$indxxs=$this->db->getResult("select tbl_indxx_temp.* from tbl_indxx_temp  where status='1' and usersignoff='1' and dbusersignoff='1' and submitted='1' and id='".$indxx."'",true);	
//$this->pr($indxxs,true);

$final_array=array();
		
		if(!empty($indxxs))
		{
			foreach($indxxs as $row)
			{
	//$this->pr($indxx);
					
			$final_array[$row['id']]=$row;
			

			
			
			/*$indxx_value=$this->db->getResult("select tbl_indxx_value_temp.* from tbl_indxx_value_temp where indxx_id='".$row['id']."' and  code='".$row['code']."' order by date desc ",false,1);	
		//	$this->pr($indxx_value,true);
			if(!empty($indxx_value))
			{
			$final_array[$row['id']]['index_value']=$indxx_value;
			}
			else{*/
			if($row['recalc'])
			{
			$indxx_value=$this->db->getResult("select tbl_indxx_value.* from tbl_indxx_value where code='".$row['code']."' order by date desc ",false,1);	
		//	$this->pr($indxx_value,true);
			if(!empty($indxx_value))
			{
			$final_array[$row['id']]['index_value']=$indxx_value;
			}	
			}
			else
			{
			$final_array[$row['id']]['index_value']['market_value']=$row['investmentammount'];
			$final_array[$row['id']]['index_value']['divpvalue']=$row['divpvalue'];
			$final_array[$row['id']]['index_value']['olddivisor']=$row['divisor'];
			$final_array[$row['id']]['index_value']['newdivisor']=$row['divisor'];
			$final_array[$row['id']]['index_value']['indxx_value']=$row['indexvalue'];
			if($final_array[$row['id']]['index_value']['olddivisor']==0){
			$final_array[$row['id']]['index_value']['olddivisor']=$row['investmentammount']/$row['indexvalue'];
			}
			if($final_array[$row['id']]['index_value']['newdivisor']==0){
			$final_array[$row['id']]['index_value']['newdivisor']=$row['investmentammount']/$row['indexvalue'];
			}}


			//}
			//$this->pr(	$final_array,true);
			
			
			// $query="SELECT  it.name,it.isin,it.ticker,(select price from tbl_final_price_temp fp where fp.isin=it.isin  and fp.date='".$datevalue."' and fp.indxx_id='".$row['id']."') as calcprice,(select localprice from tbl_final_price_temp fp where fp.isin=it.isin  and fp.date='".$datevalue."' and fp.indxx_id='".$row['id']."') as localprice,(select currencyfactor from tbl_final_price_temp fp where fp.isin=it.isin  and fp.date='".$datevalue."' and fp.indxx_id='".$row['id']."') as currencyfactor,(select share from tbl_share_temp sh where sh.isin=it.isin  and sh.indxx_id='".$row['id']."') as calcshare FROM `tbl_indxx_ticker_temp` it where it.indxx_id='".$row['id']."'";			
		
	//	exit;
	
	$query = "SELECT  it.id, it.name, it.isin, it.ticker, it.curr, it.sedol, it.cusip,it.weight, it.countryname, 
							fp.localprice, fp.currencyfactor, fp.price as calcprice
							FROM `tbl_indxx_ticker_temp` it left join tbl_final_price_temp fp on fp.isin=it.isin 
							 where it.indxx_id='" . $row['id'] . "' 
							and fp.indxx_id='" . $row['id'] . "'  and fp.date='" . $lastrundate. "'";			
		
		
			$indxxprices=	$this->db->getResult($query,true);	
		//$this->pr($indxxprices,true);
		if(!empty($indxxprices))
		{
		foreach($indxxprices as $key=>$ticker)
		{
			//echo "select share from tbl_share_temp where indxx_id='".$row['id']."' and isin='".$ticker['isin']."' limit 0,1";
		$share=$this->db->getResult("select share from tbl_share_temp where indxx_id='".$row['id']."' and isin='".$ticker['isin']."' limit 0,1",false);
		
		if(!empty($share))
		{
		$indxxprices[$key]['calcshare']=$share['share'];
		}else{
		$indxxprices[$key]['calcshare']=0;
		}
		}
		}
		$final_array[$row['id']]['values']=$indxxprices;
		
		
	//	$this->pr($indxxprices,true);	
			
			
			}	
		
		}

//$this->pr($final_array,true);

if(!empty($final_array))
	{
		foreach($final_array as $indxxKey=> $closeIndxx)
		{
			
			$file="../files/ca-output_upcomming/pre-closing-".$closeIndxx['code']."-".$closeIndxx['dateStart']."-".$datevalue.".txt";

			$open=fopen($file,"w+");

			$entry1='Date'.",";
			$entry1.=$datevalue.",\n";
			$entry1.='Index value'.",";
			$entry3='Effective Date'.",";
			$entry3.='Ticker'.",";
			$entry3.='Name'.",";
			$entry3.='Isin'.",";
			$entry3.='Sedol'.",";
			$entry3.='Cusip'.",";
			$entry3.='Country'.",";
			$entry3.='Index shares'.",";
			$entry3.='Weight'.",";
			$entry3.='Price'.",";
			$entry3.='Currency'.",";
			$entry3.='Currency factor'.",";
			$entry4='';
			
			
			//$this->pr($closeIndxx);
			$oldindexvalue=$closeIndxx['index_value']['indxx_value'];
			$newindexvalue=0;
			$oldDivisor=$closeIndxx['index_value']['newdivisor'];
			$newDivisor=$oldDivisor;
			$marketValue=0;
			$sumofDividendes=0;
			$shareinsertArray=array();
			foreach($closeIndxx['values'] as $TickerKey=> $closeprices)
			{
			//$this->pr($closeprices,true);
		if(!$closeprices['calcshare'] && !$closeprices['weight'])
		{//echo "Share and weight not available for ".$closeprices['ticker']."=>".$closeprices['name'];
		//exit;
		}
		$shareValue=0;
		$weightValue=0;
		if($closeprices['calcshare'])
			$shareValue=$closeprices['calcshare'];	
		else
		{	//$shareValue=($closeIndxx['index_value']['market_value']*$closeprices['weight'])/($closeprices['calcprice']*100);	
	$shareValue=($closeIndxx['index_value']['market_value']*$closeprices['weight'])/($closeprices['calcprice']);	
		$shareinsertArray[]='("'.$closeprices['isin'].'","'.$closeIndxx['id'].'","'.$shareValue.'")';
		//echo $shareValue;
		$closeprices['calcshare']=$shareValue;
		}
		$closeIndxx['values'][$TickerKey]['calcshare']=$shareValue;
		
			$securityPrice=$closeprices['calcprice'];
			
		
		if($closeprices['weight'])
		$weightValue=$closeprices['weight'];
		else
		$weightValue=(($closeprices['calcprice']*$shareValue)/$closeIndxx['index_value']['market_value']);
		
			// $weightValue."<br>";
			//echo $shareValue."<br>";
			//exit;
			if(!$securityPrice){
			//echo "Price Not Found For ".$closeprices['ticker']."=>".$closeprices['name'];
			//exit;
			}
			/*if(!$shareValue)
			{
			echo "Share Not Found For ".$closeprices['ticker']."=>".$closeprices['name'];
			exit;
			}*/
			
			
		 	$marketValue+=number_format($closeprices['calcshare']*$closeprices['calcprice'],11,'.','');	
		//	$sumofDividendes+=$shareValue*$dividendPrice;	
			//echo "<br>";
			
			

			}
		
 $marketValue= number_format($marketValue,11,'.','');	
	//exit;
//echo $closeIndxx['id']."<br>";
		
		//$newDivisor=number_format($oldDivisor-($sumofDividendes/$oldindexvalue),4,'.','');
		if($closeIndxx['index_value']['divpvalue'])
		{
		$marketValue+=$closeIndxx['index_value']['divpvalue'];
		}
	//echo $marketValue;
//exit;	
	//echo "<br>";
		
		
		
	//	$this->pr($closeIndxx['values']);
		
		 foreach($closeIndxx['values'] as $closeprices)
		{
			$weightValue=(($closeprices['calcprice']*$closeprices['calcshare'])/$marketValue);
			
		$entry4.= "\n".$datevalue.",";
            $entry4.=  $closeprices['ticker'].",";
            $entry4.= $closeprices['name'].",";
            $entry4.=$closeprices['isin'].",";
			 $entry4.=$closeprices['sedol'].",";;
            $entry4.=$closeprices['cusip'].",";;
            $entry4.=$closeprices['countryname'].",";
            $entry4.=$closeprices['calcshare'].",";
			$entry4.=$weightValue.",";
       		$entry4.=$closeprices['localprice'].",";
	     	$entry4.=$closeprices['curr'].",";
	     	$entry4.=$closeprices['currencyfactor'].",";
			
		} 
		
		
		
		
		$newDivisor=$marketValue/$oldindexvalue;
	//	echo "<br>";
		$oldDivisor=$newDivisor;
		//echo $marketValue;
		 $newindexvalue=number_format(($marketValue/$newDivisor),4,'.','');
		$entry2=$newindexvalue.",\n";
			$entry2.="Divisor,".$newDivisor.",\n";
		$entry2.="Market Value,".$marketValue.",\n\n";
		//exit;
		if($newindexvalue  && $newindexvalue!='0.0000')
		{
			//echo $newindexvalue;
			//exit;
		
		//exit;
		
		if(!empty($shareinsertArray)){
	
		$this->db->query("insert into tbl_share_temp (isin,indxx_id,share) values ".implode(",",$shareinsertArray).";");
		}

		
	 $insertQuery='INSERT into tbl_indxx_value_temp (indxx_id,code,market_value,indxx_value,date,olddivisor,newdivisor) values ("'.$closeIndxx['id'].'","'.$closeIndxx['code'].'","'.$marketValue.'","'.$newindexvalue.'","'.$datevalue.'","'.$oldDivisor.'","'.$newDivisor.'")';
		$this->db->query($insertQuery);	
		$insertQuery='INSERT into tbl_indxx_value_open_temp (indxx_id,code,market_value,indxx_value,date,olddivisor,newdivisor) values ("'.$closeIndxx['id'].'","'.$closeIndxx['code'].'","'.$marketValue.'","'.$newindexvalue.'","'.$datevalue.'","'.$oldDivisor.'","'.$newDivisor.'")';
		$this->db->query($insertQuery);	
		
		if($open){   
 if(   fwrite($open,$entry1.$entry2.$entry3.$entry4))
{
//echo "update tbl_indxx_temp set runindex='1',finalsignoff='1' where tbl_indxx_temp.id='".$indxxKey."'";
//exit;
	$query=$this->db->Query("update tbl_indxx_temp set runindex='1',finalsignoff='1' where tbl_indxx_temp.id='".$indxxKey."'");
	
	        fclose($open);

 $filetext= "file Written for ".$closeIndxx['code']."<br>";

}
}  
}else{
mail($_SESSION['User']['email'],"Run Index not  done","Runindex not done for ".$closeIndxx['code']);

}
		
		unset($final_array[$indxxKey]);
		}
	}
}
}
}  //end of function runindex



function checkandconvertprice($indexes){
//$this->pr($indexes,true);
//$lastrundatearray=$this->db->getResult("SELECT date FROM `tbl_system_task_complete` where name='Closing' and status='1' order by date desc",false,1);
$lastrundatearray=$this->db->getResult("SELECT date FROM `tbl_system_task_complete` where name='Closing' order by date desc",false,1);

//$this->pr($lastrundate,true);
$lastrundate=$lastrundatearray['date'];
if(!empty($indexes))
{
foreach($indexes as $indxx){
//echo $indxx;
//echo "select * from tbl_final_price_temp where date='".$lastrundate."' and indxx_id='".$indxx."'";
$result=$this->db->getResult("select * from tbl_final_price_temp where date='".$lastrundate."' and indxx_id='".$indxx."'");
if(!empty($result))
{
//$this->pr($result);
//echo "price already converted";
//	$this->getPrices($lastrundate);
}else{
$prices=$this->getPrices($lastrundate);
$currPrices=$this->getcurrPrices($lastrundate);
//$this->pr($currPrices);

$final_price_array	=	array();
	$indexarray			=	array();
	
	$index_query =	mysql_query("SELECT id, name, code, curr, currency_hedged FROM `tbl_indxx_temp` 
								WHERE `status` = '1' AND `submitted` = '1'  and id='".$indxx."'");
	
	if (!($err_code = mysql_errno()))
	{
		while(false != ($index = mysql_fetch_assoc($index_query)))
		{
			$index_id = $index['id'];
			//log_info("Processing upcoming index = " .$index_id);
				
			/* Check if given index is local currency hedged index or not. */
			$convert_flag = false;
			if($index['currency_hedged'] == 1)
			{
				/* TODO: Check this logic and why this table is used instead of tbl_indxx_ticker */
				if (false != ($res = mysql_query("Select date from tbl_final_price_temp 
													where indxx_id = '".$index_id."' order by date desc limit 0, 1")))
				{
					if(!mysql_num_rows($res))
						$convert_flag = true;
				}
				
				mysql_free_result($res);
			}
			else
			{
				$convert_flag = true;
			}
			
			
			if($convert_flag)
			{
				$res = mysql_query("SELECT it.isin, it.ticker, 
									it.curr as ticker_currency
									FROM tbl_indxx_ticker_temp it  
									where it.indxx_id='".$index_id."' ");

				log_info("	Securities in index = " .mysql_num_rows($res));
				
				
				$row = 0;
				while(false != ($priceRow = mysql_fetch_assoc($res)))
				{
					
					
					if(!in_array($priceRow['isin'],array_keys($prices)))
						{$p=$this->getLastPrice($priceRow['isin']);
							if($p)
							{	$prices[$priceRow['isin']]=$p;
							}else{
									$prices[$priceRow['isin']]['price']=0;
									mail($_SESSION['User']['email'],"price 0 of ticker ".$priceRow['ticker'],"Price of Input Ticker ".$priceRow['ticker']." is Zero");
							}
						}
					
					$currencyPrice = 0;
					log_info("	Processing security isin = " .$priceRow['isin']);
						
					/*
					 * Check if got the right currency for the security from Bloomberg.
					 * If not, raise alert and disable this index.
					 */
					if($prices[$priceRow['isin']]['curr'] != $priceRow['ticker_currency'])
					{
						mail_info("	Currency mismatch for index=" .$index_id. "[localcurrency="
								.$prices[$priceRow['isin']]['curr']. "][ticker_curr=" .$priceRow['ticker_currency']. "]");
	mail($_SESSION['User']['email'],"currency mismatch icalC 1.4","Currency mismatch for Ticker=" .$priceRow['ticker']. "[localcurrency=" 
									.$prices[$priceRow['isin']]['curr']. "][ticker_curr=" .$priceRow['ticker_currency']. "]");
						$indexarray[$index_id] = $priceRow['ticker'];
						break;
					}
					else
					{
						$currencyPrice = 1;
						
						
						
						$final_price_array[$index_id][$row]['price'] = $prices[$priceRow['isin']]['price'];

						if($index['curr'] && ($index['curr'] != $prices[$priceRow['isin']]['curr']))
						{
							$cfactor_code = $index['curr'].$prices[$priceRow['isin']]['curr'];
//echo $index['curr'].$prices[$priceRow['ticker']]['curr'];
								$cfactor=$currPrices[strtoupper($index['curr'].$prices[$priceRow['isin']]['curr'])]['price'];
							if(!$cfactor){
							$newCurrPrice= $this->getPriceforCurrency5($index['curr'],$prices[$priceRow['isin']]['curr'],$lastrundate);
							if(!empty($newCurrPrice))
							{$currPrices[$index['curr'].$prices[$priceRow['isin']]['curr']]=$newCurrPrice;
						$cfactor=$currPrices[$index['curr'].$prices[$priceRow['isin']]['curr']]['price'];
						}else{
							$indexarray[$index_id] = $priceRow['ticker'];
							break;
						}
							
							}
							$currencyPrice=$cfactor;
							$final_price_array[$index_id][$row]['price'] = $prices[$priceRow['isin']]['price']/$cfactor;

							if($prices[$priceRow['isin']]['curr']=="KWd")
                                $final_price_array[$index_id][$row]['price'] /= 1000;
							elseif(strcmp($cfactor_code,strtoupper($cfactor_code)))
								$final_price_array[$index_id][$row]['price'] /= 100;
						}
					
						$final_price_array[$index_id][$row]['isin'] = $priceRow['isin'];
						$final_price_array[$index_id][$row]['localprice'] = $prices[$priceRow['isin']]['price'];
						$final_price_array[$index_id][$row]['currencyfactor'] = $currencyPrice;
					}
					$row++;
				}
				/* Free the security table for this index */
				mysql_free_result($res);
			}
		}

		/* Remove duplicates from the array */
		$indexarray = array_unique($indexarray);
			
		/* Send email for faulty indexes and de-activate the same. */
		foreach($indexarray as $keyindex => $valueindex)
		{
			//send_index_deactivation_mail($keyindex, $valueindex, "UPCOMING");
			
			/* De-activate this index */
			
			mail($_SESSION['User']['email']," Upcoming Index Deactivated","Price Conversion failed ,Index Id :".$keyindex ." deactivated");
	
			unset($final_price_array[$keyindex]);
			mysql_query("update tbl_indxx_temp set status = '0' where id = '" . $keyindex . "'");
				
			
		}

		/* Update tbl_final_price table for rest of the indexes */
		if(!empty($final_price_array))
		{
			foreach($final_price_array as $indxx_id => $ival)
			{
				if(!empty($ival))
				{
					$query="INSERT into tbl_final_price_temp
									(indxx_id, isin, date, price, localprice, currencyfactor) values";
				$array_price_value=array();
					foreach($ival as $tempKey=>$ivalue)
					{
						$array_price_value[]="('" . $indxx_id . "','" . $ivalue['isin'] . "','" . $lastrundate. "',
									 '" . $ivalue['price'] . "','" . $ivalue['localprice'] . "', '" . $ivalue['currencyfactor'] . "')";
						/*$fpquery="INSERT into tbl_final_price_temp
									(indxx_id, isin, date, price, localprice, currencyfactor) values
									('" . $indxx_id . "','" . $ivalue['isin'] . "','" . date . "',
									 '" . $ivalue['price'] . "','" . $ivalue['localprice'] . "', '" . $ivalue['currencyfactor'] . "')";
						mysql_query($fpquery);
		
						if (($err_code = mysql_errno()))
						{
							log_error("Unable to update converted prices for upcoming index = " . $indxx_id .
										". MYSQL error code = " . $err_code . ". ");
							mail_exit(__FILE__, __LINE__);
						}*/
					}
					
					
					 $query.=implode(",",$array_price_value).";";
					//exit;
					mysql_query($query);
		
						
				}
				unset($final_price_array[$indxx_id]);
			}
			unset($final_price_array);
		}
		mysql_free_result($index_query);
	}
		






}	

}	
	
}

//exit;
}



function getCurrencyForIsin($isin){
//echo "SELECT curr from tbl_prices_local_curr where isin='".$isin."' order by date desc limit 0,1";
$security_values = mysql_query("SELECT curr from tbl_prices_local_curr where isin='".$isin."' order by date desc limit 0,1");
								
								$array=array();
if(mysql_num_rows($security_values)>0)
{
while($row=mysql_fetch_assoc($security_values))
{
$array[$isin]=$row['curr'];

}

}
	return $array;							
}


function getPrices($date){
	
mysql_query("delete from tbl_prices_local_curr where price not REGEXP '^[0-9\.]+$' or price='0' or price='0.00'");	

$security_values = mysql_query("SELECT ticker,price, isin,curr from tbl_prices_local_curr where date ='" .$date. 
								"'");
								
								$array=array();
if(mysql_num_rows($security_values)>0)
{
while($row=mysql_fetch_assoc($security_values))
{
$array[$row['isin']]=$row;

}

}
	return $array;							
}





function getcurrPrices($date){
mysql_query("delete from tbl_curr_prices where price not REGEXP '^[0-9\.]+$' or price='0' or price='0.00' ");	

//echo "SELECT currencyticker,price,currency from tbl_curr_prices where date ='" .date. 
								"'";
								
$security_values = mysql_query("SELECT currencyticker,price,currency from tbl_curr_prices where date ='" .$date. 
								"'");
								
								$array=array();
if(mysql_num_rows($security_values)>0)
{
while($row=mysql_fetch_assoc($security_values))
{
$array[str_replace("  Curncy",'',$row['currencyticker'])]=$row;

}

}

if(!empty($array))
{
	foreach($array as $key=>$value)
	{
	
$var=	str_split($key,3);
//print_r($var);

if(!array_key_exists($var[1].$var[0],$array))
{$array[$var[1].$var[0]]['price']=1/$value['price'];
$array[$var[1].$var[0]]['currency']=$var[0];
$array[$var[1].$var[0]]['currencyticker']=$value['currencyticker'];
}	}
}
//exit;
	return $array;							
}

function getLastPrice($ticker)
{
	$security_price = mysql_query("SELECT price, isin,ticker,curr,date from tbl_prices_local_curr where isin ='" .$ticker. 
								"'order by date desc limit 0,1");
if(mysql_num_rows($security_price)>0)
{
	$row=mysql_fetch_assoc($security_price);
	mail($_SESSION['User']['email'],"Old Price Used for Ticker.".$ticker,"Old Price Used for isin .".$ticker ." of date ".$row['date']);
	return $row;
}
	return 0;
}

function getPriceforCurrency5($index_currency,$ticker_currency,$date){
	mail($_SESSION['User']['email'],"Currency factor not found for ".strtoupper($index_currency.$ticker_currency),"Currency factor not found for ".strtoupper($index_currency.$ticker_currency)." for date ".$date." using Old Price");
	
	$query="SELECT currencyticker,price,currency  FROM `tbl_curr_prices` WHERE `currencyticker` LIKE '".strtoupper($index_currency.$ticker_currency)."%' order by date desc limit 0,1";
	
	$res=mysql_query($query);
if(mysql_num_rows($res)>0)
{
$row=mysql_fetch_assoc($res);
if($row['price'])
{
	//echo 1/$row['price'];
	return $row;
}else
{
return	$this->getPriceforCurrency6($ticker_currency,$index_currency,$date);
	
//echo "Price Not Available for Currency Ticker ".$ticker." of date.".$date."<br>" ;
//exit;
}
}
else
{
return	$this->getPriceforCurrency6($ticker_currency,$index_currency,$date);
}



}
function getPriceforCurrency6($index_currency,$ticker_currency,$date){

	 $query="SELECT currencyticker,price,currency  FROM `tbl_curr_prices` WHERE `currencyticker` LIKE '".strtoupper($index_currency.$ticker_currency)."%' order by date desc limit 0,1";
	$res=mysql_query($query);
if(mysql_num_rows($res)>0)
{
$row=mysql_fetch_assoc($res);
if($row['price'])
{
	//echo 1/$row['price'];
 $row['price']= 1/$row['price'];
 return $row;
}else
{
mail($_SESSION['User']['email'],"Currency factor not found for ".strtoupper($index_currency.$ticker_currency),"Currency factor not found for ".strtoupper($index_currency.$ticker_currency));
return NULL;	

//echo "Price Not Available for Currency Ticker ".$ticker." of date.".$date."<br>" ;
//exit;
}
}
else
{
mail($_SESSION['User']['email'],"Currency factor not found for ".strtoupper($index_currency.$ticker_currency),"Currency factor not found for ".strtoupper($index_currency.$ticker_currency));
return NULL;
}



}


}

?>

