var initialSelection;
var initialContainer;
document.addEventListener("DOMContentLoaded", function(event) {
    //start the game off with a random description
    document.getElementById("new").onclick = getRandomDescription();
});

window.onload = function() {
    //record the state of the divs without images dragged around yet
    initialSelection = document.getElementById("selection").innerHTML;
    initialContainer = document.getElementById("container").innerHTML;
    //add listeners for the 3 buttons
    newbutton = document.getElementById("new");
    newbutton.onclick = getRandomDescription;
    clearbutton = document.getElementById("clear");
    clearbutton.onclick = clearHeros;
    submitbutton = document.getElementById("submit");
    submitbutton.onclick = checkSolution;
}
//Code from W3 Schools javascript drag and drop tutorial
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var evtarget=ev.target;
    if (evtarget =="[object HTMLImageElement]"){
	evtarget = evtarget.parentNode;
    } else {
	ev.target.appendChild(document.getElementById(data));
    }
}

var descriptions = [{description:"This hero forces enemies to attack him and can instantly kill nearby enemies that have low health", heroname:"Axe"},
		    {description:"This hero can create an impassable wall that stuns as well as punish enemies heavily for grouping up close together", heroname:"Earth Shaker"},
		    {description:"This hero experiences a huge power spike at night and can fly over normally impassble terrain", heroname:"Night Stalker"},
		    {description:"This hero is extremely difficult to kill and can call large tentacles from the ground that stun all enemies nearby", heroname:"Tide Hunter"},
		    {description:"This hero is able to sprint into battle and recklessly devastate enemies in an impenetrable flurry of blades", heroname:"Juggernaut"},
		    {description:"This hero is elusive, weaving in and out of fights with the ability to turn itself into allies and enemies alike", heroname:"Morphling"},
		    {description:"This hero moves very quickly to drain enemies attack damage while devastating them with bolts of lightning", heroname:"Razor"},
		    {description:"This hero uses powerful icy slows and roots to prevent enemies from escaping or initiating a fight", heroname:"Crystal Maiden"},
		    {description:"This hero has powerful single target stuns causing psychological trauma to enemies", heroname:"Bane"},
		    {description:"This hero has abilities that allow it to dodge incoming damaging spells and reposition itself while locking enemies in place", heroname:"Puck"},
		    {description:"This hero throws a stun that bounces between enemies and can summon a turret that automatically attacks nearby enemies", heroname:"Witch Doctor"}];

function getRandomDescription() {
    var desc = document.getElementById('desc');
    var solutionfield = document.getElementById("solution");
    //grab a random description from the array and display it to the site
    desc.innerHTML = descriptions[Math.floor(Math.random() * descriptions.length)].description;
    //reset the previous solution to be invisible when the new description comes out
    solutionfield.hidden = true;
}

function checkSolution(){
    var solutionfield = document.getElementById("solution");
    var answer = document.getElementById("container");
    var description = document.getElementById("desc");
    var heroIndex;
    var descIndex;
    //check to see if there is currently an image dragged into the answer div
    if (answer.innerHTML.includes("img")){
	//if there is, iterate through the descriptions and find what the correct answer, as well as what the current answer is
	for (i = 0; i < descriptions.length; i++){
	    if(answer.innerHTML.includes(descriptions[i].heroname)){
		heroIndex = i;
	    }
	    if(description.innerHTML.includes(descriptions[i].description)){
		descIndex = i;
	    }
	}//forloop
	//if those answers are the same, display that the guess was correct, otherwise it is incorrect
	if (heroIndex == descIndex){
	    solutionfield.style.color = "green";
	    solutionfield.innerHTML = descriptions[heroIndex].heroname + " is correct!";
	    solutionfield.hidden = false;
	} else {
	    solutionfield.style.color = "red";
	    solutionfield.innerHTML = descriptions[heroIndex].heroname + " is incorrect.";
	    solutionfield.hidden = false;
	}
    }//if
}
	
function clearHeros() {
    var container = document.getElementById("container");
    var selection = document.getElementById("selection");
    //roll everything back to how the page was when it initially loaded, but keep the same description on the screen
    container.innerHTML = initialContainer;
    selection.innerHTML = initialSelection;
}

