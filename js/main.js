// JavaScript Document
$(function(){	
	$(document).on("click","#findStaff",function(){
		var searchStaff=$("#searchStaff").val();//capture the content of the textbox.
		if (searchStaff == "") { // if username variable is empty
			alert("Sila masukkan nama / bahagian / jawatan anda");//display error message
			return false; // stop the script
		}
		var urlcarian="core/ajax/doSearchStaff.php";
		if($.trim(searchStaff).length > 0) {
			//AJAX configuration
			$.ajax({
				url:urlcarian,//the URL
				type:'post',//method used
				async:'true',
				data:{searchStaff:searchStaff},//the data parameter to transfer
				beforeSend: function(){ $("#findStaff").val('Proces carian...'); },
				success:function(result){//if the connection success
					//display the record in div displayresult
					$("#findStaff").val('Carian');
					$("#displayresult").html(result).enhanceWithin();
				},//success
				error:function(request,error){//if the connection fail
					$("#findStaff").val('Carian');
					$("#infoSearch").html("Network error!!!").enhanceWithin();
				}//error
			});//ajax
		}
		return false;
	});
	
	$(document).on("click","#saveData",function(){
		var insUniform = new Array();
		var insAct = new Array();
		var insActLvl = new Array();
		
		var mode=$("#mode").val();//capture the content of the textbox.
		var staffID=$("#staffID").val();//capture the content of the textbox.
		var yearService=$("#yearService").val();//capture the content of the textbox.
		var yearILPKL=$("#yearILPKL").val();//capture the content of the textbox.
		var u21=$('input:radio[name=u21]:checked').val();//capture the content of the textbox.
		var u22=$('input:radio[name=u22]:checked').val();//capture the content of the textbox.
		var u23=$('input:radio[name=u23]:checked').val();//capture the content of the textbox.
		var u24=$('input:radio[name=u24]:checked').val();//capture the content of the textbox.
		var u25=$('input:radio[name=u25]:checked').val();//capture the content of the textbox.
		
		$("input[name=insUniform]").each(function() { insUniform.push($(this).val()); });//capture the content of the textbox.
		$("input[name=insAct]").each(function() { insAct.push($(this).val()); });//capture the content of the textbox.
		$("input[name=insActLvl]").each(function() { insActLvl.push($(this).val()); });//capture the content of the textbox.
		
		var UniformInsert = insUniform.toString();
		var ActInsert = insAct.toString();
		var ActLevelInsert = insActLvl.toString();
		
		if (yearService == "" || yearILPKL == "" || $("#u21:checked").length == 0 || $("#u22:checked").length == 0 || $("#u23:checked").length == 0 || $("#u24:checked").length == 0 || $("#u25:checked").length == 0) { // if username variable is empty
			alert("Sila lengkapkan semua maklumat.");//display error message
			return false; // stop the script
		}
		var urlcarian="core/ajax/doSaveSurvey.php";
		if($.trim(yearService).length > 0 && $.trim(yearILPKL).length > 0 && $.trim(u21).length > 0 && $.trim(u22).length > 0 && $.trim(u23).length > 0 && $.trim(u24).length > 0 && $.trim(u25).length > 0) {
			//AJAX configuration
			$.ajax({
				url:urlcarian,//the URL
				type:'post',//method used
				async:'true',
				data:{mode:mode, staffID:staffID, yearService:yearService, yearILPKL:yearILPKL, u21:u21, u22:u22, u23:u23, u24:u24, u25:u25, UniformInsert:UniformInsert, ActInsert:ActInsert, ActLevelInsert:ActLevelInsert},//the data parameter to transfer
				beforeSend: function(){ $("#saveData").val('Proces menyimpan maklumat...'); },
				success:function(result){//if the connection success
					if(result=="true"){
					//display the record in div displayresult
						$("#saveData").val('Simpan');
						alert("Maklumat anda berjaya disimpan.");//display error message
						window.location.href = "index.php?p=search";
					} else {
						$("#saveData").val('Simpan');
						alert(result);//display error message
					}
				},//success
				error:function(request,error){//if the connection fail
					$("#saveData").val('Simpan');
					$("#infoSearch").html("Network error!!!").enhanceWithin();
				}//error
			});//ajax
		}
		return false;
	});
	
	$(document).on("click","#addUniform",function(){
		var insertBox='<tr class="dataRow"><td><input type="text" name="insUniform" id="insUniform" class="insUniform ui-input ui-round-all ui-shadow ui-no-margin" placeholder="Badan beruniform" /></td><td><input type="button" class="ui-button ui-round-all ui-shadow ui-button-yellow ui-mini ui-no-margin" id="removrThis" class="ui-input" value="Buang" onclick="deleteRow(this)" /></td></tr>';
		$("#insertUniform").append(insertBox);
		return false;
	});
	
	$(document).on("click","#addActivities",function(){
		var insertBox='<tr class="dataRow"><td><input type="text" name="insAct" id="insAct" class="insAct ui-input ui-round-all ui-shadow ui-no-margin" placeholder="Jawatankuasa / Aktiviti / Tugas" /></td><td><input type="text" name="insActLvl" id="insActLvl" class="insActLvl ui-input ui-round-all ui-shadow ui-no-margin" placeholder="Peringkat (KSM / JTM / ILPKL)" /></td><td><input type="button" class="ui-button ui-round-all ui-shadow ui-button-yellow ui-mini ui-no-margin" id="removrThis" class="ui-input" value="Buang" onclick="deleteRow(this)" /></td></tr>';
		$("#insertActivities").append(insertBox);
		return false;
	});
	
	$(document).on("click","#staffView",function(){
		var viewStaff=$("#viewStaff").val();//capture the content of the textbox.
		if (viewStaff == "") { // if username variable is empty
			alert("Sila masukkan nama / bahagian / jawatan anda");//display error message
			return false; // stop the script
		}
		var urlcarian="core/ajax/doFindStaff.php";
		if($.trim(viewStaff).length > 0) {
			//AJAX configuration
			$.ajax({
				url:urlcarian,//the URL
				type:'post',//method used
				async:'true',
				data:{viewStaff:viewStaff},//the data parameter to transfer
				beforeSend: function(){ $("#staffView").val('Proces carian...'); },
				success:function(result){//if the connection success
					//display the record in div displayresult
					$("#staffView").val('Carian');
					$("#displayresult").html(result).enhanceWithin();
				},//success
				error:function(request,error){//if the connection fail
					$("#staffView").val('Carian');
					$("#infoSearch").html("Network error!!!").enhanceWithin();
				}//error
			});//ajax
		}
		return false;
	});
})

function deleteRow(btn) {
	if(confirm('Adakah anda ingin padam maklumat ini?')==true) {
		var row = btn.parentNode.parentNode;
		row.parentNode.removeChild(row);
	}
}