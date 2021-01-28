<div class="form-check">
    <input type="checkbox" {{ $attributes->merge(['class' => 'form-check-input', 'value' => '', 'name' => '']) }} id="defaultCheck{{$key}}">
        <label class="form-check-label" for="defaultCheck{{$key}}">
            {{ $title }}
        </label>
</div>
