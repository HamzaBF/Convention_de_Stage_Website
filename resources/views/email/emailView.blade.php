<p>Bonjour,</p>
<p>Je suis @if ($data['gender'] == "Homme" ) M. 
    
@else Mme.@endif {{ $data['name'] }}.</p>
<p> {{ $data['message'] }}.</p>
<p> En vous remerciant</p>
<a  class="link-success" href="{{ route('register') }}"> lien vers le site du stages.mascir.ma </a>

