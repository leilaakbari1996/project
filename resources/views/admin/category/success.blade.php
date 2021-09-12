<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-check"></i> توجه!</h5>
                {{session()->get('success')}}
            </div>
        @endif
    </div>
</div>

