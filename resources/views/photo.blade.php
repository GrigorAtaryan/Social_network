
@include('header')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div style="border:1px solid; width:800px; height:500px; margin:0px auto; padding-top:100px">
    <form action="{{url('upload')}}" method="post" enctype="multipart/form-data">
<table style="width:400px; margin:0px auto" class="table table-bordered">
    <tr>
        <td> <input type="file" required class="btn btn-warning" name="file_image"  /></td>
        <td> &nbsp </td>
        <td><input type="submit"  class="btn btn-primary" value="Upload Image"></td>
    </tr>
</table><hr />

    </form>
    <table style="border:0px solid; width:400px; margin:0px auto"  class="table">
    @foreach($user_images as $user_img)
        <tr>
            <td><img  src="images/<?php echo $user_img->path ?> " class="img-rounded zoom"/></td>
            <td>Set Feature</td>
            <td><input type="radio"  name="feature" class="is_feature" value="<?php echo $user_img->id ?>"></td>
            <td><a href="{{url('delete_photo/' . $user_img->id )}}"><img width="30" height="25"src="images/delete.png"></a></td>

        </tr>
    @endforeach
    </table>


</div>


@include('footer')

<script>
 var url = '{{ URL::to("/set_feature_image") }}';

    $(document).ready(function(){
        $('.is_feature').on("click", function(){

            $.ajax({
                url: url ,
                type: "POST",
                data: {id: $(this).val() },
                success: function(out){
                    window.location.href = '<?php  echo url('account') ?>';
                }
            });

        });
    });
</script>