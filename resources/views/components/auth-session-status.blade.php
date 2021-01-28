@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-dismissible fade show', 'role' => 'alert']) }}>
        {{ $status }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
