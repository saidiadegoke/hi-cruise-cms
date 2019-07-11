@extends('layouts.cruise')
@section('content')
    
      
    <section class="pattern1 no-margin pad-10 mid-space" style="margin-top: 200px">
      <div class="container">
        <img src="{{asset('public/assets/img/logo-icon.png')}}" alt="" class="logo-icon-section" />
        <h3 class="all-caps">Contact Support</h3>
        <div class="row">
            @include('layouts.partials.flash')
        </div>
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                      

                        <div class="col-md-12">
                            <form action="{{route('support')}}" method="post">
                            @csrf

                              
                                <div class="form-group">
                                    <div class="row">
                                        <label for="title">Reason for Contacting Us</label>
                                        <input type="text" class="form-control" placeholder="Reason for Contacting Us" name="title">
                                    </div>
                                </div>
                            

                                <div class="form-group">
                                    <div class="row">
                                        <label for="body">Explain More</label>
                                        <textarea id="body" class="form-control" name="body" rows="3" value=""></textarea>
                                    </div>
                                    
                                </div>
                            
                            
                            
                            

                            
                            <div class="form-group">
                                <div class="row">
                                   
                                    <button class="btn btn-primary" type="submit">Submit Ticket</button>
                                
                                </div>

                            </div>

                        </form>
                        </div>
                    
                    </div>
                </div>
                    
            </div>
      </div>
    </section>
        @endsection