<main id="main" class="main">

    <div class="pagetitle">
        <h1>Assign Tax Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item active">Assign Tax Category</li>
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

                            <?php
                            $list_reps = $ContObj->viewUsersC("taxmagrep");
                            $list_tax_cats = $ContObj->retTpData();
                            $list_clients = $ContObj->viewClints();

                            if (isset($_POST['representative'])) {
                                $assign_rep = $ContObj->assignRepCatClient($_POST);
                            }
                            ?>

                            <form action="index?page=tax_cat_to_rep" method="POST">

                                <div class="form-group mt-3">
                                    <select name="representative" id="representative" class="form-control">
                                        <option value="">Select a Representative</option>
                                        <option disabled="disabled">--------------------------------------</option>
                                        <?php
                                        foreach ($list_reps as $list_rep) {
                                        ?>
                                            <option value="<?php echo $list_rep['id']; ?>|<?php echo $list_rep['name']; ?>"><?php echo $list_rep['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select name="categories" id="categories" class="form-control">
                                        <option value="">Select a Category</option>
                                        <option disabled="disabled">--------------------------------------</option>
                                        <?php
                                        foreach ($list_tax_cats as $list_tax_cat) {
                                        ?>
                                            <option value="<?php echo $list_tax_cat['id']; ?>"><?php echo $list_tax_cat['feeTp']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select name="clients_id[]" class="form-control" multiple>
                                        <option value="">Select Clients</option>
                                        <option disabled="disabled">--------------------------------------</option>
                                        <?php
                                        foreach ($list_clients as $list_client) {
                                        ?>
                                            <option value="<?php echo $list_client['id']; ?>"><?php echo $list_client['clientNm'] . ' | ' . $list_client['cityNm']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <input type="submit" id="assign" value="Assign" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12">
                            <?php
                            $view_reps = $ContObj->viewUsersC("taxmagrep");
                            $view_fee_type = $ContObj->viewFeeTp();

                            // echo '<pre>';
                            // print_r($view_fee_type);
                            ?>


                            <?php
                            foreach ($view_reps as $view_rep) {
                            ?>

                                <div style="color: #fff; text-align: center; color: goldenrod !important">
                                    <h3><?php echo $view_rep['name'] ?></h3>
                                </div>
                                <?php
                                foreach ($view_fee_type as $view_fee_tp) {
                                    $view_assigned_categories = $ContObj->listAssignedCategories($view_rep['id'], $view_fee_tp['id']);
                                ?>
                                    <div style="color: #fff; text-align: center;">
                                        <h4><?php echo $view_fee_tp['feeTp'] ?></h4>
                                    </div>
                                    <table id="myTable" class="table table-striped">

                                        <thead>
                                            <tr>
                                                <th>Client Name</th>
                                                <th>City</th>
                                                <th>Business Name</th>
                                                <th style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            foreach ($view_assigned_categories as $view_assigned_category) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $view_assigned_category['clientNm'] ?></td>
                                                    <td><?php echo $view_assigned_category['cityNm'] ?></td>
                                                    <td><?php echo $view_assigned_category['busNm'] ?></td>
                                                    <td>
                                                        <a href="" class="btn btn-danger">Delete</a>
                                                        <!-- <div>
                                                            <select name="representative" id="representative" class="form-control">
                                                                <option value="">Select a Representative</option>
                                                                <option disabled="disabled">--------------------------------------</option>
                                                                <?php
                                                                foreach ($list_reps as $list_rep) {
                                                                ?>
                                                                    <option value="<?php echo $list_rep['id']; ?>"><?php echo $list_rep['name']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div> -->
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>

<script>
    // $(document).ready(function() {

    //     $('#assign').on('click', function(e) {

    //         e.preventDefault();

    //         const payload = {
    //             flag: 'assign_representative',
    //             representative_id: $('#representative').val(),
    //             categories_id: $('#categories').val(),
    //             clients_id: $('#clients').val()
    //         }

    //         $.ajax({
    //             url: 'view/actions.php',
    //             type: 'POST',
    //             data: payload,
    //             success: function(data) {
    //                 console.log(data);
    //             }

    //             // error: () {

    //             // }
    //         });

    //         // console.log(payload)
    //     });

    // });

    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>