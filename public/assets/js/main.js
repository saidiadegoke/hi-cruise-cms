$(document).ready(function(){

    var clickEvent = false;
    $('#myCarousel').carousel({
        interval:   10000	
    }).on('click', '.list-group li', function() {
            clickEvent = true;
            $('.list-group li').removeClass('active');
            $(this).addClass('active');		
    }).on('slid.bs.carousel', function(e) {
        if(!clickEvent) {
            var count = $('.list-group').children().length -1;
            var current = $('.list-group li.active');
            current.removeClass('active').next().addClass('active');
            var id = parseInt(current.data('slide-to'));
            if(count == id) {
                $('.list-group li').first().addClass('active');	
            }
        }
        clickEvent = false;
    });
    
    $('.bar-open').click(function(){
        $('.mbl-menu').addClass('shw-m-menu');
        $('.mbl-menu').removeClass('hide-m-menu');
        $('.bar-open').addClass('hide-bar');
        $('.bar-open').removeClass('show-bar');
        $('.bar-close').addClass('show-bar');
    })

    $('.bar-close').click(function(){
        $('.mbl-menu').addClass('hide-m-menu');
        $('.mbl-menu').removeClass('shw-m-menu');
        $('.bar-open').addClass('show-bar');
        $('.bar-close').removeClass('show-bar');
        $('.bar-close').addClass('hide-bar');
    })
    
    $('#close').click(function(){
        $('.mbl-menu').addClass('hide-m-menu');
        $('.mbl-menu').removeClass('shw-m-menu');
        $('.bar-open').addClass('show-bar');
        $('.bar-close').removeClass('show-bar');
        $('.bar-close').addClass('hide-bar');
    })
    
        
    var lastScrollTop = 0;
        $(window).scroll(function(event){
           var st = $(this).scrollTop();
          if(st == 0 || lastScrollTop == 0 || lastScrollTop <= 100) {
               $('#header').removeClass('fixed');      
                $('#header').removeClass('bg-white');      
                $('#header').removeClass('bg-shade');
                $('#header').addClass('header-animate');
                $('#header').addClass('slideDown');
                document.getElementById("scrl").style.display='none';
                document.getElementById("ini").style.display='block';
           } else {
                $('#header').addClass('fixed');
                $('#header').addClass('bg-white');
                $('#header').addClass('bg-shade');
                document.getElementById("ini").style.display='none';
                document.getElementById("scrl").style.display='block';
           }
           lastScrollTop = st;
        });   
    
    //$("th.prev").replaceWith('<i class="fa fa-arrow-left"></i>');
})

$(window).load(function() {
    var boxheight = $('#myCarousel .carousel-inner').innerHeight();
    var itemlength = $('#myCarousel .item').length;
    var triggerheight = Math.round(boxheight/itemlength+1);
    $('#myCarousel .list-group-item').outerHeight(triggerheight);
});

function shwLga() {
    var id = document.getElementById('cur_state').value;
    var getLga = new XMLHttpRequest();
    var url = "lib/lga.php";
    
    var vars = 'id='+id;
    getLga.open("POST", url, true);
    
    getLga.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    getLga.onreadystatechange = function(){
        
        if(getLga.readyState == 4 && getLga.status == 200){
            var returned_data = getLga.responseText;
            document.getElementById('local_govt').style.display="block";
            document.getElementById('local_govt').innerHTML = returned_data;
            document.getElementById("loader").innerHTML = "";
        }
        
    }
    getLga.send(vars);
    document.getElementById("loader").innerHTML = "<img src='img/loading-bar.gif' alt='loading'>";
}

