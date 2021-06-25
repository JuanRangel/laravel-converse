

@push('scripts')
    <script>
        window.addEventListener('scroll-chat', event => {
            var objDiv = document.getElementById("chat-body");
            objDiv.scrollTop = objDiv.scrollHeight + 100;
        })
    </script>
@endpush



