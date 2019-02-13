<div class="invalid-feedback">

        @if ($errors->has($field))
        {{ $errors->get($field)[0] }}
        @endif    

      </div>