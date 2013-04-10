<html>
<head>
<?php include ('include/head.php'); ?>
</head>
<body>
<script type="text/javascript" >
$(document).ready(function() {
	
	buildUpperGrid();

   $( "#tabs" ).tabs({
			beforeActivate: function(event, ui) {
	  			  switch (ui.newPanel.selector)
						{
							case "#tabs-1": 
								buildLowerGrid();
								break;
							
							case "#tabs-2": 
								$("#tabs-2").html("<br /><center>Tab 2 - I could put a grid here!</center>")
								break;
							
							case "#tabs-3": 
								$("#tabs-3").html("<br /><center>Tab 3 - I could put a grid here!</center>")
								break;
									
							case "#tabs-4": 
							$("#tabs-4").html("<br /><center>Tab 4 - I could put a grid here!</center>")
								break;	
						}
			  }
		});

		buildLowerGrid();
		
		// 
		// hides the caption bar
		//		
		$(".ui-jqgrid-titlebar").hide();
		$(".ui-jqgrid-pager").hide();

		// jQuery("#labGrid").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false});
						 
});

function buildUpperGrid()
{
	$("#labGrid").jqGrid({
			url: '/HAkey/ajax/getLabGridData.php',
			datatype: 'json',
			colNames:['id','Test Name', 'Order', 'Order Date','Results','Result Date','Reports','Report Date'],
			colModel : [
				{name:'id',index:'id', hidden:true,width:55},
		   	{name:'TestName',index:'TestName', width:295},
	   		{name:'Orders',index:'Orders', width:60, align:"center"},
	   		{name:'OrderDate',index:'OrderDate', width:120, align:"center"},
	   		{name:'Results',index:'Results', width:60, align:"center"},		
	   		{name:'ResultDate',index:'ResultDate', width:120,align:"center"},		
	   		{name:'Reports',index:'Reports', width:60, align:"center"},
				{name:'ReportDate',index:'ReportDate', width:120, align:"center"}			
				],
				rowNum:7,
		   	rowList:[10,20,30],
			  pager: '#pager2',
		   	sortname: 'id',
				scroll:true,
		    viewrecords: true,
		    sortorder: "desc",
		    caption:"JSON Example"
		});
		
		// 
		// hides the caption bar
		//		
		$(".ui-jqgrid-titlebar").hide();
		$(".ui-jqgrid-pager").hide();
	
}

function buildLowerGrid()
{
	$("#lowergrid").jqGrid({
			url: '/HAkey/ajax/getLabGridData.php',
			datatype: 'json',
			colNames:['id','Test Name', 'Order', 'Order Date','Results','Result Date','Reports','Report Date'],
			colModel : [
				{name:'id',index:'id', hidden:true,width:55},
		   	{name:'TestName',index:'TestName', width:295},
	   		{name:'Orders',index:'Orders', width:60, align:"center"},
	   		{name:'OrderDate',index:'OrderDate', width:120, align:"center"},
	   		{name:'Results',index:'Results', width:60, align:"center"},		
	   		{name:'ResultDate',index:'ResultDate', width:120,align:"center"},		
	   		{name:'Reports',index:'Reports', width:60, align:"center"},
				{name:'ReportDate',index:'ReportDate', width:120, align:"center"}			
				],
				rowNum:3,
		   	rowList:[10,20,30],
			  pager: '#pager2',
		   	sortname: 'id',
				scroll:true,
				height: 60,
				// height: $("#lowergrid").height(),
		    viewrecords: true,
		    sortorder: "desc",
		    caption:"JSON Example"
		});

		$("#gbox_lowergrid").css("left", "-15px");
		$("#tabs-1").css("height", "250px");
		
		// 
		// hides the caption bar
		//		
		$(".ui-jqgrid-titlebar").hide();
		$(".ui-jqgrid-pager").hide();
		
		$( "#datepicker" ).datepicker({
		      showOn: "button",
		      buttonImage: "images/calendar.gif",
		      buttonImageOnly: true
		    });
		
		$( "#spinner" ).spinner();
	
}
</script>

<div class="container">
	
<div id="banner">
<div style="float:left;padding-left:60px;">
<span style="font-weight:800;font-family:'OFL Sorts Mill Goudy TT', georgia, times, serif;font-size:15px;">
Medical Diagnostic Events-Lab Tests
</span>
</div> <!-- end of left -->
<div style="float:right;padding-right:10px;">
<button style="" id="logout" type="button">Logout</button><button style="padding-right:10px;" id="printsetup" type="button">Print Setup</button><button style="padding-right:10px;" id="printme" type="button">Print</button>
</div> <!-- end of right -->
</div> <!-- end of banner -->

