
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap5.bundle.min.js"></script>
    
    <script>
        $(document).ready( function () {
            $('#myDataTable').DataTable();
        });
    </script>


    <!-- Summernote Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
             

            $('#summernote').summernote({
                placeholder: 'Type your Description',
                height: 300
            });
            
            $('.dropdown-toggle').dropdown();
        });
    </script>
   

</body>
</html>
