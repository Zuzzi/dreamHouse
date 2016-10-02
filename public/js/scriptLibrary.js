
function catalogHouses() {
    
    $(document).ready(function() {


        $(".medium").hover(function () {
			
			$(this).css("background", "#c0392b");

			
			},function() {
				$(this).css("background", "");
			
			});    
   
        });     
  

 

}



function faq() {
    
    $(document).ready(function() {
    
        $(".question").on("click",function() {
			
			var id = $(this).attr("id");
			
			if ($("#" + id + ".answer").css("display") == "none")
			    $("#" + id + ".answer").css("display","block");
			    
			else if ($("#" + id + ".answer").css("display") == "block")
			    $("#" + id + ".answer").css("display","none");    
					
			
			});
   
        });   
  }
  
  
  
  
  
  
  
  
function myHouses() {
    
    $(document).ready(function() {


        $(".dataImg").hover(function () {
			
			$(this).css("background", "#c0392b");

			
			},function() {
				$(this).css("background", "");
			
			});    
   
        });     
  

 

}

  
