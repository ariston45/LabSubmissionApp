@foreach ($childs as $child)
<li class="{{ Request::is($child->mn_slug.'*') == true ? 'active' : '' }}">
	<a href="{{ url($child->mn_slug) }}"><i class="{{ $child->mn_icon_code }}" style="margin-right: 2px"></i> {{ $child->mn_title }}</a>
</li>
@endforeach