function shwOfficeLga() {
    var id = document.getElementById('office_state').value;
    var getOLga = new XMLHttpRequest();
    var url = "lib/office_lga.php";
    
    var vars = 'id='+id;
    getOLga.open("POST", url, true);
    
    getOLga.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    getOLga.onreadystatechange = function(){
        
        if(getOLga.readyState == 4 && getOLga.status == 200){
            var returned_data = getOLga.responseText;
            document.getElementById('officeLga').style.display="block";
            document.getElementById('officeLga').innerHTML = returned_data;
            document.getElementById("loader").innerHTML = "";
        }
        
    }
    getOLga.send(vars);
    document.getElementById("loader").innerHTML = "<img src='img/loading-bar.gif' alt='loading'>";
}

function postData(url, refurl, vars, data_id){
    	
	var pData = new XMLHttpRequest();
	var url = url;
    var refurl = refurl;
    var vars = vars;
    var data_id = data_id;

	
	pData.open("POST", url, true);

	pData.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	pData.onreadystatechange = function(){

	if(pData.readyState == 4 && pData.status == 200){
		var returned_data = pData.responseText;
            if(returned_data == 1){
            document.getElementById("gNotify").innerHTML= "<div>Your Application was successful and is currently under review. Please check your email for more information..</div>";}else if(returned_data == 2){
               document.getElementById("gNotify").innerHTML= "<div>You already have an account with us, Please login to the client area..</div>"; 
            }
            document.getElementById("gNotify").style.display="block";
			document.getElementById("loader").innerHTML = " ";         
            if(returned_data.length > 0){//hide the form after filling it
              document.getElementById("applyForm").style.display="none";    
            }
        //check if their is a refresh url and do refresh, else do nothing
        if(refurl.length >= 1){
		var refLists = new XMLHttpRequest();
		var url = refurl;
        if(data_id){
            var ID = data_id;
        }else{
		var ID = 1;
		}
		var vareff = "ID="+ID;
		refLists.open("POST", url, true);
		
			  // Set content type header information for sending url encoded variables in the request
				refLists.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				// Access the onreadystatechange event for the XMLHttpRequest object
				refLists.onreadystatechange = function() {
					if(refLists.readyState == 4 && refLists.status == 200) {
						var reload_data = refLists.responseText;
                        //confirm("Please confirm your entry");
                        document.getElementById("loader").innerHTML = " ";
					}
				}
				// Send the data to PHP now... and wait for response to update the status div
				refLists.send(vareff); // Actually execute the request
	           document.getElementById("loader").innerHTML = "<img src='img/loading-bar.gif' alt='loading'>";
		}
    }
	}
	pData.send(vars);
    document.getElementById("loader").innerHTML = "<img src='img/loading-bar.gif' alt='loading'>";
}	
   
// JavaScript Document
//script for uploading images to gallery

			// common variables
			var iBytesUploaded = 0;
			var iBytesTotal = 0;
			var iPreviousBytesLoaded = 0;
			var iMaxFilesize = 1048576; // 1MB
			var oTimer = 0;
			var sResultFileSize = '';
			
			function secondsToTime(secs) { // we will use this function to convert seconds in normal time format
				var hr = Math.floor(secs / 3600);
				var min = Math.floor((secs - (hr * 3600))/60);
				var sec = Math.floor(secs - (hr * 3600) -  (min * 60));
			
				if (hr < 10) {hr = "0" + hr; }
				if (min < 10) {min = "0" + min;}
				if (sec < 10) {sec = "0" + sec;}
				if (hr) {hr = "00";}
				return hr + ':' + min + ':' + sec;
			};
			
			function bytesToSize(bytes) {
				var sizes = ['Bytes', 'KB', 'MB'];
				if (bytes == 0) return 'n/a';
				var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
				return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
			};


