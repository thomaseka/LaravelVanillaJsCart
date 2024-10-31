<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$title}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">


</head>

<body>
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8  ">
        <div class="mx-auto max-w-lg mt-16">
            @if(session('error'))
            <div class="row">
                <div class="bg-red-500 text-white p-4 rounded-lg shadow-md grid place-items-center" role="alert">
                    {{session('error')}}
                </div>
            </div>
            @elseif(session('status'))
            <div class="bg-green-500 text-white p-4 rounded-lg shadow-md" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form action="/register" method="POST" class="mb-0 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8 bg-gray-200">
                @csrf
                <div class="">
                    <p class="text-center text-2xl font-bold text-blue-600 sm:text-3xl">Register</p>
                    <p class=" text-center text-gray-500">
                        Daftarkan diri anda</p>
                </div>

                <!-- Nama -->
                <div>
                    <div class="relative">
                        <input type="text" name="name" id="name" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer shadow-lg" placeholder="" value="{{ old('name') }}" />
                        <label for="name" class="absolute text-sm text-gray-500  duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama</label>
                        @error('name')
                        <div class="text-white bg-red-600 mt-2 grid place-items-center rounded-md">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <div class="relative">
                        <input type="text" name="email" id="email" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50  border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer shadow-lg" placeholder="" value="{{ old('email') }}" />
                        <label for="email" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email</label>
                        @error('email')
                        <div class="text-white bg-red-600 mt-2 grid place-items-center rounded-md">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <div class="relative">
                        <input type="password" name="password" id="password" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer shadow-lg password-field" c placeholder="" />
                        <label for="password" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Password</label>

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <input type="checkbox" id="togglePassword1" class="hidden togglePassword">
                            <label for="togglePassword1" id="passwordLabel" class="text-gray-500 cursor-pointer flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-current text-gray-500" viewBox="0 0 24 24">
                                    <path d="M12 19c.946 0 1.81-.103 2.598-.281l-1.757-1.757C12.568 16.983 12.291 17 12 17c-5.351 0-7.424-3.846-7.926-5 .204-.47.674-1.381 1.508-2.297L4.184 8.305c-1.538 1.667-2.121 3.346-2.132 3.379-.069.205-.069.428 0 .633C2.073 12.383 4.367 19 12 19zM12 5c-1.837 0-3.346.396-4.604.981L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.319-3.319c2.614-1.951 3.547-4.615 3.561-4.657.069-.205.069-.428 0-.633C21.927 11.617 19.633 5 12 5zM16.972 15.558l-2.28-2.28C14.882 12.888 15 12.459 15 12c0-1.641-1.359-3-3-3-.459 0-.888.118-1.277.309L8.915 7.501C9.796 7.193 10.814 7 12 7c5.351 0 7.424 3.846 7.926 5C19.624 12.692 18.76 14.342 16.972 15.558z" />
                                </svg>
                            </label>
                        </span>
                        @error('password')
                        <div class="text-white bg-red-600 mt-2 grid place-items-center rounded-md">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- PasswordConfirm -->
                <div>
                    <div class="relative">
                        <input type="password" name="passwordConfirm" id="passwordConfirm" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50  border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer shadow-lg password-field" placeholder="" />
                        <label for="passwordConfirm" class="absolute text-sm text-gray-500  duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Konfirmasi Password</label>

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <input type="checkbox" id="togglePassword2" class="hidden togglePassword">
                            <label for="togglePassword2" id="passwordConfirmLabel" class="text-gray-500 cursor-pointer flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-current text-gray-500" viewBox="0 0 24 24">
                                    <path d="M12 19c.946 0 1.81-.103 2.598-.281l-1.757-1.757C12.568 16.983 12.291 17 12 17c-5.351 0-7.424-3.846-7.926-5 .204-.47.674-1.381 1.508-2.297L4.184 8.305c-1.538 1.667-2.121 3.346-2.132 3.379-.069.205-.069.428 0 .633C2.073 12.383 4.367 19 12 19zM12 5c-1.837 0-3.346.396-4.604.981L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.319-3.319c2.614-1.951 3.547-4.615 3.561-4.657.069-.205.069-.428 0-.633C21.927 11.617 19.633 5 12 5zM16.972 15.558l-2.28-2.28C14.882 12.888 15 12.459 15 12c0-1.641-1.359-3-3-3-.459 0-.888.118-1.277.309L8.915 7.501C9.796 7.193 10.814 7 12 7c5.351 0 7.424 3.846 7.926 5C19.624 12.692 18.76 14.342 16.972 15.558z" />
                                </svg>
                            </label>
                        </span>
                        @error('passwordConfirm')
                        <div class="text-white bg-red-600 mt-2 grid place-items-center rounded-md">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Daftar -->
                <div class="mt-4">
                    <button type="submit" name="login" class=" block w-full rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-lg text-center">
                        Buat
                    </button>
                    <p class="text-center text-sm text-gray-500 mt-4">
                        Sudah punya akun?
                        <a class="underline text-indigo-600" href="/login">Masuk</a>
                    </p>
                </div>

            </form>
        </div>
    </div>
    <script>
        const togglePasswords = document.querySelectorAll('.togglePassword');

        togglePasswords.forEach(togglePassword => {
            togglePassword.addEventListener('change', function() {
                const passwordField = this.closest('.relative').querySelector('.password-field');
                const passwordLabel = this.nextElementSibling;

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    passwordLabel.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-current text-gray-500" viewBox="0 0 24 24"><path d="M12,9c-1.642,0-3,1.359-3,3c0,1.642,1.358,3,3,3c1.641,0,3-1.358,3-3C15,10.359,13.641,9,12,9z"/><path d="M12,5c-7.633,0-9.927,6.617-9.948,6.684L1.946,12l0.105,0.316C2.073,12.383,4.367,19,12,19s9.927-6.617,9.948-6.684 L22.054,12l-0.105-0.316C21.927,11.617,19.633,5,12,5z M12,17c-5.351,0-7.424-3.846-7.926-5C4.578,10.842,6.652,7,12,7 c5.351,0,7.424,3.846,7.926,5C19.422,13.158,17.348,17,12,17z"/></svg>';
                } else {
                    passwordField.type = 'password';
                    passwordLabel.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-current text-gray-500" viewBox="0 0 24 24"><path d="M12 19c.946 0 1.81-.103 2.598-.281l-1.757-1.757C12.568 16.983 12.291 17 12 17c-5.351 0-7.424-3.846-7.926-5 .204-.47.674-1.381 1.508-2.297L4.184 8.305c-1.538 1.667-2.121 3.346-2.132 3.379-.069.205-.069.428 0 .633C2.073 12.383 4.367 19 12 19zM12 5c-1.837 0-3.346.396-4.604.981L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.319-3.319c2.614-1.951 3.547-4.615 3.561-4.657.069-.205.069-.428 0-.633C21.927 11.617 19.633 5 12 5zM16.972 15.558l-2.28-2.28C14.882 12.888 15 12.459 15 12c0-1.641-1.359-3-3-3-.459 0-.888.118-1.277.309L8.915 7.501C9.796 7.193 10.814 7 12 7c5.351 0 7.424 3.846 7.926 5C19.624 12.692 18.76 14.342 16.972 15.558z"/></svg>';
                }
            });
        });
    </script>

</body>

</html>