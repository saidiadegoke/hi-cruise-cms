@extends("layouts.cruise")

@section("content")
    <section class="primary-color no-margin pad-10 mid-space">
      <div class="container">
        <div class="col-md-12">
          <div class="col-md-6 floater-img">
            <span class="sp-cap">We will love to hear from you</span>
            <img src="{{asset('public/assets/img/contact.jpg')}}" alt="" class="floater-img" />
          </div>
          <div class="col-md-6">
            <div class="col-md-12 bordered">
              <div class="container">
                <form action="" class="">
                  <h4 class="center">Contact Form</h4>
                  <div class="form-group">
                    <label for="">Fullname</label>
                    <input type="text" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="">Mobile</label>
                    <input type="text" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="">Message</label>
                    <textarea name="" id="" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input
                      type="submit"
                      class="btn btn-primary"
                      value="Send Message"
                    />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection


@section("styles")
<link
      type="text/css"
      href="lib/datepicker/datepicker.css"
      rel="stylesheet"
    />

@endsection