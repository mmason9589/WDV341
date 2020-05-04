	
	var script = document.createElement('script');
	script.src = 'https://code.jquery.com/jquery-3.4.1.min.js';
	script.type = 'text/javascript';
	document.getElementsByTagName('head')[0].appendChild(script);


	function showRecipe(inVal) {
		
		//alert(inVal);
		var xmlhttp=new XMLHttpRequest();

		xmlhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
				document.querySelector("#recInstruct").innerHTML=this.responseText;
				
				//keep track of original serving sizes and store them in array
				//used for the changing serving sizes
				var x = 0;
				var serveArray = [];
				var serveTotal = "";
				
				serveTotal = $('#recipeTotalServe').text();
			
				while(x<=3){
					serveArray.push($('.serveSize' + x).text());
					x++;
				}
				
				location.href = "#recInstruct";
			}
		}
		
		xmlhttp.open("GET","json.php?q="+inVal,true);
		xmlhttp.send();
		
		
		}



	
	var serveArray = [];
	
	$(document).ready(function(){
		$('#recInstruct').on('click', '#togIngred', function() {
			//alert("works");
			$('.ingredTog').toggle();
			
			
			
		});
	});
	
	
	$(document).ready(function(){
		$('#recInstruct').on('click', '#togInstruct', function() {
			//alert("works");
			$('.instructTog').toggle();
		});
	});
	
	

	
	$(document).ready(function(){
		
		
			$('#recInstruct').on('change', '#serveHalf', function() {
				var x = 0;
				var newServeTotal = serveTotal / 2;
				
				$('#recipeTotalServe').html(newServeTotal);
				
					while(x<=15){
						var size = serveArray[x]
						var newSize = size / 2;
						$('.serveSize' + x).html(newSize);
						x++;
					}
				
					
					
					
			
			});					 
	});
	
	
	$(document).ready(function(){
		
		
			$('#recInstruct').on('change', '#serveDouble', function() {
				var x = 0;
				var newServeTotal = serveTotal * 2;
				
				$('#recipeTotalServe').html(newServeTotal);
				
					while(x<=15){
						var size = serveArray[x]
						var newSize = size * 2;
						$('.serveSize' + x).html(newSize);
						x++;
					}
				
			});					 
	});
	
	
	$(document).ready(function(){
		
		
			$('#recInstruct').on('change', '#serveNormal', function() {
				var x = 0;
				
				$('#recipeTotalServe').html(serveTotal);
				
					while(x<=15){
						var size = serveArray[x];
						$('.serveSize' + x).html(size);
						x++;
					}
				
			});					 
	});
	

	
	