<html>
<head>
<?php include ('include/head_idea1.php'); ?>
</head>
<body>
<script type="text/javascript" >
$(document).ready(function() {

	$("#chooseFirst").click(function() {
		$("#firstSelection").css('display', 'none');
		$("#secondSelection").css('display', 'none');

		$('#buttonList').load('include/parentButtons.html', function () {
			$(".chooseList").slideToggle('slow', function() {
			// 	// $(".selectButtons").click(function() {
			// 	// 	processSelect(this);
			// 	// });
			});
			
		});		
	});

});

function processSelect(elm)
{
	var title = $(elm).text();
	var buttonArr = $(elm).attr('id').split(".");
	fileName = buttonArr[1] + buttonArr[2] + ".html";
	idx = buttonArr[0];

	switch (idx)
	{
		case '1':
			var selectionId = "#firstSelection";
			break;

		case '2':
			var selectionId = "#secondSelection";
			break;	

	}

	$(selectionId).text(title);
	$(selectionId).attr('name', fileName);
	$(selectionId).css('display','inline');

	$(".chooseList").slideToggle('slow', function() {
			//
	});	
} //  end of function process this

function getButtons(elm)
{
	var fileName = $(elm).attr('name');
	$('#buttonList').load('include/'+fileName, function () {
		$(".chooseList").slideToggle('slow', function() {
			// $(".selectButtons").click(function() {
			// 	processSelect(this);
			// });
		});
	});
}
</script>

<div class="container">
	
<div class="banner">
<div style="float:left;padding-left:60px;">
<span style="font-weight:800;font-family:'OFL Sorts Mill Goudy TT', georgia, times, serif;font-size:15px;">
Medical Diagnostic Events-Lab Tests
</span>
</div> <!-- end of left -->
<div style="float:right;padding-right:10px;">
<button class="LargeButtons"  id="logout" type="button">Logout</button>
<button class="LargeButtons"  id="printsetup" type="button">Print Setup</button>
<button class="LargeButtons"  id="printme" type="button">Print</button>
</div> <!-- end of right -->
</div> <!-- end of banner -->

<div class="identification">

<div style="float:left;background-color:white;padding:5px;width:20%;">
<center>
<input style="width:100%;" id="fullname" type="text" placeholder="Patient Full name" >
<span class="inputTitle">Patients Full Name</span>
</center>
</div> <!-- end of block -->

<div style="float:left;background-color:white;width:18%;padding:5px;">
<center>
<input style="width:100%;" id="maidenname" type="text" placeholder="Maiden Name" >
<span class="inputTitle">Maiden Name</span>
</div> <!-- end of block -->
</center>

<div style="float:left;background-color:white;padding:5px;width:18%;">
<center>
<input style="width:100%;" id="dob" type="text" placeholder="Date of Birth" >
<span class="inputTitle">Date of Birth</span>
</center>
</div> <!-- end of block -->

<div style="float:left;background-color:white;padding:5px;width:8%;">
<center>
<input style="width:100%;" id="age" type="text" placeholder="Age" >
<span class="inputTitle">Age</span>
</center>
</div> <!-- end of block -->

<div style="float:left;background-color:white;padding:5px;width:11%;">
<center>
<input style="width:100%;" id="gender" type="text" placeholder="Gender" >
<span class="inputTitle">Gender</span>
</center>
</div> <!-- end of block -->

<div style="float:left;background-color:white;padding:5px;width:11%;">
<center>
<input style="width:100%;" id="bloodtype" type="text" placeholder="Blood Type" >
<span class="inputTitle">Blood Type</span>
</center>
</div> <!-- end of block -->

</div> <!-- end of identification -->

<div class="chooseButton" >
<button style="float:left;" id="chooseFirst" class="LargeButtons" type="button">Choose Information</button>
<button onclick="getButtons(this);" style="float:left;display:none;" id="firstSelection" class="LargeButtons" type="button"></button>
<button onclick="getButtons(this);" style="float:left;display:none;" id="secondSelection" class="LargeButtons" type="button"></button>
</div> <!-- end of chooseButton -->	

<div class="chooseList" id="buttonList">
</div> <!-- end of chooseList -->

<div class="mainDisplay" >
This is the Main display area
</div> <!-- end of mainDisplay -->	



</div> <!-- end of section-panel -->

</div> <!-- end of container -->
</body>
</html>
