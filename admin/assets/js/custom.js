var total_image=1;
function addmoreimage()
{ 
    total_image++;
   var html='<div style="margin-top:20px" class="col-lg-6" id="add_image_box_'+total_image+'"> <label for="categories" class=" form-control-label">Image</label><input type="file"  name="product_images[]" class="form-control" required> <button type="button" onclick=removeimage("'+total_image+'") class="btn btn-lg btn-danger btn-block">   <span id="payment-button-amount">Remove image</span></button></div>'; 
   jQuery('#image-box').append(html);
}
function removeimage(id)
{
jQuery('#add_image_box_'+id).remove();
}

     $(document).ready(function() {
        var dateFormat = "mm/dd/yy";
                $(function() {
                    $("#my_date_picker1").datepicker({
                        dateFormat:"dd/mm/yy",
                        changeMonth: true,
                        changeYear:true,


                    });
                });
  
                $(function() {
                    $("#my_date_picker2").datepicker({
                        dateFormat:"dd/mm/yy",
                        changeMonth: true,
                        changeYear:true,
                    });
                });
  
                $('#my_date_picker1').change(function() {
                    startDate = $(this).datepicker('getDate');
                    $("#my_date_picker2").datepicker("option", "minDate", startDate);
                })
  
                $('#my_date_picker2').change(function() {
                    endDate = $(this).datepicker('getDate');
                    $("#my_date_picker1").datepicker("option", "maxDate", endDate);
                })
                
            })
