    @extends('layouts.app')
@if (count($errors) > 0)

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>
@endif
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
           <div class="panel panel-default">
                <div class="panel-heading">Edit Patients {{$patients->name}}</div>
                    <Hdiv class="panel-body">
                        <div class="col-lg-8">
                    {!! Form::model($patients, array('method'=>'PATCH','action' => ['PatientsController@update',$patients->id], 'enctype' => 'multipart/form-data','file'=>'true' ))!!}
                    <div class="form-group col-lg-4">
                    {!! Form::text('name',null, array('required','class'=>'form-control','placeholder'=>'إسم المريض')) !!}
                    </div>
                    <div class="form-group col-lg-4">
                    {!! Form::number('national_id',null, array('required','step'=>'any','class'=>'form-control','placeholder'=>'رقم البطاقة الشخصية')) !!}
                    </div>
                    <div class="form-group col-lg-4">
                     {!! Form::text('address',null, array('required','class'=>'form-control','placeholder'=>'العنوان')) !!}
                    </div>
                    <div class="form-group col-lg-4">
                    {!! Form::date  ('birth_date',null, array('\Carbon\Carbon::now()','required','class'=>'form-control','placeholder'=>'تاريخ الميلاد')) !!}
                    </div>
                    <div class="form-group col-lg-4">
                    {!! Form::text('mobile_no',null, array('class'=>'form-control','placeholder'=>'رقم الموبايل')) !!}
                    </div>
                    <div class="form-group col-lg-4">
                    {!! Form::select('dr_in',['DR 1'=>'DR 1','DR 2'=>'DR 2','DR 3'=>'DR 3','DR 4'=>'DR 4','DR 5'=>'DR 3'],null, array('required','class'=>'form-control','placeholder'=>'الطبيب المتواجد')) !!}
                    </div>
                    <div class="form-group col-lg-4">
                    {!! Form::text('diagnose',null, array('required','class'=>'form-control','placeholder'=>'التشخيص')) !!}
                    </div>
                     <div class="form-group col-lg-4">
                    {!! Form::select('fromdr_id',
                    $fromdrs
                    ,null, array( 'class'=>'form-control','placeholder'=>'From Dr')) !!}
                    </div>
                    <div class="form-group col-lg-12">
                    {!! Form::textarea('report',null, array('required','class'=>'form-control','placeholder'=>'تقرير')) !!}
                    </div>
                    <div class="form-group col-lg-4">
                     {!! Form::select('status',['0'=>'مرفوض','1'=>'مقبول'],null, array('required','class'=>'form-control','placeholder'=>'حالة المريض')) !!}
                    </div>
                            <div class="form-group col-lg-4">

                                {!! Form::label('user_id',
                                'Updated By user( '. $users .' )'
                                , array( 'class'=>'form-control','placeholder'=>'Created By')) !!}
                            </div>
                    <div class="form-group col-lg-4">
                     {!! Form::file('image',null, array('class'=>'form-control','placeholder'=>'صورة')) !!}
                    </div>
                    <div class="form-group col-lg-4">
                        {!! Form::submit('Edit',array('required','class'=>'btn btn-primary')) !!}
                        </div>
                      {!! Form::close() !!}
                        </div>
                        <div class="col-lg-4">
                            <img src="{{asset($patients->image)}}" alt="{{asset($patients->image)}}" class="img-responsive img-rounded editPatientsEmage" >
                        </div>
                    </Hdiv>
              </div>
            </div>
        </div>
    </div>
@endsection
