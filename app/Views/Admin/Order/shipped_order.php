<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Order List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title">Order List</h3>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo base_url('order_list/') ?>"  class="btn btn-sm btn-danger float-right " >Back</a>
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th>Contact Name</th>
                        <th>Contact Phone</th>
                        <th>Order Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($order as $val){ ?>
                        <tr>
                            <td><?php echo $val->order_id;?></td>
                            <td><?php echo $val->payment_firstname;?></td>
                            <td><?php echo $val->payment_address_1;?></td>
                            <td><?php echo $val->payment_phone;?></td>
                            <td><?php echo currency_symbol_admin_shipped($val->final_amount);?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo order_id_by_status($val->order_id) ;?></td>
                        </tr>
                    <?php } ?>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Invoice</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th>Contact Name</th>
                        <th>Contact Phone</th>
                        <th>Order Status</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>