<?php 

include 'header.php';

session_start();
if(!$_SESSION['logged']){ 
    header("Location: index.php"); 
    exit; 
} 

?>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <img src="img/overlays/logo.png" style="height: 45px; margin-right: -12px">
      </div>
      <div class="sidebar-brand-text mx-3">Core<sup>3</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="main.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      MENU
    </div>

    <!-- Nav Item  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-file-prescription"></i>
        <span>Medical Records and Data</span>
        </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Records and Data</h6>
          <a class="collapse-item" href="main.php">Patient Records</a>
          <a class="collapse-item" href="main.php">New Patient</a>
        </div>
      </div>
    </li>
    
    <!--<li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-chart-line"></i>
        <span>Homis Analytics</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Module 1(Patient Management)</h6> 
          <a class="collapse-item" href="#">Billing And Payment</a>
          <a class="collapse-item" href="#">Admission</a>
          <a class="collapse-item" href="#">Outpatient</a>
          <a class="collapse-item" href="#">Emergency Room</a>
          <a class="collapse-item" href="#">PHIC</a> (Philippine Health Insurance Corporation Claims Process)
          <a class="collapse-item" href="#">MSS</a> (Medical Social Service and Referral System Requirements)
          <h6 class="collapse-header">Module 2(Service Provision)</h6>
          <a class="collapse-item" href="#">Ward</a>
          <a class="collapse-item" href="#">Dietary</a>
          <a class="collapse-item" href="#">Operating Room</a>
          <a class="collapse-item" href="#">Pharmacy</a>
          <a class="collapse-item" href="#">Central Stock Room</a>
          <a class="collapse-item" href="#">Laboratory</a>
          <a class="collapse-item" href="#">Radiology</a>
  <h6 class="collapse-header">Module 3(Administration)</h6>
          <a class="collapse-item" href="#">Obligation/Accounting</a>
          <a class="collapse-item" href="#">Budgeting</a>
          <a class="collapse-item" href="#">Procurement Mgt.</a>
          <a class="collapse-item" href="#">Human Resource Mgt.</a>
          <a class="collapse-item" href="#">Materials Mgt.</a>
          <a class="collapse-item" href="#">Accounts Payable</a>
          <a class="collapse-item" href="#">Fixed Assets</a>
          <a class="collapse-item" href="#">General Ledger</a>
        </div>
      </div>
    </li>-->
    

   

    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-file-prescription"></i>
        <span>Pharmacy</span>
        </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Herbal Med</h6>
          <a class="collapse-item" href="drug-list.php">List of Drugs</a>
          <a class="collapse-item" href="drug-transaction.php">Drugs Transaction</a>
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">Other Pages:</h6>
          <a class="collapse-item" href="inventory.php">Inventory</a>
          <a class="collapse-item" href="#">Report</a>
        </div>
      </div>
    </li>

     <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMed" aria-expanded="true" aria-controls="collapseMed">
        <i class="fas fa-fw fa-briefcase-medical"></i>
        <span>Medical Package</span>
      </a>
      <div id="collapseMed" class="collapse" aria-labelledby="headingMed" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">sub-modules</h6>
          <a class="collapse-item" href="package-list.php">List of Created Package</a>
          <a class="collapse-item" href="create-package.php">Create Medical Package</a>
          <a class="collapse-item" href="avail.php">Patient Avail</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDiet" aria-expanded="true" aria-controls="collapseDiet">
        <i class="fas fa-fw fa-utensils"></i>
        <span>Diet Management</span>
      </a>
      <div id="collapseDiet" class="collapse" aria-labelledby="headingDiet" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">sub-modules</h6>
          <a class="collapse-item" href="#">Scheduling</a>
          <a class="collapse-item" href="#">Food Serving</a>
          <a class="collapse-item" href="#">Diet Plan</a>
        </div>
      </div>
    </li>


    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
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