function uploadImg(){
    // cleanup all temp states
    iPreviousBytesLoaded = 0;
    document.getElementById('upload_response').style.display = 'none';
    document.getElementById('error').style.display = 'none';
    document.getElementById('error2').style.display = 'none';
    document.getElementById('abort').style.display = 'none';
    document.getElementById('warnsize').style.display = 'none';
    document.getElementById('progress_percent').innerHTML = '';
    var oProgress = document.getElementById('progress');
    oProgress.style.display = 'block';
    oProgress.style.width = '0px';

    // get form data for POSTing
    //var vFD = document.getElementById('upload_form').getFormData(); // for FF3
    var nBLOGFD = new FormData(document.getElementById('formApply')); 

    // create XMLHttpRequest object, adding few event listeners, and POSTing our data
    var imgUpld = new XMLHttpRequest();        
    imgUpld.upload.addEventListener('progress', uploadProgress, false);
    imgUpld.addEventListener('load', uploadFinish, false);
    imgUpld.addEventListener('error', uploadError, false);
    imgUpld.addEventListener('abort', uploadAbort, false);
    imgUpld.open('POST', 'lib/uploadFormImg.php');
    imgUpld.send(nBLOGFD);
}

function fileSelected() {

    // hide different warnings
    document.getElementById('upload_response').style.display = 'none';
    document.getElementById('error').style.display = 'none';
    document.getElementById('error2').style.display = 'none';
    document.getElementById('abort').style.display = 'none';
    document.getElementById('warnsize').style.display = 'none';

    // get selected file element
    var oFile = document.getElementById('passport').files[0];

    // filter for image files
    var rFilter = /^(image\/bmp|image\/gif|image\/jpeg|image\/png|image\/tiff)$/i;
    if (! rFilter.test(oFile.type)) {
        document.getElementById('error').style.display = 'block';
        return;
    }

    // little test for filesize
    if (oFile.size > iMaxFilesize) {
        document.getElementById('warnsize').style.display = 'block';
        return;
    }

    // get preview element
    var oImage = document.getElementById('preview');

    // prepare HTML5 FileReader
    var oReader = new FileReader();
        oReader.onload = function(e){

        // e.target.result contains the DataURL which we will use as a source of the image
        oImage.src = e.target.result;

        oImage.onload = function () { // binding onload event

            // we are going to display some custom image information here
            sResultFileSize = bytesToSize(oFile.size);
            document.getElementById('fileinfo').style.display = 'block';
            document.getElementById('filename').innerHTML = 'Name: ' + oFile.name;
            document.getElementById('filesize').innerHTML = 'Size: ' + sResultFileSize;
            document.getElementById('filetype').innerHTML = 'Type: ' + oFile.type;
            document.getElementById('filedim').innerHTML = 'Dimension: ' + oImage.naturalWidth + ' x ' + oImage.naturalHeight;
        };
    };

    // read selected file as DataURL
    oReader.readAsDataURL(oFile);
}

function doInnerUpdates() { // we will use this function to display upload speed
    var iCB = iBytesUploaded;
    var iDiff = iCB - iPreviousBytesLoaded;

    // if nothing new loaded - exit
    if (iDiff == 0)
        return;

    iPreviousBytesLoaded = iCB;
    iDiff = iDiff * 2;
    var iBytesRem = iBytesTotal - iPreviousBytesLoaded;
    var secondsRemaining = iBytesRem / iDiff;

    // update speed info
    var iSpeed = iDiff.toString() + 'B/s';
    if (iDiff > 1024 * 1024) {
        iSpeed = (Math.round(iDiff * 100/(1024*1024))/100).toString() + 'MB/s';
    } else if (iDiff > 1024) {
        iSpeed =  (Math.round(iDiff * 100/1024)/100).toString() + 'KB/s';
    }

    document.getElementById('speed').innerHTML = iSpeed;
    document.getElementById('remaining').innerHTML = '| ' + secondsToTime(secondsRemaining);   


}

