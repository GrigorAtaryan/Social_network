@include('header')
<div id="div_search">
    <div style="border:0px solid; width: 250px; float: left">
        <code>
            <h3><?php echo $search_user->firstname; ?>
                <?php echo  $search_user->lastname ?>
            </h3>
        </code>
    </div>
    <div style="border:0px solid; height: 190px; overflow-x: scroll; float: right; width: 650px; padding:10px; ">
    @foreach($search_images as $result_images)
        <img class="img-rounded" id="guest_img" src="{{url('images/')}}/<?php echo $result_images->path ?>"/>
    @endforeach
    </div>
</div>
@include('footer')
