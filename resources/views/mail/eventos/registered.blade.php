<x-mail::message>
# Registro a {{ $evento->nombre }}

El evento {{ $evento->nombre }} se llevara a cabo el {{ $evento->date() }} desde {{$evento->range_hours(' hasta las ')}}.

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
