// jQuery
$(document).ready(function (){
	// if js is present we remove the no-script class from the body. 
	// no-script displays all of the menu items and prevents them from being hidden.
	$("body").removeClass("no-script").addClass("js");

	// The first item in our stack / accordian is expanded. First we want to target it.
	var openStack = $(".expanded");

	// Now we want to hide all the other stacks / accodian menu items
	$(".faq_question").find("div:not(.expanded)").hide();

	// A bit of bubble magic....
	// We place a click event on the each stack / accodian menu container
	$(".faq_question").click(function (e) {
		$container = $(this);
		$h1 = $container.find("h1");
		$div = $container.find("div");
		$plus = $(".plus");

		// This is to check what has been click
		var t = e.target; 

		// This gives us a true or false. What its check is to see if a H1 tag has been click, if so its true
		// if not then its false.
		var compare = t.tagName == $h1.get(0).tagName;

		// Now we check to see if the clicked item is a H1 and is NOT expanded. 
		if (compare && !$div.hasClass("expanded")) {
			// Then we remove the plus class to the currently expanded stack...
			$plus.removeClass("plus").addClass("minus");
			// ...and add it to the newly clicked menu heading...
			$h1.addClass("plus").removeClass("minus");

			//...then we close the currently opened stack...
			openStack.removeClass("expanded").slideUp();

			//...and open the newly clicked stack content...
			$div.slideDown().addClass("expanded");
			
			//...and finally we reset the variable so its set to the newly open/expanded/selected stack.
			openStack = $div;
		}
		return false;
	})
});


