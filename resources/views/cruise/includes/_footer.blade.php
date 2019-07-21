<style>
.payment-card {
  width: 50px;
}
.provider-anchor {
  background-color: white;
  display: inline-block;
  margin: 5px;
}
</style>
<footer>
     @include('cruise.includes._maps')
      <div class="footer">
        <div class="container">
          <div class="col-md-5">
            Copyright &copy; 2019 All rights reserved
            <a href="#"> | Privacy Policy </a>
            <a href="#"> | Terms and Condition</a>
          </div>
          <div class="col-md-3 socials">
            <li>
              <a href="#" class="provider-anchor"> <img src="{{ asset('public/assets/img/mastercard.png') }}" class="payment-card"></a>
            </li>
            <li>
            <a href="#" class="provider-anchor"> <img src="{{ asset('public/assets/img/visa.png') }}" class="payment-card"></a>
            </li>
            <li>
            <a href="#" class="provider-anchor"> <img src="{{ asset('public/assets/img/verve.png') }}" class="payment-card"></a>
            </li>
          </div>
          <div class="col-md-4 pull-right socials">
            <li>
              <a href="https://www.facebook.com/hiimpactcruise/"> <i class="fab fa-facebook-f"></i></a>
            </li>
            <li>
              <a href="https://www.instagram.com/hiimpactcruise/"> <i class="fab fa-instagram"></i></a>
            </li>
            <li>
              <a href="https://www.youtube.com/channel/UCgML4_kZVyZALD3vjGHYOZQ"> <i class="fab fa-youtube"></i></a>
            </li>
          </div>
        </div>
      </div>
    </footer>