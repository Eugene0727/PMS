<?php
include('includes/dbconnection.php');
	function get_parking_lastId(){
		global $con;
		$newID = 0;
		$sql = "SELECT slotId FROM tblparkingslot
		ORDER BY slotId ASC";
		$results = mysqli_query($con, $sql);
		while ($result = mysqli_fetch_array($results)) {
			$newID = $result['slotId'];
		}
		$newID++;
		return $newID;
	}
	function get_notif_lastId(){
		global $con;
		$newID = 0;
		$sql = "SELECT notifId FROM tblnotification
		ORDER BY notifId ASC";
		$results = mysqli_query($con, $sql);
		while ($result = mysqli_fetch_array($results)) {
			$newID = $result['notifId'];
		}
		$newID++;
		return $newID;
	}
	function get_profile_lastId(){
		global $con;
		$newID = 0;
		$sql = "SELECT profileId FROM tblprofilepic
		ORDER BY profileId ASC";
		$results = mysqli_query($con, $sql);
		while ($result = mysqli_fetch_array($results)) {
			$newID = $result['profileId'];
		}
		$newID++;
		return $newID;
	}
	function get_customer_lastId(){
		global $con;
		$newID = 0;
		$sql = "SELECT ReferenceNo FROM tblcustomer
		ORDER BY ReferenceNo ASC";
		$results = mysqli_query($con, $sql);
		while ($result = mysqli_fetch_array($results)) {
			$newID = $result['ReferenceNo'];
		}
		$newID++;
		return $newID;
	}
	function get_blacklistedCustomer_lastId(){
		global $con;
		$newID = 0;
		$sql = "SELECT blacklistId FROM tblblacklist
		ORDER BY blacklistId ASC";
		$results = mysqli_query($con, $sql);
		while ($result = mysqli_fetch_array($results)) {
			$newID = $result['blacklistId'];
		}
		$newID++;
		return $newID;
	}
	function get_people_lastId(){
		global $con;
		$newID = 0;
		$sql = "SELECT peopleId FROM tblpeoplelist
		ORDER BY peopleId ASC";
		$results = mysqli_query($con, $sql);
		while ($result = mysqli_fetch_array($results)) {
			$newID = $result['peopleId'];
		}
		$newID++;
		return $newID;
	}
	function get_area_lastId(){
		global $con;
		$newID = 0;
		$sql = "SELECT areaId FROM tblbusinesspartner
		ORDER BY areaId ASC";
		$results = mysqli_query($con, $sql);
		while ($result = mysqli_fetch_array($results)) {
			$newID = $result['areaId'];
		}
		$newID++;
		return $newID;
	}
	function get_admin_lastId(){
		global $con;
		$newID = 0;
		$sql = "SELECT ID FROM tbladmin
		ORDER BY ID ASC";
		$results = mysqli_query($con, $sql);
		while ($result = mysqli_fetch_array($results)) {
			$newID = $result['ID'];
		}
		$newID++;
		return $newID;
	}
	function get_owner_lastId(){
		global $con;
		$newID = 0;
		$sql = "SELECT ownerId FROM tblbusinessowner
		ORDER BY ownerId ASC";
		$results = mysqli_query($con, $sql);
		while ($result = mysqli_fetch_array($results)) {
			$newID = $result['ownerId'];
		}
		$newID++;
		return $newID;
	}
	function get_profit_lastId(){
		global $con;
		$newID = 0;
		$sql = "SELECT profitId FROM tblprofit
		ORDER BY profitId ASC";
		$results = mysqli_query($con, $sql);
		while ($result = mysqli_fetch_array($results)) {
			$newID = $result['profitId'];
		}
		$newID++;
		return $newID;
	}
	function get_category_lastId(){
		global $con;
		$newID = 0;
		$sql = "SELECT categoryId FROM tblcategory
		ORDER BY categoryId ASC";
		$results = mysqli_query($con, $sql);
		while ($result = mysqli_fetch_array($results)) {
			$newID = $result['categoryId'];
		}
		$newID++;
		return $newID;
	}
	function get_brand_lastId(){
		global $con;
		$newID = 0;
		$sql = "SELECT brandId FROM tblbrand
		ORDER BY brandId ASC";
		$results = mysqli_query($con, $sql);
		while ($result = mysqli_fetch_array($results)) {
			$newID = $result['brandId'];
		}
		$newID++;
		return $newID;
	}
	function getBlacklist(){
		global $con;
		$name = $_SESSION['verifyName'];
    	$blacklistsql = mysqli_query($con, "select customerName from tblblacklist where customerName='$name'");
    	while($blacklistResult = mysqli_fetch_array($blacklistsql)){
    		$blacklistName = $blacklistResult['customerName'];
    	}
    	return $blacklistName;
	}
	/*function verifyNumOfRow(id){
		$id = id;
		global $con;
		$sql = mysqli_query($con,"select categoryId from tblcategory where categoryId='$id'");
		$num=mysqli_num_rows($sql);

		return $num;
	}*/
	/*function getCategoryValue(selectedValue){
		$_SESSION['selectedCat'] = selectedValue;
	}*/
	/*function getInfo(id){
		global $con;
		$sql = "SELECT * FROM tblvehicle
		ORDER BY ReferenceNo ASC";
		$results = mysqli_query($connection, $sql);
		return $results;
	}*/

	/*function get_selectedAreaId(companyName){
		 $id = companyName;
		 $area = mysqli_query($con,"select areaId from tblbusinesspartner where companyName = '$id'");
		 $areaId = $area['areaId'];

		 return $areaId;
	}*/
	/*function get_slotNumber($slotNo){
		global $con;
		$status = "";
		$sql = mysqli_query($con, "select * from tblparkingslot");
        while($slotsArr = mysqli_fetch_array($sql)){
            if($slotNo == $slotsArr['slotName']){
               $status = mysqli_query($con, "update tblparkingslot set $slotArr['status'] = 'Occupied' where $slotArr['slotName'] = $slotNo");
            }
        }
        return $status;
	}*/
?>
<!-- <script type="text/javascript">

    function getValue(){
      let catValue = document.getElementById('select').value;
      return catValue;
</script> -->