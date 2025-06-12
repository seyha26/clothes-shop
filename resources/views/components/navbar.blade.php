<header class="w-full m-auto bg-white sticky top-0 z-50">
    <nav class="flex items-center h-[90px] justify-between m-auto max-w-[1200px]">
        <div><a href="/"><span class="text-[20px] uppercase font-bold">Clothes.Shop</span></a></div>
            <ul class="flex items-center gap-[20px]">
                <li><a href="#new-arrivals">New Arrival</a></li>
                <li><a href="#top-selling">Top Selling</a></li>
                <li><a href="#testimonial">Testimonial</a></li>
                <li><a href="/clothes">Clothes</a></li>
            </ul>
            <div class="bg-gray-100 rounded-3xl w-[500px] flex items-center px-[20px]"><i class="fa-solid text-gray-500 fa-magnifying-glass"></i>
            <form action="/search-result" method="get">
                @csrf
                <input type="text" name="key" class="px-[10px] py-[10px] w-full outline-0 text-sm text-gray-500" placeholder="Search for products...">
            </form>
        </div>
        <div class="flex gap-[10px] items-center">   
                <a href="/clothe/cart" role="button" class="relative flex ">
                   <i class="fa-solid fa-cart-shopping text-[23px]"></i>
                    @if(Auth::user() && !empty(Auth::user()->cart))
                    <span class="absolute right-[-10px] top-[-10px] rounded-full bg-red-600 w-4 h-4 top right p-0 m-0 text-white font-mono text-sm  leading-tight text-center">{{Auth::user()->cart->count()}}
                    </span>
                    @endif
                </a>
            @if(!Auth::user())
            <a href="/login">
                <i class="fa-regular fa-user text-2xl w-8 h-8"></i>
            </a>
            @else 
            <span>{{Auth::user()->name}}</span>
            <a href="/logout">
                <i class="fa-regular fa-user text-2xl w-8 h-8"></i>
            </a>
            @endif
        </div>
    </nav>
</header>
{{-- @if(request()->path()!='/')
<nav class="flex max-w-[1200px] mx-auto"aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse my-[20px]">
    <li class="inline-flex items-center">
        <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600 ">
        <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
        </svg>
        Home
        </a>
    </li>
    <li>
        <div class="flex items-center">
        <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
        </svg>
        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ms-2">Products</a>
        </div>
    </li>
    <li aria-current="page">
        <div class="flex items-center">
            <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
            </svg>
            <a href="/clothes">
                <span class="ms-1 text-sm font-medium text-gray-500  md:ms-2">Clothes</span>
            </a>
        </div>
    </li>
    @if(!empty($clothe) && request()->path()=='clothe/show/'.$clothe->id)
    <li aria-current="page">
        <div class="flex items-center">
        <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
        </svg>
        <span class="ms-1 text-sm font-medium text-gray-500  md:ms-2">{{$clothe->name}}</span>
        </div>
    </li>
    @endif
    </ol>
</nav>
@endif --}}