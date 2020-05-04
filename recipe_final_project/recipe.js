
		//CHILI	INGREDIENTS/PREPARATION
		let chiliIngred = "<ul><li>2 tbsp. cooking oil </li><li>1 cup onion </li><li>1 cup chopped peppers </li><li>4 tbsp. Chili powder </li><li>1 tsp. Hot chili powder (optional) </li><li>1 lb ground beef or chicken </li><li>2 cans Red Beans </li><li>2 cans Kidney Beans </li><li>2 cans Tomato Puree </li><li>2 cans Tomato Sauce </li><li>1 cup shredded cheese (optional) </li><li>1/2 cup sour cream (optional)</li></ul>";

		let chiliIngredHalf = "<ul><li>1 tbsp. cooking oil </li><li>1/2 cup onion </li><li>1/2 cup chopped peppers </li><li>2 tbsp. Chili powder </li><li>1/2 tsp. Hot chili powder (optional) </li><li>1/2 lb ground beef or chicken </li><li>1 cans Red Beans </li><li>1 cans Kidney Beans </li><li>1 cans Tomato Puree </li><li>1 cans Tomato Sauce </li><li>1/2 cup shredded cheese (optional) </li><li>1/4 cup sour cream (optional)</li></ul>";

		let chiliIngredDouble = "<ul><li>4 tbsp. cooking oil </li><li>2 cup onion </li><li>2 cup chopped peppers </li><li>6 tbsp. Chili powder </li><li>2 tsp. Hot chili powder (optional) </li><li>2 lb ground beef or chicken </li><li>4 cans Red Beans </li><li>4 cans Kidney Beans </li><li>4 cans Tomato Puree </li><li>4 cans Tomato Sauce </li><li>2 cup shredded cheese (optional) </li><li>1 cup sour cream (optional)</li></ul>";

		let chiliPrep = "<ol><li>Heat cooking oil in 2 quart skillet. </li><li>Saute onions and peppers for 5 minutes. </li><li>Add spices and stir for 30 seconds. </li><li>Add meat and cook until browned. Approximately 15 minutes. </li><li>Pour contents of skillet into 3 quart crock pot. </li><li>Rinse beans and place in crockpot. </li><li>Open and pour Tomato puree and sauce into crock pot. </li><li>Cover crockpot and cook on low for 6 hours. </li><li>Serve into individual bowls and top with sour cream and cheese.</li></ol>"
	
	
	
	
		//MEATLOAF INGREDIENTS/PREPARATION
		let meatIngred = "<ul><li>1 lb ground beef</li> <li>1 egg beaten</li> <li>2 tbsp ranch seasoning</li> <li>1/2 cup dry crumbs</ul>";
	
		let meatIngredHalf = "<ul><li>1/2 lb ground beef</li> <li>1/2 egg beaten</li> <li>1 tbsp ranch seasoning</li> <li>1/4 cup dry crumbs</ul>";

		let meatIngredDouble = "<ul><li>2 lb ground beef</li> <li>2 egg beaten</li> <li>4 tbsp ranch seasoning</li> <li>1 cup dry crumbs</ul>";

		let meatPrep = "<ol><li>Preheat oven to 350&degF.</li> <li>Mix all ingredients together in a bowl, but avoid excessive handling for a moist meatloaf. Form into a loaf and place in a baking dish or loaf pan.</li> <li>Bake for 40–45 minutes or until the internal temperature reaches 165&degF.</li> <li>Remove from oven and let the meatloaf stand covered for 10–15 minutes before slicing.</li></ol>"
		
		
		
		
		//Carrot Soup INGREDIENTS/PREPARTION
		let carrotIngred = "<ul><li>1 lb. carrots, peeled and chopped</li> <li>2 turnips, peeled and chopped</li> <li>2 sweet potatoes, peeled and chopped</li> <li>1 onion, sliced</li> <li>4 garlic cloves, minced</li> <li>2 bay leaves</li> <li>1/4 tsp. dried thyme</li> <li>4 cups chicken stock</li> <li>2 tbsp. fresh chives, minced</li> <li>2 tbsp. clarified butter or coconut oil</li> <li>Sea salt and freshly ground pepper to taste</li></ul>"
	
		let carrotIngredHalf = "<ul><li>1/2 lb. carrots, peeled and chopped</li> <li>1 turnips, peeled and chopped</li> <li>1 sweet potatoes, peeled and chopped</li> <li>1/2 onion, sliced</li> <li>2 garlic cloves, minced</li> <li>1 bay leaves</li> <li>1/8 tsp. dried thyme</li> <li>2 cups chicken stock</li> <li>1 tbsp. fresh chives, minced</li> <li>1 tbsp. clarified butter or coconut oil</li> <li>Sea salt and freshly ground pepper to taste</li></ul>"

		let carrotIngredDouble = "<ul><li>2 lb. carrots, peeled and chopped</li> <li>4 turnips, peeled and chopped</li> <li>4 sweet potatoes, peeled and chopped</li> <li>2 onion, sliced</li> <li>8 garlic cloves, minced</li> <li>4 bay leaves</li> <li>1/2 tsp. dried thyme</li> <li>8 cups chicken stock</li> <li>4 tbsp. fresh chives, minced</li> <li>4 tbsp. clarified butter or coconut oil</li> <li>Sea salt and freshly ground pepper to taste</li></ul>"

		let carrotPrep = "<ol><li>In a big saucepan placed over a medium heat, cook the onion and garlic 5 minutes (or until softened) with the clarified butter.</li> <li>Add the carrots, sweet potato, turnip, thyme, bay leaves, chicken stock, and season with salt and pepper to taste. Bring everything to a boil; then reduce the heat to medium, cover, and let it simmer for 45 minutes (or until all the vegetables are soft).</li> <li>Discard the bay leaves (they have sharp edges that can cut the inside of your mouth).</li> <li>Puree the soup in a food processor until smooth.</li> <li>When you’re ready to enjoy the soup, return the puree to the saucepan and let it simmer for 5 minutes. Adjust the seasoning if necessary.</li> <li>Garnish with fresh chives and serve.</li></ol>"
		
		
		
	//-----------------------------------------------------------------------------------------------------------------	
	//recipe object	
		
	
	let recipes = {crockpotChili:
				   			{heading:  
							{
								recipeName: "Crockpot Chili",
								recipeImage: "<img src='images/chili.jpg' height=\"300\">",
								numServings: "6",
								recipeTime: "25 minutes",
								difficulty: "Easy",
							},
							 ingredients: 
							 {
								 originalChili: chiliIngred,
								 doubleChili: chiliIngredDouble,
								 halfChili: chiliIngredHalf,
							 },
							 preparation: chiliPrep,
							},
					ranchMeatloaf: 
							{heading:  
							{
								recipeName: "Ranch Meatloaf",
								recipeImage: "<img src='images/meatLoaf.jpg' height=\"300\">",
								numServings: "6",
								recipeTime: "45 minutes",
								difficulty: "Medium",
							},
							 ingredients: 
							 {
								 originalMeat: meatIngred,
								 doubleMeat: meatIngredDouble,
								 halfMeat: meatIngredHalf,
							 },
							 preparation: meatPrep,
							},
				   carrotSoup:
				   			{heading:  
							{
								recipeName: "Carrot Potage",
								recipeImage: "<img src='images/carrotSoup.jpg' height=\"300\">",
								numServings: "4",
								recipeTime: "80 minutes",
								difficulty: "Hard",
							},
							 ingredients: 
							 {
								 originalCarrot: carrotIngred,
								 doubleCarrot: carrotIngredDouble,
								 halfCarrot: carrotIngredHalf,
							 },
							 preparation: carrotPrep,
							},
					};
	
		
	//-----------------------------------------------------------------------------------------------------------------
	//toggle switches that show/hide preparations and instructions
	
	
	
	//show/hide ingredients	
		$(document).ready(function(){		
			$("#togIngred").click(function(){		
				$("#ingred").toggle();  
			});	
		});
	
				
	//show/hide instructions
		$(document).ready(function(){
			$("#togInstruct").click(function(){
				$("#instruct").toggle();
			});	
		});
	
	
	
