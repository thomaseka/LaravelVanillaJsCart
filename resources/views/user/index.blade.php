@extends('layout.app')
@section('title', 'Home')
@section('content')
<!-- Navbar -->
<main class="min-h-screen flex items-center justify-center w-full">

    <section>
        <!-- KONTEN 1 -->
        <div class="relative bg-[url(https://images.unsplash.com/photo-1604014237800-1c9102c219da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80)] bg-cover bg-center bg-no-repeat">
            <div class="absolute inset-0 bg-black opacity-30"></div>
            <div class="relative mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
                <div class="mx-auto max-w-3xl text-center">
                    <h1 class="text-gray-100 text-3xl font-extrabold sm:text-5xl">
                        Starling
                        <span class="sm:block text-gray-100"> Restaurant </span>
                    </h1>
                    <p class="text-gray-100 mx-auto mt-4 max-w-2xl sm:text-xl/relaxed">
                        Nikmati pengalaman kuliner yang tak terlupakan di Sweda Restaurant! Kami menyajikan berbagai hidangan lezat yang memanjakan lidah Anda
                    </p>
                    <div class="text-gray-100 mt-8 flex flex-wrap justify-center gap-4">
                        <a class="block w-full rounded-full border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white 
                                    hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto" href="#">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- TULISAN RESTAURANT -->
        <div class="bg-gray-50 pt-5 pb-5 hidden sm:block">
            <div class="mx-auto text-center ">
                <h1 class="text-3xl font-bold sm:text-5xl text-blue-500">
                    - Est 1968 -
                </h1>
            </div>
        </div>

        <!-- ABOUT -->
        <div class="mx-auto mt-4 max-w-7xl sm:text-xl/relaxed">
            <div class="flex justify-center items-center p-4">
                <div class="grid grid-cols-1 gap-y-4 lg:grid-cols-2 lg:items-center lg:gap-x-8">
                    <div class="mx-auto text-center lg:mx-0 lg:text-left">
                        <p class="text-lg font-ms sm:text-xl">About Us</p>
                        <h2 class="mt-4 text-3xl font-bold sm:text-4xl text-blue-500">Starling Restaurant</h2>
                        <p class="mt-4 text-gray-600">
                            Merupakan destinasi kuliner yang menawarkan pengalaman makan yang tak terlupakan dengan sajian hidangan lezat dan berkualitas.
                        </p>
                        <a href="#" class="mt-8 inline-block rounded-full border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white 
                                    hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-opacity-75 sm:w-auto">
                            Lebih Banyak
                        </a>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <a class="block rounded-xl border border-gray-100 p-4 shadow-sm hover:border-gray-200 hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring" href="#">
                            <p class="font-semibold text-lg">Makanan</p>
                            <h2 class="mt-1 font-bold text-6xl">{{$foodProducts}}+</h2>
                            <p class="sm:mt-1 sm:block sm:text-sm sm:text-gray-600">Menyajikan berbagai hidangan makanan lezat.</p>
                        </a>

                        <a class="block rounded-xl border border-gray-100 p-4 shadow-sm hover:border-gray-200 hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring" href="#">
                            <p class="font-semibold text-lg">Minuman</p>
                            <h2 class="mt-1 font-bold text-6xl">{{$drinkProducts}}+</h2>
                            <p class="sm:mt-1 sm:block sm:text-sm sm:text-gray-600">Menyedikan berbagai minuman.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produk Kami -->
        <div class="w-full max-x-screen text-center mt-12">
            <p class="text-lg font-ms sm:text-xl">Produk Kami</p>
            <h1 class="mt-4 px-4 py-4 text-3xl font-bold sm:text-4xl text-blue-500">
                Berikut adalah sajian TERBARU
                <span class="sm:block "> yang paling diminati </span>
            </h1>
        </div>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">

            <ul class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-2">
                @foreach ($latestProducts as $newItem)
                <li>
                    <a href="#" class="group block overflow-hidden">
                        <img src="{{ asset('storage/images/'.$newItem->prodImagePath) }}" alt="" class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]" />
                        <div class="relative bg-white pt-3">
                            <h3 class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                                {{$newItem->prodName}}
                            </h3>
                            <p class="mt-2">
                                <span class="sr-only"> Regular Price </span>
                                <span class="tracking-wider text-gray-900"> Rp. {{ number_format($newItem->price,2) }} </span>
                            </p>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Ulasan -->
        <div class="bg-white">
            <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
                <h2 class="text-center text-4xl font-bold tracking-tight text-blue-600 sm:text-5xl">
                    Baca ulasan tepercaya dari pelanggan kami
                </h2>

                <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-8">
                    <blockquote class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
                        <div class="flex items-center gap-4">
                            <img alt="" src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80" class="size-14 rounded-full object-cover" />

                            <div>
                                <div class="flex justify-center gap-0.5 text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>

                                <p class="mt-0.5 text-lg font-medium text-gray-900">Paul Starr</p>
                            </div>
                        </div>

                        <p class="mt-4 text-gray-700">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa sit rerum incidunt, a
                            consequuntur recusandae ab saepe illo est quia obcaecati neque quibusdam eius accusamus
                            error officiis atque voluptates magnam!
                        </p>
                    </blockquote>

                    <blockquote class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
                        <div class="flex items-center gap-4">
                            <img alt="" src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80" class="size-14 rounded-full object-cover" />

                            <div>
                                <div class="flex justify-center gap-0.5 text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>

                                <p class="mt-0.5 text-lg font-medium text-gray-900">Paul Starr</p>
                            </div>
                        </div>

                        <p class="mt-4 text-gray-700">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa sit rerum incidunt, a
                            consequuntur recusandae ab saepe illo est quia obcaecati neque quibusdam eius accusamus
                            error officiis atque voluptates magnam!
                        </p>
                    </blockquote>

                    <blockquote class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
                        <div class="flex items-center gap-4">
                            <img alt="" src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80" class="size-14 rounded-full object-cover" />

                            <div>
                                <div class="flex justify-center gap-0.5 text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>

                                <p class="mt-0.5 text-lg font-medium text-gray-900">Paul Starr</p>
                            </div>
                        </div>

                        <p class="mt-4 text-gray-700">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa sit rerum incidunt, a
                            consequuntur recusandae ab saepe illo est quia obcaecati neque quibusdam eius accusamus
                            error officiis atque voluptates magnam!
                        </p>
                    </blockquote>
                </div>
            </div>
        </div>

        <!-- Footer -->
    </section>
</main>
@endsection