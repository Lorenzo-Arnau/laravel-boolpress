@component('mail::message')
# E' stato creato un nuovo Post!

Con titolo **{{$post->title}}**

perchè non vieni a vederlo?

@component('mail::button', ['url' => 'http://127.0.0.1:8000/post'])
Andiamo!
@endcomponent

Grazie mille,<br>
{{ config('app.name') }}
@endcomponent
