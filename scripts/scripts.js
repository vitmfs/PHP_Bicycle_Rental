(function () {

    window.addEventListener("load", init);


  

    function init() {
		
		alert("JavaScript ligado!");
		
		startTime();
		
		

        

    }
	
	/*
		alias to document.getElementById(id)
	*/
	function $(id) {														//equivalente a document.getElementById(id)

        return document.getElementById(id);
    }
	
	/*
		Function that represents a digital clock
		adapted from http://www.w3schools.com/js/tryit.asp?filename=tryjs_timing_clock   
	*/
    function startTime() {   
		// creates a new Date object
        var today = new Date(); 
		// saves the hours in a variable
        var hours = today.getHours();  
		// saves the minutes in a variable
        var minutes = today.getMinutes();
		// saves the seconds in a variable
        var seconds = today.getSeconds();
		// if minutes < 10 adds a zero in the front
        minutes = checkTime(minutes); 
		// if seconds < 10 adds a zero in the front
        seconds = checkTime(seconds); 
		// updates the innerHTML of time element
        $('sand').innerHTML =
		hours + ":" + minutes + ":" + seconds + " " + today.toDateString();
		// repeat every 500 miliseconds http://www.w3schools.com/jsref/met_win_settimeout.asp
		var t = setTimeout(startTime, 500);		
    }
	
	
	/*
		Function that adds a zero in front of minutes
		and seconds if minutes or seconds < 10
	*/
    function checkTime(i) {                                                                                
        if (i < 10) { i = "0" + i };
        return i;
    }


    

 

    


})();