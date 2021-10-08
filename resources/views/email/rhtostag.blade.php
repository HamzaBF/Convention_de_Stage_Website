<p>Bonjour, @if ($data['gender'] == "Homme" ) M. 
    @else Mme.@endif {{ $data['name'] }}.</p>
<p> {{ $data['message'] }}.</p>
<p> Cordialement </p>