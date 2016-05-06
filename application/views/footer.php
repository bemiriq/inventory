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
  
  <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
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
                    integer: {
                            message: 'Product cost value is not an integer',
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

    