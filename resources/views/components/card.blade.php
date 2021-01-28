<div {{ $attributes->merge(['class'=>'card', 'href'=>'']) }}>
    {{$story}}
    <div class="card-body">
      <h5 class="card-title">{{$title}}</h5>
      {{$slot}}
    </div>
  </div>
