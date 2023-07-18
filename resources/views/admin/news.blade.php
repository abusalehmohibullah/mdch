
@extends('admin/layout')

@section('content')

<div class="table-responsive px-0 py-3">
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>News</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    1
                </td>
                <td>
                    <div class="table-data__info">
                        <h6>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim quasi voluptas adipisci dignissimos minima modi quia unde?</h6>
                        <span>
                            <a>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, quisquam! Esse, repellendus. Odio dicta dolorum qui quod, sit tenetur ipsam eligendi sed quis neque provident dolores officiis mollitia aperiam nobis.</a>
                        </span>
                    </div>
                </td>
                <td>
                    <div class="px-0 py-1">
                        <div>
                            <form action="" method="post">
                                <label class="switch switch-default switch-success mr-2 ">
                                    <input type="checkbox" class="switch-input " checked="true">
                                    <span class="switch-label bg-secondary border-secondary"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </form>
                        </div>
                        <button type="button" class="btn btn-danger ">
                            <i class="fas fa-trash-o"></i></button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="textarea-input" class=" form-control-label">Textarea</label>
        </div>
        <div class="col-12 col-md-9">
            <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
        </div>
    </div>
    <div class="d-flex justify-content-end">

        <button type="button" class="btn btn-success ms-auto">Submit</button>
    </div>

</form>



@endsection