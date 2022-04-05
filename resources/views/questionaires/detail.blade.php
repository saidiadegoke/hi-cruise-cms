
<section class="primary-color no-margin pad-10 mid-space marg-Top-60">
    <div class="container">
        <div class="row">
          <div class="dflex justify-content-center flex-direction-column w-100">
            <p class="dflex justify-content-center my-4"><img class="d-block m-auto" style="width: 250px" src="{{ asset('public/assets/img/logo.png') }}"></p>
            <h4 class="text-center">Electronic ticket | 0818 8245 734</h4>
            <p class="text-center">www.hi-impactcruise.com</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <div class="col-md-12 bordered">

                <h4 class="center">Event Details</h4>
                  <div class="row p-2">
                    <div class="col-md-6 p-1">
                  
                      <table class="table">
                        <tr>
                          <th>Name</th><td>{{ $event['fullname'] }}</td>
                        </tr>
                        <tr>
                          <th>Organization</th><td>{{ $event['organization'] }}</td>
                        </tr>
                        <tr>
                          <th>Email</th><td>{{ $event['contact_email'] }}</td>
                        </tr>
                        <tr>
                          <th>Phone</th><td>{{ $event['contact_number'] }}</td>
                        </tr>
                      </table>
                 </div>
                 <div class="col-md-6 p-1">
                  
                      <table class="table">
                        <tr>
                          <th>Event Type</th><td>{{ $event['event_type'] }}</td>
                        </tr>
                        <tr>
                          <th>No of Guests</th><td>{{ $event['guests'] }}</td>
                        </tr>
                        <tr>
                          <th>Event Date</th><td>{{ $event['event_date'] }}</td>
                        </tr>
                        <tr>
                          <th>Catering</th><td>{{ $event['catering'] }}</td>
                        </tr>
                        <tr>
                          <th>Yacht State/th><td>{{ $event['yacht_state'] }}</td>
                        </tr>
                        <tr>
                          <th>Event Duration</th><td>{{ $event['event_duration'] }}</td>
                        </tr>
                        <tr>
                          <th>Event Setup Duration</th><td>{{ $event['event_setup_duration'] }}</td>
                        </tr>
                        <tr>
                          <th>Event Decoration</th><td>{{ $event['decoration'] }}</td>
                        </tr>
                        <tr>
                          <th>Event Entertainment</th><td>{{ $event['entertainment'] }}</td>
                        </tr>
                      </table>
                 </div>
              </div>
              {{-- <div style="text-align: center;">
                <a href="{{ url('payments/' . $reservation->payment->reference . '/' . $reservation->id  ) }}">View Ticket</a>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </section>

