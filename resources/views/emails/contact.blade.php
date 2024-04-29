<x-mail::message>
# hellow
<h3>You have a message </h3>
<h3> Name : {{ $data['name']}}</h3>
<h3> Email : {{ $data['email']}}</h3>
<h3> Message : {{ $data['message']}}</h3>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
