function selection(value){
   if (value == "all"){
      document.getElementById("all").style.display = "block";
      document.getElementById("best").style.display = "none";
   }

   if (value == "best"){
      document.getElementById("all").style.display = "none";
      document.getElementById("best").style.display = "block";
   }
}