//-----------------------------------------------------------------------------------------------------------------
//Meat Recipe

	function meatRecipe()
	{
		document.querySelector("#currentRecipe").style.display = "block";
		
		document.querySelector("#image").innerHTML = recipes.ranchMeatloaf.heading.recipeImage;
		document.querySelector("#recipe").innerHTML = recipes.ranchMeatloaf.heading.recipeName;
		document.querySelector("#servings").innerHTML = recipes.ranchMeatloaf.heading.numServings;
		document.querySelector("#time").innerHTML = recipes.ranchMeatloaf.heading.recipeTime;
		document.querySelector("#difficulty").innerHTML = recipes.ranchMeatloaf.heading.difficulty;
		document.querySelector("#ingred").innerHTML = recipes.ranchMeatloaf.ingredients.originalMeat;
		document.querySelector("#instruct").innerHTML = recipes.ranchMeatloaf.preparation;
		
		//Select Serving Size
		document.querySelector("#half").innerHTML = "<br><input type='radio' name='size' value='Half' onClick='servingsMeat(\"half\")'> Half<br>";
		document.querySelector("#double").innerHTML = "<input type='radio' name='size' value='Half' onClick='servingsMeat(\"double\")'> Double<br>";
		document.querySelector("#original").innerHTML = "<input type='radio' name='size' value='Half' onClick='servingsMeat(\"original\")'> Original";
		
		//hide ingredients when selecting another recipe
		document.querySelector("#ingred").style.display = "none";
		document.querySelector("#instruct").style.display = "none";
		
		
		//toggle switches to off
		document.querySelector("#togIngred").checked = false;
		document.querySelector("#togInstruct").checked = false;
		
		location.href = "#currentRecipe";
		
	}
	
	function servingsMeat(inValue)
	{
		if(inValue == "half"){
			document.querySelector("#ingred").innerHTML = recipes.ranchMeatloaf.ingredients.halfMeat;
			document.querySelector("#servings").innerHTML = recipes.ranchMeatloaf.heading.numServings = "3";
		}
		else if(inValue == "double"){
			document.querySelector("#ingred").innerHTML = recipes.ranchMeatloaf.ingredients.doubleMeat;
			document.querySelector("#servings").innerHTML = recipes.ranchMeatloaf.heading.numServings = "12";
		}
		else{
			document.querySelector("#ingred").innerHTML = recipes.ranchMeatloaf.ingredients.originalMeat;
			document.querySelector("#servings").innerHTML = recipes.ranchMeatloaf.heading.numServings = "6";
		}
	}

	
	
	
