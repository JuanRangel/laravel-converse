@extends(config('converse.layout'))

@section('content')
    <livewire:converse::conversations.conversation-app :conversation="$conversation"/>
@endsection