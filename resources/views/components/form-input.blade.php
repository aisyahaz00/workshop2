<div class="col">
    <label for="{{$id}}" class="form-label">
        {{ $label }}
    </label>

    <div class="input-group has-validation">
        <input type="{{$type}}" class="form-control @error($name) is-invalid @enderror" name="{{$name}}"
            value="{{$value}}" placeholder="{{$placeholder}}">

        @error($name)
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
</div>