//-----------------------------------------------------------------------------------------------------------------
//Chili Recipe
	
	function chiliRecipe()
	{
		document.querySelector("#currentRecipe").style.display = "block";
		
		document.querySelector("#image").innerHTML = recipes.crockpotChili.heading.recipeImage;
		document.querySelector("#recipe").innerHTML = recipes.crockpotChili.heading.recipeName;
		document.querySelector("#servings").innerHTML = recipes.crockpotChili.heading.numServings;
		document.querySelector("#time").innerHTML = recipes.crockpotChili.heading.recipeTime;
		document.querySelector("#difficulty").innerHTML = recipes.crockpotChili.heading.difficulty;
		document.querySelector("#ingred").innerHTML = recipes.crockpotChili.ingredients.originalChili;
		document.querySelector("#instruct").innerHTML = recipes.crockpotChili.preparation;
		
		//Select Serving Size
		document.querySelector("#half").innerHTML = "<br><input type='radio' name='size' value='Half' onClick='servingsChili(\"half\")'> Half<br>";
		document.querySelector("#double").innerHTML = "<input type='radio' name='size' value='Half' onClick='servingsChili(\"double\")'> Double<br>";
		document.querySelector("#original").innerHTML = "<input type='radio' name='size' value='Half' onClick='servingsChili(\"original\")'> Original";
		
		//hide ingredients when selecting another recipe
		document.querySelector("#ingred").style.display = "none";
		document.querySelector("#instruct").style.display = "none";
		
		//toggle switches to off
		document.querySelector("#togIngred").checked = false;
		document.querySelector("#togInstruct").checked = false;
		
		location.href = "#currentRecipe";
		
	}
	
	function servingsChili(inValue)
	{
		if(inValue == "half"){
			document.querySelector("#ingred").innerHTML = recipes.crockpotChili.ingredients.halfChili;
			document.querySelector("#servings").innerHTML = recipes.crockpotChili.heading.numServings = "3";
		}
		else if(inValue == "double"){
			document.querySelector("#ingred").innerHTML = recipes.crockpotChili.ingredients.doubleChili;
			document.querySelector("#servings").innerHTML = recipes.crockpotChili.heading.numServings = "12";
		}
		else{
			document.querySelector("#ingred").innerHTML = recipes.crockpotChili.ingredients.originalChili;
			document.querySelector("#servings").innerHTML = recipes.crockpotChili.heading.numServings = "6";
		}
	}
	
	
	
