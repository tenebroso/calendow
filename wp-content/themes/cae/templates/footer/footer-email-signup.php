
<script type="text/javascript">
var cfJsHost = (("https:" == document.location.protocol) ? "https://" : "http://");
document.write(unescape("%3Cscript src='" + cfJsHost + "dflzqrzibliy5.cloudfront.net/modules/calculations/form/js/form.calculations.js?7993' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript">
<!--
var formrules=new Array(0);

//-->
</script>
<script type="text/javascript">
var cfJsHost = (("https:" == document.location.protocol) ? "https://" : "http://");
document.write(unescape("%3Cscript src='" + cfJsHost + "dflzqrzibliy5.cloudfront.net/includes/interactive123cf.js?7993' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript">
	var fid=1382485;
	var curr='';
	var preview_iframe=0;
	var real_time=0;
</script>

<script type="text/javascript">
<!--
var selectedfield='';
var multiPageCurent=1;
var multiPageTotal=1;
function InputActions(field,id) {
	var textcolor='#000000';
	var hltextcolor='#000000';
	$('.class123-labelinfo.class123-labelhidden').addClass('hidden_instruction');
	$(field).closest('.fieldcontainer').find('.class123-labelinfo').removeClass('hidden_instruction');
	//var calendar = $('img[title="Close Calendar"]').trigger('click');

	 lastactionobj=field;

	if (id==selectedfield) { /* alert('do nothing'); */	}
	else
		{
		// first we unhighlight the previous field, if any
		if (selectedfield!='')
			{
			//$('.tcalIcon').closest('.fieldcontainer').css('background','none repeat scroll 0 0 #fff');
			lid=selectedfield;
			lidsec=lid.replace('row','rowsec');

			// reparam culoare textlabels
			var tr=document.getElementById(lid);

			if (document.getElementsByClassName)
				{
			var textlabels = tr.getElementsByClassName('class123-label');
			for (j=0;j<textlabels.length;j++)
				textlabels[j].style.color=textcolor;
				}
				else
				{
				var textlabels=tr.getElementsByTagName('label');
				for (j=0;j<textlabels.length;j++)
					if (textlabels[j].className.indexOf('class123-label')>-1) textlabels[j].style.color=textcolor;
				}
			var oldbg='';
			if (document.getElementById('errorflag'+lid)!=null)
				oldbg=document.getElementById('errorflag'+lid).value;

			// reparam culoare bg td
			var tds = tr.getElementsByTagName('div');
			for (j=0;j<tds.length;j++)
				tds[j].parentNode.parentNode.style.background=oldbg;

			// reparam culoare bg td sec
			if (document.getElementById(lidsec) != null)
				{
				var trsec=document.getElementById(lidsec);
				tds = trsec.getElementsByTagName('div');
				for (j=0;j<tds.length;j++)
					tds[j].parentNode.parentNode.style.background=oldbg;
				}
			}
		// then we highlight the new one
		selectedfield=id;

		lid=id;
		lidsec=lid.replace('row','rowsec');

		// modificam culoare textlabels
		var tr=document.getElementById(lid);
		if (document.getElementsByClassName)
			{
		var textlabels = tr.getElementsByClassName('class123-label');
		for (j=0;j<textlabels.length;j++)
			textlabels[j].style.color=hltextcolor;
			}
			else
			{
			var textlabels=tr.getElementsByTagName('label');
			for (j=0;j<textlabels.length;j++)
				if (textlabels[j].className.indexOf('class123-label')>-1) textlabels[j].style.color=hltextcolor;
			}

		// modificam culoare bg td
		var tds = tr.getElementsByTagName('div');for (j=0;j<tds.length;j++)
				tds[j].parentNode.parentNode.style.background='#FEF1C1';

			// modificam culoare bg td sec
			if (document.getElementById(lidsec) != null)
				{
				var trsec=document.getElementById(lidsec);
				tds = trsec.getElementsByTagName('div');
				for (j=0;j<tds.length;j++)
					tds[j].parentNode.parentNode.style.background='#FEF1C1';
				}
		}
	// now the field rules
	
	InputRules2('beginning','0','0');
}
function IsFullDateEntered(c_id) {
if((document.getElementById('id123-control'+c_id+'-1') != null)&&(document.getElementById('id123-control'+c_id+'-2')!=null)&&(document.getElementById('id123-control'+c_id+'-3')!=null))
	{
	if  ((document.getElementById('id123-control'+c_id+'-1').value!='')&&(document.getElementById('id123-control'+c_id+'-2').value!='')&&(document.getElementById('id123-control'+c_id+'-3').value!=''))
		document.getElementById('id123-control'+c_id).value=document.getElementById('id123-control'+c_id+'-1').value+'/'+document.getElementById('id123-control'+c_id+'-2').value+'/'+document.getElementById('id123-control'+c_id+'-3').value;
	}
}
//-->
</script>

<form  class="form" onsubmit="RefreshFrameHeight(1); return checkSubmitAllowed();" action="http://www.123contactform.com/form-1382485/Footer-Signup-Form" id="mainform123" method="post" name="mainform123" enctype="multipart/form-data">

<input type="hidden" name="action" value="verify"/>
<input type="hidden" name="special_autoresponder" id="special_autoresponder" value=""/><input type="hidden" name="language" value="en"/>
<input type="hidden" name="languageChanged" value="no"/>

<div class="class123_maintable maintable_centered">

<script type='text/javascript'>
var  js_ctype_arr = new Array();
var  js_cobject_arr = new Array();
js_ctype_arr[12000369]=0;
js_cobject_arr[12000369]=0;
js_ctype_arr[12000383]=0;
js_cobject_arr[12000383]=0;

</script><!-- fieldcontainer -->


<label class="class123-label class123-fieldname class123-labelAligned fontbold  requiredfield " id="id123-title12000369" style="position: relative;display:none;" for="id123-control12000369" >Email Address</label>

<input type="hidden" id="errorflagrow1" value=""/>
<input id="id123-control12000369" name="control12000369"    onclick=" InputActions(this,'row1');" onkeyup=" InputActions(this,'row1');   " onchange="InputRules(12000369); ; " type="email" value="" placeholder="Email address"  />

<label class="class123-label class123-fieldname class123-labelAligned fontbold  requiredfield " id="id123-title12000383" style="position: relative;display:none;" for="id123-control12000383" >Zip</label>
<input type="hidden" id="errorflagrow2" value=""/>
<input id="id123-control12000383" name="control12000383"    onclick=" InputActions(this,'row2');" onkeyup=" InputActions(this,'row2');   " onchange="InputRules(12000383); ; " type="text" value="" placeholder="Zip" />


<script type="text/javascript"> var f_fixedamount='0';
	var nr_fields=2;
	this.nr_fields=nr_fields;
	this.form_is_quiz='';
	var calc_fields=0;
	</script>

<input type="hidden" name="go_back_and_edit" id="go_back_and_edit" value="0" />
<input OnClick="  this.style.display='none'; insertPleaseWaitDiv(this,'Please wait...');  " type="submit" class="formdefaultbut" id="id123-button-send"  value="Submit"/> 

<input type="hidden" name="PHPSESSID" value="d9m7131hfr55jijfesm5nipqc1"/>
<div style="height:1px; display: none; visibility: hidden;">
<input type="text" name="email"/>
</div>

		
		<input type="hidden" name="hiddenfields" id="hiddenfields" value=""/>
		<input type="hidden" name="hiddenfields_pages" id="hiddenfields_pages" value=""/>
		<input type="hidden" name="activepage" id="activepage" value="1"/>
		<input type="hidden" name="totalpages" id="totalpages" value="1"/>
		<input type="hidden" name="nextpagenr" id="nextpagenr" value="2"/>
		<input type="hidden" name="prevpagenr" id="prevpagenr" value="0"/>
		<script type="text/javascript">
		InputRules('firsttime')
		</script><input type="hidden" name="usage" value="e"/>
</form>
<script type="text/javascript">multiPageTotal=1;</script>