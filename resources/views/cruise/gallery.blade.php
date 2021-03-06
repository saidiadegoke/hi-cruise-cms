@extends('layouts.cruise')
@section('title') Gallery @endsection
@section("content")

    <section class="pattern1 no-margin pad-10 mid-space marg-Top-60">
      <div class="container">
        <h4 class="all-caps">Our Gallery</h4>
        <div class="marg-Top-30" id="main-gallery">
          @foreach($galleries as $gallery)
            <a
            href="{{ $gallery->id }}"
            class="btn profile-btn col-md-3 "
            onclick="return maxPic(this)"
          >
            <div class="col">
              <div class="blog">
                <img src="{{asset('public/storage/' . $gallery->file->filename)}}" />
              </div>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </section>
        <div id="modal" class="modal" style="display: none;">
      <i class="fa fa-times" id="clsModal" onclick="clsModal()"></i>
      <div class="pic-holder" id="holder">
        @foreach($galleries as $gallery)
        <img
          src="{{asset('public/storage/' . $gallery->file->filename)}}"
          class="galImg"
          alt=""
          data-id="{{ $gallery->id }}"
          style="display: none;"
        />
        @endforeach
      </div>
      <a href="#" onclick="backImg()" class="pointers"
        ><i class="fa fa-angle-left pointers"></i
      ></a>
      <a href="#" onclick="nextImg()" class="pointers right-align"
        ><i class="fa fa-angle-right pointers"></i
      ></a>
    </div>

@endsection
    <!-- Including Jquery so All js Can run -->
@section("scripts")
    <script>
      function maxPic(obj) {
        event.preventDefault();

        var galID = obj.getAttribute("href");
        var targetDiv = document.querySelectorAll(".galImg");
        for (var i = 0; i < targetDiv.length; i++) {
          if (
            obj.getAttribute("href") == targetDiv[i].getAttribute("data-id")
          ) {
            targetDiv[i].style.display = "block";
            targetDiv[i].className += " current";
          }
        }
        document.getElementById("modal").style.display = "block";
      }

      //function to move the form pages left and right for easy user access
      var slideIndex = 1;

      function nextImg() {
        event.preventDefault();

        var i;
        var slides = document.getElementsByClassName("galImg");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
          slides[i].classList.remove("current");
        }
        slideIndex++;
        if (slideIndex > slides.length) {
          slideIndex = 1;
        }
        slides[slideIndex - 1].style.display = "block";
        slides[slideIndex - 1].className += " current";
      }

      function backImg() {
        event.preventDefault();

        var i;
        var slides = document.getElementsByClassName("galImg");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
          slides[i].classList.remove("current");
        }
        slideIndex--;
        if (slideIndex == 0 || slideIndex == 1) {
          slideIndex = slides.length;
        }
        slides[slideIndex - 1].style.display = "block";
        slides[slideIndex - 1].className += " current";
      }
      function clsModal(){
          document.getElementById("modal").style.display='none';
          var targetDiv = document.querySelectorAll(".galImg");
          for( var i = 0; i < targetDiv.length; i++){
            targetDiv[i].style.display="none";
          }        
      }	      
    </script>
@endsection
