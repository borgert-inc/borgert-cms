
<!-- Google+ -->
<meta itemprop="name" content="{{ $title }}">
<meta itemprop="description" content="{{ $description }}">

@if(isset($keywords))
	<meta itemprop="keywords" content="{{ $keywords }}">
@endif

@if($image)
	<meta itemprop="image" content="{{ asset($image) }}">
@else
	<meta itemprop="image" content="{{ asset('assets/blog/img/social.jpg') }}">
@endif

<!-- Facebook -->
<meta property="og:locale" content="pt_BR">
<meta property="og:url" content="{{ $url }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:site_name" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
@if($image)
	<meta property="og:image" content="{{ asset($image) }}">
@else
	<meta property="og:image" content="{{ asset('assets/blog/img/social.jpg') }}">
@endif
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="200">
<meta property="og:image:height" content="200">
<meta property="og:type" content="website">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@OPostador_">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:creator" content="@OPostador_">
