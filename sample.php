<?php 
    include 'header.php'; 
?>
      <nav class="navbar navbar-expand navbar-light bg-gradient-success topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-white medium">Admin</span>
              <i class="fas fa-user-circle"></i>
             </a> 
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="out.php" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
                </a>
            </div>
           </li>

         </ul>

      </nav>

    <div clas="row">
        <div class="col-6">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="table-secondary">
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008/11/13</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011/06/27</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td>$112,000</td>
            </tr>
        </tbody>
    </table>
        </div>
    </div>
</div>
<br>
<div class="col-4">
            <h5>MENU SELECTION</h5>
            <div id='message'></div>
            <!-- JQuery -->
            <div id="selection">
              <div class="row">
                  <div class='col'>
                    <p><strong>CODE :</strong></p>
                  </div>
                  <div class='col'>
                    <p></p>
                  </div>
              </div>

              <div class="row">
                  <div class='col'>
                    <p><strong>NAME :</strong></p>
                  </div>
                  <div class='col'>
                    <p></p>
                  </div>
              </div>

              <div class="row">
                  <div class='col'>
                    <p><strong>PRICE :</strong></p>
                  </div>
                  <div class='col'>
                    <p>PHP <strong></strong></p>
                  </div>
              </div>

              <div class="row">
                  <div class='col'>
                    <p><strong>ENTER QUANTITY :</strong></p>
                  </div>
                  <div class='col'>
                  </div>
              </div>

          </div>
          <button id='addToReceipt' class="btn btn-success btn-block" disabled="true">SUBMIT</button>
          <br><br>
          <div class='row'>
            <div class='col'>
              <strong>QUANTITY</strong>
            </div>
            <div class='col'>
              <strong>NAME</strong>
            </div>
            <div class='col'>
              <strong>AMOUNT</strong>
            </div>
          </div>

          <div id='cart'></div>
          <br>
          <div class='row'>
            <div class='col'>
              <strong></strong>
            </div>
            <div class='col'>
              <strong>TOTAL:</strong>
            </div>
            <div class='col'>
              <strong id='total'></strong>
            </div>
          </div>
          <br>

            <button id='submit' class="btn btn-success btn-block" disabled="true"><a id='order-receipt' style="text-decoration: none;color:white;">SUBMIT</a></button>

          <br>
          <div id='printed'></div>
          <button id='showReceipt' onclick="printReceipt()" class="btn btn-primary btn-block" style="display: none;">GENERATE RECEIPT</button>
        <iframe id='or' width="100%" height="350px;" style="display: none;">
          
        </iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
    include 'footer.php';
?>