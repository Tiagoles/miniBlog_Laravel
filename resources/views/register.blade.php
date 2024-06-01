@include('components.navbar')
<form action="{{ route('register.user') }}" method="POST" enctype="multipart/form-data"
    class="flex flex-col items-center space-y-4 p-4 rounded-lg  ">
    <h1 class="text-2xl text-center py-2">Registrar</h1>
    @csrf
    <div class="flex flex-col w-full sm:max-w-md rounded-md shadow-none ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
        <div class="col-span-full">
            <label for="cover-photo" class="block text-sm font-medium leading-6 ">Foto de perfil</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-neutral-500 px-6 py-10">
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                        <label for="file-upload"
                            class=" form-register py-2 px-2 my-2 relative cursor-pointer font-semibold text-indigo-600 hover:text-indigo-500">
                            <label for="profile_photo_user_create" class="mb-1">Foto de perfil</label>
                            <input type="file" name="profile_photo_user_create" id="profile_photo_user_create"
                                class="block w-full ">
                            @error('profile_photo_user_create')
                                <div class="error_validation_register_user text-red-600 text-sm">
                                    <p>A imagem precisa ser do formato: jpeg, jpg ou png.</p>
                                </div>
                            @enderror
                        </label>
                    </div>
                    <p class="text-xs leading-5">PNG, JPG</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div
        class="flex flex-col w-full sm:max-w-md rounded-md shadow-none ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
        <label for="nickname_user_create" class="mb-1">Nome de usuário</label>
        <input type="text" name="nickname_user_create" id="nickname_user_create"
            class="block w-full form-register bg-transparent py-1.5 pl-1"
            required>
        @error('nickname')
            <div class="error_validation_register_user text-red-600 text-sm">
                <p>{{ $message }}</p>
            </div>
        @enderror
    </div>
    <div
        class="flex flex-col w-full sm:max-w-md rounded-md shadow-none ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
        <label for="name_user_create" class="mb-1">Nome completo</label>
        <input type="text" name="name" id="name_user_create"
            class="block w-full form-register bg-transparent py-1.5 pl-1"
            required>
        @error('name')
            <div class="error_validation_register_user text-red-600 text-sm">
                <p>{{ $message }}</p>
            </div>
        @enderror
    </div>
    <div
        class="flex flex-col w-full sm:max-w-md rounded-md shadow-none ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
        <label for="email_user_create" class="mb-1">Email</label>
        <input type="email" name="email" id="email_user_create"
            class="block w-full form-register bg-transparent py-1.5 pl-1"
            required>
        @error('email')
            <div class="error_validation_register_user text-red-600 text-sm">
                <p>{{ $message }}</p>
            </div>
        @enderror
    </div>
    <div
        class="flex flex-col w-full sm:max-w-md rounded-md shadow-none ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
        <label for="password_user_create" class="mb-1">Senha</label>
        <input type="password" name="password" id="password_user_create"
            class="block w-full form-register bg-transparent py-1.5 pl-1"
            required>
        @error('password')
            <div class="error_validation_register_user text-red-600 text-sm">
                <p>{{ $message }}</p>
            </div>
        @enderror
    </div>
    <div
        class="flex flex-col w-full sm:max-w-md rounded-md shadow-none ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
        <label for="password_confirmation_user_create" class="mb-1">Confirmação de senha</label>
        <input type="password" name="password_confirmation" id="password_confirmation_user_create"
            class="block w-full form-register bg-transparent py-1.5 pl-1e"
            required>
        @error('password_confirmation')
            <div class="error_validation_register_user text-red-600 text-sm">
                <p>{{ $message }}</p>
            </div>
        @enderror
    </div>
    <button type="submit"
        class="w-full sm:max-w-md rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-none hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">Registrar
    </button>
</form>
@include('components.footer')
