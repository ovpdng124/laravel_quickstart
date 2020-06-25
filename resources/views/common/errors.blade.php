@if ($errors->any())
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>{{trans('messages.error_message')}}</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