function uploadProgress(e) { // upload process in progress
    if (e.lengthComputable) {
        iBytesUploaded = e.loaded;
        iBytesTotal = e.total;
        var iPercentComplete = Math.round(e.loaded * 100 / e.total);
        var iBytesTransfered = bytesToSize(iBytesUploaded);

        document.getElementById('progress_percent').innerHTML = iPercentComplete.toString() + '%';
        document.getElementById('progress').style.width = (iPercentComplete * 4).toString() + 'px';
        document.getElementById('b_transfered').innerHTML = iBytesTransfered;
        if (iPercentComplete == 100) {
            var oUploadResponse = document.getElementById('upload_response');
            oUploadResponse.innerHTML = '<h1>Please wait...processing</h1>';
            oUploadResponse.style.display = 'block';
        }
    } else {
        document.getElementById('progress').innerHTML = 'unable to compute';
    }
}

function uploadFinish(e) { // upload successfully finished
    var oUploadResponse = document.getElementById('upload_response');
    oUploadResponse.innerHTML = e.target.responseText;
    oUploadResponse.style.display = 'block';

    document.getElementById('progress_percent').innerHTML = '100%';
    document.getElementById('progress').style.width = '400px';
    document.getElementById('filesize').innerHTML = sResultFileSize;
    document.getElementById('remaining').innerHTML = '| 00:00:00';

    clearInterval(oTimer);

}

function uploadError(e) { // upload error
    document.getElementById('error2').style.display = 'block';
    clearInterval(oTimer);
}  

function uploadAbort(e) { // upload abort
    document.getElementById('abort').style.display = 'block';
    clearInterval(oTimer);
}        


function calLoan(){
    
    var amt = document.getElementById('amt').value;
    //amt = parseFloat(amt.replace(/,/g, ''));
    var duration = document.getElementById('duration').value; 
    var int; 
    var paidInt; 
    var p;
    var r1;
    var monthlyPay;
    
    if(amt.length > 0){
        if(amt <= 499999){
            int = 7;
        }else if(amt >= 500000 && amt <= 999999){
            int = 6.5;     
        }else if(amt >= 1000000){
            int = 5;        
        }
        
        var i = int/100;
        r1 = 1 + i;
        p = -((i/(1 - Math.pow(r1, duration))) * amt);
        paidInt = amt * i;
        
    if(duration.length > 0){
        document.getElementById("monthP").style.display="block";
        monthlyPay = p + paidInt;
        monthlyPay = parseFloat(monthlyPay).toFixed(2);
        document.getElementById("monthlyPay").innerHTML = "N "+monthlyPay;
       }     
    }
   
}

function loanFrm(){
    document.getElementById("applyForm").style.display="block";
}

function clsFrm(){
    document.getElementById("applyForm").style.display="none";
}


function validate1(){
     
     var loan_type = document.getElementById("loan").value;
     var valid;


      if (loan_type.length > 0) {
          valid = 1;
      }else{
          valid = 0;
      }


     if(valid == 0){
          document.getElementById("val1").style.display="block";
         document.getElementById("val1").focus();
         return;
     }else{
         document.getElementById("val1").style.display="none";
         nextForm();
     }
 }

function validate2(){
     
     var photo = document.getElementById("passport").value;
     var valid;

          if (photo.length > 0) {
              valid = 1;
          }else{
              valid = 0;
          }


     if(valid == 0){
          document.getElementById("val2").style.display="block";
         document.getElementById("val2").focus();
         return;
     }else{
         document.getElementById("val2").style.display="none";
         nextForm();
         document.getElementById("fname").focus();
     }
 }

function validate3(){
     
     var fname = document.getElementById("fname").value;
     var lname = document.getElementById("lname").value;
     var gender = document.getElementById("gender").value;
     var m_status = document.getElementById("m_status").value;
     var dob = document.getElementById("dob").value;
     var edu = document.getElementById("edu").value;
     var state = document.getElementById("state_origin").value;
     var p_identity = document.getElementById("p_identity").value;
     var id_no = document.getElementById("id_no").value;
     
     var entries = [fname, lname, gender, m_status, dob, edu, state, p_identity]; 
     var valid;

     for (var i = 0, len = entries.length; i < len; i++) {
          if (entries[i].length == 0) {
              valid = 0;
              break;
          }else{
              valid = 1;
          }
     }

     if(valid == 0){
          document.getElementById("val3").style.display="block";
         document.getElementById("val3").focus();
         return;
     }else{
         document.getElementById("val3").style.display="none";
         nextForm();
         document.getElementById("mobile").focus();
     }
 }

