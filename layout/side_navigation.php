<!-- ======= Sidebar ======= -->
<?php
if (isset($_SESSION['taxmagadmin'])) {
?>
  <!-- ====== ADMIN ========= -->
  <aside id="sidebar" class="sidebar sub-body">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index">
          <i class="bi bi-grid"></i>
          <span class="menu-text-color">Admin - Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span class="menu-text-color">Representative</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="index?page=nUser">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Add New Repreesentative</span>
            </a>
          </li>
          <li>
            <a href="index?page=viewUser">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">View Repreesentative</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span class="menu-text-color">Client Account Tools</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index?page=viewClient">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">View Clients</span>
            </a>
          </li>
          <li>
            <a href="index?page=nCity">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">City</span>
            </a>
          </li>
          <li>
            <a href="index?page=feeType">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Fee Type</span>
            </a>
          </li>
          <li>
            <a href="index?page=clStat">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Client Status</span>
            </a>
          </li>
          <li>
            <a href="index?page=ctou">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Tax Office Unit</span>
            </a>
          </li>
          <li>
            <a href="index?page=bo">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Branch Office Unit</span>
            </a>
          </li>
          <li>
            <a href="index?page=rto">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">R.T.O</span>
            </a>
          </li>
          <li>
            <a href="index?page=bussCat">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Business Category</span>
            </a>
          </li>
          <li>
            <a href="index?page=lnkAcc">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Link Account</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span class="menu-text-color">Financial Panel</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index?page=subHead">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Sub Header</span>
            </a>
            <a href="index?page=nAcc">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">New Account</span>
            </a>
            <a href="index?page=vAcc">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">View Accounts</span>
            </a>
            <a href="index?page=rdwft">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Rep. Fin. Activities</span>
            </a>
            <a href="index?page=clientExcelList">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Client Excel List</span>
            </a>
            <a href="index?page=ledgerToExcel">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Ledger's Excel File</span>
            </a>
            <a href="index?page=clFiledBranch">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">RetTrk Filing Status Branch Wise</span>
            </a>
            <a href="index?page=clFiled">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">RetTrk Filing Status</span>
            </a>
            <a href="index?page=listClFilStat">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Detailed RetTrk Filing Status</span>
            </a>
            <a href="index?page=trialBalance">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Trail Balance</span>
            </a>

            <a href="index?page=out_standing_report">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">City wise Out Stading Amount</span>
            </a>

            <a href="index?page=gjCSV">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Upload GJ CSV</span>
            </a>
            <a href="index?page=ash">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Allowed Sub Headers</span>
            </a>
            <a href="index?page=vHdWDt">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Header Wise Report</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#general-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-general-button-wide"></i><span class="menu-text-color">General</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="general-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="index?page=add_notification">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Notification Management</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->

    </ul>

  </aside>
  <!-- ======== End Admin ======== -->
<?php
}
?>

<?php
if (isset($_SESSION['taxmagdir'])) {
?>

  <!-- <aside id="sidebar" class="sidebar sub-body">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="index">
        <i class="bi bi-grid"></i>
        <span>Director - Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Account</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="index?page=nAcc">
            <i class="bi bi-circle"></i><span>Add New Account</span>
          </a>
        </li>
        <li>
          <a href="index?page=vAcc">
            <i class="bi bi-circle"></i><span>View Account</span>
          </a>
        </li>
        
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Representative</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="index?page=rdwft">
            <i class="bi bi-circle"></i><span>Representative Finance Activities</span>
          </a>
        </li>
        
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Return Tracker</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="index?page=clFiled">
            <i class="bi bi-circle"></i><span>Return Tracker Filing Status</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Financial Panel</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="index?page=subHead">
            <i class="bi bi-circle"></i><span>Sub Header</span>
          </a>
          <a href="index?page=nAcc">
            <i class="bi bi-circle"></i><span>New Account</span>
          </a>
          <a href="index?page=vAcc">
            <i class="bi bi-circle"></i><span>View Accounts</span>
          </a>
          <a href="index?page=clientExcelList">
            <i class="bi bi-circle"></i><span>Client Excel List</span>
          </a>
          <a href="index?page=ledgerToExcel">
            <i class="bi bi-circle"></i><span>Ledger's Excel File</span>
          </a>
          <a href="index?page=clFiled">
            <i class="bi bi-circle"></i><span>RetTrk Filing Status</span>
          </a>
          <a href="index?page=listClFilStat">
            <i class="bi bi-circle"></i><span>Detailed RetTrk Filing Status</span>
          </a>
          <a href="index?page=trialBalance">
            <i class="bi bi-circle"></i><span>Trail Balance</span>
          </a>
          <a href="index?page=gjCSV">
            <i class="bi bi-circle"></i><span>Upload GJ CSV</span>
          </a>
          <a href="index?page=ash">
            <i class="bi bi-circle"></i><span>Allowed Sub Headers</span>
          </a>
          <a href="index?page=vHdWDt">
            <i class="bi bi-circle"></i><span>Header Wise Report</span>
          </a>
        </li>
      </ul>
    </li>

  </ul>

  </aside> -->
  <!-- ======== End Director ======== -->
<?php
}
if (isset($_SESSION['taxmagrep'])) {
?>
  <!-- ====== REPRESENTATIVE ========= -->
  <aside id="sidebar" class="sidebar sub-body">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index">
          <i class="bi bi-grid"></i>
          <span class="menu-text-color">Representative Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span class="menu-text-color">Client</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index?page=nClient">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">Add New Client</span>
            </a>
          </li>
          <li>
            <a href="index?page=viewClient">
              <i class="bi bi-circle main-text-color"></i><span class="main-text-color">View Client List</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span class="menu-text-color">General Journal</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index?page=ngj">
              <i class="bi bi-circle"></i><span class="main-text-color">Add New General Journal</span>
            </a>
          </li>
          <li>
            <a href="index?page=vgj">
              <i class="bi bi-circle"></i><span class="main-text-color">View General Journal</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span class="menu-text-color">Accounts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index?page=vAcc">
              <i class="bi bi-circle"></i><span class="main-text-color">View Accounts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span class="menu-text-color">Return Tracker</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index?page=nRetTrk">
              <i class="bi bi-circle"></i><span class="main-text-color">Add Return Tracker</span>
            </a>
          </li>
          <li>
            <a href="index?page=DWvRetTrk">
              <i class="bi bi-circle"></i><span class="main-text-color">View Return Tracker</span>
            </a>
          </li>
          <li>
            <a href="index?page=listClFilStat">
              <i class="bi bi-circle"></i><span class="main-text-color">Return Tracker Filing Status</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

    </ul>

  </aside>
  <!-- ======== End Representative ======== -->
<?php
}
?>
<!-- End Sidebar-->