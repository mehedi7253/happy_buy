<script src="{{ asset('template/vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('template/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('template/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/assets/js/main.js') }}"></script>
<script src="{{ asset('template/assets/js/dashboard.js') }}"></script>
<script src="{{ asset('template/assets/js/widgets.js') }}"></script>

<script src="{{ asset('template/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('template/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('template/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('template/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('template/assets/js/init-scripts/data-table/datatables-init.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('application',
        {
            height:300,
            resize_enabled:true,
            wordcount: {
                showParagraphs: false,
                showWordCount: true,
                showCharCount: true,
                countSpacesAsChars: true,
                countHTML: false,
                maxCharCount: 20}
        });
</script>