<div id="identification">

<div style="float:left;background-color:white;width:25%;margin:3px 12px 3px 3px;">
<div id="namearea" style="border:2px solid grey;padding:3px 3px 3px 3px;height:20px;">
</div> <!-- end of namearea -->
<div style="position:relative;top:-8px;width:50%;text-align:center;margin:auto; z-index:199; background-color:white;font-weight:500;font-family:georgia, times, serif;font-size:12px;line-height:12px;">
Patients Full Name
</div>
</div> <!-- end of block -->

<div style="float:left;background-color:white;width:18%;margin:3px 12px 3px 3px;">
<div id="maidennamearea" style="border:2px solid grey;padding:3px 3px 3px 3px;height:20px;">
</div> <!-- end of maidennamearea -->
<div style="position:relative;top:-8px;width:65%;text-align:center;margin:auto;  z-index:199; background-color:white;font-weight:500;font-family:georgia, times, serif;font-size:12px;line-height:12px;">
Maiden Name
</div>
</div> <!-- end of block -->

<div style="float:left;background-color:white;width:11%;margin:3px 12px 3px 3px;">
<div id="dobarea" style="border:2px solid grey;padding:3px 3px 3px 3px;height:20px;">
</div> <!-- end of dobarea -->
<div style="position:relative;top:-8px;width:80%;text-align:center;margin:auto;  z-index:199; background-color:white;font-weight:500;font-family:georgia, times, serif;font-size:12px;line-height:12px;">
Date of Birth
</div>
</div> <!-- end of block -->

<div style="float:left;background-color:white;width:8%;margin:3px 12px 3px 3px;">
<div id="agearea" style="border:2px solid grey;padding:3px 3px 3px 3px;height:20px;">
</div> <!-- end of agearea -->
<div style="position:relative;top:-8px;width:60%;text-align:center;margin:auto; z-index:199; background-color:white;font-weight:500;font-family:georgia, times, serif;font-size:12px;line-height:12px;">
Age
</div>
</div> <!-- end of block -->

<div style="float:left;background-color:white;width:11%;margin:3px 12px 3px 3px;">
<div id="genderarea" style="border:2px solid grey;padding:3px 3px 3px 3px;height:20px;">
</div> <!-- end of genderarea -->
<div style="position:relative;top:-8px;width:80%;text-align:center;margin:auto; z-index:199; background-color:white;font-weight:500;font-family:georgia, times, serif;font-size:12px;line-height:12px;">
Gender
</div>
</div> <!-- end of block -->

<div style="float:left;background-color:white;width:11%;margin:3px 12px 3px 3px;">
<div id="bloodtype" style="border:2px solid grey;padding:3px 3px 3px 3px;height:20px;">
</div> <!-- end of bloodtype -->
<div style="position:relative;top:-8px;width:80%;text-align:center;margin:auto; z-index:199; background-color:white;font-weight:500;font-family:georgia, times, serif;font-size:12px;line-height:12px;">
Blood Type
</div>
</div> <!-- end of block -->

</div> <!-- end of identification -->

<div id="medicalinfo">
<div id="classification" style="float:left;padding-left:5px;width:40%;">
<div style="position:relative;width:80%;text-align:center;margin:auto; z-index:199; background-color:white;font-weight:500;font-family:georgia, times, serif;font-size:12px;line-height:12px;">
International Classification of Diseases (ICD) Diagnosis
</div>
<div style="position:relative;top:-7px; border:2px solid grey;padding:3px 3px 3px 3px;">
<table width="100%" class="sectionpanelTable">
	<tr style="line-height:3px;" >
		<td colspan=2 align="right">&nbsp;</td>
	</tr>
	<tr>
		<td style="width:25%;" align="right">System&nbsp;</td>
		<td align="left"><input type="text" id="system" style="width:100%;" ></td>
	</tr>	
	<tr>
		<td align="right">SubSystem&nbsp;</td>
		<td align="left"><input type="text" id="subsystem" style="width:100%;" ></td>
	</tr>
	<tr>
		<td align="right">Division&nbsp;</td>
		<td align="left"><input type="text" id="division" style="width:100%;" ></td>
	</tr>
	<tr>
		<td align="right">SubDivision&nbsp;</td>
		<td align="left"><input type="text" id="subdivision" style="width:100%;" ></td>
	</tr>
