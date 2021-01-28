<!--
  ## Introduction
  Learn how to create your first AMP Story. The [`amp-story`](/content/amp-dev/documentation/components/reference/amp-story-v1.0.md) extension provides a new format for displaying visual content.
-->
<!-- -->
<!doctype html>
<html amp lang="en">
  <head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <!-- ## Setup -->
    <!-- AMP Stories are written using AMPHTML and they use their own AMP extension: `amp-story`. The first step is to import the `amp-story` in the header. -->
    <script async custom-element="amp-story" src="https://cdn.ampproject.org/v0/amp-story-1.0.js"></script>
    <!-- AMP Stories can make use of other AMP extensions such as `amp-video`. However, AMP Stories support only a subset of the available AMP extensions. You can find a full list of the supported extensions [here](/content/amp-dev/documentation/components/reference/amp-story.md#children-of-amp-story-grid-layer). -->
    <script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
    <title>{{$setting->title}}</title>
    <meta name="viewport" content="width=device-width">
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <!-- Stories can be styled using CSS: -->
    <style amp-custom>
      amp-story {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI ", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji ", "Segoe UI Emoji ", "Segoe UI Symbol ";
      }
      amp-story-page * {
        color: white;
        text-align: center;
      }
      [template=thirds] {
        padding: 0;
      }
    </style>
  </head>

  <body>
    <!-- ## Writing the Story -->
    <!-- Stories are declared inside the `amp-story` tag. Story-level metadata is provided via attributes. (The first four attributes are mandatory; the final two are optional, but recommended.) Note that this metadata augments, but does not replace, [Structured Data](https://developers.google.com/search/docs/data-types/article#amp). -->
    <amp-story standalone
      title="{{ $setting->title }}"
      publisher="{{ $setting->publisher }}"
      publisher-logo-src="@if(strpos($setting->logo, 'logos') !== false) {{$setting->logo}} @else {{ 'uploads/logos/'.$setting->logo }}  @endif"
      poster-portrait-src="@if(strpos($setting->cover, 'covers') !== false) {{$setting->cover}} @else {{ 'uploads/covers/'.$setting->cover }}  @endif"
      poster-square-src="@if(strpos($setting->cover, 'covers') !== false) {{$setting->cover}} @else {{ 'uploads/covers/'.$setting->cover }}  @endif"
      poster-landscape-src="@if(strpos($setting->cover, 'covers') !== false) {{$setting->cover}} @else {{ 'uploads/covers/'.$setting->cover }}  @endif">

      @forelse ($stories as $key => $story)
          @if ($story->story_type !== 0)
            <!-- Here we have a page consisting of a video which autoplays and loops. -->
            <amp-story-page data-id="{{ $story->id }}" id="page-{{$key}}">
                <amp-story-grid-layer template="fill">
                <amp-video autoplay loop
                        width="720"
                        height="960"
                        layout="responsive">
                        <source src="{{ $story->story }}" type="video/mp4">
                </amp-video>
                </amp-story-grid-layer>
            </amp-story-page>
          @else
            <!-- Pre-defined entry animations make it possible to create dynamic pages without videos. The length and initial delay can be customized using the `animate-in-duration` and `animate-in-delay` properties. The [animations sample](/documentation/examples/visual-effects/amp_story_animations/) shows all available animantions in action. -->
            <amp-story-page data-id="{{ $story->id }}" id="page-{{$key}}">
                <amp-story-grid-layer template="fill">
                <amp-img src="@if(strpos($story->story, 'stories') !== false) {{ asset($story->story) }} @else {{ asset('uploads/stories/'.$story->story) }} @endif"
                        animate-in="fly-in-top"
                        width="720" height="1280"
                        layout="responsive">
                </amp-img>
                </amp-story-grid-layer>
                <amp-story-grid-layer template="thirds">
                <h2 animate-in="fly-in-bottom"
                    animate-in-delay="0.4s">
                    {{ $story->title }}
                </h2>
                <p animate-in="fly-in-bottom"
                grid-area="lower-third"
                animate-in-delay="0.4s">{{ $story->description }}</p>
                </amp-story-grid-layer>
            </amp-story-page>
          @endif
      @empty

      @endforelse

      {{-- <!-- A "bookend" panel containing links to other resources will appear on the last page of your story if you include an `amp-story-bookend` that references a [bookend JSON config](/static/samples/json/bookend.json). -->
      <amp-story-bookend src="<% hosts.platform %>/static/samples/json/bookend.json" layout="nodisplay">
      </amp-story-bookend> --}}
    </amp-story>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
      $(document).ready(function(){

      });
    </script>
  </body>
</html>
