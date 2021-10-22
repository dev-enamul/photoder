@extends('admin.layout.master')

@section('mainContent')


<div class="content mt-3">
            <div class="animated fadeIn">
     

                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{$page_name}}</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                @if(count($errors)>0)
                                <div class="alert alert-warning" role="alert">
                                   @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                   @endforeach
                                </div>
                                @endif
                                  
                                  {{ Form::open(array('url'=>['back/author/edit',$data->id],'method' => 'PUT')) }}
                                  
                                    <div class="form-group">
                                        {{Form::label('name','Name',['class'=>'control-label'])}}
                                        {{Form::text('name',$data->name,['class'=>'form-control','id'=>'name'] )}}
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('email','E-Mail',['class'=>'control-label'])}}
                                        {{Form::text('email',$data->email,['class'=>'form-control','id'=>'email'] )}}
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('password','Password',['class'=>'control-label'])}}
                                        {{Form::password('password',['class'=>'form-control','id'=>'password','placeholder'=>'Type Password, If you want to change Password'] )}}
                                    </div>


                                    <div class="form-group">
                                        {{Form::label('role','Role',['class'=>'control-label'])}}
                                        {{Form::select('role[]',$role,$selected_role,['class'=>'form-control mySelect','data-placeholder'=>'Select Permission','multiple'] )}}
                                    </div>

                                    
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Update</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                {{ Form::close() }}
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->
                  </div><!--/.col-->
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


@endsection