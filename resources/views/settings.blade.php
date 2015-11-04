@include('header')
    <div id="div_settings">
        <form action="{{url('update')}}" method="post" enctype="multipart/form-data">
            <table style="width:300px;" class="table table-hover">
                <tr>
                    <td><th><code>Update your Settings</code></th></td>
                </tr>
                <tr>
                    <td><span class="label label-info">Name</span></td>
                    <td><input  type="text" maxlength="15" name="firstname" value="{{Auth::User()->firstname}}"/></td>
                </tr>
                <tr>
                    <td><span class="label label-info">Lastname</span></td>
                    <td><input  type="text" maxlength="20" name="lastname" value="{{Auth::User()->lastname}}"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-primary" value="Update"/></td>
                </tr>
            </table>
        </form>
    </div>
@include('footer')
