@extends('layouts.cruise')
@section('title') Verify Reservation Tickets @endsection
@section('content')

<style>
h4:after {
    display: block;
    width: 0%;
    margin: 0px 0px;
    height: 0px;
    content: '';
    background-color: transparent;
}
  </style>

<section class="set-margTop-100">
      <div class="container">
        <img src="{{ asset('public/assets/img/logo-icon.png') }}" alt="" class="iconic" />
        <div class="col-md-4 middle-place bordered">
          <div class="container">
             <form id="verifyCodeForm" method="POST" action="{{ route('verify-code') }}" onsubmit="return false;" >
                @csrf
              <h4>Verify Reservation Tickets</h4>
              <div class="form-group">
                <input id="reference" type="text" class="form-control" placeholder="Scan the ticket barcode" name="reference" autofocus>
              </div>
              <div class="form-group">
                  <h4 id="verifyResponse" class="alert alert-info text-center"></h4>
              </div>

              <div class="form-group">
                <input type="button" value="Reset" class="btn btn-primary" id="reset" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    

@endsection

@section("scripts")
@parent

<script>
  $(document).ready(function() {
  $("#verifyResponse").hide();
$("#reference").on("change", function() {
  console.log("Got here");
  var reference = $(this).val();
  var url = $("#verifyCodeForm").attr("action");
  if(reference && url) {
    v = $.post(url, $("#verifyCodeForm").serialize(), function(data) {

        if(data && data['message']) {
          console.log(data['message']);
          $("#verifyResponse").show().html(data['message'])
        } else {
          $("#verifyResponse").show().html("Verification failed! Please retry");
        }

        $("#reference").val("").focus();
    });

    console.log(v)
  } else {
    $("#verifyResponse").hide();
  }
});

$("#reset").click(function() {
  console.log("set focus")
  $("#reference").val("").focus();
  $("#verifyResponse").hide().html("");
});

});
  </script>

@endsection