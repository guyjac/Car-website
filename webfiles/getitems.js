				$(document).ready(function(){
					$("input[type='button']").click(function(){
						if ($('input[name=colours]:checked').length > 0){
							var colour ="<b>Color:</b> " + $("input[name='colours']:checked").val();
						}
						if ($('input[name=engine]:checked').length > 0){
							var engine ="<b>Engine:</b> " + $("input[name='engine']:checked").val();
						}
						if ($('input[name=wheels]:checked').length > 0){
							var wheels = "<b>Wheels:</b> " + $("input[name='wheels']:checked").val();
						}
						if ($('input[name=trim]:checked').length > 0){
							var trim = "<b>Trim</b> " + $("input[name='trim']:checked").val();
						}
						if ($('input[name=interior]:checked').length > 0){
							var inter = "<b>Interior</b> " + $("input[name='interior']:checked").val();
						}
						if ($('input[name=sensor]:checked').length > 0){
							var park = "<b>Parkin Sensor:</b> " + $("input[name='sensor']:checked").val();
						}
						
						if(colour && engine && wheels && trim && inter && park){
						
							document.getElementById("choices").innerHTML = colour + "</br>";;
							document.getElementById("choices").innerHTML += engine + "</br>";
							document.getElementById("choices").innerHTML += wheels + "</br>";
							document.getElementById("choices").innerHTML += trim + "</br>";
							document.getElementById("choices").innerHTML += inter + "</br>";
							document.getElementById("choices").innerHTML += park;
						}
						else{
							alert("Please make a valid choice");
						}
							
					
					
					});
});