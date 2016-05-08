    <script src="<?=base_url('public/bower_components/jquery/dist/jquery.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('public/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url('public/bower_components/metisMenu/dist/metisMenu.min.js')?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?=base_url('public/bower_components/raphael/raphael-min.js')?>"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url('public/dist/js/sb-admin-2.js')?>"></script>
    <script src="<?=base_url('public/bootstrapValidator/js/bootstrapValidator.js')?>"></script>
  
    <!-- start of script for autofill dropdown -->
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript">
            $(function(){
              $("#get_names_supplier").autocomplete({
                source: "<?php echo site_url('inventory/get_names'); ?>" // path to the get_birds method
              });
            });
        </script>
        <script type="text/javascript">
            $(function(){
              $("#get_names_customer").autocomplete({
                source: "<?php echo site_url('inventory/get_customer_names'); ?>" // path to the get_birds method
              });
            });
        </script>
        <script type="text/javascript">
            $(function(){
              $("#get_names_product").autocomplete({
                source: "<?php echo site_url('inventory/get_product_names'); ?>" // path to the get_birds method
              });
            });
        </script>
    <!-- end of autofill dropdown script -->

    <!-- start of script for bootstrap validation -->
        <script type="text/javascript">
          $(document).ready(function() {
            $('#contactForm').bootstrapValidator({
                container: '#messages',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'product[productName]' : {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    },
                    'product[stockIn]': {
                        validators: {
                            notEmpty: {
                                message: 'Added product field must not be empty'
                            },
                            integer: {
                                    message: 'Product Added value is not an integer',
                                    // The default separators
                                    thousandsSeparator: '',
                                    decimalSeparator: '.'
                                }
                        }
                    },
                    'product[cost]': {
                        validators: {
                            notEmpty: {
                                message: 'Product cost field must not be empty'
                            },
                        }
                    },
                    'transaction[cost]': {
                        validators: {
                            notEmpty: {
                                message: 'Transaction cost field must not be empty'
                            },
                            integer: {
                                    message: 'Transaction cost value is not an integer',
                                    // The default separators
                                    thousandsSeparator: '',
                                    decimalSeparator: '.'
                                }
                        }
                    },
                    'transaction[productName]': {
                        validators: {
                            notEmpty: {
                                message: 'Product Name field must not be empty'
                            },
                        }
                    },
                    'transaction[supplierName]': {
                        validators: {
                            notEmpty: {
                                message: 'Supplier Name field must not be empty'
                            },
                            integer: {
                                    message: 'Transaction cost value is not an integer',
                                    // The default separators
                                    thousandsSeparator: '',
                                    decimalSeparator: '.'
                                }
                        }
                    },
                    'transaction[stockSell]': {
                        validators: {
                            notEmpty: {
                                message: 'Stock Sell field must not be empty'
                            },
                            integer: {
                                    message: 'Stock Sell value is not an integer',
                                    // The default separators
                                    thousandsSeparator: '',
                                    decimalSeparator: '.'
                                }
                        }
                    },
                    'transaction[supplierName]': {
                        validators: {
                            notEmpty: {
                                message: 'Supplier Name field must not be empty'
                            },
                        }
                    },
                    'transaction[customerName]': {
                        validators: {
                            notEmpty: {
                                message: 'Customer Name field must not be empty'
                            },
                        }
                    },
                    'transaction[totalStockBuy]': {
                        validators: {
                            notEmpty: {
                                message: 'Stock bought field must not be empty'
                            },
                            integer: {
                                    message: 'Stock Bought value is not an integer',
                                    // The default separators
                                    thousandsSeparator: '',
                                    decimalSeparator: '.'
                                }
                        }
                    },
                }
            });
        });
        </script>
    <!-- end of bootstrap validation -->

    