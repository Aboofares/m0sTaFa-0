@extends('layouts.app')

@section('content')

<div class="container">
    <!-- add model -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('nav-trans.add_AccountType') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('Accountype.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="AccTypeName" class="mr-sm-2">{{ trans('main-sidebar-Trans.AccType_name_ar') }}
                                    :</label>
                                <input id="AccTypeName" type="text" name="AccTypeName" class="form-control" >
                            </div>
                            <div class="col">
                                <label for="AccTypeName_en" class="mr-sm-2">{{ trans('main-sidebar-Trans.AccType_name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="AccTypeName_en" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="AccTypeDesc">{{ trans('main-sidebar-Trans.AccTypeDesc') }}
                                :</label>
                            <textarea class="form-control" name="AccTypeDesc" id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="AccTypeStatus">{{ trans('main-sidebar-Trans.AccTypeStatus') }}
                                :</label>
                            <input type="checkbox" name="AccTypeStatus" class="form-control">
                        </div>
                        <br><br>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('main-sidebar-Trans.Close') }}</button>
                            <button type="submit" class="btn btn-success">{{ trans('main-sidebar-Trans.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end model -->
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <div class="row">
                        <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                            {{ trans('nav-trans.add_AccountType') }}
                        </button>
                    </div>
                    <br><br>

                    <table  id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('nav-trans.AccTypeName') }}</th>
                            <th>{{ trans('nav-trans.AccTypeDesc') }}</th>
                            <th>{{ trans('nav-trans.AccTypeStatus') }}</th>
                            <th>{{ trans('nav-trans.Processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach ($accounttypes as $accounttype)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $accounttype->AccTypeName }}</td>
                                <td>{{ $accounttype->AccTypeDesc }}</td>
                                <td>{{ $accounttype->AccTypeStatus }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $accounttype->id }}"
                                            title="{{ trans('main-sidebar-Trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $accounttype->id }}"
                                            title="{{ trans('main-sidebar-Trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            {{--                    strtedit--}}
                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $accounttype->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('main-sidebar-Trans.edit_AccType') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="stage_name"
                                                               class="mr-sm-2">{{ trans('main-sidebar-Trans.AccType_name_ar') }}
                                                            :</label>
                                                        <input id="AccTypeName" type="text" name="AccTypeName"
                                                               class="form-control"
                                                               value="{{ $accounttype->getTranslation('AccTypeName', 'ar') }}"
                                                               required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $accounttype->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="AccTypeName_en"
                                                               class="mr-sm-2">{{ trans('main-sidebar-Trans.AccType_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{ $accounttype->getTranslation('AccTypeName', 'en') }}"
                                                               name="AccTypeName_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('main-sidebar-Trans.AccTypeDesc') }}
                                                        :</label>
                                                    <textarea class="form-control" name="AccTypeDesc"
                                                              id="exampleFormControlTextarea1"
                                                              rows="3">{{ $accounttype->AccTypeDesc }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="AccTypeStatus">{{ trans('main-sidebar-Trans.AccTypeStatus') }}
                                                        :</label>
                                                    <input type="checkbox" name="AccTypeStatus" class="form-control" value="{{ $accounttype->AccTypeStatus}}">
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('main-sidebar-Trans.Close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-success">{{ trans('main-sidebar-Trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--                    endedit--}}


                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $accounttype->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('main-sidebar-Trans.delete_AccType') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('main-sidebar-Trans.Warning_AccType') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                       value="{{ $accounttype->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('main-sidebar-Trans.Close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('main-sidebar-Trans.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- delete_modal_Grade -->





                        @endforeach
                    </table>



                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->



    <script>new DataTable('#example');</script>
@endsection