function validate4(){
     
     var mobile = document.getElementById("mobile").value;
     var mail = document.getElementById("mail").value;
     var address = document.getElementById("address").value;
     var cur_state = document.getElementById("cur_state").value;
     var lga = document.getElementById("lga").value;
     var ref = document.getElementById("ref").value;
     var ref_phn = document.getElementById("ref_phn").value;
     
     var entries = [mobile, mail, address, cur_state, lga, ref, ref_phn]; 
     var valid;

     for (var i = 0, len = entries.length; i < len; i++) {
          if (entries[i].length == 0) {
              valid = 0;
              break;
          }else{
              valid = 1;
          }
     }

     if(valid == 0){
          document.getElementById("val4").style.display="block";
          document.getElementById("val4").focus();
         return;
     }else{
         document.getElementById("val4").style.display="none";
         nextForm();
         document.getElementById("employ_status").focus();
     }
 }

function validate5(){
     
     var employ_status = document.getElementById("employ_status").value;
     var occupation = document.getElementById("occupation").value;
     
     var entries = [employ_status, occupation]; 
     var valid;

     for (var i = 0, len = entries.length; i < len; i++) {
          if (entries[i].length == 0) {
              valid = 0;
              break;
          }else{
              valid = 1;
          }
     }

     if(valid == 0){
          document.getElementById("val5").style.display="block";
         document.getElementById("val5").focus();
         return;
     }else{
         document.getElementById("val5").style.display="none";
         nextForm();
         document.getElementById("net_income").focus();
     }
 }

function validate6(){
     
     var net_income = document.getElementById("net_income").value;
     var tax_id = document.getElementById("tax_id").value;
     
     var entries = [net_income, occupation]; 
     var valid;

     for (var i = 0, len = entries.length; i < len; i++) {
          if (entries[i].length == 0) {
              valid = 0;
              break;
          }else{
              valid = 1;
          }
     }

     if(valid == 0){
          document.getElementById("val6").style.display="block";
         document.getElementById("val6").focus();
         return;
     }else{
         document.getElementById("val6").style.display="none";
         nextForm();
         document.getElementById("loan_amt").focus();
     }
 }

function validate7(){
     
     var loan_amt = document.getElementById("loan_amt").value;
     var tenor = document.getElementById("tenor").value;
     var loan_purpose = document.getElementById("loan_purpose").value;
     var repay = document.getElementById("repay").value;
     
     var entries = [loan_amt, tenor, loan_purpose, repay]; 
     var valid;
    
    
     for (var i = 0, len = entries.length; i < len; i++) {
          if (entries[i].length == 0) {
              valid = 0;
              break;
          }else{       
                valid = 1;
          }
     }
        if(loan_amt < 100000 || loan_amt > 3000000 ){
            var validL = 0;
        }           
        if(tenor < 1 || tenor > 12){
            var validT = 0;
        }
    
     if(valid == 0 || validL == 0 || validT == 0){
          document.getElementById("val7").style.display="block";
          document.getElementById("val7").focus();
         return;
     }else{
         document.getElementById("val7").style.display="none";
         nextForm();
         document.getElementById("bvn").focus();
     }
 }

