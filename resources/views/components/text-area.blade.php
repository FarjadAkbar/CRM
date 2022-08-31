<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <textarea class="form-control @error('{{ $name }}') is-invalid @enderror" id="{{ $name }}"
        name="{{ $name }}" {{$attributes}}>{{$slot}}</textarea>

    @error('{{ $name }}')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
