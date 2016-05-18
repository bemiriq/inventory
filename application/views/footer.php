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
                source: "<?php echo site_url('inventory/get_supplier_names'); ?>" // path to the get_supplier_name method
              });
            });
        </script>
        <script type="text/javascript">
            $(function(){
              $("#get_names_customer").autocomplete({
                source: "<?php echo site_url('inventory/get_customer_names'); ?>" // path to the get_customer_name method
              });
            });
        </script>
        <script type="text/javascript">
            $(function(){
              $("#get_names_product").autocomplete({
                source: "<?php echo site_url('inventory/get_product_names'); ?>" // path to the get_product_name method
              });
            });
        </script>
        <script type="text/javascript">
            $(function(){
                $("#get_prices").autocomplete({
                    source: "<?php echo site_url('inventory/get_price'); ?>" // path to the get_product_price method
                });
            });
        </script>
    <!-- end of autofill dropdown script -->

    <!-- start of script for bootstrap validation -->
        <script type="text/javascript">
          $(document).ready(function() {
            $('#buyContactForm').bootstrapValidator({
                container: '#messages',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'buyproduct[productName]' : {
                        validators: {
                            notEmpty: {
                                message: 'Product name is required and cannot be empty'
                            }
                        }
                    },
                    'buyproduct[name]' : {
                        validators: {
                            notEmpty: {
                                message: 'Full name is required and cannot be empty'
                            }
                        }
                    },
                    'buyproduct[stockIn]': {
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
                    'buyproduct[unit]': {
                        validators: {
                            notEmpty: {
                                message: 'Unit field must not be empty'
                            },
                            integer: {
                                    message: 'Unit value is not an integer',
                                    // The default separators
                                    thousandsSeparator: '',
                                    decimalSeparator: '.'
                                }
                        }
                    },
                    'buyproduct[cost]': {
                        validators: {
                            notEmpty: {
                                message: 'Product Cost field must not be empty'
                            },
                            integer: {
                                message: 'Product Cost value is not an integer',
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
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sellContactForm').bootstrapValidator({
                container: '#messages',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'sellProduct[productName]' : {
                        validators: {
                            notEmpty: {
                                message: 'Product name is required and cannot be empty'
                            }
                        }
                    },
                    'sellProduct[name]' : {
                        validators: {
                            notEmpty: {
                                message: 'Full name is required and cannot be empty'
                            }
                        }
                    },
                    'sellProduct[stockIn]': {
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
                    'sellProduct[cost]': {
                        validators: {
                            notEmpty: {
                                message: 'Product cost field must not be empty'
                            },
                        }
                    },
                    'sellProduct[unit]': {
                        validators: {
                            notEmpty: {
                                message: 'Unit field must not be empty'
                            },
                            integer: {
                                message: 'Unit value is not an integer',
                                // The default separators
                                thousandsSeparator: '',
                                decimalSeparator: '.'
                            }
                        }
                    },
                    'buyproduct[cost]': {
                        validators: {
                            notEmpty: {
                                message: 'Product Cost field must not be empty'
                            },
                            integer: {
                                message: 'Product Cost value is not an integer',
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

    