<table {{ $attributes->merge(['class' => 'table text-center table-stripped border-gray caption-top']) }}>
    {{ $caption }}
    {{ $slot }}
</table>
