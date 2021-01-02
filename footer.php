
      <!-- Footer 
      <footer class="sticky-footer bg-success">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Nick,Nick,Nick</span>
          </div>
        </div>
      </footer> -->
      <!-- End of Footer -->

      </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="out.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"></script>
  <script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
datasets: [{
label: '# of Votes',
data: [12, 19, 3, 5, 2, 3],
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});
</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );

    var drugIds = [];
    var quantities = [];
    var names = [];
    var amounts = [];
    totals = 0;
    $(document).ready(function() {
      var count = <?php echo $count; ?>; 
      for(var x = 0;x != count; x++){
        $("#selector"+x).click(function() {
          var quantity = parseFloat($("#quantity").val());
          if(!isNaN(quantity) && quantity > 0){
          document.getElementById("addToReceipt").removeAttribute("disabled");
          $("#selection").empty();
          var url_string = window.location.href;
          var url = new URL(url_string);
          var quantity = parseFloat($("#quantity").val());
          var id = url.searchParams.get("id");
          $("#selection").load("selection.php",{
            newId : id,
            quantity : quantity
          });   
          document.getElementById('quantity').value = '';
          $("#quantityWarning").text("");
        }else{
            $("#quantityWarning").text("Required!");
            document.getElementById("quantity").focus();
          }
        });
      }
    });

    function addGetParameter(id){
      window.history.replaceState(null, null, "?id="+id);
    }


    $(document).ready(function() {
      $("#addToReceipt").click(function() {
        var name = $("#drug_name").text();
        var amount = parseFloat($("#drug_amount").text());
        var quantity = parseFloat($("#drug_quantity").text());
          quantities.push(quantity);
          names.push(name);
          amounts.push(amount);
          var url_string = window.location.href;
          var url = new URL(url_string);
          var id = url.searchParams.get("id");
          drugIds.push(id);
          totals += amount;
          $("#total").text(totals.toFixed(2));
          $("#cart").append("<div class='row'><div class='col'>"+quantity+"</div><div class='col'>"+name+"</div><div class='col'>"+amount.toFixed(2)+"</div></div>");
          document.getElementById("submit").removeAttribute("disabled");
      });
    });


    $(document).ready(function(){
      $("#submit").click(function(){
        if(confirm("Are you sure?")){
          var cash = parseFloat($("#cash").val());
          $("#message").load("order.php",{
            names : names,
            quantities : quantities,
            drugIds : drugIds,
            cash : cash,
            amounts : amounts
          });
          document.getElementById("submit").disabled = true;
          document.getElementById("addToReceipt").disabled = true;
        } 
      });
    });

</script>
</body>

</html>

