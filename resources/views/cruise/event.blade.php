@extends('layouts.cruise')
@section('title') Book an event @endsection
@section('content')
    
      
    <section class="pattern1 no-margin pad-10 mid-space" style="margin-top: 200px">
      <div class="container">
        <img src="{{asset('public/assets/img/logo-icon.png')}}" alt="" class="logo-icon-section" />
        <h3 class="all-caps">Event Reservations</h3>
        
        <div class="row">
                <div class="col-md-12">
                <p class="text-center lead announce">
                Build your event<br /><br>
Please complete the form below to help us have a clear picture of your event.
Once submitted, a member of our marketing team will provide you a quote tailored to
your requirements.<br /><br>
We look forward to working with you!
                </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                      

                        <div class="col-md-12">
                            <form action="{{route('reserve')}}" method="post">
                            @csrf
                            <div class="form-group">
                                @if(count($errors->all()) > 0)
		              @foreach($errors->all() as $error)
		              <p class="alert alert-danger">{{$error}}</p>
		              @endforeach
		            @endif
                                </div>
                            <h4>About You</h4>
                              
                                    <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="text" class="form-control" placeholder="Full Name" name="fullname">
                                    </div>

                                    <div class="col-md-5">
                                        <input type="text" class="form-control" placeholder="Organization" name="organization">
                                    </div>
                                </div>
                            </div>   

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="email" class="form-control" placeholder="Email" name="contact_email">
                                    </div>

                                    <div class="col-md-5">
                                        <input type="number" class="form-control" placeholder="Contact Number" name="contact_number">
                                    </div>
                                </div>
                            </div>   

                             <h4>Your Event</h4>
                              
                                    <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="text" class="form-control" placeholder="Type of Event" name="event_type">
                                    </div>

                                    <div class="col-md-5">
                                        <input type="number" class="form-control" placeholder="Estimated Number of Guest" name="guests">
                                    </div>
                                </div>
                            </div>   

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                        <label for="date">Event Date</label>
                                        <input type="date" class="form-control" placeholder="13/13/13" name="event_date">
                                    </div>

                                    <div class="col-md-5">
                                       <div class="form-group">
                                <div class="col-md-12">
                                    
                                    
                                        <div class="form-check-inline col-md-2" style="padding: 0">
                                            <label for="my-input" class="form-check-label">Catering</label>
                                        </div>
                                    <div class="form-check form-check-inline col-md-5">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="catering"  value="self"> Self
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-5">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="catering" value="provided"> Provided
                                        </label>
                                    </div>
                                </div>
                            </div>
                                    </div>
                                </div>
                            </div>   
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                        <label for="entertainment">Entertainment</label>
                                        <br>
                                        <div class="form-check">
                                            <input id="liveband" class="form-check-input" type="checkbox" name="entertainment[]" value="live band">
                                            <label for="liveband" class="form-check-label">Live Band</label>
                                        </div>

                                        <div class="form-check">
                                            <input id="karoke" class="form-check-input" type="checkbox" name="entertainment[]" value="karoke">
                                            <label for="karoke" class="form-check-label">Karoke</label>
                                        </div>

                                        <div class="form-check">
                                            <input id="games" class="form-check-input" type="checkbox" name="entertainment[]" value="games console hire">
                                            <label for="games" class="form-check-label">Games Console Hire</label>
                                        </div>

                                        <div class="form-check">
                                            <input id="amusement_rides" class="form-check-input" type="checkbox" name="entertainment[]" value="amusement rides">
                                            <label for="amusement_rides" class="form-check-label">Amusement Rides</label>
                                        </div>

                                        <div class="form-check">
                                            <input id="photographers" class="form-check-input" type="checkbox" name="entertainment[]" value="phptpgraphers">
                                            <label for="photographers" class="form-check-label">Photographer</label>
                                        </div>

                                        <div class="form-check">
                                            <input id="videography" class="form-check-input" type="checkbox" name="entertainment[]" value="videography">
                                            <label for="videography" class="form-check-label">Videography</label>
                                        </div>


                                    </div>

                                    <div class="col-md-5 col-md-offset-1">
                                        <label for="entertainment">Decoration</label>
                                        <br>
                                        <div class="form-check">
                                            <input id="projector" class="form-check-input" type="checkbox" name="decoration[]" value="projector,screen">
                                            <label for="projector" class="form-check-label">Projector/Screen</label>
                                        </div>

                                        <div class="form-check">
                                            <input id="outdoor_sofas" class="form-check-input" type="checkbox" name="decoration[]" value="outdoor sofas">
                                            <label for="outdoor_sofas" class="form-check-label">Outdoor Sofas</label>
                                        </div>

                                        <div class="form-check">
                                            <input id="entrance_carpet" class="form-check-input" type="checkbox" name="decoration[]" value="enterance carpet">
                                            <label for="entrance_carpet" class="form-check-label">Entrance Carpet</label>
                                        </div>

                                        <div class="form-check">
                                            <input id="table_settings" class="form-check-input" type="checkbox" name="decoration[]" value="table settings">
                                            <label for="table_settings" class="form-check-label">Table Settings</label>
                                        </div>

                                        <div class="form-check">
                                            <input id="branded_graphics" class="form-check-input" type="checkbox" name="decoration[]" value="branded graphics">
                                            <label for="branded_graphics" class="form-check-label">Branded Graphics</label>
                                        </div>

                                        <div class="form-check">
                                            <input id="show_lights" class="form-check-input" type="checkbox" name="decoration[]" value="show lights">
                                            <label for="show_lights" class="form-check-label">Show Lights</label>
                                        </div>
                                        <div class="form-group">
                                          <label for="others">Others</label>
                                          <input class="form-control" type="text" name="decoration[]" placeholder="Specify Others" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <br /> <br />

                            <div class="form-group">
                                <div class="col-md-3 col-md-offset-1">
                                        <label for="them">For the event the yacht will be: </label>
                                    <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="yacht_state" value="static">
                                    Static
                                  </label>
                                </div>

                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="yacht_state" id="" value="sailing">
                                    Sailing
                                  </label>
                                </div>

                                
                                </div>

                                 <div class="col-md-3 col-md-offset-1">
                                        <label for="setup">Duration of Event </label>
                                        <input class="form-control" type="text" name="event_duration">                               
                                </div>

                                 <div class="col-md-3 col-md-offset-1">
                                        <label for="them">Duration of Setup: </label>
                                        <input class="form-control" type="text" name="event_setup_duration">
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                   
                                    <button class="btn btn-primary" type="submit">Book Event</button>
                                
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