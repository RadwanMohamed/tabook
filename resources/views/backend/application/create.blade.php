@extends("backend.layouts.app")

@section("title")
الاعدادات
@endsection

@section("css")
@endsection


@section("content")
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header no-border-bottom">
                        <h4 class="card-title">  اضافة خاصية </h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                    </div>
                    @if(\Session::has('status'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ \Session::get('status')}}</li>
                            </ul>
                        </div>
                    @endif
                    @if($errors->first())
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ $errors->first()}}</li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form class="form" action="{{route("application.store")}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="eventInput1"> اسم الخاصية بالعربي </label>
                                            <input type="text" id="eventInput1" class="form-control" placeholder="اسم الخاصية بالعربي" name="slug">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput1">الاسم بالانجليزي</label>
                                            <input type="text" id="eventInput1" class="form-control" placeholder="الاسم بالانجليزي" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput1">  المحتوي </label>
                                            <textarea type="text" id="eventInput1" class="form-control" name="value"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-actions center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> حفظ
                                </button>
                                <a href="{{route("admin.create")}}" type="button" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> الغاء
                                </a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section("js")
@endsection
