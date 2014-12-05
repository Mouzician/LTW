     function test() {
          var radios = document.getElementsByName("answer".$idPoll);
          for (var i = 0; i < radios.length; i++) {       
          if (radios[i].checked) {
            //alert(radios[i].value);
            var answer1 = radios[i].value;
            break;
        }
    } 

   $.post("newvote.php", { 'answer1': answer1});
   location.reload(true);
    }

     /*function test2() {
          var radios = document.getElementsByName("answer");
          for (var i = 0; i < radios.length; i++) {       
          if (radios[i].checked) {
            //alert(radios[i].value);
            var answer1 = radios[i].value;
            break;
        }
    } 

   $.post("showresults.php", { 'answer1': answer1});
   //location.reload(true);
    }*/