function validate8(){
     
     var bvn = document.getElementById("bvn").value;
     var acct_no = document.getElementById("acct_no").value;
     var acct_name = document.getElementById("acct_name").value;
     var acct_type = document.getElementById("acct_type").value;
     var bank_name = document.getElementById("bank_name").value;
     
     var entries = [bvn, acct_no, acct_name, acct_type, bank_name]; 
     var valid;

     for (var i = 0, len = entries.length; i < len; i++) {
          if (entries[i].length == 0) {
              valid = 0;
              break;
          }else{
              valid = 1;
          }
     }
    if(entries[0].length !== 11 ){
        document.getElementById("val8a").style.display="block";
        document.getElementById("val8a").focus();
         return;
    }
    if(entries[1].length !== 10){
        document.getElementById("val8b").style.display="block";
        document.getElementById("val8b").focus();
         return;
    }
     if(valid == 0){
         document.getElementById("val8").style.display="block";
         document.getElementById("val8").focus();
         return;
     }else{
         document.getElementById("val8").style.display="none";
         nextForm();
         document.getElementById("nok_name").focus();
     }
 }

function validate9(){
     
     var nok_name = document.getElementById("nok_name").value;
     var rel_nok = document.getElementById("rel_nok").value;
     var add_nok = document.getElementById("add_nok").value;
     var nok_tel = document.getElementById("nok_tel").value;
     
     var entries = [nok_name, rel_nok, add_nok, nok_tel]; 
     var valid;

     for (var i = 0, len = entries.length; i < len; i++) {
          if (entries[i].length == 0) {
              valid = 0;
              break;
          }else{
              valid = 1;
          }
     }

     if(valid == 0){
          document.getElementById("val9").style.display="block";
         document.getElementById("val9").focus();
         return;
     }else{
         document.getElementById("val9").style.display="none";
         nextForm();
         document.getElementById("loan").focus();
     }
 }

function validate10(){
     
     var agree = document.getElementById("agree");
     var valid;

      if (agree.checked) {
          valid = 1;
      }else{
          valid = 0;
      }

     if(valid == 0){
          document.getElementById("val10").style.display="block";
         document.getElementById("val10").focus();
         return;
     }else{
    //process all the form entrie

     var url = "lib/saveApply.php";				
     var url2 = "";
		
     var loan_type =  document.getElementById("loan").value;
     var fname = document.getElementById("fname").value;
     var lname = document.getElementById("lname").value;
     var gender = document.getElementById("gender").value;
     var m_status = document.getElementById("m_status").value;
     var dob = document.getElementById("dob").value;
     var edu = document.getElementById("edu").value;
     var state_origin = document.getElementById("state_origin").value;
     var p_identity = document.getElementById("p_identity").value;
     var id_no = document.getElementById("id_no").value;
     var mobile = document.getElementById("mobile").value;
     var mail = document.getElementById("mail").value;
     var address = document.getElementById("address").value;
     var cur_state = document.getElementById("cur_state").value;
     var lga = document.getElementById("lga").value;
     var ref = document.getElementById("ref").value;
     var ref_phn = document.getElementById("ref_phn").value;
     var sp_phn = document.getElementById("sp_phn").value;
     var depend = document.getElementById("depend").value;
     var employ_status = document.getElementById("employ_status").value;
     var occupation = document.getElementById("occupation").value;
     var position = document.getElementById("position").value;
     var dept = document.getElementById("dept").value;
     var employ_name = document.getElementById("employ_name").value;
     var office_add = document.getElementById("office_add").value;
     var office_email = document.getElementById("office_email").value;
     var office_state = document.getElementById("office_state").value;
     var office_lga = document.getElementById("office_lga").value;
     var net_income = document.getElementById("net_income").value;
     var income_source = document.getElementById("income_source").value;
     var o_earn = document.getElementById("o_earn").value;
     var stf_id = document.getElementById("stf_id").value;
     var tax_id = document.getElementById("tax_id").value;
     var loan_amt = document.getElementById("loan_amt").value;
     var tenor = document.getElementById("tenor").value;
     var loan_purpose = document.getElementById("loan_purpose").value;
     var repay = document.getElementById("repay").value;
     var bvn = document.getElementById("bvn").value;
     var acct_no = document.getElementById("acct_no").value;
     var acct_name = document.getElementById("acct_name").value;
     var acct_type = document.getElementById("acct_type").value;
     var bank_name = document.getElementById("bank_name").value;
     var nok_name = document.getElementById("nok_name").value;
     var nok_email = document.getElementById("nok_email").value;
     var nok_employer = document.getElementById("nok_employer").value;
     var rel_nok = document.getElementById("rel_nok").value;
     var add_nok = document.getElementById("add_nok").value;
     var nok_tel = document.getElementById("nok_tel").value;
     var agree = document.getElementById("agree").value;
var vars = "loan_type="+loan_type+"&fname="+fname+"&lname="+lname+"&gender="+gender+"&m_status="+m_status+"&dob="+dob+"&edu="+edu+"&state_origin="+state_origin+"&p_identity="+p_identity+"&id_no="+id_no+"&mobile="+mobile+"&mail="+mail+"&address="+address+"&cur_state="+cur_state+"&lga="+lga+"&ref="+ref+"&ref_phn="+ref_phn+"&sp_phn="+sp_phn+"&depend="+depend+"&employ_status="+employ_status+"&occupation="+occupation+"&position="+position+"&dept="+dept+"&employ_name="+employ_name+"&office_add="+office_add+"&office_email="+office_email+"&office_state="+office_state+"&office_lga="+office_lga+"&net_income="+net_income+"&income_source="+income_source+"&o_earn="+o_earn+"&stf_id="+stf_id+"&tax_id="+tax_id+"&loan_amt="+loan_amt+"&tenor="+tenor+"&loan_purpose="+loan_purpose+"&repay="+repay+"&bvn="+bvn+"&acct_no="+acct_no+"&acct_name="+acct_name+"&acct_type="+acct_type+"&bank_name="+bank_name+"&nok_name="+nok_name+"&nok_email="+nok_email+"&nok_employer="+nok_employer+"&rel_nok="+rel_nok+"&add_nok="+add_nok+"&nok_tel="+nok_tel+"&agree="+agree;
     postData(url, url2, vars);	  
     uploadImg();   
 
     }
 }

