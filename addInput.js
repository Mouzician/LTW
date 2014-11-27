/*var counterText = 0;
var counterRadioButton = 0;
var counterCheckBox = 0;
var counterTextArea = 0;
function addAllInputs(divName, inputType){
     var newdiv = document.createElement('div');
     switch(inputType) {
          case 'text':
               newdiv.innerHTML = "Entry " + (counterText + 1) + " <br><input type='text' name='myInputs[]'>";
               counterText++;
               break;
          case 'radio':
               newdiv.innerHTML = "Entry " + (counterRadioButton + 1) + " <br><input type='radio' name='myRadioButtons[]'>";
               counterRadioButton++;
               break;
          case 'checkbox':
               newdiv.innerHTML = "Entry " + (counterCheckBox + 1) + " <br><input type='checkbox' name='myCheckBoxes[]'>";
               counterCheckBox++;
               break;
          case 'textarea':
	       newdiv.innerHTML = "Entry " + (counterTextArea + 1) + " <br><textarea name='myTextAreas[]'>type here...</textarea>";
               counterTextArea++;
               break;
          }
     document.getElementById(divName).appendChild(newdiv);
}*/

var counter = 1;
var limit = 6;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<br><input type='text' name='myInputs[]' placeholder='Insert an answer here...'>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}

function deleteInput(divName){

     //document.getElementById(divName).removeChild();

     var element = document.getElementById(divName);


     if (counter > 2){

      element.removeChild(element.lastChild);

      counter--;
 }
}