//-----------------------------------------------------------------------------------------------------------------
//Carrot Recipe
	
	function carrotRecipe()
	{
		document.querySelector("#currentRecipe").style.display = "block";
		
		document.querySelector("#image").innerHTML = recipes.carrotSoup.heading.recipeImage;
		document.querySelector("#recipe").innerHTML = recipes.carrotSoup.heading.recipeName;
		document.querySelector("#servings").innerHTML = recipes.carrotSoup.heading.numServings;
		document.querySelector("#time").innerHTML = recipes.carrotSoup.heading.recipeTime;
		document.querySelector("#difficulty").innerHTML = recipes.carrotSoup.heading.difficulty;
		document.querySelector("#ingred").innerHTML = recipes.carrotSoup.ingredients.originalCarrot;
		document.querySelector("#instruct").innerHTML = recipes.carrotSoup.preparation;
		
		//Select Serving Size
		document.querySelector("#half").innerHTML = "<br><input type='radio' name='size' value='Half' onClick='servingsCarrot(\"half\")'> Half<br>";
		document.querySelector("#double").innerHTML = "<input type='radio' name='size' value='Half' onClick='servingsCarrot(\"double\")'> Double<br>";
		document.querySelector("#original").innerHTML = "<input type='radio' name='size' value='Half' onClick='servingsCarrot(\"original\")'> Original";
		
		//hide ingredients when selecting another recipe
		document.querySelector("#ingred").style.display = "none";
		document.querySelector("#instruct").style.display = "none";
		
		//toggle switches to off
		document.querySelector("#togIngred").checked = false;
		document.querySelector("#togInstruct").checked = false;
		
		location.href = "#currentRecipe";
		
	}
	
	function servingsCarrot(inValue)
	{
		if(inValue == "half"){
			document.querySelector("#ingred").innerHTML = recipes.carrotSoup.ingredients.halfCarrot;
			document.querySelector("#servings").innerHTML = recipes.carrotSoup.heading.numServings = "2";
		}
		else if(inValue == "double"){
			document.querySelector("#ingred").innerHTML = recipes.carrotSoup.ingredients.doubleCarrot;
			document.querySelector("#servings").innerHTML = recipes.carrotSoup.heading.numServings = "8";
		}
		else{
			document.querySelector("#ingred").innerHTML = recipes.carrotSoup.ingredients.originalCarrot;
			document.querySelector("#servings").innerHTML = recipes.carrotSoup.heading.numServings = "4";
		}
	}




//-------------------



	