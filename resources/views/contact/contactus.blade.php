<form action="/suggestion" method="post" role="form" class="php-email-form" id='myForm'>
    @csrf
  <div class="form-row">

    <div class="col-md-6 form-group">
      <input type="email" class="form-control" id="email" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
      <div class="validate"></div>
    </div>
    <div class="col-md-6 form-group">
        <input type="text" class="form-control" id="name" name="name" id="email" placeholder="Your name" data-rule="subject" data-msg="please enter your valide name" />
        <div class="validate"></div>
      </div>
  </div>

  <div class="form-group">
    <textarea class="form-control" name="message" id="message" rows="5" data-rule="required" data-msg="Here you can either put your message if you want to be auther" placeholder="reply comes to your email /igisubisubizo kiza kuri email yawe"></textarea>
    <div class="validate"></div>
  </div>

  <div class="mb-3">
    <div class="loading">Loading</div>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    {{-- <div class="error-message"></div> --}}
    <div class="sent-message">Your message has been sent. Thank you!</div>
  </div>
  <div class="text-center"><button type="submit" id="vv" onclick="submitForm()">Send Message</button></div>
</form>

<script>
function  submitForm(){
$('#vv').find('b').remove();





}
;

</script>
