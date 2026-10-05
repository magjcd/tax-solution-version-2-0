<main id="main" class="main sub-body">

  <div class="pagetitle">
    <h1 class="main-text-color">Registered Clients</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Registered Clients</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="card sub-body">
            <div class="card-body text-center">

              <form action="" class="form-inline">
                <div class="form-group">
                  <input type="text" id="clSearch" class="form-control" name="clSearch" placeholder="Search Term Here" autofocus="autofocus">
                </div>

                <div class="form-group">
                  <select id="sortClBy" class="form-control" name="sortClBy">
                    <option value="">Select Search Type</option>
                    <option value="" readonly>------------------------</option>
                    <option value="clientNm">Sort by Client Name</option>
                    <option value="busNm">Sort by Business Name</option>
                  </select>
                </div>

                <div class="form-group">
                  <select id="asc_desc" class="form-control" name="asc_desc">
                    <option value="">Select Search Type</option>
                    <option value="" readonly>------------------------</option>
                    <option value="ASC">A-Z</option>
                    <option value="DESC">Z-A</option>
                  </select>
                </div>

                <div class="form-group">
                  <button id="clSearchBtn" style="width: 50px;" accesskey="s" class="btn btn-primary" style="outline: none;"><i class="fas fa-search"></i></button>
                </div>
              </form>

              <div class="">
                <div class="clientSearch">
                </div>

                <div style="overflow-x: auto;">
                  <table id="vClients" class="table table-striped">
                  </table>
                </div>
                <!-- </div> -->
              </div>
            </div>
            <a href="#" class="scrollTop"><i class="fas fa-arrow-up"></i></a>

          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</main>