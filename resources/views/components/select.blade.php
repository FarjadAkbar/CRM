<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select class="form-control @error('{{ $name }}') is-invalid @enderror" id="{{ $name }}"
        name="{{ $name }}" autofocus="" {{$attributes}}>
        @foreach ($collection as $item)
            {{-- <option value="">{{ $item }}</option> --}}
            <option value="{{ $item->id }}" {{ $item->id == $selected ? "selected" : " " }}>{{ $item->name }}</option>
        @endforeach
    </select>

    @error('{{ $name }}')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