</table>
</div> <!-- end of blue -->
</div> <!-- end of classification -->
<div id="diagnosticevent" style="float:left;padding-left:15px;width:50%;"">
<div style="position:relative;width:35%;text-align:center;margin:auto; z-index:199; background-color:white;font-weight:500;font-family:georgia, times, serif;font-size:12px;line-height:12px;">
Diagnostic Event Body System
</div>
<div style="position:relative;top:-7px; border:2px solid grey;padding:3px 3px 3px 3px;">
<table width="100%" class="sectionpanelTable">
	<tr style="line-height:3px;" >
		<td colspan=2 align="right">&nbsp;</td>
	</tr>
	<tr>
		<td align="right">Version&nbsp;</td>
		<td align="left">
			<input type="text" id="version" style="width:5%;" >&nbsp;
			Code&nbsp;<input type="text" id="code" style="width:10%;" >
			Chapter&nbsp;<input type="text" id="chapter" style="width:40%;" >
		</td>
	</tr>	
	<tr>
		<td align="right">Block&nbsp;</td>
		<td align="left"><input style="width:100%;" type="text" id="Block"></td>
	</tr>
	<tr>
		<td align="right">Section&nbsp;</td>
		<td align="left"><input style="width:100%;" type="text" id="section" ></td>
	</tr>
	<tr>
		<td align="right">Diagnosos&nbsp;</td>
		<td align="left"><input style="width:100%;" type="text" id="diagnosis"></td>
	</tr>
</table>
</div> <!-- end of blue -->
</div> <!-- end of diagnosticevent -->
</div> <!-- end of medicalinfo -->

<div id="navbuttons">
<div id="upperbuttons" class="sectionpanel">
<button style="" id="Symptoms" type="button">Symptoms</button>
<button style="" id="vitalsigns" type="button">Vital Signs</button>
<button style="" id="notes" type="button">Notes</button>
<button style="" id="labs" type="button">Labs</button>
<button style="" id="images" type="button">Images</button>
<button style="" id="clinicaltests" type="button">Clinical Tests</button>
<button style="" id="medications" type="button">Medications</button>
<button style="" id="procedures" type="button">Procedures</button>
<button style="" id="reports" type="button">Reports</button>
<button style="" id="Treamentstherapys" type="button">Treatments</button>
<button style="" id="protocals" type="button">Protocals<br /> & Therapies</button>
<button style="" id="providers" type="button">Providers</button>
<button style="" id="unknown" type="button">Unknown<br />Documents</button>
</div> <!-- end of upperbuttons -->
</div> <!-- end of navbuttons -->
<div id="section-panel">
<table id="labGrid" class="gridData"></table>
<div id="pager2"></div>

<div id="tabs" class="mytabs">
  <ul>
    <li><a href="#tabs-1">Test Reports</a></li>
    <li><a href="#tabs-2">Test Results</a></li>
    <li><a href="#tabs-3">Test Note</a></li>
		<li><a href="#tabs-4">Required Basic Test Information</a></li>
  </ul>
  <div style="height:340px;background-color:white;" id="tabs-1">    
	<table id="lowergrid" class="gridData"></table>
	<div id="pager3"></div>
	<div id="lowerdetail" class="mylowerdetail">
	<span style="float:left; padding-left:15px;">Title&nbsp;<input size="60" type="text" id="lowertitle" /></span>
	<span style="float:right; padding-left:15px;">Provider of Report&nbsp;<input size="50" type="text" id="lowerprovider" /></span>
	<br />
	<span style="float:left; padding-left:15px;padding-top:15px;vertical-align: top;">Text&nbsp;
	<textarea rows="4" cols="70">
	</textarea>	
	</span>
	<span style="float:right;padding-top:15px;">Test Report Date&nbsp;<input type="text" id="datepicker" /></span>
	<br />
	<span style="float:right;padding-top:15px;">If uploading, number fo pages&nbsp;<input id="spinner" size="3" name="value" /></span>  
	</div>

	<div id="lowerbuttons" class="sectionpanellower"   style="clear:both;padding-top:25px;width:91%;">
	<button style="float:left;" id="clear" type="button">Clear Fields</button>
	<button style="float:left;" id="savelab" type="button">Save lab Test Report</button>
	<button style="float:left;" id="uploadlab" type="button">Upload Lab Test Report</button>
	<button style="float:left;" id="viewlab" type="button">View Lab Text Report</button>
	<button style="float:right;" id="return" type="button">Return to List of</br>Diagnostic Events</button>
	</div> <!-- end of lowerbuttons -->
  </div>
  <div id="tabs-2">    
  </div>
  <div id="tabs-3">    
  </div>
	<div id="tabs-4">   
  </div>
</div>
</div> <!-- end of section-panel -->

</div> <!-- end of container -->
</body>
</html>
