        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/global.js"></script>
      <script src="js/dropdown.js"></script>
      <script src="js/bootstrap-select.min.js"></script>
      <script src="js/bootstrap-datepicker.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/menu-script.js"></script>
      <script>
        function myFunction() {
          var x = document.getElementById("snackbar");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
        $(document).ready(function(){
         $(".expand").click(function(){
         $(".list-dashborad").toggle("slide");
         });
         });
         
             $(document).ready(function(){
         $('#nav-icon2').click(function(){
         $(this).toggleClass('open');
         });
         });
      </script>