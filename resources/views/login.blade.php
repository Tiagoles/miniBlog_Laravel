 @include('components.navbar')


 <div class="content content-wrapper content-center">
     <form action="{{ route('app') }}" method="POST" class="flex flex-col items-center my-5 space-y-4">
        <h1 class="text-2xl text-center py-2">Entrar</h1>
         @csrf
         <div class="w-full sm:max-w-md rounded-md shadow-none ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
             <label for="email" class="mb-1">Email</label>
             <input type="email" name="email" id="email"
                 class="block w-full bg-transparent py-1.5 pl-1 form-login"
                 required>
         </div>
         <div class=" w-full sm:max-w-md rounded-md shadow-none ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
             <label for="password" class="mb-1">Senha</label>
             <input type="password" name="password" id="password"
                 class="block w-full bg-transparent py-1.5 pl-1 form-login"
                 required>
         </div>
         <button type="submit"
         class="w-full sm:max-w-md rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">Entrar
     </button>
     </form>
 </div>


 @include('components.footer')
