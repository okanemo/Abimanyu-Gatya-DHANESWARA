<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
      
        $('#category').on('change',function(e) {
          
         var category_id = e.target.value;
         $.ajax({
                
               url:"{{ route('item.sub-category') }}",
               type:"POST",
               data: {
                   category_id: category_id
                },
               
               success:function (data) {
                $('#sub-category').empty();
                $.each(data.subCategories, function(index, subcategory){
                    $('#sub-category').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                })
               }
           })
        });
    });
</script>