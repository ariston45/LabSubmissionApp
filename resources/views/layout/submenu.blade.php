@foreach ($childs as $child)
<li class="{{ Request::is('laporan/form-buat-laporan*') == true ? 'active' : '' }}">
	<a href="{{ url($child->mn_slug) }}"><i class="fa fa-circle-o"></i> {{ $child->mn_title }}</a>
</li>
@endforeach
