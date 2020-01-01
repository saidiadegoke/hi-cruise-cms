 @php
$contact = \App\Models\Page::byCategory(3);
 @endphp
 <div class="container" style="padding:30px 0px;">
        <div class="col-md-12">
          <!--iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.7763434619374!2d3.359796114683554!3d6.549898224673285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8d9460a7be7b%3A0x64caf3a2460e953e!2s32+Coker+Rd%2C+Ilupeju%2C+Lagos!5e0!3m2!1sen!2sng!4v1562360908061!5m2!1sen!2sng"
            width="100%"
            height="300"
            frameborder="0"
            style="border:0"
            allowfullscreen
          ></iframe-->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.611462778785!2d3.3955536147702903!3d6.443908095338019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8bd48278f369%3A0x14fe0c6b4945fbac!2sHi-Impact%20Cruise%20Boarding%20Terminal!5e0!3m2!1sen!2sng!4v1576705337333!5m2!1sen!2sng" 
          width="100%" 
          height="300" 
          frameborder="0" 
          style="border:0;" 
          allowfullscreen
          ></iframe>
          <h4 class="center">Contact</h4>
          <div class="row">
            <div class="col-md-6">
          <h5 class="text-center">Corporate Office</h5>
          <div style="text-align: center">{!! $contact['address-ilupeju'] !!}</div>
</div>
<div class="col-md-6">
          <h5 class="text-center">Boarding Terminal</h5>
          <div class="text-center" style="margin-bottom: 2em;">Hi-Impact Cruise Boarding Terminal, <br>opposite Lagos House, outer marina, Lagos.</div>
        </div>
      </div>
          <div style="text-align: center">{!! $contact['admin-email'] !!}</div>
          <div style="text-align: center">{!! $contact['phone-numbers'] !!}</div>
        </div>
      </div>