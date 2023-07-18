@extends('admin/layout')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">FAQS</h2>
            <a href="manage-faqs" class="btn btn-info" role="button" data-bs-toggle="button">
                <i class="zmdi zmdi-plus"></i> ADD FAQ</a>
        </div>
    </div>
</div>

<div class="table-responsive px-0 py-3">
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>QnA</td>
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

@endsection