<!-- hotel footer -->
</div>
<script src="<?php echo base_url('assets/backend/js/jquery.min.js'); ?>"></script>

<!-- CoreUI and necessary plugins-->
<script src="<?php echo base_url('node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js'); ?>"></script>
<!--[if IE]><!-->
<script src="<?php echo base_url('node_modules/@coreui/icons/js/svgxuse.min.js'); ?>"></script>
<!--<![endif]-->
<!-- Plugins and scripts required by this view-->
<!--<script src="<?php echo base_url('node_modules/@coreui/chartjs/dist/js/coreui-chartjs.bundle.js'); ?>"></script>-->
<script src="<?php echo base_url('node_modules/@coreui/utils/dist/coreui-utils.js'); ?>"></script>
<!--<script src="<?php echo base_url('assets/backend/js/main.js'); ?>"></script>-->

<script src="<?php echo base_url('assets/backend/js/modal-loading.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/sweetalert2.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/backend/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/printThis.js'); ?>"></script>

<!-- rich text editor -->
<script src="//cdn.quilljs.com/1.0.0/quill.js"></script>
<script src="//cdn.quilljs.com/1.0.0/quill.min.js"></script>

<!-- pdf viewer -->
<script src="<?php echo base_url('assets/backend/js/pdfobject.min.js'); ?>"></script>

<!-- buttons -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

<script type="text/javascript">
	var quill_toolbar_options = [
	    ['bold', 'italic', 'underline', 'strike'], // toggled buttons
	    ['blockquote', 'code-block'],
	    [{
	        'header': 1
	    }, {
	        'header': 2
	    }], // custom button values
	    [{
	        'list': 'ordered'
	    }, {
	        'list': 'bullet'
	    }],
	    [{
	        'script': 'sub'
	    }, {
	        'script': 'super'
	    }], // superscript/subscript
	    [{
	        'indent': '-1'
	    }, {
	        'indent': '+1'
	    }], // outdent/indent
	    [{
	        'direction': 'rtl'
	    }], // text direction
	    [{
	        'size': ['small', false, 'large', 'huge']
	    }], // custom dropdown
	    [{
	        'header': [1, 2, 3, 4, 5, 6, false]
	    }],
	    [{
	        'color': []
	    }, {
	        'background': []
	    }], // dropdown with defaults from theme
	    [{
	        'font': []
	    }],
	    [{
	        'align': []
	    }],
	    ['clean'] // remove formatting button
	];
</script>