var slideIndex = 1;
function nextForm() {
    

    var i;
    var slides = document.getElementsByClassName("sect-form");
    for (i = 0; i < slides.length; i++) {
        slides[i].classList.remove("current");
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1} 
    slides[slideIndex-1].className += " current upDown";
}

function backForm() {
    
    var i;
    var slides = document.getElementsByClassName("sect-form");
    for (i = 0; i < slides.length; i++) {
        slides[i].classList.remove("current");
    }
    slideIndex--;
    if (slideIndex > slides.length) {slideIndex = 1} 
    slides[slideIndex-1].className += " current";
}


function validateInput(){
        var loanAmt = document.getElementById("loan_amt").value;
        var tenor = document.getElementById("tenor").value;
        var bvn = document.getElementById("bvn").value;
        var acct_no = document.getElementById("acct_no").value;
    
        if((loanAmt.length > 0) && (loanAmt < 100000 || loanAmt > 3000000)){
            document.getElementById("val7a").style.display="block";
        }else{
            document.getElementById("val7a").style.display="none";
        }        
        if((tenor.length > 0) && (tenor < 1 || tenor > 12)){
            document.getElementById("val7b").style.display="block";
        }else{
            document.getElementById("val7b").style.display="none";
        }
        if(bvn.length > 0 && bvn.length !== 11 ){
            document.getElementById("val8a").style.display="block";
        }else{
            document.getElementById("val8a").style.display="none";
        }
        if(acct_no.length > 0 && acct_no.length !== 10){
            document.getElementById("val8b").style.display="block";
        }else{
            document.getElementById("val8b").style.display="none";
        }
}

function clsGNotify(){
    document.getElementById("gNotify").style.display="none";
    document.getElementById("gNotify").innerHTML="";
}