
@if(count($errors))
<div class="alert alert-danger" role="alert" style="margin-bottom: 30px;">
    @foreach ($errors->all() as $error)
    <li>
        {{$error}}
    </li>
        
    @endforeach

</div>
@endif