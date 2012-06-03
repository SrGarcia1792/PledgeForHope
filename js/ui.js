$(".blue").live("click",function(){
value_donation=$(this).attr("value");

if(value_donation=="other"){
$("#camp_donation").val("");
$("#camp_donation").focus();
}else{

$("#camp_donation").val(value_donation);
}
})

$("#submit_donation").live("click",function(){
var element = $(this);
id_project=$("#capaContent").attr("class");
value=$("#camp_donation").val();

//alert(id);
var info = "id_project="+id_project+"&value="+value;

 $.ajax({
   type: "POST",
   url: "donation.php",
   data: info,
   
   success: function(html){
   $("#popUpDiv").hide();
   $("#capaPopUp").hide();
   
   alert("Gracias por su aporte a la buena causa");
   }
 }); 
 });