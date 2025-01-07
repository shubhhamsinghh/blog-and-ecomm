<? 
ob_start();
session_start();
include("../include/vars.inc.php");
include("../include/db.inc.php");
include("../include/function.inc.php");	
 	$db1= new DB();
	$db1-> open();
////////////////////////////// displaying all features of level 2 for searching with dropdowns and radio buttons /////////////////	
function createDropDown($dropObj)
		{
		 $tdText="<table width='100%' border='0' cellspacing='1' cellpadding='1'><tr><td><div  style='float:left; margin-right:20px;'><select name='from".$dropObj['id']."' class='select' style='width:120px'>";
		 $tdText.="<option value=''>".$dropObj['fromLabel']."</option>";
		 for($st=$dropObj['fromStart'];$st<=$dropObj['fromEnd'];$st+=$dropObj['fromRange'])
		 {
			 $tdText.="<option value='".$st."'>".$st."</option>";
		 }	 
		 $tdText.="</select></div></td></tr>";
		 $tdText.="<tr><td><div style='float:left; margin-right:20px;'><select name='to".$dropObj['id']."' class='select' style='width:120px'>";
		 $tdText.="<option value=''>".$dropObj['toLabel']."</option>";
		 for($st2=$dropObj['toStart'];$st2<=$dropObj['toEnd'];$st2+=$dropObj['toRange'])
		 {
			 $tdText.="<option value='".$st2."'>".$st2."</option>";
		 }
		 $tdText.="</select></div></td></tr></table>";
return $tdText;
}

function createDropDown2($dropObj)
		{
		 $tdText="";	
		 $tdText="<table border='0' cellspacing='1' cellpadding='1'><tr><td><div  style='float:left; margin-right:20px;'><select name='".$dropObj['id']."' class='select' style='width:100px'>";
		 $tdText.="<option value=''>".$dropObj['rdLabel']."</option>";
		 
		  $r_values=explode(",",$dropObj['rdOptionValue'] );
		  foreach($r_values as $r_value)
		  {
		    $tdText.="<option value='".$r_value."'>".$r_value."</option>";
		  }	 
		  $tdText.="</select></div></td></tr></table>";
return $tdText;
}
if(isset($_GET['catIds']))
  {
  if($_GET['catIds']=="all")
      {	   
	     
		 
	  }	  
	  else{	 
	      $arrIds =split(",",$_GET['catIds']);
		 $categoryId=$arrIds[0];
		 $subCategoryId=$arrIds[1];
		   if($subCategoryId!="")
		     {
			 
			 $tdText1='<table width="60%" border="0" cellspacing="1" cellpadding="1"><tr>';
			 $tdText1.='<td><table width="100%" border="0" cellspacing="1" cellpadding="1"><tr>';
				echo "<td valign='top'>";
			   $qry1="SELECT * FROM `subcategory2` where top='".$subCategoryId."'";
			   $sbcat=mysql_query($qry1);
			   $tdText1.="<div  style='float:left; margin-right:20px;'><select name='subcatid' class='select'>";
		       $tdText1.="<option value=''>All</option>";
				while($subRec=mysql_fetch_array($sbcat))
				{
				  $tdText1.="<option value='".$subRec['id']."'>".$subRec['name']."</option>";
				}
				 $tdText1.="</select></div>";
				echo "</td>";
				$tdText1.='</tr></table>';
				echo $tdText1;
				$qry="SELECT * FROM `search_level2` where subCatId='".$subCategoryId."' order by rangeNormal desc";
				$dropObj=mysql_query($qry);
				$numRec=mysql_num_rows($dropObj);
				if($numRec>0)
				{
				$i=0;
				$k=1;
				$tdText='';
				$tdText.='<table width="100%" border="0" cellspacing="1" cellpadding="1" id="first_show" ><tr>';
					while($dropRec=mysql_fetch_array($dropObj))
					{
					
					if($dropRec['rangeNormal']=='normal')
					{
					   if($dropRec['radioDrop']=='dropdown')
					   {
					      /* $tdText.= "";
						  $r_values=explode(",",$dropRec['rdOptionValue'] );
						  $tdText.="<td>";
						  $tdText.="<span style='float:left; margin-left:20px;'>".$dropRec['rdLabel']."</span>";
						  foreach($r_values as $r_value)
						  {
						    $tdText.= "<span style='float:left; margin-left:20px;'><input type='radio' name='".$dropRec['id']."' value='".$r_value."'></span><span style='float:left;'>".$r_value."</span>";        
						  } 
						 $tdText.="</span></td>";
						 $k=1;  
					   }
					   else
					   {  */
						  echo "<td valign='top'>";
					      echo createDropDown2($dropRec);
						  echo "</td>";
					   }
					}
					else
					{
					  echo "<td>";
					  echo createDropDown($dropRec);
					  echo "</td>";
					}
				  }	
				} 
			 }
			 $tdText.="</tr></table>";
		}	
		echo  $tdText;
 }   
?>