$(document).ready(function(){
	$(document).on("click","p",function(e){
		var p_text=$(this).text();
		var tr_value=$(this).closest("tr").text();
		var tr_value_split=tr_value.split(" ");
		var name=tr_value_split[0].trim();
		//alert(p_text);
		
		if( p_text == 'Delete')
		{ 
			var value="Delete " + name + " profile";
			var confirm_view=confirm(value);
			if(!confirm_view)
			{
				e.preventDefault();
			}	
		}
	});
	//console.log("kkkk");
	//Email validation

	/*$("#email").on("blur",function(){
		var email=$(this).val();
		if(email=="")
		{
			$("#email_error").addClass("fa fa-remove");
			$("#email_error").css("color","red");
			$("#email_error").text(" can not get out empty");
		}
	});

	$("#email").on("input",function(){
		var email_valid = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var email=$(this).val();
		if(email =="" || !email.match(email_valid))
		{
			$("#email_error").addClass("fa fa-remove");
			$("#email_error").css("color","red");
			$("#email_error").text(" Please enter a valid email");
		}
		else
		{
			$("#email_error").removeClass("fa fa-remove");
			$("#email_error").addClass("fa fa-check");
			$("#email_error").css("color","green");
			$("#email_error").text("");
		}
	});
     //console.log("kkkk");
	//PASSWORD VALIDATION.................

 	var password_len=0;
	var check_len_change=0;
	var password_change="";
	var password_change_len=0;
	var lower_check=false;
	var upper_check=false;
	var number_check=false;
	var bar_width=0;
	var last_index=0;
	var lower_count=0;
	var upper_count=0;
	var number_count=0;
	$("#pwd1").on("blur",function(){
		var password=$("#pwd1").val();
		if(password=="")
		{
			$("#password_error").addClass("fa fa-remove");
			$("#password_error").css("color","red");
			$("#password_error").text(" can not get out empty");
		}
	});
		//console.log("kkkk");
	$("#pwd1").on("input",function(){
		var password=$("#pwd1").val();
		var lower_case=/^[a-z]$/;
		var upper_case=/^[A-Z]$/;
		var number=/^[0-9]$/;
		password_len=password.length;
		//console.log(password);
	    if(password_len>check_len_change)
		{
			$("#progress_div").show();
			//console.log(check_len_change);
			 last_index =password_len-1;
			if(password[last_index].match(lower_case))
			{
				if(lower_check == false )
				{
					bar_width +=12;
					lower_check=true;
				}
				lower_count++;
			}
		    if(password[last_index].match(upper_case))
			{
				if(upper_check == false)
				{
					bar_width += 12;
					upper_check=true;	
				}
				upper_count++;
			}
		   if(password[last_index].match(number))
			{
				if(number_check == false)
				{
					bar_width += 12;
					number_check=true;
				}
				number_count++;
			}
			if(password_len<= 8)
			{
				bar_width+=8;
			}
			$("#progress_bar").css("width",""+bar_width+"%");
			//console.log(bar_width);
		}
		if(password_len<check_len_change)
		{
			//var len_different=check_len_change-password_len;
			password_change_len=password_change.length;
			last_index=password_change_len-1;
			for(i=last_index;password_len-1<i;i--)
			{
				if(password_len>=0)
			    {
				  
				  if(password_change[i].match(lower_case))
				  {
				  	lower_count--;
				  	if(lower_count==0)
				  	{
				  		bar_width-=12;
				  		lower_check=false;
				  	}
				  }
				  if(password_change[i].match(upper_case))
				  {
				  	upper_count--;
				  	if(upper_count==0)
				  	{
				  		bar_width-=12;
				  		upper_check=false;
				  	}
				  }

				  if(password_change[i].match(number))
				  {
				  	number_count--;
				  	if(number_count==0)
				  	{
				  		bar_width-=12;
				  		number_check=false;
				  	}
				  }
				  if(password_change_len>=0 && password_change_len<=8)
				  {
				  	bar_width-=8;
				  }
				console.log(bar_width);
			    }
			}
		    $("#progress_bar").css("width",""+bar_width+"%");
		}
		if(bar_width>0 && bar_width<=100)
		{
            $("#password_error").addClass("fa fa-remove");
			$("#password_error").css("color","red");
			$("#password_error").text(" Enter 8 char combined of upper_case, lower_case and number");
		}
		if(bar_width==100)
		{
			$("#password_error").removeClass("fa fa-remove");
			$("#password_error").addClass("fa fa-check");
			$("#password_error").css("color","green");
			$("#password_error").text("");
		}
		password_change=password;
		check_len_change=password_len;
	});*/
//console.log("kkkk");

	//RE-TYPE PASSWORD VALIDATION......
	$("#pwd2").on("input",function(){
		$("#re_password_error").removeClass("fa fa-remove");
		$("#re_password_error").text("");
	});
	$("#pwd2").on("blur",function(){
		var password=$("#pwd1").val();
		var re_password=$("#pwd2").val();
	   if(password!=re_password)
		{
			$("#re_password_error").addClass("fa fa-remove");
			$("#re_password_error").css("color","red");
			$("#re_password_error").text(" Password is not same");
		}
		else
		{
			$("#re_password_error").removeClass("fa fa-remove");
			$("#re_password_error").text("");
		}
	});
	
	////upload image
	
		//task when edit click
		$("#edit").on("click", function(){
		$("#input_pic").click();
		});
		var image_name="";
		//task when input pic change......
		$("#input_pic").on("change",function(){
			 var file = this.files[0];
             image_name = file.name;
			$("#image_submit").click();
			$("#progress_bar_show").click();
			
		});


		//image progress bar......
		$("#input_image").ajaxForm({
			beforeSend:function(){
			},
			uploadProgress:function(event,position,total,percentComplete){
				$(".progress-bar").width(percentComplete +"%");
			},
			success:function(){},
			complete:function(){
				$("#progress_close").click();
				$("#image_show").click();
				$("#modal_img").attr("src","user_images/"+image_name+"");
			}
		});

	//image crop.........
	    //image draggable function'''''
		var check_flag=0;
		$("#skip_button").on("click",function(){
			var text=$(this).text();
			if(text=="Skip cropping")
			{
				check_flag=1;
				$("#crop_div").hide();
				$("#image_crop_div").hide();
				$(this).text("Crop image");
			}
			if( text=="Crop image")
			{
				$("#crop_div").show();
				$(this).text("Skip cropping");
			}
		});
		//when click crop div........
		$("#crop_div").on("click",function(){
			check_flag=0;
			$("#crop_div").hide();
			$("#image_crop_div").show();
		});
		//image crop div resizable........
		$("#image_crop_div").resizable({containment:"parent"});
		//image crop div dragggable.........
		$("#image_crop_div").draggable({containment:"parent"});
		//when save button click.........
		$("#save_button").on("click", function(){
			var skip_check=$("#skip_button").text();
			alert(image_name);
			if(check_flag==0)
			{
				var image_top=parseInt($("#modal_img").position().top);
				var image_left=parseInt($("#modal_img").position().left);
				var image_crop_div_top=parseInt($("#image_crop_div").position().top);
				var image_crop_div_left=parseInt($("#image_crop_div").position().left);
				var crop_div_width=parseInt($("#image_crop_div").width());
				var crop_div_height=parseInt($("#image_crop_div").height());
				var crop_start_x=image_crop_div_left-image_left;
				var crop_start_y=image_crop_div_top-image_top;
				//console.log(image_left+" "+$("#image_full_div").position().left);
				$.post('image_crop.php',{crop_start_x:crop_start_x,crop_start_y:crop_start_y,
				crop_div_height:crop_div_height,crop_div_width:crop_div_width,image_name:image_name},function(){ 
					$.post("update_profile_pic.php",{image_name:image_name},function(){
						
					});
				});
				//alert(image_name);
				location.reload();
			}
			if(check_flag == 1)
			{
				$.post("update_profile_pic.php",{image_name:image_name},function(){});
				location.reload();
				//alert(image_name);
			}	
		});
			
		//cover image begin...........
		$("#update_cover_photo").on("click",function(){
			$("#input_cover_pic").click();
		});
		var cover_image_name="";
		$("#input_cover_pic").on("change",function(){
			$("#cover_image_submit").click();
			var file = this.files[0];
             cover_image_name = file.name;
			 //alert(cover_image_name);
		});
		console.log("xdddddddd");
		$("#input_cover_image").ajaxForm({
			beforeSend:function(){
			},
			uploadProgress:function(){	
			},
			success:function(){},
			complete:function(){
				$("#edit_coverPic").attr("src","user_images/"+cover_image_name+"");
				$(".inner_cover_section").hide();
				$(".edit_proPic").hide();
				$("#image_propic").addClass("image_propic");
				$(".edit_innerProfilePic_section").hide();
				$(".edit_innerCoverPic_section").hide();
				$(".edit_innerCoverPic_footer_section").show();
			}
		});
		$("#cover_img_save").on("click",function(){
			$.post("update_cover_pic.php",{image_name:cover_image_name},function(){});
			//alert(cover_image_name);
			location.reload();
		});
		$("#cover_img_cancel").on("click",function(){
			location.reload();
		});
});