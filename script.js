window.onload = function() {
    //grab the elements that we will be changing 
    var table = document.getElementById('tourTable');
    var table2 = document.getElementById('winTable');
    var table2cap = document.getElementById('winTableCap');
    //set the second table to be invisible initially
    table2.style = "visibility: hidden";
    table2cap.style = "visibility: hidden";

    //for all of the rows in the table, add mouseover events and change the prizepool breakdown depending on which row is currently moused over
    for(var i = 0; i < table.rows.length; i++) {
	table.rows[i].addEventListener('mouseenter', function() {
	    var starLadder = "StarLadder ImbaTV Minor";
	    var esl = "ESL One Los Angeles 2020";
	    var qual4 = "Qualifier #4";
	    var tba1 = "To Be Announced Minor";
	    var epic = "EPICENTER Major";
	    var qual5 = "Qualifier #5";
	    var one = "ONE Esports Singapore Major";

	    if (this.cells[1].innerHTML == starLadder || this.cells[1].innerHTML == tba1)
	    {
		table2.style = "visibility: visible";
		table2cap.style = "visibility: visible";
		document.getElementById("td1").innerHTML = "$72,000";
		document.getElementById("td2").innerHTML = "$60,000";
		document.getElementById("td3").innerHTML = "$54,000";
		document.getElementById("td4").innerHTML = "$42,000";
		document.getElementById("td5").innerHTML = "$24,000";
		document.getElementById("td6").innerHTML = "$24,000";
		document.getElementById("td7").innerHTML = "$12,000";
		document.getElementById("td8").innerHTML = "$12,000";
	    }
	    else if (this.cells[1].innerHTML == esl || this.cells[1].innerHTML == epic || this.cells[1].innerHTML == one)
	    {
		table2.style = "visibility: visible";
		table2cap.style = "visibility: visible";
		document.getElementById("td1").innerHTML = "$300,000";
		document.getElementById("td2").innerHTML = "$160,000";
		document.getElementById("td3").innerHTML = "$110,000";
		document.getElementById("td4").innerHTML = "$80,000";
		document.getElementById("td5").innerHTML = "$60,000";
		document.getElementById("td6").innerHTML = "$60,000";
		document.getElementById("td7").innerHTML = "$40,000";
		document.getElementById("td8").innerHTML = "$40,000";
	    }
	    //if there is no prizepool, hide those two columns
	    else if (this.cells[1].innerHTML == qual4 || this.cells[1].innerHTML == qual5)
	    {
		table2.style = "visibility: hidden";
		table2cap.style = "visibility: hidden";
	    }
	});
    }
}
