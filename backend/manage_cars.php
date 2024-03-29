<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php
include 'inc/page_head.php';

if (isset($_GET['id'])) {
    $obj->delete_data('car_data', 'id', $_GET['id'], 'manage_cars.php');
}
$results = $obj->get_all_data('car_data', 'id', 'ASC');
/* print_R($results); */

unset($_SESSION['success']);
?>
<?php $obj->admin_not_login(); ?>

<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Manage Cars<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li>Homepage</li>

        <li><a href="">Manage Cars</a></li>

    </ul>


    <!-- Example Block -->

    <div class="block">

        <!-- Example Title -->

        <div class="block-title">

            <h2>List Of Cars</h2>

        </div>

        <!-- END Example Title -->



        <!-- Example Content -->

        <div class="table-responsive">
            <div class="table-options clearfix">

                <a href="add_car.php"><div class="btn-group btn-group-sm pull-left">
                        <label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Slider">
                            Add  Car
                    </div>
                </a>  
                <div align="right" id="importcar">
                    <a href="importcar.php"><div class="btn-group btn-group-sm pull-left">
                        <label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Slider">
                            <b> Import </b>
                    </div>
                </a>    
                </div> &nbsp;
            <!--
            Available Table Classes:
                'table'             - basic table
                'table-bordered'    - table with full borders
                'table-borderless'  - table with no borders
                'table-striped'     - striped table
                'table-condensed'   - table with smaller top and bottom cell padding
                'table-hover'       - rows highlighted on mouse hover
                'table-vcenter'     - middle align content vertically
            -->
            <table id="example-datatable" class="table table-striped table-vcenter" >
                <thead>
                    <?php if (is_array($results)) { ?>
                        <tr>
                            <th>S.No</th>
                            <th>Maker</th>
                            <th>Model</th>
                            <th>Sub-Model</th>
                            <th>Body Type</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th>Warranty</th>
                            <th style="width: 150px;" class="text-center">Actions</th>
                            <th>Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($results as $value) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $obj->get_single_field('maker', 'name', 'id', $value['maker_id']); ?></td>
                                <td><?php echo $obj->get_single_field('model', 'model_name', 'model_id', $value['model']); ?></td>
                                <td><?php echo $obj->get_single_field('sub_model', 'sub_model_name', 'sub_id', $value['sub_model']); ?></td>
                                <td><?php echo $value['bodyType']; ?></td>
                                <td><?php echo $value['year']; ?></td>
                                <td><?php echo $value['price']; ?></td>
                                <td><?php echo $value['Warranty']; ?></td>

                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="view_car.php?id=<?php echo $value['id']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-external-link"></i></a>
                                        <a href="edit_car.php?id=<?php echo $value['id']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="manage_cars.php?id=<?php echo $value['id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="manage_review.php?id=<?php echo $value['id']; ?>" data-toggle="tooltip" title="Review" class="btn btn-success"><i class="hi hi-list-alt"></i></a>
                                  
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>No Makers Here</tr>
<?php } ?>
                </tbody>

            </table>
        </div>
        <!-- END Example Content -->

    </div>

    <!-- END Example Block -->

</div>
</div>

<!-- END Page Content -->


<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>

<?php include 'inc/template_end.php'; ?>