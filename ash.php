<main id="main" class="main">

<div class="pagetitle">
  <h1>Allowed Sub-Headers</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Allowed Sub-Headers</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="card">
          <div class="card-body">
            <!-- <pre> -->
            <?php
            $list_sub_headers = $ContObj->ListSubHeaders();
            $list_allowed_sub_headers = $ContObj->ListAllowedSubHeaders();
            // print_r($list_allowed_sub_headers);
            // exit();
            ?>

            <form action="index.php?page=ash" method="POST" class="form-group">
                
                <div class="form-group">
                    <h4>Sub Headers</h4>
                    <select name="ash" id="ash" class="form-control" multiple>
                    <?php
                    if(count($list_sub_headers) > 0){
                        foreach($list_allowed_sub_headers as $list_allowed_sub_header){
                            foreach($list_sub_headers  as $list_sub_header){
                                if($list_allowed_sub_header['sub_header_id'] != $list_sub_header['id']){
                                    ?>
                                    <option value="<?php echo $list_sub_header['id']; ?>"><?php echo $list_sub_header['subHeadNm']; ?></option>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>
                    </select>    
                </div>

                <div class="form-group">
                    <h4>Allowed Sub Headers</h4>
                    <select name="ash" id="ash" class="form-control" multiple>
                    <?php
                    if(count($list_allowed_sub_headers) > 0){
                        foreach($list_allowed_sub_headers as $list_allowed_sub_header){    
                            ?>
                            <option value="<?php echo $list_allowed_sub_header['sub_header_id']; ?>"><?php echo $list_allowed_sub_header['subHeadNm']; ?></option>
                            <?php
                        }
                    }
                    ?>
                    </select>    
                </div>
            </form>
            
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>